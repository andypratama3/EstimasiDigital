<div class="p-0 card-body">
    <div class="table-responsive">
        <table class="table table-striped" id="buku-digitals-table">
            <thead>
            <tr>
                <th>#</th>
                <th>Judul</th>
                <th>Pengarang</th>
                <th>Penerbit</th>
                <th>Tahun Terbit</th>
                <th>ISBN</th>
                <th>Deskripsi</th>
                <th>Kategori</th>
                <th>Proteksi</th>
                <th>Dibuat Oleh</th>
                <th>Diubah Oleh</th>
                <th>Status</th>
                <th colspan="3">Action</th>
            </tr>
            </thead>

            <tbody>
            @foreach($bukuDigitals as $index => $bukuDigital)
                <tr>

                    {{-- NOMOR URUT --}}
                    <td>{{ (($bukuDigitals->currentPage() - 1) * $bukuDigitals->perPage()) + ($loop->index + 1) }}</td>

                    {{-- KOLOM --}}
                    <td>{{ Str::limit($bukuDigital->judul, 25, ' ...') }}</td>
                    <td>{{ Str::limit($bukuDigital->pengarang, 20, ' ...') }}</td>
                    <td>{{ Str::limit($bukuDigital->penerbit, 20, ' ...') }}</td>
                    <td>{{ $bukuDigital->tahun_terbit }}</td>
                    <td>{{ $bukuDigital->isbn }}</td>
                    <td>{{ Str::limit($bukuDigital->deskripsi, 25, ' ...') }}</td>
                    <td>{{ Str::limit($bukuDigital->kategori, 20, ' ...') }}</td>

                    {{-- PROTEKSI --}}
                    <td>
                        <span class="badge {{ $bukuDigital->is_protected ? 'bg-success' : 'bg-danger' }}">
                            {{ $bukuDigital->is_protected ? 'Ya' : 'Tidak' }}
                        </span>
                    </td>

                    {{-- USER --}}
                    <td>{{ $bukuDigital->createdBy->name ?? '-' }}</td>
                    <td>{{ $bukuDigital->updatedBy->name ?? '-' }}</td>

                    {{-- STATUS --}}
                    <td>
                        @if($bukuDigital->is_deleted)
                            <span class="text-white badge bg-danger">Dihapus</span>
                        @else
                            <span class="text-white badge bg-success">Aktif</span>
                        @endif
                    </td>

                    {{-- ACTION BUTTONS --}}
                    <td style="width: 120px">
                        <div class='btn-group'>

                            <a href="{{ route('bukuDigitals.show', $bukuDigital->id) }}" class='btn btn-sm'>
                                <i class="far fa-eye"></i>
                            </a>

                            <a href="{{ route('bukuDigitals.edit', $bukuDigital->id) }}" class='btn btn-primary btn-sm'>
                                <i class="far fa-edit"></i>
                            </a>

                            <button type="button"
                                class="btn btn-danger btn-sm btn-delete"
                                data-id="{{ $bukuDigital->id }}"
                                data-url="{{ route('bukuDigitals.destroy', $bukuDigital->id) }}">
                                <i class="far fa-trash-alt"></i>
                            </button>

                        </div>
                    </td>

                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    {{-- PAGINATION --}}
    <div class="clearfix card-footer">
        <div class="float-right">
            @include('adminlte-templates::common.paginate', ['records' => $bukuDigitals])
        </div>
    </div>
</div>
