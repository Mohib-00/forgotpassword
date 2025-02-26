@if ($groupmembers->isNotEmpty())
<div class="twocol-icons content-section container-fluid top-padding-large bottom-padding-large">
    <div class="content-section-inner default-padding grey">
      <div class="col-12 px-0">
        <div class="row align-items-center">
  
          <div class="col-12">
            <h3>We encourage all members to join our<br>working groups.</h3>
  
            <div class="row">
              @foreach ($groupmembers as $groupmember)
              <div class="col-12 col-md-6">
                <div class="row">
                  <div class="col-3">
                    <a href="/" target="">
                      <img class="rounded-circle" src="{{ asset('images/' . $groupmember->image) }}"alt="Investor Practice">
                    </a>
                  </div>
                  <div class="col-9 pl-0">
                    <h5><a href="/">{{$groupmember->heading}}</a></h5>
                    <p>{{$groupmember->paragraph}}<br>
                    <strong>{{$groupmember->name}}</strong></p>
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