<div class="d-flex justify-content-center">
	<form  method="post" action="<?=URL?>planning/storeplan/">

		<div class="form-row align-items-center">
      		<div class="input-group mb-2 mt-2">
        		<div class="input-group-prepend">
          			<div class="input-group-text">Games</div>
        		</div>
        		<select class="form-control" id="exampleFormControlSelect1" name="game">
				<?php
					foreach($data as $games){
						echo "<option value='$games[id]'>$games[name](Spelers:$games[min_players]-$games[max_players])</option>";
					}
				?>
				</select>
			</div>
		</div>

	<div class="form-row align-items-center">
      	<div class="input-group mb-2">
        	<div class="input-group-prepend">
          		<div class="input-group-text">Uitlegger</div>
        	</div>
        	<input type="text" class="form-control" id="inlineFormInputGroup" name="explainer" value="<?php if(isset($_POST['explainer'])){echo $_POST['explainer'];}; ?>">
		</div>
	</div>

	<div class="form-row align-items-center">
      		<div class="input-group mb-2">
        		<div class="input-group-prepend">
          			<div class="input-group-text">Datum</div>
        		</div>
        		<input type="date" class="form-control" id="inlineFormInputGroup" name="date" value="<?php if(isset($_POST['date'])){echo $_POST['date'];}; ?>">
			</div>
	</div>
	<div class="form-row align-items-center">
      		<div class="input-group mb-2">
        		<div class="input-group-prepend">
          			<div class="input-group-text">StartTijd</div>
        		</div>
				<input type="time" class="form-control" id="inlineFormInputGroup" name="start"  value="<?php if(isset($_POST['start'])){echo $_POST['start'];}; ?>">
			</div>	
	</div>
	<div class="form-row align-items-center">
      		<div class="input-group mb-2">
        		<div class="input-group-prepend">
          			<div class="input-group-text">Spelers</div>
        		</div>
				<textarea class="form-control" id="exampleFormControlTextarea1" name="players" rows="3" cols="26"><?php if(isset($_POST['players'])){echo $_POST['players'];}; ?></textarea>
			</div>	
	</div>			
		<input type="submit" class="btn btn-light btn-block" value="Maak aan!">
	</form>
</div>