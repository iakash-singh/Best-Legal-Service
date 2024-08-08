@extends('front.app')
@section('title', 'Become an Affiliate')
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

    <section class="section-default border-0 m-0">
        <div class="container py-4">
            <div class="row pb-4">
                <div class="col-md-6">
                    <h2 class="text-color-dark font-weight-bold text-9 text-lg-start pb-2 mb-4 appear-animation"
                        data-appear-animation="fadeInUpShorterPlus" data-appear-animation-delay="50">Lets Together Create A Success Story</h2>
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
                          data-appear-animation-delay="100" action="{{ route('affiliate.store') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="form-group col mb-3">
                                <input type="text" class="form-control border-radius-0" name="name" placeholder="Name *" value="{{ old('name') }}">
                                @error('name')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col mb-3">
                                <input type="text" class="form-control border-radius-0" name="occupation" placeholder="Occupation *" value="{{ old('occupation') }}">
                                @error('occupation')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col mb-3">
                                <input type="email" class="form-control border-radius-0" name="email" placeholder="E-mail *" value="{{ old('email') }}">
                                @error('email')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col mb-3">
                                <input type="text" class="form-control border-radius-0" name="mobile" placeholder="Phone *" value="{{ old('mobile') }}">
                                @error('mobile')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col mb-4">
                                <textarea rows="9" class="form-control border-radius-0" name="message" placeholder="Message *" value="">{{ old('message') }}</textarea>
                                @error('message')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col mb-3">
                                <select name="state" class="form-select form-control border-radius-0">
                                    <option value="Select State or Union Territory" readonly>Select State or Union Territory</option>
                                    <option value="Andhra Pradesh" {{ old('state') == 'Andhra Pradesh' ? 'selected' : '' }}>Andhra Pradesh</option>
                                    <option value="Arunachal Pradesh" {{ old('state') == 'Arunachal Pradesh' ? 'selected' : '' }}>Arunachal Pradesh</option>
                                    <option value="Assam" {{ old('state') == 'Assam' ? 'selected' : '' }}>Assam</option>
                                    <option value="Bihar" {{ old('state') == 'Bihar' ? 'selected' : '' }}>Bihar</option>
                                    <option value="Chhattisgarh" {{ old('state') == 'Chhattisgarh' ? 'selected' : '' }}>Chhattisgarh</option>
                                    <option value="Goa" {{ old('state') == 'Goa' ? 'selected' : '' }}>Goa</option>
                                    <option value="Gujarat" {{ old('state') == 'Gujarat' ? 'selected' : '' }}>Gujarat</option>
                                    <option value="Haryana" {{ old('state') == 'Haryana' ? 'selected' : '' }}>Haryana</option>
                                    <option value="Himachal Pradesh" {{ old('state') == 'Himachal Pradesh' ? 'selected' : '' }}>Himachal Pradesh</option>
                                    <option value="Jharkhand" {{ old('state') == 'Jharkhand' ? 'selected' : '' }}>Jharkhand</option>
                                    <option value="Karnataka" {{ old('state') == 'Karnataka' ? 'selected' : '' }}>Karnataka</option>
                                    <option value="Kerala" {{ old('state') == 'Kerala' ? 'selected' : '' }}>Kerala</option>
                                    <option value="Madhya Pradesh" {{ old('state') == 'Madhya Pradesh' ? 'selected' : '' }}>Madhya Pradesh</option>
                                    <option value="Maharashtra" {{ old('state') == 'Maharashtra' ? 'selected' : '' }}>Maharashtra</option>
                                    <option value="Manipur" {{ old('state') == 'Manipur' ? 'selected' : '' }}>Manipur</option>
                                    <option value="Meghalaya" {{ old('state') == 'Meghalaya' ? 'selected' : '' }}>Meghalaya</option>
                                    <option value="Mizoram" {{ old('state') == 'Mizoram' ? 'selected' : '' }}>Mizoram</option>
                                    <option value="Nagaland" {{ old('state') == 'Nagaland' ? 'selected' : '' }}>Nagaland</option>
                                    <option value="Odisha" {{ old('state') == 'Odisha' ? 'selected' : '' }}>Odisha</option>
                                    <option value="Punjab" {{ old('state') == 'Punjab' ? 'selected' : '' }}>Punjab</option>
                                    <option value="Rajasthan" {{ old('state') == 'Rajasthan' ? 'selected' : '' }}>Rajasthan</option>
                                    <option value="Sikkim" {{ old('state') == 'Sikkim' ? 'selected' : '' }}>Sikkim</option>
                                    <option value="Tamil Nadu" {{ old('state') == 'Tamil Nadu' ? 'selected' : '' }}>Tamil Nadu</option>
                                    <option value="Telangana" {{ old('state') == 'Telangana' ? 'selected' : '' }}>Telangana</option>
                                    <option value="Tripura" {{ old('state') == 'Tripura' ? 'selected' : '' }}>Tripura</option>
                                    <option value="Uttarakhand" {{ old('state') == 'Uttarakhand' ? 'selected' : '' }}>Uttarakhand</option>
                                    <option value="Uttar Pradesh" {{ old('state') == 'Uttar Pradesh' ? 'selected' : '' }}>Uttar Pradesh</option>
                                    <option value="West Bengal" {{ old('state') == 'West Bengal' ? 'selected' : '' }}>West Bengal</option>
                                    <option value="Andaman and Nicobar Islands" {{ old('state') == 'Andaman and Nicobar Islands' ? 'selected' : '' }}>Andaman and Nicobar Islands</option>
                                    <option value="Dadra and Nagar Haveli and Daman & Diu" {{ old('state') == 'Dadra and Nagar Haveli and Daman & Diu' ? 'selected' : '' }}>Dadra and Nagar Haveli and Daman & Diu</option>
                                    <option value="Jammu & Kashmir" {{ old('state') == 'Jammu & Kashmir' ? 'selected' : '' }}>Jammu & Kashmir</option>
                                    <option value="Lakshadweep" {{ old('state') == 'Lakshadweep' ? 'selected' : '' }}>Lakshadweep</option>
                                    <option value="Chandigarh" {{ old('state') == 'Chandigarh' ? 'selected' : '' }}>Chandigarh</option>
                                    <option value="The Government of NCT of Delhi" {{ old('state') == 'The Government of NCT of Delhi' ? 'selected' : '' }}>The Government of NCT of Delhi</option>
                                    <option value="Ladakh" {{ old('state') == 'Ladakh' ? 'selected' : '' }}>Ladakh</option>
                                    <option value="Puducherry" {{ old('state') == 'Puducherry' ? 'selected' : '' }}>Puducherry</option>
                                </select>
                                @error('state')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col text-lg-end mb-0">
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
    @endsection