@push('css')
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-material-datetimepicker@2.7.1/css/bootstrap-material-datetimepicker.min.css">

    <style>
        .dtp-picker-days,
        .dtp-picker-month {
            display: none !important;
        }

    </style>
@endpush


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


<!-- Tahun Publikasi Field -->
<div class="col-md-6">
    <div class="form-group">
        {!! Form::label('tahun_terbit', 'Tahun Publikasi') !!}
        <code>*</code>
        {!! Form::text('tahun_terbit', null, ['class' => 'form-control tahun_terbit', 'required', 'placeholder' => 'YYYY']) !!}
    </div>
</div>


<!-- Isbn Field -->
<div class="col-md-6">
    <div class="form-group">
        {!! Form::label('isbn', 'Isbn') !!}
        {!! Form::text('isbn', null, ['class' => 'form-control', 'maxlength' => 20, 'maxlength' => 20]) !!}
    </div>
</div>

<!-- Kategori Field -->
<div class="col-md-6">
    <div class="form-group">
        {!! Form::label('kategori', 'Kategori') !!}
        {!! Form::text('kategori', null, ['class' => 'form-control', 'maxlength' => 50, 'maxlength' => 50]) !!}
    </div>
</div>

<!-- Deskripsi Field -->
<div class="col-md-12">
    <div class="form-group">
        {!! Form::label('deskripsi', 'Deskripsi') !!}
        <code>*</code>
        {!! Form::textarea('deskripsi', null, ['class' => 'form-control', 'required', 'rows' => 6]) !!}
    </div>
</div>

<!-- Cover Buku Field -->
<div class="col-md-12">
    <div class="form-group">
        {!! Form::label('cover', 'Cover Buku') !!}
        <small class="mb-2 text-muted d-block">
            <i class="fas fa-info-circle"></i> Format: JPG, PNG, JPEG (Max: 5MB)
        </small>

        <div class="input-group">
            {!! Form::file('cover', ['class' => 'form-control', 'accept' => 'image/*', 'id' => 'cover_input']) !!}
            <span class="input-group-text" id="cover-name">Pilih Gambar</span>
        </div>

        {{-- PREVIEW COVER SAAT EDIT --}}
        @if(isset($bukuDigital))
            @php
                $cover = $bukuDigital->getFirstMedia('cover');
            @endphp

            @if($cover)
                <div class="gap-3 p-3 mt-3 border rounded d-flex align-items-center">
                    <img src="{{ $cover->getFullUrl() }}"
                         alt="Cover Buku"
                         class="rounded shadow"
                         style="width: 140px; height: 180px; object-fit: cover;">

                    <div>
                        <strong>Cover saat ini:</strong>
                        <div class="mt-2">
                            <a href="{{ $cover->getFullUrl() }}" target="_blank" class="btn btn-success btn-sm">
                                <i class="fa fa-eye"></i> Lihat
                            </a>

                            <button type="button"
                                    class="btn btn-danger btn-sm ms-2"
                                    id="delete-cover"
                                    data-id="{{ $cover->id }}">
                                <i class="fa fa-trash"></i> Hapus
                            </button>
                        </div>
                    </div>
                </div>
            @endif
        @endif
    </div>
</div>


<!-- File Buku Field -->
<div class="col-md-12">
    <div class="form-group">
        {!! Form::label('buku_file', 'File Buku') !!}
        <small class="mb-2 text-muted d-block">
            <i class="fas fa-info-circle"></i> Format: PDF, DOC, DOCX (Max: 10MB)
        </small>
        <div class="input-group">
            {!! Form::file('buku_file', ['class' => 'form-control', 'accept' => '.pdf,.doc,.docx', 'id' => 'buku_file_input']) !!}
            <span class="input-group-text" id="file-name">Pilih File</span>
        </div>

        @if(isset($bukuDigital))
            @php
                $media = $bukuDigital->getFirstMedia('buku_file');
            @endphp
            @if($media)
                <div class="mt-3 alert alert-info">
                    <i class="fas fa-file-pdf"></i>
                    <strong>File saat ini:</strong>
                    <div class="gap-2 form-group">
                        <a href="{{ $media->getFullUrl() }}" target="_blank" class="text-primary">
                            {{ $media->file_name }}
                        </a>
                        <a href="{{ $media->getFullUrl() }}" target="_blank" class="btn btn-sm btn-success ms-2">
                            <i class="fa fa-eye"></i>Lihat
                        </a>

                        <button type="button" class="btn btn-sm btn-danger ms-2" id="delete-media" data-id="{{ $media->id }}">
                            <i class="fa fa-trash"></i>Hapus
                        </button>
                    </div>
                </div>
            @endif
        @endif
    </div>
</div>

