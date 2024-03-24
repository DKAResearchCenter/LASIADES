<!-- Start::main-sidebar -->
<div class="main-sidebar" id="sidebar-scroll">

    <!-- Start::nav -->
    <nav class="main-menu-container nav nav-pills flex-column sub-open">
        <div class="slide-left" id="slide-left">
            <svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191" width="24" height="24" viewBox="0 0 24 24"> <path d="M13.293 6.293 7.586 12l5.707 5.707 1.414-1.414L10.414 12l4.293-4.293z"></path> </svg>
        </div>
        <ul class="main-menu">

            <!-- Start::slide__category -->
            <li class="slide__category"><span class="category-name">Utama</span></li>
            <!-- End::slide__category -->
            <!-- Start::slide -->
            <li class="slide">
                <a href="/" class="side-menu__item {{ (request()->is('/')) ? 'active' : '' }}">
                    <svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" viewBox="0 0 24 24"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M19 5H5v14h14V5zM9 17H7v-7h2v7zm4 0h-2V7h2v10zm4 0h-2v-4h2v4z" opacity=".3"/><path d="M3 5v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2H5c-1.1 0-2 .9-2 2zm2 0h14v14H5V5zm2 5h2v7H7zm4-3h2v10h-2zm4 6h2v4h-2z"/></svg>
                    <span class="side-menu__label">Ringkasan</span>
                </a>
            </li>
            <!-- End::slide -->

            <!-- Start::slide__category -->
            <li class="slide__category"><span class="category-name">Layanan</span></li>
            <!-- End::slide__category -->

            <!-- Start::slide -->
            <li class="slide has-sub {{ (request()->is('e-arsip/*')) ? 'open' : '' }}">
                <a href="javascript:void(0);" class="side-menu__item">
                    <svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" viewBox="0 0 24 24" ><path d="M0 0h24v24H0V0z" fill="none"/><path d="M5 9h14V5H5v4zm2-3.5c.83 0 1.5.67 1.5 1.5S7.83 8.5 7 8.5 5.5 7.83 5.5 7 6.17 5.5 7 5.5zM5 19h14v-4H5v4zm2-3.5c.83 0 1.5.67 1.5 1.5s-.67 1.5-1.5 1.5-1.5-.67-1.5-1.5.67-1.5 1.5-1.5z" opacity=".3"/><path d="M20 13H4c-.55 0-1 .45-1 1v6c0 .55.45 1 1 1h16c.55 0 1-.45 1-1v-6c0-.55-.45-1-1-1zm-1 6H5v-4h14v4zm-12-.5c.83 0 1.5-.67 1.5-1.5s-.67-1.5-1.5-1.5-1.5.67-1.5 1.5.67 1.5 1.5 1.5zM20 3H4c-.55 0-1 .45-1 1v6c0 .55.45 1 1 1h16c.55 0 1-.45 1-1V4c0-.55-.45-1-1-1zm-1 6H5V5h14v4zM7 8.5c.83 0 1.5-.67 1.5-1.5S7.83 5.5 7 5.5 5.5 6.17 5.5 7 6.17 8.5 7 8.5z"/></svg>
                    <span class="side-menu__label">E-Arsip</span>
                    <i class="fe fe-chevron-right side-menu__angle"></i>
                </a>
                <ul class="slide-menu child1">
                    <li class="slide side-menu__label1">
                        <a href="javascript:void(0);">E-Arsip</a>
                    </li>
                    <li class="slide">
                        <a href="/e-arsip/tidak-mampu" class="side-menu__item {{ (request()->is('e-arsip/tidak-mampu')) ? 'active' : '' }}">Tidak Mampu</a>
                    </li>
                    <li class="slide">
                        <a href="/e-arsip/domisili" class="side-menu__item {{ (request()->is('e-arsip/domisili')) ? 'active' : '' }}{{ (request()->is('e-arsip/domisili/*')) ? 'active' : '' }}">Domisili</a>
                    </li>
                    <li class="slide">
                        <a href="/e-arsip/usaha" class="side-menu__item {{ (request()->is('e-arsip/usaha')) ? 'active' : '' }}">Usaha</a>
                    </li>
                </ul>
            </li>
            <!-- End::slide -->

            <!-- Start::slide__category -->
            <li class="slide__category"><span class="category-name">Pengaturan</span></li>
            <!-- End::slide__category -->

            <!-- Start::slide -->
            <li class="slide has-sub {{ (request()->is('system/*')) ? 'open' : '' }}">
                <a href="javascript:void(0);" class="side-menu__item">
                    <svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" viewBox="0 0 24 24" ><path d="M0 0h24v24H0V0z" fill="none"/><path d="M5 9h14V5H5v4zm2-3.5c.83 0 1.5.67 1.5 1.5S7.83 8.5 7 8.5 5.5 7.83 5.5 7 6.17 5.5 7 5.5zM5 19h14v-4H5v4zm2-3.5c.83 0 1.5.67 1.5 1.5s-.67 1.5-1.5 1.5-1.5-.67-1.5-1.5.67-1.5 1.5-1.5z" opacity=".3"/><path d="M20 13H4c-.55 0-1 .45-1 1v6c0 .55.45 1 1 1h16c.55 0 1-.45 1-1v-6c0-.55-.45-1-1-1zm-1 6H5v-4h14v4zm-12-.5c.83 0 1.5-.67 1.5-1.5s-.67-1.5-1.5-1.5-1.5.67-1.5 1.5.67 1.5 1.5 1.5zM20 3H4c-.55 0-1 .45-1 1v6c0 .55.45 1 1 1h16c.55 0 1-.45 1-1V4c0-.55-.45-1-1-1zm-1 6H5V5h14v4zM7 8.5c.83 0 1.5-.67 1.5-1.5S7.83 5.5 7 5.5 5.5 6.17 5.5 7 6.17 8.5 7 8.5z"/></svg>
                    <span class="side-menu__label">System</span>
                    <i class="fe fe-chevron-right side-menu__angle"></i>
                </a>
                <ul class="slide-menu child1">
                    <li class="slide side-menu__label1">
                        <a href="javascript:void(0);">System</a>
                    </li>
                    <!--<li class="slide">
                        <a href="/system/dusun" class="side-menu__item {{ (request()->is('system/dusun')) ? 'active' : '' }}">Managemen Dusun</a>
                    </li>-->
                    <li class="slide">
                        <a href="/system/account" class="side-menu__item {{ (request()->is('system/account')) ? 'active' : '' }} {{ (request()->is('system/account/*')) ? 'active' : '' }}">Managemen Akun</a>
                    </li>
                </ul>
            </li>
            <!-- End::slide -->
        </ul>
        <div class="slide-right" id="slide-right"><svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191" width="24" height="24" viewBox="0 0 24 24"> <path d="M10.707 17.707 16.414 12l-5.707-5.707-1.414 1.414L13.586 12l-4.293 4.293z"></path> </svg></div>
    </nav>
    <!-- End::nav -->

</div>
<!-- End::main-sidebar -->
