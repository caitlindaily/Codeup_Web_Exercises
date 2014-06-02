<?php

$addressBook = [];
function store_entry($addressBook) 
{  
    $handle = fopen('address_book.csv', 'a');
   	fputcsv($handle, $addressBook);
    fclose($handle);
}


if (!empty($_POST)) {
	$addressBook[]; = htmlspecialchars(strip_tags($_POST['name']));
}
if (!empty($_POST)) {
	$addressBook[] = htmlspecialchars(strip_tags($_POST['address']));	
}
if (!empty($_POST)) {
	$addressBook[] = htmlspecialchars(strip_tags($_POST['state']));
}
if (!empty($_POST)) {
	$addressBook[] = htmlspecialchars(strip_tags($_POST['zipcode']));
}
if (!empty($_POST)) {
	$addressBook[] = htmlspecialchars(strip_tags($_POST['phone']));
}

store_entry($addressBook);
var_dump($_POST);
?>

<!DOCTYPE html>
<html>
<head>
	<title>Address Book</title>
</head>
<body>
<form method="POST">
	<h1>Address Book</h1>
	<p>
		<table>
			<? foreach ($addressBook as $entry) : ?>
			<?= "<tr><th>$entry</th></tr>"; ?>
			<? endforeach; ?>	
		</table>	
	</p>
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
	</p>	
</form>
</body>
</html>


