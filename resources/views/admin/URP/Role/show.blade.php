@include('admin.Master.header')

<main class="page-content">

    <div class="row">
        <div class="col-lg-8 mx-auto">
            <div class="card">
                <div class="card-header py-3 bg-transparent">
                    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                        <h5 class="mb-0">{{ trans('admin.roles.view') }}</h5>
                        <div class="ms-auto">
                            <div class="btn-group">
                                <a href="{{ route('admin.roles.index') }}" class="btn btn-primary">{{ trans('admin.buttons.back') }}</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="border p-3 rounded">
                        <form class="row g-3">
                            <div class="col-6 offset-md-3 mb-5">
                                <label class="form-label">Role Name</label>
                                {!! Form::text('name', $role->name, ['placeholder' => 'Name', 'class' => 'form-control', 'readonly' => 'true']) !!}
                            </div>

                            <div class="row offset-md-1">
                                @php
                                    $i = 0;
                                @endphp
                                @foreach ($permission as $groupName)
                                    <div class="col-lg-4 mb-4 d-flex flex-column" id="{{ $groupName->block_name }}">
                                        <label class="mb-1 fw-bold" for="name">{{ $groupName->main_group }}</label>
                                        @php
                                            $permissions = Spatie\Permission\Models\Permission::select('id', 'display_name')
                                                ->where('main_group', $groupName->main_group)
                                                ->get();
                                        @endphp
                                        @php
                                            $counterd = 1;
                                            $corder = 2;
                                        @endphp
                                        @foreach ($permissions as $per)
                                            @if (in_array($per->id, $rolePermissions))
                                                @php
                                                    $counterd++;
                                                @endphp
                                            @endif
                                            <div style="order:{{ $corder }}">
                                                <label>
                                                    <input type="checkbox" onclick="return false;" class="check_{{ $i }}" name="permission[]" id="check_{{ $i }}" onclick="clickSelectChild(this.id)" value="{{ $per->id }}"
                                                           @if (in_array($per->id, $rolePermissions)) checked @endif>
                                                    {{ $per->display_name }}
                                                </label>
                                            </div>
                                            @php
                                                $corder++;
                                            @endphp
                                        @endforeach
                                        <div style="order:1">
                                            <label><input type="checkbox" onclick="return false;" name="select_all" id="select_all_{{ $i }}" onclick="clickSelectAll(this.id)" @if ($counterd == 5) checked @endif> All</label>
                                        </div>
                                    </div>
                                    @php
                                        $i++;
                                    @endphp
                                @endforeach
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</main>

@include('admin.Master.footer')
