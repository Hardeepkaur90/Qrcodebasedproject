<aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3   bg-gradient-dark" id="sidenav-main">
    <div class="sidenav-header">
        <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
        <a class="navbar-brand m-0 d-flex text-wrap align-items-center" href=" {{ route('dashboard') }} ">
            <img src="{{ asset('assets') }}/img/logo-ct.png" class="navbar-brand-img h-100" alt="main_logo">
            <span class="ms-2 font-weight-bold text-white">Menu Management</span>
        </a>
    </div>
    <hr class="horizontal light mt-0 mb-2">
    <div class="collapse navbar-collapse  w-auto  max-height-vh-100" id="sidenav-collapse-main">
        <ul class="navbar-nav">
            <li class="nav-item mt-3">
           @if(@Auth::user()->roles->role_name === 'superadmin')
           <h6 class="ps-4 ms-2 text-uppercase text-xs text-white font-weight-bolder opacity-8">SuperAdmin</h6>
           @elseif(@Auth::user()->roles->role_name === 'admin')
           <h6 class="ps-4 ms-2 text-uppercase text-xs text-white font-weight-bolder opacity-8">Admin</h6>
            @else
            <h6 class="ps-4 ms-2 text-uppercase text-xs text-white font-weight-bolder opacity-8">Chef</h6>
           @endif
              
            </li>
            <li class="nav-item">
                <a class="nav-link text-white {{ Route::currentRouteName() == 'user-profile' ? ' active bg-gradient-primary' : '' }} " href="{{ route('user-profile') }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i style="font-size: 1.2rem;" class="fas fa-user-circle ps-2 pe-2 text-center"></i>
                    </div>
                    <span class="nav-link-text ms-1">User Profile</span>
                </a>
            </li>

           @if(@Auth::user()->roles->role_name === 'superadmin')
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle text-white " id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <div class=" text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i style="font-size: 1rem;" class="fas fa-lg fa fa-users ps-2 pe-2 text-center"></i>
                    </div>
                    <span class="nav-link-text ms-1">Role Management</span>
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <li class="nav-item"> <a class="nav-link dropdown-item  {{ Route::currentRouteName() == 'addrole' ? ' active bg-gradient-primary' : '' }} " href="{{ route('addrole') }}">
                            <div class="text-center me-2 d-flex align-items-center justify-content-center">
                                <i style="font-size: 1rem;" class="fas fa-lg fa-plus-square ps-2 pe-2 text-center"></i>
                            </div>
                            <span class="nav-link-text ms-1">Add Role</span>
                        </a></li>
                    <li class="nav-item"> <a class="nav-link dropdown-item {{ Route::currentRouteName() == 'managerole' ? ' active bg-gradient-primary' : '' }} " href="{{ route('managerole') }}">
                            <div class="text-center me-2 d-flex align-items-center justify-content-center">
                                <i style="font-size: 1rem;" class="fas fa-lg fa-list-ul ps-2 pe-2 text-center"></i>
                            </div>
                            <span class="nav-link-text ms-1">Manage Role</span>
                        </a></li>

                </ul>
            </li>



            <!-- user Management -->



            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle text-white " id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <div class=" text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i style="font-size: 1rem;" class="fas fa-lg fa fa-user ps-2 pe-2 text-center"></i>
                    </div>
                    <span class="nav-link-text ms-1">User Management</span>
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <li class="nav-item"> <a class="nav-link dropdown-item  {{ Route::currentRouteName() == 'adduser' ? ' active bg-gradient-primary' : '' }} " href="{{ route('adduser') }}">
                            <div class="text-center me-2 d-flex align-items-center justify-content-center">
                                <i style="font-size: 1rem;" class="fas fa-lg fa-plus-square ps-2 pe-2 text-center"></i>
                            </div>
                            <span class="nav-link-text ms-1">Add User</span>
                        </a></li>
                    <li class="nav-item"> <a class="nav-link dropdown-item {{ Route::currentRouteName() == 'manageuser' ? ' active bg-gradient-primary' : '' }} " href="{{ route('manageuser') }}">
                            <div class="text-center me-2 d-flex align-items-center justify-content-center">
                                <i style="font-size: 1rem;" class="fas fa-lg fa-list-ul ps-2 pe-2 text-center"></i>
                            </div>
                            <span class="nav-link-text ms-1">Manage User</span>
                        </a></li>

                </ul>
            </li>

