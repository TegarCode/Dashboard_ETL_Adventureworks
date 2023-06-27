<?php
require('koneksi.php');

$sql = "
SELECT r.SalesReason, 
t.tahun, 
COALESCE(COUNT(f.SalesReasonID), 0) AS total_sales
FROM time t
CROSS JOIN reason r
LEFT JOIN fact_sales f ON t.time_id = f.time_id AND r.SalesReasonID = f.SalesReasonID
WHERE t.tahun BETWEEN 2001 AND 2004
GROUP BY r.SalesReason, t.tahun";
$result = mysqli_query($conn,$sql);

$hasil = array();

while ($row = mysqli_fetch_array($result)) {
    array_push($hasil,array(
        "kategori"=>$row['SalesReason'],
        "bulan"=>$row['tahun'],
        "pelanggan"=>$row['total_sales']
    ));
}

$data4 = json_encode($hasil);
?>