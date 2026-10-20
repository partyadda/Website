<aside class="app-sidebar bg-body-secondary shadow" data-bs-theme="dark"> <!--begin::Sidebar Brand-->
    <div class="sidebar-brand"> <!--begin::Brand Link--> <a href="index.html" class="brand-link"> <!--begin::Brand Image--> <img src="https://partyadda.com/images/pnp%20logo.png" alt="PartyAdda" class="brand-image" style="width:100px;height:300px;"> <!--end::Brand Image--> <!--begin::Brand Text--> <span class="brand-text fw-light">Party Adda</span> <!--end::Brand Text--> </a> <!--end::Brand Link--> </div> <!--end::Sidebar Brand--> <!--begin::Sidebar Wrapper-->

    @php
    $theatre = \App\Models\theatre::count('id');
    $city = \App\Models\city::count('id');
    $branch = \App\Models\branch::count('id');
    $booking_sum = \App\Models\booking::sum('final_price');
    $cake = \App\Models\cake::count('id');
    $decoration = \App\Models\decoration::count('id');
    $occasion = \App\Models\occasion::count('id');
    @endphp
    <div class="sidebar-wrapper">
        <nav class="mt-1"> <!--begin::Sidebar Menu-->
            <ul class="nav sidebar-menu flex-column" data-lte-toggle="treeview" role="menu" data-accordion="true">
                <li class="nav-item menu-open">
                    <a href="{{ route('admin.dashboard')}}" class="nav-link active"> <i class="nav-icon bi bi-speedometer"></i>
                        <p>Dashboard</p>
                    </a>
                </li>

                <li class="nav-item"><a href="{{ route('calendar.event.manage')}}" class="nav-link"><i class="nav-icon bi bi-speedometer"></i>
                        <p>Sync Calendar</p>
                    </a></li>

                <li class="nav-item"><a href="{{ route('admin.booking')}}" class="nav-link"><i class="nav-icon bi bi-speedometer"></i>
                        <p>View Bookings</p>
                    </a></li>

                {{-- Book Theatre/Package --}}
                <li class="nav-item"><a href="{{ route('admin.book-slots')}}" class="nav-link"><i class="bi bi-building-fill-add"></i>
                        <p>Book Theatre/Package</p>
                    </a></li>

                <li class="nav-item"> <a href="#" class="nav-link"> <i class="bi bi-buildings"></i>
                        <p>Reference data<span class="nav-badge badge text-bg-secondary me-3">{{$theatre}}</span> <i class="nav-arrow bi bi-chevron-right"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item"> <a href="{{ route('admin.view_theatres')}}" class="nav-link"> <i class="bi bi-building-fill-check"></i>
                                <p>View Theaters</p>
                            </a> </li>

                        <li class="nav-item">
                            <a href="{{route('admin.view_customers')}}" class="nav-link"> <i class="nav-icon bi bi-speedometer"></i>
                                <p>View Customers</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.Reports')}}" class="nav-link"> <i class="nav-icon bi bi-cake"></i>
                                <p>View Reports</p>
                            </a>
                        </li>
                        <li class="nav-item"> <a href="{{route('admin.view_add-ons')}}" class="nav-link"> <i class="bi bi-building-fill-check"></i>
                                <p>View Add-Ons</p>
                            </a> </li>
                    </ul>
                </li>

                <!-- <li class="nav-item"> <a href="#" class="nav-link"> <i class="bi bi-buildings"></i>
                        <p>Manage Theaters<span class="nav-badge badge text-bg-secondary me-3">{{$theatre}}</span> <i class="nav-arrow bi bi-chevron-right"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item"> <a href="{{ route('admin.add_theater')}}" class="nav-link"> <i class="bi bi-building-fill-add"></i>
                                <p>Add Theater</p>
                            </a> </li>
                        <li class="nav-item"> <a href="{{ route('admin.view_theatres')}}" class="nav-link"> <i class="bi bi-building-fill-check"></i>
                                <p>View Theaters</p>
                            </a> </li>
                    </ul>
                </li> 
                <li class="nav-item"> <a href="#" class="nav-link"> <i class="bi bi-pin-map"></i>
                        <p>Manage Cities<span class="nav-badge badge text-bg-secondary me-3">{{$city}}</span> <i class="nav-arrow bi bi-chevron-right"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item"> <a href="{{route('admin.add_city')}}" class="nav-link"> <i class="bi bi-building-fill-add"></i>
                                <p>Add City</p>
                            </a> </li>

                            
                        <li class="nav-item"> <a href="{{route('admin.view_cities')}}" class="nav-link"> <i class="bi bi-building-fill-check"></i>
                                <p>View Cities</p>
                            </a> </li>
                    </ul>
                </li>

                

                <li class="nav-item"> <a href="#" class="nav-link"> <i class="bi bi-building"></i>
                        <p>Manage Branches<span class="nav-badge badge text-bg-secondary me-3">{{$branch}}</span> <i class="nav-arrow bi bi-chevron-right"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item"> <a href="{{route('admin.add_branch')}}" class="nav-link"> <i class="bi bi-building-fill-add"></i>
                                <p>Add Branch</p>
                            </a> </li>
                        <li class="nav-item"> <a href="{{route('admin.view_branches')}}" class="nav-link"> <i class="bi bi-building-fill-check"></i>
                                <p>View Branches</p>
                            </a> </li>
                    </ul>
                </li>
                

                <li class="nav-item">
                    <a href="{{route('admin.view_customers')}}" class="nav-link"> <i class="nav-icon bi bi-speedometer"></i>
                        <p>View Customers</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.Reports')}}" class="nav-link"> <i class="nav-icon bi bi-cake"></i>
                        <p>View Reports</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.view_timeslots')}}" class="nav-link"> <i class="nav-icon bi bi-speedometer"></i>
                        <p>Manage Time Slots</p>
                    </a>
                </li>
                <li class="nav-item"> <a href="#" class="nav-link"> <i class="bi bi-cake"></i>
                        <p>Manage Cakes<span class="nav-badge badge text-bg-secondary me-3">{{$cake}}</span> <i class="nav-arrow bi bi-chevron-right"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item"> <a href="{{route('admin.add_cake')}}" class="nav-link"> <i class="bi bi-cake2"></i>
                                <p>Add Cake</p>
                            </a> </li>
                        <li class="nav-item"> <a href="{{route('admin.view_cakes')}}" class="nav-link"> <i class="bi bi-cake2-fill"></i>
                                <p>View Cakes</p>
                            </a> </li>
                    </ul>
                </li>
                <li class="nav-item"> <a href="#" class="nav-link"> <i class="bi bi-buildings"></i>
                        <p>Manage Occasions<span class="nav-badge badge text-bg-secondary me-3">{{$occasion}}</span> <i class="nav-arrow bi bi-chevron-right"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item"> <a href="{{route('admin.add_occasion')}}" class="nav-link"> <i class="bi bi-building-fill-add"></i>
                                <p>Add Occasion</p>
                            </a> </li>
                        <li class="nav-item"> <a href="{{route('admin.view_occasions')}}" class="nav-link"> <i class="bi bi-building-fill-check"></i>
                                <p>View Occasions</p>
                            </a> </li>
                    </ul>
                </li>
                <li class="nav-item"> <a href="#" class="nav-link"> <i class="bi bi-card-checklist"></i>
                        <p>Manage Add-Ons<span class="nav-badge badge text-bg-secondary me-3">{{$decoration}}</span> <i class="nav-arrow bi bi-chevron-right"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item"> <a href="{{route('admin.view_addoncat')}}" class="nav-link"> <i class="bi bi-building-fill-add"></i>
                                <p>Manage Categories</p>
                            </a> </li>
                        <li class="nav-item"> <a href="{{route('admin.add_add-on')}}" class="nav-link"> <i class="bi bi-building-fill-add"></i>
                                <p>Add Add-On</p>
                            </a> </li>
                        <li class="nav-item"> <a href="{{route('admin.view_add-ons')}}" class="nav-link"> <i class="bi bi-building-fill-check"></i>
                                <p>View Add-Ons</p>
                            </a> </li>
                    </ul>
                </li>
                <li class="nav-item"> <a href="#" class="nav-link"> <i class="bi bi-buildings"></i>
                        <p>Settings<span class="nav-badge badge text-bg-secondary me-3">6</span> <i class="nav-arrow bi bi-chevron-right"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item"> <a href="paymentgateway.html" class="nav-link"> <i class="bi bi-building-fill-add"></i>
                                <p>Payment Gateways</p>
                            </a> </li>
                        <li class="nav-item"> <a href="banners.html" class="nav-link"> <i class="bi bi-building-fill-add"></i>
                                <p>Home Banners</p>
                            </a> </li>
                    </ul>
                </li>
-->


            </ul> <!--end::Sidebar Menu-->
        </nav>
    </div> <!--end::Sidebar Wrapper-->
</aside> <!--end::Sidebar--> <!--begin::App Main-->