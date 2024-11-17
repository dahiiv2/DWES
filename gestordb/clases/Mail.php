<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

class Mail {
    private $mail;

    //constructor que crea la conexión al mail
    public function __construct() {
        $this->mail = new PHPMailer(true);
        
        //configuración del mail con las credenciales de Gmail
        try {
            $this->mail->SMTPDebug = SMTP::DEBUG_SERVER;
            $this->mail->isSMTP();
            $this->mail->Host = 'smtp.gmail.com';
            $this->mail->SMTPAuth = true;
            $this->mail->Username = 'phpdahii@gmail.com';
            $this->mail->Password = 'gyjf dbvm mpgc mwdb';
            $this->mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $this->mail->Port = 587;
            //para que no salgan warnings molestos
            $this->mail->SMTPDebug = 0;

            $this->mail->SMTPOptions = [
                'ssl' => [
                    'verify_peer' => false,
                    'verify_peer_name' => false,
                    'allow_self_signed' => true,
                ],
            ];
        } catch (Exception $e) {
            echo "Email no enviado. Error: " . $this->mail->ErrorInfo;
        }
    }

    public function enviarMailCrear($usuario, $nombreTarea, $desc, $prioridad, $fecha) {
        //enviar email con la información de la tarea, por ahora siempre con el mismo email
        try {
            $this->mail->setFrom("phpdahii@gmail.com");
            $this->mail->addAddress("dwes.ieslamar@gmail.com");
            $this->mail->addReplyTo("phpdahii@gmail.com");

            $this->mail->isHTML(true);
            $this->mail->Subject = "Nueva tarea: $nombreTarea";
            $horaCreacion = date("H:i d/m/Y");
            $this->mail->Body = "
            <ul>
                <li><p><strong>Usuario:</strong> $usuario</p></li>
                <li><p><strong>Nombre de la tarea:</strong> $nombreTarea</p></li>
                <li><p><strong>Descripción:</strong> $desc</p></li>
                <li><p><strong>Prioridad:</strong> $prioridad</p></li>
                <li><p><strong>Fecha:</strong> $fecha</p></li>
                <br>
                <li><p><strong>Hora de creación:</strong> $horaCreacion</p></li>
            </ul>";


            $this->mail->send();
        } catch (Exception $e) {
            echo "Email no enviado. Error: " . $this->mail->ErrorInfo;
        }
    }

    public function enviarMailBorrar($usuario, $nombreTarea, $desc, $prioridad, $fecha) {
        //enviar email con la información de la tarea borrada, por ahora siempre con el mismo email
        try {
            $this->mail->setFrom("phpdahii@gmail.com");
            $this->mail->addAddress("dwes.ieslamar@gmail.com");
            $this->mail->addReplyTo("phpdahii@gmail.com");

            $this->mail->isHTML(true);
            $this->mail->Subject = "Tarea borrada: $nombreTarea";
            $horaCreacion = date("H:i d/m/Y");

            $this->mail->Body = "
            <ul>
                <li><p><strong>La siguiente tarea ha sido borrada:</strong></p></li>
                <li><p><strong>Usuario:</strong> $usuario</p></li>
                <li><p><strong>Nombre de la tarea:</strong> $nombreTarea</p></li>
                <li><p><strong>Descripción:</strong> $desc</p></li>
                <li><p><strong>Prioridad:</strong> $prioridad</p></li>
                <li><p><strong>Fecha:</strong> $fecha</p></li>
                <br>
                <li><p><strong>Hora de eliminación:</strong> $horaCreacion</p></li>
            </ul>";


            $this->mail->send();
        } catch (Exception $e) {
            echo "Email no enviado. Error: " . $this->mail->ErrorInfo;
        }
    }

    public function enviarMailModificar($nombreViejo, $usuario, $nombreTarea, $desc, $prioridad, $fecha) {
        //envial email con la información del nombre de la tarea vieja y la nueva
        try {
            $this->mail->setFrom("phpdahii@gmail.com");
            $this->mail->addAddress("dwes.ieslamar@gmail.com");
            $this->mail->addReplyTo("phpdahii@gmail.com");

            $this->mail->isHTML(true);
            $this->mail->Subject = "Tarea modificada: $nombreTarea";
            $horaCreacion = date("H:i d/m/Y");

            $this->mail->Body = "
            <ul>
                <li><p><strong>La siguiente tarea ha sido modificada:</strong></p></li>
                <br>
                <li><p><strong>Nombre:</strong> $nombreViejo --> $nombreTarea</p></li>
                <br>
                <li><p><strong>Usuario:</strong> $usuario</p></li>
                <li><p><strong>Nombre de la tarea:</strong> $nombreTarea</p></li>
                <li><p><strong>Descripción:</strong> $desc</p></li>
                <li><p><strong>Prioridad:</strong> $prioridad</p></li>
                <li><p><strong>Fecha:</strong> $fecha</p></li>
                <br>
                <li><p><strong>Hora de modificacion:</strong> $horaCreacion</p></li>
            </ul>";


            $this->mail->send();
        } catch (Exception $e) {
            echo "Email no enviado. Error: " . $this->mail->ErrorInfo;
        }
    }
}

?>
