<?php

session_start();


// Check if the user is logged in
if (!isset($_SESSION['username'])) {
    header("Location: loginpage.php");
     // Redirect to login page if not logged in
    exit();
}

// Establish database connection
$host = "localhost";
$username = "root";
$password = "";
$database = "login_db";
$conn = mysqli_connect($host, $username, $password, $database);
if (!$conn) {
    die("Database connection failed: " . mysqli_connect_error());
}

$username = $_SESSION['username'];

// Query database for user details
$query = "SELECT * FROM users WHERE username='$username'";
$result = mysqli_query($conn, $query);

if ($result && mysqli_num_rows($result) == 1) {
    $userRow = mysqli_fetch_assoc($result); // Fetch user details
    mysqli_free_result($result); // Free the result set
}

mysqli_close($conn); // Close database connection

if (isset($_GET['logout'])) {
  session_destroy();
  header("Location: landingpage.html");
  exit();
}
if (isset($_SESSION['username'])) {
  $welcomeMessage = "Welcome, " . $_SESSION['username'] . "!";
} else {
  $welcomeMessage = "Welcome to our website!";
}

?>
<!DOCTYPE html>
<!-- Coding by Multiwebpress-->
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
   
    <title> Responsive Navigation Bar | Multiwebpress </title>
    <style>
      *{
    margin:0; padding:0;
    color:#f2f5f7;
    font-family: sans-serif;
    letter-spacing: 1px;
    font-weight: 300;
}

body{
  background-color: black;
  overflow-x: hidden;
}

.image-grid-container::-webkit-scrollbar {
    display: none;
}

/* Hide scrollbar for IE, Edge and Firefox */
.image-grid-container {
  -ms-overflow-style: none;  /* IE and Edge */
  scrollbar-width: none;  /* Firefox */
}
nav{
    height: 4rem;
    width: 100vw;
    display: flex;
    position: fixed;
    top: 0;
    z-index: 10;
    background-color:black;
    box-shadow: 0 3px 20px rgba(0,0,0,0.2);
}

/* Styling Logo*/

.logo{
    padding: 3vh 3vw;
    text-align: left;
    width: 20vw;
}

.logo img{
    height: auto;
    width: 4rem;
}

/* Styling Navigation Links*/

.nav-links{
    width: 80vw;
    display: flex;
    padding: 0 0.7vw;
    justify-content: space-evenly;
    align-items: center;
    text-transform: uppercase;
    list-style: none;
    font-weight: 600;
}

.nav-links li a{
    margin: 0 0.7vw;
    text-decoration: none;
    transition: all ease-in-out 350ms;
    padding: 10px;
}

.nav-links li a:hover{
    color:#000;
    background-color: #fff;
    padding: 10px;
    border-radius: 50px;
}

.nav-links li{
    position:relative;
}

.nav-links li a:hover::before{
    width: 80%;
}




.login-button{
    padding: 0.6rem 0.8rem;
    margin-left: 2vw;
    font-size:1rem;
    cursor:pointer;
    background-color: transparent;
    border:1.5px solid #f2f5f7;
    border-radius: 2em;
}

.login-button:hover{
    color:#fff;
    background-color: #dd5f24;
    border:1.5px solid #dd5f24;
    transition: all ease-in-out 350ms;
}



.hamburger div{
    width: 30px;
    height: 3px;
    background: #f2f5f7;
    margin: 5px;
    transition: all 0.3s ease;
}

.hamburger{
    display: none;
}
.newrelase{
    margin: 20px;
    color: white;
    text-align: left;
    display: flex;
    font-size: 20px;
    font-family:'Courier New', Courier, monospace;
}
.more{
  width: 80vw;
    position: absolute;
    right: 0;
    padding: 0 0.7vw;
    justify-content: space-evenly;
    align-items: right;
  
    list-style: none;
  
    font-size: 20px;
    
    font-family: 'Courier New', Courier, monospace;
}
.title{
  color: white;
  font-size: 20px;
  font-family: 'Courier New', Courier, monospace;
}

 h3{
    margin: 20px;
    color: white;
    text-align: right;
    font-size: 20px;
    font-family:'Courier New', Courier, monospace;
}
.slider {
    max-width: 100%;
    margin-top: 70px;
    overflow: hidden;
    border-radius: 10px;
}

#slideshow-container {
    display: flex;
    flex-direction: column; /* Stack images vertically on mobile */
    transition: transform 0.5s ease-in-out;
}

