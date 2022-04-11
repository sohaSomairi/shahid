<div>
    <div wire:ignore.self class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog " role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">اضافة عام جديد</h5>
                    <button type="button" class="close btn" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="container p-3">
                        <form wire:submit.prevent='saveYear'>
                            <div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
                                <div class="row">
                                    <label class="control-label col-sm-2" for="name">العام</label>
                                    <div class="col-sm-10">
                                        <input autocomplete="off" id="name" type="text" class="form-control"
                                            placeholder="إكتب هنا مثلاً 2020 " wire:model.lazy='name'>
                                        @if ($errors->has('name'))
                                            <span
                                                class="help-block"><strong>{{ $errors->first('name') }}</strong></span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">اغلاق</button>
                    <button wire:click='saveYear' type="submit" class="btn  comp-btn"
                        data-bs-dismiss="modal">حفظ</button>
                </div>
            </div>
        </div>
    </div>
    <div wire:ignore.self class="modal fade" id="edit" tabindex="-1" role="dialog"
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
                        <form wire:submit.prevent='editYear'>
                            <div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
                                <div class="row">
                                    <label class="control-label col-sm-2" for="name">العام</label>
                                    <div class="col-sm-10">
                                        <input autocomplete="off" id="name" type="text" class="form-control"
                                            placeholder="إكتب هنا مثلاً 2020 " wire:model.lazy='name'>
                                        @if ($errors->has('name'))
                                            <span
                                                class="help-block"><strong>{{ $errors->first('name') }}</strong></span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">اغلاق</button>
                    <button wire:click='editYear' type="submit" class="btn  comp-btn"
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
                    <button wire:click='deletYear' type="button" class="btn btn-danger"
                        data-bs-dismiss="modal">حذف</button>
                </div>
            </div>
        </div>
    </div>
    <div class="col-12">
        <div class="comp-header">
            <h4 class="comp-title">{{ $title }}

            </h4>
            @can('forqanshahid.addYear',Auth::user()->id)
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
                        <th scope="col">العام</th>
                        <th scope="col">المدخل</th>
                        @can('forqanshahid.editYear',Auth::user()->id)
                        <th scope="col">تعديل</th>
                        @endcan
                        @can('forqanshahid.deletYear',Auth::user()->id)
                        <th scope="col">حذف</th>
                        @endcan
                    </tr>
                </thead>
                <tbody>
                    @foreach ($years as $year)
                        <tr>
                            <td>{{ $year->id }}</td>
                            <td>{{ $year->name }}</td>
                            <td>{{ $year->user->name }}</td>
                            @can('forqanshahid.editYear',Auth::user()->id)
                            <td>
                                <button data-bs-target="#edit" data-bs-toggle="modal"
                                    wire:click='setYear({{ $year->id }})' class="btn comp-btn">
                                    <li class="fa fa-edit"></li>
                                </button>
                            </td>
                            @endcan
                            @can('forqanshahid.deletYear',Auth::user()->id)
                            <td>
                                <button data-bs-target="#delete" data-bs-toggle="modal"
                                    wire:click='setYear({{ $year->id }})' class="btn btn-danger">
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
