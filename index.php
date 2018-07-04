<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Site Metadata -->
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />
    <meta name="author" content="Webbing Creatives" />
    <meta name="keywords" content="Compssa, Computer, Software, development, hub, science, platform" />
    <meta name="description" content="Welcome To KTU-COMPSSA Software Development Hub - We Develop And Share What We Know-COMPSSA GH" />

    <!-- Linked CSS -->
    <link rel="stylesheet" type="text/css" href="/page-includes/css/materialize.min.css">
    <link rel="stylesheet" type="text/css" href="/page-includes/css/fonts-and-labels.css">

    <!-- Site Title -->
    <title>Welcome | COMPSSA Project Hub</title>

    <!-- Page Styles -->
    <style>
        body {
            display: flex;
            min-height: 100vh;
            flex-direction: column;
        }

        main {
            flex: 1 0 auto;
        }

        nav .nav-wrapper a,
        nav ul li a {
            color: #0d47a1;
        }


        /* Slider Images */

        div.img-slider {
            background-size: cover;
            background-position: center;
        }

        .carousel.carousel-slider {
            height: 60vh !important;
        }

        div.img-slider.a {
            background-image: url(page-includes/img/software-development1.jpg);
        }

        div.img-slider.b {
            background-image: url(page-includes/img/collabo.jpg);
        }

        div.img-slider.c {
            background-image: url(page-includes/img/software_dev.jpeg);
        }

        div.progress {
            width: 100%;
            height: 10px;
            position: absolute;
            left: 0;
            right: 0;
            top: 0;
            margin-top: 0px;
            color: #0d47a1;
            background: #fff;
            z-index: 9000;
            display: none;
        }

        #login-form {
            margin-top: 25px;
        }

        a#logo-container img {
            max-width: 4.2rem !important;
        }

        div.progress .indeterminate {
            color: #fff;
            background: #0d47a1;
        }

        .form-r-container {
            max-width: 90%;
        }

        div.error button {
            position: absolute;
            margin: 0 auto;
            left: calc(50% - 30px);
            bottom: 30px !important;
        }

        div.error {
            text-align: center;
            position: absolute;
            left: 0;
            right: 0;
            bottom: 0;
            top: 0;
            padding: 8px 18px !important;
            max-width: 100%;
            height: auto;
            color: white;
            display: none;
            z-index: 1000;
        }


        /* Responsive */

        @media (min-width:321px and max-width: 480px) {
            /* smartphones, iPhone, portrait 480x320 phones */
            #page-req.form {
                width: 35% !important;
            }
        }

        @media (min-width:481px and max-width: 640px) {
            /* portrait e-readers (Nook/Kindle), smaller tablets @ 600 or @ 640 wide. */
        }

        @media (min-width:641px and max-width:900px) {
            /* portrait tablets, portrait iPad, landscape e-readers, landscape 800x480 or 854x480 phones */
        }

        @media (min-width:961px and max-width: 1024px) {
            /* tablet, landscape iPad, lo-res laptops ands desktops */
        }

        @media (min-width:1025px and max-width:1280px) {
            /* big landscape tablets, laptops, and desktops */
            #page-req.form {
                width: 45% !important;
            }

            #page-req.page {
                width: 75% !important;
            }

            .modal {
                width: 85% !important;
            }
        }

        @media (min-width:1281px) {
            /* hi-res laptops and desktops */
            #page-req.form {
                width: 30% !important;
            }

            #page-req.page {
                width: 80% !important;
                min-height: 70% !important;
            }

            .modal {
                width: 70% !important;
            }
        }

    </style>
</head>

