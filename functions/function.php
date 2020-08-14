<?php

/*
==========================================================
= Title function that Echo The Page Title In Case The Page 
= has the Variable $pageTitle and Echo Default Title For  
= Others Page
==========================================================
*/

function getTitle(){
	global $pageTitle;
	if (isset($pageTitle)) {
		echo $pageTitle;
	}else{
		echo "Default";
	}
}


/*
*	[ This Function Accept Parameters ]
*	$theMsg = Echo The Message [Error | Success | Warning ]
*   $url = The Link You Want To Redirect to
*	$seconds = Seconds Before Redirectin
*/

function redirectHome($theMsg, $url = null, $seconds = 3){
		if( $url === null ){
			$url = 'index.php';
			$link = 'Homepage';
		}	
		else{
			// Condition ? True : False
			$url = isset($_SERVER['HTTP_REFERER']) && $_SERVER['HTTP_REFERER'] !== '' ? $_SERVER['HTTP_REFERER'] : 'index.php';	
			$link = 'Previous Page';		
		}
		echo $theMsg;

		echo "<div class='alert alert-info'>You Will Be Redirected to $link After $seconds seconds</div>";

		header("refresh:$seconds;url=$url");

		exit();
	}


/*
*	Check Items Function v 1.0
*	Function to Check info into Database
* 	$select = The Item To Select [ Example: users, Items, Category ]
*	$from = The Table to Select From [ Example: users, Items, Category ]+
*	$value = The Value Of Select [ Example: Faisal, Box, Electronics ]
*/

function checkItem( $select, $from, $value ){
		global $con;
		$statement = $con->prepare("SELECT $select FROM $from WHERE $select = ?");
		$statement->execute(array($value));
		$count = $statement->rowCount();
		return $count;
	}



/*
*	Check Items Function v 1.0
*	Function to Check info into Database
* 	$select = The Item To Select [ Example: users, Items, Category ]
*	$from = The Table to Select From [ Example: users, Items, Category ]+
*	$value = The Value Of Select [ Example: Faisal, Box, Electronics ]
*/


function countItems( $item, $table){

	global $con;
	$statement2 = $con->prepare("SELECT COUNT($item) FROM $table");
	$statement2 -> execute();
	echo $statement2-> fetchcolumn();

}


/*
** Get Latest Records Function v1.0
** Function to Get Latest Items From Database [Users, Items, Comments]
** $select = Field To Select
** $table = The Table to Choose From
** $limit = Number To Get the Limit	
*/


function getLatest($select, $table, $order, $limit){

	global $con;
	$get_statement = $con->prepare("SELECT $select FROM $table ORDER BY $order DESC LIMIT $limit");
	$get_statement->execute();
	$rows = $get_statement->fetchAll();
	return $rows;

}

/*function getGroupid($table, $column){

	global $con;
	$gIDstatement = $con-> prepare("SELECT * FROM $table WHERE $column = 0");
	$gIDstatement -> execute();
	$rows = $gIDstatement->fetchAll();
	return $rows;
}*/


?>