.slide {
    width: 100%;
    max-height: 500px; /* Adjust the max-height as needed */
  
    margin-bottom: 10px; /* Add some spacing between images */
}
.pro {
    display: flex;
    flex-direction: column; /* Stack items vertically on mobile */
    margin: 20px;
    padding: 20px;
    border-radius: 20px;
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
    cursor: pointer;
}

.prow2-2 {
    display: flex;
    align-items: center;
    justify-content: space-around;
    padding: 20px;

}

.col-3 {
    flex-basis: 25%;
    min-width: 250px;
    margin-bottom: 30px;
    transition: transform 0.5s;
}

.col-3 img {
    padding-top: 30px;
    max-width: 100%; /* Ensure image doesn't exceed parent width */
    object-fit: cover;
}

.image-grid-container {
    max-width: 100%; 
    overflow-x:scroll; 
    white-space: nowrap;
    margin: 10px;
}

.image-grid {
    display: inline-block; /* Display images in a row */
    vertical-align: top;
}

.image {
    width: 200px; /* Set the width of each image */
    height: auto;
    display: inline-block;
    margin-right: 10px; /* Add spacing between images */
}

.image img {
    width: 100%;
    height: 200px;
    display: block;
    border-radius: 5px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
}


#searchbar {
  margin: 10px auto 10px; /* Updated margin: 20px top, auto right/left, 10px bottom */
    padding: 10px;
    width: 300px;

    border-radius: 10px;
    box-sizing: border-box;
    text-align: center;
    background-color: black;
    border-color: white;
    border-style: solid;
}

input[type="text"] {
    width: 100%;
    padding: 10px;
    color: white;
    background-color: black;
    border: none;
    outline: none; /* Remove the default focus outline */
}

.image h4{
    padding: 10px;
}

.image {
        position: relative;
        overflow: hidden;
        transition: transform 0.3s;
      }

      .image:hover {
        transform: scale(1.05);
      }

      .dets {
        position: absolute;
        bottom: 0;
        left: 0;
        width: 100%;
        padding: 10px;
        background: rgba(0, 0, 0, 1);
        color: white;
        transform: translateY(100%);
        transition: transform 0.3s;
      }

      .image:hover .dets {
        transform: translateY(0);
      }

      /* ... your existing styles ... */
/* ... your existing styles ... */

.dets button {
      width: 100%;
      margin-top: 5px;
      font-size: 12px;
      padding: 5px 10px;
      color: white;
      background-color: transparent;
      outline: none;
      border: none;
      text-align: left;
      border-radius: 5px;
      font-weight: 500;
      opacity: .8;
      transition: .2s;
    }

    .dets button a {
      color: white;
      text-decoration: none;
      font-size: 11px;
      font-weight: 600;
      margin-left: 10px;
    }

    .dets button:hover {
      background-color: rgba(255, 255, 255, 0.1);
    }
    .welcome-message {
  background-color: rgba(0, 0, 0, 0.8);
  color: white;
  text-align: center;
  padding: 10px;
  font-size: 18px;
  font-weight: bold;
  z-index: 2;
  position: relative;
  margin-top: 20px;
}


/* ... your existing styles ... */
.profile-menu {
  display: none;
  position: absolute;
  top: 100%;
  right: 0;
  color: blue;
  background-color: black;
  border: 1px solid #ccc;
  border-radius: 5px;
  list-style: none;
  padding: 10px 40px;
}
.profile-menu a{
    color: white;
}
.avatar-container.open .profile-menu{
    display: block;
}
/* ... your existing CSS ... */

.user-details-container {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    display: none;
    justify-content: center;
    align-items: center;
    background-color: rgba(0, 0, 0, 0.5);
    z-index: 1000;
}
.user-details-container a{
    color:black;
}

.user-details-popup {
    background-color:black;
    font-size:20px ;
    padding: 20px ;
    border-radius: 10px;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
    opacity: 0;
    transform: translateY(-20px);
    transition: opacity 0.3s ease-in-out, transform 0.3s ease-in-out;
    max-width: 300px;
}
.user-details-popup p{
    color:white;
}

.user-details-popup.open {
    opacity: 1;
    transform: translateY(0);
}

.close-user-details {
    display: block;
    margin-top: 10px;
    background-color: #f00;
    color: white;
    border: none;
    padding: 5px 10px;
    cursor: pointer;
    border-radius: 5px;
}