<!-- type of food start -->
<li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle text-white " id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <div class=" text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i style="font-size: 1rem;" class="fas fa-lg fa fa-user ps-2 pe-2 text-center"></i>
                    </div>
                    <span class="nav-link-text ms-1">Category Management</span>
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <li class="nav-item"> <a class="nav-link dropdown-item  {{ Route::currentRouteName() == 'addcategory' ? ' active bg-gradient-primary' : '' }} " href="{{ route('addcategory') }}">
                            <div class="text-center me-2 d-flex align-items-center justify-content-center">
                                <i style="font-size: 1rem;" class="fas fa-lg fa-plus-square ps-2 pe-2 text-center"></i>
                            </div>
                            <span class="nav-link-text ms-1">Add category</span>
                        </a></li>
                    <li class="nav-item"> <a class="nav-link dropdown-item {{ Route::currentRouteName() == 'managecategory' ? ' active bg-gradient-primary' : '' }} " href="{{ route('managecategory') }}">
                            <div class="text-center me-2 d-flex align-items-center justify-content-center">
                                <i style="font-size: 1rem;" class="fas fa-lg fa-list-ul ps-2 pe-2 text-center"></i>
                            </div>
                            <span class="nav-link-text ms-1">Manage Category</span>
                        </a></li>

                </ul>
            </li>

<!-- type of food end -->
@elseif(@Auth::user()->roles->role_name === 'chef' )
<li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle text-white " id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <div class=" text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i style="font-size: 1rem;" class="fas fa-lg fa fa-user ps-2 pe-2 text-center"></i>
                    </div>
                    <span class="nav-link-text ms-1">Order Management</span>
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <li class="nav-item"> <a class="nav-link dropdown-item  {{ Route::currentRouteName() == 'ordermanagement' ? ' active bg-gradient-primary' : '' }} " href="{{ route('ordermanagement') }}">
                            <div class="text-center me-2 d-flex align-items-center justify-content-center">
                                <i style="font-size: 1rem;" class="fas fa-lg fa-plus-square ps-2 pe-2 text-center"></i>
                            </div>
                            <span class="nav-link-text ms-1">Manage Order</span>
                        </a></li>
                   
                </ul>
            </li>
            @elseif(@Auth::user()->roles->role_name === 'admin' )
   <!-- End of Role User -->


            <!-- item Management -->

  
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle text-white " id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <div class=" text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i style="font-size: 1rem;" class="fas fa-lg fa fa-sitemap ps-2 pe-2 text-center"></i>
                    </div>
                    <span class="nav-link-text ms-1">Item Management</span>
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <li class="nav-item"> <a class="nav-link dropdown-item  {{ Route::currentRouteName() == 'additem' ? ' active bg-gradient-primary' : '' }} " href="{{ route('additem') }}">
                            <div class="text-center me-2 d-flex align-items-center justify-content-center">
                                <i style="font-size: 1rem;" class="fas fa-lg fa-plus-square ps-2 pe-2 text-center"></i>
                            </div>
                            <span class="nav-link-text ms-1">Add Item</span>
                        </a></li>
                    <li class="nav-item"> <a class="nav-link dropdown-item  {{ Route::currentRouteName() == 'manageitem' ? ' active bg-gradient-primary' : '' }} " href="{{ route('manageitem') }}">
                            <div class="text-center me-2 d-flex align-items-center justify-content-center">
                                <i style="font-size: 1rem;" class="fas fa-lg fa-list-ul ps-2 pe-2 text-center"></i>
                            </div>
                            <span class="nav-link-text ms-1">Manage Item</span>
                        </a></li>

                </ul>
            </li>




           
            <!-- End of item  -->

            <!-- table Management -->

            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle text-white " id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <div class=" text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i style="font-size: 1rem;" class="fas fa-lg fa fa-table ps-2 pe-2 text-center"></i>
                    </div>
                    <span class="nav-link-text ms-1">Table Management</span>
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <li class="nav-item"> <a class="nav-link dropdown-item {{ Route::currentRouteName() == 'table' ? ' active bg-gradient-primary' : '' }} " href="{{ route('table') }}">
                            <div class="text-center me-2 d-flex align-items-center justify-content-center">
                                <i style="font-size: 1rem;" class="fas fa-lg fa-plus-square ps-2 pe-2 text-center"></i>
                            </div>
                            <span class="nav-link-text ms-1">Add Table</span>
                        </a></li>
                    <li class="nav-item"> <a class="nav-link dropdown-item  {{ Route::currentRouteName() == 'managetable' ? ' active bg-gradient-primary' : '' }} " href="{{ route('managetable') }}">
                            <div class="text-center me-2 d-flex align-items-center justify-content-center">
                                <i style="font-size: 1rem;" class="fas fa-lg fa-list-ul ps-2 pe-2 text-center"></i>
                            </div>
                            <span class="nav-link-text ms-1">Manage Table</span>
                        </a></li>

                </ul>
            </li>


           

            
            <!-- End of table  -->


            <!-- menu Management -->

            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle text-white " id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <div class=" text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i style="font-size: 1rem;" class="fas fa-lg fa fa-minus-square ps-2 pe-2 text-center"></i>
                    </div>
                    <span class="nav-link-text ms-1">Menu Management</span>
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <li class="nav-item"> <a class="nav-link dropdown-item  {{ Route::currentRouteName() == 'managemenu' ? ' active bg-gradient-primary' : '' }} " href="{{ route('managemenu') }}">
                            <div class="text-center me-2 d-flex align-items-center justify-content-center">
                                <i style="font-size: 1rem;" class="fas fa-lg fa-list-ul ps-2 pe-2 text-center"></i>
                            </div>
                            <span class="nav-link-text ms-1">Manage Menu</span>
                        </a></li>

                </ul>
            </li>
