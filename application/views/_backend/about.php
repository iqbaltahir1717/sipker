<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?php echo $setting[0]->setting_appname; ?></title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="icon" href="<?php echo base_url(); ?>assets/core-images/<?php echo $setting[0]->setting_logo; ?>">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/core-admin/core-component/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/core-admin/core-dist/css/AdminLTE.min.css">
    <style type="text/css">
        body {
            background: #fff !important;
            color: #24296B;
        }

        .fontPoppins {
            font-family: 'Poppins', sans-serif;
        }

        input {
            border: 1px solid #1f1f1f;
            border-radius: 12px;
            padding: 14px;
            display: block;
            width: 100%;
        }

        .btn-login {
            background: #AECBFB;
            padding: 14px 0;
            border-radius: 12px;
            font-family: Poppins;
            font-style: normal;
            font-weight: normal;
        }

        .box-content2 h1 {
            font-family: Poppins;
            font-style: normal;
            font-weight: 600;
            font-size: 40px;
            color: #1F1F1F;
        }

        .box-content {
            position: relative;
        }

        .box-value {
            position: relative;
            top: 80px;
        }

        .img-hero {
            width: 45vw;
        }

        .shape {
            content: '';
            position: fixed;
            border-radius: 100%;
            ;
            /* z-index: 9999; */
        }

        .shape1 {
            top: -20em;
            left: -16em;
            height: 400px;
            width: 400px;
            background: #E7EFFC
        }

        .shape2 {
            bottom: -10em;
            left: -16em;
            height: 400px;
            width: 400px;
            background: #A0C3FC;
            z-index: 9999;
        }

        .shape3 {
            top: -10em;
            right: -13em;
            height: 400px;
            width: 400px;
            background: #AECBFB
        }

        .shape4 {
            bottom: -19em;
            right: -13em;
            height: 400px;
            width: 400px;
            background: #E8F0FC
        }
    </style>
</head>

<body class="hold-transition login-page fontPoppins">
    <div class="shape shape1"></div>
    <div class="shape shape2"></div>
    <div class="shape shape3"></div>
    <div class="shape shape4"></div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="col-lg-6 col-sm-6" style="position: fixed;">
                    <div class="d-flex justify-content-around">
                        <div class="box-content text-center">
                            <div class="box-value">
                                <h3>SISTEM INFORMASI PENILAIAN KINERJA</h3>
                                <p style="font-weight: 700; font-size: 37px;">(SIPKER)</p>
                            </div>
                            <img class="img-hero" src="<?php echo base_url(); ?>assets/core-images/hero.gif">
                        </div>
                    </div>
                    <p class="text-center">
                        <?php echo $setting[0]->setting_owner_name; ?><br>
                        <b>Since @<?php echo date('Y'); ?></b>
                    </p>
                </div>
                <div class="col-lg-6 col-sm-6" style="">

                </div>
                <div class="col-lg-6 col-sm-6" style="padding: 100px;">
                    <div class="d-flex align-items-start flex-column">
                        <div class="box-content2 mt-auto">
                            <h4>Tentang Aplikasi</h4>
                        </div>
                        <?php echo form_open("auth/validate", "class='login-form'"); ?>
                        <div class="box-content mb-auto">
                            Mahasiswa adalah mereka yang belajar di peguruan tinggi, secara adminitrasi mereka terdaftar sebagai murid di perguruan tinggi. Sudah semestinya pelayanan pendidikan tinggi harus berorientasi kepada mahasiswa. Aliffudin (2012), menyatakan bahwa pelayanan pendidikan merupakan hak mahasiswa yang wajib dipenuhi oleh perguruan tinggi sebagai penyedia jasa. Mahasiswa menjadi aspek penting dalam mengevaluasi fasilitas dan kinerja dosen sebagai bagian dari pelayanan pendidikan
                            <br> <br>
                            Menurut A.D Rooijakkers, evaluasi adalah suatu usaha atau proses untuk menentukan nilai-nilai. Secara khusus evaluasi atau penilaian juga diartikan sebagai proses pemberian nilai berdasarkan data kuantitatif hasil pengukuran untuk keperluan pengambilan keputusan. Evaluasi yang di lakukan oleh mahasiswa dapat menjadi masukan terhadap kelengkapan fasilitas dan kinerja dosen, demi kemajuan fakultas disuatu perguruan tinggi, terkhusus Fakultas Teknik Univesitas Halu Oleo.
                            <br><br>
                            <img class="mb-3" src="https://source.unsplash.com/Hcfwew744z4/400x300" style="border-radius:24px"><br><br>
                            Masalah tingkat kepuasan mahasiswa ini sangat penting, karena berhubungan dengan tujuan yang ditetapkan dan diinginkan fakultas Teknik Universitas Halu Oleo dalam membuat web portal. Salah satu tujuan dari adanya website tersebut yaitu menyebarkan informasi-informasi yang berhubungan dengan proses dan kegiatan akademik secara global, up to date dan akurat kepada para mahasiswa. Evaluasi kepuasan mahasiswa terhadap fasilitas dan dosen dapat dilakuan dengan menggunakan metode importance and performance analysis (IPA), karena memiliki beberapa kelebihan dibandingkan dengan metode lain. Kelebihan tersebut antara lain dapat menunjukkan atribut produk/jasa yang perlu ditingkatkan ataupun dikurangi untuk menjaga kepuasan konsumen, hasilnya relatif mudah diimplementasikan, skalanya relatif mudah dimengerti, dan membutuhkan biaya yang rendah. Metode ini memiliki beberapa keunggulan antara lain efisiensi (tidak hanya indeks kepuasan tetapi sekaligus memperoleh
                            informasi yang berhubungan dengan dimensi/atribut yang perlu diperbaiki), mudah digunakan dan sederhana serta menggunakan skala yang memiliki sensitivitas dan reliabilitas cukup tinggi.
                            <br><br>
                            Menurut Ruhimat (2008), metode importance and performance analysis (IPA) merupakan suatu teknik penerapan yang mudah untuk mengatur atribut dari tingkat kepentingan dan tingkat pelaksanaan itu sendiri yang berguna untuk pengembangan program pemasaran yang efektif. Menurut Suryawan dan Dharmayanti (2013), kepuasan pelanggan (Customer Satisfaction) ditentukan oleh persepsi pelanggan atas performance (kinerja) produk atau jasa dalam memenuhi harapan pelanggan. Pelanggan akan merasa puas apabila harapannya terpenuhi atau akan sangat puas jika harapannya terlampaui.
                            <br><br>
                            Bersarkan uraian diatas, penulis kemudian tertarik untuk melakukan penelitian berkenaan dengan “EVALUASI KEPUASAN MAHASISWA TERHADAP FASILITAS DAN DOSEN FAKULTAS TEKNIK DENGAN MENGGUNAKAN METODE IMPORTANCE AND PERFORMANCE ANALYSIS (IPA)”.

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <script src="<?php echo base_url(); ?>assets/core-admin/core-component/jquery/dist/jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/core-admin/core-component/bootstrap/dist/js/bootstrap.min.js"></script>
</body>

</html>