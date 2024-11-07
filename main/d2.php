<?php require 'database_connection.php'; ?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> -->
    <link rel="stylesheet" href="js/bootstrap.min.css">
    <title>SMS</title>
    <link rel="stylesheet" href="mainstyle.css" />
  </head>
	<?php
     session_start();
	include 'nav.php';
	
	?>
	<body>

    <header>
      <div class="container header-section flex">
        <div class="header-left">
          <h1>Academic Assistant</h1>
          <p>
            Peer2TR is academic assistance platform which will help you
            enhance your skills and explore new realms of curiosity with spice
            of AI
          </p>
            </div>
        <div class="header-right">
          <img src="./assets/asset 2.jpeg" alt="hero image" />
        </div>
      </div>
    </header>
    <!--companies-->
    <!-- <section class="companies-section">
      <div class="container">
        <div class="small-bold-text companies-header"></div>
        <p>
          The world’s best companies rely on UsabilityHub to make better design
          decisions.
        </p>
        <div class="logos flex">
          <img clas="logo" src="./assets/asset 3.png" alt="" />
          <img clas="logo" src="./assets/asset 4.png" alt="" />
          <img clas="logo" src="./assets/asset 5.png" alt="" />
          <img clas="logo" src="./assets/asset 6.png" alt="" />
          <img clas="logo" src="./assets/asset 7.png" alt="" />
          <img clas="logo" src="./assets/asset 9.png" alt="" />
        </div>
      </div>
    </section> -->
    <!--features section-->
    <section class="features-section">
      <div class="container" id="features-container">
        <div class="features-header">
          <h2>Featured courses</h2>
          
        </div>
        <div class="features-area flex">
          <div class="features-card flex">
            <img src="./assets/python.png" alt="" />
            <h3>Python</h3>
            <p>qwertykbjhsdfjhf</p>
            <a href="#" class="secondary-button"
              >Explore course<i class="fa-solid fa-angles-right"></i
            ></a>
          </div>
          <div class="features-card flex">
            <img src="./assets/javalogo.png" alt="" />
            <h3>Java</h3>
            <p>qwertykbjhsdfjhf</p>
            <a href="#" class="secondary-button"
              >Explore course<i class="fa-solid fa-angles-right"></i
            ></a>
          </div>
          <div class="features-card flex">
            <img src="./assets/cpplogo.png" alt="" />
            <h3>CPP</h3>
            <p>qwertykbjhsdfjhf</p>
            <a href="#" class="secondary-button"
              >Explore course<i class="fa-solid fa-angles-right"></i
            ></a>
          </div>
          <div class="features-card flex">
            <img src="./assets/csslogo.png" alt="" />
            <h3>CSS</h3>
            <p>qwertykbjhsdfjhf</p>
            <a href="#" class="secondary-button"
              >Explore course<i class="fa-solid fa-angles-right"></i
            ></a>
          </div>
          <div class="features-card flex">
            <img src="./assets/flutterlogo.png" alt="" />
            <h3>Flutter</h3>
            <p>qwertykbjhsdfjhf</p>
            <a href="#" class="secondary-button"
              >Explore course<i class="fa-solid fa-angles-right"></i
            ></a>
          </div>
          <div class="features-card flex">
            <img src="./assets/htmllogo.png" alt="" />
            <h3>HTML</h3>
            <p>qwertykbjhsdfjhf</p>
            <a href="#" class="secondary-button"
              >Explore course<i class="fa-solid fa-angles-right"></i
            ></a>
          </div>
        </div>
      </div>
    </section>
    <!--big feature section-->
    <section class="big-feature-section">
      <div class="container flex big-feature-container">
        <div class="feature-img">
          <img src="./assets/asset 18.png" alt="" />
        </div>
        <div class="feature-desc flex">
          <h4>Disciplined with</h4>
          <h3>Structured Content</h3>
          <p>
            Step-by-Step Tutorials, Notes, Assignments, Quizes, Mentorship
            Sessions and many more waiting for you...
          </p>
        </div>
      </div>
    </section>
    
    <!--footer-->
    
    <footer>
      <div class="container flex footer-container" style="align-items:center;margin-left:540px;">
      <a href="http://localhost/main/feedback" class="secondary-button"
              >Feedback<i class="fa-solid fa-angles-right"></i
            ></a>
        </div>
      </div>
    </footer>

    <!--subfooter-->
    <div class="subfooter">
      <div class="container flex subfooter-container">
        <a href="#" class="hover-link">Privacy policy</a>
        <a href="#" class="hover-link">Terms and conditions</a>
        <a href="#" class="hover-link">Security information</a>
        <a href="#" class="hover-link"
          ><i class="fa-brands fa-square-facebook"></i
        ></a>
        <a href="#" class="hover-link"><i class="fa-brands fa-twitter"></i></a>
        <a href="#" class="hover-link"
          ><i class="fa-brands fa-square-instagram"></i
        ></a>
        <a href="#" class="hover-link"><i class="fa-brands fa-youtube"></i></a>
      </div>
    </div>
    <script
      src="https://kit.fontawesome.com/72c7aead14.js"
      crossorigin="anonymous"
    ></script>
    <script>
      const toggleButton = document.getElementById("nav-toggle");
      const navLinks = document.getElementById("nav-links");

      toggleButton.addEventListener("click", () => {
        navLinks.classList.toggle("active");
      });
    </script>
	</body>
</html>
