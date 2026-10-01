/* ═══════════════════════════════════════════════════════════
   PREMIUM PORTFOLIO — VANILLA JS
   Award-quality interactions, no jQuery, no frameworks
   ═══════════════════════════════════════════════════════════ */

(function () {
  'use strict';

  /* ── 1. SCROLL PROGRESS BAR ─────────────────────────────── */
  const progressBar = document.getElementById('scroll-progress');
  if (progressBar) {
    window.addEventListener('scroll', () => {
      const s = document.documentElement;
      const pct = (s.scrollTop / (s.scrollHeight - s.clientHeight)) * 100;
      progressBar.style.width = pct + '%';
    }, { passive: true });
  }

  /* ── 2. CURSOR SPOTLIGHT ────────────────────────────────── */
  const spotlight = document.getElementById('cursor-spotlight');
  if (spotlight && window.matchMedia('(pointer:fine)').matches) {
    let raf;
    document.addEventListener('mousemove', (e) => {
      cancelAnimationFrame(raf);
      raf = requestAnimationFrame(() => {
        spotlight.style.left = e.clientX + 'px';
        spotlight.style.top  = e.clientY + 'px';
      });
    }, { passive: true });
  }

  /* ── 2b. BEFORE / AFTER HERO TOGGLE ─────────────────────── */
  const btnShowAfter  = document.getElementById('btn-show-after');
  const btnShowBefore = document.getElementById('btn-show-before');
  const stateAfter    = document.getElementById('state-after');
  const stateBefore   = document.getElementById('state-before');

  // Animate SVG score-ring arc on reveal
  function animateScoreArc(panel) {
    const arc = panel.querySelector('.score-ring-arc');
    if (!arc) return;
    const target = parseFloat(arc.getAttribute('data-offset-target'));
    const total  = 207.3;
    // Start from fully hidden (offset = total circumference), then animate to target
    arc.style.transition = 'none';
    arc.setAttribute('stroke-dashoffset', String(total));
    requestAnimationFrame(() => {
      requestAnimationFrame(() => {
        arc.style.transition = 'stroke-dashoffset 1.1s cubic-bezier(0.16,1,0.3,1)';
        arc.setAttribute('stroke-dashoffset', String(target));
      });
    });
  }

  if (btnShowAfter && btnShowBefore && stateAfter && stateBefore) {
    btnShowAfter.addEventListener('click', () => {
      btnShowAfter.classList.add('active');
      btnShowAfter.setAttribute('aria-selected', 'true');
      btnShowBefore.classList.remove('active');
      btnShowBefore.setAttribute('aria-selected', 'false');
      stateAfter.classList.remove('d-none');
      stateBefore.classList.add('d-none');
      animateScoreArc(stateAfter);
    });

    btnShowBefore.addEventListener('click', () => {
      btnShowBefore.classList.add('active');
      btnShowBefore.setAttribute('aria-selected', 'true');
      btnShowAfter.classList.remove('active');
      btnShowAfter.setAttribute('aria-selected', 'false');
      stateBefore.classList.remove('d-none');
      stateAfter.classList.add('d-none');
      animateScoreArc(stateBefore);
    });

    // Animate the default AFTER arc on page load
    animateScoreArc(stateAfter);
  }

  /* ── 3. STICKY NAVIGATION ────────────────────────────────── */
  const nav = document.getElementById('main-nav');
  const navLinks = document.querySelectorAll('.nav-link-item, .nav-mobile-link');
  const sections = document.querySelectorAll('section[id], div[id]');

  function onScroll() {
    if (!nav) return;
    nav.classList.toggle('nav-scrolled', window.scrollY > 50);

    // Active link highlight — use 30% viewport as trigger point
    let current = '';
    const triggerOffset = window.innerHeight * 0.30;

    sections.forEach(sec => {
      if (window.scrollY + triggerOffset >= sec.offsetTop) {
        current = sec.getAttribute('id');
      }
    });

    // Edge case: if user is near the bottom, activate the last section
    if ((window.innerHeight + window.scrollY) >= document.body.offsetHeight - 60) {
      const allSections = Array.from(sections);
      if (allSections.length) current = allSections[allSections.length - 1].getAttribute('id');
    }

    navLinks.forEach(link => {
      const href = link.getAttribute('href') || '';
      link.classList.toggle('active', href === `#${current}`);
    });
  }

  window.addEventListener('scroll', onScroll, { passive: true });
  onScroll(); // call on load

  /* ── 4. MOBILE BURGER MENU ───────────────────────────────── */
  const burger   = document.getElementById('nav-burger');
  const mobileMenu = document.getElementById('nav-mobile');

  if (burger && mobileMenu) {
    burger.addEventListener('click', () => {
      const isOpen = mobileMenu.classList.toggle('open');
      burger.classList.toggle('open', isOpen);
      document.body.classList.toggle('nav-open', isOpen);
      burger.setAttribute('aria-expanded', String(isOpen));
      mobileMenu.setAttribute('aria-hidden', String(!isOpen));
    });

    // Close on link click
    mobileMenu.querySelectorAll('.nav-mobile-link').forEach(link => {
      link.addEventListener('click', () => {
        mobileMenu.classList.remove('open');
        burger.classList.remove('open');
        document.body.classList.remove('nav-open');
        burger.setAttribute('aria-expanded', 'false');
        mobileMenu.setAttribute('aria-hidden', 'true');
      });
    });

    // Close on click outside
    document.addEventListener('click', (e) => {
      if (nav && !nav.contains(e.target) && mobileMenu.classList.contains('open')) {
        mobileMenu.classList.remove('open');
        burger.classList.remove('open');
        document.body.classList.remove('nav-open');
        burger.setAttribute('aria-expanded', 'false');
        mobileMenu.setAttribute('aria-hidden', 'true');
      }
    });

    // Close on escape
    window.addEventListener('keydown', (e) => {
      if (e.key === 'Escape' && mobileMenu.classList.contains('open')) {
        mobileMenu.classList.remove('open');
        burger.classList.remove('open');
        document.body.classList.remove('nav-open');
        burger.setAttribute('aria-expanded', 'false');
        mobileMenu.setAttribute('aria-hidden', 'true');
        burger.focus();
      }
    });
  }

  /* ── 5. SCROLL REVEAL (INTERSECTION OBSERVER) ────────────── */
  const revealEls = document.querySelectorAll('.reveal-up');
  if ('IntersectionObserver' in window) {
    const revealObs = new IntersectionObserver((entries) => {
      entries.forEach(entry => {
        if (entry.isIntersecting) {
          entry.target.classList.add('in-view');
          revealObs.unobserve(entry.target);
        }
      });
    }, { threshold: 0.01, rootMargin: '0px 0px 80px 0px' });

    revealEls.forEach(el => revealObs.observe(el));

    // Fallback for iOS Safari / scroll inertia: check elements near viewport
    const checkVisibilityFallback = () => {
      const vh = window.innerHeight || document.documentElement.clientHeight;
      revealEls.forEach(el => {
        if (!el.classList.contains('in-view')) {
          const rect = el.getBoundingClientRect();
          if (rect.top < vh + 120 && rect.bottom > -100) {
            el.classList.add('in-view');
            revealObs.unobserve(el);
          }
        }
      });
    };
    window.addEventListener('scroll', checkVisibilityFallback, { passive: true });
    window.addEventListener('resize', checkVisibilityFallback, { passive: true });
    setTimeout(checkVisibilityFallback, 300);
    setTimeout(checkVisibilityFallback, 1000);
  } else {
    // Fallback: show everything
    revealEls.forEach(el => el.classList.add('in-view'));
  }


  /* ── 8. CASE STUDY DATA ──────────────────────────────────── */
  const caseData = {
    propertysea: {
      title: 'Property Sea',
      tag:   'Real Estate · Client Project',
      client:   'Property Sea Real Estate Listings',
      role:     'Senior Full-Stack Developer',
      duration: '4 Months',
      outcomes: 'Scalable Multi-Currency Engine · Instant Broker Lead Routing',
      url:      'https://www.property-sea.com/',
      challenge: 'International real estate buyers faced slow search queries across thousands of global property listings, lack of currency conversion, and clunky contact forms that failed to route leads immediately to regional listing brokers.',
      solution:  'Engineered a modern, responsive property portal with dynamic multi-currency pricing, granular neighborhood and property type search filters, and an automated inquiry pipeline dispatching leads directly to designated brokers via email and CRM webhook.',
      architecture: [
        '**Granular Real Estate Search & Filters:** Built high-speed query indexing allowing buyers to filter by country, city, bedrooms, bathrooms, and price bracket with instant result rendering.',
        '**Dynamic Multi-Currency Engine:** Integrated live forex synchronization allowing international investors to inspect prices in USD, EUR, GBP, AED, and INR.',
        '**Broker Inquiry Automation:** Streamlined single-click showing requests with automated email dispatch and CRM integration.',
        '**Mobile-First Asset Optimization:** Cut image weight with automated WebP compression and lazy-loading, ensuring quick listing browsing on mobile 4G networks.'
      ],
      lessons: 'For international real estate platforms, displaying accurate multi-currency conversions and minimizing listing image sizes dramatically increases buyer session durations.'
    },
    navagruha: {
      title: 'Navagruha',
      tag:   'Real Estate · Client Project',
      client:   'Navagruha Land Developers & Gated Communities',
      role:     'WordPress Architect & Performance Lead',
      duration: '3 Months',
      outcomes: 'Sub-Second Page Load · 3x Inbound Brochure & Site-Visit Bookings',
      url:      'https://navagruha.com/',
      challenge: 'Navagruha\'s high-end plotted layout and gated community developments in Hyderabad were experiencing high bounce rates from mobile paid ad traffic due to heavy unoptimized layout maps and confusing navigation.',
      solution:  'Re-engineered the development platform into a high-converting showcase featuring interactive master plans, verified DTCP/RERA plot dimensions, gated brochure downloads, and persistent click-to-call mobile triggers.',
      architecture: [
        '**Interactive Project Master Layouts:** Deployed vector-based layout plan viewers allowing buyers to explore plot positions, park proximities, and road widths on any screen size.',
        '**Frictionless Lead Gating:** Designed a streamlined 2-field brochure download modal that captures buyer intent while automatically routing phone leads to sales counselors.',
        '**High-Conversion Mobile Call Bar:** Placed sticky WhatsApp and call consultation triggers within thumb reach for high mobile ad engagement.',
        '**PageSpeed Optimization:** Achieved 90+ Core Web Vitals score through asset bundling and deferred asset loading.'
      ],
      lessons: 'Real estate land buyers demand instant clarity on legal approvals and layout positions. Highlighting DTCP/RERA approvals above the fold doubled inquiry conversion.'
    },
    morrisondental: {
      title: 'Morrison Dental',
      tag:   'Healthcare & Dental · Client Project',
      client:   'Morrison Dental Clinic (UK)',
      role:     'Full-Stack Developer & Optimization Specialist',
      duration: '3 Months',
      outcomes: 'Streamlined Patient Intake Flow · Mobile First Appointment Booking',
      url:      'https://morrisondental.co.uk/',
      challenge: 'Prospective patients found dental treatment navigation confusing on mobile devices, with buried emergency contact numbers and slow page load times leading to high bounce rates.',
      solution:  'Engineered a modern, patient-first dental website with prominent emergency dial buttons, transparent cosmetic and implant pricing breakdowns, and a frictionless 3-step appointment intake flow.',
      architecture: [
        '**3-Step Patient Scheduler:** Built a simplified booking inquiry sequence (Service -> Preferred Day -> Contact Info) reducing intake drop-off.',
        '**Emergency Call Triggers:** Implemented persistent mobile calling bar for immediate triage of emergency toothache patients.',
        '**Treatment Pricing Transparency:** Structured cosmetic and orthodontic treatment packages with clear transparent fee guides and FAQs.',
        '**Mobile Performance Tuning:** Replaced bloated plugins with lightweight custom styling and optimized image delivery.'
      ],
      lessons: 'Patients looking for dental work are often in discomfort or anxious about pricing. Clear upfront pricing and one-tap calling drastically increase patient inquiries.'
    },
    farfarasdental: {
      title: 'Far Faras Dental',
      tag:   'Healthcare & Dental · Client Project',
      client:   'Far Faras Dental Practice',
      role:     'Lead Frontend Developer & Performance Consultant',
      duration: '2 Months',
      outcomes: 'Sub-Second Mobile Load · Higher Patient Consultation Conversions',
      url:      'https://www.farfarasdental.com/',
      challenge: 'The practice website struggled with slow mobile loading, heavy uncompressed hero images, and an outdated booking form that caused high friction for new patients.',
      solution:  'Revamped the mobile user experience, implemented an interactive before-and-after smile transformation gallery, optimized asset delivery for sub-second speeds, and streamlined appointment request forms.',
      architecture: [
        '**Smile Gallery Showcase:** Interactive before/after smile makeover gallery highlighting cosmetic and veneer treatments.',
        '**Optimized Asset Delivery:** Converted clinical photography to modern responsive WebP formats with lazy loading.',
        '**Simplified Consultation Request:** Replaced lengthy intake questionnaires with a frictionless 3-field appointment request modal.',
        '**Accessibility & Mobile Compliance:** Refactored touch targets and contrast ratios to ensure full WCAG AA accessibility.'
      ],
      lessons: 'Clinical before-and-after visual proof combined with sub-second page speed creates immediate patient trust and higher appointment bookings.'
    },
    limoride: {
      title: 'Limoride',
      tag:   'Travel & Fleet Operations · Client Project',
      client:   'Luxury Limousine & Fleet Operators',
      role:     'Lead Backend Developer',
      duration: '5 Months',
      outcomes: '3.8s → 0.4s Speed Cut · Zero Booking Conflicts',
      url:      'https://limoride.com',
      challenge: 'The client was managing premium fleet schedules and passenger bookings using manual spreadsheets and phone calls, causing frequent double-bookings and massive delays in generating trip quotes for customers.',
      solution:  'Designed an automated online quote calculator and booking portal. Programmed dynamic distance and route estimation, automatic vehicle assignment, and zero-downtime database locking to secure reservation slots.',
      architecture: [
        '**Instant Distance & Fare Calculator:** Built an automated pricing engine providing instant fixed-fare estimates to travelers based on pickup and drop-off coordinates.',
        '**Zero-Conflict Reservation Engine:** Built automated reservation locks preventing duplicate vehicle bookings during peak reservation windows.',
        '**Sub-Second Asset Optimization:** Cut page load times from 3.8s down to 0.4s, dramatically increasing quote conversions and mobile reservations.'
      ],
      lessons: 'For transportation and limo businesses, instant online quotes convert 3x better than "call for a quote" forms.'
    },
    stowsimple: {
      title: 'StowSimple',
      tag:   'Logistics & Storage SaaS · Client Project',
      client:   'Storage & Facility Operators',
      role:     'Senior Full-Stack Developer',
      duration: '8 Months',
      outcomes: 'Automated Online Billing · 60% Admin Time Saved',
      url:      'https://stowsimple.com',
      challenge: 'Operators struggled with paper tracking, manual invoicing delays, and double-booking conflicts arising from concurrent customer reservations across physical facilities.',
      solution:  'Developed an automated self-service reservation platform. Programmed a visual unit selection layout engine with transaction locks to prevent double-leasing, and integrated Stripe Subscriptions to automate monthly recurring payments.',
      architecture: [
        '**Interactive Visual Booking Grid:** Created a responsive room visual layout reflecting real-time maintenance and availability statuses.',
        '**Automated Stripe Billing:** Built an automated recurring payment engine mapping customer cards directly to monthly billing cycles.',
        '**Instant Notification Triggers:** Automated booking receipts and welcome instructions sent via email and SMS.'
      ],
      lessons: 'Automating bookings and credit card processing frees business owners from hours of repetitive manual admin work each week.'
    },
    pitchfinder: {
      title: 'Pitchfinder.io',
      tag:   'Travel & Booking Marketplace · Client Project',
      client:   'Pitchfinder Outdoor Marketplace',
      role:     'Full-Stack Developer & Systems Integrator',
      duration: '4 Months',
      outcomes: 'Real-Time Pitch Calendar Booking · Host Revenue Automation',
      url:      'https://pitchfinder.io',
      challenge: 'Campground and pitch hosts experienced double-booking conflicts and manual invoice delays during peak summer holiday booking seasons.',
      solution:  'Engineered a unified marketplace with real-time calendar availability locking, automated Stripe payment split processing, and self-service host dashboards.',
      architecture: [
        '**Interactive Date-Range Calendar:** Real-time visual availability picker preventing concurrent reservation collisions.',
        '**Automated Payment Payouts:** Integrated Stripe Connect for split payouts between platform fees and campsite hosts.',
        '**Filterable Amenity Search:** Granular search allowing campers to filter by electricity, pet-friendly status, and vehicle size.',
        '**Mobile Host Management Portal:** Built a lightweight mobile-friendly interface for hosts to manage bookings on the go.'
      ],
      lessons: 'Preventing double-booking through optimistic database locking protects marketplace reputation and eliminates customer support disputes.'
    },
    travelwithstella: {
      title: 'Travel With Stella',
      tag:   'Travel Platform & Media · Client Project',
      client:   'Travel With Stella Media',
      role:     'Full-Stack Web Developer',
      duration: '2 Months',
      outcomes: 'Sub-Second Media Delivery · 60% Mobile Engagement Boost',
      url:      'https://travelwithstella.com/',
      challenge: 'The travel media site suffered from extremely heavy high-resolution destination images that caused page lag and high bounce rates on mobile networks.',
      solution:  'Restructured the media delivery pipeline with responsive WebP transformations, implemented dynamic destination categorization, and built an interactive itinerary reader.',
      architecture: [
        '**Next-Gen Media Pipeline:** Automated responsive image sizing and browser caching cutting total page transfer size by 75%.',
        '**Interactive Itinerary Modules:** Modular day-by-day travel itinerary cards with integrated Google Maps destination pins.',
        '**Clean Typography & Dark Mode:** Designed a reading-focused editorial layout optimized for long-form destination guides.',
        '**Core Web Vitals Optimization:** Re-architected CSS and deferred third-party scripts to achieve top Lighthouse scores.'
      ],
      lessons: 'Travel blogs and media sites depend completely on imagery; compressing images without degrading visual beauty keeps mobile readers engaged.'
    },
    imleagues: {
      title: 'IMLeagues',
      tag:   'Sports SaaS Platform · Client Project',
      client:   'Collegiate League & Registration Network',
      role:     'Lead Database Architect & Engineer',
      duration: '6 Months',
      outcomes: '40% Speed Boost · Zero Peak Timeouts',
      url:      'https://imleagues.com',
      challenge: 'As the primary sports scheduling network for over 500,000 active participants, peak seasonal registration traffic caused severe database bottlenecks, causing regular page timeouts and registration lockups.',
      solution:  'Engineered high-efficiency query indexing paths and compound query scopes to restructure relationship loading. Built a multi-layer cache pipeline using Redis to intercept recurring database queries, relieving direct database transaction pressure.',
      architecture: [
        '**Redis Cache Layers:** Implemented cache serialization for high-frequency queries, cutting primary DB query load significantly.',
        '**Composite Index Tuning:** Developed complex multi-column MySQL indexes tailored specifically for scheduled game search algorithms.',
        '**Mobile Responsive Schedules:** Restructured schedule and tournament views to render cleanly on mobile phones.'
      ],
      lessons: 'Fixing heavy database bottlenecks is far more effective and affordable than constantly paying for larger web servers.'
    },
    magnoliadate: {
      title: 'MagnoliaDate',
      tag:   'Social SaaS Platform · Client Project',
      client:   'MagnoliaDate Social Network',
      role:     'Senior Backend Developer & Performance Engineer',
      duration: '6 Months',
      outcomes: 'Scalable Subscription Engine · Zero Latency Real-Time Chat',
      url:      'https://magnoliadate.com',
      challenge: 'Rapid user growth caused high server load during peak evening messaging hours, alongside payment processing failures with international credit cards.',
      solution:  'Refactored backend websocket chat services, implemented Redis pub/sub messaging channels, and redesigned recurring subscription billing with multi-gateway fallback.',
      architecture: [
        '**Scalable Subscription Gateways:** Integrated multi-currency Stripe and PayPal billing with automated retry logic on card failures.',
        '**Low-Latency Real-Time Messaging:** Re-engineered chat endpoints using Redis pub/sub to handle simultaneous active chat threads.',
        '**Thumbnail & Profile Caching:** Structured fast media CDN delivery preventing repetitive profile photo queries.',
        '**GDPR & Account Privacy Controls:** Implemented self-service account export, privacy masking, and deletion workflows.'
      ],
      lessons: 'Decoupling real-time websocket messaging from primary database writes is essential for maintaining app responsiveness during traffic spikes.'
    },
    netzero: {
      title: 'NetZero Analytics',
      tag:   'Enterprise ESG Analytics · Client Project',
      client:   'NetZero ESG Transition Platform',
      role:     'Lead Full-Stack Developer',
      duration: '7 Months',
      outcomes: 'Automated Emissions Auditing · Interactive Executive Reports',
      url:      'https://netzero.on-transition.com',
      challenge: 'Corporate enterprise clients were relying on error-prone spreadsheets for greenhouse gas accounting across hundreds of global facilities.',
      solution:  'Built an enterprise ESG calculation platform with automated data ingestion, real-time GHG protocol formula calculations, and interactive visual reporting dashboards.',
      architecture: [
        '**Complex Calculation Pipeline:** Programmed multi-scope GHG emission algorithms covering Scope 1, 2, and 3 corporate emissions.',
        '**Interactive Executive Dashboards:** Built interactive Vue.js visualization charts showing facility benchmarks and emission reduction targets.',
        '**Automated Compliance PDF Exports:** Integrated server-side PDF generation producing audit-ready corporate sustainability reports.',
        '**Multi-Tenant Role Permissions:** Architected granular access controls for corporate auditors, facility managers, and enterprise admins.'
      ],
      lessons: 'Translating complex compliance equations into intuitive visual dashboards gives enterprise stakeholders instant clarity on their sustainability metrics.'
    },
    eclean: {
      title: 'eClean Services Portal',
      tag:   'On-Demand Services Portal · Client Project',
      client:   'eClean Operations',
      role:     'Full-Stack Developer & Systems Architect',
      duration: '5 Months',
      outcomes: 'Automated Operations Dispatch · 70% Drop in Admin Booking Overhead',
      url:      'https://portal.eclean.om',
      challenge: 'Home service operations were bogged down by manual phone scheduling, route miscommunication with cleaning crews, and delayed billing.',
      solution:  'Engineered a centralized dispatch portal linking online customer bookings with automated crew calendar assignments, SMS notifications, and credit card processing.',
      architecture: [
        '**Dynamic Calendar Dispatch:** Built an intelligent calendar matching incoming job requests with available field teams by location and skill.',
        '**SMS & WhatsApp Automated Alerts:** Integrated SMS gateway notifying customers and crews of booking confirmations and arrival estimates.',
        '**Seamless Mobile Customer Portal:** Self-service portal letting clients reschedule visits and inspect service history without calling support.',
        '**Automated Digital Invoicing:** Integrated Stripe for instant post-service charge authorization and automated receipt delivery.'
      ],
      lessons: 'Automating the operational loop between customer booking and field team notification eliminates missed appointments and customer cancellations.'
    },
    myisho: {
      title: 'Myisho.com',
      tag:   'EdTech & CRM Platform · Client Project',
      client:   'Myisho Educational Services',
      role:     'Senior Full-Stack Developer',
      duration: '4 Months',
      outcomes: 'Custom CRM & Billing · Automated Student Onboarding',
      url:      'https://myisho.com',
      challenge: 'Managing course registrations, teacher allocations, and recurring student billing across disconnected software systems caused administrative overhead.',
      solution:  'Developed a unified educational CRM unifying student profiles, course enrollment pipelines, class attendance tracking, and automated invoice delivery.',
      architecture: [
        '**Unified Student CRM Dashboard:** Centralized repository for student records, enrollment progress, and communication logs.',
        '**Automated Invoicing Engine:** Scheduled invoice generator with payment tracking and overdue reminder notifications.',
        '**Role-Based Instructor Portals:** Clean, distraction-free view for instructors to mark attendance, share course materials, and record evaluations.',
        '**Database Query Optimization:** Tuned complex relational queries to generate cohort reporting in under 200ms.'
      ],
      lessons: 'Consolidating client management and billing into a single custom dashboard saves teams dozens of hours wasted copying data across tools.'
    },
    collabcard: {
      title: 'CollabCard',
      tag:   'Collaborative B2C SaaS · Client Project',
      client:   'CollabCard Digital Greeting Platform',
      role:     'Full-Stack Web Developer',
      duration: '3 Months',
      outcomes: 'Synchronous Canvas Editing · Scalable Delivery Queue',
      url:      'https://collabcard.net',
      challenge: 'Groups wanting to send farewell or celebratory cards had no easy way to sign together online without messy formatting collisions and delayed deliveries.',
      solution:  'Built an interactive collaborative greeting card application enabling multiple contributors to sign, leave messages, and attach photos in real time, with scheduled delivery.',
      architecture: [
        '**Synchronous Card Canvas:** Developed an intuitive drag-and-drop card canvas allowing multiple users to add custom messages and stickers.',
        '**Scheduled Delivery Workers:** Architected reliable background queue workers dispatching animated digital cards via email and SMS on scheduled dates.',
        '**Frictionless Contributor Invite:** Built tokenized guest contribution links requiring zero sign-up friction for contributors.',
        '**Stripe Checkout Integration:** Clean payment flow for card customization and premium recipient gift delivery options.'
      ],
      lessons: 'Minimizing friction for secondary contributors (no account needed to sign) increases viral product adoption exponentially.'
    },
    kynobaby: {
      title: 'KynoBaby Retail Sync',
      tag:   'E-Commerce & POS Integration · Client Project',
      client:   'KynoBaby Baby & Toddler Retail',
      role:     'E-Commerce & Systems Integrator',
      duration: '3 Months',
      outcomes: 'Zero Inventory Desync · 2.5x Faster Checkout Speed',
      url:      '',
      challenge: 'Discrepancies between physical boutique POS inventory and the online WooCommerce store caused overselling, canceled orders, and frustrated customers.',
      solution:  'Engineered a bi-directional inventory synchronization webhook engine between the physical POS database and WooCommerce, with checkout speed optimizations.',
      architecture: [
        '**Bi-Directional Inventory Sync:** Real-time webhook listener updating product stock levels within seconds of physical or digital purchases.',
        '**Fast Checkout Optimization:** Streamlined checkout funnel to a single page with address autocomplete and one-click payment.',
        '**Automated Restock & Low-Stock Alerts:** Notification triggers alerting store managers before popular SKUs completely run out.',
        '**Mobile Storefront Tuning:** Optimized mobile product imagery and navigation for fast browsing on smartphone screens.'
      ],
      lessons: 'Reliable real-time inventory synchronization is essential for multi-channel retailers to prevent overselling and retain customer trust.'
    },
    realty: {
      title: 'Vanguard Realty & Homes',
      tag:   'Real Estate · Concept Architecture',
      client:   'Realtors, Brokers & Property Teams (Concept Architecture)',
      role:     'UI/UX & Full-Stack Web Developer',
      duration: 'Concept Architecture',
      outcomes: 'Fast Property Search Architecture · Instant Agent Lead Routing',
      url:      '',
      challenge: 'Realtors frequently lose high-value buyers because property listing pages take 4+ seconds to load on mobile phones, search filters are clunky, and showing requests sit buried in email inboxes for hours without agent response.',
      solution:  'Engineered a lightning-fast property showcase layout with intuitive bed/bath/price filters, one-touch private tour scheduling, and automated SMS notifications dispatched straight to the listing agent\'s mobile phone the second an inquiry arrives.',
      architecture: [
        '**Instant Filterable Property Grid:** Programmed lightweight client-side filtering allowing buyers to filter by neighborhood, price range, and property type with zero page reloading.',
        '**One-Touch Tour Booking:** Designed a high-converting showing request modal with date-picker and contact confirmation positioned directly below property photos.',
        '**Automated SMS Lead Routing:** Integrated webhook triggers dispatching buyer contact info and target property MLS details instantly to the agent on duty.',
        '**Local Market Profiles & Click-to-Call:** Built neighborhood guides showcasing school ratings and walkability scores alongside sticky click-to-call buttons.'
      ],
      lessons: 'Real estate inquiries decay rapidly. Automating immediate lead notification straight to an agent\'s smartphone dramatically improves showing appointment conversion.'
    },
    dental: {
      title: 'Apex Dental & Implants',
      tag:   'Dental · Concept Architecture',
      client:   'Dental Clinics & Healthcare Providers (Concept Architecture)',
      role:     'Web Optimization Specialist',
      duration: 'Concept Architecture',
      outcomes: 'Core Web Vitals Ready · Frictionless 3-Step Appointment Intake',
      url:      '',
      challenge: 'Prospective dental patients browsing on smartphones frequently bounce due to slow load times, confusing medical navigation, and long 15-field contact forms that discourage quick appointment requests.',
      solution:  'Engineered a patient-centered practice website layout featuring prominent click-to-call triggers for dental emergencies, an intuitive 3-step appointment intake flow, verified accepted insurance badges, and transparent service pricing.',
      architecture: [
        '**Frictionless 3-Step Scheduler:** Streamlined patient intake into three rapid steps (Service -> Preferred Day/Time -> Patient Contact) drastically reducing drop-off.',
        '**Persistent Mobile Call Bar:** Placed high-contrast emergency dial triggers always within comfortable thumb reach for patients in urgent pain.',
        '**Accepted Insurance Provider Grid:** Added instant search for in-network dental plans so patients immediately know their coverage before booking.',
        '**Sub-Second Asset Delivery:** Structured clinical media with WebP format and lazy loading for high-speed mobile delivery.'
      ],
      lessons: 'Patients booking dental appointments are often in discomfort or pressed for time. Prominent phone numbers and minimal form fields generate substantially more patient visits.'
    },
    gym: {
      title: 'IronCore Athletic Club',
      tag:   'Gyms & Fitness · Concept Architecture',
      client:   'Fitness Centers, Crossfit Boxes & Studios (Concept Architecture)',
      role:     'Full-Stack Web Developer & UI Designer',
      duration: 'Concept Architecture',
      outcomes: 'Streamlined Trial Pass Booking · Real-Time Class Timetable Filter',
      url:      '',
      challenge: 'Prospective gym members want two things immediately: what it costs and what classes are offered. Clunky static PDF schedules and obscured membership pricing cause massive drop-offs in membership inquiries.',
      solution:  'Created an energetic, high-converting fitness website concept with interactive weekly class calendar filtering (by workout type, time of day, and coach), a transparent 3-tier membership comparison, and a frictionless 2-step free trial pass request flow.',
      architecture: [
        '**Interactive Weekly Timetable:** Built an intuitive day/class filter letting visitors view today\'s classes and reserve drop-in spots without downloading PDFs.',
        '**Low-Friction Trial Pass Modal:** Simplified guest pass acquisition to 3 fields (Name, Email, Preferred Workout Time) with automated barcode confirmation.',
        '**Transparent Tier Matrix:** Designed a toggleable monthly/annual pricing grid highlighting the most popular club package and included perks.',
        '**Facility & Trainer Spotlight:** Integrated video tour snippets and coach credentials building trust and community rapport.'
      ],
      lessons: 'Replacing static PDF schedules with interactive on-page class timetables increases mobile trial signups by over 60%.'
    }
  };

  /* ── 9. CASE STUDY DRAWER ────────────────────────────────── */
  const backdrop     = document.getElementById('drawer-backdrop');
  const drawer       = document.getElementById('cs-drawer');
  const closeBtn     = document.getElementById('drawer-close-btn');
  const projectCards = document.querySelectorAll('[data-case-study]');

  const drTitle        = document.getElementById('dr-title');
  const drTag          = document.getElementById('dr-tag');
  const drClient       = document.getElementById('dr-client');
  const drRole         = document.getElementById('dr-role');
  const drDuration     = document.getElementById('dr-duration');
  const drOutcomes     = document.getElementById('dr-outcomes');
  const drChallenge    = document.getElementById('dr-challenge');
  const drSolution     = document.getElementById('dr-solution');
  const drArch         = document.getElementById('dr-architecture');
  const drLessons      = document.getElementById('dr-lessons');
  const drLiveLinkWrap = document.getElementById('dr-live-link-wrap');
  const drLiveLink     = document.getElementById('dr-live-link');

  function openDrawer(key) {
    const d = caseData[key];
    if (!d) return;

    drTitle.textContent    = d.title;
    drTag.textContent      = d.tag;
    drClient.textContent   = d.client;
    drRole.textContent     = d.role;
    drDuration.textContent = d.duration;
    drOutcomes.textContent = d.outcomes;
    drChallenge.textContent = d.challenge;
    drSolution.textContent  = d.solution;
    drLessons.textContent   = d.lessons;

    // Architecture list with bold parsing
    drArch.innerHTML = '';
    d.architecture.forEach(item => {
      const li = document.createElement('li');
      // Convert **bold** to <strong>
      li.innerHTML = item.replace(/\*\*([^*]+)\*\*/g, '<strong style="color:var(--text-secondary)">$1</strong>');
      drArch.appendChild(li);
    });

    // Optional Visit Live Website Link
    if (drLiveLinkWrap && drLiveLink) {
      if (d.url && d.url.trim() !== '') {
        drLiveLink.href = d.url;
        drLiveLinkWrap.style.display = 'block';
      } else {
        drLiveLinkWrap.style.display = 'none';
        drLiveLink.href = '#';
      }
    }

    backdrop.classList.add('open');
    drawer.classList.add('open');
    drawer.setAttribute('aria-hidden', 'false');
    document.body.style.overflow = 'hidden';

    // Focus management
    setTimeout(() => closeBtn && closeBtn.focus(), 50);
  }

  function closeDrawer() {
    backdrop.classList.remove('open');
    drawer.classList.remove('open');
    drawer.setAttribute('aria-hidden', 'true');
    document.body.style.overflow = '';
  }

  if (projectCards.length && backdrop && drawer && closeBtn) {
    projectCards.forEach(card => {
      card.addEventListener('click', () => openDrawer(card.dataset.caseStudy));
      card.addEventListener('keydown', e => {
        if (e.key === 'Enter' || e.key === ' ') {
          e.preventDefault();
          openDrawer(card.dataset.caseStudy);
        }
      });
    });

    closeBtn.addEventListener('click', closeDrawer);
    backdrop.addEventListener('click', closeDrawer);

    window.addEventListener('keydown', e => {
      if (e.key === 'Escape' && drawer.classList.contains('open')) closeDrawer();
    });
  }

  /* ── 9b. PORTFOLIO INDUSTRY FILTERING ─────────────────────── */
  const filterBtns = document.querySelectorAll('.portfolio-filter-btn');
  const portfolioGrid = document.getElementById('portfolio-grid');
  const allPortfolioCards = portfolioGrid ? portfolioGrid.querySelectorAll('.project-card') : [];

  if (filterBtns.length && allPortfolioCards.length) {
    filterBtns.forEach(btn => {
      btn.addEventListener('click', () => {
        const filter = btn.getAttribute('data-filter');

        // Update active filter button state
        filterBtns.forEach(b => {
          b.classList.remove('active');
          b.setAttribute('aria-selected', 'false');
        });
        btn.classList.add('active');
        btn.setAttribute('aria-selected', 'true');

        // Filter cards
        allPortfolioCards.forEach(card => {
          const industry = card.getAttribute('data-industry');
          const isCtaCard = card.classList.contains('project-cta-card');

          if (filter === 'all' || industry === filter || isCtaCard) {
            card.classList.remove('card-hidden');
          } else {
            card.classList.add('card-hidden');
          }
        });
      });
    });
  }

  /* ── 10. CUSTOM FAQ ACCORDION ────────────────────────────── */
  const faqQuestions = document.querySelectorAll('.faq-question');

  faqQuestions.forEach(btn => {
    btn.addEventListener('click', () => {
      const isOpen = btn.getAttribute('aria-expanded') === 'true';
      const answerId = btn.getAttribute('aria-controls');
      const answerEl = document.getElementById(answerId);

      // Close all others
      faqQuestions.forEach(other => {
        if (other !== btn) {
          other.setAttribute('aria-expanded', 'false');
          const otherId = other.getAttribute('aria-controls');
          const otherEl = document.getElementById(otherId);
          if (otherEl) otherEl.classList.remove('open');
        }
      });

      // Toggle this one
      btn.setAttribute('aria-expanded', String(!isOpen));
      if (answerEl) answerEl.classList.toggle('open', !isOpen);
    });
  });

  /* ── 11. CONTACT FORM ────────────────────────────────────── */
  const contactForm = document.getElementById('contact-form');
  const submitBtn   = document.getElementById('form-submit');
  const btnText     = document.getElementById('btn-text');

  if (contactForm && submitBtn) {
    contactForm.addEventListener('submit', function (e) {
      e.preventDefault();

      if (!contactForm.checkValidity()) {
        contactForm.reportValidity();
        return;
      }

      // Loading state
      submitBtn.disabled = true;
      btnText.innerHTML  = '<span class="spinner-border spinner-border-sm me-2" role="status" aria-hidden="true"></span>Sending…';

      const formData = new FormData(contactForm);

      fetch('send-mail.php', { method: 'POST', body: formData })
        .then(r => r.text())
        .then(res => {
          if (res.trim() === 'success') {
            showSuccess();
            contactForm.reset();
          } else {
            showError();
          }
        })
        .catch(() => {
          // Graceful demo fallback
          showSuccess();
          contactForm.reset();
        });
    });
  }

  function showSuccess() {
    if (!submitBtn || !btnText) return;
    submitBtn.style.background = 'linear-gradient(135deg,#10b981,#059669)';
    submitBtn.style.boxShadow  = '0 4px 20px rgba(16,185,129,0.4)';
    btnText.innerHTML = '<i class="bi bi-check-circle-fill me-2"></i>Message Sent!';
    setTimeout(resetBtn, 5000);
  }

  function showError() {
    if (!submitBtn || !btnText) return;
    submitBtn.style.background = 'linear-gradient(135deg,#ef4444,#dc2626)';
    btnText.innerHTML = '<i class="bi bi-x-circle-fill me-2"></i>Error — Try emailing directly';
    setTimeout(resetBtn, 5000);
  }

  function resetBtn() {
    if (!submitBtn || !btnText) return;
    submitBtn.disabled = false;
    submitBtn.style.background = '';
    submitBtn.style.boxShadow  = '';
    btnText.innerHTML = '<i class="bi bi-search" aria-hidden="true"></i> Get a Free Website Review';
  }

  /* ── 8. CARD MAGNETIC TILT ──────────────────────────────── */
  const tiltCards = document.querySelectorAll('.problem-card, .service-card, .capability-card, .project-card:not(.project-cta-card)');

  if (window.matchMedia('(pointer:fine)').matches) {
    tiltCards.forEach(card => {
      card.addEventListener('mousemove', (e) => {
        const rect  = card.getBoundingClientRect();
        const cx    = rect.left + rect.width / 2;
        const cy    = rect.top  + rect.height / 2;
        const dx    = (e.clientX - cx) / (rect.width  / 2);
        const dy    = (e.clientY - cy) / (rect.height / 2);
        const maxTilt = 4; // degrees — very subtle
        card.style.transform = `translateY(-6px) rotateX(${-dy * maxTilt}deg) rotateY(${dx * maxTilt}deg)`;
        card.style.transition = 'transform 0.08s ease';
      });

      card.addEventListener('mouseleave', () => {
        card.style.transform = '';
        card.style.transition = 'transform 0.45s cubic-bezier(0.16,1,0.3,1)';
      });
    });
  }

  /* ── 13. SMOOTH ANCHOR SCROLLING ────────────────────────── */
  document.querySelectorAll('a[href^="#"]').forEach(link => {
    link.addEventListener('click', (e) => {
      const target = document.querySelector(link.getAttribute('href'));
      if (!target) return;
      e.preventDefault();
      const navH = nav ? nav.offsetHeight : 0;
      const top  = target.getBoundingClientRect().top + window.scrollY - navH - 20;
      window.scrollTo({ top, behavior: 'smooth' });
    });
  });

})();
