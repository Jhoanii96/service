<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require ROOT . FOLDER_PATH . "/app/Phpmailer/Exception.php";
require ROOT . FOLDER_PATH . "/app/Phpmailer/PHPMailer.php";
require ROOT . FOLDER_PATH . "/app/Phpmailer/SMTP.php";

require ROOT . FOLDER_PATH . "/system/libs/Session.php";
require ROOT . FOLDER_PATH . "/app/models/register/registerModel.php";

class register extends Controller
{
	private $session;

	public function __construct()
	{
		$this->session = new Session;

		if (!empty($this->session->get('userAdmin')) || $this->session->get('userAdmin') != "" || $this->session->get('userAdmin') != NULL) {
			header("Location: " . FOLDER_PATH . "/");
		}
	}

	public function index()
	{

		$this->model = new registerModel();
		$this->mostrar_especialidad = $this->model->mostrar_especialidad();
		$this->mostrar_pais = $this->model->mostrar_pais();

		$this->view('register/register', [
			'Mostrar_Esp' => $this->mostrar_especialidad,
			'Mostrar_Pais' => $this->mostrar_pais
		]);
	}

	public function pais()
	{
		$this->model = new registerModel();

		$this->mostrar_departamento = $this->model->mostrar_departamento($_POST["id_pais"]);

		echo '<option value="0">Seleccione</option>';
		while ($dataDepartamento = $this->mostrar_departamento->fetch()) {
			echo '
        	    <option value="' . $dataDepartamento[1] . '">' . $dataDepartamento[2] . '</option>
        	';
		}
	}
	public function departamento()
	{
		$this->model = new registerModel();

		$this->mostrar_provincia = $this->model->mostrar_provincia($_POST["id_departamento"]);

		echo '<option value="0">Seleccione</option>';
		while ($dataProvincia = $this->mostrar_provincia->fetch()) {
			echo '
        	    <option value="' . $dataProvincia[1] . '">' . $dataProvincia[2] . '</option>
        	';
		}
	}
	public function provincia()
	{
		$this->model = new registerModel();

		$this->mostrar_distrito = $this->model->mostrar_distrito($_POST["id_provincia"]);

		echo '<option value="0">Seleccione</option>';
		while ($dataDistrito = $this->mostrar_distrito->fetch()) {
			echo '
        	    <option value="' . $dataDistrito[1] . '">' . $dataDistrito[2] . '</option>
        	';
		}
	}
	public function load_users()
	{
		$this->model = new registerModel();

		$this->mostrar_users = $this->model->mostrar_usuario($_POST["nom_user"]);

		$datos = '';
		$DatosDep_array = [];
		while ($mostrar_users = $this->mostrar_users->fetch()) {
			/* echo '
        	    <option>' . $mostrar_users[0] . '</option>
			'; */
			$DatosDep_array[] = array(
				"id" => $mostrar_users[0],
				"name" => $mostrar_users[1]
			);
		}
		$DatosDep = array("users" => ($DatosDep_array));
		$out = json_encode($DatosDep);
		echo $out;
	}


