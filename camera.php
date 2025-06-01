<?php
include 'connect.php';

if (isset($_GET['vaccine'])) {
    $vaccine = $_GET['vaccine'];

}

if (isset($_POST['text'])) {
    $text = $_POST['text'];

    // Use backticks to quote the column name
    $ssql = "UPDATE children SET `$vaccine` = 'Completed' WHERE id='$text'";
    $qquery = mysqli_query($conn, $ssql);

    if ($qquery) {
        echo 'Vaccine QR Has Been Scanned';
    } else {
        echo 'Error updating database: ' . mysqli_error($conn);
    }
}
if(isset($_POST['submitt'])){
    header("Location:cameratest.php");
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <script type="text/javascript" src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js"></script>
    <style>
    button {
            width: 20%;
            padding: 10px;
            background-color: #17a2b8; /* Yellow button color */
            color: #fff;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }
    </style>
    <title>Scanner</title>
</head>

<body>
    <video width="60%" id="MyCameraOpen"></video>
    <form action="" method="POST" id="qrForm">
        <input type="text" name="text" id="text">
    </form>

    <script>
        var video = document.getElementById("MyCameraOpen");
        var text = document.getElementById("text");

        var scanner = new Instascan.Scanner({
            video: video
        });

        Instascan.Camera.getCameras()
            .then(function (Our_Camera) {
                if (Our_Camera.length > 0) {
                    scanner.start(Our_Camera[0]);
                } else {
                    alert("Camera not found");
                }
            })
            .catch(function (error) {
                console.log("Error!! Please try again");
            });

        scanner.addListener('scan', function (input_value) {
            text.value = input_value;
            document.getElementById('qrForm').submit();
        });
    </script><p>
    <form action="" method="post"><button type="submit" name="submitt">Back</button></form><p>
    <form action="home.php" method="post"><button type="submit" name="submittt">Home</button></form>
</body>


</html>
