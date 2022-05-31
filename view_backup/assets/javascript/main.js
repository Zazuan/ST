$(document).ready(function(){


$(document).on('change', '#select_all', function() {
	console.log("select_all clicked");
 	var checkboxes = $(this).closest('form').find(':checkbox');
 	console.log(checkboxes)
 	checkboxes.prop('checked', $(this).is(':checked'));
 	checkboxes.addClass('show');
});

//Editing page/category/post
//	TODO:

//Refresh data
//	TODO: add category/post
function sendPost () {
	$.ajax({
		url: '/admin/settings/',
		type: 'POST',
		data: {getInfo : 'getInfo'},
		beforeSend: function() {
		    $('.modal-buttons_p-save').text('Сохранено');
		},
		complete: function() {
		    $("#modal__create-page input[name='title']").val("");
			$('.modal-buttons_p-save').text('Сохранить');
		},
		success: function(data){
			console.log('post to update was sent');
			$("#pages__data-js").html(data);
			hideModal();
		},
		error: function(xhr, ajaxOptions, thrownError){
			alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
		}
	});
	return false;
};



});