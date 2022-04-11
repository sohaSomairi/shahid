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
                        <form wire:submit.prevent='saveSlider'>
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
                            <div class="form-group mb-3  {{ $errors->has('subtitle') ? ' has-error' : '' }}">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <label class="control-label col-sm-12 mb-2" for="subtitle">العنوان
                                            الفرعي</label>
                                        <div class="col-sm-12">

                                            <input type="text" wire:model.lazy="subtitle" autocomplete="off"
                                                class="form-control getsection {{ $errors->first('subtitle') ? 'is-invalid' : '' }}"
                                                id="sections_id" aria-describedby="subtitle" value={{ $subtitle }}>
                                            @if ($errors->has('subtitle'))
                                                <span
                                                    class="help-block"><strong>{{ $errors->first('subtitle') }}</strong></span>
                                            @endif
                                            @if ($errors->has('subtitle'))
                                                <span
                                                    class="help-block"><strong>{{ $errors->first('sections_id') }}</strong></span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group  {{ $errors->has('ordr') ? ' has-error' : '' }}">
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
                            <div class="form-group mb-3 {{ $errors->has('link') ? ' has-error' : '' }}">
                                <div class="row">
                                    <label class="control-label col-sm-12 mb-2" for="link">الرابط</label>
                                    <div class="col-sm-12">
                                        <input autocomplete="off" id="link" type="text" class="form-control"
                                            wire:model.lazy='link'>
                                        @if ($errors->has('link'))
                                            <span
                                                class="help-block"><strong>{{ $errors->first('link') }}</strong></span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="form-group mb-3 {{ $errors->has('img') ? ' has-error' : '' }}">
                                <div class="row">
                                    <label class="control-label col-sm-12 mb-2" for="img">الصورة</label>
                                    <div class="col-sm-12">
                                        <input autocomplete="off" id="img" type="file" class="form-control"
                                            wire:model.lazy='img'>

                                        <div class="mt-2" wire:loading wire:target="img">جاري التحميل ...

                                        </div>

                                        @if ($img)
                                            <img src="{{ $img->temporaryUrl() }}" class="w-50 p-4">
                                        @endif
                                        @if ($errors->has('img'))
                                            <span
                                                class="help-block"><strong>{{ $errors->first('img') }}</strong></span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                    </form>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">اغلاق</button>
                <button wire:click='saveSlider' type="submit" class="btn  comp-btn"
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
                    <form wire:submit.prevent='editSlider'>
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
                        <div class="form-group mb-3  {{ $errors->has('subtitle') ? ' has-error' : '' }}">
                            <div class="row">
                                <div class="col-sm-12">
                                    <label class="control-label col-sm-12 mb-2" for="subtitle">العنوان
                                        الفرعي</label>
                                    <div class="col-sm-12">

                                        <input type="text" wire:model.lazy="subtitle" autocomplete="off"
                                            class="form-control getsection {{ $errors->first('subtitle') ? 'is-invalid' : '' }}"
                                            id="sections_id" aria-describedby="subtitle" value={{ $subtitle }}>
                                        @if ($errors->has('subtitle'))
                                            <span
                                                class="help-block"><strong>{{ $errors->first('subtitle') }}</strong></span>
                                        @endif
                                        @if ($errors->has('subtitle'))
                                            <span
                                                class="help-block"><strong>{{ $errors->first('sections_id') }}</strong></span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group  {{ $errors->has('ordr') ? ' has-error' : '' }}">
                            <div class="row">
                                <div class="col-sm-12">
                                    <label class="control-label col-sm-12 mb-2" for="ordr">الترتيب</label>
                                    <div class="col-sm-12">
                                        <input id="ordr" type="number" class="form-control" wire:model.lazy='ordr'>
                                        @if ($errors->has('ordr'))
                                            <span
                                                class="help-block"><strong>{{ $errors->first('ordr') }}</strong></span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group mb-3 {{ $errors->has('link') ? ' has-error' : '' }}">
                            <div class="row">
                                <label class="control-label col-sm-12 mb-2" for="link">الرابط</label>
                                <div class="col-sm-12">
                                    <input autocomplete="off" id="link" type="text" class="form-control"
                                        wire:model.lazy='link'>
                                    @if ($errors->has('link'))
                                        <span
                                            class="help-block"><strong>{{ $errors->first('link') }}</strong></span>
                                    @endif
                                </div>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">اغلاق</button>
                <button wire:click='editSlider' type="submit" class="btn  comp-btn"
                    data-bs-dismiss="modal">حفظ</button>
            </div>
        </div>
    </div>
</div>
<div wire:ignore.self class="modal fade" id="changeImg" tabindex="-1" role="dialog"
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



                    <form wire:submit.prevent='changeSlideImg'>
                        <div class="form-group {{ $errors->has('img') ? ' has-error' : '' }}">
                            <div class="row">
                                <div class="col-sm-12">
                                    <input autocomplete="off" id="img" type="file" class="form-control"
                                        wire:model.lazy='img'>
                                    <div class="mt-2" wire:loading wire:target="img">جاري التحميل ...
                                    </div>
                                    @if ($img)
                                        <img src="{{ $img->temporaryUrl() }}" class="w-50 p-4">
                                    @endif

                                    @if ($errors->has('img'))
                                        <span
                                            class="help-block"><strong>{{ $errors->first('img') }}</strong></span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">اغلاق</button>
                <button wire:click='changeSlideImg' type="submit" class="btn  comp-btn"
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
                <button wire:click='deleteSlider' type="button" class="btn btn-danger"
                    data-bs-dismiss="modal">حذف</button>
            </div>
        </div>
    </div>
</div>

<div class="col-12">
    <div class="comp-header">
        <h4 class="comp-title">{{ $title }}

        </h4>
        @can('forqanshahid.addSlide', Auth::user()->id)
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
                    <th scope="col">العنوان</th>
                    <th scope="col">العنوان الفرعي</th>
                    <th scope="col">الرابط</th>
                    <th scope="col">الترتيب</th>
                    @can('forqanshahid.editSlideImg', Auth::user()->id)
                    <th scope="col">تعديل الصورة</th>
                    @endcan
                    @can('forqanshahid.editSlide', Auth::user()->id)
                    <th scope="col">تعديل</th>
                    @endcan
                    @can('forqanshahid.deletSlide', Auth::user()->id)
                    <th scope="col">حذف</th>
                    @endcan
                </tr>
            </thead>
            <tbody>
                @foreach ($sliders as $slider)
                    <tr>
                        <td>{{ $slider->id }}</td>
                        <td>{{ $slider->title }}</td>
                        <td>{{ $slider->subtitle }}</td>
                        <td>{{ $slider->link }}</td>
                        <td>{{ $slider->ordr }}</td>

                          @can('forqanshahid.editSlideImg', Auth::user()->id)
                        <td>
                            <button data-bs-target="#changeImg" data-bs-toggle="modal"
                                wire:click='setSlider({{ $slider->id }})' class="btn comp-btn">
                                <li class="fa fa-plus"></li>
                            </button>
                        </td>
                        @endcan

                          @can('forqanshahid.editSlide', Auth::user()->id)
                        <td>
                            <button data-bs-target="#edit" data-bs-toggle="modal"
                                wire:click='setSlider({{ $slider->id }})' class="btn comp-btn">
                                <li class="fa fa-edit"></li>
                            </button>
                        </td>
                        @endcan
                          @can('forqanshahid.deletSlide', Auth::user()->id)
                        <td>
                            <button data-bs-target="#delete" data-bs-toggle="modal"
                                wire:click='setSlider({{ $slider->id }})' class="btn btn-danger">
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
