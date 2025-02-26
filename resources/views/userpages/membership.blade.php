<!DOCTYPE html>
<html lang="en-AU"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    

	<title>Logix 199-Membership</title>
  <link rel="icon" href="{{asset('Investor Group on Climate Change_files/logix.png')}}">

	<link rel="stylesheet" id="website-styles-igcc-css" href="Membership - Investor Group on Climate Change_files/theme-igcc.css" media="all">
<link rel="stylesheet" id="wp-block-library-css" href="Membership - Investor Group on Climate Change_files/style.min.css" media="all">
<style id="safe-svg-svg-icon-style-inline-css">
    .safe-svg-cover{text-align:center}.safe-svg-cover .safe-svg-inside{display:inline-block;max-width:100%}.safe-svg-cover svg{height:100%;max-height:100%;max-width:100%;width:100%}
</style>
<style id="classic-theme-styles-inline-css">
    .wp-block-button__link{color:#fff;background-color:#32373c;border-radius:9999px;box-shadow:none;text-decoration:none;padding:calc(.667em + 2px) calc(1.333em + 2px);font-size:1.125em}
    .wp-block-file__button{background:#32373c;color:#fff;text-decoration:none}
</style>
<link rel="stylesheet" id="search-filter-plugin-styles-css" href="Membership - Investor Group on Climate Change_files/search-filter.min.css" media="all">
<link rel="stylesheet" id="understrap-styles-css" href="Membership - Investor Group on Climate Change_files/theme.min.css" media="all">
<link rel="stylesheet" id="clean-login-gen-css" href="Membership - Investor Group on Climate Change_files/style.css" media="all">
<link rel="stylesheet" id="bootstrap-icons-css" href="Membership - Investor Group on Climate Change_files/bootstrap-icons.css" media="all">
<link rel="stylesheet" id="understrap-extra-styles-css" href="Membership - Investor Group on Climate Change_files/style(1).css" media="all">

<script src="Membership - Investor Group on Climate Change_files/jquery.min.js.download" id="jquery-core-js"></script>
<script src="Membership - Investor Group on Climate Change_files/jquery-migrate.min.js.download" id="jquery-migrate-js"></script>
<script src="Membership - Investor Group on Climate Change_files/search-filter-build.min.js.download" id="search-filter-plugin-build-js"></script>
<script src="Membership - Investor Group on Climate Change_files/select2.min.js.download" id="search-filter-plugin-select2-js"></script>
<script async src="Membership - Investor Group on Climate Change_files/js"></script>



		<style id="wp-custom-css">
			.entry-content ul li, .standard-content ul li {
	display: block;
}

.entry-content ul li:before, .standard-content ul li:before {
	margin-right: 8px
}
@media (min-width: 1608px) {
  .custom-logo-link {
    max-height: 120px; 
    max-width:120px
  }
}
@media (max-width: 1607px) {
  .custom-logo-link {
   max-height: 120px; 
   max-width:140px
  }
}
@media (max-width: 760px) {
  .custom-logo-link {
    margin-top: 20px; 
  }
}
@media (max-width: 760px) {
  .menu {
    margin-top: 100px; 
  }
}
@media (max-width: 1180px) {
  .vbn {
    margin-top: 100px; 
  }
}

.entry-content ul, .entry-content ol, .standard-content ul, .standard-content ol {
	margin-top: 1rem;
}

.featured-content .content-item a {
	margin-bottom: 0;
}

#page .page-header-overlay.bottom-30 {
	bottom: 30px;
}

#wrapper-navbar #navbarActionDropdown .search-wpb input {
	margin-top: 2px;
}

@media (max-width: 767px) {
  .search-filter-result-item h3 {
    font-size: var(--h3-font-size-mobile, 1.1875rem);
		line-height: 20px;
  }
}

.searchandfilter > ul > li {
	margin-left: 0;
}

.cleanlogin-notification {
   -moz-animation: cssAnimation 0s ease-in 20s forwards;
    -webkit-animation: cssAnimation 0s ease-in 20s forwards;
    -o-animation: cssAnimation 0s ease-in 20s forwards;
    animation: cssAnimation 0s ease-in 20s forwards;
    }		</style>
		  <style id="fit-vids-style">.fluid-width-video-wrapper{width:100%;position:relative;padding:0;}.fluid-width-video-wrapper iframe,.fluid-width-video-wrapper object,.fluid-width-video-wrapper embed {position:absolute;top:0;left:0;width:100%;height:100%;}</style></head>

  <body class="page-template-default page page-id-838 wp-custom-logo wp-embed-responsive group-blog" itemscope="" itemtype="http://schema.org/WebSite" cz-shortcut-listen="true">
        <div class="site" id="page">

            @include('userpages.navbar')


  <div class="page-header bg-primary position-relative text-white content-section container-fluid standard-page standard-padding">
      <div class="position-absolute page-header-overlay col-10 col-md-8 col-lg-auto px-0">
        <img src="./Membership - Investor Group on Climate Change_files/InnerPage-Overlay.svg" alt="">
      </div>
    
    <div class="page-header-title">
      <h1 class="">Membership</h1>
    </div>
  </div>




