$(document).ready(function(){
  $(".infiniteEnd").addClass("hide");
  $(".loader").addClass("hide");

var start = 5;
var limit = 10;
var reachedEnd =  false;

  $(document).scroll(function(){
      console.log("1");
      var scroll = $(window).scrollTop();
      console.log(scroll);
      //console.log("Window height is " + $(window).height())
      //console.log("Document height is: "+ $(document).height())
    if ($(window).scrollTop() == $(document).height() - $(window).height() && reachedEnd == false) {
        getData();
      }
    });
    $("#loadContent").on("click",function(){
        getData();
    })


    function getData(){
      $(".loader").removeClass("hide").addClass("show");
      if(reachedEnd){
        return;
      }

      $.ajax({
        url:'ajax.php',
        method:'POST',
        dataType: 'text',
        data:{getData:1, start: start, limit: limit},
        success:function(data){

          if(data == 'end'){
            reachedEnd = true;
            console.log("End of results");
            $(".infiniteEnd").removeClass("hide").addClass("show");
          }else{
            start += limit;
            $(".posts").append(data);
            console.log("Add Results");
          }

          $(".loader").removeClass("show").addClass("hide");
        }
      });

    }

$("#submitForm").on("click", function(){
   postForm();
});

/*
$("#inputForm").on("submit", function(){
    //Run upload.php
    postForm();

});
*/
function postForm(){
    var name = $("#name").val();
    var postcontent = $("#postcontent").val();
    //var imagePath = $("#uploadFile").val();
    //var imageName = imagePath;
    //var strippedImageName = imageName.substring(imageName.lastIndexOf("\\") + 1);

    //console.log(image);
    //console.log(result);
    if (name && postcontent != "") {
      $.ajax({
        type: "POST",
        url: "submitForm.php",
        data:{'name':name, 'postcontent':postcontent},
        cache: false,
        success: function(data){
          $(".posts").prepend("<div class='recentPost'>" + data + "</div>");
          $("#name").val("");
          $("#postcontent").val("");
        //  $("#uploadFile").val("");
          //console.log("ajax was successful")
          //$("#inputForm").submit();
        }
      });

    }else{
      console.log("Form is empty");
      //$('#errorMessage').html("Forename, Surname and the Subject boxes must NOT be empty. Thank you.")
    }

    return false;



    //console.log("Form Submitted")
  }




/*
    $(window).scroll(function (event) {
        var scroll = $(window).scrollTop();
        // Do something
        if(scroll > 200){
          console.log("Greater than 200")

      /*  $.post("ajax.php", {load:load}, function(data){
          $(".modItemArea").append(data);
          $(".loader").addClass("hide");
        });
      */
});
