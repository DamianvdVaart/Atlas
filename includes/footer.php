<footer id="footer" data-footer-style="3">
	<div class="container-fluid">
		<div class="row">
			<div class="col-sm-12">
				<div class="bottom clearfix">
					<!-- social-icons -->
					<ul class="social-icons sc--clean clearfix paddingfooter">
            <li class="title"><a class="footertext" href="contact.php">CONTACT</a></li>
            <li class="title"><a class="footertext" href="contact.php">QUOTE</a></li>
					</ul>
					<!--/ social-icons -->

					<!-- copyright -->
					<div class="copyright">
						<a href="index2.php">
							<img src="images/logo2.png" alt="Atlas Alpha" title="Atlas Alpha" class="footerlogo">
						</a>
						<p class="paddingfooter">© <? echo date('Y'); ?> All rights reserved. </p>
					</div>
					<!--/ copyright -->
				</div>
				<!--/ bottom -->
			</div>
			<!--/ col-sm-12 -->
		</div>
		<!--/ row -->
	</div>
	<!--/ container -->
	<div class="container-fluid onderstebalk">
		<div class="row">
			<div class="col-sm-12">
				<div class="bottom clearfix">

					<!-- copyright -->
					<div class="copyright" >
						<a target="_blank" href="https://www.studionewmedia.nl">
							<img class="snmlogo" src="images/StudioNewMedia_white.png" alt="Studio NewMedia B.V." title="Studio NewMedia B.V.">
						</a>
					</div>
					<!--/ copyright -->
				</div>
				<!--/ bottom -->
			</div>
			<!--/ col-sm-12 -->
		</div>
		<!--/ row -->
	</div>
</footer>
</div>
<!--/ Page Wrapper -->
<!-- ToTop trigger -->
<a href="#" id="totop">UP</a>
<!--/ ToTop trigger -->





<!-- JS FILES // These should be loaded in every page -->
<script src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/kl-plugins.js"></script>

<script src="https://www.google.com/recaptcha/api.js?hl=en" async defer></script>

<!-- Lightgallery bestanden -->
<script src="https://cdn.jsdelivr.net/combine/npm/lightgallery,npm/lg-autoplay,npm/lg-fullscreen,npm/lg-thumbnail,npm/lg-video,npm/lg-zoom"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-mousewheel/3.1.13/jquery.mousewheel.min.js"></script>

<!-- JS FILES // Loaded on this page -->
<!-- Required js scripts files for Revolution Slider element -->
<script type="text/javascript" src="js/plugins/_sliders/revolution-slider/jquery.themepunch.tools.min.js"></script>
<script type="text/javascript" src="js/plugins/_sliders/revolution-slider/jquery.themepunch.revolution.min.js"></script>

