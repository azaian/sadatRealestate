<!-- ########## START: LEFT PANEL ########## -->
<div class="br-logo"><a href=""><span>[</span>Sadat Realstate<span>]</span></a></div>
<div class="br-sideleft overflow-y-auto">
    <label class="sidebar-label pd-x-15 mg-t-20">Navigation</label>
    <div class="br-sideleft-menu">



        <a href="{{url('admin/')}}" class="br-menu-link @yield('homepage')">
            <div class="br-menu-item">
                <i class="menu-item-icon icon ion-ios-home-outline tx-22"></i>
                <span class="menu-item-label">الرئيسيه</span>
            </div><!-- menu-item -->
        </a><!-- br-menu-link -->




        <a href="{{route('slider.index')}}" class="br-menu-link @yield('slider')">
            <div class="br-menu-item">
                <i class="menu-item-icon icon ion-images  tx-22"></i>
                <span class="menu-item-label">Slider</span>
            </div><!-- menu-item -->
        </a><!-- br-menu-link -->

        <a href="{{route('testinomial.index')}}" class="br-menu-link @yield('testinomial')">
            <div class="br-menu-item">
                <i class="menu-item-icon icon ion-images  tx-22"></i>
                <span class="menu-item-label">اراء العملاء</span>
            </div><!-- menu-item -->
        </a><!-- br-menu-link -->
        @if (auth()->user()->superadmin == 1)
        <a href="#" class="br-menu-link  @yield('categoryfeilds') ">
            <div class="br-menu-item">
                <i class="menu-item-icon icon ion-ios-home tx-24"></i>
                <span class="menu-item-label">فئات العقارات</span>
                <i class="menu-item-arrow fa fa-angle-down"></i>
            </div><!-- menu-item -->
        </a><!-- br-menu-link -->
        <ul class="br-menu-sub nav flex-column">
            <li class="nav-item"><a href="{{ route('realestatecategory.index') }}" class="nav-link">فئات العقارات</a></li>
            <li class="nav-item"><a href="{{ route('realestatecategory.create') }}" class="nav-link">اضافه فئات العقارات</a></li>
            <li class="nav-item"><a href="{{ route('categoryfeilds.index') }}" class="nav-link">حقول اضافيه للفئات</a></li>
            <li class="nav-item"><a href="{{ route('districts.index') }}" class="nav-link">مناطق الفئات</a></li>
        </ul>
        @endif
        <a href="#" class="br-menu-link @yield('realestates')">
            <div class="br-menu-item">
                <i class="menu-item-icon ion-ios-home tx-24"></i>
                <span class="menu-item-label">العقارات</span>
                <i class="menu-item-arrow fa fa-angle-down"></i>
            </div><!-- menu-item -->
        </a><!-- br-menu-link -->
        <ul class="br-menu-sub nav flex-column">
            <li class="nav-item"><a href="{{ route('realestates.index') }}" class="nav-link">العقارات</a></li>
            <li class="nav-item"><a href="{{ route('realestates.create') }}" class="nav-link">اضافه عقار</a></li>
        </ul>


        <a href="#" class="br-menu-link @yield('project')">
            <div class="br-menu-item">
                <i class="menu-item-icon ion-star tx-24"></i>
                <span class="menu-item-label">المشاريع</span>
                <i class="menu-item-arrow fa fa-angle-down"></i>
            </div><!-- menu-item -->
        </a><!-- br-menu-link -->
        <ul class="br-menu-sub nav flex-column">
            <li class="nav-item"><a href="{{route('project.index')}}" class="br-menu-link ">المشاريع</a></li>
            <li class="nav-item"><a href="{{route('projectcategory.index')}}" class="br-menu-link ">فئات المشاريع</a></li>
        </ul>



        <a href="{{route('new.index')}}" class="br-menu-link @yield('new')">
            <div class="br-menu-item">
                <i class="menu-item-icon icon ion-bookmark  tx-22"></i>
                <span class="menu-item-label">الاخبار العقاريه</span>
            </div><!-- menu-item -->
        </a><!-- br-menu-link -->


        <a href="{{route('advice.index')}}" class="br-menu-link @yield('advice')">
            <div class="br-menu-item">
                <i class="menu-item-icon icon ion-flag  tx-22"></i>
                <span class="menu-item-label">النصائح العقاريه</span>
            </div><!-- menu-item -->
        </a><!-- br-menu-link -->
        @if (auth()->user()->superadmin == 1)
        <a href="{{route('aboutus.index')}}" class="br-menu-link @yield('aboutus')">
            <div class="br-menu-item">
                <i class="menu-item-icon icon ion-settings  tx-22"></i>
                <span class="menu-item-label">عن الشركه</span>
            </div><!-- menu-item -->
        </a><!-- br-menu-link -->

        <a href="{{route('mainsettings.index')}}" class="br-menu-link @yield('mainsettings')">
            <div class="br-menu-item">
                <i class="menu-item-icon icon ion-gear-a  tx-22"></i>
                <span class="menu-item-label">الاعدادات العامه</span>
            </div><!-- menu-item -->
        </a><!-- br-menu-link -->



        <a href="{{route('contactus.index')}}" class="br-menu-link @yield('contactus')">
            <div class="br-menu-item">
                <i class="menu-item-icon icon ion-email  tx-22"></i>
                <span class="menu-item-label">تواصل معنا </span>
            </div><!-- menu-item -->
        </a><!-- br-menu-link -->


        <a href="#" class="br-menu-link @yield('recyclebin')">
            <div class="br-menu-item">
                <i class="menu-item-icon ion-ios-home tx-24"></i>
                <span class="menu-item-label">محذوفات</span>
                <i class="menu-item-arrow fa fa-angle-down"></i>
            </div><!-- menu-item -->
        </a><!-- br-menu-link -->
        <ul class="br-menu-sub nav flex-column">
            <li class="nav-item"><a href="{{ route('recyclebin.show','Realestate') }}" class="nav-link">العقارات</a></li>
            <li class="nav-item"><a href="{{ route('recyclebin.show','Aboutus') }}" class="nav-link">عن الشركه</a></li>
            <li class="nav-item"><a href="{{ route('recyclebin.show','Advice') }}" class="nav-link">نصائح</a></li>
            <li class="nav-item"><a href="{{ route('recyclebin.show','News') }}" class="nav-link">الاخبار</a></li>
            <li class="nav-item"><a href="{{ route('recyclebin.show','Project') }}" class="nav-link">المشروعات</a></li>
            <li class="nav-item"><a href="{{ route('recyclebin.show','Slider') }}" class="nav-link">صور العرض</a></li>
        </ul>

        <a href="{{route('admins.index')}}" class="br-menu-link @yield('admins')">
            <div class="br-menu-item">
                <i class="menu-item-icon icon ion-images  tx-22"></i>
                <span class="menu-item-label">المديرين</span>
            </div><!-- menu-item -->
        </a><!-- br-menu-link -->
        @endif




    </div><!-- br-sideleft-menu -->

    <br>
</div><!-- br-sideleft -->
<!-- ########## END: LEFT PANEL ########## -->