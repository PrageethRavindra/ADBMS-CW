<?php 
    require '../../vendor/autoload.php';
    $reviewText = $_POST['reviews'];


    // Connect to MongoDB
    $uri = "mongodb://localhost:27017";
    $client = new MongoDB\Client($uri);

    // Select database
    $database = $client->selectDatabase('namedbReviewPrageeth');

    // Select collection
    $collection = $database->selectCollection('reviewsCollection');

    echo "Connected successfully to MongoDB." . "<br>";

    // Insert document into the collection
    $insertOnceResult = $collection->insertOne([
        
        'Review' => $reviewText,
        'UserId'=>"001"
       
    ]);

    printf("Inserted %d document", $insertOnceResult->getInsertedCount());

    header("location: reviews.php");

?>
