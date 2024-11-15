<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require './PHPMailer/src/Exception.php';
require './PHPMailer/src/PHPMailer.php';
require './PHPMailer/src/SMTP.php';



if (isset($_POST['sendMailBtn'])) {

  // Instantiation and passing [ICODE]true[/ICODE] enables exceptions
  $mail = new PHPMailer(true);

  $fromEmail = 'bec@coeptech.ac.in';
  $toEmail = 'queries.psf@gmail.com';
  $subjectName = $_POST['subject'];
  $message = $_POST['message'];
  $name = $_POST['name'];
  $visitor_email = $_POST['email'];

  try {
    //Server settings
    //  $mail->SMTPDebug = 2; // Enable verbose debug output
    $mail->isSMTP(); // Set mailer to use SMTP
    $mail->Host = 'smtp.office365.com'; // Specify main and backup SMTP servers
    $mail->SMTPAuth = true; // Enable SMTP authentication
    $mail->Username = 'bec@coeptech.ac.in'; // SMTP username
    $mail->Password = 'Bhau@2021-22';
    // $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
    // $mail->SMTPSecure = 'ssl';
    // $mail->Port = 465; // TCP port to connect to
$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
$mail->Port = 587; // Use port 587 for TLS
    //Recipients
    $mail->setFrom($fromEmail, 'Query Sender');
    $mail->addAddress($toEmail); // Add a recipient
    //  $mail->addAddress('recipient2@example.com'); // Name is optional
    $mail->addReplyTo($visitor_email, $name);

    // Content
    $mail->isHTML(true); // Set email format to HTML
    $mail->Subject = $subjectName;
    $mail->Body = '<!DOCTYPE html>
			<html lang="en">
			<head>
				<meta charset="UTF-8">
				<meta name="viewport"
					  content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
				<meta http-equiv="X-UA-Compatible" content="ie=edge">
				<title>Query</title>
			</head>
			<body>
			<span class="preheader" style="color: transparent; display: none; height: 0; max-height: 0; max-width: 0; opacity: 0; overflow: hidden; mso-hide: all; visibility: hidden; width: 0;">' . $message . '</span>
				<div class="container">
				    <h3 style="font-weight: bold;">Name: ' . $name . '</h3>
				    <h3 style="font-weight; bold;">Email: ' . $visitor_email . '</h3>
				    <p style="color: #0a2642; font-size: 20px;">' . $message . '</p>
				</div>
			</body>
			</html>';
    $mail->AltBody = $message;

    $mail->send();
    $output = '<div class="alert alert-success">
                  <p style="font-weight: bold;">Thank You ' . $name . ' for contacting us!<br/>We\'ll get back to you soon!</p>
               </div>';

  } catch (Exception $e) {
    $output = '<div class="alert alert-danger">
                  <h5>' . $e->getMessage() . '</h5>
                </div>';
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="./images/navbarAndFooter/PSF24 White.webp">

    <title>Pune Startup Fest'24</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;800&family=Nothing+You+Could+Do&display=swap"
        rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/@alpinejs/intersect@3.x.x/dist/cdn.min.js"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        inter: ['Inter', 'sans-serif'],
                        nycd: ['Nothing You Could Do', 'cursive'],
                    },
                },
            },
        };
    </script>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <!-- <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.2/css/bootstrap.min.css'> -->
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/css/bootstrap.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/fontawesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/css/bootstrap.css">
    <script src="https://unpkg.com/scrollreveal"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <link rel="stylesheet" href="./styles/footer24.css">
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.2/css/bootstrap.min.css"> -->




  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/fontawesome.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/css/bootstrap.css">
  <link rel='stylesheet' type='text/css' href='./styles/contact.css' />
  <link rel='stylesheet' type='text/css' href='./styles/footer24.css' />
  <link rel='stylesheet' type='text/css' href='./styles/navbar24.css' />

  <link rel="stylesheet" href="./styles/preloader.css">
