<?php
session_start(); // Start the session
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.2.1/css/fontawesome.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <title>Video Streaming Website</title>
  <style>
    /* Reset some default styles */
body, h1, h2, h3, p {
  margin: 0;
  padding: 0;
}


body {
  font-family: Arial, sans-serif;
  background-color: black;
}


header {
 
  color: white;
  margin: 5px;
  border-radius: 10px;
  padding: 10px 0;

}
nav {
  display: flex;
  justify-content: space-between;
  align-items: center;
  max-width: 1200px;
  margin: 0 auto;
  padding: 10px 20px;
}

nav ul {
  list-style: none;
  display: flex;
  align-items: center;
}

nav ul li {
  margin-right: 20px;
}

nav a {
  color: white;
  text-decoration: none;
}

.logo {
  font-size: 24px;
  font-weight: bold;
  color: white;
}

.avatar {
  height: 50px;
  width: 50px;
  border-radius: 50%;
  margin-left: 20px;
}
.avatar-menu {
  position: relative;
}

.profile-menu {
  display: none;
  position: absolute;
  top: 100%;
  right: 0;
  color: blue;
  background-color: white;
  border: 1px solid #ccc;
  border-radius: 5px;
  list-style: none;
  padding: 10px 40px;
}
.profile-menu a{
    color: blue;
}
.avatar-container.open .profile-menu {
  display: block;
}
.user-details {
  display: block;
  position: absolute;
  top: 50%;
  left: 50%;
  line-height: 40px;
  transform: translate(-50%, -50%);
  color: blue;
  background-color: white;
  border: 1px solid #ccc;
  border-radius: 5px;
  list-style: none;
  padding: 80px 80px;
  z-index: 1;
}
.user-details a{
    color: blue;
}


/* Main content styles */
.main {
  max-width: 1200px;
  margin: 20px auto;
  padding: 0 20px;
}

.featured-video {
  margin-top: 20px;
}

.popular-videos {
  margin-top: 30px;
}

.video-thumbnail {
  margin-bottom: 20px;
}

/* Footer styles */
footer {
  text-align: center;
  padding: 20px;
  background-color: #1a237e;
  color: white;
}
.small-container{
   display: flex;
   margin: 10px 10px;
   padding-left: 30px;
   padding-right: 30px;
   
   border-radius: 20px;
   box-shadow: 0,0,20px,20px rgba(0,0,0,0.1);
   cursor: pointer;
}


#slideshow-container {
  margin: 100px,75px;
  width: 100%;
  height: 500px;
  position: relative;
  margin: auto;
}
  .slide {
   width: 100%;
   height: 500px;
  }
  .search-container {
    display: flex;
    justify-content: center;
    align-items: center;
    margin-top: 20px;
  }
  #searchbar {
			margin-left: 15%;
      top:5px;
			padding: 10px;
      width:300px;
      background-color: black;
      border-color: white;
			border-radius: 10px;
		}

		input[type=text] {
			width: 30%;
			-webkit-transition: width 0.15s ease-in-out;
			transition: width 0.15s ease-in-out;
      color:white;
		}

		input[type=text]:focus {
			width: 70%;
		}
 
  .title {
  display: flex;
  justify-content: space-between;
}

