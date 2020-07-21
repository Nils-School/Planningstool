<h1>Weet u zeker dat u deze game wilt verwijderen </h1>
<?php
// if ($_SERVER["REQUEST_METHOD"] == "POST"){
//     destroy($data);
// }
// maak een bevestig pagina voor het verwijderen van een mededwerker

?>
<form name="delete" method="post" action="<?=URL?>planning/destroy/<?php echo $data['id'] ?>">
 <input type="hidden" name="id" value="<?= $data ?>"/>
 <input type="submit" value="Delete!">
</form>
<form name="terug" method="post" action="<?=URL?>planning/planning">
 <input type="submit" value="Niet Deleten!">
</form>