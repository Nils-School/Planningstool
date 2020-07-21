<h1>Weet u zeker dat u <?php $data['name'] ?> wilt verwijderen </h1>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST"){
    destroy($id);
}
// maak een bevestig pagina voor het verwijderen van een mededwerker
?>
<form name="update" method="post" action="<?=URL?>planning/delete/<?php echo $data['id'] ?>">
    <input type="hidden" name="id" value="<?=$planning['id'] ?>"/>
    <input type="submit" value="Delete!">
</form>
