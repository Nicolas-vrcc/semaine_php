<?php 
require_once 'views/includes/db.php';
  
$query = $pdo->query('SELECT * FROM powers');
$powers = $query->fetchAll();
 
//Do this only in the case of editing a profile
if(isset($_SESSION)){
  //Transform skills into an array
  $skills = explode(',',$_SESSION['auth']->skills);
  //Trim all the values in the array to prevent white spaces
  $skill = array_map('trim', $skills);
}
 
foreach($powers as $_power):
	//do not disturb the inscription page
  if(isset($_SESSION)){
    $attribute = in_array(trim($_power->name), $skill) ? 'checked' : '';
  }
?>
 
  <input id="<?= $_power->value ?>" class="checkbox" type="checkbox" name="arrayValue[]" value ="<?= $_power->name ?>" <? if(isset($attribute)){echo $attribute;} ?>>
  <label for="<?= $_power->value ?>" class="checklabel" ><?= utf8_decode($_power->name) ?></label>
<?php endforeach; ?>