<?php

 header("Access-Control-Allow-Origin: *");

 include_once '../../api/koneksi.php';

$id = $_POST['id'];

$sqlHd = "SELECT * FROM retur WHERE id='$id'";

$dataHd = $conn->query($sqlHd)->fetch();


//barcode QR
 
$id= $dataHd['id'];
$nama_supplier= $dataHd['nama_supplier'];
$nama_barang= $dataHd['nama_barang'];
$qty= $dataHd['qty'];
$total= $dataHd['total'];
$pengambilan_barang= $dataHd['pengambilan_barang'];
$no_retur= $dataHd['no_retur'];

$isi_teks = $no_retur;
$namafile = "coba.png";
$quality = 'H'; //ada 4 pilihan, L (Low), M(Medium), Q(Good), H(High)
$ukuran = 5; //batasan 1 paling kecil, 10 paling besar
$padding = 0;
$tempdir =''; 
$qr = QRCode::png($isi_teks,$tempdir.$namafile,$quality,$ukuran,$padding);
 
$path = $tempdir.$namafile;
$type = pathinfo($path, PATHINFO_EXTENSION);
$data = file_get_contents($path);
$base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
  $qrcode = '<img width="100" height="100" src="'.$base64.'" />';

//barcode Batang 128

               $img      = code128BarCode($isi_teks, 1);
              ob_start();
              imagepng($img);
           
              $output_img   = ob_get_clean();
              echo "";

 $barcode128 ='<img width="250" height="60" src="data:image/png;base64,'.base64_encode($output_img).'" />'; 



?>
<div class="kt-content  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" id="kt_content">

						<!-- end:: Subheader -->

						<!-- begin:: Content -->
						<div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
							<div class="kt-portlet">
								<div class="kt-portlet__body kt-portlet__body--fit">
									<div class="kt-invoice-1">
										<div class="kt-invoice__head" style="background-image: url(assets/media/bg/bg-1.jpg);padding: 10px;color: #FFF">
											<div class="kt-invoice__container">
												<div class="kt-invoice__brand">
													<h1 class="kt-invoice__title">HASIL SERAH TERIMA</h1>
													<h4><?php echo $no_retur ?></h4>
													<div  class="kt-invoice__logo">
												
														<span class="kt-invoice__desc">
															<span>Aplikasi Serah Terima Retur</span>
														
														</span>
													</div>
												</div>
												<div class="kt-invoice__items">
													<div class="kt-invoice__item">
														<span class="kt-invoice__subtitle">Tanggal : </span>
														<span class="kt-invoice__text"><?php echo Indonesia2Tgl($dataHd['tgl']); ?></span>
													</div>
											
												</div>
											</div>
										</div>
										<div class="kt-invoice__body" style="padding:10px">
											<div class="kt-invoice__container">


												<div class="kt-portlet kt-portlet--height-fluid">
														<div class="kt-portlet__body">
															<div class="kt-widget kt-widget--user-profile-3">
																<div class="kt-widget__top">
																	<div class="kt-widget__media kt-hidden-">
																		<!-- <img src="<?php echo $dataHd['foto'] ?>" alt="image"> -->
																	</div>
																	<div class="kt-widget__pic kt-widget__pic--danger kt-font-danger kt-font-boldest kt-font-light kt-hidden">
																		JM
																	</div>
																	<div class="kt-widget__content">
																		<div class="kt-widget__head">
																			<a  class="kt-widget__username">
																				<?php echo $nama_supplier ?>
																				

																				<i class="flaticon2-correct"></i><br/>
																				
																			</a>
																			<div class="kt-widget__action">
																				<?php echo $barcode128 ?><br/>
																				<center><small><?php echo $no_retur ?></small></center>

																			</div>
																		</div>
																		<div class="kt-widget__subhead">
																			<a ><i class="flaticon2-new-email"></i><?php echo $dataHd['email'] ?></a>
																			<a ><i class="flaticon2-calendar-3"></i><?php echo $dataHd['jenis_kelamin'] ?> </a>
																			<a ><i class="flaticon2-telegram-logo"></i><?php echo $dataHd['telepon'] ?></a>
																		</div>
																		<div class="kt-widget__info">
																			<div class="kt-widget__desc">
																				<?php echo $dataHd['alamat'] ?>
																				
																			</div>
																			<div class="kt-widget__progress">
																				<div class="kt-widget__text">
																					Complete
																				</div>
																				<div class="progress" style="height: 5px;width: 100%;">
																					<div class="progress-bar kt-bg-success" role="progressbar" style="width: 100%;" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
																				</div>
																				<div class="kt-widget__stats">
																					100%
																				</div>

																			</div>
																		</div>
																	</div>
																</div>

																<center>
																	<h1><?php echo $dataHd['hasil'] ?></h1>
															
																</center>
																<div class="kt-widget__bottom">
																	
																	<div class="kt-widget__item">
																		<div class="kt-widget__icon">
																			<i class="flaticon-pie-chart"></i>
																		</div>
																		<div class="kt-widget__details">
																			<span class="kt-widget__title">Nama Barang</span>
																			<span class="kt-widget__value" style="font-size: large;">
																				<?php echo $nama_barang?>
																			</span>
																		</div>
																	</div>
																	<div class="kt-widget__item">
																		<div class="kt-widget__icon">
																			<i class="flaticon-file-2"></i>
																		</div>
																		<div class="kt-widget__details">
																			<span class="kt-widget__title">Jumlah</span>
																			<span class="kt-widget__value" style="font-size: large;">
																				<?php echo $qty ?>
																			</span>
																		</div>
																	</div>

																	<div class="kt-widget__item">
																		<div class="kt-widget__icon">
																			<i class="flaticon-file-2"></i>
																		</div>
																		<div class="kt-widget__details">
																			<span class="kt-widget__title">Potongan</span>
																			<span class="kt-widget__value" style="font-size: large;">
																				<?php echo number_format($total,2) ?>
																			</span>
																		</div>
																	</div>
																	
																	
																</div>
															</div>
														</div>
												
												</div>


										
											</div>
							

											<div class="row">
												<div class="kt-separator kt-separator--border-dashed kt-separator--space-lg col-sm-4">
												</div>
												<div class="col-sm-4">
													<center><h2><?php echo $pengambilan_barang ?></h2></center>
												</div>
												<div class="kt-separator kt-separator--border-dashed kt-separator--space-lg col-sm-4">
												</div>
												
											</div>
										

											<div class="kt-portlet kt-portlet--height-fluid">
													


												
												</div>

												<div class="col-sm-1 offset-sm-10">
																	<?php echo $qrcode ?>
																</div>

										<div class="kt-invoice__actions">
										

								
												<button type="button" class="hilang btn btn-brand btn-bold" onclick="printHasil();">
												<i class="fa fa-print"></i>
												Print Hasil</button>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>

						<!-- end:: Content -->
					</div>

					