<?php
include 'connect.php';
// session_start();
if(isset($_POST['submitback'])){
    header("Location:home.php");
    }
?>

<?php
 use PHPMailer\PHPMailer\PHPMailer;
 use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
?>
<?php
if(isset($_POST['submit_m'])){
    $rmdays="SELECT * FROM `remdays`";
    $rmc = mysqli_query($conn, $rmdays);
    // if($rmc){
    //     echo "successful";
    // }
    // else{
    //     echo "No";
    // }
    while($rows=mysqli_fetch_assoc($rmc)){
        $chname=$rows['childname'];
        $email=$rows['email'];
        $rpcg=$rows['PCG'];
        $rpen=$rows['Pentavalent(Dose_1)'];
        $rpenn=$rows['Pentavalent(Dose_2)'];
        $rpennn=$rows['Pentavalent(Dose_3)'];
        $rpcv=$rows['PCV(Dose_1)'];
        $rpcvv=$rows['PCV(Dose_2)'];
        $rpcvvv=$rows['PCV(Dose_3)'];
        $rmr=$rows['MR'];
        $rmeas=$rows['Measles'];
        if($rpen==3||$rpcg==3||$rpenn==3||$rpennn==3||$rpcvv==3||$rpcv==3||$rpcvvv==3||$rmr==3||$rmeas==3){
           

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'sanzida308@gmail.com';                     //SMTP username
    $mail->Password   = 'keof fxor azzm pxfw';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('sanzida308@gmail.com', 'Mailer');
    $mail->addAddress($email,'Vaccine');     //Add a recipient
    // $mail->addAddress('ellen@example.com');               //Name is optional
    // $mail->addReplyTo('info@example.com', 'Information');
    // $mail->addCC('cc@example.com');
    // $mail->addBCC('bcc@example.com');

    //Attachments
    // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
    // $mail->addAttachment('scene.jpeg', 'new.jpg');    //Optional name

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Vaccination Reminder';
    $mail->Body    = 'Hello '.$chname.', You got your vaccination day in 3 days';
    // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
        }

    }
}

?>
<?php
//  use PHPMailer\PHPMailer\PHPMailer;
//  use PHPMailer\PHPMailer\Exception;

// require 'PHPMailer/src/Exception.php';
// require 'PHPMailer/src/PHPMailer.php';
// require 'PHPMailer/src/SMTP.php';
if(isset($_POST['submit_2'])){
    $rmdays="SELECT * FROM `remdays`";
    $rmc = mysqli_query($conn, $rmdays);
    // if($rmc){
    //     echo "successful";
    // }
    // else{
    //     echo "No";
    // }
    while($rows=mysqli_fetch_assoc($rmc)){
        $chname=$rows['childname'];
        $email=$rows['email'];
        $rpcg=$rows['PCG'];
        $rpen=$rows['Pentavalent(Dose_1)'];
        $rpenn=$rows['Pentavalent(Dose_2)'];
        $rpennn=$rows['Pentavalent(Dose_3)'];
        $rpcv=$rows['PCV(Dose_1)'];
        $rpcvv=$rows['PCV(Dose_2)'];
        $rpcvvv=$rows['PCV(Dose_3)'];
        $rmr=$rows['MR'];
        $rmeas=$rows['Measles'];
        if($rpen==2||$rpcg==2||$rpenn==2||$rpennn==2||$rpcvv==2||$rpcv==2||$rpcvvv==2||$rmr==2||$rmeas==2){
           

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'sanzida308@gmail.com';                     //SMTP username
    $mail->Password   = 'keof fxor azzm pxfw';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('sanzida308@gmail.com', 'Mailer');
    $mail->addAddress($email,'Vaccine');     //Add a recipient
    // $mail->addAddress('ellen@example.com');               //Name is optional
    // $mail->addReplyTo('info@example.com', 'Information');
    // $mail->addCC('cc@example.com');
    // $mail->addBCC('bcc@example.com');

    //Attachments
    // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
    // $mail->addAttachment('scene.jpeg', 'new.jpg');    //Optional name

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Vaccination Reminder';
    $mail->Body    = 'Hello '.$chname.', You got your vaccination day in 2 days';
    // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
        }

    }
}

