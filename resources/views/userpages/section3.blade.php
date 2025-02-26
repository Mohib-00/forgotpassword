@if ($overviews->isNotEmpty())
<div class="featured-stat content-section container-fluid ">
    <div class="content-section-inner default-padding pr-md-4 pr-lg-0 white">
      @foreach ($overviews as $overview)
      <div class="row mr-lg-0 align-items-stretch">
        <div class="col-12 col-lg-8 pr-lg-5">
          <div class="limit-width">
            <h2>{{$overview->heading}}</h2>
           <h4 class="lead"><strong>{{$overview->paragraph}}</strong></h4>
          </div>
          
        </div>
        <div class="d-none d-lg-block col-auto col-lg ml-lg-1 pr-lg-0 text-right">
            <img class="left-rounded" src="{{ asset('images/' . $overview->image) }}" alt="">
        </div>
      </div>
      @endforeach
      <div class="mt-md-4 pt-lg-2 row">
        @foreach($overviews as $overview)
        <div class="col-md-4 mb-3">
            <h2 class="large-statistic pl-0">{{ $overview->number }}</h2>
            <div class="description pl-0">{{ $overview->n_heading }}</div>
        </div>
    @endforeach
    
    </div>
    </div>
   
  
  </div>
  @endif