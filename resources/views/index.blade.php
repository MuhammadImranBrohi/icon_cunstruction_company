<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>ICON Building CONSTRUCTION COMPANY</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400..900;1,400..900&family=Roboto:wght@400;500;700&display=swap"
        rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/lightbox/css/lightbox.min.css" rel="stylesheet">


    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body>

    <!-- Spinner Start -->
    <div id="spinner"
        class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
    <!-- Spinner End -->

    <!-- Topbar Start -->
    <div class="container-fluid topbar d-none d-xl-block w-100">
        <div class="row gx-0 align-items-center" style="height: 45px;">
            <div class="col-lg-6 text-center text-lg-start mb-lg-0">
                <div class="d-flex flex-wrap">
                    <a href="#" class="text-white disabled  me-4"><i
                            class="text-secondary fas  fa-map-marker-alt fw-bolder  me-2"></i>Find A Location</a>
                    <a href="#" class="text-white disabled  me-4"><i
                            class="text-secondary fas  fa-phone-alt fw-bolder  me-2"></i>+01234567890</a>
                    <a href="#" class="text-white disabled  me-0"><i
                            class="text-secondary fas  fa-envelope fw-bolder  me-2"></i>Icon@gmail.com</a>
                </div>
            </div>
            <div class="col-lg-6 text-center text-lg-end">
                <div class="d-flex align-items-center justify-content-end">
                    <a href="#" class=" text-white  me-3"><i class="fas fa-clock text-white me-2"></i>Mon - Sat
                        8:00 - 17:30, Sunday - CLOSED</a>
                    <a href="#" class="btn btn-primary rounded-circle  border border-white me-3"><i
                            class="fab fa-facebook-f"></i></a>
                    <a href="#" class="btn btn-primary rounded-circle  border border-white me-3"><i
                            class="fab fa-twitter"></i></a>
                    <a href="#" class="btn btn-primary rounded-circle  border border-white me-3"><i
                            class="fab fa-instagram"></i></a>
                    <a href="#" class="btn btn-primary rounded-circle  border border-white me-3"><i
                            class="fab fa-linkedin-in"></i></a>
                </div>
            </div>
        </div>
    </div>
    <!-- Topbar End -->

    <!-- Navbar & Hero Start -->
    <div class="container-fluid sticky-top px-0">
        <nav class="navbar navbar-expand-lg navbar-dark bg-light py-3 px-4">
            <a href="index" class="navbar-brand p-0">
                <h1 class="text-secondary display-6"><i class="fas fa-city text-primary me-3"></i>icon</h1>
                <!-- <img src="img/logo.png" alt="Logo"> -->
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="fa fa-bars"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav ms-auto pt-2 pt-lg-0">
                    <a href="/index" class="nav-item nav-link active">Home</a>
                    <a href="/about" class="nav-item nav-link">About</a>
                    <a href="/service" class="nav-item nav-link">Services</a>
                    <a href="{{ url('/register') }}" class="nav-item nav-link">
                        Register
                    </a>

                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle text-dark" data-bs-toggle="dropdown">Pages</a>
                        <div class="dropdown-menu m-lg-0 opacity-75">
                            <a href="/feature" class="dropdown-item rounded-pill opacity-100">Our Features</a>
                            <a href="/blog" class="dropdown-item rounded-pill opacity-100">Our Blog</a>
                            <a href="/team" class="dropdown-item rounded-pill opacity-100">Our Team</a>
                            <a href="/project" class=" dropdown-item rounded-pill opacity-100 ">Projects</a>
                            <a href="/testimonial" class="dropdown-item rounded-pill opacity-100">Testimonial</a>
                        </div>
                    </div>
                    {{-- <a href="404" class="dropdown-item rounded-pill opacity-100" >404 Page</a> --}}
                    <a href="/contact" class="nav-item nav-link">Contact</a>
                </div>
            </div>
        </nav>
    </div>
    <!-- Navbar & Hero End -->

    <!-- Modal Search Start -->
    <div class="modal fade bg-dark" id="searchModal" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog bg-dark modal-fullscreen">
            <div class="modal-content rounded-0">
                <div class="modal-header">
                    <h4 class="modal-title text-white mb-0" id="exampleModalLabel">Search by keyword</h4>
                    <button type="button" class="btn-close " data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body d-flex align-items-center">
                    <div class="input-group w-75 mx-auto d-flex">
                        <input type="search" class="form-control rounded-pill p-3" placeholder="keywords"
                            aria-describedby="search-icon-1">
                        <span id="search-icon-1" class="input-group-text rounded-circle p-3"><i
                                class="fa fa-search"></i></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal Search End -->

    <!-- Carousel Start -->
    <div class="container-fluid overflow-hidden px-0">
        <div id="carouselId" class="carousel slide" data-bs-ride="carousel">
            <ol class="carousel-indicators fadeInUp animate__animated" data-animation="fadeInUp" data-delay="1s"
                style="animation-delay: 1s;">
                <li data-bs-target="#carouselId" data-bs-slide-to="0" class="active" aria-current="true"
                    aria-label="First slide"></li>
                <li data-bs-target="#carouselId" data-bs-slide-to="1" aria-label="Second slide"></li>
                <li data-bs-target="#carouselId" data-bs-slide-to="2" aria-label="Third slide"></li>
            </ol>
            <div class="carousel-inner" role="listbox">
                <div class="carousel-item active">
                    <img src="img/carousel-1.jpg" class="img-fluid w-100" alt="First slide" />
                    <div class="carousel-caption">
                        <p class="text-uppercase text-secondary fs-4 mb-0 fadeInUp animate__animated"
                            data-animation="fadeInUp" data-delay="1s" style="animation-delay: 1s;">Construction
                            Business</p>
                        <h1 class="display-1 text-capitalize text-white mb-4 fadeInUp animate__animated"
                            data-animation="fadeInUp" data-delay="1.3s" style="animation-delay: 1.3s;">We build
                            somethings new and consistent.</h1>
                        <p class="mb-5 fadeInUp animate__animated" data-animation="fadeInUp" data-delay="1.5s"
                            style="animation-delay: 1.5s;">Lorem Ipsum is simply dummy text of the printing and
                            typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the
                            1500s,
                        </p>
                        <div class="d-flex justify-content-center">
                            <a class="btn btn-primary d-flex py-3 px-5 rounded-pill me-2 flex-shrink-0 fadeInUp animate__animated"
                                data-animation="fadeInUp" data-delay="1.5s" style="animation-delay: 1.7s;"
                                href="#">Apply Now</a>
                            <a class="btn btn-secondary d-inline-block rounded-pill py-3 px-5 ms-2 flex-shrink-0 fadeInUp animate__animated"
                                data-animation="fadeInUp" data-delay="1.5s" style="animation-delay: 1.7s;"
                                href="#">Read More</a>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="img/carousel-2.jpg" class="img-fluid w-100" alt="Second slide" />
                    <div class="carousel-caption">
                        <p class="text-uppercase text-secondary fs-4 mb-0 fadeInUp animate__animated"
                            data-animation="fadeInUp" data-delay="1s" style="animation-delay: 1s;">Construction
                            Business</p>
                        <h1 class="display-1 text-capitalize text-white mb-4 fadeInUp animate__animated"
                            data-animation="fadeInUp" data-delay="1.3s" style="animation-delay: 1.3s;">We build
                            somethings new and consistent.</h1>
                        <p class="mb-5 fs-5 fadeInUp animate__animated" data-animation="fadeInUp" data-delay="1.5s"
                            style="animation-delay: 1.5s;">Lorem Ipsum is simply dummy text of the printing and
                            typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the
                            1500s,
                        </p>
                        <div class="d-flex justify-content-center">
                            <a class="btn btn-primary d-flex py-3 px-5 rounded-pill me-2 flex-shrink-0 fadeInUp animate__animated"
                                data-animation="fadeInUp" data-delay="1.5s" style="animation-delay: 1.7s;"
                                href="#">Apply Now</a>
                            <a class="btn btn-secondary d-inline-block rounded-pill py-3 px-5 ms-2 flex-shrink-0 fadeInUp animate__animated"
                                data-animation="fadeInUp" data-delay="1.5s" style="animation-delay: 1.7s;"
                                href="#">Read More</a>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="img/carousel-3.jpg" class="img-fluid w-100" alt="Third slide" />
                    <div class="carousel-caption">
                        <p class="text-uppercase text-secondary fs-4 mb-0 fadeInUp animate__animated"
                            data-animation="fadeInUp" data-delay="1s" style="animation-delay: 1s;">Construction
                            Business</p>
                        <h1 class="display-1 text-capitalize text-white mb-4 fadeInUp animate__animated"
                            data-animation="fadeInUp" data-delay="1.3s" style="animation-delay: 1.3s;">We build
                            somethings new and consistent.</h1>
                        <p class="mb-5 fs-5 fadeInUp animate__animated" data-animation="fadeInUp" data-delay="1.5s"
                            style="animation-delay: 1.5s;">Lorem Ipsum is simply dummy text of the printing and
                            typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the
                            1500s,
                        </p>
                        <div class="d-flex justify-content-center">
                            <a class="btn btn-primary d-flex py-3 px-5 rounded-pill me-2 flex-shrink-0 fadeInUp animate__animated"
                                data-animation="fadeInUp" data-delay="1.5s" style="animation-delay: 1.7s;"
                                href="#">Apply Now</a>
                            <a class="btn btn-secondary d-inline-block rounded-pill py-3 px-5 ms-2 flex-shrink-0 fadeInUp animate__animated"
                                data-animation="fadeInUp" data-delay="1.5s" style="animation-delay: 1.7s;"
                                href="#">Read More</a>
                        </div>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselId" data-bs-slide="prev">
                <span class="carousel-control-prev-icon btn-lg-square fadeInLeft animate__animated" aria-hidden="true"
                    data-animation="fadeInLeft" data-delay="1.1s" style="animation-delay: 1.3s;"><i
                        class="fas fa-chevron-left fa-2x"></i></span>
                <span class="visually-hidden ">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselId" data-bs-slide="next">
                <span class="carousel-control-next-icon btn-lg-square fadeInRight animate__animated"
                    aria-hidden="true" data-animation="fadeInRight" data-delay="1.1s"
                    style="animation-delay: 1.3s;"><i class="fas fa-chevron-right fa-2x"></i></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
    <!-- Carousel End -->

    <!-- About Start -->
    <div class="container-fluid about py-5">
        <div class="container py-5">
            <div class="row g-5 align-items-center">
                <div class="col-xl-6 wow fadeInLeft" data-wow-delay="0.1s">
                    <div class="about-item-image d-flex">
                        <img src="img/about.jpg" class="img-1 img-fluid w-50" alt="">
                        <img src="img/about-3.jpg" class="img-2 img-fluid w-50" alt="">
                        <div class="about-item-image-content">
                            <img src="img/about-1.png" class="img-fluid w-100h style="border-radius: 0px;" -100"
                                style="object-fit: cover;" alt="">
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 wow fadeInRight" data-wow-delay="0.1s">
                    <div class="about-item-content">
                        <p class="text-uppercase text-secondary fs-5 mb-0">WE ARE CONSTRUCTION COMPANY</p>
                        <h2 class="display-4 text-capitalize mb-3">Making your vision come true with us.</h2>
                        <p class="mb-4 fs-5">Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                            Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
                        </p>
                        <div class="pb-4 mb-4 border-bottom">
                            <div class="row g-4">
                                <div class="col-lg-4">
                                    <div class="about-item-content-img">
                                        <img src="img/about-2.jpg" class="img-fluid w-100" alt="">
                                    </div>
                                </div>
                                <div class="col-lg-8">
                                    <div class="d-flex mb-4">
                                        <div class="text-secondary">
                                            <i class="fas fa-user-shield fa-3x"></i>
                                        </div>
                                        <h4 class="ms-3"> We Build Quality standards</h4>
                                    </div>
                                    <div class="d-flex">
                                        <div class="text-secondary">
                                            <i class="fas fa-users-cog fa-3x"></i>
                                        </div>
                                        <h4 class="ms-3"> We Have Certified engineer’s in our team</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row gy-0 gx-4 justify-content-between pb-4">
                            <div class="col-lg-6">
                                <p class="rounded-pill bg-dark text-white p-2 "><i
                                        class="fas fa-check text-secondary me-1"></i> 100% Satisfaction</p>
                                <p class="rounded-pill bg-dark text-white p-2 "><i
                                        class="fas fa-check text-secondary me-1"></i> Trained Emploies</p>
                            </div>
                            <div class="col-lg-6">
                                <p class="rounded-pill bg-dark text-white p-2 "><i
                                        class="fas fa-check text-secondary me-1"></i> Annual Pass Programs</p>
                                <p class="rounded-pill bg-dark text-white p-2  mb-0"><i
                                        class="fas fa-check text-secondary me-1"></i> Flexible and cost effective</p>
                            </div>
                        </div>
                        <a class="btn btn-secondary rounded-pill align-center d-inline-block py-3 px-5 me-2 flex-shrink-0 wow fadeInUp"
                            data-wow-delay="0.1s" href="#">Discover More</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->

    <!-- Features Start -->
    <div class="container-fluid bg-dark feature bg-light py-5">
        <div class="container py-5">
            <div class="text-center mx-auto pb-5 wow fadeInUp" data-wow-delay="0.2s" style="max-width: 800px;">
                <p class="text-uppercase text-secondary fs-5 mb-0">WHy US</p>
                <h2 class="display-4 text-secondary text-capitalize mb-3">Why Choose Us</h2>
            </div>
            <div class="row g-4">
                <div class="col-lg-4 wow fadeInUp" data-wow-delay="0.2s"style="animation-delay: 0.2s;">
                    <div class="feature-item text-center border p-5" style=" border-radius:30px;">
                        <div class="feature-img bg-secondary d-inline-flex p-4">
                            <i class="fas fa-city text-primary fa-5x  "></i>
                        </div>
                        <a href="#" class="h4 d-block my-4">Expert Engineer</a>
                        <p class="mb-0">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quod voluptatem
                            provident incidunt obcaecati.</p>
                    </div>
                </div>
                <div class="col-lg-4 wow fadeInUp" data-wow-delay="0.4s"style="animation-delay: 0.2s;">
                    <div class="feature-item text-center border p-5" style=" border-radius:30px;">
                        <div class="feature-img bg-secondary d-inline-flex p-4">
                            <i class="fas fa-funnel-dollar text-primary fa-5x  "></i>
                        </div>
                        <a href="#" class="h4 d-block my-4">Free Estimates</a>
                        <p class="mb-0">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quod voluptatem
                            provident incidunt obcaecati.</p>
                    </div>
                </div>
                <div class="col-lg-4 wow fadeInUp" data-wow-delay="0.6s"style="animation-delay: 0.2s;">
                    <div class="feature-item text-center border p-5" style=" border-radius:30px;">
                        <div class="feature-img bg-secondary d-inline-flex p-4">
                            <i class="fas fa-tools text-primary fa-5x  "></i>
                        </div>
                        <a href="#" class="h4 d-block my-4">Quality Materials</a>
                        <p class="mb-0">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quod voluptatem
                            provident incidunt obcaecati.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Features End -->


    <!-- Services Start -->
    <div class="container-fluid service bg-light pb-5 ">
        <div class="container pb-5">
            <div class="text-center mx-auto pb-5 wow fadeInUp" data-wow-delay="0.2s" style="max-width: 800px;">
                <p class="text-uppercase text-secondary fs-5 mb-0">Our Services</p>
                <h2 class="display-4 text-capitalize mb-3">our service is creative, & decent</h2>
            </div>
            <div class="row g-4">
                <div class="col-lg-4 wow fadeInUp" data-wow-delay="0.2s">
                    <div class="service-item">
                        <div class="service-img">
                            <img src="img/service-1.jpg" class="img-fluid w-100" style="border-radius:30px;"
                                alt="Image">
                        </div>
                        <div class="service-content text-center p-4">
                            <div class="bg-secondary btn-xl-square mx-auto" style="width: 120px; height: 120px;">
                                <i class="fas fa-home text-primary fa-4x"></i>
                            </div>
                            <a href="#" class="d-block fs-4 my-4  ">General Construction</a>
                            <p class="text-white mb-4">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                Mollitia, minima!</p>
                            <a class="btn btn-secondary py-2 px-4  btn-lg rounded-pill" href="#">Read More</a>
                        </div>
                        <div class="service-tytle rounded-pill">
                            <div class="d-flex  align-items-center ps-4 w-100">
                                <h4>General Construction</h4>
                            </div>
                            <div class="btn-xl rounded-circle  bg-secondary p-4" style="width: 80px; height: 80px;">
                                <i class="fas fa-home text-primary fa-2x"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 wow fadeInUp" data-wow-delay="0.4s">
                    <div class="service-item">
                        <div class="service-img">
                            <img src="img/service-2.jpg" class="img-fluid w-100" style="border-radius:30px;"
                                alt="Image">
                        </div>
                        <div class="service-content  text-center p-4">
                            <div class="bg-secondary btn-xl-square mx-auto" style="border-radius:30px;"
                                style="width: 120px; height: 120px;">
                                <i class="fas fa-users-cog text-primary fa-4x"></i>
                            </div>
                            <a href="#" class="d-block fs-4 my-4">Property Maintenance</a>
                            <p class="text-white mb-4">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                Mollitia, minima!</p>
                            <a class="btn btn-secondary rounded-pill btn-lg py-2 px-4" href="#">Read More</a>
                        </div>
                        <div class="service-tytle rounded-pill">
                            <div class="d-flex align-items-center justify-content-start ps-4 w-100">
                                <h4>Property Maintenance</h4>
                            </div>
                            <div class="btn-xl-square  rounded-circle bg-secondary p-4"
                                style="width: 80px; height: 80px;">
                                <i class="fas fa-users-cog text-primary fa-2x"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 wow fadeInUp" data-wow-delay="0.6s">
                    <div class="service-item">
                        <div class="service-img">
                            <img src="img/service-3.jpg" class="img-fluid w-100" style="border-radius:30px;"
                                alt="Image">
                        </div>
                        <div class="service-content text-center p-4">
                            <div class="bg-secondary btn-xl-square mx-auto" style="width: 120px; height: 120px;">
                                <i class="fas fa-hospital-user text-primary fa-4x"></i>
                            </div>
                            <a href="#" class="d-block fs-4 my-4">Project managment</a>
                            <p class="text-white mb-4">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                Mollitia, minima!</p>
                            <a class="btn btn-secondary rounded-pill btn-lg py-2 px-4" href="#">Read More</a>
                        </div>
                        <div class="service-tytle rounded-pill">
                            <div class="d-flex align-items-center justify-content-start ps-4 w-100">
                                <h4>Project managment</h4>
                            </div>
                            <div class="btn-xl-square rounded-circle bg-secondary p-4"
                                style="width: 80px; height: 80px;">
                                <i class="fas fa-hospital-user text-primary fa-2x"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 wow fadeInUp" data-wow-delay="0.2s">
                    <div class="service-item">
                        <div class="service-img">
                            <img src="img/service-4.jpg" class="img-fluid w-100" style="border-radius:30px;"
                                alt="Image">
                        </div>
                        <div class="service-content text-center p-4">
                            <div class="bg-secondary btn-xl-square mx-auto" style="width: 100px; height: 100px;">
                                <i class="fas fa-file-invoice-dollar text-primary fa-4x"></i>
                            </div>
                            <a href="#" class="d-block fs-4 my-4">Virtual Design & Build</a>
                            <p class="text-white mb-4">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                Mollitia, minima!</p>
                            <a class="btn btn-secondary rounded-pill btn-lg py-2 px-4" href="#">Read More</a>
                        </div>
                        <div class="service-tytle rounded-pill">
                            <div class="d-flex align-items-center justify-content-start ps-4 w-100">
                                <h4>Virtual Design & Build</h4>
                            </div>
                            <div class="btn-xl-square rounded-circle bg-secondary p-4"
                                style="width: 80px; height: 80px;">
                                <i class="fas fa-file-invoice-dollar text-primary fa-2x"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 wow fadeInUp" data-wow-delay="0.4s">
                    <div class="service-item">
                        <div class="service-img">
                            <img src="img/service-5.jpg" class="img-fluid w-100" style="border-radius:30px;"
                                alt="Image">
                        </div>
                        <div class="service-content text-center p-4">
                            <div class="bg-secondary btn-xl-square mx-auto" style="width: 100px; height: 100px;">
                                <i class="fas fa-cogs text-primary fa-4x"></i>
                            </div>
                            <a href="#" class="d-block fs-4 my-4">Preconstruction</a>
                            <p class="text-white mb-4">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                Mollitia, minima!</p>
                            <a class="btn btn-secondary btn-lg rounded-pill py-2 px-4" href="#">Read More</a>
                        </div>
                        <div class="service-tytle rounded-pill">
                            <div class="d-flex align-items-center justify-content-start ps-4 w-100">
                                <h4>Preconstruction</h4>
                            </div>
                            <div class="btn-xl-square rounded-circle bg-secondary p-4"
                                style="width: 80px; height: 80px;">
                                <i class="fas fa-cogs text-primary fa-2x"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 wow fadeInUp" data-wow-delay="0.6s">
                    <div class="service-item">
                        <div class="service-img">
                            <img src="img/service-6.jpg" class="img-fluid w-100" style="border-radius:30px;"
                                alt="Image">
                        </div>
                        <div class="service-content text-center p-4">
                            <div class="bg-secondary btn-xl-square mx-auto" style="width: 100px; height: 100px;">
                                <i class="fas fa-sitemap text-primary fa-4x"></i>
                            </div>
                            <a href="#" class="d-block fs-4 my-4">Design Build</a>
                            <p class="text-white mb-4">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                Mollitia, minima!</p>
                            <a class="btn btn-secondary rounded-pill py-2 px-4" href="#">Read More</a>
                        </div>
                        <div class="service-tytle rounded-pill">
                            <div class="d-flex align-items-center justify-content-start ps-4 w-100">
                                <h4>Design Build</h4>
                            </div>
                            <div class="btn-xl-square rounded-circle  bg-secondary p-4"
                                style="width: 80px; height: 80px;">
                                <i class="fas fa-sitemap text-primary fa-2x"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 text-center wow fadeInUp" data-wow-delay="0.2s">
                    <a class="btn btn-secondary rounded-pill py-3 px-5 mt-4" href="#">More Services</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Services End -->

    <!-- Fact Counter -->
    <div class="container-fluid counter py-5">
        <div class="container py-5">
            <div class="row g-4">
                <div class="col-lg-6 col-xl-3 wow fadeInUp" data-wow-delay="0.2s">
                    <div class="counter-box">
                        <div class="counter-item">
                            <div class="counter-item-style"></div>
                            <div class="counter-item-inner p-5">
                                <i class="fas fa-thumbs-up fa-4x text-secondary"></i>
                                <h4 class="text-dark my-4">Completed Projects</h4>
                                <div class="counter-counting rounded-pill btn btn-lg ">
                                    <span class="text-secondary fs-2 fw-bold" data-toggle="counter-up">456</span>
                                    <span class="h1 fw-bold text-secondary">+</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-xl-3 wow fadeInUp" data-wow-delay="0.4s">
                    <div class="counter-box">
                        <div class="counter-item">
                            <div class="counter-item-style"></div>
                            <div class="counter-item-inner p-5">
                                <i class="fas fa-users fa-4x text-secondary"></i>
                                <h4 class="text-dark my-4">Happy Customers</h4>
                                <div class="counter-counting rounded-pill btn btn-lg ">
                                    <span class="text-secondary fs-2 fw-bold" data-toggle="counter-up">513</span>
                                    <span class="h1 fw-bold text-secondary">+</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-xl-3 wow fadeInUp" data-wow-delay="0.6s">
                    <div class="counter-box">
                        <div class="counter-item">
                            <div class="counter-item-style"></div>
                            <div class="counter-item-inner p-5">
                                <i class="fas fa-user fa-4x text-secondary"></i>
                                <h4 class="text-dark my-4">Qualified Engineers</h4>
                                <div class="counter-counting rounded-pill btn btn-lg ">
                                    <span class="text-secondary fs-2 fw-bold" data-toggle="counter-up">53</span>
                                    <span class="h1 fw-bold text-secondary">+</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-xl-3 wow fadeInUp" data-wow-delay="0.8s">
                    <div class="counter-box">
                        <div class="counter-item">
                            <div class="counter-item-style"></div>
                            <div class="counter-item-inner p-5">
                                <i class="fas fa-heart fa-4x text-secondary"></i>
                                <h4 class="text-dark my-4">Years Experiance</h4>
                                <div class="counter-counting rounded-pill btn btn-lg ">
                                    <span class="text-secondary   fs-2 fw-bold" data-toggle="counter-up">17</span>
                                    <span class="h1 fw-bold text-secondary">+</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 text-center pt-4 wow fadeInUp" data-wow-delay="0.9s">
                    <a class="counter-btn btn btn-secondary rounded-pill py-3 px-5" href="#">Join With Us</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Fact Counter -->

    <!-- Projects Start -->
    <div class="container-fluid project py-5">
        <div class="container py-5">
            <div class="text-center mx-auto pb-5 wow fadeInUp" data-wow-delay="0.2s" style="max-width: 800px;">
                <p class="text-uppercase text-secondary fs-5 mb-0">Our Projects</p>
                <h2 class="display-4 text-capitalize mb-3">Recent Completed Projects</h2>
            </div>
            <div class="row g-5">
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.2s">
                    <div class="project-item">
                        <div class="row g-4">
                            <div class="col-md-4" style="">
                                <div class="project-img" style="">
                                    <img src="img/project-1.jpg" class="img-fluid w-100p style="border-radius: 0px;"
                                        t-3 ps-3" alt="">
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="project-content mb-4">
                                    <p class="fs-5 fw-bolder text-secondary mb-2">Architecture</p>
                                    <a href="#" class="h4">We Building Everything</a>
                                    <p class="mb-0 mt-3">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                        Tenetur tempore perferendis velit minus, perspiciatis eveniet adipisci tempora
                                        voluptatem quis dolores.</p>
                                </div>
                                <a class="btn btn-primary rounded-pill btn btn-lg py-2 px-4" href="#">Read
                                    More</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.4s">
                    <div class="project-item">
                        <div class="row g-4">
                            <div class="col-md-4" style="">
                                <div class="project-img" style="">
                                    <img src="img/project-2.jpg" class="img-fluid w-100p style="border-radius: 0px;"
                                        t-3 ps-3" alt="">
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="project-content mb-4">
                                    <p class="fs-5 text-secondary mb-2">Interior Design</p>
                                    <a href="#" class="h4">We Building Everything</a>
                                    <p class="mb-0 mt-3">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                        Tenetur tempore perferendis velit minus, perspiciatis eveniet adipisci tempora
                                        voluptatem quis dolores.</p>
                                </div>
                                <a class="btn btn-primary rounded-pill btn btn-lg  py-2 px-4" href="#">Read
                                    More</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.2s">
                    <div class="project-item ">
                        <div class="row g-4">
                            <div class="col-md-4" style="">
                                <div class="project-img" style="">
                                    <img src="img/project-3.jpg" class="img-fluid w-100p style="border-radius: 0px;"
                                        t-3 ps-3" alt="">
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="project-content mb-4">
                                    <p class="fs-5 text-secondary mb-2">House & Exterior</p>
                                    <a href="#" class="h4">We Building Everything</a>
                                    <p class="mb-0 mt-3">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                        Tenetur tempore perferendis velit minus, perspiciatis eveniet adipisci tempora
                                        voluptatem quis dolores.</p>
                                </div>
                                <a class="btn btn-primary rounded-pill btn btn-lg py-2 px-4" href="#">Read
                                    More</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.4s">
                    <div class="project-item">
                        <div class="row g-4">
                            <div class="col-md-4" style="">
                                <div class="project-img" style="">
                                    <img src="img/project-4.jpg" class="img-fluid w-100p style="border-radius: 0px;"
                                        t-3 ps-3" alt="">
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="project-content mb-4">
                                    <p class="fs-5 text-secondary mb-2">Interior Design</p>
                                    <a href="#" class="h4">We Building Everything</a>
                                    <p class="mb-0 mt-3">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                        Tenetur tempore perferendis velit minus, perspiciatis eveniet adipisci tempora
                                        voluptatem quis dolores.</p>
                                </div>
                                <a class="btn btn-primary rounded-pill btn btn-lg py-2 px-4" href="#">Read
                                    More</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 text-center wow fadeInUp" data-wow-delay="0.2s">
                    <a class="btn btn-secondary rounded-pill btn btn-lg py-3 px-5" href="#">More Projects</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Projects End -->

    <!-- Team Start -->
    <div class="container-fluid team pb-5">
        <div class="container pb-5">
            <div class="text-center mx-auto pb-5 wow fadeInUp" data-wow-delay="0.2s" style="max-width: 800px;">
                <p class="text-uppercase text-secondary fs-5 mb-0">Our Team</p>
                <h2 class="display-4 text-capitalize mb-3">Expert team members.</h2>
            </div>
            <div class="row g-4">
                <div class="col-lg-3 wow fadeInUp" data-wow-delay="0.2s">
                    <div class="team-item border border-primary p-1">
                        <div class="team-border-style-1"></div>
                        <div class="team-border-style-2"></div>
                        <div class="team-border-style-3"></div>
                        <div class="team-border-style-4"></div>
                        <div class="team-img">
                            <img src="img/team-1.jpg" class="img-fluid w-100" alt="">
                            <div class="team-icon d-flex justify-content-around">
                                <a class="btn btn-secondary btn-md-square rounded-circle  text-white mx-3"
                                    href=""><i class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-secondary btn-md-square rounded-circle  text-white me-3"
                                    href=""><i class="fab fa-twitter"></i></a>
                                <a class="btn btn-secondary btn-md-square rounded-circle  text-white me-3"
                                    href=""><i class="fab fa-linkedin-in"></i></a>
                                <a class="btn btn-secondary btn-md-square rounded-circle  text-white me-3"
                                    href=""><i class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                        <div class="text-center border border-top-0 bg-white py-3">
                            <h4 class="mb-0 text-capitalize fw-bolder">Masud Maria</h4>
                            <p class="mb-0">Foreman</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 wow fadeInUp" data-wow-delay="0.4s">
                    <div class="team-item border border-primary p-1">
                        <div class="team-border-style-1"></div>
                        <div class="team-border-style-2"></div>
                        <div class="team-border-style-3"></div>
                        <div class="team-border-style-4"></div>
                        <div class="team-img">
                            <img src="img/team-2.jpg" class="img-fluid w-100" alt="">
                            <div class="team-icon d-flex justify-content-around">
                                <a class="btn btn-secondary btn-md-square rounded-circle text-white mx-3"
                                    href=""><i class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-secondary btn-md-square rounded-circle text-white me-3"
                                    href=""><i class="fab fa-twitter"></i></a>
                                <a class="btn btn-secondary btn-md-square rounded-circle text-white me-3"
                                    href=""><i class="fab fa-linkedin-in"></i></a>
                                <a class="btn btn-secondary btn-md-square rounded-circle text-white me-3"
                                    href=""><i class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                        <div class="text-center border border-top-0 bg-white py-3">
                            <h4 class="mb-0  text-capitalize fw-bolder">Masud Maria</h4>
                            <p class="mb-0">Foreman</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 wow fadeInUp" data-wow-delay="0.6s">
                    <div class="team-item border border-primary p-1">
                        <div class="team-border-style-1"></div>
                        <div class="team-border-style-2"></div>
                        <div class="team-border-style-3"></div>
                        <div class="team-border-style-4"></div>
                        <div class="team-img">
                            <img src="img/team-3.jpg" class="img-fluid w-100" alt="">
                            <div class="team-icon d-flex justify-content-around">
                                <a class="btn btn-secondary btn-md-square rounded-circle text-white mx-3"
                                    href=""><i class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-secondary btn-md-square rounded-circle text-white me-3"
                                    href=""><i class="fab fa-twitter"></i></a>
                                <a class="btn btn-secondary btn-md-square rounded-circle text-white me-3"
                                    href=""><i class="fab fa-linkedin-in"></i></a>
                                <a class="btn btn-secondary btn-md-square rounded-circle text-white me-3"
                                    href=""><i class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                        <div class="text-center border border-top-0 bg-white py-3">
                            <h4 class="mb-0 text-capitalize fw-bolder">Masud Maria</h4>
                            <p class="mb-0">Foreman</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 wow fadeInUp" data-wow-delay="0.8s">
                    <div class="team-item border border-primary p-1">
                        <div class="team-border-style-1"></div>
                        <div class="team-border-style-2"></div>
                        <div class="team-border-style-3"></div>
                        <div class="team-border-style-4"></div>
                        <div class="team-img">
                            <img src="img/team-4.jpg" class="img-fluid w-100" alt="">
                            <div class="team-icon d-flex justify-content-around">
                                <a class="btn btn-secondary btn-md-square rounded-circle text-white mx-3"
                                    href=""><i class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-secondary btn-md-square rounded-circle text-white me-3"
                                    href=""><i class="fab fa-twitter"></i></a>
                                <a class="btn btn-secondary btn-md-square rounded-circle text-white me-3"
                                    href=""><i class="fab fa-linkedin-in"></i></a>
                                <a class="btn btn-secondary btn-md-square rounded-circle text-white me-3"
                                    href=""><i class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                        <div class="text-center border border-top-0 bg-white py-3">
                            <h4 class="mb-0 text-capitalize fw-bolder">Masud Maria</h4>
                            <p class="mb-0">Foreman</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Team End -->

    <!-- Blog Start -->
    <div class="container-fluid blog pb-5">
        <div class="container pb-5">
            <div class="text-center mx-auto pb-5 wow fadeInUp" data-wow-delay="0.2s" style="max-width: 800px;">
                <p class="text-uppercase text-secondary fs-5 mb-0">News & Blog</p>
                <h2 class="display-4 text-capitalize mb-3 ">Our latest news post and articles?</h2>
            </div>
            <div class="row g-4">
                <div class="col-lg-4 wow fadeInUp" data-wow-delay="0.2s">
                    <div class="blog-item h-100">
                        <div class="blog-img" style="border: 1px solid rgb(249, 183, 30); border-radius: 30px;">
                            <img src="img/blog-1.jpg" class="img-fluid w-100" alt="">
                        </div>
                        <div class="blog-content p-4">
                            <div class="d-flex justify-content-between mb-3">
                                <p class="mb-0"><i class="fa fa-calendar-check text-secondary me-1"></i> 26 April
                                    2025</p>
                                <p class="mb-0"><i class="fa fa-user text-secondary me-1"></i> Admin</p>
                            </div>
                            <a href="#" class="h4 d-block mb-4">Emerging Tech Trends What to in the Next
                                Decade</a>
                            <a class="btn btn-secondary py-2 px-4 btn rounded-pill btn-lg  " href="#">Read
                                More</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 wow fadeInUp" data-wow-delay="0.4s">
                    <div class="blog-item h-100">
                        <div class="blog-img" style="border: 1px solid rgb(249, 183, 30); border-radius: 30px;">
                            <img src="img/blog-2.jpg" class="img-fluid w-100" alt="">
                        </div>
                        <div class="blog-content p-4">
                            <div class="d-flex justify-content-between mb-3">
                                <p class="mb-0"><i class="fa fa-calendar-check text-secondary me-1"></i> 26 April
                                    2025</p>
                                <p class="mb-0"><i class="fa fa-user text-secondary me-1"></i> Admin</p>
                            </div>
                            <a href="#" class="h4 d-block mb-4">Emerging Tech Trends What to in the Next
                                Decade</a>
                            <a class="btn btn-secondary py-2 px-4 btn rounded-pill btn-lg  " href="#">Read
                                More</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 wow fadeInUp" data-wow-delay="0.6s">
                    <div class="blog-item h-100">
                        <div class="blog-img" style="border: 1px solid rgb(249, 183, 30); border-radius: 30px;">
                            <img src="img/blog-3.jpg" class="img-fluid w-100" alt="">
                        </div>
                        <div class="blog-content p-4">
                            <div class="d-flex justify-content-between mb-3">
                                <p class="mb-0"><i class="fa fa-calendar-check text-secondary me-1"></i> 26 April
                                    2025</p>
                                <p class="mb-0"><i class="fa fa-user text-secondary me-1"></i> Admin</p>
                            </div>
                            <a href="#" class="h4 d-block mb-4">Emerging Tech Trends What to in the Next
                                Decade</a>
                            <a class="btn btn-secondary py-2 px-4 btn rounded-pill btn-lg  " href="#">Read
                                More</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Blog End -->

    <!-- Testimonial Start -->
    <div class="container-fluid testimonial pb-5">
        <div class="container pb-5">
            <div class="text-center mx-auto pb-5 wow fadeInUp" data-wow-delay="0.2s" style="max-width: 800px;">
                <p class="text-uppercase text-secondary fs-5 mb-0">Testimonials</p>
                <h2 class="display-4 text-capitalize mb-3">Our clients reviews.</h2>
            </div>
            <div class="owl-carousel testimonial-carousel wow fadeInUp" data-wow-delay="0.4s">
                <div class="testimonial-item bg-light p-4">
                    <div class="position-relative">
                        <i class="fa fa-quote-right fa-2x text-primary position-absolute"
                            style="bottom: 30px; right: 0;"></i>
                        <div class="mb-4 pb-4 border-bottom border-secondary">
                            <p class="mb-0 text-dark fw-bolder">Lorem Ipsum is simply dummy text of the printing Ipsum
                                has been the industry's standard dummy text ever since the 1500s,
                            </p>
                        </div>
                        <div class="d-flex align-items-center flex-nowrap">
                            <div class="me-4">
                                <img src="img/testimonial-1.jpg" class="img-fluid w-100"
                                    style="width: 100px; height: 100px;" alt="">
                            </div>
                            <div class="d-block">
                                <h4 class="text-dark">Client Name</h4>
                                <p class="m-0 pb-3">Profession</p>
                                <div class="d-flex text-secondary pe-5">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star text-muted"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="testimonial-item bg-light p-4">
                    <div class="position-relative">
                        <i class="fa fa-quote-right fa-2x text-primary position-absolute"
                            style="bottom: 30px; right: 0;"></i>
                        <div class="mb-4 pb-4 border-bottom border-secondary">
                            <p class="mb-0 text-dark fw-bolder">Lorem Ipsum is simply dummy text of the printing Ipsum
                                has been the industry's standard dummy text ever since the 1500s,
                            </p>
                        </div>
                        <div class="d-flex align-items-center flex-nowrap">
                            <div class="me-4">
                                <img src="img/testimonial-2.jpg" class="img-fluid w-100"
                                    style="width: 100px; height: 100px;" alt="">
                            </div>
                            <div class="d-block">
                                <h4 class="text-dark">Client Name</h4>
                                <p class="m-0 pb-3">Profession</p>
                                <div class="d-flex text-secondary pe-5">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star text-muted"></i>
                                    <i class="fas fa-star text-muted"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="testimonial-item bg-light p-4">
                    <div class="position-relative">
                        <i class="fa fa-quote-right fa-2x text-primary position-absolute"
                            style="bottom: 30px; right: 0;"></i>
                        <div class="mb-4 pb-4 border-bottom border-secondary">
                            <p class="mb-0 text-dark fw-bolder">Lorem Ipsum is simply dummy text of the printing Ipsum
                                has been the industry's standard dummy text ever since the 1500s,
                            </p>
                        </div>
                        <div class="d-flex align-items-center flex-nowrap">
                            <div class="me-4">
                                <img src="img/testimonial-3.jpg" class="img-fluid w-100"
                                    style="width: 100px; height: 100px;" alt="">
                            </div>
                            <div class="d-block">
                                <h4 class="text-dark">Client Name</h4>
                                <p class="m-0 pb-3">Profession</p>
                                <div class="d-flex text-secondary pe-5">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Testimonial End -->

    <!-- Footer Start -->
    <div class="container-fluid footer py-5 wow fadeIn" data-wow-delay="0.2s">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-md-6 col-lg-6 col-xl-3">
                    <div class="footer-item d-flex flex-column">
                        <div class="footer-item">
                            <h4 class="text-white mb-4">Newsletter</h4>
                            <p class="mb-3 fs-6 ">Dolor amet sit justo amet elitr clita ipsum elitr est.Lorem ipsum
                                dolor sit amet, consectetur adipiscing elit consectetur adipiscing elit.</p>
                            <div class="position-relative  mx-auto">
                                <input class="form-control rounded-pill w-100 py-3 ps-4 pe-5" type="text"
                                    placeholder="Enter your email">
                                <button type="button"
                                    class="btn btn-secondary rounded-pill  position-absolute top-0 end-0 py-2 mt-2 me-2">SignUp</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-6 col-xl-3">
                    <div class="footer-item d-flex flex-column">
                        <h4 class="text-white mb-4">Explore</h4>
                        <a href="#" class="fs-6"><i class="fas fa-angle-right  me-2"></i> Home</a>
                        <a href="#" class="fs-6"><i class="fas fa-angle-right  me-2"></i> Services</a>
                        <a href="#" class="fs-6"><i class="fas fa-angle-right  me-2"></i> About Us</a>
                        <a href="#" class="fs-6"><i class="fas fa-angle-right  me-2"></i> Latest
                            Projects</a>
                        <a href="#" class="fs-6"><i class="fas fa-angle-right  me-2"></i>
                            testimonial</a>
                        <a href="#" class="fs-6"><i class="fas fa-angle-right  me-2"></i> Our Team</a>
                        <a href="#" class="fs-6"><i class="fas fa-angle-right  me-2"></i> Contact Us</a>
                    </div>
                </div>
                <div class="col-md-6 col-lg-6 col-xl-3">
                    <div class="footer-item d-flex flex-column">
                        <h4 class="text-white mb-4">Our Services</h4>
                        <a href="#" class="fs-6"><i class="fas fa-angle-right  me-2"></i> General
                            Construction</a>
                        <a href="#" class="fs-6"><i class="fas fa-angle-right  me-2"></i> Property
                            Maintenance</a>
                        <a href="#" class="fs-6"><i class="fas fa-angle-right  me-2"></i> Project
                            Managment</a>
                        <a href="#" class="fs-6"><i class="fas fa-angle-right  me-2"></i> Virtual Design
                            & Build</a>
                        <a href="#" class="fs-6"><i class="fas fa-angle-right  me-2"></i> Residential
                            Construction</a>
                        <a href="#" class="fs-6"><i class="fas fa-angle-right  me-2"></i>
                            Preconstruction</a>
                        <a href="#" class="fs-6"><i class="fas fa-angle-right  me-2"></i> Design
                            Build</a>
                    </div>
                </div>
                <div class="col-md-6 col-lg-6 col-xl-3">
                    <div class="footer-item d-flex flex-column">
                        <h4 class="text-white mb-4">Contact Info</h4>
                        <a href="" class="fs-6"><i class="fa fa-map-marker-alt me-2"></i> 123 Street,
                            New York, USA</a>
                        <a href="" class="fs-6"><i class="fas fa-envelope me-2"></i>
                            info@example.com</a>
                        <a href="" class="fs-6"><i class="fas fa-envelope me-2"></i>
                            info@example.com</a>
                        <a href="" class="fs-6"><i class="fas fa-phone me-2"></i> +012 345 67890</a>
                        <a href="" class="fs-6" class="mb-3"><i class="fas fa-print me-2"></i> +012 345
                            67890</a>
                        <div class="footer-btn d-flex align-items-center">
                            <a class="btn btn-secondary btn-md-square  rounded-circle me-2" href=""><i
                                    class="fab fa-facebook-f text-white"></i></a>
                            <a class="btn btn-secondary btn-md-square rounded-circle me-2" href=""><i
                                    class="fab fa-twitter text-white"></i></a>
                            <a class="btn btn-secondary btn-md-square rounded-circle me-2" href=""><i
                                    class="fab fa-instagram text-white"></i></a>
                            <a class="btn btn-secondary btn-md-square rounded-circle me-0" href=""><i
                                    class="fab fa-linkedin-in text-white"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End -->

    <!-- Copyright Start -->
    <div class="container-fluid copyright py-4">
        <div class="container">
            <div class="row g-4 align-items-center">
                <div class="col-md-4 text-center text-md-start mb-md-0">
                    <span class="text-body"><a href="#" class="border-bottom text-white"><i
                                class="fas fa-copyright text-light me-2"></i>ICon</a>, All right
                        reserved.</span>
                </div>
                <div class="col-md-8 text-center text-md-center text-body">
                    <div class="d-inline-flex align-items-center">
                        <a class="border-bottom text-white" href="/privacy">Privacy</a>
                        <span class="text-body px-2">|</span>
                        <a class="border-bottom text-white" href="/terms">Terms</a>
                        <span class="text-body px-2">|</span>
                        <a class="border-bottom text-white" href="/contact">Contact</a>
                    </div>
                    <span class="text-body px-2">|</span>
                    <a class="border-bottom text-white" href="#">Designed By</a>
                    <span class="text-body"><a href="#" class="border-bottom text-white">G M Software
                            Solutions</a></span>


                </div>
            </div>
        </div>
    </div>
    <!-- Copyright End -->
    <!-- Back to Top -->
    <a href="#" class="btn btn-secondary btn-lg rounded-circle back-to-top">
        <i class="fa fa-arrow-up"></i>
    </a>


    <!-- JavaScript Libraries -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/counterup/counterup.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/lightbox/js/lightbox.min.js"></script>


    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>
