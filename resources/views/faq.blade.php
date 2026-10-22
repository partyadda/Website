@extends('includes.layout')

@section('title','Frequently Asked Questions About Private Theatre Booking in Bangalore')
@section('keyword','private theater, private theater in Marathahalli, private movie theater, mini theater, mini party hall, party venue, celebration venue, birthday celebration, birthday parties, surprise birthday celebration, kids birthday party, first birthday, children’s birthday, baby birthday venues, baby shower halls, bride-to-be celebration, bachelorette party, mom-to-be celebration, hosting baby birthday, small get-togethers, group party, place for celebration, party venues and ideas, budget-friendly celebration, birthday places for couples, binge watch party, fun places in Bangalore')
@section('description','PartyAdda offers private theatre celebrations in Bangalore with customizable packages for birthdays, bride to be, anniversaries, baby shower, mom to be,couples, family gatherings, and special events—fun, memorable, and affordable.')
@section('content')
      
      
      
<style>
/* PartyAdda FAQ - White Theme */

.party-faq {
    --bg: #FFFFFF;
    --dark: #FFFFFF;
    --panel: #FFFFFF;
    --text: #000000;
    --muted: #000000;
    --accent: #000000;
    --line: #E0E0E0;

    background: var(--bg);
    color: var(--text);
    min-height: 100vh;
    padding: 50px 0 70px;
    font: 16px/1.65 system-ui, sans-serif;
}

.party-faq {
    padding-top: 0 !important;
}

.party-faq main {
    padding-top: 0 !important;
}

.party-faq .eyebrow {
    margin-top: 0 !important;
}

.party-faq * {
    box-sizing: border-box;
}

/* Main FAQ Container */
.party-faq main {
    width: 100%;
    max-width: 880px;
    margin: auto;
    padding: 35px 0;
}

/* Introductory Text */
.party-faq .eyebrow {
    color: #000000;
    font-size: 18px;
    font-weight: 700;
    line-height: 1.7;
    margin: 0 0 35px;
}

/* FAQ Grid */
.party-faq .faqs {
    display: grid;
    gap: 14px;
}

/* FAQ Cards */
.party-faq details {
    background: #FFFFFF;
    border: 1px solid #E0E0E0;
    border-radius: 16px;
    overflow: hidden;
    transition: background 0.2s ease;
}

/* Expanded Question */
.party-faq details[open] {
    background: #FFFFFF;
    border-color: #CCCCCC;
}

/* Question Heading */
.party-faq summary {
    cursor: pointer;
    display: flex;
    align-items: center;
    gap: 16px;
    list-style: none;
    padding: 22px 24px;
    font-weight: 650;
    line-height: 1.5;
    color: #000000;
}

.party-faq summary::-webkit-details-marker {
    display: none;
}

.party-faq summary:hover {
    background: #F7F7F7;
}

/* Question Number */
.party-faq .number {
    color: #000000;
    font-size: 13px;
    font-weight: 800;
    flex: 0 0 24px;
}

/* Question Text */
.party-faq .question {
    flex: 1;
    color: #000000;
}

/* Plus and Minus Icons */
.party-faq summary::after {
    content: "+";
    font-size: 26px;
    font-weight: 400;
    color: #000000;
    line-height: 1;
    flex: 0 0 20px;
    text-align: center;
}

.party-faq details[open] summary::after {
    content: "−";
}

/* Answers */
.party-faq .answer {
    padding: 0 60px 24px 64px;
    color: #000000;
    font-size: 15px;
    line-height: 1.9;
}

.party-faq .answer p {
    margin: 0;
    color: #000000;
}

/* Policy Note */
.party-faq .policy-note {
    margin: 24px 0 0;
    padding: 16px 20px;
    border-left: 3px solid #000000;
    color: #000000;
    background: #F7F7F7;
    font-size: 14px;
}

/* Accessibility */
.party-faq summary:focus-visible,
.party-faq a:focus-visible {
    outline: 3px solid #000000;
    outline-offset: 3px;
}

/* Mobile Responsive */
@media (max-width: 560px) {
    .party-faq {
        padding: 30px 0 50px;
    }

    .party-faq main {
        padding: 20px 0;
    }

    .party-faq .eyebrow {
        font-size: 16px;
    }

    .party-faq summary {
        padding: 20px 16px;
        gap: 10px;
    }

    .party-faq .number {
        flex-basis: 20px;
    }

    .party-faq .answer {
        padding: 0 20px 22px 46px;
    }
}

/* Print Friendly */
@media print {
    .party-faq {
        background: #FFFFFF;
        color: #000000;
    }

    .party-faq details {
        background: #FFFFFF;
        color: #000000;
        border: 1px solid #CCCCCC;
        break-inside: avoid;
    }

    .party-faq .question,
    .party-faq .answer,
    .party-faq .answer p {
        color: #000000;
    }
}
</style>

