<!-- <?php
if(isset($_POST['submitt'])){
    header("Location:home.php");
}
?> -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vaccine Selection</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 300px;
            margin: 0;
        }

        .card {
            background-color: #e74c3c; /* Red theme color */
            color: #fff;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 500px;
           
            text-align: center;
        }

        h2 {
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 10px;
        }

        select {
            width: calc(100% - 20px);
            padding: 8px;
            margin-bottom: 20px;
            border: none;
            border-radius: 4px;
        }

        button {
            width: 50%;
            padding: 10px;
            background-color: #ffc107; /* Yellow button color */
            color: #fff;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div class="card">
        <h2>Select Vaccine</h2>
        
        <form action="camera.php" method="get">
            <label for="vaccine">Choose a vaccine:</label>
            <select id="vaccine" name="vaccine">
                <option value="PCG">PCG</option>
                <option value="Pentavalent(Dose_1)">Pentavalent(Dose_1)</option>
                <option value="Pentavalent(Dose_2)">Pentavalent(Dose_2)</option>
                <option value="Pentavalent(Dose_3)">Pentavalent(Dose_3)</option>
                <option value="PCV(Dose_1)">PCV(Dose_1)</option>
                <option value="PCV(Dose_2)">PCV(Dose_2)</option>
                <option value="PCV(Dose_3)">PCV(Dose_3)</option>
                <option value="MR">MR</option>
                <option value="Measles">Measles</option>
            </select>

            <button type="submit">Choose</button>
        </form ><p>
        <form action="home.php" method="post"><button type="submit" name="submitt">Back</button></form>
    </div>
</body>
</html>

