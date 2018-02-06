<?php include ("pdo.php") ?>
<?php

if (isset($_POST['getData'])) {
  try{

    $start = (int)$_POST['start'];
    $limit = (int)$_POST['limit'];

    $result = $db->prepare("select * FROM version1 ORDER BY id DESC LIMIT :start, :limit ");
    $result->bindParam(':start' , $start , PDO::PARAM_INT);
    $result->bindParam(':limit' , $limit , PDO::PARAM_INT);

    $result->execute();
    $db =  null;

    if($result->rowCount() > 0){
        $postsOutput = '';
        while ($row = $result->fetch(PDO::FETCH_ASSOC)){
          $postsOutput .='<div><h1>'.$row['name'].'</h1><p>'.$row['post'].'</p></div>';
        }
        exit($postsOutput);
        }
    else {
      exit('end');
    }

  }
  Catch(Exception $e) {
    echo '<p>', $e->getMessage(), '</p>';
    die("Oops something went wrong");
  };
}
?>
