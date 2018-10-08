<?php
session_start();
if( !isset($_SESSION['sess_user'] )){
	header("Location: login.php");
}
echo $_SESSION['sess_user'];
require_once("dbcontroller.php");
$db_handle = new DBController();
if(!empty($_GET["action"])) {
  switch($_GET["action"]) {
    case "logout":
      session_destroy();
      header("Location: login.php");

  //		$db_handle->runQuery("INSERT INTO orders(orderid,	id,	username,	ordertime) VALUES(1234,1, 'Leia', 2019-01-02)");

    break;

    case "return":
    unset($_SESSION["cart_item"]);
    header("Location: index.php");
    break;

  }
  }
?>
<HTML>
<HEAD>
<TITLE>Simple PHP Shopping Cart</TITLE>
<link href="style.css" type="text/css" rel="stylesheet" />
</HEAD>
<BODY>
<div class="topnav">
  <a id="logout" href="receipt.php?action=logout">Logout</a>
    <a id="logout" href="receipt.php?action=return">Return to Shopping cart</a>
</div>
<div id="shopping-cart">
<div class="txt-heading">Receipt</div>

<?php
if(isset($_SESSION["cart_item"])){
    $total_quantity = 0;
    $total_price = 0;
?>
<table class="tbl-cart" cellpadding="10" cellspacing="1">
<tbody>
<tr>
<th style="text-align:left;">Name</th>
<th style="text-align:left;">Code</th>
<th style="text-align:right;" width="5%">Quantity</th>
<th style="text-align:right;" width="10%">Unit Price</th>
<th style="text-align:right;" width="10%">Price</th>
</tr>
<?php
    foreach ($_SESSION["cart_item"] as $item){
        $item_price = $item["quantity"]*$item["price"];
		?>
				<tr>
				<td><img src="<?php echo $item["image"]; ?>" class="cart-item-image" /><?php echo $item["name"]; ?></td>
				<td><?php echo $item["code"]; ?></td>
				<td style="text-align:right;"><?php echo $item["quantity"]; ?></td>
				<td  style="text-align:right;"><?php echo "kr: ".$item["price"]; ?></td>
				<td  style="text-align:right;"><?php echo "kr: ". number_format($item_price,2); ?></td>
				</tr>
				<?php
				$total_quantity += $item["quantity"];
				$total_price += ($item["price"]*$item["quantity"]);
		}
		?>

<tr>
<td colspan="2" align="right">Total:</td>
<td align="right"><?php echo $total_quantity; ?></td>
<td align="right" colspan="2"><strong><?php echo "kr: ".number_format($total_price, 2); ?></strong></td>
<td></td>
</tr>
</tbody>
</table>
  <?php
} else {
?>
<div class="no-records">Your Cart is Empty</div>
<?php
}
?>
</div>


</BODY>
</HTML>
