@include('layouts.app')
<section class="mb-2" style="min-height: 75vh">
    <div class="container">
        <div class="row gap-3">
            @foreach ($artikel as $item)
                @if ($item->status == 'aktif')
                    <div class="card" style="width: 18rem;">
                        {{-- <img src="{{ asset('/') }}storage/{{ $item->foto }}" class="card-img-top mt-3"> --}}
                        <div class="card-body">
                            <h5 class="card-title">{{ $item->judul }}</h5>
                            <p class="card-text">{{ $item->isi }} ...</p>
                            <a href="/detail-artikel/{{ $item->id }}" class="btn btn-primary">Read More</a>
                        </div>
                    </div>
                @endif
            @endforeach
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
