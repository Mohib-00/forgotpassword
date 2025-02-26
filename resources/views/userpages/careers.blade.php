<!DOCTYPE html>
<html lang="en-AU"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    

	
	<title>Logix 199-Career opportunities</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
<meta content="" name="keywords">
<meta content="" name="description">
<link rel="icon" href="{{asset('Investor Group on Climate Change_files/logix.png')}}">

<link rel="stylesheet" id="website-styles-igcc-css" href="./Career opportunities - Investor Group on Climate Change_files/theme-igcc.css" media="all">
<link rel="stylesheet" id="wp-block-library-css" href="./Career opportunities - Investor Group on Climate Change_files/style.min.css" media="all">
<style id="safe-svg-svg-icon-style-inline-css">
.safe-svg-cover{text-align:center}.safe-svg-cover .safe-svg-inside{display:inline-block;max-width:100%}.safe-svg-cover svg{height:100%;max-height:100%;max-width:100%;width:100%}

</style>
<style id="classic-theme-styles-inline-css">
.wp-block-button__link{color:#fff;background-color:#32373c;border-radius:9999px;box-shadow:none;text-decoration:none;padding:calc(.667em + 2px) calc(1.333em + 2px);font-size:1.125em}.wp-block-file__button{background:#32373c;color:#fff;text-decoration:none}
</style>
<link rel="stylesheet" id="search-filter-plugin-styles-css" href="./Career opportunities - Investor Group on Climate Change_files/search-filter.min.css" media="all">
<link rel="stylesheet" id="understrap-styles-css" href="./Career opportunities - Investor Group on Climate Change_files/theme.min.css" media="all">
<link rel="stylesheet" id="clean-login-gen-css" href="./Career opportunities - Investor Group on Climate Change_files/style.css" media="all">
<link rel="stylesheet" id="bootstrap-icons-css" href="./Career opportunities - Investor Group on Climate Change_files/bootstrap-icons.css" media="all">
<link rel="stylesheet" id="understrap-extra-styles-css" href="./Career opportunities - Investor Group on Climate Change_files/style(1).css" media="all">
<script src="./Career opportunities - Investor Group on Climate Change_files/jquery.min.js.download" id="jquery-core-js"></script>
<script src="./Career opportunities - Investor Group on Climate Change_files/jquery-migrate.min.js.download" id="jquery-migrate-js"></script>

<script src="./Career opportunities - Investor Group on Climate Change_files/search-filter-build.min.js.download" id="search-filter-plugin-build-js"></script>
<script src="./Career opportunities - Investor Group on Climate Change_files/select2.min.js.download" id="search-filter-plugin-select2-js"></script>

		<style id="wp-custom-css">
			.entry-content ul li, .standard-content ul li {
	display: block;
}

.entry-content ul li:before, .standard-content ul li:before {
	margin-right: 8px
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

.cleanlogin-notification {
   -moz-animation: cssAnimation 0s ease-in 20s forwards;
    -webkit-animation: cssAnimation 0s ease-in 20s forwards;
    -o-animation: cssAnimation 0s ease-in 20s forwards;
    animation: cssAnimation 0s ease-in 20s forwards;
    }		</style>
		  <style id="fit-vids-style">.fluid-width-video-wrapper{width:100%;position:relative;padding:0;}.fluid-width-video-wrapper iframe,.fluid-width-video-wrapper object,.fluid-width-video-wrapper embed {position:absolute;top:0;left:0;width:100%;height:100%;}</style></head>

  <body class="page-template-default page page-id-880 wp-custom-logo wp-embed-responsive group-blog" >
        <div class="site" id="page">

     @include('userpages.navbar')

  <div class="page-header bg-primary position-relative text-white content-section container-fluid standard-page standard-padding">
              <div class="position-absolute page-header-overlay col-10 col-md-8 col-lg-auto px-0">
        <img src="./Career opportunities - Investor Group on Climate Change_files/InnerPage-Overlay.svg" alt="">
      </div>
    
    <div class="page-header-title">
      <h1 class="">Careers at Logix 199</h1>
        <div class="pt-2"><p>
          <span dir="ltr" role="presentation">Join our mission-driven organisation and make a meaningful impact towards a net zero economy.</span></p>
        </div>
      </div>
  </div>




<div class="wrapper" id="page-wrapper">

	<div id="content" tabindex="-1">

		<main class="site-main" id="main">

			
	<article class="post-880 page type-page status-publish hentry" id="post-880">
    <div class="components mx-auto">
      <div class="featured-stat content-section container-fluid content-end">
        <div class="content-section-inner default-padding pr-md-4 pr-lg-0 default">
          <div class="row mr-lg-0 align-items-stretch">
            @if ($careers->isNotEmpty())
            @foreach($careers->take(1) as $career)
            <div class="col-12 col-lg-8 pr-lg-5">
              <div class="limit-width">
                <h2 style="text-align: left">{{$career->heading}}</h2>
                <p style="text-align: left">{!! nl2br(str_replace('. ', '.<br>', $career->paragraph)) !!}</p>
              </div>
            </div>
            <div class="d-none d-lg-block col-auto col-lg ml-lg-1 pr-lg-0 text-right">
                <img class="left-rounded" src="{{ asset('images/' . $career->image) }}" alt="">
            </div>
            @endforeach
            @endif
          </div>
        </div>
      </div>
    </div>
  </article>

		</main>

	</div>

</div>




</div>
@include('userpages.footer')



<script src="./Career opportunities - Investor Group on Climate Change_files/atcb.min.js.download" id="add-to-calendar-button-js" async="" data-wp-strategy="async"></script>
<script src="./Career opportunities - Investor Group on Climate Change_files/jquery.fitvids.js.download" id="fitvids-js"></script>

<script src="./Career opportunities - Investor Group on Climate Change_files/3359067(2).js.download" id="leadin-script-loader-js-js"></script>
<script src="./Career opportunities - Investor Group on Climate Change_files/core.min.js.download" id="jquery-ui-core-js"></script>
<script src="./Career opportunities - Investor Group on Climate Change_files/datepicker.min.js.download" id="jquery-ui-datepicker-js"></script>
<script src="./Career opportunities - Investor Group on Climate Change_files/theme.min.js.download" id="understrap-scripts-js"></script>
<script src="./Career opportunities - Investor Group on Climate Change_files/scripts.js.download" id="sf-scripts-js"></script>
<script type="text/javascript" src="./Career opportunities - Investor Group on Climate Change_files/slick.min.js.download"></script>
