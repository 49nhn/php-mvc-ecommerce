<div class="container">
	<div class="modal-header border-bottom-0">
		<h5 class="modal-title" id="exampleModalLabel">
			Your Shopping Cart
		</h5>
	</div>
	<div class="modal-body">
		<table class="table table-image">
			<thead>
				<tr>
					<th scope="col"></th>
					<th scope="col">Product</th>
					<th scope="col">Price</th>
					<th scope="col" style="width: 12%;">Qty</th>
					<th scope="col">Total</th>
					<th scope="col">Actions</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<?php if (!$cartitems): ?>
					<td colspan="6" class="text-center">No items in cart</td>
					<?php else: ?>
					<?php for ($i = 0; $i < count($cartitems); $i++)
						: ?>
				<tr>
					<td class="">
						<img src="/Public/images/<?php echo $cartitems[$i]['img'] ?>" class="img-fluid img-thumbnail"
							alt="Sheep" style="max-width:60px">
					</td>
					<td>
						<?php echo $cartitems[$i]['name'] ?>
					</td>
					<td>
						<?php echo number_format($cartitems[$i]['price'], 0, ',', '.') ?>
					</td>
					<td class="qty ">
						<a class="btn btn-sm" href="/index.php?controller=cart&action=updateCart&productID=<?php echo $cartitems[$i]['product_id'] ?>&quantity=-1"
							>
							<i class="fa fa-minus-circle text-danger"></i>
						</a>
						<?php echo $cartitems[$i]['quantity'] ?>
						<a class="btn btn-sm " href="/index.php?controller=cart&action=updateCart&productID=<?php echo $cartitems[$i]['product_id'] ?>&quantity=1"
							>
							<i class="fa fa-plus-circle text-success"></i>
						</a>
					</td>
					<td>
						<?php echo number_format($cartitems[$i]['price'] * $cartitems[$i]['quantity'], 0, ',', '.') ?>
					</td>
					<td>
						<a href="/index.php?controller=cart&action=removeItem&productID=<?php echo $cartitems[$i]['product_id'] ?>"
							class="btn btn-danger btn-sm">
							<i class="fa fa-times"></i>
						</a>
					</td>
				</tr>
				<?php endfor; ?>
				<?php endif; ?>
				</tr>
			</tbody>
		</table>
		<div class="d-flex justify-content-end">
			<h5>Total: <span class="price text-success">
					<?php echo number_format($total, 0, ',', '.') ?>
				</span> VND
			</h5>
		</div>
	</div>
	<div class="modal-footer border-top-0 d-flex justify-content-between">
		<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
		<button type="button" class="btn btn-success">Checkout</button>
	</div>
</div>

<script>
	function updateCart(productID, action) {
		fetch('/index.php?controller=cart&action=updateCart&productID=' + productID + '&quantity=' + action)
			
		console.log(productID, action);
	}

</script>