<?PHP
require_once("../phpMailer/class.phpmailer.php");
$isValid = true;
if(isset($_POST['name']) && isset($_POST['email']) && isset($_POST['phone']) && isset($_POST['message']))
{
	$url = $_POST['url'];
	$name = $_POST['name'];
	$email = $_POST['email'];
	$phone = $_POST['phone'];
	$message = $_POST['message'];
  $captcha = $_POST['g-recaptcha-response'];
	if(!$captcha){
		$result = 'Vergeet niet de captcha in te vullen!';
		echo $result;
		exit();
	}else{
		$result = 'Bedankt voor uw bericht! Wij zullen zo spoedig mogelijk reageren.';
	}
	$subject = 'Er is een aanvraag op de website van Atlas Alpha';
	$mail = new PHPMailer;
	$mail->From = $email;
	$mail->FromName = $name;
	//mail waar je het bericht naartoe gezonden wordt
	$mail->addAddress("info@atlas-alpha.com");
	$mail->isHTML(true);
	$mail->Subject = $subject;
	$texts = 'Er is een aanvraag op de website van Atlas Alpha<br /> <br />
	<b>Naam:</b> '.$name.'<br />
	<b>E-mail adres:</b> '.$email.'<br />
	<b>Telefoonnummer:</b> '.$phone.'<br />
	<b>Vanaf:</b> '.$url.'<br />
	<b>Bericht:</b> '.$message.'<br /><br /><br />
	';



	$handtekening = '
	<table border="0" width="100%" cellspacing="0" cellpadding="0" style="font-family:calibri;color: #5C5C5C; font-size:10pt;line-height:22px;">
	<tr>
	<td width="160" valign="top" style="font-family:calibri;padding-left:10px;padding-top:20px;">
	[contents]
	</td>
	</tr>
	<tr>
	<td width="160" valign="top" style="font-family:calibri;padding-left:10px;padding-top:20px;">
	<b>Thoen en Nu Advies</b><br>
	<p></p>
	</td>
	</tr>
	</table>
	<table height="120" border="0" width="100%" cellspacing="0" cellpadding="0" style="font-family:calibri;color: #5C5C5C; font-size:10pt;line-height:22px;">
	<tr>
	<td width="250" valign="top" style="font-family:calibri;padding-left:10px;padding-top:20px;border-top: 1px #000000 dotted; border-bottom: 1px #000000 dotted;">
	E:&nbsp;&nbsp;
	<a href="mailto:hcpenning@AtlasAlpha.com" style="font-family:calibri;color: #5C5C5C; text-decoration: none; border-bottom: 1px #5C5C5C dotted;">info@atlas-alpha.com</a><br>
	T:&nbsp;&nbsp;
	<a href="tel:+610968543" style="font-family:calibri;color: #5C5C5C; text-decoration: none; border-bottom: 1px #5C5C5C dotted;">06-10968543</a><br>
	W:&nbsp;
	<a href="http://atlas-alpha.com" style="font-family:calibri;color: #5C5C5C; text-decoration: none; border-bottom: 1px #5C5C5C dotted;" target="_blank">www.atlas-alpha.com</a><br>
	</td>
	<td align="right" style="font-family:calibri;padding-right:10px;padding-top:5px;border-top: 1px #000000 dotted; border-bottom: 1px #000000 dotted;">
	<a href="http://atlas-alpha.com/index2.php" target="_blank" title="Ga naar de website">
	<img src="http://atlas-alpha.com/images/logo.jpg" alt="Ga naar de website" style="font-family:calibri;text-align:right;margin:0px;padding:10px 0 10px 0;" border="0" width="232">
	</a>
	</td>
	</tr>
	<tr>
	<td colspan="2" style="font-family:calibri;color:#a3a3a3;font-size:11px;margin-top:6px;line-height:14px;">
	<br>Dit e-mailbericht is uitsluitend bestemd voor de geadresseerde. Als dit bericht niet voor u bestemd is, wordt u vriendelijk verzocht dit aan de afzender te melden. Atlas-Alpha staat door de elektronische verzending van dit bericht niet in voor de juiste en volledige overbrenging van de inhoud, noch voor tijdige ontvangst daarvan. Voor informatie over Thoen en Nu Advies raadpleegt u <a href="http://thoen-en-nu.nl" style="font-family:calibri;color: #5C5C5C; text-decoration: none; border-bottom: 1px #5C5C5C dotted;" target="_BLANK">Atlas Alpha</a>.<br><br>
	</td>
	</tr>
	</table>';


	$contents = preg_replace('/\[contents]/',$texts, $handtekening);
	$mail->msgHTML($contents);
	$mail->AltBody = $texts;
	if(!$mail->send())
	{
		$isValid = false;
	}

	$mail = new PHPMailer;
	$mail->From = 'hcpenning@AtlasAlpha.com';
	$mail->FromName = 'Atlas Alpha';
	$mail->addAddress($email);     // Add a recipient
	$mail->isHTML(true);           // Set email format to HTML
	$mail->Subject = 'Bedankt voor uw aanvraag bij Atlas Alpha';
	$texts = 'Geachte heer/mevrouw '.$name.',<br /><br />
	Hartelijk dank voor uw aanvraag, wij zullen hier zo spoedig mogelijk op reageren.<br />
	<br>
	Met vriendelijke groet,
	';
	$contents = preg_replace('/\[contents]/',$texts, $handtekening);
	$mail->msgHTML($contents);
	$mail->AltBody = $texts;
	if(!$mail->send())
		$isValid = false;
	}
	if($isValid == true) {
		$result = 'Bedankt voor uw aanvraag! Wij nemen z.s.m. contact met u op.';
	} else {
		$result = 'Vul alle velden in!';
	}

	echo $result;
