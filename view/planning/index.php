
	<h1 class="ml-5">Overzicht van Games</h1>
		<ul>
			<?php foreach($data as $games){ ?>
				<div class="border bg-white mb-2 w-auto mr-5">
					<h2> <img class="rounded-circle mt-2" width="150" height="150" src="<?php echo URL ?>/images/<?php echo $games['image']; ?>"> <?php echo $games['name']; ?></h2>
							<a class="btn btn-info d-flex justify-content-center" href="<?php echo URL.'planning/info/'.$games['id'] ?>">Info</a>
				</div>	
			<?php } ?>
			</ul>
			
			