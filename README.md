# AdventureWorks ETL Dashboard

Dashboard analitik berbasis web untuk menampilkan insight penjualan dari data AdventureWorks yang telah melalui proses ETL dan dimuat ke database relasional. Project ini dibuat sebagai portfolio data analyst/business intelligence untuk menunjukkan alur kerja dari integrasi data, pemodelan tabel analitik, hingga visualisasi performa bisnis.

Repository: https://github.com/TegarCode/Dashboard_ETL_Adventureworks

## Deskripsi Project

AdventureWorks ETL Dashboard digunakan untuk mengeksplorasi data penjualan melalui beberapa perspektif bisnis, seperti waktu, produk, wilayah, biaya pengiriman, dan alasan penjualan. Data hasil ETL disimpan dalam database MySQL/MariaDB, kemudian ditampilkan melalui halaman dashboard berbasis PHP.

Project ini cocok digunakan sebagai contoh implementasi sederhana dari:

- ETL untuk data penjualan
- Data warehouse sederhana
- Dashboard analitik berbasis web
- Visualisasi performa penjualan
- Integrasi data dengan database relasional
- Eksplorasi OLAP/Mondrian untuk analisis multidimensi

## Tujuan

- Mengintegrasikan data penjualan ke dalam database relasional.
- Menyediakan visualisasi performa penjualan secara ringkas dan interaktif.
- Membantu pengguna memahami tren penjualan berdasarkan waktu, produk, dan wilayah.
- Menampilkan insight bisnis dari data AdventureWorks.
- Mendukung kebutuhan portfolio di bidang data analyst, ETL, dan business intelligence.

## Tools dan Teknologi

| Kategori | Tools |
| --- | --- |
| Backend dashboard | PHP |
| Web server | Apache / Laragon |
| Database | MySQL / MariaDB |
| Visualisasi | Highcharts |
| Template UI | AdminLTE |
| ETL | Pentaho Data Integration (PDI) |
| OLAP | Mondrian |
| Query & data processing | SQL |

## Struktur Project

```text
Dashboard_ETL_Adventureworks/
├── index.php                  # Halaman utama dashboard
├── koneksi.php                # Konfigurasi koneksi database
├── datadashboard.php          # Query ringkasan dashboard utama
├── chartBarSales.php          # Visualisasi penjualan per wilayah/benua
├── chartLineSales.php         # Visualisasi tren penjualan
├── chartPieSales.php          # Visualisasi kategori produk
├── chartSalesReason.php       # Visualisasi alasan pembelian
├── chartBarFright.php         # Visualisasi biaya pengiriman
├── data*.php                  # Endpoint data untuk chart
├── iframe.php                 # Halaman integrasi Mondrian/OLAP
├── side-bar.php               # Navigasi dashboard
├── adventureworksetl_1.sql    # Dump database hasil ETL
├── mondrian/                  # File JSP untuk eksplorasi Mondrian
├── plugins/                   # Asset plugin AdminLTE
├── dist/                      # Asset AdminLTE
└── build/                     # Asset pendukung template
```

## Database

Project menggunakan database:

```text
adventureworksetl
```

File dump database:

```text
adventureworksetl_1.sql
```

Tabel utama yang digunakan:

| Tabel | Deskripsi |
| --- | --- |
| `fact_sales` | Tabel fakta penjualan |
| `product` | Dimensi produk |
| `reason` | Dimensi alasan penjualan |
| `territory` | Dimensi wilayah |
| `time` | Dimensi waktu |

Konfigurasi koneksi database berada di `koneksi.php`:

```php
$servername = "localhost";
$database = "adventureworksetl";
$username = "root";
$password = "";
```

## Proses ETL

Project ini merepresentasikan alur ETL sebagai berikut:

### 1. Extract

Data sumber AdventureWorks diambil sebagai basis analisis penjualan.

### 2. Transform

Data dibersihkan dan disusun ke dalam struktur analitik yang terdiri dari tabel fakta dan tabel dimensi, sehingga dapat digunakan untuk analisis multidimensi.

### 3. Load

