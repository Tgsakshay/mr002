<?php foreach($result as $ft){ }

 $uhid=$this->uri->segment(4);
 $ipd= $this->uri->segment(5);
?>

<input type='hidden' value='<?php echo $ft['uhid'] ;?>' id='uhid' hidden>
<div class="page-content"></br>
			<!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->
<script>
	$('body').css('overflow','hidden');
</script>			
			
			
			<!-- END SAMPLE PORTLET CONFIGURATION MODAL FORM-->
			<!-- BEGIN PAGE CONTAINER-->
			<div class="container-fluid">
				<!-- BEGIN PAGE HEADER-->   
			
				<!-- END PAGE HEADER-->
				<?php
foreach($result12 as $rst)
{ 
	$chkidauto  =$rst['mrd_chk_id'];
	$mrdchkstatus =$rst['mrd_chk_status'];
	$mrdchkqty =$rst['mrd_chk_qunty'];
	$mrdchkrem =$rst['mrd_chk_remark'];
	$mrdchksign =$rst['mrd_chk_sign'];
	$rackval =$rst['mrd_chk_rack'];
	
	$mrdchk=explode(",",$mrdchkstatus);
	$totalst=count($mrdchk);
	$mrdchk1=explode("@",$mrdchkstatus);
	$mrdsig1=explode("@",$mrdchksign);
	$totalst1=count($mrdchk1);
	$st=array();
	$st1=array();
	$st3=array();
	for($j = 0; $j < $totalst; $j++) 
	{ 
		$mrdch=explode("@",$mrdchk[$j]);
		array_push($st,@$mrdch[0]);
		array_push($st1,@$mrdch[1]);
		array_push($st3,@$mrdsig1[1]);
	}
	$stt=array_reverse($st);
	$stt1=array_reverse($st1);
	$stt3=array_reverse($st3);
}
?>
 
