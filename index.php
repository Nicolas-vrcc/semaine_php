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
} else if ($q === 'dashboard/hero_profile') {
    $page = 'dashboard/hero_profile';
} else if ($q === 'dashboard/edit_profile') {
    $page = 'dashboard/edit_profile';
} else if ($q === 'dashboard/success') {
    $page = 'dashboard/success';
} else if ($q === 'dashboard/abort') {
    $page = 'dashboard/abort';
}  else if ($q === 'dashboard/pay') {
    $page = 'dashboard/pay';
}  else if ($q === 'dashboard/error') {
    $page = 'dashboard/error';
} 
 else {
    $page = '404';
}

// Includes
require 'views/pages/' . $page . '.php';
