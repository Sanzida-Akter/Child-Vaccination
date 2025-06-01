<?php
include 'connect.php';
session_start();
?>
<?php
$error="*Provide Correct Username or Password!!";
if(isset($_POST['submit'])){
$email = $_POST['email'];
$password = $_POST['password'];


$sql="select * from guardian where email = '$email' and password = '$password'";

$result = mysqli_query($conn,$sql);
$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
$count = mysqli_num_rows($result);
if($count==1){
    $email="select email from guardian where email ='$email' and password='$password'";
    $nameresult=mysqli_query($conn,$email);
    $roww=mysqli_fetch_array($nameresult);
    $_SESSION['myuser']=$roww['email'];
    header("Location:profile.php");
}
else{
    ?>
    <script type="text/javascript">
    alert("Please Provide Correct Username and Password");
    </script>
    <?php
}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/login.css">

    <title>login</title>
</head>
<body>
    <div class="container">
        <h2>লগইন</h2>
        <form action=" " method="post">
            <label for="email">ইমেল:</label>
            <input type="email" id="email" name="email" required>

            <label for="password">পাসওয়ার্ড</label>
            <input type="password" id="password" name="password" required>

            <button type="submit" name='submit'>লগইন</button>
            <!-- <form action="home.php" method="post">
            <button type="submit" name='submit1'>হোম</button>
            </form> -->
        </form>

        <div class="forgot-password">
            <a href="forgotpass.php">পাসওয়ার্ড ভুলে গেছেন?</a>
        </div>
    </div>
</body>
</html>
