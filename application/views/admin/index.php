<head>
    
</head>
<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"><?php echo $title ; ?></h1>
</div>

<!-- Content Row -->
<div class="row">

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-4 col-md-6 mb-4">
        <div class="card border-left-dark shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            Tinggi Air Sungai</div>
                        <h5 class="h5 mb-0 font-weight-bold text-gray-800"><span id="cekwaterlevel">0</span> m</h5>
                    </div>
                    <div class="col-auto">
                    <i class="fas fa-arrows-alt-v fa-2x text-gray-300"></i>
                    </div>
                </div>
                <br>
                <a href="<?=base_url('admin/chart_wl')?>" class="btn btn-primary">Lihat Grafik</a>
            </div>
        </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-4 col-md-6 mb-4">
        <div class="card border-left-warning shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                        Kecepatan Arus Sungai</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><span id='cekwaterflow'>0</span> m/s</div>
                    </div>
                    <div class="col-auto">
                    <i class="fas fa-stopwatch fa-2x text-gray-300"></i>
                    </div>
                </div>
                <br>
                <a href="<?=base_url('admin/chart_wf')?>" class="btn btn-primary">Lihat Grafik</a>
            </div>
        </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-4 col-md-6 mb-4">
        <div class="card border-left-danger shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Tingkat Kekeruhan Air Sungai
                        </div>
                        <div class="row no-gutters align-items-center">
                            <div class="col-auto">
                                <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><span id="cekturbidity">0</span> NTU</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-auto">
                    <i class="fas fa-hand-holding-water fa-2x text-gray-300"></i>
                    </div>
                </div>
                <br>
                <a href="<?=base_url('admin/chart_turbidity')?>" class="btn btn-primary">Lihat Grafik</a>
            </div>
        </div>
    </div>
</div>

<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800"></h1>

<p style="text-align:justify;"><strong>Sistem Pengumpulan Sampah dengan <em>Bubble Barrier</em> dan Sistem Monitoring
Intensitas Sampah serta Parameter Air pada Sungai</strong> dirancang agar dapat mengumpulkan
sampah yang berada di sungai dengan menggunakan Bubble Barrier. Bubble Barrier dibuat
dengan memompa udara melalui tabung pipa berlubang yang ditempatkan pada dasar sungai
dengan bantuan alat kompresor yang diletakkan di tepi sungai. Pada produk tersebut juga
akan dilengkapi fitur-fitur yang membantu pemantauan sampah di sungai. Fitur monitoring
yang akan ditambahkan adalah seperti pembacaan data image processing, sensor laju air,
sensor level air, dan sensor kekeruhan air. Hasil pembacaan data sensor akan ditampilkan pada dashboard sehingga user akan lebih praktis dalam
melakukan monitoring.</p><br>



<!-- div class="col-md-10 p-5 pt-2"> -->
<h4>Multisensor</h4>
<p style="text-align: justify;"> Terdiri dari tiga buah sensor yang dipasangkan pada sungai Sibolahotang, yaitu <strong> Sensor Water Flow </strong> untuk menghitung laju air sungai, <strong> Sensor Water Level </strong> untuk menghitung ketinggian air sungai, dan <strong>  Sensor Turbidity</strong> untuk menghitung tingkat kekeruhan air sungai. </p>
<img src="<?=base_url('assets/img/gambar/multisensor.png')?>" >
<br>
<br><ol style="text-align: justify;">
<li><strong>Sensor Water Level</strong> = Sensor water level, sistem yang mendeteksi jarak sensor dengan permukaan
air. Jika jarak permukaan air mendekati sensor maka sistem akan membunyikan
buzzer atau memberi informasi kepada website sebagai pertanda akan terjadi
banjir.</li>

<li><strong>Sensor Water Flow</strong> = Sensor water flow merupakan salah satu sensor untuk menghitung debit air
yang mengalir serta akan menggerakan motor dalam satuan liter. Motor akan
bergerak sesuai dengan kecepatan aliran air yang mengalir. Sensor water flow
ini terdiri dari katup plastic, rotor air, dan sensor efek Hall.</li>
<li><strong>Sensor Turbidity</strong> = Sensor digunakan untuk mengukur kualitas air secara fisik. Turbidity
(kekeruhan) adalah banyaknya partikel tersuspensi dalam air yang tidak terlihat
sehingga semakin tinggi kekeruhan semakin tinggi risiko diare, kolera dan turunnya tingkat kekeruhan maka air sudah bersih. Sensor turbidity
memantau tingkat kekeruhan air setelah menggunakan Bubble Barrier.</li>
</ol>

<h4>LOKASI PENELITIAN</h4>
<iframe src="https://www.google.com/maps/embed?pb=!4v1646021305195!6m8!1m7!1sFlXZPfQZioYTE-UJ94ttAA!2m2!1d2.340329926240595!2d99.06449840287635!3f83.87314877675755!4f-15.739327396361048!5f0.7820865974627469" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe> 
<br><br> 
<br>





    