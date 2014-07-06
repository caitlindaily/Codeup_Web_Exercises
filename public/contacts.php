<?php
//Establish Database connection
$dbc = new PDO('mysql:host=127.0.0.1;dbname=address_book', 'caitlin', 'delinda');
$dbc->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


try {
	//--Adding Todo Items--//
	if (!empty($_POST['name'])) {
		if (empty($_POST['name']) || (strlen($_POST['name']) > 10)) {
				throw new Exception("Post cannot be empty or longer than 10 characters.");
			}	
		$query = "INSERT INTO contacts ('first_name') VALUES (:first_name)";
		$stmt = $dbc->prepare($query);

		$stmt->bindValue(':first_name', $_POST['name'], PDO::PARAM_STR);
		$stmt->execute();
	} 
	//--Delete an item--//
	if (isset($_POST['remove'])) {
		$stmt = $dbc->prepare('DELETE FROM contacts WHERE id = :id');
		$stmt->bindValue(':id', $_POST['remove'], PDO::PARAM_INT);
		$stmt->execute();
		header('Location: /contacts.php');
		exit(0);
	}
} catch (Exception $e) {
	$msg = $e->getMessage() . PHP_EOL;
}

//--Determining Max Items Per Page--//
$limit = 5;
$count = $dbc->query('SELECT count(*) FROM contacts')->fetchColumn();
$numPages = ceil($count / $limit);

//--Pagination Buttons--//
$page = isset($_GET['page']) ? $_GET['page'] : 1;
$nextPage = $page + 1;
$prevPage = $page - 1;
$offset = ($page - 1) * $limit;
	
//--Applying Item Limit & Offset Number--//
$stmt = $dbc->prepare('SELECT * FROM contacts LIMIT :limit OFFSET :offset');
$stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
$stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
$stmt->execute();
//--Retrieve Contact Data--//
$contactInfo = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>
<html>
<head>
	<title>Address Book: Contacts</title>
	<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
</head>
<body>

<div class="container">

	<h1>Address Book: Contacts</h1>

	<table class="table table-striped">
		<tr>
			<th>Id</th>
			<th>Name</th>
			<th># of Addresss</th>
			<th>Actions</th>
		</tr>
		<? foreach($contactInfo as $index => $contact): ?>
			<tr>
				<? foreach ($contact as $value): ?>
					 <td> <?= htmlspecialchars(strip_tags($value)) ?> <button class="btn btn-small btn-danger btn-remove" data-contact="">Remove</button></td>
				<? endforeach; ?>
				<td><?="<a href=\"/address_book.php?index={$index}\">Remove Item</a>";?></td>
			</tr>
		<? endforeach; ?>
		</tr>
	</table>

	<div class="clearfix"></div>

	<h2>Add New Contact</h2>
	<form class="form-inline" role="form" action="contact.php" method="POST">
		<div class="form-group">
			<label class="sr-only" for="name">Name</label>
			<input type="text" name="name" id="name" class="form-control" placeholder="Name">
		</div>
		
		<button type="submit" class="btn btn-default btn-success">Add Contact</button>
	</form>

</div>

<form id="remove-form" action="contacts.php" method="post">
	<input id="remove-id" type="hidden" name="remove" value="">
</form>

<script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
 <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
<script>

$('.btn-remove').click(function () {
	var contactId = $(this).data('contact');
	if (confirm('Are you sure you want to remove contact ' + contactId + '?')) {
		$('#remove-id').val(contactId);
		$('#remove-form').submit();
	}
});

</script>

</body>
</html>