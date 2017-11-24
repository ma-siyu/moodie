<!--User Profile-->
<!DOCTYPE html>
<html>
    <?php
      require 'head.html';
      ?>
    <!--#include file="head.html" -->
    <link href="../css/profile.css" type="text/css" rel="stylesheet">
    <!--FONTS-->
  <body>
    <!--HEADER-->
    <div id="appendHeader"></div>
      <script>
        $(function(){
          $("#appendHeader").load("header.html");
        });
      </script>


    <!--BODY-->
    <div class="container-fluid">

    <!--SEARCH-->
    <div id="appendSearch"></div>
    <script>
      $(function(){
        $("#appendSearch").load("search.html");
      });
    </script>
      
    <div class="pic-wrapper"> <!--Just a frame-->
      <img src="" height="300" width="250">
    </div>

  <div class="pic">
      <form id="frm1" action="">
        <input type="file" name="pic" accept="image/*" onchange="previewFile()">
      </form>
  </div>

  <script>
    function previewFile()
    {
      var preview = document.querySelector('img');
      var file = document.querySelector('input[type=file]').files[0];
      var reader = new FileReader();
      reader.addEventListener("load", function () {
      preview.src = reader.result;
      },false);

      if(file)
      {
        reader.readAsDataURL(file);
      }
    }
  </script>

  <div class="btn-group">
    <button type="button" id ="info" class="btn btn-primary">Info</button>
    <button type="button" id ="reviews" class="btn btn-primary">Reviews</button>
    <button type="button" id ="friends" class="btn btn-primary">Friends</button>
    <button type="button" id ="list" class="btn btn-primary">List</button>
  </div>

  <!--Define content for each button-->


    <script>
      $(document).ready(function(){
        $("#info").click(function(){
          $(".info").toggle();
          $(".reviews, .friends, .list").hide();
        });
      });
    </script>

    <script>
      $(document).ready(function(){
        $("#reviews").click(function(){
          $(".reviews").toggle();
          $(".info, .friends, .list").hide();
        });
      });
    </script>

    <script>
      $(document).ready(function(){
        $("#friends").click(function(){
          $(".friends").toggle();
          $(".info, .reviews, .list").hide();
        });
      });
    </script>

    <script>
      $(document).ready(function(){
        $("#list").click(function(){
          $(".list").toggle();
          $(".info, .reviews, .friends").hide();
        });
      });
    </script>

    <div class="info">
      <!--PHP-->
      <div>
        About:
        <textarea id="update" class="stupdatebox"></textarea>
        <input type="submit" value="POST" class="stpostbutton">
      </div>
      
      <div id="mainContent"></div>
      <div id="secContent"></div>
      <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
      <script src="../js/ajaxGetPost.js"></script>
      <script>
        $(document).ready(function()
        {
          /*$(".info").on("click",".stpostbutton",function()
          {
            $("#mainContent").prepend("<p>HELLO TESTIIIING</p>");
          });*/
         var base_url="http://localhost/COMP307/";
          var url,encodedata;
          $("#update").focus();

          $(".info").on("click",".stpostbutton",function()
          {

          var update=$('#update').val();
          var precode = {"about":update};
          var encode=JSON.stringify(precode);
          //$("#mainContent").prepend("<p>Daaaaama</p>");
          url=base_url+'back-end/about';



          $.ajax({
          type:"POST",
          url:url,
          data:encode,
          success:function(data){
          },
          error:function(data){
          alert("Error In Connecting");
          }
          });


          $.ajax({
          type:"GET",
          url:url,
          success:function(data){
            $("#mainContent").prepend(data);
          }
          });




          /*post_ajax_data(url,encode,function(data)
          {
          //$("#mainContent").prepend("<p>trying</p>");
          $.each(data.Users, function(i,data)
          {
          var html="<div class='stbody'"+data.about+"</div>";
          $("#mainContent").prepend(html);
          $('#update').val('').focus();
           alert("asdas");
          });
          });*/
          });

          ajax_data('GET',url, function(data)
          {
            alert("fdgdfg");
          $.each(data.Users, function(i,data)
          {
          var html="<div class='stbody' id='stbody"+data.about+"</div>";
          $("#secContent").prepend(html);
          });
          });


        });
      </script>

 
    </div>

    <div class="reviews">
      <!--All PHP-->
    </div>

    <div class="friends">
      <div class="content">
      <div class="content__container">
        <p class="content__container__text">
          Your
        </p>
        
        <ul class="content__container__list">
          <li class="content__container__list__item">Friends</li>
          <li class="content__container__list__item">Tomodachi</li>
          <li class="content__container__list__item">Amigos</li>
          <li class="content__container__list__item"></li>
        </ul>
      </div>
    </div>
    </div>

    <div class="list">
      <!--Mostly PHP-->
    </div>

    <!--FOOTER-->
    <div id="appendFooter"></div>
      <script>
        $(function(){
          $("#appendFooter").load("footer.html");
        });
      </script>

  </body>
</html>
