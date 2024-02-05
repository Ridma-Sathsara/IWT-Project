<?php

@include 'config.php';


?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Hotel Booking System</title>
    <link rel="stylesheet" type="text/css" href="../style.css">

    <!--<script src="homescript.js"></script>-->

</head>
<body>

    <header>
        <nav>
          
          <div class="logo">
                <a href="sample.php">Hotel Booking</a>
          </div>
          <div class="pro">
            
              <div class="buttons">

                <button class="loginbtn"><a href="login_form.php">Log out</a></button>
                <!-- <button class="signinbtn"><a href="register_form.php">Sign up</a></button> -->

              </div> 
              <img src="profile photo.png" alt="Profile photo">
            
          </div>
          <br>
          <br>
          <br>
            <ul class="navigation">
                <li><a href="sample.php">Home</a></li>
                <li><a href="destinnation.php">Destinations</a></li>
                <li><a href="vehiclerental.php">Vehicle  Rentals</a></li>
                <li><a href="rooms.html">About us</a></li>
                <li><a href="rooms.html">Contact us</a></li>
               
            </ul>
        </nav>

    </header>
 <br>

    <center>
      <br>
      <br>
      <br>
      <br>
      <br>
      <br>
      <div class="user-inputs">
              <input type="date" id="chechin-date" placeholder="Check-in-date">
              <input type="date" id="chechout-date" placeholder="Check-out-date">
              <input type="number" id="chechin-date" placeholder="Check-in-date">
      </div>
      </center>
      <br>
      <br>
      <br>

    <h2 style="text-align:center">Places You can visit in Sri Lanka</h2>
    <br>
    <br>

<div class="container">
  <div class="mySlides">
    <div class="numbertext">1 / 6</div>
    <img src="Photos/wallpaperflare.com_wallpaper.jpg" style="width:100%">
  </div>

  <div class="mySlides">
    <div class="numbertext">2 / 6</div>
    <img src="Photos/wallpaperflare.com_wallpaperella.jpg" style="width:100%">
  </div>

  <div class="mySlides">
    <div class="numbertext">3 / 6</div>
    <img src="Photos/wallpaperflare.com_wallpapergalle.jpg" style="width:100%">
  </div>
    
  <div class="mySlides">
    <div class="numbertext">4 / 6</div>
    <img src="Photos/wallpaperflare.com_wallpapersigiriya.jpg" style="width:100%">
  </div>

  <div class="mySlides">
    <div class="numbertext">5 / 6</div>
    <img src="Photos/wallpaperflare.com_wallpaperpeocoke.jpg" style="width:100%">
  </div>
    
  <div class="mySlides">
    <div class="numbertext">6 / 6</div>
    <img src="Photos/wallpaperflare.com_wallpaper kandy.jpg" style="width:100%">
  </div>
    
  <a class="prev" onclick="plusSlides(-1)"></a>
  <a class="next" onclick="plusSlides(1)"></a>

  <div class="caption-container">
    <p id="caption"></p>
  </div>

  <div class="row">
    <div class="column">
      <img class="demo cursor" src="Photos/wallpaperflare.com_wallpaper.jpg" style="width:100%" onclick="currentSlide(1)" alt="Watter Falls">
    </div>
    <div class="column">
      <img class="demo cursor" src="Photos/wallpaperflare.com_wallpaperella.jpg" style="width:100%" onclick="currentSlide(2)" alt="Nine Arch">
    </div>
    <div class="column">
      <img class="demo cursor" src="Photos/wallpaperflare.com_wallpapergalle.jpg" style="width:100%" onclick="currentSlide(3)" alt="Galle Fort ">
    </div>
    <div class="column">
      <img class="demo cursor" src="Photos/wallpaperflare.com_wallpapersigiriya.jpg" style="width:100%" onclick="currentSlide(4)" alt="Sigiriya">
    </div>
    <div class="column">
      <img class="demo cursor" src="Photos/wallpaperflare.com_wallpaperpeocoke.jpg" style="width:100%" onclick="currentSlide(5)" alt="Nature">
    </div>    
    <div class="column">
      <img class="demo cursor" src="Photos/wallpaperflare.com_wallpaper kandy.jpg" style="width:100%" onclick="currentSlide(6)" alt="Temple of the tooth">
    </div>
  </div>
</div>
    
<script>
    let slideIndex = 1;
    showSlides(slideIndex);
    
    function plusSlides(n) {
      showSlides(slideIndex += n);
    }
    
    function currentSlide(n) {
      showSlides(slideIndex = n);
    }
    
    function showSlides(n) {
      let i;
      let slides = document.getElementsByClassName("mySlides");
      let dots = document.getElementsByClassName("demo");
      let captionText = document.getElementById("caption");
      if (n > slides.length) {slideIndex = 1}
      if (n < 1) {slideIndex = slides.length}
      for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";
      }
      for (i = 0; i < dots.length; i++) {
        dots[i].className = dots[i].className.replace(" active", "");
      }
      slides[slideIndex-1].style.display = "block";
      dots[slideIndex-1].className += " active";
      captionText.innerHTML = dots[slideIndex-1].alt;
    }
    </script>


<br>
<br>
<br>
    <main>
        <section class="hero">
            <div class="hero-content">
                <h1>Welcome to Hotel Booking</h1>
                <p>Book your perfect stay at our luxurious hotels</p>
                <a href="booking.html" class="btn">Book Now</a>
            </div>
        </section>   
    </main>
<br>
<br>
<br>
<br>
    <footer>
        <div class="footer-content">
            <p>&copy; 2023 Hotel Booking. All rights reserved.</p>
            <ul class="footer-links">
                <li><a href="terms.html">Terms of Service</a></li>
                <li><a href="privacy.html">Privacy Policy</a></li>
                <li><a href="contact.html">Contact Us</a></li>
            </ul>
        </div>
    </footer>
</body>
</html>
