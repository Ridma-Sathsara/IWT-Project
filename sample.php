<?php

@include 'config.php';


?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Hotel Booking System</title>
    <link rel="stylesheet" type="text/css" href="samp.css">

 

</head>
<body>

    <header>
        <nav>
          
          <div class="logo">
                <a href="sample.php">RIO Hotel & Vehicle Booking</a>
          </div>
          <div class="pro">
            
              <div class="buttons">

                <button class="loginbtn"><a href="login_form.php">Log in</a></button>
                <button class="signinbtn"><a href="register_form.php">Sign up</a></button>
                <button class="signinbtn"><a href="Hmanager login.php">Manager log in</a></button>
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
                <li><a href="CDA/About us/About new.html">About us</a></li>
                <li><a href="contactus/Con us.html">Contact us</a></li>
               
            </ul>
        </nav>

    </header>
 
<div class="main-content">


<div class="enjoy">

<h1>Enjoy your travel</h1>



 </div>
    
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
      <img class="demo cursor" src="Photos/wallpaperflare.com_wallpaper.jpg" style="width:100%" onclick="currentSlide(1)" alt="">
    </div>
    <div class="column">
      <img class="demo cursor" src="Photos/wallpaperflare.com_wallpaperella.jpg" style="width:100%" onclick="currentSlide(2)" alt="">
    </div>
    <div class="column">
      <img class="demo cursor" src="Photos/wallpaperflare.com_wallpapergalle.jpg" style="width:100%" onclick="currentSlide(3)" alt="">
    </div>
    <div class="column">
      <img class="demo cursor" src="Photos/wallpaperflare.com_wallpapersigiriya.jpg" style="width:100%" onclick="currentSlide(4)" alt="">
    </div>
    <div class="column">
      <img class="demo cursor" src="Photos/wallpaperflare.com_wallpaperpeocoke.jpg" style="width:100%" onclick="currentSlide(5)" alt="">
    </div>    
    <div class="column">
      <img class="demo cursor" src="Photos/wallpaperflare.com_wallpaper kandy.jpg" style="width:100%" onclick="currentSlide(6)" alt="">
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
<div class="ncard-container">


      <div class="ncard">
            <div class="ncontent">
              <div class="title">Personal edition</div>
              <div class="price">$39.99</div>
              <div class="description"></div>
            </div>
              <button>
                Buy now
              </button>
      </div>
      <div class="ncard">
            <div class="ncontent">
            <div class="title">Family edition</div>
            <div class="price">$69.99</div>
            <div class="description">  </div>
          </div>
            <button>
              Buy now
            </button>

      </div>
     
</div>



<br>
<br>
<br>
 
<br>
<br>
<br>
</div>



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
  </div>   

  

</body>
</html>
