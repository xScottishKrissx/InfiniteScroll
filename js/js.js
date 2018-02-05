$(document).ready(function(){
  $(".infiniteEnd").addClass("hide");
  $(".loader").addClass("hide");

var start = 0;
var limit = 5;
var reachedEnd =  false;

  $(document).scroll(function(){
      console.log("1");
      //var scroll = $(window).scrollTop();
      //console.log(scroll);
      //console.log("Window height is " + $(window).height())
      //console.log("Document height is: "+ $(document).height())
    if ($(window).scrollTop() == $(document).height() - $(window).height() && reachedEnd == false) {
        getData();
      }
    });

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
