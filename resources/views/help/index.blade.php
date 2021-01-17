@extends('layouts.help')

@section('judul')
    Help
@endsection

@section('judul-top')
    Help
@endsection

@section('content')
    <div class="container">

    <h1>Panduan ManSUn Web</h1><br>

        <h2>Apa itu ManSUn?</h2><br>
        <p style="font-size: 20px">ManSUn Web merupakan sebuah website yang dapat membantu mahasiswa mengorganisir berbagai tugas di dalam program kerja Student Union.</p><br><br>

    <h2>Beranda</h2><br>

        <p style="font-size: 20px">Pada halaman ini, anda dapat melihat segala periode dimana anda sedang terlibat. selain itu, terdapat beberapa tombol untuk berpindah halaman lain.</p><br><br>

        <h2>Halaman Periode</h2><br><br>

        <table class="table table-striped">
            <thead class="table-dark">
            <tr>
                <th scope="col" colspan="5">
                    Hak akses halaman periode
                </th>
            </tr>

            <tr>
                <th></th>
                <th scope="row">Admin</th>
                <th scope="row">HOD</th>
                <th scope="row">Koor</th>
                <th scope="row">User</th>
            </tr>
            </thead>

            <tr>
                <th scope="col">Create</th>
                <td scope="col" >&#10003</td>
                <td scope="col"></td>
                <td scope="col"></td>
                <td scope="col"></td>
            </tr>

            <tr>
                <th scope="col">Read</th>
                <td scope="col">&#10003</td>
                <td scope="col">&#10003</td>
                <td scope="col">&#10003</td>
                <td scope="col">&#10003</td>
            </tr>

            <tr>
                <th scope="col">Update</th>
                <td scope="col"></td>
                <td scope="col"></td>
                <td scope="col"></td>
                <td scope="col"></td>
            </tr>

            <tr>
                <th scope="col">Delete</th>
                <td scope="col"></td>
                <td scope="col"></td>
                <td scope="col"></td>
                <td scope="col"></td>
            </tr>
        </table>

        <p style="font-size: 20px">Jika anda menekan salah satu gambar periode, maka anda akan diarahkan ke halaman list program kerja di dalam periode tersebut. Pada halaman ini anda hanya dapat melihat proker yang anda ikuti.</p><br><br>

        <h2>Halaman Program Kerja</h2><br><br>

        <table class="table table-striped">
            <thead class="table-dark">
            <tr>
                <th scope="col" colspan="5">
                    Hak akses halaman program kerja
                </th>
            </tr>

            <tr>
                <th></th>
                <th scope="row">Admin</th>
                <th scope="row">HOD</th>
                <th scope="row">Koor</th>
                <th scope="row">User</th>
            </tr>
            </thead>

            <tr>
                <th scope="col">Create</th>
                <td scope="col">&#10003</td>
                <td scope="col">&#10003</td>
                <td scope="col">&#10003</td>
                <td scope="col"></td>
            </tr>

            <tr>
                <th scope="col">Read</th>
                <td scope="col">&#10003</td>
                <td scope="col">&#10003</td>
                <td scope="col">&#10003</td>
                <td scope="col">&#10003</td>
            </tr>

            <tr>
                <th scope="col">Update</th>
                <td scope="col">&#10003</td>
                <td scope="col">&#10003</td>
                <td scope="col"></td>
                <td scope="col"></td>
            </tr>

            <tr>
                <th>Delete</th>
                <td scope="col"></td>
                <td scope="col"></td>
                <td scope="col"></td>
                <td scope="col"></td>
            </tr>
        </table>

        <p style="font-size: 20px">
        Jika anda menekan salah satu program kerja, maka anda akan diarahkan ke halaman detail beserta list Divisi di dalam program kerja tersebut.<br><br>
            Anda dapat melihat daftar anggota dengan menekan tombol “Lihat anggota” yang berada di bagian kanan setiap tabel divisi.<br><br>
            <b>(HOD)</b> Dapat melihat seluruh list divisi, beserta tugas dan anggota divisi tersebut.<br>
        </p><br><br>

        <h2>Halaman Daftar Anggota</h2><br><br>

        <table class="table table-striped">
            <thead class="table-dark">
            <tr>
                <th scope="col" colspan="5">
                    Hak akses halaman daftar anggota
                </th>
            </tr>

            <tr>
                <th></th>
                <th scope="row">Admin</th>
                <th scope="row">HOD</th>
                <th scope="row">Koor</th>
                <th scope="row">User</th>
            </tr>
            </thead>

            <tr>
                <th scope="col">Create</th>
                <td scope="col">&#10003</td>
                <td scope="col">&#10003</td>
                <td scope="col">&#10003</td>
                <td scope="col"></td>
            </tr>

            <tr>
                <th>Read</th>
                <td scope="col">&#10003</td>
                <td scope="col">&#10003</td>
                <td scope="col">&#10003</td>
                <td scope="col">&#10003</td>
            </tr>

            <tr>
                <th>Update</th>
                <td scope="col"></td>
                <td scope="col"></td>
                <td scope="col"></td>
                <td scope="col"></td>
            </tr>

            <tr>
                <th>Delete</th>
                <td scope="col">&#10003</td>
                <td scope="col">&#10003</td>
                <td scope="col">&#10003</td>
                <td scope="col"></td>
            </tr>
        </table>

        <p style="font-size: 20px">
        Di halaman ini, anda dapat melihat list anggota beserta role dalam suatu divisi.<br><br>
            <b>(HOD)</b> Dapat menambahkan dan menghapus anggota dari semua divisi selain divisi HOD.<br>
            <b>(Koor)</b> Dapat menambahkan dan menghapus anggota dari divisinya.<br>
        </p><br><br>

        <h2>Halaman Daftar Tugas</h2><br><br>

        <table class="table table-striped">
            <thead class="table-dark">
            <tr>
                <th scope="col" colspan="5">
                    Hak akses halaman daftar tugas
                </th>
            </tr>

            <tr>
                <th></th>
                <th scope="row">Admin</th>
                <th scope="row">HOD</th>
                <th scope="row">Koor</th>
                <th scope="row">User</th>
            </tr>
            </thead>

            <tr>
                <th scope="col">Create</th>
                <td scope="col">&#10003</td>
                <td scope="col">&#10003</td>
                <td scope="col">&#10003</td>
                <td scope="col"></td>
            </tr>

            <tr>
                <th scope="col">Read</th>
                <td scope="col">&#10003</td>
                <td scope="col">&#10003</td>
                <td scope="col">&#10003</td>
                <td scope="col">&#10003</td>
            </tr>

            <tr>
                <th scope="col">Update</th>
                <td scope="col">&#10003</td>
                <td scope="col">&#10003</td>
                <td scope="col">&#10003</td>
                <td scope="col">&#10003</td>
            </tr>

            <tr>
                <th scope="col">Delete</th>
                <td scope="col">&#10003</td>
                <td scope="col">&#10003</td>
                <td scope="col">&#10003</td>
                <td scope="col"></td>
            </tr>
        </table>

        <p style="font-size: 20px">
        Pada halaman ini, anda dapat melihat list tugas-tugas dimana anda terdaftar sebagai penanggung jawab.<br><br>
            <b>(Admin)</b> Dapat melihat semua list tugas dari semua program kerja, dan dapat menerima/menolak tugas dengan cepat<br>
            <b>(HOD)</b> Memiliki hak akses yang sama dengan admin, tetapi hanya berlaku pada proker tersebut.<br>
            <b>(Koor)</b> Dapat menerima/menolak tugas anggota divisinya dengan cepat.<br>
        </p>

    <br>
    <br>

        <h2>Halaman User Management (Exclusive for Admin)</h2><br><br>
        <table class="table table-striped">
            <thead class="table-dark">
            <tr>
                <th scope="col" colspan="5">
                    Hak akses user management
                </th>
            </tr>

            <tr>
                <th></th>
                <th scope="row">Admin</th>
                <th scope="row">HOD</th>
                <th scope="row">Koor</th>
                <th scope="row">User</th>
            </tr>
            </thead>

            <tr>
                <th scope="col">Create</th>
                <td scope="col" >&#10003</td>
                <td scope="col"></td>
                <td scope="col"></td>
                <td scope="col"></td>
            </tr>

            <tr>
                <th scope="col">Read</th>
                <td scope="col">&#10003</td>
                <td scope="col"></td>
                <td scope="col"></td>
                <td scope="col"></td>
            </tr>

            <tr>
                <th scope="col">Update</th>
                <td scope="col">&#10003</td>
                <td scope="col"></td>
                <td scope="col"></td>
                <td scope="col"></td>
            </tr>

            <tr>
                <th scope="col">Delete</th>
                <td scope="col">&#10003</td>
                <td scope="col"></td>
                <td scope="col"></td>
                <td scope="col"></td>
            </tr>
        </table>

        <p style="font-size: 20px">
        Pada halaman ini, Admin dapat melihat semua user yang terdaftar di database.<br><br>
            <b>(Admin)</b> Dapat melihat status user yang sedang online dan tidak, serta dapat mengsuspend dan menghapus user yang terdaftar di daftar user.<br>
        </p><br><br>

        <h2>Halaman Daftar Lecturer dan Student (Exclusive for Admin)</h2><br><br>
        <table class="table table-striped">
            <thead class="table-dark">
            <tr>
                <th scope="col" colspan="5">
                    Hak akses halaman Daftar lecturer dan student
                </th>
            </tr>

            <tr>
                <th></th>
                <th scope="row">Admin</th>
                <th scope="row">HOD</th>
                <th scope="row">Koor</th>
                <th scope="row">User</th>
            </tr>
            </thead>

            <tr>
                <th scope="col">Create</th>
                <td scope="col">&#10003</td>
                <td scope="col"></td>
                <td scope="col"></td>
                <td scope="col"></td>
            </tr>

            <tr>
                <th scope="col">Read</th>
                <td scope="col">&#10003</td>
                <td scope="col"></td>
                <td scope="col"></td>
                <td scope="col"></td>
            </tr>

            <tr>
                <th scope="col">Update</th>
                <td scope="col">&#10003</td>
                <td scope="col"></td>
                <td scope="col"></td>
                <td scope="col"></td>
            </tr>

            <tr>
                <th scope="col">Delete</th>
                <td scope="col">&#10003</td>
                <td scope="col"></td>
                <td scope="col"></td>
                <td scope="col"></td>
            </tr>
        </table>

        <p style="font-size: 20px">
        Pada halaman ini, Admin dapat melihat daftar dosen dan mahasiswa yang nantinya bisa didaftarkan sebagai user.<br>
        </p>
    <br>
    <br>

        <h2>Halaman Profil</h2><br><br>

        <table class="table table-striped">
            <thead class="table-dark">
            <tr>
                <th scope="col" colspan="5">
                    Hak akses halaman profil
                </th>
            </tr>

            <tr>
                <th></th>
                <th scope="row">Admin</th>
                <th scope="row">HOD</th>
                <th scope="row">Koor</th>
                <th scope="row">User</th>
            </tr>
            </thead>

            <tr>
                <th scope="col">Create</th>
                <td scope="col"></td>
                <td scope="col"></td>
                <td scope="col"></td>
                <td scope="col"></td>
            </tr>

            <tr>
                <th scope="col">Read</th>
                <td scope="col">&#10003</td>
                <td scope="col">&#10003</td>
                <td scope="col">&#10003</td>
                <td scope="col">&#10003</td>
            </tr>

            <tr>
                <th scope="col">Update</th>
                <td scope="col"></td>
                <td scope="col"></td>
                <td scope="col"></td>
                <td scope="col"></td>
            </tr>

            <tr>
                <th scope="col">Delete</th>
                <td scope="col"></td>
                <td scope="col"></td>
                <td scope="col"></td>
                <td scope="col"></td>
            </tr>
        </table>

        <p style="font-size: 20px">
        Pada halaman ini anda dapat melihat profil/biodata anda.<br><br>
            <b>(HOD | Koor | User)</b> Dapat melihat riwayat jabatan apa saja yang pernah diikuti.
        </p><br><br>

    </div>
@endsection
