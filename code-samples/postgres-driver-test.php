<?php
/*
 * Task: Verify if PostgreSQL driver is installed on CloudPanel
 */
if (extension_loaded('pdo_pgsql')) {
    echo '<div style="background:green;color:white;padding:40px;z-index:9999;position:fixed;top:0;left:0;width:100%;">✅ SUCCESS: PostgreSQL Driver is INSTALLED!</div>';
} else {
    echo '<div style="background:red;color:white;padding:40px;z-index:9999;position:fixed;top:0;left:0;width:100%;">❌ MISSING: PostgreSQL Driver is NOT installed.</div>';
}
?>
