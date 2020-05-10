<?php

    $first = $_POST['first_date'];
    $second = $_POST['second_date'];
    include 'dbConnection.php';
    // include 'index.php';

    $sql = "Select * from literature where (publish_year > \"$first\" and publish_year < \"$second\") or (publish_date > \"$first\" and publish_date < \"$second\")";

    $array = array();

    foreach ($pdo->query($sql) as $row) {
        $array[] = $row;
    }
    echo json_encode($array);

    $pdo=null;
?>
