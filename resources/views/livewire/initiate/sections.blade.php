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
                        <form wire:submit.prevent='saveSection'>
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
                            <div class="form-group mb-3  {{ $errors->has('name') ? ' has-error' : '' }}">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <label class="control-label col-sm-12 mb-2" for="sectiontypes_id">النوع</label>
                                        <div class="col-sm-12">
                                            <select type="sectiontypes_id" wire:model.lazy="sectiontypes_id"
                                                class="form-control {{ $errors->first('sectiontypes_id') ? 'is-invalid' : '' }}"
                                                id="sectiontypes_id" aria-describedby="sectiontypes_id">
                                                <option value="">إختر نوع</option>
                                                @foreach ($sectiontypes as $sectiontype)
                                                    <option value="{{ $sectiontype->id }}">{{ $sectiontype->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @if ($errors->has('sectiontypes_id'))
                                                <span
                                                    class="help-block"><strong>{{ $errors->first('sectiontypes_id') }}</strong></span>
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
                            <div class="form-group  {{ $errors->has('ordr') ? ' has-error' : '' }}">
                                <div class="row">
                                    <div class="col-sm-6">
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
                                    <div class="col-sm-6">
                                        <label class="control-label col-sm-12 mb-2" for="ismain">اساسي</label>
                                        <div class="col-sm-12">
                                            <select type="ismain" wire:model.lazy="ismain"
                                                class="form-control {{ $errors->first('ismain') ? 'is-invalid' : '' }}"
                                                id="ismain" aria-describedby="ismain">
                                                <option value="">....</option>
                                                <option value="0">لا</option>
                                                <option value="1">نعم</option>
                                            </select>
                                            @if ($errors->has('ismain'))
                                                <span
                                                    class="help-block"><strong>{{ $errors->first('ismain') }}</strong></span>
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
                    <button wire:click='saveSection' type="submit" class="btn  comp-btn"
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
                        <form wire:submit.prevent='editSection'>
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
                            <div class="form-group mb-3  {{ $errors->has('name') ? ' has-error' : '' }}">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <label class="control-label col-sm-12 mb-2" for="sectiontypes_id">النوع</label>
                                        <div class="col-sm-12">
                                            <select type="sectiontypes_id" wire:model.lazy="sectiontypes_id"
                                                class="form-control {{ $errors->first('sectiontypes_id') ? 'is-invalid' : '' }}"
                                                id="sectiontypes_id" aria-describedby="sectiontypes_id">
                                                <option value="">إختر نوع</option>
                                                @foreach ($sectiontypes as $sectiontype)
                                                    <option value="{{ $sectiontype->id }}"
                                                        {{ $sectiontype->id == $sectiontypes_id ? 'selected' : '' }}>
                                                        {{ $sectiontype->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @if ($errors->has('sectiontypes_id'))
                                                <span
                                                    class="help-block"><strong>{{ $errors->first('sectiontypes_id') }}</strong></span>
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
                                                        {{ $year->name }}
                                                    </option>
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
                            <div class="form-group  {{ $errors->has('ordr') ? ' has-error' : '' }}">
                                <div class="row">
                                    <div class="col-sm-6">
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
                                    <div class="col-sm-6">
                                        <label class="control-label col-sm-12 mb-2" for="ismain">اساسي</label>
                                        <div class="col-sm-12">
                                            <select type="ismain" wire:model.lazy="ismain"
                                                class="form-control {{ $errors->first('ismain') ? 'is-invalid' : '' }}"
                                                id="ismain" aria-describedby="ismain">
                                                <option value="">....</option>
                                                <option value="0">لا</option>
                                                <option value="1">نعم</option>
                                            </select>
                                            @if ($errors->has('ismain'))
                                                <span
                                                    class="help-block"><strong>{{ $errors->first('ismain') }}</strong></span>
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
                    <button wire:click='editSection' type="submit" class="btn comp-btn"
                        data-bs-dismiss="modal">تعديل</button>
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
                                ( <span class="red-color">{{ $sectionName }}</span> )
                            </p>
                        </h4>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">الغاء</button>
                    <button wire:click='deletSection' type="button" class="btn btn-danger"
                        data-bs-dismiss="modal">حذف</button>
                </div>
            </div>
        </div>
    </div>
    <div class="col-12">
        <div class="comp-header">
            <h4 class="comp-title">{{ $title }}
            </h4>
            @can('forqanshahid.addSection', Auth::user()->id)
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
        <div class="comp-data">
            @foreach ($sections->where('subsection_id', 0) as $section)
                <details open="open" id="{{ $section->id }}">
                    <summary>{{ $section->name }}
                        <div>
                            @can('forqanshahid.addSection', Auth::user()->id)
                                <button wire:click="setSectionId({{ $section->id }})" data-bs-target='#add'
                                    data-bs-toggle='modal' class="btn btn-info comp-btn section-btn ">
                                    <li class="fa fa-plus"></li>
                                </button>
                            @endcan
                            @can('forqanshahid.editSection', Auth::user()->id)
                                <button wire:click="setSection({{ $section->id }})" data-bs-target='#edit'
                                    data-bs-toggle='modal' class="btn btn-info comp-btn section-btn">
                                    <li class="fa fa-edit"></li>
                                </button>
                            @endcan
                            @if (count($section->subsections) <= 0)
                                @can('forqanshahid.deletSection', Auth::user()->id)
                                    <button data-bs-target="#delete" data-bs-toggle="modal"
                                        wire:click='setSectionId({{ $section->id }})' class="btn btn-danger">
                                        <li class="fa fa-trash"></li>
                                    </button>
                                @endcan
                            @endif
                        </div>

                    </summary>
                    <div class="folder">
                        @if (count($section->subsections))
                            @include('livewire.initiate.subsections', [
                                'subsections' => $section->subsections,
                                'id' => $section->id,
                            ])
                        @endif
                    </div>

                </details>
            @endforeach
        </div>
    </div>
</div>
