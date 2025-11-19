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

<!-- Guard Name Field -->
<div class="col-md-6">
    <div class="form-group">
        {!! Form::label('guard_name', 'Guard Name') !!} <code>*</code>
        {!! Form::text('guard_name', null, [
            'class' => 'form-control',
            'required',
            'maxlength' => 255,
            'placeholder' => 'web'
        ]) !!}
    </div>
</div>

<!-- Permissions Field -->
<div class="col-md-12">
    <div class="form-group">
        {!! Form::label('permissions', 'Permissions') !!}
        <div class="row">

            @if($permissions->count() > 0)
                @foreach ($permissions as $index => $permission)
                    <div class="mb-2 col-md-3">
                        <label class="d-flex align-items-center" style="gap: 6px;">
                            {!! Form::checkbox('permissions[]', $permission->id,
                                isset($role) ? $role->permissions->contains($permission->id) : false
                            ) !!}
                            {{ Str::title(str_replace(['.', '_','-'], ' ', $permission->name)) }}
                        </label>
                    </div>
                @endforeach
            @else
                <p class="text-muted ms-2">Tidak ada permission yang tersedia.</p>
            @endif

        </div>
    </div>
</div>
