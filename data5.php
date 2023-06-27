
<?php
require('koneksi.php');

$sql = "SELECT product.ProductCategory, 
SUM(fact_sales.SubTotal) AS SubTotal, 
(SUM(SubTotal) / (SELECT SUM(SubTotal) 
FROM fact_sales)) * 100 AS 'persentase' 
FROM fact_sales 
JOIN product ON product.ProductID = fact_sales.ProductID 
JOIN time t ON t.time_id = fact_sales.Time_id
WHERE fact_sales.ProductID = product.ProductID AND fact_sales.Time_id LIKE '2004%' AND t.bulan NOT IN(7)
GROUP BY product.ProductCategory";

$result = mysqli_query($conn,$sql);

$hasil = array();

while ($row = mysqli_fetch_array($result)) {
    array_push($hasil,array(
        "name"=>$row['ProductCategory'],
        "total"=>$row['SubTotal'],
        "y"=>$row['persentase']
    ));
}

$data5 = json_encode($hasil);

?>