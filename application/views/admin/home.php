
<div class="spinner-loader-inner" style="display:none;">
            <div class="spinloader"></div>
        </div> 
   <div class="cotent-list">      
<div class="container">
  <h2>Welcome</h2>
   
<div class="well">
Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
</div>
 
</div>
<style type="text/css">
.container{
  width: 100%;
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