<body>
    <!-- Page Header -->
    <header>
        <nav role="navigation" class="white blue-text text-darken-4">
            <div class="nav-wrapper container">

                <!-- Navbar Title -->
                <a id="logo-container" class="brand-logo">
                    <div class="hide-on-med-and-down left"><img class="circle left" src="/page-includes/img/ktu_logo_small.jpeg">KTU Project Hub</div>
                    <img class="hide-on-large-only circle center" src="/page-includes/img/ktu_logo_small.jpeg">
                </a>

                <!-- Navbar Menu -->
                <ul class="right hide-on-med-and-down">
                    <li id="timer-tab"><a target="_blank" href="https://www.ktu.edu.gh">KTU Home</a></li>
                    <li id="stats-tab" data-target="about-us" class="modal-trigger"><a href="#">About Us</a></li>
                    <li id="graphs-tab"><a href="/forum">Forum</a></li>
                    <li><a href="" data-target="dropdown" class="dropdown-trigger">Members<i class="material-icons right">expand_more</i></a></li>
                </ul>

                <!-- Navbar Dropdown Menu Content -->
                <ul id="dropdown" class="dropdown-content">
                    <li><a href="#Register" class="page-req" id="Register"><i class="material-icons">account_circle</i>Sign Up</a></li>
                    <li class="divider"></li>
                    <li><a href="#Login" class="page-req" id="Login"><i class="material-icons">exit_to_app</i>Sign In</a></li>
                </ul>


                <a href="#" data-target="slide-out" class="sidenav-trigger"><i class="material-icons">menu</i></a>

            </div>
        </nav>

        <!-- Navigation for Mobile Devices -->
        <ul id="slide-out" class="sidenav">
            <h5 class="center">KTU Project Hub</h5>
            <div class="divider"></div>
            <li id="timer-tab"><a target="_blank" href="https://www.ktu.edu.gh">KTU Home</a></li>
            <li id="stats-tab" data-target="about-us" class="modal-trigger"><a href="#">About Us</a></li>
            <li id="graphs-tab"><a href="/forum">Forum</a></li>
            <li class="no-padding">
                <ul class="collapsible collapsible-accordion">
                    <li>
                        <a class="collapsible-header">Members<i class="material-icons">expand_more</i></a>
                        <div class="collapsible-body">
                            <ul>
                                <li><a href="#Register" class="page-req" id="Register"><i class="material-icons">account_circle</i>Sign Up</a></li>
                                <li class="divider"></li>
                                <li><a href="#Login" class="page-req" id="Login"><i class="material-icons">exit_to_app</i>Sign In</a></li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </li>
        </ul>

    </header>

    <!-- Page Content -->
    <main>
        <div class="container-fluid">

            <!-- Page Slider -->
            <div class="carousel carousel-slider center z-depth-4">
                <div class="carousel-item img-slider a" href="#one!"></div>
                <div class="carousel-item img-slider b" href="#two!"></div>
                <div class="carousel-item img-slider c" href="#three!"></div>
            </div>

            <!-- About Us (Pop Up) -->
            <div id="about-us" class="modal modal-fixed-footer">
                <div class="modal-content">
                    <h4>About Us</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum
                    </p>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum
                    </p>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum
                    </p>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum
                    </p>
                </div>
                <div class="modal-footer">
                    <a class="modal-close waves-effect waves-blue btn-flat">Close</a>
                </div>
            </div>

            <!-- Page Requests Destination -->
            <div id="page-req" class="modal modal-fixed-footer">
                <div class="modal-content"></div>
                <div class="modal-footer">
                    <a class="modal-close waves-effect waves-red btn-flat">Close</a>
                </div>
            </div>
        </div>
    </main>

    <!-- Page Footer -->
    <footer class="page-footer white">
        <div class="container">
            <div class="row">
                <div class="col l6 s12">
                    <h5 class="blue-text text-darken-4">KTU Project Hub</h5>
                    <p class="blue-text text-darken-4">
                        Welcome To KTU-COMPSSA Software Development Hub - We Develop And Share What We Know - COMPSSA GH
                    </p>
                </div>
                <div class="col l4 offset-l2 s12">
                    <h6 class="blue-text text-darken-4">About</h6>
                    <ul>
                        <li><a href="" class="blue-text text-darken-4">Help</a></li>
                        <li><a href="" class=" blue-text text-darken-4">Contact</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="footer-copyright blue darken-4">
            <div class="container center">
                &copy; 2018 | Made with <i class="tiny material-icons amber-text">favorite</i> by
                <a class="grey-text text-lighten-4" href="#!">Webbing Creatives</a>
            </div>
        </div>
    </footer>

    <!-- Linked JS -->
    <script type="text/javascript" src="/page-includes/js/jquery-3.3.1.min.js"></script>
    <script type="text/javascript" src="/page-includes/js/materialize.min.js"></script>
    <script type="text/javascript">
        ///--- Vanilla JS ---///
        document.addEventListener('DOMContentLoaded', function() {
            //Page Slider
            var CarouselElem = document.querySelectorAll('.carousel');
            var pageCarousel = M.Carousel.init(
                CarouselElem, {
                    fullWidth: true,
                    indicators: false
                }
            );

            //Dropdowns
            var dropElem = document.querySelectorAll('.dropdown-trigger');
            var pageDropdowns = M.Dropdown.init(
                dropElem, {
                    coverTrigger: false,
                    closeOnClick: true,
                    constrainWidth: false
                });

            //Modals and Pop-Ups
            var modalElem = document.querySelectorAll('.modal');
            var pageModals = M.Modal.init(
                modalElem, {
                    preventScrolling: false,
                    dismissible: false
                });

            //Side Navigation for Mobile Devices
            var sidenavElem = document.querySelectorAll(".sidenav");
            var modileNav = M.Sidenav.init(
                sidenavElem, {
                    edge: "right",
                    draggable: true,
                    preventScrolling: true
                });

            //Collapsibles and Navigation Dropdowns
            var collapsibleElem = document.querySelectorAll('.collapsible');
            var pageCollapsibles = M.Collapsible.init(
                collapsibleElem, {
                    accordion: false
                });

        });



        ///--- jQuery ---///

        //Image Slider Animation
        $('.carousel').carousel({
            padding: 200
        });
        setTimeout(autoplay, 6500);

        function autoplay() {
            $('.carousel').carousel('next');
            setTimeout(autoplay, 7500);
        }

        //Page Request Buttons
        $(".page-req").click(function() {
            getPage("/members/index.php", $(this).attr("id"));
            return false;
        });

        //Request Pages Programmatically
        function getPage(src, title) {
            var pageType = title == "Login" ? "form" : "page";

            $.get(src, "page=" + title, function(data, status, xhr) {
                if (pageType == "form" && $("#page-req").hasClass("page")) {
                    $("#page-req").removeClass("page").addClass("form");
                } else if (pageType == "page" && $("#page-req").hasClass("form")) {
                    $("#page-req").removeClass("form").addClass("page");
                } else {
                    $("#page-req").addClass(pageType);
                }

                $("#page-req>.modal-content").html(data);
                $("#page-req").modal('open');
                $.getScript("/page-includes/files/login-register.js", function() {
                    $("button[type=submit]").removeAttr("disabled");
                });
            });
        }

    </script>
</body>

</html>