.avatar {
  height: 50px;
  width: 50px;
  border-radius: 50%;
  margin-left: 20px;

}
.avatar:hover{
  cursor:pointer;
}
.avatar-menu {
  position: relative;
}
.close-user-details:hover{
    background-color: rgb(174, 0, 0);
}

@media screen and (max-width: 800px){
    
#searchbar{
    width: 200px;
}
    nav{
        position: fixed;
        height: 70px;
        z-index: 3;
    }
    .hamburger{
        display:block;
        position: absolute;
        cursor: pointer;
        right: 5%;
        top: 50%;
        transform: translate(-5%, -50%);
        z-index: 2;
        transition: all 0.7s ease;
    }
    .nav-links{
        background: black;
        position: fixed;
        opacity: 1;
        height: 100vh;
        width: 100%;
        flex-direction: column;
        clip-path: circle(50px at 90% -20%);
        -webkit-clip-path: circle(50px at 90% -10%);
        transition: all 1s ease-out;
        pointer-events: none;
    }
    .nav-links.open{
        clip-path: circle(1000px at 90% -10%);
        -webkit-clip-path: circle(1000px at 90% -10%);
        pointer-events: all;
    }
    .nav-links li{
        opacity: 0;
    }
    .nav-links li:nth-child(1){
        transition: all 0.5s ease 0.2s;
    }
    .nav-links li:nth-child(2){
        transition: all 0.5s ease 0.4s;
    }
    .nav-links li:nth-child(3){
        transition: all 0.5s ease 0.6s;
    }
    .nav-links li:nth-child(4){
        transition: all 0.5s ease 0.7s;
    }
    .nav-links li:nth-child(5){
        transition: all 0.5s ease 0.8s;
    }
    .nav-links li:nth-child(6){
        transition: all 0.5s ease 0.9s;
        margin: 0;
    }
    .nav-links li:nth-child(7){
        transition: all 0.5s ease 1s;
        margin: 0;
    }

    li.fade{
        opacity: 1;
    }

    /* Navigation Bar Icon on Click*/

        .toggle .bars1{
            transform: rotate(-45deg) translate(-5px, 6px);
        }

        .toggle .bars2{
            transition: all 0s ease;
            width: 0;
        }

        .toggle .bars3{
            transform: rotate(45deg) translate(-5px, -6px);
        }
        .slide {
        max-height: 200px; /* Adjust height for mobile view */
    }
    .pro {
        margin: 10px;
        padding: 10px;
    }

    .col-3 {
        flex-basis: 50%;
    }
    .image {
        width: 150px; /* Adjust image width for mobile */
    }
    .title{
        font-size: 14px;
    }
    .more{
        font-size: 14px;
    }
    .logo h2{
        font-size: 14px;
    }
    .image h4{
        font-size: 14px;
        padding: 10px;
    }

}
    </style>
</head>
<body>
    <nav>
        <div class="logo">
           <h2>Stream Flix</h2>
        </div>
        <div class="search-container">
        <input id="searchbar" onkeyup="searchVideos()" type="text" name="search" placeholder="Search videos..">
    </div>
        <div class="hamburger">
            <div class="bars1"></div>
            <div class="bars2"></div>
            <div class="bars3"></div>
        </div>
        <ul class="nav-links">
            <li><a href="#tv shows">Tv Shows</a></li>
            <li><a href="#movies">Movies</a></li>
            <li><a href="#web series">Web Series</a></li>
        
            <li class="avatar-menu">
                <div class="avatar-container">
                
                    <img class="avatar" src="Male Avatar.jpg" alt="User Avatar" />
                    <ul class="profile-menu">
                    <li><a id="profile-link" href="#">Profile</a></li><br>
                    <li><a href="?logout=1">LogOut</a></li>
                </ul>
            </div>
            </li>
           
          
        </ul>
        
    </nav>
    <!--Start of Conferbot Script-->
    <script type="text/javascript">
        (function (d, s, id) {
          var js,
            el = d.getElementsByTagName(s)[0];
          if (d.getElementById(id)) {
            return;
          }
          js = d.createElement(s);
          js.async = true;
          js.src = 'https://s3.ap-south-1.amazonaws.com/conferbot.defaults/dist/v1/widget.min.js';
          js.id = id;
          js.charset = 'UTF-8';
          el.parentNode.insertBefore(js, el);
          // Initializes the widget when the script is ready
          js.onload = function () {
              var w = window.ConferbotWidget("64f9c41cbbb9eb4426fc17bb", "live_chat");
          };
        })(document, 'script', 'conferbot-js');
      </script>
      <!--End of Conferbot Script-->
   
    <div class="user-details-container">
    <div class="user-details-popup">
        <?php if (isset($userRow)): ?>
            <img class="avatar" src="Male Avatar.jpg" alt="User Avatar" />
            <div class="user-details-info">
                <p>User Name: <?php echo $userRow['username']; ?></p><br>
                <p>Email: <?php echo $userRow['email']; ?></p>
            </div>
        <?php endif; ?>
        <button class="close-user-details">Close</button>
    </div>
