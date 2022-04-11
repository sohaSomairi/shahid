<div>
    <div wire:ignore.self class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog " role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">اضافة مستخدم جديد</h5>
                    <button type="button" class="close btn" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="container p-3">
                        <form wire:submit.prevent='saveSection'>
                            <div class="form-group mb-3 {{ $errors->has('name') ? ' has-error' : '' }}">
                                <div class="row">
                                    <label class="control-label col-sm-12 mb-2" for="name">الاسم</label>
                                    <div class="col-sm-12">
                                        <input id="name" type="text" class="form-control" wire:model.lazy='name'>
                                        @if ($errors->has('name'))
                                        <span class="help-block"><strong>{{ $errors->first('name') }}</strong></span>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            @foreach ($roles as $role)
                            <div class="form-check mb-4" wire:key="input-checkbox-{{ $role->id }}">

                                <input wire:ignore.self type="checkbox" wire:model.defer="selectedRoles" value="{{$role->id}}" @if(in_array($role->id, $selectedRoles)) checked @endif>
                                {{$role->name}}</input>

                            </div>
                            @endforeach
                        </form>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">اغلاق</button>
                    <button wire:click='saveGroup' type="submit" class="btn  comp-btn" data-bs-dismiss="modal">حفظ</button>
                </div>
            </div>
        </div>
    </div>
    <div wire:ignore.self class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog " role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">تعديل</h5>
                    <button type="button" class="close btn" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="container p-3">
                        <form wire:submit.prevent='editGroup'>
                            <div class="form-group mb-3 {{ $errors->has('name') ? ' has-error' : '' }}">
                                <div class="row">
                                    <label class="control-label col-sm-12 mb-2" for="name">الاسم</label>
                                    <div class="col-sm-12">
                                        <input id="name" type="text" class="form-control" wire:model.lazy='name'>
                                        @if ($errors->has('name'))
                                        <span class="help-block"><strong>{{ $errors->first('name') }}</strong></span>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            @foreach ($roles as $role)
                            <div class="form-check mb-4" wire:key="input-checkbox-{{ $role->id }}">

                                <input  wire:ignore.self type="checkbox" wire:model.defer="selectedRoles" value="{{$role->id}}" @if(in_array($role->id, $selectedRoles)) checked @endif />
                                {{$role->name}}

                            </div>
                            @endforeach


                        </form>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">اغلاق</button>
                    <button wire:click='editGroup' type="submit" class="btn  comp-btn" data-bs-dismiss="modal">حفظ</button>
                </div>
            </div>
        </div>
    </div>
    <div wire:ignore.self class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog " role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"> تنبيه !! </h5>
                    <button type="button" class="close btn" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="container p-3">
                        <h4 class="model-msg">انت الان على وشك حذف البيانات
                            <p>
                                ( <span class="red-color">{{ $name }}</span> )
                            </p>
                        </h4>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">الغاء</button>
                    <button wire:click='deletGroup' type="button" class="btn btn-danger" data-bs-dismiss="modal">حذف</button>
                </div>
            </div>
        </div>
    </div>


    <div class="col-12">
        <div class="comp-header">
            <h4 class="comp-title">{{ $title }}

            </h4>
            @can('forqanshahid.addUserGroup', Auth::user()->id)
            <button data-bs-target='#add' data-bs-toggle='modal' class="btn btn-info comp-btn">
                <li class="fa fa-plus"></li>
            </button>
            @endcan

        </div>

        @if ($errors->any())
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>تحذير!</strong> لم تتم عملية الحفظ .
            <button type="button" class="btn float-end " data-bs-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif
        @if (session()->has('message'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('message') }}
            <button type="button" class="btn float-end " data-bs-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif
        {{-- <div class="table-responsive"></div> --}}
        <div class="comp-data">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">الاسم</th>
                        @can('forqanshahid.editUserGroup', Auth::user()->id)
                        <th scope="col">تعديل</th>
                        @endcan
                        @can('forqanshahid.deletUserGroup', Auth::user()->id)
                        <th scope="col">حذف</th>
                        @endcan
                    </tr>
                </thead>
                <tbody>
                    @foreach ($usergroups as $usergroup)
                    <tr>
                        <td>{{ $usergroup->id }}</td>
                        <td>{{ $usergroup->name }}</td>
                        @can('forqanshahid.editUserGroup', Auth::user()->id)
                        <td>
                            <button data-bs-target="#edit" data-bs-toggle="modal" wire:click='setGroup({{ $usergroup->id }})' class="btn comp-btn">
                                <li class="fa fa-edit"></li>
                            </button>
                        </td>
                        @endcan
                        @can('forqanshahid.deletUserGroup', Auth::user()->id)
                        <td>
                            <button wire:ignore.self data-bs-target="#delete" data-bs-toggle="modal" wire:click='setGroup({{ $usergroup->id }})' class="btn btn-danger">
                                <li class="fa fa-trash"></li>
                            </button>
                        </td>
                        @endcan
                    </tr>
                    @endforeach


                </tbody>
            </table>
        </div>

    </div>
</div>
