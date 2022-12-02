@include('layouts.app')

<section style="min-height: 75vh" class="mb-2">
    <div class="container py-5">
        <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#formtambah">
            Tambah Produk
        </button>
        {{-- Model Form Tambah --}}
        <div class="modal fade" id="formtambah" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
            aria-labelledby="formtambah" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="formUpdate">Produk</h5>
                        <button type="button" class="rounded" style="width: 34px; border: 1px solid"
                            data-bs-dismiss="modal" aria-label="Close">X</button>
                    </div>
                    <form action="/produk" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body">
                            <div class="col mb-2">
                                <label>Nama produk</label>
                                <input type="text" name="namaProduk" class="form-control " required>
                            </div>
                            <div class="col mb-2">
                                <label>Foto</label>
                                <input type="file" name="foto" class="form-control " required>
                            </div>
                            <div class="col mb-2">
                                <label>Harga</label>
                                <input type="number" name="harga" class="form-control" required>
                            </div>
                            <div class="col mb-2">
                                <label>Deskripsi Produk</label>
                                <textarea name="descProduk" id="" cols="25" rows="5" class="form-control"></textarea>
                            </div>
                            <div class="col mb-2">
                                <label>Nama produk</label>
                                <select name="kategori_id" id="" class="form-control">
                                    <option value="">Pilih Kategori</option>
                                    @foreach ($kategori as $item)
                                        <option value="{{ $item->id }}">{{ $item->namaKategori }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary me-2">Tambah Produk</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <table class="table table-bordered text-center">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama Produk</th>
                    <th>Foto</th>
                    <th>Harga</th>
                    <th>Kategori</th>
                    <th>Deskripsi Produk</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($produk as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->namaProduk }}</td>
                        <td><img src="{{ asset('/') }}storage/{{ $item->foto }} " width="100px"></td>
                        <td>{{ $item->harga }}</td>
                        <td>{{ $item->descProduk }}</td>
                        <td>{{ $item->Kategori->namaKategori }}</td>
                        <td>
                            <button type="button" class="btn btn-md btn-dark mb-1" style="width: 80px"
                                data-bs-toggle="modal" data-bs-target="#formUpdate{{ $item->id }}">
                                Edit
                            </button>
                            <form action="/produk/{{ $item->id }}" method="post" style="display: inline">
                                @method('delete')
                                @csrf
                                <button type="submit" class="btn btn-md btn-danger" style="width: 80px"
                                    onclick="return confirm ('Yakin akan menghapus data?')">
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>

                    {{-- Model Form Update --}}
                    <div class="modal fade" id="formUpdate{{ $item->id }}" data-bs-backdrop="static"
                        data-bs-keyboard="false" tabindex="-1" aria-labelledby="formUpdate" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="formUpdate">Edit Berita</h5>
                                    <button type="button" class="rounded" style="width: 34px; border: 1px solid"
                                        data-bs-dismiss="modal" aria-label="Close">X</button>
                                </div>
                                <form action="/produk/{{ $item->id }}" method="post"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="modal-body">
                                        <div class="modal-body">
                                            <div class="col mb-2">
                                                <label>Nama produk</label>
                                                <input type="text" name="namaProduk" class="form-control"
                                                    value="{{ $item->namaProduk }}">
                                            </div>
                                            <div class="col mb-2">
                                                <label class="mb-2">Foto</label>
                                                <br>
                                                <img src="{{ asset('/') }}storage/{{ $item->foto }} "
                                                    width="100px" class="mb-2">
                                                <input type="file" name="foto" class="form-control">
                                            </div>
                                            <div class="col mb-2">
                                                <label>Harga</label>
                                                <input type="number" name="harga" class="form-control"
                                                    value="{{ $item->harga }}">
                                            </div>
                                            <div class="col mb-2">
                                                <label>Deskripsi Produk</label>
                                                <textarea name="descProduk" id="" cols="25" rows="5" class="form-control ">{{ $item->descProduk }}</textarea>
                                            </div>
                                            <div class="col mb-2">
                                                <label>Kategori</label>
                                                <select name="kategori_id" id="" class="form-control">
                                                    <option value="{{ $item->Kategori->id }}">
                                                        {{ $item->Kategori->namaKategori }}</option>
                                                    <option value="">Pilih Kategori</option>
                                                    @foreach ($kategori as $item)
                                                        <option value="{{ $item->id }}">{{ $item->namaKategori }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary me-2">Update</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </tbody>
        </table>
    </div>

</section>

<section>
    <div>
        <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 border-top mt-auto">
            {{-- <footer class="footer py-3 mt-auto bg-light"> --}}
            <div class="container">
                <p class="col-md-4 mb-0 text-muted">© Karisma Academy</p>
            </div>
        </footer>
    </div>
</section>

</body>

</html>