<div id="myModal" class="modal fade-in slow hide" style='width:40%;left:55%'>
 
  <div class="modal-header" id="forheader" style="padding:15px 20px;">
          <button type="button" class="btn red mini pull-right" data-dismiss="modal">&times;</button>
         <h4><span class="glyphicon glyphicon-lock"></span> File Detail</h4>
        </div>
  <div class="modal-body">
    <span id="detailrep">
	</span>
  </div>
 </div>
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
									<div class="span3 portfolio-text">
										<div class="portfolio-text-info" style="margin-left:10px">
											<h4 class="camel-case"><?php echo $ft['first_name']." ".$ft['middle_name']." ".$ft['last_name']; ?></h4>
											<h4>UHID : <?php echo $uhhhid; ?></h4>
										</div>
									</div>
									<div style="overflow:hidden;" class="span9">
										<div class="portfolio-info">
											Admit Date  
											<h5 style="color: #16a1f2;">
												<?php echo $this->Common_model->getAdmitdate($ipppid,'IPD'); ?>
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
											<div class="portfolio-info">
											Discharge  Date
											<h5 style="color: #16a1f2;">
											<?php 
												if($ft['admit_exitdt'] !='0000-00-00 00:00:00')echo date('d-m-Y H:i', strtotime($ft['admit_exitdt']));
												else echo 'Not Discharged';
											?>
											</h5>
										</div>
									</div>
								</div>
 <style>
  #forheader, .close {
      background-color: #5cb85c;
      color:white !important;
      text-align: center;
      font-size: 30px;
  }
  .modal-footer {
      background-color: #f9f9f9;
  }
  </style>								
								
				
			<div class="row-fluid">
				<div class="span12">
					<div class="tabbable tabbable-custom boxless">
						<ul class="nav nav-tabs">
							<li class="active" style="font-size:12px"><a href="#tab_1" data-toggle="tab">Check List</a></li>
							<li style="display:none;font-size:12px"><a href="#tab_2" data-toggle="tab" class='hide'>File Issued</a></li>
							<button type="button" style="margin-left:490px;" onclick="getDetails('<?php echo $uhid; ?>','<?php echo $ipd; ?>')" class="btn blue mini" value="" id="rackstatus" >File status</button>
							<span style='float:right'>
						
							<b>RACK No. : </b><input id='RackNumber' value="<?php echo @$rackval;?>"class='span5 m-wrap'>
							<button type='button' class='btn green' style='color:#fff' id='Saverack' onclick="SaveRackNumber(),alert('Rack Alloted')" disabled> SAVE </button>
							</span>
						</ul>
						<div class="tab-content">
							<div class="tab-content">
								<div class="tab-pane active" id="tab_1">
									<div class="portlet-body form">
										<?php 
											@$mrdchkstatus;
											@$arr = explode(',',$mrdchkstatus);
											@$mrdchkqty;
											@$arrqty = explode(',',$mrdchkqty);
											@$mrdchkrem;
											@$arrrem = explode(',',$mrdchkrem);
											@$arrsign = explode(',',$mrdchksign);
										?>
							<div class='row-fluid' style='text-align:center;padding-top:5px;color:#fff;background:#5592FC'>
								<div class='span1'>Sl</div>
								<div class='span3'>Content</div>
								<div class='span1'>Yes</div>
								<div class='span1'>No</div>
								<div class='span1'>N/A</div>
								<div class='span1'>Qty.</div>
								<div class='span3'>Remark</div>
								<div class='span1'>Signed</div>
							</div>
							<div class='row-fluid' style='overflow:scroll;height:300px;'>
							<?php  
								$count=1;
								foreach($checklist as $key=>$value) {
									
									
								$check=$this->Common_model->getStatusOfMrd1($ipppid,$uhhhid,$value['chk_id'],'chkst');
								$quntity=$this->Common_model->getStatusOfMrd1($ipppid,$uhhhid,$value['chk_id'],'quntity');
								$mrd_chk_remark=$this->Common_model->getStatusOfMrd1($ipppid,$uhhhid,$value['chk_id'],'mrd_chk_remark');
								$mrd_chk_consent=$this->Common_model->getStatusOfMrd1($ipppid,$uhhhid,$value['chk_id'],'mrd_chk_consent');
								$mrd_chk_sign=$this->Common_model->getStatusOfMrd1($ipppid,$uhhhid,$value['chk_id'],'mrd_chk_sign');
							
							?>
								<div class='row-fluid' id='row_<?php echo $count?>' style='text-align:center;border-bottom:1px solid black;margin-top:12px;'>
									<div class='span1' style="margin-top: inherit;">
										<span style=""><?php echo $count;?><br>
											<?php
												@$arr1 = explode('@',$arr[$count-1]);
												@$arrqty1 = explode('@',$arrqty[$count-1]);
												@$arrrem1 = explode('@',$arrrem[$count-1]);
												@$arrsign3 = explode('@',$arrsign[$count-1]);
											?> 
										</span>
									</div>
									<div style="margin-top: inherit;" class='span3' ><span style="font-weight:bold"><?php echo $value['chk_name'];?></span></div>
									<div style="margin-top: inherit;" class='span1'><input type='radio' onchange="savemrddata()" name='action_<?php echo $value['chk_id'] ;?>' id='action_<?php echo $value['chk_id'] ;?>' <?php if(@$arr1[1] == 1 ){echo 'checked';} ?> value='1'></div>
									<div style="margin-top: inherit;" class='span1'> <input type='radio' onchange="savemrddata()" name='action_<?php echo $value['chk_id'] ;?>' id='action_<?php echo $value['chk_id'] ;?>'  <?php if(@$arr1[1] == 2 ){echo 'checked';} ?> value='2'></div>
									<div style="margin-top: inherit;" class='span1'><input onchange="savemrddata()" type='radio' name='action_<?php echo $value['chk_id'] ;?>' id='action_<?php echo $value['chk_id'] ;?>' <?php if(@$arr1[1] == 3 ){echo 'checked';} ?> value='3'></div>
									<div style="margin-top: inherit;" class='span1'><input onkeyup="savemrddata()" type='text' name='quntity_<?php echo $value['chk_id'] ;?>' id='quntity_<?php echo $value['chk_id'] ;?>' value="<?php echo @$arrqty1[1];?>" style='width:20px;' width='2px'></div>
									<div class='span3'><textarea onkeyup="savemrddata()" name='remark_<?php echo $value['chk_id'] ;?>' id="remark_<?php echo $value['chk_id'] ;?>"><?php echo @$arrrem1[1]?></textarea></div>
									<div style="margin-top: inherit;" class='span1'><input type='checkbox' id="signed_<?php echo $value['chk_id'];?>" name="signed_<?php echo $value['chk_id'];?>"  onchange="savemrddata()" <?php if(@$arrsign3[1] == 1){echo 'checked';}?>></div>
								</div>
								<?php $count++ ; } ?>
							</div>
							
						  <br/>
						  <div class="row-fluid" hidden>
                                <center><button class="btn blue" onclick="savemrddata()">Submit</button></center>
						  </div>			
						</div>
					</div>
					<?php $dep = $this->Common_model->get_data_by_query('Select * from department order by dep_name');?>
					<div class="tab-pane " id="tab_2">
						<div class='row-fluid' >
							<form action="<?php echo base_url('admin/MRD033/IssueFile')?>" method='post'>
								<div class="span3 ">
									<div class="control-group">
										<label class="control-label" for="firstName" style="color:#4b8df8">Department</label>
										<div class="controls">
											<select name='department' class='m-wrap'>
												<option value="">Selct Department</option>
												<?php foreach($dep As $dep) { ?>
												<option value="<?php echo $dep['dep_id'];?>"><?php echo $dep['dep_name'];?></option>
												<?php } ?>
											</select>
										</div>
									</div>
								</div>
								<div class="span3 ">
									<div class="control-group">
										<label class="control-label" for="firstName" style="color:#4b8df8">&nbsp;</label>
										<div class="controls">
											<button class='btn red '>Issue</button>
											<input readonly name='uhid' value='<?php echo $this->uri->segment(4);?>'>
											<input readonly name='ipdid' value='<?php echo $this->uri->segment(5);?>'>
										</div>
									</div>
								</div>
							</form>
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
	function SaveRackNumber()
	{
		var ipd = '<?php echo $this->uri->segment(5)?>';
		var uhid = '<?php echo $this->uri->segment(4)?>';
		var id = '<?php echo $chkidauto?>';
		var rackno = $('#RackNumber').val();
//        alert(rackno);
//        return false;
		$.ajax({
			
			type : 'POST',
			url : '<?php echo base_url("admin/MRD033/SaveRackNumber")?>',
			data : 'rackno='+rackno+'&id='+id,
			success : function(msg){
				
			}
			
		});
	}
