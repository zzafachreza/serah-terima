<?php



include_once '../api/koneksi.php';


?>



<div class="row">

						<div class="col-xl-6 col-sm-6 order-lg-2 order-xl-1">


									<div class="kt-portlet kt-iconbox kt-iconbox--brand kt-iconbox--animate">
										<div class="kt-portlet__body">
											<div class="kt-iconbox__body">
												<div class="kt-iconbox__icon">
													<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
													    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
													        <rect x="0" y="0" width="24" height="24"/>
													        <path d="M4.00246329,12.2004927 L13,14 L13,4.06189375 C16.9463116,4.55399184 20,7.92038235 20,12 C20,16.418278 16.418278,20 12,20 C7.64874861,20 4.10886412,16.5261253 4.00246329,12.2004927 Z" fill="#000000" opacity="0.3"/>
													        <path d="M3.0603968,10.0120794 C3.54712466,6.05992157 6.91622084,3 11,3 L11,11.6 L3.0603968,10.0120794 Z" fill="#000000"/>
													    </g>
													</svg>
												 </div>
												<div class="kt-iconbox__desc">
                                                <h3 class="kt-iconbox__title">
														<a class="kt-link">Jumlah Serah Terima</a>
													</h3>
													<div class="kt-iconbox__content">
															Berdasarkan Supplier
													</div>

												</div>

											</div>
													<div id="pie1"></div>

										</div>
									</div>
						</div>
						<div class="col-xl-6 col-sm-6 order-lg-2 order-xl-1">


									<div class="kt-portlet kt-iconbox kt-iconbox--danger kt-iconbox--animate">
										<div class="kt-portlet__body">
											<div class="kt-iconbox__body">
												<div class="kt-iconbox__icon">
													<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
														    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
														        <rect x="0" y="0" width="24" height="24"/>
														        <rect fill="#000000" opacity="0.3" x="12" y="4" width="3" height="13" rx="1.5"/>
														        <rect fill="#000000" opacity="0.3" x="7" y="9" width="3" height="8" rx="1.5"/>
														        <path d="M5,19 L20,19 C20.5522847,19 21,19.4477153 21,20 C21,20.5522847 20.5522847,21 20,21 L4,21 C3.44771525,21 3,20.5522847 3,20 L3,4 C3,3.44771525 3.44771525,3 4,3 C4.55228475,3 5,3.44771525 5,4 L5,19 Z" fill="#000000" fill-rule="nonzero"/>
														        <rect fill="#000000" opacity="0.3" x="17" y="11" width="3" height="6" rx="1.5"/>
														    </g>
														</svg>
												 </div>
												<div class="kt-iconbox__desc">
													<h3 class="kt-iconbox__title">
														<a class="kt-link">Jumlah Serah Terima</a>
													</h3>
													<div class="kt-iconbox__content">
															Berdasarkan Supplier
													</div>

												</div>

											</div>
													<div id="cart1"></div>

										</div>
									</div>
						</div>

</div>









<script type="text/javascript"> 

var pie1 = new Highcharts.Chart({
         chart: {
          renderTo: 'pie1',
           type: 'pie',
            options3d: {
                enabled: true,
                alpha: 45,
                beta: 0
            }
         },   
         title: {
          text: ''
         },
         plotOptions: {
        pie: {
            allowPointSelect: true,
            cursor: 'pointer',
            depth: 35,
            dataLabels: {
                enabled: true,
                format: '{point.name}'
            }
        }
    },
          series: [{
         
              data: [
             <?php 
                 
                    $sql   = "SELECT `nama_supplier`,COUNT(no_retur) AS jml FROM retur GROUP BY nama_supplier";
                    $query = $conn->query($sql);
                    while( $r = $query->fetch())
                    {                  
                                 $kolom= $r['nama_supplier'];
                                 
                    ?>


                  ['<?php echo $kolom ?>', <?php echo $r['jml'] ?>],
             
                <?php } ?>



              ]
          }]
        });



var cart1 = new Highcharts.Chart({
         chart: {
          renderTo: 'cart1',
          type: 'column'
         },   
         title: {
          text: ''
         },
         xAxis: {
          categories: ['Kepribadian']
         },
         yAxis: {
          title: {
             text: 'Jumlah Pasien/Pengguna'
          }
         },plotOptions: {
        series: {
            borderWidth: 2,
            dataLabels: {
                enabled: true,

                format: '{point.y:.2f}%'
            }
        }
    },

            series:             
          [
            <?php 
  
            $sql   = "SELECT `nama_supplier`,COUNT(no_retur) AS jml FROM retur GROUP BY nama_supplier";
            $query = $conn->query($sql);
            while( $r = $query->fetch())
            {                  
                         $kolom= $r['nama_supplier'];
                         
            ?>
              {
                name: '<?php echo $kolom ?>',
                data: [<?php echo $r['jml']; ?>]
              },
              <?php 
            }   ?>
            ]
        });
  


</script>