<div class="container body">
    <div class="main_container">
        <div class="col-md-3 left_col">
            <div class="left_col scroll-view">
                <div class="navbar nav_title" style="border: 0;">
                    <a href="{{ url('/') }}" class="site_title"><i class="fa fa-paw"></i> <span>E-Gudang</span></a>
                </div>

                <div class="clearfix"></div>

                <!-- menu profile quick info -->
                <div class="profile clearfix">
                </div>
                <!-- /menu profile quick info -->
                <br />
                <br>
                <br>
                <!-- sidebar menu -->
                <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                    <div class="menu_section">
                        <ul class="nav side-menu">
                            @if (Auth::user()->id_role == '1')
                                    <li>
                                        <a href="{{ route('admin.indexbuilding')}}" class="nav-link">
                                            <i class="fa fa-table"></i>
                                            <span>Data Gudang</span>
                                        </a>
                                    </li>
                            <li>
                                <a href="{{ url('/datapenyewa')}}" class="nav-link">
                                    <i class="fa fa-edit"></i>
                                    <span>Data Penyewaan</span>
                                </a>
                            </li>
                            @endif

                            @if (Auth::user()->id_role == 2)
                            <li>
                                <a href="{{ route('owner.profile')}}" class="nav-link">
                                    <i class="fa fa-user"></i>
                                    <span>Profile</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('owner.indexgudang')}}" class="nav-link">
                                    <i class="fa fa-table"></i>
                                    <span>Data Gudang</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ url('/penyewa')}}" class="nav-link">
                                    <i class="fa fa-edit"></i>
                                    <span>Data Penyewaan</span>
                                </a>
                            </li>
                            @endif

                            @if (Auth::user()->id_role == '3')
                            <li>
                                <a href="{{ route('profile.index')}}" class="nav-link">
                                    <i class="fa fa-user"></i>
                                    <span>Profile</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ url('masyarakat.indexrekomendasi')}}" class="nav-link">
                                    <i class="fa fa-table"></i>
                                    <span>Rekomendasi Gudang</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ url('masyarakat.indexsewa')}}" class="nav-link">
                                    <i class="fa fa-edit"></i>
                                    <span>Sewa Gudang</span>
                                </a>
                            </li>
                            @endif


                        </ul>
                    </div>
                </div>
                <!-- /sidebar menu -->
            </div>
        </div>
        <!-- page content -->

    </div>