<!-- chef management -->

<li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle text-white " id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <div class=" text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i style="font-size: 1rem;" class="fas fa-lg fa fa-user ps-2 pe-2 text-center"></i>
                    </div>
                    <span class="nav-link-text ms-1">Chef Management</span>
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <li class="nav-item"> <a class="nav-link dropdown-item  {{ Route::currentRouteName() == 'chefmanagement' ? ' active bg-gradient-primary' : '' }} " href="{{ route('chefmanagement') }}">
                            <div class="text-center me-2 d-flex align-items-center justify-content-center">
                                <i style="font-size: 1rem;" class="fas fa-lg fa-plus-square ps-2 pe-2 text-center"></i>
                            </div>
                            <span class="nav-link-text ms-1">Manage Chef</span>
                        </a></li>
                    <li class="nav-item"> <a class="nav-link dropdown-item {{ Route::currentRouteName() == 'addchef' ? ' active bg-gradient-primary' : '' }} " href="{{ route('addchef') }}">
                            <div class="text-center me-2 d-flex align-items-center justify-content-center">
                                <i style="font-size: 1rem;" class="fas fa-lg fa-list-ul ps-2 pe-2 text-center"></i>
                            </div>
                            <span class="nav-link-text ms-1">Add Chef</span>
                        </a></li>

                </ul>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle text-white " id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <div class=" text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i style="font-size: 1rem;" class="fas fa-lg fa fa-user ps-2 pe-2 text-center"></i>
                    </div>
                    <span class="nav-link-text ms-1">Order Management</span>
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <li class="nav-item"> <a class="nav-link dropdown-item  {{ Route::currentRouteName() == 'ordermanagement' ? ' active bg-gradient-primary' : '' }} " href="{{ route('ordermanagement') }}">
                            <div class="text-center me-2 d-flex align-items-center justify-content-center">
                                <i style="font-size: 1rem;" class="fas fa-lg fa-plus-square ps-2 pe-2 text-center"></i>
                            </div>
                            <span class="nav-link-text ms-1">Manage Order</span>
                        </a></li>
                   
                </ul>
            </li>
<!-- end chef management -->


<!-- order Management start -->


<!-- order Management end -->

            @endif

            <!-- End of menu  -->


         

            <!-- <li class="nav-item mt-3">
                <h6 class="ps-4 ms-2 text-uppercase text-xs text-white font-weight-bolder opacity-8">Pages</h6>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white {{ Route::currentRouteName() == 'dashboard' ? ' active bg-gradient-primary' : '' }} " href="{{ route('dashboard') }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">dashboard</i>
                    </div>
                    <span class="nav-link-text ms-1">Dashboard</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white {{ Route::currentRouteName() == 'tables' ? ' active bg-gradient-primary' : '' }} " href="{{ route('tables') }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">table_view</i>
                    </div>
                    <span class="nav-link-text ms-1">Tables</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white {{ Route::currentRouteName() == 'billing' ? ' active bg-gradient-primary' : '' }}  " href="{{ route('billing') }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">receipt_long</i>
                    </div>
                    <span class="nav-link-text ms-1">Billing</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white {{ Route::currentRouteName() == 'virtual-reality' ? ' active bg-gradient-primary' : '' }}  " href="{{ route('virtual-reality') }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">view_in_ar</i>
                    </div>
                    <span class="nav-link-text ms-1">Virtual Reality</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white {{ Route::currentRouteName() == 'rtl' ? ' active bg-gradient-primary' : '' }}  " href="{{ route('rtl') }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">format_textdirection_r_to_l</i>
                    </div>
                    <span class="nav-link-text ms-1">RTL</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white {{ Route::currentRouteName() == 'notifications' ? ' active bg-gradient-primary' : '' }}  " href="{{ route('notifications') }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">notifications</i>
                    </div>
                    <span class="nav-link-text ms-1">Notifications</span>
                </a>
            </li>
            <li class="nav-item mt-3">
                <h6 class="ps-4 ms-2 text-uppercase text-xs text-white font-weight-bolder opacity-8">Account pages</h6>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white {{ Route::currentRouteName() == 'profile' ? ' active bg-gradient-primary' : '' }}  " href="{{ route('profile') }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">person</i>
                    </div>
                    <span class="nav-link-text ms-1">Profile</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white " href="{{ route('static-sign-in') }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">login</i>
                    </div>
                    <span class="nav-link-text ms-1">Sign In</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white " href="{{ route('static-sign-up') }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">assignment</i>
                    </div>
                    <span class="nav-link-text ms-1">Sign Up</span>
                </a>
            </li> -->
        </ul>
    </div>

</aside>