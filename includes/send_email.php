<?php

  require_once '../includes/header.php';

  $errorMessages = [];
  $successMessages = [];

if(isset($_POST['Email'])){
  if(!empty($_POST)){
    //Retrieve datas from form
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $message_content = $_POST['message_content'];

    //Error treatment
    if(empty($first_name)){ $errorMessages[] = 'Vous n\'avez pas renseigné votre prénom ⚠️'; }
    if(empty($last_name)){ $errorMessages[] = 'Vous n\'avez pas renseigné votre nom de famille ⚠️'; }
    if(empty($email)){ $errorMessages[] = 'Vous n\'avez pas renseigné votre email ⚠️'; }
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){ $errorMessages[] = 'Votre adresse mail est invalide ⚠️'; }
    if(empty($message_content)){ $errorMessages[] = 'Vous n\'avez pas renseigné votre message ⚠️'; }

    if(empty($errorMessages)){
      $email_from = 'test@supervoisin.com';
      $email_subject = 'Message d\'un client de Super Voisins';
      $email_body = 'Voici le message de'.$first_name.' '.$last_name.': '.$message_content;

      $email_to = 'matthieu@matthieutoussaint.fr';
      $headers = 'From:' .$email_from.' \r\n';
      $headers .= 'Reply-To:' .$email.' \r\n';

      mail($email_to,$email_subject,$email_body,$headers);

      $successMessages[] = 'Votre message nous a bien été transmis ! Nous y répondrons sous 48h.';
    }
  }
} 

?>

<div class="messages">
  <?php foreach($errorMessages as $message): ?>
    <p class="error"><?= $message ?> Revenir au <a href="/pages/contact.php">message ?</a></p>
  <?php endforeach ?>
  <?php foreach($successMessages as $message): ?>
    <p class="success"><?= $message ?> Revenir à la <a href="/">page d'accueil ?</a></p>
  <?php endforeach ?>
</div>

<?php
  require_once '../includes/footer.php';
?>