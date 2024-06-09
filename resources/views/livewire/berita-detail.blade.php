
<div>
    <div class="container mt-2 p-4 w-75 mb-4">
        <h1 class="border-bottom border-warning p-2">Berita</h1>
            
        
        <div class="card mb-3 shadow p-3" >
            <div class="row g-0">
              <div class="col-md-4">
                <img src="/storage/{{$berita->image_berita}}" class="img-fluid rounded-start" alt="..." style="max-width: 280px; height:300px">
              </div>
              <div class="col-md-8">
                <div class="card-body">
                  <p class="card-text"><small class="text-body-secondary">Last updated 3 mins ago</small></p>
                  <h5 class="card-title">{{$berita->title}}</h5>
                  <p class="card-text">{!! $berita->body !!}</p>
                </div>
              </div>
            </div>
          </div>
    
        
    
    </div>
    
    </div>