	public function send_email()
	{
		function getToken($length)
		{
			$token = "";
			$codeAlphabet = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
			$codeAlphabet .= "0123456789";
			$max = strlen($codeAlphabet);

			for ($i = 0; $i < $length; $i++) {
				$token .= $codeAlphabet[random_int(0, $max - 1)];
			}

			return $token;
		}

		$this->model = new registerModel();
		/* $this->model->mostrar_codigo(); */
		$token = getToken(6);
		$this->model->insertar_codigo($token);
		$email = $_POST["email"];
		/* $string = 'My nAmE is Tom.';
		$array = array("name", "tom");
		if (0 < count(array_intersect(array_map('strtolower', explode(' ', $string)), $array))) {
			//do sth
		} */

		 
		/* $this->dataPreins->aceptarPreinscripcion($_POST["email"]); */

		/* ---- PHPMAILER ---- */

		// Instantiation and passing `true` enables exceptions
		$mail = new PHPMailer(true);

		$view_email = file_get_contents(ROOT . '/' . PATH_VIEWS . 'email_format.php',TRUE);

		try {
			//Server settings
			$mail->CharSet    = 'UTF-8';
			$mail->SMTPDebug  = 0;                                       // Enable verbose debug output
			$mail->isSMTP();                                            // Send using SMTP
			$mail->Host       = 'smtp.gmail.com;smtp.live.com;';        // Set the SMTP server to send through
			$mail->SMTPAuth   = true;                                   // Enable SMTP authentication
			$mail->Username   = 'pruebaclinica789@gmail.com';               	// SMTP username
			$mail->Password   = 'a123a123A';                        // SMTP password
			$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
			$mail->Port       = 587;                                    // TCP port to connect to

			//Recipients
			$mail->setFrom('pruebaclinica789@gmail.com', 'Sistema historial clínico');
			$mail->addAddress($email);     // Add a recipient

			// Content
			$mail->isHTML(true);                                  // Set email format to HTML
			$mail->Subject = 'Código de activación de registro del Aplicativo Historial Clínico';
			$mail->Body    = '
			
			<div style="background-color: rgb(229, 229, 229); background-image: none; background-repeat: repeat; background-position: left top; background-attachment: scroll; color: rgb(51, 51, 51); font-family: Helvetica, Arial, sans-serif, serif, EmojiFont; line-height: 1.25;">
			
			<table class="x_body" style="margin:0; background:#E5E5E5!important; border-collapse:collapse; border-spacing:0; color:#E5E5E5; font-family:Helvetica,Arial,sans-serif; font-size:16px; font-weight:400; height:100%; line-height:1.3; margin:0; padding:0; text-align:left; vertical-align:top; width:100%">
				<tbody>
					<tr style="padding:0; text-align:left; vertical-align:top">
						<td class="x_center" align="center" valign="top"
							style="margin:0; border-collapse:collapse!important; color:#E5E5E5; font-family:Helvetica,Arial,sans-serif; font-size:16px; font-weight:400; line-height:1.3; margin:0; padding:0; text-align:left; vertical-align:top; word-wrap:break-word">
							<center style="min-width:580px; width:100%">
								<table class="x_spacer x_float-center"
									style="margin:0 auto; border-collapse:collapse; border-spacing:0; float:none; margin:0 auto; padding:0; text-align:center; vertical-align:top; width:100%">
									<tbody>
										<tr style="padding:0; text-align:left; vertical-align:top">
											<td height="15px"
												style="margin:0; border-collapse:collapse!important; color:#322F37; font-family:Helvetica,Arial,sans-serif; font-size:10px; font-weight:400; line-height:10px; margin:0; padding:0; text-align:left; vertical-align:top; word-wrap:break-word">
												&nbsp;</td>
										</tr>
									</tbody>
								</table>
								<table align="center" class="x_container x_float-center"
									style="margin:0 auto; background:#fff; border-collapse:collapse; border-spacing:0; float:none; margin:0 auto; padding:10px; text-align:center; vertical-align:top; width:580px; margin-left:10px!important; margin-right:10px!important">
									<tbody>
										<tr style="padding:0; text-align:left; vertical-align:top">
											<td
												style="margin:0; border-collapse:collapse!important; color:#322F37; font-family:Helvetica,Arial,sans-serif; font-size:16px; font-weight:400; line-height:1.3; margin:0; padding:0; text-align:left; vertical-align:top; word-wrap:break-word">
												<table class="x_row x_header-v2 x_white x_border-bottom"
													style="background-attachment:scroll; background-color:#fff; background-image:none; background-position:top left; background-repeat:repeat; border-bottom:1px solid #EFEEF1; border-collapse:collapse; border-spacing:0; display:table; margin:10px 0 15px 0; padding:0; text-align:left; vertical-align:top; width:100%; z-index:1">
													<tbody>
														<tr style="padding:0; text-align:left; vertical-align:top">
															<th style="margin:0 auto; color:#322F37; font-family:Helvetica,Arial,sans-serif; font-size:16px; font-weight:400; line-height:1.3; margin:0 auto; padding:10px 20px; text-align:left; width:560px">
																<table
																	style="border-collapse:collapse; border-spacing:0; padding:0; text-align:left; vertical-align:top; width:100%">
																	<tbody>
																		<tr
																			style="padding:0; text-align:center; vertical-align:top">
																			<th style="margin:0; color:#322F37; font-family: Blippo, fantasy; font-size:28px; font-weight:400; line-height:1.3; margin:0; padding:0; text-align:center">
																				<span style="padding: 0;font-size: 18px;color: #000;">REGISTRO</span>
																				<br>
																				<span style="color: #6b83ef;">SISTEMA</span>&nbsp;<span style="color: #6b83ef;">HISTORIAL CLINICO</span>
																			</th>
																			<th class="x_expander"
																				style="margin:0; color:#322F37; font-family:Helvetica,Arial,sans-serif; font-size:16px; font-weight:400; line-height:1.3; margin:0; padding:0!important; text-align:left; visibility:hidden; width:0">
																			</th>
																		</tr>
																	</tbody>
																</table>
															</th>
														</tr>
													</tbody>
												</table>
												<table class="x_spacer"
													style="border-collapse:collapse; border-spacing:0; padding:0; text-align:left; vertical-align:top; width:100%">
													<tbody>
														<tr style="padding:0; text-align:left; vertical-align:top">
															<td height="15px"
																style="margin:0; border-collapse:collapse!important; color:#322F37; font-family:Helvetica,Arial,sans-serif; font-size:15px; font-weight:400; line-height:15px; margin:0; padding:0; text-align:left; vertical-align:top; word-wrap:break-word">
																&nbsp;</td>
														</tr>
													</tbody>
												</table>
												<table class="x_row"
													style="border-collapse:collapse; border-spacing:0; display:table; padding:0; text-align:left; vertical-align:top; width:100%">
													<tbody>
														<tr style="padding:0; text-align:left; vertical-align:top">
															<th class="x_flush x_small-12 x_large-12 x_columns x_first x_last"
																style="margin:0 auto; color:#322F37; font-family:Helvetica,Arial,sans-serif; font-size:18px; font-weight:500; line-height:1.3; margin:0 auto; padding:0; padding-bottom:0!important; padding-left:20px; padding-right:20px; padding-top:0!important; text-align:left; width:560px">
																<table
																	style="border-collapse:collapse; border-spacing:0; padding:0; text-align:left; vertical-align:top; width:100%">
																	<tbody>
																		<tr
																			style="padding:0; text-align:left; vertical-align:top">
																			<th
																				style="margin:0; color:#322F37; font-family:Helvetica,Arial,sans-serif; font-size:18px; font-weight:500; line-height:1.3; margin:0; padding:0; text-align:left">
																				<h6 style="margin:0; margin-bottom:10px; color:inherit; font-family:Helvetica,Arial,sans-serif; font-size:20px; font-weight:500; line-height:1.3; margin:0; margin-bottom:0; padding:0; padding-bottom:0; text-align:center; word-wrap:normal; color:#0022bb">
																					CÓDIGO DE ACTIVACIÓN</h6>
																			</th>
																			<th class="x_expander"
																				style="margin:0; color:#322F37; font-family:Helvetica,Arial,sans-serif; font-size:16px; font-weight:400; line-height:1.3; margin:0; padding:0!important; text-align:left; visibility:hidden; width:0">
																			</th>
																		</tr>
																	</tbody>
																</table>
															</th>
														</tr>
													</tbody>
												</table>
												<table class="x_row"
													style="border-collapse:collapse; border-spacing:0; display:table; padding:0; text-align:left; vertical-align:top; width:100%">
													<tbody>
														<tr style="padding:0; text-align:left; vertical-align:top">
															<th class="x_editable x_small-12 x_large-12 x_columns x_first x_last"
																style="margin:0 auto; color:#322F37; font-family:Helvetica,Arial,sans-serif; font-size:16px; font-weight:300; line-height:1.3; margin:0 auto; padding:0; padding-bottom:16px; padding-left:20px; padding-right:20px; padding-top:10px; text-align:left; width:560px">
																<table
																	style="border-collapse:collapse; border-spacing:0; padding:0; text-align:left; vertical-align:top; width:100%">
																	<tbody>
																		<tr
																			style="padding:0; text-align:left; vertical-align:top">
																			<th
																				style="margin:0; color:#322F37; font-family:Helvetica,Arial,sans-serif; font-size:16px; font-weight:400; line-height:1.3; margin:0; padding:0; text-align:left">
																				<p style="margin:0; margin-bottom:10px; font-family:Helvetica,Arial,Verdana; font-size:16px; font-weight:300; line-height:24px; margin:0; margin-bottom:0; padding:0; padding-bottom:0; text-align:center">
																						Usa el siguiente código para activar su cuenta 
																					y completar el registro de inscripción:</p>
																			</th>
																			<th style="margin:0; color:#322F37; font-family:Helvetica,Arial,sans-serif; font-size:14px; font-weight:400; line-height:1.3; margin:0; padding:0!important; text-align:left; visibility:hidden; width:0">
																			</th>
																		</tr>
																	</tbody>
																</table>
															</th>
														</tr>
													</tbody>
												</table>
												<table class="x_row x_hide-for-large x_app-store-section"
													style="border-collapse:collapse; border-spacing:0; border-top:#EFEEF1 1px solid; font-size:0; line-height:0; max-height:0; overflow:hidden; padding:0; text-align:left; vertical-align:top; width:100%">
													<tbody style="">
														<tr style="padding:0; text-align:left; vertical-align:top">
															<th class="x_small-12 x_large-12 x_columns x_first x_last"
																style="margin:0 auto; font-family:Helvetica,Arial,sans-serif; font-size:16px; font-weight:300; line-height:1.3; margin:0 auto; padding:0; padding-bottom:16px; padding-left:20px; padding-right:20px; padding-top:27px; text-align:left; width:560px">
																<table
																	style="border-collapse:collapse; border-spacing:0; padding:0; text-align:left; vertical-align:top; width:100%">
																	<tbody>
																		<tr
																			style="padding:0; text-align:left; vertical-align:top">
																			<th
																				style="margin:0; color:#322F37; font-family:Helvetica,Arial,sans-serif; font-size:16px; font-weight:300; line-height:1.3; margin:0; padding:0; text-align:left">
																				<div style="color: rgb(50, 47, 55); font-family: Helvetica, Arial, Verdana, &quot;Trebuchet MS&quot;, serif, EmojiFont; font-size: 32px; font-weight: 400; line-height: 24px; margin: 0px; padding: 5px 0px 0px; text-align: center;">
																					<p style="border:1px solid; border-style:solid; border-color:#8d90ff; display:inline; padding-bottom:5px; padding-left:5px; padding-right:5px; padding-top:5px">
																						' . $token . '
																					</p>
																				</div>
																				<table class="x_spacer"
																					style="border-collapse:collapse; border-spacing:0; padding:0; text-align:left; vertical-align:top; width:100%">
																					<tbody style="">
																						<tr
																							style="padding:0; text-align:left; vertical-align:top">
																							<td height="20px"
																								style="margin:0; border-collapse:collapse!important; color:#322F37; font-family:Helvetica,Arial,sans-serif; font-size:10px; font-weight:400; line-height:10px; margin:0; padding:0; text-align:left; vertical-align:top; word-wrap:break-word">
																								&nbsp;</td>
																						</tr>
																					</tbody>
																				</table>
																			</th>
																		</tr>
																	</tbody>
																</table>
															</th>
														</tr>
													</tbody>
												</table>
											</td>
										</tr>
									</tbody>
								</table>
								<table align="center" class="x_container x_transparent x_float-center"
									style="margin:0 auto; background:0 0!important; border-collapse:collapse; border-spacing:0; float:none; margin:0 auto; padding:0; text-align:center; vertical-align:top; width:580px">
									<tbody>
										<tr style="padding:0; text-align:left; vertical-align:top">
											<td
												style="margin:0; border-collapse:collapse!important; color:#322F37; font-family:Helvetica,Arial,sans-serif; font-size:12px; font-weight:300; line-height:1.3; margin:0; padding:0; text-align:left; vertical-align:top; word-wrap:break-word">
												<table class="x_row"
													style="border-collapse:collapse; border-spacing:0; display:table; padding:0; text-align:left; vertical-align:top; width:100%">
													<tbody>
														<tr style="padding:0; text-align:left; vertical-align:top">
															<th class="x_small-12 x_large-12 x_columns x_first x_last"
																style="margin:0 auto; color:#322F37; font-family:Helvetica,Arial,sans-serif; font-size:12px; font-weight:300; line-height:1.3; margin:0 auto; padding:0; padding-bottom:16px; padding-left:20px; padding-right:20px; padding-top:28px; text-align:left; width:560px">
																<table
																	style="border-collapse:collapse; border-spacing:0; padding:0; text-align:left; vertical-align:top; width:100%">
																	<tbody>
																		<tr
																			style="padding:0; text-align:left; vertical-align:top">
																			<th
																				style="margin:0; color:#322F37; font-family:Helvetica,Arial,sans-serif; font-size:12px; font-weight:300; line-height:1.3; margin:0; padding:0; text-align:left">
																				<p class="x_text-center"
																					style="margin:0; margin-bottom:10px; color:#322F37; font-family:Helvetica,Arial,Verdana; font-size:12px; font-weight:300; line-height:24px; margin:0; margin-bottom:10px; padding:0; padding-bottom:10px; text-align:center">
																					<small style="color:#706a7c; font-size:12px">
																						Si en caso de que no reconoce el código de seguridad intente reenviar el código nuevamente por la página principal de registro.<br>
																						Para mayor detalle no dude en consultar al correo 
																						<a href="mailto:edison@gmail.com" target="_blank" rel="noopener noreferrer" data-auth="NotApplicable" dir="ltr" style="color:#2672ec; text-decoration:none">
																							edison@gmail.com
																						</a>
																					</small>
																				</p>
																				
																			</th>
																			
																		</tr>
																	</tbody>
																</table>
															</th>
														</tr>
													</tbody>
												</table>
											</td>
										</tr>
									</tbody>
								</table>
							</center>
						</td>
					</tr>
				</tbody>
			</table>
			
		</div>
			';

			$mail->send();
			echo 'El código ha sido enviado a su correo...';
		} catch (Exception $e) {
			echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
		}

		sleep(1);
	}
}
