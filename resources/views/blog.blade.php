@extends('includes.layout')

@section('title', 'Birthday, Bride-to-Be & Anniversary Party Ideas | PartyAdda Bangalore')
@section('keyword', 'kids birthday party places in Bangalore, 1st birthday celebration Bangalore, private theatre birthday party, bride to be party Bangalore, bachelorette party venue Bangalore, wedding anniversary celebration Bangalore, private theatre JP Nagar, private theatre AECS Layout Brookefield, birthday decoration, customised cake')
@section('description', 'Explore birthday party checklists, bride-to-be party ideas and romantic anniversary celebrations at PartyAdda private theatres in JP Nagar and AECS Layout, Bangalore.')

@section('content')
<style>
/* PartyAdda Blog - White Theme */

.party-blog {
    --purple: #FFFFFF;
    --deep: #FFFFFF;
    --panel: #FFFFFF;
    --gold: #FFD76A;
    --muted: #000000;

    background: #FFFFFF;
    color: #000000;
    line-height: 1.8;
    padding: 0 !important;
}

.party-blog * {
    box-sizing: border-box;
}

/* Headings */
.party-blog h1 {
    color: #000000;
    font-size: clamp(29px, 4vw, 43px);
    font-weight: 800;
    line-height: 1.25;
   margin-bottom: 8px;
}

.party-blog h2 {
    color: #000000;
    font-size: clamp(24px, 3vw, 32px);
    font-weight: 750;
    margin-bottom: 8px;
}

.party-blog h3 {
    color: #000000;
    font-size: 21px;
    font-weight: 700;
    margin-bottom: 8px;
}

/* Paragraphs and Lists */
.party-blog p,
.party-blog li {
    color: #000000;
    font-size: 16px;
    line-height: 1.85;
}



.party-blog strong {
    color: #000000;
}

/* Blog Hero */
.party-blog .blog-hero {
    background: #FFFFFF;
    padding: 10px 12px;
    text-align: center;
}

.party-blog .blog-hero p {
    max-width: 850px;
    margin: auto;
}

/* Brand Badge */
.party-blog .brand-badge {
    display: inline-block;
    background: #FFFFFF;
    border: 1px solid #E0E0E0;
    color: #000000;
    padding: 6px 18px;
    border-radius: 30px;
    font-weight: 700;
    font-size: 13px;
    margin-bottom: 20px;
}

/* Article Sections */
.party-blog .article-section {
    padding: 45px 0;
    scroll-margin-top: 90px;
}

.party-blog .section-dark {
    background: #FFFFFF;
}

/* Article Cards */
.party-blog .article-card {
    background: #FFFFFF;
    border: 1px solid #E0E0E0;
    border-radius: 20px;
    padding: 30px;
}

/* Content Blocks */
.party-blog .content-block {
    padding: 10px 0;
    border-bottom: 1px solid #E0E0E0;
}

.party-blog .content-block:first-child {
    padding-top: 0;
}

.party-blog .content-block:last-child {
    border-bottom: 0;
    padding-bottom: 0;
}

/* Checklist Boxes */
.party-blog .soft-box {
    background: #FFFFFF;
    border: 1px solid #E0E0E0;
    border-radius: 16px;
    padding: 25px;
}

.party-blog .checklist {
    padding-left: 23px;
    margin-bottom: 0;
}

.party-blog .checklist li {
    margin-bottom: 4px;
}

.party-blog .checklist li::marker {
    color: #000000;
}

/* CTA Boxes */
.party-blog .cta-box {
    background: #FFFFFF;
    border: 1px solid #E0E0E0;
    border-radius: 18px;
    padding: 30px;
    text-align: center;
    margin-top: 10px;
}

/* Gold Booking Buttons */
.party-blog .btn-partyadda {
    display: inline-block;
    background: #FFD76A;
    color: #000000;
    padding: 8px 20px;
  
    border-radius: 40px;
    text-decoration: none;
    font-weight: 800;
    margin-top: 8px;
    transition: background 0.25s ease;
}

.party-blog .btn-partyadda:hover {
    background: #F4C542;
    color: #000000;
}

/* Back Links */
.party-blog .back-link {
    display: inline-block;
    color: #000000;
    text-decoration: none;
    margin-bottom: 20px;
    font-weight: 650;
}

.party-blog .back-link:hover {
    color: #000000;
    text-decoration: underline;
}

/* Blog Index */
.party-blog .blog-index {
    background: #FFFFFF;
    border: 1px solid #E0E0E0;
    border-radius: 18px;
   padding: 12px;
   margin: 5px auto 10px;
   
}


.party-blog p,
.party-blog ul {
    margin-bottom: 8px;
}


.party-blog .blog-index h2 {
    font-size: 25px;
     margin-bottom: 8px;
}