.title2 {
  color: white;
}

  .slider{
    margin: 40px;
  }
  .slider img{
    border-radius: 10px;
  }
  .rec{
    margin: 20px;
  }
 .rec1 {
  text-align: left;
 }
 .container {
    position: relative;
    width: 200px;
    height: 320px;
    border-radius: 5px;
    transform: scale(0.9);
    transition: .3s;
    margin: 10px;
    overflow: hidden;
  }

  .container:hover {
    transform: scale(1);
    z-index: 1;
  }

  .container img {
    width: 100%;
    height: 200px;
    border-radius: 5px;
  }

  .dets {
    width: 100%;
    height: 220px;
    background: linear-gradient(to bottom, #993b1e00, #1d0904 75%);
    color: white;
    position: absolute;
    bottom: -100%;
    display: flex;
    flex-direction: column;
    justify-content: flex-end;
    padding: 10px;
    border-radius: 10px;
    transition: .5s;
  }

  .container:hover .dets {
    bottom: 0;
  }



  .dets {
    width: 100%;
    height: 100%;
    background: linear-gradient(to bottom, #993b1e00, #1d0904 75%);
    color: white;
    position: absolute;
    bottom: -100%;
    display: flex;
    flex-direction: column;
    justify-content: flex-end;
    padding: 10px;
    border-radius: 10px;
    transition: .5s;
  }

  .container:hover .dets {
    bottom: 0;
  }

  .dets h4 {
    font-size: 14px;
    padding: 2px 0px;
  }

  .dets h5 {
    font-size: 12px;
    word-spacing: 1px;
    margin-bottom: 2px;
    padding: 2px 0px;
    font-weight: 600;
  }

  .dets p {
    font-size: 11px;
    font-weight: 600;
    margin-bottom: 2px;
    opacity: .8;
    color: white;
  }

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
 

  @media (max-width: 768px) {
      body {
        font-size: 14px; /* Adjust font size for better readability */
      }

      .logo {
        font-size: 20px; /* Slightly larger logo font size */
      }

      .hamburger {
        display: block;
        font-size: 24px; /* Larger icon size */
      }

      /* Adjust padding and margins for better spacing */
      nav {
        padding: 10px;
      }

      nav ul {
        padding-top: 10px;
        margin: 0;
      }

      nav ul li {
        margin: 5px 0;
      }

      .container {
        padding: 10px;
        margin: 10px 0;
      }

      /* Hide the avatar menu on small screens */
      .avatar-menu {
        display: none;
      }

      /* Responsive adjustments for the profile menu */
      .user-details {
        top: 30px;
        right: 10px;
        padding: 20px;
        font-size: 14px;
      }
      
      /* Responsive adjustments for slideshow images */
      .slide {
        height: 300px;
      }
    }


 
  </style>
</head>
<body>
  <header>
    <nav>
        <div class="logo">StreamFlix</div>
        <div class="search-container">
        <input id="searchbar" onkeyup="searchVideos()" type="text" name="search" placeholder="Search videos..">
        </div>
        <ul>
          <li><a href="#">Home</a></li>
          <li><a href="toppicks.html">Top picks</a></li>
          <li><a href="#">Tv Shows</a></li>
          <li><a href="#">Movies</a></li>
          <li><a href="#">web Series</a></li>
          <li class="avatar-menu">
            <div class="avatar-container">
              <img class="avatar" src="Male Avatar.jpg" alt="User Avatar"/>
              <ul class="profile-menu">
                <li><a id="profile-link" href="#">Profile</a></li>
                <br>
                <li><a href="#">LogOut</a></li>
              </ul>
            </div>
          </li>
        </ul>
      </nav>
         <?php
$host = "localhost";
$username = "root";
$password = "";
$database = "login_db";
$conn = mysqli_connect($host, $username, $password, $database);

if (!$conn) {
  
    die("Database connection failed: " . mysqli_connect_error());
    
}


// Check if login form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve form data
   
    $uname = $_POST['uname'];
    $pass = $_POST['pass'];

    // Query database for login
    $query = "SELECT * FROM users WHERE username='$uname' AND password='$pass'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) == 1) {
        // Successful login
        $userRow = mysqli_fetch_assoc($result); // Fetch user details
        mysqli_free_result($result); // Free the result set
        mysqli_close($conn); // Close database connection

        $_SESSION['username'] = $userRow['username']; // Store username in session

        // Display user details
        echo '<ul class="user-details">';
        echo '<img class="avatar" src="Male Avatar.jpg" alt="User Avatar"/>';
        echo '<li>User Name: ' . $userRow['username'] . '</li>';
        echo '<li>Email: ' . $userRow['email'] . '</li>';
        echo '</ul>';
    } else {
        
        header("Location: loginpage.php?error=1");
        exit();
    }
    
}
?>
  </header>
  <div class="rec">
    <div class="rec1">
      <h4 style="color: white;"> Recent Releases</h4>
    </div>
  </div>
 
  <div class="slider">
    <div id="slideshow-container">
      <img class="slide" src="missionimpossible.jpg" alt="pic 1" width="100%">
     <a href="strangerthings.html"><img class="slide" src="stranger things.jpg" alt="pic 2"></a>
      <img class="slide" src="spiderman across the verse.jpg" alt="pic 3">
    </div>
  </div>
 
 
 
  </div>
 
 
 
  <div class="small-container">
   
  <div class="container">
    <div class="img">
      <img src="dune.jpg" alt="Stranger Things">
    </div>
  
    <div class="dets">
      <h4>Dune</h4>
      <h5>1 hr 41 min, Romance, Drama, <br>Hindi, 2020</h5>
      <p>eleven, mike, dustin, steve and max</p>
      <button>&#9658;<a href="#">WATCH NOW</a></button>
      <button><i class="fas fa-plus-circle"></i> <a href="#">ADD TO WATCHLIST</a></button>
    </div>
  </div>
  <div class="container">
    <div class="img">
      <img src="stranger things.jpg" alt="Stranger Things">
    </div>
  ]
    <div class="dets">
      <h4>alpha</h4>
      <h5>1 hr 41 min, Romance, Drama, <br>Hindi, 2020</h5>
      <p>eleven, mike, dustin, steve and max</p>
      <button>&#9658;<a href="#">WATCH NOW</a></button>
      <button><i class="fas fa-plus-circle"></i> <a href="#">ADD TO WATCHLIST</a></button>
    </div>
  </div>
  <div class="container">
    <div class="img">
      <img src="stranger things.jpg" alt="Stranger Things">
    </div>
  ]
    <div class="dets">
      <h4>Stranger Things</h4>
      <h5>1 hr 41 min, Romance, Drama, <br>Hindi, 2020</h5>
      <p>eleven, mike, dustin, steve and max</p>
      <button>&#9658;<a href="#">WATCH NOW</a></button>
      <button><i class="fas fa-plus-circle"></i> <a href="#">ADD TO WATCHLIST</a></button>
    </div>
  </div>
  <div class="container">
    <div class="img">
      <img src="stranger things.jpg" alt="Stranger Things">
    </div>
  ]
    <div class="dets">
      <h4>Stranger Things</h4>
      <h5>1 hr 41 min, Romance, Drama, <br>Hindi, 2020</h5>
      <p>eleven, mike, dustin, steve and max</p>
      <button>&#9658;<a href="#">WATCH NOW</a></button>
      <button><i class="fas fa-plus-circle"></i> <a href="#">ADD TO WATCHLIST</a></button>
    </div>
  </div>
  <div class="container">
    <div class="img">
      <img src="stranger things.jpg" alt="Stranger Things">
    </div>
  ]
    <div class="dets">
      <h4>Stranger Things</h4>
      <h5>1 hr 41 min, Romance, Drama, <br>Hindi, 2020</h5>
      <p>eleven, mike, dustin, steve and max</p>
      <button>&#9658;<a href="#">WATCH NOW</a></button>
      <button><i class="fas fa-plus-circle"></i> <a href="#">ADD TO WATCHLIST</a></button>
    </div>
  </div>
  <div class="container">
    <div class="img">
      <img src="stranger things.jpg" alt="Stranger Things">
    </div>
  ]
    <div class="dets">
      <h4>Stranger Things</h4>
      <h5>1 hr 41 min, Romance, Drama, <br>Hindi, 2020</h5>
      <p>eleven, mike, dustin, steve and max</p>
      <button>&#9658;<a href="#">WATCH NOW</a></button>
      <button><i class="fas fa-plus-circle"></i> <a href="#">ADD TO WATCHLIST</a></button>
    </div>
  </div>
  <div class="container">
    <div class="img">
      <img src="stranger things.jpg" alt="Stranger Things">
    </div>
  ]
    <div class="dets">
      <h4>Stranger Things</h4>
      <h5>1 hr 41 min, Romance, Drama, <br>Hindi, 2020</h5>
      <p>eleven, mike, dustin, steve and max</p>
      <button>&#9658;<a href="#">WATCH NOW</a></button>
      <button><i class="fas fa-plus-circle"></i> <a href="#">ADD TO WATCHLIST</a></button>
    </div>
  </div>
