# PRODUCT REQUIREMENTS DOCUMENT (PRD)
## Sistem Pemesanan Makanan dan Minuman Berbasis Web Menggunakan QR Code

**Versi:** 1.0  
**Status:** Rancangan kebutuhan untuk pengembangan  
**Platform:** Website responsif  
**Teknologi:** Laravel dan MySQL  
**Target penggunaan:** Satu warung pada satu lokasi

---

## 1. Masalah

### 1.1 Latar Belakang

Proses pemesanan makanan dan minuman di warung secara konvensional masih mengandalkan pelanggan yang menyampaikan pesanan secara langsung kepada pemilik atau pegawai. Proses tersebut dapat menimbulkan beberapa kendala, seperti kesalahan pencatatan pesanan, kesulitan memantau pesanan dari beberapa meja, keterlambatan pelayanan, dan ketidaksesuaian perhitungan tagihan.

Selain itu, pemilik warung membutuhkan cara yang praktis untuk mengetahui pesanan baru, mengelola ketersediaan menu, memantau status pesanan, menggabungkan tagihan pelanggan berdasarkan meja, mencatat pembayaran, serta melihat laporan penjualan.

Oleh karena itu, diperlukan sistem pemesanan makanan dan minuman berbasis web yang memungkinkan pelanggan memesan melalui QR code di meja. Sistem ini diharapkan dapat membantu pemilik mengelola pesanan dan transaksi secara terpusat, meningkatkan ketepatan pencatatan, serta mempermudah pelayanan pelanggan.

### 1.2 Rumusan Masalah

1. Bagaimana menyediakan sistem pemesanan makanan dan minuman melalui QR code yang mudah digunakan pelanggan?
2. Bagaimana mengelola pesanan dari beberapa meja secara terpusat dan terstruktur?
3. Bagaimana menggabungkan tagihan pesanan tambahan dalam satu sesi meja?
4. Bagaimana mempermudah pencatatan pembayaran tunai dan QRIS?
5. Bagaimana menyediakan informasi status pesanan dan bukti transaksi secara digital?
6. Bagaimana membantu pemilik memantau penjualan harian dan bulanan?
7. Bagaimana menjaga keamanan data pesanan, pembayaran, akun admin, dan pencadangan database?

### 1.3 Tujuan Produk

Sistem dikembangkan untuk:

- Mempermudah pelanggan memesan makanan dan minuman secara mandiri.
- Mengurangi kesalahan pencatatan pesanan dan perhitungan tagihan.
- Membantu pemilik mengelola menu, meja, pesanan, dan pembayaran.
- Menyediakan pelacakan status pesanan secara daring.
- Menyediakan riwayat transaksi dan laporan penjualan yang dapat diunduh.
- Menjaga data tetap terorganisasi, aman, dan dapat dipulihkan melalui pencadangan.

---

## 2. Pengguna

Sistem memiliki dua kelompok pengguna utama.

### 2.1 Pelanggan

Pelanggan adalah pengunjung warung yang ingin memesan makanan atau minuman.

Kebutuhan pelanggan:

- Melihat informasi warung dan daftar menu.
- Mencari menu berdasarkan nama serta memfilter makanan dan minuman.
- Memindai QR code meja untuk mulai memesan.
- Memilih beberapa menu dan mengatur jumlahnya.
- Menambahkan catatan, seperti tanpa cabai atau es sedikit.
- Memeriksa ringkasan pesanan sebelum mengirimkannya.
- Melihat bukti pesanan digital.
- Memantau status pesanan melalui tautan unik dan kode akses.
- Meminta pembatalan sebelum pesanan diproses.
- Menambah pesanan selama sesi meja masih aktif.
- Melihat struk pembayaran setelah transaksi dinyatakan lunas.

Pelanggan tidak diwajibkan membuat akun. Nama pelanggan menjadi informasi yang diisi saat memesan, sedangkan nomor meja dideteksi otomatis dari QR code.

