<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="/pegawai">
                    @csrf

                    <div class="form-group row">
                        <label for="name" class="col-md-4 col-form-label text-md-left">{{ __('Name') }}</label>

                        <div class="col-md-8">
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="jabatan" class="col-md-4 col-form-label text-md-left">{{ __('Jabatan') }}</label>

                        <div class="col-md-8">
                            <select class="form-control @error('jabatan') is-invalid @enderror" id="jabatan"
                                name="jabatan">
                                @foreach ($jabatan as $jabatan)
                                <option value={{$jabatan->id}}>{{$jabatan->jabatan}}
                                </option>
                                @endforeach
                            </select>

                            @error('jabatan')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="join" class="col-md-4 col-form-label text-md-left">{{ __('Join Date') }}</label>

                        <div class="col-md-8">
                            <input id="join" type="date" class="form-control @error('join') is-invalid @enderror"
                                name="join" value="{{ old('join') }}" required autocomplete="join" autofocus>

                            @error('join')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="tempat_lahir"
                            class="col-md-4 col-form-label text-md-left">{{ __('Tempat Lahir') }}</label>

                        <div class="col-md-8">
                            <input id="tempat_lahir" type="text"
                                class="form-control @error('tempat_lahir') is-invalid @enderror" name="tempat_lahir"
                                value="{{ old('tempat_lahir') }}" required autocomplete="tempat_lahir" autofocus>

                            @error('tempat_lahir')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="tgl_lahir"
                            class="col-md-4 col-form-label text-md-left">{{ __('Tanggal Lahir') }}</label>

                        <div class="col-md-8">
                            <input id="tgl_lahir" type="date"
                                class="form-control @error('tgl_lahir') is-invalid @enderror" name="tgl_lahir"
                                value="{{ old('tgl_lahir') }}" required autocomplete="tgl_lahir" autofocus>

                            @error('tgl_lahir')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="alamat" class="col-md-4 col-form-label text-md-left">{{ __('Alamat') }}</label>

                        <div class="col-md-8">
                            <input id="alamat" type="text" class="form-control @error('alamat') is-invalid @enderror"
                                name="alamat" value="{{ old('alamat') }}" required autocomplete="alamat" autofocus>

                            @error('alamat')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label for="email"
                            class="col-md-4 col-form-label text-md-left">{{ __('E-Mail Address') }}</label>

                        <div class="col-md-8">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                name="email" value="{{ old('email') }}" required autocomplete="email">

                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="password" class="col-md-4 col-form-label text-md-left">{{ __('Password') }}</label>

                        <div class="col-md-8">
                            <input id="password" type="password"
                                class="form-control @error('password') is-invalid @enderror" name="password" required
                                autocomplete="new-password">

                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="password-confirm"
                            class="col-md-4 col-form-label text-md-left">{{ __('Confirm Password') }}</label>

                        <div class="col-md-8">
                            <input id="password-confirm" type="password" class="form-control"
                                name="password_confirmation" required autocomplete="new-password">
                        </div>
                    </div>
            </div>

            <div class="modal-footer">
                <button type="submit" class="btn btn-danger">{{ __('Save') }} </button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </form>
            </div>
        </div>
    </div>
</div>
