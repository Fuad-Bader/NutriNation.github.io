<?php

// API endpoint URL
$url = 'https://api.openai.com/v1/engines/davinci/jobs';

// API key
$api_key = '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';

// User information
$user_id = 123;
$user_purchases = ['product_1', 'product_2', 'product_3'];
$user_browsing_history = ['product_4', 'product_5', 'product_6'];

// Prepare the request
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    'Content-Type: application/json',
    'Authorization: Bearer ' . $api_key,
]);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode([
    'prompt' => 'Generate product recommendations for user ' . $user_id,
    'context' => 'The user has purchased ' . implode(', ', $user_purchases) . ' and has browsed ' . implode(', ', $user_browsing_history),
]));

// Send the request
$response = curl_exec($ch);
curl_close($ch);

// Parse the API response
$result = json_decode($response, true);

// Extract the generated text
$generated_text = $result['choices'][0]['text'];

// Use the generated text to display product recommendations
$recommendations = explode(', ', $generated_text);
echo 'Product recommendations for user ' . $user_id . ': ' . implode(', ', $recommendations);

?>