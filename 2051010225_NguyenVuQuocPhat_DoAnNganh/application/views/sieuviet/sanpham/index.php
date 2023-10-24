<div class="main-page-banner home-3">
	<div class="container">
		<div class="row">
			<div class="col-xl-3 col-lg-4 d-none d-lg-block">
				<?php $this->load->view('sieuviet/menusanpham'); ?>
			</div>
		</div>
	</div>          
</div>
<div class="breadcrumb-area mt-30">
	<div class="container">
		<div class="breadcrumb">
			<ul class="d-flex align-items-center">
				<li><a href="<?php echo base_url();?>">Trang chủ</a></li>
				<?php
				if($chuyenmuc["cm_id_parent"] != "0")
				{
					$cmparent = $this->chuyenmuc_model->lay_thong_tin_chuyen_muc($chuyenmuc["cm_id_parent"]);
				?>
				<li><a href="<?php echo base_url();?>danh-muc/<?php echo $cmparent["cm_slug"];?>.html"><?php echo $cmparent["cm_ten"];?></a></li>
				<?php
				}
				?>
				<li class="active"><a href="<?php echo base_url();?>danh-muc/<?php echo $chuyenmuc["cm_slug"];?>.html"><?php echo $chuyenmuc["cm_ten"];?></a></li>
			</ul>
		</div>
	</div>
