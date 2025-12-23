   <?php
$msg = $_POST['message'];

$apiKey = "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";

$data = [
    "model" => "gpt-4.1-mini",
    "messages" => [
        ["role" => "user", "content" => $msg]
    ]
];

$ch = curl_init("https://api.openai.com/v1/chat/completions");
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    "Content-Type: application/json",
    "Authorization: Bearer $apiKey"
]);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$response = curl_exec($ch);
curl_close($ch);

$result = json_decode($response, true);
echo $result['choices'][0]['message']['content'];