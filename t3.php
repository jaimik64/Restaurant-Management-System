<?php
session_start();
    if(isset($_SESSION['ct']) || isset($_SESSION['cart'])){
        //print_r($_SESSION['ct']);
        //print_r($_SESSION['cart']);
?>
<form method = "post" action="t3.php">
            <h3 class="title2">Order Details</h3>
            <div class="table-responsive">
                <table class="table" id="cart-1">
                <tr>
                    <th width="30%">Product Name</th>
                    <th width="10%">Quantity</th>
                    <th width="13%">Price Details</th>
                    <th width="10%">Total Price</th>
                    <th width="17%">Remove Item</th>
                </tr>

                <?php
                    if(!empty($_SESSION["cart"])){
                        $total = 0;
                        foreach ($_SESSION["cart"] as $key => $value) {
                            ?>
                            <tr>
                                <td><?php echo $value["item_name"]; ?></td>
                                <td><?php echo $value["item_quantity"]; ?></td>
                                <td><?php echo $value["product_price"]; ?> &#8377;</td>
                                <td>
                                    <?php echo number_format($value["item_quantity"] * $value["product_price"], 2); ?> &#8377;</td>
                                <td><a href="t3.php?action=delete&id=<?php echo $value["product_id"]; ?>"><span
                                            class="text-danger">Remove Item</span></a></td>

                            </tr>
                            <?php
                            $total = $total + ($value["item_quantity"] * $value["product_price"]);
                        }
                            ?>
                            <tr>
                                <td colspan="3" align="right" style="text-align: right; padding-right:7%;">Total</td>
                                <td align="right"> <?php echo number_format($total, 2); ?> &#8377;</td>
                                <td></td>
                            </tr>
                            <?php
                        }
                        $_SESSION['total'] = $total;
                    ?>
                </table>
            </div>
      <?php 
            if (isset($_GET["action"])){
				if ($_GET["action"] == "delete"){
					foreach ($_SESSION["cart"] as $keys => $value){
						if ($value["product_id"] == $_GET["id"]){
							unset($_SESSION["cart"][$keys]);
							echo '<script>alert("Product has been Removed...!")</script>';
							echo '<script>window.location="t3.php"</script>';
						}
					}
				}
			}
			
	?>
	<?php
    }
    else{
        echo 'sorry';
    }
	?>