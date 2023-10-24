<form id="frm" name="frm" action="<?php echo base_url() ?>admin/khachhang" method="post"  enctype="multipart/form-data" >
<section class="content-header">
  	<h1>
        KHÁCH HÀNG
  	</h1>
  	<ol class="breadcrumb">
    	<li><a href="<?php echo base_url() ?>admin/home"><i class="fa fa-bars"></i> Trang chủ</a></li>
    	<li class="active">Khách hàng</li>
  	</ol>
</section>
<section class="content">
	<div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-body">
					<?php  if($this->session->flashdata('success')):?>
						<div class="col-md-12">
							<div class="alert alert-success">
								<?php echo $this->session->flashdata('success'); ?>
								<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
							</div>
						</div>
					<?php  endif;?>
					<?php  if($this->session->flashdata('error')):?>
						<div class="col-md-12">
							<div class="alert alert-error">
								<?php echo $this->session->flashdata('error'); ?>
								<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
							</div>
						</div>
					<?php  endif;?>
					<div class="form-group col-md-6">
                       	<input type="text" id="txtTuKhoa" name="txtTuKhoa" class="form-control" value="<?php echo $this->session->userdata('tu_khoa');?>" />  
                    </div>
					<div class="form-group col-md-6">
						<a class="btn btn-primary" style="margin-right: 10px;" onclick="$('#frm').submit()" role="button">
							<span class="glyphicon glyphicon-search"></span> Tìm kiếm
						</a>
						<a class="btn btn-primary" style="margin-right: 10px;" onclick="javascript:js_xoa_nhieu_doi_tac();" role="button">
							<span class="glyphicon glyphicon-trash"></span> Xóa chọn
						</a>
                        <a href="/admin/khachhang/add" class="btn btn-primary" role="button">
							<span class="glyphicon glyphicon-plus"></span> Thêm mới
						</a>
					</div>
                    <div class="col-md-12">

                        <div class="box-body table-responsive no-padding">
                            <table class="table table-hover table-bordered">
                                <thead class="bg-light-blue">
                                    <tr>
                                        <th class="text-center"  style="width:20px"><input type="checkbox" onclick="checkOrUncheckAll(this.checked);"/></th>                                       
										<th class="text-center" style="width:50px">Hình</th>
                                        <th>Họ tên</th>
										<th class="text-center" style="width:120px">Điện thoại</th>
										<th class="text-center" style="width:120px">Email</th>
                                        <th class="text-center" style="width:120px">Username</th>
										<th class="text-center" style="width:120px">Ngày đăng ký</th>
                                        <th class="text-center" style="width:90px">Kích hoạt</th>
                                        <th class="text-center" style="width:50px">Sửa</th>
                                        <th class="text-center" style="width:50px">Xóa</th>                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php		   	
									foreach ($khachhang_list as $khachhang)
									{	
										$img = "default.png";
										if($khachhang["dt_hinh"] != "")
											$img = $khachhang["dt_hinh"]; 	
									?>
                                    <tr>			   					               
                                        <td class="text-center"> 
                                            <input type="checkbox" class="checkbox" name="id[]" value="<?php echo $khachhang["dt_id"];?>"/>
                                        </td>
										
                                        <td class="text-center">
                                            <img src="../uploads/khachhang/<?php echo $img;?> " height="25" width="25"/>
                                        </td>
                                        <td><?php echo $khachhang["dt_ten"];?></td>
										<td><?php echo $khachhang["dt_dien_thoai"];?></td>
										<td><?php echo $khachhang["dt_email"];?></td>
										<td><?php echo $khachhang["dt_username"];?></td>
										<td><?php echo $khachhang["dt_ngay_dang_ky"];?></td>
                                        <td class="text-center">
                                            <?php 
                                            if ($khachhang["dt_trang_thai"]==1)
                                            {
                                            ?>					 
                                                <a href="<?php echo 'admin/khachhang/hide_status/'.$khachhang["dt_id"]; ?>" ><span class="glyphicon glyphicon-ok-circle mauxanh18"></span></a>
                                            <?php
                                            }
                                            else
                                            {
                                            ?>
                                                 <a href="<?php echo 'admin/khachhang/show_status/'.$khachhang["dt_id"]; ?>" ><span class="glyphicon glyphicon-remove-circle maudo"></span></a>
                                            <?php
                                            }
                                            ?>
                                        </td>
                                        
                                        <td class="text-center">                
                                            <a class="btn btn-success btn-xs" href="<?php echo 'admin/khachhang/edit/'.$khachhang["dt_id"]; ?>" role="button" > <span class="glyphicon glyphicon-edit"></span> Sửa</a>                
                                        </td>
                                        <td class="text-center">                
                                            <a class="btn btn-danger btn-xs" href="<?php echo 'admin/khachhang/delete/'.$khachhang["dt_id"]; ?>"  onclick="return confirm('Bạn có chắc muốn xóa không?')"  role="button"> <span class="glyphicon glyphicon-trash"></span> Xóa</a>                
                                        </td>	
                                        
                                    </tr>
                                        
                                        <?php
                                        }
                                        ?>
                                </tbody>
                            </table>
                        </div>
						<div class="row">
							<div class="col-md-12 text-bold">
								Tổng số: <?php echo number_format($total);?>
							</div>
						</div>
						<?php echo $strphantrang ?>
                        
                    </div>
					
                </div>
                
            </div>
        </div>
    </div>
  	<!-- /.row -->
</section>
<script type="text/javascript">
function xacNhanXoa(){	
	return confirm("Bạn có chắc muốn xoá các dòng được chọn?");
	
}
function delete_confirm(){
    if($('.checkbox:checked').length > 0){
        var result = confirm("Bạn có chắc muốn xoá các dòng được chọn?");
        if(result)
		{			
            var checks = document.getElementsByName('id[]');
			var s = "";
			for (i = 0; i < checks.length; i++)
			{
				if(checks[i].checked == true)
				{
					s = s + "'" + checks[i].value + "',";					
				}
			}
			if(s.length > 0)
			{
				s = s.substring(0, s.length-1);
				var url = "/admin/ajax/ajax_xoa_nhieu_doi_tac";       
				$.post(url, {
					'sid': s
				}).success(function(data) {
					var fields = data.split("|");
					if(fields[0] == "1")
					{
						alert("Đã xóa thành công!");
						location.reload();
						
					}
				}).error(function(data) {
					alert("Xảy ra lỗi!");
				}); 
			}
        }
		else
		{
            return false;
        }
    }else{
        alert('Xin chọn ít nhất một dòng để xóa!');
        return false;
    }
}

</script>
</form>