
<?php

// Sql server configuration
$serverName = "localhost\SQLServer";
$dbUserName = "";
$dbPassword = "";
$dbName = "";

// Create Connection

try {

    $conn = new PDO ( "sqlsrv:Server=$serverName; 
                       Database=$dbName", 
                       $dbUserName , 
                       $dbPassword );

    $conn -> setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );


} catch (PDOException $e) { 

    die ( "Error connecting to database SQL Server: ".$e->getMessage() );

}