</head>

<body>  
  <!-- PAGE LOADER -->
    <div id="loading">
      <div class="loader-container">
          <!-- Outer rings -->
          <div class="outer-ring1"></div>
          <div class="outer-ring2"></div>
          <div class="outer-ring3"></div>
          
          <div class="loader">
              <img class="image" src="./images/navbarAndFooter/PSF24 White.webp" alt="PSF'24 LOGO">
          </div>
      </div>
  </div>
  <script>
      var loader = document.getElementById("loading");
      window.addEventListener("load", function () {
          setTimeout(function() {
              $('#loading').hide();
          }, 2000);
      })
  </script>
  <!-- PAGE LOADER END -->
    <!-- NAVBAR START -->
    <nav style="position: fixed; z-index: 9999999;">
      <input type="checkbox" id="checkbox3" class="checkbox3 visuallyHidden">
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
      <!-- <div class="imgg"><a href="./main.html"><img  class="imgg" src="PSF + Marsh White1.webp" alt=""></a></div> -->

      <ul>
          <!-- <img class="imgg" src="PSF + Marsh White1.webp" alt="PSF + Marsh White1.webp"> -->

          <li > <a href="./main.html" style='font-family: "-apple-system", "BlinkMacSystemFont", "Roboto", "Helvetica Neue", sans-serif !important;'> <i id="icon" class="fa-solid fa-house icon" style="padding-right: 0.5rem;"></i>
                  Home</a>
          </li>
          <li ><a href="./aboutus.html" style='font-family: "-apple-system", "BlinkMacSystemFont", "Roboto", "Helvetica Neue", sans-serif !important;'> <i id="icon" class="fa-regular fa-file-lines"
                      style="padding-right: 0.5rem;"></i> About
                  Us</a>
          </li>

          <li ><a href="./events.html" style='font-family: "-apple-system", "BlinkMacSystemFont", "Roboto", "Helvetica Neue", sans-serif !important;'> <i id="icon" class="fa-sharp fa-solid fa-puzzle-piece"
                      style="padding-right: 0.5rem;"></i>Events</a></li>


          <li ><a href="./investor.html" style='font-family: "-apple-system", "BlinkMacSystemFont", "Roboto", "Helvetica Neue", sans-serif !important;'><i id="icon" class="fa-solid fa-shoe-prints"
                      style="padding-right: 0.5rem;"></i>Investors</a></li>
          <li ><a href="./partners.html" style='font-family: "-apple-system", "BlinkMacSystemFont", "Roboto", "Helvetica Neue", sans-serif !important;'><i id="icon" class="fa-solid fa-envelope-open-text"
                      style="padding-right: 0.5rem;"></i>Sponsors</a></li>
          

          <div class="dropdown ">
              <button class="dropbtn" style='font-family: "-apple-system", "BlinkMacSystemFont", "Roboto", "Helvetica Neue", sans-serif !important;'>OTHER <i class="fa-solid fa-caret-down"></i></button>
              <div class="dropdown-content">
                  <a href="./internship_portal.html" style='font-family: "-apple-system", "BlinkMacSystemFont", "Roboto", "Helvetica Neue", sans-serif !important;'> <i id="icon" class="fa-regular fa-calendar-days"
                          style="padding-right: 0.5rem;"></i>INTERNSHIP
                      PORTAL
                  </a>
                  <a href="./alumni.html" style='font-family: "-apple-system", "BlinkMacSystemFont", "Roboto", "Helvetica Neue", sans-serif !important;'> <i id="icon" class="fa-regular fa-people-group"
                          style="padding-right: 0.5rem;"></i>Alumni
                  </a>
                  <a href="./startupexpo.html" style='font-family: "-apple-system", "BlinkMacSystemFont", "Roboto", "Helvetica Neue", sans-serif !important;'> <i id="icon" class="fa-solid fa-stairs"
                          style="padding-right: 0.5rem;"></i>STARTUP</a>
                  <a href="./visitorreg.php" style='font-family: "-apple-system", "BlinkMacSystemFont", "Roboto", "Helvetica Neue", sans-serif !important;'> <i id="icon" class="fa-solid fa-hand-holding-dollar"
                          style="padding-right: 0.5rem;"></i>Registration</a>
                  <a href="./team.html" style='font-family: "-apple-system", "BlinkMacSystemFont", "Roboto", "Helvetica Neue", sans-serif !important;'> <i id="icon" class="fa-solid fa-hand-holding-dollar"
                          style="padding-right: 0.5rem;"></i>Team</a>
              </div>
          </div>
          <li class="mobli" ><a href="./internship_portal.html" style='font-family: "-apple-system", "BlinkMacSystemFont", "Roboto", "Helvetica Neue", sans-serif !important;'> <i id="icon" class="fa-regular fa-calendar-days"
                      style="padding-right: 0.5rem;"></i>Internship
                  Portal</a></li>
          <li class="mobli" ><a href="./alumni.html" style='font-family: "-apple-system", "BlinkMacSystemFont", "Roboto", "Helvetica Neue", sans-serif !important;'> <i id="icon" class="fa-solid fa-people-group"
                      style="padding-right: 0.5rem;"></i>Alumni
              </a></li>
          <li class="mobli" ><a href="./startupexpo.html" style='font-family: "-apple-system", "BlinkMacSystemFont", "Roboto", "Helvetica Neue", sans-serif !important;'> <i id="icon" class="fa-solid fa-stairs"
                      style="padding-right: 0.5rem;"></i>STARTUP</a></li>
          <li class="mobli" ><a href="./visitorreg.php" style='font-family: "-apple-system", "BlinkMacSystemFont", "Roboto", "Helvetica Neue", sans-serif !important;'> <i id="icon" class="fa-solid fa-shoe-prints"
                      style="padding-right: 0.5rem;"></i>Registration</a></li>
          <li class="mobli" ><a href="./team.html" style='font-family: "-apple-system", "BlinkMacSystemFont", "Roboto", "Helvetica Neue", sans-serif !important;'> <i id="icon" class="fa-solid fa-user-group"
                      style="padding-right: 0.5rem;"></i>Team</a></li>

          <div class="dropdown">
              <button class="dropbtn" style='font-family: "-apple-system", "BlinkMacSystemFont", "Roboto", "Helvetica Neue", sans-serif !important;'>FEEDBACK <i class="fa-solid fa-caret-down"></i></button>
              <div class="dropdown-content">
                  <a href="./startup_feedback.html" style='font-family: "-apple-system", "BlinkMacSystemFont", "Roboto", "Helvetica Neue", sans-serif !important;'> <i id="icon" class="fa-regular fa-calendar-days"
                          style="padding-right: 0.5rem;"></i>Startup
                      Feedback
                  </a>
                  <a href="./investor_feedback.html" style='font-family: "-apple-system", "BlinkMacSystemFont", "Roboto", "Helvetica Neue", sans-serif !important;'> <i id="icon" class="fa-regular fa-calendar-days"
                          style="padding-right: 0.5rem;"></i>Investor
                      Feedback
                  </a>

              </div>
          </div>
          <li class="mobli"><a href="./startup_feedback.html" style='font-family: "-apple-system", "BlinkMacSystemFont", "Roboto", "Helvetica Neue", sans-serif !important;'> <i id="icon" class="fa-solid fa-comments"
                      style="padding-right: 0.5rem;"></i>Startup
                  Feedback</a></li>
          <li class="mobli"><a href="./investor_feedback.html" style='font-family: "-apple-system", "BlinkMacSystemFont", "Roboto", "Helvetica Neue", sans-serif !important;'> <i id="icon" class="fa-solid fa-comments"
                      style="padding-right: 0.5rem;"></i>Investor
                  Feedback</a></li>
          <!-- <li><a href="#"> <i id="icon" class="fa-regular fa-handshake" style="padding-right: 0.5rem;"></i>Feedback </a></li> -->
          <li><a href="./contact.php" style='font-family: "-apple-system", "BlinkMacSystemFont", "Roboto", "Helvetica Neue", sans-serif !important;'><i id="icon" class="fa-solid fa-envelope"
                    style="padding-right: 0.5rem;"></i>Contact
                Us</a></li>
        <!-- <li><a href="./arrival/"><i id="icon" class="fa-solid fa-briefcase"
                    style="padding-right: 0.5rem;"></i>Arrival</a></li>
        <li><a href="./startup_issues/add_issue.html"><i id="icon" class="fa-solid fa-exclamation-circle"
                    style="padding-right: 0.5rem;"></i>Startup Issues</a></li> -->
      </ul>
  </nav>

  <!-- NAVBAR END -->


    <main class="relative min-h-screen flex flex-col justify-center bg-slate-900 overflow-hidden">
        <!-- Can add content Here(Start) accorfing to need-->

  
        <h3 class="text-center text-success">
          <?= $output ?>
        </h3>
        <form action="" method="post" style="z-index: 500;">
          <script src="https://kit.fontawesome.com/6fc46b33e7.js" crossorigin="anonymous"></script>
          <div class="backgroundForm">
            <div class="formContainer">
              <div class="screen">
                <div class="form-body">
                  <div class="form-body-item formLeft">
                    <div class="app-title">
                      <span>CONTACT</span>
                      <span>US</span>
                      <!-- <img src="PSFb.webp" class="psfimg"> -->
                    </div>
                    <img src="./images/navbarAndFooter/PSFb.webp" class="psfimg">
      
                    <div class="app-contact">CONTACT INFO : <a href="mailto:queries.psf@gmail.com">queries.psf@gmail.com</a>
                    </div>
                  </div>
                  <div class="form-body-item">
                    <div class="app-form">
                      <div class="app-form-group">
                        <input name="name" class="app-form-control" placeholder="NAME" value="" required autofocus>
                      </div>
                      <div class="app-form-group">
                        <input name="email" class="app-form-control" placeholder="EMAIL" type="email" required="">
                      </div>
                      <div class="app-form-group">
                        <input name="subject" class="app-form-control" placeholder="SUBJECT">
                      </div>
                      <div class="app-form-group message">
                        <textarea name="message" class="app-form-control" placeholder="Message" required=""
                          spellcheck="false"></textarea>
                      </div>
                      <div class="app-form-group buttons">
                        <button class="app-form-button">CANCEL</button>
                        <button name="sendMailBtn" class="app-form-button">SUBMIT</button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </form>


        <!-- Can add content Here(End) -->
        <div class="w-full mx-auto px-4 md:px-6 py-24">
        <!-- Can add content Here(Start) accorfing to need-->




            <!-- Can add content Here(End) -->
        </div>
        <!-- Can add content Here(Start) accorfing to need-->




        <!-- Can add content Here(End) -->

        <div class="text-center">

            <!-- Illustration #1 -->
            <div class="absolute top-0 left-0 rotate-180 -translate-x-3/4 -scale-x-100 blur-3xl opacity-70 pointer-events-none"
                aria-hidden="true">
                <img src="./svg/shape.svg" class="max-w-none" width="852" height="582" alt="Illustration" />
            </div>

            <!-- Illustration #2 -->
            <div class="absolute top-0 right-0 -translate-y-1/2 translate-x-1/4 blur-3xl opacity-70 pointer-events-none"
                aria-hidden="true">
                <img src="./svg/shape.svg" class="max-w-none" width="852" height="582" alt="Illustration" />
            </div>
            <div class="absolute left-50 -translate-y-1/2 translate-x-1/4 blur-3xl opacity-60 pointer-events-none"
                style="top: 90%;" aria-hidden="true">
                <img src="./svg/shape.svg" class="max-w-none" width="852" height="582" alt="Illustration" />
            </div>
            <!-- Illustration #3 -->
            <div class="absolute top-80 left-100 -translate-y-1 translate-x-1/4 blur-3xl opacity-70 pointer-events-none"
                aria-hidden="true">
                <img src="./svg/shape.svg" class="max-w-none" width="852" height="582" alt="Illustration" />
            </div>
            <div class="absolute left-50 -translate-y-1/2 translate-x-1/4 blur-3xl opacity-60 pointer-events-none"
                style="top: 90%;" aria-hidden="true">
                <img src="./svg/shape.svg" class="max-w-none" width="852" height="582" alt="Illustration" />
            </div>


            <!-- Particles animation -->
            <div class="absolute inset-0 pointer-events-none" aria-hidden="true">
                <canvas data-particle-animation></canvas>
            </div>
            <div class="relative">
            </div>
        </div>
        <!-- </div> -->

        <!-- Ilusration #5 -->
        <!-- <div class="absolute bottom-0 left-50 rotate-180 -translate-x-1 -scale-x-100 blur-3xl opacity-70 pointer-events-none" aria-hidden="true">
		  <img src="./svg/shape.svg" class="max-w-none" width="852" height="582" alt="Illustration">
	  </div> -->
    </main>

    <!--footer starts here -->
  <footer>
    <div class="footer-ft">
      <div class="foot-container">

        <div class="footbox-left">
          <span><img class="footer-logo" ; margin-left: 30%;max-width:40%;"
              src="./images/navbarAndFooter/PSF24 White.webp" alt=""></span>
          <span>
            <p class="footer-links">
              <a href="./main.html" class="ftlink-1">Home</a>

              <a href="./aboutus.html">About Us</a>

              <a href="./investor.html">Investors</a>

              <a href="./contact.php">Contact</a>
            </p>
          </span>
        </div>


        <div class="footbox-center">
          <a target="_blank" class="footer-details"
            href="https://maps.app.goo.gl/bGgzdDzbVzRgRFJf6">
            <img src="./svg/location-pin.svg" alt="location-pin" class="foot-svg style">
            <p class="foot-detail-content">COEP TECH Shivajinagar, Pune-411005</p>
          </a>
          <a class="footer-details" href="#">
            <img src="./svg/telephone.svg" alt="telephone-logo" class="foot-svg">
            <p class="foot-detail-content">Contact us</p>
          </a>
          <a class="footer-details" href="mailto:queries.psf@gmail.com">
            <img src="./svg/mail.svg" alt="mail-logo" class="foot-svg">
            <p class="foot-detail-content">queries.psf@gmail.com</p>
          </a>
        </div>


        <div class="footbox-right"><span>
            <div class="foot-contact">
              <div class="foot-link-card">
                <a class="socialContainer containerOne"
                  href="https://www.instagram.com/biec_coep/?igshid=Yzg5MTU1MDY%3D">
                  <svg viewBox="0 0 16 16" class="socialSvg instagramSvg">
                    <path
                      d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.917 3.917 0 0 0-1.417.923A3.927 3.927 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.916 3.916 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.926 3.926 0 0 0-.923-1.417A3.911 3.911 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0h.003zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599.28.28.453.546.598.92.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.47 2.47 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.478 2.478 0 0 1-.92-.598 2.48 2.48 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233 0-2.136.008-2.388.046-3.231.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92.28-.28.546-.453.92-.598.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045v.002zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92zm-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217zm0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334z">
                    </path>
                  </svg>
                </a>

                <a class="socialContainer containerTwo"
                  href="https://www.youtube.com/c/BhausInnovationEntrepreneurshipCellCOEP2022">
                  <img src="./svg/youtube-white.svg" alt="white youtube logo" class="socialSvg YoutubeSvg"
                    style="scale: 1.5;">
                </a>

                <a class="socialContainer containerThree" href="https://www.linkedin.com/company/pune-startup-fest/">
                  <svg viewBox="0 0 448 512" class="socialSvg linkdinSvg">
                    <path
                      d="M100.28 448H7.4V148.9h92.88zM53.79 108.1C24.09 108.1 0 83.5 0 53.8a53.79 53.79 0 0 1 107.58 0c0 29.7-24.1 54.3-53.79 54.3zM447.9 448h-92.68V302.4c0-34.7-.7-79.2-48.29-79.2-48.29 0-55.69 37.7-55.69 76.7V448h-92.78V148.9h89.08v40.8h1.3c12.4-23.5 42.69-48.3 87.88-48.3 94 0 111.28 61.9 111.28 142.3V448z">
                    </path>
                  </svg>
                </a>

                <a class="socialContainer containerFour"
                  href="https://twitter.com/BIEC_COEP?t=UdnnunU2-JfVRhQ_SBoRBQ&s=08">
                  <img src="./svg/twitter-logo.png" alt="titter-logo" class="socialSvg twitterpng">
                </a>

                <a class="socialContainer containerFive" href="https://www.facebook.com/biec.coep/">
                  <img src="./svg/facebook-white-logo.svg" alt="facebook logo" class="socialSvg facebookSvg"
                    style="scale: 1.5;">
                </a>
              </div>

            </div>
            <div class="foot-mails">
              <div class="foot-detail-cards">
                <div class="ft-detail-card">
                  <p class="ft-tip">Gaurav Sonewane</p>
                  <div class="ft-detail-text">
                    <p class="ft-second-text">Secretary</p>
                    <a class="ft-third-text" href="mailto:secretary.psf@coeptech.ac.in">secretary.psf@coeptech.ac.in</a>
                  </div>
                </div>
                <div class="ft-detail-card">
                  <p class="ft-tip">Samta Raka</p>
                  <div class="ft-detail-text">
                    <p class="ft-second-text">Finance and Marketing Executive</p>
                    <a class="ft-third-text" href="mailto:finance.psf@coeptech.ac.in">finance.psf@coeptech.ac.in</a>
                  </div>
                </div>
                <div class="ft-detail-card">
                  <p class="ft-tip">Sanmeet Sawla</p>
                  <div class="ft-detail-text">
                    <p class="ft-second-text">Investor Relations Executive</p>
                    <a class="ft-third-text" href="mailto:ir.psf@coeptech.ac.in">ir.psf@coeptech.ac.in</a>
                  </div>
                </div>
                <div class="ft-detail-card">
                  <p class="ft-tip">Varun Shetty</p>
                  <div class="ft-detail-text">
                    <p class="ft-second-text">Events and Networking Executive</p>
                    <a class="ft-third-text" href="mailto:events.psf@coeptech.ac.in">events.psf@coeptech.ac.in</a>
                  </div>
                </div>
              </div>
            </div>
          </span>
        </div>




        <div class="ft-Copyright" style="color: aqua; font-size: 14px;">
          <p>Copyright &copy; 2024, All Rights Reserved</p>
        </div>

        <div class="ft-designed" style="color: aliceblue; font-size: 18px;">
          <p>DESIGNED BY WEB TEAM</p>
        </div>

      </div>





    </div>





  </footer>
  <!--footer ends here -->
	


    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js'></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/three.js/r134/three.min.js"></script>
    <script src="./js/particle-animation.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/three.js/r134/three.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init({
            offset: 300,
            duration: 2000, // Animation duration in milliseconds
            once: false,     // Animation only once on page load
        });
    </script>
        <script src="https://kit.fontawesome.com/6fc46b33e7.js" crossorigin="anonymous"></script>

</body>

</html>