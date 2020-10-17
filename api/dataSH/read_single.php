<?php 
  // Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');

  include_once '../../config/Database.php';
  include_once '../../models/Employeedata.php';

  // Instantiate DB & connect
  $database = new Database();
  $db = $database->connect();

  // Instantiate blog post object
  $post = new Employeedata($db);

  // Get ID
  $post->noIC = isset($_GET['noIC']) ? $_GET['noIC'] : die();

  // Get post
  $post->read_single();

  // Create array
  $post_arr = array(
    'id' => $post->id,
    'noIC' => $post->noIC,
    'nama' => $post->nama,
    'emel' => $post->emel,
    'sex' => $post->sex,
    'stationCode' => $post->stationCode
  );

  // Make JSON
  print_r(json_encode($post_arr));