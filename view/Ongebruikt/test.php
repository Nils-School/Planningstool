	<div class="form-row align-items-center">
      		<div class="input-group mb-2 mt-2">
        		<div class="input-group-prepend">
          			<div class="input-group-text">Games</div>
        		</div>
        		<select class="form-control" id="exampleFormControlSelect1" name="game">
				<?php
					foreach($data[0] as $games){
						$selected = '';
						if($games['id'] == $data[1]['game']){
						$selected = 'selected';
						}
						 
						echo"<option value='$games[id]' ".$selected.">$games[name](Spelers:$games[min_players]-$games[max_players])</option>";
						 
						 }
				?>
				</select>
			</div>
		</div>