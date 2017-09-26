
		<div class="page-content">
			<!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->
			<div id="portlet-config" class="modal hide">
				<div class="modal-header">
					<button data-dismiss="modal" class="close" type="button"></button>
					<h3>Patient ASSEMENT</h3>	
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
											<div class="caption">Registered Patient</div>
											
										</div>
										<div class="portlet-body form">
											<!-- BEGIN FORM-->
											<form action="#" class="horizontal-form">
												
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
													<div class="span3 ">
													    <div class="control-group">
															<label class="control-label" for="firstName" style='color:#4b8df8' >Father/husband Name</label>
															<div class="controls">
																<input type="text" onkeyup='search()' id="fa_hus_name" class="m-wrap span12" placeholder="Enter Patient First Name">
															
															</div>
														</div>
														
														  
												    </div>
													
												     <div class="span2 ">
													    <div class="control-group">
															<label class="control-label" for="firstName" style='color:#4b8df8' > Contact</label>
															<div class="controls">
																<input type="text" onkeyup='search()'id="contact_no" class="m-wrap span12" placeholder="Enter Patient Contact">
															
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
													
											
													
												</div>
												
													<div class="row-fluid">
												    <div class="span4 ">
													    <div class="control-group">
															<label class="control-label" for="firstName"  style='color:#4b8df8'>
															<font color='#4b8df8'>
															START DATE
															</font>
															</label>
															<div class="controls">
															
																<div class="input-append ">
							<input type="text" name='startdate' onchange='search()' id='startdate' class="span12 m-wrap date-picker" readonly="" size="16" value="">
							<span class="add-on"><i class="icon-calendar"></i></span>
						                                               </div>
															</div>
														</div>
														
														  
												    </div>
													 <div class="span4 ">
													    <div class="control-group">
															<label class="control-label" for="firstName" style='color:#4b8df8' >Search by End Date</label>
															<div class="controls">
															
																<div class="input-append ">
							<input type="text" name='enddate'  onchange='search()'  id='enddate' class="span12 m-wrap date-picker" readonly="" size="16" value=""><span class="add-on"><i class="icon-calendar"></i></span>
						                                         </div>
															</div>
														</div>
														
														  
												    </div>
												    
													
												</div>
													
											
											</form>
											<!-- END FORM--> 
														    <h3 class="page-title">
							 Patient
							<small></small>
						    </h3>
				<div class="portlet-body flip-scroll" id='opdresult'>
					
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
		function search()
		{
	  
	 $("#opdresult").html('<center><img src="<?php echo base_url().'../assets/img/loading.gif'; ?>" /> </center>');
									  
	
		   try {
		var first_name= document.getElementById('first_name').value;
		var uhid= document.getElementById('uhid').value;
		var contact_no= document.getElementById('contact_no').value;
		var fa_hus_name= document.getElementById('fa_hus_name').value;
		var rfid= document.getElementById('rfid').value;
		var regno= document.getElementById('regno').value;
		var startdate= document.getElementById('startdate').value;
		var enddate= document.getElementById('enddate').value;
		var page= 'reg';
		
	$.ajax({   
         type: "GET",  
        url: "<?php echo base_url('admin/MRD033/searchdischargeMrdPat'); ?>",  
        data: "first_name="+first_name+"&uhid="+uhid+"&contact_no="+contact_no+"&fa_hus_name="+fa_hus_name+"&rfid="+rfid+"&regno="+regno+"&startdate="+startdate+"&enddate="+enddate+"&page="+page, 
		
        success: function(msg){  
            $("#opdresult").html(msg); 
	   
        }  
    }); 
	}
	
	catch (e) {
        alert(e);
    } 
		
		}
		
		search();
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
