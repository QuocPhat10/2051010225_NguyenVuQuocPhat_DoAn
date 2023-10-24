<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>public/admin/css/upload.css" />
<form name="frm" action="<?php echo base_url() ?>admin/danhmuc/edit/<?php echo $row['cm_id'] ?>" method="post"  enctype="multipart/form-data" >
<section class="content-header">
  <h1>
  	DANH MỤC
  </h1>
  <ol class="breadcrumb">
    <li><a href="index.php?frm=tongquan"><i class="fa fa-dashboard"></i> Trang chủ</a></li>
    <li class="active"><a href="<?php echo base_url() ?>admin/danhmuc">Danh mục</a></li>
    <li>[Sửa]</li>
  </ol>
</section>
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary" id="view">
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
                    <div class="col-md-9">
                        
						<div class="form-group">
                            <label>Tên danh mục:</label>
                            <input type="text" class="form-control" id="txtTen" name="txtTen" value="<?php echo $row['cm_ten'] ?>" style="width:100%">
							<div class="error" id="txtTen_error"><?php echo form_error('txtTen')?></div>
							
                        </div>
						<div class="form-group">
                            <label>Mô tả:</label>
                            <textarea name="txtMoTa" id="txtMoTa" class="form-control" ><?php echo $row['cm_mo_ta'] ?></textarea>
							<script>CKEDITOR.replace('txtMoTa');</script>
                        </div>
                        
						
                        
                    </div>
                    <div class="col-md-3">
                    	<div class="form-group">
                            <label>Danh mục cha:</label>
                            <select id="cboChuyenMucCha" name="cboChuyenMucCha" class="form-control" style="width:100%">
                                <option value="0"></option>
								<?php 
								$parent = $this->chuyenmuc_model->lay_danh_sach_chuyen_muc("0","danh-muc","","");
								foreach ($parent as $p) 
								{
									echo "<option ".(($this->session->userdata('cm_id_parent') == $p["cm_id"])?"selected":"")." value='".$p["cm_id"]."'>".$p["cm_ten"]."</option>";
									$child = $this->chuyenmuc_model->lay_danh_sach_chuyen_muc($p["cm_id"],"danh-muc","","");
									foreach ($child as $c) 
									{
										echo "<option ".(($this->session->userdata('cm_id_parent') == $c["cm_id"])?"selected":"")." value='".$c["cm_id"]."'>|-----".$c["cm_ten"]."</option>";
									}
								}
								?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Trạng thái:</label>
                            <select name="cboTrangThai" class="form-control" style="width:100%">
								<option <?php if($this->session->userdata('cm_trang_thai') == 0) echo "selected";?> value="0">Không hiển thị</option>
                                <option <?php if($this->session->userdata('cm_trang_thai') == 1) echo "selected";?> value="1">Hiển thị</option>
                            </select>
                        </div>
						<div class="form-group">
                            <label>Menu:</label>
                            <select name="cboMenu" class="form-control" style="width:100%">
								<option <?php if($this->session->userdata('cm_menu') == 0) echo "selected";?> value="0">Không hiển thị</option>
                                <option <?php if($this->session->userdata('cm_menu') == 1) echo "selected";?> value="1">Hiển thị</option>
                            </select>
                        </div>
						<div class="form-group">
                            <label>Nổi bật:</label>
                            <select name="cboNoiBat" class="form-control" style="width:100%">
								<option <?php if($this->session->userdata('cm_noi_bat') == 0) echo "selected";?> value="0">Bình thường</option>
                                <option <?php if($this->session->userdata('cm_noi_bat') == 1) echo "selected";?> value="1">Nổi bật</option>
                            </select>
                        </div>
                        <div class="form-group">
                        	<label>Hình đại diện:</label>
							<?php
							$img = "upload-image.png";
							if($row['cm_hinh'] != "")
								$img = $row['cm_hinh'];
							?>
                            <div id="upload-image-box">                            	          
								<div class="item">
                                    <label for="fileHinhAnh">
										
                                        <img class="thumbnail form-control" src="uploads/chuyenmuc/<?php echo $img;?>"/>         
                                    </label>
                                    <input name="fileHinhAnh" id="fileHinhAnh" class="inputimage" accept="image/*" type="file"> 
									
								</div>								
                            </div>
                        </div>
                        
                    </div>
					
                </div>
				<div class="box-footer">
					<div class="col-md-12 text-center">
						<div class="form-group">
                            <button type="submit" name="btnLuu" class="btn btn-primary btn-sm" style="margin-right: 10px;"/>
								<span class="glyphicon glyphicon-floppy-save"></span> Lưu [Sửa]
							</button>
                            <a class="btn btn-primary btn-sm" href="admin/danhmuc" role="button">
								<span class="glyphicon glyphicon-arrow-left"></span> Trở về
							</a> 
                        </div>
					</div>
				</div>
            </div><!-- /.box -->
        </div>
        
    <!-- /.col -->
  </div>
  <!-- /.row -->
</section>
<script type="text/javascript">
function SelectAllText() {
	var input = document.getElementById("txtTen");
	input.focus();
	input.setSelectionRange(0,input.value.length);
}
function js_lay_ds_chuyen_muc()
{
	var nn = $("#cboNgonNgu").val();
    var url = "/admin/ajax/ajax_lay_ds_chuyen_muc/"+nn;
	alert(url);
	loadDuLieu('cboChuyenMucCha',url);
	//$(".select2").select2();
	//$("#cboPhuongXa").select2();
}
SelectAllText();
</script>
</form>