### 2.2 Admin atau Pemilik Warung

Admin adalah pemilik warung yang bertanggung jawab atas seluruh operasional sistem. Versi awal hanya memiliki satu peran admin dan tidak menyediakan akun terpisah untuk pegawai.

Kebutuhan admin:

- Mengelola menu, harga, foto, dan ketersediaan.
- Mengelola QR code dan status meja.
- Mengonfirmasi, menolak, dan memantau pesanan.
- Mengelola permintaan pembatalan.
- Melihat tagihan gabungan per meja.
- Mencatat pembayaran dan menyelesaikan sesi meja.
- Mengelola informasi warung dan jam operasional.
- Melihat riwayat transaksi serta laporan penjualan.
- Mengunduh laporan dalam format PDF.
- Mengelola akun dan memulihkan kata sandi.
- Melakukan pencadangan dan pemulihan database.

---

## 3. Fitur

### 3.1 Halaman Depan dan Informasi Warung

Website menyediakan halaman depan sederhana yang memuat:

- Nama warung.
- Alamat.
- Jam operasional.
- Deskripsi singkat warung.
- Nomor WhatsApp.
- Tautan Google Maps.
- Tombol **Lihat Menu**.

Seluruh informasi dapat diperbarui melalui dashboard admin.

Website menggunakan Bahasa Indonesia dan desain responsif agar nyaman digunakan pada telepon seluler maupun komputer.

### 3.2 Menu Makanan dan Minuman

Pelanggan dapat melihat menu yang berisi foto, nama, harga, dan status ketersediaan.

Fitur menu meliputi:

- Menampilkan daftar makanan dan minuman.
- Mencari menu berdasarkan nama.
- Memfilter menu berdasarkan jenis makanan atau minuman.
- Menampilkan item yang tersedia maupun habis.
- Mencegah pelanggan menambahkan item yang habis ke pesanan.

Admin dapat menambahkan, mengubah, dan menghapus menu serta mengelola foto, nama, harga, dan status ketersediaannya.

Item yang habis tetap terlihat, tetapi tidak dapat dipesan. Sistem tidak memerlukan penghitungan stok otomatis pada versi awal.

### 3.3 QR Code Meja

Setiap meja mempunyai QR code unik yang mengidentifikasi nomor meja.

Fitur meliputi:

- Menambahkan dan mengubah nomor meja.
- Membuat QR code untuk setiap meja.
- Menampilkan dan mengunduh QR code agar dapat dicetak secara terpisah.
- Menampilkan status meja tersedia atau ditempati.
- Mengarahkan pelanggan ke halaman pemesanan dengan nomor meja terdeteksi otomatis.
- Menolak pemesanan melalui QR code yang tidak valid atau tidak aktif.
- Menggunakan kembali QR code yang sama untuk sesi makan berikutnya.

QR code harus menggunakan alamat website yang dapat diakses melalui internet setelah sistem dipublikasikan.

### 3.4 Keranjang dan Pengiriman Pesanan

Pelanggan dapat memilih beberapa makanan dan minuman dalam satu keranjang.

Informasi pesanan meliputi:

- Nama pelanggan.
- Nomor meja yang terdeteksi dari QR code.
- Daftar menu.
- Jumlah setiap item.
- Catatan pesanan.
- Harga per item.
- Total harga.

Sebelum mengirim pesanan, pelanggan harus memeriksa ringkasan dan mengonfirmasinya.

Sistem harus mencegah pengiriman ganda akibat tombol ditekan berulang kali atau permintaan jaringan yang dikirim ulang. Pesanan hanya boleh tercatat satu kali untuk satu tindakan pengiriman yang sama.

Setelah pesanan berhasil disimpan, pelanggan melihat nomor pesanan dan bukti pesanan digital.

### 3.5 Konfirmasi dan Pengelolaan Pesanan

