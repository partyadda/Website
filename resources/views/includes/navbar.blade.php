
<!-- PartyAdda Navigation Start -->
<nav
    class="navbar navbar-expand-lg"
    aria-label="PartyAdda main navigation">

    <div class="container">

        <!-- PartyAdda Logo -->
        <a
            class="navbar-brand"
            href="{{ url('/') }}"
            aria-label="PartyAdda Home">

            <img
                src="{{ URL::asset('assets/img/logo.png') }}"
                alt="PartyAdda Logo"
                width="54"
                height="54">
        </a>

        <!-- Mobile Navigation Toggle -->
        <button
            class="navbar-toggler"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#partyAddaNavbar"
            aria-controls="partyAddaNavbar"
            aria-expanded="false"
            aria-label="Toggle navigation">

            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Navigation Menu -->
        <div
            class="collapse navbar-collapse"
            id="partyAddaNavbar">

            <ul class="navbar-nav ms-auto mb-2 mb-lg-0 align-items-lg-center">

                <!-- AECS Layout -->
                <li class="nav-item">
                    <a
                        class="nav-link"
                        href="{{ url('/branch/aecslayout') }}">
                        AECS Layout
                    </a>
                </li>

                <!-- JP Nagar -->
                <li class="nav-item">
                    <a
                        class="nav-link"
                        href="{{ url('/branch/jpnagar') }}">
                        JP Nagar
                    </a>
                </li>

                <!-- About Us -->
                <li class="nav-item">
                    <a
                        class="nav-link"
                        href="{{ url('about') }}">
                        About Us
                    </a>
                </li>

                <!-- FAQs -->
                <li class="nav-item">
                    <a
                        class="nav-link"
                        href="{{ url('faq') }}">
                        FAQs
                    </a>
                </li>

                <!-- Blog -->
                <li class="nav-item">
                    <a
                        class="nav-link"
                        href="{{ url('blog') }}">
                        Blog
                    </a>
                </li>

                <!-- Contact Us -->
                <li class="nav-item">
                    <a
                        class="nav-link"
                        href="{{ url('contact') }}">
                        Contact Us
                    </a>
                </li>

                <!-- Phone Number 1 -->
                <li class="nav-item">
                    <a
                        href="tel:+919845740260"
                        class="nav-link text-decoration-none"
                        aria-label="Call PartyAdda at 9845740260">

                        <img
                            src="{{ URL::asset('assets/img/phoneIcon.png') }}"
                            alt=""
                            width="14"
                            height="14">

                        9845740260
                    </a>
                </li>

                <!-- Phone Number 2 -->
                <li class="nav-item">
                    <a
                        href="tel:+918217575597"
                        class="nav-link text-decoration-none"
                        aria-label="Call PartyAdda at 8217575597">
                        8217575597
                    </a>
                </li>

                <!-- Conditional Book Now Button -->
                @if(
                    Request::is('/') ||
                    Request::is('about') ||
                    Request::is('faq') ||
                    Request::is('refund') ||
                    Request::is('privacy') ||
                    Request::is('terms') ||
                    Request::is('contact') ||
                    Request::is('blog')
                )

                    <li class="nav-item ms-lg-3">
                        <a
                            class="nav-link btn-dark text-light rounded-pill text-center px-4"
                            href="{{ url('/') }}#book_now_section">

                            Book Now
                        </a>
                    </li>

                @endif

            </ul>

        </div>

    </div>

</nav>
<!-- PartyAdda Navigation End -->
