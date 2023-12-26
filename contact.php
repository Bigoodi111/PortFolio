<?php
$contactData = $data['contact'];

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
require_once 'Captcha/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
   $nom = $_POST['nom'] ?? 'Nom non fourni';
   $email = $_POST['email'] ?? 'Email non fourni';
   $sujet = $_POST['sujet'] ?? 'Pas de sujet';
   $message = $_POST['message'] ?? 'Pas de message';

    $mail = new PHPMailer(true);

    try {
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'gregoire.fontaine@sts-sio-caen.info';
        $mail->Password   = 'PbdWa22#aMeM';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
        $mail->Port       = 465;

        // Destinataires
        $mail->setFrom($email, $nom);
        $mail->addAddress('gregoire.fontaine@sts-sio-caen.info');

        // Contenu
        $mail->isHTML(true);
        $mail->Subject = 'Nouveau message de ' . $nom;
        $mail->Body = "De : $nom \nEmail : $email \n\nMessage : $message";

        $mail->send();
    } catch (Exception $e) {
        echo "Le message n'a pas pu être envoyé. Erreur: {$mail->ErrorInfo}";
    }
}

?>

<form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
   <label for="nom">Nom :</label>
   <input type="text" id="nom" name="nom">
   
   <label for="email">Email :</label>
   <input type="email" id="email" name="email">

   <label for="sujet">Objet :</label>
   <input type="text" id="sujet" name="sujet">
   
   <label for="message">Message :</label>
   <textarea id="message" name="message"></textarea>

   <div class="g-recaptcha" data-sitekey="6LeXSTspAAAAAPsjMymjHWBFyp86jFS6lkyXyoiz"></div>
   <input class="btn"type="submit" name="OK" value="Envoyer">
</form>

<script src="https://www.google.com/recaptcha/api.js" async defer></script>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['OK'])) {
    $recaptcha = new \ReCaptcha\ReCaptcha("6LeXSTspAAAAAOjon501VkLiBgg1hTyMz-78kNTB");
    $gRecaptchaResponse = $_POST['g-recaptcha-response'];
    $resp = $recaptcha->setExpectedHostname('localhost')
                      ->verify($gRecaptchaResponse);
}
?>
