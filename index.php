<?php
//(filename).php?ref=(example) MUST BE SET
if (isset($_GET['ref'])) { //Get ref parameter, and progress script.
    $ref = $_GET['ref'];
    function test_user($ref) {
        $ref = trim($ref);
        $ref = stripslashes($ref);
        $ref = htmlspecialchars($ref);
        return $ref;
    }
} else {$ref="";} //If ref not set, leave empty and progress to MAIN SITE.

if ($ref === "") {
    header("location: PUT MAIN SITE LINK HERE");
} else {
    //mySQL Configuration.
    $dbhost = "localhost"; //host 
    $dbuser = "USERNAME"; //Database username.
    $dbpass = "PASSWORD"; //Database password.
    $dbname = "DATABASE"; //Database name.
    $dbtable = "ReferencesCollector"; //Databases' table name.
    $columnone = "referenceName"; //Column name you set on your PHPMyAdmin.
    $columntwo = "requestedTimes"; //Second column name.

    // Search for existing reference in database.
    $con = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

    $sql="SELECT * FROM $dbtable WHERE $columnone = '$ref'";

    if ($result=mysqli_query($con,$sql))
    {$rowcount=mysqli_num_rows($result); mysqli_free_result($result);}

    if ($rowcount === 0) {$i=1;} //If request returns a rowcount of 0, will set I to 1 and progress my script.

    if ($i===1) {
        //Creates a reference id of $ref, and 1 in database.
        $conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
        $sql = "INSERT INTO `$dbtable` (`$columnone`, `$columntwo`) VALUES ('$ref', '1');";

        if ($conn->query($sql) === TRUE) {$a=1;} else {$a=0;} $conn->close(); //If the MySQL query goes well, will set A to 1 and progress.
    } else {
        //Because I is equal to 0, we'll update the counter instead in reference to $ref.
        $conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
        $sqlif = "UPDATE $dbtable SET $columntwo=$columntwo+1 WHERE $columnone = '$ref'";

        if ($conn->query($sqlif) === TRUE) {$a=1;} else {$a=0;} $conn->close(); //If the MySQL query goes well, will set A to 1 and progress.
    }

    if ($a===1) { //Progress with loading the body which will run Javascript, as PHP headers have already been set in the past.
?>

<html>

<head>

</head>

<body onload="redirect()">

</body>

<?php 
    }
}
?>

<script language=javascript>
function redirect(){
  window.location = "PUT SITE TO BE REDIRECTED TO HERE";
}
</script>

</html>
