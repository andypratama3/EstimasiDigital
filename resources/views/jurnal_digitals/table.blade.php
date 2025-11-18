<div class="card-body p-0">
    <div class="table-responsive">
        <table class="table" id="jurnal-digitals-table">
            <thead>
            <tr>
                <th>Judul</th>
                <th>Pengarang</th>
                <th>Penerbit</th>
                <th>Tahun Publikasi</th>
                <th>Volume</th>
                <th>Nomor</th>
                <th>Issn</th>
                <th>Deskripsi</th>
                <th>Bidang Ilmu</th>
                <th>Is Protected</th>
                <th>Created By</th>
                <th>Updated By</th>
                <th>Is Deleted</th>
                <th colspan="3">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($jurnalDigitals as $jurnalDigital)
                <tr>
                    <td>{{ $jurnalDigital->judul }}</td>
                    <td>{{ $jurnalDigital->pengarang }}</td>
                    <td>{{ $jurnalDigital->penerbit }}</td>
                    <td>{{ $jurnalDigital->tahun_publikasi }}</td>
                    <td>{{ $jurnalDigital->volume }}</td>
                    <td>{{ $jurnalDigital->nomor }}</td>
                    <td>{{ $jurnalDigital->issn }}</td>
                    <td>{{ $jurnalDigital->deskripsi }}</td>
                    <td>{{ $jurnalDigital->bidang_ilmu }}</td>
                    <td>{{ $jurnalDigital->is_protected }}</td>
                    <td>{{ $jurnalDigital->created_by }}</td>
                    <td>{{ $jurnalDigital->updated_by }}</td>
                    <td>{{ $jurnalDigital->is_deleted }}</td>
                    <td  style="width: 120px">
                        {!! Form::open(['route' => ['jurnalDigitals.destroy', $jurnalDigital->id], 'method' => 'delete']) !!}
                        <div class='btn-group'>
                            <a href="{{ route('jurnalDigitals.show', [$jurnalDigital->id]) }}"
                               class='btn btn-default btn-xs'>
                                <i class="far fa-eye"></i>
                            </a>
                            <a href="{{ route('jurnalDigitals.edit', [$jurnalDigital->id]) }}"
                               class='btn btn-default btn-xs'>
                                <i class="far fa-edit"></i>
                            </a>
                            {!! Form::button('<i class="far fa-trash-alt"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                        </div>
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    <div class="card-footer clearfix">
        <div class="float-right">
            @include('adminlte-templates::common.paginate', ['records' => $jurnalDigitals])
        </div>
    </div>
</div>
