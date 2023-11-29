@extends('layouts.dashboard-layouts')

@push('css')
    {{-- <link rel="stylesheet" type="text/css" href="{{ asset('assets/datatables') }}/datatables.min.css"> --}}
    <link href="{{ asset('datatables') }}/datatables.min.css" rel="stylesheet">
@endpush

<!-- Header Content Section -->
@section('header-content')
    Data Vendor
@endsection

@section('main-content')
    <div class="card mb-1">
        <div class="card-body">
            <div class="container">

                <form action="{{ route('tambah-barang') }}" method="post">
                    @csrf

                    <p class="text-dark">
                        Silahkan masukkan Data Vendor baru yang ingin ditambahkan pada form dibawah ini.
                    </p>

                    <div class="row">
                        <div class="col-sm-12 col-md-12 col-lg-12">
                            <div class="form-group">
                                <label for="barang_nama">
                                    <h6>Nama Barang</h6>
                                </label>
                                <input type="text" class="form-control" id="barang_nama" placeholder="..."
                                    name="barang_nama">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-6 col-md-6 col-lg-6">
                            <div class="form-group">
                                <label for="barang_satuan">
                                    <h6>Jumlah Satuan</h6>
                                </label>
                                <input type="number" class="form-control" id="barang_satuan" placeholder="..."
                                    name="barang_satuan">
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-6 col-lg-6">
                            <div class="form-group">
                                <label for="barang_sisa_stok_gudang">
                                    <h6>Jumlah Sisa Stok Gudang</h6>
                                </label>
                                <input type="number" class="form-control" id="barang_sisa_stok_gudang" placeholder="..."
                                    name="barang_sisa_stok_gudang">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-6 col-md-6 col-lg-6">
                            <div class="form-group">
                                <label for="jenis_barang">
                                    <h6>Jenis Barang</h6>
                                </label>
                                <select class="form-control" id="jenis_barang" name="jenis_barang">
                                    @foreach ($jenis_barang as $jb)
                                        <option value="{{ $jb->id }}">{{ $jb->jenis_barang }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-6 col-lg-6">
                            <div class="form-group">
                                <label for="kategori_barang">
                                    <h6>Kategori Barang</h6>
                                </label>
                                <select class="form-control" id="kategori_barang" name="kategori_barang">
                                    @foreach ($kategori_barang as $kb)
                                        <option value="{{ $kb->id }}">{{ $kb->kategori_barang }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-12 col-md-12 col-lg-12 d-flex justify-content-end">
                            <button type="submit" class="btn btn-info btn-md">
                                Tambah Barang
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
                    <div class="col-sm-12 col-md-12 col-lg-12">
                        <h5 class="my-auto text-dark">Daftar Barang</h5>
                    </div>
                </div>
                <hr />
                <div class="row">
                    <div class="table-responsive">
                        <table id="example" class="display table-bordered" style="width:100%">
                            <thead class="thead-dark">
                                <tr>
                                    <th class="text-center text-dark">No.</th>
                                    <th class="text-center text-dark">Nama Barang</th>
                                    <th class="text-center text-dark">Satuan (PCS)</th>
                                    <th class="text-center text-dark">Jumlah Sisa Stok Gudang</th>
                                    <th class="text-center text-dark">Jenis</th>
                                    <th class="text-center text-dark">Kategori</th>
                                    <th class="text-center text-dark">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($barang as $item)
                                    <tr>
                                        <td class="text-center text-dark">{{ $loop->iteration }}</td>
                                        <td class="text-center text-dark">{{ $item->barang_nama }}</td>
                                        <td class="text-center text-dark">{{ $item->barang_satuan }}</td>
                                        <td class="text-center text-dark">{{ $item->barang_sisa_stok_gudang }}</td>
                                        <td class="text-center text-dark">{{ $item->jenisbarang->jenis_barang }}</td>
                                        <td class="text-center text-dark">{{ $item->kategoribarang->kategori_barang }}</td>
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
                                                            <h5 class="modal-title" id="exampleModalLabel">Hapus Data Barang
                                                            </h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <form action="{{ route('hapus-barang', $item->id) }}"
                                                            method="POST">
                                                            @csrf
                                                            <div class="modal-body">
                                                                Apakah anda yakin ingin menghapus Data Barang ini?
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
