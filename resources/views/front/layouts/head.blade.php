<!-- Basic -->
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">

<title>
    @if (Route::currentRouteName() != 'singleService')
        Online Best Legal Services | CA & CS Services | HR Services
    @else
        @yield('title')
    @endif
</title>
<meta name="csrf-token" content="{{ csrf_token() }}" />
<meta name="facebook-domain-verification" content="o1zmrsddw0zjd6fwdbxi1wujox9u12" />
@if (Route::currentRouteName() != 'home')
    <meta name="keywords" content="@yield('meta_keywords')" />
    <meta name="description" content="@yield('meta_description')">
@else
    <meta name="keywords" content="Best Legal Services, CA Services, CS Services, HR Services, Legal Service Online, Online CA Services, Online CS Services, Online HR Services" />
    <meta name="description" content="@yield('meta_description', 'Best Legal Services provides legal, CA, CS and HR services online in India. Consult with our expert on chat & get the best solution from our professionals.')">
@endif

<link rel="canonical" href="{{ url()->current() }}" />
<meta name="author" content="">

<!-- Favicon -->
<link rel="shortcut icon" href="{{ asset('assets/front/img/bls-favicon.png') }}" type="image/x-icon" />
<link rel="apple-touch-icon" href="{{ asset('assets/front/img/bls-favicon.png') }}">

<!-- Mobile Metas -->
<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1.0, shrink-to-fit=no">

<!-- Web Fonts  -->
<link id="googleFonts" href="https://fonts.googleapis.com/css?family=Merriweather:300,400,700,900%7CPoppins:200,300,400,500,600,700,800&display=swap" rel="stylesheet" type="text/css">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">

<!-- Vendor CSS -->
<link rel="stylesheet" href="{{ asset('assets/front/latest/vendor/bootstrap/css/bootstrap.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/front/latest/vendor/fontawesome-free/css/all.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/front/latest/vendor/animate/animate.compat.css') }}">
<link rel="stylesheet" href="{{ asset('assets/front/latest/vendor/simple-line-icons/css/simple-line-icons.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/front/latest/vendor/owl.carousel/assets/owl.carousel.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/front/latest/vendor/owl.carousel/assets/owl.theme.default.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/front/latest/vendor/magnific-popup/magnific-popup.min.css') }}">
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.2/css/bootstrap-select.min.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/4.1.5/css/flag-icons.min.css">

<!-- Theme CSS -->
<link rel="stylesheet" href="{{ asset('assets/front/latest/css/theme.css') }}">
<link rel="stylesheet" href="{{ asset('assets/front/latest/css/theme-elements.css') }}">
<link rel="stylesheet" href="{{ asset('assets/front/latest/css/theme-blog.css') }}">
<link rel="stylesheet" href="{{ asset('assets/front/latest/css/theme-shop.css') }}">

<!-- Revolution Slider CSS -->
<link rel="stylesheet" href="{{ asset('assets/front/latest/vendor/rs-plugin/css/settings.css') }}">
<link rel="stylesheet" href="{{ asset('assets/front/latest/vendor/rs-plugin/css/layers.css') }}">
<link rel="stylesheet" href="{{ asset('assets/front/latest/vendor/rs-plugin/css/navigation.css') }}">

<!-- Demo CSS -->
<link rel="stylesheet" href="{{ asset('assets/front/latest/css/demos/demo-law-firm.css') }}">

<!-- Skin CSS -->
<link id="skinCSS" rel="stylesheet" href="{{ asset('assets/front/latest/css/skins/skin-law-firm.css') }}">

<!-- Theme Custom CSS -->
<link rel="stylesheet" href="{{ asset('assets/front/latest/css/custom.css') }}">
@livewireStyles

<style>
    /* width */
    ::-webkit-scrollbar {
        display: none;
    }

    /* Track */
    ::-webkit-scrollbar-track {
        box-shadow: inset 0 0 5px grey;
        border-radius: 10px;
    }

    /* Handle */
    ::-webkit-scrollbar-thumb {
        background: #102e44;
        border-radius: 10px;
    }

    /* Handle on hover */
    ::-webkit-scrollbar-thumb:hover {
        background: #102e44;
    }

</style>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-5NVQ3N96WF"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-5NVQ3N96WF');
</script>
<!-- Head Libs -->
<script src="{{ asset('assets/front/latest/vendor/modernizr/modernizr.min.js') }}"></script>
<script type="text/javascript">
    (function(c, l, a, r, i, t, y) {
        c[a] = c[a] || function() {
            (c[a].q = c[a].q || []).push(arguments)
        };
        t = l.createElement(r);
        t.async = 1;
        t.src = "https://www.clarity.ms/tag/" + i;
        y = l.getElementsByTagName(r)[0];
        y.parentNode.insertBefore(t, y);
    })(window, document, "clarity", "script", "b800821ed3");
</script>
