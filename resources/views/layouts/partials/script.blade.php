 <script src="{{ asset('assets/vendors/js/vendor.bundle.base.js') }}"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <script src="{{ asset('assets/vendors/chart.js/Chart.min.js') }}"></script>
  <script src="{{ asset('assets/vendors/datatables.net/jquery.dataTables.js') }}"></script>
  <script src="{{ asset('assets/vendors/datatables.net-bs4/dataTables.bootstrap4.js') }}"></script>
  <script src="{{ asset('assets/js/dataTables.select.min.js') }}"></script>

  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="{{ asset('assets/js/off-canvas.js')}}"></script>
  <script src="{{ asset('assets/js/hoverable-collapse.js')}}"></script>
  <script src="{{ asset('assets/js/template.js')}}"></script>
  <script src="{{ asset('assets/js/settings.js')}}"></script>
  <script src="{{ asset('assets/js/todolist.js')}}"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  {{-- <script src="{{ asset('assets/js/dashboard.js')}}"></script> --}}
<script src="{{ asset('assets/js/Chart.roundedBarCharts.js')}}"></script>
<script src="https://kit.fontawesome.com/2feee0b69e.js" crossorigin="anonymous"></script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    $(document).ready(function() {
        // Logout
        $('.navbar').on('click','.swal-logout',function (e) {
            console.log("click");
            slug = e.target.dataset.id;
            Swal.fire({
                    title: 'Yakin ingin keluar?',
                    text: 'Anda akan dialihkan ke beranda.',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Ya, keluar',
                    cancelButtonText: 'Tidak',
                    dangerMode: true,
                    reverseButtons: true
                })
                .then((willLogout) => {
                    if (willLogout.isConfirmed) {
                        $(`#logout-form`).submit();
                    } else {
                        // Do Nothing
                    }
                });
        });

        $('.table').on('click', '.btn-delete', function (e) {
            e.preventDefault();
            let url = $(this).data('url');
            let id = $(this).data('id');

            Swal.fire({
                title: 'Apakah anda yakin?',
                text: "Data akan dihapus!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, Hapus!',
                reverseButtons: true,
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: url,
                        type: 'POST',
                        data: {
                            '_token': '{{ csrf_token() }}',
                            '_method': 'DELETE'
                        },
                        success: function (response) {
                            Swal.fire({
                                title: 'Berhasil!',
                                text: 'Data berhasil dihapus',
                                icon: 'success',
                                confirmButtonColor: '#3085d6'
                            }).then(() => {
                                window.location.reload();
                            });
                        },
                        error: function (error) {
                            Swal.fire({
                                title: 'Error!',
                                text: 'Gagal menghapus data',
                                icon: 'error',
                                confirmButtonColor: '#d33'
                            });
                            console.log(error);
                        }
                    });
                }
            });
        });
    });
  </script>

@stack('scripts')
