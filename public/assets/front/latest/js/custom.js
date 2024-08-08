$(document).ready(function () {
	setTimeout(function () {
		$('.alert, .text-success', 'text-danger, .alert-success, .alert-danger').fadeOut('slow');
	}, 5000);

	$('#autosuggestfor').keypress(function (event) {
		if (event.keyCode == 13) {
			event.preventDefault();
		}
	});

	$('.add_reviewtesti').on('click', function (e) {
		e.preventDefault();
		var data = {
			'name': $('.name').val(),
			'address': $('.address').val(),
			'service_select': $('.service_select').val(),
			's_desc': $('.desc').val(),
		}
		$.ajaxSetup({
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			}
		});

		$.ajax({
			type: "POST",
			url: "/review",
			data: data,
			dataType: "json",
			success: function (response) {
				if (response.status == 400) {
					$('#save_msg').html("");
					$('#save_msg').addClass('alert-danger');
					$.each(response.errors, function (key, err_value) {
						$('#save_msg').append('<li>' + err_value + '</li>');
					});
					setTimeout(function () {
						$('#save_msg').fadeOut('slow');
					}, 4000);
					$('#review').modal('show');
					$('.name').focus();
				} else {
					$('#save_msg').html("");
					$('#save_msg').addClass('alert-success');
					$('#save_msg').html(response.message);
					$("#cform1")[0].reset();
					setTimeout(function () {
						$('#reviewtesti').modal('hide');
						location.reload();
					}, 3000);
				}
			}
		});
	});

	$('.add_review').on('click', function (e) {
		e.preventDefault();
		var data = {
			'name': $('.name').val(),
			'address': $('.address').val(),
			'service_select': $('.service_select').val(),
			's_desc': $('.desc').val(),
		}
		$.ajaxSetup({
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			}
		});

		$.ajax({
			type: "POST",
			url: "/review",
			data: data,
			dataType: "json",
			success: function (response) {
				if (response.status == 400) {
					$('#save_msgList').html("");
					$('#save_msgList').addClass('alert-danger');
					$.each(response.errors, function (key, err_value) {
						$('#save_msgList').append('<li>' + err_value + '</li>');
					});
					setTimeout(function () {
						$('#save_msgList').fadeOut('slow');
					}, 4000);
					$('#review').modal('show');
					$('.name').focus();
				} else {
					$('#save_msgList').html("");
					$('#save_msgList').addClass('alert-success');
					$('#save_msgList').html(response.message);
					$("#cform")[0].reset();
					setTimeout(function () {
						$('#review').modal('hide');
						location.reload();
					}, 3000);
				}
			}
		});
	});
});