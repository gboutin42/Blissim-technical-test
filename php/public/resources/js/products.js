let products = $('div[name="product"]')

$.each(products, function(key, product) {
    $("#"+product.id).on("click", function () {
        const url = "/" + this.id
        window.location = url
    })
})