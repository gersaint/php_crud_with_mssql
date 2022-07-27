
<?php

    //start session
    if( !session_id () ) {
        session_start();
    }

    //Retrieve session data
    $sessData = !empty($_SESSION['sessData'])?$_SESSION['sessData']:'';

    //Get Status message from session
    if ( !empty($_SESSION['status']['msg'] )) {
        $status = $sessData['status']['msg'];
        $statusMsgType = $sessData['status']['type'];

        unset($_SESSION['sessData']['status']);
    }

    // include database configuration file
    require_once 'dbConfig.php';

    // fetch the data from SQL Server
    $sql = "SELECT * FROM Members ORDER BY MemberID DESC";
    $query = $conn->prepare($sql);
    $query->execute();
    $members = $query->fetchAll( PDO::FETCH_ASSOC );

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous"--> 
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <title>PHP MSQLSERVER CRUD</title>

</head>
<body>

<div class="container">

    <h2> PHP CRUD with MS SQL SERVER </h2>

    <!-- Display status message -->
    <?php if(!empty($statusMsg) && ($statusMsgType == 'success')) { ?>        
        <div class="col-xs-12">
            <div class="alert alert-success"> <?php echo $statusMsg; ?> </div>
        </div>
    <?php } elseif ( !empty($statusMsg) && ($statusMsgType == 'error')) { ?>
        <div class="col-xs-12">
            <div class="alert alert-danger"> <?php echo $statusMsg; ?> </div>
        </div>
    <?php } ?>
    
    <div class="row">
        <div class="col-md-12 head">

            <h5>Members</h5>
            <!-- add link -->
            <div class="float-right">
                <a href = "addEdit.php" class="btn btn-success"><i class="fa fa-plus"></i> New Member </a>
            </div>
        </div>
    </div>

    <!-- List the members -->
    <table class="table table-striped table-bordered table-hover">
        <thead class="thead-dark">
            <tr>                
                <th> # </th>
                <th> First Name </th>
                <th> Last Name </th>
                <th> Email </th>
                <th> Country </th>
                <th> Created </th>
                <th> Action </th>
            </tr>
        </thead>
        <tbody>

            <?php 
            
                if(!empty($members)) { 
                    $count = 0; 
                    foreach( $members as $row ) {   
                        $count++; 
            ?>
            <tr>
                
                <td> <?php	echo $count; ?>             </td>   
                <td> <?php  echo $row['FirstName'] ?>   </td>   
                <td> <?php  echo $row['LastName'] ?>    </td>   
                <td> <?php  echo $row['Email'] ?>       </td> 
                <td> <?php  echo $row['Country'] ?>     </td> 
                <td> <?php  echo $row['Created'] ?>     </td>  
                <td>
                    <a href="addEdit.php?id=<?php echo $row['MemberID']; ?>" class="btn btn-warning">Edit</a>
                    <a href="userAction.php?action_type=delete&id=<?php echo $row['MemberID']; ?>" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this');"> Delete </a>

                </td>
            </tr>            
            
            <?php } } else {  ?>
            <tr> <td colspan="7"> No member(s) found...</td></tr>
            <?php } ?>
        </tbody>
    </table>

</div>
</body>
</html>
