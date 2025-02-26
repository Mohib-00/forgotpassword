<div class="news-slider content-section container-fluid align-left content-start">
    <div class="content-section-inner px-3 px-lg-8 default-padding white">
        <div class="mx-auto row">
            <div class="col-12">
                <h2 class="h2-padding font-size-medium">News</h2>
            </div>
            <div class="col-12 px-0">
                <div class="slider w-100 slick-initialized slick-slider slick-dotted">
                    <div class="slick-list draggable">
                        <div class="slick-track card-deck">
                            
                            @if ($news->isNotEmpty())
                            @foreach($news->take(3) as $new)
                            <div class="px-3" style="width: 321px;" >
                                <div class="card card-image h-100">
                                    <div class="card-img position-relative">
                                        <a href="/" tabindex="-1">
                                            <img class="card-img-top" src="{{ asset('images/' . $new->image) }}" alt="">
                                        </a>
                                    </div>
                                    <div class="card-body bg-white">
                                        <a href="/" tabindex="-1">
                                            <h4 class="card-title">{{$new->heading}}</h4>
                                        </a>
                                        <div class="date">{{ \Carbon\Carbon::parse($new->created_at)->format('j F Y') }}</div>

                                    </div>
                                </div>
                            </div>
                            @endforeach
                            @endif

                     
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12">
                <div class="row mt-4 mt-md-0 news-footer">
                    <div class="col-6">
                        <a class="btn btn-primary" href="/all-news" target="">
                            View all news
                        </a>
                    </div>
                    <div class="col-6 text-right arrows">
                        <button class="slick-prev slick-arrow" aria-label="Previous" type="button" style="">Previous</button>
                        <button class="slick-next slick-arrow" aria-label="Next" type="button" style="">Next</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
