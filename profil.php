<?php

include_once 'admin/inc/head.php';

?>

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">KULLANICI BİLGİLERİ</h1>
                        
                    </div>
                    <div class="row">
			<div class="col-sm-6 col-md-6">
							<div class="card card-stats card-round">
								<div class="card-body ">
									<div class="row align-items-center">
										<div class="col-icon">
											<div class="icon-big text-center icon-success bubble-shadow-small">
												<i class="far fa-id-card"></i>
											</div>
										</div>
										<div class="col col-stats ml-3 ml-sm-0">
											<div class="numbers">
												<p class="card-category">ADI SOYADI</p>
												<h4 class="card-title text-success"><?= $kbilgi['kadi']?> </h4>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
<div class="col-sm-6 col-md-6">
							<div class="card card-stats card-round">
								<div class="card-body ">
									<div class="row align-items-center">
										<div class="col-icon">
											<div class="icon-big text-center icon-secondary bubble-shadow-small">
												<i class="far fa-eye"></i>
											</div>
										</div>
										<div class="col col-stats ml-3 ml-sm-0">
											<div class="numbers">
												<p class="card-category">YETKİ</p>
												<?php
if ($kbilgi['yetki'] == "1") {?> 
											<h2 class="card-title text-info">PATRON</h2>
<?php } ?> 
<?php
if ($kbilgi['yetki'] == "2") {?> 
											<h2 class="card-title text-primary">DEPO SAHİBİ</h2>
<?php } ?> 
 
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
<div class="col-sm-6 col-md-6">
							<div class="card card-stats card-round">
								<div class="card-body ">
									<div class="row align-items-center">
										<div class="col-icon">
											<div class="icon-big text-center icon-primary bubble-shadow-small">
												<i class="far fa-id-badge"></i>
											</div>
										</div>
										<div class="col col-stats ml-3 ml-sm-0">
											<div class="numbers">
												<p class="card-category">KULLANICI ADI</p>
												<h4 class="card-title text-success"><?= $kbilgi['kadi']?></h4>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
<br>
<div class="col-sm-6 col-md-6">
							<div class="card card-stats card-round">
								<div class="card-body ">
									<div class="row align-items-center">
										<div class="col-icon">
											<div class="icon-big text-center icon-danger bubble-shadow-small">
												<i class="far fa-keyboard"></i>
											</div>
										</div>
										<div class="col col-stats ml-3 ml-sm-0">
											<div class="numbers">
												<p class="card-category">ŞİFRE</p>
												<h4 class="card-title text-success"><?= $kbilgi['parola']?></h4>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>





<div class="col-sm-6 col-md-6">
							<div class="card card-stats card-round">
								<div class="card-body ">
									<div class="row align-items-center">
										<div class="col-icon">
											<div class="icon-big text-center icon-info bubble-shadow-small">
												<i class="fas fa-at"></i>
											</div>
										</div>
										<div class="col col-stats ml-3 ml-sm-0">
											<div class="numbers">
												<p class="card-category">MAİL ADRESİ</p>
												<h4 class="card-title text-success"><?= $kbilgi['email']?></h4>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>

						</div>
						<div class="row row-card-no-pd">
						<div class="col-sm-6 col-md-4">
							<div class="card card-stats card-round">
								<div class="card-body">
									<div class="row">
										<div class="col-5">
											<div class="icon-big text-center">
											<i class="fas fa-plus text-success"></i>
											</div>
										</div>
										<div class="col-7 col-stats">
											<div class="numbers">
												<p class="card-category">STOK EKLEME İZNİ</p>
<?php
if ($kbilgi['stokgrup'] == "0") {?> 
											<h2 class="card-title text-danger">İZİN YOK</h2>
<?php } ?> 
<?php
if ($kbilgi['stokgrup'] == "1") {?> 
											<h2 class="card-title text-success">İZİN VAR</h2>
<?php } ?> 

											</div>
										</div>
									</div>
								</div>
							</div>
						</div>



<div class="col-sm-6 col-md-4">
							<div class="card card-stats card-round">
								<div class="card-body ">
									<div class="row">
										<div class="col-5">
											<div class="icon-big text-center">
												<i class="fas fa-edit text-warning"></i>
											</div>
										</div>
										<div class="col-7 col-stats">
											<div class="numbers">
												<p class="card-category">STOK DÜZENLEME İZNİ</p>
												<?php
