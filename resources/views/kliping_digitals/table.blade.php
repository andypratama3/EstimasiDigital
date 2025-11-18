<div class="card-body p-0">
    <div class="table-responsive">
        <table class="table table-striped" id="kliping-digitals-table">
            <thead>
            <tr>
                <th>Judul</th>
                <th>Sumber</th>
                <th>Tanggal Publikasi</th>
                <th>Penulis</th>
                <th>Isi</th>
                <th>Kategori</th>
                <th>Url Sumber</th>
                <th>Is Protected</th>
                <th>Created By</th>
                <th>Updated By</th>
                <th>Is Deleted</th>
                <th colspan="3">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($klipingDigitals as $klipingDigital)
                <tr>
                    <td>{{ $klipingDigital->judul }}</td>
                    <td>{{ $klipingDigital->sumber }}</td>
                    <td>{{ $klipingDigital->tanggal_publikasi }}</td>
                    <td>{{ $klipingDigital->penulis }}</td>
                    <td>{{ $klipingDigital->isi }}</td>
                    <td>{{ $klipingDigital->kategori }}</td>
                    <td>{{ $klipingDigital->url_sumber }}</td>
                    <td>{{ $klipingDigital->is_protected }}</td>
                    <td>{{ $klipingDigital->created_by }}</td>
                    <td>{{ $klipingDigital->updated_by }}</td>
                    <td>{{ $klipingDigital->is_deleted }}</td>
                    <td  style="width: 120px">
                        {!! Form::open(['route' => ['klipingDigitals.destroy', $klipingDigital->id], 'method' => 'delete']) !!}
                        <div class='btn-group'>
                            <a href="{{ route('klipingDigitals.show', [$klipingDigital->id]) }}"
                               class='btn btn-default btn-xs'>
                                <i class="far fa-eye"></i>
                            </a>
                            <a href="{{ route('klipingDigitals.edit', [$klipingDigital->id]) }}"
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
            @include('adminlte-templates::common.paginate', ['records' => $klipingDigitals])
        </div>
    </div>
</div>
