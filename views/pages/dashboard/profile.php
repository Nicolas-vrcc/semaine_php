<?php
session_start();
require_once 'views/includes/logged_only.php';
require_once 'views/includes/db.php';
var_dump($_SESSION['auth']);

if (isset($_FILES['avatar']) and !empty($_FILES['avatar']['name'])) {
    $max_size = 3000000;
    $extension_success = array('jpg', 'jpeg', 'png');
    if ($_FILES['avatar']['size'] <= $max_size) {
        $extension_upload = strtolower(substr(strrchr($_FILES['avatar']['name'], '.'), 1));
        if (in_array($extension_upload, $extension_success)) {
            // Name our image
            $img_path = "assets/img/avatars/" . $_SESSION['auth']->ID . "." . $extension_upload;
            // Put image from temporary name to our file
            $result = move_uploaded_file($_FILES['avatar']['tmp_name'], $img_path);
            if ($result) {
                // update the avatar_picture field
                $req = $pdo->prepare('UPDATE users SET avatar_picture = :avatar_picture WHERE ID = :ID');

                $req->execute([
                    'avatar_picture' => $img_path,
                    'ID' => $_SESSION['auth']->ID,
                ]);

            } else {
                $msg = "Erreur lors de l'exportation";
            }
        } else {
            $msg = "Votre photo de profil n'est pas au format jpg, jpeg, ou png ! ";
        }
    } else {
        $msg = "Votre photo de profil est trop lourde !";
    }
}

$req2 = $pdo->prepare('SELECT * FROM users WHERE ID = :ID');
$data = $req2->execute([
    'ID' => $_SESSION['auth']->ID
]);
$data = $req2->fetch();

require_once 'views/includes/header_dashboard.php';

?>
<div class="container">
    <div class="row">
        <div class="col s4">
        <img src="/<?= $data->avatar_picture ?>" alt="profil picture">
        <form action="#" method="POST">
    <div class="file-field input-field">
      <div class="btn">
        <span>File</span>
        <input type="file" name='avatar'>
      </div>
      <div class="file-path-wrapper">
        <input class="file-path validate" type="text">
      </div>
    </div>
  </form>
    </div>
    <div class="col s1">
    </div>
    <div class="col s7">
        <p>Localiasation :<?= $data->location ?></p>
        <p>Nom : <?= $data->first_name ?></p>
        <p>Bio : <?= $data->bio ?>
        <p>Compétences : <? $data->skills ?></p>
    </div>
    </div>
</div>
<?php
require_once 'views/includes/footer.php';
?>