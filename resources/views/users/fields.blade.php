@push('css')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endpush


<!-- Name Field -->
<div class="col-md-6">
    <div class="form-group">
        {!! Form::label('name', 'Name') !!} <code>*</code>
        {!! Form::text('name', null, [
            'class' => 'form-control',
            'required',
            'maxlength' => 255
        ]) !!}
    </div>
</div>

<!-- Email Field -->
<div class="col-md-6">
    <div class="form-group">
        {!! Form::label('email', 'Email') !!} <code>*</code>
        {!! Form::email('email', null, [
            'class' => 'form-control',
            'required',
            'maxlength' => 255
        ]) !!}
    </div>
</div>

<!-- Email Verified At Field -->
<div class="col-md-6">
    <div class="form-group">
        {!! Form::label('email_verified_at', 'Email Verified') !!}
        {!! Form::date('email_verified_at', null, [
            'class' => 'form-control',
            'id' => 'email_verified_at'
        ]) !!}
    </div>
</div>
<div class="col-md-6">
    <div class="form-group">
        {!! Form::label('password', 'Password') !!} <code>*</code>

        {!! Form::password('password', [
            'class' => 'form-control',
            isset($user) ? '' : 'required',
            'maxlength' => 255
        ]) !!}

        @if(isset($user))
            <small class="text-muted">Kosongkan jika tidak ingin mengganti password.</small>
        @endif
    </div>
</div>

<!-- Role -->
<div class="col-md-12">
    <div class="form-group">
        {!! Form::label('role', 'Role') !!} <code>*</code>
        {!! Form::select('role', $roles, isset($user) ? $user->roles->pluck('name')->first() : null, [
            'class' => 'form-control select2-role',
            'required',
            'id' => 'role_select',
            'style' => 'width: 100%'
        ]) !!}
    </div>
</div>

<!-- Status Settings -->
<div class="mt-4 col-md-12">
    <div class="form-section">
        <div class="mb-3 form-section-title">
            <i class="fas fa-shield-alt"></i> Status Akun
        </div>

        <div class="card border-left-danger">
            <div class="mx-3 card-body">

                <div class="mb-3 form-check">
                    {!! Form::hidden('is_active', 0) !!}
                    {!! Form::checkbox('is_active', 1, isset($user) ? $user->is_active : true, [
                        'class' => 'form-check-input',
                        'id' => 'is_active'
                    ]) !!}

                    <label class="form-check-label" for="is_active">
                        <strong class="text-danger">Tandai Sebagai Aktif Atau Tidak Aktif</strong>
                        <small class="d-block text-muted">
                            <i class="fas fa-info-circle"></i> Pengguna akan disembunyikan dari daftar utama (soft delete)
                        </small>
                    </label>
                </div>

            </div>
        </div>
    </div>
</div>

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script>
    $(document).ready(function () {
        $('#role_select').select2({
        theme: "classic",
            width: '100%',
            placeholder: "Pilih Role",
            minimumResultsForSearch: -1
        });
    });
</script>
@endpush
