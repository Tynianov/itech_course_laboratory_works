<?php
    header('Content-Type: text/xml');
    header("Cache-Control: no-cache, must-revalidate");
    $Author = $_POST['BooksByAuthor'];
    include 'dbConnection.php';
    // include 'index.php';


    $sql = $pdo->query("SELECT * FROM literature AS a, Authors AS b, Book_Authors AS c WHERE a.ID_Book=c.FID_Book AND c.FID_Authors=b.ID_Authors AND b.name='$Author'");

    $dom = new DOMDocument();
    $dom->encoding = 'utf-8';
    $dom->xmlVersion = '1.0';
    $dom->formatOutput = true;
    $root = $dom->createElement('Books');
    foreach ($sql as $row) {
        $client_node = $dom->createElement('book');
        $client_node->setAttributeNode(new DOMAttr('id', $row['ID_Book']));
        $client_node->appendChild($dom->createElement('start', $row['name']));
        $client_node->appendChild($dom->createElement('end', $row['publish_date']));
        $client_node->appendChild($dom->createElement('in_trafic', $row['publish_year']));
        $client_node->appendChild($dom->createElement('out_trafic', $row['publisher']));
        $client_node->appendChild($dom->createElement('client_id', $row['quantity']));
        $root->appendChild($client_node);
    }
    $dom->appendChild($root);
    echo $dom->saveXML();

    $pdo=null;

?>
