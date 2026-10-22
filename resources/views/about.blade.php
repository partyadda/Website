@extends('includes.layout')

@section('title', 'About PartyAdda | Private Theatre & Celebrations in Bangalore')

@section('keyword', 'private theatre Bangalore, private theatre AECS Layout, private theatre JP Nagar, birthday celebration Bangalore, anniversary surprise, romantic date Bangalore, marriage proposal venue, baby shower Bangalore, mom to be celebration, bride to be party, bachelorette party Bangalore, private movie screening, kids birthday party, surprise party venue')

@section('description', 'Celebrate birthdays, romantic dates, proposals, baby showers, mom-to-be and bride-to-be parties at PartyAdda private theatres in AECS Layout and JP Nagar, Bangalore.')

@section('content')

<style>
    .party-about {
        margin: 0;
        padding: 8px 0 0;
        background: #fff;
        color: #000;
        font-family: 'Montserrat', sans-serif;
        font-size: 14px;
        line-height: 1.6;
    }

    .party-about * { box-sizing: border-box; }

    .party-about h1,
    .party-about h2,
    .party-about h3 {
        padding: 0;
        color: inherit;
        font-family: inherit;
        font-weight: 700;
        line-height: 1.3;
    }

    .party-about h1 {
        margin: 0 0 12px;
        font-size: clamp(20px, 3vw, 26px);
    }

    .party-about h2 {
        margin: 0 0 12px;
        font-size: clamp(18px, 2.5vw, 22px);
    }

    .party-about h3 {
        margin: 0 0 8px;
        font-size: 16px;
    }

    .party-about p {
        margin: 0 0 8px;
        padding: 0;
        color: inherit;
        font-family: inherit;
        font-size: 14px;
        line-height: 1.6;
    }

    .party-about .about-section { padding: 20px 0; }
    .party-about > .about-section:first-child { padding-top: 0; }
    .party-about .section-dark { background: #fff; }

    .party-about .section-heading {
        margin-bottom: 16px;
        text-align: center;
    }

    .party-about .section-heading p {
        max-width: 800px;
        margin: 0 auto;
    }

    .party-about .celebration-card,
    .party-about .location-box {
        height: 100%;
        padding: 16px;
        border: 1px solid #e0e0e0;
        border-radius: 14px;
        background: #fff;
    }

    .party-about .celebration-card { transition: transform 0.25s ease; }
    .party-about .celebration-card:hover { transform: translateY(-5px); }
    .party-about .celebration-card p:last-child,
    .party-about .location-box p:last-child { margin-bottom: 0; }

    .party-about .about-image {
        width: 100%;
        max-height: 420px;
        object-fit: cover;
        border-radius: 16px;
    }

    .party-about .book-btn {
        display: inline-block;
        padding: 9px 24px;
        border: 1px solid #000;
        border-radius: 50px;
        background: #fff;
        color: #000;
        font-family: inherit;
        font-size: 14px;
        font-weight: 700;
        text-decoration: none;
        transition: background-color 0.25s ease;
    }

    .party-about .book-btn:hover { background: #f5f5f5; }

    .party-about .final-cta {
        padding: 24px 0;
        background: #fff;
        text-align: center;
    }

    .party-about .final-cta p {
        max-width: 750px;
        margin: 0 auto 10px;
    }

    @media (max-width: 767px) {
        .party-about .about-section { padding: 16px 0; }
        .party-about .celebration-card,
        .party-about .location-box { padding: 14px; }
        .party-about .final-cta { padding: 20px 0; }
    }
</style>


<div class="party-about">

    <!-- Introduction -->
    <section class="about-section">
        <div class="container">
            <div class="row align-items-center gy-3">

                <div class="col-lg-7">
                    <h1>Welcome to PartyAdda</h1>

                    <p>
                        Welcome to <strong>PartyAdda</strong>,
                        your destination for
                        <strong>private theatre celebrations,
                        birthday parties, romantic dates,
                        surprise proposals and special
                        occasions in Bangalore.</strong>
                    </p>

                    <p>
                        With branches in
                        <strong>AECS Layout and JP Nagar</strong>,
                        PartyAdda offers beautifully designed
                        private mini theatres, personalized
                        decorations, delicious food options,
                        DJ lights, vibrant selfie walls
                        and memorable celebration experiences.
                    </p>

                    <p>
                        Whether you're planning a
                        <strong>birthday celebration,
                        wedding anniversary, romantic date,
                        marriage proposal, baby shower,
                        mom-to-be celebration, bride-to-be
                        party or bachelorette party</strong>,
                        PartyAdda provides a private,
                        comfortable and stylish space
                        for your special moments.
                    </p>
                </div>

                <div class="col-lg-5">
                    <img
                        src="https://uat.partyadda.com/assets/img/theatre/banner_1.webp"
                        class="about-image"
                        alt="PartyAdda private theatre celebration venue in Bangalore"
                        loading="lazy">
                </div>

            </div>
        </div>
    </section>

    <!-- Celebrations -->
    <section class="about-section section-dark">
        <div class="container">

            <div class="section-heading">
                <h2>Celebrate Every Occasion at PartyAdda</h2>
                <p>
                    Discover personalized celebrations
                    in our private mini theatres,
                    designed for couples, families,
                    friends and small groups.
                </p>
            </div>

            <div class="row g-3">

                <div class="col-md-6">
                    <article class="celebration-card">
                        <h3>Birthday Parties & Surprise Celebrations</h3>
                        <p>
                            Make birthdays extra special with
                            themed decorations, balloon setups,
                            cakes, music and private cinema
                            experiences. From first birthday
                            celebrations and kids' birthday
                            parties to romantic birthday surprises
                            for your husband, wife, boyfriend
                            or girlfriend, PartyAdda makes
                            every birthday memorable.
                        </p>
                    </article>
                </div>

                <div class="col-md-6">
                    <article class="celebration-card">
                        <h3>Romantic Dates & Anniversary Celebrations</h3>
                        <p>
                            Enjoy romantic private theatre dates,
                            couple movie nights, anniversary
                            surprises and personalized romantic
                            decorations in Bangalore.
                            Celebrate your love with beautiful
                            lighting, music, memorable photos
                            and a private cinema experience.
                        </p>
                    </article>
                </div>

                <div class="col-md-6">
                    <article class="celebration-card">
                        <h3>Marriage Proposals & Romantic Surprises</h3>
                        <p>
                            Planning a surprise marriage proposal
                            in Bangalore? Create a beautiful
                            proposal experience with romantic
                            decorations, personalized arrangements,
                            music and a private theatre setting.
                            Make your special question
                            an unforgettable moment.
                        </p>
                    </article>
                </div>

                <div class="col-md-6">
                    <article class="celebration-card">
                        <h3>Baby Showers & Mom-to-Be Celebrations</h3>
                        <p>
                            Celebrate the journey of motherhood
                            with a memorable baby shower or
                            mom-to-be party in Bangalore.
                            Our private celebration spaces
                            are ideal for maternity celebrations,
                            themed baby shower decorations,
                            family gatherings and beautiful
                            photo-worthy moments.
                        </p>
                    </article>
                </div>

                <div class="col-md-6">
                    <article class="celebration-card">
                        <h3>Bride-to-Be & Bachelorette Parties</h3>
                        <p>
                            Celebrate the bride-to-be with
                            beautiful themed decorations,
                            vibrant selfie walls, DJ lights
                            and exciting party experiences.
                            Whether you're organizing a bridal
                            shower, surprise bride-to-be party
                            or bachelorette celebration,
                            PartyAdda offers a private setting
                            for unforgettable memories.
                        </p>
                    </article>
                </div>

                <div class="col-md-6">
                    <article class="celebration-card">
                        <h3>Private Movie Screenings & Group Parties</h3>
                        <p>
                            Experience private movie screenings
                            in Bangalore with your partner,
                            friends or family. Our mini theatres
                            are suitable for couple movie dates,
                            friendship celebrations,
                            family get-togethers,
                            reunion parties and intimate
                            group celebrations.
                        </p>
                    </article>
                </div>

            </div>
        </div>
    </section>

    <!-- Why PartyAdda -->
    <section class="about-section">
        <div class="container">

            <h2 class="text-center">
                Why Choose PartyAdda?
            </h2>

            <div class="row g-3">

                <div class="col-md-6">
                    <div class="celebration-card">
                        <h3>Private Mini Theatre Experience</h3>
                        <p>
                            Celebrate with your loved ones
                            in a private cinema setting,
                            enjoying entertainment,
                            comfort and privacy.
                        </p>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="celebration-card">
                        <h3>Customized Theme Decorations</h3>
                        <p>
                            Personalize your celebration
                            with beautiful birthday,
                            anniversary, baby shower,
                            bride-to-be and romantic
                            decoration themes.
                        </p>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="celebration-card">
                        <h3>Food & Celebration Add-ons</h3>
                        <p>
                            Enhance your celebration
                            with food options, cakes,
                            music, DJ lights and
                            additional services based
                            on your chosen package.
                        </p>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="celebration-card">
                        <h3>Photo-Worthy Celebration Spaces</h3>
                        <p>
                            Capture beautiful memories
                            with themed decorations,
                            vibrant selfie walls
                            and personalized celebration
                            backdrops.
                        </p>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- Locations -->
    <section class="about-section section-dark">
        <div class="container">

            <div class="section-heading">
                <h2>
                    PartyAdda Private Theatres in Bangalore
                </h2>
                <p>
                    Celebrate at either of our Bangalore
                    branches and enjoy a personalized
                    private theatre experience.
                </p>
            </div>

            <div class="row g-3">

                <div class="col-md-6">
                    <div class="location-box">
                        <h3>PartyAdda – AECS Layout</h3>
                        <p>
                            Looking for a private theatre
                            in AECS Layout, Bangalore?
                            Celebrate birthdays,
                            romantic dates, anniversaries,
                            baby showers and special
                            occasions with personalized
                            arrangements at PartyAdda.
                        </p>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="location-box">
                        <h3>PartyAdda – JP Nagar</h3>
                        <p>
                            Discover private theatre
                            celebrations in JP Nagar,
                            Bangalore, for birthday
                            surprises, marriage proposals,
                            mom-to-be celebrations,
                            bride-to-be parties and
                            memorable group experiences.
                        </p>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- Final CTA -->
    <section class="final-cta">
        <div class="container">

            <h2>
                Make Every Celebration a Beautiful Memory!
            </h2>

            <p>
                At PartyAdda, we don't just provide
                private theatres — we create memorable
                experiences filled with love,
                laughter, happiness and surprises.
            </p>

            <p>
                <strong>
                    Your Occasion. Your People.
                    Your Private Celebration.
                </strong>
            </p>

            <p>
                Celebrate Differently.
                Celebrate Beautifully.
                Celebrate at PartyAdda!
            </p>

            <a href="{{ url('/') }}#book_now_section"
               class="book-btn">
                Book Now
            </a>

        </div>
    </section>

</div>

@endsection