Pesanan baru masuk dengan status **Menunggu Konfirmasi**. Pemilik harus memeriksa dan menerima pesanan sebelum status berubah menjadi **Diproses**.

Admin dapat:

- Melihat antrean pesanan berdasarkan waktu masuk.
- Melihat nomor pesanan, meja, nama pelanggan, waktu, item, jumlah, dan catatan.
- Mengonfirmasi pesanan.
- Menolak pesanan yang tidak dapat dilayani dengan memberikan alasan.
- Mengubah atau membatalkan pesanan sebelum diproses.
- Memperbarui status pesanan setelah tahap pelayanan berubah.

Pesanan yang ditolak tetap disimpan dalam riwayat, tetapi tidak dihitung dalam tagihan aktif. Pelanggan dapat mengirim pesanan pengganti selama sesi meja masih aktif.

Status pesanan yang digunakan:

1. Menunggu Konfirmasi.
2. Diproses.
3. Disajikan.
4. Selesai.

Status pembayaran dikelola secara terpisah agar pesanan yang selesai disajikan tidak otomatis dianggap telah dibayar.

### 3.6 Pembatalan Pesanan

Pelanggan dapat mengajukan permintaan pembatalan sebelum pesanan diproses.

Alurnya:

1. Pelanggan mengajukan pembatalan melalui halaman pelacakan.
2. Sistem mencatat permintaan pembatalan.
3. Admin menerima notifikasi dan memeriksa permintaan.
4. Admin menyetujui atau menolak permintaan.
5. Sistem memperbarui status pesanan dan total tagihan sesuai hasil keputusan.

Setelah pesanan mulai diproses, pelanggan harus menghubungi pemilik secara langsung untuk membahas perubahan atau pembatalan.

### 3.7 Pelacakan Pesanan

Setiap pesanan memiliki tautan unik dan kode akses yang diberikan setelah pesanan berhasil disimpan.

Pelanggan dapat membuka halaman pelacakan tanpa membuat akun. Halaman tersebut menampilkan nomor pesanan, nomor meja, rincian pesanan, total harga, dan status terkini.

Perubahan status dari dashboard harus tercermin pada halaman pelanggan tanpa mengharuskan pelanggan mengirim pesanan baru.

Tautan dan kode akses harus sulit ditebak dan hanya memberikan akses kepada pesanan yang sesuai.

### 3.8 Tagihan Gabungan per Meja

Sistem menggunakan konsep sesi meja untuk menggabungkan pesanan selama pelanggan makan di meja yang sama.

Ketentuan:

- Pesanan tambahan tetap tercatat sebagai pesanan tersendiri, tetapi terhubung ke sesi meja yang sama.
- Total tagihan dihitung dari seluruh item yang diterima dan belum dikeluarkan dari tagihan.
- Pesanan yang ditolak atau dibatalkan secara sah tidak dihitung dalam tagihan.
- Perubahan pesanan yang diizinkan harus memperbarui total tagihan.
- Setelah pembayaran lunas dan sesi ditutup oleh admin, sesi tersebut tidak menerima pesanan tambahan.
- QR code meja dapat digunakan kembali pada sesi berikutnya tanpa mencampurkan tagihan pelanggan sebelumnya.

Total tagihan hanya berdasarkan harga menu, tanpa pajak atau biaya layanan tambahan pada versi awal.

### 3.9 Dashboard Admin dan Notifikasi

Dashboard menampilkan ringkasan pesanan, antrean aktif, status meja, tagihan, serta informasi transaksi.

Fitur notifikasi:

- Pemberitahuan visual ketika pesanan baru masuk.
- Notifikasi suara ketika pesanan baru masuk, dengan tetap menampilkan pemberitahuan visual jika suara diblokir browser.
- Notifikasi untuk permintaan pembatalan.
- Pembaruan status dan tagihan secara terpusat.

Antrean pesanan diurutkan otomatis berdasarkan waktu masuk, dari yang paling lama ke yang paling baru.

### 3.10 Integrasi WhatsApp

