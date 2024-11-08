<?php
$conn = mysqli_connect('localhost', 'u331863597_biec', 'psf@BIEC69');
mysqli_select_db($conn, 'u331863597_event');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// SQL query to fetch top scorers based on total_points
$sql = "SELECT username, total_points FROM LP_audience_database ORDER BY total_points DESC LIMIT 10";

$result = $conn->query($sql);

// Check if the query was successful
if ($result) {
    // Fetch the data into a PHP associative array
    $data = [];
    $id = 1; // Initialize the id
    while ($row = $result->fetch_assoc()) {
        // Add the 'id' attribute
        $row['id'] = $id++;
        $data[] = $row;
    }

    // Encode the PHP array as JSON
    $jsonData = json_encode($data);
    
    // Embed the JSON data in JavaScript
    echo "<script>";
    echo "var leaderboardData = $jsonData;";
    echo "console.log(leaderboardData);";
    echo "</script>";
} else {
    // Handle the case where the query was not successful
    echo "Error: " . $conn->error;
}

// Close the database connection
$conn->close();
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      rel="shortcut icon"
      href="../images/navbarAndFooter/PSF24 White.png"
    />

    <title>Pune Startup Fest'24</title>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;800&family=Nothing+You+Could+Do&display=swap"
      rel="stylesheet"
    />
    <script src="https://cdn.tailwindcss.com"></script>
    <script
      defer
      src="https://cdn.jsdelivr.net/npm/@alpinejs/intersect@3.x.x/dist/cdn.min.js"
    ></script>
    <script
      defer
      src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"
    ></script>
    <script>
      tailwind.config = {
        theme: {
          extend: {
            fontFamily: {
              inter: ["Inter", "sans-serif"],
              nycd: ["Nothing You Could Do", "cursive"],
            },
          },
        },
      };
    </script>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" />
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <!-- <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.2/css/bootstrap.min.css'> -->
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/css/bootstrap.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"> -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css"
    />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/fontawesome.min.css"
    />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/css/bootstrap.css"
    />
    <script src="https://unpkg.com/scrollreveal"></script>
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css"
    />
    <link rel="stylesheet" href="../styles/footer24.css" />
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.2/css/bootstrap.min.css"> -->
    <link rel="stylesheet" href="../styles/navbar24.css" />

    <!--Leaderboard CDN Links -->
    <link rel="stylesheet" href="./leaderboard.css" />
    <!-- React JS -->
    <script
      crossorigin
      src="https://unpkg.com/react@17/umd/react.production.min.js"
    ></script>

    <!-- ReactDOM JS -->
    <script
      crossorigin
      src="https://unpkg.com/react-dom@17/umd/react-dom.production.min.js"
    ></script>
    <style>
        body{
    margin: 0;
    font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
  }
  
  *{
    box-sizing: border-box;
  }
  
  .Leaderboard{
    padding: 80px 40px;
    margin: auto;
    max-width: 800px;
    background-color: gainsboro;
    text-align: center;
    border-radius: 100px;
  }

  .Leaderboard h1{
    background-color:darkgray;
    font-size: 30px;
    text-decoration:solid;
    font-family:'Times New Roman', Times, serif;
    border-radius: 30px;
  }

  .leader-wrap {
      display: flex;
  }
  
  .leader{
      padding: 8px 16px;
      margin-bottom: 8px;
      animation-name: revealLeaders;
      animation-duration: .4s;
      animation-fill-mode: both;
      animation-timing-function: ease-in-out;
  }
  
  .leader-ava {
      padding: 8px;
      margin-right: 16px;
      position: relative;
  }
  
  .leader-score {
      display: flex;
      align-items: center;
      opacity: 0.6;
  }
  
  .leader-score svg{
      display: block;
      margin-right: 4px;
  }
  
  .leader-score_title{
      line-height: 1;
  }
  
  .leader-ava::after{
      content: "";
      left: 0;
      bottom: 0;
      display: block;
      height: 6px;
      position: absolute;
      border: 0px transparent solid;
      border-left-width: 20px;
      border-right-width: 20px;
      border-bottom-width: 6px;
      border-bottom-color: #fff;
      transition: border-bottom-color .2s ease-in-out;
  }
  
  .leader-bar {
      margin-top: 8px;
      animation-name: barLoad;
      animation-duration: .4s;
      animation-fill-mode: both;
      animation-timing-function: cubic-bezier(0.6, 0.2, 0.1, 1);
      transform-origin: left;
  }
  
  .bar {
      height: 6px;
      border-radius: 2px;
  }
  
  @keyframes revealLeaders{
      from{
          transform: translateX(-200px);
          opacity: 0;
      }
      to{
          transform: none;
          opacity: 1;
      }
  }
  
  @keyframes barLoad{
      from{
          transform: scaleX(0);
      }
      to{
          transform: scaleX(1)
      }
  }
    </style>
  </head>

  <body>
    <!-- NAVBAR START -->
    <nav style="position: fixed; z-index: 9999999">
      <input type="checkbox" id="checkbox3" class="checkbox3 visuallyHidden" />
      <label for="checkbox3" class="checkbtn">
        <div class="hamburger hamburger3">
          <span class="bar bar1"></span>
          <span class="bar bar2"></span>
          <span class="bar bar3"></span>
          <span class="bar bar4"></span>
        </div>
      </label>

      <!-- <input type="checkbox" id="check">
  <label for="check" class="checkbtton">
    <div class="line"></div>
    <div class="line"></div>
    <div class="line"></div>
    
  </label> -->
      <!-- <div class="imgg"><a href="../main"><img  class="imgg" src="PSF + Marsh White1.png" alt=""></a></div> -->

      <ul>
        <!-- <img class="imgg" src="PSF + Marsh White1.png" alt="PSF + Marsh White1.png"> -->

        <li>
          <a href="../main.html">
            <i
              id="icon"
              class="fa-solid fa-house icon"
              style="padding-right: 0.5rem"
            ></i>
            Home</a
          >
        </li>
        <li>
          <a href="../aboutus.html">
            <i
              id="icon"
              class="fa-regular fa-file-lines"
              style="padding-right: 0.5rem"
            ></i>
            About Us</a
          >
        </li>

        <li>
          <a href="../events.html">
            <i
              id="icon"
              class="fa-sharp fa-solid fa-puzzle-piece"
              style="padding-right: 0.5rem"
            ></i
            >Events</a
          >
        </li>

        <li>
          <a href="../investor.html"
            ><i
              id="icon"
              class="fa-solid fa-shoe-prints"
              style="padding-right: 0.5rem"
            ></i
            >Investors</a
          >
        </li>
        <li>
          <a href="../partners.html"
            ><i
              id="icon"
              class="fa-solid fa-envelope-open-text"
              style="padding-right: 0.5rem"
            ></i
            >Sponsors</a
          >
        </li>

        <div class="dropdown">
          <button class="dropbtn">
            OTHER <i class="fa-solid fa-caret-down"></i>
          </button>
          <div class="dropdown-content">
            <a href="../internship_portal.html">
              <i
                id="icon"
                class="fa-regular fa-calendar-days"
                style="padding-right: 0.5rem"
              ></i
              >INTERNSHIP PORTAL
            </a>
            <a href="../alumni.html">
              <i
                id="icon"
                class="fa-regular fa-calendar-days"
                style="padding-right: 0.5rem"
              ></i
              >Alumni
            </a>
            <a href="../startupexpo.html">
              <i
                id="icon"
                class="fa-solid fa-people-group"
                style="padding-right: 0.5rem"
              ></i
              >STARTUP</a
            >
            <a href="../visitorreg.php">
              <i
                id="icon"
                class="fa-solid fa-hand-holding-dollar"
                style="padding-right: 0.5rem"
              ></i
              >Registration</a
            >
            <a href="../team.html">
              <i
                id="icon"
                class="fa-solid fa-hand-holding-dollar"
                style="padding-right: 0.5rem"
              ></i
              >Team</a
            >
          </div>
        </div>
        <li class="mobli">
          <a href="../internship_portal.html">
            <i
              id="icon"
              class="fa-regular fa-calendar-days"
              style="padding-right: 0.5rem"
            ></i
            >Internship Portal</a
          >
        </li>
        <li class="mobli">
          <a href="../alumni.html">
            <i
              id="icon"
              class="fa-regular fa-calendar-days"
              style="padding-right: 0.5rem"
            ></i
            >Alumni
          </a>
        </li>
        <li class="mobli">
          <a href="../startupexpo.html">
            <i
              id="icon"
              class="fa-solid fa-people-group"
              style="padding-right: 0.5rem"
            ></i
            >STARTUP</a
          >
        </li>
        <li class="mobli">
          <a href="../visitorreg.php">
            <i
              id="icon"
              class="fa-solid fa-hand-holding-dollar"
              style="padding-right: 0.5rem"
            ></i
            >Registration</a
          >
        </li>
        <li class="mobli">
          <a href="../team.html">
            <i
              id="icon"
              class="fa-solid fa-hand-holding-dollar"
              style="padding-right: 0.5rem"
            ></i
            >Team</a
          >
        </li>

        <div class="dropdown">
          <button class="dropbtn">
            FEEDBACK <i class="fa-solid fa-caret-down"></i>
          </button>
          <div class="dropdown-content">
            <a href="../startup_feedback.html">
              <i
                id="icon"
                class="fa-regular fa-calendar-days"
                style="padding-right: 0.5rem"
              ></i
              >Startup Feedback
            </a>
            <a href="../investor_feedback.html">
              <i
                id="icon"
                class="fa-regular fa-calendar-days"
                style="padding-right: 0.5rem"
              ></i
              >Investor Feedback
            </a>
          </div>
        </div>
        <li class="mobli">
          <a href="../startup_feedback.html">
            <i
              id="icon"
              class="fa-solid fa-hand-holding-dollar"
              style="padding-right: 0.5rem"
            ></i
            >Startup Feedback</a
          >
        </li>
        <li class="mobli">
          <a href="../investor_feedback.html">
            <i
              id="icon"
              class="fa-solid fa-hand-holding-dollar"
              style="padding-right: 0.5rem"
            ></i
            >Investor Feedback</a
          >
        </li>
        <!-- <li><a href="#"> <i id="icon" class="fa-regular fa-handshake" style="padding-right: 0.5rem;"></i>Feedback </a></li> -->
        <li>
          <a href="../contact.php"
            ><i
              id="icon"
              class="fa-solid fa-user-group"
              style="padding-right: 0.5rem"
            ></i
            >Contact Us</a
          >
        </li>
      </ul>
    </nav>

    <!-- NAVBAR END -->

    <main
      class="relative min-h-screen flex flex-col justify-center bg-slate-900 overflow-hidden"
    >
      <!-- Can add content Here(Start) accorfing to need-->

      <!-- Can add content Here(End) -->
      <div class="w-full mx-auto px-4 md:px-6 py-24">
        <!-- Can add content Here(Start) accorfing to need-->

        <div id="app"></div>

        <!-- Can add content Here(End) -->
      </div>
      <!-- Can add content Here(Start) accorfing to need-->

      <!-- Can add content Here(End) -->

      <div class="text-center">
        <!-- Illustration #1 -->
        <div
          class="absolute top-0 left-0 rotate-180 -translate-x-3/4 -scale-x-100 blur-3xl opacity-70 pointer-events-none"
          aria-hidden="true"
        >
          <img
            src="../svg/shape.svg"
            class="max-w-none"
            width="852"
            height="582"
            alt="Illustration"
          />
        </div>

        <!-- Illustration #2 -->
        <div
          class="absolute top-0 right-0 -translate-y-1/2 translate-x-1/4 blur-3xl opacity-70 pointer-events-none"
          aria-hidden="true"
        >
          <img
            src="../svg/shape.svg"
            class="max-w-none"
            width="852"
            height="582"
            alt="Illustration"
          />
        </div>
        <div
          class="absolute left-50 -translate-y-1/2 translate-x-1/4 blur-3xl opacity-60 pointer-events-none"
          style="top: 90%"
          aria-hidden="true"
        >
          <img
            src="../svg/shape.svg"
            class="max-w-none"
            width="852"
            height="582"
            alt="Illustration"
          />
        </div>
        <!-- Illustration #3 -->
        <div
          class="absolute top-80 left-100 -translate-y-1 translate-x-1/4 blur-3xl opacity-70 pointer-events-none"
          aria-hidden="true"
        >
          <img
            src="../svg/shape.svg"
            class="max-w-none"
            width="852"
            height="582"
            alt="Illustration"
          />
        </div>
        <div
          class="absolute left-50 -translate-y-1/2 translate-x-1/4 blur-3xl opacity-60 pointer-events-none"
          style="top: 90%"
          aria-hidden="true"
        >
          <img
            src="../svg/shape.svg"
            class="max-w-none"
            width="852"
            height="582"
            alt="Illustration"
          />
        </div>

        <!-- Particles animation -->
        <div class="absolute inset-0 pointer-events-none" aria-hidden="true">
          <canvas data-particle-animation></canvas>
        </div>
        <div class="relative"></div>
      </div>
      <!-- </div> -->

      <!-- Ilusration #5 -->
      <!-- <div class="absolute bottom-0 left-50 rotate-180 -translate-x-1 -scale-x-100 blur-3xl opacity-70 pointer-events-none" aria-hidden="true">
		  <img src="../svg/shape.svg" class="max-w-none" width="852" height="582" alt="Illustration">
	  </div> -->
    </main>

    <footer>
      <div class="ftcardcontainer">
        <link
          rel="stylesheet"
          href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"
          integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN"
          crossorigin="anonymous"
        />

        <!-- <h1 class="fth1-text">
				<i class="ftfa fa-users" aria-hidden="true"></i>Team Members
			</h1> -->
        <div class="ftcontainer">
          <div class="ftbox">
            <div class="fttop-bar"></div>
            <div class="ftcontent">
              <!-- <img src="https://images.pexels.com/photos/2570145/pexels-photo-2570145.jpeg?auto=compress&cs=tinysrgb&dpr=3&h=750&w=1260"
							alt=""> -->
              <b>Dr Vidya More</b>
              Faculty Advisor
              <p>vnm.extc@coep.ac.in</p>
            </div>
          </div>
          <div class="ftbox">
            <div class="fttop-bar"></div>
            <div class="fttop"></div>
            <div class="ftcontent">
              <!-- <img src=https://images.pexels.com/photos/2826131/pexels-photo-2826131.jpeg?auto=compress&cs=tinysrgb&dpr=3&h=750&w=1260
							alt=""> -->
              <b>Dr Rahul Adhao</b>
              Faculty Advisor
              <p>rba.comp@coep.ac.in</p>
            </div>
          </div>
          <div class="ftbox">
            <div class="fttop-bar"></div>
            <div class="ftcontent">
              <!-- <img src=https://images.pexels.com/photos/3681591/pexels-photo-3681591.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940
							alt=""> -->
              <b>Gaurav Sonewane</b>
              Secretary
              <p>secretary.psf@coep.ac.in</p>
            </div>
          </div>
          <div class="ftbox">
            <div class="fttop-bar"></div>
            <div class="ftcontent">
              <!-- <img src=https://images.pexels.com/photos/1689731/pexels-photo-1689731.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940
							alt=""> -->
              <b>Samta Raka </b>
              Finance and Marketing Executive
              <p>finance.psf@coep.ac.in</p>
            </div>
          </div>
          <div class="ftbox">
            <div class="fttop-bar"></div>
            <div class="ftcontent">
              <!-- <img src="https://images.pexels.com/photos/2570145/pexels-photo-2570145.jpeg?auto=compress&cs=tinysrgb&dpr=3&h=750&w=1260"
							alt=""> -->
              <b>Sanmeet Sawla</b>
              Investor Relations Executive
              <p>ir.psf@coep.ac.in</p>
            </div>
          </div>
          <div class="ftbox">
            <div class="fttop-bar"></div>
            <div class="ftcontent">
              <!-- <img src="https://images.pexels.com/photos/2570145/pexels-photo-2570145.jpeg?auto=compress&cs=tinysrgb&dpr=3&h=750&w=1260"
							alt=""> -->
              <b>Varun Shetty</b>
              Events and Networking Executive
              <p>events.psf@coep.ac.in</p>
            </div>
          </div>
        </div>
      </div>
      <footer class="ftfooter-distributed">
        <div class="ftfooter-left">
          <span
            ><img
              style="margin-left: 30%; max-width: 40%"
              src="../images/navbarAndFooter/PSF24 White.png"
              alt=""
          /></span>

          <p class="ftfooter-links">
            <a href="./main.html" class="ftlink-1">Home</a>

            <a href="./aboutus.html">About Us</a>

            <a href="./investor.html">Investors</a>

            <a href="./contact.php">Contact</a>
          </p>

          <p class="ftfooter-company-name">PUNE STARTUP FEST</p>
        </div>

        <div class="ftfooter-center">
          <div class="icons">
            <i class="fa fa-map-marker"></i>
            <a
              href="https://www.google.com/maps/dir//COEP+Technological+University,+Wellesley+Rd,+Shivajinagar,+Pune,+Maharashtra+411005/@18.5160113,73.8198323,14z/data=!4m8!4m7!1m0!1m5!1m1!1s0x3bc2c0883858b873:0x1d68fbf2cac75519!2m2!1d73.856541!2d18.5293825?entry=ttu"
            >
              <p>
                <span>Bhau's I&E Cell, COEP TECH</span> Shivajinagar,
                Pune-411005
              </p>
            </a>
          </div>

          <div class="icons">
            <i class="fa fa-phone"></i>
            <p><a href=""> Contact us </a></p>
          </div>

          <div class="icons">
            <i class="fa fa-envelope"></i>
            <p>
              <a href="mailto:queries.psf@gmail.com">queries.psf@gmail.com</a>
            </p>
          </div>
          <!-- <div class="ftCopyright">
					<p>Copyright &copy; 2023, All Rights Reserved</p>
				</div> -->
        </div>

        <div class="ftfooter-right">
          <p class="ftfooter-company-about">
            <span>About Pune Startup Fest</span>
            Pune Startup Fest is an unique Startup Expo, which provides an
            excellent platform for numerous students and Start-ups to connect
            with this ever growing entrepreneurial world.
          </p>

          <div class="ftfooter-icons">
            <!-- <h3>Follow Us:</h3> -->
            <a href="https://www.facebook.com/biec.coep/"
              ><i class="fa fa-facebook"></i
            ></a>
            <a
              href="https://twitter.com/BIEC_COEP?t=UdnnunU2-JfVRhQ_SBoRBQ&s=08"
              ><i class="fa fa-twitter"></i
            ></a>
            <a href="https://www.linkedin.com/company/pune-startup-fest/"
              ><i class="fa fa-linkedin"></i
            ></a>
            <a href="https://www.instagram.com/biec_coep/?igshid=Yzg5MTU1MDY%3D"
              ><i class="fa fa-instagram"></i
            ></a>
            <a
              href="https://www.youtube.com/c/BhausInnovationEntrepreneurshipCellCOEP2022"
              ><i class="fa fa-youtube"></i
            ></a>

            <!-- <a class="ftglassIco" href="#"><i class="ftfab fa-facebook-f"></i></a>
					<a class="ftglassIco" href="#"><i class="ftfab fa-instagram"></i></a>
					<a class="ftglassIco" href="#"><i class="ftfab fa-linkedin-in"></i></a>
					<a class="ftglassIco" href="#"><i class="ftfab fa-whatsapp"></i></a> -->
          </div>
          <!-- <div class="ftcontainer1">
					<div class="ftmenu">
					  <div class="ftnavigation">
						<span style="--i:0; --x:-1; --y:0">
						  <ion-icon name="videocam-outline"></ion-icon>
						</span>
						<span style="--i:1; --x:1; --y:0">
						  <ion-icon name="flame-outline"></ion-icon>
						</span>
						<span style="--i:2; --x:0; --y:-1">
						  <ion-icon name="bulb-outline"></ion-icon>
						</span>
						<span style="--i:3; --x:0; --y:1">
						  <ion-icon name="build-outline"></ion-icon>
						</span>
						<span style="--i:4; --x:-1; --y:1">
						  <ion-icon name="thermometer-outline"></ion-icon>
						</span>
						<span style="--i:5; --x:-1; --y:-1">
						  <ion-icon name="water-outline"></ion-icon>
						</span>
						<span style="--i:6; --x:1; --y:-1">
						  <ion-icon name="alarm-outline"></ion-icon>
						</span>
						<span style="--i:7; --x:1; --y:1">
						  <ion-icon name="radio-outline"></ion-icon>
						</span>
					  </div>
					  <div class="ftclose">
						<ion-icon name="close-outline">X</ion-icon>
					  </div>
					</div>
				  </div> -->
        </div>
        <div class="ftCopyright">
          <p>Copyright &copy; 2023, All Rights Reserved</p>
        </div>
        <div class="ftCopyright designed" style="background-color: #1c335a">
          <p>DESIGNED BY WEB TEAM</p>
        </div>
      </footer>
    </footer>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/three.js/r134/three.min.js"></script>
    <script src="../js/particle-animation.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/three.js/r134/three.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
      AOS.init({
        offset: 300,
        duration: 2000, // Animation duration in milliseconds
        once: false, // Animation only once on page load
      });
    </script>
    <script
      src="https://kit.fontawesome.com/6fc46b33e7.js"
      crossorigin="anonymous"
    ></script>
    <script>
     var leaderboardData = <?php echo $jsonData; ?>;
       console.log(leaderboardData);
      let colors = [
  "#FFB900",
  "#999DA1",
  "#C1750F",
  "#E74856",
  "#0078D7",
  "#0099BC",
  "#7A7574",
  "#767676",
  "#FF8C00",
  "#E81123",
  "#0063B1",
  "#2D7D9A",
  "#5D5A58",
  "#4C4A48",
  "#F7630C",
  "#EA005E",
  "#8E8CD8",
  "#00B7C3",
  "#68768A",
  "#CA5010",
  "#C30052",
  "#6B69D6",
  "#038387",
  "#515C6B",
  "#4A5459",
  "#DA3B01",
  "#E3008C",
  "#8764B8",
  "#00B294",
  "#567C73",
  "#647C64",
  "#EF6950",
  "#BF0077",
  "#744DA9",
  "#018574",
  "#486860",
  "#525E54",
  "#D13438",
  "#C239B3",
  "#B146C2",
  "#00CC6A",
  "#498205",
  "#FF4343",
  "#9A0089",
  "#881798",
  "#10893E",
  "#107C10",
  "#7E735F",
];

