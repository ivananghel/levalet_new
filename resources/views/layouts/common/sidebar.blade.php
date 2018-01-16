<aside id="left-panel">

    <nav>
        <ul>
            
            <li class="{{ (isset($active_menu) && $active_menu == 'dashboard') ? 'active' : '' }}">
                <a href="/">
                    <i class="fa fa-lg fa-fw fa-dashboard" aria-hidden="true"></i>
                    <span class="menu-item-parent">{{ trans('lang.Dasboard') }}</span>
                </a>
            </li>

            <li >
                <a href="/">
                    <i class="fa fa-lg fa-fw fa-users" aria-hidden="true"></i>
                    <span class="menu-item-parent">{{ trans('lang.Order Desk') }}</span>
                </a>
            </li>

            <li >
                <a href="/">
                    <i class="fa fa-lg fa-fw fa-gears" aria-hidden="true"></i>
                    <span class="menu-item-parent">{{ trans('lang.Task Manager') }}</span>
                </a>
            </li>

            <!-- <li >
                <a href="/">
                    <i class="fa fa-lg fa-fw fa-dashboard" aria-hidden="true"></i>
                    <span class="menu-item-parent">{{ trans('lang.Programs') }}</span>
                </a>
            </li>

            <li >
                <a href="/">
                    <i class="fa fa-lg fa-fw fa-dashboard" aria-hidden="true"></i>
                    <span class="menu-item-parent">{{ trans('lang.Non-conformities') }}</span>
                </a>
            </li>
            <li >
                <a href="/">
                    <i class="fa fa-lg fa-fw fa-dashboard" aria-hidden="true"></i>
                    <span class="menu-item-parent">{{ trans('lang.Tools') }}</span>
                </a>
            </li>
            <li >
                <a href="/">
                    <i class="fa fa-lg fa-fw fa-dashboard" aria-hidden="true"></i>
                    <span class="menu-item-parent">{{ trans('lang.Library') }}</span>
                </a>
            </li> -->
            
            <!-- <li class="{{(isset($active_menu) && $active_menu == 'users') ? 'active' : '' }}">
                <a href="/users">
                    <i class="fa fa-lg fa-fw fa-users" aria-hidden="true"></i>
                    <span class="menu-item-parent"><strong>{{ trans('lang.users') }}</strong></span></a>
                </li>  -->
                
                <!-- <li class="">
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
                </li> -->
                
            </ul>
        </nav>
        
        <span class="minifyme" data-action="minifyMenu"> <i class="fa fa-arrow-circle-left hit"></i> </span>
        
    </aside>
