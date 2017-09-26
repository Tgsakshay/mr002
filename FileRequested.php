<div class="page-content">
			<!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->
			<div id="portlet-config" class="modal hide">
				<div class="modal-header">
					<button data-dismiss="modal" class="close" type="button"></button>
					<h3>Patient ASSEMENT</h3>	
				</div>
				
			</div>

  <style>
  .modal-header, h4, .close {
      background-color: #5cb85c;
      color:white !important;
      text-align: center;
      font-size: 30px;
  }
  .modal-footer {
      background-color: #f9f9f9;
  }
  </style>
 <div id="myModal" class="modal fade-in slow hide" style='width:40%;left:55%'>
 
  <div class="modal-header" style="padding:15px 20px;">
          <button type="button" class="btn red mini pull-right" data-dismiss="modal">&times;</button>
         <h4><span class="glyphicon glyphicon-lock"></span> File Detail</h4>
        </div>
  <div class="modal-body">
    <span id="detailrep">
	</span>
  </div>
 </div>






			<!-- BEGIN  PORTLET clinical evalution MODAL FORM-->
	
			
			<!-- END SAMPLE PORTLET CONFIGURATION MODAL FORM-->
			<!-- BEGIN PAGE CONTAINER-->
			<div class="container-fluid">
				<!-- BEGIN PAGE HEADER-->   
				<div class="row-fluid">
					<div class="">
						
						
					</div>
				</div>
				<!-- END PAGE HEADER-->
				<!-- BEGIN PAGE CONTENT-->
				<div class="row-fluid">
					<div class="span12">
						<div class="tabbable tabbable-custom boxless">
							
							<div class="tab-content">
								<div class="tab-pane active">
									<div class="portlet box blue">
										<div class="portlet-title">
											<div class="caption">MRD FILE REQUESTS</div>
											
										</div>
										
										<div class="portlet-body form">
											<!-- BEGIN FORM-->
											
						<div class="tabbable tabbable-custom boxless" id="hh">				
							  <ul class="nav nav-tabs">
						       <li class="active"><a href="#tab_1" onclick="" data-toggle="tab">Pending </a></li>
							     
							        <li class=""><a href="#tab_2" onclick="findApproved('getapp')" data-toggle="tab"> Approved</a></li>
							        <li class=""><a href="#tab_3" onclick="findApproved('getdec')" data-toggle="tab"> Hold</a></li>
									<li class=""><a href="#tab_4" onclick="findApproved('getrcvf')" data-toggle="tab">Recieved Files</a></li>
							     </ul>	

                                       
                                <div class="tab-content">
					                <div class="tab-pane active" id="tab_1">
												<div class="row-fluid">
													<div class="span2 ">
														<div class="control-group">
															<label class="control-label" for="firstName" style='color:#4b8df8' >Search by UHID</label>
															<div class="controls">
																<input type="text" onkeyup='search()' id="uhid" class="m-wrap span12" placeholder="Enter Patient UHId">
															</div>
														</div>
													</div>
													<div class="span2 ">
														<div class="control-group">
														<label class="control-label" for="firstName" style='color:#4b8df8' > First Name</label>
															<div class="controls">
																<input type="text" onkeyup='search()' id="first_name" class="m-wrap span12" placeholder="Enter Patient First Name">
															</div>
														</div>
													</div>
													<div class="span2">
														<div class="control-group">
														<label class="control-label" for="firstName" style='color:#4b8df8' > Reg/No</label>
															<div class="controls">
																<input type="text" onkeyup='search()' id="regno" class="m-wrap span12" placeholder="Reg/No">
															</div>
														</div>
													</div>
												
													<script>
									        jQuery('#uhid').keyup(function () { 
											this.value = this.value.replace(/[^0-9\.]/g,'');
											}); 
											jQuery('#regno').keyup(function () { 
											this.value = this.value.replace(/[^0-9\.]/g,'');
											});
											jQuery('#first_name').keyup(function () { 
											this.value = this.value.replace(/[^a-z]/g,'');
											});
                                         </script>
													
												</div>
											
											<!-- END FORM--> 
											<h3 class="page-title"><small></small></h3>
												<div class="portlet-body flip-scroll" >
													<table class='table table-bordered lightfont'>
														<thead>
															<tr>
																<th>Sl</th>
																<th>Reg</th>
																<th>Uhid</th>
																<th>Name</th>
																<th>Department</th>
																<th>Discharge Dt</th>
																<th>Scheme</th>
																<th>Action</th>
															</tr>
														</thead>
														<tbody id='opdresult'>
															<?php $sl = 0; foreach($Requested as $file) {  $s=$file['scheme'];
															     $uhid=$file['file_uhid'];
															     $ipd=$file['file_ipd'];
                                                             $scheme=$this->Common_model->get_data_by_query("select scheme_name from scheme where id=$s");
															 $exit=$this->Common_model->get_data_by_query("select admit_exitdt from ipd_admit where admit_id=$ipd and admit_uhid=$uhid");															                                          
															
																$sl++; ?>
															<tr>
																<td><?php echo $sl;?></td>
																<td><?php echo $file['file_ipd'];?></td>
																<td><?php echo $file['file_uhid'];?></td>
																<td><?php echo $file['first_name']." ".$file['middle_name']." ".$file['last_name'];?></td>
																<td><?php echo $file['dep_name'];?></td>
																<td><?php echo date('d-m-Y',strtotime($exit[0]['admit_exitdt'])); ?></td>
																<td><?php echo $scheme[0]['scheme_name']; ?></td>
																<td>
																	<?php if($file['mrd_file_req'] == 2) { ?>
																		<?php if($file['file_status'] ==1) { ?> 
																		<button class='btn green mini' disabled> FILE NOT IN MRD </button>
																	<?php } elseif($file['file_status'] ==4) {?>
																	<a href="<?php echo base_url('admin/MRD033/ApproveFileReceive').'/'.$file['file_no'].'/'.$file['file_id'];?>" class='btn  mini yellow' style='color:#000' onclick="return confirm('Are You Sure')"> <i class='icon-ok'></i> Recieve </a>
																	<?php } else {  ?> <button class='btn red mini' Disabled>Approved</button><?php } ?>
																	<?php } else { ?>
																		<a href="<?php echo base_url('admin/MRD033/ApproveFileRequest').'/'.$file['file_no'].'/'.$file['file_id'];?>" class='btn  mini green' style='color:#fff' onclick="return confirm('Are You Sure')"> <i class='icon-ok'></i> Aproove</a>
																		
																		<a href="<?php echo base_url('admin/MRD033/declineFileRequest').'/'.$file['file_no'].'/'.$file['file_id']; ?>"class='btn  mini red' style='color:#fff' onclick="return confirm('Are You Sure')">Hold</a>
																		
																		
																		
																	<?php } ?>
																</td>
															</tr>
															<?php } ?>
														</tbody>
													</table>
												</div>
											</div>
									
							
					                <div class="tab-pane" id="tab_2">		
									 <div class="row-fluid">
									               <div class="span2 ">
														<div class="control-group">
															<label class="control-label" for="firstName" style='color:#4b8df8' >Search by UHID</label>
															<div class="controls">
																<input type="text" onkeyup='searchapp()' id="uhidapp" class="m-wrap span12" placeholder="Enter Patient UHId">
															</div>
														</div>
													</div>
													<div class="span2 ">
														<div class="control-group">
														<label class="control-label" for="firstName" style='color:#4b8df8' > First Name</label>
															<div class="controls">
																<input type="text" onkeyup='searchapp()' id="first_nameapp" class="m-wrap span12" placeholder="Enter Patient First Name">
															</div>
														</div>
													</div>
													<div class="span2 ">
														<div class="control-group">
															<label class="control-label" for="firstName" style='color:#4b8df8' >Search by reg no</label>
															<div class="controls">
																<input type="text" onkeyup='searchapp()' id="regnoapp" class="m-wrap span12" placeholder="Enter Patient regno">
															</div>
														</div>
													</div>
									 </div>
										<table class='table table-bordered lightfont' >
										
														<thead>
															<tr>
																<th>Sl</th>
																<th>Reg</th>
																<th>Uhid</th>
																<th>Name</th>
																<th>Department</th>
																<th>Discharge Dt.</th>
																<th>Scheme</th>
																<th>Action</th>
															</tr>
														</thead>
														
														<tbody  id="getapp"  >
														</tbody>
									
									    </table>
									
									
                                    </div>
							 
							        <div class="tab-pane" id="tab_3">		
									 <div class="row-fluid">
									               <div class="span2 ">
														<div class="control-group">
															<label class="control-label" for="firstName" style='color:#4b8df8' >Search by UHID</label>
															<div class="controls">
																<input type="text" onkeyup='searchhold()' id="uhidhold" class="m-wrap span12" placeholder="Enter Patient UHId">
															</div>
														</div>
													</div>
													<div class="span2 ">
														<div class="control-group">
														<label class="control-label" for="firstName" style='color:#4b8df8' > First Name</label>
															<div class="controls">
																<input type="text" onkeyup='searchhold()' id="first_namehold" class="m-wrap span12" placeholder="Enter Patient First Name">
															</div>
														</div>
													</div>
													<div class="span2 ">
														<div class="control-group">
															<label class="control-label" for="firstName" style='color:#4b8df8' >Search by reg no</label>
															<div class="controls">
																<input type="text" onkeyup='searchhold()' id="regnohold" class="m-wrap span12" placeholder="Enter Patient regno">
															</div>
														</div>
													</div>
									 </div>
										<table class='table table-bordered lightfont'>
														<thead>
															<tr>
																<th>Sl</th>
																<th>Reg</th>
																<th>Uhid</th>
																<th>Name</th>
																<th>Department</th>
																<th>Discharge Dt.</th>
																<th>Scheme</th>
																<th>Action</th>
															</tr>
														</thead>
														<tbody id="getdec">
														</tbody>
									
									
									    </table>
									
									
                                    </div>
							 
							         <div class="tab-pane" id="tab_4">	
									      <div class="row-fluid">
													<div class="span2 ">
														<div class="control-group">
															<label class="control-label" for="firstName" style='color:#4b8df8' >Search by UHID</label>
															<div class="controls">
																<input type="text" onkeyup='searchforrcv()' id="uhid1" class="m-wrap span12" placeholder="Enter Patient UHId">
															</div>
														</div>
													</div>
													<div class="span2 ">
														<div class="control-group">
														<label class="control-label" for="firstName" style='color:#4b8df8' > First Name</label>
															<div class="controls">
																<input type="text" onkeyup='searchforrcv()' id="first_name1" class="m-wrap span12" placeholder="Enter Patient First Name">
															</div>
														</div>
													</div>
													<div class="span2">
														<div class="control-group">
														<label class="control-label" for="firstName" style='color:#4b8df8' > Reg/No</label>
															<div class="controls">
																<input type="text" onkeyup='searchforrcv()' id="regno1" class="m-wrap span12" placeholder="Reg/No">
															</div>
														</div>
													</div>
												
													 <script>
									        jQuery('#uhid1').keyup(function () { 
											this.value = this.value.replace(/[^0-9\.]/g,'');
											}); 
											jQuery('#regno1').keyup(function () { 
											this.value = this.value.replace(/[^0-9\.]/g,'');
											});
											jQuery('#first_name1').keyup(function () { 
											this.value = this.value.replace(/[^a-z]/g,'');
											});
                                         </script>
													
											</div>
									 
									     <table class='table table-bordered lightfont'>
														<thead>
															<tr>
																<th>Sl</th>
																<th>File No</th>
																<th>Reg</th>
																<th>Uhid</th>
																<th>Name</th>
																<th>Scheme</th>
																<th>Discharge Dt.</th>
																
																<th>History</th>
															</tr>
														</thead>
														<tbody id="getrcvf">
														</tbody>
									
									
									    </table>
									   
									 
									 
							         </div>
							 
							 
								 </div>

						    </div>				
											
											
											
											
											
								
								</div>
							</div>
						</div>
						
			
					
					</div>
					
					
				</div>
				<!-- END PAGE CONTENT-->         
			</div>
			<!-- END PAGE CONTAINER-->
		</div>
		<!-- END PAGE -->  
		
		<script>
		function search()
		{	
			var uhid = $('#uhid').val();
			var first_name = $('#first_name').val();
			var regno = $('#regno').val();
			var status=1;
			
			$("#opdresult").html('<center><img src="<?php echo base_url().'../assets/img/loading.gif'; ?>" /></center>');
			$.ajax({
				type : 'POST',
				url :  '<?php echo base_url("admin/MRD033/SearchFileRequested")?>',
				data : 'uhid='+uhid+'&first_name='+first_name+'&regno='+regno+'&status='+status,
				success : function(msg){
					// console.log(msg);
					 $("#opdresult").html(msg);
				}
			});
		}
       </script>
	   <script>
	   function searchapp()
	   {
		    var uhid = $('#uhidapp').val();
			var first_name = $('#first_nameapp').val();
			var regno = $('#regnoapp').val();
			var status=2;
			$("#getapp").html('<center><img src="<?php echo base_url().'../assets/img/loading.gif'; ?>" /></center>');
			$.ajax({
				type : 'POST',
				url :  '<?php echo base_url("admin/MRD033/SearchFileRequested")?>',
				data : 'uhid='+uhid+'&first_name='+first_name+'&regno='+regno+'&status='+status,
				success : function(msg){
					
					 $("#getapp").html(msg);
				}
			});
	   }
	   </script>
	   <script>
	   function searchhold()
	   {
		    var uhid = $('#uhidhold').val();
			var first_name = $('#first_namehold').val();
			var regno = $('#regnohold').val();
			var status=3;
			$("#getdec").html('<center><img src="<?php echo base_url().'../assets/img/loading.gif'; ?>" /></center>');
			$.ajax({
				type : 'POST',
				url :  '<?php echo base_url("admin/MRD033/SearchFileRequested")?>',
				data : 'uhid='+uhid+'&first_name='+first_name+'&regno='+regno+'&status='+status,
				success : function(msg){
					
					 $("#getdec").html(msg);
				}
			});
	   }
	   </script>
	   <script>
		function searchforrcv()
		{	
			var uhid = $('#uhid1').val();
			var first_name = $('#first_name1').val();
			var regno = $('#regno1').val();
			
			
			$("#getrcvf").html('<center><img src="<?php echo base_url().'../assets/img/loading.gif'; ?>" /></center>');
			$.ajax({
				type : 'POST',
				url :  '<?php echo base_url("admin/MRD033/SearchFileReceived")?>',
				data : 'uhid='+uhid+'&first_name='+first_name+'&regno='+regno,
				success : function(msg){
					 //console.log(msg);
					  $("#getrcvf").html(msg);
				}
			});
		}
       </script>
	   <script>
	   function findApproved(value)
	   {   
		   $.ajax({
				type : 'POST',
				url :  '<?php echo base_url("admin/MRD033/findApproved")?>',
				data : 'value='+value,
				success : function(msg){
					console.log(msg);
					 $('#'+value).html(msg);
				}
			});
	   }
	   </script>
	   <script>
	   function getDetails(ipd,uhid)
	   {    
		    $.ajax({
				type : 'POST',
				url :  '<?php echo base_url("admin/MRD033/getDetails")?>',
				data : 'ipd='+ipd+'&uhid='+uhid,
				success : function(msg){
					$('#myModal').modal('show');
					$('#detailrep').html(msg);
					// console.log(msg);
				}
			});
	   }
	   </script>
	   
	   
	   
	   
