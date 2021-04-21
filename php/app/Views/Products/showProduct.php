<?php if (isset($product->id)) { ?>
	<div class="flex flex-col justify-around">
		<div id="<?= $product->id ?>" name="product" class="flex flew-row justify-evenly m-12">
				<div>
					<img src="<?= $product->image ?>" alt="<?= $product->title ?>">
				</div>
				<div class="w-full text-justify pl-24">
					<div class="text-3xl my-6"><?= $product->title ?></div>
					<div class="my-10"><?= $product->description ?></div>
					<div class="mt-24 text-4xl"><?= number_format($product->price, 2) ?> &euro;</div>
				</div>
		</div>
		<?php require_once(dirname(dirname(__FILE__)) .  "/Comments/addComments.php" )?>
	</div>
<?php } else {?>
	<div class="flex flex-col justify-around h-full">
		<div class="text-center text-3xl text-blue-600 m-auto">
			<?= $product ?>
		</div>
	</div>
<?php } ?>

<script src="resources/js/comments.js"></script>