## Penjelasan Sistem

Berikut merupakan keterangan dari masing-masing point yang diberikan sebagai take home test mini project untuk rekrutmen MRP Indonesia:
1. Nama project inventory-akbar
2. Bootstrap dan jquery telah terinstall
3. Migration, model, dan seeder telah dibuat. Untuk menjalankan seeder menggunakan perintah `php artisan db:seed --class=ProductHistorySeeder`
4. Query untuk menampilkan data sesuai contoh
```
SELECT MAX(kode) AS kode, nama, SUM(harga) AS total_harga, COUNT(*) AS total_barang, CASE WHEN COUNT(*) = 1 THEN 'Baru' ELSE 'Penambahan' END AS status
FROM product_histories
GROUP BY nama
ORDER BY nama ASC;
```
5. API untuk menampilkan data sesuai query point 4 dapat diakses dengan route "{{base_url}}/api/product-histories". "{{base_url}}" diubah sesuai localhost dan port masing-masing
6. View untuk menampilkan data berdasarkan API pada point 5 telah dibuat dan dapat diakses pada live server masing-masing
7. 
8. Project sudah diupload ke github dan email bersangkutan sudah diinvite