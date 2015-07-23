
<?php
require('base/db.php');


// sql to delete a record
$id = intval($_GET['id']);
$sql = "DELETE FROM content WHERE id='".$id."'";

if ($conn->query($sql) === TRUE) {
    print "Cтаттю не видалено";
} else {
    print "Статтю  видалено";
}


?> 