if ($kbilgi['stokgrup'] == "0") {?> 
											<h2 class="card-title text-danger">İZİN YOK</h2>
<?php } ?> 
<?php
if ($kbilgi['stokgrup'] == "1") {?> 
											<h2 class="card-title text-success">İZİN VAR</h2>
<?php } ?>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
<div class="col-sm-6 col-md-4">
							<div class="card card-stats card-round">
								<div class="card-body ">
									<div class="row">
										<div class="col-5">
											<div class="icon-big text-center">
												<i class="fas fa-times text-danger"></i>
											</div>
										</div>
										<div class="col-7 col-stats">
											<div class="numbers">
												<p class="card-category">STOK SİLME İZNİ</p>
									<?php
if ($kbilgi['stokgrup'] == "0") {?> 
											<h2 class="card-title text-danger">İZİN YOK</h2>
<?php } ?> 
<?php
if ($kbilgi['stokgrup'] == "1") {?> 
											<h2 class="card-title text-success">İZİN VAR</h2>
<?php } ?>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
</div>





<div class="row row-card-no-pd">
						<div class="col-sm-6 col-md-4">
							<div class="card card-stats card-round">
								<div class="card-body">
									<div class="row">
										<div class="col-5">
											<div class="icon-big text-center">
											<i class="fas fa-plus text-success"></i>
											</div>
										</div>
										<div class="col-7 col-stats">
											<div class="numbers">
												<p class="card-category">DEPO EKLEME İZNİ</p>
<?php
if ($kbilgi['depo'] == "0") {?> 
											<h2 class="card-title text-danger">İZİN YOK</h2>
<?php } ?> 
<?php
if ($kbilgi['depo'] == "1") {?> 
											<h2 class="card-title text-success">İZİN VAR</h2>
<?php } ?> 

											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
<div class="col-sm-6 col-md-4">
							<div class="card card-stats card-round">
								<div class="card-body ">
									<div class="row">
										<div class="col-5">
											<div class="icon-big text-center">
												<i class="fas fa-edit text-warning"></i>
											</div>
										</div>
										<div class="col-7 col-stats">
											<div class="numbers">
												<p class="card-category">DEPO DÜZENLEME İZNİ</p>
												<?php
if ($kbilgi['depo'] == "0") {?> 
											<h2 class="card-title text-danger">İZİN YOK</h2>
<?php } ?> 
<?php
if ($kbilgi['depo'] == "1") {?> 
											<h2 class="card-title text-success">İZİN VAR</h2>
<?php } ?>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
<div class="col-sm-6 col-md-4">
							<div class="card card-stats card-round">
								<div class="card-body ">
									<div class="row">
										<div class="col-5">
											<div class="icon-big text-center">
												<i class="fas fa-times text-danger"></i>
											</div>
										</div>
										<div class="col-7 col-stats">
											<div class="numbers">
												<p class="card-category">DEPO SİLME İZNİ</p>
									<?php
if ($kbilgi['depo'] == "0") {?> 
											<h2 class="card-title text-danger">İZİN YOK</h2>
<?php } ?> 
<?php
if ($kbilgi['depo'] == "1") {?> 
											<h2 class="card-title text-success">İZİN VAR</h2>
<?php } ?>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
</div>






<div class="row row-card-no-pd">
						<div class="col-sm-6 col-md-4">
							<div class="card card-stats card-round">
								<div class="card-body">
									<div class="row">
										<div class="col-5">
											<div class="icon-big text-center">
											<i class="fas fa-plus text-success"></i>
											</div>
										</div>
										<div class="col-7 col-stats">
											<div class="numbers">
												<p class="card-category">TRANSFER EKLEME İZNİ</p>
<?php
if ($kbilgi['transfer'] == "0") {?> 
											<h2 class="card-title text-danger">İZİN YOK</h2>
<?php } ?> 
<?php
if ($kbilgi['transfer'] == "1") {?> 
											<h2 class="card-title text-success">İZİN VAR</h2>
<?php } ?> 

											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
<div class="col-sm-6 col-md-4">
							<div class="card card-stats card-round">
								<div class="card-body ">
									<div class="row">
										<div class="col-5">
											<div class="icon-big text-center">
												<i class="fas fa-edit text-warning"></i>
											</div>
										</div>
										<div class="col-7 col-stats">
											<div class="numbers">
												<p class="card-category">TRANSFER DÜZEN İZNİ</p>
												<?php
if ($kbilgi['transfer'] == "0") {?> 
											<h2 class="card-title text-danger">İZİN YOK</h2>
<?php } ?> 
<?php
if ($kbilgi['transfer'] == "1") {?> 
											<h2 class="card-title text-success">İZİN VAR</h2>
<?php } ?>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
<div class="col-sm-6 col-md-4">
							<div class="card card-stats card-round">
								<div class="card-body ">
									<div class="row">
										<div class="col-5">
											<div class="icon-big text-center">
												<i class="fas fa-times text-danger"></i>
											</div>
										</div>
										<div class="col-7 col-stats">
											<div class="numbers">
												<p class="card-category">TRANSFER SİLME İZNİ</p>
									<?php
