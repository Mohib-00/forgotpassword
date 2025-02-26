<!DOCTYPE html>
<html lang="en">
	<head>
    
	<meta charset="utf-8">
	
	<title>Logix 199-News</title>
	<meta content="width=device-width, initial-scale=1.0" name="viewport">
<meta content="" name="keywords">
<meta content="" name="description">
	
<link rel="icon" href="{{asset('Investor Group on Climate Change_files/logix.png')}}">

<link rel="stylesheet" id="website-styles-igcc-css" href="./News - Investor Group on Climate Change_files/theme-igcc.css" media="all">
<link rel="stylesheet" id="wp-block-library-css" href="./News - Investor Group on Climate Change_files/style.min.css" media="all">

<link rel="stylesheet" id="search-filter-plugin-styles-css" href="./News - Investor Group on Climate Change_files/search-filter.min.css" media="all">
<link rel="stylesheet" id="understrap-styles-css" href="./News - Investor Group on Climate Change_files/theme.min.css" media="all">
<link rel="stylesheet" id="clean-login-gen-css" href="./News - Investor Group on Climate Change_files/style.css" media="all">
<link rel="stylesheet" id="bootstrap-icons-css" href="./News - Investor Group on Climate Change_files/bootstrap-icons.css" media="all">
<link rel="stylesheet" id="understrap-extra-styles-css" href="./News - Investor Group on Climate Change_files/style(1).css" media="all">
<script src="./News - Investor Group on Climate Change_files/jquery.min.js.download" id="jquery-core-js"></script>
<script src="./News - Investor Group on Climate Change_files/jquery-migrate.min.js.download" id="jquery-migrate-js"></script>

<script src="./News - Investor Group on Climate Change_files/search-filter-build.min.js.download" id="search-filter-plugin-build-js"></script>
<script src="./News - Investor Group on Climate Change_files/select2.min.js.download" id="search-filter-plugin-select2-js"></script>
<script async="" src="./News - Investor Group on Climate Change_files/js"></script>

		
			
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

.cleanlogin-notification {
   -moz-animation: cssAnimation 0s ease-in 20s forwards;
    -webkit-animation: cssAnimation 0s ease-in 20s forwards;
    -o-animation: cssAnimation 0s ease-in 20s forwards;
    animation: cssAnimation 0s ease-in 20s forwards;
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
	</style>
		</head>

  <body class="page-template-default page page-id-267 wp-custom-logo wp-embed-responsive group-blog">
	<div class="site" id="page">
		@include('userpages.navbar')
	  
		<div class="page-header position-relative bg-primary standard">
	  
		  <div class="bgcolor d-none">
			<div class="align-center content-section ml-auto mr-auto">
			  <div class="row">
				<div class="order-2 col-md-10 order-md-1">
				  <div class="heading-placeholder visibility-none opacity-0"></div>
				  <span class="pt-5 h1 py-md-6 heading-placeholder visibility-none opacity-0">News</span>
				  <div class="pb-5 heading-placeholder visibility-none opacity-0">
					<div class="pt-2">
					  <p>Media releases and updates for members and our broader community.</p>
					</div>
				  </div>
				</div>
			  </div>
			</div>
		  </div>
	  
		  <div class="page-heading ml-auto mr-auto align-center content-section text-white hasSuffix">
			<div class="row align-items-center">
			  <div class="order-2 col-md-10 order-md-1">
				<h1 class="pt-5">News</h1>
				<div class="pb-5">
				  <div class="pt-2">
					<p>Media releases and updates for members and our broader community.</p>
				  </div>
				</div>
			  </div>
			</div>
		  </div>
		</div>
	  
		<div class="wrapper" id="page-wrapper">
		  <div id="content" tabindex="-1">
			<main class="site-main" id="main">
			  <article class="post-267 page type-page status-publish hentry" id="post-267">
				<div class="components mx-auto">
				  <div class="standard-content content-section container-fluid content-end">
					<div class="content-section-inner default-padding default">
					  <div class="row mr-lg-0 align-items-stretch">
						<div class="col-12">
						  <div class="search-filter-results" id="search-filter-results-269">
							<div class="search-filter-results-list">
							  <div class="search-filter-result-item">
								<div class="px-3 px-md-0">
								  <div class="row px-3 py-5 white border-bottom">

									<div class="row">
										@if ($news->isNotEmpty())
										@foreach($news->take(3) as $new)
									  <div class="col-12 d-flex px-0 px-md-3">
										<div class="mr-2 mr-md-4 img-container">
										  <img class="small-thumbnail" src="{{ asset('images/' . $new->image) }}" alt="">
										</div>
										<div>
										  <h3>
											<a href="/">{{$new->heading}}</a>
										  </h3>
										  <p><div class="date">{{ \Carbon\Carbon::parse($new->created_at)->format('j F Y') }}</div>
										  </p>
										  <p>
											{{$new->paragraph}}
										  </p>
										 
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
						</div>
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

<script src="./News - Investor Group on Climate Change_files/atcb.min.js.download" id="add-to-calendar-button-js" async="" data-wp-strategy="async"></script>
<script src="./News - Investor Group on Climate Change_files/jquery.fitvids.js.download" id="fitvids-js"></script>

<script src="./News - Investor Group on Climate Change_files/3359067(2).js.download" id="leadin-script-loader-js-js"></script>
<script src="./News - Investor Group on Climate Change_files/core.min.js.download" id="jquery-ui-core-js"></script>
<script src="./News - Investor Group on Climate Change_files/datepicker.min.js.download" id="jquery-ui-datepicker-js"></script>
<script src="./News - Investor Group on Climate Change_files/theme.min.js.download" id="understrap-scripts-js"></script>
<script src="./News - Investor Group on Climate Change_files/scripts.js.download" id="sf-scripts-js"></script>
<script type="text/javascript" src="./News - Investor Group on Climate Change_files/slick.min.js.download"></script>