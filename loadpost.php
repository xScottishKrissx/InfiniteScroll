<?php include("pdo.php") ?>
<?php

try {

  $result = $db->prepare("select * FROM version1 ORDER BY id DESC LIMIT 0, 5 ");
  $result->execute();

  if($result->rowCount() > 0){
  // Define how we want to fetch the results
  $result->setFetchMode(PDO::FETCH_ASSOC);
  $iterator = new IteratorIterator($result);

  foreach($iterator as $row){
    echo '<div><h1>'.$row['name'].'</h1><p>'.$row['post'].'</p></div>';

  }
}else{
  echo '<p>No Results could be displayed.</p>';
}

} catch (Exception $e) {
  echo '<p>', $e->getMessage(), '</p>';
  die("Oops something went wrong");
}




 ?>
