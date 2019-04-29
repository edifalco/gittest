@inject('request', 'Illuminate\Http\Request')
<!-- Left side column. contains the sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <ul class="sidebar-menu">

             

            <li class="{{ $request->segment(1) == 'home' ? 'active' : '' }}">
                <a href="{{ url('/') }}">
                    <i class="fa fa-wrench"></i>
                    <span class="title">@lang('global.app_dashboard')</span>
                </a>
            </li>

            @can('user_management_access')
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-users"></i>
                    <span>@lang('global.user-management.title')</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    @can('permission_access')
                    <li>
                        <a href="{{ route('admin.permissions.index') }}">
                            <i class="fa fa-briefcase"></i>
                            <span>@lang('global.permissions.title')</span>
                        </a>
                    </li>@endcan
                    
                    @can('role_access')
                    <li>
                        <a href="{{ route('admin.roles.index') }}">
                            <i class="fa fa-briefcase"></i>
                            <span>@lang('global.roles.title')</span>
                        </a>
                    </li>@endcan
                    
                    @can('user_access')
                    <li>
                        <a href="{{ route('admin.users.index') }}">
                            <i class="fa fa-user"></i>
                            <span>@lang('global.users.title')</span>
                        </a>
                    </li>@endcan
                    
                    @can('user_action_access')
                    <li>
                        <a href="{{ route('admin.user_actions.index') }}">
                            <i class="fa fa-th-list"></i>
                            <span>@lang('global.user-actions.title')</span>
                        </a>
                    </li>@endcan
                    
                </ul>
            </li>@endcan
            
            @can('contact_management_access')
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-phone-square"></i>
                    <span>@lang('global.contact-management.title')</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    @can('contact_company_access')
                    <li>
                        <a href="{{ route('admin.contact_companies.index') }}">
                            <i class="fa fa-building-o"></i>
                            <span>@lang('global.contact-companies.title')</span>
                        </a>
                    </li>@endcan
                    
                    @can('contact_access')
                    <li>
                        <a href="{{ route('admin.contacts.index') }}">
                            <i class="fa fa-user-plus"></i>
                            <span>@lang('global.contacts.title')</span>
                        </a>
                    </li>@endcan
                    
                </ul>
            </li>@endcan
            
            @can('gittest_access')
            <li>
                <a href="{{ route('admin.gittests.index') }}">
                    <i class="fa fa-gears"></i>
                    <span>@lang('global.gittest.title')</span>
                </a>
            </li>@endcan
            
            @can('gittest2_access')
            <li>
                <a href="{{ route('admin.gittest2s.index') }}">
                    <i class="fa fa-gears"></i>
                    <span>@lang('global.gittest2.title')</span>
                </a>
            </li>@endcan
            
            @can('gittest3_access')
            <li>
                <a href="{{ route('admin.gittest3s.index') }}">
                    <i class="fa fa-gears"></i>
                    <span>@lang('global.gittest3.title')</span>
                </a>
            </li>@endcan
            
            @can('gittest_4_access')
            <li>
                <a href="{{ route('admin.gittest_4s.index') }}">
                    <i class="fa fa-gears"></i>
                    <span>@lang('global.gittest-4.title')</span>
                </a>
            </li>@endcan
            
            @can('gittest_5_access')
            <li>
                <a href="{{ route('admin.gittest_5s.index') }}">
                    <i class="fa fa-gears"></i>
                    <span>@lang('global.gittest-5.title')</span>
                </a>
            </li>@endcan
            

            

            



            <li class="{{ $request->segment(1) == 'change_password' ? 'active' : '' }}">
                <a href="{{ route('auth.change_password') }}">
                    <i class="fa fa-key"></i>
                    <span class="title">@lang('global.app_change_password')</span>
                </a>
            </li>

            <li>
                <a href="#logout" onclick="$('#logout').submit();">
                    <i class="fa fa-arrow-left"></i>
                    <span class="title">@lang('global.app_logout')</span>
                </a>
            </li>
        </ul>
    </section>
</aside>

