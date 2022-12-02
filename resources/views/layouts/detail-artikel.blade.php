@include('layouts.app')
<section class="mb-2" style="min-height: 75vh">
    <div class="container">

        <div class="row">
            <div class="col-10">
                <h5 class="card-title">{{ $detail->judul }}</h5>
                <p class="card-text">{{ $detail->isi }}</p>
                <p class="card-text">{{ $detail->created_at }}</p>
            </div>
            <div class="col-2">
                <p class="mb-2 text-center">Rekomendasi Produk</p>
                <div class="border p-2">
                    @foreach ($produk as $item)
                        @if ($detail->kategori_id == $item->kategori_id)
                            <img src="{{ asset('/') }}storage/{{ $item->foto }}" width="150px"
                                class="rounded mb-2">
                            <h5 class="mb-2">{{ $item->namaProduk }}</h5>
                            <div class="mb-2"
                                style="overflow: hidden;
                                display: -webkit-box;
                                -webkit-box-orient: vertical;
                                -webkit-line-clamp: 4;">
                                <p >{{ $item->descProduk }}</p>
                            </div>
                            <p class="mb-1">Kategori : {{ $item->Kategori->namaKategori }}</p>
                        @else
                            <p>Tidak ada rekomendasi produk</p>
                        @endif
                    @endforeach
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
