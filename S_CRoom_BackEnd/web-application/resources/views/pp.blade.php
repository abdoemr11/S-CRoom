<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Profile page</title>
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link href="css/aos.css?ver=1.1.0" rel="stylesheet">
    <link href="css/bootstrap.min.css?ver=1.1.0" rel="stylesheet">
    <link href="css/main.css?ver=1.1.0" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="style.css">
    <noscript>
        <style type="text/css">
            [data-aos] {
                opacity: 1 !important;
                transform: translate(0) scale(1) !important;
            }
        </style>
    </noscript>
</head>
<body id="top">
<header>
    <div class="profile-page sidebar-collapse">
        <nav class="navbar navbar-expand-lg fixed-top navbar-transparent bg-primary" color-on-scroll="400">
            <div class="container">
                <div class="navbar-translate"><a class="navbar-brand" href="/pp" rel="tooltip"><img src="images/profile.png" width="50" height="50"></a></div>
                <div class="collapse navbar-collapse justify-content-end" id="navigation">
                    <ul class="navbar-nav">
                        <li class="nav-item"><a class="nav-link smooth-scroll" href="/proflog">Home</a></li>
                        <li class="nav-item"><a class="nav-link smooth-scroll" href="#about">About</a></li>
                        <li class="nav-item"><a class="nav-link smooth-scroll" href="#experience">Courses</a></li>
                        <li class="nav-item"><a class="nav-link smooth-scroll" href="/logout/professors">Log out</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
</header>
<div class="page-content">
    <div>
        <div class="profile-page">
            <div class="wrapper">
                <div class="page-header page-header-small" filter-color="green">
                    <div class="page-header-image" data-parallax="true" style="background-image: url('images/project-1.jpg')"></div>
                    <div class="container">
                        <div class="content-center">
                            <div class="cc-profile-image"><a href="/pp"><img src="prof.png" alt="Image"/></a></div>
                            <div class="h2 title">
                                {{Auth::guard('professors')->user()->first_name}}
                                {{Auth::guard('professors')->user()->second_name}}
                                @php($user = Auth::guard('professors')->user())
                                {{--                                {{$user}}--}}
                            </div>
                        </div>
                    </div>
                    <div class="section">
                        <div class="container">
                            <div class="button-container"><a class="btn btn-default btn-round btn-lg btn-icon" href="#" rel="tooltip" title="Follow me on Facebook"><i class="fa fa-facebook"></i></a><a class="btn btn-default btn-round btn-lg btn-icon" href="#" rel="tooltip" title="Follow me on Twitter"><i class="fa fa-twitter"></i></a><a class="btn btn-default btn-round btn-lg btn-icon" href="#" rel="tooltip" title="Follow me on Google+"><i class="fa fa-google-plus"></i></a><a class="btn btn-default btn-round btn-lg btn-icon" href="#" rel="tooltip" title="Follow me on Instagram"><i class="fa fa-instagram"></i></a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="section" id="about">
            <div class="container">
                <div class="card" data-aos="fade-up" data-aos-offset="10">
                    <div class="row">

                        <div class="col-lg-6 col-md-12">
                            <div class="card-body">
                                <div class="h4 mt-0 title">Basic Information</div>
                                <div class="row">
                                    <div class="col-sm-4"><strong class="text-uppercase">Deparment:</strong></div>
                                    <div class="col-sm-8">{{Auth::guard('professors')->user()->department}}</div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-sm-4"><strong class="text-uppercase">city:</strong></div>
                                    <div class="col-sm-8">{{Auth::guard('professors')->user()->city}}</div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-sm-4"><strong class="text-uppercase">Email:</strong></div>
                                    <div class="col-sm-8">{{Auth::guard('professors')->user()->professor_email}}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="section" id="experience">
            <div class="container cc-experience">
                <div class="h4 text-center mb-4 title">Courses</div>
                @foreach(Auth::guard('professors')->user()->subjects as $subject)
                    <div class="card">
                        <div class="row">
                            <div class="col-md-3 bg-primary" data-aos="fade-right" data-aos-offset="50" data-aos-duration="500">
                                <div class="card-body cc-experience-header">
                                    <div class="h5">Year: {{$subject->subject_year}}</div>
                                </div>
                            </div>
                            <div class="col-md-9" data-aos="fade-left" data-aos-offset="50" data-aos-duration="500">
                                <div class="card-body">
                                    <div class="h5">{{$subject->subject_name}}</div>
                                    <p class="h6">Max Degree: {{$subject->subject_degree}}</p>
                                    <p class="h6">Min Degree: {{$subject->subject_min_mark}}</p>
                                    <p></p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
</div>
<footer class="footer">
    <div class="container text-center"><a class="cc-facebook btn btn-link" href="#"><i class="fa fa-facebook fa-2x " aria-hidden="true"></i></a><a class="cc-twitter btn btn-link " href="#"><i class="fa fa-twitter fa-2x " aria-hidden="true"></i></a><a class="cc-google-plus btn btn-link" href="#"><i class="fa fa-google-plus fa-2x" aria-hidden="true"></i></a><a class="cc-instagram btn btn-link" href="#"><i class="fa fa-instagram fa-2x " aria-hidden="true"></i></a></div>
    <div class="h4 title text-center">Benha Faculty of Engineering</div>
    <div class="text-center text-muted">
        <p>&copy; COPYRIGHT © 2022 BENHA FACULTY OF ENGINEERING ALL RIGHTS RESERVED.<br>Design - <a class="credit" href="https://www.linkedin.com/in/mahmoud-gouda-409382172/" target="_blank">Mahmoud Gouda</a></p>
    </div>
</footer>
<script src="js/core/jquery.3.2.1.min.js?ver=1.1.0"></script>
<script src="js/core/popper.min.js?ver=1.1.0"></script>
<script src="js/core/bootstrap.min.js?ver=1.1.0"></script>
<script src="js/now-ui-kit.js?ver=1.1.0"></script>
<script src="js/aos.js?ver=1.1.0"></script>
<script src="scripts/main.js?ver=1.1.0"></script>
<script src="keyboard.js"></script>
</body>
</html>
