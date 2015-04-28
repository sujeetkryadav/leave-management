<?php
namespace Repository;
interface User {
	
	public function selectAll();
	
	public function find($id);

	public function deleteAll();

	public function delete($id);
	
}