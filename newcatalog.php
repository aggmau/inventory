<?php  ?>

// establish database connection
	//check connection

// form fullfillment

// form data receive

// insert data into database
	// query

// showing latest change



<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Add Product to Catalog</title>
	<h1>Add Product to Catalog</h1>
</head>
<body>
	<form action="" method="post">
		<label for="productname">Nama Produk : </label><br>
		<input type="text" name="productname" id="productname" required><br>

		<label for="variant">Varian : </label><br>
		<input type="text" name="variant" id="variant" required><br>

		<label for="type">Tipe : </label><br>
		<input type="text" name="type" id="type" required><br>

		<label for="subcategory">Sub-kategori : </label><br>
		<input type="text" name="subcategory" id="subcategory" required><br>
		
		<label for="category">Kategori : </label><br>
		<input type="text" name="category" id="category" required><br>

		<label for="class">Kelas : </label><br>
		<select id="class" required>
			<option value="rawmaterial">Raw Material</option>
			<option value="component">Component</option>
			<option value="wip">Work In Process</option>
			<option value="finished">Finished Product</option>
			<option value="other">Other</option>
		</select><br>

		<label for="manufacturer">Produsen : </label><br>
		<input type="text" name="manufacturer" id="manufacturer" required><br>
		
		<label for="upc">No. Barcode : </label><br>
		<input type="text" name="upc" id="upc" required><br><br>
		
		<button type="submit">Add to Catalog</button>
	</form>
</body>
</html>
