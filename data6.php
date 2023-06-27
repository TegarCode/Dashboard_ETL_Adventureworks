
<?php
require('koneksi.php');

$sql1 = "SELECT p.ProductCategory kategori, t.bulan as bulan, sum(fs.SubTotal) as pendapatan FROM product p, fact_sales fs, time t 
WHERE (p.ProductID = fs.ProductID) AND (t.time_id = fs.Time_id) AND fs.Time_id 
LIKE '2004%' AND t.bulan NOT IN(7) GROUP BY kategori, bulan";

$sql2 = "SELECT p.ProductCategory kategori, sum(fs.SubTotal) as pembagi 
FROM product p 
JOIN fact_sales fs ON fs.ProductID = p.ProductID 
JOIN time t ON t.time_id = fs.Time_id 
WHERE fs.Time_id LIKE '2004%' AND t.bulan NOT IN(7) GROUP BY kategori";

$result1 = mysqli_query($conn,$sql1);
$result2 = mysqli_query($conn,$sql2);

$pendapatan = array();
$pembagi = array();

while ($row = mysqli_fetch_array($result1)) {
    array_push($pendapatan,array(
        "pendapatan"=>$row['pendapatan'],
        "bulan" => $row['bulan'],
        "kategori" => $row['kategori']
    ));
}

while ($row = mysqli_fetch_array($result2)) {
    array_push($pembagi,array(
        "kategori" => $row['kategori'],
        "pembagi"=>$row['pembagi']
    ));
}

$arrayLength2 = count($pembagi);
$arrayLength = count($pendapatan);

$a = 0;
$i = 0;
$hasil = array();

function countPersen($nilai, $pembagi){

    return $nilai/$pembagi*100;
}

$hasil = array();
foreach ($pembagi as $item) {
    foreach ($pendapatan as $dapat) {
        if ($item["kategori"]==$dapat["kategori"]){
            array_push($hasil,array(
                "kategori" => $dapat['kategori'],
                "persen" => countPersen(floatval($dapat["pendapatan"]), floatval($item["pembagi"])),
                "bulan" => $dapat['bulan']
            ));

        }

        $i++;
    }

}

$data6 = json_encode($hasil);

?>