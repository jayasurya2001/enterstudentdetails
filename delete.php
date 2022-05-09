<?php
    session_start();
    require_once "./database/Database.php";
    if ($_SESSION['username'] == null){
        echo "<script>alert('Please login.')</script>";
        header("Refresh:0 , url = newindex.html");
        exit();
}
    $delete_num = $_GET['usn'];
    $sql_delete =  "DELETE FROM students WHERE usn = '$delete_num'";
    $query_delete = mysqli_query($conn,$sql_delete);
    if(!$row){
        echo "<script>alert('Success Deleted')</script>";        
        header("Refresh: 0 , url = secondpage.php");
        exit();

    }
    else{
        echo "<script>alert('Fail Delete')</script>";
        header("Refresh: 0 , url = secondpage.php");
        exit();

    }
    mysqli_close($conn);
?>