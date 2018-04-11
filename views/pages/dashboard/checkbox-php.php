<?php 
    require_once 'views/includes/db.php';

    $query = $pdo->query('SELECT * FROM powers');
    $powers = $query->fetchAll();

?>
<?php foreach($powers as $_power): ?>
    <input id="<?= $_power->value ?>" class="checkbox" type="checkbox" name="<?= $_power->value ?>" value ="<?= $_power->value ?>">
    <label for="<?= $_power->value ?>" class="checklabel" ><?= $_power->name ?></label>
<?php endforeach; ?>
