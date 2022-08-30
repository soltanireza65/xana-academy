<?php

if (!defined('ABSPATH')) {
	exit;
}

$woo_downloads     = WC()->customer->get_downloadable_products();
$has_downloads = (bool) $woo_downloads;



if ($has_downloads) {
	$downloads = array();
	foreach ($woo_downloads as $download) {
		$downloads[$download['product_id']][$download['order_id']][] = $download;
	}
}


// echo "<pre>";
// print_r($downloads);
// echo "</pre>";
// wp_die();


$videoExtentions = ["MP4", "MOV", "WMV", "AVI", "MKV", "WEBM", "AVCHD", "FLV", "F4V", "SWF"];

do_action('woocommerce_before_account_downloads', $has_downloads); ?>
<script type="application/javascript" src="https://player.arvancloud.com/arvanplayer.min.js"></script>

<?php if ($has_downloads) : ?>

	<?php do_action('woocommerce_before_available_downloads'); ?>
	<!-- <div class="wcdlar_download_list">
		<div id="woo_product_downloads"></div>
	</div> -->



	<ul class="wcdlar_download_list">
		<?php foreach ($downloads as $product_id => $orders_download) : ?>
			<li>
				<a href="#" class="title"><?php echo get_the_title($product_id) ?> <span class="arrow"></span></a>
				<div class="sub_items">
					<?php foreach ($orders_download  as $order_id => $download_items) : ?>
						<ul class="wcdlar_order_wrapper">
							<?php if (!empty($download_items)) : ?>
								<?php foreach ($download_items  as $key => $download) : ?>
									<?php
									// echo "<pre>";
									// print_r($download);
									// echo "</pre>";
									?>
									<div class="flex">
										<p><?php echo $download['file']['name'] ?></p>
										<div id="" class="arvanplayer" style="width: 100%; height: 315px;" config="<?php echo esc_url($download['file']['file']); ?>" data-config='{
											"currenttime": 0,
											"autostart": false,
											"repeat": false,
											"mute": false,
											"preload": "auto",
											"controlbarautohide": true,
											"lang": "en",
											"aspectratio": "",
											"color": "",
											"controls": true,
											"touchnativecontrols": false,
											"displaytitle": true,
											"displaycontextmenu": false,
											"logoautohide": true
										}'></div>
									</div>
								<?php endforeach; ?>
							<?php endif; ?>
						</ul>
					<?php endforeach; ?>
				</div>
			</li>
		<?php endforeach; ?>
	</ul>




	<?php do_action('woocommerce_after_available_downloads'); ?>
<?php else : ?>
	<div class="woocommerce-Message woocommerce-Message--info woocommerce-info">
		<a class="woocommerce-Button button" href="<?php echo esc_url(apply_filters('woocommerce_return_to_shop_redirect', wc_get_page_permalink('shop'))); ?>">
			<?php esc_html_e('Go shopping', 'woocommerce') ?>
		</a>
		<?php esc_html_e('No downloads available yet.', 'woocommerce'); ?>
	</div>
<?php endif; ?>

<?php do_action('woocommerce_after_account_downloads', $has_downloads); ?>