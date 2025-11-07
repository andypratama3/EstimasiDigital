{{-- select.blade.php --}}
<!-- {{ $fieldTitle }} Field -->
<div class="col-md-6">
    <div class="form-group">
@if($config->options->localized)
        @{!! Form::label('{{ $fieldName }}', __('models/{{ $config->modelNames->camelPlural }}.fields.{{ $fieldName }}')) !!}
@else
        @{!! Form::label('{{ $fieldName }}', '{{ $fieldTitle }}') !!}
@endif
        @{!! Form::select('{{ $fieldName }}', @php echo htmlspecialchars_decode($selectValues) @endphp, null, ['class' => 'form-control custom-select']) !!}
    </div>
</div>
