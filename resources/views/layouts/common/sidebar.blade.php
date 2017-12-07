<aside id="left-panel">
    @if(Auth::user())
    <!-- User info -->
    <div class="login-info">
        <span> <!-- User image size is adjusted inside CSS, it should stay as is -->
            
            <a href="javascript:;" id="show-shortcut" data-action="toggleShortcut" >
                <img src="img/avatars/sunny.png" alt="me" class="online" />
                <span>
                    {{ Auth::user()->first_name }}
                </span>
                <i class="fa fa-angle-down"></i>
            </a>
            
        </span>
    </div>
    @endif
    <nav>
        <ul>
            
            <li class="{{ (isset($active_menu) && $active_menu == 'dashboard') ? 'active' : '' }}">
                <a href="/">
                    <i class="fa fa-lg fa-fw fa-dashboard" aria-hidden="true"></i>
                    <span class="menu-item-parent">{{ trans('lang.Dasboard') }}</span>
                </a>
            </li>
            
            <li class="{{(isset($active_menu) && $active_menu == 'users') ? 'active' : '' }}">
                <a href="/users">
                    <i class="fa fa-lg fa-fw fa-users" aria-hidden="true"></i>
                    <span class="menu-item-parent"><strong>{{ trans('lang.users') }}</strong></span></a>
                </li> 
                
                <li class="">
                    <a href="#">
                        <i class="fa fa-lg fa-fw fa-gears"></i> <span class="menu-item-parent">{{ trans('lang.parameters') }}</span>
                    </a>
                    <ul>
                        <li class="{{ (isset($active_menu) && $active_menu == 'colorgroup') ? 'active' : '' }}">
                            <a href="{{route('colorgroup.index')}}">
                                <span class="menu-item-parent"><strong>{{ trans('lang.groupe_couleur') }}</strong></span>
                            </a>
                        </li>
                        <!-- <li class="{{ (isset($active_menu) && $active_menu == 'contract_type') ? 'active' : '' }}">
                            <a href="/contract_type">
                                <span class="menu-item-parent"><strong>{{ trans('lang.contract_type') }}</strong></span>
                            </a>
                        </li> -->
                      
                    </ul>
                </li>
                
            </ul>
        </nav>
        
        <span class="minifyme" data-action="minifyMenu"> <i class="fa fa-arrow-circle-left hit"></i> </span>
        
    </aside>