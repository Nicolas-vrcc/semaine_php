<?php
require_once 'views/includes/db.php';

// creates missing
$req = $pdo->prepare('INSERT INTO missions VALUES (:ID_hero, :ID_helped, :status)');
$data = $req->execute([
  'ID_hero' => $_SESSION['auth']->ID,
  'ID_helped' => $_GET['id'],
  'status' => 'waiting'
]);

// // display list of missions where you're the hero and that are still not done
// $req = $pdo->prepare('SELECT * FROM missions WHERE ID_hero = :ID_connected_user AND status = :status');
// $data = $req->execute([
//   'ID_connected_user' => $_SESSION['auth']->ID,
//   'status' => 'waiting'
// ]);

// // display list of missions where you're helped for and that are still not done
// $req = $pdo->prepare('SELECT * FROM missions WHERE ID_helped = :ID_connected_user AND status = :status');
// $data = $req->execute([
//     'ID_connected_user' => $_SESSION['auth']->ID,
//     'status' => 'waiting'
// ]);

?>