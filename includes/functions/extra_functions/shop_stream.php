<?php
// +----------------------------------------------------------------------+
// |zen-cart Open Source E-commerce                                       |
// +----------------------------------------------------------------------+
// | Copyright (c) 2004 zen-cart										  |
// +----------------------------------------------------------------------+
// | This source file is subject to version 2.0 of the GPL license,       |
// | that is bundled with this package in the file LICENSE, and is        |
// | available through the world-wide-web at the following url:           |
// | http://www.zen-cart.com/license/2_0.txt.                             |
// | If you did not receive a copy of the zen-cart license and are unable |
// | to obtain it through the world-wide-web, please send a note to       |
// | license@zen-cart.com so we can mail you a copy immediately.          |
// +----------------------------------------------------------------------+
// | file: shop_stream.php, 2010/12/02								  	  |
// | Adds shop stream Capability to Zen Cart							  |
// | Author: Harjap Singh - https://www.odesk.com/users/~~e2e4ec336d05bb2b|
// +----------------------------------------------------------------------+
// 

function ak_shop_stream_orders() {
	global $db, $zv_orders_id, $orders, $notificationsArray; 
	
	$insert_id = $zv_orders_id;
	$order = $orders;
	$products = $notificationsArray;
	$language_id = $_SESSION['languages_id'];
	
	$string = '';
	
	foreach ($products as $p) {

		if (!is_null($p['products_id'])){
			$order_product_query = "select products_model, products_tax, products_quantity, final_price from " . TABLE_ORDERS_PRODUCTS . " where orders_id = " . (int)$insert_id . " and products_id = " . (int)$p['products_id'];
			$order_product = $db->Execute($order_product_query);
		
			$string .= '_shopstream.push(["addItem", "'.$order_product->fields['products_model'].'", "'.$p['products_name'].'", '.(float)$order_product->fields['final_price'].', '.$order_product->fields['products_quantity'].']);';
		}
		
	}
	?><script type="text/javascript">
		var _shopstream = _shopstream || [];
		_shopstream.push(['addOrder',
		  "<?php echo $order->fields['orders_id']?>",
		  <?php echo $order->fields['order_total']?>,
		  "<?php echo $order->fields['customers_email_address']?>",
		  "<?php echo $order->fields['customers_name']?>",
		  ""
		]);
		<?php echo $string?>
		_shopstream.push(['trackOrder']);
		</script><?php

}

function ak_shop_stream_code()
{
	if(trim(SHOP_STREAM_KEY)!='')
	{
		global $db,$current_page_base;
		?><script type="text/javascript" src="https://collector.shopstream.co/<?php echo SHOP_STREAM_KEY?>.js"></script><?php
		if($current_page_base == FILENAME_CHECKOUT_SUCCESS)
		{
			ak_shop_stream_orders();
		}
	}
}