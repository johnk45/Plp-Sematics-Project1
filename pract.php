<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "gsc";

$conn = new mysqli($servername, $username, $password, $dbname);

if($conn->connect_error){
    die("connection failed: ".$conn->connect_error);

}else{
    echo "connection successful";
}
$sql = "SELECT 
EmpID,
CONCAT(LastName,' ',MiddleI,' ',FName) AS FullName,
DateOfHire,
Salary,
SkillID,
ProjectID
FROM employee  ";

$result = $conn->query($sql);

echo "<h2>Employee Information</h2>";
echo "<table border='1'>
<tr>
<th>EmpID</th>
<th>Full Name</th>
<th>Date Of Hire</th>
<th>Salary</th>
<th>SkillID</th>
<th>ProjectID</th>
</tr>";
//process the result set
if($result->num_rows > 0){
    //output data of each row
    while($row = $result->fetch_assoc()){
        echo "<tr>";
        echo "<td>".$row["EmpID"]."</td>";
        echo "<td>".$row["FullName"]."</td>";
        echo "<td>".$row["DateOfHire"]."</td>";
        echo "<td>".$row["Salary"]."</td>";
        echo "<td>".$row["SkillID"]."</td>";
        echo "<td>".$row["ProjectID"]."</td>";
        echo "</tr>";
    }
} else {
    echo "0 results";
}
$conn->close();
?>