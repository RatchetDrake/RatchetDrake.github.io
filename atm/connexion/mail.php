<?php
require "./PHPMailer/PHPMailerAutoload.php";

function GenerateToken($length) { // 10
    $token = "_0123456789azertyuiopqsdfghjklmwxcvbnAZERTYUIOPQSDFGHJKLMWXCVBN";
    echo substr(str_shuffle(str_repeat($token, $length)), 0, $length);
}

function SendEmail($id, $token, $email) {
    function smtpmailer($to, $from, $from_name, $subject, $body) {
        $mail = new PHPMailer();
        $mail->isSMTP();
        $mail->SMTPAuth = true;

        $mail->SMTPSecure = 'ssl';
        $mail->Host = 'smtp.gmail.com';
        $mail->Port = 465;
        $mail->Username = $from;
        $mail->Password = "DWWMauboue";

        $mail->isHTML();
        $mail->From = $from;
        $mail->FromName = $from_name;
        $mail->Sender = $from;
        $mail->addReplyTo($from, $from_name);
        $mail->Subject = $subject;
        $mail->Body = $body;
        $mail->addAddress($to);
        
        if (!$mail->Send()) {
            echo "Le mail ne c'est pas envoyé ressayer plus tard";
            echo $mail->Send();
        } else {
            echo "Le mail c'est envoyé avec succés";
        }
    }
    $msg = "Lien pour réinitialiser votre mot de passe : http://localhost/cours_php/TamakiYagami.github.io/exo/connexion/reset.php?id=$id&token=$token";  
    smtpmailer($email, 'dwwm.auboue@gmail.com', 'DWWM', "Réinitialiser votre mot de passe", $msg);                               
}
