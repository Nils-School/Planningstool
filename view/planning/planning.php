

<?php
foreach ($data as $games) {
    
    $timestamp = strtotime($games['start']) + 60*$games['play_minutes']+60*$games['explain_minutes'] ;
    $time = date('H:i:s', $timestamp);
    ?>
<div class=" container border bg-white mb-2 w-auto ">
<h2> <img class="rounded-circle mt-2" width="150" height="150" src="<?php echo URL ?>/images/<?php echo $games['image']; ?>"> <?php echo $games['name']; ?></h2>
    <div class="stats">
        <ul class="fa-ul">
            <li><i class="item fas fa-calendar"></i> Datum: <?php echo $games['date'];?> <i class="item fas fa-clock"></i> Start: <?php echo $games['start'];?></li>
            <li><i class="item fas fa-user-clock"></i> Speeltijd: <?php echo $games['play_minutes'];?> minuten <i class="item fas fa-user-clock"></i> Spel stopt om: <?php echo $time ?></li>
            <li><i class="item fas fa-dice"></i> Uitlegger: <?php echo $games['explainer'];?> </li>
            </br>
        </ul>
    </div>
        <div class="btn-group d-flex justify-content-center" role="group">
            <a href=<?php echo URL.'planning/planninginfo/'.$games['id'] ?> type="button" class=" btn btn-info">Info</a>
            <a href=<?php echo URL.'planning/editplanning/'.$games['id'] ?> type="button" class="btn btn-warning">Bewerk</a>
            <a href=<?php echo URL.'planning/deleteplanning/'.$games['id'] ?> type="button" class="btn btn-danger">Verwijder</a>
        </div>
        
      
</div>
<?php
}
?>	


	
			
			