<div>
<div class="card p-4 d-flex text-center justify-content-center align-items-center">
    <h1>{{ $berita->title }}</h1>
    <img class="img-fluid text-center"  src="/storage/{{$berita->image_berita}}" alt="" srcset="" style="max-width: 500px">
    {!! $berita->body !!}
    
</div>
<div>
    <a href="/admin/berita" class="btn btn-warning mt-2">Back</a>
</div>
</div>