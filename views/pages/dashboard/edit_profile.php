<?php
session_start();
require_once 'views/includes/db.php';
require_once 'views/includes/header_dashboard.php';

$header_profile = get_headers($_SESSION['auth']->avatar_picture); 
//Prevent errors when filestack return 404 
if($header_profile[0] === 'HTTP/1.1 404 Not Found'){ 
	$profile_picture = 'https://api.adorable.io/avatars/250/'.$_SESSION['auth']->first_name;
	$_SESSION['auth']->avatar_picture = $profile_picture;
}

//To change the avatar
if (isset($_GET['profilepicture1'])) {
	$profile_picture = $_GET['profilepicture1'];
	$request = $pdo->prepare('UPDATE USERS SET avatar_picture = :profile_picture WHERE ID = :id');
	$request->execute([
		'profile_picture' => $profile_picture,
		'id' => $_SESSION['auth']->ID
	]);
	$_SESSION['auth']->avatar_picture = $profile_picture;
}else {
	$profile_picture = $_SESSION['auth']->avatar_picture;
}


//Update users datas
if(!empty($_POST)){
	$modify = $_POST['modify'];
	$skills = $_POST['arrayValue'];
	$id = $_SESSION['auth']->ID;

	$email = $modify[0]['email'];
	$location = $modify[0]['location'];
	$bio = $modify[0]['bio'];

	$checkBoxValue = join(", ", $_POST['arrayValue']);

	// converts the location into proper google api request
	$formatedLocation = $name = str_replace(' ', '+', $location);
	$url = "https://maps.googleapis.com/maps/api/geocode/json?address=" . $formatedLocation . "&key=AIzaSyDNj6Ao4vyLXmFpltuu8EnyYKYbF1HNXCM";

	// gets the lat and long coordinates of the user
	$curlSession = curl_init();
	curl_setopt($curlSession, CURLOPT_URL, $url);
	curl_setopt($curlSession, CURLOPT_BINARYTRANSFER, true);
	curl_setopt($curlSession, CURLOPT_RETURNTRANSFER, true);

	$data = json_decode(curl_exec($curlSession));
	$latitude = $data->results[0]->geometry->location->lat;
	$longitude = $data->results[0]->geometry->location->lng;

	if(filter_var($email, FILTER_VALIDATE_EMAIL)){
		//Save datas to DB
		$prepare = $pdo->prepare('UPDATE USERS SET email = :email, location = :location, skills = :skills, bio = :bio, latitude = :latitude, longitude = :longitude WHERE ID = :id');
		$prepare->bindValue(':email', $email);
		$prepare->bindValue(':location', $location);
		$prepare->bindValue(':skills', $checkBoxValue);
		$prepare->bindValue(':bio', $bio);
		$prepare->bindValue(':latitude', $latitude);
		$prepare->bindValue(':longitude', $longitude);
		$prepare->bindValue(':id', $id);
		$exec = $prepare->execute();

		$req3 = $pdo->prepare('SELECT * FROM users WHERE (ID = :id)');
		$req3->execute(['id'=>$_SESSION['auth']->ID]);
		$result = $req3->fetch();

		//Re-assign new values to session
		$_SESSION['auth']->email = $result->email;
		$_SESSION['auth']->location = $result->location;
		$_SESSION['auth']->skills = $result->skills;
		$_SESSION['auth']->bio = $result->bio;
		$_SESSION['auth']->latitude = $result->latitude;
		$_SESSION['auth']->longitude = $result->longitude;

		//Send email to user to confirm changes
		mail($email, 'Super Voisins - Changements enregistrés', "Vos changements ont bien été enregistrés. Si vous n'êtes pas à l'origine de ces changements, veuillez nous contacter.");
		
		$success = 'Vos changements ont bien été enregistrés. Une confirmation vous a été envoyée par mail.';
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
        	  <input id="email" type="email" class="validate" value="<?= $_SESSION['auth']->email; ?>" name="modify[0][email]">
        	  <label for="email"><?= $_SESSION['auth']->email; ?></label>
        	</div>
				</div>

				<div class="row">
					<div class="input-field col s12">
						<input id="location" type="text" class="validate autocompleted" value="<?= $_SESSION['auth']->location; ?>" name="modify[0][location]">
						<label for="location"><?= $_SESSION['auth']->location; ?></label>
						Nous n'avons besoin que du nom de la rue et la ville.
					</div>
				</div>

				<h3 class="biographie">Biographie</h3>
				<div class="row">
					<div class="input-field">
						<textarea id="bio" class="materialize-textarea" name="modify[0][bio]"><?= $_SESSION['auth']->bio; ?></textarea>
						<label for="bio"></label>
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
			<?php if (isset($success)): ?>
        <div class="card-panel green darken-1 white-text"><?=$success?></div>
      <?php endif;?>
		</div>
  </div>
</div>


<?php
require_once 'views/includes/footer.php';
?>