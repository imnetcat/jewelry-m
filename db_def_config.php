<?
include "db.php";

$query ="CREATE TABLE  IF NOT EXISTS items (
    id INT(20) NOT NULL,
    image VARCHAR(60) NOT NULL,
    filter_1 VARCHAR(60) NOT NULL,
    filter_2 VARCHAR(60) NOT NULL,
    filter_3 VARCHAR(60) NOT NULL,
    filter_4 VARCHAR(60) NOT NULL,
    filter_5 VARCHAR(60) NOT NULL,
    description VARCHAR(600) NULL
)";
if(mysqli_query($database, $query)){
}else{
	echo  mysqli_error($database);
}

?>
