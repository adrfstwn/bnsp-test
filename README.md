# Product CRUD & Export Documentation

## 1. Manual Sheet

### A. Fitur CRUD Produk

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

### B. Export PDF

-   Pada setiap baris produk terdapat tombol **Export PDF** untuk mengunduh detail produk dalam format PDF.
-   Export PDF menggunakan library [barryvdh/laravel-dompdf](https://github.com/barryvdh/laravel-dompdf).

---

## 2. Tabel Pengujian

| No  | Fitur       | Langkah Uji                                          | Data Uji                | Hasil yang Diharapkan              |
| --- | ----------- | ---------------------------------------------------- | ----------------------- | ---------------------------------- |
| 1   | Create      | Klik "Create Product", isi form, klik "Save"         | Name: Test, Price: 1000 | Produk baru muncul di tabel        |
| 2   | Read/Search | Ketik nama produk di kolom search, klik "Search"     | search: Test            | Tabel hanya menampilkan produk itu |
| 3   | Update      | Klik "Edit" pada produk, ubah data, klik "Update"    | Name: Test Updated      | Data produk berubah di tabel       |
| 4   | Delete      | Klik "Delete" pada produk, konfirmasi                | -                       | Produk hilang dari tabel           |
| 5   | Pagination  | Tambahkan lebih dari 10 produk, cek navigasi halaman | -                       | Navigasi halaman tampil            |
| 6   | Export PDF  | Klik "Export PDF" pada produk                        | -                       | File PDF terunduh                  |

---

**Catatan:**

-   Semua fitur CRUD dan export dapat diakses dari halaman utama produk (`/product`).
-   Soft delete: data yang dihapus dapat dikembalikan jika diperlukan (restore).
-   Export PDF hanya menampilkan detail satu produk
