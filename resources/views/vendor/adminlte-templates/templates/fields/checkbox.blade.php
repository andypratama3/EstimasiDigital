<div class="col-md-6">
    <div class="form-group">
        <div class="form-check form-check-flat form-check-primary">
            @{!! Form::hidden('{{ $fieldName }}', 0) !!}
            @{!! Form::checkbox('{{ $fieldName }}', '{{ $checkboxVal }}', null, ['class' => 'form-check-input']) !!}
            @{!! Form::label('{{ $fieldName }}', '{{ $fieldTitle }}', ['class' => 'form-check-label']) !!}
        </div>
    </div>
</div>
