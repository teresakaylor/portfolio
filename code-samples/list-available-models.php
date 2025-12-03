<?php
/*
 * Task: List all available Gemini Models for your API Key
 * Use this to find the EXACT Model ID (e.g., 'gemini-1.5-flash-001')
 */
add_action('wp_footer', function() {
    if ( isset($_GET['list_models']) ) {
        
        if (!defined('POSSIBLE_GEMINI_KEY')) {
            echo "ERROR: Key not defined."; return;
        }
        $api_key = POSSIBLE_GEMINI_KEY;
        
        // The Endpoint to "Get Inventory"
        $url = "https://generativelanguage.googleapis.com/v1beta/models?key=$api_key";
        
        $response = wp_remote_get($url);
        
        if (is_wp_error($response)) {
            echo "WP ERROR: " . $response->get_error_message();
        } else {
            $body = wp_remote_retrieve_body($response);
            $data = json_decode($body, true);
            
            echo '<div style="position:fixed;top:50px;left:20px;width:400px;height:500px;overflow:auto;background:black;color:#00ff00;padding:20px;z-index:999999;border:2px solid #00ff00;font-family:monospace;">';
            echo '<strong>📋 AVAILABLE MODELS:</strong><br><br>';
            
            if (isset($data['models'])) {
                foreach ($data['models'] as $model) {
                    // Highlight "Flash" models
                    if (strpos($model['name'], 'flash') !== false) {
                        echo '<span style="color:yellow;">' . $model['name'] . '</span><br>';
                    } else {
                        echo $model['name'] . '<br>';
                    }
                }
            } else {
                echo "NO MODELS FOUND. Payload: " . print_r($data, true);
            }
            echo '</div>';
        }
    }
});
?>
