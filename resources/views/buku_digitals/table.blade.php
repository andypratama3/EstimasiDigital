<div class="card-body p-0">
    <div class="table-responsive">
        <table class="table" id="buku-digitals-table">
            <thead>
            <tr>
                <th>Judul</th>
                <th>Pengarang</th>
                <th>Penerbit</th>
                <th>Tahun Terbit</th>
                <th>Isbn</th>
                <th>Deskripsi</th>
                <th>Kategori</th>
                <th>Is Protected</th>
                <th>Created By</th>
                <th>Updated By</th>
                <th>Is Deleted</th>
                <th colspan="3">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($bukuDigitals as $bukuDigital)
                <tr>
                    <td>{{ $bukuDigital->judul }}</td>
                    <td>{{ $bukuDigital->pengarang }}</td>
                    <td>{{ $bukuDigital->penerbit }}</td>
                    <td>{{ $bukuDigital->tahun_terbit }}</td>
                    <td>{{ $bukuDigital->isbn }}</td>
                    <td>{{ $bukuDigital->deskripsi }}</td>
                    <td>{{ $bukuDigital->kategori }}</td>
                    <td>{{ $bukuDigital->is_protected }}</td>
                    <td>{{ $bukuDigital->created_by }}</td>
                    <td>{{ $bukuDigital->updated_by }}</td>
                    <td>{{ $bukuDigital->is_deleted }}</td>
                    <td  style="width: 120px">
                        {!! Form::open(['route' => ['bukuDigitals.destroy', $bukuDigital->id], 'method' => 'delete']) !!}
                        <div class='btn-group'>
                            <a href="{{ route('bukuDigitals.show', [$bukuDigital->id]) }}"
                               class='btn btn-default btn-xs'>
                                <i class="far fa-eye"></i>
                            </a>
                            <a href="{{ route('bukuDigitals.edit', [$bukuDigital->id]) }}"
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
            @include('adminlte-templates::common.paginate', ['records' => $bukuDigitals])
        </div>
    </div>
</div>
