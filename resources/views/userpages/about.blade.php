<!DOCTYPE html>
 <html lang="en">
  <head>
    @include('userpages.css')
  </head>

  <body class="page-template-default page page-id-16 page-parent wp-custom-logo wp-embed-responsive group-blog" itemscope="" itemtype="http://schema.org/WebSite" cz-shortcut-listen="true">
        <div class="site" id="page">

        

 @include('userpages.navbar')
     

    <div class="page-header position-relative bg-primary standard">
            
    
    <div class="bgcolor d-none">
      <div class="align-center content-section ml-auto mr-auto">
        <div class="row">
          <div class="order-2 col-md-10 order-md-1">
          <div class="heading-placeholder visibility-none opacity-0"></div>
            <span class=" h1 py-md-6 heading-placeholder visibility-none opacity-0 vbn">About us</span>
          </div>
        </div>
      </div>
    </div>

    <div class="page-heading ml-auto mr-auto align-center content-section text-white ">
      <div class="row align-items-center">
        <div class="order-2 col-md-10 order-md-1">
          <h1 class="vbn">About us</h1>
        </div>
      </div>
    </div>
  </div>

<div class="wrapper" id="page-wrapper">

	<div id="content" tabindex="-1">

		<main class="site-main" id="main">

			
				<article class="post-16 page type-page status-publish hentry" id="post-16">
    <div class="components mx-auto">

                                            
<div class="twocol-icons content-section container-fluid ">
  <div class="content-section-inner default-padding default">
    <div class="col-12 px-0">
      <div class="row align-items-center">

        <div class="col-12">
          <p class="lead mb-5">We are the leading network for Australian and New Zealand investors to understand and respond to the risks and opportunities of climate change.</p>
              <div class="row">

                @if ($abouts->isNotEmpty())
                @foreach($abouts as $about)
                <div class="col-12 col-md-6">
                  <div class="row">
                     <div class="col-3">
                        <img class="rounded-circle" src="{{ asset('images/' . $about->image) }}" alt="">
                      </div>
                    <div class="col-9 pl-0">
                      <h5>{{$about->heading}}</h5>
                      <p>{{$about->paragraph}}</p>
                    </div>
                  </div>
                </div>
                @endforeach
                @endif

              </div>
            </div>

      </div>
    </div>
  </div>
</div>
                                
<div  class="standard-content standard-cta py-5 py-lg-9">
  <div class="content-section container-fluid align-center">
    <div class="col-lg-10 px-4 px-md-7 pt-5 pb-4 my-lg-3 mx-auto  white">
      <h3 class="text-moss">Our vision</h3>
<h4 class="lead text-lightmoss">A climate-resilient economy that is on track, by 2030, for net zero emissions in 2050.</h4>
<h3 class="text-moss">Our mission</h3>
<h4 class="lead text-lightmoss">We will deliver real and accelerated progress on climate change by connecting, collaborating, and advocating on behalf of investors to responsibly manage climate risks and opportunities, and drive sustainable returns for investors and the beneficiaries they represent.</h4>
    </div>
  </div>
</div>
                                
<div class="twocol-icons content-section container-fluid align-left top-padding-large bottom-padding-none">
  <div class="content-section-inner default-padding default">
    <div class="col-12 px-0">
      <div class="row align-items-center">

        <div class="col-12">
          <h2 class="mb-2">Our International Initiatives</h2>
            <p>We are the co-founder of a set of international initiatives to progress various elements of our mission.</p>
               <div class="row">
                @if ($initiatives->isNotEmpty())
                @foreach($initiatives as $initiative)
                  <div class="col-12 col-md-6">
                    <div class="row">
                      <div class="col-3">
                        <a href="/" target="">
                          <img class="rounded-circle" src="{{ asset('images/' . $initiative->image) }}" alt="">
                      </a>
                      </div>

                    <div class="col-9 pl-0">
                      <h5><a href="/">{{$initiative->heading}}</a></h5>
                       <p>{{$initiative->paragraph}}</p>
                    </div>
                  </div>
                </div>
                @endforeach
                @endif
             </div>
        </div>

      </div>
    </div>
  </div>
</div>
                                
 
                                
<div class="container-fluid content-section featured-content align-left content-end bottom-margin">
    <div class="content-section-inner px-3 px-lg-8 default-padding default">
        <div class="col-12">
                            <h4>In this section</h4>
                    </div>

                    <div class="mx-auto col-12">
                <div class="row">
                                            <div class="p-3 content-item mb-lg-0 col-12 col-md-4">
                            <div class="flex-wrap text-left d-flex align-items-center">
                                                                                                    <a class="d-block w-100 btn btn-link text-left mx-4 larger" href="/members" target="">Our Members</a>
                                                            </div>
                        </div>
                                            <div class="p-3 content-item mb-lg-0 col-12 col-md-4">
                            <div class="flex-wrap text-left d-flex align-items-center">
                                                                                                    <a class="d-block w-100 btn btn-link text-left mx-4 larger" href="/about/board" target="">Our Board</a>
                                                            </div>
                        </div>
                                            <div class="p-3 content-item mb-lg-0 col-12 col-md-4">
                            <div class="flex-wrap text-left d-flex align-items-center">
                                                                                                    <a class="d-block w-100 btn btn-link text-left mx-4 larger" href="/about/management" target="">Our Management</a>
                                                            </div>
                        </div>
                                    </div>
            </div>
        
    </div>
</div>
                                

@include('userpages.section10')
           

            
    </div>
</article>
		</main>

	</div>

</div>
</div>



@include('userpages.footer')
@include('userpages.js')
@include('ajax')