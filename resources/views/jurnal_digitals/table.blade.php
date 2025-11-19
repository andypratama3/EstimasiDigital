<div class="p-0 card-body">
    <div class="table-responsive">
        <table class="table table-striped" id="jurnal-digitals-table">
            <thead>
            <tr>
                <th>#</th>
                <th>Judul</th>
                <th>Pengarang</th>
                <th>Penerbit</th>
                <th>Tahun Publikasi</th>
                <th>Volume</th>
                <th>Nomor</th>
                <th>ISSN</th>
                <th>Bidang Ilmu</th>
                <th>Proteksi</th>
                <th>Dibuat Oleh</th>
                <th>Diubah Oleh</th>
                <th>Status</th>
                <th colspan="3">Action</th>
            </tr>
            </thead>

            <tbody>
            @foreach($jurnalDigitals as $index => $jurnalDigital)
                <tr>

                    {{-- NOMOR URUT --}}
                    <td>{{ (($jurnalDigitals->currentPage() - 1) * $jurnalDigitals->perPage()) + ($loop->index + 1) }}</td>

                    {{-- KOLOM --}}
                    <td>{{ Str::limit($jurnalDigital->judul, 25, ' ...') }}</td>
                    <td>{{ Str::limit($jurnalDigital->pengarang, 20, ' ...') }}</td>
                    <td>{{ Str::limit($jurnalDigital->penerbit, 20, ' ...') }}</td>
                    <td>{{ $jurnalDigital->tahun_publikasi }}</td>
                    <td>{{ $jurnalDigital->volume }}</td>
                    <td>{{ $jurnalDigital->nomor }}</td>
                    <td>{{ $jurnalDigital->issn }}</td>
                    <td>{{ Str::limit($jurnalDigital->bidang_ilmu, 20, ' ...') }}</td>

                    {{-- PROTEKSI --}}
                    <td>
                        <span class="badge {{ $jurnalDigital->is_protected ? 'bg-success' : 'bg-danger' }}">
                            {{ $jurnalDigital->is_protected ? 'Ya' : 'Tidak' }}
                        </span>
                    </td>

                    {{-- USER --}}
                    <td>{{ $jurnalDigital->createdBy->name ?? '-' }}</td>
                    <td>{{ $jurnalDigital->updatedBy->name ?? '-' }}</td>

                    {{-- STATUS --}}
                    <td>
                        @if($jurnalDigital->is_deleted)
                            <span class="text-white badge bg-danger">Dihapus</span>
                        @else
                            <span class="text-white badge bg-success">Aktif</span>
                        @endif
                    </td>

                    {{-- ACTION BUTTONS --}}
                    <td style="width: 120px">
                        <div class='btn-group'>

                            <a href="{{ route('jurnalDigitals.show', $jurnalDigital->id) }}" class='btn btn-sm'>
                                <i class="far fa-eye"></i>
                            </a>

                            <a href="{{ route('jurnalDigitals.edit', $jurnalDigital->id) }}" class='btn btn-primary btn-sm'>
                                <i class="far fa-edit"></i>
                            </a>

                            <button type="button"
                                class="btn btn-danger btn-delete btn-sm"
                                data-id="{{ $jurnalDigital->id }}"
                                data-url="{{ route('jurnalDigitals.destroy', $jurnalDigital->id) }}">
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
            @include('adminlte-templates::common.paginate', ['records' => $jurnalDigitals])
        </div>
    </div>
</div>
