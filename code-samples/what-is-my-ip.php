<?php
$ip = file_get_contents('https://api.ipify.org');
echo '<div style="position:fixed;top:0;left:0;background:black;color:yellow;padding:20px;z-index:999999;font-size:20px;">
SERVER IP: ' . $ip . '
</div>';
?>
