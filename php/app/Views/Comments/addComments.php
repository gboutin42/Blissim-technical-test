<div class="w-3/6">
	<form id="formAddComment" method="post" action="/add-comment-product-<?= $product->id ?>" class="flex flex-col m-6 p-4 rounded-xl bg-green-400 text-blue-600 clear-right">
		<input type="text" name="name" id="name" class="p-2 m-2" placeholder="Votre Nom">
		<textarea name="comment" id="comment" cols="30" rows="5" class="p-2 m-2" placeholder="Ajouter votre commentaire ici..."></textarea>
		<input type="submit" class="bg-green-300 hover:bg-green-800 text-white font-bold py-2 px-4 rounded m-auto" value="Ajouter un commentaire">
	</form>
</div>
