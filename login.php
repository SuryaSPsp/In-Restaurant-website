<?php 
session_start();
include('header.php');
?>

<style>
	body{
		width: 100%;
	    height: calc(100%);
	    /*background: #007bff;*/
	}
	main#main{
		width:100%;
		height: calc(100%);
		background:white;
	}
	.login-right{
		position: absolute;
		right:0;
		width:40%;
		height: calc(100%);
		background:rgb(245, 255, 255);
		align-items: center;
	}
	#login-left{
		position: absolute;
		left:0;
		width:100%;
		height: 100%;
		display: flex;
		background-image: url(./assets/img/user.jpeg);
		background-repeat: no-repeat;
  background-attachment: fixed;
  background-position: center;
  background-size: cover;
	}
	.login-right .card{
		margin: 30% auto ;
	}
	h3{
		text-align: center;
		margin-bottom: 25px;
		color: rgba(47, 46, 51, 0.571);
	}
	.admin{
		margin-top: 5%;
		margin-left: 80%;
	}
	
</style>

<body>

	
	
<main id="main" class=" bg-dark">
  		<div id="login-left">
  			<div class="logo">
  				<!-- <img src="./assets/img/user.jpeg" alt=""> -->
  			</div>
  		</div>

<div class="login-right">
	<button type="button" class="button btn btn-primary admin"><a href="./admin/login.php" style="text-decoration: none; color:white">Admin</a></button>
   <div class="card col-md-8">
  				<div class="card-body">
					<h3>TABLE-Login</h3>
	<form action="" id="login-frm">
		<div class="form-group">
			<label for="" class="control-label">Table number</label>
			<input type="text" name="table_no" required="" class="form-control">
		</div>
		<div class="form-group">
			<label for="" class="control-label">Password</label>
			<input type="password" name="password" required="" class="form-control">
			
		</div>
		<button class="button btn btn-info btn-sm">Login</button><hr>
		<small>(or) &nbsp;<a href="signup.php" id="new_account">Create New Account</a></small>
	</form>
	
	           </div>
    </div>
</div>

</main>
</body>
<style>
	#uni_modal .modal-footer{
		display:none;
	}
</style>

<script>
	$('#new_account').click(function(){
		uni_modal("Create an Account",'signup.php?redirect=index.php?page=checkout')
	})
	$('#login-frm').submit(function(e){
		e.preventDefault()
		$('#login-frm button[type="submit"]').attr('disabled',true).html('Logging in...');
		if($(this).find('.alert-danger').length > 0 )
			$(this).find('.alert-danger').remove();
		$.ajax({
			url:'admin/ajax.php?action=login2',
			method:'POST',
			data:$(this).serialize(),
			error:err=>{
				console.log(err)
		$('#login-frm button[type="submit"]').removeAttr('disabled').html('Login');

			},
			success:function(resp){
				if(resp == 1){
					location.href ="<?php echo isset($_GET['redirect']) ? $_GET['redirect'] : 'index.php?page=home' ?>";
				}else{
					$('#login-frm').prepend('<div class="alert alert-danger">table no. or password is incorrect.</div>')
					$('#login-frm button[type="submit"]').removeAttr('disabled').html('Login');
				}
			}
		})
	})
</script>