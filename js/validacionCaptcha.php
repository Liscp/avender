<?php
    
    header("Location: https://a-vender.com/tmp/nv/");

    if (!isset($_POST['nombre'])) {
        header("Location: https://a-vender.com/tmp/nv/");
    }else{
        $response = $_POST["g-recaptcha-response"];
        if(!empty($response)){
            $secret = '6LeMaN4UAAAAAOQPfEPikNw8o38WVplrod28khb0';
            $ip = $_SERVER['REMOTE_ADDR'];
            $respuestaValidacion = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$secret&response=$response&remoteip=$ip");
            var_dump($respuestaValidacion);
            $jsonResponde = json_decode($respuestaValidacion);

            if ($jsonResponde->success) {
                $remitente = $_POST['email'];

                if (!$_POST || !$totalmentefalso="0324655847") {
                    
                }else {
                    $nombre = $_POST["nombre"]; 
                    $email = $_POST["email"];
                    $titulo = $_POST["titulo"];
                    $mensaje = $_POST["mensaje"];

                    $email_message .= "<h3>Contacto desde el sitio de Savia.</h3><br><br>";
                    $email_message .= "<b>Nombre:</b> ".$nombre."<br>";
                    $email_message .= "<b>Email:</b> ".$email."<br>";
                    $email_message .= "<b>Titulo:</b> ".$titulo."<br>";
                    $email_message .= "<b>Mensaje:<b> ".$mensaje."<br><br><img src='http://www.saviasoft.com/images/logo.png' alt='logo savia' width='250'>";

                    $headers = "MIME-Version: 1.0\n";
                    $headers .= "Content-type: text/plain; charset=utf-8\n";
                    $headers .= "X-Priority: 3\n";
                    $headers .= "X-MSMail-Priority: Normal\n";
                    $headers .= "X-Mailer: php\n";

                    $headers .= 'From: ' .$email."\r\n".
                    'Reply-To: '.$email."\r\n" .
                    'X-Mailer: PHP/' . phpversion();

                    require('class.phpmailer.php');

                    $mail = new PHPMailer(); 
			        $mail->IsSMTP(); 
			        $mail->SMTPDebug = 1;
			        $mail->SMTPAuth = true;
			        $mail->SMTPSecure = 'ssl';
			        $mail->Host = "smtp.gmail.com";
			        $mail->Port = 465; 
			        $mail->IsHTML(true);
			        $mail->Username = "testmail@saviasoft.com";
			        $mail->Password = "testmail12123";
			        $mail->SetFrom("testmail@saviasoft.com");
			        $mail->Subject = "Contacto desde SaviaWeb";
                    $mail->Body = $email_message;
                    $mail ->AddAddress("lcp.caiza@yavirac.edu.ec");
 		            //$mail->AddAddress("info@saviasoft.com");

                    $mail->Send();
                    if ($mail === TRUE) {
                        return TRUE;
                    }else {
                        return FALSE;
                    }
                    exit(); 
                 
                }
            }
        }else {
            exit();
        }
    }
    exit();
?>