<!DOCTYPE html>
<?php
include('func1.php');
$pid='';
$ID='';
$appdate='';
$apptime='';
$fname = '';
$lname= '';
$doctor = $_SESSION['dname'];
if(isset($_GET['pid']) && isset($_GET['ID']) && ($_GET['appdate']) && isset($_GET['apptime']) && isset($_GET['fname']) && isset($_GET['lname'])) {
$pid = $_GET['pid'];
  $ID = $_GET['ID'];
  $fname = $_GET['fname'];
  $lname = $_GET['lname'];
  $appdate = $_GET['appdate'];
  $apptime = $_GET['apptime'];
}



if(isset($_POST['prescribe']) && isset($_POST['pid']) && isset($_POST['ID']) && isset($_POST['appdate']) && isset($_POST['apptime']) && isset($_POST['lname']) && isset($_POST['fname'])){
  $appdate = $_POST['appdate'];
  $apptime = $_POST['apptime'];
  $disease = $_POST['disease'];
  $allergy = $_POST['allergy'];
  $fname = $_POST['fname'];
  $lname = $_POST['lname'];
  $pid = $_POST['pid'];
  $ID = $_POST['ID'];
  $prescription = $_POST['prescription'];
  
  $query=mysqli_query($con,"insert into prestb(doctor,pid,ID,fname,lname,appdate,apptime,disease,allergy,prescription) values ('$doctor','$pid','$ID','$fname','$lname','$appdate','$apptime','$disease','$allergy','$prescription')");
    if($query)
    {
      echo "<script>alert('Prescribed successfully!');</script>";
    }
    else{
      echo "<script>alert('Unable to process your request. Try again!');</script>";
    }
  // else{
  //   echo "<script>alert('GET is not working!');</script>";
  // }initial
  // enga error?
}

?>

<html lang="en">
  <head>


    <!-- Required meta tags -->
    <meta charset="utf-8">
    <link rel="shortcut icon" type="image/x-icon" href="images/favicon.png" />
    <meta name="viewport" content="width=device-width, -scale=1, shrink-to-fit=no">
    <link rel="stylesheet" type="text/css" href="font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="style.css">
    <!-- Bootstrap CSS -->
    
        <link rel="stylesheet" href="vendor/fontawesome/css/font-awesome.min.css">

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    
    <link href="https://fonts.googleapis.com/css?family=IBM+Plex+Sans&display=swap" rel="stylesheet">
      <nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top">
  <a class="navbar-brand" href="#"><i class="fa fa-user-plus" aria-hidden="true"></i> DrugSync </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>


<div class="collapse navbar-collapse" id="navbarSupportedContent">
     <ul class="navbar-nav mr-auto">
       <li class="nav-item">
        <a class="nav-link" href="logout1.php"><i class="fa fa-sign-out" aria-hidden="true"></i>Logout</a>
        
      </li>
       <li class="nav-item">
       <a class="nav-link" href="doctor-panel.php"><i class="fa fa-sign-out" aria-hidden="true"></i>Back</a>
      </li>
    </ul>
  </div>
