<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "inventory";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
//query
$sql = "SELECT * FROM stock";
$result = mysqli_query($conn, $sql);


// setelah tombol submit add catalog ditekan :
if (isset($_POST["submit1"])) {
	$productname = $_POST["productname"];
	$variant		 = $_POST["variant"];
	$type		 		 = $_POST["type"];
	$subcategory = $_POST["subcategory"];
	$category 	 = $_POST["category"];
	$class 		 	 = $_POST["class"];
	$manufacturer= $_POST["manufacturer"];
	$upc 		 		 = $_POST["upc"];
// insert data into database
	// query
	$query1 = "INSERT INTO product VALUES ('', '$productname', '$variant', '$type', '$subcategory', '$category', '$class', '$manufacturer','$upc')";
	mysqli_query($conn,$query1);
	echo "data success";
}

// setelah tombol submit receiving ditekan
if (isset($_POST["submit2"])) {
	$iwdate 		= $_POST["iwdate"];
	$idproduct	= $_POST["idproduct"];
	$qtyin			= $_POST["qtyin"];
	$unit 			= $_POST["unit"];
	$sender 		= $_POST["sender"];
	$sjnum 			= $_POST["sjnum"];
	$receiver		= $_POST["receiver"];
// insert data into database
	// query
	$query2 = "INSERT INTO stock_in VALUES ('', '$iwdate', '$idproduct', '$qtyin', '$unit', '$sender', '$sjnum', '$receiver')";
	mysqli_query($conn,$query2);
	echo "data success";
}

// setelah tombol submit ditekan
if (isset($_POST["submit3"])) {
	$fwdate 			= $_POST["fwdate"];
	$idproduct		= $_POST["idproduct"];
	$qtyout				= $_POST["qtyout"];
	$unit 				= $_POST["unit"];
	$destination 	= $_POST["destination"];
	$sjnum 				= $_POST["sjnum"];
	$sender				= $_POST["sender"];
// insert data into database
	// query
	$query3 = "INSERT INTO stock_out VALUES ('', '$fwdate', '$idproduct', '$qtyout', '$unit', '$destination', '$sjnum', '$sender')";
	mysqli_query($conn,$query3);
	echo "data success";
}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
	<title>Inventory Overview</title>
	<nav class="navbar navbar-expand-sm bg-light navbar-light sticky-top">
	  <ul class="navbar-nav">
	    <li class="nav-item active">
	      <a class="nav-link" href="#">Active</a>
	    </li>
	    <li class="nav-item">
	      <a class="nav-link" href="#">Link</a>
	    </li>
	    <li class="nav-item">
	      <a class="nav-link" href="#">Link</a>
	    </li>
	    <li class="nav-item">
	      <a class="nav-link disabled" href="#">Disabled</a>
	    </li>
	  </ul>
	</nav>
</head>

<br>
<br>

