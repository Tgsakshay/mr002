<?php
foreach($result as $ft)
{ 

}

// die();






?>
<input type='hidden' value='<?php echo $ft['uhid'] ;?>' id='uhid' hidden>
<div class="page-content">
			<!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->
			
			
			
			<!-- END SAMPLE PORTLET CONFIGURATION MODAL FORM-->
			<!-- BEGIN PAGE CONTAINER-->
			<div class="container-fluid">
				<!-- BEGIN PAGE HEADER-->   
			
				<!-- END PAGE HEADER-->
				
				
					<div class="row-fluid">
					<div class="span12">
						<div class="tabbable tabbable-custom boxless">
							
							<div class="tab-content">
								<div class="tab-content">
									
								<div class="tab-pane active" id="">
									<div class="portlet box blue">
										<div class="portlet-title">
											<div class="caption"><i class="icon-reorder"></i><?php  echo $scheme = $this->session->userdata('schemename'); ?> Patient</div>
											<div class="tools">
												<a href="javascript:;" class="collapse"></a>
												<a href="#portlet-config" data-toggle="modal" class="config"></a>
												<a href="javascript:;" class="reload"></a>
												<a href="javascript:;" class="remove"></a>
											</div>
										</div>
										<div class="portlet-body form">
											
								<div class="row-fluid portfolio-block">
									<div class="span5 portfolio-text">
										<div class="portfolio-text-info" style="margin-left:10px">
											<h3 class="camel-case"><?php echo $ft['first_name']." ".$ft['middle_name']." ".$ft['last_name']; ?></h3>
											<h4>UHID : <?php echo $uhhhid; ?></h4>
										</div>
									</div>
									<div style="overflow:hidden;" class="span7">
										<div class="portfolio-info">
											D.O.A (<?php //echo $ft['bpl_ipd_opd'] ;?>)
											<h5 style="color: #16a1f2;">
											<?php 
											// if($ft['bpl_ipd_opd']=='IPD')
											// {
												
												
											// }
											
											$this->Common_model->getAdmitdate($ipppid,'IPD');
											
											?>
											
											</h5>
										</div>
										<div class="portfolio-info">
											AGE / Gender
											<h5 style="color: #16a1f2;"><?php echo $ft['patient_age']; ?> / <?php echo $ft['patient_gender']; ?></h5>
										</div>
										<div class="portfolio-info">
											Contact No
											<h5 style="color: #16a1f2;"><?php echo $ft['contact_no']; ?></h5>
										</div>
										<div class="portfolio-info">
											Scheme
											<h5 style="color: #16a1f2;">
											
											<?php  //echo $scheme = $this->session->userdata('schemename'); 
										
											
											$this->Common_model->getSchemeName($ipppid,$uhhhid,'IPD');
											?>
											</h5>
										</div>
									
										
									</div>
								</div>
					
											<!-- BEGIN FORM-->
													<div class="row-fluid">
					<div class="span12">
						<div class="tabbable tabbable-custom boxless">
							<ul class="nav nav-tabs">
								<li class="active" style="font-size:12px"><a href="#tab_1" data-toggle="tab">Check List</a></li>
                              
                                <li style="font-size:12px"><a href="#tab_2" data-toggle="tab">Check List 2</a></li>
							
							</ul>
							<div class="tab-content">
								<div class="tab-content">
								<div class="tab-pane active" id="tab_1">
							
										
										<div class="portlet-body form">
										
		                  <table cellpadding="4" cellspacing="0" width="100%" border="0" class="CSSTableGenerator1">
                            <tbody id="opdresult">
                              <tr>
                                <td>S.No</td>
                                <td>Content</td>
                                <td>Yes</td>
                                <td>No</td>
                                <td>N/A</td>
                                <td>Quantity </td>
                                <td>Remarks</td>
                               
                              </tr>
							  <?php  
								   $count=1;
								   
								  foreach($checklist as $key=>$value) {
									  
									     $check=$this->Common_model->getStatusOfMrdDischarge($ipppid,$uhhhid,$value['chk_id'],'chkst');
									     $quntity=$this->Common_model->getStatusOfMrdDischarge($ipppid,$uhhhid,$value['chk_id'],'quntity');
									     $mrd_chk_remark=$this->Common_model->getStatusOfMrdDischarge($ipppid,$uhhhid,$value['chk_id'],'mrd_chk_remark');
								?>
							  <tr>
                                <td data-title="">
								  <span style="font-weight:bold"><?php echo $count;?> </span>
								</td>
                                <td data-title="">
								  <span style="font-weight:bold"><?php echo $value['chk_name'];?></span>
								</td>
                                <td data-title=""> 
								 <input type='radio' name='action_<?php echo $value['chk_id'] ;?>' onclick="getValues('<?php echo $value['chk_id'] ;?>')" id='one' value='1' <?php if($check=='1'){echo 'checked' ;} ?> >
								</td>
                                <td data-title="Patient Name">
								 <input type='radio' name='action_<?php echo $value['chk_id'] ;?>' onclick="getValues('<?php echo $value['chk_id'] ;?>')" value='2' <?php if($check=='2'){echo 'checked' ;} ?>  >
								</td>
                                <td data-title="">
								<input type='radio' name='action_<?php echo $value['chk_id'] ;?>' onclick="getValues('<?php echo $value['chk_id'] ;?>')" value='3' <?php if($check=='3'){echo 'checked' ;} ?>  >
								</td>
                                <td data-title=""> 
								   &nbsp;&nbsp; <input type='text' name='quntity_<?php echo $value['chk_id'] ;?>' id='quntity_<?php echo $value['chk_id'] ;?>' onkeyup="getValues('<?php echo $value['chk_id'] ;?>')" value='<?php echo $quntity ;?>'style='width:20px;' width='2px'>
								</td>
                                <td data-title="">
								   <textarea name='remark_<?php echo $value['chk_id'] ;?>' onkeyup="getValues('<?php echo $value['chk_id'] ;?>')" id='remark_<?php echo $value['chk_id'] ;?>'> <?php echo $mrd_chk_remark ;?></textarea>
								</td>
                                
                             </tr>
							 
							   <?php $count++ ; 
							     
								 }   
								 
								 ?>
                              
                            </tbody>
                          </table>
                                
											 
											   
											   
												
										</div>
								</div>
								
							    <div class="tab-pane " id="tab_2">
							                 <table cellpadding="4" cellspacing="0" width="100%" border="0" class="CSSTableGenerator1">
                            <tbody id="">
                              <tr>
                                <td>S.No</td>
                                <td>Content</td>
                                <td>Yes</td>
                                <td>No</td>
                                <td>N/A</td>
                                <td>Quantity </td>
                                <td>Remarks</td>
                               
                              </tr>
						
							  
                              
                            </tbody>
                          </table>
								</div>
								
							
							
								
								
								
								
							</div>
						</div>
					</div>
				</div>
				<!-- END PAGE CONTENT-->         
			</div>
			<!-- END PAGE CONTAINER-->
		</div>
		  

											
											
											
											
											<!-- END FORM--> 
										</div>
									</div>
								</div>
							
							
							</div>
						</div>
					</div>
				</div>
				<!-- END PAGE CONTENT-->         
			</div>
				
				
				
				</div>
				</div>
				<script>
				 var ipppid="<?php echo $ipppid ;?>";
				 var uhhhid="<?php echo $uhhhid ;?>";
				  function getValues(id)
				  {
					   var status = $('input[name=action_'+id+']:checked').val();
					   var quntity = $('#quntity_'+id).val();
					   var remark = $('#remark_'+id).val();
					   // alert(quntity);
					  		
	             $.ajax({   
                            type: "POST",  
                             url: "<?php echo base_url('admin/MRD033/getValuesDischarge'); ?>",  
                            data: "id="+id+"&status="+status+"&quntity="+quntity+"&remark="+remark+"&ipppid="+ipppid+"&uhhhid="+uhhhid, 
	                     	
                           success: function(msg){  
						        // alert(msg);
                               // $("#opdresult").html(msg); 
	                       }  
                       }); 
	              }
				</script>
