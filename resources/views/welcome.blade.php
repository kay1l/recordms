<!DOCTYPE html>

<html lang="en-US">


<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Palompon Institute of Technology">
    <meta name="csrf-token" content="cCnMBTbczA4epzJEjTTQZwVubwd8xR6e7SrbCHMJ">

    <link rel="icon" type="image/x-icon" href="https://pit.edu.ph/assets/img/favicon.ico">
    <!-- Fonts -->
    <link href="https://pit.edu.ph/assets/css/used_fonts.css" rel="stylesheet" type="text/css">
    <link href="https://pit.edu.ph/assets/css/font-awesome.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://pit.edu.ph/assets/bootstrap/css/bootstrap.css" type="text/css">
    <link rel="stylesheet" href="https://pit.edu.ph/assets/bootstrap/css/bootstrap_supplement.css" type="text/css">
    <link rel="stylesheet" href="https://pit.edu.ph/assets/css/owl.carousel.css" type="text/css">

    <link rel="stylesheet" href="https://pit.edu.ph/assets/css/core_css_style.css" type="text/css">
    <link rel="stylesheet" href="https://pit.edu.ph/assets/css/custom.css" type="text/css">
    <link href="{{ asset('./assets/vendors/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" />

    <style>
        /* Font Settings */
        html {
            font-family: Figtree, sans-serif;
            font-feature-settings: normal;
        }

        code,
        kbd,
        pre,
        samp {
            font-family: ui-monospace, SFMono-Regular, Menlo, Monaco, Consolas, "Liberation Mono", "Courier New", monospace;
            font-size: 1em;
        }

        small {
            font-size: 80%;
        }

        sub,
        sup {
            font-size: 75%;
            line-height: 0;
            position: relative;
            vertical-align: baseline;
        }

        .text-xl {
            font-size: 1.25rem;
            line-height: 1.75rem;
        }

        .text-sm {
            font-size: 0.875rem;
            line-height: 1.25rem;
        }

        .font-semibold {
            font-weight: 600;
        }

        .login {
            font-size: 15px;
        }

        .social a {
            font-size: 14px;
        }

        .slide p {
            font-size: 12px;
        }

        body {
            margin-top: 20px;
            background: #eee;
        }

        .team-style1 {
            position: relative;
            display: block;
            overflow: hidden;
            border-radius: 5px;
        }

        .team-style1 .team-info {
            bottom: 15px;
            left: 15px;
            right: 15px;
            border-radius: 5px;
            transform: translate3d(0px, 0%, 0px);
            transition: all 800ms ease 0.35s;
            padding: 25px 30px;
            box-shadow: 0px 5px 24.25px 0.75px rgba(0, 0, 0, 0.1);
            background: #ffffff;
            position: absolute
        }

        .team-style1 .team-overlay {
            left: 15px;
            right: 15px;
            opacity: 1;
            padding: 0 20px;
            position: absolute;
            top: 15px;
            bottom: 15px;
            transform: translate3d(0px, -110%, 0px);
            transition: all 700ms ease 0.35s;
            box-shadow: 0px 5px 24.25px 0.75px rgba(0, 0, 0, 0.1)
        }

        .team-style1:hover .team-overlay {
            transform: translate3d(0px, 0, 0px);
            transition-delay: 0.1s;
            background: #014136;
            border-radius: 5px
        }

        .team-style1:hover .team-info {
            transform: translate3d(0px, 130px, 0px);
            transition-delay: 0.2s
        }

        .team-style1 .social-icon-style1 {
            border-top: 2px dotted rgba(12, 9, 9, 0.3);
            margin-top: 15px;
            padding-top: 20px
        }

        .team-bg-shape img {
            position: absolute;
            top: -40px;
            right: -40px;
            z-index: 0
        }

        @media screen and (max-width: 991px) {
            .team-style1 .team-info {
                padding: 20px
            }
        }

        .team-style1 .social-icon-style1 {
            border-top: 2px dotted rgba(255, 255, 255, 0.3);
            margin-top: 15px;
            padding-top: 20px;
        }

        .social-icon-style1 {
            margin: 0;
            list-style-type: none;
            padding-left: 0;
        }

        .social-icon-style1 li {
            display: inline-block;
            margin-right: 5px;
        }

        .social-icon-style1 li a {
            border-radius: 5px;
            display: inline-block;
            font-size: 16px;
            height: 34px;
            width: 34px;
            line-height: 34px;
            text-align: center;
            color: #2fbfa7;
            background-color: #ffffff;
        }

        a {
            text-decoration: none;
        }
    </style>

    <title>Palompon Institute of Technology</title>