if ($kbilgi['transfer'] == "0") {?> 
											<h2 class="card-title text-danger">İZİN YOK</h2>
<?php } ?> 
<?php
if ($kbilgi['transfer'] == "1") {?> 
											<h2 class="card-title text-success">İZİN VAR</h2>
<?php } ?>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
</div>




<div class="row row-card-no-pd">
						<div class="col-sm-6 col-md-4">
							<div class="card card-stats card-round">
								<div class="card-body">
									<div class="row">
										<div class="col-5">
											<div class="icon-big text-center">
											<i class="fas fa-plus text-success"></i>
											</div>
										</div>
										<div class="col-7 col-stats">
											<div class="numbers">
												<p class="card-category">KATEGORİ EKLEME İZNİ</p>
<?php
if ($kbilgi['kategori'] == "0") {?> 
											<h2 class="card-title text-danger">İZİN YOK</h2>
<?php } ?> 
<?php
if ($kbilgi['kategori'] == "1") {?> 
											<h2 class="card-title text-success">İZİN VAR</h2>
<?php } ?> 

											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
<div class="col-sm-6 col-md-4">
							<div class="card card-stats card-round">
								<div class="card-body ">
									<div class="row">
										<div class="col-5">
											<div class="icon-big text-center">
												<i class="fas fa-edit text-warning"></i>
											</div>
										</div>
										<div class="col-7 col-stats">
											<div class="numbers">
												<p class="card-category">KATEGORİ DÜZENLEME İZNİ</p>
												<?php
if ($kbilgi['kategori'] == "0") {?> 
											<h2 class="card-title text-danger">İZİN YOK</h2>
<?php } ?> 
<?php
if ($kbilgi['kategori'] == "1") {?> 
											<h2 class="card-title text-success">İZİN VAR</h2>
<?php } ?>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
<div class="col-sm-6 col-md-4">
							<div class="card card-stats card-round">
								<div class="card-body ">
									<div class="row">
										<div class="col-5">
											<div class="icon-big text-center">
												<i class="fas fa-times text-danger"></i>
											</div>
										</div>
										<div class="col-7 col-stats">
											<div class="numbers">
												<p class="card-category">KATEGORİ SİLME İZNİ</p>
									<?php
if ($kbilgi['kategori'] == "0") {?> 
											<h2 class="card-title text-danger">İZİN YOK</h2>
<?php } ?> 
<?php
if ($kbilgi['kategori'] == "1") {?> 
											<h2 class="card-title text-success">İZİN VAR</h2>
<?php } ?>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
</div>





<div class="row row-card-no-pd">
						<div class="col-sm-6 col-md-4">
							<div class="card card-stats card-round">
								<div class="card-body">
									<div class="row">
										<div class="col-5">
											<div class="icon-big text-center">
											<i class="fas fa-plus text-success"></i>
											</div>
										</div>
										<div class="col-7 col-stats">
											<div class="numbers">
												<p class="card-category">BİRİM EKLEME İZNİ</p>
<?php
if ($kbilgi['birim'] == "0") {?> 
											<h2 class="card-title text-danger">İZİN YOK</h2>
<?php } ?> 
<?php
if ($kbilgi['birim'] == "1") {?> 
											<h2 class="card-title text-success">İZİN VAR</h2>
<?php } ?> 

											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
<div class="col-sm-6 col-md-4">
							<div class="card card-stats card-round">
								<div class="card-body ">
									<div class="row">
										<div class="col-5">
											<div class="icon-big text-center">
												<i class="fas fa-edit text-warning"></i>
											</div>
										</div>
										<div class="col-7 col-stats">
											<div class="numbers">
												<p class="card-category">BİRİM DÜZENLEME İZNİ</p>
												<?php
if ($kbilgi['birim'] == "0") {?> 
											<h2 class="card-title text-danger">İZİN YOK</h2>
<?php } ?> 
<?php
if ($kbilgi['birim'] == "1") {?> 
											<h2 class="card-title text-success">İZİN VAR</h2>
<?php } ?>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
<div class="col-sm-6 col-md-4">
							<div class="card card-stats card-round">
								<div class="card-body ">
									<div class="row">
										<div class="col-5">
											<div class="icon-big text-center">
												<i class="fas fa-times text-danger"></i>
											</div>
										</div>
										<div class="col-7 col-stats">
											<div class="numbers">
												<p class="card-category">BİRİM SİLME İZNİ</p>
									<?php
