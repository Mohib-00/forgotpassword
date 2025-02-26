<div id="wrapper-navbar">
  <nav id="main-nav" class="navbar navbar-expand-md flex-md-wrap" aria-labelledby="main-nav-label">
  
             
  
      <div class="d-none d-md-flex w-100 bg-white">`
        <div class="container-xl p-md-0 justify-content-end">
          <div id="navbarActionDropdown" class="action-menu-class">
            <ul id="action-menu" class="navbar-nav navbar-expand ml-auto d-none d-md-flex"><li id="menu-item-16042" class="nmr-logged-out menu-item menu-item-type-post_type menu-item-object-page menu-item-16042 nav-item"><a href="/our_contact" class="nav-link">Contact us</a></li>

              @if ($user)
              
                  <a href="#" id="navbarNavDropdown" class="navbarNavDropdown collapse navbar-collapse w-100"><ul id="main-menu" class="navbar-nav ml-auto"><li   id="menu-item-97" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children dropdown menu-item-97 nav-item"><a href="/our-about" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle nav-link" id="menu-item-dropdown-97">
                      <span style="color: purple;">{{ $user->name }}</span>
                  </a>
                  <ul class="dropdown-menu" aria-labelledby="menu-item-dropdown-97" role="menu">
                    <li  id="menu-item-504" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-504 nav-item"><a href="/#" class="dropdown-item logoutuser">Logout</a></li>
                    </ul>
                @else
              <li id="menu-item-620" class="nav-item">
                  <a href="/login" class="nav-link">Sign In</a>
              </li>
          @endif
          

       </ul>
</div>
            </div>
      </div>
  
                <div class="container-fluid content-section p-0 px-2 px-lg-0 standard-padding mt-md-4 d-flex justify-between">
        
         <a href="/" class="navbar-brand" rel="home" aria-current="page"><img class="custom-logo-link" src="{{ asset('images/' . $settings->image_1) }}" class="img-fluid" alt="Investor Group on Climate Change" decoding="async"></a>            <!-- end custom logo -->
  
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target=".navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
          <span class="inactive position-absolute menu">Menu</span>
          <span class="active"></span>
          <span class="navbar-toggler-icon">
            <span></span>
          </span>
        </button>
  
        <!-- The WordPress Menu goes here -->
        <div class="flex-wrap justify-content-end header-menu d-flex ">
          <div id="navbarNavDropdown" class="navbarNavDropdown collapse navbar-collapse w-100"><ul id="main-menu" class="navbar-nav ml-auto"><li   id="menu-item-97" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children dropdown menu-item-97 nav-item"><a href="/our-about" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle nav-link" id="menu-item-dropdown-97">About us</a>
  <ul class="dropdown-menu" aria-labelledby="menu-item-dropdown-97" role="menu">
  <li  id="menu-item-504" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-504 nav-item"><a href="/members" class="dropdown-item">Our members</a></li>
  <li  id="menu-item-503" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-503 nav-item"><a href="/about/board" class="dropdown-item">Our board</a></li>
  <li  id="menu-item-502" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-502 nav-item"><a href="/about/management" class="dropdown-item">Our management</a></li>
  </ul>
  </li>
  <li  id="menu-item-307" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-307 nav-item"><a href="/all-news" class="nav-link">News</a></li>
  <li  id="menu-item-394" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-394 nav-item"><a  href="/our-event" class="nav-link">Events</a></li>
  <li  id="menu-item-928" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children dropdown menu-item-928 nav-item"><a href="/what_we_do" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle nav-link" id="menu-item-dropdown-928">What we do</a>
   
  </li>
  <li   id="menu-item-308" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-308 nav-item"><a href="/resources" class="nav-link">Resources</a></li>
  <li   id="menu-item-802" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children dropdown menu-item-802 nav-item"><a href="/join_us" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle nav-link" id="menu-item-dropdown-802">Join us</a>
  <ul class="dropdown-menu" aria-labelledby="menu-item-dropdown-802" role="menu">
  <li  id="menu-item-896" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-896 nav-item"><a href="/membership" class="dropdown-item">Membership</a></li>
  <li   id="menu-item-885" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-885 nav-item"><a href="/support_our_work" class="dropdown-item">Support our work</a></li>
  <li   id="menu-item-884" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-884 nav-item"><a  href="/join_our_team" class="dropdown-item">Career opportunities</a></li>
  </ul>
  </li>
  </ul></div>
          <div id="navbarMobileActionDropdown" class="navbarNavDropdown mobile-action-menu-class collapse navbar-collapse d-md-none"><ul id="action-menu" class="navbar-nav navbar-expand justify-content-end mobile-action-menu"><li class="nmr-logged-out menu-item menu-item-type-post_type menu-item-object-page menu-item-16042 nav-item"><a href="/our_contact" class="nav-link">Contact us</a></li>
     @if ($user)
  <li class="nmr-logged-out menu-item menu-item-type-post_type menu-item-object-page menu-item-620 nav-item"><a href="#" class="nav-link logoutuser">Logout</a></li>
     @else
 <li class="nmr-logged-out menu-item menu-item-type-post_type menu-item-object-page menu-item-620 nav-item"><a href="/login" class="nav-link">Sign in</a></li>
     @endif

  </ul></div>
        </div>
                  </div>
    
    </nav>
  </div>
