<?php
/*
 * Task: Verify API Key Visibility (Fixed Syntax)
 */
if ( defined('POSSIBLE_GEMINI_KEY') ) {
    // Get the key
    $key = POSSIBLE_GEMINI_KEY;
    // Show only the first 4 characters for verification
    $safe_view = substr($key, 0, 4) . '****************';
    
    echo '<div style="position:fixed;top:0;left:0;width:100%;background:green;color:white;padding:20px;z-index:999999;">
    ✅ SUCCESS: API Key Detected: ' . $safe_view . '
    </div>';
} else {
    // Fixed: Removed the breaking quotes around the constant name
    echo '<div style="position:fixed;top:0;left:0;width:100%;background:red;color:white;padding:20px;z-index:999999;">
    ❌ ERROR: System cannot find POSSIBLE_GEMINI_KEY in wp-config.php. 
    Did you save the file?
    </div>';
}
