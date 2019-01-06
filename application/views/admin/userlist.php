
	<div class="spinner-loader-inner" style="display:none;">
				<div class="spinloader"></div>
			</div> 
	   <div class="cotent-list">      
	<div class="container">
	  <h2>Users List</h2>
	 
		   
	<?php
	if (!isset($results) || empty($results)) {
		echo "<p class='alert alert-danger'>No Users Registerd</p>";
	}else{ ?>
 <table class="table">
		<thead>
		  <tr>
			<th>Name</th>
			<th>Email</th>
			<th>Gender</th>
			<th>View</th>
			<th>Action</th>
		  </tr>
		</thead>
		<tbody>

	<?php
	foreach ($results as $data) {
	?>
	 <tr>
			<td class="text-uppercase"><strong><?php echo  $data->first_name." ".$data->last_name ; ?></strong></td>
			<td> <?php echo  $data->email ; ?></td>
			 <td> <?php if( $data->gender=="") echo "Not specified" ; else echo $data->gender; ?></td>
			 
			 <?php $id_enc= base64_encode($data->id) ; ?>
			 <td><a href="<?php echo base_url().'admin/user_details/'.$id_enc ;?>">Details</a></td>
			 <td>
			  <span class="change_status enable"
			  <?php   if($data->status==1){ echo ' style="display:none" ' ; } ?>
				 data-rel="<?php echo $data->id ; ?>"><a >Enable</a></span>

			   <span class="change_status disable"
			  <?php   if($data->status==0){ echo ' style="display:none" ' ; } ?>
				 data-rel="<?php echo $data->id ; ?>"><a >Disable</a></span>
			   

			 </td>
		  </tr>
	 <?php
	}
	}
	?>
	 </tbody>
	  </table>
	</div>

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
	 

	$('.change_status').on('click',function(){
				let user_id=$(this).attr('data-rel');
				let pageOp="-1";
				$(this).hide();
				if($(this).hasClass('enable')){
				  pageOp=1;
				  $(this).next(".disable").show();
				}else{
				   pageOp=0;
				   $(this).prev(".enable").show();
				}
			   if(pageOp=="-1"){
				  return false;
				}else{
				$.ajax({
				method: "POST",
				dataType: "json",
				url: "../../user/change_status",
				data: { status:pageOp,id:user_id}
				})
			  .done(function( msg ) {
				let resp=(JSON.parse(msg));
				if(resp.status==1){
				  alert("Updated");
				 }
				if(resp.status==0){
				  alert("Nothing was Updated.");
				}
				
			  });
		 }
		});


	});
	</script>