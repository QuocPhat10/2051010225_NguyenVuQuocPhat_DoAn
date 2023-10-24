<div class="main-page-banner pb-15 off-white-bg">
	<div class="container">
		<div class="row">
			<div class="col-xl-3 col-lg-4 d-none d-lg-block">
				<?php $this->load->view('sieuviet/menusanpham'); ?>
			</div>
			<?php $this->load->view('sieuviet/trangchu/slide'); ?>
		</div>
	</div>
</div>
<?php 
$this->load->view('sieuviet/trangchu/adv-middle'); 
$this->load->view('sieuviet/trangchu/hotdeal');
$this->load->view('sieuviet/trangchu/product');
/*
$lienket_list = $this->lienket_model->lay_danh_sach_lien_ket_gioi_han("binhthuong","bottom",4,0);
if(count($lienket_list) > 0)
{
?>
<div class="big-banner mt-30">
	<div class="container big-banner-box">
		<?php
		foreach($lienket_list as $lienket)
		{
		?>
		<div class="col-img">
			<a href="<?php echo $lienket["lk_link"];?>" target="<?php echo $lienket["lk_loai_link"];?>"><img src="<?php echo base_url();?>uploads/lienket/<?php echo $lienket["lk_hinh"];?>" alt="banner 3"></a>
		</div>
		<?php
		}
		?>
	</div>
</div>
<?php
}
*/
?>
<div class="blog-area ptb-30 off-white-bg ptb-sm-30">
	<div class="container">
		<div class="like-product-area"> 
			<h2 class="section-ttitle2 mb-30">TIN TỨC MỚI NHẤT</h2>
               <!-- Latest Blog Active Start Here -->
			<div class="latest-blog-active owl-carousel">
				<?php
				$tintuc_list = $this->baiviet_model->lay_danh_sach_bai_viet_moi( "", 10, 0);
				foreach($tintuc_list as $tintuc)
				{
					$img = "default.png";
					if(strlen($tintuc["bv_hinh"]) > 0)
						$img = $tintuc["bv_hinh"];
				?>
				
			   <div class="single-latest-blog">
				   <div class="blog-img">
					   <a href="<?php echo base_url();?>tin-tuc/<?php echo $tintuc["bv_slug"];?>.html"><img src="<?php echo base_url();?>uploads/baiviet/<?php echo $img;?>" alt="blog-image"></a>
				   </div>
				   <div class="blog-desc">
					   <h4><a href="<?php echo base_url();?>tin-tuc/<?php echo $tintuc["bv_slug"];?>.html"><?php echo $tintuc["bv_ten"];?></a></h4>
						
						<p><?php echo html_escape(character_limiter($tintuc["bv_tom_tat"], 140, '...')); ?></p>
				   </div>
				   <div class="blog-date">
						<span><?php echo date('d/m',strtotime($tintuc["bv_ngay_dang"]));?></span>
						<?php echo date('Y',strtotime($tintuc["bv_ngay_dang"]));?>
					</div>
			   </div>
				
				<?php
				}
				?>
			</div>
		</div>
	</div>
</div>
<div class="support-area bdr-top mt-0">
	<div class="container">
		<div class="d-flex flex-wrap text-center">
			<?php
			$lienket_list = $this->lienket_model->lay_danh_sach_lien_ket_gioi_han("binhthuong","bottom",5,0);
			foreach($lienket_list as $lienket)
			{
			?>
			<div class="single-support">
				<div class="support-icon">
					<img src="<?php echo base_url();?>uploads/lienket/<?php echo $lienket["lk_hinh"];?>"/>
				</div>
				<div class="support-desc">
					<h6><?php echo $lienket["lk_ten"];?></h6>
					<span><?php echo $lienket["lk_mo_ta"];?></span>
				</div>
			</div>
			<?php
			}
			?>			
		</div>
	</div>
</div>