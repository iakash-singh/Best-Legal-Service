@extends('front.app')
@section('title', 'Contact Us')
@section('main-content')
    <section class="page-header page-header-classic page-header-sm mb-3">
        <div class="container">
            <div class="row">
                <div class="col-md-8 order-2 order-md-1 align-self-center p-static"></div>
                <div class="col-md-4 order-1 order-md-2 align-self-center">
                    <ul class="breadcrumb d-block fz-15 text-center text-md-end text-white">
                        <li><a class="bread-white" href="{{ route('home') }}">Home</a></li>
                        <li class="active">@yield('title')</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <section class="section border-0 py-0 m-0">
        <div class="container">
            <div class="row py-4">
                <div class="col-lg-6">
                    <div class="row">
                        <div class="col-md-6">
                            <h2 class="contact-center font-weight-bold text-color-dark text-6 text-lg-5 text-xl-7 pb-2 mb-4 appear-animation"
                                data-appear-animation="fadeInUpShorter" data-appear-animation-delay="300">Get In Touch</h2>
                            <div class="appear-animation" data-appear-animation="fadeInUpShorter"
                                 data-appear-animation-delay="700">
                                <h3 class="font-weight-bold text-color-dark text-transform-none text-4 mb-0">Call Us</h3>
                                <a href="tel:917405149211" class="d-inline-block text-color-default text-color-hover-primary text-decoration-none mb-4">+91 9512347365</a>
                            </div>
                            <div class="appear-animation" data-appear-animation="fadeInUpShorter"
                                 data-appear-animation-delay="900">
                                <h3
                                    class="font-weight-bold text-color-dark text-transform-none text-4 mb-0">
                                    Assistance Hours</h3>
                                <p>Mon - Sat 10:00am - 7:00pm<br> Sunday - CLOSED</p>
                            </div>
                            <div class="appear-animation" data-appear-animation="fadeInUpShorter"
                                 data-appear-animation-delay="1100">
                                <h3 class="font-weight-bold text-color-dark text-transform-none text-4 mb-0">Whatsapp Us</h3>
                                <a href="https://bit.ly/37I6iRP" target="_blank" class="d-inline-block text-color-default text-color-hover-primary text-decoration-none mb-2"><i class="fa-brands fa-whatsapp"> +91 9512347365</i></a>
                                <p>Chat Support also Available on WhatsApp during Business Hours.</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <h2 class="font-weight-bold text-color-dark text-6 text-lg-5 text-xl-7 pb-2 mb-4 appear-animation"
                                data-appear-animation="fadeInUpShorter" data-appear-animation-delay="1100">Address and Mail
                            </h2>
                            <div class="appear-animation" data-appear-animation="fadeInUpShorter"
                                 data-appear-animation-delay="1300">
                                <h3
                                    class="font-weight-bold text-color-dark text-transform-none text-4 mb-0">
                                    Registered Office</h3>
                                <p>Bizhelp Solutions Private Limited<br>
                                    Plot No. 359, Sector-28, DLF-1<br>
                                    Gurgaon, Haryana, India- 122002<br>
                                    CIN: U74999HR2020PTC084890</p>
                            </div>
                            <div class="appear-animation" data-appear-animation="fadeInUpShorter"
                                 data-appear-animation-delay="1500">
                                <h3
                                    class="font-weight-bold text-color-dark text-transform-none text-4 mb-0">
                                    Corporate Office</h3>
                                <p>Office No. 57, Millennium Textile Market-2<br>
                                    BRTS Canal Road, Surat, Gujarat, India- 395002</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">

                    <h3 class="d-block text-color-primary font-weight-medium text-4 text-lg-start mb-0 appear-animation"
                        data-appear-animation="fadeInUpShorterPlus" data-appear-animation-delay="400">LET'S TALK</h3>
                    <h2 class="text-color-dark font-weight-bold text-9 text-lg-start pb-2 mb-4 appear-animation"
                        data-appear-animation="fadeInUpShorterPlus" data-appear-animation-delay="600">Let Us Reach You</h2>
                    @if (Session::has('success'))
                        <div class="alert border-0 bg-light-success alert-dismissible fade show py-2">
                            <div class="d-flex align-items-center">
                                <div class="fs-3 text-success"><i class="bi bi-check-circle-fill"></i>
                                </div>
                                <div class="ms-3">
                                    <div class="text-success">{{ Session::get('success') }}</div>
                                </div>
                            </div>
                        </div>
                    @endif
                    @if (Session::has('failure'))
                        <div class="alert border-0 bg-light-danger alert-dismissible fade show py-2">
                            <div class="d-flex align-items-center">
                                <div class="fs-3 text-danger"><i class="bi bi-check-circle-fill"></i>
                                </div>
                                <div class="ms-3">
                                    <div class="text-danger">{{ Session::get('failure') }}</div>
                                </div>
                            </div>
                        </div>
                    @endif
                    <form class="custom-form-style-1 appear-animation" data-appear-animation="fadeInUpShorterPlus"
                          data-appear-animation-delay="800" action="{{ route('contact.store') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="form-group col-lg-6">
                                <label class="form-label mb-1 text-2">Name <span class="text-danger"> *</span></label>
                                <input type="text" class="bg-white form-control text-3 h-auto py-2" name="name" placeholder="Name *" value="{{ old('name') }}">
                                @error('name')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-group col-lg-6">
                                <label class="form-label mb-1 text-2">Email <span class="text-danger"> *</span></label>
                                <input type="email" class="bg-white form-control text-3 h-auto py-2" name="email" placeholder="E-mail *" value="{{ old('email') }}">
                                @error('email')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <label class="form-label mb-1 text-2">Phone <span class="text-danger"> *</span></label>
                            <div class="form-group col-lg-12">
                                <input type="text" class="bg-white form-control text-3 h-auto py-2" name="phone" placeholder="Phone *" value="{{ old('phone') }}">
                                @error('phone')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <label class="form-label mb-1 text-2">Message <span class="text-danger"> *</span></label>
                            <div class="form-group col-lg-12">
                                <textarea rows="9" class="bg-white form-control border-radius-0" name="message" placeholder="Message *" value="">{{ old('message') }}</textarea>
                                @error('message')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col">
                                <button class="btn btn-primary font-weight-bold btn-px-5 btn-py-3 appear-animation"
                                        data-appear-animation="fadeInUpShorterPlus" data-appear-animation-delay="350"
                                        data-loading-text="Loading...">SEND MESSAGE</button>
                            </div>
                        </div>
                    </form>

                </div>

            </div>
        </div>
    </section>
    <div class="google-map m-2">
        <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d7014.610133808575!2d77.090476!3d28.470358!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x390d18d81f7d66a3%3A0xd2d9d3cb51c131a0!2s359%2C%20Chakkarpur%2C%20Sector%2028%2C%20Gurugram%2C%20Haryana%20122002%2C%20India!5e0!3m2!1sen!2sus!4v1646719357527!5m2!1sen!2sus" width="100%" height="469" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
    </div>
@endsection
