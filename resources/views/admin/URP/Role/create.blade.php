@include('admin.Master.header')

<main class="page-content">

    <div class="row">
        <div class="col-lg-8 mx-auto">
            <div class="card">
                <div class="card-header py-3 bg-transparent">
                    <h5 class="mb-0">{{ trans('admin.roles.create') }}</h5>
                </div>
                <div class="card-body">
                    <div class="border p-3 rounded">
                        <form class="row g-3" method="POST" action="{{ route('admin.roles.store') }}">
                            @csrf
                            <div class="col-6 offset-md-3 mb-5">
                                <label class="form-label">Name</label>
                                {!! Form::text('name', null, ['placeholder' => 'Name', 'class' => 'form-control']) !!}
                                @error('name')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="row offset-md-1">
                                @php
                                    $i = 0;
                                @endphp
                                @foreach ($permission as $groupName)
                                    <div class="col-lg-4 mb-4" id="{{ $groupName->block_name }}">
                                        <label class="mb-2 fw-bold" for="name">{{ $groupName->main_group }}</label><br>
                                        @php
                                            $permissions = Spatie\Permission\Models\Permission::select('id', 'display_name')
                                                ->where('main_group', $groupName->main_group)
                                                ->get();
                                        @endphp
                                        <label><input type="checkbox" name="select_all" id="select_all_{{ $i }}" onclick="clickSelectAll(this.id)"> All</label>
                                        <br>
                                        @foreach ($permissions as $per)
                                            <label>
                                                <input type="checkbox" name="permission[]" class="check_{{ $i }}" id="check_{{ $i }}" onclick="clickSelectChild(this.id)" value="{{ $per->id }}" @if(is_array(old('permission')) && in_array($per->id, old('permission'))) checked @endif>
                                                {{ $per->display_name }}
                                            </label>
                                            <br>
                                        @endforeach
                                    </div>
                                    @php
                                        $i++;
                                    @endphp
                                @endforeach
                            </div>
                            <div class="border p-3 rounded">
                                <div class="col-12">
                                    <button class="btn btn-primary px-4">{{ trans('admin.buttons.save') }}</button>
                                    <a href="{{ route('admin.roles.index') }}" class="btn btn-secondary px-4">{{ trans('admin.buttons.cancel') }}</a>
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

<script>
    function clickSelectAll(id) {
        let x = id.split("_");
        if ($('#' + id).is(":checked")) {
            $('.check_' + x[2]).each(function() {
                this.checked = true;
            });
        } else {
            $('.check_' + x[2]).each(function() {
                this.checked = false;
            });
        }
    }

    function clickSelectChild(id) {
        let y = id.split("_");
        var numberOfChildCheckBoxes = $('.check_' + y[1]).length;
        var checkedChildCheckBox = $('.check_' + y[1]).filter(':checked').length;
        if (checkedChildCheckBox == numberOfChildCheckBoxes) {
            $('#select_all_' + y[1]).prop('checked', true);
        } else {
            $('#select_all_' + y[1]).prop('checked', false);
        }
    };
</script>
