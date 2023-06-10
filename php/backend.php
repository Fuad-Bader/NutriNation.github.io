<?php
// Get user message from the request
$requestData = json_decode(file_get_contents('php://input'), true);
$message = $requestData['message'];

// Make a request to the ChatGPT API
$apiKey = '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'; // Replace with your ChatGPT API token
$apiUrl = 'https://api.openai.com/v1/engines/davinci/completions'; // Use 'davinci' as the model name
$data = array(
    'prompt' => $message,
    'max_tokens' => 50
);
$options = array(
    'http' => array(
        'header' => "Content-Type: application/json\r\n"
            . "Authorization: Bearer $apiKey\r\n",
        'method' => 'POST',
        'content' => json_encode($data)
    )
);
$context = stream_context_create($options);
$response = file_get_contents($apiUrl, false, $context);

// // Send the response back to the front-end
// header('Content-Type: application/json');
// echo json_encode(['response' => $response]);


// Send the response back to the front-end
header('Content-Type: application/json');
$responseData = json_decode($response, true);
$generatedText = $responseData['choices'][0]['text'];
echo json_encode(['response' => $generatedText]);

