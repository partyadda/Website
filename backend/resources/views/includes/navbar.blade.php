 <nav class="app-header navbar navbar-expand bg-body"> <!--begin::Container-->
            <div class="container-fluid"> <!--begin::Start Navbar Links-->
                <ul class="navbar-nav">
                    <li class="nav-item"> <a class="nav-link" data-lte-toggle="sidebar" href="#" role="button"> <i class="bi bi-list"></i> </a> </li>
                    <li class="nav-item d-none d-md-block"> <a href="https://www.partyadda.com" target="_blank" class="nav-link">Party Adda</a> </li>
                    
                </ul> <!--end::Start Navbar Links--> <!--begin::End Navbar Links-->
                <ul class="navbar-nav ms-auto"> <!--begin::Navbar Search-->
                    <li class="nav-item d-none d-md-block">
                         <a href="https://partyadda.com/select-cake/1" target="_blank" class="nav-link">AECS Cake Price list</a> </li>
                
                    <li class="nav-item"> <a class="nav-link" data-widget="navbar-search" href="#" role="button"> <i class="bi bi-search"></i> </a> </li> <!--end::Navbar Search--> 
                            
                    </li> <!--end::Messages Dropdown Menu--> <!--begin::Notifications Dropdown Menu-->
                    <li class="nav-item"> <a class="nav-link" href="#" data-lte-toggle="fullscreen"> 
                    <i data-lte-icon="maximize" class="bi bi-arrows-fullscreen"></i> <i data-lte-icon="minimize" class="bi bi-fullscreen-exit" style="display: none;"></i> </a> 
                    </li> <!--end::Fullscreen Toggle--> <!--begin::User Menu Dropdown-->
                    
                    <li class="nav-item dropdown user-menu">
                        {{session('username')}}
                         <!--begin::Menu Body-->
                            <!-- 
                            <li class="user-footer"> <a href="#" class="btn btn-default btn-flat">Profile</a> 
                            <a href="#" class="btn btn-default btn-flat float-end">Sign out</a> </li> <!--end::Menu Footer-->
                        </ul>
                    </li> <!--end::User Menu Dropdown-->
                </ul> <!--end::End Navbar Links-->
            </div> <!--end::Container-->
        </nav> <!--end::Header--> <!--begin::Sidebar-->