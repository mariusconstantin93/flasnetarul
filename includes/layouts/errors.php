<?php if (count($errors) > 0) : ?>
	<div class="p-2">
    <?php foreach ($errors as $error) : ?>
		<?php echo $error ?>
  	<?php endforeach ?>
	</div>
<?php endif ?>