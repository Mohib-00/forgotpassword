<!DOCTYPE html>
<html lang="en">
<head>
    @include('userpages.css')
</head>

  <body class="page-template-default page page-id-107 page-child parent-pageid-16 wp-custom-logo wp-embed-responsive group-blog" itemscope="" itemtype="http://schema.org/WebSite" cz-shortcut-listen="true">
    <div class="site" id="page">

      @include('userpages.navbar')
    
      <div class="page-header position-relative bg-primary standard" >
    
        <div class="bgcolor d-none">
          <div class="align-center content-section ml-auto mr-auto">
            <div class="row">
              <div class="order-2 col-md-10 order-md-1">
                <div class="heading-placeholder visibility-none opacity-0"></div>
                <span class="h1 py-md-6 heading-placeholder visibility-none opacity-0">Our members</span>
              </div>
            </div>
          </div>
        </div>
    
        <div class="page-heading ml-auto mr-auto align-center content-section text-white">
          <div class="row align-items-center">
            <div class="order-2 col-md-10 order-md-1">
              <h1 class="vbn">Our members</h1>
            </div>
          </div>
        </div>
      </div>
    
      <div class="wrapper" id="page-wrapper">
        <div id="content" tabindex="-1">
          <main class="site-main" id="main">
            <article class="post-107 page type-page status-publish hentry" id="post-107">
              <div class="components mx-auto">
    
                
    
                
                <div class="standard-content content-section container-fluid align-right bottom-padding-none top-padding-large">
                  <div class="content-section-inner default-padding default">
                    <div class="row mr-lg-0 align-items-stretch">
                      <div class="col-12">
                        <h2>Full members</h2>
                        <p>Asset owners including superannuation funds, and asset managers<br></p>
                        @if ($members->isNotEmpty())
                        <div class="row">
                          @foreach($members as $member)
                          <div class="col-4 col-sm-3 col-md-2 px-3 px-sm-4 px-md-4">
                            <a href="/" target="_blank">
                              <img src="{{ asset('images/' . $member->image) }}" alt="">
                            </a>
                          </div>
                          @endforeach
                        </div>
                        @endif
                        <p></p>
                        <p>&nbsp;</p>
                      </div>
                    </div>
                  </div>
                </div>
    
                <div class="flexible-columns content-section container-fluid top-padding-none">
                  <div class="content-section-inner default-padding default">
                    <div class="col-12 pl-0 pr-0">
                      <div class="row">
                        <div class="col-12 col-md-6">
                          <p class="smaller-width" style="text-align: left">
                            By joining the IGCC, members acknowledge that companies, markets and economies face risks and opportunities associated with climate change and that these risks and opportunities will impact on the financial returns of investments. Members of the IGCC are acting to protect their individual investors’ financial future, and this commitment underpins the IGCC’s approach.
                          </p>
                        </div>
                        <div class="col-12 col-md-6">
                          <p>IGCC members are aware that as responsible owners they can play a role in encouraging a proactive response to what is one of the most significant impacts on investors, business, and society.</p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
    
                @include('userpages.section10')
    
              </div>
            </article>
          </main><!-- #main -->
        </div><!-- #content -->
      </div><!-- #page-wrapper -->
    
    </div>
    

@include('userpages.footer')

 @include('userpages.js')
 @include('ajax')


<p id="a11y-speak-intro-text" class="a11y-speak-intro-text" style="position: absolute;margin: -1px;padding: 0;height: 1px;width: 1px;overflow: hidden;clip: rect(1px, 1px, 1px, 1px);-webkit-clip-path: inset(50%);clip-path: inset(50%);border: 0;word-wrap: normal !important;" hidden="hidden">Notifications</p><div id="a11y-speak-assertive" class="a11y-speak-region" style="position: absolute;margin: -1px;padding: 0;height: 1px;width: 1px;overflow: hidden;clip: rect(1px, 1px, 1px, 1px);-webkit-clip-path: inset(50%);clip-path: inset(50%);border: 0;word-wrap: normal !important;" aria-live="assertive" aria-relevant="additions text" aria-atomic="true"></div><div id="a11y-speak-polite" class="a11y-speak-region" style="position: absolute;margin: -1px;padding: 0;height: 1px;width: 1px;overflow: hidden;clip: rect(1px, 1px, 1px, 1px);-webkit-clip-path: inset(50%);clip-path: inset(50%);border: 0;word-wrap: normal !important;" aria-live="polite" aria-relevant="additions text" aria-atomic="true"></div><iframe owner="archetype" title="archetype" style="display: none; visibility: hidden;" src="./Our members - Investor Group on Climate Change_files/saved_resource.html"></iframe></body></html>