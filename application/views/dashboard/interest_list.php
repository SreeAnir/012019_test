
<div class="spinner-loader-inner" style="display:none;">
            <div class="spinloader"></div>
        </div> 
        <div class="cotent-list">
<?php
if (!isset($results)|| empty($results)) {
    echo "<p class='no-msg alert alert-danger'>Nothing Found.Add New Interest.</p>";
}else{
foreach ($results as $data) {
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
}
}
?>


<div id="">
<ul class="pagination">
<!-- Show pagination links -->
<?php
foreach ($links as $link) {
    echo "<li>" . $link . "</li>";
}
?>
</ul>
</div>
</div>
<style type="text/css">
.no-msg{
  width: 90%;
  margin-left: 20px;
}
.save_item {
  display: none;
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
.action-link a:hover{
  color: #81  8085;
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

  $('.save_item,.edit_item').unbind('click');
  $('.edit_item').on('click',function(){
    $(this).hide();
    $(this).next('.save_item').show();
    let interest_id=$(this).attr('data-rel');
    $('#keyword_'+interest_id).removeAttr('readonly');
   });
  $('.save_item').on('click',function(){
      let interest_id=$(this).attr('data-rel');
      let keyword=$('#keyword_'+interest_id).val();
            $(this).hide();
            $(this).prev('.edit_item').show();
            $('#keyword_'+interest_id).attr('readonly', true);
           if(interest_id=="" || keyword==""){
             alert("Please change the content");
             return false;
           }else{
          $.ajax({
          method: "POST",
          url: "interest/add",
          data: { keyword:keyword,id:interest_id}
          })
          .done(function( msg ) {
            let resp=(JSON.parse(msg));
            if(resp.status==1){
              $('.message-class').html('<div class="alert alert-success"><strong>Updated.</strong></div>');
              loadIntes();
            }
            if(resp.status==0){
              $('.message-class').html('<div class="alert alert-danger"><strong>Nothing was Updated.</strong></div>');
            }
            
          });
     }
    });

$('.delete_item').on('click',function(){
            let interest_id=$(this).attr('data-rel');
            $('#keyword_'+interest_id).attr('readonly', true);
           if(interest_id==""){
             alert("No interest found");
             return false;
            }else{
            $.ajax({
            method: "POST",
            url: "interest/add",
            data: { status:0,id:interest_id}
            })
          .done(function( msg ) {
            let resp=(JSON.parse(msg));
            if(resp.status==1){
              $('.message-class').html('<div class="alert alert-success"><strong>Updated.</strong></div>');
              loadIntes();
            }
            if(resp.status==0){
              $('.message-class').html('<div class="alert alert-danger"><strong>Nothing was Updated.</strong></div>');
            }
            
          });
     }
    });


});
</script>