</div>
<div class="main-shop-page pt-30 pb-30 ptb-sm-30">
	<div class="container">
		<div class="row">
			<div class="col-lg-3 order-2 order-lg-1">
				<div class="sidebar">
					<?php
					$cat_list = $this->chuyenmuc_model->lay_danh_sach_chuyen_muc($chuyenmuc["cm_id"],"danh-muc","xuatban");
					if(count($cat_list) > 0)
					{
					?>
					<div class="electronics mb-15">
						<h3 class="sidebar-title"><?php echo $chuyenmuc["cm_ten"];?></h3>
						<div id="shop-cate-toggle" class="category-menu sidebar-menu sidbar-style">
							<ul>
								<?php
								foreach($cat_list as $cat)
								{
									$cat_list2 = $this->chuyenmuc_model->lay_danh_sach_chuyen_muc($cat["cm_id"],"danh-muc","xuatban");
									if(count($cat_list2) > 0)
									{
									?>
									<li class="has-sub"><a href="<?php echo base_url();?>danh-muc/<?php echo $cat["cm_slug"];?>.html"><?php echo $cat["cm_ten"];?></a>
										<ul class="category-sub">
											<?php
											foreach($cat_list2 as $cat2)
											{
											?>
											<li><a href="<?php echo base_url();?>danh-muc/<?php echo $cat2["cm_slug"];?>.html"><?php echo $cat2["cm_ten"];?></a></li>
											<?php
											}
											?>
											
										</ul>
										
									</li>
									<?php
									}
									else
									{
									?>
									<li><a href="<?php echo base_url();?>danh-muc/<?php echo $cat["cm_slug"];?>.html"><?php echo $cat["cm_ten"];?></a>
									<?php
									}
								}
								?>
								
							</ul>
						</div>
					</div>
					<?php
					}
					?>
					<?php
					$sanphammoi_list = $this->sanpham_model->public_lay_danh_sach_san_pham($chuyenmuc["cm_id"], "moi","",0,0,"Order");
					$total = count($sanphammoi_list);
					$numPage = floor( $total / 5);
					if(( $total / 5) - $numPage > 0)
					{
						$numPage += 1;
					}
					if($total > 0)
					{
					?>
					<div class="top-new mb-30 mt-30">
						<h3 class="sidebar-title">Sản phẩm mới</h3>
						<div class="side-product-active owl-carousel">
							<?php
							for($n=0;$n<$numPage;$n++)
							{
							?>
							<div class="side-pro-item">
								<?php
								for($m=0;$m<5;$m++)
								{
									
								if(5*$n+$m < $total)
								{
								$sanpham = $sanphammoi_list[5*$n+$m];
								?>
								<div class="single-product single-product-sidebar pl-15 pr-15">
									<div class="pro-img" style="width: 40%;float: left; position: relative;">
										<a href="<?php echo base_url();?>san-pham/<?php echo $sanpham["sp_slug"];?>.html">
											<img class="primary-img" src="<?php echo base_url();?>uploads/sanpham/<?php echo $sanpham["sp_hinh"];?>" alt="<?php echo $sanpham["sp_ten"];?>" style="width: 100%;height: 80px;">
										</a>
										
									</div>
									<div class="pro-content" style="width: 80%;float: left; position: relative;">
										<h4><a href="<?php echo base_url();?>san-pham/<?php echo $sanpham["sp_slug"];?>.html" title="<?php echo $sanpham["sp_ten"];?>"><?php echo $sanpham["sp_ten"];?></a></h4>
										<?php
										if($sanpham["sp_giam_gia"] > 0)
										{
										?>
										<p><span class="price"><?php echo number_format($sanpham["sp_gia_ban"]);?></span><del class="prev-price"><?php echo number_format($sanpham["sp_gia_thi_truong"]);?></del></p>
										<?php
										}
										else
										{
										?>
										<p><span class="price"><?php echo number_format($sanpham["sp_gia_ban"]);?></span></p>
										<?php
										}
										?>
									</div>
								</div>
								<?php
								}
								}
								?>
								                                      
							</div>
							<?php
							}
							?>
							
						</div>
					</div>
					<?php
					}
					?>                          
					<?php $this->load->view('sieuviet/left-quangcao'); ?>
				</div>
			</div>

			<div class="col-lg-9 order-1 order-lg-2">
				<div class="col-lg-12 order-1 order-lg-2 p-0">
					<form name="frm" action="" method="post"  enctype="multipart/form-data">
					<div class="grid-list-top border-default universal-padding justify-content-md-between align-items-center mb-30" style="min-height: 70px; float: left; position: relative; width: 100%;">
							
							<div class="grid-list-view mb-sm-15" style="float:left; position: relative;">
								<ul class="nav tabs-area d-flex align-items-center">
									<li><a class="active" data-toggle="tab" href="#grid-view"><i class="fa fa-th"></i></a></li>
									<li><a data-toggle="tab" href="#list-view"><i class="fa fa-list-ul"></i></a></li>
								</ul>
							</div>
							<div class="main-toolbar-sorter" style="float:left; position: relative;">
								<div class="toolbar-sorter align-items-center">
									<select name="cboSapXep" class="sorter wide" onchange="submit()">
										<option <?php if($this->session->userdata('order') == "Order") echo "selected"; ?> value="Order">Thứ tự mới nhất</option>
										<option <?php if($this->session->userdata('order') == "NameAZ") echo "selected"; ?> value="NameAZ">Tên từ A đến Z</option>
										<option <?php if($this->session->userdata('order') == "NameZA") echo "selected"; ?> value="NameZA">Tên từ Z đến A</option>
										<option <?php if($this->session->userdata('order') == "Price12") echo "selected"; ?> value="Price12">Giá từ thấp đến cao</option>
										<option <?php if($this->session->userdata('order') == "Price21") echo "selected"; ?> value="Price21">Giá từ cao đến thấp</option>
									</select>
								</div>
							</div>
							<div class="main-toolbar-sorter" style="float:left; position: relative;">
								<div class="toolbar-sorter align-items-center" >
									<select name="cboGioiHan" class="sorter wide" onchange="submit()" >
										<option <?php if($this->session->userdata('limit') == "30") echo "selected"; ?>  value="30" >30</option>
										<option <?php if($this->session->userdata('limit') == "60") echo "selected"; ?> value="60">60</option>
										<option <?php if($this->session->userdata('limit') == "90") echo "selected"; ?> value="90">90</option>
										<option <?php if($this->session->userdata('limit') == "120") echo "selected"; ?> value="120">120</option>
										<option <?php if($this->session->userdata('limit') == "180") echo "selected"; ?> value="180">180</option>
									</select>
								</div>
							</div>
					</div>
					</form>
					
				</div>
				<div class="col-lg-12 order-1 order-lg-2 p-0">
				<div class="main-categorie mb-all-40" style="min-height: 70px; float: left; position: relative; width: 100%;">
					<div class="tab-content fix">
						<div id="grid-view" class="tab-pane fade show active">
							<div class="row">
								<?php
								foreach($sanpham_list as $sanpham)
								{
								?>
								<div class="col-lg-4 col-md-4 col-sm-6 col-6">
									<div class="single-product" style="border: 1px solid #ddd; ">
										<div class="pro-img">
											<a href="<?php echo base_url();?>san-pham/<?php echo $sanpham["sp_slug"];?>.html">
												<img class="primary-img" src="<?php echo base_url();?>uploads/sanpham/<?php echo $sanpham["sp_hinh"];?>" alt="<?php echo $sanpham["sp_ten"];?>" style="height: 260px; padding-left: 10px; padding-right: 10px; padding-top: 10px;">
											</a>
											<a class="quick_cart"  onclick="AddToCart('<?php echo $this->session->userdata("dh_id");?>','<?php echo $sanpham["sp_id"];?>','1','<?php echo $sanpham["sp_gia_ban"];?>')"><img src="<?php echo base_url();?>public/img/icon-cart.png"/></a>
										</div>
										<div class="pro-content">
											<div class="pro-info">
												<h4><a href="<?php echo base_url();?>san-pham/<?php echo $sanpham["sp_slug"];?>.html"><?php echo $sanpham["sp_ten"];?></a></h4>
												<?php
												if($sanpham["sp_giam_gia"] > 0)
												{
												?>
												<p><span class="price"><?php echo number_format($sanpham["sp_gia_ban"]);?></span><del class="prev-price"><?php echo number_format($sanpham["sp_gia_thi_truong"]);?></del></p>
												<div class="label-product l_sale">-<?php echo $sanpham["sp_giam_gia"];?><span class="symbol-percent">%</span></div>
												<?php
												}
												else
												{
												?>
												<p><span class="price"><?php if($sanpham["sp_gia_ban"] == 0) echo "liên hệ"; else echo number_format($sanpham["sp_gia_ban"]);?></span></p>
												<?php
												}
												?>
											</div>
											
										</div>
									</div>
								</div>
								<?php
								}
								?>
								
							</div>
						</div>
						<div id="list-view" class="tab-pane fade">
							<?php
							foreach($sanpham_list as $sanpham2)
							{
							?>
							<div class="single-product"> 
								<div class="row">        
									<div class="col-lg-4 col-md-5 col-sm-12">
										<div class="pro-img">
											<a href="<?php echo base_url();?>san-pham/<?php echo $sanpham2["sp_slug"];?>.html">
												<img class="h260 primary-img" src="<?php echo base_url();?>uploads/sanpham/<?php echo $sanpham2["sp_hinh"];?>" alt="single-product">
											</a>
											<a class="quick_cart"  onclick="AddToCart('<?php echo $this->session->userdata("dh_id");?>','<?php echo $sanpham2["sp_id"];?>','1','<?php echo $sanpham2["sp_gia_ban"];?>')"><img src="<?php echo base_url();?>public/img/icon-cart.png"/></a>
											<?php
											if($sanpham2["sp_moi"] == 1)
											{
											?>
											<span class="sticker-new">new</span>
											<?php
											}
											?>
										</div>
									</div>
									<div class="col-lg-8 col-md-7 col-sm-12">
										<div class="pro-content">
											<h4><a href="<?php echo base_url();?>san-pham/<?php echo $sanpham2["sp_slug"];?>.html" title="<?php echo $sanpham2["sp_ten"];?>"><?php echo $sanpham2["sp_ten"];?></a></h4>
											<?php
											if($sanpham2["sp_giam_gia"] > 0)
											{
											?>
											<p><span class="price"><?php echo number_format($sanpham2["sp_gia_ban"]);?></span><del class="prev-price"><?php echo number_format($sanpham2["sp_gia_thi_truong"]);?></del></p>
											<?php
											}
											else
											{
											?>
											<p><span class="price"><?php echo number_format($sanpham2["sp_gia_ban"]);?></span></p>
											
											<?php
											}
											?>
											<p><?php echo $sanpham2["sp_tom_tat"];?></p>
											
										</div>
									</div>
								</div>
							</div>
							<?php
							}
							?>
							
						</div>
						<?php echo $strphantrang ?>
					</div>
				</div>
				</div>
			</div>
		</div>
	</div>
</div>
