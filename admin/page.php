<?php
$do = isset($_GET['do']) ? $_GET['do'] : 'Manage';

if ($do == 'Manage') {
	echo "Welcome To Manage Category Page";
	echo '<a href="page.php?do=Add">Add Category Page +</a>';
	echo '<a href="page.php?do=Edit">Edit Categoty/Member Page +</a>';
}elseif ($do == 'Add') {
	echo "Welcome To Add Product/Member Category Page";
}
elseif ($do == 'Edit') {
	echo "Welcome To Edit Category Page";
}else{
	echo "There's no page with this address";
}

?>