<?php
session_start();
require_once "database/Database.php";
$sql_fetch_todos = "SELECT * FROM students ORDER BY Name ASC";
$query = mysqli_query($conn, $sql_fetch_todos);

?>
<!doctype html>
<html lang="en">

<head>
    <title>View Details</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <style>
        body {
            font-family: "Mitr", sans-serif;
            background-color: rgb(255,255,255);
        }
        .header {
            position: fixed;
            top: 0px;
            left: 0px;
            right: 0px;
            height: 50px;
            padding: 5px 13px 11px 0px;
            width: 100%;
            color: blue;
            font-family: "Mitr", sans-serif;
            margin-top: 0px;
            bottom: 0;
            background-color: rgb(248, 140, 210);
        }
        .header p {
            margin-left: 20px;
            text-align: left;
        }
        .button-logout {
            position: relative;
            margin-top: -50px;
            margin-right: 20px;
            float: right;
            text-decoration: none;
            border: transparent;
            border-radius: 15px;
            background-color: #000000;
            padding: 5px 30px 5px 30px;
            color: white;
            transition: 0.5s;
        }
        .button-logout:hover {
            background-color: #D9ddd4;
            color: black;
        }
        .container {
            margin: 90px auto;
            margin-bottom: 50px;
            border-radius: 30px;
            text-align: center;
            background-color: white;
            width: 40%;
            padding-bottom: 10px;
        }
        table th,
        tr,
        td {
            border: 1px solid black;
            border-collapse: collapse;
            padding: 10px 0px 10px 0px;
        }
        table {
	    table-layout: fixed;
            width: 100%;
        }
        th {
            color: black;
            background-color: rgb(255,255,255);
        }
        tr {
            background-color: white;
	    width:50%;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        .timeregis {
            text-align: center;
        }
        .delete {
            text-align: center;
        }
        .delete .bdelete {
            border-radius: 15px;
            background-color: #000000;
            text-decoration: none;
            color: white;
            padding: 4px 20px 4px 20px;
            transition: 0.5s;
        }
        .delete .bdelete:hover {
            background-color: #000000;
            color: red;
        }
    </style>
</head>
<body>
<div>
<a name="" id="" class="button-logout" href="index.html" role="button">Back</a>
</div>
	<div class="container">
        <h1>List of Student Details:</h1></div>
	<div class="table-product">
        <table>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">USN</th>
                <th style ="width: 30%" scope="col">Address</th>
		<th scope="col">Phone Number</th>
                <th scope="col">Delete</th>
            </tr>
	    <tbody>
		<?php
                $id = 1;
                while ($row = mysqli_fetch_array($query)) { ?>
                    <tr>
                        <td scope="row"><?php echo $id ?></td>
                        <td><?php echo $row['Name'] ?></td>
                        <td><?php echo $row['usn'] ?></td>
                        <td><?php echo $row['Address'] ?></td>
			<td><?php echo $row['phno'] ?></td>
			<td class="delete"><a name="id" id="" class="bdelete" href="delete.php?usn=<?php echo $row['usn'] ?>" role="button">
                                Delete
                            </a></td>
</tr>
                <?php
                    $id++;
                } ?>
            </tbody>
        </table>
</div>
    <?php
    mysqli_close($conn);
    ?>
</body>
</html>
	