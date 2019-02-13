[![N|Solid](http://predatech.uin-suska.ac.id/wp-content/uploads/2018/01/Header-Web-barulah.jpg)](http://predatech.uin-suska.ac.id)
# Predatech KulGram
Predatech KulGram adalah kegiatan belajar dengan memanfaatkan media aplikasi telegram sebagai kelas. Kegiatan ini di taja oleh alumni predatech untuk seluruh anggota predatech yang ingin dan memiliki minat belajar. Kegiatan dilakukan setiap Jumat malam atau Malam Ahad dengan pemateri yang berbeda atau sama pada setiap malam. Materi yang di sampaikan adalah Membangun Aplikasi Web Pada Tingkat Menengah, berikut daftar materi yang ada pada kulgram

  - Mendesain Web Menggunakan Bootstrap 4
  - Merancang Database MySQL
  - Pengenalan OOP dan Penerapan MVC
  - Membuat API Menggunaakan PHP
  - Membuat API Menggunakan Node JS
  - Membuat Sistem Realtime

##### Fitur dari Materi

  - Installasi Web Server
  - Konfigurasi Library Bootstrap 4
  - Mendesain Tampilan Web
  - Mendesain Database
  - Installasi Composer
  - Installasi PHP
  - Pengenalan OOP
  - Class dan Object
  - Menginstal Library ORM
  - Membuat Aplikasi MVC
  - JSON dan Array
  - Membuat API menggunakan PHP
  - Installasi dan  Konfigurasi Node JS
  - Membuat API Sederhana menggunakan Javascript

#### 1. Mendesain Web Menggunakan Bootstrap 4
#### 2. Merancang Database MySQL
#### 3. Pengenalan OOP dan MVC pada PHP

Object Oriented Programming (OOP) adalah metode pemrograman yang menekankan pengkodingan dengan memperhatikan objek dari suatu case secara real. Sebagai contoh adalah pesawat, dimana pesawat adalah objek. Namun di dalam pesawat ada beberapa objek lain seperti kursi dan mesin. Dalam OOP, objek-objek kecil ini disebut fungsi yang akan di hubungkan satu dengan yang lain sehingga dapat bekerja secara bersama. Kenapa harus menggunakan konsep OOP? Ada beberapa alasan yang sangat dasar yaitu agar kita tidak menulis ulang kode yang sama dan penggunaan library yang sudah ada daripada harus membuat library sendiri. 

OOP biasanya identik dengan `Class` dan `function`, bahkan saat ini penggunaan oop tidak lagi menggunakan fungsi `required` atau `include` untuk memanggil file yang memiliki `method` di dalamnya. Biasanya seluruh class di masukan dalam file lain yang biasa kita sebut `autoloader`. Jika ingin menggunakan class ini, maka kita cukup menggunakan tag `use`.

Dalam KulGram kita tidak akan banyak menggunakan tag-tag atau fitur-fitur yang masih asing di telinga. Kita akan berfokus pada penggunaan `Class` dan `function`. `Class` adalah kerangka dasar yang akan menyimpan beberapa fungsi dan property. `Function` atau biasa kita sebut dengan method adalah block yang digunakan untuk menyimpan beberapa instruksi.`Property` adalah variabel yang bisa digunakan secara terus menerus didalam `Class` terutama didalam `function`. Semua yang di jelaskan akan dicontohkan pada kasus.
1. Install Composer
    Composer adalah tools yang dapat kita gunakan untuk mendownload library php yang tersedia di internet. Composer memudahkan kita dalam penggabungan semua library dengan penggunaan `autoload`. Silahkan download composer dari [sini](https://getcomposer.org/download/), kemudian install seperti biasa. Ketika proses install akan ada step untuk meminta folder PHP yang digunakan, coba cari folder php yang ada di wamp dengan alamat directory : C:/wampp64/bin/php/php7.2.10 .Jika setelah di next masih ada error, maka download PHP secara terpisah dari [link ini](https://windows.php.net/downloads/releases/php-7.2.15-nts-Win32-VC15-x64.zip). Extrak di dalam drive C, dan coba install kembali composer. Setelah mengulangi untuk menginstall, biasanya composer akan auto detect folder PHP tersebut dan proses install akan selesai.
2. Install Library Query Builder
    Salah satu kenapa kita harus menggunakan OOP adalah banyaknya library yang dapat mendukung kinerja kita dalam membangun aplikasi. Salah satunya adalah menggunakan library Query Builder. Jika membangun aplikasi skala menengah dan tidak menggunakan framework kita bisa menggunakan query builder [pecee-pixie](https://github.com/skipperbent/pecee-pixie). Buka folder project kulgram sebelumnya, kemudian buatlah file `composer.json`. Di dalam file `composer.json` tambahkan baris kode berikut dan save:
    ```sh
    {
        "require": {
            "pecee/pixie": "*"
        }
    }
    ```
    Kemudian bukalah terminal pada folder project, dengan cara tekan dan tahan SHIFT dan klik kanan pada mouse, pilih `Open PowerSheel ...` atau `Open Terminal ..`. Ketikan `composer install` pada terminal, tunggu hingga proses installing berhasil. Jika ada kegagalan coba dengan `composer update`, namun ini berlaku jika errornya pada masalah penginstallan. Jika masih ada error coba dengan `php composer install`.
    Setelah terinstal akan ada folder baru dengan nama folder adalah `vendor`, didalam nya ada juga subfolder `composer`. Didalam sub folder `composer` seluruh `Class` pada library di representasikan secara sederhana agar mudah di gunakan.
3. Membuat Struktur Folder MVC
    Buatlah folder baru dengan nama `models`, `views`, `controllers`, dan `config`. Masing-masing folder memiliki fungsinya masing-masing. Folder `Models` digunakan untuk menyimpan `class` yang berisi sintak dan query penghubung antara koding dan database. Folder `Views` digunakan untuk menyimpan seluruh tampilan yang akan di render pada web, biasanya adalah hasil dari query database dan user interface dari aplikasi. Folder `Controllers` digunakan untuk menyimpan `Class` penghubung antara hasil dari `Model` dan `View` yang akan di tampilkan. Folder `config` berguna untuk meyimpan file konfigurasi database atau konfigurasi lain.
4. Membuat File Konfigurasi
    Tambahkan file baru dengan nama `mysql.php` di dalam folder config, ketikan kode program berikut di dalamnya.
    ```php
    <?php
    require_once "vendor/autoload.php";
    class Mysql  {
        public function connection()
        {
            $config = [
                'driver'    => 'mysql',
                'host'      => 'localhost', //isi dengan host
                'database'  => 'db_inventory', // isi dengan nama database
                'username'  => 'root', //isi dengan user database
                'password'  => '', //isi dengan password database
                'charset'   => 'utf8',
                'collation' => 'utf8_unicode_ci',
                'prefix'    => '',
            ];
            try {
                $conn = new \Pecee\Pixie\Connection('mysql', $config);
                return $conn->getQueryBuilder();
            } catch (PDOException $e) {
                return $e->getMessage();
            }
        }
    }
    ?>
    ```
5. Membuat File Render Page
    File ini berisi kode program untuk merender file view, buat file baru di dalam folder project kulgram (setara dengan `index.php`) dengan nama `load.php`. Kemudian ketikan kode program berikut di dalamnya.
    ````php
    <?php
    class Load
    {
    	function view ($url, $data = null)
    	{
    		$explode = explode('/',$url);
    		$folder = $explode[0];
    		$file = $explode[1];
    		if (is_array($data)) {
    			extract($data);		
    		}
    		$dir = 'views/'.$folder;
    		if(is_dir($dir)){
    			include_once $dir.'/'.$file.'.php';
    		}else{
    			include_once '404.php';
    		}
    	}
    }
    ?>
    ````
6. 

#### Daftar Pemateri
| Pemateri | Profile |
| ------ | ------ |
| Hady Eka Saputra, S.Kom | [..][PlDb] |
| Aszani, S.Kom | [..][PlGh] |
| ? | [...][PlGd] |

### Development
Want to contribute? Great! 
> Ilmu merupakan investasi dunia yang berharga
> Kalau menunggu yang dibelakang, kapan mau maju?