<div class="wrapper" id="page-wrapper">

	<div id="content" tabindex="-1">

		<main class="site-main" id="main">

			
				<article class="post-838 page type-page status-publish hentry" id="post-838">
    <div class="components mx-auto">

                                            
<div class="standard-content content-section container-fluid bottom-padding-none">
  <div class="content-section-inner default-padding pr-md-4 pr-lg-0  default">
    <div class="row mr-lg-0 align-items-stretch">
        <div class="col-12 col-lg-8 pr-lg-5">
          <p class="lead">{{$memberships->paragraph}}</p>
        </div>
        <div class="d-none d-lg-block col-auto col-lg ml-lg-1 pr-lg-0 text-right">
          <img class="left-rounded" src="{{ asset('images/' . $memberships->image) }}" alt="">
        </div>
      </div>
   </div>
</div>
                                
<div class="twocol-icons content-section container-fluid align-right top-padding-none bottom-padding-none">
  <div class="content-section-inner default-padding default">
    <div class="col-12 px-0">
      <div class="row align-items-center">

        <div class="col-12">
          <div class="row">
            @if ($membershipsection2s->isNotEmpty())
            @foreach($membershipsection2s as $membershipsection2)
            <div class="col-12 col-md-6">
                  <div class="row">
                    <div class="col-3">
                      <img class="rounded-circle" src="{{ asset('images/' . $membershipsection2->image) }}" alt="">
                    </div>
                    <div class="col-9 pl-0">
                      <h5>{{$membershipsection2->heading}}</h5>
                      <p>{{$membershipsection2->paragraph}}</p>
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
   @include('userpages.section7')                                
<div class="flexible-columns content-section container-fluid align-right">
  <div class="content-section-inner default-padding default">
    <div class="col-12 pl-0 pr-0">
      <div class="row">
        <div class="col-12">
            <h2>Membership Categories</h2>
        </div>
        @if ($categorys->isNotEmpty())
        @foreach($categorys as $category)
        <div class="col-12 col-md-6">
            <h5>{{$category->heading}}</h5>
            <p>{{$category->paragraph}}</p>
        </div>
        @endforeach
        @endif
        
    </div>
                    
    </div>
  </div>
</div>
                                
<div class="twocol-icons content-section container-fluid  bottom-padding-none align-right top-padding-large">
  <div class="content-section-inner default-padding grey">
    <div class="col-12 px-0">
      <div class="row align-items-center">

        <div class="col-12">
          <h2>Find out more</h2>

          <div class="row">
            <div class="col-12 col-md-6">
                <div class="row align-items-center">
                    <div class="col-3">
                        <img class="rounded-circle img-fluid" src="./Membership - Investor Group on Climate Change_files/Duncan-Paterson-e1685535699598.jpg" alt="Duncan Paterson">
                    </div>
                    <div class="col-9 pl-0">
                        <h5>Duncan Paterson</h5>
                        <p>Director, Investor Practice</p>
                    </div>
                </div>
            </div>
        
            <div class="col-12 col-md-6">
                <div class="row align-items-center">
                    <div class="col-3">
                        <img class="rounded-circle img-fluid" src="./Membership - Investor Group on Climate Change_files/Marwa_Curran_IGCC-8562243_Sq_web-e1685535829279.jpg" alt="Marwa Curran">
                    </div>
                    <div class="col-9 pl-0">
                        <h5>Marwa Curran</h5>
                        <p>Manager, Investor Engagement</p>
                    </div>
                </div>
            </div>
        </div>        
          
        </div>

      </div>
    </div>
  </div>
</div>
                                
