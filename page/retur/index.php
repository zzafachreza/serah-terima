<?php

 header("Access-Control-Allow-Origin: *");

 



?>





							<div class="kt-portlet kt-portlet--mobile">

							



								<div class="kt-portlet__head kt-portlet__head--lg">

									<div class="kt-portlet__head-label">

										<span class="kt-portlet__head-icon">

											<i class="kt-font-brand flaticon2-line-char"></i>

										</span>

										<button onclick="UserGuide()" class="btn btn-info"><i class="flaticon-questions-circular-button"></i> User Guide</button>

									</div>

									<div class="kt-portlet__head-toolbar">

										<div class="kt-portlet__head-wrapper">

											<div class="kt-portlet__head-actions">

													<?php
													session_start();
												if($_SESSION['level']==='Admin'){
													?>

													<button type="button" id="btnPilihAll"  class="btn btn-danger btn-icon-sm" >

														<i class="la la-trash"></i> Delete <?php echo $_SESSION['level'] ?>

													</button>

													
												<?php } ?>

												&nbsp;


													<?php
													
												if($_SESSION['level']!=='Supplier'){
													?>
												<button onclick="AddRetur()"  class="btn btn-brand btn-elevate btn-icon-sm">

													<i class="la la-plus"></i>

													New Record

												</button>
												<?php } ?>

											</div>

										</div>

									</div>

								</div>

								<div class="kt-portlet__body">



									<!--begin: Datatable -->

									<table class="table table-striped- table-bordered table-hover table-checkable" id="tableRetur">

											   <thead>

										             <tr>

										            	<th>
										            		<label class="kt-checkbox kt-checkbox--single kt-checkbox--all kt-checkbox--solid">
										            		<input type="checkbox" id="select_all">&nbsp;<span></span>
										            		</label>
										            	</th>

									
										            	<th>No Retur</th>
										            	  <th>Tanggal</th>
										                <th>Supplier</th>
										                <th>Barang</th>
										                <th>Jumlah</th>
										                <th>Total</th>
										                <th></th>

										      
										            </tr>

										        </thead>

									</table>



									<!--end: Datatable -->

								</div>

							</div>

		





