;(function($){
	"use strict";

	$(document).ready(function() {
		/*-------------------------------------------------*/
		/* =  Product Contact Form
		/*-------------------------------------------------*/
		$('#contact-form').submit(function(){
				var $form = $(this),
				 $error = $form.find('.error-container'),
				 action  = $form.attr('action');

				 $error.slideUp(750, function() {
				 $error.hide();

				 var $url = $form.find('.form-control-url'),
				 	$name = $form.find('.form-control-name'),
					$email = $form.find('.form-control-email'),
					$phone = $form.find('.form-control-phone'),
					$message = $form.find('.form-control-message');
					var token = grecaptcha.getResponse();

				 $.post(action, {
					 	 url: $url.val(),
						 name: $name.val(),
						 email: $email.val(),
						 phone: $phone.val(),
						 message: $message.val(),
						 'g-recaptcha-response': token
					},
					function(data){
						$error.html(data);
						$error.slideDown('slow');
						$url.val('');
						$name.val('');
						$email.val('');
						$phone.val('');
					}
				 );

				});

				return false;

			});

	});// end of document ready

})(jQuery);
