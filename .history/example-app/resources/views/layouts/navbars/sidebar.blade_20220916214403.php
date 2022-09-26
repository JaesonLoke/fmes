<nav class="sidenav navbar navbar-vertical  fixed-left  navbar-expand-xs navbar-light bg-white" id="sidenav-main">
    <div class="scrollbar-inner">
      <!-- Brand -->
      <div class="sidenav-header  align-items-center">
        <a class="navbar-brand" href="javascript:void(0)">
          <img src="../assets/img/brand/blue.png" class="navbar-brand-img" alt="...">
        </a>
      </div>
      <div class="navbar-inner">
        <!-- Collapse -->
        <div class="collapse navbar-collapse" id="sidenav-collapse-main">
          <!-- Nav items -->
          <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('home') }}">
                    <i class="ni ni-tv-2 text-primary"></i> {{ __('Dashboard') }}
                </a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="{{ route('icons') }}">
                  <i class="ni ni-planet text-blue"></i> Production
              </a>
          </li>
          
            <li class="nav-item">
                <a class="nav-link" href="#navbar-examples" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="navbar-examples">
                    <i class="fab fa-portait" style="color: #f4645f;"></i>
                    <span class="nav-link-text" style="color: #f4645f;">{{ __('User Management') }}</span>
                </a>

                <div class="collapse show" id="navbar-examples">
                    <ul class="nav nav-sm flex-column">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('profile.edit') }}">
                                {{ __('My Profile') }}
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('user.index') }}">
                                {{ __('Users') }}
                            </a>
                        </li>
                    </ul>
                </div>
            </li>

            
            <li class="nav-item">
                <a class="nav-link" href="{{ route('table') }}">
                  <i class="ni ni-bullet-list-67 text-default"></i>
                  <span class="nav-link-text">Tables</span>
                </a>
              </li>
            
        </ul>
          
        </div>
      </div>
    </div>
  </nav>