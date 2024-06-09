
<div>
<div class="container mt-2 p-4 w-75 mb-4">
    <h1 class="border-bottom border-warning p-2">Berita</h1>
    @foreach ($berita as $item)
        
    
    <div class="card mb-3 shadow p-3" >
        <div class="row g-0">
          <div class="col-md-4">
            <img src="/storage/{{$item->image_berita}}" class="img-fluid rounded-start" alt="..." style="max-width: 280px; height:300px">
          </div>
          <div class="col-md-8">
            <div class="card-body">
              <p class="card-text"><small class="text-body-secondary">Last updated 3 mins ago</small></p>
              <h5 class="card-title">{{$item->title}}</h5>
              <p class="card-text">{{$item->excerpt}}</p>
              <a href="/berita/detail/{{$item->slug}}" class="btn btn-primary">Check</a>
            </div>
          </div>
        </div>
      </div>
      @endforeach
      <nav aria-label="Page navigation example align-items-center">
        <ul class="pagination">
          <li class="page-item"><a class="page-link" href="#">Previous</a></li>
          <li class="page-item"><a class="page-link" href="#">1</a></li>
          <li class="page-item"><a class="page-link" href="#">2</a></li>
          <li class="page-item"><a class="page-link" href="#">3</a></li>
          <li class="page-item"><a class="page-link" href="#">Next</a></li>
        </ul>
      </nav>

</div>

</div>