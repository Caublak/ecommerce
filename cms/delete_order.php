<?php
require __DIR__ . '/vendor/autoload.php';
$mongoClient = (new MongoDB\Client);
$db = $mongoClient->local;

$orderID = filter_input(INPUT_POST, 'orderID', FILTER_SANITIZE_STRING);

$result = $db->order->deleteOne(['_id' => new MongoDB\BSON\ObjectID($orderID)]);

if ($result->getDeletedCount() == 1) {
    echo 'Order deleted successfully';
} else {
    echo 'Error deleting order';
}
