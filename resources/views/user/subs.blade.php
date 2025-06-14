@extends('layouts.user')
@section('title', 'StudyIT')

@section('content')
<div class="container flex flex-row">
    <header class="w-full bg-sideBarLight h-12 border-2 border-textColorLight ">
    
    </header>
</div>
<!-- <body> -->
    <!-- Navbar  -->
    <!-- <header>
        <div class="navbar" id="home">
            <div class="container-fluid">
                <div class="nav-brand">
                    <img src="{{ asset('image/logo.png') }}" alt="Logo">
                    <h1>StudyIT</h1>
                </div>
                <button class="hamburger" onclick="toggleMenu()">☰</button>
                <div class="nav-menu">
                    <div class="nav-list">
                        <ul>
                            <li>
                                <span>
                                    <a href="#home">Home</a>
                                </span>
                            </li>
                            <li>
                                <a href="#bootcamp">Bootcamp</a>
                            </li>
                            <li>
                                <a href="/page/contactus.html">Contact Us</a>
                            </li>
                            <li>
                               <div class="dropdown">
                                <button class="dropdown-toggle"> {{ $students->username }}</button>
                                <div class="dropdown-content">
                                    <a href="editprofile.html">Edit Profile</a>
                                    <a href="/">Logout</a>
                                </div>
                               </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </header> -->

    <!-- End Navbar Section -->

    <!-- CTA Section -->
    <!-- <main>
        <div class="hero">
            <div class="content">
                <h1>Join The Next Generation Of</h1>
                <h1><span>Tech Innovators</span></h1>
                <h2>Learn the skills you need to succeed in the it industry in just 12 weeks</h2>
            </div>
            <div class="content-image">
                <img src="{{ asset('image/landing.png') }}" alt="" class="img-content">
            </div>
        </div>
          <div class="bootcamp-container">
            <h1 class="bootcamp" id="bootcamp">Courses</h1>
            <div class="row">
                <div class="container" id="course-container">
                    <div class="card" id="course-template" style="width: 18rem; display: none;">
                        <img src="" class="card-img-top" alt="">
                        <div class="card-body">
                            <p class="card-title"></p>
                            <p class="card-level"></p>
                            <div class="date-container">
                                <img src="{{ asset('image/date.png') }}" alt="Date Icon">
                                <p class="date-card"></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main> -->
    <!-- End Bootcamp Section -->
    <!-- <footer id="footer">
        <div class="container-content-footer">
            <div class="container-logo">
                <img src="{{ asset('image/Group.png') }}" alt="">
            </div>
            <div class="container-footer">
                <h1>StudyIT</h1>
                <div class="container-list">
                    <div class="About-us">
                        <h2>About Us</h2>
                        <div class="content-about">
                            <ul>
                                <li>Team</li>
                                <li>Mission</li>
                                <li>Newsletter</li>
                            </ul>
                        </div>
                    </div>
                    <div class="Support">
                        <h2>Support</h2>
                        <div class="content-support">
                            <ul>
                                <li><a href="..//page/contactus.html">Contact</a></li>
                                <li>FAQ's</li>
                                <li>Subscription</li>
                            </ul>
                        </div>
                    </div>
                    <div class="Socials">
                        <h2>Social</h2>
                        <div class="content-socials">
                            <ul>
                                <li>Instagram</li>
                                <li>Youtube</li>
                                <li>Linkedin</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <hr>
        <div class="container-copyright">
            <div class="copyright">
               
                    <p>© 2024 All Rights Reserved </p>
               
                <span>
                    <p>Terms and Condition</p>
                </span>
            </div>
            <div class="back-top">
                <a href="#home">
                    <p>Back to Top</p>
                </a>
                <img src="{{ asset('image/arrowup.png') }}" alt="">
            </div>
        </div>
        </div>
    </footer> -->


    <script src="{{ asset('js/subsUser.js') }}"></script>
</body>

</html>
