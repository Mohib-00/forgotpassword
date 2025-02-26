@if ($workstreams->isNotEmpty())
<div class="three-col content-section container-fluid  bottom-padding-none">
    <div class="content-section-inner default-padding white">
      <div class="row align-items-center">
        <div class="col-12 col-lg-8 pr-lg-5">
          <div>
              <h2>What we do</h2>
              <h4>Workstreams</h4>
          </div>
            <div class="row">
              @foreach ($workstreams as $workstream)
                <div class="mb-3 item col-12 col-sm-6 col-lg-4">
                  <div class="item-body">
                    <h5><a href="/">{{$workstream->heading}}</a></h5>
                    <p>{{$workstream->paragraph}}<br>
                   </div>
                </div>
              @endforeach
                          
            </div>
             </div>
              @foreach ($workstreams as $workstream)
              @if ($loop->first)
              <div class="d-none d-lg-block col-auto col-lg ml-lg-4">
              <img class="left-rounded" src="{{ asset('images/' . $workstream->image) }}"alt="">
              </div>
              @endif
              @endforeach

      
      </div>
    </div>
  </div>
  @endif

  @if ($networks->isNotEmpty())
  <div class="twocol-icons content-section container-fluid top-padding-none">
    <div class="content-section-inner default-padding white">
      <div class="col-12 px-0">
        <div class="row align-items-center">
          <div class="col-12">
            <h4 class="mb-3">Leveraging Our Networks</h4>
  
            <div class="row">
              @foreach ($networks as $network)
              <div class="col-12 col-md-6">
                <div class="row">
                  <div class="col-3">
                    <img class="rounded-circle" src="{{ asset('images/' . $network->image) }}" alt="Asia Investor Group on Climate Change">
                  </div>
                  <div class="col-9 pl-0">
                    <h5>{{$workstream->heading}}</h5>
                    <p>{{$workstream->paragraph}}</p>
                   </div>
                </div>
              </div>
              @endforeach
  
            </div>
  
          </div>
        </div>
      </div>
    </div>
  </div>
  @endif
  