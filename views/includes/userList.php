<?php
require_once 'functions.php';
  // case where the user performs only a simple query
    if (isset($_GET['query'])) {

        $querySearch = $pdo->prepare('SELECT first_name, ID, location, skills, latitude, longitude, bio, avatar_picture FROM users WHERE first_name LIKE :first_name OR skills LIKE :skills OR bio LIKE :bio');
        $querySearch->bindValue(':first_name', '%' . $_GET['query'] . '%', PDO::PARAM_STR);
        $querySearch->bindValue(':skills', '%' . $_GET['query'] . '%', PDO::PARAM_STR);
        $querySearch->bindValue(':bio', '%' . $_GET['query'] . '%', PDO::PARAM_STR);
        $querySearch->execute();
        $data = $querySearch->fetchAll();
 
    }
    else{
// case where the user doesn't perform any
$res = $pdo->query('SELECT first_name, ID, location, skills, latitude, longitude, bio, avatar_picture FROM users');
$data = $res->fetchAll();

}

if(isset($_GET['selectCategory']) && isset($_GET['query'])){
        
    $category = $_GET['selectCategory'];
    // case where user select a category

    $queryCategory = $pdo->prepare('SELECT first_name, ID, location, skills, latitude, longitude, bio, avatar_picture FROM users WHERE  skills LIKE :skills OR bio LIKE :bio');
    $queryCategory->bindValue(':skills', '%' .$category . '%', PDO::PARAM_STR);
    $queryCategory->bindValue(':bio', '%' . $category . '%', PDO::PARAM_STR);
    $queryCategory->execute();
    $data = $queryCategory->fetchAll();

    $selectOption = $_GET['selectCategory'];
   
}



// deletes the user from the displayed users list
$data = unsetValue($data, 'ID', $_SESSION['auth']->ID);


for($i= 0; $i < count($data); $i++){
  // gets the distance between two users
  $data[$i]->distance = distance($_SESSION['auth']->latitude, $_SESSION['auth']->longitude, $data[$i]->latitude, $data[$i]->longitude);
}

// sorts user list according to distance from user
function cmp($a, $b)
{
    if ($a->distance == $b->distance) {
        return 0;
    }
    return ($a->distance < $b->distance) ? -1 : 1;
}

usort($data, "cmp");


?>
<?php foreach ($data as $user): ?>
    <?php
// create an array of skills
$skillsArray = explode(",", $user->skills);
?>
            <div class="card-panel grey lighten-5 scrollAppear">
                <div class="row valign-wrapper">
                <div class="col s2">
                <img src=<?=$user->avatar_picture?> alt="user_picture" class="circle responsive-img">
                </div>
                <div class="col s1"></div>
                <div class="col s9">
                <p>à <?=$user->distance?> Kilomètres</h4>
                <h5><?=$user->first_name?></h5>
                <?php foreach ($skillsArray as $skill): ?>
                <div class="checklabel"><?=utf8_decode($skill)?></div>
                <?php endforeach;?>
                <p><?=$user->bio?></p>
                 <a href='hero_profile?id=<?=$user->ID?>' class="btn-floating btn-large waves-effect waves-light float-right"><i class="material-icons">arrow_forward</i></a>
                </div>
                </div>
            </div>
<?php endforeach;?>
<?php if(empty($data)): ?>
<div class="card-panel teal lighten-2">Aucun résultat pour cette recherche.</div>
<?php endif ?>

<?php

