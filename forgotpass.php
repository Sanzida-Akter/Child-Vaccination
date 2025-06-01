
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/login.css">

    <title>Forgot Password</title>
</head>
<body>
    <div class="container">
        <h2>পাসওয়ার্ড ভুলে গেছেন?</h2>
        <form action="sendpasswordreset.php" method="post">
            <label for="email">ইমেইল:</label>
            <input type="email" id="email" name="email" required>

           

            <button type="submit" name='submit'>রিসেট</button>
        </form>

    </div>
</body>
</html>



