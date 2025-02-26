@if ($highlights->isNotEmpty())
<div class="page-header-highlights content-section container-fluid">
  <div class="content-section-inner px-lg-8 py-4 py-lg-5 grey text-primary">
    <div class="col-12 px-4 px-lg-0">
      <div class="highlights-wrapper">

        @foreach ($highlights as $highlight)
        <div class="highlight-item highlights d-flex">
          <div class="image mr-md-0">
            <a href="/">
              <img class="small-thumbnail" src="{{ asset('images/' . $highlight->image) }}" alt="Rebecca Mikula-Wright">
            </a>
          </div>
          <div class="content">
            <h4>
              <a href="/">
                <span class="first-15-words">
                    {{ implode(' ', array_slice(explode(' ', $highlight->heading), 0, 3)) }}
                </span>
                <span class="rest-of-words">
                    {{ implode(' ', array_slice(explode(' ', $highlight->heading), 3)) }}
                </span>
              </a>
            </h4>
          </div>
        </div>
        @endforeach

      </div>
    </div>
  </div>
</div>
@endif
