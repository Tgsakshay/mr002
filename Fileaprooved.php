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
								<div class="tab-pane active" id="tab_1">
									<div class="portlet box blue">
										<div class="portlet-title">
											<div class="caption">MRD FILE REQUESTS</div>
											
										</div>
										<div class="portlet-body form">
											<!-- BEGIN FORM-->
											<form action="#" class="horizontal-form">
												
<div class="row-fluid">

<div class="span2 ">
<div class="control-group">
<label class="control-label" for="firstName" style='color:#4b8df8' >Search by UHID</label>
<div class="controls">
<input type="text" onkeyup="searchda()" id="uhid" name="uhid" class="m-wrap span12" placeholder="Enter Patient UHId">

</div>
</div>


</div>
<div class="span2 ">
<div class="control-group">
<label class="control-label" for="firstName" style='color:#4b8df8' > First Name</label>
<div class="controls">
<input type="text" onkeyup="searchda()" id="first_name" name="first_name" class="m-wrap span12" placeholder="Enter Patient First Name">

</div>
</div>


</div>



<div class="span2 ">
<div class="control-group">
<label class="control-label" for="firstName" style='color:#4b8df8' > Reg/No</label>
<div class="controls">
<input type="text" onkeyup="searchda()" id="regno"  name="regno" class="m-wrap span12" placeholder="Reg/No">

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




	<div class="span3 hide">
		<div class="control-group">
		<label class="control-label" for="firstName"  style='color:#4b8df8'>
			<font color='#4b8df8'> START DATE </font>
		</label>
		<div class="controls">

		<div class="input-append ">
		<input type="text" name='startdate' onchange='search()' id='startdate' class="span12 m-wrap date-picker" readonly="" size="16" value="" placeholder="Select Start Date">
		<span class="add-on"><i class="icon-calendar"></i></span>
		</div>
		</div>
		</div>
	</div>
	<div class="span3 hide">
		<div class="control-group">
			<label class="control-label" for="firstName" style='color:#4b8df8' >End Date</label>
			<div class="controls">
				<div class="input-append ">
					<input type="text" name='enddate'  onchange='search()'  id='enddate' class="span12 m-wrap date-picker" readonly="" size="16" value="" placeholder="Select End Date"><span class="add-on"><i class="icon-calendar"></i></span>
				</div>
			</div>
		</div>
	</div> 
</div>

											</form>
											<!-- END FORM--> 
											<h3 class="page-title"><small></small></h3>
												<div class="portlet-body flip-scroll" id='opdresult'>
													<table class='table table-bordered lightfont'>
														<thead>
															<tr>
																<th>S.No</th>
																<th>Reg</th>
																<th>Uhid</th>
																<th>Name</th>
																<th>Department</th>
																<th>Action</th>
															</tr>
														</thead>
														<tbody>
															<?php $sl = 0; foreach($Requested as $file) {$sl++; ?>
															<tr>
																<td><?php echo $sl;?></td>
																<td><?php echo $file['file_ipd'];?></td>
																<td><?php echo $file['file_ipd'];?></td>
																<td><?php echo $file['first_name']." ".$file['middle_name']." ".$file['last_name'];?></td>
																<td><?php echo $file['dep_name'];?></td>
																<td>
																	<?php if($file['file_status']== 2) { ?><a href="<?php echo base_url('admin/MRD033/RecieveFile').'/'.$file['file_no'].'/'.$file['file_id'];?>" class='btn  mini green' style='color:#fff' onclick="return confirm('Are You Sure')"><i class='icon-file'></i> Receive </a> <?php } else if($file['file_status']==3) { ?>
																	<a href="<?php echo base_url('admin/MRD033/ReturnFile').'/'.$file['file_no'].'/'.$file['file_id'];?>" class='btn  mini yellow' onclick="return confirm('Are You Sure')"><i class='icon-file'></i> Return </a> 
																	<?php } elseif($file['file_status'] == 4) { ?><a class='btn yellow mini' disabled> Returned</a><?php } ?>
																</td>
															</tr>
															<?php } ?>
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
		function searchda()
		{   
		    var uhid=$('#uhid').val();
		    var first_name=$('#first_name').val();
		    var regno=$('#regno').val();
		   
			$("#opdresult").html('<center><img src="<?php echo base_url().'../assets/img/loading.gif'; ?>" /></center>');
			$.ajax({
				type : 'POST',
				url :  '<?php echo base_url("admin/MRD033/SearchFileApproved")?>',
				data : "uhid="+uhid+"&first_name="+first_name+"&regno="+regno,
				
				success : function(msg){
					console.log(msg);
					
					 $("#opdresult").html(msg);
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
