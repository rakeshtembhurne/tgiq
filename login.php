<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);

require_once 'lib/FbLogin.php';
include_once 'lib/config.php';

try {
    $fb = new FbStats($config);
    $user = $fb->getInfo('me');
    $_SESSION['user'] = $user;
    header("Location: questions.php");
} catch (Exception $e) {
	unset($_SESSION['user']);
    echo '<div class="alert-message error">' . $e->getMessage() . '</div>';
}