<?php
session_start();
require_once 'views/includes/db.php';
if(isset($_SESSION['auth'])){
    header('Location: dashboard/account');
}

if (isset($_POST['email']) && isset($_POST['password'])) {
    $req = $pdo->prepare('SELECT * FROM users WHERE email = :email');
    $req->execute(['email' => $_POST['email']]);
    $user = $req->fetch();
    if($user){
    if (isset($user) && password_verify($_POST['password'], $user->password)) {
        $_SESSION['auth'] = $user;
        header('Location: dashboard/account');
        exit();
    } else {
        $error = 'Email ou mot de passe incorrect';
    }
}else{
    $error = 'Email ou mot de passe incorrect';
}
}
require_once 'views/includes/header.php'
?>
<div class="container">
    <div class="card-panel">
        <form class="col s12" action="#" method="post">
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
            <?php if (isset($error)): ?>
                <div class="card-panel red darken-1 white-text"><?=$error?>.</div>
                <?php endif;?>
            <!-- Sumbit btn -->
            <div class="row">
                <div class="input-field col s12">
                  <button class="btn-large waves-effect waves-light" type="submit" name="action">Submit
                    <i class="material-icons right">send</i>
                  </button>
                </div>
            </div>
        </form>
    </div>
</div>
<?php
require_once 'views/includes/footer.php';
?>

