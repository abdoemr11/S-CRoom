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
                <div class="navbar-translate"><a class="navbar-brand" href="/student-profile" rel="tooltip" id="pic"><img src="images/profile.png" width="50" height="50"></a></div>
                <div class="collapse navbar-collapse justify-content-end" id="navigation">
                    <ul class="navbar-nav">
                        <li class="nav-item"><a class="nav-link smooth-scroll" href="/stdlog">Home</a></li>
                        <li class="nav-item"><a class="nav-link smooth-scroll" href="#about">About</a></li>
                        <li class="nav-item"><a class="nav-link smooth-scroll" href="#experience">Courses</a></li>
                        <li class="nav-item"><a class="nav-link smooth-scroll" href="/logout/students">Logout</a></li>
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
                            <div class="cc-profile-image"><a href="#"><img src="images/cloud-database.png" alt="Image"/></a></div>
                            <div class="h2 title">
                                {{Auth::guard('students')->user()->first_name}}
                                {{Auth::guard('students')->user()->second_name}}
                                @php($user = Auth::guard('students')->user())
{{--                                {{$user}}--}}
                            </div>
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
                                    <div class="col-sm-4"><strong class="text-uppercase">Name:</strong></div>
                                    <div class="col-sm-8">{{$user->first_name . " ". $user->second_name . " ". $user->third_name . " ". $user->fourth_name}}</div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-sm-4"><strong class="text-uppercase">Year:</strong></div>
                                    <div class="col-sm-8">{{$user->current_year}}</div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-sm-4"><strong class="text-uppercase">Department:</strong></div>
                                    <div class="col-sm-8">[From database]</div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-sm-4"><strong class="text-uppercase">Email:</strong></div>
                                    <div class="col-sm-8">{{$user->email}}</div>
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
{{--                start card--}}
                <div class="card">
                    <div class="row">
                        <div class="col-md-3 bg-primary" data-aos="fade-right" data-aos-offset="50" data-aos-duration="500">
                            <div class="card-body cc-experience-header">
                                <div class="h5">[Name of the course1 from database]</div>
                            </div>
                        </div>
                        <div class="col-md-9" data-aos="fade-left" data-aos-offset="50" data-aos-duration="500">
                            <div class="card-body">
                                <p>[Discription of the course from database (added by admin)]</p>
                                <p>Number of bonuses: </p>
                                <p>Number of minuses: </p>
                                <p>Quizes grades: </p>
                                <p>Final test grade: </p>
                                <p>Total grade: </p>
                            </div>
                        </div>
                    </div>
                </div>
{{--                end card--}}

            </div>
        </div>
    </div>
</div>
<footer class="footer">
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
</body>
</html>