if ($kbilgi['birim'] == "0") {?> 
											<h2 class="card-title text-danger">İZİN YOK</h2>
<?php } ?> 
<?php
if ($kbilgi['birim'] == "1") {?> 
											<h2 class="card-title text-success">İZİN VAR</h2>
<?php } ?>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
</div>



<div class="row row-card-no-pd">
						<div class="col-sm-6 col-md-4">
							<div class="card card-stats card-round">
								<div class="card-body">
									<div class="row">
										<div class="col-5">
											<div class="icon-big text-center">
											<i class="fas fa-plus text-success"></i>
											</div>
										</div>
										<div class="col-7 col-stats">
											<div class="numbers">
												<p class="card-category">MARKA EKLEME İZNİ</p>
<?php
if ($kbilgi['marka'] == "0") {?> 
											<h2 class="card-title text-danger">İZİN YOK</h2>
<?php } ?> 
<?php
if ($kbilgi['marka'] == "1") {?> 
											<h2 class="card-title text-success">İZİN VAR</h2>
<?php } ?> 

											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
<div class="col-sm-6 col-md-4">
							<div class="card card-stats card-round">
								<div class="card-body ">
									<div class="row">
										<div class="col-5">
											<div class="icon-big text-center">
												<i class="fas fa-edit text-warning"></i>
											</div>
										</div>
										<div class="col-7 col-stats">
											<div class="numbers">
												<p class="card-category">MARKA DÜZENLEME İZNİ</p>
												<?php
if ($kbilgi['marka'] == "0") {?> 
											<h2 class="card-title text-danger">İZİN YOK</h2>
<?php } ?> 
<?php
if ($kbilgi['marka'] == "1") {?> 
											<h2 class="card-title text-success">İZİN VAR</h2>
<?php } ?>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
<div class="col-sm-6 col-md-4">
							<div class="card card-stats card-round">
								<div class="card-body ">
									<div class="row">
										<div class="col-5">
											<div class="icon-big text-center">
												<i class="fas fa-times text-danger"></i>
											</div>
										</div>
										<div class="col-7 col-stats">
											<div class="numbers">
												<p class="card-category">MARKA SİLME İZNİ</p>
									<?php
if ($kbilgi['marka'] == "0") {?> 
											<h2 class="card-title text-danger">İZİN YOK</h2>
<?php } ?> 
<?php
if ($kbilgi['marka'] == "1") {?> 
											<h2 class="card-title text-success">İZİN VAR</h2>
<?php } ?>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
</div>





<div class="row row-card-no-pd">
						<div class="col-sm-6 col-md-4">
							<div class="card card-stats card-round">
								<div class="card-body">
									<div class="row">
										<div class="col-5">
											<div class="icon-big text-center">
											<i class="fas fa-plus text-success"></i>
											</div>
										</div>
										<div class="col-7 col-stats">
											<div class="numbers">
												<p class="card-category">MODEL EKLEME İZNİ</p>
<?php
if ($kbilgi['model'] == "0") {?> 
											<h2 class="card-title text-danger">İZİN YOK</h2>
<?php } ?> 
<?php
if ($kbilgi['model'] == "1") {?> 
											<h2 class="card-title text-success">İZİN VAR</h2>
<?php } ?> 

											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
<div class="col-sm-6 col-md-4">
							<div class="card card-stats card-round">
								<div class="card-body ">
									<div class="row">
										<div class="col-5">
											<div class="icon-big text-center">
												<i class="fas fa-edit text-warning"></i>
											</div>
										</div>
										<div class="col-7 col-stats">
											<div class="numbers">
												<p class="card-category">MODEL DÜZENLEME İZNİ</p>
												<?php
if ($kbilgi['model'] == "0") {?> 
											<h2 class="card-title text-danger">İZİN YOK</h2>
<?php } ?> 
<?php
if ($kbilgi['model'] == "1") {?> 
											<h2 class="card-title text-success">İZİN VAR</h2>
<?php } ?>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
<div class="col-sm-6 col-md-4">
							<div class="card card-stats card-round">
								<div class="card-body ">
									<div class="row">
										<div class="col-5">
											<div class="icon-big text-center">
												<i class="fas fa-times text-danger"></i>
											</div>
										</div>
										<div class="col-7 col-stats">
											<div class="numbers">
												<p class="card-category">MODEL SİLME İZNİ</p>
									<?php
if ($kbilgi['model'] == "0") {?> 
											<h2 class="card-title text-danger">İZİN YOK</h2>
<?php } ?> 
<?php
if ($kbilgi['model'] == "1") {?> 
											<h2 class="card-title text-success">İZİN VAR</h2>
<?php } ?>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
</div>