<div class="twocol-icons content-section container-fluid  bottom-padding-none align-right">
  <div class="content-section-inner default-padding grey">
    <div class="col-12 px-0">
      <div class="row align-items-center">

        <div class="col-12 text-center">
          <p>
              <a class="btn btn-secondary" href="/download-prospectus" target="_blank">
                  Download the Membership Prospectus
              </a>
          </p>
          <h2>Ready to join?</h2>
      </div>
      
      <div class="row">
          <div class="col-12 col-md-6">
              <div class="row align-items-center">
                  <div class="col-3">
                      <img class="rounded-circle img-fluid" src="./Membership - Investor Group on Climate Change_files/investor.svg" alt="Step 1">
                  </div>
                  <div class="col-9 pl-0">
                      <h5>Step 1.</h5>
                      <p>Complete the Membership Application form and sign the Statement of Commitment.</p>
                  </div>
              </div>
          </div>
      
          <div class="col-12 col-md-6">
              <div class="row align-items-center">
                  <div class="col-3">
                      <img class="rounded-circle img-fluid" src="./Membership - Investor Group on Climate Change_files/members.svg" alt="Step 2">
                  </div>
                  <div class="col-9 pl-0">
                      <h5>Step 2.</h5>
                      <p>Pay the Membership fees. Fees are used to support the range of Logix 199 activities.</p>
                  </div>
              </div>
          </div>
      </div>

      </div>
    </div>
  </div>
</div>
                                
<div class="standard-content content-section container-fluid  content-end bottom-padding-large">

  <div class="content-section-inner default-padding grey">
    <div class="row align-items-stretch">
        <div class="col-12 text-center">
            <p>
                <a class="btn btn-secondary mr-3" href="/download-membership" target="_blank">Membership Policy</a>
                <a class="btn btn-secondary-light mr-3" href="/download-application_form" target="_blank">Application Form</a>
                <a class="btn btn-secondary-light" href="/download-fee_schedule" target="_blank">Fee Schedule</a>
            </p>
            <p class="smaller-width mt-4">
                For more information, call the Logix 199 team on 
                <a href="">{{$settings->phone}}</a> or email us at 
                <a href="">{{$settings->email}}</a>
            </p>
        </div>
    </div>
</div>

</div>
  
@include('userpages.section8')
  @include('userpages.section10')
            
    </div>
</article>

			



		</main><!-- #main -->

	</div><!-- #content -->

</div><!-- #page-wrapper -->




</div><
@include('userpages.footer')
@include('ajax')


<link rel="stylesheet" id="gform_basic-css" href="Membership - Investor Group on Climate Change_files/basic.min.css" media="all">
<link rel="stylesheet" id="gform_theme_components-css" href="Membership - Investor Group on Climate Change_files/theme-components.min.css" media="all">
<link rel="stylesheet" id="gform_theme_ie11-css" href="Membership - Investor Group on Climate Change_files/theme-ie11.min.css" media="all">
<link rel="stylesheet" id="gform_theme-css" href="Membership - Investor Group on Climate Change_files/theme(1).min.css" media="all">

<script src="Membership - Investor Group on Climate Change_files/atcb.min.js.download" id="add-to-calendar-button-js" async="" data-wp-strategy="async"></script>
<script src="Membership - Investor Group on Climate Change_files/jquery.fitvids.js.download" id="fitvids-js"></script>
<script src="Membership - Investor Group on Climate Change_files/3359067(2).js.download" id="leadin-script-loader-js-js"></script>
<script src="Membership - Investor Group on Climate Change_files/core.min.js.download" id="jquery-ui-core-js"></script>
<script src="Membership - Investor Group on Climate Change_files/datepicker.min.js.download" id="jquery-ui-datepicker-js"></script>
<script src="Membership - Investor Group on Climate Change_files/theme.min.js.download" id="understrap-scripts-js"></script>
<script src="Membership - Investor Group on Climate Change_files/scripts.js.download" id="sf-scripts-js"></script>
<script src="Membership - Investor Group on Climate Change_files/dom-ready.min.js.download" id="wp-dom-ready-js"></script>
<script src="Membership - Investor Group on Climate Change_files/hooks.min.js.download" id="wp-hooks-js"></script>
<script src="Membership - Investor Group on Climate Change_files/i18n.min.js.download" id="wp-i18n-js"></script>
<script src="Membership - Investor Group on Climate Change_files/a11y.min.js.download" id="wp-a11y-js"></script>
<script defer="defer" src="Membership - Investor Group on Climate Change_files/jquery.json.min.js.download" id="gform_json-js"></script>
<script defer="defer" src="Membership - Investor Group on Climate Change_files/gravityforms.min.js.download" id="gform_gravityforms-js"></script>
<script defer="defer" src="Membership - Investor Group on Climate Change_files/placeholders.jquery.min.js.download" id="gform_placeholder-js"></script>
<script defer="defer" src="Membership - Investor Group on Climate Change_files/utils.min.js.download" id="gform_gravityforms_utils-js"></script>
<script defer="defer" src="Membership - Investor Group on Climate Change_files/vendor-theme.min.js.download" id="gform_gravityforms_theme_vendors-js"></script>
<script type="text/javascript" src="Membership - Investor Group on Climate Change_files/slick.min.js.download"></script>
>