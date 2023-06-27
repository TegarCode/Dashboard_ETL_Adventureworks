<?php
require('koneksi.php');

$sql1 = "SELECT tr.CountryRegionCode, t.tahun, COUNT(fs.ProductID) AS pendapatan FROM fact_sales fs
JOIN territory tr ON tr.TerritoryID = fs.TerritoryID
JOIN time t ON t.time_id = fs.Time_id
GROUP BY tr.CountryRegionCode, t.tahun";

$result1 = mysqli_query($conn,$sql1);

$pendapatan = array();

while ($row = mysqli_fetch_array($result1)) {
    array_push($pendapatan,array(
        "pendapatan"=>$row['pendapatan'],
        "bulan" => $row['tahun'],
        "kategori" => $row['CountryRegionCode']
    ));
}

$data3 = json_encode($pendapatan);

?>