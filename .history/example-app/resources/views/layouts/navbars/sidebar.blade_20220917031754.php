<nav class="sidenav navbar navbar-vertical  fixed-left  navbar-expand-xs navbar-light bg-white" id="sidenav-main">
    <div class="scrollbar-inner">
      <!-- Brand -->
      <div class="sidenav-header  align-items-center" style="height: 100px">
        <a class="navbar-brand" href="javascript:void(0)">
          <img src="../argon/img/brand/white.png" class="navbar-brand-img" alt="..." height="200px">
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
                    <i class="fas fa-user" style="color: #f4645f;"></i>
                    <span class="nav-link-text" style="color: #f4645f;">{{ __('User') }}</span>
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
                                {{ __('Users Management') }}
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            
        </ul>
          
        </div>
      </div>
    </div>
  </nav>