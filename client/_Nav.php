<!-- _Nav.php -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <link rel="stylesheet" href="assets/css/styles.css">
  <!-- Add GSAP and ScrollTrigger -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/ScrollTrigger.min.js"></script>
<nav class="navbar navbar-expand-lg navbar-light bg-white fixed-top shadow-sm">
  <div class="container">
    <a class="navbar-brand d-flex align-items-center" href="index.php">
      <i class="fas fa-cube text-primary mr-2"></i>
      <span class="font-weight-bold">CRM System</span>
    </a>
    
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link px-3" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link px-3" href="about.php">About</a>
        </li>
        <li class="nav-item">
          <a class="nav-link px-3" href="services.php">Services</a>
        </li>
        <li class="nav-item">
          <a class="nav-link px-3" href="contact.php">Contact</a>
        </li>
        <!-- <li class="nav-item">
          <a class="nav-link px-3" href="../admin/login.php">Login</a>
        </li> -->
      </ul>
    </div>
  </div>
</nav>

<style>
.navbar {
  transition: all 0.3s ease;
  padding: 1rem 0;
}

.navbar.scrolled {
  padding: 0.5rem 0;
  background: rgba(255, 255, 255, 0.95) !important;
  backdrop-filter: blur(10px);
}

.nav-link {
  font-weight: 500;
  color: #333 !important;
  position: relative;
  transition: color 0.3s ease;
}

.nav-link:hover {
  color: #0062ff !important;
}

.nav-link::after {
  content: '';
  position: absolute;
  bottom: 0;
  left: 50%;
  width: 0;
  height: 2px;
  background: #0062ff;
  transition: all 0.3s ease;
  transform: translateX(-50%);
}

.nav-link:hover::after {
  width: 100%;
}

/* Add padding to body to prevent content from hiding under fixed navbar */
body {
  padding-top: 76px;
}

@media (max-width: 991.98px) {
  .navbar-collapse {
    background: white;
    padding: 1rem;
    border-radius: 8px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    margin-top: 1rem;
  }
  
  .nav-link::after {
    display: none;
  }
}
</style>

<script>
// Navbar scroll effect
window.addEventListener('scroll', () => {
  const navbar = document.querySelector('.navbar');
  if (window.scrollY > 0) {
    navbar.classList.add('scrolled');
    navbar.classList.add('shadow');
  } else {
    navbar.classList.remove('scrolled');
    navbar.classList.remove('shadow');
  }
});
</script>
