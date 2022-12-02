@include('layouts.app')

<section class="mb-2" style="min-height: 75vh">
    <div class="container">
        <div class="card">
            <h3 class="mt-3 ms-3">Biodata Diri</h3>
            <div class="row">
                <div class="col">
                    <div class="card-body">
                        <form action="" method="post">
                            @csrf
                            <div class="mb-3">
                                <label>Nama</label>
                                <input type="text" class="form-control" name="nama" placeholder="Masukkan nama">
                            </div>
                            <div class="mb-3">
                                <label>Tahun Lahir</label>
                                <input type="number" class="form-control" name="tahun"
                                    placeholder="Masukkan Tahun Lahir">
                            </div>
                            <div class="mb-3">
                                <label>Keluhan</label>
                                <select name="keluhan" id="" class="form-control">
                                    <option value="">Pilih Keluhan</option>
                                    <option value="Keseleo">Keseleo</option>
                                    <option value="Kurang Nafsu Makang">Kurang Nafsu Makang</option>
                                    <option value="Pegal-pegal">Pegal-pegal</option>
                                    <option value="Darah tinggi">Darah tinggi</option>
                                    <option value="Kram perut">Kram perut</option>
                                    <option value="Gula darah">Gula darah</option>
                                    <option value="Masuk angin">Masuk angin</option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                        <div class="mt-3 w-50">
                            @isset($data)
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th colspan="2">Hasil</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th scope="col">Nama</th>
                                            <td>{{ $data['nama'] }}</td>
                                        </tr>
                                        <tr>
                                            <th scope="col">Umur</th>
                                            <td>{{ $data['umur'] }}</td>
                                        </tr>
                                        <tr>
                                            <th scope="col">Keluhan</th>
                                            <td>{{ $data['keluhan'] }}</td>
                                        </tr>
                                        <tr>
                                            <th scope="col">Nama Jamu</th>
                                            <td>{{ $data['namaJamu'] }}</td>
                                        </tr>
                                        <tr>
                                            <th scope="col">Saran</th>
                                            <td>{{ $data['saran'] }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            @endisset
                        </div>
                    </div>
                </div>
            </div>
        </div>
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