Sistem menyediakan dua jenis fitur WhatsApp.

**WhatsApp otomatis:**
- Memberikan notifikasi pesanan baru kepada pemilik.
- Memberikan notifikasi permintaan pembatalan.
- Memuat informasi yang relevan, seperti nomor pesanan, meja, nama pelanggan, dan rincian singkat.

Fitur otomatis memerlukan integrasi WhatsApp Business Platform atau penyedia layanan yang sesuai, beserta konfigurasi nomor, kredensial, dan biaya layanan jika berlaku.

**WhatsApp manual:**
- Menyediakan tombol yang membuka WhatsApp dengan nomor warung.
- Menyiapkan teks pesan berdasarkan konteks pesanan.
- Memungkinkan pengguna memeriksa dan mengirim pesan sendiri.

Tombol manual tidak boleh dianggap sebagai pesan terkirim sebelum pelanggan benar-benar mengirimkannya. Kegagalan integrasi otomatis tidak boleh menghapus atau menggagalkan pesanan yang sudah tersimpan di database.

### 3.11 Pembayaran Kasir

Pembayaran dilakukan di kasir setelah pelanggan selesai makan.

Admin dapat:

- Melihat tagihan terperinci per meja.
- Memeriksa daftar pesanan dan total yang harus dibayar.
- Memilih metode pembayaran tunai atau QRIS.
- Memasukkan jumlah uang yang diterima untuk pembayaran tunai.
- Melihat perhitungan kembalian otomatis.
- Mencatat dan mengonfirmasi pembayaran.
- Menandai transaksi lunas.
- Menyediakan struk pembayaran digital.
- Menutup sesi meja setelah pembayaran lunas.

Untuk pembayaran QRIS, admin memverifikasi pembayaran secara manual sebelum menandai transaksi lunas. Integrasi payment gateway atau verifikasi QRIS otomatis tidak termasuk versi awal.

Struk pembayaran digital memuat nomor transaksi, nomor meja, rincian menu, total, metode pembayaran, waktu pembayaran, jumlah uang diterima jika tunai, kembalian jika ada, dan status lunas.

### 3.12 Riwayat Transaksi

Admin dapat melihat riwayat pesanan dan transaksi yang telah tersimpan.

Fitur mencakup:

- Pencarian berdasarkan nomor pesanan.
- Pencarian berdasarkan tanggal.
- Filter berdasarkan status pembayaran.
- Pemeriksaan rincian menu dan total transaksi.
- Pemeriksaan status pesanan dan pembayaran.
- Peninjauan pesanan yang ditolak atau dibatalkan.

Riwayat pesanan dan pembayaran harus tetap dapat diperiksa setelah sesi meja ditutup.

### 3.13 Laporan Penjualan

Sistem menyediakan laporan harian dan bulanan dengan informasi:

- Total penjualan dari transaksi yang telah lunas.
- Jumlah pesanan.
- Jumlah transaksi yang telah dibayar.
- Periode laporan yang dipilih.

Laporan dapat dilihat melalui dashboard dan diunduh sebagai PDF untuk disimpan atau dicetak.

Angka laporan harus konsisten dengan data transaksi yang tersimpan. Pesanan yang ditolak, dibatalkan, atau belum dibayar tidak boleh dihitung sebagai penjualan lunas.

### 3.14 Pengaturan Jam Operasional

Admin dapat menentukan jam buka dan tutup serta mengubah status warung menjadi buka atau tutup secara manual.

Ketika warung tutup:

- Informasi warung dan menu tetap dapat dilihat.
- Pelanggan tidak dapat mengirim pesanan baru.
- Sistem menampilkan pemberitahuan bahwa warung sedang tutup.

Ketika warung buka, pemesanan hanya dapat dilakukan melalui QR code meja yang valid dan aktif.

### 3.15 Keamanan Akun Admin

Dashboard dilindungi oleh login menggunakan email atau username dan kata sandi.

