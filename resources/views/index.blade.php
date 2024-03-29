<!DOCTYPE html>
<html lang="en" dir="ltr" data-nav-layout="vertical" data-theme-mode="light" data-header-styles="light" data-menu-styles="light" data-toggled="close">

@include("component.head");

<body>

@include("component.switcher");
@include("component.loader");


<div class="page">
    <!-- app-header -->
    @include("component.header");
    <!-- /app-header -->

    <!-- Start::app-sidebar -->
    <aside class="app-sidebar sticky" id="sidebar">

        <!-- Start::main-sidebar-header -->
        <div class="main-sidebar-header">
            <a href="index.html" class="header-logo">
                <img src="/assets/images/brand-logos/desktop-logo.png" alt="logo" class="desktop-logo">
                <img src="/assets/images/brand-logos/toggle-logo.png" alt="logo" class="toggle-logo">
                <img src="/assets/images/brand-logos/desktop-white.png" alt="logo" class="desktop-white">
                <img src="/assets/images/brand-logos/toggle-white.png" alt="logo" class="toggle-white">
            </a>
        </div>
        <!-- End::main-sidebar-header -->

        <!-- Start::main-sidebar -->
        @include("component.menu");
        <!-- End::main-sidebar -->

    </aside>
    <!-- End::app-sidebar -->

    <!-- Start::app-content -->
    <div class="main-content app-content">
        <div class="container-fluid">
            <!-- Page Header -->

            <div class="d-md-flex d-block align-items-center justify-content-between my-4 page-header-breadcrumb">
                <div>
                    <h4 class="mb-0">Halo, {{ $session->name }}</h4>
                    <p class="mb-0 text-muted">Monitoring Smart Desa Minanga.</p>
                </div>
            </div>
            <!-- End Page Header -->

            <!-- row -->
            <div class="row">
                <div class="col-xl-3 col-lg-3 col-md-3 col-xm-3 col-sm-6 col-6">
                    <div class="card overflow-hidden sales-card bg-primary-gradient">
                        <div class="px-3 pt-3  pb-2 pt-0">
                            <div >
                                <h6 class="mb-3 fs-12 text-fixed-white">Surat Keterangan <br/> Tidak Mampu</h6>
                            </div>
                            <div class="pb-0 mt-0">
                                <div class="d-flex">
                                    <div >
                                        <h4 class="fs-20 fw-bold mb-1 text-fixed-white">{{ $tidakmampu->count() }}</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="compositeline"></div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-3 col-xm-3 col-sm-6 col-6">
                    <div class="card overflow-hidden sales-card bg-danger-gradient">
                        <div class="px-3 pt-3  pb-2 pt-0">
                            <div >
                                <h6 class="mb-3 fs-12 text-fixed-white">Surat Keterangan <br/> Usaha</h6>
                            </div>
                            <div class="pb-0 mt-0">
                                <div class="d-flex">
                                    <div >
                                        <h4 class="fs-20 fw-bold mb-1 text-fixed-white">{{ $usaha->count() }}</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="compositeline2"></div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-3 col-xm-3 col-sm-6 col-6">
                    <div class="card overflow-hidden sales-card bg-success-gradient">
                        <div class="px-3 pt-3  pb-2 pt-0">
                            <div >
                                <h6 class="mb-3 fs-12 text-fixed-white">Surat Keterangan <br/> Pindah Domisili</h6>
                            </div>
                            <div class="pb-0 mt-0">
                                <div class="d-flex">
                                    <div >
                                        <h4 class="fs-20 fw-bold mb-1 text-fixed-white">{{ $domisili->count() }}</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="compositeline3"></div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-3 col-xm-3 col-sm-6 col-6">
                    <div class="card overflow-hidden sales-card bg-primary-gradient">
                        <div class="px-3 pt-3  pb-2 pt-0">
                            <div >
                                <h6 class="mb-3 fs-12 text-fixed-white">Total Surat <br/>Masuk / Keluar</h6>
                            </div>
                            <div class="pb-0 mt-0">
                                <div class="d-flex">
                                    <div >
                                        <h4 class="fs-20 fw-bold mb-1 text-fixed-white">{{ $usaha->count() + $domisili->count() + $tidakmampu->count()}}</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="compositeline4"></div>
                    </div>
                </div>
            </div>
            <!-- row closed -->

            <!-- row opened -->
            <div class="row">
                <div class="col-md-12 col-lg-12 col-xl-7">
                    <div class="card">
                        <div class="card-header pb-0">
                            <div class="d-flex justify-content-between">
                                <h4 class="card-title mb-0">Pantau Progress Pengurusan</h4>
                                <a href="javascript:void(0);" class="btn btn-icon btn-sm btn-light bg-transparent rounded-pill" data-bs-toggle="dropdown"><i
                                        class="fe fe-more-horizontal"></i></a>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="javascript:void(0);">Action</a>
                                    <a class="dropdown-item" href="javascript:void(0);">Another
                                        Action</a>
                                    <a class="dropdown-item" href="javascript:void(0);">Something Else
                                        Here</a>
                                </div>
                            </div>
                            <p class="fs-12 text-muted mb-0">Statistik Surat masuk Dan Keluar Pantau Disini</p>
                        </div>
                        <div class="card-body">
                            <div class="total-revenue">
                                <div>
                                    <h4>{{ $usaha->where("status","=","SELESAI")->count() + $domisili->where("status","=","SELESAI")->count() + $tidakmampu->where("status","=","SELESAI")->count()}}</h4>
                                    <label><span class="bg-primary"></span>success</label>
                                </div>
                                <div>
                                    <h4>{{ $usaha->where("status","=","DIPROSES")->count() + $domisili->where("status","=","DIPROSES")->count() + $tidakmampu->where("status","=","DIPROSES")->count()}}</h4>
                                    <label><span class="bg-danger"></span>Pending</label>
                                </div>
                                <div>
                                    <h4>{{ $usaha->where("status","=","BELUM DIPROSES")->count() + $domisili->where("status","=","BELUM DIPROSES")->count() + $tidakmampu->where("status","=","BELUM DIPROSES")->count()}}</h4>
                                    <label><span class="bg-warning"></span>Belum Diproses</label>
                                </div>
                            </div>
                            <div id="Sales-bar" class="sales-bar mt-4"></div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 col-lg-12 col-xl-5">
                    <div class="card">
                        <div class="card-header pb-1">
                            <h3 class="card-title mb-2">Aktifitas Kepegawaian</h3>
                            <p class="fs-12 mb-0 text-muted">Tracking Kemajuan Sistem Pengurusan</p>
                        </div>
                        <div class="product-timeline card-body pt-2 mt-1">
                            <ul class="timeline-1 mb-0">
                                <li class="mt-0"> <i class="fe fe-pie-chart bg-primary-gradient text-fixed-white product-icon"></i> <span class="fw-medium mb-4 fs-14">Belum Selesai</span> <a href="javascript:void(0);" class="float-end fs-11 text-muted">3 days ago</a>
                                    <p class="mb-0 text-muted fs-12">0</p>
                                </li>
                                <li class="mt-0"> <i class="fe fe-shopping-cart bg-danger-gradient text-fixed-white product-icon"></i> <span class="fw-medium mb-4 fs-14">Progress</span> <a href="javascript:void(0);" class="float-end fs-11 text-muted">35 mins ago</a>
                                    <p class="mb-0 text-muted fs-12">0</p>
                                </li>
                                <li class="mt-0"> <i class="fe fe-bar-chart bg-success-gradient text-fixed-white product-icon"></i> <span class="fw-medium mb-4 fs-14">Gagal</span> <a href="javascript:void(0);" class="float-end fs-11 text-muted">50 mins ago</a>
                                    <p class="mb-0 text-muted fs-12">0</p>
                                </li>
                                <li class="mt-0"> <i class="fe fe-box bg-warning-gradient text-fixed-white product-icon"></i> <span class="fw-medium mb-4 fs-14">Selesai</span> <a href="javascript:void(0);" class="float-end fs-11 text-muted">1 hour ago</a>
                                    <p class="mb-0 text-muted fs-12">0</p>
                                </li>
                                <li class="mt-0"> <i class="fe fe-eye bg-purple-gradient text-fixed-white product-icon"></i> <span class="fw-medium mb-4 fs-14">Ditolak</span> <a href="javascript:void(0);" class="float-end fs-11 text-muted">1 day ago</a>
                                    <p class="mb-0 text-muted fs-12">0</p>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- row closed -->

        </div>
    </div>
    <!-- End::app-content -->

    <!-- Footer Start -->
    @include("component.footer");
    <!-- Footer End -->

