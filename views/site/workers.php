<h1> <?php echo $varInView; ?> </h1>

<div>
	
		<?php foreach ($arrayInView as $item): ?>
			<p> <a href="/site/view/<?=$item->id?>">
			<?php echo $item->name; echo ' '; 
				  echo $item->surname; echo ' ';
				  echo $item->secondName; echo ' ';
				  echo $item->firedStatus; 
			?>  </a>
			
			</p>
		<?php endforeach ?>	
	
</div>