<?php

class AddressDataStore 
{

	public $addressBook = [];
	public $filename = 'address_book.csv';
	public $newAddress = [];

	public function __construct($filename = 'address_book.csv')
	{
		$this->filename = $filename;
	}

	public function read() 
	{
		$entries = [];
		$handle = fopen($this->filename, 'r');
		while (!feof($handle)) {
			$row = fgetcsv($handle);
			if(is_array($row)) {
				$entries[] = $row;
			}
		}
		fclose($handle);
		return $entries;
	}

	public function write($newArray) 
	{  
	    $handle = fopen($this->filename, 'w');
	    foreach ($newArray as $fields) {
			fputcsv($handle, $fields);
		}
		fclose($handle);
	}
}