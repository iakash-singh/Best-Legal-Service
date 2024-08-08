@include('admin.Master.header')

<main class="page-content">
    <div class="row">
        <div class="col-lg-8 mx-auto">
            <div class="card">
                <div class="card-header py-3 bg-transparent">
                    <h5 class="mb-0">{{ trans('admin.socials.title') }}</h5>
                </div>
                <div class="card-body">
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
                    <div class="border p-3 rounded">
                        <form class="row g-3" method="POST" action="{{ route('admin.social.store') }}">
                            @csrf
                            <div class="col-6">
                                <label class="form-label">Facebook</label>
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="basic-addon1">
                                        <i class="lni lni-facebook-filled"></i>
                                    </span>
                                    <input type="text" name="fb" class="form-control" placeholder="Facebook" value="{{ isset($social->fb) ? $social->fb : '' }}">
                                </div>
                            </div>
                            <div class="col-6">
                                <label class="form-label">LinkedIn</label>
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="basic-addon1">
                                        <i class="lni lni-linkedin-original"></i>
                                    </span>
                                <input type="text" name="li" class="form-control" placeholder="LinkedIn" value="{{ isset($social->li) ? $social->li : '' }}">
                                </div>
                            </div>
                            <div class="col-6">
                                <label class="form-label">Instagram</label>
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="basic-addon1">
                                        <i class="lni lni-instagram-filled"></i>
                                    </span>
                                <input type="text" name="ig" class="form-control" placeholder="Instagram" value="{{ isset($social->ig) ? $social->ig : '' }}">
                                </div>
                            </div>
                            <div class="border p-3 rounded">
                                <div class="col-12">
                                    <button class="btn btn-primary px-4">{{ trans('admin.buttons.save') }}</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

@include('admin.Master.footer')