Fitur keamanan meliputi:

- Pembatasan percobaan login gagal.
- Sesi otomatis berakhir setelah periode tidak aktif.
- Pemulihan kata sandi melalui tautan yang dikirim ke email terdaftar.
- Validasi akses admin pada setiap halaman dan tindakan yang dilindungi.
- Penyimpanan kata sandi dalam bentuk hash, bukan teks biasa.
- Perlindungan terhadap akses tanpa izin dan manipulasi data melalui validasi server.

Tautan pemulihan kata sandi harus memiliki masa berlaku dan tidak dapat digunakan kembali setelah berhasil dipakai.

### 3.16 Pencadangan dan Pemulihan Database

Sistem harus menyediakan mekanisme pencadangan database otomatis dan pemulihan data.

Ketentuan:

- Pencadangan dijalankan sesuai jadwal yang dikonfigurasi.
- File cadangan disimpan terpisah dari database utama jika infrastruktur memungkinkan.
- Sistem mencatat waktu dan hasil proses pencadangan.
- Admin atau pengelola yang berwenang dapat menjalankan pemulihan sesuai prosedur.
- Proses pemulihan harus diuji agar cadangan benar-benar dapat digunakan.

Fitur ini tidak cukup hanya berupa tombol atau tampilan status; proses pencadangan dan pemulihan harus benar-benar berfungsi.

### 3.17 Penanganan Gangguan Koneksi

Jika koneksi internet atau server bermasalah, sistem menampilkan pemberitahuan bahwa pemesanan sedang tidak tersedia dan menyediakan tombol WhatsApp sebagai alternatif.

Sistem berbasis web ini memerlukan koneksi ke server untuk menyimpan pesanan. Oleh karena itu, pemesanan offline penuh tidak termasuk versi awal.

---

## 4. Cakupan

### 4.1 Cakupan Versi Awal

Versi awal mencakup:

1. Website pelanggan dan halaman depan.
2. Informasi warung yang dapat dikelola admin.
3. Menu makanan dan minuman dengan foto.
4. Pencarian dan filter menu.
5. QR code unik untuk setiap meja.
6. Keranjang, catatan pesanan, dan konfirmasi ringkasan.
7. Pencegahan pesanan ganda.
8. Konfirmasi dan penolakan pesanan oleh pemilik.
9. Permintaan pembatalan sebelum pesanan diproses.
10. Pelacakan status melalui tautan unik dan kode akses.
11. Pesanan tambahan dalam sesi meja yang sama.
12. Tagihan gabungan per meja.
13. Pembayaran tunai dan pencatatan QRIS manual.
14. Perhitungan kembalian otomatis.
15. Bukti pesanan dan struk pembayaran digital.
16. Dashboard admin dengan notifikasi visual dan suara.
17. Notifikasi WhatsApp otomatis dan tombol WhatsApp manual.
18. Riwayat transaksi dengan pencarian dan filter pembayaran.
19. Laporan penjualan harian dan bulanan dalam PDF.
20. Pengaturan jam operasional dan ketersediaan menu.
21. Login admin, pembatasan login gagal, sesi otomatis berakhir, dan pemulihan kata sandi.
22. Pencadangan serta pemulihan database.
23. Pengembangan dan pengujian lokal sebelum publikasi online.

### 4.2 Tahapan Pengembangan

Pengembangan dapat dilakukan secara bertahap.

**Tahap 1 — Fondasi sistem**
- Menyiapkan proyek Laravel dan database MySQL.
- Membuat struktur database.
- Membuat autentikasi admin.
- Membuat pengelolaan informasi warung, menu, dan meja.

**Tahap 2 — Pemesanan pelanggan**
- Membuat QR code dan identifikasi meja.
- Membuat menu, keranjang, catatan, dan konfirmasi pesanan.
- Membuat bukti pesanan dan pelacakan status.
- Menerapkan validasi ketersediaan menu dan pencegahan pesanan ganda.

