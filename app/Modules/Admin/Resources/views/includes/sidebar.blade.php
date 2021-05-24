@inject('menuRoles', '\App\Modules\User\Services\CheckUserRoles')
@php
    $currentRoute = Request::route()->getName();
    $Route = explode('.',$currentRoute);
@endphp

<div class="sidebar sidebar-dark sidebar-main sidebar-expand-md"  @if($setting != null)) style="background-color: {{$setting->secondary_navbar_color}};" @endif>

    <!-- Sidebar mobile toggler -->
    <div class="sidebar-mobile-toggler text-center">
        <a href="#" class="sidebar-mobile-main-toggle">
            <i class="icon-arrow-left8"></i>
        </a>
        Navigation
        <a href="#" class="sidebar-mobile-expand">
            <i class="icon-screen-full"></i>
            <i class="icon-screen-normal"></i>
        </a>
    </div>
    <!-- /sidebar mobile toggler -->
    <!-- Sidebar content -->
    <div class="sidebar-content">
        <!-- Main navigation -->
        <div class="card card-sidebar-mobile">
            <ul class="nav nav-sidebar" data-nav-type="accordion">

                <!-- Main -->
                <li class="nav-item-header">
                    <div class="text-uppercase font-size-xs line-height-xs">General</div>
                    <i class="icon-menu" title="General"></i></li>

                <li class="nav-item">
                    <a href="{{url('admin/dashboard')}}" class="nav-link @if($Route[0]=='dashboard') active @endif" data-popup="tooltip" data-original-title="Dashboard" data-placement="right"><i class="icon-home4"></i><span>Dashboard</span>
                    </a>
                </li>
                @if($menuRoles->assignedRoles('employment.index'))
                    <li class="nav-item">
                        <a href="{{route('employment.index')}}" class="nav-link @if($Route[0]=='employment') active @endif" data-popup="tooltip" data-original-title="Employee Management" data-placement="right"><i class="icon-users4"></i><span>Employee Management</span>
                        </a>
                    </li>
                @endif
                @if($menuRoles->assignedRoles('employee.list'))
                    <li class="nav-item">
                        <a href="{{route('employee.list')}}" class="nav-link @if($Route[0]=='employee') active @endif" data-popup="tooltip" data-original-title="Employee Directory" data-placement="right"><i class="icon-address-book2"></i><span>Employee Directory</span>
                        </a>
                    </li>
                @endif

                @if($menuRoles->assignedRoles('setting.create'))
                    <li class="nav-item">
                        <a href="{{route('setting.create')}}" class="nav-link @if($Route[0]=='setting') active @endif" data-popup="tooltip" data-original-title="Setting Management" data-placement="right"><i class="icon-cogs"></i><span>Setting Management</span>
                        </a>
                    </li>
                @endif

                @if($menuRoles->assignedRoles('spec.index'))
                    <li class="nav-item">
                        <a href="{{route('spec.index')}}" class="nav-link @if($Route[0]=='spec') active @endif" data-popup="tooltip" data-original-title="Spec Management" data-placement="right"><i class="icon-grid5"></i><span>Spec Management</span>
                        </a>
                    </li>
                @endif

                @if($menuRoles->assignedRoles('configuration.index'))
                    <li class="nav-item">
                        <a href="{{route('configuration.index')}}" class="nav-link @if($Route[0]=='configuration') active @endif" data-popup="tooltip" data-original-title="Spec Configuration Management" data-placement="right"><i class="icon-gallery"></i><span>Spec Configuration Management</span>
                        </a>
                    </li>
                @endif

                @if($menuRoles->assignedRoles('role.index') || Auth::user()->user_type == 'super_admin')
                    <li class="nav-item">
                        <a href="{{route('role.index')}}" class="nav-link @if($Route[0]=='role') active @endif" data-popup="tooltip" data-original-title="Role Management"  data-placement="right"><i class="icon-pencil5"></i><span>Role Management</span>
                        </a>
                    </li>
                @endif


                <li class="nav-item-header">
                    <div class="text-uppercase font-size-xs line-height-xs">Automobile Features
                    </div>
                    <i class="icon-menu" title="Advance Construction Features"></i>
                </li>

                @if($menuRoles->assignedRoles('brand.index'))
                    <li class="nav-item">
                        <a href="{{route('brand.index')}}" class="nav-link @if($Route[0]=='brand') active @endif" data-popup="tooltip" data-original-title="Brand Management" data-placement="right"><i class="icon-medal"></i><span>Brand Management</span>
                        </a>
                    </li>
                @endif

                @if($menuRoles->assignedRoles('vehiclemodel.index'))
                    <li class="nav-item">
                        <a href="{{route('vehiclemodel.index')}}" class="nav-link @if($Route[0]=='vehiclemodel') active @endif" data-popup="tooltip" data-original-title="Model Management" data-placement="right"><i class="icon-cube3"></i><span>Model Management</span>
                        </a>
                    </li>
                @endif
                
                @if($menuRoles->assignedRoles('cars.index'))
                    <li class="nav-item">
                        <a href="{{route('cars.index')}}" class="nav-link @if($Route[0]=='cars') active @endif" data-popup="tooltip" data-original-title="Cars Management" data-placement="right"><i class="icon-car2"></i><span>Cars Management</span>
                        </a>
                    </li>
                @endif
                
                @if($menuRoles->assignedRoles('news.index'))
                    <li class="nav-item">
                        <a href="{{route('news.index')}}" class="nav-link @if($Route[0]=='news') active @endif" data-popup="tooltip" data-original-title="News Management" data-placement="right"><i class="icon-newspaper"></i><span>News Management</span>
                        </a>
                    </li>
                @endif

                @if($menuRoles->assignedRoles('banner.index'))
                    <li class="nav-item">
                        <a href="{{route('banner.index')}}" class="nav-link @if($Route[0]=='banner') active @endif" data-popup="tooltip" data-original-title="Banner Management" data-placement="right"><i class="icon-image5"></i><span>Banner Management</span>
                        </a>
                    </li>
                @endif

                <li class="nav-item nav-item-submenu">
                    <a href="#" class="nav-link"><i class="icon-flip-horizontal2"></i> <span>Services</span></a>

                    <ul class="nav nav-group-sub" data-submenu-title="Services" style="display: none;">
                        <li class="nav-item"><a href="{{route('servicecategory.index')}}" class="nav-link">Service Category</a></li>
                        <li class="nav-item"><a href="{{route('servicemanagement.index')}}" class="nav-link">Service Management</a></li>
                    </ul>
                </li>

                <li class="nav-item">
                    <a href="{{route('subscription.index')}}" class="nav-link @if($Route[0]=='subscription') active @endif" data-popup="tooltip" data-original-title="Subscription" data-placement="right"><i class="icon-checkmark-circle"></i><span>Subscriptions</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{route('page.index')}}" class="nav-link @if($Route[0]=='page') active @endif" data-popup="tooltip" data-original-title="Pages" data-placement="right"><i class="icon-stack"></i><span>Pages</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{route('search_log.index')}}" class="nav-link @if($Route[0]=='search_log') active @endif" data-popup="tooltip" data-original-title="Search Log" data-placement="right"><i class="icon-search4"></i><span>Search Log</span>
                    </a>
                </li>
        
        
             
            </ul>
        </div>
        <!-- /main navigation -->

    </div>
    <!-- /sidebar content -->

</div>
