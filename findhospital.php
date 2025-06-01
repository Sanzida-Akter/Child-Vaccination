<?php
include 'connect.php';

if(isset($_POST['submit'])){
    $place = $_POST['place'];

    $sql="select * from hospital where place = '$place'";

    $result = mysqli_query($conn,$sql);

    if ($result) {
        $row = mysqli_fetch_array($result);
    } else {
        // Handle the query error, you might want to log or display an error message
        echo "Error executing the query: " . mysqli_error($conn);
    }
}
if(isset($_POST['submitt'])){
    header("Location:home.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f8f8;
            color: #333;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 600px;
            margin: 50px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        /* h2 {
            color: red;
        } */
        .hospital-card {
        border: 1px solid #ccc;
        border-radius: 8px;
        padding: 16px;
        margin-bottom: 20px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .hospital-name {
        color: red;
        margin-bottom: 12px;
    }

    .hospital-info {
        /* Add styling for hospital information as needed */
    }

        label {
            display: block;
            margin-bottom: 8px;
        }

        select, button {
            padding: 10px;
            margin-bottom: 16px;
        }

        button {
            background-color: red;
            color: #fff;
            border: none;
            cursor: pointer;
        }

        button:hover {
            background-color: darkred;
        }

        div {
            margin-top: 20px;
        }
        iframe {
        width: 100%;
        height: 600px;
        margin: 0;
        padding: 0;
    }
    </style>
    <title>Hospital</title>
</head>
<body>
    <div class="container">
        <h2>Find Child Vaccination Center Near You</h2>
        <form action="" method="post">
            <label for="place">Place:</label>
            <select id="place" name="place" required>
                <option value="Dhaka">Dhaka</option>
                <option value="Barishal">Barishal</option>
                <option value="Chattogram">Chattogram</option>
            </select>
            <p>
                <button type="submit" name='submit'>Find</button>
                <button type="submit" name='submitt'>Back</button>
            </p>
        </form>
    </div>

    <?php
    if (isset($row)) {
        echo '<div class="hospital-card">';
        echo '<h2 class="hospital-name">'. $row['hospital1'] .'</h2>';
        echo '<div class="hospital-info">';
        // echo '<p><strong></strong> ' . $row['hospital1'] . '</p>';
      
        echo '</div>';
        echo '</div>';
        echo '<div class="hospital-card">';
        echo '<h2 class="hospital-name">'. $row['hospital2'] . '</h2>';
        echo '<div class="hospital-info">';
        // echo '<p><strong></strong> ' . $row['hospital2'] . '</p>';
       
        echo '</div>';
        echo '</div>';
        echo '<div class="hospital-card">';
        echo '<h2 class="hospital-name">'. $row['hospital3'] . '</h2>';
        echo '<div class="hospital-info">';
        // echo '<p><strong></strong> ' . $row['hospital3'] . '</p>';
       
        echo '</div>';
        echo '</div>';
        echo '<div class="hospital-card">';
        echo '<h2 class="hospital-name">'. $row['hospital4'] .'</h2>';
        echo '<div class="hospital-info">';
        // echo '<p><strong></strong> ' . $row['hospital4'] . '</p>';
       
        echo '</div>';
        echo '</div>';
        echo '<div class="hospital-card">';
        echo '<h2 class="hospital-name">'. $row['hospital5'] .'</h2>';
        echo '<div class="hospital-info">';
        // echo '<p><strong></strong> ' . $row['hospital5'] . '</p>';
      
        echo '</div>';
        echo '</div>';
        echo '<div class="hospital-card">';
        echo '<h2 class="hospital-name">'. $row['hospital6'] . '</h2>';
        echo '<div class="hospital-info">';
        // echo '<p><strong></strong> ' . $row['hospital6'] . '</p>';
     
        echo '</div>';
        echo '</div>';
        echo '<div class="hospital-card">';
        echo '<h2 class="hospital-name">'. $row['hospital7'] . '</h2>';
        echo '<div class="hospital-info">';
        // echo '<p><strong></strong> ' . $row['hospital7'] . '</p>';
      
        echo '</div>';
        echo '</div>';
        echo '<div class="hospital-card">';
        echo '<h2 class="hospital-name">'. $row['hospital8'] .'</h2>';
        echo '<div class="hospital-info">';
        // echo '<p><strong></strong> ' . $row['hospital8'] . '</p>';
       
        echo '</div>';
        echo '</div>';
        echo '<div class="hospital-card">';
        echo '<h2 class="hospital-name">'. $row['hospital9'] .'</h2>';
        echo '<div class="hospital-info">';
        // echo '<p><strong></strong> ' . $row['hospital9'] . '</p>';
        
        echo '</div>';
        echo '</div>';
        echo '<div class="hospital-card">';
        echo '<h2 class="hospital-name">'. $row['hospital10'] . '</h2>';
        echo '<div class="hospital-info">';
        // echo '<p><strong></strong> ' . $row['hospital10'] . '</p>';
        echo '</div>';
        echo '</div>';

        echo '<div class="hospital-card">';
        echo '<h2 class="hospital-name"><center>Find Your Nearest Hospital Using Map</center></h2>';
        echo '<div class="hospital-info">';
      
        echo '<p><strong></strong><iframe src='.$row['map'].'width="100%" height="480"></iframe></p>';
        echo '</div>';
        echo '</div>';
    }
    ?>
</body>
</html>