**Tahap 3 — Operasional warung**
- Membuat dashboard antrean pesanan.
- Membuat konfirmasi, penolakan, pembatalan, dan perubahan pesanan.
- Membuat sesi meja dan tagihan gabungan.
- Membuat pembayaran kasir dan struk digital.

**Tahap 4 — Pelaporan dan integrasi**
- Membuat riwayat transaksi dan laporan PDF.
- Mengintegrasikan notifikasi WhatsApp otomatis.
- Menambahkan notifikasi visual dan suara.
- Menerapkan pencadangan dan pemulihan database.

**Tahap 5 — Pengujian dan publikasi**
- Menguji alur pelanggan dan admin.
- Menguji keamanan serta konsistensi tagihan.
- Menguji pemulihan database.
- Mempublikasikan website dan menguji QR code menggunakan alamat publik.

### 4.3 Di Luar Cakupan Versi Awal

Fitur berikut tidak dikembangkan pada versi pertama:

- Multi-cabang.
- Akun pegawai terpisah.
- Akun pelanggan wajib.
- Promo dan diskon.
- Pengelolaan stok otomatis.
- Pembayaran melalui payment gateway.
- Verifikasi QRIS otomatis.
- Pemesanan offline penuh.
- Pencetakan pesanan dapur.
- Autentikasi dua faktor.
- Pembatasan akses berdasarkan alamat IP.
- Ekspor laporan ke Excel.
- Pajak atau biaya layanan tambahan.
- Pengaturan prioritas antrean secara manual.

---

## 5. Batasan

### 5.1 Batasan Teknis

- Backend menggunakan Laravel.
- Database menggunakan MySQL.
- Website harus responsif dan mendukung browser modern.
- Sistem dikembangkan serta diuji secara lokal sebelum dipublikasikan.
- Setelah dipublikasikan, QR code harus mengarah ke alamat website publik yang valid.
- Ketersediaan layanan bergantung pada server, koneksi internet, dan konfigurasi hosting.

### 5.2 Batasan Operasional

- Sistem hanya melayani satu warung di satu lokasi.
- Hanya pemilik yang memiliki akses admin.
- Pemilik bertanggung jawab mengonfirmasi pesanan, memverifikasi pembayaran QRIS, dan menutup sesi meja.
- Pelanggan wajib memindai QR code meja untuk melakukan pemesanan.
- Pesanan tambahan hanya dapat dibuat selama sesi meja masih aktif.
- Meja baru dinyatakan tersedia setelah pembayaran lunas dan sesi ditutup oleh admin.

### 5.3 Batasan Integrasi

- Notifikasi WhatsApp otomatis memerlukan layanan integrasi yang sesuai dan konfigurasi tambahan.
- Notifikasi WhatsApp tidak menggantikan penyimpanan pesanan di database.
- Pemulihan kata sandi melalui email memerlukan konfigurasi SMTP atau layanan email.
- Notifikasi suara bergantung pada dukungan browser, izin pengguna, dan pengaturan perangkat.
- Pemesanan tidak dapat disimpan ke server ketika server atau koneksi tidak tersedia.

### 5.4 Batasan Pembayaran

- Pembayaran dilakukan di kasir setelah pelanggan selesai makan.
- Pembayaran tunai memerlukan input jumlah uang yang diterima.
- Pembayaran QRIS diverifikasi manual oleh admin.
- Status lunas hanya dapat diberikan setelah pembayaran dikonfirmasi.
- Sistem tidak mengenakan pajak atau biaya layanan tambahan pada versi awal.

### 5.5 Batasan Keamanan dan Data

- Akses admin wajib dilindungi autentikasi dan otorisasi server.
- Data pelanggan hanya dikumpulkan sesuai kebutuhan pemesanan.
- Tautan pelacakan harus memiliki kode akses yang sulit ditebak.
- Data transaksi harus tetap tersimpan dalam riwayat setelah sesi meja ditutup.
- Pencadangan harus diuji melalui proses pemulihan, bukan hanya pemeriksaan keberadaan file.

