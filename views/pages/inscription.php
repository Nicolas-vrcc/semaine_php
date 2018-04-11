<?php
require_once 'views/includes/db.php';

if (isset($_POST['email']) && isset($_POST['password']) && isset($_POST['location'])) {


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

    if ($data) {
        $latitude = $data->results[0]->geometry->location->lat;
        $longitude = $data->results[0]->geometry->location->lng;


    // check if the email is already used for another account
    $req = $pdo->prepare('SELECT ID FROM users WHERE email = :email');
    $req->execute(array(
        'email' => $_POST['email'],
    ));
    $userAlreadyHere = $req->fetch();
    $req->closeCursor();

    if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) && !empty($_POST['password']) && !$userAlreadyHere) {

        // save user to database
        $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
        $req2 = $pdo->prepare('INSERT INTO users(email, password, first_name, location, skills, latitude, longitude) VALUES (:email, :password, :first_name, :location, :skills, :latitude, :longitude)');
        $req2->execute([
            'email' => $_POST['email'],
            'password' => $password,
            'first_name' => $_POST['first_name'],
            'location' => $_POST['location'],
            'skills' => $checkBoxValue,
            'latitude' => $latitude,
            'longitude' => $longitude
        ]);
        $req2->closeCursor();

        // send welcome email
        mail($_POST['email'], 'Bienvenue chez Super Voisin', "Bienvenue chez SpendWise, l'application qui vous permets de dépenser malin.");
        header('Location: /connection');
        exit;
    } else {
        $error = 'Erreur d\'inscription, veuillez réesayer';
    }
}else{
    $error = 'Localisation Incorrecte, réésayez';
}
}
require_once 'views/includes/header.php'
?>
<div class="container">
    <div class="card-panel">
        <form class="col s12" action="#" method="post">
            <!-- Location  -->
            <div class="row">
                <div class="input-field col s12">
                     <input id="last_name" type="text" name="location" class="validate autocompleted" placeholder="" required>
                    <label for="last_name">Votre Localisation</label>
                </div>
            </div>
            <!-- Skills -->
            <div class="row">
              <div class="input-field col s12">
								<p>
								<label for="info">
                                    <input id="info" type="checkbox" class="checkbox" value='informatique' name="arrayValue[]" />
									<span>Informatique</span>
								</label>
								</p>
								<p>
								<label>
                      <input id="test" type="checkbox" class="checkbox" value='babysitting' name="arrayValue[]" />
											<span>Babysitting</span>
								</label>
								</p>
              </div>
            </div>
            <!-- First Name  -->
            <div class="row">
                <div class="input-field col s12">
                    <input id="first_name" type="text" name="first_name" class="validate">
                    <label for="first_name">Prénom</label>
                </div>
            </div>
             <!-- Contact  -->
            <div class="row">
                <div class="input-field col s6">
                    <input id="email" type="email" name="email" class="validate" required>
                    <label for="email">Email</label>
                </div>
                <div class="input-field col s6">
                    <input id="mdp" type="password" name="password" class="validate" required>
                    <label for="mdp">Mot de Passe</label>
                </div>
            </div>
            <!-- Sumbit btn -->
            <div class="row">
                <div class="input-field col s12">
                  <button class="btn-large waves-effect waves-light" type="submit" name="action">Submit
                    <i class="material-icons right">send</i>
                  </button>
                </div>
            </div>
            <?php if (isset($error)): ?>
            <div class="card-panel red darken-1 white-text"><?=$error?></div>
            <?php endif;?>
    </div>
    </form>
</div>
</div>
<?php
require_once 'views/includes/footer.php'
?>
