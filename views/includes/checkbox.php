<?php 
require_once 'views/includes/db.php';
	
$query = $pdo->query('SELECT * FROM powers');
$powers = $query->fetchAll();

$skills = explode(',',$_SESSION['auth']->skills);
?>

<?php foreach($powers as $_power): 
/* 		if(in_array($_power->name, $skills)){
			$attribute = 'checked';
			continue;
		} else {
			$attribute = '';
		} */
	?>

  <input id="<?= $_power->value ?>" class="checkbox" type="checkbox" name="arrayValue[]" value ="<?= $_power->name ?>">
  <label for="<?= $_power->value ?>" class="checklabel" ><?= utf8_decode($_power->name) ?></label>
<?php endforeach; ?>
