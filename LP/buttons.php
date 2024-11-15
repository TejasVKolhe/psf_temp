<?php
// Retrieve the username from the session
session_start();
if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
    // Now, you can use the $username and $buttonNo variables in your poll.php file
} else {
    // Handle the case where the username or buttonNo is not set in the session
    echo "Error: Username or button number not provided.";
}
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
    <link rel="stylesheet" href="../trial.css" />
    <title>PSF'24</title>
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
    <!--<link-->
    <!--  rel="stylesheet"-->
    <!--  href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/css/bootstrap.css"-->
    <!--/>-->
    <script src="https://unpkg.com/scrollreveal"></script>
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css"
    />
    <link rel="stylesheet" href="../styles/footer24.css" />
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.2/css/bootstrap.min.css"> -->

    <link rel="stylesheet" href="./buttons.css" />
    <style>
	     .p {font-family: 'Inknut Antiqua', serif;
    

            font-size: 3vw;
            color: #08ca25;
        }
    </style>
  </head>

  <body>
    <main
      class="relative min-h-screen flex flex-col justify-center bg-slate-900 overflow-hidden"
    >
      <!-- Can add content Here(Start) accorfing to need-->
		<center>
			<div style="margin-top: 3vh; font-size: 2rem; color: white;">
				<h1 class="p">Welcome,
					<?php echo $username; ?>! Click a Startup Name to Vote
				</h1>
			</div>
		</center>
      <main
        class="relative min-h-screen flex flex-col justify-center overflow-hidden supports-[overflow:clip]:overflow-clip"
      >
        <div class="w-full max-w-6xl mx-auto px-4 md:px-6 py-24">
			<div class="card b1 active">
				<div class="cover-photo">
					<!-- <img src="../images/alumni/gradient-background-wallpaper-87543_1080x675.jpg" class="profile"> -->
				</div>
				<h3 class="profile-name">Startup Name</h3>
				<p class="about">Team Member <br> XYZ </p>
				<form id="pollForm" action="send.php" method="post">
					<input
					  type="hidden"
					  name="username"
					  value="<?php echo $username; ?>"
					/>
					<button
					  type="submit"
					  name="buttonValue"
					  value="1"
					  class="button b1 neon"
					>
					  Startup Name 1<span class="span"></span>
					</button>
				
				</form>
				</div>
			<div class="card b2">
				<div class="cover-photo">
					<!-- <img src="../images/alumni/gradient-background-wallpaper-87543_1080x675.jpg" class="profile"> -->
				</div>
				<h3 class="profile-name">Startup Name</h3>
				<p class="about">Team Member <br> XYZ </p>
				<form id="pollForm" action="send.php" method="post">
					<input
					  type="hidden"
					  name="username"
					  value="<?php echo $username; ?>"
					/>
				
					<button
					  type="submit"
					  name="buttonValue"
					  value="2"
					  class="button b2 neon"
					>
					  Startup Name 2<span class="span"></span>
					</button>
					
				</form>
				</div>
			<div class="card b3">
				<div class="cover-photo">
					<!-- <img src="../images/alumni/gradient-background-wallpaper-87543_1080x675.jpg" class="profile"> -->
				</div>
				<h3 class="profile-name">Startup Name</h3>
				<p class="about">Team Member <br> XYZ </p>
				<form id="pollForm" action="send.php" method="post">
					<input
					  type="hidden"
					  name="username"
					  value="<?php echo $username; ?>"
					/>
				
					<button
					  type="submit"
					  name="buttonValue"
					  value="3"
					  class="button b3 neon"
					>
					  Startup Name 3<span class="span"></span>
					</button>
				
				</form>
				</div>
			<div class="card b4">
				<div class="cover-photo">
					<!-- <img src="../images/alumni/gradient-background-wallpaper-87543_1080x675.jpg" class="profile"> -->
				</div>
				<h3 class="profile-name">Startup Name</h3>
				<p class="about">Team Member <br> XYZ </p>
				<form id="pollForm" action="send.php" method="post">
					<input
					  type="hidden"
					  name="username"
					  value="<?php echo $username; ?>"
					/>
				
					<button
					  type="submit"
					  name="buttonValue"
					  value="4"
					  class="button b4 neon"
					>
					  Startup Name 4<span class="span"></span>
					</button>
				
				</form>
				</div>
			<div class="card b5">
				<div class="cover-photo">
					<!-- <img src="../images/alumni/gradient-background-wallpaper-87543_1080x675.jpg" class="profile"> -->
				</div>
				<h3 class="profile-name">Startup Name</h3>
				<p class="about">Team Member <br> XYZ </p>
				<form id="pollForm" action="send.php" method="post">
					<input
					  type="hidden"
					  name="username"
					  value="<?php echo $username; ?>"
					/>
				
					<button
					  type="submit"
					  name="buttonValue"
					  value="5"
					  class="button b5 neon"
					>
					  Startup Name 5<span class="span"></span>
					</button>
					
				</form>
				</div>
			<div class="card b6">
				<div class="cover-photo">
					<!-- <img src="../images/alumni/gradient-background-wallpaper-87543_1080x675.jpg" class="profile"> -->
				</div>
				<h3 class="profile-name">Startup Name</h3>
				<p class="about">Team Member <br> XYZ </p>
				<form id="pollForm" action="send.php" method="post">
					<input
					  type="hidden"
					  name="username"
					  value="<?php echo $username; ?>"
					/>
				
					<button
					  type="submit"
					  name="buttonValue"
					  value="6"
					  class="button b6 neon"
					>
					  Startup Name 6<span class="span"></span>
					</button>

				</form>
				</div>
			<div class="card b7">
				<div class="cover-photo">
					<!-- <img src="../images/alumni/gradient-background-wallpaper-87543_1080x675.jpg" class="profile"> -->
				</div>
				<h3 class="profile-name">Startup Name</h3>
				<p class="about">Team Member <br> XYZ </p>
				<form id="pollForm" action="send.php" method="post">
					<input
					  type="hidden"
					  name="username"
					  value="<?php echo $username; ?>"
					/>
				
					<button
					  type="submit"
					  name="buttonValue"
					  value="7"
					  class="button b7 neon"
					>
					  Startup Name 7<span class="span"></span>
					</button>
				
				</form>
				</div>
			<div class="card b8">
				<div class="cover-photo">
					<!-- <img src="../images/alumni/gradient-background-wallpaper-87543_1080x675.jpg" class="profile"> -->
				</div>
				<h3 class="profile-name">Startup Name</h3>
				<p class="about">Team Member <br> XYZ </p>
				<form id="pollForm" action="send.php" method="post">
					<input
					  type="hidden"
					  name="username"
					  value="<?php echo $username; ?>"
					/>
				
					<button
					  type="submit"
					  name="buttonValue"
					  value="8"
					  class="button b8 neon"
					>
					  Startup Name 8<span class="span"></span>
					</button>
					
				</form>
				</div>
			<div class="card b9">
				<div class="cover-photo">
					<!-- <img src="../images/alumni/gradient-background-wallpaper-87543_1080x675.jpg" class="profile"> -->
				</div>
				<h3 class="profile-name">Startup Name</h3>
				<p class="about">Team Member <br> XYZ </p>
				<form id="pollForm" action="send.php" method="post">
					<input
					  type="hidden"
					  name="username"
					  value="<?php echo $username; ?>"
					/>
					
					<button
					  type="submit"
					  name="buttonValue"
					  value="9"
					  class="button b9 neon"
					>
					  Startup Name 9<span class="span"></span>
					</button>
				
				</form>
				</div>
			<div class="card b10">
				<div class="cover-photo">
					<!-- <img src="../images/alumni/gradient-background-wallpaper-87543_1080x675.jpg" class="profile"> -->
				</div>
				<h3 class="profile-name">Startup Name</h3>
				<p class="about">Team Member <br> XYZ </p>
				<form id="pollForm" action="send.php" method="post">
					<input
					  type="hidden"
					  name="username"
					  value="<?php echo $username; ?>"
					/>
				
					<button
					  type="submit"
					  name="buttonValue"
					  value="10"
					  class="button b10 neon"
					>
					  Startup Name 10<span class="span"></span>
					</button>
					
				</form>
				</div>
			<div class="card b11">
				<div class="cover-photo">
					<!-- <img src="../images/alumni/gradient-background-wallpaper-87543_1080x675.jpg" class="profile"> -->
				</div>
				<h3 class="profile-name">Startup Name</h3>
				<p class="about">Team Member <br> XYZ </p>
				<form id="pollForm" action="send.php" method="post">
					<input
					  type="hidden"
					  name="username"
					  value="<?php echo $username; ?>"
					/>
				
					<button
					  type="submit"
					  name="buttonValue"
					  value="11"
					  class="button b11 neon"
					>
					  Startup Name 11<span class="span"></span>
					</button>
					
				</form>
				</div>
			<div class="card b12">
				<div class="cover-photo">
					<!-- <img src="../images/alumni/gradient-background-wallpaper-87543_1080x675.jpg" class="profile"> -->
				</div>
				<h3 class="profile-name">Startup Name</h3>
				<p class="about">Team Member <br> XYZ </p>
				<form id="pollForm" action="send.php" method="post">
					<input
					  type="hidden"
					  name="username"
					  value="<?php echo $username; ?>"
					/>
				
					<button
					  type="submit"
					  name="buttonValue"
					  value="12"
					  class="button b12 neon"
					>
					  Startup Name 12<span class="span"></span>
					</button>
					
				</form>
				</div>
			<div class="card b13">
				<div class="cover-photo">
					<!-- <img src="../images/alumni/gradient-background-wallpaper-87543_1080x675.jpg" class="profile"> -->
				</div>
				<h3 class="profile-name">Startup Name</h3>
				<p class="about">Team Member <br> XYZ </p>
				<form id="pollForm" action="send.php" method="post">
					<input
					  type="hidden"
					  name="username"
					  value="<?php echo $username; ?>"
					/>
				
					<button
					  type="submit"
					  name="buttonValue"
					  value="13"
					  class="button b13 neon"
					>
					  Startup Name 13<span class="span"></span>
					</button>
					
				</form>
				</div>
			<div class="card b14">
				<div class="cover-photo">
					<!-- <img src="../images/alumni/gradient-background-wallpaper-87543_1080x675.jpg" class="profile"> -->
				</div>
				<h3 class="profile-name">Startup Name</h3>
				<p class="about">Team Member <br> XYZ </p>
				<form id="pollForm" action="send.php" method="post">
					<input
					  type="hidden"
					  name="username"
					  value="<?php echo $username; ?>"
					/>
				
					<button
					  type="submit"
					  name="buttonValue"
					  value="14"
					  class="button b14 neon"
					>
					  Startup Name 14<span class="span"></span>
					</button>
					
				</form>
				</div>
			<div class="card b15">
				<div class="cover-photo">
					<!-- <img src="../images/alumni/gradient-background-wallpaper-87543_1080x675.jpg" class="profile"> -->
				</div>
				<h3 class="profile-name">Startup Name</h3>
				<p class="about">Team Member <br> XYZ </p>
				<form id="pollForm" action="send.php" method="post">
					<input
					  type="hidden"
					  name="username"
					  value="<?php echo $username; ?>"
					/>
				
					<button
					  type="submit"
					  name="buttonValue"
					  value="15"
					  class="button b15 neon"
					>
					  Startup Name 15<span class="span"></span>
					</button>
					
				</form>
				</div>

        </div>
      </main>
      <!-- Can add content Here(End) -->
      <div class="w-full mx-auto px-4 md:px-6 py-24">
        <!-- Can add content Here(Start) accorfing to need-->

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

    <!-- <button style="bottom: 100px;" onclick="toggleActiveClass(1)">Toggle Active for Startup 1</button>
	<button style="bottom: 200px;"  onclick="toggleActiveClass(2)">Toggle Active for Startup 2</button>
	<button style="bottom: 300px;"  onclick="toggleActiveClass(3)">Toggle Active for Startup 3</button> -->

    <script>
      var buttonNumber;
      function toggleActiveClass(buttonNumber) {
        // Remove "active" class from all buttons
        var buttons = document.querySelectorAll(".card");
        buttons.forEach(function (button) {
          button.classList.remove("active");
        });

        // Add "active" class to the specified button
        var activeButton = document.querySelector(".card.b" + buttonNumber);
        activeButton.classList.add("active");
      }

      function fetchActiveButton() {
        // Send an AJAX request to the server to fetch updated data
        const xhr = new XMLHttpRequest();
        xhr.open("GET", "get_active_button.php", true);
        xhr.onreadystatechange = function () {
          if (xhr.readyState === 4 && xhr.status === 200) {
            // Parse the response as JSON (assuming it's JSON)
            const responseData = JSON.parse(xhr.responseText);

            // Print the variable in the console
            console.log("Returned variable:", responseData);

            // Update the list of investor arrivals
            // 	const investorList = document.getElementById("investorList");
            // 	investorList.innerHTML = responseData;

            // Call the function again after a delay (long polling)
            setTimeout(fetchActiveButton, 5000); // 5-second interval
            buttonNumber = responseData;
            toggleActiveClass(buttonNumber);
          } else {
            console.log("Error");
          }
        };
        xhr.send();
      }

      // Start the long polling mechanism
      fetchActiveButton();

      // function fetchActiveButton() {
      //     // Send an AJAX request to the server to fetch updated data
      //     const xhr = new XMLHttpRequest();
      //     xhr.open("GET", "get_active_button.php", true);
      //     xhr.onreadystatechange = function() {
      //         if (xhr.readyState === 4 && xhr.status === 200) {
      //             // Update the list of investor arrivals
      //             const investorList = document.getElementById("investorList");
      //             investorList.innerHTML = xhr.responseText;

      //             // Call the function again after a delay (long polling)
      //             setTimeout(fetchActiveButton, 5000); // 1-second interval
      //         }
      //     };
      //     xhr.send();
      // }

      // // Start the long polling mechanism
      // fetchActiveButton();
    </script>

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
  </body>
</html>
