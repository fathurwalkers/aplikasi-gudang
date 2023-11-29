@extends('layouts.dashboard-layouts')

@push('css')
    {{-- <link rel="stylesheet" type="text/css" href="{{ asset('assets/datatables') }}/datatables.min.css"> --}}
    <link href="{{ asset('datatables') }}/datatables.min.css" rel="stylesheet">
@endpush

<!-- Header Content Section -->
@section('header-content')
    Data Customer
@endsection

@section('main-content')
    <div class="card mb-1">
        <div class="card-body">
            <div class="container">

                <form action="{{ route('tambah-customer') }}" method="post">
                    @csrf

                    <p class="text-dark">
                        Silahkan masukkan Data Customer baru yang ingin ditambahkan pada form dibawah ini.
                    </p>

                    <div class="row">
                        <div class="col-sm-6 col-md-6 col-lg-6">
                            <div class="form-group">
                                <label for="customer_nama">
                                    <h6>Nama Customer</h6>
                                </label>
                                <input type="text" class="form-control" id="customer_nama" placeholder="..."
                                    name="customer_nama">
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-6 col-lg-6">
                            <div class="form-group">
                                <label for="customer_email">
                                    <h6>Email</h6>
                                </label>
                                <input type="text" class="form-control" id="customer_email" placeholder="..."
                                    name="customer_email">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-6 col-md-6 col-lg-6">
                            <div class="form-group">
                                <label for="customer_alamat">
                                    <h6>Alamat</h6>
                                </label>
                                <input type="text" class="form-control" id="customer_alamat" placeholder="..."
                                    name="customer_alamat">
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-6 col-lg-6">
                            <div class="form-group">
                                <label for="customer_nohp">
                                    <h6>No. HP / Telepon</h6>
                                </label>
                                <input type="text" class="form-control" id="customer_nohp" placeholder="..."
                                    name="customer_nohp">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-12 col-md-12 col-lg-12 d-flex justify-content-end">
                            <button type="submit" class="btn btn-info btn-md">
                                Tambah Data Customer
                            </button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>

    <div class="card mb-3">
        <div class="card-body">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6 col-md-6 col-lg-6">
                        <h5 class="my-auto text-dark">Daftar Customer</h5>
                    </div>
                    {{-- <div class="col-sm-6 col-md-6 col-lg-6">
                        <button class="btn btn-primary btn-md float-right">
                            Tambah Pegawai
                        </button>
                    </div> --}}
                </div>
                <hr />
                <div class="row">
                    <div class="table-responsive">
                        <table id="example" class="display table-bordered" style="width:100%">
                            <thead class="thead-dark">
                                <tr>
                                    <th class="text-center text-dark">No.</th>
                                    <th class="text-center text-dark">Nama</th>
                                    <th class="text-center text-dark">Jabatan</th>
                                    <th class="text-center text-dark">Alamat</th>
                                    <th class="text-center text-dark">No. HP / Telepon</th>
                                    <th class="text-center text-dark">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($customer as $item)
                                    <tr>
                                        <td class="text-center text-dark">{{ $loop->iteration }}</td>
                                        <td class="text-center text-dark">{{ $item->customer_nama }}</td>
                                        <td class="text-center text-dark">{{ $item->customer_alamat }}</td>
                                        <td class="text-center text-dark">{{ $item->customer_nohp }}</td>
                                        <td class="text-center text-dark">{{ $item->customer_email }}</td>
                                        <td class="d-flex justify-content-center">
                                            <button type="button" id="buttonlihat{{ $item->id }}"
                                                class="btn btn-sm btn-warning text-dark" data-toggle="modal"
                                                data-target="#modalhapus{{ $item->id }}">
                                                <b>
                                                    Hapus
                                                </b>
                                            </button>

                                            <!-- Modal Hapus -->
                                            <div class="modal fade" id="modalhapus{{ $item->id }}" tabindex="-1"
                                                role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Hapus Pengaduan
                                                            </h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <form action="{{ route('hapus-customer', $item->id) }}"
                                                            method="POST">
                                                            @csrf
                                                            <div class="modal-body">
                                                                Apakah anda yakin ingin menghapus data Customer ini?
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-dismiss="modal">Batalkan</button>
                                                                <button type="submit"
                                                                    class="btn btn-danger">Hapus</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- END Modal Hapus -->

                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script src="{{ asset('datatables') }}/datatables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#example').DataTable();
        });
    </script>
@endpush
