$(function() {
	getComments()
	
	$(document).on('submit', '#formAddComment', function(event) {
		event.preventDefault()
		let formData = {
			name: $("#name").val(),
			comment: $("#comment").val()
		}
		$.ajax({
			url: $(this).attr('action'),
			type: $(this).attr('method'),
			data: formData,
			async: true,
		}).done(function (data) {
			if (data) {
				console.log("here")
				$('#showComments').removeClass('hidden')
				$("#showComments div").remove()
				getComments()
			}
		}).fail(function (data, err) {
			console.log("Une erreur est survenue : ", err)
		})
	})
})

function getComments() {
	let idProduct = $('div[name="showproduct"').attr('id')
	if (idProduct != '') {
		$.ajax({
			url: '/get-comments-product-' + idProduct,
			type: 'POST',
			data: {idProduct: idProduct},
			async: true,
		}).done(function(data) {
			if (data) {
				let results = JSON.parse(data)
				console.log(results)
				$.each(results, function(key, result) {
					let value = "<div class='flex flex row items-align my-3 mx-6 bg-green-300 text-white rounded-lg'>" +
									"<div class='flex, flex-col m-3 border-r pr-2'>" +
										"<div class='text-lg border-b font-bold'>" + result.author_name + "</div>" +
										"<div class='text-sm'>" + result.time_comment + "</div>" +
									"</div>" +
									"<div class='m-3 text-justify'>" + result.comment + "</div>" +
									"<div class='m-3 text-justify'></div>" +
								"</div>"
					$('#showComments').append(value)
				})
				$('#showComments').removeClass('hidden')
			}
		}).fail(function (data, err) {
			console.log("Une erreur est survenue : ", err)
		})
	}
}