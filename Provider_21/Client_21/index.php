<!DOCTYPE html>
<html>
<h2>
Client Index
<br /><br />
<a href="../Testers/index.php">
Head to the tester</a>
<br /><br />
</h2>
</html>
<!DOCTYPE html>
<html>
<head>
    <title>Add Member</title>
 
    <style type="text/css">
        fieldset {
            margin: auto;
            margin-top: 100px;
            width: 50%;
        }
 
        table tr th {
            padding-top: 20px;
        }
    </style>
 
</head>
<body>
 
<fieldset>
    <legend>Add Farm</legend>
 
    <form action="../API_21.php?action=createFarm" method="post">
        <table cellspacing="0" cellpadding="0">
            <tr>
                <th>Crop</th>
                <td><input type="text" id="Crop" name ="crop"></td>
            </tr>     
            <tr>
                <th>Size</th>
                <td><input type="number" id="size" name ="size"></td>
            </tr>
            <tr>
                <th>Price</th>
                <td><input type="number" id="price" name ="price"></td>
            </tr>
            <tr>
                <th>Build Date</th>
                <td><input type="date" id="BuildDate" name ="BuildDate"></td>
            </tr>
            <tr>
                <td><button type="submit">Save Changes</button></td>
                <td><a href="index.php"><button type="button">Back</button></a></td>
            </tr>
        </table>
    </form>
 
</fieldset>
 
</body>
</html>