<!-- Protection & System Settings -->
<div class="mt-4 col-md-12">
    <div class="form-section">
        <div class="mb-3 form-section-title">
            <i class="fas fa-shield-alt"></i> Pengaturan Proteksi & Sistem
        </div>

        <!-- Protection Settings Card -->
        <div class="mb-4 shadow-sm card border-left-warning">
            <div class="mx-3 card-body">
                <h6 class="mb-3 card-title">
                    <i class="fas fa-lock text-warning"></i> Pengaturan Akses
                </h6>

                <div class="mb-3 form-check form-check-flat form-check-primary">
                    {!! Form::hidden('is_protected', 0) !!}
                    {!! Form::checkbox('is_protected', '1', null, [
                        'class' => 'form-check-input',
                        'id' => 'is_protected',
                        'data-toggle' => 'toggle'
                    ]) !!}
                    <label class="form-check-label" for="is_protected">
                        <strong>Lindungi Jurnal Ini</strong>
                        <small class="mt-1 d-block text-muted">
                            <i class="fas fa-info-circle"></i> Jika dicentang, hanya pembuat dan admin yang dapat mengakses
                        </small>
                    </label>
                </div>

                <div id="protectionInfo" class="alert alert-warning alert-dismissible fade show d-none" role="alert">
                    <i class="fas fa-lock-open"></i> <strong>Catatan:</strong> Jurnal yang terlindungi hanya dapat diakses oleh pembuat dan administrator.
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            </div>
        </div>

        <!-- Status & System Settings Card -->
        <div class="card border-left-danger">
            <div class="mx-3 card-body">
                <h6 class="mb-3 card-title">
                    <i class="fas fa-cog text-danger"></i> Status & Sistem
                </h6>

                <div class="mb-3 form-check form-check-flat form-check-danger">
                    {!! Form::hidden('is_deleted', 0) !!}
                    {!! Form::checkbox('is_deleted', '1', null, [
                        'class' => 'form-check-input',
                        'id' => 'is_deleted',
                        'data-toggle' => 'toggle'
                    ]) !!}
                    <label class="form-check-label" for="is_deleted">
                        <strong class="text-danger">Tandai Sebagai Dihapus</strong>
                        <small class="mt-1 d-block text-muted">
                            <i class="fas fa-info-circle"></i> Jurnal akan disembunyikan dari daftar utama (soft delete)
                        </small>
                    </label>
                </div>

                <!-- System Fields Info -->
                @if(isset($bukuDigital))
                <div class="pt-3 mt-3 row border-top">
                    <div class="col-md-6">
                        <small class="text-muted">
                            <strong>Dibuat Oleh:</strong>
                            <span class="text-white badge bg-primary">
                                {{ $bukuDigital->createdBy->name ?? Auth::user()->name }}
                            </span>
                        </small>
                    </div>
                    <div class="col-md-6">
                        <small class="text-muted">
                            <strong>Tanggal Buat:</strong>
                            <span>{{ $bukuDigital->created_at->format('d M Y H:i') ?? now()->format('d M Y H:i') }}</span>
                        </small>
                    </div>
                </div>
                <div class="pt-2 row">
                    <div class="col-md-6">
                        <small class="text-muted">
                            <strong>Diubah Oleh:</strong>
                            <span class="text-white badge bg-info">
                                {{ $bukuDigital->updatedBy->name ?? 'Belum diubah' }}
                            </span>
                        </small>
                    </div>
                    <div class="col-md-6">
                        <small class="text-muted">
                            <strong>Tanggal Ubah:</strong>
                            <span>{{ $bukuDigital->updated_at->format('d M Y H:i') ?? '-' }}</span>
                        </small>
                    </div>
                </div>
                @endif

                <div class="d-none">
                    {!! Form::number('created_by', Auth::id(), ['readonly']) !!}
                    {!! Form::number('updated_by', Auth::id(), ['readonly']) !!}
                </div>
            </div>
        </div>
    </div>
</div>
@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.30.1/moment.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap-material-datetimepicker@2.7.1/js/bootstrap-material-datetimepicker.min.js"></script>
<script>
$(document).ready(function () {

    // === Datepicker Tahun ===
    $('.tahun_terbit').bootstrapMaterialDatePicker({
        format: 'YYYY',
        time: false,
        clearButton: true,
        weekStart: 0,
        switchOnClick: true
    });

    // Only allow selecting year
    $('.tahun_terbit').on('change', function (e, date) {
        if (date) {
            $(this).val(date.format("YYYY")); // ensure output is only the year
        }
    });


    // === Validasi Form Required ===
    $('form').on('submit', function(e) {
        const requiredFields = [
            'judul',
            'pengarang',
            'penerbit',
            'tahun_publikasi',
            'volume',
            'nomor',
            'issn',
            'bidang_ilmu',
            'deskripsi'
        ];

        let isValid = true;

        requiredFields.forEach(field => {
            const input = $(`[name="${field}"]`);
            if (input.length && !input.val().trim()) {
                input.addClass('is-invalid');
                isValid = false;
            } else {
                input.removeClass('is-invalid');
            }
        });

        if (!isValid) {
            e.preventDefault();
            Swal.fire({
                icon: 'error',
                title: 'Validasi',
                text: 'Semua field yang bertanda * harus diisi.'
            });
            return false;
        }
    });

    // === Auto Format ISSN : XXXX-XXXX ===
    $('input[name="issn"]').on('keyup', function() {
        let value = $(this).val().replace(/\D/g, '');
        if (value.length > 4) {
            value = value.substring(0, 4) + '-' + value.substring(4, 8);
        }
        $(this).val(value);
    });

    // === Update Label Nama File ===
    $('#buku_file_input').on('change', function() {
        const fileName = this.files[0] ? this.files[0].name : 'Pilih File';
        $('#file-name').text(fileName);
    });

    // Update label file cover
    $('#cover_input').on('change', function() {
        const fileName = this.files[0] ? this.files[0].name : 'Pilih Gambar';
        $('#cover-name').text(fileName);
    });


    // === Hapus File Media (AJAX) ==
});
</script>
@endpush
