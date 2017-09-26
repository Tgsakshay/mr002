<?php
foreach($result as $ft)
{ 

}

// die();



?>
<input type='hidden' value='<?php echo $ft['uhid'] ;?>' id='uhid' hidden>
<div class="page-content"></br>
			<!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->
			
			
			
			<!-- END SAMPLE PORTLET CONFIGURATION MODAL FORM-->
			<!-- BEGIN PAGE CONTAINER-->
			<div class="container-fluid">
				<!-- BEGIN PAGE HEADER-->   
			
				<!-- END PAGE HEADER-->
				<?php
				foreach($result12 as $rst)
{ 
$mrdchkstatus=$rst['mrd_chk_status'];
$mrdchk=explode(",",$mrdchkstatus);
$totalst=count($mrdchk);
$mrdchk1=explode("@",$mrdchkstatus);
$totalst1=count($mrdchk1);
$st=array();
$st1=array();
for ($j = 0; $j < $totalst; $j++) 
{ 
$mrdch=explode("@",$mrdchk[$j]);
array_push($st,@$mrdch[0]);
array_push($st1,@$mrdch[1]);
}
$stt=array_reverse($st);
$stt1=array_reverse($st1);
}
?>
				
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
											<?php  $this->Common_model->getAdmitdate($ipppid,'IPD'); ?>
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
											
											<?php
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
						  <?php 
							$str3er = explode(',',$mrdchkstatus);
									
							
						  ?>
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
									  
									  
								// $str3er = @$string[0]['icn_m_ward_pt'];
								$ar = @explode("#",$str3er);
								$ar1 = @explode(",",$ar[$sl-1]);
								echo @$ar1[1];
									$arr13 = @explode('@',$arr12[$count]);
									// print_r($arr13);
									  
									$check=$this->Common_model->getStatusOfMrd1($ipppid,$uhhhid,$value['chk_id'],'chkst');
									$quntity=$this->Common_model->getStatusOfMrd1($ipppid,$uhhhid,$value['chk_id'],'quntity');
										
									$mrd_chk_remark=$this->Common_model->getStatusOfMrd1($ipppid,$uhhhid,$value['chk_id'],'mrd_chk_remark');
									$mrd_chk_consent=$this->Common_model->getStatusOfMrd1($ipppid,$uhhhid,$value['chk_id'],'mrd_chk_consent');
										
                                    print_r($check);										
										 // foreach($quntity as $qt)
										 // {
											 
										 // }
										 
										// $chk=array();
										// array_push($chk,$check);
										// print_r($chk);
										
										// $qty=array();
										// array_push($qty,$quntity);
										//print_r($qty);
										
										// $rmk=array();
										// array_push($rmk,$mrd_chk_remark);
										//print_r($rmk);
										
										// $cnst=array();
										// array_push($cnst,$mrd_chk_consent);
										//print_r($cnst);
										
										// foreach($quntity as $qt)
										// {}
										 // print_r($mrd_chk_consent);
										 // $chkid=$value['chk_id'];
										 
								?>
							  <tr>
                                <td data-title="">
								  <span style="font-weight:bold"><?php echo $count;?> </span>
								</td>
                                <td data-title="">
								  <span style="font-weight:bold"><?php echo $value['chk_name'];?></span>
								</td>
                                <td data-title=""> 
								<input type='radio' name='action_<?php echo $value['chk_id'] ;?>' id='action_<?php echo $value['chk_id'] ;?>' <?php if($arr13[0] == $value['chk_id'] && $arr13[1] == 1 ){echo 'checked';}?> 
								 value='1'>
								</td>
                                <td data-title="Patient Name">
								 <input type='radio' name='action_<?php echo $value['chk_id'] ;?>' id='action_<?php echo $value['chk_id'] ;?>' 
								 <?php if($arr13[0] == $value['chk_id'] && $arr13[1] == 2 ){echo 'checked';}?>  value='2'>
								</td>
                                <td data-title="">
								<input type='radio' name='action_<?php echo $value['chk_id'] ;?>' id='action_<?php echo $value['chk_id'] ;?>' <?php if($arr13[0] == $value['chk_id'] && $arr13[1] == 3){echo 'checked';}?> value='3'>
								 
								</td>
                                <td data-title=""> 
								   &nbsp;&nbsp; <input type='text' name='quntity_<?php echo $value['chk_id'] ;?>' id='quntity_<?php echo $value['chk_id'] ;?>' style='width:20px;' width='2px'> 
								</td>
                                <td data-title="">
								   <textarea name='remark_<?php echo $value['chk_id'] ;?>' id='remark_<?php echo $value['chk_id'] ;?>'></textarea>
								</td>
                                
                             </tr>
							 
							   <?php $count++ ; 
							     
								
								 }   
								 
								 ?>
                              
                            </tbody>
                          </table>
						  <br/>
						  <div class="row-fluid">
                                <center><button class="btn blue" onclick="savemrddata()">Submit</button></center>
						  </div>				 
											   
											   
												
										</div>
								</div>
								
							    <div class="tab-pane " id="tab_2">
							                 <table cellpadding="4" cellspacing="0" width="100%" border="0" class="CSSTableGenerator1">
                            <tbody id="">
                              <tr>
                                <td>S.No</td>
                                <td>Content</td>
                                <td>Status</td>
                                <td>Quantity </td>
                                <td>Remarks</td>
                               
                              </tr>
						      <?php
							 
							  $count=0;
							  $checkno=1;
							   // $data['checklist']=$this->Common_model->get_data_by_query("select * from mrdchecklist where chk_status=1");	
							     // foreach($checklist as $chk)
							  // {} echo $ft  =   $checklist[1]['chk_name'];
							  foreach($checklist as $chk)
							  {
								  // for($j=0;$j<count($stt);$j++)
								  // {
									  // print $stt;
									$checkno++;
									// echo $checkno;
									$ContentNumber = @$stt[$count];
									$StatusNumber = @$stt1[$count];
									// $ContentNumber = $ContentNumberMinus-1;
									
										    // $checkno = $ContentNumber;
										
									if($ContentNumber )
									  {
										    $ft  =    $checklist[$ContentNumber-1]['chk_id'];
										  if($ft ==@$ContentNumber)
										  {
											  
											
										   // echo $ContentNumber;
										    if($StatusNumber == 1){ echo'Yes';} elseif($StatusNumber == 2){  echo'No'; } elseif($ContentNumber == 3){  echo'N/A';}
										}
										} 
								  
									
									    // if($chk['chk_id'] == $stt[$count])
										// {
											// echo $stt[$count];
											
										// }
							     // if(in_array($chk['chk_id'],$stt)){}
								  // }
								 //print_r($checklist);
								  $count++;
								  
								  ?>
								<tr>
                                <td><?php echo $count;?></td>
                                <td><?php echo $chk['chk_name'];?></td>
                                <td>
								<?php
								if($ContentNumber===$count)	{
									$ContentNumber = @$stt[$count];
									$StatusNumber = @$stt1[$count];
									// $ContentNumber = $ContentNumberMinus-1;
									
										    // $checkno = $ContentNumber;
											
									if($ContentNumber )
									  {
										    $ft  =    $checklist[$ContentNumber-1]['chk_id'];
										  if($ft ==@$ContentNumber)
										  {
											  
											
										   // echo $ContentNumber;
										    if($StatusNumber == 1){ echo'Yes';} elseif($StatusNumber == 2){  echo'No'; } elseif($ContentNumber == 3){  echo'N/A';}
										}
										}
								}
									  ?>
								 
								 </td>
                                <td>Quantity </td>
                                <td>Remarks</td>
                                </tr>
								  <?php
							  
							  }
							  ?>
                              
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
				function storedata(val,id)
				{
					
				}
				</script>
							
				<script>
				 var ipppid="<?php echo $ipppid ;?>";
				 var uhhhid="<?php echo $uhhhid ;?>";
				  function getValues(id)
				  {
					   
					   var status = $('input[name=action_'+id+']:checked').val();
					   var quntity = $('#quntity_'+id).val();
					   var remark = $('#remark_'+id).val();
					   
					  
					
	             $.ajax({   
                            type: "POST",  
                             url: "<?php echo base_url('admin/MRD033/getValues1'); ?>",  
                            data: "id="+id+"&status="+status+"&quntity="+quntity+"&remark="+remark+"&ipppid="+ipppid+"&uhhhid="+uhhhid, 
	                     	
                           success: function(msg){  
						       //alert(msg);
                               // $("#opdresult").html(msg); 
	                       }  
                       }); 
	              }
				</script>
				
				<script>
								function savemrddata()
								{
									var ipppid="<?php echo $ipppid ;?>";
				                    var uhhhid="<?php echo $uhhhid ;?>";
									
									 var array1 = [];
									
									 
									 var array2= [];
									 
									 for(var i=1;i<=40;i++)
									 {
										var qty = $('#quntity_'+i).val();
										
										
										array2.push(i);
										
										
									 }
									 
									 for(var i=0;i<=array2.length;i++)
									 {
										var qtt = $('#quntity_'+array2[i]).val();
										
								        $('#quntity_'+array2[i]).each(function(){
                                        array1.push($(this).val());
                                        });
									 }
									 
									
									 var array3 = [];
									
									 var array4= [];
									 
									 for(var i=1;i<=40;i++)
									 {
										var status = $('input[name=action_'+i+']:checked').val();
										
										
										array4.push(i);
										
										
									 }
									 
									 for(var i=0;i<=array4.length;i++)
									 {
										var stt = $('input[name=action_'+array4[i]+']:checked').val();
										
								        $('input[name=action_'+array4[i]+']:checked').each(function(){
                                        array3.push($(this).val());
                                        });
									 }
									 
									 
									 var array5 = [];
									
									 var array6= [];
									 
									 for(var i=1;i<=40;i++)
									 {
										var remark = $('#remark_'+i).val();
										
										
										array6.push(i);
										
										
									 }
									 
									 for(var i=0;i<=array6.length;i++)
									 {
										var rmk = $('#remark_'+array6[i]).val();
										
								        $('#remark_'+array6[i]).each(function(){
                                        array5.push($(this).val());
                                        });
									 }
									 
									var data = [];
									
									dataArray3 = [array2,array1,array4,array3,array6,array5,uhhhid,ipppid];
									
									data.push.apply(data, dataArray3);
									 
							$.ajax({   
                                type: "POST",  
                                url: "<?php echo base_url('admin/MRD033/getValues2'); ?>",  
                                data: "array2="+array2+"&array1="+array1+"&array4="+array4+"&array3="+array3+"&array6="+array6+"&array5="+array5+"&uhhhid="+uhhhid+"&ipppid="+ipppid, 
								// data:{'data': JSON.stringify(data)},
	                     	
                                success: function(msg){
									alert(msg);
						        
	                                }  
                                 }); 
									
								}
			    </script>
