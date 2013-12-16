<?php include("_/components/products.php"); ?>

<?php 
$pageTitle = "Mike's Full Catalog of Shirts";
$section = "shirts";
include('_/components/header.php'); ?>
		<div class="section shirts page">
			<div class="wrapper">
				<h1>Mike&rsquo;s Full Catalog of Shirts</h1>
				<ul class="products">
					<?php foreach($products as $product_id => $product) { 
							echo get_list_view_html($product_id,$product);
						}
					?>
				</ul>
			</div> <!-- wrapper -->
		</div> <!-- page -->

<?php include('_/components/footer.php') ?>