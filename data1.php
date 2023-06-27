<?php
require('koneksi.php');

$sql1 = "SELECT time.tahun AS tahun, 
territory.Group AS Grup, 
SUM(fact_sales.SubTotal) AS SubTotal
FROM `fact_sales` 
JOIN Time ON time.time_id = fact_sales.time_id 
JOIN territory On territory.TerritoryID = fact_sales.TerritoryID 
GROUP BY time.tahun, territory.Group";

$result1 = mysqli_query($conn, $sql1);

$pendapatan = array();

while ($row = mysqli_fetch_array($result1)) {
    array_push($pendapatan, array(
        "SubTotal" => $row['SubTotal'],
        "tahun" => $row['tahun'],
        "Grup" => $row['Grup']
    ));
}

$data2 = json_encode($pendapatan);
