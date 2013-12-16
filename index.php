<?php 
$pageTitle = "Unique T-Shirts for sale";
include('_/components/header.php'); ?>
		<div class="section banner">
			<div class="wrapper">
				<img class="hero" src="_/img/mike-the-frog.png" alt="Mike the Frog says:">
				<div class="button">
					<a href="shirts.php">
						<h2>Hey, I&rsquo;m Mike!</h2>
						<p>Check Out My Shirts</p>
					</a>
				</div> <!-- button -->
			</div> <!-- wrapper -->
		</div> <!-- banner -->
		<div class="section shirts latest">
			<div class="wrapper">
				<h2>Mike&rsquo;s Latest Shirts</h2>
				<?php include("_/components/products.php"); ?>
				<ul class="products">
					<?php 
					$total_products = count($products);
					$position = 0;
					$list_view_html = "";
					foreach($products as $product_id => $product) { 
							$position = $position + 1;
							if ($total_products - $position < 4){
								$list_view_html = get_list_view_html($product_id,$product) . $list_view_html;
							}
						}
						echo $list_view_html;
					?>					
				</ul>
			</div> <!-- wrapper -->
		</div> <!-- section -->
<?php include('_/components/footer.php'); ?>