<!-- index.php -->
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>CRM Home</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <link rel="stylesheet" href="assets/css/styles.css">
  <!-- Add GSAP and ScrollTrigger -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/ScrollTrigger.min.js"></script>
  <style>
    body {
      overflow-x: hidden;
      background-color: #f8f9fa;
    }

    .hero-section {
      min-height: 100vh;
      display: flex;
      align-items: center;
      position: relative;
      overflow: hidden;
    }

    .hero-bg {
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background: linear-gradient(45deg, #0062ff, #00c6ff);
      clip-path: polygon(0 0, 100% 0, 100% 85%, 0 100%);
      z-index: -1;
    }

    .features-container {
      width: 600%;
      height: 100vh;
      display: flex;
      flex-wrap: nowrap;
    }

    .feature-section {
      width: 100vw;
      height: 100vh;
      padding: 4rem;
      display: flex;
      align-items: center;
      justify-content: center;
    }

    .feature-card {
      width: 50vw;
      height: 450px;
      perspective: 1000px;
      cursor: pointer;
    }

    .feature-card-inner {
      position: relative;
      width: 100%;
      height: 100%;
      text-align: center;
      transition: transform 0.8s;
      transform-style: preserve-3d;
    }

    .feature-card:hover .feature-card-inner {
      transform: rotateY(180deg);
    }

    .feature-card-front, .feature-card-back {
      position: absolute;
      width: 100%;
      height: 100%;
      backface-visibility: hidden;
      border-radius: 20px;
      padding: 2.5rem;
      background: white;
      box-shadow: 0 15px 35px rgba(0,0,0,0.1);
    }

    .feature-card-front {
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      padding: 3rem 2rem;
    }

    .feature-card-back {
      transform: rotateY(180deg);
      display: flex;
      flex-direction: column;
      justify-content: center;
      background: linear-gradient(135deg, #0062ff, #00c6ff);
      color: white;
    }

    .feature-icon {
      font-size: 4rem;
      color: #0062ff;
      margin-bottom: 1.5rem;
      transition: all 0.3s ease;
    }

    .feature-title {
      font-size: 1.8rem;
      font-weight: 600;
      margin-bottom: 1rem;
      color: #333;
    }

    .feature-description {
      font-size: 1.1rem;
      color: #666;
      line-height: 1.8;
      margin: 0 1.5rem;
      max-width: 90%;
    }

    .feature-list {
      list-style: none;
      padding: 0;
      margin: 1.5rem 0;
      text-align: left;
    }

    .feature-list li {
      margin-bottom: 1rem;
      padding-left: 1.5rem;
      position: relative;
    }

    .feature-list li:before {
      content: "→";
      position: absolute;
      left: 0;
      color: white;
    }

    .feature-cta {
      background: white;
      color: #0062ff;
      padding: 0.8rem 1.5rem;
      border-radius: 25px;
      text-decoration: none;
      font-weight: 600;
      margin-top: 1rem;
      transition: all 0.3s ease;
    }

    .feature-cta:hover {
      background: rgba(255,255,255,0.9);
      transform: translateY(-3px);
      text-decoration: none;
      color: #0062ff;
    }

    .stats-section {
      background: linear-gradient(135deg, #f8f9fa 0%, #ffffff 100%);
      padding: 7rem 0;
    }

    .stat-card {
      
      text-align: center;
      padding: 3rem 2rem;
      background: white;
      border-radius: 20px;
      box-shadow: 0 10px 30px rgba(0,0,0,0.08);
      margin: 1rem;
      transition: transform 0.3s ease;
    }

    .stat-card:hover {
      transform: translateY(-10px);
    }

    .stat-number {
      font-size: 4rem;
      font-weight: bold;
      background: linear-gradient(45deg, #0062ff, #00c6ff);
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
      margin-bottom: 1rem;
      font-family: 'Arial', sans-serif;
    }

    .stat-title {
      color: #333;
      font-size: 1.5rem;
      margin-bottom: 1rem;
      font-weight: 600;
    }

    .stat-description {
      color: #666;
      font-size: 1rem;
      line-height: 1.6;
    }

    .stat-icon {
      font-size: 2.5rem;
      color: #0062ff;
      margin-bottom: 1.5rem;
    }
    .img-fluid{
      height: 20rem !important;
      width: 40rem !important;
    }
  </style>
</head>
<body>
  
  <?php include '_Nav.php'; ?>

  <!-- Hero Section -->
  <section class="hero-section">
    <div class="hero-bg"></div>
    <div class="container">
      <div class="row align-items-center">
        <div class="col-lg-6">
          <h1 class="display-4 text-white font-weight-bold">Transform Your Business with Our CRM</h1>
          <p class="lead text-white-50">Streamline your customer relationships and boost productivity with our powerful CRM solution.</p>
          <a href="#features" class="btn btn-light btn-lg mt-3">Explore Features</a>
        </div>
        <div class="col-lg-6">
          <img src="./img/dashboard.png" alt="CRM Dashboard" class="img-fluid">
        </div>
      </div>
    </div>
  </section>

  <!-- Horizontal Scrolling Features -->
  <section class="features-wrapper" id="features">
    <div class="features-container">
      <div class="feature-section">
        <div class="feature-card">
          <div class="feature-card-inner">
            <div class="feature-card-front">
              <i class="fas fa-users feature-icon"></i>
              <h3 class="feature-title">Customer Management</h3>
              <p class="feature-description">Transform your customer relationships with our intelligent CRM tools. Build deeper connections, understand customer needs, and deliver personalized experiences at scale. Perfect for growing businesses.</p>
            </div>
            <div class="feature-card-back">
              <h3 class="mb-4">Customer Management Features</h3>
              <ul class="feature-list">
                <li>360° Customer Profiles</li>
                <li>Contact History & Interaction Tracking</li>
                <li>Customer Segmentation</li>
                <li>Automated Customer Journey Mapping</li>
                <li>Real-time Communication Tools</li>
              </ul>
              <a href="#" class="feature-cta">Learn More</a>
            </div>
          </div>
        </div>
      </div>
      <div class="feature-section">
        <div class="feature-card">
          <div class="feature-card-inner">
            <div class="feature-card-front">
              <i class="fas fa-chart-line feature-icon"></i>
              <h3 class="feature-title">Analytics Dashboard</h3>
              <p class="feature-description">Turn data into actionable insights with our powerful analytics suite. Monitor KPIs, track performance metrics, and identify growth opportunities in real-time. Make informed decisions backed by data.</p>
            </div>
            <div class="feature-card-back">
              <h3 class="mb-4">Analytics Capabilities</h3>
              <ul class="feature-list">
                <li>Real-time Performance Metrics</li>
                <li>Custom Report Generation</li>
                <li>Predictive Analytics</li>
                <li>Sales Forecasting</li>
                <li>ROI Tracking & Analysis</li>
              </ul>
              <a href="#" class="feature-cta">Explore Analytics</a>
            </div>
          </div>
        </div>
      </div>
      <div class="feature-section">
        <div class="feature-card">
          <div class="feature-card-inner">
            <div class="feature-card-front">
              <i class="fas fa-tasks feature-icon"></i>
              <h3 class="feature-title">Task Management</h3>
              <p class="feature-description">Streamline your workflow with our intuitive task management system. Assign tasks, track progress, and collaborate seamlessly. Never miss a deadline with smart reminders and priority management.</p>
            </div>
            <div class="feature-card-back">
              <h3 class="mb-4">Task Management Tools</h3>
              <ul class="feature-list">
                <li>Automated Task Assignment</li>
                <li>Priority & Deadline Management</li>
                <li>Team Collaboration Tools</li>
                <li>Progress Tracking</li>
                <li>Integration with Calendar</li>
              </ul>
              <a href="#" class="feature-cta">View Features</a>
            </div>
          </div>
        </div>
      </div>
      <div class="feature-section">
        <div class="feature-card">
          <div class="feature-card-inner">
            <div class="feature-card-front">
              <i class="fas fa-envelope-open-text feature-icon"></i>
              <h3 class="feature-title">Email Marketing</h3>
              <p class="feature-description">Elevate your email marketing with powerful automation tools. Design stunning campaigns, segment your audience, and track engagement metrics. Boost conversions with personalized content delivery.</p>
            </div>
            <div class="feature-card-back">
              <h3 class="mb-4">Email Marketing Tools</h3>
              <ul class="feature-list">
                <li>Drag & Drop Email Builder</li>
                <li>Smart Campaign Automation</li>
                <li>A/B Testing Capabilities</li>
                <li>Advanced Segmentation</li>
                <li>Performance Analytics</li>
              </ul>
              <a href="#" class="feature-cta">Start Marketing</a>
            </div>
          </div>
        </div>
      </div>
      <div class="feature-section">
        <div class="feature-card">
          <div class="feature-card-inner">
            <div class="feature-card-front">
              <i class="fas fa-funnel-dollar feature-icon"></i>
              <h3 class="feature-title">Sales Pipeline</h3>
              <p class="feature-description">Optimize your sales process with our advanced pipeline management. Track deals from lead to close, forecast revenue, and identify bottlenecks. Increase win rates with data-driven insights.</p>
            </div>
            <div class="feature-card-back">
              <h3 class="mb-4">Pipeline Features</h3>
              <ul class="feature-list">
                <li>Visual Deal Tracking</li>
                <li>Revenue Forecasting</li>
                <li>Lead Scoring System</li>
                <li>Sales Activity Monitoring</li>
                <li>Automated Follow-ups</li>
              </ul>
              <a href="#" class="feature-cta">Optimize Sales</a>
            </div>
          </div>
        </div>
      </div>
      <div class="feature-section">
        <div class="feature-card">
          <div class="feature-card-inner">
            <div class="feature-card-front">
              <i class="fas fa-plug feature-icon"></i>
              <h3 class="feature-title">Integration Hub</h3>
              <p class="feature-description">Seamlessly connect your favorite tools and automate workflows. Integrate with popular platforms, sync data across systems, and eliminate manual tasks. Build a customized tech stack that works for you.</p>
            </div>
            <div class="feature-card-back">
              <h3 class="mb-4">Integration Features</h3>
              <ul class="feature-list">
                <li>API & Webhook Support</li>
                <li>Third-party App Integration</li>
                <li>Custom Workflow Builder</li>
                <li>Data Synchronization</li>
                <li>Automated Workflows</li>
              </ul>
              <a href="#" class="feature-cta">Connect Apps</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Stats Section -->
  <section class="stats-section">
    <div class="container">
      <div class="row">
        <div class="col-md-4">
          <div class="stat-card">
            <i class="fas fa-users stat-icon"></i>
            <div class="stat-number" id="customerCount">0</div>
            <h4 class="stat-title">Active Customers</h4>
            <p class="stat-description">Trusted by over 5,000+ businesses worldwide, with a 95% retention rate year over year.</p>
          </div>
        </div>
        <div class="col-md-4">
          <div class="stat-card">
            <i class="fas fa-project-diagram stat-icon"></i>
            <div class="stat-number" id="projectCount">0</div>
            <h4 class="stat-title">Projects Delivered</h4>
            <p class="stat-description">Successfully completed projects across 25+ industries with an average completion time of 2 weeks.</p>
          </div>
        </div>
        <div class="col-md-4">
          <div class="stat-card">
            <i class="fas fa-star stat-icon"></i>
            <div class="stat-number" id="satisfactionRate">0</div>
            <h4 class="stat-title">Customer Satisfaction</h4>
            <p class="stat-description">Maintaining an industry-leading satisfaction rate through dedicated support and continuous improvements.</p>
          </div>
        </div>
      </div>
  </div>
  </section>

  <?php include '_Footer.php'; ?>

  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
  <script>
    // Initialize GSAP and ScrollTrigger
    gsap.registerPlugin(ScrollTrigger);

    // Horizontal scroll effect
    gsap.to(".features-container", {
      x: () => -(document.querySelector(".features-container").offsetWidth - window.innerWidth),
      ease: "none",
      scrollTrigger: {
        trigger: ".features-wrapper",
        start: "top top",
        end: "+=4000",
        pin: true,
        scrub: 1
      }
    });

    // Enhanced animation function with decimal support and suffix
    const animateValue = (id, start, end, duration, suffix = '') => {
      let startTimestamp = null;
      const element = document.getElementById(id);
      const decimalPlaces = String(end).includes('.') ? 1 : 0;
      
      const step = (timestamp) => {
        if (!startTimestamp) startTimestamp = timestamp;
        const progress = Math.min((timestamp - startTimestamp) / duration, 1);
        const currentValue = progress * (end - start) + start;
        element.innerHTML = currentValue.toFixed(decimalPlaces) + suffix;
        
        if (progress < 1) {
          window.requestAnimationFrame(step);
        }
      };
      window.requestAnimationFrame(step);
    };

    // Create a more sophisticated scroll trigger animation
    ScrollTrigger.create({
      trigger: ".stats-section",
      start: "top center+=100",
      onEnter: () => {
        // Animate with staggered starts
        setTimeout(() => animateValue("customerCount", 0, 5000, 2500, '+'), 0);
        setTimeout(() => animateValue("projectCount", 0, 12500, 2500, '+'), 500);
        setTimeout(() => animateValue("satisfactionRate", 0, 99.5, 2500, '%'), 1000);
      },
      once: false // Allow animation to replay on scroll up/down
    });

    // Add hover effect to stat cards
    document.querySelectorAll('.stat-card').forEach(card => {
      card.addEventListener('mouseenter', () => {
        gsap.to(card.querySelector('.stat-icon'), {
          scale: 1.2,
          duration: 0.3,
          ease: "power2.out"
        });
      });
      
      card.addEventListener('mouseleave', () => {
        gsap.to(card.querySelector('.stat-icon'), {
          scale: 1,
          duration: 0.3,
          ease: "power2.out"
        });
      });
    });

    // Add this to your existing script section
    document.querySelectorAll('.feature-card').forEach(card => {
      card.addEventListener('mouseenter', () => {
        gsap.to(card.querySelector('.feature-icon'), {
          scale: 1.2,
          rotate: 360,
          duration: 0.6,
          ease: "back.out(1.7)"
        });
      });
      
      card.addEventListener('mouseleave', () => {
        gsap.to(card.querySelector('.feature-icon'), {
          scale: 1,
          rotate: 0,
          duration: 0.6,
          ease: "back.out(1.7)"
        });
      });
    });
  </script>
</body>
</html>
