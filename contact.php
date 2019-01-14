<?
  include 'includes/header.php';
?>
<!-- Page sub-header -->
<div id="page_header" style="height: 100px;" class="page-subheader site-subheader-cst uh_flat_dark_blue ">
  <div class="bgback"></div>

  <!-- Background image -->
    <!-- overlay -->
  <div class="kl-bg-source__bgimage" >
  </div>
    <!-- / overlay -->
  <!--/ Background image -->
  <!-- Animated Sparkles -->
  <div class="th-sparkles"></div>
  <!--/ Animated Sparkles -->

  <!-- Sub-Header content wrapper -->
  <div class="ph-content-wrap">
    <div class="ph-content-v-center">
      <div class="container">
        <div class="row">
          <!--/ col-sm-6 -->
          <div class="col-sm-12">
            <!-- Sub-header titles -->
            <!-- <div class="subheader-titles">
              <h2 class="subheader-maintitle">Contact</h2>
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


		<!-- Contact form & details section -->
		<section class="hg_section ptop-20 pbottom-80 contactbg">
			<div class="container greybackground">
				<div class="row">
					<div class="col-md-9 col-sm-9">

            <h3 class="whiteheader" style="color: #D7B740;">Contact us</h3>
						<!-- Contact form -->
            <div class="contactForm">
              <form id="contact-form" action="mail/mail_send.php" method="post" class="contact_form row contact-form" role="form">

                <p class="col-sm-12 kl-fancy-form">
                  <input type="hidden" name="url" class="form-control-url" value="<? echo $url; ?>">
                  <input type="text" name="name" class="form-control form-control-name" value="" tabindex="1" maxlength="35" required>
                  <label class="control-label">Name</label>
                </p>
                <p class="col-sm-12 kl-fancy-form">
                  <input type="text" name="email" class="form-control form-control-email h5-email" value="" tabindex="1" maxlength="35" required>
                  <label class="control-label">Emailadress</label>
                </p>
                <p class="col-sm-12 kl-fancy-form">
                  <input type="text" name="phone" class="form-control form-control-phone" value="" tabindex="1" maxlength="35" required>
                  <label class="control-label">Phone number</label>
                </p>
                <p class="col-sm-12 kl-fancy-form">
                  <textarea name="message" class="form-control form-control-message" cols="30" rows="10" tabindex="4" required></textarea>
                  <label class="control-label">Message</label>
                </p>
                <!-- Response container -->
                <div class="col-sm-12">
                  <div class="error-container"></div>
                </div>
                <!--/ Response container -->
                <!-- Google recaptcha required site-key -->
                <div class="g-recaptcha" data-sitekey="6LepgE4UAAAAABxBAjl8M1FnF4UPbh1iFjheAIH- "></div>
                <!--/ Google recaptcha required site-key -->
                <br>
                <p class="col-sm-12">
                  <button class="btn btn-fullcolor" type="submit">Send</button>
                </p>
              </form>
            </div>
					</div>
					<!--/ col-md-9 col-sm-9 -->

					<div class="col-md-3 col-sm-3 contacttext">
						<!-- Contact details -->
						<div class="text_box">
							<h3 class="text_box-title text_box-title--style3">Contact information</h3>
							<h4>Adress: <br> <b class="bold"><?echo 'Kikkerveen 157<br>3205 XA Spijkenisse<br>The Netherlands';?></b></h4>
              <h4><b class="bold"><?echo $adresshow2;?></b></h4>
							<p>
								<h4>Phone number: <a class="contacttelnummer"a href="tel:<?echo '0181-687002';?>"><?echo '0181-687002';?></a></h6>
							</p>
							<p>
								<h4>Email adress: <a class="contactwhite" href="mailto:info@atlas-alpha.com">info@atlas-alpha.com</a><br></h4>
								<h4><a href="<?echo $site;?>"><?echo $siteshow;?></a></h4>
							</p>



						</div>
						<!--/ Contact details -->
					</div>
					<!--/ col-md-3 col-sm-3 -->
				</div>
				<!--/ .row -->
			</div>
			<!--/ .container -->
		</section>
		<!--/ Contact form & details section -->

    <!-- Google maps element -->
		<div class="kl-slideshow static-content__slideshow scontent__maps" style="height: 460px; border-top: 7px solid #D7B740">
			<div class="th-google_map" style="height: 400px;">
        <iframe width="100%" height="453" frameborder="0" style="border:0"
        src="https://www.google.com/maps/embed/v1/place?q=Kikkerveen%20157,%203205%20XA%20Spijkenisse&key=AIzaSyDmiyqmawnCxoGwglzFljVbrViwTpOSI3g" allowfullscreen></iframe>
    		</div>
    		<!-- end map -->


				<!-- Content -->
					</div>
				</div>
				<!--/ Content -->
			</div>
			<!-- Google map content panel -->
		</div>
		<!--/ Google maps element -->
<?
  include 'includes/footer.php';
?>
