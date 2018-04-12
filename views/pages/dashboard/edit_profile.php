<?php
session_start();
require_once 'views/includes/db.php';
require_once 'views/includes/header_dashboard.php';

echo '<pre>';
var_dump($_SESSION);
echo '</pre>';

//To change the avatar

if (isset($_GET['profilepicture1'])) {
	$profile_picture = $_GET['profilepicture1'];
	$request = $pdo->prepare('UPDATE users SET (avatar_picture = :profile_picture) WHERE (ID = :id)');
	$request->execute([
		'profile_picture' => $profile_picture,
		'id' => $_SESSION['auth']->ID
	]);
	$_SESSION['auth']->avatar_picture = $profile_picture;
}else {
	$profile_picture = $_SESSION['auth']->avatar_picture;
}


//Change profile informations
if (isset($_POST['email']) && isset($_POST['location'])) {

	$checkBoxValue = join(", ", $_POST['arrayValue']);

	// converts the location into proper google api request
	$formatedLocation = $name = str_replace(' ', '+', $_POST['location']);
	$url = "https://maps.googleapis.com/maps/api/geocode/json?address=" . $formatedLocation . "&key=AIzaSyDNj6Ao4vyLXmFpltuu8EnyYKYbF1HNXCM";

	// gets the lat and long coordinates of the user
	$curlSession = curl_init();
	curl_setopt($curlSession, CURLOPT_URL, $url);
	curl_setopt($curlSession, CURLOPT_BINARYTRANSFER, true);
	curl_setopt($curlSession, CURLOPT_RETURNTRANSFER, true);

	$data = json_decode(curl_exec($curlSession));

	if (isset($data)) {
		$latitude = $data->results[0]->geometry->location->lat;
		$longitude = $data->results[0]->geometry->location->lng;


	// check if the email is already used for another account
	$req = $pdo->prepare('SELECT ID FROM users WHERE email = :email');
	$req->execute(array(
		'email' => $_POST['email'],
	));
	$userAlreadyHere = $req->fetch();
	$req->closeCursor();

	if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) && !$userAlreadyHere) {
		//Change datas in database
		$req2 = $pdo->prepare('UPDATE users SET email = :email, location = :location, skills = :skills, bio = :bio, latitude = :latitude, longitude = :longitude WHERE ID = :id');
		$req2->execute([
			'id' => $_SESSION=['auth']->ID,
			'email' => $_POST['email'],
			'location' => $_POST['location'],
			'skills' => $checkBoxValue,
			'bio' => $_POST['bio'],
			'latitude' => $latitude,
			'longitude' => $longitude
		]);
		$req2->closeCursor();

		// send welcome email
		mail($_POST['email'], 'Super Voisins - Changements enregistrés', "Les changements apportés ce jour ont bien été enregistrés.");
		exit;
		} else {
			$error = 'Erreur d\'inscription, veuillez réesayer';
		}
	}else{
		$error = 'Localisation Incorrecte, réésayez';
	}
}
?>

<div class="container title_edit_profil">
  <h1 class="center bangers">Modifiez votre profil de super-héros</h1>
</div>

<div class="container profile-details">
  <div class="row valign-wrapper">
  	<div class="col s4 photo_edit center-align">
  	  <div class="photo_container_edit center-align">
				<img class="responsive-img" src="<?= $profile_picture ?>" alt="profile picture">
  	  </div>
			<div class="button center">
				<button class="btn waves-effect waves-light center" type="submit" name="action" onclick="openPicker()">Sélectionner</button>
			</div>

			<div class="row">
				<div class="col s12">
					<?php if(isset($errmsg)): ?>
						<div class="card-panel red darken-1 white-text"><?= $msg; ?></div>
					<?php endif ?>
					<?php if(isset($succmsg)): ?>
						<div class="card-panel green darken-1 white-text"><?= $msg; ?></div>
					<?php endif ?>
				</div>
			</div>
		</div>
		
		<div class="col s8 profile-informations">
			<form action="#" method="post">
				<h3 class="informations">Informations</h3>

				<div class="row">
					<div class="input-field col s6">
        	  <input id="first_name" type="text" class="validate" disabled>
						<label for="first_name"><?= $_SESSION['auth']->first_name;?></label>
						Pour modifier votre prénom, veuillez nous contacter.
					</div>
					<div class="input-field col s6">
        	  <input id="email" type="email" class="validate" value="<?= $_SESSION['auth']->email; ?>">
        	  <label for="email"><?= $_SESSION['auth']->email; ?></label>
        	</div>
				</div>

				<div class="row">
					<div class="input-field col s12">
						<input id="location" type="text" class="validate autocompleted" value="<?= $_SESSION['auth']->location; ?>">
						<label for="location"><?= $_SESSION['auth']->location; ?></label>
						Nous n'avons besoin que du nom de la rue et la ville.
					</div>
				</div>

				<h3 class="biographie">Biographie</h3>
				<div class="row">
					<div class="input-field">
						<textarea id="bio" class="materialize-textarea"><?= $_SESSION['auth']->bio; ?></textarea>
						<label for="bio"><?= $_SESSION['auth']->bio; ?></label>
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