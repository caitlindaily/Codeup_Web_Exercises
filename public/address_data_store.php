<?php

require_once('classes/filestore.php');

class AddressDataStore extends Filestore
{

  public $addressBook = [];

  public function __construct($filename = 'address_book.csv')
  {
	//checks for files entered are automatically all lowercase
	$filename = strtolower($filename);
	parent::__construct($filename);
  }

}



