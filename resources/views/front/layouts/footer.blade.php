{{-- <!-- Footer--> --}}
@php
use App\Models\Service;
@endphp
<footer id="footer" class="border-0 pt-4 mt-0">
    <div class="container py-3">
        <div class="header-logo mb-4">
            <a href="{{ route('home') }}">
                <img src="{{ asset('assets/images/bestlegalservices-logo_footer.png') }}" alt="Best Legal Services" width="250" height="60">
            </a>
        </div>

        @if (Route::currentRouteName() == 'home')
            <div class="row my-5">
                <h5 class="text-transform-none font-weight-bold text-color-light text-5-5 mb-4">Thinking to Start a New Business- We Can Help</h5>
                <p class="fz-14 text-white text-justify">Most individuals believe that incorporation is more complicated than it is. All you have to do with Best Legal Services is answer a few simple questions, and we'll take care of the rest. We ensure that your Company name is available, that all your paperwork is filed, that your records are saved online, and that you have access to all the legal support that you require. We assist you in building your kingdom, be it a <strong class="unique_color">private limited company, limited liability partnership, one-person company, sole proprietorship</strong>, using whatever it takes to ensure that it is free of legal issues in the future.</p>
                <h5 class="text-transform-none font-weight-bold text-color-light text-5-5 mb-4">Legal Services</h5>
                <p class="fz-14 text-white text-justify">In course of running a business, several contracts for commercial and general purposes play an important role in day-to-day operations of a company. We, at Best Legal Services, help you in <strong class="unique_color">Drafting Commercial and General Contracts, vetting the contracts, legal notices, affidavits, outsourced legal functions, legal opinions.</strong> </p>
                <h5 class="text-transform-none font-weight-bold text-color-light text-5-5 mb-4">Intellectual Property Services</h5>
                <p class="fz-14 text-white text-justify">Protect your intellectual property from getting exploited by availing exhaustive IP protection services provided by us. Our services include but are not limited to <strong class="unique_color">trademark search, trademark application, trademark registration, copyright registration, patent application</strong>, etc.</p>
                <h5 class="text-transform-none font-weight-bold text-color-light text-5-5 mb-4">Websites Policies</h5>
                <p class="fz-14 text-white text-justify">We can assist you in drafting the website policies and keeping them up to date and in compliance with the most recent government, legal, and service standards. Our experts are well versed with drafting policies like - <strong class="unique_color">Legal Disclaimer, <a href="{{ route('terms') }}">Terms of Use</a>, <a href="{{ route('privacy') }}">Privacy Policy</a>, Cookie Policy, Refund and Cancellation Policy</strong>, etc.</p>
                <h5 class="text-transform-none font-weight-bold text-color-light text-5-5 mb-4">Taxation Related Services</h5>
                <p class="fz-14 text-white text-justify">Our goal is to save your money and time. We simplify finances and improve your relationship with money. We help you to file <strong class="unique_color">GST Returns, TDS Returns, Income Tax Returns (ITR)</strong> and provide <strong class="unique_color">GST Advisory and Income Tax Advisory</strong>.</p>
                <h5 class="text-transform-none font-weight-bold text-color-light text-5-5 mb-4">Accounting Services</h5>
                <p class="fz-14 text-white text-justify">We can take care of your <strong class="unique_color">Bookkeeping</strong> and <strong class="unique_color">Accounting</strong> work and record all your transactions and generate accurate reports so that you can focus on operational aspect of your business.</p>
                <h5 class="text-transform-none font-weight-bold text-color-light text-5-5 mb-4">HR Services</h5>
                <p class="fz-14 text-white text-justify">We are committed to making the human resource difficulties and challenges that come with owning a small-to-medium-sized business easier to manage. We help your whole team—from the business owner to the HR manager to individual employees—make their lives easier. We can draft <strong class="unique_color">HR policies</strong> and <strong class="unique_color">HR handbook</strong> for your organization which helps to get you on track with all facets of human resources, such as compliance, liability, financial predictability, and benefits administration.</p>
                <h5 class="text-transform-none font-weight-bold text-color-light text-5-5 mb-4">Payroll Services</h5>
                <p class="fz-14 text-white text-justify">We offer well-designed payroll services, i.e., <strong class="unique_color">Payroll maintenance and Payroll Processing</strong> for small and medium companies at affordable rates and great accuracy</p>
            </div>

            <hr>
            <div class="row justify-content-between">
                <div class="col-md-8 p-0">
                    <ul class="list-unstyled mb-0 text-3-5">
                        <li class="mb-2 d-inline p-3 lh-35"><a class="" href="{{ route('about') }}">About Us</a></li>
                        <li class="mb-2 d-inline p-3 lh-35"><a class="" href="{{ route('contact') }}">Contact Us</a></li>
                        <li class="mb-2 d-inline p-3 lh-35"><a class="text-nowrap" href="{{ route('terms') }}">Terms & Conditions</a></li>
                        <li class="mb-2 d-inline p-3 lh-35"><a class="text-nowrap" href="{{ route('privacy') }}">Privacy Policy</a></li>
                        <li class="mb-0 d-inline p-3 lh-35"><a class="" href="{{ route('allServices') }}">Sitemap</a></li>
                        <li class="mb-0 d-inline p-3 lh-35"><a class="" href="{{ route('cancelPolicy') }}">Cancel & Refund Policy</a></li>
                    </ul>
                </div>
                <div class="col-md-4 d-flex justify-content-end p-0 footer-custom-css">
                    @php
                        $socials = \App\Models\social::all();
                    @endphp
                    <ul class="list list-unstyled mb-0 text-3-5 ">
                        @foreach ($socials as $social)
                            <li class="social-icons-facebook d-inline p-3"><a class="" href="{{ $social->fb }}" target="_blank" title="Facebook"><i class="fab fa-facebook-f"></i></a></li>
                            <li class="social-icons-linkedin d-inline p-3"><a class="" href="{{ $social->li }}" target="_blank" title="LinkedIn"><i class="fab fa-linkedin"></i></a></li>
                            <li class="social-icons-instagram d-inline p-3"><a class="" href="{{ $social->ig }}" target="_blank" title="Instagram"><i class="fab fa-instagram"></i></a></li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <hr>

            <div class="row py-4">
                @foreach ($categories as $category)
                    <div class="col-lg-4 my-2">
                        <h5 class="text-transform-none font-weight-bold text-color-light text-5-5 mb-4">{{ $category->category_name }}</h5>
                        <ul class="list list-unstyled text-3-5 mb-0 font-weight-bold">
                            @php
                                $services = DB::table('services')
                                    ->select('ser_name', 'slug')
                                    ->where('status', '1')
                                    ->Where('cat', $category->id)
                                    ->limit(10)
                                    ->get();
                            @endphp
                            @foreach ($services as $service)
                                <li class="mb-2"><a href="{{ route('singleService', $service->slug) }}">{{ $service->ser_name }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                @endforeach
            </div>

            {{-- Disclaimer --}}
            <div class="row my-2 font-weight-bold text-left">
                <p class="font-weight-bold text-white fz-1386 text-justify">Please keep in mind that we are merely a connecting platform that allows you to connect with trustworthy experts like Lawyers, Chartered Accountants, Company Secretaries and HR Professionals. We are not a law firm and we do not offer legal services ourselves. The content on this website is provided solely for knowledge purpose and should not be construed as legal advice or opinion</p>
            </div>
        @else
            <hr>
            <div class="row justify-content-between">
                <div class="col-md-8 p-0">
                    <ul class="list-unstyled mb-0 text-3-5">
                        <li class="mb-2 d-inline p-3"><a class="" href="{{ route('about') }}">About Us</a></li>
                        <li class="mb-2 d-inline p-3"><a class="" href="{{ route('contact') }}">Contact Us</a></li>
                        <li class="mb-2 d-inline p-3"><a class="text-nowrap" href="{{ route('terms') }}">Terms & Conditions</a></li>
                        <li class="mb-2 d-inline p-3"><a class="text-nowrap" href="{{ route('privacy') }}">Privacy Policy</a></li>
                        <li class="mb-0 d-inline p-3"><a class="" href="{{ route('allServices') }}">Sitemap</a></li>
                        <li class="mb-0 d-inline p-3 lh-35"><a class="" href="{{ route('cancelPolicy') }}">Cancel & Refund Policy</a></li>
                    </ul>
                </div>
                <div class="col-md-4 d-flex justify-content-end p-0 footer-custom-css">
                    @php
                        $socials = \App\Models\social::all();
                    @endphp
                    <ul class="list list-unstyled mb-0 text-3-5 ">
                        @foreach ($socials as $social)
                            <li class="social-icons-facebook d-inline p-3"><a class="" href="{{ $social->fb }}" target="_blank" title="Facebook"><i class="fab fa-facebook-f"></i></a></li>
                            <li class="social-icons-linkedin d-inline p-3"><a class="" href="{{ $social->li }}" target="_blank" title="LinkedIn"><i class="fab fa-linkedin"></i></a></li>
                            <li class="social-icons-instagram d-inline p-3"><a class="" href="{{ $social->ig }}" target="_blank" title="Instagram"><i class="fab fa-instagram"></i></a></li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <hr>

            <div class="row py-4">
                @foreach ($categories as $category)
                    <div class="col-lg-4 my-2">
                        <h5 class="text-transform-none font-weight-bold text-color-light text-5-5 mb-4">{{ $category->category_name }}</h5>
                        <ul class="list list-unstyled text-3-5 mb-0 font-weight-bold">
                            @php
                                $services = DB::table('services')
                                    ->select('ser_name', 'slug')
                                    ->where('status', '1')
                                    ->Where('cat', $category->id)
                                    ->limit(10)
                                    ->get();
                            @endphp
                            @foreach ($services as $service)
                                <li class="mb-2"><a href="{{ route('singleService', $service->slug) }}">{{ $service->ser_name }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                @endforeach
            </div>

            {{-- Disclaimer --}}
            <div class="row">
                <div class="col-md-12">
                    <p class="font-weight-bold text-white text-left fz-1386 text-justify">Please keep in mind that we are merely a connecting platform that allows you to connect with trustworthy experts like Lawyers, Chartered Accountants, Company Secretaries and HR Professionals. We are not a law firm and we do not offer legal services ourselves. The content on this website is provided solely for knowledge purpose and should not be construed as legal advice or opinion</p>
                </div>
            </div>
        @endif
    </div>

    <div class="footer-copyright py-4">
        <div class="container py-2">
            <div class="row">
                <div class="col">
                    <p class="text-center text-3 mb-0">© {{ date('Y') }}. All Rights Reserved. Developed By <a href="https://engees.in" title="Engees E-commerce">Engees Ecommerce</a></p>
                </div>
            </div>
        </div>
    </div>
</footer>

<!-- Vendor -->
<script src="{{ asset('assets/front/latest/vendor/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('assets/front/latest/vendor/jquery.appear/jquery.appear.min.js') }}"></script>
<script src="{{ asset('assets/front/latest/vendor/jquery.easing/jquery.easing.min.js') }}"></script>
<script src="{{ asset('assets/front/latest/vendor/jquery.cookie/jquery.cookie.min.js') }}"></script>
<script src="{{ asset('assets/front/latest/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assets/front/latest/vendor/jquery.validation/jquery.validate.min.js') }}"></script>
<script src="{{ asset('assets/front/latest/vendor/jquery.gmap/jquery.gmap.min.js') }}"></script>
<script src="{{ asset('assets/front/latest/vendor/lazysizes/lazysizes.min.js') }}"></script>
<script src="{{ asset('assets/front/latest/vendor/isotope/jquery.isotope.min.js') }}"></script>
<script src="{{ asset('assets/front/latest/vendor/owl.carousel/owl.carousel.min.js') }}"></script>
<script src="{{ asset('assets/front/latest/vendor/magnific-popup/jquery.magnific-popup.min.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.18/js/bootstrap-select.min.js"></script>
<script src="https://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit" type="text/javascript"></script>

<!-- Theme Base, Components and Settings -->
<script src="{{ asset('assets/front/latest/js/theme.js') }}"></script>

<!-- Revolution Slider Scripts -->
<script src="{{ asset('assets/front/latest/vendor/rs-plugin/js/jquery.themepunch.tools.min.js') }}"></script>
<script src="{{ asset('assets/front/latest/vendor/rs-plugin/js/jquery.themepunch.revolution.min.js') }}"></script>

<!-- Current Page Vendor and Views -->
<script src="{{ asset('assets/front/latest/js/views/view.contact.js') }}"></script>

<!-- Demo -->
<script src="{{ asset('assets/front/latest/js/demos/demo-law-firm.js') }}"></script>

<!-- Theme Custom -->
<script src="{{ asset('assets/front/latest/js/custom.js') }}"></script>
@if (Route::currentRouteName() == 'home')
    <script src="{{ asset('assets/front/latest/js/index.js') }}"></script>
@endif
<!-- Theme Initialization Files -->
<script src="{{ asset('assets/front/latest/js/theme.init.js') }}"></script>
@livewireScripts

<a href="https://bit.ly/3xYeVm2?text=Hello%20I%20am%20interested%20in%20your%20services.%20Please%20contact%20me" type="image/x-icon" target="_blank">
    <img src="{{ asset('assets/front/img/WhatsApp_icon.png') }}" class="whatsapp-button" width="50" height="50" alt="">
</a>

<!--Start of Tawk.to Script-->
<script type="text/javascript">
    var Tawk_API = Tawk_API || {},
        Tawk_LoadStart = new Date();
    (function() {
        var s1 = document.createElement("script"),
            s0 = document.getElementsByTagName("script")[0];
        s1.async = true;
        s1.src = 'https://embed.tawk.to/626a5ff37b967b11798cea6f/1g1nodkda';
        s1.charset = 'UTF-8';
        s1.setAttribute('crossorigin', '*');
        s0.parentNode.insertBefore(s1, s0);
    })();
</script>
<!--End of Tawk.to Script-->

<script>
    function googleTranslateElementInit() {
        new google.translate.TranslateElement({
            pageLanguage: 'en',
            layout: google.translate.TranslateElement.InlineLayout.SIMPLE,
            autoDisplay: false
        }, 'google_translate_element');
    }

    function translateLanguage(lang) {
        googleTranslateElementInit();
        var $frame = $('.goog-te-menu-frame:first');
        if (!$frame.length) {
            alert("Error: Could not find Google translate frame.");
            return false;
        }
        $frame.contents().find('.goog-te-menu2-item span.text:contains(' + lang + ')').get(0).click();
        return false;
    }

    $(function() {
        $('.selectpicker').selectpicker();
    });
</script>
