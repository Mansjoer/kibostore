<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Load the stylesheet. -->
    <link href="{{ asset('landing/css/identity.min.css') }}" rel="stylesheet">
    <meta name="description" content="Kibostore is the best website for topup in-game currency. We provide fast service for our customers! " />
    <meta property="og:title" content="Kibostore in-game currency website topup provider" />
    <meta property="og:url" content="https://kibostore.id" />
    <meta property="og:image" content="https://kibostore.id/public/storage/images/kibostore.jpg" />
    <meta property="og:type" content="top-up" />

    <!-- Title -->
    <title>Kibostore</title>
</head>

<body>


    <div class="hero-wrapper vh-100 d-flex flex-column position-relative overflow-hidden">
        <div class="ball"></div>
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-light fixed-top navbar-scrollstyle bg-light shadow-sm">
            <div class="container">
                <div>
                    <a class="navbar-brand font-weight-bold" href="/">Kibostore</a>
                </div>
                <button class="navbar-toggler navbar-toggler-right collapsed" type="button" data-toggle="collapse" data-target="#navbarMainCollapse" aria-controls="navbarMainCollapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarMainCollapse">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="https://www.instagram.com/kibostore.co/" target="_blank">Become Reseller</a>
                        </li>
                        <li class="nav-item mr-3">
                            <a class="nav-link" href="https://www.instagram.com/kibostore.co/" target="_blank"><i data-feather="instagram"></i></a>
                        </li>
                        @if(Auth::check())
                        <li class="nav-item">
                            <a class="btn btn-primary" href="/admin">Dashboard</a>
                        </li>
                        @else
                        <li class="nav-item">
                            <a class="btn btn-primary" href="/login">Login</a>
                        </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav> <!-- /end of navbar -->


        <!-- Hero content -->
        <div class="container flex-grow-1 d-flex justify-content-center align-items-center position-relative pt-5">
            <div class="content py-5">
                <h1 class="display-3 font-weight-bold">
                    The best top up website for <br>
                    <span id="typed"></span>
                    <div id="typed-strings">
                        @foreach ($datagame as $game)
                        <p>{{ $game->display_name }}</p>
                        @endforeach
                    </div>
                </h1>
                <h2 class="text-muted font-weight-lighter mt-3">Get yours right now!</h2>

                <div class="hero-drawing py-5 mx-auto">
                    <img src="{{ asset('landing/img/drawing-hero.svg') }}" alt="Drawing hero" class="img-fluid">
                </div>
            </div>
        </div>
        <div class="ball ball-alt"></div>
    </div>


    <!-- Projects section -->
    <section id="products" class="py-5 bg-light">

        <div class="container">

            <div class="row text-center py-3 my-5">

                <div class="col-md-8 mx-auto">
                    <h1 class="dot mb-4">Our Other Products</h1>
                </div>

            </div> <!-- /end of row -->

            <div class="row py-3 mb-5 justify-content-center">

                <div class="col-md-4 mt-4">
                    <div class="card text-center border-0 position-relative">
                        <div class="card-body pt-3">
                            <h4 class="card-title mt-2">
                                Point Blank
                            </h4>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mt-4">
                    <div class="card text-center border-0 position-relative">
                        <div class="card-body pt-3">
                            <h4 class="card-title mt-2">
                                Free Fire
                            </h4>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mt-4">
                    <div class="card text-center border-0 position-relative">
                        <div class="card-body pt-3">
                            <h4 class="card-title mt-2">
                                COD Mobile
                            </h4>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mt-4">
                    <div class="card text-center border-0 position-relative">
                        <div class="card-body pt-3">
                            <h4 class="card-title mt-2">
                                Genshin Impact
                            </h4>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mt-4">
                    <div class="card text-center border-0 position-relative">
                        <div class="card-body pt-3">
                            <h4 class="card-title mt-2">
                                Arena of Valor
                            </h4>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mt-4">
                    <div class="card text-center border-0 position-relative">
                        <div class="card-body pt-3">
                            <h4 class="card-title mt-2">
                                Sausage Man
                            </h4>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mt-4">
                    <div class="card text-center border-0 position-relative">
                        <div class="card-body pt-3">
                            <h4 class="card-title mt-2">
                                And Much More!
                            </h4>
                        </div>
                    </div>
                </div>


            </div> <!-- /end of row -->

        </div>

    </section>


    <!-- Contact section -->
    <section id="contact" class="py-5">

        <div class="container">

            <div class="row">
                <div class="col-md-8 mx-auto text-center">

                    <h1 class="dot mb-5">Get in touch</h1>

                    <div class="row pb-5">
                        <div class="col-lg-6 mt-5">
                            <div class="card border-0 bg-light rounded-lg backdrop">
                                <div class="card-body">
                                    <h4 class="card-title">
                                        <i data-feather="phone" class="text-primary"></i>
                                        Give us a call
                                    </h4>
                                    <h5 class="font-weight-lighter">+62 812 9944 0855</h5>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 mt-5">
                            <div class="card border-0 bg-light rounded-lg backdrop">
                                <div class="card-body">
                                    <h4 class="card-title">
                                        <i data-feather="mail" class="text-primary"></i>
                                        Shoot us a message
                                    </h4>
                                    <h5 class="font-weight-lighter">kibostore@gmail.com</h5>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="col-md-4 d-flex align-items-end py-3">

                    <img src="{{ asset('landing/img/drawing-contact.svg') }}" alt="" class="img-fluid">

                </div> <!-- /end of column -->

            </div> <!-- /end of row -->

            <div class="row py-3">
                <div class="col-md-6 mx-auto text-center">
                    <p class="lead mt-5">Stay up to date by signing up for our newsletter</p>

                    <div class="card border-0">
                        <div class="card-body pb-0 pt-1">
                            <div class="d-flex align-items-start">
                                <div class="form-group flex-grow-1">
                                    <form action="/subscribe" method="POST">
                                        {{ csrf_field() }}
                                        <input name="email" type="email" placeholder="Email address" class="form-control" id="inputDefault1">

                                        <!--<small class="form-text text-muted">By signing up you agree to our privacy policy.</small>-->
                                </div>
                                <button type="submit" class="btn btn-primary ml-1 flex-shrink-0">
                                    Subscribe
                                </button>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="text-center">
                        <p class="lead mt-3">or follow us on</p>
                        <a href="https://www.instagram.com/kibostore.co/" target="_blank" class="btn text-primary m-1">
                            <i data-feather="instagram"></i>
                            <span class="sr-only">Instagram</span>
                        </a>
                    </div>

                    <h6 class="text-center mt-2">
                        <a href="https://kibostore.id" target="_blank">kibostore.id</a>
                    </h6>
                </div>
            </div> <!-- /end of row -->

        </div>

    </section>



    <!-- Footer -->
    <footer class="bg-light py-3">

        <div class="container">

            <div class="row">
                <div class="col-md-4 mt-3">
                    <h5 class="mb-3">Kibostore</h5>
                    <p>
                        Kibostore is the best game top up service that will probably always develop in the future. We try to help you in developing your confidence in playing the game by top up.
                    </p>
                </div>
                <div class="col-md-4 mt-3">
                    <h5 class="mb-3">Supported By</h5>
                    <ul class="list-unstyled">
                        <li>
                            <a href="https://instagram.com/theamah_">Aditya Ramadhana</a>
                        </li>
                        <li>
                            <a href="https://www.instagram.com/zildan2306">Zildan Abubakar Yusuf</a>
                        </li>
                    </ul>
                </div>
                <div class="col-md-4 mt-3 text-center">
                    <h5 class="mb-3">Connect with us</h5>
                    <a href="https://www.instagram.com/kibostore.co/" target="_blank" class="btn text-primary m-1">
                        <i data-feather="instagram"></i>
                        <span class="sr-only">Instagram</span>
                    </a>
                    <br>
                    <a href="https://kibostore.id" target="_blank">kibostore.id</a>
                </div>
            </div>
        </div>

        <div class="container">

            <hr class="border-primary">

            <h6 class=" text-muted text-center font-weight-lighter">
                © 2022 Copyright Kibostore
            </h6>

        </div>

    </footer>

    <!-- Load required Javascript -->
    <script src="{{ asset('landing/lib/jquery.min.js') }}"></script> <!-- jQuery -->
    <script src="{{ asset('landing/lib/popper.min.js') }}"></script> <!-- Popper.js - dependency of Bootstrap -->

    <script src="{{ asset('landing/js/plugins.min.js') }}"></script> <!-- Load plugins -->

    <script src="{{ asset('landing/js/main.min.js') }}"></script> <!-- Other javascript -->

</body>

</html>
