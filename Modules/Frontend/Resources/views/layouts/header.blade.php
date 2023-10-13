<!-- Scroll To Top Start-->
<a href="javascript:void(0)" class="scrollToTop"><i class="fas fa-angle-double-up"></i></a>
<!-- Scroll To Top End -->
<!-- header-section start -->
<header class="header-section">
    <div class="overlay">
        <div class="container">
            <div class="row d-flex header-area">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <a class="navbar-brand" href="{{ route('index') }}">
                        <img src="{{ asset($sitedetail->logo) }}" class="logo" alt="{{ $sitedetail->title }}" title="{{ $sitedetail->title }}">
                    </a>
                    <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbar-content">
                    <i class="fas fa-bars"></i>
                    </button>
                    <div class="collapse navbar-collapse justify-content-end" id="navbar-content">
                        <ul class="navbar-nav mr-auto mb-2 mb-lg-0">
                            <li class="nav-item dropdown main-navbar">
                                <a class="nav-link dropdown-toggle" href="{{ route('index') }}"
                                data-bs-auto-close="outside">Home</a>
                                
                            </li>
                            <li class="nav-item dropdown main-navbar">
                                <a class="nav-link dropdown-toggle" href="{{ route('about') }}"
                                data-bs-auto-close="outside">About Us</a>
                                
                            </li>
                            
                            <li class="nav-item dropdown main-navbar">
                                <a class="nav-link dropdown-toggle" href="{{ route('contact') }}"
                                data-bs-auto-close="outside">Contact Us</a>
                                
                            </li>
                        </ul>
                        
                    </div>
                </nav>
            </div>
        </div>
    </div>
</header>
<!-- header-section end -->