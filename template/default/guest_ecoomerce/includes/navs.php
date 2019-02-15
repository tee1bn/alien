	<li><a href="<?=Config::domain();?>">Home</a></li>
		
				<li>
								<a href="#">Our Services 
								</a>
								<ul class="sub-menu-m">
									<?php foreach (ProductsCategory::all() as $category ) :?>

									<li>
										<a href="<?=domain;?>/shop/<?=$category->category;?>"> <?=ucfirst($category->category);?></a>
									</li>

									<?php endforeach ;?>
								</ul>
					<span class="arrow-main-menu-m">
						<i class="fa fa-angle-right" aria-hidden="true"></i>
					</span>
					
							</li>


			
				<li>
								<a href="#">About us </a>
								<ul class="sub-menu-m">
									
									<li>
										<a href="<?=domain;?>/about/our-brand">Our Brand</a>
									</li>

									<li>
										<a href="<?=domain;?>/about/meet-the-ceo">Meet the CEO</a>
									</li>

								</ul>
					<span class="arrow-main-menu-m">
						<i class="fa fa-angle-right" aria-hidden="true"></i>
					</span>
							</li>
				
				<li>
					<a href="<?=domain;?>/about/our-core-values">Our Core Values</a>
				</li>
				
				<li>
					<a href="<?=Config::domain();?>/gallery">Gallery</a>
				</li>


				<li>
					<a href="<?=Config::domain();?>/contact">Contact</a>
				</li>