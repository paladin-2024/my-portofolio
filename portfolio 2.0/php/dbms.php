<?php
require 'vendor/autoload.php'; // Load the Twilio PHP SDK

use Twilio\Rest\Client;

// Your Twilio credentials
$sid = 'your_account_sid';
$token = 'your_auth_token';
$twilio = new Client($sid, $token);

// Function to send SMS
function sendSMS($to, $message) {
    global $twilio;
    $twilio->messages->create($to, [
        'from' => 'your_twilio_number',
        'body' => $message
    ]);
}

// Example usage: Send a message when a message is edited
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $content = $_POST['content'];
    $stmt = $pdo->prepare('UPDATE messages SET content = ? WHERE id = ?');
    $stmt->execute([$content, $id]);

    // Send SMS notification
    $phoneNumber = 'recipient_phone_number';
    sendSMS($phoneNumber, "Message updated: $content");

    header('Location: your_page.php');
}
?>