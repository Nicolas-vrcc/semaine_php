<?php
session_start();
require_once 'views/includes/logged_only.php';
require_once 'views/includes/db.php';

var_dump($_SESSION['auth']);
require_once 'views/includes/header_dashboard.php';
?>
<div class="container">
    <div class="row">
        <h1>Logged User</h1>
        <a href="/dashboard/logout">Logout</a>
    </div>
</div>
<?php
require_once 'views/includes/footer.php';
?>
