<div>
    <div wire:ignore.self class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg " role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">اضافة جديد</h5>
                    <button type="button" class="close btn" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="container p-3">
                        <form wire:submit.prevent='savetitle'>
                            <div class="form-group mb-3 {{ $errors->has('name') ? ' has-error' : '' }}">
                                <div class="row">
                                    <label class="control-label col-sm-12 mb-2" for="name">العنوان</label>
                                    <div class="col-sm-12">
                                        <input autocomplete="off" id="name" type="text" class="form-control"
                                            wire:model.lazy='name'>
                                        @if ($errors->has('name'))
                                            <span
                                                class="help-block"><strong>{{ $errors->first('name') }}</strong></span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="form-group mb-3  {{ $errors->has('topics_id') ? ' has-error' : '' }}">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <label class="control-label col-sm-12 mb-2" for="topics_id">الموضوع</label>
                                        <div class="col-sm-12">
                                            <input type="text" wire:model.lazy="topics_id" autocomplete="off"
                                                class="form-control gettopic {{ $errors->first('topics_id') ? 'is-invalid' : '' }}"
                                                id="topics_id" aria-describedby="topics_id" value={{ $topics_id }}>
                                            @if ($errors->has('topics_id'))
                                                <span
                                                    class="help-block"><strong>{{ $errors->first('topics_id') }}</strong></span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group mb-3 {{ $errors->has('ordr') ? ' has-error' : '' }}">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <label class="control-label col-sm-12 mb-2" for="ordr">الترتيب</label>
                                        <div class="col-sm-12">
                                            <input id="ordr" type="number" class="form-control"
                                                wire:model.lazy='ordr'>
                                            @if ($errors->has('ordr'))
                                                <span
                                                    class="help-block"><strong>{{ $errors->first('ordr') }}</strong></span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group mb-3 {{ $errors->has('keywords') ? ' has-error' : '' }}">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <label class="control-label col-sm-12 mb-2" for="keywords">كلمات مفتاحية</label>
                                        <div class="col-sm-12">
                                            <textarea name="keywords" class="form-control" wire:model.lazy='keywords' ></textarea>
                                            {{-- <input autocomplete="off" id="keywords" type="text" class="form-control"
                                                wire:model.lazy='keywords'> --}}
                                            @if ($errors->has('keywords'))
                                                <span
                                                    class="help-block"><strong>{{ $errors->first('keywords') }}</strong></span>
                                            @endif
                                        </div>
                                    </div>


                                </div>
                            </div>
                            <div class="form-group mb-3 {{ $errors->has('descr') ? ' has-error' : '' }}">
                                <div class="row">
                                    <label class="control-label col-sm-12 mb-2" for="descr">الوصف</label>
                                    <div class="col-sm-12">
                                        <textarea name="descr" class="form-control"  wire:model.lazy='descr' id=""></textarea>
                                        {{-- <input autocomplete="off" id="name" type="text" class="form-control"
                                            wire:model.lazy='descr'> --}}
                                        @if ($errors->has('descr'))
                                            <span
                                                class="help-block"><strong>{{ $errors->first('descr') }}</strong></span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">اغلاق</button>
                    <button wire:click='savetitle' type="submit" class="btn  comp-btn"
                        data-bs-dismiss="modal">حفظ</button>
                </div>
            </div>
        </div>
    </div>
    <div wire:ignore.self class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg " role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">تعديل</h5>
                    <button type="button" class="close btn" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="container p-3">
                        <form wire:submit.prevent='editTitle'>
                            <div class="form-group mb-3 {{ $errors->has('name') ? ' has-error' : '' }}">
                                <div class="row">
                                    <label class="control-label col-sm-12 mb-2" for="name">العنوان</label>
                                    <div class="col-sm-12">
                                        <input autocomplete="off" id="name" type="text" class="form-control"
                                            wire:model.lazy='name'>
                                        @if ($errors->has('name'))
                                            <span
                                                class="help-block"><strong>{{ $errors->first('name') }}</strong></span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="form-group mb-3  {{ $errors->has('topics_id') ? ' has-error' : '' }}">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <label class="control-label col-sm-12 mb-2" for="topics_id">الموضوع</label>
                                        <div class="col-sm-12">
                                            <input type="text" wire:model.lazy="topics_id" autocomplete="off"
                                                class="form-control gettopic {{ $errors->first('topics_id') ? 'is-invalid' : '' }}"
                                                id="topics_id" aria-describedby="topics_id" value={{ $topics_id }}>
                                            @if ($errors->has('topics_id'))
                                                <span
                                                    class="help-block"><strong>{{ $errors->first('topics_id') }}</strong></span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group mb-3 {{ $errors->has('ordr') ? ' has-error' : '' }}">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <label class="control-label col-sm-12 mb-2" for="ordr">الترتيب</label>
                                        <div class="col-sm-12">
                                            <input id="ordr" type="number" class="form-control"
                                                wire:model.lazy='ordr'>
                                            @if ($errors->has('ordr'))
                                                <span
                                                    class="help-block"><strong>{{ $errors->first('ordr') }}</strong></span>
                                            @endif
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="form-group mb-3 {{ $errors->has('keywords') ? ' has-error' : '' }}">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <label class="control-label col-sm-12 mb-2" for="keywords">كلمات مفتاحية</label>
                                        <div class="col-sm-12">
                                            <textarea name="keywords" class="form-control" wire:model.lazy='keywords' ></textarea>
                                            {{-- <input autocomplete="off" id="keywords" type="text" class="form-control"
                                                wire:model.lazy='keywords'> --}}
                                            @if ($errors->has('keywords'))
                                                <span
                                                    class="help-block"><strong>{{ $errors->first('keywords') }}</strong></span>
                                            @endif
                                        </div>
                                    </div>


                                </div>
                            </div>
                            <div class="form-group mb-3 {{ $errors->has('descr') ? ' has-error' : '' }}">
                                <div class="row">
                                    <label class="control-label col-sm-12 mb-2" for="descr">الوصف</label>
                                    <div class="col-sm-12">
                                        <textarea name="descr" class="form-control"  wire:model.lazy='descr' id=""></textarea>
                                        {{-- <input autocomplete="off" id="name" type="text" class="form-control"
                                            wire:model.lazy='descr'> --}}
                                        @if ($errors->has('descr'))
                                            <span
                                                class="help-block"><strong>{{ $errors->first('descr') }}</strong></span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">اغلاق</button>
                    <button wire:click='editTitle' type="submit" class="btn  comp-btn"
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
                    <button wire:click='deleteTitle' type="button" class="btn btn-danger"
                        data-bs-dismiss="modal">حذف</button>
                </div>
            </div>
        </div>
    </div>

    <div class="col-12">
        <div class="comp-header">
            <h4 class="comp-title">{{ $title }}

            </h4>
            @can('forqanshahid.addTitle', Auth::user()->id)
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
            <div class="alert alert-{{$class}} alert-dismissible fade show" role="alert">
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
                        <th scope="col">العنوان</th>
                        <th scope="col">الموضوع</th>
                        <th scope="col">كلمات مفتاحية</th>
                        <th scope="col">الوصف</th>
                        <th scope="col">عدد مرات التحميل</th>
                        <th scope="col">عدد المشاهدات</th>
                        @can('forqanshahid.addTitleFiles', Auth::user()->id)
                        <th scope="col">إضافة مرفقات</th>
                        @endcan
                        @can('forqanshahid.editTitle', Auth::user()->id)
                        <th scope="col">تعديل</th>
                        @endcan
                        @can('forqanshahid.deletTitle', Auth::user()->id)
                        <th scope="col">حذف</th>
                        @endcan
                    </tr>
                </thead>
                <tbody>
                    @foreach ($ttitles as $title)
                        <tr>
                            <td>{{ $title->id }}</td>
                            <td>{{ $title->name }}</td>
                            <td>{{ $title->topic->name }}</td>
                            <td>{{ $title->keywords }}</td>
                            <td>{{ $title->descr }}</td>
                            <td>{{ $title->downloads }}</td>
                            <td>{{ $title->watches }}</td>
                             @can('forqanshahid.addTitleFiles', Auth::user()->id)
                            <td>
                                <button  data-bs-toggle="modal"
                                    wire:click='addFiles({{ $title->id }})' class="btn comp-btn">
                                    <li class="fa fa-file"></li>
                                </button>
                            </td>
                            @endcan
                             @can('forqanshahid.editTitle', Auth::user()->id)
                            <td>
                                <button data-bs-target="#edit" data-bs-toggle="modal"
                                    wire:click='setTitle({{ $title->id }})' class="btn comp-btn">
                                    <li class="fa fa-edit"></li>
                                </button>
                            </td>
                            @endcan
                             @can('forqanshahid.deletTitle', Auth::user()->id)
                            <td>
                                <button data-bs-target="#delete" data-bs-toggle="modal"
                                    wire:click='setTitle({{ $title->id }})' class="btn btn-danger">
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
