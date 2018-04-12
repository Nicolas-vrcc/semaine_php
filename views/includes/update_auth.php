<?php
require_once 'views/includes/db.php';
$req = $pdo->prepare('SELECT * FROM users WHERE ID = ?');
$req->execute([$_SESSION['auth']->ID]);
$data =  $req->fetch();
if ($data) {
    unset($_SESSION['auth']);
    $_SESSION['auth'] = $data;
}
// var_dump($_SESSION['auth']);