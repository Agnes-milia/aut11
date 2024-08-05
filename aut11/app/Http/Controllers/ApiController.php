<?php
require 'vendor/autoload.php'; // Autoload Composer csomagok

use DebugBar\StandardDebugBar;

$debugbar = new StandardDebugBar();
$debugbarRenderer = $debugbar->getJavascriptRenderer();

// Adatok hozzáadása a DebugBar-hoz
$debugbar["messages"]->addMessage("Hello World!");

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function successResponse($data, $message = "Success", $status = 200)
{
        return response()->json([
        'message' => $message,
        'data' => $data
    ], $status);
}

public function errorResponse($message = "Error", $status = 400)
{
        return response()->json([
        'message' => $message,
    ], $status);
}

}

// A HTML kimenetbe illesztés a megfelelő helyen
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php echo $debugbarRenderer->renderHead(); ?>
</head>
<body>
    <h1>My Page</h1>
    <?php echo $debugbarRenderer->render(); ?>
</body>
</html>