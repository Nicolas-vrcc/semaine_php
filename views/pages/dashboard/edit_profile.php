<?php
session_start();
require_once 'views/includes/db.php';
require_once 'views/includes/header_dashboard.php';

echo '<pre>';
var_dump($_SESSION);
echo '</pre>';
?>

<div class="container title_edit_profil">
  <h1 class="center bangers">Modifiez votre profil de super-héros</h1>
</div>

<div class="container profile-details">
  <div class="row valign-wrapper">
  	<div class="col s4 photo_edit">
  	  <div class="photo_container_edit valign-wrapper">
  	    <img class="responsive-img" src="<?= $_SESSION['auth']->avatar_picture; ?>" alt="profile picture">
  	  </div>
		</div>
		
		<div class="col s8 profile-informations">
			<form action="#" method="post">
				<h3 class="informations">Informations</h3>

				<div class="row">
					<div class="input-field col s6">
        	  <input id="Prénom" type="text" class="validate" disabled>
						<label for="Prénom"><?= $_SESSION['auth']->first_name;?></label>
						Pour modifier votre prénom, veuillez nous contacter.
					</div>
					<div class="input-field col s6">
        	  <input id="email" type="email" class="validate">
        	  <label for="email"><?= $_SESSION['auth']->email; ?></label>
        	</div>
				</div>

				<div class="row">
					<div class="input-field col s12">
						<input id="location" type="text" class="validate autocompleted">
						<label for="location"><?= $_SESSION['auth']->location; ?></label>
						Nous n'avons besoin que du nom de la rue et la ville.
					</div>
				</div>

				<h3 class="biographie">Biographie</h3>
				<div class="row">
					<div class="input-field">
						<textarea id="textarea1" class="materialize-textarea"></textarea>
						<label for="textarea1"><?= $_SESSION['auth']->bio; ?></label>
						Renseigner votre biographie permettra aux super-aidés de mieux vous connaître !
					</div>
				</div>

				<h3 class="powers">Super-pouvoirs</h3>
				<?php require_once 'views/includes/checkbox.php'; ?>
				<div class="row">
					<div class="col s12 select-powers center">
						Sélectionnez vos super-pouvoirs !
					</div>
				</div>
				
				<div class="row">
					<div class="col s12 center">
						<button class="btn waves-effect waves-light center" type="submit" name="action">Modifier le profil</button>
					</div>
				</div>
			</form>
			<?php if (isset($error)): ?>
        <div class="card-panel red darken-1 white-text"><?=$error?></div>
      <?php endif;?>
		</div>
  </div>
</div>


<?php
require_once 'views/includes/footer.php';
?>