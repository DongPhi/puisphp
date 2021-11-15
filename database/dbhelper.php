<?php 
require_once('config.php');
function execute($sql){
    //Open connection
    $conn = mysqli_connect(HOST, USERNAME, PASSWORD, DATABASE);
    mysqli_set_charset($conn,'UTF-8');

    //query
    mysqli_query($conn, $sql);

    //close connection
    mysqli_close($conn);
}
// SQL: select -> lấy dữ liệu đầu ra
function executeResult($sql, $isSingle = false){
    $data = null;

    //Open connection
    $conn = mysqli_connect(HOST, USERNAME, PASSWORD, DATABASE);
    mysqli_set_charset($conn, 'UTF-8');

    //query
    $resultset = mysqli_query($conn, $sql);
    if($isSingle){
        $data = mysqli_fetch_array($resultset, 1);
    }else{
        $data = [];
        while(($row = mysqli_fetch_array($resultset, 1)) != null ) {
            $data[] = $row;    
        }
    }
    

    //close connection
    mysqli_close($conn);

    return $data;
}
?>