</script>
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
					   // alert(remark);
					  
					
	             $.ajax({   
                            type: "POST",  
                             url: "<?php echo base_url('admin/MRD033/getValues1'); ?>",  
                            data: "id="+id+"&status="+status+"&quntity="+quntity+"&remark="+remark+"&ipppid="+ipppid+"&uhhhid="+uhhhid, 
	                     	success: function(msg){  
						       // alert(msg);
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
									var coun = '<?php echo $count;?>';
									var strch = '';
									var strqty = '';
									var strrem = '';
									var strsign = '';
									for(var i=1;i<=coun-1;i++)
									 {
										 var chstatus=$('input[name=action_'+i+']:checked').val();
										 var chqty=$('#quntity_'+i).val();
										 var chrem=$('#remark_'+i).val();
										 if(chstatus==undefined)
										 {
											 chstatus='';
										 }
										 if(chqty==undefined)
										 {
											 chqty='';
										 }
										 var signed = 0;
										 if($("#signed_"+i).prop('checked') == true)
										 {
											signed = 1;
										 }
										 
										 if(chrem == undefined)
										 {
											 chrem='';
										 }
										 
										strsign = strsign+i+'@'+signed+',';
										strch = strch+i+'@'+chstatus+',';
										strqty += i+'@'+chqty+',';
										strrem += i+'@'+chrem+','; 
									 }
							$.ajax
								({   
									type: "POST",  
									url: "<?php echo base_url('admin/MRD033/getValues3'); ?>",  
									data: "strch="+strch+"&strqty="+strqty+"&strrem="+strrem+"&strsign="+strsign+"&uhhhid="+uhhhid+"&ipppid="+ipppid, 
									success: function(msg)
									{
										CheckCompleteness();
										SaveRackNumber();
									}  
                                }); 
								}
			    </script>
				<script>
					function CheckCompleteness()
					{
						var coun1 = '<?php echo $count;?>';
						var status = 1;
						for(var j=1;j<=coun1-1;j++)
						{
							var chstatus=$('input[name=action_'+j+']:checked').val();
							var signed = 0;
							if($("#signed_"+j).prop('checked') == true)
							{
								signed = 1;
							}
							if((chstatus !=1  && chstatus !=3) || signed == 0 )
							{
								$('#row_'+j).css('background','rgba(255, 0, 0, 0.45)');
								status = 0;
							}
							else{
								$('#row_'+j).css('background','');
							}
							
						}
						
						if(status == 1)
						{
							$('#Saverack').removeAttr("disabled");
							$('#RackNumber').removeAttr("readonly");
						}
						else
						{
							$('#RackNumber').val('');
							$('#Saverack').attr("disabled", "disabled");
							$('#RackNumber').attr("readonly", true);
						}
					}
					CheckCompleteness();
				</script>
				 <script>
	   function getDetails(uhid,ipd)
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
				
				
				
				
				