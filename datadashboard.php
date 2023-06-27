<?php
require('koneksi.php');

$sql1 = "SELECT  
SUM(fs.SubTotal) AS SubTotal, 
MIN(t.tahun) AS MinTahun, 
MAX(t.tahun) AS MaxTahun       
FROM fact_sales fs
JOIN time t ON t.Time_id = fs.Time_id
JOIN territory tr ON tr.TerritoryID = fs.TerritoryID;";

$result1 = mysqli_query($conn, $sql1);

$datadashboard1 = array();

while ($row = mysqli_fetch_array($result1)) {
    array_push($datadashboard1, array(
        "TotalSubTotal" => $row['SubTotal'],
        "MinTahun" => $row['MinTahun'],
        "MaxTahun" => $row['MaxTahun']
    ));
}

$data1 = json_encode($datadashboard1);


$sql1 = "SELECT COUNT(reason.SalesReasonID) AS SalesReason FROM reason;";

$result1 = mysqli_query($conn, $sql1);

$datadashboard2 = array();

while ($row = mysqli_fetch_array($result1)) {
    array_push($datadashboard2, array(
        "SalesReason" => $row['SalesReason']
    ));
}

$data2 = json_encode($datadashboard2);

$sql1 = "SELECT COUNT(DISTINCT `Group`) AS 'Group' FROM `territory`;";

$result1 = mysqli_query($conn, $sql1);

$datadashboard3 = array();

while ($row = mysqli_fetch_array($result1)) {
    array_push($datadashboard3, array(
        "Group" => $row['Group']
    ));
}

$data3 = json_encode($datadashboard3);
