<?php
session_start();
require_once __DIR__ . '/facebook-sdk-v5/autoload.php';
$fb = new Facebook\Facebook([
  'app_id' => '755332954577256',
  'app_secret' => 'c4bc2d215e6b53ab3c5d8eddbb5f41ad',
  'default_graph_version' => 'v2.4',
  ]);

$helper = $fb->getRedirectLoginHelper();
$permissions = ['email', 'user_likes']; // optional
$loginUrl = $helper->getLoginUrl('http://ketli.in/login.php', $permissions);

?>