<script src="//cdn.rawgit.com/noelboss/featherlight/1.7.12/release/featherlight.min.js" type="text/javascript" charset="utf-8"></script>
<?php
if($page == 'homepage'){
?>
<!-- Required js trigger for Revolution Slider element -->
	<script type="text/javascript">
		function setREVStartSize(e) {
			try {
				var i = jQuery(window).width(),
					t = 9999,
					r = 0,
					n = 0,
					l = 0,
					f = 0,
					s = 0,
					h = 0;
				if (e.responsiveLevels && (jQuery.each(e.responsiveLevels, function(e, f) {
						f > i && (t = r = f, l = e), i > f && f > r && (r = f, n = e)
					}), t > r && (l = n)), f = e.gridheight[l] || e.gridheight[0] || e.gridheight, s = e.gridwidth[l] || e.gridwidth[0] || e.gridwidth, h = i / s, h = h > 1 ? 1 : h, f = Math.round(h * f), "fullscreen" == e.sliderLayout) {
					var u = (e.c.width(), jQuery(window).height());
					if (void 0 != e.fullScreenOffsetContainer) {
						var c = e.fullScreenOffsetContainer.split(",");
						if (c) jQuery.each(c, function(e, i) {
							u = jQuery(i).length > 0 ? u - jQuery(i).outerHeight(!0) : u
						}), e.fullScreenOffset.split("%").length > 1 && void 0 != e.fullScreenOffset && e.fullScreenOffset.length > 0 ? u -= jQuery(window).height() * parseInt(e.fullScreenOffset, 0) / 100 : void 0 != e.fullScreenOffset && e.fullScreenOffset.length > 0 && (u -= parseInt(e.fullScreenOffset, 0))
					}
					f = u
				} else void 0 != e.minHeight && f < e.minHeight && (f = e.minHeight);
				e.c.closest(".rev_slider_wrapper").css({
					height: f
				})
			} catch (d) {
				console.log("Failure at Presize of Slider:" + d)
			}
		};
	</script>
	<script type="text/javascript">
		var revapi12,
		tpj = jQuery;
		tpj(document).ready(function() {
			if (tpj("#rev_slider_12_1").revolution == undefined) {
				revslider_showDoubleJqueryError("#rev_slider_12_1");
			} else {
				revapi12 = tpj("#rev_slider_12_1").show().revolution({
					sliderType: "standard",
					// jsFileLocation: "//kallyas-template.net/visual_slider_builder/revslider/public/assets/js/",
					sliderLayout: "fullscreen",
					dottedOverlay: "none",
					delay: 12000,
					particles: {
						startSlide: "first",
						endSlide: "last",
						zIndex: "1",
						particles: {
							number: {
								value: 300
							},
							color: {
									value: "#ffffff"
							},
							shape: {
								type: "circle",
								stroke: {
									width: 0,
									color: "#ffffff",
									opacity: 1
								},
								image: {
									src: ""
								}
							},
							opacity: {
								value: 0.75,
								random: true,
								min: 0.25,
								anim: {
									enable: false,
									speed: 3,
									opacity_min: 0,
									sync: false
								}
							},
							size: {
								value: 2,
								random: true,
								min: 0.5,
								anim: {
									enable: false,
									speed: 40,
									size_min: 1,
									sync: false
								}
							},
							line_linked: {
								enable: false,
								distance: 150,
								color: "#ffffff",
								opacity: 0.4,
								width: 1
							},
							move: {
								enable: true,
								speed: 0.01,
								direction: "right",
								random: true,
								min_speed: 0.00000001,
								straight: true,
								out_mode: "out"
							}
						},
						interactivity: {
							events: {
								onhover: {
									enable: false,
									mode: "repulse"
								},
								onclick: {
									enable: false,
									mode: "repulse"
								}
							},
							modes: {
								grab: {
									distance: 400,
									line_linked: {
										opacity: 0.5
									}
								},
								bubble: {
									distance: 400,
									size: 40,
									opacity: 0.4
								},
								repulse: {
									distance: 200
								}
							}
						}
					},
					navigation: {
						keyboardNavigation: "off",
						keyboard_direction: "horizontal",
						mouseScrollNavigation: "off",
						mouseScrollReverse: "default",
						onHoverStop: "off",
						arrows: {
							style: "uranus",
							enable: true,
							hide_onmobile: false,
							hide_onleave: false,
							tmp: '',
							left: {
								h_align: "right",
								v_align: "bottom",
								h_offset: 60,
								v_offset: 10
							},
							right: {
								h_align: "right",
								v_align: "bottom",
								h_offset: 10,
								v_offset: 10
							}
						}
					},
					responsiveLevels: [1240, 1024, 778, 480],
					visibilityLevels: [1240, 1024, 778, 480],
					gridwidth: [1240, 1024, 778, 480],
					gridheight: [868, 768, 960, 720],
					lazyType: "smart",
					parallax: {
						type: "scroll",
						origo: "slidercenter",
						speed: 400,
						speedbg: 1500,
						speedls: 1000,
						levels: [5, 10, 15, 20, 25, 30, 35, 40, 60, 46, -10, -15, -20, -25, -30, 55],
					},
					shadow: 0,
					spinner: "off",
					stopLoop: "off",
					stopAfterLoops: -1,
					stopAtSlide: -1,
					shuffle: "off",
					autoHeight: "off",
					fullScreenAutoWidth: "off",
					fullScreenAlignForce: "off",
					fullScreenOffsetContainer: "",
					fullScreenOffset: "",
					hideThumbsOnMobile: "off",
					hideSliderAtLimit: 0,
					hideCaptionAtLimit: 0,
					hideAllCaptionAtLilmit: 0,
					debugMode: false,
					fallbacks: {
						simplifyAll: "off",
						nextSlideOnWindowFocus: "off",
						disableFocusListener: false,
					}
				});
			}

			RsParticlesAddOn(revapi12);
		}); /*ready*/
	</script>

	<script type="text/javascript" src="js/plugins/_sliders/slick/slick.js"></script>

	<!-- Required js trigger for Partners & Testimonials elements -->
	<script type="text/javascript" src="js/trigger/kl-slick-slider.js"></script>
<?PHP
}
if($page == 'contact'){
?>
<!-- JS FILES // Loaded on this page -->
<!-- Required js scripts files for Google Maps element -->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA0o13wnCMLdZdjlEZgK40yH8vY5ELzA9U"></script>
<script type="text/javascript" src="js/plugins/jquery.gmap.min.js"></script>

<!-- Required js trigger for Google Maps element -->
<script type="text/javascript" src="js/trigger/kl-google-maps-style2.js"></script>
<?PHP
}
?>
<script type="text/javascript" src="js/kl-scripts.js"></script>

<!-- Custom user JS codes -->
<script type="text/javascript" src="js/kl-custom.js"></script>


<script type="text/javascript">
jQuery(document).ready(function() {
	//Lightgallery van een contentimage
  jQuery('#contentimage').lightGallery({
  selector: '.hoverBorderWrapper'
  });
	//Lightgallery van de gallerij onderop de contentpage
	jQuery('#contentgallery').lightGallery({
  selector: '.lightgallerytrigger'
  });
});
</script>
</body>
</html>
