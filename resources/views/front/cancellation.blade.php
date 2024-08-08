@extends('front.app')
@section('title', 'Cancellation & Refund Policy')

@section('main-content')
    <div role="main" class="main">

        <section class="page-header page-header-modern bg-color-light-scale-1 page-header-lg">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 align-self-center p-static order-2 text-center">
                        <h1 class="font-weight-bold text-dark">@yield('title')</h1>
                    </div>
                    <div class="col-md-12 align-self-center order-1">
                        <ul class="breadcrumb fz-15 d-block text-center">
                            <li><a class="bread-white" href="#">Home</a></li>
                            <li class="active">@yield('title')</li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>

        <div class="container py-4">

            <div class="row">
                <div class="col">
                    <p><strong>CANCELLATION AND REFUND POLICY</strong></p>

                    <p>Thank you for giving us opportunity to serve by opting our services on website <a href="http://www.bestlegalservices.in/" rel="noreferrer noopener" target="_blank">www.bestlegalservices.in</a> . The company's ultimate focus is the best-in-class customer service with optimized cost and long-term association.</p>

                    <p><strong>Cancellation</strong></p>

                    <p>The company makes every effort to serve you as per the specifications and timelines mentioned against each service or product purchased and agreed with you. However, if the user changes its mind for whatsoever reason and cancels the purchased service, the company will not be liable to cancel the service. The company will investigate the reason of cancellation and can decide on cancellation when given reasons are proved in investigation.</p>

                    <p>The company reserves the right to make best possible efforts to complete the purchased service of the user before considering cancellation, if the user agrees. In case of non-completion of service post receipt of cancellation request, a cancellation fee of 20% + earned fee + fee paid to government or any third-party service providers would be applicable.</p>

                    <p>In case the user asks the company to hold the processing of the service, the company shall hold the fees paid for a period of 1 year from the date of payment.</p>

                    <p><strong>Refund</strong></p>

                    <p>The user needs to raise refund request via email to <a href="mailto:order@bestlegalservices.in" rel="noreferrer noopener" target="_blank">order@bestlegalservices.in</a> . In case the company could not execute the purchased service of the user for whatsoever reasons and deficiency is proved in internal investigation, then only, the user will be entitled to a refund.</p>

                    <p>Please note that all the processing fees, payment gateway charges, admin fees, and cost of resources for the work done, will be deducted along with any money which is paid to government bodies, such as filing fees or taxes, or to other third parties with a role in processing your order. Remaining money will be considered for refund.</p>

                    <p>If user wishes to utilize refund money for another service, the company will facilitate the user by mapping available money to newly purchased service.</p>

                    <p>Post approval of refund request, the company shall intimate the user via email about final decision and shall initiate refund process.</p>
                </div>

            </div>

        </div>

    </div>
@endsection
