<?php

if (!defined('ABSPATH')) {
	exit;
}
// $byGroup = group_by("gender", $data);
function group_by($key, $data) {
	$result = array();

	foreach ($data as $val) {
		if (array_key_exists($key, $val)) {
			$result[$val[$key]][] = $val;
		} else {
			$result[""][] = $val;
		}
	}

	return $result;
}
function xana_user_products_ids() {
	global $product, $woocommerce, $woocommerce_loop;

	$current_user = wp_get_current_user();

	$customer_orders = get_posts(array(
		'numberposts' => -1,
		'meta_key'    => '_customer_user',
		'meta_value'  => $current_user->ID,
		'post_type'   => wc_get_order_types(),
		'post_status' => array('wc-completed'),
	));


	if (!$customer_orders) return;
	$product_ids = array();
	foreach ($customer_orders as $customer_order) {
		$order = new WC_Order($customer_order->ID);
		$items = $order->get_items();
		foreach ($items as $item) {
			$product_id = $item->get_product_id();
			$product_ids[] = $product_id;
		}
	}
	$product_ids = array_unique($product_ids);

	$args = array(
		'post_type' => 'product',
		'post__in' => $product_ids,
		'posts_per_page' => -1,
	);
	$loop = new WP_Query($args);

	$ids = [];
	ob_start();
	while ($loop->have_posts()) : $loop->the_post();
		array_push($ids, get_the_ID());
	endwhile;
	// echo count((array)$ids);
	return $ids;
	// woocommerce_product_loop_end();
	// woocommerce_reset_loop();
	// wp_reset_postdata();
}

$userProductIds = xana_user_products_ids();

// if ($userProductIds) {
// 	// $downloads = [];
// 	foreach ($userProductIds as $userProductId) {
// 		$meta = get_post_meta($userProductId, '_prefix_product_options', true);
// 		$pDownloads = $meta['opt-product-files-repeater'];
// 	}
// } else {
// 	//  no product file upload available
// }

?>
<?php if (!empty($userProductIds)) : ?>
	<ul class="wcdlar_download_list">
		<?php foreach ($userProductIds as $userProductId) : ?>
			<li>
				<a href="#" class="title"><?php echo get_the_title($userProductId) ?> <span class="arrow"></span></a>
				<?php
				$meta = get_post_meta($userProductId, '_prefix_product_options', true);
				$pDownloads = $meta['opt-product-files-repeater'];
				?>
				<div class="sub_items">
					<?php foreach ($pDownloads  as $pDownload) : ?>
						<ul class="wcdlar_order_wrapper">
							<?php if (!empty($pDownload)) : ?>

								<div class="flex">
									<p><?php echo $pDownload['opt-product-file-title']; ?></p>
									<video width="100%" height="" controls>
										<source src="<?php echo esc_url($pDownload['opt-product-file-upload']); ?>" type="video/mp4">
										Error Message
									</video>
								</div>
							<?php endif; ?>
						</ul>
					<?php endforeach; ?>
				</div>
			</li>
		<?php endforeach; ?>
	</ul>
<?php endif; ?>