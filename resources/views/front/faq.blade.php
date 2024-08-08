@extends('front.app')
@section('title', 'FAQ')
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

    <div class="container py-4">
        <div class="row">
            <div class="col-lg-12">
                <h2 class="font-weight-normal text-7 my-2">Frequently Asked <strong class="font-weight-extra-bold">Questions</strong></h2>
                <hr>
                <div class="col-lg-12 mb-4 mb-lg-5">
                    <div class="accordion" id="accordion12">
                        <div class="card card-default">
                            <div class="card-header" id="collapse12HeadingOne">
                                <h4 class="card-title m-0">
                                    <a class="accordion-toggle" data-bs-toggle="collapse" data-bs-target="#collapse12One" aria-expanded="true" aria-controls="collapse12One">
                                        1. What kind of services do the website offer?
                                    </a>
                                </h4>
                            </div>
                            <div id="collapse12One" class="collapse show" aria-labelledby="collapse12HeadingOne" data-bs-parent="#accordion12">
                                <div class="card-body">
                                    <p class="mb-0 text-justify fz-15">Our services ranges from legal opinions, notices, drafting agreements, website policies, trademark registration to incorporating a new company, compliance related work, GST Filing including advisory, ITR filing to HR and Payroll Solutions. Please refer to the sitemap for list of services offered by us.</p>
                                </div>
                            </div>
                        </div>
                        <div class="card card-default">
                            <div class="card-header" id="collapse12HeadingTwo">
                                <h4 class="card-title m-0">
                                    <a class="accordion-toggle" data-bs-toggle="collapse" data-bs-target="#collapse12Two" aria-expanded="false" aria-controls="collapse12Two">
                                        2. What are the qualifications of the team?
                                    </a>
                                </h4>
                            </div>
                            <div id="collapse12Two" class="collapse" aria-labelledby="collapse12HeadingTwo" data-bs-parent="#accordion12">
                                <div class="card-body">
                                    <p class="mb-0 text-justify fz-15">Our team comprises of Lawyers, CA, CS, HR Professionals who have adequate knowledge and experience in their respective field. Rest assured; we shall deliver quality service at affordable rates.</p>
                                </div>
                            </div>
                        </div>
                        <div class="card card-default">
                            <div class="card-header" id="collapse12HeadingThree">
                                <h4 class="card-title m-0">
                                    <a class="accordion-toggle" data-bs-toggle="collapse" data-bs-target="#collapse12Three" aria-expanded="false" aria-controls="collapse12Three">
                                        3. How can I place the order on the website?
                                    </a>
                                </h4>
                            </div>
                            <div id="collapse12Three" class="collapse" aria-labelledby="collapse12HeadingThree" data-bs-parent="#accordion12">
                                <div class="card-body">
                                    <p class="mb-0 text-justify fz-15">Create an account on our website and then raise a ticket. Our customer service person will reach out to you via email and assist you in placing the order. You can also contact us by email, online chat, or Whatsapp, and we will take down your requirements and assist you in placing your order.</p>
                                </div>
                            </div>
                        </div>
                        <div class="card card-default">
                            <div class="card-header" id="collapse12HeadingFour">
                                <h4 class="card-title m-0">
                                    <a class="accordion-toggle" data-bs-toggle="collapse" data-bs-target="#collapse12Four" aria-expanded="true" aria-controls="collapse12Four">
                                        4. If I am having additional questions or trouble registering, whom should I call?
                                    </a>
                                </h4>
                            </div>
                            <div id="collapse12Four" class="collapse" aria-labelledby="collapse12HeadingFour" data-bs-parent="#accordion12">
                                <div class="card-body">
                                    <p class="mb-0 text-justify fz-15">We can assist you online through online chat/ Whatsapp between 9am-6pm (Monday to Saturday). You can also mail us your concerns on <a href="mailto:enquiry@bestlegalservices.in">enquiry@bestlegalservices.in</a></p>
                                </div>
                            </div>
                        </div>
                        <div class="card card-default">
                            <div class="card-header" id="collapse12HeadingFive">
                                <h4 class="card-title m-0">
                                    <a class="accordion-toggle" data-bs-toggle="collapse" data-bs-target="#collapse12Five" aria-expanded="false" aria-controls="collapse12Five">
                                        5. Are the services reliable?
                                    </a>
                                </h4>
                            </div>
                            <div id="collapse12Five" class="collapse" aria-labelledby="collapse12HeadingFive" data-bs-parent="#accordion12">
                                <div class="card-body">
                                    <p class="mb-0 text-justify fz-15">Yes, you can completely rely on our services. We believe in walking extra mile to keep our clients satisfied. We require information such as your name, contact information, and email address when you place an order with bestlegalservices.in. We solely use this information to keep you informed about the progress of your job. Please be aware that our support team will only contact you via email, WhatsApp, or the website's registered phone
                                    number.</p>
                                </div>
                            </div>
                        </div>
                        <div class="card card-default">
                            <div class="card-header" id="collapse12HeadingSix">
                                <h4 class="card-title m-0">
                                    <a class="accordion-toggle" data-bs-toggle="collapse" data-bs-target="#collapse12Six" aria-expanded="false" aria-controls="collapse12Six">
                                        6. Is the physical presence required of the person?
                                    </a>
                                </h4>
                            </div>
                            <div id="collapse12Six" class="collapse" aria-labelledby="collapse12HeadingSix" data-bs-parent="#accordion12">
                                <div class="card-body">
                                    <p class="mb-0 text-justify fz-15">The whole process is online. So, a person needn’t go anywhere to register it. You are required to send in your documents via email/ upload on website and just provide the required information related to the selected service.</p>
                                </div>
                            </div>
                        </div>
                        <div class="card card-default">
                            <div class="card-header" id="collapse12HeadingSeven">
                                <h4 class="card-title m-0">
                                    <a class="accordion-toggle" data-bs-toggle="collapse" data-bs-target="#collapse12Seven" aria-expanded="true" aria-controls="collapse12Seven">
                                        7. What is the mode of the payment?
                                    </a>
                                </h4>
                            </div>
                            <div id="collapse12Seven" class="collapse" aria-labelledby="collapse12HeadingSeven" data-bs-parent="#accordion12">
                                <div class="card-body">
                                    <p class="mb-0 text-justify fz-15">We have the best possible online modes of payment available for our customers. You can pay by credit card/ debit card/ online bank transfers.</p>
                                </div>
                            </div>
                        </div>
                        <div class="card card-default">
                            <div class="card-header" id="collapse12HeadingEight">
                                <h4 class="card-title m-0">
                                    <a class="accordion-toggle" data-bs-toggle="collapse" data-bs-target="#collapse12Eight" aria-expanded="false" aria-controls="collapse12Eight">
                                        8. Is there any hidden charge involved?
                                    </a>
                                </h4>
                            </div>
                            <div id="collapse12Eight" class="collapse" aria-labelledby="collapse12HeadingEight" data-bs-parent="#accordion12">
                                <div class="card-body">
                                    <p class="mb-0 text-justify fz-15">No, we believe in transparency and no hidden charges are levied on clients.</p>
                                </div>
                            </div>
                        </div>
                        <div class="card card-default">
                            <div class="card-header" id="collapse12HeadingNine">
                                <h4 class="card-title m-0">
                                    <a class="accordion-toggle" data-bs-toggle="collapse" data-bs-target="#collapse12Nine" aria-expanded="false" aria-controls="collapse12Nine">
                                        9. Whom should I contact for billing information?
                                    </a>
                                </h4>
                            </div>
                            <div id="collapse12Nine" class="collapse" aria-labelledby="collapse12HeadingNine" data-bs-parent="#accordion12">
                                <div class="card-body">
                                    <p class="mb-0 text-justify fz-15">We in normal circumstances shall send you the invoice via email/ WhatsApp. Please always feel free to contact us via email, WhatsApp, and online chat in case any information related to billing is required.</p>
                                </div>
                            </div>
                        </div>
                        <div class="card card-default">
                            <div class="card-header" id="collapse12HeadingTen">
                                <h4 class="card-title m-0">
                                    <a class="accordion-toggle" data-bs-toggle="collapse" data-bs-target="#collapse12Ten" aria-expanded="true" aria-controls="collapse12Ten">
                                        10. How can I request for a refund?
                                    </a>
                                </h4>
                            </div>
                            <div id="collapse12Ten" class="collapse" aria-labelledby="collapse12HeadingTen" data-bs-parent="#accordion12">
                                <div class="card-body">
                                    <p class="mb-0 text-justify fz-15">Yes, you can find additional details about our refund policy under our official ‘Terms and Conditions’ policy page.</p>
                                </div>
                            </div>
                        </div>
                        <div class="card card-default">
                            <div class="card-header" id="collapse12HeadingEleven">
                                <h4 class="card-title m-0">
                                    <a class="accordion-toggle" data-bs-toggle="collapse" data-bs-target="#collapse12Eleven" aria-expanded="false" aria-controls="collapse12Eleven">
                                         11. Is my information secure?
                                    </a>
                                </h4>
                            </div>
                            <div id="collapse12Eleven" class="collapse" aria-labelledby="collapse12HeadingEleven" data-bs-parent="#accordion12">
                                <div class="card-body">
                                    <p class="mb-0 text-justify fz-15">Yes, we adhere to the strictest internet security guidelines. We do not share client’s information with third parties.</p>
                                </div>
                            </div>
                        </div>
                        <div class="card card-default">
                            <div class="card-header" id="collapse12HeadingTwelve">
                                <h4 class="card-title m-0">
                                    <a class="accordion-toggle" data-bs-toggle="collapse" data-bs-target="#collapse12Twelve" aria-expanded="false" aria-controls="collapse12Twelve">
                                        12. Why should I choose bestlegalservices.in over other websites?
                                    </a>
                                </h4>
                            </div>
                            <div id="collapse12Twelve" class="collapse" aria-labelledby="collapse12HeadingTwelve" data-bs-parent="#accordion12">
                                <div class="card-body">
                                    <p class="mb-0 text-justify fz-15">When you look at our website and testimonials, you'll notice that there are a lot of people that rely on our services. Our professionals have a lot of knowledge and have worked in this field for a long time. We are aware of our clients' needs and strive to meet them completely.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
