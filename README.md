# Product CRUD & Export Documentation

## 1. Manual Sheet

### A. Cara Menjalankan Program

1. **Clone Repository**

    ```bash
    git clone https://github.com/adrfstwn/bnsp-test.git
    cd bnsp-test
    ```

2. **Install Dependency**

    ```bash
    composer install
    ```

3. **Copy File Environment**

    ```bash
    cp .env.example .env
    ```

4. **Generate Key**

    ```bash
    php artisan key:generate
    ```

5. **Atur Konfigurasi Database**  
   Edit file `.env` dan sesuaikan bagian berikut:

    ```
    DB_DATABASE=nama_database
    DB_USERNAME=username_db
    DB_PASSWORD=password_db
    ```

6. **Migrasi Database**

    ```bash
    php artisan migrate
    ```

7. **Jalankan Server**
    ```bash
    php artisan serve
    ```
    Akses aplikasi di [http://localhost:8000](http://localhost:8000)

---

### B. Fitur CRUD Produk

-   **Create**  
    Pengguna dapat menambah produk baru melalui tombol **Create Product** di halaman daftar produk.  
    Field yang diisi:

    -   Name (nama produk)
    -   Price (harga)
    -   Description (deskripsi)
    -   Stock (stok)

-   **Read (List/Search)**  
    Daftar produk ditampilkan dalam bentuk tabel.  
    Fitur pencarian tersedia di atas tabel untuk mencari produk berdasarkan nama.  
    Terdapat pagination untuk navigasi halaman.

-   **Update**  
    Pengguna dapat mengedit produk dengan klik tombol **Edit** pada baris produk yang diinginkan.  
    Form edit akan muncul dengan data produk yang sudah terisi.

-   **Delete (Soft Delete)**  
    Pengguna dapat menghapus produk dengan klik tombol **Delete** pada baris produk.  
    Data tidak langsung dihapus permanen, melainkan soft delete (kolom `deleted_at` terisi).

### C. Export PDF

-   Export PDF dapat dilakukan untuk semua produk pada tombol **Export PDF** di samping tombol **Create Product**
-   Pada setiap baris produk terdapat tombol **Export PDF** untuk mengunduh detail produk dalam format PDF.
-   Export PDF menggunakan library [barryvdh/laravel-dompdf](https://github.com/barryvdh/laravel-dompdf).

---

## 2. Tabel Pengujian

| No  | Fitur                    | Langkah Uji                                          | Data Uji                | Hasil yang Diharapkan              |
| --- | ------------------------ | ---------------------------------------------------- | ----------------------- | ---------------------------------- |
| 1   | Create                   | Klik "Create Product", isi form, klik "Save"         | Name: Test, Price: 1000 | Produk baru muncul di tabel        |
| 2   | Read/Search              | Ketik nama produk di kolom search, klik "Search"     | search: Test            | Tabel hanya menampilkan produk itu |
| 3   | Update                   | Klik "Edit" pada produk, ubah data, klik "Update"    | Name: Test Updated      | Data produk berubah di tabel       |
| 4   | Delete                   | Klik "Delete" pada produk, konfirmasi                | -                       | Produk hilang dari tabel           |
| 5   | Pagination               | Tambahkan lebih dari 10 produk, cek navigasi halaman | -                       | Navigasi halaman tampil            |
| 6   | Export PDF Per Product   | Klik "Export PDF" pada masing-masing produk          | -                       | File PDF terunduh                  |
| 7   | Export PDF Semua Product | Klik "Export PDF"                                    | -                       | File PDF terunduh                  |

---

**Catatan:**

-   Semua fitur CRUD dan export dapat diakses dari halaman utama produk (`/product`).
-   Soft delete: data yang dihapus dapat dikembalikan jika diperlukan (restore).
-   Export PDF dapat menampilkan semua produk atau hanya menampilkan detail satu produk
