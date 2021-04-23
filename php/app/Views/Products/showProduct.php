<?php if (isset($product->id)) { ?>
	<div>
		<a href="/products" class="flex flex-row items-center"><img src="resources/icons/arrow-left.svg" alt="icon-arrow-left" height="50px" width="50px">
		<span class="text-xl">Retour aux produits</span></a>
	</div>
	<div class="flex flex-col justify-around">
		<div id="<?= $product->id ?>" name="showproduct" class="flex flew-row justify-evenly m-12">
				<div>
					<img src="<?= $product->image ?>" alt="<?= $product->title ?>">
				</div>
				<div class="w-full text-justify pl-24">
					<div class="text-3xl my-6 font-extrabold"><?= $product->title ?></div>
					<div class="my-10"><?= $product->description ?></div>
					<div class="mt-24 text-4xl font-semibold"><?= number_format($product->price, 2) ?> &euro;</div>
				</div>
		</div>
		<div class="flex flex-row">
			<?php require_once(dirname(dirname(__FILE__)) . "/Comments/showComments.php" )?>
			<?php require_once(dirname(dirname(__FILE__)) . "/Comments/addComments.php" )?>
		</div>
	</div>
<?php } else {?>
	<div class="flex flex-col justify-around h-full">
		<div class="text-center text-3xl text-blue-600 m-auto">
			<?= $product ?>
		</div>
	</div>
<?php } ?>
