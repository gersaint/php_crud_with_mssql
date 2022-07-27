<?php

    // echo "<p> prueba </p>"

    //-----------------------------------------------------------------------|
    // Ejemplo #1 > Conectar utilizando autenticación Windows.
    /*
    $serverName = "localhost\sqlexpress";
    $connectioninfo = array( "Database" => "master" );
    $conn = sqlsrv_connect( $serverName, $connectioninfo );
    
    if ( $conn ) {
        echo " Conexión establecida. Prueba 1 <br /> ";        
    } else {
        echo " Conexión no se pudo establecer. <br /> ";
        die( print_r (  sqlsrv_errors(), true ) );
    }
    */

    //-----------------------------------------------------------------------|
    // Ejemplo #2 > Conectar especificando nombre de usuario y contraseña.

    $serverName = "localhost\sqlexpress"; //serverName\instanceName
    $connectionInfo = array( "Database"=>"master", "UID"=>"", "PWD"=>"");
    $conn = sqlsrv_connect( $serverName, $connectionInfo);

    if( $conn ) {
        echo "Conexión establecida. Prueba 2<br />";
    }else{
        echo "Conexión no se pudo establecer.<br />";
        die( print_r( sqlsrv_errors(), true));
    }


    /* -------------------------------------------------------------------- */
    
    // Verificar si se instalaron bien los dlls
    // Nombre de los dlls:
    //      extension=php_sqlsrv_81_ts_x64.dll
    //      extension=php_pdo_sqlsrv_81_ts_x64.dll
    //
    // * Abrir shell de xampp o donde este alojado el php y checar la versión 
    // * de este para poder instalar los dlls correctos
    
    //---------------------------------------------------------------------
    
    /*  Resultado de hacer el query:
        data source=DESKTOP-JACU2RN\SQLEXPRESS;initial catalog=master;trusted_connection=true
    */

    // new PDO("sqlsrv:127.0.0.1/MSSQLSERVER01;database=master", "", "");
    // new PDO("sqlsrv:server=localhost/SQLEXPRESS;database=master", "", "");

    /* -------------------------------------------------------------------- */

    /*
    //// How to get the connection String from a database
    select
        'data source=' + @@servername +
        ';initial catalog=' + db_name() +
        case type_desc
            when 'WINDOWS_LOGIN' 
                then ';trusted_connection=true'
            else
                ';user id=' + suser_name() + ';password=<<YourPassword>>'
        end
        as ConnectionString
    from sys.server_principals
    where name = suser_name()

    */

?>