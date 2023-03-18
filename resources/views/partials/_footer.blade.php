<footer class="mt-auto">
    <div class="border-top row container-fluid d-flex bg-light text-dark pt-5 me-0 ms-0">
        <div class="col-xs-12 col-sm-6 col-md-4 d-flex justify-content-center">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <div class="d-flex align-items-center justify-content-center mb-3">
                        <h4 class="mb-0 d-flex align-items-center justify-content-center">
                            Quick Links
                        </h4>
                    </div>
                </li>
                <li class="nav-item">
                    <a href="{{ url('/') }}" class="nav-link">Home</a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('/courses') }}" class="nav-link">Courses</a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('/courses') }}" class="nav-link">About Us</a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('contact.show') }}" class="nav-link">Contact Us</a>
                </li>
            </ul>
        </div>

        <div class="col-xs-12 col-sm-6 col-md-4 d-flex justify-content-center">
            <ul class="navbar-nav">
                <li>
                    <h4 class="mb-4">Course Categories</h4>
                </li>
                <li class="nav-item">
                    <a class="nav-link">Business</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link">Accounting and Finance</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link">Computer Science</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link">Cybersecurity</a>
                </li>
            </ul>
        </div>

        <div class="col-xs-12 col-sm-6 col-md-4 d-flex justify-content-center">
            <ul class="navbar-nav">
                <li>
                    <h4 class="mb-4">Contact Information</h4>
                </li>
                <li class="nav-item">
                <span class="nav-link">
                    <span>
                        <i class="fa-regular fa-compass"></i>
                    </span>
                    <span class="mx-2">
                        Kuala Lumpur, Malaysia
                    </span>
                </span>
                </li>
                <li class="nav-item">
                <span class="nav-link">
                    <span>
                        <i class="fa-regular fa-envelope"></i>
                    </span>
                    <span class="mx-2">
                        info@opencourse.net
                    </span>
                </span>
                </li>
                <li class="nav-item">
                <span class="nav-link">
                    <span>
                        <i class="fa-solid fa-phone"></i>
                    </span>
                    <span class="mx-2">
                        <a href="tel:+60 18-280-5327" class="text-decoration-none">+60 18-280-5327</a>
                    </span>
                </span>
                </li>
            </ul>
        </div>
        <div class="w-100 mt-5 border-top py-4 mb-0">
            <div class="footer__bottom-container-fluid d-flex justify-content-center">
                <div class="footer__bottom-row footer__flex">
                <span class="footer__bottom-copyright">
                    Copyright &copy; <script>document.write(new Date().getFullYear().toString())</script>
                    <span class="team-name">R.A.C.Q</span>
                    All Rights Reserved.
                </span>
                </div>
            </div>
        </div>
    </div>
</footer>