<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "FAQPage",
  "mainEntity": [
    {
      "@type": "Question",
      "name": "Which movies or shows can we watch? Can we play our own videos?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Yes. You can connect your own OTT accounts or phone through Chromecast and play content of your choice. PartyAdda provides the setup only; we do not provide movies, shows or OTT accounts."
      }
    },
    {
      "@type": "Question",
      "name": "Can we use a pendrive or laptop?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "No. We do not support pendrives or laptops for casting or watching movies."
      }
    },
    {
      "@type": "Question",
      "name": "Is any content prohibited?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Customers must not stream content that is illegal or prohibited under Indian laws. We accept no liability for consequences arising from a violation of this condition. Customers who violate it will not be allowed to book with us again."
      }
    },
    {
      "@type": "Question",
      "name": "What is the refund policy?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "The supplied refund policy states: “Hours Before the slot time. No refund for bookings which are less than 72 hrs from payment time.” This wording is incomplete and does not clearly specify a cancellation deadline or other refund terms. Please confirm the applicable policy with PartyAdda before booking."
      }
    },
    {
      "@type": "Question",
      "name": "What happens if there is a technical interruption?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "For a technical interruption from our end involving failure of the projector, laptop, internet access or sound system, we will reimburse the paid amount after deducting the rent for the period before the interruption."
      }
    },
    {
      "@type": "Question",
      "name": "Who is responsible for personal belongings?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Customers are responsible for their personal belongings. We will not be responsible for loss of personal belongings of any nature."
      }
    },
    {
      "@type": "Question",
      "name": "Does the booking period include setup and checkout?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Yes. Your booking period includes setup and checkout time. Customers must vacate the theater with all their belongings on or before the end time."
      }
    },
    {
      "@type": "Question",
      "name": "Can we change the equipment settings?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Customers must not adjust or modify the configuration of the projector, screen, laptop or sound system. If changes are required, our team will make them."
      }
    },
    {
      "@type": "Question",
      "name": "Can couples under 18 book the theater?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "No. Couples below 18 years of age are not permitted to book. Aadhaar cards or driving licences are checked for all bookings. Minor group bookings are permitted."
      }
    },
    {
      "@type": "Question",
      "name": "Who pays for any damage?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Customers are liable to pay for any damage."
      }
    }
  ]
}
</script>
    <div class="container-fluid party-faq">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<main id="main">
					<p class="eyebrow">Everything you need to know about your booking and our theater policies.</p>
						<section class="faqs" aria-label="Frequently asked questions">
							<details>
								<summary>
									<span class="number" aria-hidden="true">01</span>
									<span class="question">Which movies or shows can we watch? Can we play our own videos?</span>
								</summary>
								<div class="answer">
									<p>Yes. You can connect your own OTT accounts or phone through Chromecast and play content of your choice. PartyAdda provides the setup only; we do not provide movies, shows or OTT accounts.</p>
								</div>
							</details>
							<details>
								<summary>
									<span class="number" aria-hidden="true">02</span>
									<span class="question">Can we use a pendrive or laptop?</span>
								</summary>
								<div class="answer">
									<p>No. We do not support pendrives or laptops for casting or watching movies.</p>
								</div>
							</details>
							<details>
								<summary>
									<span class="number" aria-hidden="true">03</span>
									<span class="question">Is any content prohibited?</span>
								</summary>
								<div class="answer">
									<p>Customers must not stream content that is illegal or prohibited under Indian laws. We accept no liability for consequences arising from a violation of this condition. Customers who violate it will not be allowed to book with us again.</p>
								</div>
							</details>
							<details>
								<summary>
									<span class="number" aria-hidden="true">04</span>
									<span class="question">What is the refund policy?</span>
								</summary>
								<div class="answer">
									<p>The supplied refund policy states: “Hours Before the slot time. No refund for bookings which are less than 72 hrs from payment time.” This wording is incomplete and does not clearly specify a cancellation deadline or other refund terms. Please confirm the applicable policy with PartyAdda before booking.</p>
								</div>
							</details>
							<details>
								<summary>
									<span class="number" aria-hidden="true">05</span>
									<span class="question">What happens if there is a technical interruption?</span>
								</summary>
								<div class="answer">
									<p>For a technical interruption from our end involving failure of the projector, laptop, internet access or sound system, we will reimburse the paid amount after deducting the rent for the period before the interruption.</p>
								</div>
							</details>
							<details>
								<summary>
									<span class="number" aria-hidden="true">06</span>
									<span class="question">Who is responsible for personal belongings?</span>
								</summary>
								<div class="answer">
									<p>Customers are responsible for their personal belongings. We will not be responsible for loss of personal belongings of any nature.</p>
								</div>
							</details>
							<details>
								<summary>
									<span class="number" aria-hidden="true">07</span>
									<span class="question">Does the booking period include setup and checkout?</span>
								</summary>
								<div class="answer">
									<p>Yes. Your booking period includes setup and checkout time. Customers must vacate the theater with all their belongings on or before the end time.</p>
								</div>
							</details>
							<details>
								<summary>
									<span class="number" aria-hidden="true">08</span>
									<span class="question">Can we change the equipment settings?</span>
								</summary>
								<div class="answer">
									<p>Customers must not adjust or modify the configuration of the projector, screen, laptop or sound system. If changes are required, our team will make them.</p>
								</div>
							</details>
							<details>
								<summary>
									<span class="number" aria-hidden="true">09</span>
									<span class="question">Can couples under 18 book the theater?</span>
								</summary>
								<div class="answer">
									<p>No. Couples below 18 years of age are not permitted to book. Aadhaar cards or driving licences are checked for all bookings. Minor group bookings are permitted.</p>
								</div>
							</details>
							<details>
								<summary>
									<span class="number" aria-hidden="true">10</span>
									<span class="question">Who pays for any damage?</span>
								</summary>
								<div class="answer">
									<p>Customers are liable to pay for any damage.</p>
								</div>
							</details>
						</section>
					</main>
				</div>
			</div>
		</div>
	</div>
</div>
<button onclick="topFunction()" id="myBtn" title="Go to top">
	<svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
		<path d="M9 2.25V15.75" stroke="#404040" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
		<path d="M4.5 6.75L9 2.25L13.5 6.75" stroke="#404040" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
	</svg>
</button>
<a href="https://wa.me/" class="whatsapp-buttons" aria-label="WhatsApp">
	<img src="{{URL::asset('assets/img/whatsapp-icon.png')}}"/>
</a>
      @endsection
    