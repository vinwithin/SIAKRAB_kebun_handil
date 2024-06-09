<div>
    <div class="card p-4 d-flex text-center justify-content-center align-items-center">
        <h1>{{ $kegiatan->title }}</h1>
        <img class="img-fluid text-center"  src="/storage/kegiatan/{{$kegiatan->image_kegiatan}}" alt="" srcset="" style="max-width: 500px">
        {!! $kegiatan->body !!}
        
    </div>
    <div>
        <a href="/admin/kegiatan" class="btn btn-warning mt-2">Back</a>
    </div>
 </div>