<div>
    <div wire:ignore.self class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
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
                        <form wire:submit.prevent='saveUser'>
                            <div class="form-group mb-3 {{ $errors->has('name') ? ' has-error' : '' }}">
                                <div class="row">
                                    <label class="control-label col-sm-12 mb-2" for="name">الاسم</label>
                                    <div class="col-sm-12">
                                        <input id="name" type="text" class="form-control" wire:model.lazy='name'>
                                        @if ($errors->has('name'))
                                            <span
                                                class="help-block"><strong>{{ $errors->first('name') }}</strong></span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="form-group mb-3 {{ $errors->has('username') ? ' has-error' : '' }}">
                                <div class="row">
                                    <label class="control-label col-sm-12 mb-2" for="username">إسم المستخدم</label>
                                    <div class="col-sm-12">
                                        <input id="username" type="text" class="form-control"
                                            wire:model.lazy='username'>
                                        @if ($errors->has('username'))
                                            <span
                                                class="help-block"><strong>{{ $errors->first('username') }}</strong></span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="form-group mb-3 {{ $errors->has('password') ? ' has-error' : '' }}">
                                <div class="row">
                                    <label class="control-label col-sm-12 mb-2" for="password">كلمة المرور</label>
                                    <div class="col-sm-12">
                                        <input id="password" type="password" class="form-control"
                                            wire:model.lazy='password'>
                                        @if ($errors->has('password'))
                                            <span
                                                class="help-block"><strong>{{ $errors->first('password') }}</strong></span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="form-group mb-3 {{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                                <div class="row mb-3">
                                    <label for="password_confirmation" class="col-md-12 col-form-label">تأكيد كلمة المرور</label>

                                    <div class="col-md-12">
                                        <input wire:model.lazy='password_confirmation' id="password_confirmation" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                        @if ($errors->has('password_confirmation'))
                                        <span
                                            class="help-block"><strong>{{ $errors->first('password_confirmation') }}</strong></span>
                                    @endif
                                    </div>
                                </div>
                            </div>
                            <div class="form-group mb-3  {{ $errors->has('usergroups_id') ? ' has-error' : '' }}">
                                <div class="row">
                                    <!-- <div class="col-sm-6"> -->
                                    <label class="control-label col-sm-12 mb-2" for="usergroups_id">القسم</label>
                                    <div class="col-sm-12">
                                        <select type="usergroups_id" wire:model.lazy="usergroups_id"
                                            class="form-control {{ $errors->first('usergroups_id') ? 'is-invalid' : '' }}"
                                            id="usergroups_id" aria-describedby="usergroups_id">
                                            <option value="">إختر القسم</option>
                                            @foreach ($usergroups as $usergroup)
                                                <option value="{{ $usergroup->id }}">{{ $usergroup->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @if ($errors->has('usergroups_id'))
                                            <span
                                                class="help-block"><strong>{{ $errors->first('usergroups_id') }}</strong></span>
                                        @endif
                                    </div>
                                    <!-- </div> -->
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">اغلاق</button>
                    <button wire:click='saveUser' type="submit" class="btn  comp-btn"
                        data-bs-dismiss="modal">حفظ</button>
                </div>
            </div>
        </div>
    </div>
    <div wire:ignore.self class="modal fade" id="editpassword" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                        <form wire:submit.prevent='editUserPassword'>

                            <div class="form-group mb-3 {{ $errors->has('password') ? ' has-error' : '' }}">
                                <div class="row">
                                    <label class="control-label col-sm-12 mb-2" for="password">كلمة المرور</label>
                                    <div class="col-sm-12">
                                        <input id="password" type="password" class="form-control"
                                            wire:model.lazy='password'>
                                        @if ($errors->has('password'))
                                            <span
                                                class="help-block"><strong>{{ $errors->first('password') }}</strong></span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="form-group mb-3 {{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                                <div class="row mb-3">
                                    <label for="password_confirmation" class="col-md-12 col-form-label">تأكيد كلمة المرور</label>

                                    <div class="col-md-12">
                                        <input wire:model.lazy='password_confirmation' id="password_confirmation" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                        @if ($errors->has('password_confirmation'))
                                        <span
                                            class="help-block"><strong>{{ $errors->first('password_confirmation') }}</strong></span>
                                    @endif
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">اغلاق</button>
                    <button wire:click='editUserPassword' type="submit" class="btn  comp-btn"
                        data-bs-dismiss="modal">حفظ</button>
                </div>
            </div>
        </div>
    </div>
    <div wire:ignore.self class="modal fade" id="editGroup" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                        <form wire:submit.prevent='editUserGroup'>
                            <div class="form-group mb-3  {{ $errors->has('usergroups_id') ? ' has-error' : '' }}">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <label class="control-label col-sm-12 mb-2" for="usergroups_id">القسم</label>
                                        <div class="col-sm-12">
                                            <select type="usergroups_id" wire:model.lazy="usergroups_id"
                                                class="form-control {{ $errors->first('usergroups_id') ? 'is-invalid' : '' }}"
                                                id="usergroups_id" aria-describedby="usergroups_id">
                                                <option value="">إختر القسم</option>
                                                @foreach ($usergroups as $usergroup)
                                                    <option value="{{ $usergroup->id }}">{{ $usergroup->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @if ($errors->has('usergroups_id'))
                                                <span
                                                    class="help-block"><strong>{{ $errors->first('usergroups_id') }}</strong></span>
                                            @endif
                                        </div>
                                    </div>


                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">اغلاق</button>
                    <button wire:click='editUserGroup' type="submit" class="btn  comp-btn"
                        data-bs-dismiss="modal">حفظ</button>
                </div>
            </div>
        </div>
    </div>
    <div wire:ignore.self class="modal fade" id="delete" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                    <button wire:click='deletUser' type="button" class="btn btn-danger"
                        data-bs-dismiss="modal">حذف</button>
                </div>
            </div>
        </div>
    </div>


    <div class="col-12">
        <div class="comp-header">
            <h4 class="comp-title">{{ $title }}

            </h4>
            @can('forqanshahid.addUser')
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
                        <th scope="col">البريد الإلكتروني</th>
                        <th scope="col">المجموعة</th>
                        @can('forqanshahid.editUser')
                            <th scope="col"> تعديل كلمة المرور</th>
                            <th scope="col"> تعديل المجموعة</th>
                        @endcan

                        @can('forqanshahid.deletUser')
                            <th scope="col">حذف</th>
                        @endcan
                        {{-- @endif --}}
                        {{-- @endforeach --}}
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->username }}</td>
                            <td>{{ $user->usergroup->name }}</td>
                            @can('forqanshahid.editUser')
                            <td>
                                <button data-bs-target="#editpassword" data-bs-toggle="modal"
                                    wire:click='setUser({{ $user->id }})' class="btn comp-btn">
                                    <li class="fa fa-edit"></li>
                                </button>

                            </td>
                            <td>
                                <button data-bs-target="#editGroup" data-bs-toggle="modal"
                                    wire:click='setUser({{ $user->id }})' class="btn comp-btn">
                                    <li class="fa fa-edit"></li>
                                </button>

                            </td>
                            @endcan
                            @can('forqanshahid.deletUser')
                            <td>
                                <button data-bs-target="#delete" data-bs-toggle="modal"
                                    wire:click='setUser({{ $user->id }})' class="btn btn-danger">
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
