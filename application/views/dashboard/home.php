
<style type="text/css">
.left-home{
    border: 1px solid #e8e8e8;
    border-radius: 5px;
    background-color: #fafcfc;
    width: 100%;
    padding: 5px;
    text-align: left;
}
.content-home{
    border: 1px solid #e8e8e8;
    border-radius: 5px;
    background-color:#fafcfc;
    min-height: 300px;
    margin-left: 10px;
    margin-right: 10px;
}
.list-group-item{
  border: none;
}
.row{
margin-right:0px; 
margin-left: 0px; 
}
.col-sm-4,.col-sm-8{
  padding-right: 0px;
  padding-left: 0px;list-group
}
.search_bar{
float: left;
width: 70%;
}
.search_bar_button {
    padding-left: 10px;
    width: 25%;
    display: inline;
}
.search_bar_button .btn {
    width: 70px;
    background-color: #008CBA;
    color: #FFF
}
.search_bar_button .btn:hover {
    width: 70px;
}
.list-container{
  width: 100%;
}
.label-span{
  color:#a8a5a5;
      line-height: 25px;
}
.label-span2{
  color:#6e6b6b;
}
.input-search{
  display: inline-block;
  width: 70%;
}
.message-class{
    color: #6e6b6b;
    margin-top: 10px;
}
  #map {
        width: 100%;
        height: 200px;
        background-color: grey;
      }
</style>
<div class="row">
    <div class="col-sm-4" style="background-color:lavender;">
<div class="left-home left-row">
  <?php if(isset($user)) {

    ?>
    <p class="list-group-item">
    <span  class="label-span">Name</span> 
    <span class="label-span2"><?php echo $user->first_name; ?> <?php echo $user->last_name; ?></span></p>
    <p class="list-group-item">
    <span  class="label-span">Email</span> 
    <span class="label-span2"><?php echo $user->email; ?></span></p>
    <p class="list-group-item">
    <span class="label-span">Gender</span> 
    <span class="label-span2">
      <?php
      if($user->gender==""){
        echo "Not Specified";
      }
      else{
        echo $user->gender;
      }
        ?>
    </span></p>
    

    <p class="list-group-item">
    <span class="label-span">Last Updated</span> 
    <span class="label-span2">

      <?php
$date = strtotime($user->modified); 
$new_date = date('d M Y h:m A', $date);
       echo $new_date; ?>
    <?php } ?>
</span></p>

    <p class="list-group-item">
    

      <?php 
       if($user->locale==""){
      }
      else{
        $locale= $user->locale;
      }

       ?> 
       <input type='hidden' id='locale_cord' value='<?php echo $locale; ?>'>
       
    <div id="map">Map</div>
</div>
    </div>
    <div class="col-sm-8" >
    <div class="well content-home">
    <div class="search_bar">
      <span class="label-span"> Add New Interest </span>
    <input type="text" placeholder="joggin,running, ..etc"   class="form-control input-search"  id="interest">
    </div>
     <div class="search_bar_button">
    <input type="button" class="btn btn-default"  id="save_interest" value="Add">
    </div>
     <div class="list-container">
      <div class="message-class"></div>
      <div id="intests_list"></div>
    </div>
</div>
    </div>
    </p>
    </div>
  </div> 
<script>

function loadIntes(){
        $('.spinner-loader-inner').show();
        $('.cotent-list').fadeOut(400);
        let pagNum=1;
         if( $('.pagination .current').length > 0){
          pagNum=parseInt($('.pagination .current').html()) ; 
         }
          $.ajax({
          method: "GET",
          async:true,
          url: "interest/list/"+pagNum,
          })
          .done(function( msg ) {
            $('.spinner-loader').hide();
          try {
            json = JSON.parse(msg);
          } catch (exception) {
            json = null;
          }

          if (json) {
            //this is json
             $('#intests_list').html(json.message);
          }else{
              $('#intests_list').html(msg);
              $('.pagination li a').click(function(event){
              $('.pagination li a').removeClass('current');
              $(this).addClass('current');
              console.log(this);
              loadIntes();
              $('.spinner-loader-inner').hide();
              $('.cotent-list').fadeIn();
             event.preventDefault();
          });

          }
          });
    
  }
$(document).ready(


  function(){

    $('#save_interest').on('click',function(){
      let interest=$('#interest').val();
      $('.message-class').html("");
     if(interest==""){
       alert("Please Enter an Interest");
       return false;
     }else{
          $.ajax({
          method: "POST",
          url: "interest/add",
          data: { keyword:interest}
          })
          .done(function( msg ) {
            let resp=(JSON.parse(msg));
            if(resp.status==1){
              $('.message-class').html('<div class="alert alert-success"><strong>Added new Interest.</strong></div>');
              loadIntes();
            }
            if(resp.status==0){
              $('.message-class').html('<div class="alert alert-danger"><strong>Failed to Add.</strong></div>');
            }
            
          });
     }
    }
    );
     loadIntes();
  }

);
function initMap() {
  // The location of Uluru
//
  var uluru = {lat: -25.344, lng: 131.036};
  if($('#locale_cord').val()!=""){
    locl=($('#locale_cord').val()).split(',');
    if(locl.length==2){ 
    uluru = {lat: parseFloat(locl[0])  , lng:parseFloat(locl[1])  };
    }
  }
  // The map, centered at Uluru
  var map = new google.maps.Map(
      document.getElementById('map'), {zoom: 4, center: uluru});
  // The marker, positioned at Uluru
  var marker = new google.maps.Marker({position: uluru, map: map});
}
    </script>
  <script src="https://maps.googleapis.com/maps/api/js?key=&libraries=places&callback=initMap" async defer></script>
