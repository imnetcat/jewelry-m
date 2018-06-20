<?
include "db.php";

$query ="CREATE TABLE  IF NOT EXISTS items (
    id INT(20) NOT NULL,
    image VARCHAR(60) NOT NULL,
    type VARCHAR(60) NOT NULL,
    stone VARCHAR(60) NOT NULL,
    technology VARCHAR(60) NOT NULL,
    filter_4 VARCHAR(60) NOT NULL,
    filter_5 VARCHAR(60) NOT NULL,
    description VARCHAR(600) NULL
)";
if(mysqli_query($database, $query)){
}else{
	echo  mysqli_error($database);
}

?>
