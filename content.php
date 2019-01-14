<?
  include 'includes/header.php';

  $imagealias = $_GET['alias'];
  //Query voor alles uit een artikel
  $content = '
  SELECT cnt.id as content_id,
  cnt.title as content_title,
  cnt.introtext,
  cnt.fulltext,
  cnt.images,
  cnt.alias as content_alias,
  cnt.state,
  cnt.ordering,
  cnt.catid,
  cat.id as cat_id,
  cat.title as cat_title,
  cat.description,
  cat.params,
  cat.alias as cat_alias,
  cat.lft,
  cat.parent_id
  FROM snm_content cnt
  JOIN snm_categories cat
  ON cnt.catid = cat.id
  WHERE cnt.state = 1
  AND cnt.alias = "'.$conn->real_escape_string($_GET['alias']).'"
  ORDER BY cnt.ordering';
  $contentconn = $conn->query($content);
  $content = $contentconn->fetch_assoc();

  if($content['parent_id'] == 10){
    //Query voor de velden van een project
    $project = '
    select
    cnt.id, cnt.title, cnt.introtext, cnt.fulltext, cnt.ordering, cnt.images, cnt.alias, cnt.state, f.item_id,
    max(case when f.field_id = 2 then f.value end) as opdrachtgever,
    max(case when f.field_id = 3 then f.value end) as locatie,
    max(case when f.field_id = 4 then f.value end) as omschrijving
    from snm_fields_values f
    join snm_content cnt
    on cnt.id = f.item_id
    where cnt.state = 1
    and cnt.catid = "'.$conn->real_escape_string($content['catid']).'"
    group by f.item_id
    order by f.item_id, opdrachtgever, locatie, omschrijving';
    $projectcon = $conn->query($project);
    $project = $projectcon->fetch_assoc();
  }