Data hasil transformasi dimuat ke database relasional MySQL/MariaDB dan digunakan oleh dashboard untuk menghasilkan visualisasi.

## Insight Dashboard

Dashboard menyediakan insight seperti:

- Total penjualan.
- Rentang tahun data penjualan.
- Analisis penjualan berdasarkan wilayah/benua.
- Tren penjualan berdasarkan waktu.
- Distribusi penjualan berdasarkan kategori produk.
- Analisis alasan pembelian.
- Analisis biaya pengiriman.

## Fitur Dashboard

- Halaman ringkasan performa penjualan.
- Bar chart penjualan berdasarkan wilayah.
- Line chart tren penjualan.
- Pie chart kategori produk.
- Column chart alasan pembelian.
- Bar chart biaya pengiriman.
- Integrasi halaman Mondrian untuk eksplorasi OLAP.
- Navigasi dashboard menggunakan AdminLTE.

## Cara Menjalankan Project

### 1. Clone Repository

```bash
git clone https://github.com/TegarCode/Dashboard_ETL_Adventureworks.git
```

Jika menggunakan Laragon, letakkan project di:

```text
C:\laragon\www\Dashboard_ETL_Adventureworks
```

Atau gunakan nama folder lokal yang diinginkan, misalnya:

```text
C:\laragon\www\Pentahodashboard
```

### 2. Jalankan Apache dan MySQL

Gunakan Laragon/XAMPP/MAMP atau web server lokal lain yang mendukung PHP dan MySQL.

Pastikan service berikut aktif:

- Apache
- MySQL atau MariaDB

### 3. Buat Database

Buat database baru:

```sql
CREATE DATABASE adventureworksetl;
```

### 4. Import SQL Dump

Import file berikut ke database `adventureworksetl`:

```text
adventureworksetl_1.sql
```

Contoh menggunakan MySQL CLI:

```bash
mysql -u root -p adventureworksetl < adventureworksetl_1.sql
```

Jika root tidak memiliki password di lingkungan lokal:

```bash
mysql -u root adventureworksetl < adventureworksetl_1.sql
```

### 5. Sesuaikan Koneksi Database

Jika konfigurasi database berbeda, ubah file `koneksi.php`:

```php
$servername = "localhost";
$database = "adventureworksetl";
$username = "root";
$password = "";
```

### 6. Akses Dashboard

Jika project berada di folder `Pentahodashboard`:

```text
http://localhost/Pentahodashboard/
```

Jika menggunakan nama folder asli repository:

```text
http://localhost/Dashboard_ETL_Adventureworks/
```

## Mondrian / OLAP

Folder `mondrian/` berisi file JSP untuk eksplorasi OLAP. Untuk menjalankan Mondrian secara penuh, diperlukan Java servlet container seperti Apache Tomcat serta konfigurasi Mondrian/JPivot yang sesuai.

Contoh URL integrasi pada dashboard:

```text
http://localhost:8080/mondrian/testpage.jsp?query=Measure1
```

Jika tab Mondrian tidak terbuka, pastikan:

- Tomcat berjalan pada port `8080`.
- Webapp Mondrian sudah dideploy.
- Konfigurasi JDBC dan schema OLAP sudah sesuai.
- Database `adventureworksetl` sudah berhasil diimport.

## Use Case

Project ini dapat digunakan untuk:

- Portfolio data analyst/business intelligence.
- Demonstrasi proses ETL end-to-end.
- Pembelajaran dashboard PHP dan MySQL.
- Analisis data penjualan AdventureWorks.
- Eksplorasi konsep data warehouse sederhana.
- Demonstrasi OLAP menggunakan Mondrian.

## Nilai Portfolio

Project ini menunjukkan kemampuan dalam:

- SQL dan pemodelan data relasional.
- ETL dan integrasi data.
- Dashboard development.
- Data visualization.
- Business intelligence.
- Analisis performa penjualan.
- Integrasi PHP, MySQL, Highcharts, dan AdminLTE.

## Author

**Tegar Oktavianto Simbolon**  
Data Analyst | Information Systems Graduate

Fokus pada data analysis, ETL, dashboard development, machine learning, dan business intelligence.
