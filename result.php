<?
include 'includes/header.php';
//Lees de gepostte waarde vanaf het zoekveld
$zoekwoord = $_POST['zoekvalue'];

//Vergelijk het zoekwoord met titels in snm_content
$zoekresult     = 'SELECT * FROM snm_content WHERE title LIKE LOWER("%'.$zoekwoord.'%") and state = 1 order by ordering';
$zoekresultconn = $conn->query($zoekresult);
//Doe hetzelfde voor snm_categories
$zoekresult1     = 'SELECT * FROM snm_categories WHERE title LIKE LOWER("%'.$zoekwoord.'%") AND id NOT IN (1, 2, 3, 4, 5, 7, 10, 11) and published = 1 order by lft';
$zoekresultconn1 = $conn->query($zoekresult1);
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
								<div class="subheader-titles">
									<h2 class="subheader-maintitle">You searched for: "<?php echo $zoekwoord;?>"</h2>
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
		<!--/ Page sub-header -->

    <!-- Content section -->
    <section class="hg_section" style="background-color: #2f2e2e;">
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
                while($zoekresult = $zoekresultconn->fetch_assoc()){
                  //Decode het json object waar de images inzitten en maak ze bruikbaar voor in de Loop
                  $zoekimages = $zoekresult['images'];
                  $zoekimg = json_decode($zoekimages);
                  //Als de image niet leeg is laat dan de image zien, als hij wel leeg is laat dan een standaard image zien
                  if($zoekimg->image_intro != ''){
                    $zoekafb = 'cms/'.$zoekimg->image_intro;
                  }else{
                    $zoekafb = 'images/atlasdefault.png';
                  }

                  //Snijd de tekst af zodat er nooit meer dan 100 tekens staan, zijn er minder display dan normaal de tekst zonder ... erachter
                  $zoekshort = strip_tags($zoekresult['introtext']);
                  if (strlen($zoekshort) > 100){
      							 $catshortstripped = substr($zoekshort, 0, 100) . '...';
      						}else{
      							 $catshortstripped = $zoekshort;
      						}

                  $zoekoverzicht .= '
                  <div class="col-sm-6 col-lg-3 post">
                    <a href="'.$zoekresult['alias'].'.html" class="hoverBorder plus">
                      <span class="hoverBorderWrapper">
                        <img style="object-fit:cover;width:100%;height:200px;" src="'.$zoekafb.'" class="img-responsive" width="370" height="200" alt="" title="" />
                        <span class="theHoverBorder"></span>
                      </span>
                      <h6>Read more +</h6>
                    </a>
                    <h3 class="m_title cattitle">'.$zoekresult['title'].'</h3>
                    <h3 class="m_title"><a class="catoverzichttekst" href="'.$zoekresult['alias'].'.html">'.$catshortstripped.'</a></h3>
                  </div>';
                }
                while($zoekresult1 = $zoekresultconn1->fetch_assoc()){
                  //Decode het json object waar de images inzitten en maak ze bruikbaar voor in de Loop
                  $zoekimages1 = $zoekresult1['images'];
                  $zoekimg1 = json_decode($zoekimages1);
                  //Als de image niet leeg is laat dan de image zien, als hij wel leeg is laat dan een standaard image zien
                  if($zoekimg1->image_intro != ''){
                    $zoekafb1 = 'cms/'.$zoekimg1->image_intro;
                  }else{
                    $zoekafb1 = 'images/atlasdefault.png';
                  }

                  //Snijd de tekst af zodat er nooit meer dan 100 tekens staan, zijn er minder display dan normaal de tekst zonder ... erachter
                  $zoekshort1 = strip_tags($zoekresult1['introtext']);
                  if (strlen($zoekshort1) > 100){
      							 $catshortstripped1 = substr($zoekshort1, 0, 100) . '...';
      						}else{
      							 $catshortstripped1 = $zoekshort1;
      						}

                  $zoekoverzicht1 .= '
                  <div class="col-sm-6 col-lg-3 post" style="min-height: 360px;">
                    <a href="info/'.$zoekresult1['alias'].'.html" class="hoverBorder plus">
                      <span class="hoverBorderWrapper">
                        <img style="object-fit:cover;width:100%;height:200px;" src="'.$zoekafb1.'" class="img-responsive" width="370" height="200" alt="" title="" />
                        <span class="theHoverBorder"></span>
                      </span>
                      <h6>Read more +</h6>
                    </a>
                    <h3 class="m_title cattitle">'.$zoekresult1['title'].'</h3>
                    <h3 class="m_title"><a class="catoverzichttekst" href="'.$zoekresult1['alias'].'.html">'.$catshortstripped1.'</a></h3>
                  </div>';
                }
                // Check of het resultaat leeg is, zo niet laat het resultaat zien en anders onderstaande tekst
                if(!empty($zoekoverzicht) || !empty($zoekoverzicht1)){
                  echo $zoekoverzicht;
                  echo $zoekoverzicht1;
                }else{
                  echo 'Unfortunately, There are no search results.';
                }
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
<?
  include 'includes/footer.php';
?>
