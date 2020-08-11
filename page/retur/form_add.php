<?php
 header("Access-Control-Allow-Origin: *");
 include_once '../../api/koneksi.php';

$sql = "SELECT * FROM master_user WHERE level='Supplier'";

$hasil = $conn->query($sql);

?>
							<div class="kt-portlet">



										<!--begin::Form-->

										<form class="kt-form" id="formAddRetur" enctype="multipart/form-data">

											<div class="kt-portlet__body">

												<div class="row">

													<div class="col col-sm-12">

														<div class="form-group">

															<label>nomor retur :</label>

															<input name="no_retur" type="text" class="form-control" placeholder="Enter nomor retur">

															<span class="form-text text-muted">masukan nomor retur</span>

														</div>
														<div class="form-group">

															<label>nama supplier :</label>

															<select class="form-control selectza" name="nama_supplier" data-live-search="true">
																<?php
																	while($r = $hasil->fetch()){
																?>
																	<option><?php echo $r['nama_lengkap'] ?></option>

																<?php
																	}
																?>
															</select>

															<!-- <input name="nama_supplier" type="text" class="form-control" placeholder="masukan nama supplier"> -->

															<span class="form-text text-muted">masukan nama supplier</span>

														</div>
														<div class="form-group">

															<label>nama barang :</label>

															<input name="nama_barang" type="text" class="form-control" placeholder="masukan nama barang">

															<span class="form-text text-muted">masukannama barang</span>

														</div>
														<div class="form-group">

															<label>Jumlah :</label>

															<input name="qty" type="text" class="form-control" placeholder="masukan Jumlah">

															<span class="form-text text-muted">masukan Jumlah</span>

														</div>

														<div class="form-group">

															<label>Potongan :</label>

															<input name="total" type="text" class="form-control" placeholder="masukan Potongan">

															<span class="form-text text-muted">masukan Potongan</span>

														</div>

														<div class="form-group">

															<label>Keterangan / Orang yang Ambil :</label>

															<input name="pengambilan_barang" type="text" class="form-control" placeholder="Enter masukan Keterangan">

															<span class="form-text text-muted">masukan Keterangan / Orang yang Ambil</span>

														</div>
														
														

														

													</div>
													

												</div>

												

												
											<div class="kt-portlet__foot kt-portlet__foot--solid">

												<div class="kt-form__actions kt-form__actions--right">

													 <a onclick="MenuRetur()"  class="btn btn-clean kt-margin-r-10">

													<i class="la la-arrow-left"></i>

													<span class="kt-hidden-mobile">Back</span>

													</a>

													<button type="SUBMIT" class="btn btn-brand">Submit</button>

													<button type="reset" class="btn btn-secondary">Cancel</button>

													

												</div>

											</div>





										</form>



										<!--end::Form-->

							</div>

							<script type="text/javascript">

						
								$(".selectza").selectpicker();
								
									$("#formAddRetur").submit(function(e){
										e.preventDefault();

										var data = $(this).serialize();

										$.ajax({
											url:'api/retur_add.php',
											type:'POST',
											data:data,
											success:function(data){
												if (data==200) {

													MenuRetur();
													Not("data berhasil ditambah","success","check-circle");
												
												}else{
													alert(data);
												}
											}
										})

									});

							</script>