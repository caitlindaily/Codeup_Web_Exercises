<?php

$addressBook = [];
$filename = 'address_book.csv';
$newAddress = [];

function read($filename) 
{
	$entries = [];
	$handle = fopen($filename, 'r');
	while (!feof($handle)) {
		$row = fgetcsv($handle);
		if(is_array($row)) {
			$entries[] = $row;
		}
	}
	fclose($handle);
	return $entries;
}

function write($newArray, $filename) 
{  
    $handle = fopen($filename, 'w');
    foreach ($newArray as $fields) {
		fputcsv($handle, $fields);
	}
	fclose($handle);
}

$addressBook = read($filename);

if (!empty($_POST)) {
	foreach($_POST as $value) {
		$newAddress[] = $value;
	}
	array_push($addressBook, $newAddress);
	write($addressBook, $filename);
}
// if (!empty($_POST)) {
// 	$newAddress[] = htmlspecialchars(strip_tags($_POST['name']));
// }
// if (!empty($_POST)) {
// 	$newAddress[] = htmlspecialchars(strip_tags($_POST['address']));	
// }
// if (!empty($_POST)) {
// 	$newAddress[] = htmlspecialchars(strip_tags($_POST['city']));
// }		
// if (!empty($_POST)) {
// 	$newAddress[] = htmlspecialchars(strip_tags($_POST['state']));
// }
// if (!empty($_POST)) {
// 	$newAddress[] = htmlspecialchars(strip_tags($_POST['zipcode']));
// }
// if (!empty($_POST)) {
// 	$newAddress[] = htmlspecialchars(strip_tags($_POST['phone']));
// }




var_dump($_POST);
?>

<!DOCTYPE html>
<html>
<head>
	<title>Address Book</title>
</head>
<body>
	<table>
		<? foreach ($addressBook as $entry) : ?>
		<tr>
			<? foreach ($entry as $value) :?>
				<td><?=$value;?></td>
			<? endforeach; ?>	
		</tr>
		<? endforeach; ?>
	</table>
<form method="POST">
	<h1>Address Book</h1>
	<p>
			
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


