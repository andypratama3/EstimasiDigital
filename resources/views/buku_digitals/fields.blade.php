<!-- Judul Field -->
<div class="col-md-6">
    <div class="form-group">
        {!! Form::label('judul', 'Judul') !!}
        {!! Form::text('judul', null, ['class' => 'form-control', 'required', 'maxlength' => 255, 'maxlength' => 255]) !!}
    </div>
</div>


<!-- Pengarang Field -->
<div class="col-md-6">
    <div class="form-group">
        {!! Form::label('pengarang', 'Pengarang') !!}
        {!! Form::text('pengarang', null, ['class' => 'form-control', 'maxlength' => 100, 'maxlength' => 100]) !!}
    </div>
</div>


<!-- Penerbit Field -->
<div class="col-md-6">
    <div class="form-group">
        {!! Form::label('penerbit', 'Penerbit') !!}
        {!! Form::text('penerbit', null, ['class' => 'form-control', 'maxlength' => 100, 'maxlength' => 100]) !!}
    </div>
</div>


<!-- Tahun Terbit Field -->
<div class="col-md-6">
    <div class="form-group">
        {!! Form::label('tahun_terbit', 'Tahun Terbit') !!}
        {!! Form::text('tahun_terbit', null, ['class' => 'form-control','id'=>'tahun_terbit']) !!}
    </div>
</div>

@push('page_scripts')
    <script type="text/javascript">
        $('#tahun_terbit').datepicker()
    </script>
@endpush



<!-- Isbn Field -->
<div class="col-md-6">
    <div class="form-group">
        {!! Form::label('isbn', 'Isbn') !!}
        {!! Form::text('isbn', null, ['class' => 'form-control', 'maxlength' => 20, 'maxlength' => 20]) !!}
    </div>
</div>


<!-- Deskripsi Field -->
<div class="col-md-12">
    <div class="form-group">
        {!! Form::label('deskripsi', 'Deskripsi') !!}
        {!! Form::textarea('deskripsi', null, ['class' => 'form-control']) !!}
    </div>
</div>


<!-- Kategori Field -->
<div class="col-md-6">
    <div class="form-group">
        {!! Form::label('kategori', 'Kategori') !!}
        {!! Form::text('kategori', null, ['class' => 'form-control', 'maxlength' => 50, 'maxlength' => 50]) !!}
    </div>
</div>


<div class="col-md-6">
    <div class="form-group">
        <div class="form-check form-check-flat form-check-primary">
            {!! Form::hidden('is_protected', 0) !!}
            {!! Form::checkbox('is_protected', '1', null, ['class' => 'form-check-input']) !!}
            {!! Form::label('is_protected', 'Is Protected', ['class' => 'form-check-label']) !!}
        </div>
    </div>
</div>


<!-- Created By Field -->
<div class="col-md-6">
    <div class="form-group">
        {!! Form::label('created_by', 'Created By') !!}
        {!! Form::number('created_by', null, ['class' => 'form-control', 'required']) !!}
    </div>
</div>


<!-- Updated By Field -->
<div class="col-md-6">
    <div class="form-group">
        {!! Form::label('updated_by', 'Updated By') !!}
        {!! Form::number('updated_by', null, ['class' => 'form-control']) !!}
    </div>
</div>


<div class="col-md-6">
    <div class="form-group">
        <div class="form-check form-check-flat form-check-primary">
            {!! Form::hidden('is_deleted', 0) !!}
            {!! Form::checkbox('is_deleted', '1', null, ['class' => 'form-check-input']) !!}
            {!! Form::label('is_deleted', 'Is Deleted', ['class' => 'form-check-label']) !!}
        </div>
    </div>
</div>
