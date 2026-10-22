@extends('includes.layout')

@section('title','Private Theaters for Celebration and Surprises')
@section('keyword','private theater, private theater in Marathahalli, private movie theater, mini theater, mini party hall, party venue, celebration venue, birthday celebration, birthday parties, surprise birthday celebration, kids birthday party, first birthday, children’s birthday, baby birthday venues, baby shower halls, bride-to-be celebration, bachelorette party, mom-to-be celebration, hosting baby birthday, small get-togethers, group party, place for celebration, party venues and ideas, budget-friendly celebration, birthday places for couples, binge watch party, fun places in Bangalore')
@section('description','PartyAdda offers private theatre celebrations in Bangalore with customizable packages for birthdays, bride to be, anniversaries, baby shower, mom to be,couples, family gatherings, and special events—fun, memorable, and affordable.')
@section('content')
<style>
    .privacy-policy {
        font-family: 'Montserrat', sans-serif;
        font-size: 14px;
        line-height: 1.6;
        color: #000;
    }

    .privacy-policy .back-btn {
        display: inline-flex;
        align-items: center;
        gap: 4px;
        margin-top: 8px;
        padding: 0;
        color: inherit;
        font-size: 14px;
    }

    .privacy-policy h1,
    .privacy-policy h2,
    .privacy-policy h3,
    .privacy-policy h4 {
        margin: 12px 0 8px;
        padding: 0;
        font-family: inherit;
        font-weight: 700;
        line-height: 1.3;
    }

    .privacy-policy .content-head {
        margin: 12px 0;
        font-size: clamp(20px, 3vw, 26px);
    }

    .privacy-policy h2 { font-size: 20px; }
    .privacy-policy h3 { font-size: 18px; }
    .privacy-policy h4 { font-size: 16px; }

    .privacy-policy p {
        margin: 0 0 8px;
        padding: 0;
        font-family: inherit;
        font-size: 14px;
        line-height: 1.6;
        text-align: start;
        overflow-wrap: break-word;
    }

    .privacy-policy .updated-date {
        margin: 8px 0;
        font-size: 12px;
    }

    .privacy-policy ul {
        margin: 0 0 12px;
        padding: 0 0 0 20px;
    }

    .privacy-policy li {
        margin-bottom: 6px;
        padding: 0;
    }

    .privacy-policy li:last-child,
    .privacy-policy li > p:last-child {
        margin-bottom: 0;
    }
</style>