class Leaderboard extends React.Component {
  constructor() {
    super();
    this.state = {
      leaders: [],
      maxScore: 100,
    };

    this.getData = this.getData.bind(this);
  }
  getData() {
    /* Here you can implement data fetching */
    let data = {
      success: true,
      leaders:leaderboardData,
    //   leaders: [
    //     { id: 1, name: "Uenify", score: 350 },
    //     { id: 3, name: "Kekland", score: 275 },
    //     { id: 2, name: "Madopew", score: 220 },
    //     { id: 4, name: "Yussend", score: 200 },
    //     { id: 5, name: "Admi", score: 175 },
    //     { id: 6, name: "Isaan", score: 100 },
    //     { id: 7, name: "Manus", score: 130 },
    //     { id: 8, name: "Manav", score: 400 },
    //     { id: 9, name: "Human", score: 15 },
    //     { id: 10, name: "Man", score: 240 },
    //   ],

      maxScore: 500,
    };

    this.setState({
      leaders: data.leaders,
      maxScore: data.maxScore,
    });
  }
  componentWillMount() {
    this.getData();
    /*data is refreshing every 3 minutes*/
    setInterval(this.getData, 180000);
  }
  render() {
    return /*#__PURE__*/ React.createElement(
      "div",
      { className: "Leaderboard" } /*#__PURE__*/,
      React.createElement("h1", null, "Leaderboard") /*#__PURE__*/,
      React.createElement(
        "div",
        { className: "leaders" },
        this.state.leaders
          ? this.state.leaders.map((el, i /*#__PURE__*/) =>
              React.createElement(
                "div",
                {
                  key: el.id,
                  style: {
                    animationDelay: i * 0.1 + "s",
                  },

                  className: "leader",
                } /*#__PURE__*/,

                React.createElement(
                  "div",
                  { className: "leader-wrap" },
                  i < 3 /*#__PURE__*/
                    ? React.createElement(
                        "div",
                        {
                          style: {
                            backgroundColor: colors[i],
                          },

                          className: "leader-ava",
                        } /*#__PURE__*/,

                        React.createElement(
                          "svg",
                          {
                            fill: "#fff",
                            xmlns: "http://www.w3.org/2000/svg",
                            height: 24,
                            width: 24,
                            viewBox: "0 0 32 32",
                          } /*#__PURE__*/,

                          React.createElement("path", {
                            d: "M 16 3 C 14.354991 3 13 4.3549901 13 6 C 13 7.125993 13.63434 8.112309 14.5625 8.625 L 11.625 14.5 L 7.03125 11.21875 C 7.6313215 10.668557 8 9.8696776 8 9 C 8 7.3549904 6.6450096 6 5 6 C 3.3549904 6 2 7.3549904 2 9 C 2 10.346851 2.9241199 11.470238 4.15625 11.84375 L 6 22 L 6 26 L 6 27 L 7 27 L 25 27 L 26 27 L 26 26 L 26 22 L 27.84375 11.84375 C 29.07588 11.470238 30 10.346852 30 9 C 30 7.3549901 28.645009 6 27 6 C 25.354991 6 24 7.3549901 24 9 C 24 9.8696781 24.368679 10.668557 24.96875 11.21875 L 20.375 14.5 L 17.4375 8.625 C 18.36566 8.112309 19 7.125993 19 6 C 19 4.3549901 17.645009 3 16 3 z M 16 5 C 16.564129 5 17 5.4358709 17 6 C 17 6.5641291 16.564129 7 16 7 C 15.435871 7 15 6.5641291 15 6 C 15 5.4358709 15.435871 5 16 5 z M 5 8 C 5.5641294 8 6 8.4358706 6 9 C 6 9.5641286 5.5641291 10 5 10 C 4.4358709 10 4 9.5641286 4 9 C 4 8.4358706 4.4358706 8 5 8 z M 27 8 C 27.564129 8 28 8.4358709 28 9 C 28 9.5641283 27.564128 10 27 10 C 26.435872 10 26 9.5641283 26 9 C 26 8.4358709 26.435871 8 27 8 z M 16 10.25 L 19.09375 16.4375 L 20.59375 16.8125 L 25.59375 13.25 L 24.1875 21 L 7.8125 21 L 6.40625 13.25 L 11.40625 16.8125 L 12.90625 16.4375 L 16 10.25 z M 8 23 L 24 23 L 24 25 L 8 25 L 8 23 z",
                          })
                        )
                      )
                    : null /*#__PURE__*/,
                  React.createElement(
                    "div",
                    { className: "leader-content" } /*#__PURE__*/,
                    React.createElement(
                      "div",
                      { className: "leader-name" },
                      i + 1 + ". " + el.username
                    ) /*#__PURE__*/,
                    React.createElement(
                      "div",
                      { className: "leader-score" } /*#__PURE__*/,
                      React.createElement(
                        "svg",
                        {
                          fill: "currentColor",
                          height: "20",
                          viewBox: "0 0 493 493",
                          version: "1.1",
                          xmlns: "http://www.w3.org/2000/svg",
                        } /*#__PURE__*/,

                        React.createElement("path", {
                          d: "M247,468 C369.05493,468 468,369.05493 468,247 C468,124.94507 369.05493,26 247,26 C124.94507,26 26,124.94507 26,247 C26,369.05493 124.94507,468 247,468 Z M236.497159,231.653661 L333.872526,231.653661 L333.872526,358.913192 C318.090922,364.0618 303.232933,367.671368 289.298112,369.742004 C275.363292,371.81264 261.120888,372.847943 246.570473,372.847943 C209.522878,372.847943 181.233938,361.963276 161.702804,340.193617 C142.17167,318.423958 132.40625,287.169016 132.40625,246.427855 C132.40625,206.805956 143.738615,175.914769 166.403684,153.753368 C189.068753,131.591967 220.491582,120.511432 260.673112,120.511432 C285.856523,120.511432 310.144158,125.548039 333.536749,135.621403 L316.244227,177.257767 C298.336024,168.303665 279.700579,163.826682 260.337335,163.826682 C237.840155,163.826682 219.820296,171.381591 206.277218,186.491638 C192.734139,201.601684 185.962702,221.915997 185.962702,247.435186 C185.962702,274.073638 191.419025,294.415932 202.331837,308.462679 C213.244648,322.509425 229.109958,329.532693 249.928244,329.532693 C260.785092,329.532693 271.809664,328.413447 283.002291,326.174922 L283.002291,274.96891 L236.497159,274.96891 L236.497159,231.653661 Z",
                        })
                      ) /*#__PURE__*/,

                      React.createElement(
                        "div",
                        { className: "leader-score_title" },
                        el.total_points
                      )
                    )
                  )
                ) /*#__PURE__*/,

                React.createElement(
                  "div",
                  {
                    style: { animationDelay: 0.4 + i * 0.2 + "s" },
                    className: "leader-bar",
                  } /*#__PURE__*/,
                  React.createElement("div", {
                    style: {
                      backgroundColor: colors[i],
                      width: (el.total_points / this.state.maxScore) * 500 + "%",
                    },

                    className: "bar",
                  })
                )
              )
            ) /*#__PURE__*/
          : React.createElement(
              "div",
              { className: "empty" },
              "\u041F\u0443\u0441\u0442\u043E"
            )
      )
    );
  }
}

ReactDOM.render(
  /*#__PURE__*/ React.createElement(Leaderboard, null),
  document.getElementById("app")
);

    </script>
    <!-- <script src="./leaderboard.js"></script> -->
  </body>
</html>
