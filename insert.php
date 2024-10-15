<?php 
    require 'vendor/autoload.php';

    // Connect to MongoDB
    $uri = "mongodb://localhost:27017";
    $client = new MongoDB\Client($uri);

    // Select database
    $database = $client->selectDatabase('namedbTestpramod');

    // Select collection
    $collection = $database->selectCollection('nameTest');

    echo "Connected successfully to MongoDB." . "<br>";

    // Insert document into the collection
    $insertOnceResult = $collection->insertOne([
        'name' => 'Pramod Madhubhashana',
        'age' => '23'
    ]);

    printf("Inserted %d document", $insertOnceResult->getInsertedCount());
?>
