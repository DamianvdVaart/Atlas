<?
  include 'includes/header.php';
  //Query voor de categorie, hiermee laat je de description etc zien op de listing
  $categories = 'SELECT * FROM snm_categories WHERE alias = "'.$conn->real_escape_string($_GET['alias']).'" AND published = 1 ORDER BY lft';
  $categoriesconn = $conn->query($categories);
  $categories = $categoriesconn->fetch_assoc();

  //Query voor de listing, oftewel de artikelen onder de desbetreffende categorie
  $catlist = 'SELECT * FROM snm_content WHERE catid = "'.$conn->real_escape_string($categories['id']).'" ORDER BY ordering';
  $catlistcon = $conn->query($catlist);

  //Query voor de subcategorieen mochten die er zijn
  $subcatlist = 'SELECT * FROM snm_categories WHERE parent_id = "'.$conn->real_escape_string($categories['id']).'" AND published = 1 ORDER BY lft';
  $subcatlistcon = $conn->query($subcatlist);
?>


		<!-- Page sub-header -->
		<div id="page_header" class="page-subheader site-subheader-cst">
			<div class="bgback"></div>

			<!-- Animated Sparkles -->
			<div class="th-sparkles"></div>
			<!--/ Animated Sparkles -->

			<!-- Sub-Header content wrapper -->
			<div class="ph-content-wrap">
				<div class="ph-content-v-center">
					<div class="container">
						<div class="row">
							<div class="col-sm-12">
								<!-- Sub-header titles -->
								<!-- <div class="subheader-titles">
									<h2 class="subheader-maintitle"><?PHP //echo $categories['title']; ?></h2>
								</div> -->
								<!--/ Sub-header titles -->
							</div>
							<!--/ col-sm-6 -->
						</div>
						<!--/ row -->
					</div>
					<!--/ container -->
				</div>
				<!--/ .ph-content-v-center -->
			</div>
			<!--/ Sub-Header content wrapper -->
		</div>
		<!--/ Page sub-header -->
    <!-- Breadcrumb -->
    <div class="breadcrumbpie">
			<!-- Sub-Header content wrapper -->
			<div class="ph-content-wrap">
				<div class="ph-content-v-center">
					<div class="container">
						<div class="row">
							<div class="col-sm-12">
								<!-- Sub-header titles -->
								<div class="subheader-titles breadcrumbpos">
                  <?
                  // kleine balkje boven de content metde breadcrumbs
                  $breadcrumb = '
                  SELECT cat.title as subcat_title,
                  cat.id,
                  cat.alias as subcat_alias,
                  cat.parent_id as cat_parent,
                  cat1.title as parent_title,
                  cat1.id,
                  cat1.parent_id as cat1_parent,
                  cat1.alias as parent_alias,
                  cat2.title as supertitle,
                  cat2.id,
                  cat2.alias as superalias
                  FROM snm_categories cat
                  LEFT JOIN snm_categories cat1 ON cat.parent_id = cat1.id
                  LEFT JOIN snm_categories cat2 ON cat2.id = cat1.parent_id
                  WHERE cat.id = '.$conn->real_escape_string($categories['id']).'';
                  $breadcrumbcon = $conn->query($breadcrumb);
                  $breadcrumb = $breadcrumbcon->fetch_assoc();
                  if(!empty($breadcrumb)){

                    if(empty($breadcrumb['supertitle']) OR $breadcrumb['supertitle'] == 'ROOT'){
                      $superparent = '';
                    }else{
                      $superparent = '<li><a href="info/'.$breadcrumb['superalias'].'.html">'.$breadcrumb['supertitle'].'</a></li>';
                    }

                    if($breadcrumb['parent_title'] == 'ROOT'){
                      $parentcatbread = '';
                    }else{
                      $parentcatbread = '<li><a href="info/'.$breadcrumb['parent_alias'].'.html">'.$breadcrumb['parent_title'].'</a></li>';
                    }
                    $catbread       = '<li><a href="info/'.$breadcrumb['subcat_alias'].'.html">'.$breadcrumb['subcat_title'].'</a></li>';
                  }else{
                    $catbread = '';
                  }
                  ?>
                  <ul>
                    <li><a href="index2.php">Home</a></li>
                    <?
                      echo $superparent;
                      echo $parentcatbread;
                      echo $catbread;
                    ?>
                  </ul>
								</div>
								<!--/ Sub-header titles -->
							</div>
							<!--/ col-sm-6 -->
						</div>
						<!--/ row -->
					</div>
					<!--/ container -->
				</div>
				<!--/ .ph-content-v-center -->
			</div>
			<!--/ Sub-Header content wrapper -->
		</div>
    <!--/ Breadcrumb -->

    <!-- Content section -->
    <section class="hg_section catlistsection">
      <div class="container">
        <div class="row">
          <div class="col-md-12 listingcontent">
            <?PHP
            $description = str_replace('images/', 'cms/images/', $categories['description']);
            echo $description;
            ?>
          </div>
          <div class="col-md-12">
            <div class="latest_posts default-style">
              <div class="row">
                <?PHP
                //Loop de content en laat de listing zien
                while($catlist = $catlistcon->fetch_assoc()){
                  //Decode het json object waar de images inzitten en maak ze bruikbaar voor in de Loop
                  $catimages = $catlist['images'];
                  $catimg = json_decode($catimages);
                  //Als de image niet leeg is laat dan de image zien, als hij wel leeg is laat dan een standaard image zien
                  if($catimg->image_intro != ''){
                    $catafbeelding = 'cms/'.$catimg->image_intro;
                  }else{
                    $catafbeelding = '';
                  }

                  //Snijd de tekst af zodat er nooit meer dan 100 tekens staan, zijn er minder display dan normaal de tekst zonder ... erachter
                  $catshort = strip_tags($catlist['introtext']);
                  if (strlen($catshort) > 100){
      							 $catshortstripped = substr($catshort, 0, 100) . '...';
      						}else{
      							 $catshortstripped = $catshort;
      						}

                  $catoverzicht .= '
                  <div class="col-sm-6 col-lg-3 post">
                    <a href="'.$catlist['alias'].'.html" class="hoverBorder plus">
                      <span class="hoverBorderWrapper">
                        <img style="object-fit:cover;width:100%;height:200px;" src="'.$catafbeelding.'" class="img-responsive" width="370" height="200" alt="" title="" />
                        <span class="theHoverBorder"></span>
                      </span>
                      <h6>Read more +</h6>
                    </a>
                    <h3 class="m_title cattitle">'.$catlist['title'].'</h3>
                    <h3 class="m_title"><a class="catoverzichttekst" href="'.$catlist['alias'].'.html">'.$catshortstripped.'</a></h3>
                  </div>';
                }
                //Loop de subcats en laat de listing zien
                while($subcatlist = $subcatlistcon->fetch_assoc()){
                  //Decode het json object waar de images inzitten en maak ze bruikbaar voor in de Loop
                  $subcatimages = $subcatlist['params'];
                  $subcatimg = json_decode($subcatimages);
                  //Als de image niet leeg is laat dan de image zien, als hij wel leeg is laat dan een standaard image zien
                  if($subcatimg->image != ''){
                    $subcatafbeelding = 'cms/'.$subcatimg->image;
                  }else{
                    $subcatafbeelding = '';
                  }

                  //Snijd de tekst af zodat er nooit meer dan 100 tekens staan, zijn er minder display dan normaal de tekst zonder ... erachter
                  $subcatshort = strip_tags($subcatlist['description']);
                  if (strlen($subcatshort) > 100){
      							 $subcatshortstripped = substr($subcatshort, 0, 100) . '...';
      						}else{
      							 $subcatshortstripped = $subcatshort;
      						}

                  $subcatoverzicht .= '
                  <div class="col-sm-6 col-lg-3 post">
                    <a href="info/'.$subcatlist['alias'].'.html" class="hoverBorder plus">
                      <span class="hoverBorderWrapper">
                        <img style="object-fit:cover;width:100%;height:200px;" src="'.$subcatafbeelding.'" class="img-responsive" width="370" height="200" alt="" title="" />
                        <span class="theHoverBorder"></span>
                      </span>
                      <h6>Read more +</h6>
                    </a>
                    <h3 class="m_title cattitle">'.$subcatlist['title'].'</h3>
                    <h3 class="m_title"><a class="catoverzichttekst" href="info/'.$subcatlist['alias'].'.html">'.$subcatshortstripped.'</a></h3>
                  </div>';
                }
                echo $catoverzicht;
                echo $subcatoverzicht;
                ?>
              </div>
              <!--/ row -->
            </div>
          </div>
        </div>
        <!--/ row -->
      </div>
      <!--/ container -->
    </section>
    <!--/ Content section -->
<?PHP
  include 'includes/footer.php';
?>