<div class="container py-2 privacy-policy">
   <a href="{{ url('/') }}" class="back-btn text-decoration-none" onclick="if (window.history.length > 1) { window.history.back(); return false; }">
      <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 20 20" aria-hidden="true"
         height="24" width="24" xmlns="http://www.w3.org/2000/svg">
         <path fill-rule="evenodd"
            d="M9.707 16.707a1 1 0 01-1.414 0l-6-6a1 1 0 010-1.414l6-6a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l4.293 4.293a1 1 0 010 1.414z"
            clip-rule="evenodd"></path>
      </svg>
      Back
   </a>
   <div class="row justify-content-center">
      <div class="col-lg-10">
         <h1 class="content-head fw-bold">Privacy Policy</h1>
         <p class="updated-date">Last updated: October 20, 2026</p>
         <p>This Privacy Policy describes Our policies and procedures on the collection, use and disclosure of Your information when You use the Service and tells You about Your privacy rights and how the law protects You.</p>
         <p>We use Your Personal data to provide and improve the Service. By using the Service, You agree to the collection and use of information in accordance with this Privacy Policy.</p>
         <h2>Interpretation and Definitions</h2>
         <h3>Interpretation</h3>
         <p>The words of which the initial letter is capitalized have meanings defined under the following conditions. The following definitions shall have the same meaning regardless of whether they appear in singular or in plural.</p>
         <h3>Definitions</h3>
         <p>For the purposes of this Privacy Policy:</p>
         <p>Account means a unique account created for You to access our Service or parts of our Service.</p>
         <p>Affiliate means an entity that controls, is controlled by or is under common control with a party, where "control" means ownership of 50% or more of the shares, equity interest or other securities entitled to vote for election of directors or other managing authority.</p>
         <p>Company (referred to as either "the Company", "We", "Us" or "Our" in this Agreement) refers to PartyAdda (Varda Enterprises), 2nd Floor, No 612, AECS Layout, 60 Feet Main Road Kundalahalli, Bengaluru KARNATAKA 560037</p>
         <p>Cookies are small files that are placed on Your computer, mobile device or any other device by a website, containing the details of Your browsing history on that website among its many uses.</p>
         <p>Country refers to: India</p>
         <p>Device means any device that can access the Service such as a computer, a cellphone or a digital tablet.</p>
         <p>ersonal Data is any information that relates to an identified or identifiable individual.</p>
         <p>Service refers to the Website.</p>
         <p>Service Provider means any natural or legal person who processes the data on behalf of the Company. It refers to third-party companies or individuals employed by the Company to facilitate the Service, to provide the Service on behalf of the Company, to perform services related to the Service or to assist the Company in analyzing how the Service is used.</p>
         <p>Usage Data refers to data collected automatically, either generated by the use of the Service or from the Service infrastructure itself (for example, the duration of a page visit).</p>
         <p>Website refers to PartyAdda, accessible from https://PartyAdda.com</p>
         <p>You means the individual accessing or using the Service, or the company, or other legal entity on behalf of which such individual is accessing or using the Service, as applicable.</p>
         <h3>Collecting and Using Your Personal Data</h3>
         <h4>Types of Data Collected</h4>
         <b>Personal Data</b><br>
         <p>While using Our Service, We may ask You to provide Us with certain personally identifiable information that can be used to contact or identify You. Personally identifiable information may include, but is not limited to:</p>
         Email address<br>
         First name and last name<br>
         Phone number<br>
         Usage Data<br>
         <p>Usage Data is collected automatically when using the Service.</p>
         <p>Usage Data may include information such as Your Device's Internet Protocol address (e.g. IP address), browser type, browser version, the pages of our Service that You visit, the time and date of Your visit, the time spent on those pages, unique device identifiers and other diagnostic data.</p>
         <p>When You access the Service by or through a mobile device, We may collect certain information automatically, including, but not limited to, the type of mobile device You use, Your mobile device unique ID, the IP address of Your mobile device, Your mobile operating system, the type of mobile Internet browser You use, unique device identifiers and other diagnostic data.</p>
         <p>We may also collect information that Your browser sends whenever You visit our Service or when You access the Service by or through a mobile device.</p>
         <h4>Tracking Technologies and Cookies</h4>
         <p>We use Cookies and similar tracking technologies to track the activity on Our Service and store certain information. Tracking technologies used are beacons, tags, and scripts to collect and track information and to improve and analyze Our Service. The technologies We use may include:</p>
         <ul>
            <li><strong>Cookies or Browser Cookies.</strong> A cookie is a small file placed on Your Device. You can instruct Your browser to refuse all Cookies or to indicate when a Cookie is being sent. However, if You do not accept Cookies, You may not be able to use some parts of our Service. Unless you have adjusted Your browser setting so that it will refuse Cookies, our Service may use Cookies.</li>
            <li><strong>Web Beacons.</strong> Certain sections of our Service and our emails may contain small electronic files known as web beacons (also referred to as clear gifs, pixel tags, and single-pixel gifs) that permit the Company, for example, to count users who have visited those pages or opened an email and for other related website statistics (for example, recording the popularity of a certain section and verifying system and server integrity).</li>
         </ul>
         <p>Cookies can be &quot;Persistent&quot; or &quot;Session&quot; Cookies. Persistent Cookies remain on Your personal computer or mobile device when You go offline, while Session Cookies are deleted as soon as You close Your web browser. You can learn more about cookies on <a href="https://www.termsfeed.com/blog/cookies/#What_Are_Cookies" target="_blank">TermsFeed website</a> article.</p>
         <p>We use both Session and Persistent Cookies for the purposes set out below:</p>
         <ul>
            <li>
               <p><strong>Necessary / Essential Cookies</strong></p>
               <p>Type: Session Cookies</p>
               <p>Administered by: Us</p>
               <p>Purpose: These Cookies are essential to provide You with services available through the Website and to enable You to use some of its features. They help to authenticate users and prevent fraudulent use of user accounts. Without these Cookies, the services that You have asked for cannot be provided, and We only use these Cookies to provide You with those services.</p>
            </li>
            <li>
               <p><strong>Cookies Policy / Notice Acceptance Cookies</strong></p>
               <p>Type: Persistent Cookies</p>
               <p>Administered by: Us</p>
               <p>Purpose: These Cookies identify if users have accepted the use of cookies on the Website.</p>
            </li>
            <li>
               <p><strong>Functionality Cookies</strong></p>
               <p>Type: Persistent Cookies</p>
               <p>Administered by: Us</p>
               <p>Purpose: These Cookies allow us to remember choices You make when You use the Website, such as remembering your login details or language preference. The purpose of these Cookies is to provide You with a more personal experience and to avoid You having to re-enter your preferences every time You use the Website.</p>
            </li>
         </ul>
         <p>For more information about the cookies we use and your choices regarding cookies, please visit our Cookies Policy or the Cookies section of our Privacy Policy.</p>
         <h3>Use of Your Personal Data</h3>
         <p>The Company may use Personal Data for the following purposes:</p>
         <ul>
            <li>
               <p><strong>To provide and maintain our Service</strong>, including to monitor the usage of our Service.</p>
            </li>
            <li>
               <p><strong>To manage Your Account:</strong> to manage Your registration as a user of the Service. The Personal Data You provide can give You access to different functionalities of the Service that are available to You as a registered user.</p>
            </li>
            <li>
               <p><strong>For the performance of a contract:</strong> the development, compliance and undertaking of the purchase contract for the products, items or services You have purchased or of any other contract with Us through the Service.</p>
            </li>
            <li>
               <p><strong>To contact You:</strong> To contact You by email, telephone calls, SMS, or other equivalent forms of electronic communication, such as a mobile application's push notifications regarding updates or informative communications related to the functionalities, products or contracted services, including the security updates, when necessary or reasonable for their implementation.</p>
            </li>
            <li>
               <p><strong>To provide You</strong> with news, special offers and general information about other goods, services and events which we offer that are similar to those that you have already purchased or enquired about unless You have opted not to receive such information.</p>
            </li>
            <li>
               <p><strong>To manage Your requests:</strong> To attend and manage Your requests to Us.</p>
            </li>
            <li>
               <p><strong>For business transfers:</strong> We may use Your information to evaluate or conduct a merger, divestiture, restructuring, reorganization, dissolution, or other sale or transfer of some or all of Our assets, whether as a going concern or as part of bankruptcy, liquidation, or similar proceeding, in which Personal Data held by Us about our Service users is among the assets transferred.</p>
            </li>
            <li>
               <p><strong>For other purposes</strong>: We may use Your information for other purposes, such as data analysis, identifying usage trends, determining the effectiveness of our promotional campaigns and to evaluate and improve our Service, products, services, marketing and your experience.</p>
            </li>
         </ul>
         <p>We may share Your personal information in the following situations:</p>
         <ul>
            <li><strong>With Service Providers:</strong> We may share Your personal information with Service Providers to monitor and analyze the use of our Service,  to contact You.</li>
            <li><strong>For business transfers:</strong> We may share or transfer Your personal information in connection with, or during negotiations of, any merger, sale of Company assets, financing, or acquisition of all or a portion of Our business to another company.</li>
            <li><strong>With Affiliates:</strong> We may share Your information with Our affiliates, in which case we will require those affiliates to honor this Privacy Policy. Affiliates include Our parent company and any other subsidiaries, joint venture partners or other companies that We control or that are under common control with Us.</li>
            <li><strong>With business partners:</strong> We may share Your information with Our business partners to offer You certain products, services or promotions.</li>
            <li><strong>With other users:</strong> when You share personal information or otherwise interact in the public areas with other users, such information may be viewed by all users and may be publicly distributed outside.</li>
            <li><strong>With Your consent</strong>: We may disclose Your personal information for any other purpose with Your consent.</li>
         </ul>
         <h3>Retention of Your Personal Data</h3>
         <p>The Company will retain Your Personal Data only for as long as is necessary for the purposes set out in this Privacy Policy. We will retain and use Your Personal Data to the extent necessary to comply with our legal obligations (for example, if we are required to retain your data to comply with applicable laws), resolve disputes, and enforce our legal agreements and policies.</p>
         <p>The Company will also retain Usage Data for internal analysis purposes. Usage Data is generally retained for a shorter period of time, except when this data is used to strengthen the security or to improve the functionality of Our Service, or We are legally obligated to retain this data for longer time periods.</p>
         <h3>Transfer of Your Personal Data</h3>
         <p>Your information, including Personal Data, is processed at the Company's operating offices and in any other places where the parties involved in the processing are located. It means that this information may be transferred to — and maintained on — computers located outside of Your state, province, country or other governmental jurisdiction where the data protection laws may differ than those from Your jurisdiction.</p>
         <p>Your consent to this Privacy Policy followed by Your submission of such information represents Your agreement to that transfer.</p>
         <p>The Company will take all steps reasonably necessary to ensure that Your data is treated securely and in accordance with this Privacy Policy and no transfer of Your Personal Data will take place to an organization or a country unless there are adequate controls in place including the security of Your data and other personal information.</p>
         <h3>Delete Your Personal Data</h3>
         <p>You have the right to delete or request that We assist in deleting the Personal Data that We have collected about You.</p>
         <p>Our Service may give You the ability to delete certain information about You from within the Service.</p>
         <p>You may update, amend, or delete Your information at any time by signing in to Your Account, if you have one, and visiting the account settings section that allows you to manage Your personal information. You may also contact Us to request access to, correct, or delete any personal information that You have provided to Us.</p>
         <p>Please note, however, that We may need to retain certain information when we have a legal obligation or lawful basis to do so.</p>
         <h3>Disclosure of Your Personal Data</h3>
         <h4>Business Transactions</h4>
         <p>If the Company is involved in a merger, acquisition or asset sale, Your Personal Data may be transferred. We will provide notice before Your Personal Data is transferred and becomes subject to a different Privacy Policy.</p>
         <h4>Law enforcement</h4>
         <p>Under certain circumstances, the Company may be required to disclose Your Personal Data if required to do so by law or in response to valid requests by public authorities (e.g. a court or a government agency).</p>
         <h4>Other legal requirements</h4>
         <p>The Company may disclose Your Personal Data in the good faith belief that such action is necessary to:</p>
         <ul>
            <li>Comply with a legal obligation</li>
            <li>Protect and defend the rights or property of the Company</li>
            <li>Prevent or investigate possible wrongdoing in connection with the Service</li>
            <li>Protect the personal safety of Users of the Service or the public</li>
            <li>Protect against legal liability</li>
         </ul>
         <h3>Security of Your Personal Data</h3>
         <p>The security of Your Personal Data is important to Us, but remember that no method of transmission over the Internet, or method of electronic storage is 100% secure. While We strive to use commercially acceptable means to protect Your Personal Data, We cannot guarantee its absolute security.</p>
         <h2>Children's Privacy</h2>
         <p>Our Service does not address anyone under the age of 13. We do not knowingly collect personally identifiable information from anyone under the age of 13. If You are a parent or guardian and You are aware that Your child has provided Us with Personal Data, please contact Us. If We become aware that We have collected Personal Data from anyone under the age of 13 without verification of parental consent, We take steps to remove that information from Our servers.</p>
         <p>If We need to rely on consent as a legal basis for processing Your information and Your country requires consent from a parent, We may require Your parent's consent before We collect and use that information.</p>
         <h2>Links to Other Websites</h2>
         <p>Our Service may contain links to other websites that are not operated by Us. If You click on a third party link, You will be directed to that third party's site. We strongly advise You to review the Privacy Policy of every site You visit.</p>
         <p>We have no control over and assume no responsibility for the content, privacy policies or practices of any third party sites or services.</p>
         <h2>Changes to this Privacy Policy</h2>
         <p>We may update Our Privacy Policy from time to time. We will notify You of any changes by posting the new Privacy Policy on this page.</p>
         <p>We will let You know via email and/or a prominent notice on Our Service, prior to the change becoming effective and update the &quot;Last updated&quot; date at the top of this Privacy Policy.</p>
         <p>You are advised to review this Privacy Policy periodically for any changes. Changes to this Privacy Policy are effective when they are posted on this page.</p>
         <h2>Contact Us</h2>
         <p>If you have any questions about this Privacy Policy, You can contact us:</p>
         <ul>
            <li>By email: support@PartyAdda.com</li>
         </ul>
      </div>
   </div>
</div>
@endsection