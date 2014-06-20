<?php

//Refers to class file that reads and writes files
require_once('classes/filestore.php');

$addressBook = [];
$newAddress = [];

$ads = new Filestore('address_book.csv');
$addressBook = $ads->read();

if (count($_FILES) > 0 && $_FILES['file1']['error'] == 0) {
	if ($_FILES['file1']['type'] == 'text/csv') {
		$upload_directory = '/vagrant/sites/codeup.dev/public/uploads/';
		$filename = basename($_FILES['file1']['name']);
		$saved_file = $upload_directory . $filename;
		move_uploaded_file($_FILES['file1']['tmp_name'], $saved_file);	
		
		$uploaded_file = new Filestore($saved_file);
		$addressUploaded = $uploaded_file->read();
		$addressBook = array_merge($addressBook, $addressUploaded);
		$ads->write($addressBook);
		
	}else {
		echo "Please upload csv file only.";
	}
}

try {
	if (!empty($_POST)) {
		foreach($_POST as $value) {
			if(strlen($value) > 30) {
				throw new Exception("Characters cannot exceed 25 characters.");
			} 
			$newAddress[] = $value;
		}
		array_push($addressBook, $newAddress);
		$ads->write($addressBook);
	}
} catch (Exception $e) {
	$msg = $e->getMessage() . PHP_EOL;
}	

if(isset($_GET['index']))
{
	$index = $_GET['index'];
	unset($addressBook[$index]);
	$addressBook = array_values($addressBook);
	$ads->write($addressBook);
	header('Location: /address_book.php');
	exit(0);
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Address Book</title>
</head>
<body>
	<? if(isset($msg)) : ?>
		<h2><?= $msg; ?></h2>
	<? endif; ?>	
	<table>
		<tr>
		   <th>Name</th>
		   <th>Address</th>
		   <th>City</th>
		   <th>State</th>
		   <th>Zip</th>
		   <th>Phone</th>
		</tr>
		<? foreach($addressBook as $index => $contact): ?>
			<tr>
				<? foreach ($contact as $value): ?>
					 <td> <?= htmlspecialchars(strip_tags($value)) ?> </td>
				<? endforeach; ?>
				<td><?="<a href=\"/address_book.php?index={$index}\">Remove Item</a>";?></td>
			</tr>
		<? endforeach; ?>
		</tr>
	</table>
<form method="POST">
	<h1>Address Book</h1>
	<p>
		<p>
			<label for="name">Full Name </label>
			<input id="name" name="name" type="text" placeholder="Full Name" required><br>
		</p>
		<p>
			<label for="address">Address </label>
			<input id="address" name="address" type="text" placeholder="Address" required><br>
		</p>
		<p>
			<label for="city">City </label>
			<input id="city" name="city" type="text" placeholder="City" required><br>
		</p>
		<p>
			<label for="state">State </label>
			<input id="state" name="state" type="text" placeholder="State" required><br>
		</p>
		<p>	
			<label for="zipcode">Zip </label>
			<input id="zipcode" name="zipcode" type="text" placeholder="Zipcode" required><br>
		</p>
		<p>
			<label for="phone">Phone </label>
			<input id="phone" name="phone" type="text" placeholder="Phone" required><br>
		</p>
		<p>
			<button type="submit">Add New Entry</button>
		<p/>
</form>
<form method="POST" enctype="multipart/form-data">
	<h2>Upload a File</h2>
		<p>	
			<label for="file1">Upload File: </label>
			<input type="file" id="file1" name="file1">
		</p>
		<p>
			<input type="submit" value="upload">
		</p>		
	</form>	
</body>
</html>


