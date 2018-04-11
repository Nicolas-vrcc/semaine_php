<?php
$query = $pdo->query('SELECT * FROM powers');
$powers = $query->fetchAll();
?>
<?php foreach($powers as $power): ?>
<option value=<?= $power->id ?>><?= utf8_decode($power->name) ?></option>
<?php endforeach ?>