</div>
  

    
    <div class="slider">
        
      <div id="slideshow-container">
    
          <img class="slide"  src="missionimpossible.jpg" alt="pic 1">
          <a href="strangerthings.html"><img class="slide" src="stranger things.jpg" width="" alt="pic 2"></a>
          <img class="slide"  src="spiderman across the verse.jpg" alt="pic 3">
      </div>
      <div class="welcome-message">
  <p><?php echo $welcomeMessage; ?></p>
</div>
  </div>
  <div class="newrelase">
  <div class="title">Top Of The Week</div>
  <a href="topoftheweek.html"><span class="more" style="text-align: right;">View More  ></span></a> 
</div>
<div class="image-grid-container">
    <div class="image-grid">
        <div class="image">
            <img src="spider-verse_art_of_book_cover.jpg" alt="Image 1">
            <div class="dets">
              <h4>Spider-Man:(Across<br>the Spider-Verse)</h4>
              <h5>1 hr 41 min<br> Animation,Action,Adventure  <br>2023</h5>
              
              <button><i class="dets-buttons"></i><a href="strangerthings.html">WATCH NOW</a></button>
              <button><i class="dets-buttons"></i><a href="#">ADD TO WATCHLIST</a></button>
          </div>
            <h4 style="color: white;">Spider-Man</h4>
        </div>       

<div class="image">
    <img src="Oppenheimer-CillianMurphy-ChristopherNolan-HollywoodMoviePoster_1_0d1586b1-e2a3-48ea-84a0-fd76268635f4.jpg" alt="Image 1">
    <div class="dets">
      <h4>Oppenheimer</h4>
      <h5>1 hr 41 min<br>thriller film <br>2023</h5>
      
      <button><i class="dets-buttons"></i><a href="">WATCH NOW</a></button>
      <button><i class="dets-buttons"></i><a href="#">ADD TO WATCHLIST</a></button>
  </div>
    <h4 style="color: white;">Oppenheimer</h4>
</div>   
<div class="image">
    <img src="missionimp 1.jpg" alt="Image 1">
    <div class="dets">
      <h4>Mission:Impossible</h4>
      <h5>1 hr 41 min<br>American action spy film <br>2023</h5>
      
      <button><i class="dets-buttons"></i><a href="">WATCH NOW</a></button>
      <button><i class="dets-buttons"></i><a href="#">ADD TO WATCHLIST</a></button>
  </div>
    <h4 style="color: white;">Mission: Impossible</h4>
</div>   
<div class="image">
    <img src="Meg.jpg" alt="Image 1">
    <div class="dets">
      <h4>Meg 2: The Trench</h4>
      <h5>1 hr 41 min<br> Adventure,Thriller  <br>2023</h5>
      
      <button><i class="dets-buttons"></i><a href="">WATCH NOW</a></button>
      <button><i class="dets-buttons"></i><a href="#">ADD TO WATCHLIST</a></button>
  </div>
    <h4 style="color: white;">Meg 2: The Trench</h4>
</div>   
<div class="image">
    <img src="strays-ver3-button-1684425075480.jpg" alt="Image 1">
    <div class="dets">
      <h4>Strays</h4>
      <h5>1 hr 41 min<br>comedy film <br> 2023</h5>
      
      <button><i class="dets-buttons"></i><a href="">WATCH NOW</a></button>
      <button><i class="dets-buttons"></i><a href="#">ADD TO WATCHLIST</a></button>
  </div>
    <h4 style="color: white;">Strays</h4>
</div>   
<div class="image">
    <img src="Interstellar.jpg" alt="Image 1">
    <div class="dets">
      <h4> Interstellar </h4>
      <h5>1 hr 41 min<br> Adventure,Sci-fi <br> 2023</h5>
      
      <button><i class="dets-buttons"></i><a href="">WATCH NOW</a></button>
      <button><i class="dets-buttons"></i><a href="#">ADD TO WATCHLIST</a></button>
  </div>
    <h4 style="color: white;">Interstellar </h4>
