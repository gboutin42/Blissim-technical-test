<div class="m-5 grid grid-cols-3 gap-5">
    <?php foreach($products as $product) {?>
        <div class="flex flex-col justify-between border-4 border-blue-400 rounded-3xl text-center text-white w-full mx-auto my-5">
                <div class="flex h-full">
                    <button class="h-0">
                        <img name="icon" class="top-16 right-16" src="resources/icons/comment-icon.svg" alt="comment-icon" width="25px">
                    </button>
                    <img class="m-auto my-10" src="<?= $product->image ?>" alt="<?= $product->title ?>" width="150px">
                </div>
                <div>
                    <h2 class="text-2xl bg-blue-400"><?= $product->title ?></h2>
                    <div class="text-xl bg-blue-400 rounded-b-2xl mt-auto"><?= $product->price ?>&nbsp;&euro;</div>
                </div>
        </div>
    <?php } ?>
</div>

<script src="resources/js/products.js"></script>