.party-blog .blog-index-list {
    list-style: none;
    padding: 0;
    margin: 0;
    display: grid;
    gap: 6px;
}

.party-blog .blog-index-list a {
    display: flex;
    align-items: center;
    gap: 15px;
    background: #FFFFFF;
    border: 1px solid #E0E0E0;
    border-radius: 12px;
    padding: 8px 12px;
    
    color: #000000;
    text-decoration: none;
    font-weight: 650;
    transition: background 0.2s ease;
}

.party-blog .blog-index-list a:hover {
    background: #F7F7F7;
    border-color: #CCCCCC;
}

.party-blog .index-number {
    color: #000000;
    font-weight: 800;
}

/* Accessibility */
.party-blog a:focus-visible {
    outline: 3px solid #000000;
    outline-offset: 3px;
}

/* Mobile Responsive */
@media (max-width: 767px) {
    .party-blog .blog-hero {
        padding: 10px 12px;
    }

    .party-blog .article-section {
        padding: 8px 0;
    }
    .party-blog .article-card,
    .party-blog .blog-index,
    .party-blog .soft-box,
    .party-blog .cta-box {
        padding: 10px;
    }

    .party-blog .blog-index {
        margin: 5px auto 10px;
    }

    .party-blog .blog-index-list a {
        padding: 8px 10px;
    }
}
</style>

