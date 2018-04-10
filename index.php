<?php
// Routing
if(!isset($_GET['q'])){
$q = '';
}else{
$q = $_GET['q'];
}


if ($q === '') {
    $page = 'home';
} else if ($q === 'contact') {
    $page = 'contact';
} else if ($q === 'connexion') {
    $page = 'connexion';
} else if ($q === 'inscription') {
    $page = 'inscription';
} else if ($q === 'dashboard/account') {
    $page = 'dashboard/account';
} else if ($q === 'dashboard/logout') {
    $page = 'dashboard/logout';
} else if ($q === 'dashboard/profile') {
    $page = 'dashboard/profile';
} else if ($q === 'hero_profile') {
    $page = 'hero_profile';
}
 else {
    $page = '404';
}

// Includes
require 'views/pages/' . $page . '.php';
