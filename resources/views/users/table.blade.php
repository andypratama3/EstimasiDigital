<div class="p-0 card-body">
    <div class="table-responsive">
        <table class="table table-striped" id="users-table">
            <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Email</th>
                <th>Email Verified</th>
                <th>Status</th>
                <th colspan="3">Action</th>
            </tr>
            </thead>

            <tbody>
            @foreach($users as $index => $user)
                <tr>

                    {{-- NOMOR URUT --}}
                    <td>{{ (($users->currentPage() - 1) * $users->perPage()) + ($loop->index + 1) }}</td>

                    {{-- DATA USER --}}
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>

                    <td>
                        @if($user->email_verified_at)
                            <span class="badge bg-success">
                                {{ $user->email_verified_at->format('d M Y') }}
                            </span>
                        @else
                            <span class="badge bg-warning text-dark">Belum Diverifikasi</span>
                        @endif
                    </td>

                    {{-- STATUS AKTIF --}}
                    <td>
                        @if($user->is_active)
                            <span class="text-white badge bg-success">Aktif</span>
                        @else
                            <span class="text-white badge bg-danger">Tidak</span>
                        @endif
                    </td>

                    {{-- ACTION BUTTONS --}}
                    <td style="width: 120px">
                        <div class='btn-group'>

                            <a href="{{ route('users.show', $user->id) }}" class="btn btn-sm">
                                <i class="far fa-eye"></i>
                            </a>

                            <a href="{{ route('users.edit', $user->id) }}" class="btn btn-primary btn-sm">
                                <i class="far fa-edit"></i>
                            </a>

                            <button type="button"
                                class="btn btn-danger btn-sm btn-delete"
                                data-id="{{ $user->id }}"
                                data-url="{{ route('users.destroy', $user->id) }}">
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
            @include('adminlte-templates::common.paginate', ['records' => $users])
        </div>
    </div>
</div>
