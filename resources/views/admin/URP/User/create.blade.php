@include('admin.Master.header')

<main class="page-content">

    <div class="row">
        <div class="col-lg-8 mx-auto">
            <div class="card">
                <div class="card-header py-3 bg-transparent">
                    <h5 class="mb-0">{{ trans('admin.users.create') }}</h5>
                </div>
                <div class="card-body">
                    <div class="border p-3 rounded">
                        <form class="row g-3" method="POST" action="{{ route('admin.users.store') }}">
                            @csrf
                            <div class="col-6">
                                <label class="form-label">Name <span class="text-danger"> * </span></label>
                                {{-- <input type="text" name="name" class="form-control" placeholder="User Name" value="{{ old('name') }}"> --}}
                                {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
                                @error('name')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="col-6">
                                <label class="form-label">Email <span class="text-danger"> * </span></label>
                                {{-- <input type="email" name="email" class="form-control" placeholder="User Email Address" value="{{ old('email') }}"> --}}
                                {!! Form::text('email', null, array('placeholder' => 'Email','class' => 'form-control')) !!}
                                @error('email')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="col-6">
                                <label class="form-label">Phone</label>
                                <input type="text" name="phone" class="form-control" placeholder="User Phone Number" value="{{ old('phone') }}">
                            </div>
                            <div class="col-6">
                                <label class="form-label">Password <span class="text-danger"> * </span></label>
                                <input type="password" name="password" class="form-control" placeholder="User Password">
                                @error('password')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="col-6">
                                <label class="form-label">Role <span class="text-danger"> * </span></label>
                                {!! Form::select('roles', $roles,[], array('class' => 'form-control multiple-select')) !!}
                                @error('roles')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="border p-3 rounded">
                                <div class="col-12">
                                    <button class="btn btn-primary px-4">{{ trans('admin.buttons.save') }}</button>
                                    <a href="{{ route('admin.users.index') }}" class="btn btn-secondary px-4">{{ trans('admin.buttons.cancel') }}</a>
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
