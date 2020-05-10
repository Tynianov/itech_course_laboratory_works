<?php

    include 'dbConnection.php';
    // include 'index.php';

    $Publisher = $_POST['publisher'];
    $array = "<div>";

    $stmt = $pdo->query("Select a.ID_Book, a.name, b.name as author_name, a.isbn, a.publisher, a.publish_year, a.quantity from literature as a, Authors as b, Book_Authors as c where a.publisher=\"$Publisher\"");
    foreach ($stmt as $row) {
        $str = implode(', ', array_map(
            function ($v, $k) { return sprintf("%s='%s'", $k, $v); },$row,
            array_keys($row)));

        $array .= "<p>$str</p><br><br>";
    }
    $array .= '</div>';
        echo $array;


    $pdo=null;
?>
