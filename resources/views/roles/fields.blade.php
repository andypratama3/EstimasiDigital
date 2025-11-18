<!-- Name Field -->
<div class="col-md-6">
    <div class="form-group">
        {!! Form::label('name', 'Name') !!}
        {!! Form::text('name', null, ['class' => 'form-control', 'required', 'maxlength' => 255, 'maxlength' => 255]) !!}
    </div>
</div>


<!-- Guard Name Field -->
<div class="col-md-6">
    <div class="form-group">
        {!! Form::label('guard_name', 'Guard Name') !!}
        {!! Form::text('guard_name', null, ['class' => 'form-control', 'required', 'maxlength' => 255, 'maxlength' => 255]) !!}
    </div>
</div>