</nav>
<br><br>
</head>
  <style type="text/css">
    button:hover{cursor:pointer;}
    #inputbtn:hover{cursor:pointer;}
    
        /* Style the form container */
        #prescriptionForm {
            max-width: 1080px;
            margin: 0 auto;
            padding: 20px;
           
            border: 2px solid rgb(24, 46, 24);
            border-radius: 5px;
            font-family: Arial, sans-serif;
            background-color: white;
        }

        /* Style the headings */
        h1, h2 {
            font-size: 28px;
            margin-bottom: 20px;
            color: #92969b; /* Blue color for headings */
        }

        /* Style labels and input fields */
        label {
            display: block;
            font-weight: bold;
            margin-bottom: 10px;
        }

        input[type="text"],
        input[type="number"],
        select,
        textarea {
            width: 95%;
            padding: 15px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 18px;
        }

        /* Style the "Add Medication" button */
        #addMedication {
            background-color: #eaebec;
            color: #1a2f67;
            border: none;
            border-radius: 5px;
            padding: 15px 30px;
            cursor: pointer;
            font-size: 18px;
            margin-left: 35%;
        }

        #addMedication:hover {
            background-color: rgb(81, 79, 79);
            
        }

        /* Style the submit button */
        input[type="submit"] {
            background-color: #102611;
            color: #fff;
            border: none;
            border-radius: 5px;
            padding: 15px 30px;
            cursor: pointer;
            font-size: 18px;
            margin-left: 30%;
            
        }

        input[type="submit"]:hover {
            background-color: #132414;
        }

        /* Style the medication section */
        .medication {
            border-radius: 5px;
            padding: 15px;
            margin-top: 20px;
            margin-right: 30px;
        }

        /* Style the second prescription textarea */
        #secondPrescription {
            width: 95%;
            padding: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 18px;
        }

        /* Style the select elements */
        select {
            width: 100%;
            padding: 15px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 18px;
        }
  </style><body>
    <center><h1>Drug Prescription Form </h1></center> &nbsp <?php echo $username ?>
    <br><br>
    <form id="prescriptionForm">
      <div class="container">
        <div class="row">
      <div class="col-md-4">
        <label for="patientWeight">Weight (kg):</label></div>
        <div class="col-md-8"><input type="number" id="patientWeight"  class="form-control" required></div><br><br>
        <div class="col-md-4">
        <label for="symptoms">Symptoms:</label></div>
        <div class="col-md-8"><textarea id="symptoms" rows="2" required></textarea></div><br><br>

        <div class="col-md-4">
        <label for="tests">Tests to be Conducted:</label></div>
        <div class="col-md-8"><textarea id="tests" rows="2" required></textarea></div><br><br>

        <div class="col-md-4">
        <label for="advice">Doctor's Advice:</label></div>
        <div class="col-md-8"><textarea id="advice" rows="2" required></textarea></div><br><br>

        <div class="col-md-12">
        <label for="advice">Medications:</label></div><br><br>
              <div class="col-md-6">
                <label for="medicationName">Medication Name 1:</label>
                <input type="text" class="medicationName" required><br><br>


                <label for "consumptionTime">Consumption Time:</label>
                <select class="consumptionTime" required>
                    <option value="day">Day</option>
                    <option value="night">Night</option>
                </select><br><br>

                <label for="beforeAfterMeal">Before/After Meal:</label>
                <select class="beforeAfterMeal" required>
                    <option value="before">Before Meal</option>
                    <option value="after">After Meal</option>
                </select><br><br>

                <label for="duration">Duration (in days):</label>
                <input type="number" class="duration" required>
                </div>

                <div class="col-md-6">
                <label for="medicationName">Medication Name 2:</label>
                <input type="text" class="medicationName" required><br><br>

                <label for "consumptionTime">Consumption Time:</label>
                <select class="consumptionTime" required>
                    <option value="day">Day</option>
                    <option value="night">Night</option>
                </select><br><br>

                <label for="beforeAfterMeal">Before/After Meal:</label>
                <select class="beforeAfterMeal" required>
                    <option value="before">Before Meal</option>
                    <option value="after">After Meal</option>
                </select><br><br>

                <label for="duration">Duration (in days):</label>
                <input type="number" class="duration" required><br><br>
                </div>
            </div>
        </div>
        <div class="col-md-6"></div>
        <input type="submit" value="Submit Prescription">
        </div>
        </div>
    </form>

    <script>
        document.getElementById("addMedication").addEventListener("click", function () {
            const medicationContainer = document.getElementById("medications");
            const newMedication = document.querySelector(".medication").cloneNode(true);
            medicationContainer.appendChild(newMedication);
        });

        document.getElementById("prescriptionForm").addEventListener("submit", function (event) {
            event.preventDefault();

            // You can add JavaScript code here to process and submit the prescription data to a server.
            // For this example, let's just display an alert.
            alert("Prescription submitted successfully!");
        });
    </script>
</body>
</html>