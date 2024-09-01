<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Desa Wisata</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Font Awesome icons (free version)-->
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="css/styles.css" rel="stylesheet" />
</head>

<body id="page-top">
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg bg-primary text-uppercase fixed-top" id="mainNav">
        <div class="container">
            <a class="navbar-brand" href="#page-top">
                <img src="assets/img/logo/logo-sawahan.png"  height="100%" width="50%">
            </a>
            <button class="navbar-toggler text-uppercase font-weight-bold bg-primary text-white rounded" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                Menu
                <i class="fas fa-bars"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded" href="#home">Home</a></li>
                    <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded" href="#aboutus">About us</a></li>
                    <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded" href="#gallery">Our gallery</a></li>
                    <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded" href="#service">Service</a></li>
                    <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded" href="#contactus">Contact Us</a></li>
                </ul>
            </div>
        </div>
    </nav>


<!-- Home -->
@if($homes->isNotEmpty())
    @foreach($homes as $home)
    <section class="masthead text-center" id="home" style="background-image: url('{{ asset('storage/' . $home->img) }}');" >
        <div class="container d-flex align-items-center flex-column">
                <h1 class="masthead-heading text-uppercase text-white mb-0">{{ $home->title }}</h1>
                <p class="masthead-subheading font-weight-light text-white mb-0">{{ $home->subtitle }}</p>
            </div>
        </section>
    @endforeach
@endif


    <!-- About Us Section-->
    <section class="about mt-5" id="aboutus">
        <div class="container d-flex align-items-center flex-column">
            <h3 class="page-section-heading text-center text-uppercase text-black contact-heading">About us</h3>
        @if(!empty($abouts))
            @foreach($abouts as $about)
            <div class="row justify-content-center align-items-center mt-4">
                <div class="col 6">
                    <h3>{{ $about->title }}</h3>
                </div>
                <div class="col-6">
                    <p>{{ $about->subtitle }}</p>
                </div>
            </div>
        @endforeach
        @else
            <p>No services available at the moment.</p>
        @endif
        <h1 class="mt-4 ">Pencapaian Pembangunan Berkelanjutan</h1>
        <div class="row justify-content-center align-items-center mt-5">
            <div class="col-2">
                <img src="assets/img/sdgs/1.svg" alt="">
            </div>
            <div class="col-2">
                <img src="assets/img/sdgs/2.svg" alt="">
            </div>
            <div class="col-2">
                <img src="assets/img/sdgs/3.svg" alt="">
            </div>
            <div class="col-2">
                <img src="assets/img/sdgs/4.svg" alt="">
            </div>
            <div class="col-2">
                <img src="assets/img/sdgs/5.svg" alt="">
            </div>
            <div class="col-2">
                <img src="assets/img/sdgs/6.svg" alt="">
            </div>
        </div>
    </section>

    <!-- Our gallery Section -->
<section class="gallery mt-5" id="gallery">
    <div class="container d-flex align-items-center flex-column">
        <h3 class="page-section-heading text-center text-uppercase text-black contact-heading">Our gallery</h3>
        <div class="gallery-slider mt-4">
            @if(!empty($gallerys))
                <div class="gallery-wrapper">
                    @foreach($gallerys as $gallery)
                        <div class="gallery-item">
                            <img src="{{ asset('storage/' . $gallery->img) }}" alt="Gallery Image">
                        </div>
                    @endforeach
                </div>
            @else
                <p>No gallery items available at the moment.</p>
            @endif
        </div>
    </div>
</section>




<!-- Service Section-->
<section class="servis mt-5" id="service">
    <div class="container d-flex align-items-center flex-column">
        <h3 class="page-section-heading text-center text-uppercase text-black contact-heading">Service</h3>
        <div class="slider-container">
            <button class="prev-btn">‹</button>
            <div class="slider-wrapper">
                <div class="slider">
                    @if(!empty($serviss))
                        @foreach($serviss as $servis)
                            <div class="slider-item">
                                <div class="card h-100 text-center">
                                    <img src="{{ asset('storage/' . $servis->img) }}" class="card-img-top">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $servis->title }}</h5>
                                        <p class="card-text">{{ $servis->subtitle }}</p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <p>No services available at the moment.</p>
                    @endif
                </div>
            </div>
            <button class="next-btn">›</button>
        </div>
    </div>
</section>




    <!-- Contact Us Section-->
    <section class="page-section text-black mb-0" id="contactus">
        <div class="container d-flex align-items-center flex-column">
            <h3 class="page-section-heading text-center text-uppercase text-black contact-heading">CONTACT US</h3>
            <div class="row justify-content-center align-items-center mt-4">
                <div class="text-center">
                    <p class="custom-font-size">Kami senang mendengar dari Anda! Jika Anda memiliki pertanyaan, membutuhkan informasi lebih lanjut, atau ingin melakukan reservasi, silakan hubungi kami melalui salah satu cara berikut:</p>
                </div>
                <div class="col-12 d-flex justify-content-center mt-4">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d376.02461248728076!2d110.43951854207349!3d-7.710768991175097!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7a5b006b2818b3%3A0x4d2e053af56fa13e!2sBULAK%20SAWAH!5e1!3m2!1sid!2sid!4v1722841034211!5m2!1sid!2sid" width="680" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
        </div>
    </section>


    <!-- Copyright Section-->
<div class="copyright py-4 text-left text-white">
    <div class="container">
        <div class="row justify-content-between align-items-center">
            <div class="col-md-6 text-left">
                <medium>Copyright &copy; 2024 Created and Developed by KKN UNY</medium>
            </div>
            <div class="col-md-6 text-md-right text-left">
                <div class="d-flex justify-content-end">
                    <a class="btn btn-outline-light btn-social mx-1" href="#!"><i class="fab fa-fw fa-youtube"></i></a>
                    <a class="btn btn-outline-light btn-social mx-1" href="#!"><i class="fab fa-fw fa-instagram"></i></a>
                    <a class="btn btn-outline-light btn-social mx-1" href="#!"><i class="fab fa-fw fa-twitter"></i></a>
                    <a class="btn btn-outline-light btn-social mx-1" href="#!"><i class="fab fa-fw fa-facebook-f"></i></a>
                </div>
            </div>
        </div>
    </div>
</div>



    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="js/scripts.js"></script>

    <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
    <!-- * *                               SB Forms JS                               * *-->
    <!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
    <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
    <!-- <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script> -->

</body>
</html>
