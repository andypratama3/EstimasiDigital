{{-- textarea.blade.php --}}
<!-- {{ $fieldTitle }} Field -->
<div class="col-md-12">
    <div class="form-group">
@if($config->options->localized)
        @{!! Form::label('{{ $fieldName }}', __('models/{{ $config->modelNames->camelPlural }}.fields.{{ $fieldName }}')) !!}
@else
        @{!! Form::label('{{ $fieldName }}', '{{ $fieldTitle }}') !!}
@endif
        @{!! Form::textarea('{{ $fieldName }}', null, ['class' => 'form-control'@php if(isset($options)) { echo htmlspecialchars_decode($options); } @endphp]) !!}
    </div>
</div>
