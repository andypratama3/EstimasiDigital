{{-- date.blade.php --}}
<!-- {{ $fieldTitle }} Field -->
<div class="col-md-6">
    <div class="form-group">
@if($config->options->localized)
        @{!! Form::label('{{ $fieldName }}', __('models/{{ $config->modelNames->camelPlural }}.fields.{{ $fieldName }}')) !!}
@else
        @{!! Form::label('{{ $fieldName }}', '{{ $fieldTitle }}') !!}
@endif
        @{!! Form::text('{{ $fieldName }}', null, ['class' => 'form-control','id'=>'{{ $fieldName }}']) !!}
    </div>
</div>

@@push('page_scripts')
    <script type="text/javascript">
        $('#{{ $fieldName }}').datepicker()
    </script>
@@endpush

