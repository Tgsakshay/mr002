<?PHP
            $userid=(array_slice($this->session->userdata,9,1));
			$intuser = $userid['user_id']; 
	//$emp_id=$this->Common_model->get_data_by_query("SELECT emp_id FROM `users` WHERE `id` = $intuser ");
   // $emp_id1=$emp_id[0]['emp_id'];	
  	//$dep_id23 =$this->Common_model->get_data_by_query("select emp_dep from employee where emp_id= $emp_id1");
   // $de= @$dep_id23[0]['emp_dep'];	
    $DEP = $this->Common_model->get_data_by_query("select * from department where 0=0"); 
   ?>
		<div class="page-content">
			<!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->
			<div id="portlet-config" class="modal hide">
				<div class="modal-header">
					<button data-dismiss="modal" class="close" type="button"></button>
					<h3>Patient ASSEMENT</h3>	
				</div>
				
			</div>
<div id="openmodel" class="modal fade-in slow hide" style='width:25%;left:60%'> 
  <div class="modal-header">
    <button data-dismiss="modal" class="btn red mini pull-right" type="button"><i class='icon-remove'></i></button>
  </div>
  <div class="modal-body">
    <form action="<?php echo base_url('admin/MRD033/SendFileRequest')?>" method="POST">
		<div class='row-fluid'>
			<div class='span12'>
			    <select class='span12 m-wrap' name='department_file' id='department_file' required>
					<option value=''> Select Department </option>
					<?php foreach($DEP as $dep) { ?>
						<option value="<?php echo $dep['dep_id']?>"><?php echo $dep['dep_name']?></option>
					<?php } ?>
				</select>
			</div>
		</div>
		<div class='row-fluid hide'>
			<div class='span12'>
				<input id='idmrdcheck'   name='idmrdcheck'>
				<input id='ipdmrdcheck'  name='ipdmrdcheck'>
				<input id='uhidmrdcheck' name='uhidmrdcheck'>
			</div>
		</div>
		<div class='row-fluid'>
			<div class='span12'>
				<button class='btn green btn-block' style='color:#fff'> SAVE</button>
			</div>
		</div>
	</form>
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
								<div class="tab-pane active" >
									<div class="portlet box blue">
										<div class="portlet-title">
											<div class="caption"> REQUEST MRD FILE </div>
										</div>
										<div class="portlet-body form">
										
                        <div class="tabbable tabbable-custom boxless" id="hh">				
							  <ul class="nav nav-tabs">
						       <li class="active"><a href="#tab_1" onclick="" data-toggle="tab">Requisition</a></li>
							     
							    <li class=""><a href="#tab_2" onclick="getOldApp()" data-toggle="tab"> Old Requisition</a></li>
							        
									
							     </ul>	





                                  <div class="tab-content">
									     <div class="tab-pane active" id="tab_1">
												<div class="row-fluid">
													<div class="span2 ">
														<div class="control-group">
															<label class="control-label" for="firstName" style='color:#4b8df8' >Search by UHID</label>
															<div class="controls">
																<input type="text" onkeyup='search()' id="uhid" class="m-wrap span12" placeholder="Enter Patient UHId"/>
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
													<div class="span2 ">
														<div class="control-group">
														<label class="control-label" for="firstName" style='color:#4b8df8' > Reg/No</label>
															<div class="controls">
																<input type="text" onkeyup='search()' id="regno" class="m-wrap span12" placeholder="Reg/No">
															</div>
														</div>
													</div>
													<div class="span2 hide">
														<div class="control-group">
															<label class="control-label" for="firstName" style='color:#4b8df8' >Search by RFID</label>
															<div class="controls">
																<input type="text" onkeyup='search()' id="rfid" class="m-wrap span12" placeholder="Enter Patient Contact">
															</div>
														</div>
													</div>
													<div class="span3 ">
														<div class="control-group">
															<label class="control-label" for="firstName"  style='color:#4b8df8'><font color='#4b8df8'> Discharge Date </font></label>
															<div class="controls">
																<div class="input-append ">
																	<input type="text" name='startdate' onchange='search()' id='startdate' class="span12 m-wrap date-picker" readonly="" size="16" value="" placeholder="Select Start Date"><span class="add-on"><i class="icon-calendar"></i></span>
																</div>
															</div>
														</div>
													</div>
												 
												</div>
											
											<hr style='height:1px;background:purple'>
											<div class="" id='opdresult'>
												<table class='table table-bordered lightfont'>
													<thead>
													 <tr>
					                                        <td>SL. </td>
					                                        <td>REG </td>
					                                        <td>UHID </td>
					                                        <td>NAME </td>
					                                        <td>DISCHARGE DATE </td>
					                                        <td>ACTION</td>
				                                     </tr>
													</thead>
													
													<tbody>
													<?php $sl=0;foreach($Req as $key=>$ft) { $sl++;?>
				<tr>
					<td><?php echo $sl;?></td>
					<td><?php echo $ft['mrd_chk_ipdid'];?></td>
					<td><?php echo $ft['mrd_chk_uhid'];?></td>
					<td><?php echo $ft['first_name']." ".$ft['middle_name']." ".$ft['last_name'];?></td>
					<td><?php echo date('d-m-Y',strtotime($ft['admit_exitdt']))?></td>
					<td><a data-toggle='modal' href='#openmodel' onclick='openmodel("<?php echo $ft['mrd_chk_id']?>","<?php echo $ft['mrd_chk_ipdid']?>","<?php echo $ft['mrd_chk_uhid']?>")' class='btn green mini' style='color:#fff'><i class='icon-ok' /> REQUEST FILE</a></td>
				</tr>
				<?php } ?>
													</tbody>
													
												</table>
											</div>
											
										</div>	
									

                           <div class="tab-pane " id="tab_2">
                               <div class="portlet-body flip-scroll" id='getdata'>
							   </div>
                           </div>

									
											
											
											
											
											
							</div>				
						</div>					
											
											
											
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
			function openmodel(id,ipd,uhid)
			{
				$('#idmrdcheck').val(id);
				$('#ipdmrdcheck').val(ipd);
				$('#uhidmrdcheck').val(uhid);
			}
		</script>
		<script>
		function search()
		{
			var uhid = $('#uhid').val();
			var first_name = $('#first_name').val();
			var regno = $('#regno').val();
			var startdate = $('#startdate').val();
			
			
			$("#opdresult").html('<center><img src="<?php echo base_url().'../assets/img/loading.gif'; ?>" /></center>');
			$.ajax({
				type : 'POST',
				url :  '<?php echo base_url("admin/MRD033/SearchFileRequisition")?>',
				data : 'uhid='+uhid+'&first_name='+first_name+'&regno='+regno+'&startdate='+startdate,
				success : function(msg){
					console.log(msg);
					 $("#opdresult").html(msg);
				}
			});
		}
		
		//search();
       </script>
	   <script>
	   function getOldApp()
	   {   
		   $.ajax({
				type : 'POST',
				url :  '<?php echo base_url("admin/MRD033/getFileApproved")?>',
				
				success : function(msg){
					 $("#getdata").html(msg);
					 //alert(msg);
				}
			});
	   }
	   </script>
	   
	   <script>
	   function RecieveFile(file_no,file_id)
	   { 
		   $.ajax({
				type : 'POST',
				url :  '<?php echo base_url("admin/MRD033/getRecieveFile")?>',
				data: 'file_no='+file_no+'&file_id='+file_id,
				success : function(msg){
					//alert("file Recieved sucessfully");
					 location.reload();
				}
			});
	   }
	   </script>
	   <script>
	   function ReturnFile(file_no,file_id)
	   {
		   $.ajax({
				type : 'POST',
				url :  '<?php echo base_url("admin/MRD033/getReturnFile")?>',
				data: 'file_no='+file_no+'&file_id='+file_id,
				success : function(msg){
					//alert("file Returned sucessfully");
					 location.reload();
				}
			}); 
	   }
	   
       </script>	   
	   
<script>
$(function() {
    $("#startdate").datepicker({changeMonth:true,changeYear:true,dateFormat: 'dd-mm-yy'});		
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
