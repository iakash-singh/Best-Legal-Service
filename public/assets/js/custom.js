$(document).ready(function () {
	$('.show_hide_pass').on('click', function () {
		var x = document.getElementById("password");
		var show_eye = document.getElementById("show_eye");
		var hide_eye = document.getElementById("hide_eye");
		show_eye.classList.remove("d-none");
		if (x.type === "password") {
			x.type = "text";
			show_eye.style.display = "block";
			hide_eye.style.display = "none";
		} else {
			x.type = "password";
			show_eye.style.display = "none";
			hide_eye.style.display = "block";
		}
	});
});