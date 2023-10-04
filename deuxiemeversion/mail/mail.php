<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require "./PHPMailer/PHPMailerAutoload.php";

/**
 * Cette fonction génère un token unique
 * @param int $length
 * @return string
 */
function GenerateToken($length) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $token = '';
    $max = strlen($characters) - 1;
    for ($i = 0; $i < $length; $i++) {
        $token .= $characters[mt_rand(0, $max)];
    }
    return $token;
}

/**
 * Cette fonction envoie un email de réinitialisation
 * @param string $email - L'adresse e-mail du destinataire
 * @param int $id - L'identifiant
 * @param string $token - Le token
 */
function SendEmail($email, $id, $token) {
    $subject = "Réinitialisation de mot de passe";
    $message = "Bonjour,\n\n";
    $message .= "Cliquez sur le lien suivant pour réinitialiser votre mot de passe : ";
    $message .= "http://localhost/cours_php/RatchetDrake.github.io/RatchetDrake.github.io/deuxiemeversion/mail/reset.php?id=$id&token=$token\n\n";
    $message .= "Cordialement,\nVotre équipe";

    sendMailHelper($email, $subject, $message);
}

/**
 * Cette fonction envoie un email de confirmation
 * @param string $email - L'adresse e-mail du destinataire
 * @param string $token - Le token
 */
function SendConfirmationEmail($email, $token) {
    $subject = "Confirmation de votre inscription";
    $message = "Bonjour,\n\n";
    $message .= "Cliquez sur le lien suivant pour confirmer votre adresse e-mail : ";
    $message .= "http://localhost/cours_php/RatchetDrake.github.io/RatchetDrake.github.io/deuxiemeversion/mail/confirmation.php?token=$token\n\n";
    $message .= "Cordialement,\nVotre équipe";

    sendMailHelper($email, $subject, $message);
}

/**
 * Helper function to send email using PHPMailer
 * @param string $email - Recipient email address
 * @param string $subject - Email subject
 * @param string $message - Email body
 */
function sendMailHelper($email, $subject, $message) {
    $mail = new PHPMailer;
    $mail->isSMTP();
    $mail->SMTPAuth = true;
    $mail->Host = 'smtp-mail.outlook.com';
    $mail->Port = 587;
    $mail->SMTPSecure = 'tls';
    $mail->Username = 'ratchetdtest3@outlook.fr'; // Adjust with your email address
    $mail->Password = 'Azertyuiop@123'; // Adjust with your email password
    $mail->CharSet = 'utf-8';
    $mail->setFrom('ratchetdtest3@outlook.fr', 'RatchetDrake'); // Adjust with your name
    $mail->addAddress($email);
    $mail->Subject = $subject;
    $mail->Body = $message;

    if (!$mail->send()) {
        echo "Le mail n'a pas pu être envoyé. Erreur : " . $mail->ErrorInfo;
    } else {
        echo "Le mail a été envoyé avec succès.";
    }
}

?>
