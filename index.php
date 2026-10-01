<?php
require_once __DIR__ . '/portfolio-data.php';
$pageTitle       = "Vamsi Krishna Dasari | Website Fixes, Improvements & Performance Specialist";
$pageDescription = "I fix broken functionality, slow pages, and mobile issues for business owners. 15+ years experience, 100% fixed-price work, direct 1-on-1 communication.";
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Google tag (gtag.js) -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=G-QPMR6J2J24"></script>
  <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'G-QPMR6J2J24');
  </script>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title><?php echo $pageTitle; ?></title>
  <meta name="description" content="<?php echo $pageDescription; ?>" />
  <link rel="canonical" href="https://vamsidev.com/" />
  <meta name="robots" content="index, follow" />
  <meta property="og:type" content="website" />
  <meta property="og:url" content="https://vamsidev.com/" />
  <meta property="og:title" content="<?php echo $pageTitle; ?>" />
  <meta property="og:description" content="<?php echo $pageDescription; ?>" />
  <meta property="og:image" content="https://vamsidev.com/assets/images/about2.jpg" />
  <meta name="twitter:card" content="summary_large_image" />
  <meta name="twitter:title" content="<?php echo $pageTitle; ?>" />
  <meta name="twitter:description" content="<?php echo $pageDescription; ?>" />
  <meta name="twitter:image" content="https://vamsidev.com/assets/images/about2.jpg" />

  <!-- Favicon -->
  <link rel="icon" type="image/png" href="assets/images/favicon.png" />
  <link rel="apple-touch-icon" href="assets/images/favicon.png" />

  <!-- Critical Inline Dark Theme CSS -->
  <style>
    html, body {
      background-color: #09090b !important;
      color: #fafafa;
      margin: 0;
      padding: 0;
      font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
      -webkit-font-smoothing: antialiased;
    }
    #scroll-progress {
      position: fixed;
      top: 0;
      left: 0;
      height: 2px;
      background: linear-gradient(90deg, #6366f1, #a855f7, #06b6d4);
      z-index: 9999;
      width: 0%;
      transition: width 0.1s linear;
    }
    .hero-section {
      min-height: 86vh;
      background-color: #09090b;
    }
    .hero-heading {
      color: #fafafa;
    }
  </style>

  <!-- Preconnect to external domains -->
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link rel="preconnect" href="https://cdn.jsdelivr.net" />

  <!-- Optimized Fonts with Swap -->
  <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;500;600;700;800;900&family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet" />

  <!-- Stylesheets -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="style.css" />
