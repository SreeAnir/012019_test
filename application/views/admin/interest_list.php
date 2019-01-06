
	<div class="spinner-loader-inner" style="display:none;">
				<div class="spinloader"></div>
			</div> 
			<div class="cotent-list">
	<?php
	if (!isset($results)|| empty($results)) {
		echo "<p class='no-msg alert alert-danger'>Nothing Found</p>";
	}else{ ?>
	<p class="list-group-item list-group-item-light">
		<span class="label-span">
		 <label class="list-input text-item" type="text">
	  Interest   
	  </label>
		 </span> 
		<span class="label-span2 action-link">
		<a data-rel="18" class="edit_item">Added On</a> 
		   </p>

	<?php
	foreach ($results as $data) {
	?>
	<p class="list-group-item list-group-item-light">
		<span  class="label-span">
		 <label  class="list-input text-item" type="text" >
	   <?php echo $data->keyword; ?>
	   </label>
		 </span> 
		<span class="label-span2 action-link" > 
	 <?php 
	$date = strtotime($data->updated_at); 
	$new_date = date('d M Y h:m A', $date);
	echo $new_date; 
	 ?>
	 
	 
	 </span></p>
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
	.save_item {
	  display: none;
	}
	.action-link{
	  width: 120px;
	}
	.action-link a{
	 color: #818085;
		width: 120px;
		display: inline-block;
		text-decoration: none;
		text-align: center;
		line-height: 17px;
		cursor: default;
	}
	.action-link a:hover{
	  color: #818085;
		display: inline-block;
			text-decoration: none;

	}
	.no-msg{
	  width: 90%;
	  margin-left: 20px;
	}
	.bar{
	  width: 4px;
	}
	.text-item{
	  color: #605d5d;
	  width:30%;
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
	  
	});
	</script>