?>

<?php
//  use PHPMailer\PHPMailer\PHPMailer;
//  use PHPMailer\PHPMailer\Exception;

// require 'PHPMailer/src/Exception.php';
// require 'PHPMailer/src/PHPMailer.php';
// require 'PHPMailer/src/SMTP.php';
if(isset($_POST['submit_1'])){
    $rmdays="SELECT * FROM `remdays`";
    $rmc = mysqli_query($conn, $rmdays);
    // if($rmc){
    //     echo "successful";
    // }
    // else{
    //     echo "No";
    // }
    while($rows=mysqli_fetch_assoc($rmc)){
        $chname=$rows['childname'];
        $email=$rows['email'];
        $rpcg=$rows['PCG'];
        $rpen=$rows['Pentavalent(Dose_1)'];
        $rpenn=$rows['Pentavalent(Dose_2)'];
        $rpennn=$rows['Pentavalent(Dose_3)'];
        $rpcv=$rows['PCV(Dose_1)'];
        $rpcvv=$rows['PCV(Dose_2)'];
        $rpcvvv=$rows['PCV(Dose_3)'];
        $rmr=$rows['MR'];
        $rmeas=$rows['Measles'];
        if($rpen==1||$rpcg==1||$rpenn==1||$rpennn==1||$rpcvv==1||$rpcv==1||$rpcvvv==1||$rmr==1||$rmeas==1){
           

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'sanzida308@gmail.com';                     //SMTP username
    $mail->Password   = 'keof fxor azzm pxfw';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('sanzida308@gmail.com', 'Mailer');
    $mail->addAddress($email,'Vaccine');     //Add a recipient
    // $mail->addAddress('ellen@example.com');               //Name is optional
    // $mail->addReplyTo('info@example.com', 'Information');
    // $mail->addCC('cc@example.com');
    // $mail->addBCC('bcc@example.com');

    //Attachments
    // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
    // $mail->addAttachment('scene.jpeg', 'new.jpg');    //Optional name

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Vaccination Reminder';
    $mail->Body    = 'Hello '.$chname.', You got your vaccination day in 1 day';
    // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
        }

    }
}

?>


<html>
<head>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4; /* Light gray background */
            color: #333; /* Dark text color */
            margin: 0;
            padding: 0;
        }

        h2 {
            text-align: center;
            /* background-color: #FF6544;  */
            color: red; /* White text color */
            padding: 10px;
            margin-bottom: 20px;
        }

        table {
            border-collapse: collapse;
            width: 80%;
            margin: 20px auto;
        }

        table, th, td {
            border: 1px solid #ddd; /* Light gray border */
        }

        th, td {
            padding: 15px;
            text-align: center;
        }

        th {
            background-color: #FF6544; /* Blue header background for table header */
            color: #fff; /* White text color for table header */
        }

        .btn-container {
            text-align: center;
            margin-top: 20px;
        }

        .btn-reminder {
            width: 200px;
            margin-bottom: 20px;
            font-size: 16px;
            font-weight: bold;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .btn-reminder-3 {
            background-color: FF6544; /* Green color */
        color: #fff;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        transition: background-color 0.3s ease;
        }
        .btn-reminder-3:hover {
        background-color: #218838; /* Darker green on hover */
    }
    .btn-reminder-2 {
            background-color: FF6544; /* Green color */
        color: #fff;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        transition: background-color 0.3s ease;
        }
        .btn-reminder-2:hover {
        background-color: #218838; /* Darker green on hover */
    }
    .btn-reminder-1 {
            background-color: FF6544; /* Green color */
        color: #fff;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        transition: background-color 0.3s ease;
        }
        .btn-reminder-1:hover {
        background-color: #218838; /* Darker green on hover */
    }
    .btn-danger {
        align:Center;
        background-color: #17a2b8; /* Green color */
        color: #fff;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        transition: background-color 0.3s ease;
        padding: 8px 20px;
        }
        .btn-danger:hover {
            background-color: purple; /* Darker green on hover */
    }
    .btn-success {
        background-color: #17a2b8; /* Green color */
        color: #fff;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        transition: background-color 0.3s ease;
        padding: 8px 20px;
        }
        .btn-success:hover {
            background-color: purple; /* Darker green on hover */
    }
     /* .btn-container {
            text-align: center;
            margin-top: 20px;
        } */

        /*.btn-container button {
            margin-right: 10px; /* Adjust the margin as needed */
        } */
       
    </style>
    <title>Profile</title>
