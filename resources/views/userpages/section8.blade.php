<div style="background-repeat: no-repeat; background-image: url(https://igcc.org.au/wp-content/uploads/2023/05/quote.svg)" class="testimonials py-5 py-lg-7">
    <div class="content-section container-fluid align-center standard-padding ">
      <div class="container px-0 grey">
        @if ($teams->isNotEmpty())
        @foreach($teams->take(1) as $team)
        <div class="row">
          <div class="col-12 mx-auto d-md-flex align-items-center text-primary">
              <img class="d-block d-md-none" src="{{ asset('images/' . $team->image) }}" alt="">
              <img class="d-md-block d-none" src="{{ asset('images/' . $team->image) }}" alt="">
            
            <blockquote class="px-4 py-2 py-lg-6 px-md-5 px-lg-7">
            <span class="py-0 py-lg-4 d-block text-primary">
              <p class="lead">{{$team->heading}}</p>
              <p>{{$team->paragraph}}</p>
              <p><strong>Rebecca Mikula-Wright</strong> – Chief Executive Officer</p>
              <p><a class="btn btn-primary" href="/about/management">Meet our whole team</a></p>
            </span>
            </blockquote>
          </div>
        </div>
        @endforeach
        @endif
      </div>
    </div>
  </div>