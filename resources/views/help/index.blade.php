@extends('layouts.help')

@section('judul')
    Help
@endsection

@section('judul-top')
    Help
@endsection

@section('content')
    <div class="container">
    <h1>ManSUn</h1>

    Apa itu Mansun?<br>
    -	Mansun merupakan projek yang menggabungkan website dan aplikasi untuk membantu para SU dalam pengaturan Student Union

    <br>
    <br>

    Beranda<br>
    -	Di halaman ini, anda dapat melihat sejumlah periode yang hanya bisa dilihat Ketika anda meupakan salah satu pengurus dari proker di periode tersebut, dan beberapa tombol untuk menavigasikan ke halaman lain.

    <br>
    <br>

    Halaman Periode<br>
    -	Jika anda menekan gambar periode, maka secara langsung akan diarahkan ke halaman Periode, dan anda dapat melihat list proker apa saja yang ada di periode tersebut. Seperti Periode, anda hanya dapat melihat proker yang anda ikuti.

    <br>
    <br>

    Halaman Proker<br>
    -	Jika anda menekan salah satu proker, maka anda akan diarahkan ke halaman Proker, dimana dapat melihat detail-detail Proker tersebut.<br>
    -	Anda dapat melihat deksripsi Proker tersebut dan melihat list divisi yang anda ikuti.<br>
    -	Khusus HOD dan Admin, mereka dapat melihat seluruh list divisi, setiap tugas-tugasnya, dan list anggota divisi tersebut.<br>
    -	Anda dapat melihat anggota-anggota dengan menekan tombol “Lihat anggota”

    <br>
    <br>

    Halaman Daftar Anggota<br>
    -	Di halaman ini, anda dapat melihat list anggota.<br>
    -	Khusus Admin, HOD, dan Koor, dapat menambahkan dan mengeluarkan Anggota dari divisi sendiri.

    <br>
    <br>

    Halaman Daftar Tugas<br>
    -	Di halaman ini, anda dapat melihat list tugas-tugas yang tanggung jawabnya di anda. Teruntuk Koor, anda dapat secara cepat meng-approve dan me-reject tugas anggota.<br>
    -	Khusus Admin, anda dapat melihat semua list tugas proker di halaman ini, dan memiliki permission yang sama dengan Koor.<br>
    -	Khusus HOD, memiliki permission yang sama dengan Koor, tetapi bisa melihat semua tugas yang anda merupakan HOD di proker tersebut.

    <br>
    <br>

    Halaman User Management<br>
    -	Halaman ini merupakan eksklusif untuk Admin, dimana para Admin dapat melihat semua User yang terdaftar di system.<br>
    -	Admin dapat melihat status user yang sedang login atau tidak.<br>
    -	Admin dapat menggunakan fitur Suspend dan Delete kepada user-user yang sudah terdaftar di User Management.

    <br>
    <br>

    Halaman List Lecturer dan List Student<br>
    -	Halaman ini hanya bisa diakses oleh Admin.<br>
    -	Admin dapat melihat list dosen/mahasiswa, dan memasukkan ke sistem Mansun (User Management)

    <br>
    <br>

    Halaman Profil<br>

    -	Di halaman Profil, Admin dapat melihat detail diri sendiri.<br>
    -	Untuk user / mahasiswa, di halaman profil dapat melihat Riwayat Jabatan apa saja yang sudah pernah diikuti.

        <br>
        <br>

    </div>
@endsection
