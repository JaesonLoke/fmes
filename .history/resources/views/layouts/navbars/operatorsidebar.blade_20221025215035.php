<nav class="sidenav navbar navbar-vertical  fixed-left  navbar-expand-xs navbar-light bg-white" id="sidenav-main">
    <div class="scrollbar-inner">
      <!-- Brand -->
      <div class="sidenav-header  align-items-center" >
        <a class="navbar-brand" href="javascript:void(0)">
          <img src="../argon/img/brand/white.png" class="navbar-brand-img" alt="..." >
        </a>
      </div>
      <div class="navbar-inner">
        <!-- Collapse -->
        <div class="collapse navbar-collapse" id="sidenav-collapse-main">
          <!-- Nav items -->
          <ul class="navbar-nav ">

            <li class="nav-item">
              <a class="nav-link {{ Route::is('production') ? 'active ' : '' }}" href="{{ route('production') }}">
                  <i class="ni ni-planet text-blue"></i> Production
              </a>
            </li>
          
            <li class="nav-item">
                <a class="nav-link" href="#navbar-examples" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="navbar-examples">
                    <i class="fas fa-user" ></i>
                    <span class="nav-link-text" >{{ __('User') }}</span>
                </a>

                <div class="collapse " id="navbar-examples">
                    <ul class="nav nav-sm flex-column">
                        <li class="nav-item">
                            <a class="nav-link {{ Route::is('profile.edit') ? 'active' : '' }}" href="{{ route('profile.edit') }}">
                                {{ __('My Profile') }}
                            </a>
                        </li>
                    </ul>
                </div>
              </li>



              <li class="nav-item">
                <a href="{{ route('logout') }}" class="nav-link bg-danger text-white mb-2" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();" style="position: absolute;bottom: 0;">
                        <i class="ni ni-user-run"></i>
                        <span>{{ __('Logout') }}</span>
                </a>
              </li>
            
          </ul>
          
        </div>
      </div>
    </div>
  </nav>