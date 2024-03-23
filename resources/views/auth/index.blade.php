<!DOCTYPE html>
<html lang="en" dir="ltr" data-nav-layout="vertical" data-theme-mode="light" data-header-styles="light" data-menu-styles="light" data-toggled="close">

@include("component.head")

<body>

@include("component.switcher")
@include("component.loader")

<div class="container-fluid custom-page">
    <div class="row bg-white">
        <!-- The image half -->
        <div class="col-md-6 col-lg-6 col-xl-7 d-none d-md-flex bg-primary-transparent-3">
            <div class="row w-100 mx-auto text-center">
                <div class="col-md-12 col-lg-12 col-xl-12 my-auto mx-auto w-100">
                    <img src="../assets/images/media/pngs/5.png"
                         class="my-auto ht-xl-80p wd-md-100p wd-xl-80p mx-auto" alt="logo">
                </div>
            </div>
        </div>
        <!-- The content half -->
        <div class="col-md-6 col-lg-6 col-xl-5 bg-white py-4">
            <div class="login d-flex align-items-center py-2">
                <!-- Demo content-->
                <div class="container p-0">
                    <div class="row">
                        <div class="col-md-10 col-lg-10 col-xl-9 mx-auto">

                            <div class="card-sigin">
                                <div class="mb-5 d-flex">
                                    <a href="index.html" class="header-logo"><img src="../assets/images/brand-logos/desktop-logo.png"
                                                                                  class="desktop-logo ht-40" alt="logo">
                                        <img src="../assets/images/brand-logos/desktop-white.png"
                                             class="desktop-white ht-40" alt="logo">
                                    </a>
                                </div>
                                <div class="card-sigin">

                                    <div class="main-signup-header p-5">
                                        <h3>Selamat Datang di Lasiades !</h3>
                                        <h6 class="fw-medium mb-4 fs-17">Harap Login Untuk Menggunakan Layanan.</h6>
                                        @if($status !== null)
                                        <div class="alert alert-solid-{{ ($status['status']) ? 'success' : 'danger' }} fade show">
                                            {{$status['msg']}}
                                        </div>
                                        @endif

                                        <form method="post" action="./auth">
                                            @csrf
                                            <div class="form-group">
                                                <label class="form-label">Email</label>
                                                <input class="form-control" name="email" placeholder="Enter your email" type="text">
                                            </div>
                                            <div class="form-group mb-3">
                                                <label class="form-label">Password</label>
                                                <input class="form-control" name="password" placeholder="Enter your password" type="password">

                                            </div>
                                            <button type="submit" class="btn btn-primary btn-block w-100">Masuk</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- End -->
            </div>
        </div><!-- End -->
    </div>
</div>


<!-- Scroll To Top -->
<div class="scrollToTop">
    <span class="arrow"><i class="las la-angle-double-up"></i></span>
</div>
<div id="responsive-overlay"></div>
<!-- Scroll To Top -->

<script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>

<!-- Bootstrap JS -->
<script src="/assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Show Password JS -->
<script src="/assets/js/show-password.js"></script>

</body>

</html>