?>


		<!-- Page sub-header -->
		<div id="page_header" class="page-subheader site-subheader-cst">
			<div class="bgback"></div>
			<!-- Sub-Header content wrapper -->
			<div class="ph-content-wrap">
				<div class="ph-content-v-center">
					<div class="container">
						<div class="row">


							<div class="col-sm-12">
								<!-- Sub-header titles -->
								<div class="subheader-titles">
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
                  // het balkje boven de content met de breadcrumbs
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
                  WHERE cat.id = '.$conn->real_escape_string($content['catid']).'';
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
                    <li><a href="<? echo $content['content_alias']?>.html"><? echo $content['content_title'] ?></a></li>
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

		<!-- Blog post page content -->
    <section class="hg_section ptop-50 bg-white">
			<div class="container">
				<div class="row">
          <div class="col-md-3 col-sm-12">
            <!-- Content Image -->
            <?PHP
            $contentimage = $content['images'];
            $contentimg = json_decode($contentimage);

            if($contentimg->image_intro != ''){
              $imagecontent = 'cms/'.$contentimg->image_intro;
              $imagedisplay = '
              <div id="contentimage" class="contentimagewrapper pull-right hoverBorder">
                <a href="'.$imagecontent.'">
                  <span class="hoverBorderWrapper" data-src="'.$imagecontent.'">
                    <img class="contentimage" src="'.$imagecontent.'">
                    <span class="theHoverBorder"></span>
                  </span>
                </a>
              </div>';
            } else{
              $imagedisplay = '';
            }
            echo $imagedisplay;
            ?>


            <!--/ Content Image -->
						<!-- Sidebar -->
						<div id="sidebar-widget" class="sidebar">
							<!-- Sidebar widget featured post -->
							<div class="widget widget_recent_entries">
								<div class="latest_posts style3">
                  <?PHP
                  if(!empty($project)){
                    $projectdetails = '
                    <h3 class="widgettitle title">Projectdetails:</h3>
                      <div class="projectblok">
                        <ul>
                          <li><span>Opdrachtgever:</span> '.$project['opdrachtgever'].'</li>
                          <li><span>Locatie:</span> '.$project['locatie'].'</li>
                          <li><span>Omschrijving:</span> '.$project['omschrijving'].'</li>
                        </ul>
                      </div>';
                    echo $projectdetails;
                  }else{
                    $projectdetails = '';
                  }
                  ?>
									<!-- Widget title -->
									<h3 class="widgettitle title">More:</h3>
									<!--/ Widget title -->

									<!-- Posts -->
									<ul class="posts">
                    <?PHP
                    $sidemenu = 'SELECT * FROM snm_content WHERE catid = "'.$conn->real_escape_string($content['catid']).'" ORDER BY ordering';
                    $sidemenucon = $conn->query($sidemenu);
                    while($sidemenu = $sidemenucon->fetch_assoc()){
                      $sidemenuimage = $sidemenu['images'];
                      $sidemenuimg = json_decode($sidemenuimage);


                      if (strlen($sidemenu['title']) > 25){
    	                   $shorttitle = substr($sidemenu['title'], 0, 25) . '...';
    	                }else{
    										 $shorttitle = $sidemenu['title'];
    									}


                      if($sidemenuimg->image_intro != ''){
                        $explodedsideimg = explode('.', $sidemenuimg->image_intro);
                        $sideimage = 'cms/'.$sidemenuimg->image_intro;
                      }else{
                        $sideimage = 'images/atlasdefault.png';
                      }

                      if($sidemenu['alias'] == $_GET['alias']){
                        $sideactive = 'sideactive';
                        $sidetitle = '';
                      }else{
                        $sideactive = '';
                        $sidetitle = 'sidetitlenotactive';
                      }

                      $sidemenulist .= '
                      <a href="'.$sidemenu['alias'].'.html">
                        <li class="lp-post '.$sideactive.'">
    											<span class="hoverBorder pull-left">
    												<span class="hoverBorderWrapper">
    													<img class="sideimg" src="'.$sideimage.'" alt="'.$sidemenu['title'].'">
    													<span class="theHoverBorder"></span>
    												</span>
    											</span>
    											<h4 class="title sidebartitle '.$sidetitle.'">'.$sidemenu['title'].'</h4>
                          <div class="lp-post-comments-num">
    												<span class="greylink" >More info</span>
    											</div>
    										</li>
                      </a>';
                    }
                    echo $sidemenulist;
                    ?>
									</ul>
									<!--/ Posts -->
								</div>
							</div>
							<!--/ Sidebar widget featured post -->
						</div>
						<!--/ Sidebar -->
					</div>
					<!--/ col-md-3 col-sm-3 -->
				  <div class="col-md-5 col-sm-12">
						<!-- Post content -->
						<div id="th-content-post">
							<!-- Post div wrapper -->
							<div>
								<!-- Post page title -->
								<h1 class="page-title white"><?PHP echo $content['content_title'] ?></h1>
								<!--/ Post page title -->

								<!-- Post layout -->
								<div class="itemView clearfix eBlog">

									<!-- Post body -->
									<div class="itemBody">


										<!-- Blog Content -->
										<?PHP
                    $introtext = str_replace('images/', 'cms/images/', $content['introtext']);
                    echo $introtext;
                    ?>
										<!--/ Blog Content -->
									</div>
									<!--/ Post body -->
								</div>
								<!--/ Post layout -->
							</div>
							<!--/ Post div wrapper -->
						</div>
						<!--/ Post content -->
					</div>
					<!--/ col-md-9 col-sm-9 -->
          <div class="col-md-4 col-sm-4">
    						<!-- Sidebar element -->
    						<div id="sidebar-widget" class="sidebar">
                  <div class="widget widget_meta" style="margin-bottom:15px;">

    							</div>
    							<!-- Archive widget -->
                  <div class="contactForm">
                    <!-- CONTACT FROM -->
                    <div>
                      <p class="contentformtitle">More information about <?PHP echo $content['content_title'] ?>? <font class="kleur2">//</font> Feel free to ask!</p>
                    </div>
                    <form id="contact-form" action="mail/mail_send.php" method="post" class="contact_form row contact-form" role="form">

                      <p class="col-sm-12 kl-fancy-form">
                        <input type="hidden" name="url" class="form-control-url" value="<? echo $url; ?>">
                        <input type="text" name="name" class="form-control form-control-name" value="" tabindex="1" maxlength="35" required>
                        <label class="control-label">*Name</label>
                      </p>
                      <p class="col-sm-12 kl-fancy-form">
                        <input type="text" name="email" class="form-control form-control-email h5-email" value="" tabindex="1" maxlength="35" required>
                        <label class="control-label">*E-mail adress</label>
                      </p>
                      <p class="col-sm-12 kl-fancy-form">
                        <input type="text" name="phone" class="form-control form-control-phone" value="" tabindex="1" maxlength="35" required>
                        <label class="control-label">*Phone number</label>
                      </p>
                      <p class="col-sm-12 kl-fancy-form">
                        <textarea name="message" class="form-control form-control-message" required cols="30" rows="10" tabindex="4"></textarea>
                        <label class="control-label">*Message</label>
                      </p>


                      <!-- Google recaptcha required site-key -->
                    <div class="g-recaptcha" data-sitekey="6LepgE4UAAAAABxBAjl8M1FnF4UPbh1iFjheAIH-"></div>
                    <!--/ Google recaptcha required site-key -->

                      <br>
                      <br>
                      <div class="col-sm-12">
                        <div class="error-container"></div>
                      </div>

                      <p class="col-sm-12" style="color: #cccccc" >
                        <button class="btn btn-fullcolor" type="submit">Send</button>
                      </p>
                    </form>
                  </div>
    							<!-- Archive widget -->
    							<!--/ Meta widget -->
    						</div>
    						<!--/ Sidebar element -->
    					</div>
              <!--/ col-md-4 col-sm-4 -->
    				</div>
    				<!--/ row -->
    			</div>
    			<!--/ container -->
    		</section>
    		<!--/ Blog post page content -->
    <?PHP
      include 'includes/footer.php';
    ?>
