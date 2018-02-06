
<!doctype html>
<!-- doctype should be the first thing in the document -->
<?php include ("pdo.php") ?>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="css/css.css">

    <title>Infinite Scroll</title>
  </head>
  <body>
    <div id="header"><h1 >Infinite Scroll with Jquery, PHP, SQL and Ajax</h1></div>
    <button type="button" name="button" id="loadContent"> load content</button>


  <div class="formContainer">
    <form id="inputForm" method="" enctype="" action="">
      <p>Name</p> <input type="text" id="name" name="firstName" placeholder="Enter your name..." maxlength="100"><br/>

      <br/><br/><textarea name="message" id="postcontent" rows="8" cols="80" placeholder="What's on your mind" maxlength="400"></textarea><br/><br/>

      <!--<input type="file" name="upload" id="uploadFile" >-->

      <!-- <input type="submit" name="submit" value="Submit" id="submitForm" >-->
      <button type="button" name="button" id="submitForm">Submit</button>
    </form>
  </div>


    <div class="posts"><?php include ("loadpost.php"); ?></div>
    <div class="loader"><img src="img/loader.gif" alt=""></div>
    <div class="infiniteEnd"><h3>You wouldnt think there would be an end to an infinite scroll but here we are.</h3></div>
    






























    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="js/js.js" charset="utf-8"></script>
  </body>
</html>
