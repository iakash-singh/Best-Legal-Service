@include('admin.Master.header')

<main class="page-content">

    <div class="row">
        <div class="col-lg-8 mx-auto">
            <div class="card">
                <div class="card-header py-3 bg-transparent">
                    <h5 class="mb-0">{{ trans('admin.users.update') }}</h5>
                </div>
                <div class="card-body">
                    <div class="border p-3 rounded">
                        <form class="row g-3" method="POST" action="{{ route('admin.users.update', $user->id) }}">
                            @csrf
                            @method('PATCH')
                            <div class="col-6">
                                <label class="form-label">Name</label>
                                {{-- <input type="text" name="name" class="form-control" placeholder="user Name" value="{{ $user->name }}"> --}}
                                {!! Form::text('name', $user->name, array('placeholder' => 'Name','class' => 'form-control')) !!}
                                @error('name')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="col-6">
                                <label class="form-label">Email</label>
                                {{-- <input type="email" name="email" class="form-control" placeholder="User Email Address" value="{{ $user->email }}"> --}}
                                {!! Form::text('email', $user->email, array('placeholder' => 'Email','class' => 'form-control')) !!}
                                @error('email')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="col-6">
                                <label class="form-label">Phone</label>
                                <input type="text" name="phone" class="form-control" placeholder="User Phone Number" value="{{ $user->phone }}">
                                @error('phone')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="col-6">
                                <label class="form-label">Select Role</label>
                                {!! Form::select('roles[]', $roles,$userRole, array('class' => 'form-control multiple-select')) !!}
                            </div>
                            <div class="border p-3 rounded">
                                <div class="col-12">
                                    <button class="btn btn-primary px-4">{{ trans('admin.buttons.update') }}</button>
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
