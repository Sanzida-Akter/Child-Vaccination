<?php
include 'connect.php';
session_start();
?>
<?php
if(isset($_POST['submit'])){
    header("Location:vaccinecard.php");
}
?>
<html>
<head>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f8f8;
            color: #333;
            margin: 0;
            padding: 0;
        }

        .container {
            width: 80%; 
            margin: 50px auto;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            background-color: #fff;
            border-radius: 8px;
        }

        h2 {
            text-align: center;
            background-color: #17a2b8;
            color: #fff;
            padding: 10px;
            border-radius: 8px;
        }

        .child-card {
            border: 1px solid #ddd;
            padding: 15px;
            margin-bottom: 20px;
            border-radius: 8px;
            width: 50%; /* Adjust the width as needed */
            margin: 0 auto; /* Center the card */
            position: relative; /* Enable absolute positioning for child elements */
        }

        
    .btn-view {
        position: absolute;
        bottom: 10px;
        right: 10px;
        padding: 10px 20px;
        background-color: red; /* Green color */
        color: #fff;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    .btn-view:hover {
        background-color: #218838; /* Darker green on hover */
    }
    .btn-success {
        position: absolute;
        bottom: 10px;
        left: 10px;
        padding: 10px 20px;
        background-color: #17a2b8; /* Green color */
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
        bottom: 10px;
        left: 100px;
        padding: 10px 20px;
        background-color: #17a2b8; /* Green color */
        color: #fff;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    .btn-danger:hover {
        background-color: purple; /* Darker green on hover */
    }
    </style>
    <title>Profile</title>
</head>

<body>
    <div class="container">
        <?php
        $query = "SELECT * FROM children where email='{$_SESSION['myuser']}'";
        $data = mysqli_query($conn, $query);
        $total = mysqli_num_rows($data);

        if ($total != 0) {
        ?>
        <h2>Your Child Information</h2>

        <?php
            while ($result = mysqli_fetch_assoc($data)) {
        ?>
        <div class="child-card">
            <p><strong>Email:</strong> <?php echo $result['email']; ?></p>
            <p><strong>Name:</strong> <?php echo $result['name']; ?></p>
            <p><strong>Date of Birth:</strong> <?php echo $result['DOB']; ?></p>
            <p><strong>Age:</strong> <?php echo $result['age']; ?>days</p>
            <p><strong>Blood Group:</strong> <?php echo $result['bloodgroup']; ?></p>
            <p><strong>Gender:</strong> <?php echo $result['gender']; ?></p>
            <p><strong>QR Code:</strong></p>
            <img class="qr-code-img" src="<?php echo $result['qr']; ?>" alt="QR Code">
            <?php
                $_SESSION['child_name'] = $result['name'];
            ?>

            <form action="vaccinecard.php" method="post">
            <button class="btn btn-primary btn-view" type="submit" name='submit'>View Card</button></form>
           <div style="margin-top: 30px;">
           <form action="login.php" method="post">
        <button class="btn btn-success" type="submit" name='submit1'>Back</button></form>
        <form action="home.php" method="post">
        <button class="btn btn-danger" type="submit" name='submit2'>Home</button></form>
    </div>
        
        </div>
        
        
        <?php
            }
        ?>
        <?php
        } else {
            echo "No records found";
        }
        ?>
        
    </div>
</body>
</html>
