function MenuRetur(){

		Loader();

		// $.ajax({

		// 	url:"api/gangguan_data.php",
		// 	type:"POST",
		// 	success:function(html){
		// 		console.log(html);
		// 	}
		// })

		$.ajax({
			url:'page/retur/index.php',
			success:function(html){


            		  dataLoad.html(html);


        


			           
			           var table = $("#tableRetur").DataTable({
			            		"processing": true,
						        "serverSide": true,
						        "scrollX": true,
						        "order": [[ 0, "asc" ]],
						        "ajax": {
						        	
						        	url:"api/retur_data.php",
						        	type:"POST"

						        },
						        "deferRender": true,
					            "aLengthMenu": [[5, 10, 50],[ 5, 10, 50]], // Combobox Limit
					            'columnDefs': [

							            {
									         'targets': 0,
									         'searchable': false,
									         'orderable': false,
									         'className': 'dt-body-center',
									         'render': function (data, type, full, meta){
									             return '<label class="kt-checkbox kt-checkbox--single kt-checkbox--all kt-checkbox--solid">'+
										            		'<input class="data_cek" type="checkbox" name="id[]" value="' + $('<div/>').text(data).html() + '">&nbsp;<span></span>'+
										            	'</label>';
									         }
									      },
									      {
									      	'targets': 2,
									      	'width': '16%', 
									      	render:function(data){
											      return moment(data).format('DD/MM/YYYY');
											    }
											},
											{
									         'targets': 5,
									         'width':'15%',
									         'searchable': false,
									         'orderable': false
									        
									      },{
                        							    'targets': 6,
                        
                        									   'width': '1%', 
                        									   	render:function(data, type, row){
                        									   		var x= parseFloat(row.total);
                        									   		console.log(x.toFixed(2))

                        													return (x).toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,');
                        											      // return (data).toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,');
                        
                        											    }
                        
                        							 
                        							}
									     


							      ],
					            "columns": [
					            	{ "data": "id" },
					            	{ "data": "no_retur" },
					            	{ "data": "tgl" }, 
					                { "data": "nama_supplier" }, 
					                { "data": "nama_barang" }, 
					                { "data": "qty" }, 
					                { "data": "total" }, 


					               
					                { "render": function ( data, type, row ) { // Tampilkan kolom aksi
					                    var html  ='<div class="btn-group btn-group" role="group">'
											html +='<button type="button" onclick="ViewRetur(\'' + row[0] + '\')" class="btn btn-primary btnView" data-id="' + row[0] + '"><i class="fa fa-file-medical-alt"></i> View Detail</button>'
											html +='</div>'
						                    return html
						                }
						            },  // Tampilkan nama
						         ],
						        	


			            	});
           		// buka form tambah



            	// Handle click on "Select all" control

					$("#select_all").change(function(){

					   $('input[type="checkbox"]').prop('checked', this.checked); 
						



					});



				
				   $("#btnPilihAll").click(function(){

				   		var rows_selected = $(".data_cek:checked");
				   		
				   		var data=[];

				   		for(i=0;i<rows_selected.length;i++)
				   		{
				   			data.push(rows_selected[i].value);
				   		}


						     	
				   		if (data=="") {
				   			Not("Tidak ada data yang terpilih..","danger","info-circle");
				   		}else{



							    $.ajax({
							    	url:'api/retur_delete.php',
							    	type:'POST',
							    	data:{id:data},
							    	success:function(data){
							    		
							    		if (data==200) {
							    			MenuRetur();
							    			Not("data berretur dihapus..","success","info-circle");
							    		}
							    		
							    	}
							    })
				   		}

				   });

					     


				

			
			}
		});




		$(".kt-subheader__title").text("Data retur");

	}


 function AddRetur(){
 						Loader();

						$.ajax({
							url:'page/retur/form_add.php',
							success:function(html){

									dataLoad.html(html);
									$(".kt-subheader__title").text("Add retur");


							}
						 });
 }






  	function ViewRetur(id){



 						Loader();

						$.ajax({
							url:'page/retur/form_view2.php',
							type:'POST',
							data:{id:id},
							success:function(html){

									dataLoad.html(html);
									$(".kt-subheader__title").text("View retur")

							}
						 });
 	}


 	  


 						
 function printRetur(){
 	$(".hilang").hide();
 	window.print();
 	 setTimeout(function(){
 	 	$(".hilang").show();
 	 }, 0);


 }