</div>   
<div class="image">
    <img src="dune.jpg" alt="Image 1">
    <div class="dets">
      <h4> Dune </h4>
      <h5>1 hr 41 min<br> Action,Sci-Fi   <br>Hindi, 2020</h5>
      
      <button><i class="dets-buttons"></i><a href="">WATCH NOW</a></button>
      <button><i class="dets-buttons"></i><a href="#">ADD TO WATCHLIST</a></button>
  </div>
    <h4 style="color: white;"> Dune </h4>
</div>   
        <!-- Add more image divs as needed -->
    </div>
    <div class="image">
        <img src="Barbie_2023_poster.jpg" alt="Image 1">
        <div class="dets">
          <h4>Barbie</h4>
          <h5>1 hr 41 min<br> Action,Sci-Fi   <br>Hindi, 2020</h5>
          
          <button><i class="dets-buttons"></i><a href="">WATCH NOW</a></button>
          <button><i class="dets-buttons"></i><a href="#">ADD TO WATCHLIST</a></button>
      </div>
        <h4 style="color: white;">Barbie </h4>
    </div>  
</div>
</div>
<div class="newrelase">
  <div class="title" id="web series">Web Series</div>
  <a href="topoftheweek.html"><span class="more" style="text-align: right;">View More  ></span></a> 
</div>
<div class="image-grid-container">
    <div class="image-grid">
        <div class="image">
            <img src="stranger things.jpg" alt="Image 1">
            <div class="dets">
              <h4>Stranger Things</h4>
              <h5>Seasons:4<br> Science Fiction, Adventure<br>2016</h5>
              
              <button><i class="dets-buttons"></i><a href="">WATCH NOW</a></button>
              <button><i class="dets-buttons"></i><a href="#">ADD TO WATCHLIST</a></button>
          </div>
            <h4 style="color: white;">Stranger Things</h4>
        </div>       
<div class="image">
<img src="game of thrones.jpg" alt="Image 3">
<div class="dets">
  <h4>Game of Thrones</h4>
  <h5>Seasons: 8<br> Fantasy, Adventure<br>2011</h5>
  
  <button><i class="dets-buttons"></i><a href="">WATCH NOW</a></button>
  <button><i class="dets-buttons"></i><a href="#">ADD TO WATCHLIST</a></button>
</div>
<h4 style="color: white;">Game of Thrones</h4>
</div>
<div class="image">
    <img src="MarcoDAleo_TheWitcher.jpg" alt="Image 1">
    <div class="dets">
      <h4>The Witcher</h4>
      <h5> Seasons: 2<br>Fantasy, Action, Adventure<br>2019</h5>
      
      <button><i class="dets-buttons"></i><a href="">WATCH NOW</a></button>
      <button><i class="dets-buttons"></i><a href="#">ADD TO WATCHLIST</a></button>
  </div>
    <h4 style="color: white;">The Witcher</h4>
</div>   
<div class="image">
    <img src="star-wars-the-mandalorian-group-i93766.jpg" alt="Image 1">
    <div class="dets">
      <h4>The Mandalorian</h4>
      <h5>Seasons: 2<br> Fantasy, Sci-Fi, Adventure<br> 2019</h5>
      
      <button><i class="dets-buttons"></i><a href="">WATCH NOW</a></button>
      <button><i class="dets-buttons"></i><a href="#">ADD TO WATCHLIST</a></button>
  </div>
    <h4 style="color: white;">The Mandalorian</h4>
</div>   
<div class="image">
    <img src="lost in space.jpg" alt="Image 1">
    <div class="dets">
      <h4>Lost in Space</h4>
      <h5>Seasons: 3 <br> Science Fiction, Adventure<br>2018</h5>
      
      <button><i class="dets-buttons"></i><a href="">WATCH NOW</a></button>
      <button><i class="dets-buttons"></i><a href="#">ADD TO WATCHLIST</a></button>
  </div>
    <h4 style="color: white;">Lost in Space</h4>
</div>   
<div class="image">
    <img src="moner.jpg" alt="Image 1">
    <div class="dets">
      <h4>Money Heist</h4>
      <h5>Seasons: 5<br> Crime, Drama<br>2017</h5>
      
      <button><i class="dets-buttons"></i><a href="">WATCH NOW</a></button>
      <button><i class="dets-buttons"></i><a href="#">ADD TO WATCHLIST</a></button>
  </div>
    <h4 style="color: white;">Money Heist</h4>
