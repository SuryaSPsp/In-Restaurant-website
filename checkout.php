  <header class="masthead">
	
        <div class="container h-100">
			
            <div class="row h-100 align-items-center justify-content-center text-center">
			
                <div class="col-lg-10 align-self-end mb-4 page-title">
					
                	<h3 class="text-white">Checkout</h3>
                    <hr class="divider my-4" />

                </div>
                
            </div>
        </div>
    </header>
    <div class="container">
        <div class="card">
            <div class="card-body">
                <form action="" id="checkout-frm">
					<center>
                    <h2>Confirm Delivery Information</h2>
					</center>
			<label for="" class="control-label">Table Number</label>
                        <input type="text" name="table_no" required="" class="form-control" value="<?php echo $_SESSION['login_table_no'] ?>">

					</div>
		
                    
                    <div class="text-center">
                        <button class="btn btn-block btn-outline-primary" onclick="openpopup()">Place Order</button>
                    </div>
                </form>
            </div>
        </div>
        
        <div class="popup" id="popup">
			<img src="./assets/img/netfilx.png">
			<img src="./assets/img/amazon.png">
			<img src="./assets/img/hotstar.png">
			<img src="./assets/img/kids.png">
			<img src="./assets/img/jiocinema.png">
			<h2>THANK YOU</h2>
			<p>your order has been placed successfully</p>
			<p> You can watch your fav movies or video here using the above entertainer apps </p>
			<button type="button"><a href="./index.php">NO THANKS</a></button>
</div>
<style>

		.popup{
			width: 1000px;
			background: #fff;
			border-radius: 6px;
			position: absolute;
			top: 0;
			left: 50%;
			transform: translate(-50%,-50%) scale(0.1);
			text-align: center;
			padding: 0 30px 30px;
			color: #333;
			visibility: hidden;
			transition: transform 0.2s, top 0.2s;
		}
		.openpopup{
			visibility: visible;
			top: 75%;
			transform: translate(-50%,-50%) scale(1);
		}
		.popup img{

			justify-content: space-between;
			width: 150px;
			margin-top: 50px;
			padding: 7px;
			border-radius: 50%;
			box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
		}
		.popup h2{
			font-size: 38px;
			font-weight: 500;
			margin: 30px 0 10px;
		}
		.popup button{
			width: 100%;
			margin-top: 50px;
			padding: 10px 0;
			background: #6fd649;
			color: #fff;
			border:0;
			outline: none;
			font-size: 18px;
			border-radius: 4px;
			cursor: pointer;
			box-shadow: 0 5px 5px rgba(0, 0, 0, 0.2);
		}
</style>
<script type="text/javascript">
	let popup = document.getElementById("popup");
	function openpopup(){
		popup.classList.add("openpopup");
	}
	
</script>
    <script>
    $(document).ready(function(){
          $('#checkout-frm').submit(function(e){
            e.preventDefault()
          
            
            $.ajax({
                url:"admin/ajax.php?action=save_order",
                method:'POST',
                data:$(this).serialize(),
                success:function(resp){
                    if(resp==1){
                        alert_toast("Order successfully Placed.")
                        
                    }
                }
            })
        })
        })

    </script>


	
	<style>
		header.masthead{
			background: url("assets/img/background.jpg");
			background-repeat: no-repeat;
			background-size: cover;
		}
	</style>