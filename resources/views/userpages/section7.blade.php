@if ($members->isNotEmpty())
<div class="page-supporter content-section container-fluid content-end">
    <div class="content-section-inner default-padding default">
      <div class="row">
        <div class="col-12 col-md-8">
          <h2 class="text-moss">Our members</h2>
          @foreach($members as $member)
          <p>{{$member->paragraph}}</p>
         @endforeach
        </div>
        
        <div class="col-12 px-lg-2">
          <div class="row">
            @foreach($members->shuffle()->take(4) as $member)
                <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-4">
                    <div class="card">
                        <div class="card-body bg-white text-center">
                            <a href="/" tabindex="-1">
                                <div class="logo">
                                    <img src="{{ asset('images/' . $member->image) }}">
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        
      
          <div class="row">
              <div class="col-md-8 ml-lg-4 mt-4 mt-md-0">
                  <p><a class="btn btn-secondary" href="/members">See all members</a></p>
              </div>
          </div>
      </div>
      
      </div>
  
    </div>
  </div> 
  @endif