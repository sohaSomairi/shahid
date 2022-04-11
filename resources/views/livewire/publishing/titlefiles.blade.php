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
                        <form wire:submit.prevent='saveUploadFile'>

                            <div class="form-group mb-3  {{ $errors->has('topics_id') ? ' has-error' : '' }}">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <label class="control-label col-sm-12 mb-2" for="filetypes_id">نوع الملف</label>
                                        <div class="col-sm-12">
                                            <select type="filetypes_id" wire:model.lazy="filetypes_id"
                                                class="form-control {{ $errors->first('filetypes_id') ? 'is-invalid' : '' }}"
                                                id="filetypes_id" aria-describedby="filetypes_id">
                                                <option value="">إختر نوع الملف</option>
                                                @foreach ($filetypes as $file)
                                                    <option value="{{ $file->id }}">
                                                        {{-- {{ $file->id == $sections_id ? 'selected' : '' }}> --}}
                                                        {{ $file->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @if ($errors->has('filetypes_id'))
                                                <span
                                                    class="help-block"><strong>{{ $errors->first('filetypes_id') }}</strong></span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group  {{ $errors->has('uploadfile') ? ' has-error' : '' }}">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <label class="control-label col-sm-12 mb-2" for="uploadfile">الترتيب</label>
                                        <div class="col-sm-12">
                                            <input id="uploadfile" type="file" class="form-control"
                                                wire:model.lazy='uploadfile'>
                                            <div class="mt-2" wire:loading wire:target="uploadfile">جاري
                                                التحميل ...
                                            </div>
                                            @if ($uploadfile)
                                                <img src="{{ $uploadfile->temporaryUrl() }}" class="w-50 p-4">
                                            @endif
                                            @if ($errors->has('uploadfile'))
                                                <span
                                                    class="help-block"><strong>{{ $errors->first('uploadfile') }}</strong></span>
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
                    <button wire:click='saveUploadFile' type="submit" class="btn  comp-btn"
                        data-bs-dismiss="modal">حفظ</button>
                </div>
            </div>
        </div>
    </div>
    <div wire:ignore.self class="modal fade" id="edit" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                        <form wire:submit.prevent='editfiletype'>
                            <div class="form-group mb-3  {{ $errors->has('filetypes_id') ? ' has-error' : '' }}">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <label class="control-label col-sm-12 mb-2" for="filetypes_id">نوع الملف</label>
                                        <div class="col-sm-12">
                                            <select type="filetypes_id" wire:model.lazy="filetypes_id"
                                                class="form-control {{ $errors->first('filetypes_id') ? 'is-invalid' : '' }}"
                                                id="filetypes_id" aria-describedby="filetypes_id">
                                                <option value="">إختر نوع الملف</option>
                                                @foreach ($filetypes as $file)
                                                    <option value="{{ $file->id }}">
                                                        {{ $file->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @if ($errors->has('filetypes_id'))
                                                <span
                                                    class="help-block"><strong>{{ $errors->first('filetypes_id') }}</strong></span>
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
                    <button wire:click='editfiletype' type="submit" class="btn  comp-btn"
                        data-bs-dismiss="modal">حفظ</button>
                </div>
            </div>
        </div>
    </div>
    <div wire:ignore.self class="modal fade" id="editfile" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                        <form wire:submit.prevent='editfile'>


                            <div class="form-group  {{ $errors->has('uploadfile') ? ' has-error' : '' }}">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <label class="control-label col-sm-12 mb-2" for="uploadfile">الترتيب</label>
                                        <div class="col-sm-12">
                                            <input id="uploadfile" type="file" class="form-control"
                                                wire:model.lazy='uploadfile'>
                                            <div class="mt-2" wire:loading wire:target="uploadfile">جاري
                                                التحميل ...
                                            </div>
                                            @if ($uploadfile)
                                                <img src="{{ $uploadfile->temporaryUrl() }}" class="w-50 p-4">
                                            @endif

                                            @if ($errors->has('uploadfile'))
                                                <span
                                                    class="help-block"><strong>{{ $errors->first('uploadfile') }}</strong></span>
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
                    <button wire:click='editfile' type="submit" class="btn  comp-btn"
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
                    <button wire:click='deleteFile' type="button" class="btn btn-danger"
                        data-bs-dismiss="modal">حذف</button>
                </div>
            </div>
        </div>
    </div>



    <div class="col-12">
        <div class="comp-header">
            <h4 class="comp-title">{{ $title->name }}
            </h4>
            @can('forqanshahid.addTitleFiles', Auth::user()->id)
                <button data-bs-target='#add' data-bs-toggle='modal' class="btn btn-info comp-btn">
                    إضافة مرفق <li class="fa fa-plus"></li>
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
        <div class="comp-data">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">نوع الملف</th>
                        <th scope="col">اسم الملف</th>
                        @can('forqanshahid.editTitleFile', Auth::user()->id)
                            <th scope="col">تعديل</th>
                        @endcan
                        @can('forqanshahid.deletTitleFile', Auth::user()->id)
                            <th scope="col">حذف</th>
                        @endcan
                    </tr>
                </thead>
                <tbody>
                    @foreach ($title->files as $file)
                        <tr>
                            <td>{{ $file->id }}</td>
                            <td>
                                {{ $file->filetype->name }}
                            </td>
                            @can('forqanshahid.editTitleFile', Auth::user()->id)
                                <td>
                                    <button data-bs-target="#editfile" data-bs-toggle="modal"
                                        wire:click='setFile({{ $file->id }})' class="btn btn-link file-modal">
                                        {{ $file->name }}
                                    </button>
                                </td>
                                <td>
                                    <button data-bs-target="#edit" data-bs-toggle="modal"
                                        wire:click='setFile({{ $file->id }})' class="btn comp-btn">
                                        <li class="fa fa-edit"></li>
                                    </button>
                                </td>
                            @endcan
                            @can('forqanshahid.deletTitleFile', Auth::user()->id)
                                <td>
                                    <button data-bs-target="#delete" data-bs-toggle="modal"
                                        wire:click='setFile({{ $file->id }})' class="btn btn-danger">
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
