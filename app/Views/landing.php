<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Informasi Mahasiswa Saintek UNIB</title>
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <link rel="stylesheet" href="<?= base_url()?>/css/swiper-bundle.min.css">
    <link rel="stylesheet" href="<?= base_url()?>/css/style1.css">
    <link href="css/styles.css" rel="stylesheet" />
</head>

<body id="page-top">

    <header>
        <div class="nav-bar">
            <img src="<?= base_url()?>/img/logo.png" alt="" height="75px">
            <div class="navigation">
                <div class="nav-items">
                    <i class="uil uil-times nav-close-btn"></i>
                    <a href="#page-top"><i class="uil uil-home"></i> Home</a>
                    <a href="#explore"><i class="uil uil-compass rounded"></i> Explore</a>
                    <a href="https://saintek-ibrahimy.ac.id/kontak/"><i class="uil uil-envelope"></i> Contact</a>
                    <a href="<?= base_url('/login/index')?>"><i class="uil uil-info-circle"></i>Login</a>
                </div>
            </div>
            <i class="uil uil-apps nav-menu-btn"></i>
        </div>
    </header>

    <section class="home">
        <div class="media-icons">
            <a href="#"><i class="uil uil-facebook-f"></i></a>
            <a href="#"><i class="uil uil-instagram"></i></a>
            <a href="#"><i class="uil uil-twitter"></i></a>
        </div>

        <div class="swiper bg-slider">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <img src="<?= base_url()?>/img/bg1.jpg" alt="">
                    <div class="text-content">
                        <h2 class="title">SAINTEK <span>Universitas Ibrahimy</span></h2>
                        <p>
                            Sebuah tempat bagi para santri dan non santri yang memegang teguh nilai-nilai agama yang di
                            padukan dengan sains guna mendapatkan kesempatan untuk mengembangkan diri.
                        </p>
                        <button class="read-btn">Geser <i class="uil uil-arrow-right"></i></button>
                    </div>
                </div>
                <div class="swiper-slide dark-layer">
                    <img src="<?= base_url()?>/img/bg2.jpg" alt="">
                    <div class="text-content">
                        <h2 class="title">Laporan <span>Mahasiswa</span></h2>
                        <p>Keluh kesah mahasiswa ataupun problematika yang dialami mahasiswa yang berkaitan dengan
                            fakultas seperti
                            fasilitas UKM dan lain sebagainya bisa disampaikan disini dan akan ditanggapi langsung pihak
                            fakultas
                            SAINTEK bila laporan tersebut dirasa sangat penting demi kemajuan fakultas SAINTEK
                            Universitas Ibrahimy
                            kedepannya.</p>
                        <button class="read-btn">Geser <i class="uil uil-arrow-right"></i></button>
                    </div>
                </div>
                <div class="swiper-slide dark-layer">
                    <img src="<?= base_url()?>/img/bg3.jpg" alt="">
                    <div class="text-content">
                        <h2 class="title">Peminjaman Barang <span>Mahasiswa</span></h2>
                        <p>Peminjaman barang akan didata dan disimpan kedalam database oleh pihak fakultas. Untuk
                            mahasiswa yang
                            belum mengembalikan barang akan dikenai sanksi sesuai keputusan dari pihak fakultas. Oleh
                            karena itu
                            diharapkan kepada para mahasiswa agar tetap menjaga barang milik bersama Khususnya fakultas
                            SAINTEK
                            Universitas Ibrahimy </p>
                        <button class="read-btn">Geser<i class="uil uil-arrow-right"></i></button>
                    </div>
                </div>
            </div>
        </div>
        </div>

        <div class="bg-slider-thumbs">
            <div class="swiper-wrapper thumbs-container">
                <img src="<?= base_url()?>/img/bg1.jpg" class="swiper-slide" alt="">
                <img src="<?= base_url()?>/img/bg2.jpg" class="swiper-slide" alt="">
                <img src="<?= base_url()?>/img/bg3.jpg" class="swiper-slide" alt="">
            </div>
        </div>
    </section>

    <section class="about section" id="explore">
        <h2>Sains dan Teknologi Universitas Ibrahimy</h2>
        <ul>
            <li>
                Visi
            </li>

        </ul>
        <p>Menjadi Fakultas unggul di bidang sains dan teknologi berbasis pesantren dan berdaya saing di Tingkat Asia
            pada tahun 2040.</p>

        <ul>
            <li>Misi</li>
        </ul>
        <p>Berdasarkan Visi tersebut diatas, maka Misi Fakultas Sains dan Teknologi Universitas Ibrahimy ditetapkan
            sebagai berikut :</p>

        <ol style="list-style-type:circle">
            <li> Menyelenggarakan pendidikan sains dan teknologi melalui proses pembelajaran dan pengembangan potensi
                mahasiswa yang terintegrasi dan terinterkoneksi dengan nilai-nilai Islam agar menjadi lulusan unggul dan
                berdaya saing;</li>
            <li> Menyelenggarakan, mengembangkan dan menyebarluaskan penelitian sains dan teknologi sesuai kearifan
                lokal dan
                nilai-nilai Islam;</li>
            <li>Menyelenggarakan pengabdian kepada masyarakat untuk meningkatkan pemberdayaan dan penguatan sains dan
                teknologi bagi kepentingan agama, masyarakat, dan bangsa;</li>
            <li> Meningkatkan kerjasama regional, nasional, dan internasional dengan berbagai pihak dalam rangka
                menyelenggarakan pendidikan, penelitian dan pengabdian kepada masyarakat;
            </li>
        </ol>
        <ul>
            <li>Tujuan</li>
        </ul>
        <p> Tujuan pendirian Fakultas Sains dan Teknologi Universitas Ibrahimy adalah sebagai berikut :</p>

        <ol style="list-style-type:circle">
            <li>Terwujudnya lulusan diploma dan sarjana yang memiliki kompetensi yang profesional dan berdaya saing;
            </li>
            <li>Terwujudnya budaya riset di bidang sains dan teknologi berbasis kearifan lokal dan nilai-nilai Islam.
            </li>
            <li>Terwujudnya masyarakat yang berdaya dan mampu menerapkan sains dan teknologi yang terintegrasi dengan
                nilai-nilai Islam dalam kehidupan beragama, berbangsa dan bernegara;</li>
            <li>Terwujudnya jejaring kerjasama Fakultas Sains dan Teknologi di tingkat regional, nasional, dan
                internasional. </li>
        </ol>
        <ul>
            <li>Strategi</li>
        </ul>
        <p> Dalam rangka mewujudkan visi, misi dan tujuan Fakultas Sains dan Teknologi Universitas Ibrahimy, dilakukan
            berbagai macam strategi seperti:</p>

        <ol style="list-style-type:circle">
            <li> Penguatan kelembagaan Fakultas Sains dan Teknologi Universitas Ibrahimy</li>
            <li> Peningkatan kemampuan dan kapasitas dosen dalam pendidikan dan pengajaran,</li>
            <li>Peningkatan publikasi karya ilmiah dosen,</li>
            <li> Penguatan dan pemantapan sarana-prasarana pembelajaran,</li>
            <li>Peningkatan kualitas lulusan,</li>
            <li>Peningkatan kerjasama kelembagaan strategis.</li>
        </ol>
        <ul>
            <li>Tata Nilai</li>
        </ul>
        <p>Segenap umana’ Fakultas Sains dan Teknologi Uiversitas Ibrahimy dalam melaksanakan tugas, fungsi dan
            tanggung jawabnya menerapkan nilai dan sikap dasar sebagai berikut:
        </p>
        <ol style="list-style-type:circle">
            <li> Selalu memegang teguh nilai-nilai luhur Islam ahlussunah wal jama’ah dalam melaksanakan tugasnya;</li>
            <li> Mengedepankan profesionalisme dalam memberikan pelayanan kepada masyarakat dengan karakter Al Sidq, Al
                Amanah, Al adalah, At Taawun, dan Al Istiqamah</li>
        </ol>



        </p>
    </section>

    <script src="<?= base_url()?>/js/swiper-bundle.min.js"></script>
    <script src="<?= base_url()?>/js/main.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
</body>

</html>