<?php
require_once 'views/includes/db.php';
?>
<div class="container contact_form">
  <div class="card-panel">
    <div class="row">
      <form class="col s12" method="post" action="/includes/send_email.php">
        <div class="row">
          <div class="input-field col s6">
            <i class="material-icons prefix">account_circle</i>
            <input id="first_name" name="first_name" type="text" class="validate">
            <label for="first_name">Prénom</label>
          </div>
          <div class="input-field col s6">
            <input id="last_name" name="last_name" type="text" class="validate">
            <label for="last_name">Nom</label>
          </div>
        </div>
        <div class="row">
          <div class="input-field col s12">
            <i class="material-icons prefix">email</i>
            <input id="email" name="email" type="email" class="validate">
            <label for="email">Email</label>
          </div>
        </div>
        <div class="row">
          <div class="input-field col s12">
            <i class="material-icons prefix">mode_edit</i>
            <textarea id="message_content" name="message_content" class="materialize-textarea"></textarea>
            <label for="message_content">Votre message</label>
          </div>
        </div>
        <button class="btn waves-effect waves-light btn-large" type="submit" name="Email" value="Email">Envoyer<i class="material-icons right">send</i></button>
      </form>
    </div>
  </div>
</div>
<?php
require_once 'views/includes/footer.php';
