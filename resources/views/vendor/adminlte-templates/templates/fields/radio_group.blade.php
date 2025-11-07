{{-- radio_group.blade.php --}}
<!-- {{ $fieldTitle }} Field -->
<div class="col-md-12">
    <div class="form-group">
@if($config->options->localized)
        @{!! Form::label('{{ $fieldName }}', __('models/{{ $config->modelNames->camelPlural }}.fields.{{ $fieldName }}'), ['class' => 'form-check-label']) !!}
@else
        @{!! Form::label('{{ $fieldName }}', '{{ $fieldTitle }}', ['class' => 'form-check-label']) !!}
@endif
        {!! $radioButtons !!}
    </div>
</div>
