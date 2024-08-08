@extends('front.app')
@section('title', 'About Us')
@section('main-content')
    <section class="page-header page-header-classic page-header-sm mb-3">
        <div class="container">
            <div class="row">
                <div class="col-md-8 order-2 order-md-1 align-self-center p-static">
                    {{-- <h1 data-title-border></h1> --}}
                </div>
                <div class="col-md-4 order-1 order-md-2 align-self-center">
                    <ul class="breadcrumb d-block fz-15 text-center text-md-end text-white">
                        <li><a class="bread-white" href="{{ route('home') }}">Home</a></li>
                        <li class="active">@yield('title')</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <div class="container py-3 my-3">
        <div class="row py-2 appear-animation" data-appear-animation="fadeIn" data-appear-animation-delay="300">
            <div class="col-md-12">
                <h2 class="text-color-dark text-center font-weight-bold text-10 mb-0"><em>About Us</em></h2>
                <div class="col-lg-12 my-3">
                    <p class="fz-15 text-justify">Best Legal Services wants to make the process of hiring Lawyers, CA & CS professionals, and HR professionals easier than ever before. We have a chain of good professionals across India from several cities who can provide you with a wide range of Legal, CA & CS, and HR services.</p>
                </div>
            </div>
        </div>

        <div class="row py-2 appear-animation" data-appear-animation="fadeIn" data-appear-animation-delay="300">
            <div class="col-md-12">
                <h2 class="text-color-dark text-center font-weight-bold text-10 mb-0"><em>Our Vision</em></h2>
                <div class="col-lg-12 my-3">
                    <p class="fz-15 text-justify">We strive to become a one-stop-shop for all your regulatory compliance needs so you can focus on growing your business.</p>
                </div>
            </div>
        </div>

        <div class="row py-2 appear-animation" data-appear-animation="fadeIn" data-appear-animation-delay="300">
            <div class="col-md-12">
                <h2 class="text-color-dark text-center font-weight-bold text-10 mb-0"><em>What we do?</em></h2>
                <div class="col-lg-12 my-3">
                    <p class="fz-15 text-justify">Our organisation wants you to focus on building your business and leave the rest to us. We will take care of Regulatory Compliance for your business so you don’t have to run pillar to post for it. We aim to keep our prices affordable while providing all-encompassing legal services including drafting of MOUs, Consultancy Agreements, Share Purchase Agreements, Labour Law Compliance, IPR services, Terms of Service, End User License Agreement, Privacy
                        Policy, Cookie Policy, Notices,
                        Wills, and so on.</p>
                    <p class="fz-15 text-justify">What makes us different is that we take care of your specific needs and draft customized contracts. Our priority is client satisfaction and therefore, we do not believe in using plain templates for drafting contracts.</p>
                    <p class="fz-15 text-justify">Our CA & CS professionals are experienced enough to get your business registered, ensure its corporate compliance, and provide Accounting & GST related services.</p>

                </div>
            </div>
        </div>

        <div class="row">
            <div class="row py-2">
                <div class="col">
                    <h2 class="text-color-dark text-center font-weight-bold text-10 mb-0"><em>Why Best Legal Services?</em></h2>
                </div>
            </div>
            <div class="col-lg-12 my-3">
                <p class="fz-15 text-justify">Before you choose Best Legal Services, you should know why to do it and what makes us different from the rest of the organizations out there.</p>
            </div>
        </div>

        <section class="bg-transparent section-no-border my-0">
            <div class="container py-3">
                <div class="row">
                    <div class="col text-center">
                        <div class="row row-gutter-sm pb-2 appear-animation animated appear-animation-visible"
                             data-appear-animation="fadeIn" data-appear-animation-delay="300">
                            <div class="col-lg-6 mb-2">
                                <div class="feature-box feature-box-style-2 mb-42appear-animation"
                                     data-appear-animation="fadeInUp" data-appear-animation-delay="0">
                                    <div class="text-start">
                                        <h4 class="mb-2">Client satisfaction</h4>
                                        <p class="fz-15 text-justify">For our organisation, client satisfaction is above everything. We always take note of the specific needs of our clients and make sure that our services meet their expectations.</p>
                                        <p class="fz-15 text-justify">We customize our services as per the needs of our clients to provide them with a hassle-free experience of dealing with us.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 mb-2">
                                <div class="feature-box feature-box-style-2 mb-2 appear-animation"
                                     data-appear-animation="fadeInUp" data-appear-animation-delay="0">
                                    <div class="text-start">
                                        <h4 class="mb-2">Affordable Prices</h4>
                                        <p class="fz-15 text-justify">We try to make our services affordable for all our clients. Be it an MNC or a start-up, we offer our services at a reasonable price to each client.</p>
                                        <p class="fz-15 text-justify">We keep our services affordable so you can invest in the expansion of your business and not on paperwork formalities.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 mb-2">
                                <div class="feature-box feature-box-style-2 mb-2 appear-animation"
                                     data-appear-animation="fadeInUp" data-appear-animation-delay="0">
                                    <div class="text-start">
                                        <h4 class="mb-2">Pan India network of professionals</h4>
                                        <p class="fz-15 text-justify">We have maintained a wide network of professionals across India to develop a comprehensive pool of services. Our wide network of professionals makes it possible for us to provide efficient services.</p>
                                        <p class="fz-15 text-justify">We have experienced Lawyers, CA, CS, and HR professionals in our network who can adapt to technological advances easily.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 mb-2">
                                <div class="feature-box feature-box-style-2 mb-2 appear-animation"
                                     data-appear-animation="fadeInUp" data-appear-animation-delay="0">
                                    <div class="text-start">
                                        <h4 class="mb-2">Adherence to deadlines</h4>
                                        <p class="fz-15 text-justify">We consider your deadlines as our deadlines. We believe punctuality is important not just for reaching the office but also in the services offered by a business.</p>
                                        <p class="fz-15 text-justify">We respect your deadline and always make efforts to deliver the output before your deadlines.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 mb-2">
                                <div class="feature-box feature-box-style-2 mb-2 appear-animation"
                                     data-appear-animation="fadeInUp" data-appear-animation-delay="0">
                                    <div class="text-start">
                                        <h4 class="mb-2">Secure Payment Options</h4>
                                        <p class="fz-15 text-justify">We use a secure payment gateway as we value the client’s hard-earned money and our money as well.</p>
                                        <p class="fz-15 text-justify">Your payments will be secure every time and it will be a simple process with minimal technicalities</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 mb-2">
                                <div class="feature-box feature-box-style-2 mb-2 appear-animation"
                                     data-appear-animation="fadeInUp" data-appear-animation-delay="0">
                                    <div class="text-start">
                                        <h4 class="mb-2">Transparency</h4>
                                        <p class="fz-15 text-justify">We believe in maintaining the transparency of our activities. We make sure that our clients stay updated on the status of the services we provide.</p>
                                        <p class="fz-15 text-justify">It enhances client satisfaction and makes our experience of dealing with clients a smooth one.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 mb-2">
                                <div class="feature-box feature-box-style-2 mb-2 appear-animation"
                                     data-appear-animation="fadeInUp" data-appear-animation-delay="0">
                                    <div class="text-start">
                                        <h4 class="mb-2">Technology-driven</h4>
                                        <p class="fz-15 text-justify">We are always ahead of the rest of the market as we stay updated on the latest technological advances.</p>
                                        <p class="fz-15 text-justify">We have been able to function remotely for the past two years only because technology has made our lives easier and enabled us to serve clients across the world.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 mb-2">
                                <div class="feature-box feature-box-style-2 mb-2 appear-animation"
                                     data-appear-animation="fadeInUp" data-appear-animation-delay="0">
                                    <div class="text-start">
                                        <h4 class="mb-2">One-stop shop</h4>
                                        <p class="fz-15 text-justify">We are a one-stop solution for all your business needs, be it regulatory compliance, accounting services, tax-related matters, HR services, and so on.</p>
                                        <p class="fz-15 text-justify">We do not want you to approach several professionals and waste your time. We want you to save your energy and time for your business and hence, we have made an attempt to provide comprehensive services. We will expand more in the future. So, even if the service you seek is not listed on our website, still contact us. We will talk to you to become the one-stop-shop for all.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>


    </div>

     <section class="section overlay overlay-show overlay-op-9 border-0 m-0 appear-animation" data-appear-animation="fadeIn" data-appear-animation-delay="300" {{--style="background-image: url({{ asset('assets/front/img/demos/law-firm-2/backgrounds/background-1.jpg') }});--}} background-size: cover; background-position: center;">
        <div class="container pt-5 pb-3">
            <div class="row">
                <div class="col text-center">
                    <h2 class="alternative-font-4 text-color-primary font-weight-semibold text-4 mb-2">OUR DIFFERENCE</h2>
                    <h3 class="text-transform-none text-color-light font-weight-bold text-10 negative-ls-1 pb-3 mb-5">Company Details</h3>
                </div>
            </div>
            <div class="row justify-content-center mb-4">
                <div class="col-lg-11 text-center">
                    <p class="text-color-light text-4 mb-0">The synergy between our areas of expertise and experience means that we are uniquely positioned to provide services from paperwork and taxes to Accounting and Corporate Compliance.</p>
                </div>
            </div>
            <div class="row counters counters-sm py-5">
                <div class="col-sm-6 col-lg-4 mb-5 mb-lg-0">
                    <div class="counter">
                        <strong class="text-color-light font-weight-bold line-height-1 text-13 mb-1" data-to="2" data-append="+" data-plugin-options="{'appendWrapper': '<span class=text-color-primary></span>'}">0</strong>
                        <label class="text-color-light font-weight-bold text-4 mb-0">Business Year</label>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-4 mb-5 mb-lg-0">
                    <div class="counter">
                        <strong class="text-color-light font-weight-bold line-height-1 text-13 mb-1" data-to="500" data-append="+" data-plugin-options="{'appendWrapper': '<span class=text-color-primary></span>'}">0</strong>
                        <label class="text-color-light font-weight-bold text-4 mb-0">Satisfied Clients</label>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-4">
                    <div class="counter">
                        <strong class="text-color-light font-weight-bold line-height-1 text-13 mb-1" data-to="100" data-append="+" data-plugin-options="{'appendWrapper': '<span class=text-color-primary></span>'}">0</strong>
                        <label class="text-color-light font-weight-bold text-4 mb-0">Lawyers, CA & CS</label>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
