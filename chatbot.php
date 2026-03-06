<?php
$reply = "";

if(isset($_POST["message"])){

    $user_message = $_POST["message"];

    $apiKey = "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";

    $system_prompt = "
You are an AI skincare assistant for a beauty website.
You must ONLY talk about skincare, skin types, and skincare products.

You must only recommend these products:
- Green Tea Oil-Control Facewash
- Deep Hydrating Cream Cleanser
- Vitamin-C Glow Boost Serum
- Acne Clearing Treatment Gel

If the user asks anything not related to skincare, reply:
'I can only help with skincare and product recommendations.'

You can reply in English or Hinglish (Hindi in English letters).
";

    $data = [
        "model" => "gpt-4o-mini",
        "messages" => [
            ["role"=>"system","content"=>$system_prompt],
            ["role"=>"user","content"=>$user_message]
        ]
    ];

    $ch = curl_init("https://api.openai.com/v1/chat/completions");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        "Content-Type: application/json",
        "Authorization: Bearer ".$apiKey
    ]);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));

    $result = curl_exec($ch);
    curl_close($ch);

    $response = json_decode($result, true);
    $reply = $response["choices"][0]["message"]["content"] ?? "AI not responding";
}
?>

<!DOCTYPE html>
<html>
<head>
<title>AI Skincare Assistant</title>
<link href="https://fonts.googleapis.com/css2?family=Urbanist:wght@300;400;500;600;700&display=swap" rel="stylesheet">

<style>
body{
    font-family:'Urbanist',sans-serif;
    background:linear-gradient(135deg,#e9f9ef,#f4fff8);
    display:flex;
    justify-content:center;
    align-items:center;
    min-height:100vh;
}

.chatbox{
    width:450px;
    background:white;
    padding:30px;
    border-radius:25px;
    box-shadow:0 30px 60px rgba(13,157,74,0.18);
}

h2{
    text-align:center;
    color:#0d9d4a;
}

textarea{
    width:100%;
    height:80px;
    border-radius:12px;
    border:1px solid #cdeedd;
    padding:12px;
    resize:none;
}

button{
    width:100%;
    margin-top:10px;
    padding:12px;
    border-radius:40px;
    border:2px solid #0b6b3a;
    background:white;
    color:#0b6b3a;
    font-weight:600;
    cursor:pointer;
}

button:hover{
    background:#0b6b3a;
    color:white;
}

.reply{
    margin-top:20px;
    background:#f5fff8;
    padding:15px;
    border-radius:15px;
    border:1px solid #cdeedd;
    color:#245c3f;
}
</style>
</head>

<body>

<div class="chatbox">
<h2>🌿 AI Skincare Assistant</h2>

<form method="POST">
<textarea name="message" placeholder="Ask about your skin, acne, dryness, products..."></textarea>
<button type="submit">Ask AI</button>
</form>

<?php if($reply!=""){ ?>
<div class="reply">
<b>AI:</b><br><?php echo nl2br($reply); ?>
</div>
<?php } ?>

</div>
</body>
</html>
