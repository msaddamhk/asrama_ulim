@extends('layout.user.main')

@section('content')
    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <a href="{{ asset('storage/berita/' . $berita->foto) }}">
                        <img src="{{ asset('storage/berita/' . $berita->foto) }}" class="mb-3" alt="" height="500px"
                            style="object-fit: cover">
                    </a>
                    <h4>{{ $berita->judul }}</h4>
                    <small class="mb-3"><i class="bi bi-calendar-day me-2"></i>{{ $berita->created_at->format('d F Y') }}
                    </small>

                    <div class="d-flex">
                        <a href="javascript:void(0);" onclick="salinTautan()" class="text-decoration-none me-1"
                            title="Salin Tautan">
                            <i class="bi bi-clipboard2"></i>
                        </a>
                        <a href="https://web.whatsapp.com/send?text=Berita%20terbaru:%20{{ $berita->judul }}%20-%20{{ url('/berita/detail-berita/' . $berita->id) }}"
                            target="_blank" title="Bagikan ke WhatsApp" class="text-decoration-none me-1">
                            <i class="bi bi-whatsapp text-success"></i>
                        </a>
                        <a href="https://www.facebook.com/sharer/sharer.php?u={{ url('/berita/detail-berita/' . $berita->id) }}"
                            title="Bagikan ke Facebook" class="text-decoration-none me-3">
                            <i class="bi bi-facebook text-primary"></i>
                        </a>
                    </div>

                    <hr>

                    <p>{{ $berita->deskripsi }}</p>
                </div>
            </div>
            <script>
                function salinTautan() {
                    var tautanBerita = '{{ url('/berita/detail-berita/' . $berita->id) }}';
                    navigator.clipboard.writeText(tautanBerita).then(function() {
                        alert("Tautan telah disalin!");
                    }).catch(function(err) {
                        console.error('Tidak dapat menyalin tautan:', err);
                    });
                }
            </script>
        </div>
    </section>
@endsection