</div>
<div class="small-container">
   
   <div class="container">
     <div class="img">
       <img src="dune.jpg" alt="Stranger Things">
     </div>
   ]
     <div class="dets">
       <h4>Dune</h4>
       <h5>1 hr 41 min, Romance, Drama, <br>Hindi, 2020</h5>
       <p>eleven, mike, dustin, steve and max</p>
       <button>&#9658;<a href="#">WATCH NOW</a></button>
       <button><i class="fas fa-plus-circle"></i> <a href="#">ADD TO WATCHLIST</a></button>
     </div>
   </div>
   <div class="container">
     <div class="img">
       <img src="stranger things.jpg" alt="Stranger Things">
     </div>
   ]
     <div class="dets">
       <h4>alpha</h4>
       <h5>1 hr 41 min, Romance, Drama, <br>Hindi, 2020</h5>
       <p>eleven, mike, dustin, steve and max</p>
       <button>&#9658;<a href="#">WATCH NOW</a></button>
       <button><i class="fas fa-plus-circle"></i> <a href="#">ADD TO WATCHLIST</a></button>
     </div>
   </div>
   <div class="container">
     <div class="img">
       <img src="stranger things.jpg" alt="Stranger Things">
     </div>
   ]
     <div class="dets">
       <h4>Stranger Things</h4>
       <h5>1 hr 41 min, Romance, Drama, <br>Hindi, 2020</h5>
       <p>eleven, mike, dustin, steve and max</p>
       <button>&#9658;<a href="#">WATCH NOW</a></button>
       <button><i class="fas fa-plus-circle"></i> <a href="#">ADD TO WATCHLIST</a></button>
     </div>
   </div>
   <div class="container">
     <div class="img">
       <img src="stranger things.jpg" alt="Stranger Things">
     </div>
   ]
     <div class="dets">
       <h4>Stranger Things</h4>
       <h5>1 hr 41 min, Romance, Drama, <br>Hindi, 2020</h5>
       <p>eleven, mike, dustin, steve and max</p>
       <button>&#9658;<a href="#">WATCH NOW</a></button>
       <button><i class="fas fa-plus-circle"></i> <a href="#">ADD TO WATCHLIST</a></button>
     </div>
   </div>
   <div class="container">
     <div class="img">
       <img src="stranger things.jpg" alt="Stranger Things">
     </div>
   ]
     <div class="dets">
       <h4>Stranger Things</h4>
       <h5>1 hr 41 min, Romance, Drama, <br>Hindi, 2020</h5>
       <p>eleven, mike, dustin, steve and max</p>
       <button>&#9658;<a href="#">WATCH NOW</a></button>
       <button><i class="fas fa-plus-circle"></i> <a href="#">ADD TO WATCHLIST</a></button>
     </div>
   </div>
   <div class="container">
     <div class="img">
       <img src="stranger things.jpg" alt="Stranger Things">
     </div>
   ]
     <div class="dets">
       <h4>Stranger Things</h4>
       <h5>1 hr 41 min, Romance, Drama, <br>Hindi, 2020</h5>
       <p>eleven, mike, dustin, steve and max</p>
       <button>&#9658;<a href="#">WATCH NOW</a></button>
       <button><i class="fas fa-plus-circle"></i> <a href="#">ADD TO WATCHLIST</a></button>
     </div>
   </div>
   <div class="container">
     <div class="img">
       <img src="stranger things.jpg" alt="Stranger Things">
     </div>
   ]
     <div class="dets">
       <h4>Stranger Things</h4>
       <h5>1 hr 41 min, Romance, Drama, <br>Hindi, 2020</h5>
       <p>eleven, mike, dustin, steve and max</p>
       <button>&#9658;<a href="#">WATCH NOW</a></button>
       <button><i class="fas fa-plus-circle"></i> <a href="#">ADD TO WATCHLIST</a></button>
     </div>
   </div>
 </div>


  <footer>
    <p>&copy; 2023 StreamFlix. All rights reserved.</p>
  </footer>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
