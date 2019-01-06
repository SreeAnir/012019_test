
<div class="spinner-loader-inner" >
            <div class="spinloader"></div>
        </div> 
   <div class="cotent-list">      
<div class="container">
   <div class="row"><span class="title1"> <h3>Users Details</h3></span>

    <p class="title2"><span>Search By Interest</span><input type="text" id="search_user" class="search_input"> </p>
  </div>

   <?php 
    if(empty($results)){
    echo "<h3>No User for this search</h3>";
   }else{
    $data=$results[0];
    ?>
   <div class="well">
    <div class="row grid-container1">
      <p class="user-line">
        <input type='hidden' value='<?php echo $data->id ;?>' id='user_id' >
        <span>Name</span> : <span><?php echo $data->first_name; ?> <?php echo $data->last_name; ?></span>
      </p>
      <p class="user-line">
        <span>Email</span> : <span><?php echo $data->email; ?></span>
      </p>  
      <p class="user-line">
        <span>Gender</span> : <span> 
       <?php if( $data->gender=="") echo "Not specified" ; else echo $data->gender; ?>
     </span>
      </p> 
      <p class="user-line">
        <span>Location</span> : <span> 
       <?php if( $data->location=="") echo "Not specified" ; else echo $data->location; ?>
     </span>
      </p>
    </div>

   <div class="row">
    <div class="message-class"></div>
    <div id="intests_list">Nothing Added Yet.</div>
    </div>
    


<!-- 
<?php  if(!empty($keywords)){ ?>

<?php
foreach ($keywords as $data) {
?>
<p class="list-group-item">
    <span  class="label-span">
      <input id="keyword_<?php
    echo $data->id;
?>" class="list-input text-item" type="text" readonly value="<?php
    echo $data->keyword;
?>" >
    </span> 
    <span class="label-span2 action-link" ><a data-rel="<?php
    echo $data->id;
?>" class="edit_item" >Edit </a> 
      <a data-rel="<?php
    echo $data->id;
?>" class="save_item" style="display:none;" >Save </a>   <a data-rel="<?php
    echo $data->id;
?>" class="delete_item" data-rel="<?php
    echo $data->id;
?>"  > Delete </a>  </span></p>
 <?php
} }
?>
 -->





<?php  if(!empty($keywords)){ ?>
    <!-- <div class="grid-container2">
      <div class="row">
    <div class=""><label class="title_label">Interest Added By user</label></div>
    </div>
    <div class="row">
      <div class="row grid-list">
      <?php
      $count=0;
     


       foreach ($keywords as $key => $value) {
        $count++;
        ?>
      </span>
    <div class="col-sm-4 list-item"><?php echo $value->keyword; ?></div>
   
      <?php
        if($count==3){
          $count=0;  ?>
           </div><div class="row grid-list">
       <?php }
      }
      ?>
      </div> 
    </div>
   </div> -->
   <?php }
   }
   ?>
</div>
 
</div>
<style type="text/css">
.container{
  width: 100%;
}
.list-item{
 line-height: 26px;
    text-transform: capitalize;
    color: #818080;
}
.save_item {
  display: none;
}
.title_label{
  color: #60717f;
  margin-left: 25px;
}
.grid-container1 {
    width: 98%;
    padding: 5px;
    margin: 0 auto;
}
.grid-container2{
  border: 1px solid #d3c1c1;
  width: 98%;
  padding: 5px;
}
.grid-list{
  margin:0 auto;
  margin-left:10px;
}
.action-link a{
 color: #818085;
    width: 40px;
    display: inline-block;
    text-decoration: none;
    text-align: center;
    line-height: 17px;
    cursor: pointer;
}
.title1 {
    width: 15%;
    display: inline-block;
    margin-left: 25px;
}
.title2 {
    display: inline-block;
    width: 70%;
}
.search_input{
  width: 60%;
  color:#737374;
  padding :0 5px 0;
  margin-left: 20px;
}
.action-link a:hover{
  color: #818085;
    display: inline-block;
        text-decoration: none;

}
.bar{
  width: 4px;
}
.text-item{
  color: #605d5d;
}
.list-input:-moz-read-only { /* For Firefox */
  border: none;
  cursor: pointer;
}
.change_status a{
  cursor: pointer;
  text-decoration: none;
}
.change_status a:hover{
  cursor: pointer;
  text-decoration: none;
}
.list-input:read-only { 
  border: none;
  cursor: pointer;
}
 .spinner-loader-inner {
    background-color: #fff;
    height: 100%;
    left: 0;
    position: fixed;
    top: 0;
    width: 100%;
    z-index: 10000;
}
.spinloader {
    animation: 1.5s linear 0s normal none infinite running spinloader;
    background: #fed37f none repeat scroll 0 0;
    border-radius: 50px;
    height: 50px;
    left: 50%;
    margin-left: -25px;
    margin-top: -25px;
    position: absolute;
    top: 50%;
    width: 50px;
}
.spinloader::after {
    animation: 1.5s linear 0s normal none infinite running spinloader_after;
    border-color: #85d6de transparent;
    border-radius: 80px;
    border-style: solid;
    border-width: 10px;
    content: "";
    height: 80px;
    left: -15px;
    position: absolute;
    top: -15px;
    width: 80px;
}
@keyframes spinloader {
0% {
    transform: rotate(0deg);
}
50% {
    background: #85d6de none repeat scroll 0 0;
    transform: rotate(180deg);
}
100% {
    transform: rotate(360deg);
}
}
</style>
<script type="text/javascript">
$(document).ready(function(){
loadIntes();
$('#search_user').on('keypress change blur paste',function(){
   loadIntes();
    $('.spinner-loader').hide();
 })
 $('.spinner-loader-inner').fadeOut();

});

var reqVar=null;
function loadIntes(){
       // $('.spinner-loader-inner').show();
        let pagNum=1;
         if( $('.pagination .current').length > 0){
          pagNum=parseInt($('.pagination .current').html()) ; 
         }
         let user_id=$('#user_id').val();
         let searchKey=$('#search_user').val();
         if(searchKey!=""){
          pagNum=1;
         }

         reqVar= $.ajax({
          method: "POST",
          async:true,
          url: "../../user_interest/list/"+pagNum,
          data:{page_id:pagNum,user_id:user_id,search:searchKey},
		  beforeSend : function(){           
			if(reqVar != null) {
				reqVar.abort();
			}
			},
          } )
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
             event.preventDefault();
          });

          }
          });
    
  }
</script>