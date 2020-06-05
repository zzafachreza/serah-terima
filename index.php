<?php
session_start();
include_once 'admin/api/koneksi.php';
?>
<!DOCTYPE HTML>
<!--
	Hyperspace by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>Expert System | Sistem Pakar</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/css/main.css" />
		<!-- <link rel="stylesheet" href="assets/css/fontawesome-all.min.css" /> -->

		<link rel="shortcut icon" href="admin/assets/media/logo/logo3.png" />
		<link href="admin/assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
		<link href="assets/css/pagePreloaders.css" rel="stylesheet" type="text/css" />
	
	</head>
	<body class="is-preload">

		<!-- Sidebar -->
			<section id="sidebar">
				<div class="inner">
					<nav>
						<ul>
							<li><a href="#intro">Welcome</a></li>
							<li><a href="#one">Artikel</a></li>
							<li><a href="#two">Tentang Aplikasi</a></li>
							<li><a href="#three">Saran/Masukan</a></li>
						</ul>
					</nav>
				</div>
			</section>

		<!-- Wrapper -->
			<div id="wrapper">

				<!-- Intro -->
					<section id="intro" class="wrapper style1 fullscreen fade-up">
						<div class="inner">
							<h1>Expert System</h1>
					
								<?php
										if (!empty($_SESSION['nama_lengkap'])) {
											# code...
											echo "<h3>Selamat Datang, ".$_SESSION['nama_lengkap']."</h3>";

										}
									?>
							
							<p><strong><em>Expert System</em></strong> atau Sistem Pakar untuk Mengetahui  Karakteristik dan kepribadian pada Anak<br />
							Silahkan <strong>LOGIN/REGISTER</strong> untuk melakukan konsultasi.</p>
							<ul class="actions">
								<li><a href="#one" class="button scrolly">Learn more</a></li>
								<li><a href="admin" class="button primary">
									<?php
										if (empty($_SESSION['nama_lengkap'])) {
											# code...
											echo "LOGIN/REGISTER";

										}else{
											echo "KONSULTASI";
										}
									?>
								</a></li>
							</ul>
						</div>
					</section>

				<!-- One -->
					<section id="one" class="wrapper style2 spotlights">


						<?php

						$sqlArtikel="SELECT * FROM artikel ORDER BY id limit 5";
						$hasilArtikel = $conn->query($sqlArtikel);

						while ( $rArtikel = $hasilArtikel->fetch()) {
							# code...
						

						?>

						<section>
							<a href="#" class="image"><img src="assets/images/anak.jpg" alt="" data-position="center center" /></a>
							<div class="content" style="background-image: url('admin/assets/media/bg/bg-2.jpg');">
								<div class="inner">
									<h2><?php echo $rArtikel['judul'] ?></h2>
									<p><?php echo $rArtikel['isi'] ?></p>
									<ul class="actions">
										<li><a class="button primary">Write by : <?php echo $rArtikel['upd'] ?></a></li>
										<li><a class="button"><?php echo Indonesia2Tgl($rArtikel['tgl']) ?></a></li>
										
									</ul>
								</div>
							</div>
						</section>


						<?php
							}
						?>

						
					</section>

				<!-- Two -->
					<section id="two" class="wrapper style3 fade-up" style="background-image: url('admin/assets/media/bg/bg-7.jpg');">
						<div class="inner">
							<h2>Cara Melakukan Konsultasi</h2>
							<p>Pastikan Anda memiliki akun terlebih dahulu agar bisa melakukan konsultasi di Aplikasi Pakar ini</p>
							<div class="features">

								<section>
									<span class="icon solid major fa-sign-in-alt"></span>
									<h3>DAFTAR / LOGIN</h3>
									<p>Melakukan Pendaftaran Akun dan apabila sudah punya tinggal login, kemudian <strong>MENU KONSULTASI</strong></p>
								</section>
						
								<section>
									<span class="icon solid major fa-cog"></span>
									<h3>MENU KONSULTASI</h3>
									<p>Setalah Berhasil Login, kemudian pilih menu Konsultasi pada menu yang tersedia, kemudian <strong>PILIH PASIEN/USER</strong></p>
								</section>
								<section>
									<span class="icon solid major fa-users"></span>
									<h3>PILIH PASIEN/USER</h3>
									<p>Pastikan User/pasien yang dipilih adalah user login Anda, kemudian <strong>JAWAB PETANYAAN</strong></p>
								</section>
								<section>
									<span class="icon solid major fa-desktop"></span>
									<h3>JAWAB PETANYAAN</h3>
									<p>Kemudian pada saat sesi pertanyaan harap jawab dengan sebenar-benarnya agar mendapatkan hasil yang sesuai, kemudian <strong>PILIH HASIL KONSULTASI</strong></p>
								</section>
								<section>
									<span class="icon solid major fa-comments"></span>
									<h3>HASIL KONSULTASI</h3>
									<p>Jika Anda telah menjawab semua pertanyaan maka, akan muncul hasil konsultasi , kemudian <strong>PRINT</strong></p>
								</section>
								<section>
									<span class="icon solid major fa-print"></span>
									<h3>PRINT</h3>
									<p>Hasil Konsultasi dapat diprint dan juga disimpan pada PDF.</p>
								</section>
							</div>
							
						</div>
					</section>

				<!-- Three -->
					<section id="three" class="wrapper style1 fade-up" style="background-image: url('admin/assets/media/bg/bg-2.jpg');">
						<div class="inner">
							<h2>KRITIK DAN SARAN</h2>
							<p>Silahkan kirim kritik dan saran Anda untuk menjadikan aplikasi pakar ini bisa terus berkembang dan menjadi lebih baik lagi</p>
							<div class="split style1">
								<section>
									<form id="formSaran">
										<div class="fields">
											<div class="field half">
												<label for="nama">Name</label>
												<input type="text" name="nama" id="nama" />
											</div>
											<div class="field half">
												<label for="email">Email</label>
												<input type="text" name="email" id="email" />
											</div>
											<div class="field">
												<label for="subjek">Subject</label>
												<input type="text" name="subjek" id="subjek" />
											</div>
											<div class="field">
												<label for="pesan">Message</label>
												<textarea name="pesan" id="pesan" rows="5"></textarea>
											</div>
										</div>
										<ul class="actions">
											<li><a href="" class="button submit">Send Message</a></li>
										</ul>
									</form>
								</section>
								<section>
									<ul class="contact">
										<li>
											<h3>Address</h3>
											<span>Bandung, Jawa Barat <br />
											Indonesia</span>
										</li>
										<li>
											<h3>Email</h3>
											<a href="#">zzafachreza@gmail.com</a>
										</li>
										<li>
											<h3>Phone</h3>
											<span>(+62) 8965-3763-986</span>
										</li>
										<li>
											<h3>Social</h3>
											<ul class="icons">
												<li><a href="#" class="icon brands fa-twitter"><span class="label">Twitter</span></a></li>
												<li><a href="#" class="icon brands fa-facebook-f"><span class="label">Facebook</span></a></li>
												<li><a href="#" class="icon brands fa-github"><span class="label">GitHub</span></a></li>
												<li><a href="#" class="icon brands fa-instagram"><span class="label">Instagram</span></a></li>
												<li><a href="#" class="icon brands fa-linkedin-in"><span class="label">LinkedIn</span></a></li>
											</ul>
										</li>
									</ul>
								</section>
							</div>
						</div>
					</section>

			</div>

		<!-- Footer -->
			<footer id="footer" class="wrapper style1-alt">
				<div class="inner">
					<ul class="menu">
						<li>&copy; 2019. Fachreza Maulana.</li><li>Images: <a href="http://unsplash.com">Unsplash</a></li><li>Design: <a href="http://html5up.net">HTML5 UP</a></li>
					</ul>
				</div>
			</footer>

		<!-- Scripts -->
		<!--begin::Page Vendors(used by this page) -->
		<script src="//www.amcharts.com/lib/3/amcharts.js" type="text/javascript"></script>
		<script src="//www.amcharts.com/lib/3/serial.js" type="text/javascript"></script>
		<script src="//www.amcharts.com/lib/3/radar.js" type="text/javascript"></script>
		<script src="//www.amcharts.com/lib/3/pie.js" type="text/javascript"></script>
		<script src="//www.amcharts.com/lib/3/plugins/tools/polarScatter/polarScatter.min.js" type="text/javascript"></script>
		<script src="//www.amcharts.com/lib/3/plugins/animate/animate.min.js" type="text/javascript"></script>
		<script src="//www.amcharts.com/lib/3/plugins/export/export.min.js" type="text/javascript"></script>
		<script src="//www.amcharts.com/lib/3/themes/light.js" type="text/javascript"></script>

		<!--end::Page Vendors -->

		<!--begin::Page Scripts(used by this page) -->


			<script src="admin/assets/plugins/global/plugins.bundle.js" type="text/javascript"></script>
			
			<script src="assets/js/jquery.min.js"></script>

			<script src="assets/js/jquery.scrollex.min.js"></script>
			<script src="assets/js/jquery.scrolly.min.js"></script>
			<script src="assets/js/browser.min.js"></script>
			<script src="assets/js/breakpoints.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/pagePreloaders.js"></script>

			<script src="assets/js/main.js"></script>
			
			

	</body>
</html>

