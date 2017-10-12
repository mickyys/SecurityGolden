<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'src/Exception.php';
require 'src/PHPMailer.php';
require 'src/SMTP.php';

//require 'vendor/autoload.php';

$mail = new PHPMailer(true);                              // Passing `true` enables exceptions

try {
	
	$nombre = $_POST["contacts-name"];
	$correo = $_POST["contacts-email"];
	$fono = $_POST["contacts-fono"];
	$mensaje = $_POST["contacts-message"];

	
	if($nombre == "" || $correo == "" || $fono == "" || $mensaje == "")
	{
		$status = array('status' => 501, 'error' => 'Debe completar los datos del formulario');
		echo json_encode($status);
		exit;
	}	
	
	$html = '
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<title>Contacto | Security Golden</title>
		<style type="text/css">
			#outlook a{padding:0;} /* Force Outlook to provide a "view in browser" button. */
			body{width:100% !important; margin:0;} 
			body{-webkit-text-size-adjust:none;} /* Prevent Webkit platforms from changing default text sizes. */
			body{margin:0; padding:0;}
			img{border:0; height:auto; line-height:100%; outline:none; text-decoration:none;}
			table td{border-collapse:collapse;}
			#backgroundTable{height:100% !important; margin:0; padding:0; width:100% !important;}
			@import url(http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700); /* Loading Open Sans Google font */ 
			body, #backgroundTable{ background-color:#FFF; }
			.TopbarLogo{
			padding:10px;
			text-align:left;
			vertical-align:middle;
			}
			h1, .h1{
			color:#444444;
			display:block;
			font-family:Open Sans;
			font-size:35px;
			font-weight: 400;
			line-height:100%;
			margin-top:2%;
			margin-right:0;
			margin-bottom:1%;
			margin-left:0;
			text-align:left;
			}
			h2, .h2{
			color:#444444;
			display:block;
			font-family:Open Sans;
			font-size:30px;
			font-weight: 400;
			line-height:100%;
			margin-top:2%;
			margin-right:0;
			margin-bottom:1%;
			margin-left:0;
			text-align:left;
			}
			h3, .h3{
			color:#444444;
			display:block;
			font-family:Open Sans;
			font-size:24px;
			font-weight:400;
			margin-top:2%;
			margin-right:0;
			margin-bottom:1%;
			margin-left:0;
			text-align:left;
			}
			h4, .h4{
			color:#444444;
			display:block;
			font-family:Open Sans;
			font-size:18px;
			font-weight:400;
			line-height:100%;
			margin-top:2%;
			margin-right:0;
			margin-bottom:1%;
			margin-left:0;
			text-align:left;
			}
			h5, .h5{
			color:#444444;
			display:block;
			font-family:Open Sans;
			font-size:14px;
			font-weight:400;
			line-height:100%;
			margin-top:2%;
			margin-right:0;
			margin-bottom:1%;
			margin-left:0;
			text-align:left;
			}
			.textdark { 
			color: #444444;
			font-family: Open Sans;
			font-size: 13px;
			line-height: 150%;
			text-align: left;
			}
			.textwhite { 
			color: #fff;
			font-family: Open Sans;
			font-size: 13px;
			line-height: 150%;
			text-align: left;
			}
			.fontwhite { color:#fff; }
			.btn {
			background-color: #e5e5e5;
			background-image: none;
			filter: none;
			border: 0;
			box-shadow: none;
			padding: 7px 14px; 
			text-shadow: none;
			font-family: "Segoe UI", Helvetica, Arial, sans-serif;
			font-size: 14px;  
			color: #333333;
			cursor: pointer;
			outline: none;
			-webkit-border-radius: 0 !important;
			-moz-border-radius: 0 !important;
			border-radius: 0 !important;
			}
			.btn:hover, 
			.btn:focus, 
			.btn:active,
			.btn.active,
			.btn[disabled],
			.btn.disabled {  
			font-family: "Segoe UI", Helvetica, Arial, sans-serif;
			color: #333333;
			box-shadow: none;
			background-color: #d8d8d8;
			}
			.btn.red {
			color: white;
			text-shadow: none;
			background-color: #d84a38;
			}
			.btn.red:hover, 
			.btn.red:focus, 
			.btn.red:active, 
			.btn.red.active,
			.btn.red[disabled], 
			.btn.red.disabled {    
			background-color: #bb2413 !important;
			color: #fff !important;
			}
			.btn.green {
			color: white;
			text-shadow: none; 
			background-color: #35aa47;
			}
			.btn.green:hover, 
			.btn.green:focus, 
			.btn.green:active, 
			.btn.green.active,
			.btn.green.disabled, 
			.btn.green[disabled]{ 
			background-color: #1d943b !important;
			color: #fff !important;
			}
		</style>
	</head>
	<body>
		<table border="0" cellpadding="0" cellspacing="0" width="100%" style="background-color:#ddb200; height:52px;">
			<tr>
				<td align="center">
					<center>
						<table border="0" cellpadding="0" cellspacing="0" width="600px" style="height:100%;">
							<tr>
								<td align="left" valign="middle" style="padding-left:20px;">
									<a href="www.securitygolden.cl/index.html" target="_blank">
									<img src="http://www.securitygolden.cl/assets/frontend/layout/img/logos/SecurityGolden4.png" width="86px" height="14px" alt="Security Golden"/>
									</a>
								</td>
							</tr>
						</table>
					</center>
				</td>
			</tr>
		</table>
		<table border="0" cellpadding="0" cellspacing="0" width="100%">
			<tr>
				<td style="padding-bottom:20px;">
					<center>
						<table border="0" cellpadding="0" cellspacing="0" width="600px" style="height:100%;">
							<tr>
								<td valign="top" class="bodyContent">
									<table border="0" cellpadding="20" cellspacing="0" width="100%">
										<tr>
											<td valign="top">
												<h2 class="h2">Contacto</h2>
												<br />
												<div class="textdark">
													Estimad@ '.ucwords($nombre).', Gracias por comunicarse con nosotros a traves de nuestro formulario de contacto. A la brevedad nuestro equipo de comunicaciones se contactara con usted.  
												</div>
											</td>
										</tr>
									</table>
								</td>
							</tr>
						</table>
					</center>
				</td>
			</tr>
		</table>
		<table border="0" cellpadding="0" cellspacing="0" width="100%" style="background-color:#f8f8f8;border-top:1px solid #e7e7e7;border-bottom:1px solid #e7e7e7;">
			<tr>
				<td>
					<center>
						<table border="0" cellpadding="0" cellspacing="0" width="600px" style="height:100%;">
							<tr>
								<td valign="top" style="padding:20px;">
									<h2>Mensaje</h2>
									<br />
									<div class="textdark">										
										'.$mensaje.'</div>
									<br />
								</td>
							</tr>
						</table>
					</center>
				</td>
			</tr>
		</table>
		<table border="0" cellpadding="0" cellspacing="0" width="100%" style="background-color:#1f1f1f;">
			<tr>
				<td align="center">
					<center>
						<table border="0" cellpadding="0" cellspacing="0" width="600px" style="height:100%;">
							<tr>
								<td align="right" valign="middle" class="textwhite" style="font-size:12px;padding:20px;">
									<p>Dirección : Villanelo 180 Dpto 1405, Viña del mar
									<br>Telefono: +56 9 42646473
									<br>Email: <a href="mailto:contacto@securitygolden.cl">contacto@securitygolden.cl</a>									
									</p>
								</td>
							</tr>
							<tr>
								<td align="center" valign="middle" class="textwhite" style="font-size:12px;padding:20px;">
									2017 © Security Golden.
								</td>
							</tr>
						</table>
					</center>
				</td>
			</tr>
		</table>
	</body>
</html>';


	$htmlContacto = '
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<title>Contacto | Security Golden</title>
		<style type="text/css">
			#outlook a{padding:0;} /* Force Outlook to provide a "view in browser" button. */
			body{width:100% !important; margin:0;} 
			body{-webkit-text-size-adjust:none;} /* Prevent Webkit platforms from changing default text sizes. */
			body{margin:0; padding:0;}
			img{border:0; height:auto; line-height:100%; outline:none; text-decoration:none;}
			table td{border-collapse:collapse;}
			#backgroundTable{height:100% !important; margin:0; padding:0; width:100% !important;}
			@import url(http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700); /* Loading Open Sans Google font */ 
			body, #backgroundTable{ background-color:#FFF; }
			.TopbarLogo{
			padding:10px;
			text-align:left;
			vertical-align:middle;
			}
			h1, .h1{
			color:#444444;
			display:block;
			font-family:Open Sans;
			font-size:35px;
			font-weight: 400;
			line-height:100%;
			margin-top:2%;
			margin-right:0;
			margin-bottom:1%;
			margin-left:0;
			text-align:left;
			}
			h2, .h2{
			color:#444444;
			display:block;
			font-family:Open Sans;
			font-size:30px;
			font-weight: 400;
			line-height:100%;
			margin-top:2%;
			margin-right:0;
			margin-bottom:1%;
			margin-left:0;
			text-align:left;
			}
			h3, .h3{
			color:#444444;
			display:block;
			font-family:Open Sans;
			font-size:24px;
			font-weight:400;
			margin-top:2%;
			margin-right:0;
			margin-bottom:1%;
			margin-left:0;
			text-align:left;
			}
			h4, .h4{
			color:#444444;
			display:block;
			font-family:Open Sans;
			font-size:18px;
			font-weight:400;
			line-height:100%;
			margin-top:2%;
			margin-right:0;
			margin-bottom:1%;
			margin-left:0;
			text-align:left;
			}
			h5, .h5{
			color:#444444;
			display:block;
			font-family:Open Sans;
			font-size:14px;
			font-weight:400;
			line-height:100%;
			margin-top:2%;
			margin-right:0;
			margin-bottom:1%;
			margin-left:0;
			text-align:left;
			}
			.textdark { 
			color: #444444;
			font-family: Open Sans;
			font-size: 13px;
			line-height: 150%;
			text-align: left;
			}
			.textwhite { 
			color: #fff;
			font-family: Open Sans;
			font-size: 13px;
			line-height: 150%;
			text-align: left;
			}
			.fontwhite { color:#fff; }
			.btn {
			background-color: #e5e5e5;
			background-image: none;
			filter: none;
			border: 0;
			box-shadow: none;
			padding: 7px 14px; 
			text-shadow: none;
			font-family: "Segoe UI", Helvetica, Arial, sans-serif;
			font-size: 14px;  
			color: #333333;
			cursor: pointer;
			outline: none;
			-webkit-border-radius: 0 !important;
			-moz-border-radius: 0 !important;
			border-radius: 0 !important;
			}
			.btn:hover, 
			.btn:focus, 
			.btn:active,
			.btn.active,
			.btn[disabled],
			.btn.disabled {  
			font-family: "Segoe UI", Helvetica, Arial, sans-serif;
			color: #333333;
			box-shadow: none;
			background-color: #d8d8d8;
			}
			.btn.red {
			color: white;
			text-shadow: none;
			background-color: #d84a38;
			}
			.btn.red:hover, 
			.btn.red:focus, 
			.btn.red:active, 
			.btn.red.active,
			.btn.red[disabled], 
			.btn.red.disabled {    
			background-color: #bb2413 !important;
			color: #fff !important;
			}
			.btn.green {
			color: white;
			text-shadow: none; 
			background-color: #35aa47;
			}
			.btn.green:hover, 
			.btn.green:focus, 
			.btn.green:active, 
			.btn.green.active,
			.btn.green.disabled, 
			.btn.green[disabled]{ 
			background-color: #1d943b !important;
			color: #fff !important;
			}
		</style>
	</head>
	<body>
		<table border="0" cellpadding="0" cellspacing="0" width="100%" style="background-color:#ddb200; height:52px;">
			<tr>
				<td align="center">
					<center>
						<table border="0" cellpadding="0" cellspacing="0" width="600px" style="height:100%;">
							<tr>
								<td align="left" valign="middle" style="padding-left:20px;">
									<a href="wwww.securitygolden.cl/index.html" target="_blank">
									<img src="http://www.securitygolden.cl/assets/frontend/layout/img/logos/SecurityGolden4.png" width="86px" height="14px" alt="Security Golden"/>
									</a>
								</td>
							</tr>
						</table>
					</center>
				</td>
			</tr>
		</table>
		<table border="0" cellpadding="0" cellspacing="0" width="100%">
			<tr>
				<td style="padding-bottom:20px;">
					<center>
						<table border="0" cellpadding="0" cellspacing="0" width="600px" style="height:100%;">
							<tr>
								<td valign="top" class="bodyContent">
									<table border="0" cellpadding="20" cellspacing="0" width="100%">
										<tr>
											<td valign="top">
												<h2 class="h2">Contacto</h2>
												<br />
												<div class="textdark">
												<strong>'.ucwords($nombre).'</strong>, se ha comunicado a traves de nuestro formulario de contacto por lo que deberia tomar contacto lo antes posible con el.
												
												<br><br> A continuacion detallo la informacion ingresada.
												<br> Nombre : <strong> '.ucwords($nombre).' </strong>
												<br> Telefono : <strong> '.$fono.' </strong>
												<br> Correo : <strong> '.$correo.'</strong>
												</div>
											</td>
										</tr>
									</table>
								</td>
							</tr>
						</table>
					</center>
				</td>
			</tr>
		</table>
		<table border="0" cellpadding="0" cellspacing="0" width="100%" style="background-color:#f8f8f8;border-top:1px solid #e7e7e7;border-bottom:1px solid #e7e7e7;">
			<tr>
				<td>
					<center>
						<table border="0" cellpadding="0" cellspacing="0" width="600px" style="height:100%;">
							<tr>
								<td valign="top" style="padding:20px;">
									<h2>Mensaje</h2>
									<br />
									<div class="textdark">										
										'.$mensaje.'</div>
									<br />
								</td>
							</tr>
						</table>
					</center>
				</td>
			</tr>
		</table>
		<table border="0" cellpadding="0" cellspacing="0" width="100%" style="background-color:#1f1f1f;">
			<tr>
				<td align="center">
					<center>
						<table border="0" cellpadding="0" cellspacing="0" width="600px" style="height:100%;">
							<tr>
								<td align="right" valign="middle" class="textwhite" style="font-size:12px;padding:20px;">
									<p>Dirección : Villanelo 180 Dpto 1405, Viña del mar
									<br>Telefono: +56 9 42646473
									<br>Email: <a href="mailto:contacto@securitygolden.cl">contacto@securitygolden.cl</a>									
									</p>
								</td>
							</tr>
							<tr>
								<td align="center" valign="middle" class="textwhite" style="font-size:12px;padding:20px;">
									2017 © Security Golden.
								</td>
							</tr>
						</table>
					</center>
				</td>
			</tr>
		</table>
	</body>
</html>';

    //Server settings
    //$mail->SMTPDebug = 2;                                 // Enable verbose debug output
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host ='mail.securitygolden.cl';			   	  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'noresponder@securitygolden.cl';                 // SMTP username
    $mail->Password = 'security2017';                           // SMTP password
    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 25;                                    // TCP port to connect to

    //Recipients
	$mail->setFrom('noresponder@securitygolden.cl', 'Security Golden');
    $mail->addAddress($correo, ucwords($nombre));
	
    //Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Contacto | Security Golden';
    $mail->Body    = $html;
    	
	$mail->send();
	
	$mail = new PHPMailer(true);        
	$mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host ='mail.securitygolden.cl';			   	  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'noresponder@securitygolden.cl';                 // SMTP username
    $mail->Password = 'security2017';                           // SMTP password
    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 25;                                    // TCP port to connect to

    //Recipients
	$mail->setFrom('noresponder@securitygolden.cl', 'Security Golden');
    $mail->addAddress('contacto@securitygolden.cl', 'Contacto Security Golden');
	//$mail->addAddress('marcelouch1987@gmail.com');
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Contacto | Security Golden';
    $mail->Body    = $htmlContacto;
    
		
    $mail->send();
    
	$status = array('status' => 200);
	echo json_encode($status);

} catch (Exception $e) {
	
	$status = array('status' => 500, 'error' => $mail->ErrorInfo);
	echo json_encode($status);	
}