<div>
    {{-- <div class='content'>
        <!-- Dropzone -->
        <form method="POST" action="{{ route('dropzone.store') }}" enctype="multipart/form-data"
            class="dropzone dz-clickable" id="dropzoneJsForm">
            @csrf
            <input type="text" name="id" id="" hidden value="{{ Auth::user()->id }}">
            <div class="dz-defualt dz-message"><span>انقر هنا لإضافة
                    الصورة</span></div>
        </form>

    </div> --}}
    <div class="user-container">
        <div class="info-side">
            <div class="profile-img"></div>
            <p class="name">{{ Auth::user()->name }}</p>
            <p class="username">{{ Auth::user()->username }}</p>
            <p class="usergroup">{{ Auth::user()->usergroup->name }}</p>
        </div>

        <div class="password-side">
            <div class="inner-container">
                <h3>تغيير كلمة المرور</h3>
                <form wire:submit.prevent='editPassword'>
                    <div class="form-group mb-3 {{ $errors->has('password') ? ' has-error' : '' }}">
                        <div class="row">
                            <label class="control-label col-sm-12 mb-2" for="password">كلمة المرور</label>
                            <div class="col-sm-12">
                                <input id="password" type="password" class="form-control" wire:model.lazy='password'>
                                @if ($errors->has('password'))
                                    <span
                                        class="help-block"><strong>{{ $errors->first('password') }}</strong></span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="form-group mb-3 {{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                        <div class="row mb-3">
                            <label for="password_confirmation" class="col-md-12 col-form-label">تأكيد كلمة
                                المرور</label>

                            <div class="col-md-12">
                                <input wire:model.lazy='password_confirmation' id="password_confirmation"
                                    type="password" class="form-control" name="password_confirmation" required
                                    autocomplete="new-password">
                                @if ($errors->has('password_confirmation'))
                                    <span
                                        class="help-block"><strong>{{ $errors->first('password_confirmation') }}</strong></span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="form-btn">
                        <button wire:click='editPassword' type="submit" class="btn  comp-btn"
                            data-bs-dismiss="modal">حفظ</button>
                    </div>

                </form>

            </div>

        </div>
    </div>
</div>