</div>   
<div class="image">
    <img src="breaking bad.jpg" alt="Image 1">
    <div class="dets">
      <h4>Breaking Bad</h4>
      <h5>Seasons: 2<br>Thriller <br> 2019</h5>
      
      <button><i class="dets-buttons"></i><a href="">WATCH NOW</a></button>
      <button><i class="dets-buttons"></i><a href="#">ADD TO WATCHLIST</a></button>
  </div>
    <h4 style="color: white;">Breaking Bad</h4>
</div> 
<div class="image">
    <img src="boys.jpg" alt="Image 1">
    <div class="dets">
      <h4>The Boys</h4>
      <h5>Seasons: 2<br> Superhero/Adventure <br> 2019</h5>
      
      <button><i class="dets-buttons"></i><a href="">WATCH NOW</a></button>
      <button><i class="dets-buttons"></i><a href="#">ADD TO WATCHLIST</a></button>
  </div>
    <h4 style="color: white;">The Boys</h4>
</div>   
  
        <!-- Add more image divs as needed -->
    </div>
</div>
  


<div class="newrelase">
  <div class="title" id="tv showss">Movies</div>
  <a href="topoftheweek.html"><span class="more" style="text-align: right;">View More  ></span></a> 
</div>
<div class="image-grid-container">
    <div class="image-grid">
        <div class="image">
            <img src="jurassic world.jpg" alt="Image 1">
            <div class="dets">
              <h4>Jurassic Park </h4>
              <h5>2 hrs 7 mins<br>Adventure/Sci-fi<br>(1993)</h5>
              
              <button><i class="dets-buttons"></i><a href="">WATCH NOW</a></button>
              <button><i class="dets-buttons"></i><a href="#">ADD TO WATCHLIST</a></button>
          </div>
            <h4 style="color: white;">Jurassic Park</h4>
        </div>       
<div class="image">
<img src="ava.jpg" alt="Image 3">
<div class="dets">
  <h4>Avatar</h4>
  <h5>2 hrs 42 mins<br>Sci-fi /Action<br>(2009)</h5>
  
  <button><i class="dets-buttons"></i><a href="">WATCH NOW</a></button>
  <button><i class="dets-buttons"></i><a href="#">ADD TO WATCHLIST</a></button>
</div>
<h4 style="color: white;">Avatar</h4>
</div>
<div class="image">
    <img src="incredible.jpg" alt="Image 1">
    <div class="dets">
      <h4>The Incredibles</h4>
      <h5>1 hrs 55 mins<br> Animation/Superhero <br>2004</h5>
      
      <button><i class="dets-buttons"></i><a href="">WATCH NOW</a></button>
      <button><i class="dets-buttons"></i><a href="#">ADD TO WATCHLIST</a></button>
  </div>
    <h4 style="color: white;">The Incredibles</h4>
</div>   
<div class="image">
    <img src="inception.jpg" alt="Image 1">
    <div class="dets">
      <h4>Inception</h4>
      <h5>2 hrs 28 mins<br> Action, Adventure, Sci-Fi <br>2010</h5>
      
      <button><i class="dets-buttons"></i><a href="">WATCH NOW</a></button>
      <button><i class="dets-buttons"></i><a href="#">ADD TO WATCHLIST</a></button>
  </div>
    <h4 style="color: white;">Inception</h4>
</div>   
<div class="image">
    <img src="lord of the rings.jpg" alt="Image 1">
    <div class="dets">
      <h4>The Lord of the Rings</h4>
      <h5>2 hrs 58 mins<br> Adventure, Drama, Fantasy  <br>2001</h5>
      
      <button><i class="dets-buttons"></i><a href="">WATCH NOW</a></button>
      <button><i class="dets-buttons"></i><a href="#">ADD TO WATCHLIST</a></button>
  </div>
    <h4 style="color: white;">The Lord of the Rings</h4>
</div>   
<div class="image">
    <img src="backtothe future.jpg" alt="Image 1">
    <div class="dets">
      <h4>Back to the Future </h4>
      <h5>1 hr 56 mins<br> Science Fiction/Adventure/Comedy<br>1985</h5>
      
      <button><i class="dets-buttons"></i><a href="">WATCH NOW</a></button>
      <button><i class="dets-buttons"></i><a href="#">ADD TO WATCHLIST</a></button>
  </div>
    <h4 style="color: white;">Back to the Future </h4>
