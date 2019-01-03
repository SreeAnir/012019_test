
<style type="text/css">
.left-home{
	margin-left: 20px;
    border: 1px solid #e8e8e8;
    padding: 10px;
    border-radius: 10px;
    background-color: #7d96ac;
}
.content-home{
	margin-left: 20px;
    border: 1px solid #e8e8e8;
    padding: 10px;
    border-radius: 10px;
    background-color: #7d96ac;
}
</style>
<div class="row">
  <input type="text"  id="interest">
  <input type="button" id="save_interest" value="Add">
  <!-- <div class="col-sm-4">
<div class="left-home">
	<p>kjdfnb jkdfv</p>
	<p>kjdfnb jkdfv</p>
	<p>kjdfnb jkdfv</p>
	<p>kjdfnb jkdfv</p>
</div>
  </div>
  <div class="col-sm-8">
<div class="content-home">
	<p>kjdfnb jkdfv</p>
	<p>kjdfnb jkdfv</p>
	<p>kjdfnb jkdfv</p>
	<p>kjdfnb jkdfv</p>
</div>
  </div> -->
</div>
<script>
$(document).ready(
  function(){
    $('#save_interest').on('click',function(){
      let interest=$('#interest').val();
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
            console.log(msg);
          });
     }
    }
    );
  }
);
</script>