	
	<h1>Persoon wijzigen</h1>
	<form name="update" method="post" action="<?=URL?>planning/update/<?php echo $data['id'] ?>"/>
	    <input type="hidden" name="id" value="<?=$planning["id"] ?>"/>
	    <!--  Bouw hier de rest van je formulier   -->
		<?php 
		
		$Err = '';
		if ($_SERVER["REQUEST_METHOD"] == "POST"){
			if (
				empty($_POST["name"]) or empty($_POST["image"]) or empty($_POST["description"]) or empty($_POST["expansions"]) or empty($_POST["skills"]) or empty($_POST["url"]) or empty($_POST["youtube"]) or empty($_POST["min_players"]) or empty($_POST["max_players"]) or empty($_POST["play_minutes"]) or empty($_POST["explain_minutes"]))
				{
				$Err = "Veld is verplicht";
			}
			else{
				updateAction($_POST,$id);
				
			}
		}
		?>
		<form>
		Naam:<br><input type="text" name="name" value="<?php echo $data['name'] ?>"><span class="error">* <?php echo $Err;?></span></br>
		Plaatje:<br><input type="text" name="image" value="<?php echo $data['image'] ?>"><span class="error">* <?php echo $Err;?></span></br>
		Beschrijving:<br><textarea  name="description" rows="5" cols="40"><?php echo $data['description'] ?></textarea>*<?php echo $Err;?></span></br>
		Uitbreiding:<br><input type="text" name="expansions" value="<?php echo $data['expansions'] ?>"><span class="error">* <?php echo $Err;?></span></br>
		Skills:<br><input type="text" name="skills" value="<?php echo $data['skills'] ?>"><span class="error">* <?php echo $Err;?></span></br>
		Link:<br><input type="text" name="url" value="<?php echo $data['url'] ?>"><span class="error">* <?php echo $Err;?></span></br>
		Youtube:<br><input type="text" name="youtube" value="<?php echo $data['youtube'] ?>"><span class="error">* <?php echo $Err;?></span></br>
		Minimaal spelers:<br><input type="number" name="min_players" value="<?php echo $data['min_players'] ?>"><span class="error">* <?php echo $Err;?></span></br>
		Maximaal spelers:<br><input type="number" name="max_players" value="<?php echo $data['max_players'] ?>"><span class="error">* <?php echo $Err;?></span></br>
		Speeltijd:<br><input type="number" name="play_minutes" value="<?php echo $data['play_minutes'] ?>"><span class="error">* <?php echo $Err;?></span></br>
		Uitlegtijd:<br><input type="number" name="explain_minutes" value="<?php echo $data['explain_minutes'] ?>"><span class="error">* <?php echo $Err;?></span></br>
		<input type="submit" value="Update!">
	</form>