</div>   
<div class="image">
    <img src="spiderman.jpg" alt="Image 1">
    <div class="dets">
      <h4>Spider-Man</h4>
      <h5> 2 hrs <br>Action, Adventure <br>(2002)</h5>
      
      <button><i class="dets-buttons"></i><a href="">WATCH NOW</a></button>
      <button><i class="dets-buttons"></i><a href="#">ADD TO WATCHLIST</a></button>
  </div>
    <h4 style="color: white;">Spider-Man</h4>
</div>   


        <!-- Add more image divs as needed -->
    </div>
    <div class="image">
        <img src="bluebeetle.webp" alt="Image 1">
        <div class="dets">
          <h4>Blue Beetle</h4>
          <h5> 2 hrs <br>Action, Adventure <br>(2023)</h5>
          
          <button><i class="dets-buttons"></i><a href="">WATCH NOW</a></button>
          <button><i class="dets-buttons"></i><a href="#">ADD TO WATCHLIST</a></button>
      </div>
        <h4 style="color: white;">Blue Beetle</h4>
    </div>   
    
    
            <!-- Add more image divs as needed -->
        </div>
</div>
</div>
<div class="newrelase">
  <div class="title" id="movies">TV Shows</div>
  <a href="topoftheweek.html"><span class="more" style="text-align: right;">View More  ></span></a> 
</div>
<div class="image-grid-container">
    <div class="image-grid">
        <div class="image">
            <img src="wheel.jpg" alt="Image 1">
            <div class="dets">
              <h4>The Wheel of Time</h4>
              <h5>1 hr 41 min<br> Drama,Fantasy <br>2023</h5>
              
              <button><i class="dets-buttons"></i><a href="">WATCH NOW</a></button>
              <button><i class="dets-buttons"></i><a href="#">ADD TO WATCHLIST</a></button>
          </div>
            <h4 style="color: white;">The Wheel of Time</h4>
        </div>       
<div class="image">
<img src="ashoka.jpg" alt="Image 3">
<div class="dets">
  <h4>Ahsoka</h4>
  <h5>1 hr 41 min<br> Action,Adventure,Drama, <br>2023</h5>
  
  <button><i class="dets-buttons"></i><a href="">WATCH NOW</a></button>
  <button><i class="dets-buttons"></i><a href="#">ADD TO WATCHLIST</a></button>
</div>
<h4 style="color: white;">Ahsoka</h4>
</div>
<div class="image">
    <img src="secret-invasion-fan-casting-poster-226828-large.jpg" alt="Image 1">
    <div class="dets">
      <h4>Secret Invasion</h4>
      <h5>1 hr 41 min<br> Action,Superhero <br> 2023</h5>
      
      <button><i class="dets-buttons"></i><a href="">WATCH NOW</a></button>
      <button><i class="dets-buttons"></i><a href="#">ADD TO WATCHLIST</a></button>
  </div>
    <h4 style="color: white;">Secret Invasion</h4>
</div>   
<div class="image">
    <img src="blak mirror.jpg" alt="Image 1">
    <div class="dets">
      <h4>Black Mirror</h4>
      <h5>1 hr 41 min<br>Sci-Fi, Thriller <br> 2020</h5>
      
      <button><i class="dets-buttons"></i><a href="">WATCH NOW</a></button>
      <button><i class="dets-buttons"></i><a href="#">ADD TO WATCHLIST</a></button>
  </div>
    <h4 style="color: white;">Black Mirror</h4>
</div>   
<div class="image">
    <img src="star_trek_strange_new_worlds_official_poster_paramount_plus_1649080263.jpg" alt="Image 1">
    <div class="dets">
      <h4>Star Trek</h4>
      <h5>1 hr 41 min<br>Sci-Fi,Action,Adventure<br>2022</h5>
      
      <button><i class="dets-buttons"></i><a href="">WATCH NOW</a></button>
      <button><i class="dets-buttons"></i><a href="#">ADD TO WATCHLIST</a></button>
  </div>
    <h4 style="color: white;">Star Trek</h4>
</div>   
<div class="image">
    <img src="FUBAR-poster.jpg" alt="Image 1">
    <div class="dets">
      <h4>Fubar</h4>
      <h5>1 hr 41 min<br>Adventure,Comedy<br>2022</h5>
      
      <button><i class="dets-buttons"></i><a href="">WATCH NOW</a></button>
      <button><i class="dets-buttons"></i><a href="#">ADD TO WATCHLIST</a></button>
  </div>
    <h4 style="color: white;">Fubar</h4>
