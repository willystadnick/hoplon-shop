<div class="product_item">
	<span class="name"><?php echo $name; ?></span>
	<?php if ($off) { ?>
		<del><?php echo $price_formatted; ?></del>
		<span class="sale_price"><?php echo $sale_price_formatted; ?></span>
		<span class="sale">(<?php echo $off_formatted; ?> off)</span>
	<?php } else { ?>
		<span class="price"><?php echo $price_formatted; ?></span>
	<?php } ?>
	<a href="#" onclick="comprar_item('checkout.php?id=<?php echo $id; ?>', '<?php echo $price_formatted; ?>')">Buy</a>
</div>
