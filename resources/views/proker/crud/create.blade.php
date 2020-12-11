@extends('layouts.html')

@section('judul')
    Tambah Proker
@endsection

@section('content')
    <div id="wrapper">
        <nav class="navbar navbar-dark align-items-start sidebar sidebar-dark accordion bg-gradient-primary p-0" style="background: linear-gradient(rgba(255,196,45,0.62) 97%, rgba(255,255,255,0) 100%), url(&quot;../assets/img/SLBaru.jpeg&quot;) top / auto no-repeat, #ffc42d;">
            <div class="container-fluid d-flex flex-column p-0">
                <a class="navbar-brand d-flex justify-content-center align-items-center mt-3 m-0" href="#">
                    <div class="sidebar-brand-icon rotate-n-15"></div>
                    <div class="sidebar-brand-text mx-3"><span style="color: #000000;"><b>ManSUn&nbsp;</b></span></div>
                </a>
                <hr class="sidebar-divider my-0">
                <ul class="nav navbar-nav text-light" id="accordionSidebar">
                    <li class="nav-item"><a class="nav-link active" href="index.html"><i class="fas fa-home"></i><span>Beranda</span></a></li>
                    <li class="nav-item"><a class="nav-link" href="jadwwal.html"><i class="far fa-calendar-alt"></i><span>Jadwal</span></a></li>
                    <li class="nav-item"><a class="nav-link" href="profile.html"><i class="fas fa-user"></i><span>User Management</span></a></li>
                    <li class="nav-item"><a class="nav-link" href="table.html"><i class="fas fa-table"></i><span>Table</span></a></li>
                    <li class="nav-item"><a class="nav-link" href="login.html"><i class="far fa-user-circle"></i><span>Login</span></a></li>
                </ul>
                <div class="text-center d-none d-md-inline"><button class="btn rounded-circle border-0" id="sidebarToggle" type="button"></button></div>
            </div>
        </nav>
        <div class="d-flex flex-column" id="content-wrapper">
            <div id="content">
                <nav class="navbar navbar-light navbar-expand bg-white shadow mb-4 topbar static-top">
                    <div class="container-fluid">
                        <img class="logo mr-4" src="{{asset('image/logo.png')}}">
                        <button class="btn btn-link d-md-none rounded-circle ml-3 mr-3" id="sidebarToggleTop" type="button"><i class="fas fa-bars"></i></button><strong>Tambah Program Kerja</strong>
                        <form class="form-inline d-none d-sm-inline-block mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                            <div class="input-group">
                                <div class="input-group-append"></div>
                            </div>
                        </form>
                        <ul class="nav navbar-nav flex-nowrap ml-auto">
                            <li class="nav-item dropdown d-sm-none no-arrow"><a class="dropdown-toggle nav-link" data-toggle="dropdown" aria-expanded="false" href="#"><i class="fas fa-search"></i></a>
                                <div class="dropdown-menu dropdown-menu-right p-3 animated--grow-in" aria-labelledby="searchDropdown">
                                    <form class="form-inline mr-auto navbar-search w-100">
                                        <div class="input-group"><input class="bg-light form-control border-0 small" type="text" placeholder="Search for ...">
                                            <div class="input-group-append"><button class="btn btn-primary py-0" type="button"><i class="fas fa-search"></i></button></div>
                                        </div>
                                    </form>
                                </div>
                            </li>
                            <li class="nav-item dropdown no-arrow mx-1">
                                <div class="nav-item dropdown no-arrow"><a class="dropdown-toggle nav-link" data-toggle="dropdown" aria-expanded="false" href="#"><span class="badge badge-danger badge-counter">3+</span><i class="fas fa-bell fa-fw"></i></a>
                                    <div class="dropdown-menu dropdown-menu-right dropdown-list dropdown-menu-right animated--grow-in">
                                        <h6 class="dropdown-header">alerts center</h6>
                                        <a class="d-flex align-items-center dropdown-item" href="#">
                                            <div class="mr-3">
                                                <div class="bg-primary icon-circle"><i class="fas fa-file-alt text-white"></i></div>
                                            </div>
                                            <div><span class="small text-gray-500">December 12, 2019</span>
                                                <p>A new monthly report is ready to download!</p>
                                            </div>
                                        </a>
                                        <a class="d-flex align-items-center dropdown-item" href="#">
                                            <div class="mr-3">
                                                <div class="bg-success icon-circle"><i class="fas fa-donate text-white"></i></div>
                                            </div>
                                            <div><span class="small text-gray-500">December 7, 2019</span>
                                                <p>$290.29 has been deposited into your account!</p>
                                            </div>
                                        </a>
                                        <a class="d-flex align-items-center dropdown-item" href="#">
                                            <div class="mr-3">
                                                <div class="bg-warning icon-circle"><i class="fas fa-exclamation-triangle text-white"></i></div>
                                            </div>
                                            <div><span class="small text-gray-500">December 2, 2019</span>
                                                <p>Spending Alert: We've noticed unusually high spending for your account.</p>
                                            </div>
                                        </a><a class="text-center dropdown-item small text-gray-500" href="#">Show All Alerts</a></div>
                                </div>
                            </li>
                            <li class="nav-item dropdown no-arrow mx-1">
                                <div class="shadow dropdown-list dropdown-menu dropdown-menu-right" aria-labelledby="alertsDropdown"></div>
                            </li>
                            <div class="d-none d-sm-block topbar-divider"></div>
                            <li class="nav-item dropdown no-arrow">
                                <div class="nav-item dropdown no-arrow"><a class="dropdown-toggle nav-link" data-toggle="dropdown" aria-expanded="false" href="#"><span class="d-none d-lg-inline mr-2 text-gray-600 small">Valerie Luna</span><img class="border rounded-circle img-profile" src="assets/img/avatars/avatar1.jpeg"></a>
                                    <div
                                        class="dropdown-menu shadow dropdown-menu-right animated--grow-in"><a class="dropdown-item" href="#"><i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>&nbsp;Profile</a><a class="dropdown-item" href="#"><i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>&nbsp;Settings</a>
                                        <a
                                            class="dropdown-item" href="#"><i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>&nbsp;Activity log</a>
                                        <div class="dropdown-divider"></div><a class="dropdown-item" href="#"><i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>&nbsp;Logout</a></div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>
                <div class="container-fluid">
                    <div class="d-sm-flex justify-content-between align-items-center mb-4">
                        <h3 class="text-dark mb-0">Tambah Program Kerja</h3>

                    </div>
                    <hr class="garisKuning">
                    <div class="form-floating mb-3">
                        <label for="nama_proker">Nama Program Kerja : </label>
                        <input type="text" class="form-control" id="nama_proker" name="nama_proker" placeholder="Input nama program kerja yang akan diisi...">
                    </div>
                    <div class="form-floating mb-3">
                        <label for="deskripsi_proker">Deskripsi : </label>
                        <textarea rows="4" class="form-control" id="description" name="description"></textarea>
                    </div>
                    <div class="row g-2">
                        <div class="col-md">
                            <div class="form-floating mb-3">
                                <label for="tanggal_mulai">Tanggal Mulai : </label>
                                <input type="date" class="form-control" id="tanggal_mulai" name="tanggal_mulai" placeholder="name@example.com" value="tanggalmulai">
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="form-floating mb-3">
                                <label for="tanggal_akhir">Tanggal Berakhir : </label>
                                <input type="date" class="form-control" id="tanggal_akhir" name="tanggal_akhir" placeholder="name@example.com" value="tanggalakhir">
                            </div>
                        </div>
                    </div>
                    <div class="row g-2">
                        <div class="col-md">
                            <div class="form-floating mb-3">
                                <label for="pemasukkan">Pemasukkan : </label>
                                <input type="number" class="form-control" id="pemasukkan" name="pemasukkan" placeholder="Total pemasukkan..." value="pemasukan">
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="form-floating mb-3">
                                <label for="pengeluaran">Pengeluaran : </label>
                                <input type="number" class="form-control" id="pengeluaran" name="pengeluaran" placeholder="Total pengeluaran..." value="pengeluaran">
                            </div>
                        </div>
                    </div>
                    <div class="form-floating mb-3">
                        <label for="medos">Akun Instagram : </label>
                        <input type="text" class="form-control" id="medsos" name="medsos" placeholder="Input username account instagram proker kalian...">
                    </div>
                    <div class="form-floating mb-3">
                        <label for="proposal">Link Proposal : </label>
                        <input type="text" class="form-control" id="proposal" name="proposal" placeholder="Input link proposal kalian...">
                    </div>
                    <div class="form-floating mb-3">
                        <label for="lpj">Link Laporan Pertanggung Jawaban: </label>
                        <input type="text" class="form-control" id="lpj" name="lpj" placeholder="Input nama program kerja yang akan diisi...">
                    </div>
                    <div class="form-floating mb-3">
                        <label for="gambar_proker">Thumbnail : </label>
                        <input type="file" class="form-control-file" id="gambar_proker" name="gambar_proker">
                    </div>
                    <div class="row g-2">
                        <div class="col-md">
                            <div class="form-floating mb-3">
                                <label for="status_proker_id">Status Acara</label>
                                <select class="form-select" id="status_proker_id" name="status_proker_id" aria-label="Floating label select example">
                                    <option selected>Status Acara</option>
                                    <option value="1">Berlangsung</option>
                                    <option value="2">Selesai</option>
                                    <option value="3">Belum dimulai</option>
                                </select>

                            </div>
                        </div>
                        <div class="d-sm-flex justify-content-between align-items-center mb-4">
                            <a class="btn bg-mansun-blue text-white btn-sm d-none d-sm-inline-block mr-5" role="button" href="#">&nbsp;Tambah Proker</a>
                        </div>

                    </div>


                </div>
            </div>
            <footer class="bg-white sticky-footer" style="opacity: 1;background: linear-gradient(#1789fc 100%, rgba(255,255,255,0) 100%);color: rgb(255,255,255);">
                <div class="container my-auto">
                    <div class="text-center my-auto copyright"><span>Copyright © Mansun 2020</span></div>
                </div>
            </footer>
        </div><a class="border rounded d-inline scroll-to-top" href="#page-top"><i class="fas fa-angle-up"></i></a></div>
@endsection
