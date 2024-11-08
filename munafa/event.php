
<?php

// Replace with your database connection details
$conn =  mysqli_connect('localhost','u331863597_biec', 'psf@BIEC69');
mysqli_select_db($conn,'u331863597_event');
// Check connection
if (!$conn) {
    echo '<script type="text/javascript"> alert("Error:Unable to connect") ;</script>';
    // die("Connection failed: " . $conn->connect_error);
}

// Username whose team_name you want to retrieve
// get
session_start();
$username = $_SESSION['variableToSend'];
// echo "Received variable: " . $receivedVariable;
// get

// Prepare and execute the SELECT query
$query = "SELECT spreadsheet FROM users WHERE Team_Name = '$username' ";
$stmt = $conn->prepare($query);
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();

// Fetch the result and store team_name in a PHP variable
if ($row = $result->fetch_assoc()) {
    $script = $row['spreadsheet'];
} else {
    $script = "Team not found";
}

// Close the statement and connection
$stmt->close();
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Munafa</title>
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet"
    id="bootstrap-css">
  <link rel="stylesheet" href="event.css">


</head>

<body style="background-color: #0c0624;">
  <div id="my-background" style="height: 100%; width: 100%; z-index: -100; position: fixed; filter: opacity(0.35);">
  </div>
  <div class="logo" style="top: 1%;right: 1%;"><a href="./main.html"><img src="./images/navbarAndFooter/PSF24 White.png"
        alt=""></a>
  </div>
  </div>
  <div class="container register">
    <div class="row">
      <div class="col-md-12">
        <div class="tab-pane fade show active text-align form-new" id="home" role="tabpanel" aria-labelledby="home-tab">
          <h3 class="register-heading">Update Details</h3>
          <div class="row register-form">
            <div class="col-md-12">
              <form method="post"  autocomplete="off" name="google-sheet">
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-outline">
                      <input type="text" name="Name" id="form3Example1" class="form-control" placeholder="Team Name *"
                        value="" required="" />
                      <label class="form-label" for="form3Example1" style="margin-left: 0px;"></label>
                      <div class="form-notch">
                        <div class="form-notch-leading" style="width: 9px;"></div>
                        <div class="form-notch-middle" style="width: 68.8px;"></div>
                        <div class="form-notch-trailing"></div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-outline">
                      <input type="text" name="Phone" id="form3Example2" class="form-control"
                        placeholder="Contact number *" value="" required="" />
                      <label class="form-label" for="form3Example2" style="margin-left: 0px;"></label>
                      <div class="form-notch">
                        <div class="form-notch-leading" style="width: 9px;"></div>
                        <div class="form-notch-middle" style="width: 68px;"></div>
                        <div class="form-notch-trailing"></div>
                      </div>
                    </div>
                  </div>
                </div>

                <!-- <div class="form-group">
                  <input type="text" name="Email" class="form-control" placeholder="Email Address *" value=""
                    required="" />
                </div> -->
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-outline">
                      <input type="text" name="Amounr" id="form3Example1" class="form-control"
                        placeholder="Current Amount *" value="" required="" />
                      <label class="form-label" for="form3Example1" style="margin-left: 0px;"></label>
                      <div class="form-notch">
                        <div class="form-notch-leading" style="width: 9px;"></div>
                        <div class="form-notch-middle" style="width: 68.8px;"></div>
                        <div class="form-notch-trailing"></div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-outline">
                      <input type="text" name="Profit" id="form3Example2" class="form-control"
                        placeholder="Net Profit *" value="" required="" />
                      <label class="form-label" for="form3Example2" style="margin-left: 0px;"></label>
                      <div class="form-notch">
                        <div class="form-notch-leading" style="width: 9px;"></div>
                        <div class="form-notch-middle" style="width: 68px;"></div>
                        <div class="form-notch-trailing"></div>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="form-group">
                  <input type="number" name="Transaction ID" class="form-control" placeholder="Transaction ID "
                    value="" />
                </div>
                <div>
                  <form method="post" enctype="multipart/form-data">
                    <label for="file">File</label>
                    <input id="file" name="file" type="file" />
                    <button>Upload</button>
                  </form>
                </div>
                <div class="form-group">
                  <input type="submit" name="submit" class="btnSubmit btn-block" value="Submit" />
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script>
    const scriptURL =  <?php echo json_encode($phpVariable); ?>;
    // const scriptURL = 'https://script.google.com/macros/s/AKfycbxGTtcgwbt6bus9YTZE18r0cqeOtXFx_Mg1-o8rTbLKf78Z7ZK1sG2RI6_NcAH_Z1SxOA/exec'
    // var jsVariable =;

    const form = document.forms['google-sheet']

    form.addEventListener('submit', e => {
      e.preventDefault()
      fetch(scriptURL, { method: 'POST', body: new FormData(form) })
        .then(response => alert("Your data is upgraded !"))
        .catch(error => console.error('Error!', error.message))
    })
  </script>

  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/three.js/r134/three.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/vanta/dist/vanta.waves.min.js"></script>
  <script src="./js/play.js"></script>

  <script>
    VANTA.WAVES({
      el: "#my-background",
      mouseControls: true,
      touchControls: true,
      gyroControls: false,
      minHeight: 200.00,
      minWidth: 200.00,
      scale: 1.00,
      scaleMobile: 1.00
    })
  </script>
</body>

</html>