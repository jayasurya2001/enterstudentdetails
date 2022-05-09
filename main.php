<?php
if (isset($_POST['submit'])) {
    if (isset($_POST['name']) && isset($_POST['usn']) &&
         isset($_POST['address']) && isset($_POST['phone'])) {

        $name = $_POST['name'];
        $usn = $_POST['usn'];
        $address = $_POST['address'];
        $phno = $_POST['phone'];
        $host = "localhost";
        $dbUsername = "root";
        $dbPassword = "";
        $dbName = "student";
        $conn = new mysqli($host, $dbUsername, $dbPassword, $dbName);
        if ($conn->connect_error) {
            die('Could not connect to the database.');
        }
        else {
            $Select = "SELECT name FROM students WHERE name = ? LIMIT 1";
            $Insert = "INSERT INTO students(name, usn, address, phno) values(?, ?, ?, ?)";
	    
            $stmt = $conn->prepare($Select);
            $stmt->bind_param("s", $name);
            $stmt->execute();
            $stmt->bind_result($resultName);
            $stmt->store_result();
            $stmt->fetch();
            $rnum = $stmt->num_rows;
            if ($rnum == 0) {
                $stmt->close();
                $stmt = $conn->prepare($Insert);
                $stmt->bind_param("ssss",$name, $usn, $address, $phno);
                if ($stmt->execute()) {
                    echo "<script>alert('New record updated')</script>";
                   header("Refresh:0 , url = index.html");
                   exit();
                }
                else {
                    echo $stmt->error;
                }
            }
            else {
                $stmt->close();
                $stmt = $conn->prepare($Insert);
                $stmt->bind_param("ssss",$name, $usn, $address, $phno);
                if ($stmt->execute()) {
                    echo "<script>alert('New record updated')</script>";
                   header("Refresh:0 , url = index.html");
                   exit();
		}
                else {
                    echo $stmt->error;
                }
            }
            $stmt->close();
            $conn->close();
        }
    }
    else {
        echo "All field are required.";
        die();
    }
}
else {
    echo "Submit button is not set";
}
?>