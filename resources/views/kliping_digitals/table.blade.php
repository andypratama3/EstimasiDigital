<div class="p-0 card-body">
    <div class="table-responsive">
        <table class="table table-striped" id="kliping-digitals-table">
            <thead>
            <tr>
                <th>#</th>
                <th>Judul</th>
                <th>Sumber</th>
                <th>Tanggal Publikasi</th>
                <th>Penulis</th>
                <th>Kategori</th>
                <th>Proteksi</th>
                <th>Dibuat Oleh</th>
                <th>Diubah Oleh</th>
                <th>Is Deleted</th>
                <th colspan="3">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($klipingDigitals as $index => $klipingDigital)
                <tr>
                    <td>{{ (($klipingDigitals->currentPage() - 1) * $klipingDigitals->perPage()) + ($loop->index + 1) }}</td>
                    <td>{!! Str::limit($klipingDigital->judul, 20, ' ...') !!}</td>
                    <td>{!! Str::limit($klipingDigital->sumber, 20, ' ...') !!}</td>
                    <td>{{ \Carbon\Carbon::parse($klipingDigital->tanggal_publikasi)->format('d F Y') }}</td>
                    <td>{{ $klipingDigital->penulis }}</td>
                    <td>{{ $klipingDigital->kategori }}</td>
                    <td>
                        <span class="badge {{ $klipingDigital->is_protected == 1 ? 'bg-success' : 'bg-danger' }}">{{ $klipingDigital->is_protected == 1 ? 'Ya' : 'Tidak' }}</span>
                    </td>
                    <td>{{ $klipingDigital->createdBy->name ?? '' }}</td>
                    <td>{{ $klipingDigital->updatedBy->name ?? '' }}</td>
                    <td>
                        @if($klipingDigital->is_deleted == 1)
                            <span class="text-white badge bg-danger">Dihapus</span>
                        @else
                            <span class="text-white badge bg-success">Tidak Di Hapus</span>
                        @endif
                    </td>
                    <td  style="width: 120px">
                        <div class='btn-group'>
                            <a href="{{ route('klipingDigitals.show', [$klipingDigital->id]) }}"
                               class='btn btn-sm'>
                                <i class="far fa-eye"></i>
                            </a>
                            <a href="{{ route('klipingDigitals.edit', [$klipingDigital->id]) }}"
                               class='btn btn-primary btn-sm'>
                                <i class="far fa-edit"></i>
                            </a>
                            <button type="button" class="btn btn-danger btn-delete btn-sm" data-id="{{ $klipingDigital->id }}" data-url="{{ route('klipingDigitals.destroy', $klipingDigital->id) }}"><i class="far fa-trash-alt"></i></button>
                        </div>
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    <div class="clearfix card-footer">
        <div class="float-right">
            @include('adminlte-templates::common.paginate', ['records' => $klipingDigitals])
        </div>
    </div>
</div>
