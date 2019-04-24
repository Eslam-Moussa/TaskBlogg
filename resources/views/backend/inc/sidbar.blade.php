<aside class="left-sidebar">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav">
                <!-- <li class="user-pro"> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><img  src="" alt="user-img" class="img-circle"><span class="hide-menu"></span><span class="hide-menu"></span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href=""><i class="ti-user"></i> My Profile</a></li>

                        <li><a href="{{ url('/logout') }}"><i class="fa fa-power-off"></i> Logout</a></li>
                    </ul>
                </li> -->


                <li> <a class=" waves-effect waves-dark" href="{{url('/')}}/admin" aria-expanded="false"><i class="icon-home"></i><span class="hide-menu">الرئيسية</ <span class="badge badge-pill badge-cyan ml-auto"></span></span></a>

                </li> 


                <li> <a class=" waves-effect waves-dark" href="{{url('/')}}/admin/GetCategory" aria-expanded="false"><i class="fa fa-edit"></i><span class="hide-menu">الأقسام</ <span class="badge badge-pill badge-cyan ml-auto"></span></span></a>

                </li>

                <li> <a class=" waves-effect waves-dark" href="{{url('/')}}/admin/ShowPost" aria-expanded="false"><i class="fa fa-edit"></i><span class="hide-menu">المقال</<span class="badge badge-pill badge-cyan ml-auto"></span></span></a>
                </li>

            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>