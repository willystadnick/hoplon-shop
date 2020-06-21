<form method="post">
	<div>
		* Mandatory fields.
	</div>
	<div class="alert">
		<?php echo $alert; ?>
	</div>
	<div>
		<label for="product_name">* Name</label>
		<input id="product_name" name="name" type="text" value="<?php echo $name; ?>" />
	</div>

	<div>
		<label for="product_price">* Price <?php echo $languages[$lang]['currency']; ?></label>
		<input id="product_price" name="price" type="number" value="<?php echo $price; ?>" />
	</div>

	<div>
		<label for="product_sale_start">Sale Start</label>
		<input id="product_sale_start" name="sale_start" type="text" value="<?php echo $sale_start_formatted; ?>" />
	</div>

	<div>
		<label for="product_sale_end">Sale End</label>
		<input id="product_sale_end" name="sale_end" type="text" value="<?php echo $sale_end_formatted; ?>" />
	</div>

	<div>
		<label for="product_sale_price">Sale Price <?php echo $languages[$lang]['currency']; ?></label>
		<input id="product_sale_price" name="sale_price" type="number" value="<?php echo $sale_price; ?>" />
	</div>

	<div>
		<label></label>
		<input type="submit" value="Submit" />
	</div>
</form>