<script>
$(function() {
    $("#startdate").datepicker({changeMonth:true,changeYear:true,dateFormat: 'dd-mm-yy'});		
	// $("#validity").timepicker();		
	$("#enddate").datepicker({changeMonth:true,changeYear:true,dateFormat: 'dd-mm-yy'});		
	
});
</script>

<script type="text/javascript">
function prints(){
var m  =  document.getElementById('print').innerHTML;
var s  =  document.body.innerHTML;

document.body.innerHTML= document.getElementById('print').innerHTML;


 window.print();

document.body.innerHTML = s;
}

</script>
<!-- END FOOTER -->
	<!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
	<!-- BEGIN CORE PLUGINS -->   <script src="<?php echo base_url().'../assets/plugins/jquery-1.10.1.min.js'; ?>" type="text/javascript"></script>
	<script src="<?php echo base_url().'../assets/plugins/jquery-migrate-1.2.1.min.js'; ?>" type="text/javascript"></script>
	<!-- IMPORTANT! Load jquery-ui-1.10.1.custom.min.js before bootstrap.min.js to fix bootstrap tooltip conflict with jquery ui tooltip -->
	<script src="<?php echo base_url().'../assets/plugins/jquery-ui/jquery-ui-1.10.1.custom.min.js'; ?>" type="text/javascript"></script>      
	<script src="<?php echo base_url().'../assets/plugins/bootstrap/js/bootstrap.min.js'; ?>" type="text/javascript"></script>
	<script src="<?php echo base_url().'../assets/plugins/bootstrap-hover-dropdown/twitter-bootstrap-hover-dropdown.min.js'; ?>" type="text/javascript" ></script>
	<!--[if lt IE 9]>
	<script src="<?php echo base_url().'../assets/plugins/excanvas.min.js'; ?>"></script>
	<script src="<?php echo base_url().'../assets/plugins/respond.min.js'; ?>"></script>  
	<![endif]-->   
	<script src="<?php echo base_url().'../assets/plugins/jquery-slimscroll/jquery.slimscroll.min.js'; ?>" type="text/javascript"></script>
	<script src="<?php echo base_url().'../assets/plugins/jquery.blockui.min.js'; ?>" type="text/javascript"></script>  
	<script src="<?php echo base_url().'../assets/plugins/jquery.cookie.min.js'; ?>" type="text/javascript"></script>
	<script src="<?php echo base_url().'../assets/plugins/uniform/jquery.uniform.min.js'; ?>" type="text/javascript" ></script>
	<!-- END CORE PLUGINS -->
	<!-- BEGIN PAGE LEVEL PLUGINS -->
	<script type="text/javascript" src="<?php echo base_url().'../assets/plugins/select2/select2.min.js'; ?>"></script>
	<script type="text/javascript" src="<?php echo base_url().'../assets/plugins/data-tables/jquery.dataTables.min.js'; ?>"></script>
	<script type="text/javascript" src="<?php echo base_url().'../assets/plugins/data-tables/DT_bootstrap.js'; ?>"></script>
	<!-- END PAGE LEVEL PLUGINS -->
	<!-- BEGIN PAGE LEVEL SCRIPTS -->
	<script src="<?php echo base_url().'../assets/scripts/app.js'; ?>"></script>
	<script src="<?php  echo base_url().'../assets/scripts/table-advanced.js'; ?>"></script>     
	<script>
		jQuery(document).ready(function() {       
		   App.init();
		   TableAdvanced.init();
		});
	</script>	