<div class="party-blog">
    <nav class="container" aria-label="Blog article index">
        <div class="blog-index">
            <h2>Explore Our Celebration Guides</h2>
            <ol class="blog-index-list">
                <li><a href="#kids-birthday"><span class="index-number">01</span> Kids Birthday Celebration Checklist</a></li>
                <li><a href="#bride-to-be"><span class="index-number">02</span> Bride-to-Be Party in Bangalore: Venue &amp; Celebration Checklist</a></li>
                <li><a href="#anniversary"><span class="index-number">03</span> Marriage Anniversary Celebration Ideas</a></li>
            </ol>
        </div>
    </nav>

    <section id="kids-birthday" class="article-section" aria-labelledby="kids-title">
        <div class="container">
            <h2 id="kids-title">Kids Birthday Party in Bangalore: 1st Birthday Planning Checklist</h2>
            <p>Searching for <strong>kids birthday party places in Bangalore</strong> or planning a memorable <strong>1st birthday celebration</strong>? Start with your guest count, venue, birthday theme, cake and food. A private theatre birthday party can bring family together for a personal celebration without the feel of a large banquet hall.</p>
            <div class="article-card">
                <div class="content-block"><h3>Choose the Right Venue</h3><p>When comparing <strong>first birthday party venues in Bangalore</strong>, consider the number of adults and children, seating, accessibility and room for decorations. PartyAdda's private theatre venues in <strong>AECS Layout, Brookefield and JP Nagar</strong> offer a setting for family birthday celebrations. Ask the branch about suitable theatre capacity and available packages before booking.</p></div>
                <div class="content-block"><h3>Special Entry Options</h3><p>For a fun <strong>kids birthday surprise</strong>, ask about teddy bear entry, bubble entry or car entry options. These extras can create memorable photo moments, especially for a first birthday. Confirm the suitability, availability and additional cost of each entry with the team.</p></div>
                <div class="content-block"><h3>Customized Cakes &amp; Decorations</h3><p>A <strong>customised birthday cake</strong> and coordinated birthday decorations help tie the celebration together. Share a preferred theme, cake flavour, design reference and guest count with PartyAdda in advance so the team can confirm options and pricing.</p></div>
                <div class="content-block"><h3>Food &amp; Buffet Catering</h3><p>Planning a <strong>birthday party with food in Bangalore</strong>? For gatherings of more than 12 guests, enquire about PartyAdda's buffet catering option. Discuss vegetarian or non-vegetarian preferences, the number of children and any individual food orders with the branch before finalizing the menu.</p></div>
                <div class="content-block"><div class="soft-box"><h3>Birthday Party Checklist</h3><ul class="checklist"><li>Finalize the date and guest count.</li><li>Choose the birthday theme and theatre.</li><li>Book your celebration slot in advance.</li><li>Confirm cake and decoration requirements.</li><li>Discuss special entry options.</li><li>Plan food and catering.</li><li>Arrange games and photo moments.</li><li>Confirm all arrangements before the event.</li></ul></div></div>
                <div class="cta-box"><h3>Plan a Memorable Birthday</h3><p>Explore private theatre birthday celebration packages at PartyAdda's AECS Layout and JP Nagar branches. Confirm the date, guest count, decorations and add-ons before booking.</p><a href="{{ url('/') }}#book_now_section" class="btn-partyadda">Book Birthday Celebration</a></div>
            </div>
        </div>
    </section>

    <section id="bride-to-be" class="article-section section-dark" aria-labelledby="bride-title">
        <div class="container">
            <h2 id="bride-title">Bride-to-Be Party in Bangalore: Venue &amp; Celebration Checklist</h2>
            <p>Planning a <strong>bride-to-be party in Bangalore</strong> or a small <strong>bachelorette celebration</strong>? A private theatre can offer a more intimate alternative to a busy restaurant or large party hall. Use this checklist to plan the venue, bridal theme, cake, snacks and group photos.</p>
            <div class="article-card">
                <div class="content-block"><h3>Choose a Private Celebration Venue</h3><p>For a <strong>private bride-to-be celebration venue in Bangalore</strong>, choose a space that fits your group and theme. PartyAdda's private theatres in JP Nagar and AECS Layout can be considered for bridal showers and bachelorette gatherings. Enquire about personalised decorations, LED name lights, fog entry, DJ lights and photo setups; features depend on the chosen package.</p></div>
                <div class="content-block"><div class="soft-box"><h3>Bride-to-Be Party Checklist</h3><ul class="checklist"><li>Finalize the date and guest count.</li><li>Select your private theatre.</li><li>Choose a decoration theme.</li><li>Arrange the cake, snacks and drinks.</li><li>Plan games, music and surprises.</li><li>Prepare a photo corner.</li><li>Confirm all arrangements in advance.</li></ul></div></div>
                <div class="content-block"><h3>Why Celebrate at PartyAdda?</h3><p>If you're comparing <strong>bride-to-be party places in Bangalore</strong>, PartyAdda offers private theatre celebration options with decorations and optional food arrangements. Contact the relevant branch to discuss the guest count, bridal shower theme, add-ons and available time slots.</p></div>
                <div class="cta-box"><h3>Plan a Beautiful Bride-to-Be Celebration</h3><p>Plan a bride-to-be surprise, bridal shower or bachelorette party with a private theatre setting in Bangalore. Check packages and availability for your preferred branch.</p><a href="{{ url('/') }}#book_now_section" class="btn-partyadda">Book Your Celebration</a></div>
            </div>
        </div>
    </section>

    <section id="anniversary" class="article-section" aria-labelledby="anniversary-title">
        <div class="container">
            <h2 id="anniversary-title">Wedding Anniversary Celebration in Bangalore: Romantic Private Theatre Ideas</h2>
            <p>Looking for <strong>romantic anniversary celebration places in Bangalore</strong>? A <strong>private theatre for couples</strong> offers a setting for a wedding anniversary surprise, a favourite movie or a photo slideshow. These ideas can help you plan a celebration for two or a small gathering with family and friends.</p>
            <div class="article-card">
                <div class="content-block"><h3>Choose Your Celebration Theme</h3><p>For a <strong>couple anniversary celebration in Bangalore</strong>, consider a romantic theme with soft lighting and personalised décor. Ask PartyAdda about Imperia or Lido for couple-focused options, or enquire about Opera, Galaxy or Phoenix for larger gatherings. Confirm which theatre is available at your preferred branch and its current capacity.</p></div>
                <div class="content-block"><h3>Invite Your Loved Ones</h3><p>Decide whether your <strong>wedding anniversary party</strong> will be a surprise for two or a family gathering. Share invitations with the correct PartyAdda branch location, date, time and RSVP details.</p></div>
                <div class="content-block"><h3>Plan Romantic Decorations</h3><p>For a <strong>romantic anniversary surprise</strong>, discuss flowers, warm lighting, a personalised message or a themed photo backdrop. Share your decoration preferences in advance and confirm which items are included in the selected package.</p></div>
                <div class="content-block"><h3>Arrange Food &amp; Cake</h3><p>An <strong>anniversary cake</strong>, snacks or a meal can complement the private theatre experience. Ask about customised cakes and available food or catering options, with pricing based on your choices.</p></div>
                <div class="content-block"><h3>Entertainment &amp; Photography</h3><p>Create a playlist, prepare a personal photo slideshow or plan a movie experience for your <strong>private theatre anniversary celebration</strong>. Confirm compatible playback arrangements with the team beforehand; customers should arrange access to their own content.</p></div>
                <div class="cta-box"><h3>Celebrate Your Anniversary at PartyAdda</h3><p>Plan a private wedding anniversary celebration in JP Nagar or AECS Layout, Bangalore. Contact PartyAdda to check theatre options, decorations and available booking slots.</p><a href="{{ url('/') }}#book_now_section" class="btn-partyadda">Book Anniversary Celebration</a></div>
            </div>
        </div>
    </section>
    <div class="container text-center mt-4"><p>Need help choosing a celebration package? <a href="{{ url('contact') }}" style="color:#FFD76A;font-weight:700">Contact PartyAdda</a> for branch-specific enquiries, or explore our <a href="{{ url('faq') }}" style="color:#FFD76A;font-weight:700">booking FAQs</a>.</p></div>
</div>
@endsection