</head>

<body class="page-sub-page page-microsite">
    <!-- Wrapper -->
    <div class="wrapper">
        <!-- Header -->
        <div class="navigation-wrapper">
            <div class="secondary-navigation-wrapper pit-nav-bar-style">
                <div class="container pit-nav-bar-style-margin">
                    <!-- <div class="pull-left secondary-nav">
                <a id="current_datetime" href="javascript:void(0)"></a>
            </div> -->
                    <div class="navigation-contact pull-left" id="pst-container">Philippine Standard Time: <b><span
                                class="opacity-100" id="pst-time"></span></b></div>
               
                </div>
            </div>
            
            <div class="branding">
                <div class="container">
                    <div class="navbar-brand nav" id="brand">
                        <a href="/"><img class="pit-logo-max-width"
                                src="https://pit.edu.ph/assets/img/logomaster.png" alt="brand"></a>
                    </div>
                </div>
            </div>

            <div class="primary-navigation-wrapper">
                <header class="navbar" id="top" role="banner">
                    <div class="container">
                        <div class="navbar-header">
                            <button class="navbar-toggle" type="button" data-toggle="collapse"
                                data-target=".bs-navbar-collapse">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                        </div>
                        <nav class="collapse navbar-collapse bs-navbar-collapse navbar-left" role="navigation">
                            <ul class="nav navbar-nav">
                                <li>
                                    <a href="/" class="no-link">Home</a>
                                </li>
                                <li>
                                    <a href="#extension-services" class="no-link">About Extension Services</a>
                                </li>
                                <li>
                                    <a href="/" class="no-link">Contact Us</a>
                                </li>


                            </ul>
                        </nav>
                        <div class="social">
                            @if (Route::has('login'))
                                <div class="  sm:fixed sm:top-0 sm:right-0 p-6 text-right z-10">
                                    @auth
                                        <a href="{{ url('/dashboard') }}"
                                            class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Dashboard</a>
                                    @else
                                        <a href="{{ route('login') }}" class="">Log
                                            in</a>
                                        @if (Route::has('index.register'))
                                            <a href="{{ route('index.register') }}" class="ml-4 ">Register</a>
                                        @endif
                                    @endauth
                                </div>
                            @endif

                        </div>
                        
                    </div><!-- /.container -->
                </header><!-- /.navbar -->
            </div><!-- /.primary-navigation -->
        </div> <!-- end Header -->
        

        <div id="slider">
            
            <div class="container">
                <div class="slider-wrapper">
                    
                    <div class="row">
                        <div class="col-lg-12 col-md-10 col-sm-12">
                            <div class="row">
                                <div class="image-carousel">

                                    @foreach ($heroes as $hero)
                                        <div class="slide">
                                            <div class="col-md-4 col-sm-12">
                                                <h1>{{ $hero->title }}</h1>
                                                <p class="ql-align-justify">{{ $hero->description }}</p>


                                            </div>

                                            <div class="col-md-8 col-sm-12">
                                                <div class="image-carousel-slide"><img
                                                        src="{{ asset('upload/hero_image/' . $hero->image) }}"
                                                        style="height: 400px;">
                                                </div>
                                            </div>
                                            {{-- <div class="background"><img src="https://pit.edu.ph/assets/img/footer_background_2.png"
                                                class="" alt=""></div> --}}
                                        </div>
                                    @endforeach
                                </div><!-- /.image-carousel -->
                            </div><!-- /.row -->
                        </div><!-- /.col-md-9 -->


                    </div><!-- /.row -->
                </div><!-- /.slider-wrapper -->
            </div><!-- /.container -->
        </div> <!-- end Slider -->
        
        <footer id="page-footer">
            <section id="footer-bottom" class="pit-page-footer">
                <div class="container">
                    <div class="footer-inner">
                    </div><!-- /.footer-inner -->
                </div><!-- /.container -->
            </section><!-- /#footer-bottom -->
        </footer>
        <div id="extension-services"  class="block">
            <div  class="container" >
                <style>
                    .about {
                        color: black;
                        font-size: 15px;
                    }

                    .h {
                        margin-top: 100px;
                     
                    } 
                </style>
                <h1  class="text-center h"><b>Extension Services Office</b></h1>
                <p class="large-text about">The Extension Services Office (ESO) at Palompon Institute of Technology
                    (PIT) serves as a vital link
                    between the institution and the community, focusing on enhancing socio-economic well-being through
                    various programs in education, technology transfer, livelihood development, and environmental
                    sustainability. Committed to addressing community needs, the ESO fosters collaborations with local
                    government units, NGOs, and other partners to deliver impactful services, including health and
                    wellness campaigns, literacy enhancement, and technical training. By engaging faculty, staff, and
                    students, the office ensures that PIT’s resources and innovations contribute to sustainable
                    development and improved quality of life in the region.</p>
                    
            </div>
            <div class="background"><img src="https://pit.edu.ph/assets/img/footer_background_2.png"
                class="" alt=""></div>
                
            <div class="container">
                <link rel="stylesheet"
                    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
                    integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
                    crossorigin="anonymous" referrerpolicy="no-referrer" />
                    <style>
                        .card-container{
                            margin-top:100px;
                        }
                    </style>
                <div class="container card-container">
                    <div class="row position-relative mt-n1-9">
                        <div class="col-md-6 col-lg-4 mt-1-9">
                            <div class="team-style1 text-center">
                                <img  src="{{asset('upload/1.jpg')}}" class="border-radius-5 "
                                    alt="..." style="height: 300px; width: 500px; ">
                                <div class="team-info">
                                    <h3 class="text-primary mb-1 h4">WHO WE ARE ?</h3>
                                    
                                </div>
                                <div class="team-overlay">
                                    <div class="d-table h-100 w-100">
                                        <div class="d-table-cell align-middle">
                                            <h3><a href="#" class="text-white">WHO WE ARE</a></h3>
                                            <p class="text-white mb-0">We are a dedicated team committed to bridging education and community needs through innovative outreach and support.</p>
                                            <ul class="social-icon-style1">
                                                <button class="btn btn-info"> Read More...</button>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-4 mt-1-9">
                            <div class="team-style1 text-center">
                                <img src="{{asset('upload/4.jpg')}}" class="border-radius-5" style="height: 300px; width: 500px;"
                                    alt="...">
                                <div class="team-info">
                                    <h3 class="text-primary mb-1 h4">WHAT WE DO ?</h3>
                                    {{-- <span class="font-weight-600 text-secondary">Photographer</span> --}}
                                </div>
                                <div class="team-overlay">
                                    <div class="d-table h-100 w-100">
                                        <div class="d-table-cell align-middle">
                                            <h3><a href="#" class="text-white">WHAT WE DO</a></h3>
                                            <p class="text-white mb-0">We provide community-focused programs and services to enhance local development and lifelong learning.</p>
                                            <ul class="social-icon-style1">
                                                <button class="btn btn default"> Read More...</button>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-4 mt-1-9">
                            <div class="team-style1 text-center">
                                <img src="{{asset('upload/2.jpg')}}" class="border-radius-5" style="height: 300px; width: 500px;"
                                    alt="...">
                                <div class="team-info">
                                    <h3 class="text-primary mb-1 h4">OUR SERVICES</h3>
                                  
                                </div>
                                <div class="team-overlay">
                                    <div class="d-table h-100 w-100">
                                        <div class="d-table-cell align-middle">
                                            <h3><a href="#" class="text-white">OUR SERVICES</a></h3>
                                            <p class="text-white mb-0">We offer training workshops, educational seminars, and consultancy services tailored to community needs.</p>
                                            <ul class="social-icon-style1">
                                            <button class="btn btn default"> Read More...</button>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- /.container -->
        </div>

        <!-- Footer -->
        <footer id="page-footer">
            <section id="footer-bottom" class="pit-page-footer">
                <div class="container">
                    <div class="footer-inner">
                    </div><!-- /.footer-inner -->
                </div><!-- /.container -->
            </section><!-- /#footer-bottom -->
            <section id="footer-content">
                <div class="container">
                    <div class="row mb-3">
                        <div class="col-md-4 col-sm-12">
                            <aside class="logo">
                                <img src="https://pit.edu.ph/assets/img/bg_logo_small.png" class="vertical-center"
                                    width="300" height="150">
                            </aside>
                        </div>
                        <div class="col-md-4 col-sm-12">
                            <aside>
                                <header>
                                    <h4>Important Links</h4>
                                </header>
                                <ul class="list-links">
                                    <li><a href="campus_news/2024">News</a></li>
                                    <li><a href="https://admission.pit.edu.ph">Online Admission</a></li>
                                    <li><a href="https://enrollment.pit.edu.ph">Online Enrollment</a></li>
                                    <li><a href="https://elearning.pit.edu.ph">e-Learning</a></li>
                                    <li><a href="https://lms.pit.edu.ph">Learning Resource Center</a></li>
                                </ul>
                            </aside>
                        </div>
                        <div class="col-md-4 col-sm-12">
                            <aside>
                                <header>
                                    <h4>About PIT</h4>
                                </header>
                                <section class="footer-about-pit">
                                    PIT is a state college in the Philippines mandated to provide higher vocational,
                                    professional, and technical instruction and training in trade and industrial
                                    education and other vocational courses, professional courses, such as medicine,
                                    commerce, pharmacy, education, agriculture and dentistry, and to offer engineering
                                    courses to uplift the technological potential and talents of the youth in this part
                                    of the archipelago; and for special purposes, to promote research, advance studies
                                    and progressive leadership in the fields of trade, technical, industrial and
                                    technological education.
                                </section>
                            </aside>
                        </div>
                    </div><!-- /.row -->
                    <div class="row">
                        <div class="col-md-4 col-sm-12">
                            <header>
                                <h4>Contact Us</h4>
                            </header>
                            <aside>
                                <address>
                                    <strong>Palompon Institute of Technology</strong>
                                    <br>
                                    <span>Evangelista Street, Brgy. Guiwan II, Palompon, Leyte 6538</span>
                                    <br>
                                    Telephone: (053) 555-9841 | Email: <a href="/cdn-cgi/l/email-protection"
                                        class="__cf_email__"
                                        data-cfemail="0a657a4a7a637e246f6e7f247a62">[email&#160;protected]</a>
                                </address>
                            </aside>
                        </div>
                        <div class="col-md-4">
                            <aside>
                                <header>
                                    <h4>Campus and Colleges</h4>
                                </header>
                                <ul class="list-links">
                                    <li><a href="#">College of Graduate Studies</a></li>
                                    <li><a href="#">College of Maritime Education</a></li>
                                    <li><a href="#">College of Arts and Sciences</a></li>
                                    <li><a href="#">College of Teacher Education</a></li>
                                    <li><a href="#">College of Technology and Engineering</a></li>
                                    <li><a href="#">Tabango Campus</a></li>
                                </ul>
                            </aside>
                        </div>
                        <div class="col-md-4">
                            <aside>
                                <header>
                                    <h4>Student Support</h4>
                                </header>
                                <ul class="list-links">
                                    <li><a href="https://pit.edu.ph/student_services_osds">Office of Student
                                            Development Services</a></li>
                                    <li><a href="https://pit.edu.ph/student_services_guidance">Guidance and
                                            Counseling</a></li>
                                    <li><a href="https://pit.edu.ph/student_services_alumni">Alumni</a></li>
                                </ul>
                            </aside>
                        </div>
                    </div>

                </div><!-- /.container -->
                <div class="background"><img src="https://pit.edu.ph/assets/img/footer_background_2.png"
                        class="" alt=""></div>
            </section><!-- /#footer-content -->



        </footer>
        <!-- end Footer -->

    </div>
    <!-- end Wrapper -->

    <script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
    <script type="text/javascript" src="https://pit.edu.ph/assets/js/jquery-2.1.0.min.js"></script>
    <script type="text/javascript" src="https://pit.edu.ph/assets/js/jquery-migrate-1.2.1.min.js"></script>
    <script type="text/javascript" src="https://pit.edu.ph/assets/bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="https://pit.edu.ph/assets/js/owl.carousel.js"></script>
    <script type="text/javascript" src="https://pit.edu.ph/assets/js/jquery.validate.min.js"></script>
    <script type="text/javascript" src="https://pit.edu.ph/assets/js/jquery.placeholder.js"></script>
    <script type="text/javascript" src="https://pit.edu.ph/assets/js/jQuery.equalHeights.js"></script>
    <script type="text/javascript" src="https://pit.edu.ph/assets/js/icheck.min.js"></script>
    <script type="text/javascript" src="https://pit.edu.ph/assets/js/retina-1.1.0.min.js"></script>
    <script type="text/javascript" src="https://pit.edu.ph/assets/js/jquery.tablesorter.min.js"></script>

    <script type="text/javascript" src="https://pit.edu.ph/assets/js/core.js"></script>

    <script nonce="aNj1nX7JrvuH7ipnIyuag8jHDRh5OeBW">
        (function() {
            function c() {
                var b = a.contentDocument || a.contentWindow.document;
                if (b) {
                    var d = b.createElement('script');
                    d.nonce = 'aNj1nX7JrvuH7ipnIyuag8jHDRh5OeBW';
                    d.innerHTML =
                        "window.__CF$cv$params={r:'8a6b255979666877',t:'MTcyMTU2NDQzNS4wMDAwMDA='};var a=document.createElement('script');a.nonce='aNj1nX7JrvuH7ipnIyuag8jHDRh5OeBW';a.src='/cdn-cgi/challenge-platform/scripts/jsd/main.js';document.getElementsByTagName('head')[0].appendChild(a);";
                    b.getElementsByTagName('head')[0].appendChild(d)
                }
            }
            if (document.body) {
                var a = document.createElement('iframe');
                a.height = 1;
                a.width = 1;
                a.style.position = 'absolute';
                a.style.top = 0;
                a.style.left = 0;
                a.style.border = 'none';
                a.style.visibility = 'hidden';
                document.body.appendChild(a);
                if ('loading' !== document.readyState) c();
                else if (window.addEventListener) document.addEventListener('DOMContentLoaded', c);
                else {
                    var e = document.onreadystatechange || function() {};
                    document.onreadystatechange = function(b) {
                        e(b);
                        'loading' !== document.readyState && (document.onreadystatechange = e, c())
                    }
                }
            }
        })();
    </script>
    <script>
        $(document).ready(function(){
    $('a.no-link').on('click', function(event) {
        if (this.hash !== "") {
            event.preventDefault();

            var hash = this.hash;

            $('html, body').animate({
                scrollTop: $(hash).offset().top
            }, 100); // 800ms for the scroll duration
        }
    });
});

    </script>
</body>

</html>
