<h1> <?php echo $varInView; ?> </h1>

<div>
	
		<?php foreach ($arrayInView as $item): ?>
			<p> <a href="/site/view/<?=$item->id?>">
			<?php echo $item->post;  ?>  </a>
			
			</p>
		<?php endforeach ?>	
	
</div>