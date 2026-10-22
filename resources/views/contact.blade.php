@extends('includes.layout')

@section('title', 'Contact PartyAdda | Private Theatre Celebrations Bangalore')

@section('keyword', 'PartyAdda contact, private theatre Bangalore, private theatre AECS Layout, private theatre JP Nagar, birthday celebration Bangalore, romantic date, marriage proposal, anniversary celebration, baby shower, mom to be, bride to be, bachelorette party')

@section('description', 'Contact PartyAdda in AECS Layout, Brookefield and JP Nagar, Bangalore for private theatre bookings, birthdays, romantic dates, proposals, baby showers and special celebrations.')

@section('content')

<style>
    .party-contact {
        margin: 0;
        padding: 8px 0 0;
        background: #fff;
        color: #000;
        font-family: 'Montserrat', sans-serif;
        font-size: 14px;
        line-height: 1.6;
    }

    .party-contact * { box-sizing: border-box; }

    .party-contact h1,
    .party-contact h2,
    .party-contact h3 {
        margin: 0 0 8px;
        padding: 0;
        color: inherit;
        font-family: inherit;
        font-weight: 700;
        line-height: 1.3;
    }

    .party-contact h1 { font-size: clamp(20px, 3vw, 26px); }
    .party-contact h2 { font-size: clamp(18px, 2.5vw, 22px); }
    .party-contact h3 { font-size: 16px; }

    .party-contact p {
        margin: 0 0 8px;
        padding: 0;
        color: inherit;
        font-family: inherit;
        font-size: 14px;
        line-height: 1.6;
        overflow-wrap: break-word;
    }

    .party-contact .contact-hero {
        padding: 0 0 16px;
        background: #fff;
        text-align: center;
    }

    .party-contact .contact-section { padding: 20px 0; }
    .party-contact .section-dark { background: #fff; }

    .party-contact .contact-card,
    .party-contact .occasion-card {
        height: 100%;
        padding: 16px;
        border: 1px solid #e0e0e0;
        border-radius: 14px;
        background: #fff;
    }

    .party-contact .contact-detail {
        display: flex;
        align-items: flex-start;
        gap: 10px;
        margin: 12px 0;
    }

    .party-contact .contact-detail i {
        color: inherit;
        font-size: 18px;
        line-height: 1.6;
    }

    .party-contact .contact-detail p,
    .party-contact .occasion-card p:last-child { margin-bottom: 0; }
    .party-contact .contact-detail a { color: inherit; text-decoration: none; }
    .party-contact .contact-detail a:hover { text-decoration: underline; }

    .party-contact .btn-gold,
    .party-contact .btn-outline-gold {
        display: inline-block;
        padding: 9px 20px;
        border: 1px solid #ffd76a;
        border-radius: 40px;
        background: #ffd76a;
        color: #000;
        font-family: inherit;
        font-size: 14px;
        font-weight: 700;
        line-height: 1.6;
        text-align: center;
        text-decoration: none;
        transition: background-color 0.25s ease, border-color 0.25s ease;
    }

    .party-contact .btn-gold:hover,
    .party-contact .btn-outline-gold:hover {
        border-color: #f4c542;
        background: #f4c542;
        color: #000;
    }

    .party-contact .occasion-card > i { font-size: 24px; }
    .party-contact .occasion-card h3 { margin-top: 8px; }

    .party-contact .accordion-item {
        margin-bottom: 8px;
        overflow: hidden;
        border: 1px solid #e0e0e0;
        border-radius: 12px;
        background: #fff;
    }

    .party-contact .accordion-header { margin: 0; }

    .party-contact .accordion-button,
    .party-contact .accordion-button:not(.collapsed) {
        padding: 12px 14px;
        background: #fff;
        color: #000;
        font-family: inherit;
        font-size: 14px;
        font-weight: 600;
        line-height: 1.5;
        box-shadow: none;
    }

    .party-contact .accordion-button::after { filter: brightness(0); }

    .party-contact .accordion-body {
        padding: 10px 14px;
        background: #fff;
        color: #000;
        font-family: inherit;
        font-size: 14px;
        line-height: 1.6;
    }

    .party-contact .accordion-button:focus-visible,
    .party-contact a:focus-visible {
        outline: 3px solid #000;
        outline-offset: 3px;
    }

    .party-contact .final-cta {
        padding: 24px 0;
        background: #fff;
        text-align: center;
    }

    @media (max-width: 767px) {
        .party-contact .contact-section { padding: 16px 0; }
        .party-contact .contact-card,
        .party-contact .occasion-card { padding: 14px; }
        .party-contact .final-cta { padding: 20px 0; }
        .party-contact .contact-hero .btn { width: 100%; }
    }
</style>


<div class="party-contact">

    <!-- Contact Hero -->
    <section class="contact-hero">
        <div class="container">

            <h1>
                Contact PartyAdda – Private Theatre
                Celebrations in Bangalore
            </h1>

            <p class="lead mx-auto mt-3"
               style="max-width:800px">
                Planning a birthday, anniversary,
                romantic date, marriage proposal,
                baby shower, mom-to-be or
                bride-to-be celebration?
                Get in touch with PartyAdda
                to plan your special occasion.
            </p>

            <div class="d-flex flex-column flex-sm-row
                        justify-content-center gap-2 mt-3">

                <a class="btn btn-gold"
                   href="https://wa.me/918217575597?text=Hi%20PartyAdda%2C%20I%20would%20like%20to%20enquire%20about%20a%20celebration."
                   target="_blank"
                   rel="noopener noreferrer">
                    Chat on WhatsApp
                </a>

                <a class="btn btn-outline-gold"
                   href="{{ url('/') }}#book_now_section">
                    Book Now
                </a>

            </div>
        </div>
    </section>

    <!-- Branches -->
    <section class="contact-section"
             aria-labelledby="locations">
        <div class="container">

            <div class="text-center mb-3">
                <h2 id="locations">
                    Visit Our PartyAdda Locations
                </h2>
                <p>
                    Choose your preferred Bangalore branch
                    for bookings, packages and enquiries.
                </p>
            </div>

            <div class="row g-3">

                <!-- AECS Layout -->
                <div class="col-lg-6">
                    <article class="contact-card">

                        <h3>
                            <i class="bi bi-geo-alt-fill me-2"></i>
                            PartyAdda – AECS Layout
                        </h3>

                        <p>Brookefield, Bangalore</p>

                        <div class="contact-detail">
                            <i class="bi bi-geo-alt"></i>
                            <div>
                                <strong>Address</strong>
                                <p>
                                    2nd Floor, AECS Layout Main Road,
                                    C Block, Brookefield,
                                    Bengaluru, Karnataka 560037
                                </p>
                            </div>
                        </div>

                        <div class="contact-detail">
                            <i class="bi bi-telephone"></i>
                            <div>
                                <strong>Phone</strong>
                                <p>
                                    <a href="tel:+918217575597">
                                        +91 82175 75597
                                    </a>
                                </p>
                            </div>
                        </div>

                        <div class="d-grid gap-2 mt-3">

                            <a class="btn-gold"
                               href="https://wa.me/918217575597?text=Hi%20PartyAdda%2C%20I%20want%20to%20book%20the%20AECS%20Layout%20branch."
                               target="_blank"
                               rel="noopener noreferrer">
                                <i class="bi bi-whatsapp me-2"></i>
                                WhatsApp AECS Layout
                            </a>

                            <a class="btn-outline-gold"
                               href="https://maps.app.goo.gl/LaXeL6FeGRS3MGpG7"
                               target="_blank"
                               rel="noopener noreferrer">
                                <i class="bi bi-map me-2"></i>
                                Get Directions
                            </a>

                        </div>
                    </article>
                </div>

                <!-- JP Nagar -->
                <div class="col-lg-6">
                    <article class="contact-card">

                        <h3>
                            <i class="bi bi-geo-alt-fill me-2"></i>
                            PartyAdda – JP Nagar
                        </h3>

                        <p>JP Nagar 4th Phase, Bangalore</p>

                        <div class="contact-detail">
                            <i class="bi bi-geo-alt"></i>
                            <div>
                                <strong>Address</strong>
                                <p>
                                    3rd Floor, No. 10,
                                    Dr Puneeth Rajkumar Road,
                                    Dollar Layout, JP Nagar 4th Phase,
                                    Bengaluru, Karnataka 560078
                                </p>
                            </div>
                        </div>

                        <div class="contact-detail">
                            <i class="bi bi-telephone"></i>
                            <div>
                                <strong>Phone</strong>
                                <p>
                                    <a href="tel:+919845740260">
                                        +91 98457 40260
                                    </a>
                                </p>
                            </div>
                        </div>

                        <div class="d-grid gap-2 mt-3">

                            <a class="btn-gold"
                               href="https://wa.me/919845740260?text=Hi%20PartyAdda%2C%20I%20want%20to%20book%20the%20JP%20Nagar%20branch."
                               target="_blank"
                               rel="noopener noreferrer">
                                <i class="bi bi-whatsapp me-2"></i>
                                WhatsApp JP Nagar
                            </a>

                            <a class="btn-outline-gold"
                               href="https://maps.app.goo.gl/b1Y1KR5tBHyGmrtJA"
                               target="_blank"
                               rel="noopener noreferrer">
                                <i class="bi bi-map me-2"></i>
                                Get Directions
                            </a>

                        </div>
                    </article>
                </div>

            </div>
        </div>
    </section>

    <!-- Occasions -->
    <section class="contact-section section-dark"
             aria-labelledby="celebrations">
        <div class="container">

            <div class="text-center mb-3">
                <h2 id="celebrations">
                    Celebrations We Help You Plan
                </h2>
                <p>
                    Personalized private theatre
                    experiences for your special moments.
                </p>
            </div>

            <div class="row g-3">

                <div class="col-md-6 col-lg-3">
                    <article class="occasion-card">
                        <i class="bi bi-balloon-heart"></i>
                        <h3>Birthday Parties</h3>
                        <p>
                            Birthday surprises, kids' birthdays,
                            themed decorations and private
                            cinema celebrations.
                        </p>
                    </article>
                </div>

                <div class="col-md-6 col-lg-3">
                    <article class="occasion-card">
                        <i class="bi bi-hearts"></i>
                        <h3>Romantic Celebrations</h3>
                        <p>
                            Anniversary surprises,
                            romantic date nights,
                            marriage proposals
                            and couple celebrations.
                        </p>
                    </article>
                </div>

                <div class="col-md-6 col-lg-3">
                    <article class="occasion-card">
                        <i class="bi bi-gem"></i>
                        <h3>Bride-to-Be Parties</h3>
                        <p>
                            Bride-to-be celebrations,
                            bridal showers and
                            bachelorette gatherings
                            with personalized themes.
                        </p>
                    </article>
                </div>

                <div class="col-md-6 col-lg-3">
                    <article class="occasion-card">
                        <i class="bi bi-stars"></i>
                        <h3>Baby Showers</h3>
                        <p>
                            Mom-to-be celebrations,
                            baby showers and intimate
                            family gatherings with
                            beautiful decorations.
                        </p>
                    </article>
                </div>

            </div>
        </div>
    </section>

    <!-- Compact FAQ -->
    <section class="contact-section"
             aria-labelledby="contact-faq-title">
        <div class="container">

            <h2 id="contact-faq-title"
                class="text-center mb-3">
                Contact & Booking FAQs
            </h2>

            <div class="accordion"
                 id="contactFaq">

                <div class="accordion-item">
                    <h3 class="accordion-header">
                        <button class="accordion-button"
                                type="button"
                                data-bs-toggle="collapse"
                                data-bs-target="#contactFaq1"
                                aria-expanded="true"
                                aria-controls="contactFaq1">
                            How can I book a private theatre?
                        </button>
                    </h3>

                    <div id="contactFaq1"
                         class="accordion-collapse collapse show"
                         data-bs-parent="#contactFaq">
                        <div class="accordion-body">
                            You can book through our website
                            or contact your preferred branch
                            on WhatsApp to enquire about
                            packages and available slots.
                        </div>
                    </div>
                </div>

                <div class="accordion-item">
                    <h3 class="accordion-header">
                        <button class="accordion-button collapsed"
                                type="button"
                                data-bs-toggle="collapse"
                                data-bs-target="#contactFaq2"
                                aria-expanded="false"
                                aria-controls="contactFaq2">
                            Can I customize my celebration?
                        </button>
                    </h3>

                    <div id="contactFaq2"
                         class="accordion-collapse collapse"
                         data-bs-parent="#contactFaq">
                        <div class="accordion-body">
                            Yes. Contact our team to discuss
                            decoration themes, cakes,
                            food options and other
                            celebration add-ons.
                            Availability and pricing
                            depend on your requirements.
                        </div>
                    </div>
                </div>

                <div class="accordion-item">
                    <h3 class="accordion-header">
                        <button class="accordion-button collapsed"
                                type="button"
                                data-bs-toggle="collapse"
                                data-bs-target="#contactFaq3"
                                aria-expanded="false"
                                aria-controls="contactFaq3">
                            How do I check availability?
                        </button>
                    </h3>

                    <div id="contactFaq3"
                         class="accordion-collapse collapse"
                         data-bs-parent="#contactFaq">
                        <div class="accordion-body">
                            Share your preferred branch,
                            celebration date, time and
                            number of guests with our team.
                            We can help you check
                            available booking options.
                        </div>
                    </div>
                </div>

            </div>

            <div class="text-center mt-3">
                <a href="{{ url('faq') }}"
                   class="btn-outline-gold">
                    View All FAQs
                </a>
            </div>

        </div>
    </section>

    <!-- Final Booking CTA -->
    <section class="final-cta">
        <div class="container">

            <h2>
                Ready to Celebrate at PartyAdda?
            </h2>

            <p class="mx-auto mb-3"
               style="max-width:650px">
                Get in touch with our team
                and plan your next unforgettable
                private theatre celebration.
            </p>

            <a href="{{ url('/') }}#book_now_section"
               class="btn-gold">
                Book Your Celebration
            </a>

        </div>
    </section>

</div>

@endsection

