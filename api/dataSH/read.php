<?php 
  // Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');

  include_once '../../config/Database.php';
  include_once '../../models/Datash.php';

  // Instantiate DB & connect
  $database = new Database();
  $db = $database->connect();

  // Instantiate blog post object
  $post = new Datash($db);

  // Blog post query
  $result = $post->read();
  // Get row count
  $num = $result->rowCount();

  // Check if any posts
  if($num > 0) {
    // Post array
    $posts_arr = array();
    //$posts_arr['data'] = array();

    while($row = $result->fetch(PDO::FETCH_ASSOC)) {
      extract($row);

      $post_item = array(
         'id' => $id,
         'username' => $username,
         'negeri' => $negeri,
         'tarikhBukaSH' => $tarikhBukaSH,
         'tarikhTutupSH' => $tarikhTutupSH,
         'tarikhPenilaianSH' => $tarikhPenilaianSH,
         'tarikhSSTSH' => $tarikhSSTSH,
         'namaPembekal' => $namaPembekal,
         'nilaiSH' => $nilaiSH,
         'tarikhCO' => $tarikhCO,
         'bilJudulPesan' => $bilJudulPesan,
         'bilNaskhahPesan' => $bilNaskhahPesan,
         'bilNaskhahBekal' => $bilNaskhahBekal,
         'peratusBekal' => $peratusBekal,
         'statusBekal' => $statusBekal,
         'statusTuntut' => $statusTuntut,
         'statusBayar' => $statusBayar,
         'remark' => $remark,
         'colorBar' => $colorBar,
         'latitude' => $latitude,
         'longitude' => $longitude
      );

      // Push to "data"
      array_push($posts_arr, $post_item);
      //array_push($posts_arr['data'], $post_item);
    }

    // Turn to JSON & output
    echo json_encode($posts_arr);

  } else {
    // No Posts
    echo json_encode(
      array('message' => 'No Posts Found')
    );
  }
