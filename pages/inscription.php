<?php
require_once '../includes/config.php';
require_once '../includes/header.php';

if (isset($_POST['email']) && isset($_POST['password'])) {

    var_dump($_POST);

    // // check if the email is already used for another account
    // $req = $pdo->prepare('SELECT ID FROM users WHERE email = :email');
    // $req->execute(array(
    //     'email' => $_POST['email'],
    // ));
    // $userAlreadyHere = $req->fetch();
    // $req->closeCursor();

    // if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) && !empty($_POST['password']) && !$userAlreadyHere) {

    //     // save user to database
    //     $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
    //     $req2 = $pdo->prepare('INSERT INTO users(email,password) VALUES (:email, :password)');
    //     $req2->execute([
    //         'email' => $_POST['email'],
    //         'password' => $password,
    //     ]);
    //     $req2->closeCursor();

    //     // send welcome email
    //     mail($_POST['email'], 'Bienvenue chez SpendWise', "Bienvenue chez SpendWise, l'application qui vous permets de dépenser malin.");
    //     header('Location: index.php');
    //     exit;
    // } else {
    //     $error = 'Erreur d\'inscription, veuillez réesayer';
    // }
}

?>
<div class="container">
    <div class="card-panel">
        <form class="col s12" action="#" method="post">
            <!-- Location  -->
            <div class="row">
                <div class="input-field col s12">
                    <select>
                        <option value="" disabled selected>Choisissez votre quartier</option>
                        <option value="1">Paris 1</option>
                        <option value="2">Paris 2</option>
                        <option value="3">Paris 3</option>
                        <option value="4">Paris 4</option>
                        <option value="5">Paris 5</option>
                        <option value="6">Paris 6</option>
                        <option value="8">Paris 8</option>
                        <option value="9">Paris 9</option>
                        <option value="10">Paris 10</option>
                        <option value="11">Paris 11</option>
                        <option value="12">Paris 12</option>
                        <option value="13">Paris 13</option>
                        <option value="14">Paris 14</option>
                        <option value="15">Paris 15</option>
                        <option value="16">Paris 16</option>
                        <option value="17">Paris 17</option>
                        <option value="18">Paris 18</option>
                        <option value="19">Paris 19</option>
                        <option value="20">Paris 20</option>
                    </select>
                    <label>Ou habitez vous à Paris ?</label>
                </div>
            </div>
            <!-- Skills -->
            <div class="row">
              <div class="input-field col s12">
                <div class="chips chips-autocomplete">
                </div>
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
                    <input id="first_name" type="email" name="email" class="validate" required>
                    <label for="first_name">Email</label>
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
    </div>
    </form>
</div>
</div>
<?php
require_once '../includes/footer.php';
?>