<?PHP
$page = 'homepage';
include 'includes/header.php';

// This Query retrieves the information for every individual slider
$slides = "
SELECT *
FROM   (SELECT cnt.id    AS content_id,
               cnt.title AS content_title,
               cnt.introtext,
               cnt.fulltext,
               cnt.ordering,
               cnt.images,
               cnt.alias,
               cnt.state,
               cnt.catid,
               f.item_id,
               cat.id    AS cat_id,
               cat.title AS cat_title,
               Max(CASE
                     WHEN f.field_id = 1 THEN f.value
                   END)  AS inslider,
               Max(CASE
                     WHEN f.field_id = 2 THEN f.value
                   END)  AS sliderquote
        FROM   snm_fields_values f
               JOIN snm_content cnt
                 ON cnt.id = f.item_id
               JOIN snm_categories cat
                 ON cnt.catid = cat.id
        WHERE  cnt.state = 1
        GROUP  BY f.item_id
        ORDER  BY f.item_id,
                  inslider) T
        WHERE  T.inslider = 'ja'";
$slidesconn = $conn->query($slides);
?>
	<!-- Slideshow - Revolution slider element -->
	<div class="kl-slideshow uh_light_gray kl-revolution-slider">
		<div class="bgback">
		</div>

		<!-- Animated Sparkles -->
		<div class="th-sparkles"></div>
		<!--/ Animated Sparkles -->

		<!-- START REVOLUTION SLIDER -->
		<div id="rev_slider_12_1_wrapper" class="rev_slider_wrapper fullscreen-container" data-alias="overexposure-transition" data-source="gallery" style="background:#00081f;padding:0px;">
			<!-- START REVOLUTION SLIDER 5.4.6.3 fullscreen mode -->
			<div id="rev_slider_12_1" class="rev_slider fullscreenbanner" style="display:none;" data-version="5.4.6.3">
				<ul>
          <?PHP
         // slider php code
          $slidenumber = 1;
          while($slides = $slidesconn->fetch_assoc()){

            if($slides['sliderquote'] != '' OR !empty($slides['sliderquote'])){
              $quote = $slides['sliderquote'];
            }else{
              $quote = $slides['content_title'];
            }

            $strippedtext = strip_tags($slides['introtext']);

            if (strlen($strippedtext) > 170){
               	$afgekort = substr($strippedtext, 0, 170) . '...';
            }else{
								$afgekort = $strippedtext;
						}

            $sliderimage = $slides['images'];
            $sliderimg = json_decode($sliderimage);

            $slider .= '<li data-index="rs-3'.$slidenumber.'" data-transition="brightnesscross" data-slotamount="default" data-hideafterloop="0" data-hideslideonmobile="off" data-easein="default" data-easeout="default" data-masterspeed="default" data-thumb="images/rev_slider_assets/100x50_exp_bg1.jpg" data-rotate="0" data-saveperformance="off" data-title="Slide" data-param1="" data-param2="" data-param3="" data-param4="" data-param5="" data-param6="" data-param7="" data-param8="" data-param9="" data-param10="" data-description="">
  					<!-- MAIN IMAGE -->
  					<img src="images/rev_slider_assets/dummy.png" alt="" data-lazyload="cms/'.$sliderimg->image_fulltext.'" data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat" data-bgparallax="6" class="rev-slidebg" data-no-retina>
  					<!-- LAYERS -->
  					<div id="rrzm_32" class="rev_row_zone rev_row_zone_middle" style="z-index: 11;">
  						<!-- LAYER NR. 1 -->
  						<div class="tp-caption rs-parallaxlevel-4" id="slide-3'.$slidenumber.'-layer-7" data-x="[\'left\',\'left\',\'left\',\'left\']" data-hoffset="[\'100\',\'100\',\'100\',\'100\']" data-y="[\'middle\',\'middle\',\'middle\',\'middle\']" data-voffset="[\'0\',\'0\',\'0\',\'0\']" data-width="none" data-height="none" data-whitespace="nowrap" data-type="row" data-columnbreak="2" data-responsive_offset="on" data-responsive="off" data-frames=\'[{"delay":10,"speed":300,"frame":"0","from":"opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"}]\' data-margintop="[0,0,0,0]" data-marginright="[0,0,0,0]" data-marginbottom="[0,0,0,0]" data-marginleft="[0,0,0,0]" data-textalign="[\'inherit\',\'inherit\',\'inherit\',\'inherit\']" data-paddingtop="[0,0,0,0]" data-paddingright="[50,50,30,30]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[50,50,30,30]" style="z-index: 5; white-space: nowrap; font-size: 20px; line-height: 22px; font-weight: 400; color: #ffffff; letter-spacing: 0px;">
  							<!-- LAYER NR. 2 -->
  							<div class="tp-caption " id="slide-3'.$slidenumber.'-layer-8" data-x="[\'left\',\'left\',\'left\',\'left\']" data-hoffset="[\'100\',\'100\',\'100\',\'100\']" data-y="[\'top\',\'top\',\'top\',\'top\']" data-voffset="[\'100\',\'100\',\'100\',\'100\']" data-width="none" data-height="none" data-whitespace="nowrap" data-type="column" data-responsive_offset="on" data-responsive="off" data-frames=\'[{"delay":"+0","speed":300,"frame":"0","from":"opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"}]\' data-columnwidth="50%" data-verticalalign="top" data-margintop="[0,0,0,0]" data-marginright="[0,0,0,0]" data-marginbottom="[0,0,0,0]" data-marginleft="[0,0,0,0]" data-textalign="[\'inherit\',\'inherit\',\'inherit\',\'inherit\']" data-paddingtop="[0,0,0,0]" data-paddingright="[20,20,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]" style="z-index: 6; width: 100%;">
  								<!-- LAYER NR. 3 -->

  								<!-- LAYER NR. 4 -->
                  <!-- Quote -->
  								<div class="tp-caption tp-resizeme" id="slide-3'.$slidenumber.'-layer-1" data-x="[\'left\',\'left\',\'left\',\'left\']" data-hoffset="[\'0\',\'50\',\'50\',\'40\']" data-y="[\'top\',\'top\',\'top\',\'top\']" data-voffset="[\'0\',\'170\',\'170\',\'167\']" data-fontsize="[\'60\',\'50\',\'40\',\'40\']" data-lineheight="[\'90\',\'75\',\'60\',\'60\']" data-letterspacing="[\'15\',\'15\',\'10\',\'7\']" data-width="[\'100%\',\'100%\',\'561\',\'401\']" data-height="none" data-whitespace="normal" data-type="text" data-responsive_offset="on" data-frames=\'[{"delay":"+290","split":"chars","splitdelay":0.05000000000000000277555756156289135105907917022705078125,"speed":2000,"split_direction":"forward","frame":"0","from":"opacity:0;","color":"#000000","to":"o:1;","ease":"Power4.easeInOut"},{"delay":"wait","speed":1000,"frame":"999","color":"transparent","to":"opacity:0;","ease":"Power3.easeInOut"}]\' data-margintop="[0,0,0,0]" data-marginright="[0,0,0,0]" data-marginbottom="[30,31,26,26]" data-marginleft="[0,0,0,0]" data-textalign="[\'inherit\',\'inherit\',\'inherit\',\'inherit\']" data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]" style="z-index: 8; min-width: 100%px; max-width: 100%px; white-space: normal; font-size: 60px; line-height: 90px; font-weight: 400; color: #ffffff; letter-spacing: 15px; display: block;font-family:Oswald;text-transform:uppercase;">
  									'.$quote.'
  								</div>
  								<!-- LAYER NR. 5 -->
  								<div class="tp-caption tp-shape tp-shapewrapper tp-resizeme" id="slide-3'.$slidenumber.'-layer-3" data-x="[\'left\',\'left\',\'left\',\'left\']" data-hoffset="[\'0\',\'53\',\'53\',\'42\']" data-y="[\'top\',\'top\',\'top\',\'top\']" data-voffset="[\'0\',\'440\',\'498\',\'373\']" data-width="50" data-height="1" data-whitespace="[\'normal\',\'nowrap\',\'nowrap\',\'nowrap\']" data-type="shape" data-responsive_offset="on" data-frames=\'[{"delay":"+1490","speed":2000,"frame":"0","from":"sX:0;opacity:0;","to":"o:1;","ease":"Power4.easeInOut"},{"delay":"wait","speed":1000,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"}]\' data-margintop="[0,0,0,0]" data-marginright="[0,0,0,0]" data-marginbottom="[0,0,0,0]" data-marginleft="[0,0,0,0]" data-textalign="[\'inherit\',\'inherit\',\'inherit\',\'inherit\']" data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]" style="z-index: 9; display: block;background-color:rgb(0,0,0);">
  								</div>
  							</div>
  							<!-- LAYER NR. 6 -->
  							<div class="tp-caption " id="slide-3'.$slidenumber.'-layer-9" data-x="[\'left\',\'left\',\'left\',\'left\']" data-hoffset="[\'100\',\'100\',\'100\',\'100\']" data-y="[\'top\',\'top\',\'top\',\'top\']" data-voffset="[\'100\',\'100\',\'100\',\'100\']" data-width="none" data-height="none" data-whitespace="nowrap" data-type="column" data-responsive_offset="on" data-responsive="off" data-frames=\'[{"delay":"+0","speed":300,"frame":"0","from":"opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"}]\' data-columnwidth="50%" data-verticalalign="top" data-margintop="[0,0,0,0]" data-marginright="[0,0,0,0]" data-marginbottom="[0,0,0,0]" data-marginleft="[0,0,0,0]" data-textalign="[\'inherit\',\'inherit\',\'inherit\',\'inherit\']" data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]" style="z-index: 10; width: 100%;">
  							</div>
  						</div>
  						<!-- LAYER NR. 7 -->
  						<div class="tp-caption rs-parallaxlevel-5" id="slide-3'.$slidenumber.'-layer-10" data-x="[\'left\',\'left\',\'left\',\'left\']" data-hoffset="[\'100\',\'100\',\'100\',\'100\']" data-y="[\'middle\',\'middle\',\'middle\',\'middle\']" data-voffset="[\'0\',\'0\',\'0\',\'0\']" data-width="none" data-height="none" data-whitespace="nowrap" data-type="row" data-columnbreak="2" data-responsive_offset="on" data-responsive="off" data-frames=\'[{"delay":10,"speed":300,"frame":"0","from":"opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"}]\' data-margintop="[0,0,0,0]" data-marginright="[0,0,0,0]" data-marginbottom="[0,0,0,0]" data-marginleft="[0,0,0,0]" data-textalign="[\'inherit\',\'inherit\',\'inherit\',\'inherit\']" data-paddingtop="[0,0,0,0]" data-paddingright="[50,50,30,30]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[50,50,30,30]" style="z-index: 11; white-space: nowrap; font-size: 20px; line-height: 22px; font-weight: 400; color: #ffffff; letter-spacing: 0px;">
  							<!-- LAYER NR. 8 -->
  							<div class="tp-caption " id="slide-3'.$slidenumber.'-layer-11" data-x="[\'left\',\'left\',\'left\',\'left\']" data-hoffset="[\'100\',\'100\',\'100\',\'100\']" data-y="[\'top\',\'top\',\'top\',\'top\']" data-voffset="[\'100\',\'100\',\'100\',\'100\']" data-width="none" data-height="none" data-whitespace="nowrap" data-type="column" data-responsive_offset="on" data-responsive="off" data-frames=\'[{"delay":"+0","speed":300,"frame":"0","from":"opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"}]\' data-columnwidth="50%" data-verticalalign="top" data-margintop="[0,0,0,0]" data-marginright="[0,0,0,0]" data-marginbottom="[0,0,0,0]" data-marginleft="[0,0,0,0]" data-textalign="[\'inherit\',\'inherit\',\'inherit\',\'inherit\']" data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]" style="z-index: 12; width: 100%;">
  							</div>
  							<!-- LAYER NR. 9 -->
  							<div class="tp-caption " id="slide-3'.$slidenumber.'-layer-12" data-x="[\'left\',\'left\',\'left\',\'left\']" data-hoffset="[\'100\',\'100\',\'100\',\'100\']" data-y="[\'top\',\'top\',\'top\',\'top\']" data-voffset="[\'100\',\'100\',\'100\',\'100\']" data-width="none" data-height="none" data-whitespace="nowrap" data-type="column" data-responsive_offset="on" data-responsive="off" data-frames=\'[{"delay":"+0","speed":300,"frame":"0","from":"opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"}]\' data-columnwidth="50%" data-verticalalign="top" data-margintop="[0,0,0,0]" data-marginright="[0,0,0,0]" data-marginbottom="[0,0,0,0]" data-marginleft="[0,0,0,0]" data-textalign="[\'inherit\',\'inherit\',\'inherit\',\'inherit\']" data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[20,20,0,0]" style="z-index: 13; width: 100%;">
  								<!-- LAYER NR. 10 -->
                  <!-- Introtext -->
  								<div class="tp-caption tp-resizeme" id="slide-3'.$slidenumber.'-layer-4" data-x="[\'left\',\'left\',\'left\',\'left\']" data-hoffset="[\'0\',\'540\',\'814\',\'633\']" data-y="[\'top\',\'top\',\'top\',\'top\']" data-voffset="[\'0\',\'440\',\'410\',\'298\']" data-fontsize="[\'15\',\'14\',\'14\',\'14\']" data-width="100%" data-height="none" data-whitespace="normal" data-type="text" data-responsive_offset="on" data-frames=\'[{"delay":"+1990","speed":2000,"frame":"0","from":"opacity:0;","color":"#ffffff","to":"o:1;","ease":"Power4.easeInOut"},{"delay":"wait","speed":1000,"frame":"999","color":"transparent","to":"opacity:0;","ease":"Power3.easeInOut"}]\' data-margintop="[0,0,40,40]" data-marginright="[0,0,0,0]" data-marginbottom="[40,40,40,40]" data-marginleft="[0,0,0,0]" data-textalign="[\'inherit\',\'inherit\',\'inherit\',\'inherit\']" data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]" style="z-index: 14; min-width: 100%px; max-width: 100%px; white-space: normal; font-size: 15px; line-height: 30px; font-weight: 400; color: #ffffff; letter-spacing: 3px; display: block;font-family:Oswald;text-transform:uppercase;text-shadow: 1px 1px #5d5d5d;">
  									'.strip_tags($afgekort).'
  								</div>
                  <a class="tp-caption rev-btn tp-resizeme" href="'.$slides['alias'].'.html" id="slide-3'.$slidenumber.'-layer-5" data-x="[\'left\',\'left\',\'left\',\'left\']" data-hoffset="[\'0\',\'540\',\'53\',\'42\']" data-y="[\'top\',\'top\',\'bottom\',\'bottom\']" data-voffset="[\'0\',\'600\',\'53\',\'42\']" data-width="none" data-height="none" data-whitespace="[\'normal\',\'nowrap\',\'nowrap\',\'nowrap\']" data-type="button" data-actions=\'\' data-responsive_offset="on" data-frames=\'[{"delay":"+1990","speed":2000,"frame":"0","from":"opacity:0;fbr:0%;","to":"o:1;fbr:100;","ease":"Power4.easeInOut"},{"delay":"wait","speed":2000,"frame":"999","to":"opacity:0;fbr:0%;","ease":"Power4.easeInOut"},{"frame":"hover","speed":"500","ease":"Power3.easeInOut","to":"o:1;rX:0;rY:0;rZ:0;z:0;fbr:90%;","style":"c:rgba(255,255,255,1);bs:solid;bw:0 0 0 0;"}]\' data-margintop="[0,0,0,0]" data-marginright="[0,0,0,0]" data-marginbottom="[0,0,0,0]" data-marginleft="[0,0,0,0]" data-textalign="[\'inherit\',\'inherit\',\'inherit\',\'inherit\']" data-paddingtop="[0,0,0,0]" data-paddingright="[50,50,50,50]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[50,50,50,50]" style="z-index: 15; white-space: normal; font-size: 15px; line-height: 60px; font-weight: 400; color: rgba(255,255,255,1); letter-spacing: 5px; display: inline-block;font-family:Oswald;text-transform:uppercase;background-color:rgb(221, 173, 31);border-color:rgba(0,0,0,1);outline:none;box-shadow:none;box-sizing:border-box;-moz-box-sizing:border-box;-webkit-box-sizing:border-box;cursor:pointer;text-decoration: none;">READ MORE </a>
  							</div>
  						</div>
  					</div>
  					</li>';
            $slidenumber++;
          }
          echo $slider;
          ?>
					<!-- SLIDE  -->
				</ul>
				<div class="tp-bannertimer tp-bottom" style="height: 10px; background: #45510d;">
				</div>
			</div>
		</div>
		<!-- END REVOLUTION SLIDER -->

		<!-- Custom css for this slider -->
		<style type="text/css">
			#rev_slider_12_1 .uranus.tparrows{width:50px; height:50px; background:rgba(255,255,255,0)}
			#rev_slider_12_1 .uranus.tparrows:before{width:50px; height:50px; line-height:50px; font-size:30px; transition:all 0.3s;-webkit-transition:all 0.3s}
			#rev_slider_12_1 .uranus.tparrows:hover:before{opacity:0.75}
		</style>
		<!-- END REVOLUTION SLIDER -->
	</div>
	<!--/ Slideshow - Revolution slider element -->
  <!-- Testimonials carousel quoter style section -->
  		<section class="hg_section bg-white pt-80 pb-50">
  			<div class="container">
  				<div class="row">
  					<div class="col-sm-12">
  						<!-- Testimonials slider quoter style -->
  						<div class="testimonial_slider__carousel-wrapper">
  							<div class="testimonial_slider__carousel js-slick" data-slick='{
  								"appendDots": ".testimonial_slider__carousel-wrapper .testimonialSlider-slickNav",
  								"arrows": false,
  								"dots": true,
  								"dotsClass": "slick-dots",
  								"infinite": true,
  								"autoplay": true,
  								"speed": 500,
  								"fade": true
  							}'>
                <?PHP
                $testimonials = 'SELECT * FROM snm_content WHERE catid = 18 AND state = 1';
                $testimonialscon = $conn->query($testimonials);
                while($testimonials = $testimonialscon->fetch_assoc()){
                  $testoverzicht .= '
                  <div class="testimonialbox biggertext">
  									<div class="thead">
  										<span class="who"><strong>'.$testimonials['title'].'</strong> '.$testimonials['introtext'].'</span>
  									</div>
  									<div class="tcontent">
  										<p>'.strip_tags($testimonials['fulltext']).'</p>
  									</div>
  								</div>';
                }
                echo $testoverzicht;
                ?>
  							</div>
  							<!--/ .testimonial_slider__carousel .js-slick -->

  							<!-- Slick navigation -->
  							<div class="testimonialSlider-slickNav clearfix"></div>
  						</div>
  						<!-- //textimonial slider - quoter style -->
  					</div>
  					<!--/ col-sm-12 -->
  				</div>
  				<!--/ row -->
  			</div>
  			<!--/ container -->
  		</section>
  		<!--/ Testimonials carousel quoter style section -->
      <section class="hg_section4">
      			<div class="container">
      				<div class="onderline">
      							<div class="col-md-12 col-sm-12">
      					<h2 class="fs-xl reset-line-height fw-normal mb-50" style="text-align: center; color: white;"><strong>4 Steps</strong> <font class="kleur2">//</font> This is how your order is completed</h2>
      								<div class="row">
      									<div class="col-sm-12">
      										<div class="row gutter-md">
      											<div class="col-sm-3">
      												<!-- Stepx box element #2 (First Go box) -->
      												<div class="gobox gobox-first ">
      													<!-- Content -->
      													<div class="gobox-content">
      														<!-- Title -->
      														<h4>Smart buying in factory</h4>
      														<!--/ Title -->

      														<!-- Description -->
      												<p>
      													We make sure you get the best products which you pay for.
      												</p>
      												<!--/ Description -->
      											</div>
      											<!--/ Content -->
      										</div>
      										<!--/ Stepx box element #2 (First Go box) -->
      									</div>
      									<!--/ col-sm-4 -->

      									<div class="col-sm-3">
      										<!-- Stepx box #2 (Second Go box) -->
      										<div class="gobox ">
      											<!-- Content -->
      											<div class="gobox-content">
      												<!-- Title -->
      												<h4>Transportation</h4>
      												<!--/ Title -->

      												<!-- Description -->
      												<p>
       													Our transportation is always on time and in the most efficient way possible.
      												</p>
      												<!--/ Description -->
      											</div>
      											<!--/ Content -->
      										</div>
      										<!--/ Stepx box #2 (Second Go box) -->
      									</div>
      									<!--/ col-sm-4 -->

      									<div class="col-sm-3">
      										<!-- Stepx box #2 (Second Go box) -->
      										<div class="gobox ">
      											<!-- Content -->
      											<div class="gobox-content">
      												<!-- Title -->
      												<h4>Import and Permits</h4>
      												<!--/ Title -->

      												<!-- Description -->
      												<p>
      													 The importing and permits are well taken care off by us.
      												</p>
      												<!--/ Description -->
      											</div>
      											<!--/ Content -->
      										</div>
      										<!--/ Stepx box #2 (Second Go box) -->
      									</div>
      									<!--/ col-sm-4 -->

      									<div class="col-sm-3">
      										<!-- Stepx box #2 (Last Go box) -->
      										<div class="gobox ok gobox-last">

      											<!-- Content -->
      											<div class="gobox-content">
      												<!-- Title -->
      												<h4>Delivery</h4>
      												<!--/ Title -->

      												<!-- Description -->
      												<p>
                                The ordered products are delivered to your home for a small fee.
      												</p>
      												<!--/ Description -->
      											</div>
      											<!--/ Content -->
      										</div>
      										<!--/ Stepx box #2 (Last Go box) -->
      									</div>
      									<!--/ col-sm-4 -->
      								</div>
      								<!--/ row gutter-md -->
      							</div>
      							<!--/ col-sm-12 -->
      						</div>
      						<!--/ row -->
      					</div>
      					<!--/ col-md-12 col-sm-12 -->
      				</div>
      				<!--/ row -->
      			<!--/ container -->
      		</div>
      	</div>
      		</section>
    <section class="hg_section3">
  			<div class="container">
  				<div class="row">
  					<div class="col-md-12">
  						<h2 class="fs-xl reset-line-height fw-normal mb-50" style="text-align: center; color: white;"><strong>Import</strong> <font class="kleur2">//</font> Our product range</h2>
  						<div class="latest_posts default-style">
  							<div class="row">
  								<?
                  //Catagorie lijst
  								$categ = "
                  SELECT * FROM snm_categories WHERE id NOT IN (1, 2, 3, 4, 5, 7, 16, 17, 18, 19, 20, 21, 22, 23)";
  								// hiermee connect je naar de database
  								$categconn = $conn->query($categ);

  								while($categ = $categconn->fetch_assoc()) {

  									$categimage = $categ['params'];
  									$catpad = json_decode($categimage);

  									if($catpad->image != ''){
  										$catimg = 'cms/'.$catpad->image;
  									}else{
  										$catimg = 'images/atlastdefault.png';
  									}

  										$categorie .= '
  										<div class="col-sm-6 col-lg-3 post">
  											<a href="info/'.$categ['alias'].'.html" class="hoverBorder plus ">
  												<span class="hoverBorderWrapper">
  													<img style="object-fit:cover;width:400px;height:200px;" src="'.$catimg.'" class="img-responsive" width="300" height="200" alt="" title="" />

  													<span class="theHoverBorder"></span>
  												</span>

  												<h6>'.$categ['title'].'</h6>
  											</a>

  											<a href="info/'.$categ['alias'].'.html"></a>
  										</div>
                      ';
  								}

  						echo $categorie;
            ?>
            	<h2 class="fs-xl reset-line-height fw-normal mb-50" style="text-align: center; color: white;"><strong>Shipping</strong> <font class="kleur2">//</font> The way we get your products</h2>
            <?
              $categ2 = "
              SELECT * FROM snm_categories WHERE id NOT IN (1, 2, 3, 4, 5, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19)";
              // hiermee connect je naar de database
              $categconn = $conn->query($categ2);

              while($categ2 = $categconn->fetch_assoc()) {

                $categimage = $categ2['params'];
                $catpad = json_decode($categimage);

                if($catpad->image != ''){
                  $catimg = 'cms/'.$catpad->image;
                }else{
                  $catimg = 'images/atlasdefault.png';
                }
              $categorie2 .= '
              <div class="col-sm-6 col-lg-3 post">
                <a href="info/'.$categ2['alias'].'.html" class="hoverBorder plus ">
                  <span class="hoverBorderWrapper">
                    <img style="object-fit:cover;width:400px;height:200px;" src="'.$catimg.'" class="img-responsive" width="300" height="200" alt="" title="" />

                    <span class="theHoverBorder"></span>
                  </span>

                  <h6>'.$categ2['title'].'</h6>
                </a>

                <a href="info/'.$categ2['alias'].'.html"></a>
              </div>
              ';
          }

      echo $categorie2;

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
      <!-- Accordions section with custom paddings and white background -->
      		<section class="hg_section bg-white ptop-10 pbottom-30 questions">
            <div class="container">
              <div class="row">
                <div class="col-sm-0 col-md-12">
                  <div class="custom mr-20 mb-sm-30">
                    <h2 class="fs-xl reset-line-height fw-normal mb-50" style="text-align: center; color: white;"><strong>Got questions?</strong> <font class="kleur2">//</font> Feel free to ask us anything</h2>
                    <br>
                  </div>
                </div>
              </div>
            </div>
      			<div class="container">
      				<div class="row">
      					<div class="col-md-12 col-sm-12">
      						<!-- Accordions element style 3 -->
      						<div class="hg_accordion_element style3">
      							<!-- Accordions wrapper -->
      							<div class="th-accordion">
                      <?php
                      $faqs = 'SELECT * FROM snm_content WHERE catid = 16 AND state = 1 ORDER BY ORDERING';
                      $faqsconn = $conn->query($faqs);
                      $loopid = 1;

                      while($faqs = $faqsconn->fetch_assoc()) {
                        if($loopid == 1) {
                          $in = 'in';
                          $expanded = 'aria-expanded="true"';
                          $collapsed = "";

                        }else {
                          $collapsed = "collapsed";
                          $expanded = "";
                          $in = "";
                        }
                        // Hier zorg je ervoor dat iets opent of dicht doet als jer erop klikt
                        $faqsoverzicht .= '
                        <div class="acc-group">
                          <a data-toggle="collapse" data-target="#acc'.$loopid.'" class="'.$collapsed.'"<span class="acc-icon">'.$faqs['title'].'</span></a>
                          <div id="acc'.$loopid.'" class="collapse '.$in.'" '.$expanded.'>
                            <div class="content">
                            '.strip_tags($faqs['introtext']).'
                            </div>
                          </div>
                        </div>
                        ';

                        $loopid++;

                        }
                        echo $faqsoverzicht;
                        ?>
      							</div>
      							<!--/ Accordions wrapper -->
      						</div>
      						<!--/ Accordions element style 3 -->
      					</div>
      					<!--/ col-md-12 col-sm-12 -->
      				</div>
      				<!--/ row -->
      			</div>
      			<!--/ container -->
      		</section>




<?PHP
include 'includes/footer.php';
?>