</div>   
<div class="image">
    <img src="walking.jpg" alt="Image 1">
    <div class="dets">
      <h4>The Walking Dead</h4>
      <h5>1 hr 41 min<br>Action,Horror,Thriller<br>2023</h5>
      
      <button><i class="dets-buttons"></i><a href="">WATCH NOW</a></button>
      <button><i class="dets-buttons"></i><a href="#">ADD TO WATCHLIST</a></button>
  </div>
    <h4 style="color: white;">The Walking Dead</h4>
</div>   
<div class="image">
    <img src="scam 2023.jpg" alt="Image 1">
    <div class="dets">
      <h4>Scam 2023</h4>
      <h5>1 hr 41 min<br>Action,Horror,Thriller<br>2023</h5>
      
      <button><i class="dets-buttons"></i><a href="">WATCH NOW</a></button>
      <button><i class="dets-buttons"></i><a href="#">ADD TO WATCHLIST</a></button>
  </div>
    <h4 style="color: white;">scam 2023</h4>
</div>  
 
        <!-- Add more image divs as needed -->
    </div>
</div>
</div>




<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>

const slideshowContainer = document.getElementById("slideshow-container");
let slideIndex = 0;
showSlides();

function showSlides() {
  let slides = document.getElementsByClassName("slide");
  for (let i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";
  }
  slideIndex++;
  if (slideIndex > slides.length) {
    slideIndex = 1;
  }
  slides[slideIndex - 1].style.display = "block";
  setTimeout(showSlides, 3000);
}
 


            function searchVideos() {
        let input = document.getElementById('searchbar').value;
        input = input.toLowerCase();
        let videos = document.getElementsByClassName('image');
        let slider = document.querySelector('.slider');
        let newReleases = document.querySelectorAll('.newrelease');

        if (input.trim() === "") {
            slider.style.display = 'block';
            newReleases.forEach(release => release.style.display = 'block');
        } else {
            slider.style.display = 'none';
            newReleases.forEach(release => release.style.display = 'none');
        }

        for (let i = 0; i < videos.length; i++) {
            let videoTitle = videos[i].getElementsByTagName('h4')[0].innerText.toLowerCase();
            if (videoTitle.includes(input)) {
                videos[i].style.display = 'block';
            } else {
                videos[i].style.display = 'none';
            }
        }

        if (input.trim() === "") {
            location.reload();
        }
    }


        document.addEventListener("DOMContentLoaded", function() {
  const reloadButton = document.getElementById("reloadButton");

  reloadButton.addEventListener("click", function() {
    location.reload();
  });
});
        document.addEventListener("DOMContentLoaded", function() {
  const reloadButton = document.getElementById("reloadButton");

  reloadButton.addEventListener("click", function() {
    location.reload();
  });
});
  const hamburger = document.querySelector(".hamburger");
const navLinks = document.querySelector(".nav-links");
const links = document.querySelectorAll(".nav-links li");

hamburger.addEventListener('click', ()=>{
   //Links
    navLinks.classList.toggle("open");
    links.forEach(link => {
        link.classList.toggle("fade");
    });

    //Animation
    hamburger.classList.toggle("toggle");
});
const avatarContainer = document.querySelector('.avatar-container');

avatarContainer.addEventListener('click', () => {
  avatarContainer.classList.toggle('open');
});

document.addEventListener('click', (event) => {
  if (!avatarContainer.contains(event.target)) {
    avatarContainer.classList.remove('open');
  }
});

// ... your existing JavaScript code ...

const openUserDetailsButton = document.querySelector('#profile-link');
const closeUserDetailsButton = document.querySelector('.close-user-details');
const userDetailsContainer = document.querySelector('.user-details-container');
const userDetailsPopup = document.querySelector('.user-details-popup');

openUserDetailsButton.addEventListener('click', () => {
  userDetailsContainer.style.display = 'flex';
  setTimeout(() => {
    userDetailsPopup.classList.add('open');
  }, 10);
});

closeUserDetailsButton.addEventListener('click', () => {
  userDetailsPopup.classList.remove('open');
  setTimeout(() => {
    userDetailsContainer.style.display = 'none';
  }, 300); // Adjust the delay to match the transition duration
});

// ... your existing JavaScript code ...

</script>
</body>
</html>