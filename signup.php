<?php 
session_start();
include('header.php');

?>
<head>
<style>
	h2{
		text-align: center;
		margin-bottom: 25px;
	}
	body{
		margin: 0;
		padding: 0;
		background-image: linear-gradient(rgba(65, 135, 158, 0.527), rgba(60, 66, 180, 0.511)), url(./assets/img/edit.jpg);
		background-repeat: no-repeat;    
		background-size: cover;
		box-sizing: border-box;
		z-index: -9999;
		height: 100vh;
	}
	.wrap{
		top: 8%;
		position: relative;
		max-width: 370px;
		border-radius: 20px;
		margin: auto;
		background: rgba(30, 17, 58, 0.8);
		padding: 20px 40px;
		color: #fff;
		box-sizing: border-box;
		z-index: 999;		
	}
	input[type=text], input[type=password]{
		width: 100%;
		box-sizing: border-box;
		padding: 12px 5px;
		background: rgba(0,0,0,0.10);
		outline: none;
		border: none;
		border-bottom: 1px solid #fff;
		color: #fff;
		border-radius: 5px;
		margin: 5px;
		font-weight: bold;
	}
	button{
		width: 100%;
		box-sizing: border-box;
		padding: 10px 0;
		margin-top: 35px;
		outline: none;
		border: none;
		background: linear-gradient(to right, #ff105f, #ffad06);
		border-radius: 20px;
		font-size: 20px;
		color: #fff;
	}
	button:hover{
		background: linear-gradient(to left, #ff105f, #ffad06);
	}
	@media screen and (max-width: 579px){
		.wrap{
		  top: 10%;
		}
	}
</style>
</head>

<body>
	

<div class="container-fluid wrap">
	<h2>Register</h2>
	<form action="" id="signup-frm">
		
			<input type="text" name="table_no" placeholder="Table number" required>
		
			<input type="password" name="password" placeholder="Password" required>
	
		<button type="submit" class="button">Create</button>
	</form>
</div>

</body>

<style>
	#uni_modal .modal-footer{
		display:none;
	}
</style>
<script>
	$('#signup-frm').submit(function(e){
		e.preventDefault()
		$('#signup-frm button[type="submit"]').attr('disabled',true).html('Saving...');
		if($(this).find('.alert-danger').length > 0 )
			$(this).find('.alert-danger').remove();
		$.ajax({
			url:'admin/ajax.php?action=signup',
			method:'POST',
			data:$(this).serialize(),
			error:err=>{
				console.log(err)
		$('#signup-frm button[type="submit"]').removeAttr('disabled').html('Create');

			},
			success:function(resp){
				if(resp == 1){
					location.href ="<?php echo isset($_GET['redirect']) ? $_GET['redirect'] : 'index.php?page=home' ?>";
				}else{
					$('#signup-frm').prepend('<div class="alert alert-danger">Table already exist.</div>')
					$('#signup-frm button[type="submit"]').removeAttr('disabled').html('Create');
				}
			}
		})
	})
</script>