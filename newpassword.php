<?php
include 'connect.php';
// session_start();
?>
<?php
$token=$_GET["token"];
$token_hash=hash("sha256",$token);

$sql="select * from guardian where reset_token_hash=?";

$stmt=$conn->prepare($sql);
$stmt->bind_param("s", $token_hash);
$stmt->execute();

$result=$stmt->get_result();
$user=$result->fetch_assoc();
if($user==null){
    die("token not found");
}

if(strtotime($user["reset_token_expires_at"])<=time()){
    die("token has expired");
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/login.css">

    <title>Reset Password</title>
</head>
<body>
    <div class="container">
        <h2>রিসেট পাসওয়ার্ড</h2>
        <form action="processpasswordreset.php" method="post">
            <input type="hidden" name="token" value="<?=htmlspecialchars($token)?>">
            <label for="password">নতুন পাসওয়ার্ড</label>
            <input type="password" id="password" name="password" required>
            <label for="password">পাসওয়ার্ড নিশ্চিতকরণ</label>
            <input type="password" id="confirm_password" name="confirm_password" required>
            <button type="submit" name='submit'>রিসেট</button>
        </form>

    </div>
</body>
</html>

