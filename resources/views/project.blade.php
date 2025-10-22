<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Constra - Building Construction Website Template</title>
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
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="fa fa-bars"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav ms-auto pt-2 pt-lg-0">
                    <a href="/" class="nav-item nav-link active">Home</a>
                    <a href="about" class="nav-item nav-link">About</a>
                    <a href="service" class="nav-item nav-link">Services</a>
                    <a href="project" class="nav-item nav-link">Projects</a>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle text-dark" data-bs-toggle="dropdown">Pages</a>
                        <div class="dropdown-menu m-lg-0 opacity-75">
                            <a href="feature" class="dropdown-item rounded-pill opacity-100">Our Features</a>
                            <a href="blog" class="dropdown-item rounded-pill opacity-100">Our Blog</a>
                            <a href="team" class="dropdown-item rounded-pill opacity-100">Our Team</a>
                            <a href="testimonial" class="dropdown-item rounded-pill opacity-100">Testimonial</a>
                        </div>
                    </div>
                    {{-- <a href="404" class="dropdown-item rounded-pill opacity-100" >404 Page</a> --}}
                    <a href="contact" class="nav-item nav-link">Contact</a>
                </div>

            </div>
        </nav>
    </div>
    <!-- Navbar & Hero End -->

    <!-- Modal Search Start -->
    <div class="modal fade" id="searchModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-fullscreen">
            <div class="modal-content rounded-0">
                <div class="modal-header">
                    <h4 class="modal-title mb-0" id="exampleModalLabel">Search by keyword</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body d-flex align-items-center">
                    <div class="input-group w-75 mx-auto d-flex">
                        <input type="search" class="form-control p-3" placeholder="keywords"
                            aria-describedby="search-icon-1">
                        <span id="search-icon-1" class="input-group-text p-3"><i class="fa fa-search"></i></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal Search End -->

    <!-- Header Start -->
    <div class="container-fluid bg-breadcrumb">
        <div class="container text-center py-5" style="max-width: 900px;">
            <h4 class="text-white display-4 mb-4 wow fadeInDown" data-wow-delay="0.1s">Our Projects</h4>
            <ol class="breadcrumb d-flex justify-content-center mb-0 wow fadeInDown" data-wow-delay="0.3s">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Pages</a></li>
                <li class="breadcrumb-item active text-secondary">Project</li>
            </ol>
        </div>
    </div>
    <!-- Header End -->

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