</head>

<body>

<?php
$query = "SELECT * FROM remdays";
$data = mysqli_query($conn, $query);
$total = mysqli_num_rows($data);

if ($total != 0) {
    ?>
    <h2 align="center"> Displaying All Records </h2>
    <center>
        <table border="1" cellspacing="11" width="100%">
            <tr>
                <th width="10%">Email</th>
                <th width="10%">Child Name</th>
                <th width="10%">PCG</th>
                <th width="10%">Pentavalent(Dose_1)</th>
                <th width="10%">Pentavalent(Dose_2)</th>
                <th width="5%">Pentavalent(Dose_3)</th>
                <th width="12%">PCV(Dose_1)</th>
                <th width="12%">PCV(Dose_2)</th>
                <th width="12%">PCV(Dose_3)</th>
                <th width="12%">MR</th>
                <th width="12%">Measles</th>
            </tr>

            <?php
            while ($result = mysqli_fetch_assoc($data)) {
                ?>
                <tr>
                    <td><?php echo $result['email']; ?></td>
                    <td><?php echo $result['childname']; ?></td>
                    <td><?php echo $result['PCG']; ?></td>
                    <td><?php echo $result['Pentavalent(Dose_1)']; ?></td>
                    <td><?php echo $result['Pentavalent(Dose_2)']; ?></td>
                    <td><?php echo $result['Pentavalent(Dose_3)']; ?></td>
                    <td><?php echo $result['PCV(Dose_1)']; ?></td>
                    <td><?php echo $result['PCV(Dose_2)']; ?></td>
                    <td><?php echo $result['PCV(Dose_3)']; ?></td>
                    <td><?php echo $result['MR']; ?></td>
                    <td><?php echo $result['Measles']; ?></td>
                    <!-- <td>
                        <?php
                        // Start a new session for each child
                        // session_start();
                        
                        // Set a session variable to store the child's name
                        // $_SESSION['child_name'] = $result['name'];
                        ?>
                        <a href="vaccinecard.php" class="btn btn-primary">View</a>
                    </td> -->
                </tr>
                <?php
            }
            ?>
        </table>
    </center>
    <?php
} else {
    echo "No records found";
}
?>
<form style="padding-top:20px;padding-left:35%;" method="post">
<button class="btn btn-default btn-reminder btn-reminder-3" name="submit_m" type="submit">Send Email for 3 Days Reminder</button>   
<form style="padding-top:20px;padding-left:45%;" method="post">
<button class="btn btn-default btn-reminder btn-reminder-2" name="submit_2" type="submit">Send Email for 2 Days Reminder</button> 
<form style="padding-top:20px;padding-left:45%;" method="post">
<button class="btn btn-default btn-reminder btn-reminder-1" name="submit_1" type="submit">Send Email for 1 Day Reminder</button></br>
<div class="btn-container">
    <form style="display:inline-block;padding-top:20px;padding-left:55%;" action="home.php" method="post">
        <button class="btn btn-danger" type="submit" name='submitback'>Home</button>
    </form>
    <form style="display:inline-block;padding-top:20px;padding-right:50%;" action="admin.php" method="post">
        <button class="btn btn-success" type="submit" name='submithome'>Back</button>
    </form>
</div>
</body>
</html>
