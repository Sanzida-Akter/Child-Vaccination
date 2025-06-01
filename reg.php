<?php
include 'connect.php';
// session_start();
?>

<?php
if(isset($_POST['submit'])){
$email = $_POST['email'];
$name = $_POST['name'];
$phone=$_POST['phone'];
$password=$_POST['password'];
$childrenno=$_POST['children'];


$sql="INSERT INTO `guardian` (`id`, `email`, `name`, `phone`, `password`, `childrenno`) VALUES (' ','$email', '$name', '$phone', '$password','$childrenno')";
$result = mysqli_query($conn,$sql);


if($result){
     header("Location:login.php");
    ?>
   
        <?php
}
}
?>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    include('../phpqrcode/qrlib.php');
    // Iterate through the posted data
    for ($i = 1; $i <= $_POST['children']; $i++) {
        $childName = $_POST['child-name' . $i];
        $childdob = $_POST['dob' . $i];
        $childAge = $_POST['age' . $i];
        $childBloodGroup = $_POST['child-blood-group' . $i];
        $childGender = $_POST['child-gender' . $i];
        $code=rand(100000,999999);
        
        // how to save PNG codes to server
        
        $tempDir = "picture/";
        
        $codeContents = $code;
        
        // we need to generate filename somehow, 
        // with md5 or with database ID used to obtains $codeContents...
        $fileName = $childName.'.png';
        
        $pngAbsoluteFilePath = $tempDir.$fileName;
        $urlRelativeFilePath = $tempDir.$fileName;
        
        // generating
        if (!file_exists($pngAbsoluteFilePath)) {
            QRcode::png($codeContents, $pngAbsoluteFilePath);
            // echo 'File generated!';
            // echo '<hr />';
        } else {
            // echo 'File already generated! We can use this cached file to speed up site on common codes!';
            // echo '<hr />';
        }
        
        // echo 'Server PNG File: '.$pngAbsoluteFilePath;
        // echo '<hr />';
        
        // // displaying
        // echo '<img src="'.$urlRelativeFilePath.'" />';
        

        // Insert the data into the database (assuming you have a table named 'children')
        $sqql = "INSERT INTO children (id,email, name, DOB, age, bloodgroup, gender,qr) VALUES (?,?, ?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sqql);
        $stmt->bind_param("ssssssss", $code,$email, $childName, $childdob, $childAge, $childBloodGroup, $childGender,$urlRelativeFilePath);
        $stmt->execute();
        $remd = "INSERT INTO `remdays` (`id`,`email`, `childname`,`qr`,`PCG`, `Pentavalent(Dose_1)`, `Pentavalent(Dose_2)`, `Pentavalent(Dose_3)`, `PCV(Dose_1)`, `PCV(Dose_2)`, `PCV(Dose_3)`, `MR`, `Measles`) 
        VALUES ('$code','$email', '$childName','$urlRelativeFilePath',1 - $childAge, 6 * 7 - $childAge, 10 * 7 - $childAge, 14 * 7 - $childAge, 6 * 7 - $childAge, 10 * 7 - $childAge, 14 * 7 - $childAge, 9 * 30 - $childAge, 15 * 30 - $childAge)";

$reesult = mysqli_query($conn, $remd);

if (!$result) {
   // Handle the error, such as printing the error message
   echo "Error: " . mysqli_error($conn);
}

    }

    // Close the database connection
    $conn->close();
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Page</title>
    <link rel="stylesheet" type="text/css" href="css/reg.css">
</head>
<body>
   
    <div class="container">
        <form action=" " method="post">
            <h2>রেজিস্টার</h2>
            <label for="name">পুরো নাম</label>
            <input type="text" id="name" name="name" required>

            <label for="email">ইমেইল</label>
            <input type="email" id="email" name="email" required>

            <label for="phone">ফোন নাম্বার</label>
            <input type="tel" id="phone" name="phone" required>

            <label for="password">পাসওয়ার্ড</label>
            <input type="password" id="password" name="password" required>

            <label for="confirm-password">পাসওয়ার্ড নিশ্চিতকরণ</label>
            <input type="password" id="confirm-password" name="confirm-password" required>

            <label for="children">শিশু সংখ্যা</label>
            <input type="number" id="children" name="children" min="0" max="3" required>

            <div class="child-info">
                <h3>শিশুর তথ্য</h3>
                <div id="children-info-container">
                    <!-- Child information fields will be dynamically added here -->
                 </div>
            </div>

            <button type="submit" name='submit'>রেজিস্টার</button>
            <div class="or-divider">
                <span>OR</span>
            </div>
            <button class="social-button">ফেসবুকের সহায়তায় সাইন আপ</button>
            <button class="social-button">গুগলের সহায়তায় সাইন আপ</button>
        </form>
        <p class="have-account"> অ্যাকাউন্ট আছে? <a href="login.php">সাইন ইন</a></p>
    </div> 
    <script>
        document.getElementById('children').addEventListener('change', function() {
            const childrenInfoContainer = document.getElementById('children-info-container');
            childrenInfoContainer.innerHTML = ''; // Clear previous child info fields

            const numChildren = parseInt(this.value, 10);
            for (let i = 1; i <= numChildren; i++) {
                const childDiv = document.createElement('div');
                childDiv.className = 'child-details';

                childDiv.innerHTML = `
                    <h4>শিশু ${i} তথ্য</h4>
                    <label for="child-name${i}">শিশুর নাম</label>
                    <input type="text" id="child-name${i}" name="child-name${i}" required>
<p>
                    <label for="child-dob${i}">জন্ম তারিখ</label>
                    <input type="date" id="dob${i}" name="dob${i}" onchange="calculateAge(${i})" required></p>

                    <label for="age${i}">বয়স(দিন)</label>
                    <input type="text" readonly id="age${i}"  name="age${i}"  required>
<p>
                    <label for="child-blood-group${i}">রক্তের গ্রুপ</label>
                    <input type="text" id="child-blood-group${i}" name="child-blood-group${i}" required></p>
<p>
                    <label for="child-gender${i}">লিঙ্গ</label>
                    <select id="child-gender${i}" name="child-gender${i}" required>
                        <option value="">নির্বাচন করুন </option>
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                        <option value="other">Other</option>
                    </select></p>
                `;

                childrenInfoContainer.appendChild(childDiv);
            }
        });
        function calculateAge(childIndex) {
                const dobInput = document.getElementById(`dob${childIndex}`);
                const ageInput = document.getElementById(`age${childIndex}`);

                const dob = new Date(dobInput.value);
                const currentDate = new Date();

                // Calculate the difference in milliseconds
                const ageInMilliseconds = currentDate - dob;

                // Convert milliseconds to days
                const ageInDays = Math.floor(ageInMilliseconds / (1000 * 60 * 60 * 24))+1;

                // Update the age input field
                ageInput.value = ageInDays;
            }
    </script>
    </body>
    </html>
    