</div>


<!-- Scroll To Top -->
<div class="scrollToTop">
    <span class="arrow"><i class="las la-angle-double-up"></i></span>
</div>
<div id="responsive-overlay"></div>
<!-- Scroll To Top -->

<!-- Popper JS -->
<script src="/assets/libs/@popperjs/core/umd/popper.min.js"></script>

<!-- Bootstrap JS -->
<script src="/assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Defaultmenu JS -->
<script src="/assets/js/defaultmenu.min.js"></script>

<!-- Node Waves JS-->
<script src="/assets/libs/node-waves/waves.min.js"></script>

<!-- Sticky JS -->
<script src="/assets/js/sticky.js"></script>

<!-- Simplebar JS -->
<script src="/assets/libs/simplebar/simplebar.min.js"></script>
<script src="/assets/js/simplebar.js"></script>

<!-- Color Picker JS -->
<script src="/assets/libs/@simonwep/pickr/pickr.es5.min.js"></script>


<!-- Apex Charts JS -->
<script src="/assets/libs/apexcharts/apexcharts.min.js"></script>

<!-- JSVector Maps JS -->
<script src="/assets/libs/jsvectormap/js/jsvectormap.min.js"></script>

<!-- JSVector Maps MapsJS -->
<script src="/assets/libs/jsvectormap/maps/world-merc.js"></script>
<script src="/assets/js/us-merc-en.js"></script>

<!-- Chartjs Chart JS -->
<script src="/assets/js/index.js"></script>


<!-- Custom-Switcher JS -->
<script src="/assets/js/custom-switcher.min.js"></script>
<!-- Custom JS -->
<script src="/assets/js/custom.js"></script>

</body>

</html>
