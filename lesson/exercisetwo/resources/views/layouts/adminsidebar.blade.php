<!-- Start Left Side Bar  -->
<div class="wrapper">
    <nav class="navbar navbar-expand-md navbar-light">
        <div id="nav" class="navbar-collapse">
            <div class="container-fluid">

                <div class="row">
                    <div class="col-lg-2 col-md-3 fixed-top vh-100 overflow-auto sidebars">
                        <ul class="navbar-nav flex-column mt-4">
                            <li class="nav-item nav-categories ">Main</li>
                            <li class="nav-item nav-categories"><a href="javascript:void(0);" class="nav-link text-white p-3 mb-2 sidebarlinks"><i class="fas fa-tachometer-alt fa-lg me-3"></i>Dashboard</a></li>

                            <li class="nav-item"><a href="javascript:void(0);" class="nav-link text-white p-3 mb-2 sidebarlinks currents" data-bs-target="#pagelayout" data-bs-toggle="collapse"><i class="fas fa-file-alt fa-lg me-3"></i>Page Layout<i class="fas fa-angle-left mores"></i></a>

                                <ul id="pagelayout" class="collapse ps-2">
                                    <li><a href="javascript:void(0);" class="nav-link text-white sidebarlinks"><i class="fas fa-long-arrow-alt-right me-4"></i>Right Boxed</a></li>
                                    <li><a href="javascript:void(0);" class="nav-link text-white sidebarlinks"><i class="fas fa-long-arrow-alt-right me-4"></i>Left Boxed</a></li>
                                </ul>

                            </li>

                            <li class="nav-item"><a href="javascript:void(0);" class="nav-link text-white p-3 mb-2 sidebarlinks" data-bs-target="#sidebarlayout" data-bs-toggle="collapse"><i class="fas fa-file-alt fa-lg me-3"></i> Form <i class="fas fa-angle-left mores"></i></a>

                                <ul id="sidebarlayout" class="collapse ps-2">
                                    <li><a href="javascript:void(0);" class="nav-link text-white sidebarlinks"><i class="fas fa-long-arrow-alt-right me-4"></i> Att Form </a></li>

                                </ul>

                            </li>

                            <li class="nav-item nav-categories">Widgets</li>

                            <li class="nav-item nav-categories">UI Features</li>

                            <li class="nav-item"><a href="javascript:void(0);" class="nav-link text-white p-3 mb-2 sidebarlinks" data-bs-target="#basicui" data-bs-toggle="collapse"><i class="fas fa-file-alt fa-lg me-3"></i> Articles <i class="fas fa-angle-left mores"></i></a>

                                <ul id="basicui" class="collapse ps-2">
                                    <li><a href="{{ route("posts.index") }}" class="nav-link text-white sidebarlinks"><i class="fas fa-long-arrow-alt-right me-4"></i> Post </a></li>
                                    <li><a href="{{ route('attendances.index') }}" class="nav-link text-white sidebarlinks"><i class="fas fa-long-arrow-alt-right me-4"></i> Announcement </a></li>

                                </ul>

                            </li>

                            <li class="nav-item"><a href="javascript:void(0);" class="nav-link text-white p-3 mb-2 sidebarlinks" data-bs-target="#advanceui" data-bs-toggle="collapse"><i class="fas fa-users fa-lg me-3"></i> Students <i class="fas fa-angle-left mores"></i></a>

                                <ul id="advanceui" class="collapse ps-2">
                                    <li><a href="{{ route('students.index') }}" class="nav-link text-white sidebarlinks"><i class="fas fa-long-arrow-alt-right me-4"></i> All students </a></li>

                                </ul>

                            </li>

                            <li class="nav-item nav-categories">Popus</li>

                            <li class="nav-item"><a href="javascript:void(0);" class="nav-link text-white p-3 mb-2 sidebarlinks" data-bs-target="#iconselement" data-bs-toggle="collapse"><i class="fas fa-file-alt fa-lg me-3"></i>Icons<i class="fas fa-angle-left mores"></i></a>

                                <ul id="iconselement" class="collapse ps-2">
                                    <li><a href="javascript:void(0);" class="nav-link text-white sidebarlinks"><i class="fas fa-long-arrow-alt-right me-4"></i>Material</a></li>
                                    <li><a href="javascript:void(0);" class="nav-link text-white sidebarlinks"><i class="fas fa-long-arrow-alt-right me-4"></i>Flat Icons</a></li>
                                    <li><a href="javascript:void(0);" class="nav-link text-white sidebarlinks"><i class="fas fa-long-arrow-alt-right me-4"></i>Font Awesome</a></li>
                                    <li><a href="javascript:void(0);" class="nav-link text-white sidebarlinks"><i class="fas fa-long-arrow-alt-right me-4"></i>Simple Line Icons</a></li>

                                </ul>

                            </li>

                            <li class="nav-item nav-categories">Manage</li>

                            <li class="nav-item nav-categories"><a href="{{ route("countries.index") }}" class="nav-link text-white p-3 mb-2 sideberlinks" > <i class="fas fa-file-alt fa-lg me-3" ></i> Countries </a> </li>

                            <li class="nav-item nav-categories"><a href="{{ route("cities.index") }}" class="nav-link text-white p-3 mb-2 sideberlinks" > <i class="fas fa-file-alt fa-lg me-3" ></i> City </a> </li>

                            <li class="nav-item nav-categories"><a href="{{ route("genders.index") }}" class="nav-link text-white p-3 mb-2 sideberlinks" > <i class="fas fa-file-alt fa-lg me-3" ></i> Gender </a> </li>

                            <li class="nav-item nav-categories"><a href="{{ route('roles.index') }}" class="nav-link text-white p-3 mb-2 sideberlinks" > <i class="fas fa-file-alt fa-lg me-3" ></i> Role</a> </li>

                            <li class="nav-item nav-categories"><a href="{{ route('statuses.index') }}" class="nav-link text-white p-3 mb-2 sideberlinks" > <i class="fas fa-file-alt fa-lg me-3" ></i>  Status</a></li>

                            <li class="nav-item nav-categories"><a href="{{ route("categories.index") }}" class="nav-link text-white p-3 mb-2 sideberlinks" > <i class="fas fa-file-alt fa-lg me-3" ></i> Category </a></li>
                            {{--                           name slug status_id user_id --}}

                            <li class="nav-item nav-categories"><a href="" class="nav-link text-white p-3 mb-2 sideberlinks" > <i class="fas fa-file-alt fa-lg me-3" ></i>  Tag </a></li>
                            {{--                           name slug status_id user_id --}}


                            <li class="nav-item nav-categories">Date Representation</li>

                            <li class="nav-item"><a href="javascript:void(0);" class="nav-link text-white p-3 mb-2 sidebarlinks" data-bs-target="#chartelement" data-bs-toggle="collapse"><i class="fas fa-file-alt fa-lg me-3"></i> Fixed Analysis <i class="fas fa-angle-left mores"></i></a>

                                <ul id="chartelement" class="collapse ps-2">
                                    <li><a href="{{ route("categories.index") }}" class="nav-link text-white sidebarlinks"><i class="fas fa-long-arrow-alt-right me-4"></i> Categories </a></li>
                                    <li><a href="{{ route('statuses.index') }}" class="nav-link text-white sidebarlinks"><i class="fas fa-long-arrow-alt-right me-4"></i> Status </a></li>
                                    <li><a href="{{ route('tags.index') }}" class="nav-link text-white sidebarlinks"><i class="fas fa-long-arrow-alt-right me-4"></i> Tags </a></li>
                                    <li><a href="{{ route('types.index') }}" class="nav-link text-white sidebarlinks"><i class="fas fa-long-arrow-alt-right me-4"></i> Types </a></li>

                                </ul>

                            </li>

                            <li class="nav-item"><a href="javascript:void(0);" class="nav-link text-white p-3 mb-2 sidebarlinks" data-bs-target="#tableelement" data-bs-toggle="collapse"><i class="fas fa-file-alt fa-lg me-3"></i> Addon <i class="fas fa-angle-left mores"></i></a>

                                <ul id="tableelement" class="collapse ps-2">
                                    <li><a href="{{ route('cities.index') }}" class="nav-link text-white sidebarlinks"><i class="fas fa-long-arrow-alt-right me-4"></i> City </a></li>
                                    <li><a href="{{ route("countries.index") }}" class="nav-link text-white sidebarlinks"><i class="fas fa-long-arrow-alt-right me-4"></i> Country </a></li>
                                    <li><a href="{{ route("genders.index") }}" class="nav-link text-white sidebarlinks"><i class="fas fa-long-arrow-alt-right me-4"></i> Gender </a></li>
                                    <li><a href="{{ route('roles.index') }}" class="nav-link text-white sidebarlinks"><i class="fas fa-long-arrow-alt-right me-4"></i> Role </a></li>
                                </ul>

                            </li>

                            <li class="nav-item"><a href="javascript:void(0);" class="nav-link text-white p-3 mb-2 sidebarlinks" data-bs-target="#mapelement" data-bs-toggle="collapse"><i class="fas fa-file-alt fa-lg me-3"></i>Maps<i class="fas fa-angle-left mores"></i></a>

                                <ul id="mapelement" class="collapse ps-2">
                                    <li><a href="javascript:void(0);" class="nav-link text-white sidebarlinks"><i class="fas fa-long-arrow-alt-right me-4"></i>Google Map</a></li>
                                    <li><a href="javascript:void(0);" class="nav-link text-white sidebarlinks"><i class="fas fa-long-arrow-alt-right me-4"></i>Vector Map</a></li>
                                </ul>

                            </li>

                        </ul>
                    </div>

                    <!--End Left Navbar-->

                    <!-- Start Top Navbar -->
                    <div class="col-lg-10 col-md-9 fixed-top ms-auto topnavbars">
                        <div class="row">

                            <nav class="navbar navbar-expand navbar-light bg-white shadow">

                                <!-- Search -->
                                <form class="me-auto" action="" method="" >
                                    <div class="input-group">
                                        <input type="text" name="search" id="search" class="form-control border-0 shadow-none" placeholder="Search something..."/>
                                        <div class="input-group-append">
                                            <button type="submit" class="btn btn-primary"><i class="fas fa-search"></i></button>
                                        </div>
                                    </div>
                                </form>
                                <!-- search -->

                                <!-- notify & userlogout -->
                                <ul class="navbar-nav me-5 pe-5">
                                    <!-- notify -->
                                    <li class="nav-item dropdowns">

                                        <a href="javascript:void(0);" class="nav-link dropbtn" onclick="dropbtn(event)">
                                            <i class="fas fa-bell"></i>
                                            <span class="badge bg-danger">5+</span>
                                        </a>

                                        <div class="dropdown-contents mydropdowns">
                                            <h6>Alert Center</h6>

                                            <a href="javascript:void(0);" class="d-flex">
                                                <div>
                                                    <i class="fas fa-file-alt"></i>
                                                </div>
                                                <div>
                                                    <p class="small text-muted">3 May 2023</p>
                                                    <i>A new members created.</i>
                                                </div>
                                            </a>

                                            <a href="javascript:void(0);" class="d-flex">
                                                <div class="me-3">
                                                    <i class="fas fa-database text-warning"></i>
                                                </div>
                                                <div>
                                                    <p class="small text-muted">3 May 2023</p>
                                                    <i>Some of your data are missing.</i>
                                                </div>
                                            </a>

                                            <a href="javascript:void(0);" class="d-flex">
                                                <div>
                                                    <i class="fas fa-user text-info"></i>
                                                </div>
                                                <div>
                                                    <p class="small text-muted">3 May 2023</p>
                                                    <i>New users are invited you.</i>
                                                </div>
                                            </a>

                                            <a href="javascript:void(0);" class="small text-muted text-center">Show All Notifications</a>
                                        </div>

                                    </li>
                                    <!-- notify -->

                                    <!-- message -->
                                    <li class="nav-item dropdowns mx-3">
                                        <a href="javascript:void(0);" class="nav-link dropbtn" onclick="dropbtn(event)">
                                            <i class="fas fa-envelope"></i>
                                        </a>

                                        <div class="dropdown-contents mydropdowns">
                                            <h6>Message Center</h6>

                                            <a href="javascript:void(0);" class="d-flex">
                                                <div class="me-3">
                                                    <img src="../assets/img/users/user1.jpg" class="rounded-circle" width="30" alt="user1"/>
                                                </div>
                                                <div>
                                                    <p class="small text-muted">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                                                    <i>Ms.July. 25m ago</i>
                                                </div>
                                            </a>

                                            <a href="javascript:void(0);" class="d-flex">
                                                <div>
                                                    <img src="../assets/img/users/user2.jpg" class="rounded-circle" width="30" alt="user2"/>
                                                </div>
                                                <div>
                                                    <p class="small text-muted">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                                                    <i>Mr.Anton - 40m ago</i>
                                                </div>
                                            </a>

                                            <a href="javascript:void(0);" class="d-flex">
                                                <div>
                                                    <img src="../assets/img/users/user3.jpg" class="rounded-circle" width="30" alt="user3"/>
                                                </div>
                                                <div>
                                                    <p class="small text-muted">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                                                    <i>Ms.PaPa - 55m ago</i>
                                                </div>
                                            </a>

                                            <a href="javascript:void(0);" class="small text-muted text-center">Read More Message</a>
                                        </div>

                                    </li>
                                    <!-- message -->

                                    <!-- userlogout -->
                                    <li class="nav-item dropdowns">
                                        <a href="javascript:void(0);" class="dropdown-toggle" data-bs-toggle="dropdown"  >
                                            <span class="text-muted small me-2"> {{ $userdata->name }} </span>
                                            <img src="../assets/img/users/user1.jpg" class="rounded-circle" width="25" />
                                        </a>
                                        <div class="dropdown-menu">
                                            <a href="javascript:void(0);" class="dropdown-item"><i class="fas fa-user text-sm text-muted me-2"></i>Profile</a>
                                            <a href="javascript:void(0);" class="dropdown-item"><i class="fas fa-cogs text-sm text-muted me-2"></i>Settings</a>
                                            <a href="javascript:void(0);" class="dropdown-item"><i class="fas fa-list text-sm text-muted me-2"></i>Activity Log</a>
                                            <div class="dropdown-divider"></div>
                                            <a href="javascript:void(0);" class="dropdown-item"><i class="fas fa-sign-out-alt text-sm text-muted me-2"></i>Logout</a>

                                        </div>
                                    </li>
                                    <!-- userlogout -->
                                </ul>
                                <!-- notify & userlogout -->
                            </nav>
                        </div>
                    </div>
                    <!-- End Top Navbar -->

                </div>

            </div>
        </div>
    </nav>
</div>
<!-- End Left Side Bar  -->
