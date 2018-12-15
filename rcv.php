<?php 
/* Open connection to "zing_db" MySQL database. */
$mysqli = new mysqli("localhost","root","","baal");
 
/* Check the connection. */
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}
 

$data=mysqli_query($mysqli,"SELECT * FROM logs");
//echo"done to";
?>
<script>
var Voltage1=[<?php 
while($info=mysqli_fetch_array($data))
    echo $info['station'].','; /* We use the concatenation operator '.' to add comma delimiters after each data value. */

?>];




<?php
$data=mysqli_query($mysqli,"SELECT * FROM logs");
?>
var myLabels=[<?php 
while($info=mysqli_fetch_array($data))
    echo '"'.$info['Time'].'",'; /* The concatenation operator '.' is used here to create string values from our database names. */
?>];
        

        <?php
$data=mysqli_query($mysqli,"SELECT * FROM logs");
?>
var current1=[<?php 
while($info=mysqli_fetch_array($data))
    echo '"'.$info['status'].'",'; /* The concatenation operator '.' is used here to create string values from our database names. */
?>];
        <?php
$data=mysqli_query($mysqli,"SELECT * FROM logs");
?>

var power=[<?php 
while($info=mysqli_fetch_array($data))
    echo '"'.$info['Power'].'",'; /* The concatenation operator '.' is used here to create string values from our database names. */
?>];












</script>



    <?php
    /* Close the connection */
    $mysqli->close(); 



    ?>

