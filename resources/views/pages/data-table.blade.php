<x-layout bodyClass="g-sidenav-show bg-gray-200">
    <x-navbars.sidebar activePage="datatable"></x-navbars.sidebar>
    <div class="main-content position-relative bg-gray-100 max-height-vh-100 h-100">
        <!-- Navbar -->
        <x-navbars.navs.auth titlePage='Data Table'></x-navbars.navs.auth>
        <!-- End Navbar -->
        <div class="container-fluid px-2 px-md-4">
            <div class="page-header min-height-300 border-radius-xl mt-4"
                style="background-image: url('https://images.unsplash.com/photo-1531512073830-ba890ca4eba2?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1920&q=80');">
                <span class="mask bg-gradient-primary opacity-6"></span>
            </div>
            <div class="card card-body mx-3 mx-md-4 mt-n6">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header pb-0 p-3">
                                <h6 class="mb-0">Daftar User</h6>
                            </div>
                            <div class="card-body p-3">
                                <a href="#" class="btn btn-sm btn-success mb-2" data-bs-toggle="modal" data-bs-target="#tambahDataModal">Tambah Data</a>                    
                                <a href="#" class="btn btn-sm btn-info mb-2" data-bs-toggle="modal" data-bs-target="#importExcel">Import Data</a>
                                <div class="table-responsive">
                                    <table id="tbl_list" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama</th>
                                                <th>NIS</th>
                                                <th>Alamat</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <x-footers.auth></x-footers.auth>
    </div>
    <x-plugins></x-plugins>

    @include('modal.impor-modal')
    @include('modal.create-modal')
    @include('modal.edit-modal')
</x-layout>

@push('scripts')
<script>
    var baseUrl = "{{ url()->current() }}";
</script>
<script src="{{ asset('js/create-swal.js') }}"></script>
<script src="{{ asset('js/delete-confirmation.js') }}"></script>
<script src="{{ asset('js/siswa.js') }}"></script>
<script src="{{ asset('js/edit-swal.js') }}"></script>
@endpush