<script>


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

const avatarContainer = document.querySelector('.avatar-container');

avatarContainer.addEventListener('click', () => {
  avatarContainer.classList.toggle('open');
});

document.addEventListener('click', (event) => {
  if (!avatarContainer.contains(event.target)) {
    avatarContainer.classList.remove('open');
  }
});


function searchVideos() {
            let input = document.getElementById('searchbar').value;
            input = input.toLowerCase();
            let videos = document.getElementsByClassName('container');
            let slider = document.querySelector('.slider');

            // Toggle the slider's display based on input presence
            if (input.trim() === "") {
                slider.style.display = 'block';
            } else {
                slider.style.display = 'none';
            }

            for (let i = 0; i < videos.length; i++) {
                let videoTitle = videos[i].getElementsByTagName('h4')[0].innerText.toLowerCase();
                if (videoTitle.includes(input)) {
                    videos[i].style.display = 'block';
                } else {
                    videos[i].style.display = 'none';
                }
            }
        }

const profileMenu = document.querySelector('#profile-link');
const userdetails=document.querySelector('.user-details');
profileMenu.addEventListener("click", (event) => {
  event.stopPropagation(); // Prevent the click event from propagating to the document
  userdetails.style.display = userdetails.style.display === "none" || userdetails.style.display === "" ? "block" : "none";
});

// Add a click event listener to the document
document.addEventListener("click", (event) => {
  // Check if the clicked element is outside the menu and toggle button
  if (!userdetails.contains(event.target) && event.target !== profileMenu) {
    userdetails.style.display = "none"; // Hide the menu
  }
});


</script>


</body>

</html>