</head>
<body>

  <!-- Skip Navigation for Accessibility -->
  <a href="#main-content" class="skip-nav">Skip to main content</a>

  <!-- Scroll progress bar -->
  <div id="scroll-progress" aria-hidden="true"></div>

  <!-- Cursor spotlight on desktop -->
  <div id="cursor-spotlight" aria-hidden="true"></div>

  <!-- ── 1. NAVIGATION ─────────────────────────────────────── -->
  <nav id="main-nav" class="site-nav" aria-label="Main navigation">
    <div class="nav-inner container-fluid">
      <a href="#hero" class="nav-logo" aria-label="VamsiDev Home">
        <img src="assets/images/about2.jpg" alt="Vamsi Krishna" class="nav-avatar" width="32" height="32" loading="eager" />
        <span class="logo-mark">VK</span>
        <span class="logo-text d-none d-sm-inline">VamsiDev</span>
      </a>

      <ul class="nav-links" role="list">
        <li><a href="#services" class="nav-link-item">Services</a></li>
        <li><a href="#how-it-works" class="nav-link-item">Process</a></li>
        <li><a href="#industries" class="nav-link-item">Industries</a></li>
        <li><a href="#work" class="nav-link-item">Work</a></li>
        <li><a href="#pricing" class="nav-link-item">Pricing</a></li>
        <li><a href="#about" class="nav-link-item">About</a></li>
        <li><a href="#faq" class="nav-link-item">FAQ</a></li>
      </ul>

      <a href="#contact" class="nav-cta" aria-label="Get a Free Website Review">
        <span>Free Website Review</span>
        <i class="bi bi-arrow-up-right" aria-hidden="true"></i>
      </a>

      <button class="nav-burger" id="nav-burger" aria-label="Toggle navigation" aria-expanded="false">
        <span></span><span></span>
      </button>
    </div>

    <!-- Mobile menu -->
    <div class="nav-mobile" id="nav-mobile" aria-hidden="true">
      <a href="#services" class="nav-mobile-link">Services</a>
      <a href="#how-it-works" class="nav-mobile-link">How It Works</a>
      <a href="#industries" class="nav-mobile-link">Industries</a>
      <a href="#work" class="nav-mobile-link">Work</a>
      <a href="#before-after" class="nav-mobile-link">Before &amp; After</a>
      <a href="#pricing" class="nav-mobile-link">Pricing</a>
      <a href="#about" class="nav-mobile-link">About</a>
      <a href="#faq" class="nav-mobile-link">FAQ</a>
      <a href="#contact" class="nav-mobile-link nav-mobile-cta">Free Website Review →</a>
    </div>
  </nav>

  <span id="main-content" tabindex="-1" aria-hidden="true" style="position:absolute;top:0;left:0;width:0;height:0;overflow:hidden;"></span>

  <!-- ── 2. HERO SECTION ───────────────────────────────────── -->
  <section id="hero" class="hero-section" aria-label="Hero section">
    <div class="hero-orb orb-1" aria-hidden="true"></div>
    <div class="hero-orb orb-2" aria-hidden="true"></div>
    <div class="hero-grid" aria-hidden="true"></div>

    <div class="container hero-container-split">
      
      <!-- LEFT COLUMN: Headline & Core Pitch -->
      <div class="hero-left-col d-flex flex-column align-items-center align-items-lg-start text-center text-lg-start">
        
        <!-- Compact Availability Badge -->
        <div class="avail-badge reveal-up" aria-label="Availability status">
          <span class="avail-dot" aria-hidden="true"></span>
          Available for Website Fixes &amp; Free Reviews
        </div>

        <!-- Primary Headline -->
        <h1 class="hero-heading reveal-up delay-1">
          Your Website Shouldn't Get in the Way of <span class="grad-text">Your Business.</span>
        </h1>

        <!-- Supporting Text -->
        <p class="hero-body reveal-up delay-2 mx-auto mx-lg-0">
          I fix broken functionality, slow pages, mobile issues and other website problems that can cost you customers.
        </p>

        <!-- Compact Service Line -->
        <div class="hero-service-line reveal-up delay-2">
          <span>Website Fixes</span>
          <span class="sep">·</span>
          <span>Improvements</span>
          <span class="sep">·</span>
          <span>Performance</span>
          <span class="sep">·</span>
          <span>Maintenance</span>
        </div>

        <!-- CTA Buttons -->
        <div class="hero-cta-row reveal-up delay-3 w-100 d-flex flex-column flex-sm-row align-items-stretch align-items-sm-center justify-content-center justify-content-lg-start gap-3">
          <a href="#contact" class="btn-primary-glow w-100 w-sm-auto justify-content-center">
            <i class="bi bi-search" aria-hidden="true"></i>
            Get a Free Website Review
          </a>
          <a href="#work" class="btn-ghost-outline w-100 w-sm-auto justify-content-center">
            See My Work
            <i class="bi bi-arrow-down" aria-hidden="true"></i>
          </a>
        </div>

        <!-- Small Credibility Line -->
        <div class="hero-credibility-line reveal-up delay-4">
          <i class="bi bi-shield-check text-green" aria-hidden="true"></i>
          <span>15+ years of web development experience · Fixed-price work · Direct communication</span>
        </div>

      </div>

      <!-- RIGHT COLUMN: BEFORE → AFTER Website Improvement Presentation -->
      <div class="hero-right-col reveal-up delay-2" id="hero-transform-container">
        
        <div class="ba-hero-panel">
          <!-- Window Chrome Header -->
          <div class="ba-window-header">
            <div class="ba-window-dots" aria-hidden="true">
              <span></span><span></span><span></span>
            </div>
            <div class="ba-window-url">
              <i class="bi bi-lock-fill" aria-hidden="true"></i>
              <span>clientwebsite.com</span>
            </div>
            <div class="ba-window-tag">
              <span class="pulse-beacon" aria-hidden="true"></span>
              <span>Website Audit</span>
            </div>
          </div>

          <!-- Interactive View Switcher -->
          <div class="ba-toggle-bar" role="tablist" aria-label="Transformation state">
            <button class="ba-toggle-btn active" id="btn-show-after" role="tab" aria-selected="true">
              <i class="bi bi-check-circle-fill text-green"></i> AFTER (Fixed &amp; Optimized)
            </button>
            <button class="ba-toggle-btn" id="btn-show-before" role="tab" aria-selected="false">
              <i class="bi bi-exclamation-triangle-fill text-amber"></i> BEFORE (Problems Found)
            </button>
          </div>

          <!-- Preview Content: AFTER State (Default) -->
          <div class="ba-preview-body" id="state-after">
            <div class="ba-status-banner banner-success">
              <div class="ba-speed-score score-green" aria-label="Mobile Speed Score: 98 out of 100">
                <svg class="score-ring" viewBox="0 0 80 80" aria-hidden="true">
                  <circle class="score-ring-bg" cx="40" cy="40" r="33"/>
                  <circle class="score-ring-arc score-arc-green" cx="40" cy="40" r="33"
                    stroke-dasharray="207.3 207.3"
                    stroke-dashoffset="4.1"
                    data-offset-target="4.1"/>
                </svg>
                <div class="score-inner">
                  <span class="score-val">98</span>
                  <span class="score-lbl">Mobile</span>
                </div>
              </div>
              <div class="ba-banner-text">
                <strong>0.5s Fast Load Time · Passed Google Core Web Vitals</strong>
                <span>All critical mobile and conversion issues resolved</span>
              </div>
            </div>

            <div class="ba-fixes-list">
              <div class="ba-fix-item fix-solved">
                <i class="bi bi-check-lg" aria-hidden="true"></i>
                <div class="ba-fix-info">
                  <strong>One-Tap Click-to-Call Active</strong>
                  <span>Mobile visitors instantly dial your phone with zero friction</span>
                </div>
                <span class="ba-badge badge-green">Fixed</span>
              </div>

              <div class="ba-fix-item fix-solved">
                <i class="bi bi-check-lg" aria-hidden="true"></i>
                <div class="ba-fix-info">
                  <strong>Online Booking &amp; Forms Working</strong>
                  <span>Clean lead capture with instant email/SMS alert to your phone</span>
                </div>
                <span class="ba-badge badge-green">Fixed</span>
              </div>

              <div class="ba-fix-item fix-solved">
                <i class="bi bi-check-lg" aria-hidden="true"></i>
                <div class="ba-fix-info">
                  <strong>100% Mobile Responsive Layout</strong>
                  <span>No squished text, broken menus, or clumsy pinch-to-zoom</span>
                </div>
                <span class="ba-badge badge-green">Fixed</span>
              </div>
            </div>

            <div class="ba-card-footer">
              <span><i class="bi bi-clock-history text-indigo"></i> Delivered in 24–48 Hours</span>
              <span><i class="bi bi-currency-dollar text-green"></i> 100% Fixed Price</span>
            </div>
          </div>

          <!-- Preview Content: BEFORE State -->
          <div class="ba-preview-body d-none" id="state-before">
            <div class="ba-status-banner banner-warning">
              <div class="ba-speed-score score-red" aria-label="Mobile Speed Score: 42 out of 100">
                <svg class="score-ring" viewBox="0 0 80 80" aria-hidden="true">
                  <circle class="score-ring-bg" cx="40" cy="40" r="33"/>
                  <circle class="score-ring-arc score-arc-red" cx="40" cy="40" r="33"
                    stroke-dasharray="207.3 207.3"
                    stroke-dashoffset="120.2"
                    data-offset-target="120.2"/>
                </svg>
                <div class="score-inner">
                  <span class="score-val">42</span>
                  <span class="score-lbl">Mobile</span>
                </div>
              </div>
              <div class="ba-banner-text">
                <strong>4.6s Slow Load · High Mobile Visitor Bounce Rate</strong>
                <span>Common problems costing the business leads every week</span>
              </div>
            </div>

            <div class="ba-fixes-list">
              <div class="ba-fix-item fix-issue">
                <i class="bi bi-x-lg" aria-hidden="true"></i>
                <div class="ba-fix-info">
                  <strong>Unclickable Phone Number</strong>
                  <span>Customers had to manually copy &amp; paste phone number to call</span>
                </div>
                <span class="ba-badge badge-red">Problem</span>
              </div>

              <div class="ba-fix-item fix-issue">
                <i class="bi bi-x-lg" aria-hidden="true"></i>
                <div class="ba-fix-info">
                  <strong>Broken Contact / Booking Form</strong>
                  <span>Submissions silently failing or sending no notifications</span>
                </div>
                <span class="ba-badge badge-red">Problem</span>
              </div>

              <div class="ba-fix-item fix-issue">
                <i class="bi bi-x-lg" aria-hidden="true"></i>
                <div class="ba-fix-info">
                  <strong>Broken Mobile Menu &amp; Cut-Off Text</strong>
                  <span>Navigation collapsed improperly on modern smartphones</span>
                </div>
                <span class="ba-badge badge-red">Problem</span>
              </div>
            </div>

            <div class="ba-card-footer">
              <span><i class="bi bi-arrow-right-circle text-amber"></i> Need these fixed on your site?</span>
              <a href="#contact" class="ba-quick-link">Get Free Review →</a>
            </div>
          </div>

          <div class="ba-disclaimer text-center py-2 px-3 border-top" style="border-color: var(--border-subtle) !important;">
            <span class="text-muted" style="font-size: 0.74rem;"><i class="bi bi-info-circle me-1" aria-hidden="true"></i> Illustrative optimization example based on typical Core Web Vitals and mobile repair benchmarks.</span>
          </div>

        </div><!-- /.ba-hero-panel -->

      </div><!-- /.hero-right-col -->

    </div><!-- /.container -->
  </section>

  <!-- ── 3. TRUST BAR ───────────────────────────────────────── -->
  <section class="trust-section" aria-label="Trust and credibility">
    <div class="container">
      <div class="trust-stats reveal-up">
        <div class="trust-stat">
          <strong class="ts-value"><i class="bi bi-award-fill text-indigo" aria-hidden="true"></i> 15+ Years</strong>
          <span class="ts-label">Hands-On Web Engineering</span>
        </div>
        <div class="trust-divider" aria-hidden="true"></div>
        <div class="trust-stat">
          <strong class="ts-value">100% Fixed Price</strong>
          <span class="ts-label">Agreed Upfront · Zero Surprise Invoices</span>
        </div>
        <div class="trust-divider" aria-hidden="true"></div>
        <div class="trust-stat">
          <strong class="ts-value">24–48h Turnaround</strong>
          <span class="ts-label">Fast Fixes · Staging-Verified</span>
        </div>
        <div class="trust-divider" aria-hidden="true"></div>
        <div class="trust-stat">
          <a href="https://upwork.com/freelancers/dasarikrishnak" target="_blank" rel="noopener noreferrer" class="ts-rating-link text-decoration-none" aria-label="5.0 Rating on Upwork (opens in new tab)">
            <strong class="ts-value"><i class="bi bi-star-fill text-amber" aria-hidden="true"></i> 5.0 ★ Rating</strong>
            <span class="ts-label">Verified Upwork Profile <i class="bi bi-box-arrow-up-right" style="font-size:0.65rem;"></i></span>
          </a>
        </div>
      </div>

      <!-- Partner Logos -->
      <div class="text-center mt-4 mb-2">
        <span class="text-muted text-uppercase" style="font-size: 0.72rem; letter-spacing: 0.08em;">Selected Platforms &amp; Client Systems Worked On</span>
      </div>
      <div class="ticker-wrapper mt-2" aria-label="Businesses and platforms worked on">
        <div class="ticker-fade-l" aria-hidden="true"></div>
        <div class="ticker-track" id="ticker-track">
          <img src="assets/images/partner/wordpress.svg" alt="WordPress" width="120" height="32" loading="lazy" />
          <img src="assets/images/partner/laravel.svg" alt="Laravel" width="110" height="32" loading="lazy" />
          <img src="assets/images/partner/stripe.svg" alt="Stripe" width="95" height="32" loading="lazy" />
          <img src="assets/images/partner/woocommerce.svg" alt="WooCommerce" width="140" height="32" loading="lazy" />
          <img src="assets/images/partner/shopify.svg" alt="Shopify" width="100" height="32" loading="lazy" />
          <img src="assets/images/partner/php.svg" alt="PHP" width="80" height="32" loading="lazy" />
          <img src="assets/images/partner/mysql.svg" alt="MySQL" width="95" height="32" loading="lazy" />
          <img src="assets/images/partner/redis.svg" alt="Redis" width="90" height="32" loading="lazy" />
          <img src="assets/images/partner/bootstrap.svg" alt="Bootstrap" width="110" height="32" loading="lazy" />
          <img src="assets/images/partner/aws.svg" alt="AWS" width="80" height="32" loading="lazy" />
          <!-- Duplicated for loop -->
          <img src="assets/images/partner/wordpress.svg" alt="" aria-hidden="true" width="120" height="32" loading="lazy" />
          <img src="assets/images/partner/laravel.svg" alt="" aria-hidden="true" width="110" height="32" loading="lazy" />
          <img src="assets/images/partner/stripe.svg" alt="" aria-hidden="true" width="95" height="32" loading="lazy" />
          <img src="assets/images/partner/woocommerce.svg" alt="" aria-hidden="true" width="140" height="32" loading="lazy" />
          <img src="assets/images/partner/shopify.svg" alt="" aria-hidden="true" width="100" height="32" loading="lazy" />
          <img src="assets/images/partner/php.svg" alt="" aria-hidden="true" width="80" height="32" loading="lazy" />
          <img src="assets/images/partner/mysql.svg" alt="" aria-hidden="true" width="95" height="32" loading="lazy" />
          <img src="assets/images/partner/redis.svg" alt="" aria-hidden="true" width="90" height="32" loading="lazy" />
          <img src="assets/images/partner/bootstrap.svg" alt="" aria-hidden="true" width="110" height="32" loading="lazy" />
          <img src="assets/images/partner/aws.svg" alt="" aria-hidden="true" width="80" height="32" loading="lazy" />
        </div>
        <div class="ticker-fade-r" aria-hidden="true"></div>
      </div>
    </div>
  </section>

  <!-- ── 4. PROBLEM & SERVICE SECTION ───────────────────────── -->
  <section id="services" class="section-block section-alt" aria-labelledby="services-heading">
    <div class="container">
      <div class="section-header text-center reveal-up">
        <span class="eyebrow">Practical Website Help</span>
        <h2 class="section-heading" id="services-heading">Something Wrong With Your Website?</h2>
        <p class="section-sub">
          Many businesses don't need a completely new website. They simply need the existing one fixed, speeded up, or improved so it stops losing customers.
        </p>
      </div>

      <div class="row g-4 justify-content-center">
        <!-- Service Card 1 -->
        <div class="col-12 col-md-6 col-lg-3">
          <div class="problem-card reveal-up">
            <div class="p-card-icon icon-indigo">
              <i class="bi bi-tools" aria-hidden="true"></i>
            </div>
            <h3 class="p-card-title">Broken or Missing Functionality</h3>
            <p class="p-card-desc">
              Forms, buttons, links, booking systems and third-party integrations that don't work properly or fail silently.
            </p>
            <ul class="p-card-list">
              <li><i class="bi bi-check2 text-green"></i> Contact &amp; quote forms</li>
              <li><i class="bi bi-check2 text-green"></i> Booking calendar glitches</li>
              <li><i class="bi bi-check2 text-green"></i> Broken links &amp; 404 errors</li>
            </ul>
          </div>
        </div>

        <!-- Service Card 2 -->
        <div class="col-12 col-md-6 col-lg-3">
          <div class="problem-card reveal-up">
            <div class="p-card-icon icon-cyan">
              <i class="bi bi-lightning-charge-fill" aria-hidden="true"></i>
            </div>
            <h3 class="p-card-title">Slow Website</h3>
            <p class="p-card-desc">
              Page speed optimization, image compression, database query tuning, and server-side improvements so pages load instantly.
            </p>
            <ul class="p-card-list">
              <li><i class="bi bi-check2 text-green"></i> Sub-second page loads</li>
              <li><i class="bi bi-check2 text-green"></i> Google Core Web Vitals</li>
              <li><i class="bi bi-check2 text-green"></i> Image &amp; asset compression</li>
            </ul>
          </div>
        </div>

        <!-- Service Card 3 -->
        <div class="col-12 col-md-6 col-lg-3">
          <div class="problem-card reveal-up">
            <div class="p-card-icon icon-purple">
              <i class="bi bi-phone" aria-hidden="true"></i>
            </div>
            <h3 class="p-card-title">Mobile Problems</h3>
            <p class="p-card-desc">
              Fix mobile layouts, awkward navigation menus, cut-off text, broken tap buttons, and usability issues on phones.
            </p>
            <ul class="p-card-list">
              <li><i class="bi bi-check2 text-green"></i> Click-to-call mobile setup</li>
              <li><i class="bi bi-check2 text-green"></i> Mobile menu repairs</li>
              <li><i class="bi bi-check2 text-green"></i> Thumb-friendly buttons</li>
            </ul>
          </div>
        </div>

        <!-- Service Card 4 -->
        <div class="col-12 col-md-6 col-lg-3">
          <div class="problem-card reveal-up">
            <div class="p-card-icon icon-green">
              <i class="bi bi-arrow-up-right-circle-fill" aria-hidden="true"></i>
            </div>
            <h3 class="p-card-title">Website Improvements</h3>
            <p class="p-card-desc">
              New sections, targeted landing pages, checkout features, updated branding, UX improvements and conversion tweaks.
            </p>
            <ul class="p-card-list">
              <li><i class="bi bi-check2 text-green"></i> New landing pages</li>
              <li><i class="bi bi-check2 text-green"></i> Online payment checkouts</li>
              <li><i class="bi bi-check2 text-green"></i> Conversion-focused layout</li>
            </ul>
          </div>
        </div>
      </div>

      <div class="text-center mt-5">
        <a href="#contact" class="btn-primary-glow">
          <i class="bi bi-chat-text" aria-hidden="true"></i>
          Tell Me What Needs Fixing
        </a>
      </div>
    </div>
  </section>

  <!-- ── 4b. HOW IT WORKS ────────────────────────────────────── -->
  <section id="how-it-works" class="section-block section-deep" aria-labelledby="hiw-heading">
    <div class="container">
      <div class="section-header text-center reveal-up">
        <span class="eyebrow">Safe &amp; Predictable Process</span>
        <h2 class="section-heading" id="hiw-heading">How It Works: 4 Simple Steps</h2>
        <p class="section-sub">
          No live crashes, no surprise invoices, and zero technical stress. Your live site stays protected from start to finish.
        </p>
      </div>

      <div class="row g-4">
        <!-- Step 1 -->
        <div class="col-12 col-md-6 col-lg-3">
          <div class="step-card reveal-up">
            <div class="step-badge">Step 01</div>
            <div class="step-icon-wrap">
              <i class="bi bi-search text-indigo" aria-hidden="true"></i>
            </div>
            <h3 class="step-title">Free Review &amp; Diagnosis</h3>
            <p class="step-desc">
              Share your website URL and what needs attention. I inspect the code, identify the root cause, and provide a 100% fixed-price quote with zero obligation.
            </p>
          </div>
        </div>

        <!-- Step 2 -->
        <div class="col-12 col-md-6 col-lg-3">
          <div class="step-card reveal-up">
            <div class="step-badge">Step 02</div>
            <div class="step-icon-wrap">
              <i class="bi bi-shield-check text-purple" aria-hidden="true"></i>
            </div>
            <h3 class="step-title">Staged &amp; Tested Safely</h3>
            <p class="step-desc">
              All fixes and optimizations are developed on a private staging duplicate or isolated sandbox. Your live website remains 100% untouched and accepting customers.
            </p>
          </div>
        </div>

        <!-- Step 3 -->
        <div class="col-12 col-md-6 col-lg-3">
          <div class="step-card reveal-up">
            <div class="step-badge">Step 03</div>
            <div class="step-icon-wrap">
              <i class="bi bi-display text-cyan" aria-hidden="true"></i>
            </div>
            <h3 class="step-title">Walkthrough &amp; Approval</h3>
            <p class="step-desc">
              You receive a private preview link to test the fix yourself. We confirm forms submit, mobile menus open smoothly, and speed scores pass before touching production.
            </p>
          </div>
        </div>

        <!-- Step 4 -->
        <div class="col-12 col-md-6 col-lg-3">
          <div class="step-card reveal-up">
            <div class="step-badge">Step 04</div>
            <div class="step-icon-wrap">
              <i class="bi bi-rocket-takeoff-fill text-green" aria-hidden="true"></i>
            </div>
            <h3 class="step-title">Deploy &amp; 30-Day Warranty</h3>
            <p class="step-desc">
              Once approved, updates are deployed seamlessly with zero planned downtime, backed by a 30-day post-launch warranty and prompt direct support.
            </p>
          </div>
        </div>
      </div>

      <div class="hiw-guarantee-strip mt-4 text-center reveal-up">
        <span class="step-security-badge"><i class="bi bi-shield-lock-fill text-indigo me-2"></i><strong>Credential Safety Guarantee:</strong> Share access securely via temporary admin roles or encrypted password managers (1Password/Bitwarden). Never email master passwords.</span>
      </div>
    </div>
  </section>

  <!-- ── 5. INDUSTRY SECTION ────────────────────────────────── -->
  <section id="industries" class="section-block section-alt" aria-labelledby="ind-heading">
    <div class="container">
      <div class="section-header text-center reveal-up">
        <span class="eyebrow">Tailored Solutions</span>
        <h2 class="section-heading" id="ind-heading">Websites for Businesses Like Yours</h2>
        <p class="section-sub">
          I understand the specific features, booking flows, and conversion requirements that make your business website succeed.
        </p>
      </div>

      <div class="row g-4">
        <!-- Industry 1: Real Estate -->
        <div class="col-12 col-sm-6 col-lg-3">
          <div class="industry-box reveal-up">
            <div class="ind-icon-wrap">
              <i class="bi bi-house-door-fill" aria-hidden="true"></i>
            </div>
            <h3 class="ind-title">Real Estate</h3>
            <p class="ind-desc">
              Property websites, realtor websites, lead generation, showing request forms, and conversion-focused improvements.
            </p>
            <div class="ind-pill">Lead Capture &amp; Fast Search</div>
          </div>
        </div>

        <!-- Industry 2: Dental -->
        <div class="col-12 col-sm-6 col-lg-3">
          <div class="industry-box reveal-up">
            <div class="ind-icon-wrap">
              <i class="bi bi-clipboard2-pulse-fill" aria-hidden="true"></i>
            </div>
            <h3 class="ind-title">Dental</h3>
            <p class="ind-desc">
              Modern dental practice websites, appointment flows, click-to-call buttons, and patient-friendly mobile UX.
            </p>
            <div class="ind-pill">Patient Bookings &amp; Intake</div>
          </div>
        </div>

        <!-- Industry 3: Limo & Transportation -->
        <div class="col-12 col-sm-6 col-lg-3">
          <div class="industry-box reveal-up">
            <div class="ind-icon-wrap">
              <i class="bi bi-car-front-fill" aria-hidden="true"></i>
            </div>
            <h3 class="ind-title">Limo &amp; Transportation</h3>
            <p class="ind-desc">
              Fleet presentation, instant quote requests, booking experiences, route estimation, and mobile-friendly websites.
            </p>
            <div class="ind-pill">Instant Quotes &amp; Dispatch</div>
          </div>
        </div>

        <!-- Industry 4: Gyms & Fitness -->
        <div class="col-12 col-sm-6 col-lg-3">
          <div class="industry-box reveal-up">
            <div class="ind-icon-wrap">
              <i class="bi bi-heart-pulse-fill" aria-hidden="true"></i>
            </div>
            <h3 class="ind-title">Gyms &amp; Fitness</h3>
            <p class="ind-desc">
              Membership CTAs, class schedules, trainer profiles, trial bookings, and high-converting modern websites.
            </p>
            <div class="ind-pill">Class Schedules &amp; Signups</div>
          </div>
        </div>
      </div>

      <!-- Other Local Businesses Link -->
      <div class="other-industries-box text-center mt-4 reveal-up">
        <p class="mb-2 text-secondary">
          Also working with contractors, healthcare clinics, law firms, consultants, and service providers.
        </p>
        <a href="#contact" class="other-industries-link">
          <span>Other Local Businesses — Let's talk about your website</span>
          <i class="bi bi-arrow-right" aria-hidden="true"></i>
        </a>
      </div>
    </div>
  </section>

  <!-- ── 6. BEFORE / AFTER SHOWCASE ─────────────────────────── -->
  <section id="before-after" class="section-block section-alt" aria-labelledby="ba-heading">
    <div class="container">
      <div class="section-header text-center reveal-up">
        <span class="eyebrow">Practical Impact</span>
        <h2 class="section-heading" id="ba-heading">Small Changes Can Make a Big Difference</h2>
        <p class="section-sub">
          You don't need an expensive complete website rebuild to fix the issues hurting your conversions. Here are real improvements that immediately pay for themselves:
        </p>
      </div>

      <div class="ba-showcase-grid">
        <!-- Example 1: Click to Call -->
        <div class="ba-comparison-card reveal-up">
          <div class="ba-card-top">
            <div class="ba-side ba-side-before">
              <span class="ba-label red">BEFORE</span>
              <h4>Non-Clickable Phone Number</h4>
              <p>Phone number listed as plain text. Mobile visitors had to manually copy, memorize, or re-type the number, causing 40%+ drop-off.</p>
            </div>
            <div class="ba-arrow" aria-hidden="true"><i class="bi bi-arrow-right"></i></div>
            <div class="ba-side ba-side-after">
              <span class="ba-label green">AFTER FIX</span>
              <h4>One-Tap Click-to-Call</h4>
              <p>Prominent header &amp; sticky mobile call button. Visitors tap once to immediately ring your front desk or reception.</p>
            </div>
          </div>
        </div>

        <!-- Example 2: Broken Form -->
        <div class="ba-comparison-card reveal-up">
          <div class="ba-card-top">
            <div class="ba-side ba-side-before">
              <span class="ba-label red">BEFORE</span>
              <h4>Broken Contact / Quote Form</h4>
              <p>Forms silently throwing server errors, submitting without notifications, or buried under broken plugins.</p>
            </div>
            <div class="ba-arrow" aria-hidden="true"><i class="bi bi-arrow-right"></i></div>
            <div class="ba-side ba-side-after">
              <span class="ba-label green">AFTER FIX</span>
              <h4>Clean, Working Lead Capture</h4>
              <p>Validated form fields, spam protection, instant email/SMS delivery to your inbox, and warm customer confirmation message.</p>
            </div>
          </div>
        </div>

        <!-- Example 3: Mobile Layout -->
        <div class="ba-comparison-card reveal-up">
          <div class="ba-card-top">
            <div class="ba-side ba-side-before">
              <span class="ba-label red">BEFORE</span>
              <h4>Poor Mobile Layout</h4>
              <p>Horizontal scrolling, cut-off sentences, overlapping photos, and buttons too tiny for fingers to accurately tap.</p>
            </div>
            <div class="ba-arrow" aria-hidden="true"><i class="bi bi-arrow-right"></i></div>
            <div class="ba-side ba-side-after">
              <span class="ba-label green">AFTER FIX</span>
              <h4>Responsive Mobile Experience</h4>
              <p>Clean vertical flow, readable typography, thumb-accessible menus, and smooth layout on all iPhone &amp; Android devices.</p>
            </div>
          </div>
        </div>

        <!-- Example 4: Speed -->
        <div class="ba-comparison-card reveal-up">
          <div class="ba-card-top">
            <div class="ba-side ba-side-before">
              <span class="ba-label red">BEFORE</span>
              <h4>Slow 5-Second Load Time</h4>
              <p>Bloated uncompressed images and database delays causing impatient visitors to hit the back button before seeing your services.</p>
            </div>
            <div class="ba-arrow" aria-hidden="true"><i class="bi bi-arrow-right"></i></div>
            <div class="ba-side ba-side-after">
              <span class="ba-label green">AFTER FIX</span>
              <h4>Sub-Second Speed (0.5s)</h4>
              <p>Optimized image delivery, caching, and clean code execution. Pages appear instantly, boosting Google rankings and conversions.</p>
            </div>
          </div>
        </div>

        <!-- Example 5: CTA -->
        <div class="ba-comparison-card reveal-up">
          <div class="ba-card-top">
            <div class="ba-side ba-side-before">
              <span class="ba-label red">BEFORE</span>
              <h4>Confusing or Missing CTA</h4>
              <p>Visitors finished reading without knowing what to do next. Weak links like "Submit" or hidden inquiry links.</p>
            </div>
            <div class="ba-arrow" aria-hidden="true"><i class="bi bi-arrow-right"></i></div>
            <div class="ba-side ba-side-after">
              <span class="ba-label green">AFTER FIX</span>
              <h4>High-Intent Action Triggers</h4>
              <p>Clear, contrasting buttons: "Book Your Appointment", "Request Instant Quote", or "Check Schedule Today".</p>
            </div>
          </div>
        </div>

      </div><!-- /.ba-showcase-grid -->

      <div class="text-center mt-5 reveal-up">
        <a href="#contact" class="btn-primary-glow">
          <i class="bi bi-check-circle" aria-hidden="true"></i>
          Request a Review of Your Website
        </a>
      </div>
    </div>
  </section>

  <!-- ── 7. PORTFOLIO / CASE STUDIES ───────────────────────── -->
  <section id="work" class="section-block section-deep" aria-labelledby="work-heading">
    <div class="container">
      <div class="section-header text-center">
        <span class="eyebrow">Industry Portfolio</span>
        <h2 class="section-heading" id="work-heading">Websites &amp; Solutions by Industry</h2>
        <p class="section-sub">
          Explore production client projects and specialized website concepts built to solve real-world conversion and booking challenges.
        </p>
      </div>

      <!-- Industry Filter Bar -->
      <div class="portfolio-filter-wrap">
        <div class="portfolio-filter-bar" role="tablist" aria-label="Filter projects by industry">
          <?php foreach ($portfolioIndustries as $key => $ind): ?>
            <button class="portfolio-filter-btn <?= $key === 'all' ? 'active' : '' ?>" 
                    type="button" 
                    role="tab" 
                    aria-selected="<?= $key === 'all' ? 'true' : 'false' ?>" 
                    data-filter="<?= htmlspecialchars($key) ?>">
              <i class="bi <?= htmlspecialchars($ind['icon']) ?>" aria-hidden="true"></i>
              <span><?= htmlspecialchars($ind['label']) ?></span>
            </button>
          <?php endforeach; ?>
        </div>
      </div>

      <!-- Projects Grid -->
      <div class="projects-grid" id="portfolio-grid">
        <?php foreach ($portfolioProjects as $p): ?>
          <article class="project-card reveal-up" 
                   data-case-study="<?= htmlspecialchars($p['id']) ?>" 
                   data-industry="<?= htmlspecialchars($p['industry_key']) ?>" 
                   tabindex="0" 
                   role="button" 
                   aria-label="View <?= htmlspecialchars($p['title']) ?> details">
            
            <div class="project-img-wrap">
              <img src="<?= htmlspecialchars($p['image']) ?>" 
                   alt="<?= htmlspecialchars($p['alt']) ?>" 
                   width="600" 
                   height="340" 
                   loading="lazy" 
                   onerror="this.src='https://placehold.co/600x340/0d0d12/9ca3af?text=<?= urlencode($p['title']) ?>'" />
              
              <!-- Badges on image top -->
              <div class="project-badges-bar">
                <span class="badge-type <?= htmlspecialchars($p['project_type_class']) ?>">
                  <?php if ($p['project_type'] === 'Client Project'): ?>
                    <i class="bi bi-patch-check-fill" aria-hidden="true"></i>
                  <?php else: ?>
                    <i class="bi bi-lightbulb-fill" aria-hidden="true"></i>
                  <?php endif; ?>
                  <?= htmlspecialchars($p['project_type']) ?>
                </span>
                <span class="badge-industry-tag">
                  <?= htmlspecialchars($p['industry_label']) ?>
                </span>
              </div>

              <div class="project-img-overlay">
                <span class="project-read-btn">
                  View Project Details <i class="bi bi-arrow-right" aria-hidden="true"></i>
                </span>
              </div>
            </div>

            <div class="project-content">
              <div class="project-meta">
                <span class="project-category"><?= htmlspecialchars($p['industry_label']) ?></span>
                <?php if (!empty($p['result'])): ?>
                  <span class="project-outcome">
                    <i class="bi <?= htmlspecialchars($p['result_icon'] ?? 'bi-check-circle-fill') ?>" aria-hidden="true"></i>
                    <?= htmlspecialchars($p['result']) ?>
                  </span>
                <?php else: ?>
                  <span class="project-concept-indicator">
                    <i class="bi bi-stars" aria-hidden="true"></i> Concept Architecture
                  </span>
                <?php endif; ?>
              </div>

              <div class="project-header-row">
                <h3 class="project-title"><?= htmlspecialchars($p['title']) ?></h3>
                <?php if (!empty($p['url'])): ?>
                  <a href="<?= htmlspecialchars($p['url']) ?>" 
                     target="_blank" 
                     rel="noopener noreferrer" 
                     class="project-ext-link" 
                     title="Visit <?= htmlspecialchars($p['title']) ?> (opens in new tab)"
                     onclick="event.stopPropagation();"
                     aria-label="Visit <?= htmlspecialchars($p['title']) ?> live website">
                    <i class="bi bi-box-arrow-up-right" aria-hidden="true"></i>
                  </a>
                <?php endif; ?>
              </div>
              <p class="project-desc"><?= htmlspecialchars($p['description']) ?></p>

              <?php if (!empty($p['features'])): ?>
                <ul class="project-fix-highlights">
                  <?php foreach ($p['features'] as $f): ?>
                    <li><i class="bi bi-check2-circle" aria-hidden="true"></i> <?= htmlspecialchars($f) ?></li>
                  <?php endforeach; ?>
                </ul>
              <?php endif; ?>

              <div class="project-pills">
                <?php foreach ($p['pills'] as $pill): ?>
                  <span class="ppill"><?= htmlspecialchars($pill) ?></span>
                <?php endforeach; ?>
              </div>
            </div>
            <div class="project-hover-border" aria-hidden="true"></div>
          </article>
        <?php endforeach; ?>

        <!-- Card: Review CTA Card -->
        <article class="project-card project-cta-card reveal-up" data-industry="all">
          <div class="project-cta-inner">
            <div class="project-cta-icon"><i class="bi bi-search" aria-hidden="true"></i></div>
            <h3 class="project-cta-title">Want me to review your website?</h3>
            <p class="project-cta-desc">Send me your website URL. I'll inspect your mobile responsiveness, page speed, and booking flows, then send you actionable recommendations.</p>
            <a href="#contact" class="btn-primary-glow btn-sm-glow">Get a Free Website Review</a>
          </div>
        </article>

      </div><!-- /.projects-grid -->
    </div>
  </section>

  <!-- ── 8. APPROACHABLE PRICING ────────────────────────────── -->
  <section id="pricing" class="section-block section-alt" aria-labelledby="pricing-heading">
    <div class="container">
      <div class="section-header text-center reveal-up">
        <span class="eyebrow">Fair &amp; Transparent</span>
        <h2 class="section-heading" id="pricing-heading">Clear, Approachable Pricing</h2>
        <p class="section-sub">
          No mystery bills, no surprise hourly rates. All work is agreed on a 100% fixed price before we start.
        </p>
      </div>

      <div class="row g-4 justify-content-center">
        <!-- Tier 1: Quick Fixes -->
        <div class="col-12 col-md-6 col-lg-4">
          <div class="pricing-card reveal-up">
            <div class="pricing-badge">Quick Turnaround</div>
            <h3 class="pricing-title">Quick Website Fix</h3>
            <div class="pricing-price">
              <span class="price-from">Starting at</span>
              <span class="price-val">$99</span>
            </div>
            <p class="pricing-desc">
              For a single isolated issue: 1 broken form, button glitch, styling bug, or mobile menu layout repair.
            </p>
            <ul class="pricing-features">
              <li><i class="bi bi-check-circle-fill text-green"></i> 24–48 hour turnaround</li>
              <li><i class="bi bi-check-circle-fill text-green"></i> Single isolated bug or functional repair</li>
              <li><i class="bi bi-check-circle-fill text-green"></i> Tested on private staging server</li>
              <li><i class="bi bi-check-circle-fill text-green"></i> 100% Fixed-Price agreement</li>
              <li><i class="bi bi-check-circle-fill text-green"></i> 30-day fix warranty</li>
              <li><i class="bi bi-info-circle text-muted"></i> <em>Scope safeguard: Root cause assessed first; if tied to deeper issues, options are shared upfront.</em></li>
            </ul>
            <a href="#contact" class="btn-ghost-outline w-100 text-center justify-content-center">
              Request a Quick Fix
            </a>
          </div>
        </div>

        <!-- Tier 2: Website Improvements (Featured) -->
        <div class="col-12 col-md-6 col-lg-4">
          <div class="pricing-card pricing-featured reveal-up">
            <div class="pricing-badge badge-popular">Most Popular</div>
            <h3 class="pricing-title">Website Improvements</h3>
            <div class="pricing-price">
              <span class="price-from">Starting at</span>
              <span class="price-val">$299</span>
            </div>
            <p class="pricing-desc">
              For comprehensive speed overhauls + up to 3 prioritized fixes, UX enhancements, or booking/payment setup.
            </p>
            <ul class="pricing-features">
              <li><i class="bi bi-check-circle-fill text-green"></i> Full mobile &amp; Core Web Vitals audit</li>
              <li><i class="bi bi-check-circle-fill text-green"></i> Up to 3 prioritized improvements &amp; bug fixes</li>
              <li><i class="bi bi-check-circle-fill text-green"></i> Page speed &amp; asset optimization</li>
              <li><i class="bi bi-check-circle-fill text-green"></i> Booking calendar or checkout integration</li>
              <li><i class="bi bi-check-circle-fill text-green"></i> Staging-tested (no live downtime)</li>
              <li><i class="bi bi-check-circle-fill text-green"></i> 30-day comprehensive warranty</li>
            </ul>
            <a href="#contact" class="btn-primary-glow w-100 text-center justify-content-center">
              Request Improvements
            </a>
          </div>
        </div>

        <!-- Tier 3: Larger Projects -->
        <div class="col-12 col-md-6 col-lg-4">
          <div class="pricing-card reveal-up">
            <div class="pricing-badge">Full Scope</div>
            <h3 class="pricing-title">Larger Website Projects</h3>
            <div class="pricing-price">
              <span class="price-from">Starting at</span>
              <span class="price-val">$1,200+</span>
            </div>
            <p class="pricing-desc">
              For complete website redesigns, custom client portals, complex web applications, or high-volume booking engines.
            </p>
            <ul class="pricing-features">
              <li><i class="bi bi-check-circle-fill text-green"></i> Detailed technical architecture &amp; scoping</li>
              <li><i class="bi bi-check-circle-fill text-green"></i> Complete website redesign or rebuild</li>
              <li><i class="bi bi-check-circle-fill text-green"></i> Custom client portals &amp; role logins</li>
              <li><i class="bi bi-check-circle-fill text-green"></i> Database tuning, caching &amp; API hooks</li>
              <li><i class="bi bi-check-circle-fill text-green"></i> Milestone-based delivery schedule</li>
              <li><i class="bi bi-check-circle-fill text-green"></i> 30-day post-launch warranty included</li>
            </ul>
            <a href="#contact" class="btn-ghost-outline w-100 text-center justify-content-center">
              Discuss Your Project
            </a>
          </div>
        </div>
      </div>

      <!-- Monthly Care Retainer Banner -->
      <div class="pricing-care-banner mt-4 p-4 rounded-3 text-center border reveal-up" style="background: var(--bg-surface); border-color: var(--border-medium) !important;">
        <div class="d-flex flex-column flex-md-row align-items-center justify-content-between gap-3 text-start">
          <div>
            <span class="badge mb-2" style="background: rgba(99,102,241,0.18); color: var(--indigo-light); font-size: 0.75rem; padding: 4px 10px; border-radius: 20px;">Monthly Care &amp; Maintenance</span>
            <h4 class="mb-1" style="font-size: 1.1rem; color: #fff;">Need Ongoing Website Peace of Mind?</h4>
            <p class="text-secondary mb-0" style="font-size: 0.88rem;">From <strong>$149/month</strong>: Includes 24/7 uptime monitoring, scheduled offsite backups, security &amp; plugin patching, plus 2 hours of reserved monthly tweak time.</p>
          </div>
          <a href="#contact" class="btn-ghost-outline text-nowrap" style="padding: 9px 20px; font-size: 0.88rem;">Inquire About Care Plans →</a>
        </div>
      </div>

      <div class="pricing-note text-center mt-4">
        <p class="text-secondary mb-0">
          <i class="bi bi-shield-check text-green me-1"></i>
          Not sure which option fits your website? Send me your site link for a free, zero-obligation review.
        </p>
      </div>
    </div>
  </section>

  <!-- ── 9. EXPERIENCE & CREDIBILITY (Repositioned Proof) ───── -->
  <section id="about" class="section-block section-deep" aria-labelledby="about-heading">
    <div class="container">
      <div class="about-grid">

        <!-- Photo column -->
        <div class="about-photo-col reveal-up">
          <div class="photo-frame">
            <div class="photo-glow" aria-hidden="true"></div>
            <img
              src="assets/images/about2.jpg"
              alt="Vamsi Krishna Dasari — Web Developer &amp; Optimization Specialist"
              class="about-photo"
              width="360"
              height="450"
              loading="lazy"
              onerror="this.src='https://placehold.co/360x440/0d0d12/f9fafb?text=Vamsi+Krishna'"
            />
            <div class="photo-tag">
              <i class="bi bi-person-check-fill" aria-hidden="true"></i>
              Vamsi Krishna Dasari
            </div>
          </div>

          <!-- Credential cards -->
          <div class="cred-cards">
            <div class="cred-card">
              <i class="bi bi-shield-check text-green fs-4" aria-hidden="true"></i>
              <div>
                <strong>100% Fixed-Price Guarantee</strong>
                <span>Zero hourly surprises or scope creep</span>
              </div>
            </div>
            <div class="cred-card">
              <i class="bi bi-person-heart text-indigo fs-4" aria-hidden="true"></i>
              <div>
                <strong>Direct 1-on-1 Access</strong>
                <span>Work directly with me, never a middleman</span>
              </div>
            </div>
          </div>
        </div>

        <!-- Copy column -->
        <div class="about-copy-col reveal-up">
          <span class="eyebrow" id="about-heading">Experience &amp; Trust</span>
          <h2 class="section-heading">15+ Years of Building for the Web</h2>

          <p class="about-lead text-indigo-light">
            You may have found me because you need a small website fix. My background means I can handle much more when you need it.
          </p>

          <p class="about-body">
            For over 15 years, I've worked as a full-stack web developer and technical specialist. I've engineered systems handling over 500,000 active users, tuned high-traffic databases, and integrated complex payment APIs.
          </p>

          <p class="about-body">
            I bring that exact same high-level technical rigor to everyday business websites. When you work with me, you get direct communication, transparent fixed pricing, and clean solutions that won't break when you update your site.
          </p>

          <p class="about-body">
            No account managers. No junior developers learning on your project. Just senior-level problem solving delivered quickly and reliably.
          </p>

          <!-- Experience pills -->
          <div class="exp-pills">
            <div class="exp-pill">
              <span class="exp-num">15+</span>
              <span class="exp-lbl">Years Experience</span>
            </div>
            <div class="exp-pill">
              <span class="exp-num">100%</span>
              <span class="exp-lbl">Fixed-Price Work</span>
            </div>
            <div class="exp-pill">
              <span class="exp-num">0</span>
              <span class="exp-lbl">Downtime Deployments</span>
            </div>
          </div>

          <a href="#contact" class="btn-primary-glow">
            <i class="bi bi-search" aria-hidden="true"></i>
            Get a Free Website Review
          </a>
        </div>

      </div>
    </div>
  </section>

  <!-- ── 10. NEED MORE THAN A WEBSITE FIX? ─────────────────── -->
  <section id="custom-software" class="section-block section-alt" aria-labelledby="enterprise-heading">
    <div class="container">
      <div class="section-header text-center reveal-up">
        <span class="eyebrow">Advanced Engineering</span>
        <h2 class="section-heading" id="enterprise-heading">Need More Than a Website Fix?</h2>
        <p class="section-sub">
          If your website needs to evolve into something bigger, I also build custom web applications, portals, automation systems and business software.
        </p>
      </div>

      <div class="row g-4">
        <div class="col-12 col-md-4">
          <div class="capability-card reveal-up">
            <div class="cap-icon"><i class="bi bi-person-badge-fill" aria-hidden="true"></i></div>
            <h3 class="cap-title">Custom Client Portals</h3>
            <p class="cap-desc">
              Secure customer logins, document management, order tracking, and private account dashboards tailored to your workflow.
            </p>
            <span class="cap-tag">Customer Portals</span>
          </div>
        </div>

        <div class="col-12 col-md-4">
          <div class="capability-card reveal-up">
            <div class="cap-icon"><i class="bi bi-cpu-fill" aria-hidden="true"></i></div>
            <h3 class="cap-title">Business Automations</h3>
            <p class="cap-desc">
              Connect your website directly to Stripe, QuickBooks, CRM systems, Google Calendars, and automated SMS/email alerts.
            </p>
            <span class="cap-tag">API &amp; Stripe Integrations</span>
          </div>
        </div>

        <div class="col-12 col-md-4">
          <div class="capability-card reveal-up">
            <div class="cap-icon"><i class="bi bi-database-fill-check" aria-hidden="true"></i></div>
            <h3 class="cap-title">Custom Web Applications</h3>
            <p class="cap-desc">
              Bespoke Laravel, PHP, and high-performance database architectures built to scale gracefully without recurring software bloat.
            </p>
            <span class="cap-tag">Laravel &amp; Custom PHP</span>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- ── 11. TESTIMONIALS ──────────────────────────────────── -->
  <section id="testimonials" class="section-block section-deep" aria-labelledby="testi-heading">
    <div class="container">
      <div class="section-header text-center reveal-up">
        <span class="eyebrow">Verified Feedback</span>
        <h2 class="section-heading" id="testi-heading">What Clients Say</h2>
        <p class="section-sub">Direct feedback from business owners and managers on project delivery and communication.</p>
      </div>

      <div class="testi-grid">

        <figure class="testi-card reveal-up">
          <div class="testi-scope-pill mb-2"><i class="bi bi-patch-check-fill text-indigo me-1"></i><strong>Scope:</strong> Checkout Flow &amp; Mobile Optimization</div>
          <div class="testi-stars" aria-label="5 star review">
            <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
          </div>
          <blockquote class="testi-quote">
            "Vamsi is a highly professional partner who consistently delivers exceptional work. He doesn't just write code; he understands our business goals."
          </blockquote>
          <figcaption class="testi-client">
            <div class="testi-avatar" aria-hidden="true">OA</div>
            <div>
              <strong class="testi-name">Omar Al-Hosni</strong>
              <span class="testi-role">Technical Director · KynoBaby</span>
            </div>
          </figcaption>
          <div class="testi-quote-mark" aria-hidden="true">"</div>
        </figure>

        <figure class="testi-card reveal-up">
          <div class="testi-scope-pill mb-2"><i class="bi bi-patch-check-fill text-purple me-1"></i><strong>Scope:</strong> Speed Overhaul &amp; Multi-Site Maintenance</div>
          <div class="testi-stars" aria-label="5 star review">
            <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
          </div>
          <blockquote class="testi-quote">
            "Working with Vamsi was an excellent experience. He is a results-driven professional who transformed our digital infrastructure."
          </blockquote>
          <figcaption class="testi-client">
            <div class="testi-avatar testi-avatar-purple" aria-hidden="true">TM</div>
            <div>
              <strong class="testi-name">Thomas van der Meer</strong>
              <span class="testi-role">Product Owner · Myisho Websites</span>
            </div>
          </figcaption>
          <div class="testi-quote-mark" aria-hidden="true">"</div>
        </figure>

        <figure class="testi-card reveal-up">
          <div class="testi-scope-pill mb-2"><i class="bi bi-patch-check-fill text-cyan me-1"></i><strong>Scope:</strong> Fleet Dispatch &amp; Double-Booking Elimination</div>
          <div class="testi-stars" aria-label="5 star review">
            <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
          </div>
          <blockquote class="testi-quote">
            "Vamsi was fantastic to work with. He is exceptionally knowledgeable in mapping out business logic. Communication was responsive, clear, and direct."
          </blockquote>
          <figcaption class="testi-client">
            <div class="testi-avatar testi-avatar-cyan" aria-hidden="true">GL</div>
            <div>
              <strong class="testi-name">Gary Leranian</strong>
              <span class="testi-role">Operations Director · Limoride</span>
            </div>
          </figcaption>
          <div class="testi-quote-mark" aria-hidden="true">"</div>
        </figure>

      </div>
    </div>
  </section>

  <!-- ── 12. FAQ ───────────────────────────────────────────── -->
  <section id="faq" class="section-block section-alt" aria-labelledby="faq-heading">
    <div class="container">
      <div class="section-header text-center reveal-up">
        <span class="eyebrow">Direct Answers</span>
        <h2 class="section-heading" id="faq-heading">Frequently Asked Questions</h2>
        <p class="section-sub">Clear, honest answers about credentials, turnaround times, security, and guarantees.</p>
      </div>

      <div class="faq-list" id="faq-accordion">

        <div class="faq-item reveal-up">
          <button class="faq-question" aria-expanded="false" aria-controls="faq-a1" id="faq-q1">
            What kinds of websites do you fix and work on?
            <span class="faq-icon" aria-hidden="true"><i class="bi bi-plus-lg"></i></span>
          </button>
          <div class="faq-answer" id="faq-a1" role="region" aria-labelledby="faq-q1">
            <p>I work on virtually all business websites, including <strong>WordPress, WooCommerce, PHP, Laravel, custom HTML/CSS/JavaScript, Shopify, Webflow</strong>, and custom CMS platforms. Whether you need a plugin conflict resolved, a database tuned, or a custom feature coded, I can handle it.</p>
          </div>
        </div>

        <div class="faq-item reveal-up">
          <button class="faq-question" aria-expanded="false" aria-controls="faq-a2" id="faq-q2">
            How quickly can you fix my website?
            <span class="faq-icon" aria-hidden="true"><i class="bi bi-plus-lg"></i></span>
          </button>
          <div class="faq-answer" id="faq-a2" role="region" aria-labelledby="faq-q2">
            <p>Most small fixes and bug repairs are completed within <strong>24 to 48 hours</strong>. If your website is experiencing an urgent emergency (such as broken customer checkouts, downtime, or failed contact forms), priority expedited turnaround is available.</p>
          </div>
        </div>

        <div class="faq-item reveal-up">
          <button class="faq-question" aria-expanded="false" aria-controls="faq-a3" id="faq-q3">
            Will my website go down while you work on it?
            <span class="faq-icon" aria-hidden="true"><i class="bi bi-plus-lg"></i></span>
          </button>
          <div class="faq-answer" id="faq-a3" role="region" aria-labelledby="faq-q3">
            <p><strong>No.</strong> Work is performed and tested on a private staging copy or isolated sandbox first. Your live website remains fully online and accepting customers throughout. Once you verify and approve the changes, they are deployed smoothly with zero planned interruption.</p>
          </div>
        </div>

        <div class="faq-item reveal-up">
          <button class="faq-question" aria-expanded="false" aria-controls="faq-a4" id="faq-q4">
            How does your fixed-price guarantee work?
            <span class="faq-icon" aria-hidden="true"><i class="bi bi-plus-lg"></i></span>
          </button>
          <div class="faq-answer" id="faq-a4" role="region" aria-labelledby="faq-q4">
            <p>Before any work starts, we agree on an exact, fixed price. You will never receive a surprise invoice or be billed for unexpected hours. If diagnosis reveals that a glitch is rooted in a deeper architectural problem, I explain the situation and give you transparent options before any billable work proceeds.</p>
          </div>
        </div>

        <div class="faq-item reveal-up">
          <button class="faq-question" aria-expanded="false" aria-controls="faq-a5" id="faq-q5">
            How do I safely share access to my website or hosting?
            <span class="faq-icon" aria-hidden="true"><i class="bi bi-plus-lg"></i></span>
          </button>
          <div class="faq-answer" id="faq-a5" role="region" aria-labelledby="faq-q5">
            <p>You never need to email raw master passwords. I recommend creating a temporary administrator user with a temporary password that you can deactivate once the work is complete, or sharing credentials securely via an encrypted password manager link (e.g., 1Password, Bitwarden, or Dashlane).</p>
          </div>
        </div>

        <div class="faq-item reveal-up">
          <button class="faq-question" aria-expanded="false" aria-controls="faq-a6" id="faq-q6">
            Do you sign Non-Disclosure Agreements (NDAs)?
            <span class="faq-icon" aria-hidden="true"><i class="bi bi-plus-lg"></i></span>
          </button>
          <div class="faq-answer" id="faq-a6" role="region" aria-labelledby="faq-q6">
            <p><strong>Yes, absolutely.</strong> I routinely work with proprietary databases, customer records, and sensitive business applications. I am happy to review and execute your company's standard mutual NDA, or provide my own standard confidentiality agreement.</p>
          </div>
        </div>

        <div class="faq-item reveal-up">
          <button class="faq-question" aria-expanded="false" aria-controls="faq-a7" id="faq-q7">
            Where are you based and what are your working hours?
            <span class="faq-icon" aria-hidden="true"><i class="bi bi-plus-lg"></i></span>
          </button>
          <div class="faq-answer" id="faq-a7" role="region" aria-labelledby="faq-q7">
            <p>I am an independent senior engineer based in India with scheduled, daily real-time collaboration hours for <strong>US Eastern (EST), Central (CST), and European time zones</strong>. You will always communicate directly with me—never an account manager or junior intermediary.</p>
          </div>
        </div>

        <div class="faq-item reveal-up">
          <button class="faq-question" aria-expanded="false" aria-controls="faq-a8" id="faq-q8">
            What if a fix breaks later or I need further adjustments?
            <span class="faq-icon" aria-hidden="true"><i class="bi bi-plus-lg"></i></span>
          </button>
          <div class="faq-answer" id="faq-a8" role="region" aria-labelledby="faq-q8">
            <p>All work is backed by a <strong>30-day warranty</strong>. If the resolved issue reoccurs or an unexpected conflict emerges within 30 days of deployment, I will inspect and resolve it promptly at no extra charge.</p>
          </div>
        </div>

        <div class="faq-item reveal-up">
          <button class="faq-question" aria-expanded="false" aria-controls="faq-a9" id="faq-q9">
            Do you offer ongoing monthly maintenance?
            <span class="faq-icon" aria-hidden="true"><i class="bi bi-plus-lg"></i></span>
          </button>
          <div class="faq-answer" id="faq-a9" role="region" aria-labelledby="faq-q9">
            <p>Yes. Ongoing Care Plans start at $149/month and cover automated offsite backups, Core Web Vitals performance checks, security patching, uptime monitoring, and reserved monthly tweak hours.</p>
          </div>
        </div>

      </div>
    </div>
  </section>

  <!-- ── 13. CONTACT SECTION ────────────────────────────────── -->
  <section id="contact" class="section-block section-deep" aria-labelledby="contact-heading">
    <div class="container">
      <div class="contact-grid">

        <!-- Form Wrap -->
        <div class="contact-form-wrap reveal-up">
          <span class="eyebrow">Quick &amp; Direct</span>
          <h2 class="section-heading" id="contact-heading">Tell Me What's Wrong With Your Website</h2>
          <p class="contact-sub">
            Send me your website and briefly tell me what you'd like fixed or improved. I'll take a look and get back to you with honest recommendations.
          </p>

          <form id="contact-form" action="send-mail.php" method="POST" novalidate class="contact-form">
            
            <!-- Anti-spam Honeypot (hidden from human visitors) -->
            <input type="text" name="b_contact_hp" style="position:absolute;left:-9999px;width:1px;height:1px;opacity:0;pointer-events:none;" tabindex="-1" autocomplete="off" aria-hidden="true" />

            <div class="form-row">
              <div class="form-field">
                <label for="name">Your Name *</label>
                <input type="text" id="name" name="name" placeholder="Jane Smith" required autocomplete="name" />
              </div>
              <div class="form-field">
                <label for="email">Your Email *</label>
                <input type="email" id="email" name="email" placeholder="jane@business.com" required autocomplete="email" inputmode="email" />
              </div>
            </div>

            <div class="form-field form-field-full">
              <label for="website_url">Website URL *</label>
              <input type="url" id="website_url" name="website_url" placeholder="https://yourbusiness.com" required autocomplete="url" inputmode="url" />
            </div>

            <div class="form-field form-field-full">
              <label for="message">What would you like help with? <span class="text-muted fw-normal">(Optional)</span></label>
              <textarea id="message" name="message" rows="3" placeholder="E.g. My mobile booking form isn't working, page is loading too slowly, need click-to-call added..."></textarea>
            </div>

            <button type="submit" class="form-submit" id="form-submit">
              <span id="btn-text"><i class="bi bi-search" aria-hidden="true"></i> Get a Free Website Review</span>
            </button>
          </form>

          <div class="form-trust-row">
            <span><i class="bi bi-shield-lock-fill text-green" aria-hidden="true"></i> 100% Confidential</span>
            <span><i class="bi bi-lightning-charge-fill text-amber" aria-hidden="true"></i> Fast 24-Hour Review</span>
            <span><i class="bi bi-person-check-fill text-indigo" aria-hidden="true"></i> Direct 1-on-1 Communication</span>
          </div>
        </div>

        <!-- Direct Booking Card -->
        <div class="calendly-wrap reveal-up">
          <div class="calendly-header">
            <i class="bi bi-calendar-check-fill text-indigo" aria-hidden="true"></i>
            <h2 class="cal-title">Schedule a Quick 15–30 Min Call</h2>
            <p class="cal-sub">Prefer a direct conversation? Pick a time on my calendar to discuss your website—zero sales pressure, practical advice, and 100% confidential.</p>
          </div>
          <div class="cal-card-body">
            <div class="cal-benefit-list">
              <div class="cal-benefit-item">
                <i class="bi bi-check-circle-fill text-green" aria-hidden="true"></i>
                <span>Direct discussion with senior developer Vamsi Krishna</span>
              </div>
              <div class="cal-benefit-item">
                <i class="bi bi-check-circle-fill text-green" aria-hidden="true"></i>
                <span>Instant calendar booking across US &amp; Global timezones</span>
              </div>
              <div class="cal-benefit-item">
                <i class="bi bi-check-circle-fill text-green" aria-hidden="true"></i>
                <span>Zero sales pressure or obligation</span>
              </div>
            </div>

            <a href="https://calendly.com/developer-vkrishna/30min" target="_blank" rel="noopener noreferrer" class="btn-primary-glow btn-cal-action">
              <i class="bi bi-calendar3" aria-hidden="true"></i>
              Book a 30-Min Discovery Call
              <i class="bi bi-box-arrow-up-right" aria-hidden="true"></i>
            </a>

            <div class="cal-direct-email">
              <span>Or email me directly:</span>
              <a href="mailto:vamsi@vamsidev.com" class="email-link">vamsi@vamsidev.com</a>
            </div>
          </div>
        </div>

      </div>
    </div>
  </section>

  <!-- ── 14. FOOTER ────────────────────────────────────────── -->
  <footer class="site-footer" role="contentinfo">
    <div class="container">
      <div class="footer-inner">
        <div class="footer-brand">
          <span class="logo-mark">VK</span>
          <p class="footer-copy">© 2026 Vamsi Krishna Dasari · Helping businesses fix, improve and maintain their websites.</p>
        </div>
        <nav class="footer-nav" aria-label="Footer navigation">
          <a href="#services">Services</a>
          <a href="#how-it-works">Process</a>
          <a href="#industries">Industries</a>
          <a href="#work">Work</a>
          <a href="#pricing">Pricing</a>
          <a href="#about">About</a>
          <a href="#faq">FAQ</a>
          <a href="#contact">Contact</a>
          <a href="#" data-bs-toggle="modal" data-bs-target="#privacyModal" class="footer-legal-link">Privacy Policy</a>
          <a href="#" data-bs-toggle="modal" data-bs-target="#termsModal" class="footer-legal-link">Terms</a>
        </nav>
        <div class="footer-social">
          <a href="https://www.linkedin.com/in/krishnavamsid/" target="_blank" rel="noopener noreferrer" aria-label="LinkedIn"><i class="fa-brands fa-linkedin" aria-hidden="true"></i></a>
          <a href="https://upwork.com/freelancers/dasarikrishnak" target="_blank" rel="noopener noreferrer" aria-label="Upwork"><i class="fa-brands fa-upwork" aria-hidden="true"></i></a>
          <a href="mailto:vamsi@vamsidev.com" aria-label="Email"><i class="bi bi-envelope-fill" aria-hidden="true"></i></a>
        </div>
      </div>
    </div>
  </footer>

  <!-- ── STICKY MOBILE QUICK ACTION BAR ────────────────────── -->
  <aside class="mobile-quick-bar" aria-label="Quick mobile actions">
    <a href="#contact" class="mqb-btn mqb-primary">
      <i class="bi bi-search"></i>
      <span>Free Website Review</span>
    </a>
    <a href="https://calendly.com/developer-vkrishna/30min" target="_blank" rel="noopener noreferrer" class="mqb-btn mqb-secondary">
      <i class="bi bi-calendar3"></i>
      <span>Book Call</span>
    </a>
  </aside>

  <!-- ── 15. CASE STUDY DRAWER ──────────────────────────────── -->
  <div class="drawer-backdrop" id="drawer-backdrop" aria-hidden="true"></div>

  <aside class="cs-drawer" id="cs-drawer" role="dialog" aria-modal="true" aria-labelledby="dr-title" aria-hidden="true">
    <div class="cs-drawer-header">
      <div>
        <span class="drawer-tag" id="dr-tag"></span>
        <h3 class="drawer-title" id="dr-title">Case Study Details</h3>
      </div>
      <button class="drawer-close-btn" id="drawer-close-btn" aria-label="Close case study panel">
        <i class="bi bi-x" aria-hidden="true"></i>
      </button>
    </div>

    <div class="cs-drawer-body">
      <div class="drawer-meta">
        <div class="dm-item"><span class="dm-key">Client</span><span class="dm-val" id="dr-client"></span></div>
        <div class="dm-item"><span class="dm-key">Role</span><span class="dm-val" id="dr-role"></span></div>
        <div class="dm-item"><span class="dm-key">Timeline</span><span class="dm-val" id="dr-duration"></span></div>
        <div class="dm-item"><span class="dm-key">Outcome</span><span class="dm-val dm-outcome" id="dr-outcomes"></span></div>
      </div>

      <div class="drawer-section">
        <h4 class="drawer-section-title"><i class="bi bi-exclamation-triangle-fill" aria-hidden="true"></i> The Challenge</h4>
        <p id="dr-challenge"></p>
      </div>
      <div class="drawer-section">
        <h4 class="drawer-section-title"><i class="bi bi-check-circle-fill" aria-hidden="true"></i> The Solution &amp; Fixes</h4>
        <p id="dr-solution"></p>
      </div>
      <div class="drawer-section">
        <h4 class="drawer-section-title"><i class="bi bi-gear-fill" aria-hidden="true"></i> Key Improvements Delivered</h4>
        <ul id="dr-architecture" class="drawer-list"></ul>
      </div>
      <div class="drawer-section">
        <h4 class="drawer-section-title"><i class="bi bi-info-circle-fill" aria-hidden="true"></i> Business Outcome</h4>
        <p id="dr-lessons"></p>
      </div>

      <div id="dr-live-link-wrap" style="display:none; margin-top: 24px;">
        <a id="dr-live-link" href="#" target="_blank" rel="noopener noreferrer" class="drawer-live-btn">
          <i class="bi bi-box-arrow-up-right" aria-hidden="true"></i>
          <span>Visit Live Website</span>
        </a>
      </div>

      <a href="#contact" class="drawer-cta-btn" onclick="document.getElementById('drawer-close-btn').click()">
        <i class="bi bi-chat-text-fill" aria-hidden="true"></i>
        Inquire About Fixing Your Website
      </a>
    </div>
  </aside>

  <!-- ── 16. PRIVACY POLICY MODAL ───────────────────────────── -->
  <div class="modal fade" id="privacyModal" tabindex="-1" aria-labelledby="privacyModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
      <div class="modal-content text-start" style="background: var(--bg-surface); border: 1px solid var(--border-medium); color: var(--text-primary); border-radius: var(--r-lg);">
        <div class="modal-header" style="border-bottom: 1px solid var(--border-subtle);">
          <h3 class="modal-title h5 mb-0" id="privacyModalLabel">Privacy Policy</h3>
          <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body" style="font-size: 0.92rem; line-height: 1.6; color: var(--text-secondary);">
          <p><strong class="text-white">Last updated:</strong> January 2026</p>
          <h4 class="h6 text-white mt-3">1. Information Collected</h4>
          <p>When you use the contact form on vamsidev.com, I collect only the information you explicitly provide: your name, email address, website URL, and your description of website needs or bugs.</p>
          <h4 class="h6 text-white mt-3">2. How Information is Used</h4>
          <p>Your details are used strictly to inspect your website, diagnose reported issues, formulate technical recommendations, and communicate directly with you regarding your inquiry. Your information is never sold, rented, or shared with third-party marketing companies.</p>
          <h4 class="h6 text-white mt-3">3. Analytics &amp; Cookies</h4>
          <p>This site uses standard Google Analytics with IP anonymization to track high-level traffic trends (e.g. pages visited, browser types) to improve website usability. No invasive cross-site tracking or advertising pixels are deployed.</p>
          <h4 class="h6 text-white mt-3">4. Credential Security</h4>
          <p>If you choose to hire my services, any hosting or CMS credentials you share are stored in an encrypted password manager and deleted or revoked immediately upon completion of the project.</p>
        </div>
        <div class="modal-footer" style="border-top: 1px solid var(--border-subtle);">
          <button type="button" class="btn-ghost-outline btn-sm" data-bs-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>

  <!-- ── 17. TERMS OF SERVICE MODAL ─────────────────────────── -->
  <div class="modal fade" id="termsModal" tabindex="-1" aria-labelledby="termsModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
      <div class="modal-content text-start" style="background: var(--bg-surface); border: 1px solid var(--border-medium); color: var(--text-primary); border-radius: var(--r-lg);">
        <div class="modal-header" style="border-bottom: 1px solid var(--border-subtle);">
          <h3 class="modal-title h5 mb-0" id="termsModalLabel">Terms of Service</h3>
          <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body" style="font-size: 0.92rem; line-height: 1.6; color: var(--text-secondary);">
          <p><strong class="text-white">Last updated:</strong> January 2026</p>
          <h4 class="h6 text-white mt-3">1. Scope of Engagement</h4>
          <p>All client work is conducted on a mutually agreed, 100% fixed-price basis or explicit milestone contract before any development begins. The scope of each task is documented in writing to avoid ambiguity.</p>
          <h4 class="h6 text-white mt-3">2. Staging &amp; Deployment Safety</h4>
          <p>All modifications, repairs, and code changes are tested on a private staging duplicate or isolated local sandbox whenever possible. Production deployment occurs only after client verification and sign-off.</p>
          <h4 class="h6 text-white mt-3">3. 30-Day Fix Warranty</h4>
          <p>Every completed fix includes a 30-day warranty covering the specific repair performed. If the reported issue recurs or an unanticipated conflict arises from the deployed fix within 30 days, it is resolved at zero additional charge.</p>
          <h4 class="h6 text-white mt-3">4. Confidentiality &amp; NDAs</h4>
          <p>I treat all client codebases, server data, and business strategies as strictly confidential. Mutual Non-Disclosure Agreements (NDAs) are gladly executed upon request prior to accessing proprietary infrastructure.</p>
        </div>
        <div class="modal-footer" style="border-top: 1px solid var(--border-subtle);">
          <button type="button" class="btn-ghost-outline btn-sm" data-bs-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap 5 JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6Rz8ynS7ogEvDej/m4gGSg5meb7aQ2lmh05128c5t991X65Ih9O89UrZ5t+87bh9" crossorigin="anonymous"></script>
  <!-- Custom Script -->
  <script src="script.js"></script>
</body>
</html>
