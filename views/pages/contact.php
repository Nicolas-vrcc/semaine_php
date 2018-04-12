<?php
require_once 'views/includes/db.php';
require_once 'views/includes/header.php';

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

    mail($email_to, $email_subject, $email_body);

    $successMessages[] = 'Votre message nous a bien été transmis ! 👌🏻  Nous y répondrons sous 48h.';

    $_POST['first_name'] = '';
    $_POST['last_name'] = '';
    $_POST['email'] = '';
    $_POST['message_content'] = '';
  }
}
?>
<div class="container contact_form">
  <div class="card-panel">
    <div class="row">
      <form class="col s12" method="post" action="#">
        <div class="row">
          <div class="input-field col s6">
            <i class="material-icons prefix">account_circle</i>
            <input id="first_name" name="first_name" type="text" class="validate" required>
            <label for="first_name">Prénom</label>
          </div>
          <div class="input-field col s6">
            <input id="last_name" name="last_name" type="text" class="validate" required>
            <label for="last_name">Nom</label>
          </div>
        </div>
        <div class="row">
          <div class="input-field col s12">
            <i class="material-icons prefix">email</i>
            <input id="email" name="email" type="email" class="validate" required>
            <label for="email">Email</label>
          </div>
        </div>
        <div class="row">
          <div class="input-field col s12">
            <i class="material-icons prefix">mode_edit</i>
            <textarea id="message_content" name="message_content" class="materialize-textarea" required></textarea>
            <label for="message_content">Votre message</label>
          </div>
        </div>
        <button class="btn waves-effect waves-light btn-large" type="submit" name="Email" value="Email">Envoyer<i class="material-icons right">send</i></button>
      </form>
    </div>
  </div>
  <div class="messages">
    <?php foreach ($successMessages as $message): ?>
      <div class="card-panel green darken-1 white-text"><?=$message?> Revenir à la <a href="/">page d'accueil ?</a></div>
    <?php endforeach?>
  </div>
</div>
<?php
require_once 'views/includes/footer.php';
