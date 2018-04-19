<?php
$idHero = $_GET['id'];

$infoQuery = $pdo->prepare('SELECT email,first_name FROM users where id="' . $idHero . '"');
$infoQuery->execute();
$info = $infoQuery->fetch();

$to = $info->email;
$name = $info->first_name;
$fromEmail = $_SESSION['auth']->email;
$header = "From : $fromEmail".  "\r\n".
"Reply-To: $fromEmail" . "\r\n" .
"X-Mailer: PHP/" . phpversion();

if (isset($_POST['subject']) && isset($_POST['content'])) {

    $subject = $_POST['subject'];
    $content = $_POST['content'];

    mail($to, $subject, $content, $header);

    // creates mission
    $req = $pdo->prepare('INSERT INTO missions(ID_hero, ID_helped, status) VALUES (:ID_hero, :ID_helped, :status)');
    $data = $req->execute([
    'ID_hero' => $_SESSION['auth']->ID,
    'ID_helped' => $_GET['id'],
    'status' => 'waiting'
    ]);
    header('Location: /dashboard/success');
}