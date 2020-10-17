<?php 
  // Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');

  include_once '../../config/Database.php';
  include_once '../../models/Trackparcel.php';

  // Instantiate DB & connect
  $database = new Database();
  $db = $database->connect();

  // Instantiate blog post object
  $post = new Trackparcel($db);

  // Get ID
  $post->code = isset($_GET['code']) ? $_GET['code'] : die();

  // Get post
  $post->read_single();

  // Create array
  $post_arr = array(
    'id' => $post->id,
    'code' => $post->code,
    'addressFrom' => $post->addressFrom,
    'addressTo' => $post->addressTo,
    'senderName' => $post->senderName,
    'receiverName' => $post->receiverName,
    'imgQR' => $post->imgQR,
    'released' => $post->released
  );

  // Make JSON
  print_r(json_encode($post_arr));