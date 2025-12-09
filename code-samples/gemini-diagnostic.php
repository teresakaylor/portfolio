 <?php
/*
 * Mandate: Core Engine (DIAGNOSTIC MODE)
 * Task: Call Gemini API and PRINT ERRORS if it fails.
 */

function possible_get_gemini_verdict($user_topic) {

    // 1. Security Gate
    if (!defined('POSSIBLE_GEMINI_KEY')) {
        return "🛑 ERROR: Key not found in wp-config.php";
    }
    $api_key = POSSIBLE_GEMINI_KEY;

    // 2. The Model
    $model_id = 'gemini-1.5-flash'; 
    $endpoint = "https://generativelanguage.googleapis.com/v1beta/models/$model_id:generateContent?key=$api_key";

    // 3. Payload
    $body = [
        'contents' => [
            [ 'role' => 'user', 'parts' => [ ['text' => "Analyze strictly in JSON: " . $user_topic] ] ]
        ],
        'generationConfig' => [
            'responseMimeType' => 'application/json'
        ]
    ];

    // 4. Fire Request
    $response = wp_remote_post($endpoint, [
        'headers' => ['Content-Type' => 'application/json'],
        'body'    => json_encode($body),
        'timeout' => 20
    ]);

    // 5. LOUD Error Handling (New)
    if (is_wp_error($response)) {
        return "🛑 WORDPRESS HTTP ERROR: " . $response->get_error_message();
    }

    $code = wp_remote_retrieve_response_code($response);
    if ($code !== 200) {
        $body_err = wp_remote_retrieve_body($response);
        return "🛑 API ERROR ($code): " . $body_err;
    }

    // 6. Success
    $raw_body = wp_remote_retrieve_body($response);
    $data = json_decode($raw_body, true);

    if (isset($data['candidates'][0]['content']['parts'][0]['text'])) {
        return $data['candidates'][0]['content']['parts'][0]['text'];
    } else {
        return "🛑 MALFORMED JSON: " . print_r($data, true);
    }
}
