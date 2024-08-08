$(function () {
	"use strict";

	$(document).ready(function () {
		$('#example').DataTable();
	});

	CKEDITOR.replaceAll('descript');

	$('.numeric').keyup(function () {
		var val = $(this).val();
		if (isNaN(val)) {
			val = val.replace(/[^0-9\.]/g, '');
			if (val.split('.').length > 2)
				val = val.replace(/\.+$/, "");
		}
		$(this).val(val);
	});

	setTimeout(function () {
		$('.alert, .text-success').fadeOut('slow');
	}, 5000);

	// on change service category dependant sub category
	$('select[name="service_category"]').on('change', function () {
		var cat_id = $(this).val();
		if (cat_id) {
			$.ajax({
				url: "/admin/Service/onChangeSubCategory/" + cat_id,
				type: "GET",
				dataType: "json",
				success: function (data) {
					$('select[name="service_subcat"]').empty();
					$.each(data, function (key, value) {
						$('select[name="service_subcat"]').append('<option value="' + value.id + '">' + value.category_name + '</option>');
					});
				}
			});
		} else {
			$('select[name="service_subcat"]').empty();
		}
	});

	$(document).on("click", ".ticket_id", function () {
		var DataId = $(this).data('id');
		$(".modal-body #hideee").val(DataId);
		$('#assign_tkt').modal('show');
	});

	//assign specific ticket to admin user

	$('.assign_ticket').on('click', function (e) {
		var data = {
			'tkt_id': $('input[name=data_id]').val(),
			'user_select': $('.user_select option:selected').val()
		}

		$.ajaxSetup({
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			}
		});

		$.ajax({
			type: "POST",
			url: "/admin/Ticket/assignTo/",
			data: data,
			dataType: "json",
			success: function (response) {
				$('#status_success').addClass('alert border-0 bg-light-success alert-dismissible fade show py-2');
				$('#status_success').html(response.success);
				$('#assign_tkt').modal('hide');
				setTimeout(function () {
					$('.alert, .bg-light-success').fadeOut('slow');
					location.reload();
				}, 1500);
			}
		});
	});

	// service status active and deactive
	$('.service_status').change(function () {
		var status = $(this).prop('checked') == true ? 1 : 0;
		var service_id = $(this).data('id');

		$.ajaxSetup({
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			}
		});

		$.ajax({
			type: "POST",
			url: "/admin/Service/changeStatus",
			data: {
				'status': status,
				'service_id': service_id
			},
			dataType: "json",
			success: function (data) {
				$('#status_success').addClass('alert text-success border-0 bg-light-success alert-dismissible fade show py-2');
				$('#status_success').text(data.success);
				$("#status_success").removeAttr("style");
				setTimeout(function () {
					$('.alert, .bg-light-success').fadeOut('slow');
				}, 500);
			}
		});
	});

	// testimonial status active and deactive
	$('.testi_status').change(function () {
		var status = $(this).prop('checked') == true ? 1 : 0;
		var testi_id = $(this).data('id');

		$.ajaxSetup({
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			}
		});

		$.ajax({
			type: "POST",
			url: "/admin/Testimonial/changeStatus",
			data: {
				'status': status,
				'testi_id': testi_id
			},
			dataType: "json",
			success: function (data) {
				$('#status_success').addClass('alert text-success border-0 bg-light-success alert-dismissible fade show py-2');
				$('#status_success').text(data.success);
				$("#status_success").removeAttr("style");
				setTimeout(function () {
					$('.alert, .bg-light-success').fadeOut('slow');
				}, 500);
			}
		});
	});

	// service checked or unchecked
	$('.checked_service').change(function () {
		var checked = $(this).prop('checked') == true ? 1 : 0;
		var service_id = $(this).data('id');
		$.ajaxSetup({
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			}
		});

		$.ajax({
			type: "POST",
			url: "/admin/Service/changeCheckedService",
			data: {
				'checked': checked,
				'service_id': service_id
			},
			dataType: "json",
			success: function (data) {
				$('#checked_success').addClass('alert text-success border-0 bg-light-success alert-dismissible fade show py-2');
				$('#checked_success').text(data.success);
				$("#checked_success").removeAttr("style");
				setTimeout(function () {
					$('.alert, .bg-light-success').fadeOut('slow');
				}, 500);
			}
		});
	});

	// Post status change
	$('.post_checked').change(function () {
		var checked = $(this).prop('checked') == true ? 1 : 0;
		var post_id = $(this).data('id');
		$.ajaxSetup({
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			}
		});

		$.ajax({
			type: "POST",
			url: "/admin/Blog/changeCheckedPost",
			data: {
				'checked': checked,
				'post_id': post_id
			},
			dataType: "json",
			success: function (data) {
				$('#status_success').addClass('alert text-success border-0 bg-light-success alert-dismissible fade show py-2');
				$('#status_success').text(data.success);
				$("#status_success").removeAttr("style");
				setTimeout(function () {
					$('.alert, .bg-light-success').fadeOut('slow');
				}, 500);
			}
		});
	});

	// Service category status changed
	$('.cat_service_status').change(function () {
		var status = $(this).prop('checked') == true ? 1 : 0;
		var service_cat_id = $(this).data('id');

		$.ajaxSetup({
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			}
		});

		$.ajax({
			type: "POST",
			url: "/admin/ServiceCategory/changeStatus/" + service_cat_id,
			data: {
				'status': status,
				'service_cat_id': service_cat_id
			},
			dataType: "json",
			success: function (data) {
				location.reload();
				$('#status_success').addClass('alert text-succes border-0 bg-light-success alert-dismissible fade show py-2');
				$('#status_success').text(data.success);
				$("#status_success").removeAttr("style");
				setTimeout(function () {
					$('.alert, .bg-light-success').fadeOut('slow');
				}, 500);
			}
		});
	});

	//Ticket status Opened or Closed
	$('.checked_ticket').change(function () {
		$(this).blur();
		var prev_val = $(this).prop('checked') == true ? 'Opened' : 'Closed';
		var success = confirm('Do you want to Mark this Ticket as complete ?');
		if (success) {
			var data = {
				'status': prev_val,
				'ticket_id': $(this).data('id'),
			}
			$.ajaxSetup({
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
					'_method': 'POST'
				}
			});
			$.ajax({
				type: "POST",
				url: "/admin/Ticket/changeStatus",
				data: data,
				dataType: "json",
				success: function (data) {
					$('#status_success').addClass('alert text-success border-0 bg-light-success alert-dismissible fade show py-2');
					$('#status_success').text(data.success);
					$("#status_success").removeAttr("style");
					setTimeout(function () {
						$('.alert, .bg-light-success').fadeOut('slow');
					}, 500);
					location.reload();
				}
			});
		} else {
			$(this).val(prev_val);
			return false;
		}

	});

	//getCustomer Address invoice create
	$('select[name="cust_name"]').on('change', function () {
		var cust_id = $('select[name="cust_name"]').find(":selected").val();
		if (cust_id) {
			$.ajax({
				url: "/admin/Invoice/getCustomerAdd/" + cust_id,
				type: "GET",
				dataType: "json",
				success: function (data) {
					$.each(data, function (key, value) {
						$('#address').val(value.add1 + ' ' + value.add2);
						$('#gst').val(value.gst);
					});
				}
			});
		} else {
			$('select[name="cust_name"]').empty();
		}
	});

	//Single Service view modal
	$('.getssData').click(function () {
		var modal = $('#ViewSingleServiceModal').modal('show');
		modal.find("#ssdetail").html($(this).data("name"));
		modal.find("#ssname").html($(this).data("name"));
		modal.find("#ssemail").html($(this).data("email"));
		modal.find("#ssmob").html($(this).data("mobile"));
		modal.find("#ssmsg").html($(this).data("msg"));
		modal.find("#sspage").html($(this).data("page"));
	});

	//contact view modal
	$('.getcData').click(function () {
		var modal = $('#ViewContactModal').modal('show');
		modal.find("#cdetail").html($(this).data("name"));
		modal.find("#cname").html($(this).data("name"));
		modal.find("#cemail").html($(this).data("email"));
		modal.find("#cmob").html($(this).data("mobile"));
		modal.find("#cmsg").html($(this).data("msg"));
	});

	// Tooltips
	$(function () {
		$('[data-bs-toggle="tooltip"]').tooltip();
	})

	$(".nav-toggle-icon").on("click", function () {
		$(".wrapper").toggleClass("toggled")
	})

	$(".mobile-toggle-icon").on("click", function () {
		$(".wrapper").addClass("toggled")
	})

	$(function () {
		for (var e = window.location, o = $(".metismenu li a").filter(function () {
			return this.href == e
		}).addClass("").parent().addClass("mm-active"); o.is("li");) o = o.parent("").addClass("mm-show").parent("").addClass("mm-active")
	})

	$(".toggle-icon").click(function () {
		$(".wrapper").hasClass("toggled") ? ($(".wrapper").removeClass("toggled"), $(".sidebar-wrapper").unbind("hover")) : ($(".wrapper").addClass("toggled"), $(".sidebar-wrapper").hover(function () {
			$(".wrapper").addClass("sidebar-hovered")
		}, function () {
			$(".wrapper").removeClass("sidebar-hovered")
		}))
	})

	$(function () {
		$("#menu").metisMenu()
	})

	$(".search-toggle-icon").on("click", function () {
		$(".top-header .navbar form").addClass("full-searchbar")
	});

	$(".search-close-icon").on("click", function () {
		$(".top-header .navbar form").removeClass("full-searchbar")
	});

	$(".chat-toggle-btn").on("click", function () {
		$(".chat-wrapper").toggleClass("chat-toggled")
	});

	$(".chat-toggle-btn-mobile").on("click", function () {
		$(".chat-wrapper").removeClass("chat-toggled")
	});

	$(".email-toggle-btn").on("click", function () {
		$(".email-wrapper").toggleClass("email-toggled")
	});

	$(".email-toggle-btn-mobile").on("click", function () {
		$(".email-wrapper").removeClass("email-toggled")
	});

	$(".compose-mail-btn").on("click", function () {
		$(".compose-mail-popup").show()
	});

	$(".compose-mail-close").on("click", function () {
		$(".compose-mail-popup").hide()
	});

	$(document).ready(function () {
		$(window).on("scroll", function () {
			$(this).scrollTop() > 300 ? $(".back-to-top").fadeIn() : $(".back-to-top").fadeOut()
		}), $(".back-to-top").on("click", function () {
			return $("html, body").animate({
				scrollTop: 0
			}, 600), !1
		})
	});

	// switcher
	$("#LightTheme").on("click", function () {
		$("html").attr("class", "light-theme")
	});

	$("#DarkTheme").on("click", function () {
		$("html").attr("class", "dark-theme")
	});

	$("#SemiDarkTheme").on("click", function () {
		$("html").attr("class", "semi-dark")
	});

	$("#MinimalTheme").on("click", function () {
		$("html").attr("class", "minimal-theme")
	});

	$("#headercolor1").on("click", function () {
		$("html").addClass("color-header headercolor1"),
			$("html").removeClass("headercolor2 headercolor3 headercolor4 headercolor5 headercolor6 headercolor7 headercolor8")
	}),

		$("#headercolor2").on("click", function () {
			$("html").addClass("color-header headercolor2"), $("html").removeClass("headercolor1 headercolor3 headercolor4 headercolor5 headercolor6 headercolor7 headercolor8")
		}),

		$("#headercolor3").on("click", function () {
			$("html").addClass("color-header headercolor3"), $("html").removeClass("headercolor1 headercolor2 headercolor4 headercolor5 headercolor6 headercolor7 headercolor8")
		}),

		$("#headercolor4").on("click", function () {
			$("html").addClass("color-header headercolor4"), $("html").removeClass("headercolor1 headercolor2 headercolor3 headercolor5 headercolor6 headercolor7 headercolor8")
		}),

		$("#headercolor5").on("click", function () {
			$("html").addClass("color-header headercolor5"), $("html").removeClass("headercolor1 headercolor2 headercolor4 headercolor3 headercolor6 headercolor7 headercolor8")
		}),

		$("#headercolor6").on("click", function () {
			$("html").addClass("color-header headercolor6"), $("html").removeClass("headercolor1 headercolor2 headercolor4 headercolor5 headercolor3 headercolor7 headercolor8")
		}),

		$("#headercolor7").on("click", function () {
			$("html").addClass("color-header headercolor7"), $("html").removeClass("headercolor1 headercolor2 headercolor4 headercolor5 headercolor6 headercolor3 headercolor8")
		}),

		$("#headercolor8").on("click", function () {
			$("html").addClass("color-header headercolor8"), $("html").removeClass("headercolor1 headercolor2 headercolor4 headercolor5 headercolor6 headercolor7 headercolor3")
		})

	// new PerfectScrollbar(".header-message-list")
	// new PerfectScrollbar(".header-notifications-list")
});
