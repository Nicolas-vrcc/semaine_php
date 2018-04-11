<?php 
    require_once 'views/includes/db.php';

    $query = $pdo->query('SELECT * FROM powers');
    $powers = $query->fetchAll();

?>
<?php foreach($powers as $_power): ?>
    <input id="<?= $_power->value ?>" class="checkbox" type="checkbox" name="arrayValue[]" value ="<?= $_power->name ?>">
    <label for="<?= $_power->value ?>" class="checklabel" ><?= utf8_decode($_power->name) ?></label>
<?php endforeach; ?>
