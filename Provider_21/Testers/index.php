<?php
// Include the DB class
require_once '../classes/DB.php';

header('Content-Type: text/html; charset=UTF-8');

// Instantiate the DB object
$db = new DB();

// Function to display all records from a table
function displayAllRecords($records, $table) {
    echo "<h3>All records from the $table table:</h3>";
    echo "<table border='1' style='width: 100%;'>";
    echo "<tr>";
    foreach (array_keys($records[0]) as $field) {
        echo "<th>$field</th>";
    }
    echo "</tr>";
    foreach ($records as $record) {
        echo "<tr>";
        foreach ($record as $value) {
            echo "<td>$value</td>";
        }
        echo "</tr>";
    }
    echo "</table><br/>";
}

$farms = $db->getAllFarms();
$houses = $db->getAllHouses();
$villagers = $db->getAllVillagers();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>API Testers - Provider_21</title>
</head>
<body>
    <h1>Provider_21 - Testers</h1>

    <?php
        displayAllRecords($farms, "Farms");
        displayAllRecords($houses, "Houses");
        displayAllRecords($villagers, "Villagers");
    ?>

    <hr>

    <!-- Test API Functions -->
    <h2>Test API Functions (Display Outputs in JSON)</h2>
    <h3>Test GET all Farms</h3>
    <pre>
        <?php
            $url = "http://localhost/CIS266/RESTful/Scrum3_Team_21/Provider_21/API_21.php?action=getFarm";
            echo json_encode(json_decode(file_get_contents($url)), JSON_PRETTY_PRINT);
        ?>
    </pre>

    <h3>Test GET a Farm by ID (ID: 1)</h3>
    <pre>
        <?php
            $url = "http://localhost/CIS266/RESTful/Scrum3_Team_21/Provider_21/API_21.php?action=getFarm&id=1";
            echo json_encode(json_decode(file_get_contents($url)), JSON_PRETTY_PRINT);
        ?>
    </pre>

    <h3>Test POST create Farm</h3>
    <pre>
        <?php
            $url = "http://localhost/CIS266/RESTful/Scrum3_Team_21/Provider_21/API_21.php?action=createFarm";
            $data = json_encode([
                "Crop" => "Kale",
                "size" => 22,
                "price" => 25.0,
                "BuildDate" => "1990-01-15"
            ]);
            $opts = [
                "http" => [
                    "method" => "POST",
                    "header" => "Content-Type: application/json\r\n",
                    "content" => $data
                ]
            ];
            $context = stream_context_create($opts);
            echo json_encode(json_decode(file_get_contents($url, false, $context)), JSON_PRETTY_PRINT);
        ?>
    </pre>

    <h3>Test PUT update Farm</h3>
    <pre>
        <?php
            $url = "http://localhost/CIS266/RESTful/Scrum3_Team_21/Provider_21/API_21.php?action=updateCake";
            $data = json_encode([
                "FarmId" => 8,
                "Crop" => "broccoli",
                "size" => 21,
                "price" => 24.0,
                "BuildDate" => "1991-01-15"
            ]);
            $opts = [
                "http" => [
                    "method" => "PUT",
                    "header" => "Content-Type: application/json\r\n",
                    "content" => $data
                ]
            ];
            $context = stream_context_create($opts);
            echo json_encode(json_decode(file_get_contents($url, false, $context)), JSON_PRETTY_PRINT);
        ?>
    </pre>

</body>
</html>