---

## 6. Kriteria Penerimaan

Sistem dinyatakan memenuhi kebutuhan versi awal apabila kriteria berikut dapat dibuktikan melalui pengujian.

### 6.1 Website dan Menu

- [ ] Website dapat dibuka melalui browser pada ponsel dan komputer.
- [ ] Seluruh antarmuka menggunakan Bahasa Indonesia.
- [ ] Halaman depan menampilkan informasi warung dan tombol Lihat Menu.
- [ ] Menu menampilkan foto, nama, harga, dan ketersediaan.
- [ ] Pencarian nama menu dan filter makanan/minuman berfungsi.
- [ ] Menu yang habis tetap terlihat tetapi tidak dapat dipesan.
- [ ] Admin dapat menambah, mengubah, dan menghapus menu.

### 6.2 QR Code dan Pemesanan

- [ ] Setiap meja memiliki QR code unik.
- [ ] Pemindaian QR code mengidentifikasi meja yang benar.
- [ ] Pengunjung dapat melihat menu tanpa QR code, tetapi tidak dapat memesan sebelum meja terverifikasi.
- [ ] Pelanggan dapat memasukkan nama, memilih beberapa menu, mengatur jumlah, dan menambahkan catatan.
- [ ] Pelanggan dapat memeriksa ringkasan sebelum mengirim pesanan.
- [ ] Pengiriman ganda dari tindakan yang sama tidak menghasilkan pesanan duplikat.
- [ ] Setelah pesanan berhasil disimpan, nomor pesanan dan bukti digital ditampilkan.

### 6.3 Pengelolaan Pesanan

- [ ] Pesanan baru berstatus Menunggu Konfirmasi.
- [ ] Admin harus mengonfirmasi pesanan sebelum status berubah menjadi Diproses.
- [ ] Pesanan ditampilkan berdasarkan waktu masuk.
- [ ] Admin dapat menolak pesanan dengan alasan.
- [ ] Pesanan yang ditolak tersimpan dalam riwayat tetapi tidak dihitung dalam tagihan aktif.
- [ ] Pelanggan dapat meminta pembatalan sebelum pesanan diproses.
- [ ] Admin dapat menyetujui atau menolak permintaan pembatalan.
- [ ] Admin dapat mengubah atau membatalkan pesanan sebelum pesanan diproses.
- [ ] Perubahan status dapat dilihat pelanggan pada halaman pelacakan.

### 6.4 Pelacakan dan Sesi Meja

- [ ] Pelanggan dapat membuka pelacakan menggunakan tautan unik dan kode akses.
- [ ] Pelanggan tidak perlu membuat akun untuk melacak pesanan.
- [ ] Tautan pelacakan tidak memberikan akses ke pesanan pelanggan lain.
- [ ] Pelanggan dapat menambah pesanan selama sesi meja masih aktif.
- [ ] Pesanan tambahan digabung ke tagihan sesi meja yang sama.
- [ ] Pesanan yang ditolak atau dibatalkan tidak dihitung dalam tagihan.
- [ ] Sesi yang sudah lunas dan ditutup tidak dapat menerima pesanan tambahan.
- [ ] Tagihan pelanggan sebelumnya tidak tercampur dengan sesi berikutnya.

### 6.5 Pembayaran dan Struk

- [ ] Admin dapat melihat rincian tagihan setiap meja.
- [ ] Total tagihan sama dengan penjumlahan item yang sah dalam sesi meja.
- [ ] Sistem tidak menambahkan pajak atau biaya layanan pada versi awal.
- [ ] Admin dapat memilih pembayaran tunai atau QRIS.
- [ ] Sistem menghitung kembalian dengan benar untuk pembayaran tunai.
- [ ] Pembayaran QRIS harus diverifikasi manual sebelum ditandai lunas.
- [ ] Pesanan selesai tidak otomatis dianggap lunas.
- [ ] Struk digital hanya menunjukkan status lunas setelah pembayaran dikonfirmasi.
- [ ] Setelah pembayaran lunas dan sesi ditutup, meja berubah menjadi tersedia.

