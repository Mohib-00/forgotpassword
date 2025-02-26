   <!-- Sidebar -->
   <div class="sidebar" data-background-color="dark">
    <div class="sidebar-logo">
      <!-- Logo Header -->
      <div class="logo-header" data-background-color="dark">
        <a href="/admin" class="logo">
          <img
            src="{{asset('logixx.png')}}"
            alt="navbar brand"
            class="navbar-brand"
            height="60"
          />
        </a>
        <div class="nav-toggle">
          <button class="btn btn-toggle toggle-sidebar">
            <i class="gg-menu-right"></i>
          </button>
          <button class="btn btn-toggle sidenav-toggler">
            <i class="gg-menu-left"></i>
          </button>
        </div>
        <button class="topbar-toggler more">
          <i class="gg-more-vertical-alt"></i>
        </button>
      </div>
      <!-- End Logo Header -->
    </div>
    <div class="sidebar-wrapper scrollbar scrollbar-inner">
      <div class="sidebar-content">
        <ul class="nav nav-secondary">
          <li class="nav-item active">
            <a
              data-bs-toggle="collapse"
              href="#dashboard"
              class="collapsed"
              aria-expanded="false"
            >
              <i class="fas fa-home"></i>
              <p>Dashboard</p>
              <span class="caret"></span>
            </a>
            <div class="collapse" id="dashboard">
              <ul class="nav nav-collapse">
                <li>
                  <a href="/admin">
                    <span class="sub-item">Home</span>
                  </a>
                </li>
              </ul>
            </div>
          </li>
          <li class="nav-section">
            <span class="sidebar-mini-icon">
              <i class="fa fa-ellipsis-h"></i>
            </span>
            <h4 class="text-section">Components</h4>
          </li>
          <li class="nav-item">
            <a href="/admin/users">
              <i class="icon-user"></i>
              <p>Users</p>
            </a>
          </li>

          <li class="nav-item">
            <a href="/admin/add-banner-details">
              <i class="icon-star"></i>
              <p>Add Banner</p>
            </a>
          </li>

          <li class="nav-item">
            <a href="/admin/add-highlight">
              <i class="icon-target"></i>
              <p>Add Highlight</p>
            </a>
          </li>

          <li class="nav-item">
            <a href="/admin/add-overview">
              <i class="icon-map"></i>
              <p>Add Overview</p>
            </a>
          </li>

          <li class="nav-item">
            <a href="/admin/add-Working_Group_Participation">
              <i class="icon-people"></i>
              <p>Group Member</p>
            </a>
          </li>

          <li class="nav-item">
            <a href="/admin/add-members">
              <i class="icon-user-follow"></i>
              <p>Add Member</p>
            </a>
          </li>

          <li class="nav-item">
            <a href="/admin/add-team">
              <i class="icon-social-dropbox"></i>
              <p>Add Team</p>
            </a>
          </li>

          <li class="nav-item">
            <a href="/admin/add-news">
              <i class="icon-feed"></i>
              <p>Add News</p>
            </a>
          </li>

          <li class="nav-item">
            <a href="/admin/add-resource">
              <i class="icon-globe"></i>
              <p>Add Resource</p>
            </a>
          </li>

          <li class="nav-item">
            <a href="/admin/add-join">
              <i class="icon-envelope-letter"></i>
              <p>Add Join</p>
            </a>
          </li>

          <li class="nav-item">
            <a href="/admin/add-career-opportunities">
              <i class="icon-social-spotify"></i>
              <p>Add Career</p>
            </a>
          </li>


          <li class="nav-item">
            <a href="/admin/messages">
              <i class="icon-speech"></i>
              <p>Messages</p>
              <span class="badge badge-success">{{$count}}</span>
            </a>
          </li>

          <li class="nav-item">
            <a data-bs-toggle="collapse" href="#sidebarLayouts">
              <i class="fas fa-th-list"></i>
              <p>Support Our Work</p>
              <span class="caret"></span>
            </a>
            <div class="collapse" id="sidebarLayouts">
              <ul class="nav nav-collapse">
                <li>
                  <a href="/admin/add-support-section1">
                    <span class="sub-item">Add Section 1</span>
                  </a>
                </li>
                <li>
                  <a href="/admin/add-support-section2">
                    <span class="sub-item">Add Section 2</span>
                  </a>
                </li>
                <li>
                  <a href="/admin/add-support-section3">
                    <span class="sub-item">Add Section 3</span>
                  </a>
                </li>
               
              </ul>
            </div>
          </li>

          <li class="nav-item">
            <a data-bs-toggle="collapse" href="#charts">
              <i class="far fa-chart-bar"></i>
              <p>Membership</p>
              <span class="caret"></span>
            </a>
            <div class="collapse" id="charts">
              <ul class="nav nav-collapse">
                <li>
                  <a href="/admin/add-membership-section2">
                    <span class="sub-item">Add Section 2</span>
                  </a>
                </li>
                <li>
                  <a href="/admin/add-membership-category">
                    <span class="sub-item">Add Category</span>
                  </a>
                </li>
              </ul>
            </div>
          </li>

          <li class="nav-item">
            <a data-bs-toggle="collapse" href="#maps">
              <i class="icon-drawer"></i>
              <p>About</p>
              <span class="caret"></span>
            </a>
            <div class="collapse" id="maps">
              <ul class="nav nav-collapse">
                <li>
                  <a href="/admin/add-about">
                    <span class="sub-item">Add About</span>
                  </a>
                </li>
                <li>
                  <a href="/admin/add-initiative">
                    <span class="sub-item">Add Initiative</span>
                  </a>
                </li>
              </ul>
            </div>
          </li>

          <li class="nav-item">
            <a data-bs-toggle="collapse" href="#forms">
              <i class="fas fa-pen-square"></i>
              <p>What We Do</p>
              <span class="caret"></span>
            </a>
            <div class="collapse" id="forms">
              <ul class="nav nav-collapse">
                <li>
                  <a href="/admin/add-workstream">
                    <span class="sub-item">Workstreams</span>
                  </a>
                </li>
                <li>
                  <a href="/admin/add-network">
                    <span class="sub-item">Leveraging Our Networks</span>
                  </a>
                </li>
                <li>
                  <a href="/admin/add-section-1">
                    <span class="sub-item">Section 1</span>
                  </a>
                </li>
                <li>
                  <a href="/admin/add-section-2">
                    <span class="sub-item">Section 2</span>
                  </a>
                </li>
              </ul>
            </div>
          </li>

          <li class="nav-item">
            <a data-bs-toggle="collapse" href="#tables">
              <i class="icon-settings"></i>
              <p>Settings</p>
              <span class="caret"></span>
            </a>
            <div class="collapse" id="tables">
              <ul class="nav nav-collapse">
                <li>
                  <a href="/admin/website-settings">
                    <span class="sub-item">Website Settings</span>
                  </a>
                </li>
                <li>
                  <a href="#" class="logout">
                    <span class="sub-item ">Logout</span>
                  </a>
                </li>
              </ul>
            </div>
          </li>
       
        </ul>
      </div>
    </div>
  </div>
  <!-- End Sidebar -->