<div class="container-fluid">
    <div class="row">
        <!-- Left Sidebar start-->
        <div class="side-menu-fixed">
            <div class="scrollbar side-menu-bg" style="overflow: scroll">
                <ul class="nav navbar-nav side-menu" id="sidebarnav">
                    <!-- menu item Dashboard-->
                    <li>
    <a href="{{ url('/dashboard') }}">
        <div class="pull-left"><i class="ti-home"></i><span class="right-nav-text">Dashboard</span>
        </div>
        <div class="clearfix"></div>
    </a>
</li>
                    <!-- menu title -->
                    <li class="mt-10 mb-10 text-muted pl-4 font-medium menu-title"> </li>

                    <!-- Grades-->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#Grades-menu">
                            <div class="pull-left"><i class="fas fa-school"></i><span
                                    class="right-nav-text">homes</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="Grades-menu" class="collapse" data-parent="#sidebarnav">
                            <li><a href="#">Homes_List</a></li>

                        </ul>
                    </li>
                    
                </ul>
            </div>
        </div>

        <!-- Left Sidebar End-->

        <!--=================================