### 6.6 Dashboard dan WhatsApp

- [ ] Dashboard menampilkan notifikasi visual untuk pesanan baru.
- [ ] Dashboard memainkan suara ketika pesanan baru masuk jika browser mengizinkan.
- [ ] Antrean pesanan diurutkan berdasarkan waktu masuk.
- [ ] Integrasi WhatsApp otomatis mengirim pemberitahuan pesanan baru.
- [ ] Integrasi WhatsApp otomatis mengirim pemberitahuan permintaan pembatalan.
- [ ] Tombol WhatsApp manual membuka percakapan dengan nomor warung dan teks yang disiapkan.
- [ ] Gangguan WhatsApp tidak menghilangkan pesanan yang sudah tersimpan.
- [ ] Jika website tidak dapat diakses, tersedia pemberitahuan gangguan dan tombol WhatsApp jika halaman dapat dimuat.

### 6.7 Riwayat dan Laporan

- [ ] Admin dapat mencari riwayat berdasarkan tanggal dan nomor pesanan.
- [ ] Admin dapat memfilter transaksi berdasarkan status pembayaran.
- [ ] Riwayat tetap tersedia setelah sesi meja ditutup.
- [ ] Laporan harian dan bulanan dapat ditampilkan.
- [ ] Laporan memuat total penjualan, jumlah pesanan, dan jumlah transaksi lunas.
- [ ] Pesanan ditolak, dibatalkan, atau belum lunas tidak dihitung sebagai penjualan lunas.
- [ ] Laporan dapat diunduh sebagai PDF.
- [ ] Nilai laporan sesuai dengan transaksi yang tersimpan dalam database.

### 6.8 Keamanan dan Pemulihan

- [ ] Dashboard tidak dapat diakses tanpa autentikasi admin.
- [ ] Percobaan login gagal dibatasi.
- [ ] Sesi admin berakhir otomatis setelah periode tidak aktif yang ditentukan.
- [ ] Pemulihan kata sandi melalui email berfungsi.
- [ ] Tautan reset kata sandi memiliki masa berlaku dan tidak dapat digunakan kembali setelah berhasil dipakai.
- [ ] Pencadangan database otomatis berjalan sesuai jadwal.
- [ ] Hasil pencadangan dapat diperiksa dan dicatat.
- [ ] Database dapat dipulihkan dari file cadangan melalui prosedur yang telah diuji.

### 6.9 Publikasi

- [ ] Aplikasi dapat dijalankan dan diuji di lingkungan lokal.
- [ ] Aplikasi dapat diakses melalui alamat publik setelah deployment.
- [ ] QR code meja bekerja menggunakan alamat publik.
- [ ] Alur pemesanan, perubahan status, pembayaran, dan penutupan sesi diuji kembali setelah deployment.
- [ ] Konfigurasi rahasia seperti kata sandi database dan kredensial layanan tidak ditampilkan kepada pengguna.

---

## Penutup

PRD ini menjadi acuan kebutuhan untuk membangun sistem pemesanan makanan dan minuman berbasis web menggunakan Laravel dan MySQL. Prioritas utama pengembangan adalah memastikan alur QR code, pemesanan pelanggan, konfirmasi pemilik, tagihan gabungan per meja, pembayaran kasir, dan riwayat transaksi berjalan konsisten.

Fitur integrasi eksternal seperti WhatsApp otomatis, layanan email, hosting, serta pencadangan terjadwal perlu dikonfigurasi dan diuji secara nyata. Sistem baru dinyatakan siap digunakan setelah kriteria penerimaan terpenuhi dan alur transaksi telah diuji dari sisi pelanggan maupun admin.
