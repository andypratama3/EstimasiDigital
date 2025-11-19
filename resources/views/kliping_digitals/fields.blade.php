

<!-- Judul Field -->
<div class="col-md-12">
    <div class="form-group">
        {!! Form::label('judul', 'Judul') !!}
        <code>*</code>
        {!! Form::text('judul', null, ['class' => 'form-control', 'required', 'maxlength' => 255]) !!}
    </div>
</div>

<!-- Sumber Field -->
<div class="col-md-12">
    <div class="form-group">
        <code>*</code>
        {!! Form::label('sumber', 'Sumber') !!}
        {!! Form::text('sumber', null, ['class' => 'form-control', 'maxlength' => 100]) !!}
    </div>
</div>

<!-- Tanggal Publikasi Field -->
<div class="col-md-12">
    <div class="form-group">
        <code>*</code>
        {!! Form::label('tanggal_publikasi', 'Tanggal Publikasi') !!}
        {!! Form::date('tanggal_publikasi', null, ['class' => 'form-control','id'=>'tanggal_publikasi']) !!}
    </div>
</div>
<!-- Penulis Field -->
<div class="col-md-12">
    <div class="form-group">
        <code>*</code>
        {!! Form::label('penulis', 'Penulis') !!}
        {!! Form::text('penulis', null, ['class' => 'form-control', 'maxlength' => 100]) !!}
    </div>
</div>

<!-- Kategori Field -->
<div class="col-md-12">
    <div class="form-group">
        <code>*</code>
        {!! Form::label('kategori', 'Kategori') !!}
        {!! Form::text('kategori', null, ['class' => 'form-control', 'maxlength' => 50]) !!}
    </div>
</div>

<!-- Url Sumber Field -->
<div class="col-md-12">
    <div class="form-group">
        <code>*</code>
        {!! Form::label('url_sumber', 'Url Sumber') !!}
        {!! Form::text('url_sumber', null, ['class' => 'form-control', 'maxlength' => 255]) !!}
    </div>
</div>

<!-- Isi Field dengan Quill Editor -->
<div class="col-md-12">
    <div class="form-group">
        {!! Form::label('isi', 'Isi Kliping') !!}
        <code>*</code>
        <div id="editor" style="height: 400px; background-color: white;"></div>
        {!! Form::hidden('isi', null, ['id' => 'content-editor']) !!}
        @if($errors->has('isi'))
            <span class="text-danger">{{ $errors->first('isi') }}</span>
        @endif
    </div>
</div>

<div class="mt-2 mb-4 col-md-12">
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
                        <strong>Lindungi Kliping Ini</strong>
                        <small class="mt-1 d-block text-muted">
                            <i class="fas fa-info-circle"></i> Jika dicentang, hanya pembuat dan admin yang dapat mengakses
                        </small>
                    </label>
                </div>

                <!-- Additional Protection Info -->
                <div id="protectionInfo" class="alert alert-warning alert-dismissible fade show d-none" role="alert">
                    <i class="fas fa-lock-open"></i> <strong>Catatan:</strong> Jurnal yang terlindungi hanya dapat diakses oleh pembuat dan administrator.
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            </div>
        </div>

        <!-- Status & System Settings Card -->
        <div class="card border-left-danger">
            <div class="card-body">
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
                @if(isset($klipingDigital))
                <div class="pt-3 mt-3 row border-top">
                    <div class="col-md-6">
                        <small class="text-muted">
                            <strong>Dibuat Oleh:</strong>
                            <span class="text-white badge bg-primary">
                                {{ $klipingDigital->createdBy->name ?? Auth::user()->name }}
                            </span>
                        </small>
                    </div>
                    <div class="col-md-6">
                        <small class="text-muted">
                            <strong>Tanggal Buat:</strong>
                            <span>{{ $klipingDigital->created_at->format('d M Y H:i') ?? now()->format('d M Y H:i') }}</span>
                        </small>
                    </div>
                </div>
                @endif
            </div>
        </div>

        <div class="d-none">
            {!! Form::number('created_by', Auth::id(), ['readonly']) !!}
            {!! Form::number('updated_by', Auth::id(), ['readonly']) !!}
        </div>
    </div>
</div>
<!-- Is Protected Field -->
@include('package.quil')

@push('scripts')
<script>
    $(document).ready(function () {
        // Register module resize
        Quill.register("modules/resize", window.QuillResizeImage);

        const toolbarOptions = [
            ['bold', 'italic', 'underline', 'strike'],
            ['blockquote', 'code-block'],
            [{ 'header': 1 }, { 'header': 2 }],
            [{ 'list': 'ordered' }, { 'list': 'bullet' }],
            [{ 'script': 'sub' }, { 'script': 'super' }],
            [{ 'indent': '-1' }, { 'indent': '+1' }],
            [{ 'direction': 'rtl' }],
            [{ 'size': ['small', false, 'large', 'huge'] }],
            [{ 'header': [1, 2, 3, 4, 5, 6, false] }],
            [{ 'color': [] }, { 'background': [] }],
            [{ 'font': [] }],
            [{ 'align': [] }],
            ['link', 'image', 'video'],
            ['clean']
        ];

        var quill = new Quill('#editor', {
            theme: 'snow',
            modules: {
                toolbar: {
                    container: toolbarOptions,
                    handlers: {
                        image: selectLocalImage
                    }
                },
                resize: {}
            }
        });

        // Set value saat edit
        @isset($klipingDigital)
            quill.root.innerHTML = {!! json_encode($klipingDigital->isi) !!};
        @endisset

        // Sync ke hidden input
        quill.on('text-change', function() {
            $('#content-editor').val(quill.root.innerHTML);
        });

        // Validasi kosong sebelum submit
        $('form').on('submit', function(e) {
            if (quill.getText().trim().length === 0) {
                e.preventDefault();
                Swal.fire({
                    icon: 'error',
                    title: 'Validasi',
                    text: 'Isi kliping tidak boleh kosong'
                });
                return false;
            }
        });

        // Upload gambar
        function selectLocalImage() {
            const input = document.createElement("input");
            input.type = "file";
            input.accept = "image/*";
            input.click();

            input.onchange = async () => {
                const file = input.files[0];
                if (!file) return;

                const formData = new FormData();
                formData.append("gambar_upload", file);

                try {
                    const res = await fetch("{{ route('kliping-digital.uploadImage') }}", {
                        method: "POST",
                        headers: {
                            "X-CSRF-TOKEN": "{{ csrf_token() }}"
                        },
                        body: formData
                    });

                    const data = await res.json();

                    if (data.status === "success") {
                        let range = quill.getSelection(true);
                        quill.insertEmbed(range.index, "image", data.url);
                        Swal.fire({ icon: 'success', title: 'Berhasil', timer: 1500 });
                    } else {
                        Swal.fire({ icon: 'error', title: 'Error', text: data.message });
                    }

                } catch (e) {
                    Swal.fire({ icon: 'error', title: 'Upload gagal', text: e.message });
                }
            };
        }
    });
</script>
@endpush
