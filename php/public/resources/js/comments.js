$(function() {
	getComments()
	
	$(document).on('submit', '#formAddComment', function(event) {
		event.preventDefault()
		let formData
		if ($("#name").val() != '' && $("#comment").val() != '') {
			formData = {
				name: $("#name").val(),
				comment: $("#comment").val()
			}
		};
		$.ajax({
			url: $(this).attr('action'),
			type: $(this).attr('method'),
			data: formData,
			async: true,
		}).done(function (data) {
			if (data) {
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
	let idProduct = $('div[name="showproduct"]').attr('id')
	if (idProduct != '') {
		$.ajax({
			url: '/get-comments-product-' + idProduct,
			type: 'POST',
			data: {idProduct: idProduct},
			async: true,
		}).done(function(data) {
			if (data) {
				let results = JSON.parse(data)
				$.each(results, function(key, result) {
					let value = displayComments(result)
					$('#showComments').append(value)
				})
				$('#showComments').removeClass('hidden')
				deleteComment()
				focusComment()
				updateComment()
			}
		}).fail(function (data, err) {
			console.log("Une erreur est survenue : ", err)
		})
	}
}

function displayComments(result) {
	return "<div class='items-align my-3 ml-6 bg-green-300 text-white rounded-lg'>" +
				"<div class='flex justify-between m-3 pr-2 border-b'>" +
					"<div class='text-lg font-bold'>" + result.author_name + "</div>" +
					"<div class='text-sm mt-1'>" + result.time_comment + "</div>" +
				"</div>" +
				"<div class='flex flex-row justify-between pt-0 p-3'>" +
					"<div contentEditable='true' id='commentContent-"+ result.id_comment + "' class='w-full text-justify'>" + result.comment + "</div>" +
					"<div class='flex flex-col'>" +
						"<div name='trashComment' id='/delete-comment-product-" + result.id_comment + "' class='float-right mr-1'><img src='resources/icons/trash.svg' width='20px'></div>" +
						"<div name='focusComment' id='focus-comment-" + result.id_comment + "' class='float-right mr-1'><img src='resources/icons/pencil.svg' width='20px'></div>" +
						"<div name='updateComment' id='update-comment-" + result.id_comment + "' class='hidden float-right mr-1'><img src='resources/icons/check.svg' width='20px'></div>" +
					"</div>" +
				"</div>" +
			"</div>"
}

function deleteComment() {
	let comments = $('div[name="trashComment"]')

	$.each(comments, function(key, value) {
		$(value).on('click', function() {
			$.ajax({
				url: this.id,
				type: 'POST',
				async: true,
			}).done(function(data){
				if (data) {
					$('#showComments').children().remove()
					getComments()
				}
			}).fail(function(data, err) {
				console.log("Une erreur est survenue : ", err)
			})
		})
	})
}

function focusComment() {
	let comments = $('div[name="focusComment"]')

	$.each(comments, function(key, value) {
		$(value).on('click', function() {
			const id = this.id.split('-')[2]
			$('#commentContent-' + id).focus()
			$('#update-comment-' + id).removeClass('hidden')
		})
	})
}

function updateComment() {
	let comments = $('div[name="updateComment"]')

	$.each(comments, function(key, value) {
		$(value).on('click', function() {
			const id = this.id.split('-')[2]
			const comment = $('#commentContent-' + id).html()
			$.ajax({
				url: "/" + this.id,
				type: 'POST',
				data: {
					comment: comment
				},
				async: true,
			}).done(function(data){
				if (data == true) {
					$('#get-comment-' + id).addClass('hidden')
				}
			}).fail(function(data, err) {
				console.log("Une erreur est survenue : ", err)
			})

		})
	})
}