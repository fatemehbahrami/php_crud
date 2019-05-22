<!DOCTYPE html>
 <?php
$host = "localhost";
$dbname = "kimia";
$user = "root";
$pass = "bahrami";

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $conn->prepare("SELECT id, text, title , date  FROM tweet");
    $stmt->execute();

    // set the resulting array to associative
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $tweets = $stmt->fetchAll();
}
catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
$conn = null;
?> 


<html> 
    <head>
        <style>
            .table_row {
                width : 20%;
                border : 1px solid blue;
            }

            .table_row_child {
                width : 20%;
                border : 1px solid red;
            }
        </style>
    </head>
    <body>
        <table style='width: 70%; border:1px solid red'>
            <tr>
                <th class ="table_row">Id</th>
                <th class ="table_row">title</th>
                <th class ="table_row">text</th>
                <th class ="table_row">time</th>
                <th class ="table_row">Edit</th>
            </tr>
            <?php foreach ($tweets as $key => $tweet): ?>
                <tr>
                    <th class ="table_row_child"><?= $tweet['id']; ?></th>
                    <th class ="table_row_child"><?= $tweet['title']; ?></th>
                    <th class ="table_row_child"><?= $tweet['text']; ?></th>
                    <th class ="table_row_child"><?= $tweet['date']; ?></th>
                    <th class ="table_row_child"><a href="edit2.php?id=<?= $tweet['id']; ?>"> Edit </a></th>
                </tr>
            <?php endforeach; ?>
        </table>
    </body>
</html>