@include("layouts.adminheader")
    <div>

        <div>
            <!-- Start Site Setting -->
            <div id="sitesettings" class="sitesettings">
                <div class="sitesettings-item"><a href="javascript:void(0);" id="sitetoggle" class="sitetoggle">
                        <i class="fas fa-cog ani-rotates"></i></a>
                </div>
            </div>
            <!-- End Site Setting -->

            <!-- Start left sidebar -->
            @include("layouts.adminsidebar")
            <!-- End left sidebar -->
        </div>

        <!-- Start Content Area -->
        <section>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-10 col-md-9 pt-md-5 mt-md-3 ms-auto">
                        <!-- Start Inner Page Content Area -->
                        <div class="row" >
                            <h5> @yield('caption') </h5>
                            @yield('content')
                        </div>
                        <!-- End Inner Page Content Area -->
                    </div>
                </div>
            </div>
        </section>
        <!-- End Content Area -->



    </div>
@include("layouts.adminfooter")
