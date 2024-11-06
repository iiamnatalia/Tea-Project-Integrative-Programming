<style>
  footer {
    height: 200px;
    background-color: #0e3d30;
    border-top: 3px solid #d1a855;
    color: white;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    padding: 20px;
    box-shadow: 0 -4px 6px rgba(0, 0, 0, 0.1);
  }


  footer p {
    margin: 0;
    font-size: 30px;
    font-weight: bold;
    text-transform: uppercase;
    letter-spacing: 3px;
  }

  footer .footer-links {
    margin-top: 20px;
  }

  footer .footer-links a {
    color: #d1a855;
    margin: 0 15px;
    text-decoration: none;
    font-size: 20px;
    transition: color 0.3s;
  }

  footer .footer-links a:hover {
    color: #fff;
  }

  footer .social-icons {
    margin-top: 15px;
  }

  footer .social-icons a {
    color: #d1a855;
    margin: 0 10px;
    text-decoration: none;
    font-size: 25px;
    transition: color 0.3s;
  }

  footer .social-icons a:hover {
    color: #fff;
  }
  footer {
  position: relative;
  margin-top: 50px;
  /* negative value of footer height */
  height: 180px;
  clear: both;
}
</style>

<footer>
  <div class="footer-links">
    <a href="#about">About Us</a>
    <a href="#contact">Contact</a>
  </div>
  <div class="social-icons">
    <a href="https://www.facebook.com/teaproject.tenejerocandaba" target="_blank"><i class="fab fa-facebook-f"></i></a>
    <a href="https://www.instagram.com/teaprojectph/" target="_blank"><i class="fab fa-instagram"></i></a>
  </div>
</footer>

<!-- Add Font Awesome CDN for social icons -->
<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
