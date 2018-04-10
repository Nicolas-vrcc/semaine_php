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
} else if ($q === 'connection') {
    $page = 'connection';
} else if ($q === 'inscription') {
    $page = 'inscription';
} else {
    $page = '404';
}

// Includes
require 'views/pages/' . $page . '.php';
