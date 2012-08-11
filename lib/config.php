<?php
$config = array(
    'appId' => '203197653102145',
    'secret' => '20e774a55fb435874351dcd2c581bc60',
    'permissionsArray' => array(
        'publish_stream',
        'read_stream',
        'offline_access',
        'user_groups'
    ),
    'afterLoginUrl' => 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']
);

// Nagpur PHP User group
$sourceId = '107329506051213';
?>
