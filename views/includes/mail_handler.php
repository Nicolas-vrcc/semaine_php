<?php
$idHero = $_GET['id'];

$infoQuery = $pdo->prepare('SELECT email,first_name FROM users where id="' . $idHero . '"');
$infoQuery->execute();
$info = $infoQuery->fetch();

$to = $info->email;
$name = $info->first_name;
$fromEmail = $_SESSION['auth']->email;
$header = "From : $fromEmail";

if (isset($_POST['subject']) && isset($_POST['content'])) {

    $subject = $_POST['subject'];
    $content = $_POST['content'];

    mail($to, $subject, $content, $header);
    
}