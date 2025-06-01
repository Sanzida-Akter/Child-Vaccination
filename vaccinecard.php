<?php
include 'connect.php';
session_start();
?>
 <?php

$info="select * from children where name='{$_SESSION['child_name']}'";
    $inforesult=mysqli_query($conn,$info);
    $roww=mysqli_fetch_array($inforesult);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vaccination Card</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .card {
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            overflow: hidden;
            width: 800px; /* Adjust the width as needed */
            padding: 20px;
            text-align: center;
        }

        .vaccine-logo {
            width: 100px; /* Adjust the width as needed */
            height: 100px; /* Adjust the height as needed */
            border-radius: 50%;
            margin: 10px auto;
            background-color: #4CAF50;
            color: #fff;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .btn-success {
        position: absolute;
        bottom: 30px;
        right: 630px;
        padding: 8px 20px;
        background-color: #4CAF50; /* Green color */
        color: #fff;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    .btn-success:hover {
        background-color: Purple; /* Darker green on hover */
    }
    .btn-danger {
        position: absolute;
        bottom: 30px;
        right: 720px;
        padding: 8px 20px;
        background-color: #4CAF50; /* Green color */
        color: #fff;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    .btn-danger:hover {
        background-color: purple; /* Darker green on hover */
    }

        h1 {
            color: #333;
        }

        .details {
            margin-top: 20px;
        }

        p {
            margin: 8px 0;
            color: #555;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        .footer {
            margin-top: 20px;
            color: #888;
        }
        
    </style>
</head>
<body>

<div class="card">
    <div class="vaccine-logo">
        V
    </div>
    <h1>Vaccination Card</h1>
    <div class="details">
        <p><strong>Name:</strong> <?=$roww['name'];?></p>
        <p><strong>Date of Birth:</strong><?=$roww['DOB'];?></p>
        <p><strong>QR Code:</strong></p>
            <img class="qr-code-img" src="<?php echo $roww['qr']; ?>" alt="QR Code">
        
    </div>

    <h2>Vaccination History</h2>
    <table>
        <tr>
            <th>Vaccine</th>
            <th>Disease</th>
            <!-- <th>Date Given</th> -->
            <th>Dose Completion</th>
            <th>Days Remaining for Next Dose</th>
        </tr>
        <tr>
            <td>PCG</td>
            <td>Tuberculosis</td>
            <!-- <td>March 15, 2022</td> -->
            <td><?=$roww['PCG'];?></td>
            <td>
    <?php
    $days = 1 - $roww['age'];
    $days = max(0, $days); // Ensure that $days is not negative

    if ($days > 0) {
        echo $days . ' days';
    } else {
        echo 'No days remaining';
    }
    ?>
</td>

        </tr>
       
         <tr>
            <td>Pentavalent(Dose_1)</td>
            <td>Diphtheria, Pertussis, Tetanus, Hepatitis B, Haemophilus Influenza B</td>
            <!-- <td>March 15, 2022</td> -->
            <td><?=$roww['Pentavalent(Dose_1)'];?></td>
            <td>
    <?php
    $days = 6*7 - $roww['age'];
    $days = max(0, $days); // Ensure that $days is not negative

    if ($days > 0) {
        echo $days . ' days';
    } else {
        echo 'No days remaining';
    }
    ?>
</td>

        </tr>
        <tr>
            <td>Pentavalent(Dose_2)</td>
            <td>Diphtheria, Pertussis, Tetanus, Hepatitis B, Haemophilus Influenza B</td>
            <!-- <td>March 15, 2022</td> -->
            <td><?=$roww['Pentavalent(Dose_2)'];?></td>
            <td>
    <?php
    $days = 10*7 - $roww['age'];
    $days = max(0, $days); // Ensure that $days is not negative

    if ($days > 0) {
        echo $days . ' days';
    } else {
        echo 'No days remaining';
    }
    ?>
</td>

        </tr>
        <tr>
            <td>Pentavalent(Dose_3)</td>
            <td>Diphtheria, Pertussis, Tetanus, Hepatitis B, Haemophilus Influenza B</td>
            <!-- <td>March 15, 2022</td> -->
            <td><?=$roww['Pentavalent(Dose_3)'];?></td>
            <td>
    <?php
    $days = 14*7 - $roww['age'];
    $days = max(0, $days); // Ensure that $days is not negative

    if ($days > 0) {
        echo $days . ' days';
    } else {
        echo 'No days remaining';
    }
    ?>
</td>

        </tr>
        <tr>
            <td>PCV(Dose_1)</td>
            <td>Pneumococcal Pneumonia</td>
            <!-- <td>March 15, 2022</td> -->
            <td><?=$roww['PCV(Dose_1)'];?></td>
            <td>
    <?php
    $days = 6*7 - $roww['age'];
    $days = max(0, $days); // Ensure that $days is not negative

    if ($days > 0) {
        echo $days . ' days';
    } else {
        echo 'No days remaining';
    }
    ?>
</td>

        </tr>
        <tr>
            <td>PCV(Dose_2)</td>
            <td>Pneumococcal Pneumonia</td>
            <!-- <td>March 15, 2022</td> -->
            <td><?=$roww['PCV(Dose_2)'];?></td>
            <td>
    <?php
    $days = 10*7 - $roww['age'];
    $days = max(0, $days); // Ensure that $days is not negative

    if ($days > 0) {
        echo $days . ' days';
    } else {
        echo 'No days remaining';
    }
    ?>
</td>

        </tr>
        <tr>
            <td>PCV(Dose_3)</td>
            <td>Pneumococcal Pneumonia</td>
            <!-- <td>March 15, 2022</td> -->
            <td><?=$roww['PCV(Dose_3)'];?></td>
            <td>
    <?php
    $days = 14*7 - $roww['age'];
    $days = max(0, $days); // Ensure that $days is not negative

    if ($days > 0) {
        echo $days . ' days';
    } else {
        echo 'No days remaining';
    }
    ?>
</td>

        </tr>
        <!-- <tr>
            <td>OPV</td>
            <td>Poliomyelitis</td>
            <td>March 15, 2022</td>
            <td>21</td>
        </tr> -->
        <tr>
            <td>MR</td>
            <td>Measles Rubella</td>
            <!-- <td>March 15, 2022</td> -->
            <td><?=$roww['MR'];?></td>
            <td>
    <?php
    $days = 9*30 - $roww['age'];
    $days = max(0, $days); // Ensure that $days is not negative

    if ($days > 0) {
        echo $days . ' days';
    } else {
        echo 'No days remaining';
    }
    ?>
</td>
        </tr>
        <tr>
            <td>Measles</td>
            <td>Measles</td>
            <!-- <td>March 15, 2022</td> -->
            <td><?=$roww['Measles'];?></td>
            <td>
    <?php
    $days = 15*30 - $roww['age'];
    $days = max(0, $days); // Ensure that $days is not negative

    if ($days > 0) {
        echo $days . ' days';
    } else {
        echo 'No days remaining';
    }
    ?>
</td>
        </tr>
        <!-- Add more rows as needed -->
    </table>

    <div class="footer">
        <p>For official use only</p>
    </div>
    <div style="display: flex; justify-content: flex-end; margin-top: 10px;">
    <form action="profile.php" method="post">
        <button class="btn btn-success" type="submit" name='submit1'>Back</button></form>
        <form action="home.php" method="post">
        <button class="btn btn-danger" type="submit" name='submit2'>Home</button></form>
    </div>
</div>
 


</body>
</html>













