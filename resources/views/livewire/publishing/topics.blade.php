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
                        <form wire:submit.prevent='saveTopic'>
                            <div class="form-group mb-3 {{ $errors->has('name') ? ' has-error' : '' }}">
                                <div class="row">
                                    <label class="control-label col-sm-12 mb-2" for="name">المومضوع</label>
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
                            <div class="form-group mb-3  {{ $errors->has('name') ? ' has-error' : '' }}">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <label class="control-label col-sm-12 mb-2" for="sections_id">القسم</label>
                                        <div class="col-sm-12">

                                            <input type="text" wire:model.lazy="sections_id" autocomplete="off"
                                                class="form-control getsection {{ $errors->first('sections_id') ? 'is-invalid' : '' }}"
                                                id="sections_id" aria-describedby="sections_id"
                                                value={{ $sections_id }}>
                                            @if ($errors->has('sections_id'))
                                                <span
                                                    class="help-block"><strong>{{ $errors->first('sections_id') }}</strong></span>
                                            @endif
                                            @if ($errors->has('sections_id'))
                                                <span
                                                    class="help-block"><strong>{{ $errors->first('sections_id') }}</strong></span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <label class="control-label col-sm-12 mb-2" for="years_id">السنة</label>
                                        <div class="col-sm-12">

                                            <select type="years_id" wire:model.lazy="years_id"
                                                class="form-control {{ $errors->first('years_id') ? 'is-invalid' : '' }}"
                                                id="years_id" aria-describedby="years_id">
                                                <option value="">إختر سنة</option>
                                                @foreach ($years as $year)
                                                    <option value="{{ $year->id }}">{{ $year->name }}</option>
                                                @endforeach
                                            </select>
                                            @if ($errors->has('years_id'))
                                                <span
                                                    class="help-block"><strong>{{ $errors->first('years_id') }}</strong></span>
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
                                            <textarea name="keywords" class="form-control" wire:model.lazy='keywords'></textarea>
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
                                        <textarea name="descr" class="form-control" wire:model.lazy='descr' id=""></textarea>
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
                    <button wire:click='saveTopic' type="submit" class="btn  comp-btn"
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
                    <button wire:click='deletTopic' type="button" class="btn btn-danger"
                        data-bs-dismiss="modal">حذف</button>
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
                        <form wire:submit.prevent='editTopic'>
                            <div class="form-group mb-3 {{ $errors->has('name') ? ' has-error' : '' }}">
                                <div class="row">
                                    <label class="control-label col-sm-12 mb-2" for="name">المومضوع</label>
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
                            <div class="form-group mb-3  {{ $errors->has('name') ? ' has-error' : '' }}">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <label class="control-label col-sm-12 mb-2" for="sections_id">القسم</label>
                                        <div class="col-sm-12">
                                            <input type="text" wire:model.lazy="sections_id" autocomplete="off"
                                                class="form-control getsection {{ $errors->first('sections_id') ? 'is-invalid' : '' }}"
                                                id="sections_id" aria-describedby="sections_id"
                                                value={{ $sections_id }}>
                                            @if ($errors->has('sections_id'))
                                                <span
                                                    class="help-block"><strong>{{ $errors->first('sections_id') }}</strong></span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <label class="control-label col-sm-12 mb-2" for="years_id">السنة</label>
                                        <div class="col-sm-12">

                                            <select type="years_id" wire:model.lazy="years_id"
                                                class="form-control {{ $errors->first('years_id') ? 'is-invalid' : '' }}"
                                                id="years_id" aria-describedby="years_id">
                                                <option value="">إختر سنة</option>
                                                @foreach ($years as $year)
                                                    <option value="{{ $year->id }}"
                                                        {{ $year->id == $years_id ? 'selected' : '' }}>
                                                        {{ $year->name }}</option>
                                                @endforeach
                                            </select>
                                            @if ($errors->has('years_id'))
                                                <span
                                                    class="help-block"><strong>{{ $errors->first('years_id') }}</strong></span>
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
                                            <textarea name="keywords" class="form-control" wire:model.lazy='keywords'></textarea>
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
                                        <textarea name="descr" class="form-control" wire:model.lazy='descr' id=""></textarea>
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
                    <button type="button" wire:click="closeModel" class="btn btn-secondary"
                        data-bs-dismiss="modal">اغلاق</button>
                    <button wire:click='editTopic' type="submit" class="btn  comp-btn"
                        data-bs-dismiss="modal">حفظ</button>
                </div>
            </div>
        </div>
    </div>
    <div wire:ignore.self class="modal fade" id="openAttachment" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog " role="document">
            <div class="modal-content">

                <div class="modal-body">
                    <div class="container p-3">
                        <img class="poster-preview"
                            src="{{ asset('storage/topics/posters/' . $topic_id . '/' . $topic_id . '.' . $posterurl) }}" alt=""
                            srcset="">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">اغلاق</button>
                </div>
            </div>
        </div>
    </div>
    <div wire:ignore.self class="modal fade" id="addAttachment" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog " role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">اضافة مرفق جديد</h5>
                    <button type="button" class="close btn" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="container p-3">
                        <form wire:submit.prevent='addPoster'>
                            <div class="form-group {{ $errors->has('poster') ? ' has-error' : '' }}">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <input autocomplete="off" id="poster" type="file" class="form-control"
                                            wire:model.lazy='poster'>
                                        <div class="mt-2" wire:loading wire:target="poster">جاري التحميل ...
                                        </div>
                                        @if ($poster)
                                            <img src="{{ $poster->temporaryUrl() }}" class="w-50 p-4">
                                        @endif
                                        @if ($errors->has('poster'))
                                            <span
                                                class="help-block"><strong>{{ $errors->first('poster') }}</strong></span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">اغلاق</button>
                    <button wire:click='addPoster' type="submit" class="btn  comp-btn"
                        data-bs-dismiss="modal">حفظ</button>
                </div>
            </div>
        </div>
    </div>
    <div class="col-12">
        <div class="comp-header">
            <h4 class="comp-title">{{ $title }}
            </h4>
            @can('forqanshahid.addTopic', Auth::user()->id)
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
                        <th scope="col">الموضوع</th>
                        <th scope="col">العام</th>
                        <th scope="col">القسم</th>
                        <th scope="col">كلمات مفتاحية</th>
                        @can('forqanshahid.addTopicFile', Auth::user()->id)
                        <th scope="col">إضافة/ تعديل مرفق</th>
                        @endcan
                        <th scope="col">عرض المرفق</th>
                        <th scope="col">الوصف</th>
                        @can('forqanshahid.editTopic', Auth::user()->id)
                        <th scope="col">تعديل</th>
                        @endcan
                        @can('forqanshahid.deletTopic', Auth::user()->id)
                        <th scope="col">حذف</th>
                        @endcan
                    </tr>
                </thead>
                <tbody>
                    @foreach ($topics as $topic)
                        <tr>
                            <td>{{ $topic->id }}</td>
                            <td>{{ $topic->name }}</td>
                            <td>{{ $topic->year->name }}</td>
                            <td>{{ $topic->section->name }}</td>
                            <td>{{ $topic->keywords }}</td>
                            @can('forqanshahid.addTopicFile', Auth::user()->id)
                            <td>
                                <button data-bs-target="#addAttachment" data-bs-toggle="modal"
                                    wire:click='setTopic({{ $topic->id }})' class="btn comp-btn">
                                    <li class="fa fa-plus"></li>
                                </button>
                            </td>
                            @endcan

                            <td>
                                <button data-bs-target="#openAttachment" data-bs-toggle="modal"
                                    wire:click='setTopic({{ $topic->id }})' class="btn comp-btn">
                                    <li class="fa fa-folder"></li>
                                </button>
                            </td>
                            <td>{{ $topic->descr }}</td>
                            @can('forqanshahid.editTopic', Auth::user()->id)
                            <td>
                                <button data-bs-target="#edit" data-bs-toggle="modal"
                                    wire:click='setTopic({{ $topic->id }})' class="btn comp-btn">
                                    <li class="fa fa-edit"></li>
                                </button>
                            </td>
                            @endcan
                            @can('forqanshahid.deletTopic', Auth::user()->id)
                            <td>
                                <button data-bs-target="#delete" data-bs-toggle="modal"
                                    wire:click='setTopic({{ $topic->id }})' class="btn btn-danger">
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
