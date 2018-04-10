<?php

require_once '../includes/header.php';

$errorMessages = [];
$successMessages = [];

if (isset($_POST['Email'])) {
    if (!empty($_POST)) {
        //Retrieve datas from form
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $email = $_POST['email'];
        $message_content = $_POST['message_content'];

        $email_from = 'test@supervoisin.com';
        $email_subject = 'Message d\'un client de Super Voisins';
        $email_body = 'Voici le message de' . $first_name . ' ' . $last_name . ': ' . $message_content;

        $email_to = 'matthieu@matthieutoussaint.fr';
        $headers = 'From:' . $email_from . ' \r\n';
        $headers .= 'Reply-To:' . $email . ' \r\n';

        mail($email_to, $email_subject, $email_body, $headers);

        $successMessages[] = 'Votre message nous a bien été transmis ! 👌🏻  Nous y répondrons sous 48h.';
    }
}

?>

<div class="messages">
  <?php foreach ($successMessages as $message): ?>
    <p class="success"><?=$message?> Revenir à la <a href="/">page d'accueil ?</a></p>
  <?php endforeach?>
</div>

<?php
require_once '../includes/footer.php';
?>