<?php include("pdo.php") ?>

<?php

try {

  $name = htmlentities(strip_tags($_POST['name']));
  $postContent = htmlentities(strip_tags($_POST['postcontent']));
  //$image = htmlentities(strip_tags($_POST['imageName']));

  $result = $db->prepare("INSERT INTO version1 (name, post) VALUES (:name, :post) ");
  $result->bindParam(':name', $name);
  $result->bindParam(':post', $postContent);
  //$result->bindParam(':imageName', $image);
  $result->execute();

  $result = $db->prepare("select * from version1 ORDER BY id DESC LIMIT 1");
  $result->execute();

  if($result->rowCount() > 0){
    $result->setFetchMode(PDO::FETCH_ASSOC);
    $iterator = new IteratorIterator($result);

    foreach($iterator as $row){
        echo '<div><h1>'.$row['name'].'</h1><p>'.$row['post'].'</p></div>';
    }
    //$db = null;
    }else{
      echo '<p>No Results could be displayed.</p>';
  }
} Catch(Exception $e) {
    echo '<p>', $e->getMessage(), '</p>';
    die("");
};
?>