<body>
	<div class="container">
		<div class="row">
			<div class="col-md-9">
				<div class="card">
					<div class="card-body">
						<h3>Stock Overview</h3>
						<table class="table">
							<thead class="table-primary">
								<th>No.</th>
								<th>Items</th>
								<th>Quantity</th>
								<th>Unit</th>
								<th>Location</th>
							</thead>
							<?php
							 $i=1;
							 while ($stock = mysqli_fetch_assoc($result)) :
							 ?>
							<tr>
								<td><?php echo $i ?></td>
								<td><?php echo $stock[
									'product'] ?></td>
								<td><?php echo $stock[
									'quantity'] ?></td>
								<td><?php echo $stock[
									'unit'] ?></td>
								<td><?php echo $stock[
									'location'] ?></td>
							</tr>
							<?php
							$i++;
							endwhile; ?>
						</table>
					</div>
				</div>
			</div>
			<div class="col">
				<div class="card">
					<div class="card-body">
						<div class="d-grid gap-2 col mx-auto">
							<button type="button" class="btn btn-sm btn-outline-success" data-bs-toggle="modal" data-bs-target="#receiving">Stock Inflow</button>
							<button type="button" class="btn btn-sm  btn-outline-danger" data-bs-toggle="modal" data-bs-target="#sending">Stock Outflow</button>
							<button type="button" class="btn btn-sm btn-outline-primary" data-bs-toggle="modal" data-bs-target="#addcatalog">Add Product Catalog</button>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- Modal Inward -->
		<div class="modal fade" id="receiving" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
		  <div class="modal-dialog">
		    <div class="modal-content">
		      <div class="modal-header">
		        <h5 class="modal-title" id="staticBackdropLabel">Formulir Penerimaan Barang</h5>
		        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
		      </div>
		      <div class="modal-body">
		        <form action="" method="post">
		            <div class="mb-3">
		              <label class="form-label" for="iwdate">Tanggal Penerimaan : </label><br>
		              <input class="form-control" placeholder="Tanggal" type="date" name="iwdate" id="iwdate" required>
		            </div>
		            <div class="mb-3">
		              <label class="form-label" for="idproduct">Produk : </label><br>
		              <input class="form-control" placeholder="Nama Produk" type="text" name="idproduct" id="idproduct" required>
		            </div>
		            <div class="mb-3">
		              <label class="form-label" for="qtyin">Jumlah : </label><br>
		              <input class="form-control" placeholder="Jumlah Barang" type="text" name="qtyin" id="qtyin" required>
		            </div>
		            <div class="mb-3">
		              <label class="form-label" for="unit">Satuan : </label><br>
		              <input class="form-control" placeholder="Satuan" type="text" name="unit" id="unit" required>
		            </div>
		            <div class="mb-3">
		              <label class="form-label" for="sender">Terima dari : </label><br>
		              <input class="form-control" placeholder="Pengirim" type="text" name="sender" id="sender" required>
		            </div>
		            <div class="mb-3">
		              <label class="form-label" for="sjnum">Nomor Surat Jalan : </label><br>
		              <input class="form-control" placeholder="Nomor Surat" type="text" name="sjnum" id="sjnum" required>
		            </div>
		            <div class="mb-3">
		              <label class="form-label" for="receiver">Penerima : </label><br>
		              <input class="form-control" placeholder="Nama Penerima" type="text" name="receiver" id="receiver" required>
		            </div>
		            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
		              <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Batal</button>
		              <button type="submit" name="submit2" class="btn btn-primary">Simpan</button>
		            </div>
		          </form>
		      </div>
		    </div>
		  </div>
		</div>
		<!-- Modal Forward-->
		<div class="modal fade" id="sending" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
		  <div class="modal-dialog">
		    <div class="modal-content">
		      <div class="modal-header">
		        <h5 class="modal-title" id="staticBackdropLabel">Formulir Pengiriman Barang</h5>
		        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
		      </div>
		      <div class="modal-body">
		        <form action="" method="post">
		            <div class="mb-3">
		              <label class="form-label" for="fwdate">Tanggal Pengiriman : </label><br>
		              <input class="form-control" placeholder="Tanggal" type="date" name="fwdate" id="fwdate" required>
		            </div>
		            <div class="mb-3">
		              <label class="form-label" for="idproduct">Produk : </label><br>
		              <input class="form-control" placeholder="Nama Produk" type="text" name="idproduct" id="idproduct" required>
		            </div>
		            <div class="mb-3">
		              <label class="form-label" for="qtyout">Jumlah : </label><br>
		              <input class="form-control" placeholder="Jumlah Barang" type="text" name="qtyout" id="qtyout" required>
		            </div>
		            <div class="mb-3">
		              <label class="form-label" for="unit">Satuan : </label><br>
		              <input class="form-control" placeholder="Satuan" type="text" name="unit" id="unit" required>
		            </div>
		            <div class="mb-3">
		              <label class="form-label" for="destination">Tujuan : </label><br>
		              <input class="form-control" placeholder="Tujuan" type="text" name="destination" id="destination" required>
		            </div>
		            <div class="mb-3">
		              <label class="form-label" for="sjnum">Nomor Surat Jalan : </label><br>
		              <input class="form-control" placeholder="Nomor Surat" type="text" name="sjnum" id="sjnum" required>
		            </div>
		            <div class="mb-3">
		              <label class="form-label" for="sender">Pengirim : </label><br>
		              <input class="form-control" placeholder="Nama Pengirim" type="text" name="sender" id="sender" required>
		            </div>
		            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
		              <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Batal</button>
		              <button type="submit" name="submit3" class="btn btn-primary">Simpan</button>
		            </div>
		        </form>
		      </div>
		    </div>
		  </div>
		</div>
		<!-- Modal Add Catalog-->
		<div class="modal fade" id="addcatalog" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
		  <div class="modal-dialog">
		    <div class="modal-content">
		      <div class="modal-header">
		        <h5 class="modal-title" id="staticBackdropLabel">Formulir Penambahan Katalog</h5>
		        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
		      </div>
		      <div class="modal-body">
		        <form action="" method="post">
		            <div class="mb-3">
		              <label for="productname" class="form-label">Nama Produk : </label><br>
		              <input type="text" class="form-control" name="productname" placeholder="Nama Produk" id="productname" required>
		            </div>
		            <div class="mb-3 ">
		              <label for="variant"class="form-label">Varian : </label><br>
		              <input type="text" class="form-control" placeholder="Varian" name="variant" id="variant" required>
		            </div>
		            <div class="mb-3 ">
		              <label for="type" class="form-label">Tipe : </label><br>
		              <input type="text" class="form-control" placeholder="Tipe" name="type" id="type" required>
		            </div>
		            <div class="mb-3 ">
		              <label for="subcategory"class="form-label">Sub-kategori : </label><br>
		              <input type="text" class="form-control" placeholder="Sub-kategori" name="subcategory" id="subcategory" required>
		            </div>
		            <div class="mb-3 ">
		              <label for="category" class="form-label">Kategori : </label><br>
		              <input type="text" class="form-control" placeholder="Kategori" name="category" id="category" required>
		            </div>
		            <div class="mb-3 ">
		              <label for="class" class="form-label">Kelas : </label><br>
		              <select name="class" id="class" class="form-select form-select-lg mb-3" aria-label=".form-select-lg example required">
		                <option selected="">--Pilih Satu--</option>
		                <option value="rawmaterial">Raw Material</option>
		                <option value="component">Component</option>
		                <option value="wip">Work In Process</option>
		                <option value="finished">Finished Product</option>
		                <option value="other">Other</option>
		              </select>
		            </div>
		            <div class="mb-3 ">
		              <label for="manufacturer" class="form-label">Produsen : </label><br>
		              <input type="text" class="form-control" placeholder="Produsen" name="manufacturer" id="manufacturer" required>
		            </div>
		            <div class="mb-3 ">
		              <label for="upc" class="form-label">No. Barcode : </label><br>
		              <input type="text" class="form-control" placeholder="No. Barcode" name="upc" id="upc" required>
		            </div>
		            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
		              <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Batal</button>
		              <button type="submit" name="submit1" class="btn btn-primary">Tambahkan ke Katalog</button>
		            </div>
		          </form>
		      </div>
		    </div>
		  </div>
		</div>
	</div>
	<?php mysqli_close($conn); ?>
</body>
</html>