<?php
include 'connect.php';
// session_start();
?>
<?php
$pass=$_POST["password"];
$token=$_POST["token"];
$token_hash=hash("sha256",$token);

$sql="select * from guardian where reset_token_hash=?";

$stmt=$conn->prepare($sql);
$stmt->bind_param("s", $token_hash);
$stmt->execute();

$result=$stmt->get_result();
$user=$result->fetch_assoc();


if($_POST["password"]!==$_POST["confirm_password"]){
    die("Passwords must match");
}
else{
    $ssql="update guardian set password='$pass',
                        reset_token_hash=NULL,
                        reset_token_expires_at=NULL
    where email='{$user['email']}'";
$reesult = mysqli_query($conn,$ssql);
    
    ?>
    <script type="text/javascript">
    alert("Your Password has been changed.You can login now");
    window.location.replace("login.php");
    </script>
    <?php
    
}

?>