<div class="row row-card-no-pd">
						<div class="col-sm-6 col-md-4">
							<div class="card card-stats card-round">
								<div class="card-body">
									<div class="row">
										<div class="col-5">
											<div class="icon-big text-center">
											<i class="fas fa-plus text-success"></i>
											</div>
										</div>
										<div class="col-7 col-stats">
											<div class="numbers">
												<p class="card-category">KDV EKLEME İZNİ</p>
<?php
if ($kbilgi['kdv'] == "0") {?> 
											<h2 class="card-title text-danger">İZİN YOK</h2>
<?php } ?> 
<?php
if ($kbilgi['kdv'] == "1") {?> 
											<h2 class="card-title text-success">İZİN VAR</h2>
<?php } ?> 

											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
<div class="col-sm-6 col-md-4">
							<div class="card card-stats card-round">
								<div class="card-body ">
									<div class="row">
										<div class="col-5">
											<div class="icon-big text-center">
												<i class="fas fa-edit text-warning"></i>
											</div>
										</div>
										<div class="col-7 col-stats">
											<div class="numbers">
												<p class="card-category">KDV DÜZENLEME İZNİ</p>
												<?php
if ($kbilgi['kdv'] == "0") {?> 
											<h2 class="card-title text-danger">İZİN YOK</h2>
<?php } ?> 
<?php
if ($kbilgi['kdv'] == "1") {?> 
											<h2 class="card-title text-success">İZİN VAR</h2>
<?php } ?>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
<div class="col-sm-6 col-md-4">
							<div class="card card-stats card-round">
								<div class="card-body ">
									<div class="row">
										<div class="col-5">
											<div class="icon-big text-center">
												<i class="fas fa-times text-danger"></i>
											</div>
										</div>
										<div class="col-7 col-stats">
											<div class="numbers">
												<p class="card-category">KDV SİLME İZNİ</p>
									<?php
if ($kbilgi['kdv'] == "0") {?> 
											<h2 class="card-title text-danger">İZİN YOK</h2>
<?php } ?> 
<?php
if ($kbilgi['kdv'] == "1") {?> 
											<h2 class="card-title text-success">İZİN VAR</h2>
<?php } ?>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
</div>





<div class="row row-card-no-pd">
						<div class="col-sm-6 col-md-4">
							<div class="card card-stats card-round">
								<div class="card-body">
									<div class="row">
										<div class="col-5">
											<div class="icon-big text-center">
											<i class="fas fa-plus text-success"></i>
											</div>
										</div>
										<div class="col-7 col-stats">
											<div class="numbers">
												<p class="card-category">KULLANICI EKLEME İZNİ</p>
<?php
if ($kbilgi['kullanici'] == "0") {?> 
											<h2 class="card-title text-danger">İZİN YOK</h2>
<?php } ?> 
<?php
if ($kbilgi['kullanici'] == "1") {?> 
											<h2 class="card-title text-success">İZİN VAR</h2>
<?php } ?> 

											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
<div class="col-sm-6 col-md-4">
							<div class="card card-stats card-round">
								<div class="card-body ">
									<div class="row">
										<div class="col-5">
											<div class="icon-big text-center">
												<i class="fas fa-edit text-warning"></i>
											</div>
										</div>
										<div class="col-7 col-stats">
											<div class="numbers">
												<p class="card-category">KULLANICI DÜZENLEME İZNİ</p>
												<?php
if ($kbilgi['kullanici'] == "0") {?> 
											<h2 class="card-title text-danger">İZİN YOK</h2>
<?php } ?> 
<?php
if ($kbilgi['kullanici'] == "1") {?> 
											<h2 class="card-title text-success">İZİN VAR</h2>
<?php } ?>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
<div class="col-sm-6 col-md-4">
							<div class="card card-stats card-round">
								<div class="card-body ">
									<div class="row">
										<div class="col-5">
											<div class="icon-big text-center">
												<i class="fas fa-times text-danger"></i>
											</div>
										</div>
										<div class="col-7 col-stats">
											<div class="numbers">
												<p class="card-category">KULLANICI SİLME İZNİ</p>
									<?php
if ($kbilgi['kullanici'] == "0") {?> 
											<h2 class="card-title text-danger">İZİN YOK</h2>
<?php } ?> 
<?php
if ($kbilgi['kullanici'] == "1") {?> 
											<h2 class="card-title text-success">İZİN VAR</h2>
<?php } ?>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
</div>
                            
                </div>
           

   <?php 
include_once 'admin/inc/footer.php';


?>