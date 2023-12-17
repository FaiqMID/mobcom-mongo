<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php

    require_once __DIR__ . '/vendor/autoload.php';

    // use Exception;
    use MongoDB\Client;
    use MongoDB\Driver\ServerApi;

    $uri = "<string>";

    // Specify Stable API version 1
    $apiVersion = new ServerApi(ServerApi::V1);

    // Create a new client and connect to the server
    $client = new MongoDB\Client($uri, [], ['serverApi' => $apiVersion]);

    try {
        $collection = $client->mobcom->data;
        $data = $collection->findOne(['name' => 'mobcom']);
        echo '<h1>', iterator_to_array($data['info'])[0], '</h1>';
        // echo 'sukses';
    } catch (Exception $e) {
        printf($e->getMessage());
    }

    ?>


</body>
</html>