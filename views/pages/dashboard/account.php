<?php
session_start();
require_once '../../includes/logged_only.php';
require_once '../../includes/config.php';

require_once '../../includes/header.php';
var_dump($_SESSION['auth'])
?>
<div class="container">
    <div class="row">
        <h1>Logged User</h1>
        <a href="logout.php">Logout</a>
    </div>
</div>
<?php
require_once '../../includes/footer.php';
?>
