   <?php
$msg = $_POST['message'];

$apiKey = "0364825974";

$data = [
    "model" => "Gemini 2.0 Flash",
    "messages" => [
        ["role" => "user", "content" => $msg]
    ]
];

$ch = curl_init("https://docs.cloud.google.com/docs/ai-ml");
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