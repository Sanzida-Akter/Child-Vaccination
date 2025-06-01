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


$sql="INSERT INTO `guardian` (`id`, `email`, `name`, `phone`, `password`, `childrenno.`) VALUES (' ','$email', '$name', '$phone', '$password','$childrenno')";
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
        $fileName = $code.'.png';
        
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
        <form>
            <h2>Register</h2>
            <label for="name">Full Name</label>
            <input type="text" id="name" name="name" required>

            <label for="email">Email</label>
            <input type="email" id="email" name="email" required>

            <label for="phone">Phone Number</label>
            <input type="tel" id="phone" name="phone" required>

            <label for="password">Password</label>
            <input type="password" id="password" name="password" required>

            <label for="confirm-password">Confirm Password</label>
            <input type="password" id="confirm-password" name="confirm-password" required>

            <label for="children">Number of Children</label>
            <input type="number" id="children" name="children" min="0" max="3" required>

            <div class="child-info">
                <h3>Children Information</h3>
                <div id="children-info-container">
                    <!-- Child information fields will be dynamically added here -->
                </div>
            </div>

            <button type="submit">Register</button>
            <div class="or-divider">
                <span>OR</span>
            </div>
            <button class="social-button">Sign Up with Facebook</button>
            <button class="social-button">Sign Up with Google</button>
        </form>
        <p class="have-account">Already have an account? <a href="#">Sign in</a></p>
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
                    <h4>Child ${i} Information</h4>
                    <label for="child-name${i}">Child's Name</label>
                    <input type="text" id="child-name${i}" name="child-name${i}" required>
<p>
                    <label for="child-age${i}">Child's Age</label>
                    <input type="number" id="child-age${i}" name="child-age${i}" min="0" required></p>
<p>
                    <label for="child-blood-group${i}"> Blood-Group</label>
                    <input type="text" id="child-blood-group${i}" name="child-blood-group${i}" required></p>
                    <p>

                    <label for="child-gender${i}">Gender</label>
                    <select id="child-gender${i}" name="child-gender${i}" required></p>
                        <option value="">Select</option>
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                        <option value="other">Other</option>
                    </select>
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
    