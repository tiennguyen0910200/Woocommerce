<?php 
/**
 * Perform all main WooCommerce configurations for this theme
 *
 * @package  Top Store WordPress theme
 */
// If plugin - 'WooCommerce' not exist then return.
if ( ! class_exists( 'WooCommerce' ) ){
	   return;
}
/*******************************/
/** Sidebar Add Cart Product **/
/*******************************/
if ( ! function_exists( 'top_store_cart_total_item' ) ){
  /**
   * Cart Link
   * Displayed a link to the cart including the number of items present and the cart total
   */
 function top_store_cart_total_item(){
   global $woocommerce; 
  ?>
 <a class="cart-contents" href="<?php echo wc_get_cart_url(); ?>" title="<?php _e( 'View your shopping cart','top-store' ); ?>"><i class="fa fa-shopping-basket"></i> <span class="cart-content"><?php echo sprintf ( _n( '<span class="count-item">%d</span>', '<span class="count-item">%d</span>', WC()->cart->get_cart_contents_count(),'top-store' ), WC()->cart->get_cart_contents_count() ); ?><?php echo WC()->cart->get_cart_total(); ?></span></a>
  <?php }
}
//cart view function
function top_store_menu_cart_view($cart_view){
	global $woocommerce;
    $cart_view= top_store_cart_total_item();
    return $cart_view;
}
add_action( 'top_store_cart_count','top_store_menu_cart_view');

function top_store_woo_cart_product(){
global $woocommerce;
?>
<div id="open-cart" class="open-cart">
<div class="top-store-quickcart-dropdown">
<?php 
woocommerce_mini_cart(); 
?>
</div>
</div>
    <?php
}
add_action( 'top_store_woo_cart', 'top_store_woo_cart_product' );
add_filter('woocommerce_add_to_cart_fragments', 'top_store_add_to_cart_dropdown_fragment');
function top_store_add_to_cart_dropdown_fragment( $fragments ){
   global $woocommerce;
   ob_start();
   ?>
   <div class="top-store-quickcart-dropdown">
       <?php woocommerce_mini_cart(); ?>
   </div>
   <?php $fragments['div.top-store-quickcart-dropdown'] = ob_get_clean();
   return $fragments;
}
add_filter('woocommerce_add_to_cart_fragments', 'top_store_add_to_cart_fragment');
function top_store_add_to_cart_fragment($fragments){
        ob_start();?>

          <a class="cart-contents" href="<?php echo wc_get_cart_url(); ?>" title="<?php _e( 'View your shopping cart','top-store' ); ?>"><i class="fa fa-shopping-basket"></i> <span class="cart-content"><?php echo sprintf ( _n( '<span class="count-item">%d</span>', '<span class="count-item">%d</span>', WC()->cart->get_cart_contents_count(),'top-store' ), WC()->cart->get_cart_contents_count() ); ?><?php echo WC()->cart->get_cart_total(); ?></span></a>

       <?php  $fragments['a.cart-contents'] = ob_get_clean();

        return $fragments;
    }
/***********************************************/
//Sort section Woocommerce category filter show
/***********************************************/
function top_store_add_to_cart_url($product){
 $cart_url =  apply_filters( 'woocommerce_loop_add_to_cart_link',
    sprintf( '<a href="%s" rel="nofollow" data-product_id="%s" data-product_sku="%s" data-quantity="%s" class="button th-button %s %s"><span>%s</span></a>',
        esc_url( $product->add_to_cart_url() ),
        esc_attr( $product->get_id() ),
        esc_attr( $product->get_sku() ),
        esc_attr( isset( $quantity ) ? $quantity : 1 ),
        $product->is_purchasable() && $product->is_in_stock() ? 'add_to_cart_button' : '',
        $product->is_purchasable() && $product->is_in_stock() && $product->supports( 'ajax_add_to_cart' ) ? 'ajax_add_to_cart' : '',
        esc_html( $product->add_to_cart_text() )
    ),$product );
 return $cart_url;
}

/**********************************/
//Shop Product Markup
/**********************************/
if ( ! function_exists( 'top_store_product_meta_start' ) ){
  /**
   * Thumbnail wrap start.
   */
  function top_store_product_meta_start(){
    echo '<div class="thunk-product-wrap"><div class="thunk-product">';
  }
}
if ( ! function_exists( 'top_store_product_meta_end' ) ){

  /**
   * Thumbnail wrap start.
   */
  function top_store_product_meta_end(){

    echo '</div></div>';
  }
}
/**********************************/
//Shop Product Image Markup
/**********************************/
if ( ! function_exists( 'top_store_product_image_start' ) ){
  /**
   * Thumbnail wrap start.
   */
  function top_store_product_image_start(){
    echo '<div class="thunk-product-image">';
  }
}
if ( ! function_exists( 'top_store_product_image_end' ) ){

  /**
   * Thumbnail wrap start.
   */
    function top_store_product_image_end(){
      echo woocommerce_template_loop_rating();
      echo '<div class="thunk-icons-wrap">';
    do_action('quickview');
    top_store_whish_list();
    top_store_add_to_compare_fltr();
    echo '</div></div>';
  }
}

if ( ! function_exists( 'top_store_product_content_start' ) ){
  /**
   * Thumbnail wrap start.
   */
  function top_store_product_content_start(){
    echo '<div class="thunk-product-content">';
  }
}
if ( ! function_exists( 'top_store_product_content_end' ) ){

  /**
   * Thumbnail wrap start.
   */
  function top_store_product_content_end(){

    echo '</div>';
  }
}
 /**
   * Thunk-product-hover start.
   */
 if ( ! function_exists( 'top_store_product_hover_start' ) ){
  function top_store_product_hover_start(){

    echo'<div class="thunk-product-hover">';
    // do_action('top_store_wishlist');
    // do_action('top_store_compare');
      
  }
}
if ( ! function_exists( 'top_store_product_hover_end' ) ){

  /**
   * Thumbnail wrap start.
   */
  function top_store_product_hover_end(){
    
    echo '</div>';
  }
}

if ( ! function_exists( 'top_store_shop_content_start' ) ){

  /**
   * Thumbnail wrap start.
   */
  function top_store_shop_content_start(){
    
    echo '<div id="shop-product-wrap">';
  }
}

if ( ! function_exists( 'top_store_shop_content_end' ) ){

  /**
   * Thumbnail wrap start.
   */
  function top_store_shop_content_end(){
    
    echo '</div>';
  }
}
/**
* Shop customization.
*
* @return void
*/
add_action( 'woocommerce_before_shop_loop_item', 'top_store_product_meta_start', 10);
add_action( 'woocommerce_after_shop_loop_item', 'top_store_product_meta_end', 12 );
add_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_link_open',20);
add_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_link_open',0);
add_action( 'woocommerce_before_shop_loop_item_title', 'top_store_product_image_start', 0);
add_action( 'woocommerce_before_shop_loop_item_title', 'top_store_product_image_end',10 );
add_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price', 10 );
add_action( 'woocommerce_after_shop_loop_item_title', 'top_store_product_hover_start',50);
add_action( 'woocommerce_after_shop_loop_item', 'top_store_product_hover_end',20);
add_action( 'woocommerce_before_shop_loop', 'top_store_shop_content_start',1);
add_action( 'woocommerce_after_shop_loop', 'top_store_shop_content_end',1);
remove_action( 'woocommerce_before_shop_loop_item', 'woocommerce_template_loop_product_link_open');
remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5 );
/***************/
// single page
/***************/
if ( ! function_exists( 'top_store_single_summary_start' ) ){

  /**
   * Thumbnail wrap start.
   */
  function top_store_single_summary_start(){
    
    echo '<div class="thunk-single-product-summary-wrap">';
  }
}
if( ! function_exists( 'top_store_single_summary_end' ) ){

  /**
   * Thumbnail wrap start.
   */
  function top_store_single_summary_end(){
    
    echo '</div>';
  }
}
add_action( 'woocommerce_before_single_product_summary', 'top_store_single_summary_start',0);
add_action( 'woocommerce_after_single_product_summary', 'top_store_single_summary_end',0);
/****************/
// add to compare
/****************/
function top_store_add_to_compare_fltr(){
  global $product;
      $product_id = $product->get_id();
        if( is_plugin_active('yith-woocommerce-compare/init.php') ){
          echo '<div class="thunk-compare"><span class="compare-list"><div class="woocommerce product compare-button"><a href="'.esc_url(home_url()).'?action=yith-woocompare-add-product&id='.esc_attr($product_id).'" class="compare button" data-product_id="'.esc_attr($product_id).'" rel="nofollow"></a></div></span></div>';

           }
        }
/**********************/
/** wishlist **/
/**********************/
function top_store_whish_list(){
       if( shortcode_exists( 'yith_wcwl_add_to_wishlist' ) ){
        echo '<div class="thunk-wishlist"><span class="thunk-wishlist-inner">'.do_shortcode('[yith_wcwl_add_to_wishlist icon="fa fa-heart-o" label="wishlist" already_in_wishslist_text="Already" browse_wishlist_text="Added"]' ).'</span></div>';
       }
 } 

function top_store_whishlist_url(){
$wishlist_page_id =  get_option( 'yith_wcwl_wishlist_page_id' );
$wishlist_permalink = get_the_permalink( $wishlist_page_id );
return $wishlist_permalink ;
}
// display admin name
function top_store_display_admin_name(){
$user=wp_get_current_user();
echo esc_html($user->display_name); 
}
/** My Account Menu **/
function top_store_account(){
 if ( is_user_logged_in() ){?>
<a class="account" href="<?php echo esc_url(get_permalink( get_option('woocommerce_myaccount_page_id') ));?>"><span class="account-text"><?php _e('Hello , ','top-store');?> <?php top_store_display_admin_name(); ?></span><span class="account-text"><?php _e('My account','top-store');?></span><i class="fa fa-user-o" aria-hidden="true"></i></a>
<?php } else {?>
<span><a href="<?php echo esc_url(get_permalink( get_option('woocommerce_myaccount_page_id') ));?>"><span class="account-text"><?php _e('Login / Signup','top-store');?></span><span class="account-text"><?php _e('My account','top-store');?></span><i class="fa fa-lock" aria-hidden="true"></i></a></span>
<?php }
 }

 // Plus Minus Quantity Buttons @ WooCommerce Single Product Page
add_action( 'woocommerce_before_add_to_cart_quantity', 'top_store_display_quantity_minus',10,2 );
function top_store_display_quantity_minus(){
    echo '<div class="top-store-quantity"><button type="button" class="minus" >-</button>';
}
add_action( 'woocommerce_after_add_to_cart_quantity', 'top_store_display_quantity_plus',10,2 );
function top_store_display_quantity_plus(){
    echo '<button type="button" class="plus" >+</button></div>';
}

//Woocommerce: How to remove page-title at the home/shop page but not category pages
add_filter( 'woocommerce_show_page_title', 'top_store_not_a_shop_page' );
function top_store_not_a_shop_page() {
    return boolval(!is_shop());
}
//************************************************************************************************//
// *****************************HOME PAGE WOO FUNCTION****************************************//
//************************************************************************************************//
//***********************/
// product category list
//************************/
function top_store_product_list_categories( $args = '' ){
    $defaults = array(
        'child_of'            => 0,
        'current_category'    => 0,
        'depth'               => 2,
        'echo'                => 0,
        'exclude'             => '',
        'exclude_tree'        => '',
        'feed'                => '',
        'feed_image'          => '',
        'feed_type'           => '',
        'hide_empty'          => 1,
        'hide_title_if_empty' => false,
        'hierarchical'        => true,
        'order'               => 'ASC',
        'orderby'             => 'menu_order',
        'separator'           => '<br />',
        'show_count'          => 0,
        'show_option_all'     => '',
        'show_option_none'    => __( 'No categories','top-store' ),
        'style'               => 'list',
        'taxonomy'            => 'product_cat',
        'title_li'            => '',
        'use_desc_for_title'  => 0,
    );
 $html = wp_list_categories($defaults);
        echo '<ul class="product-cat-list thunk-product-cat-list" data-menu-style="vertical">'.$html.'</ul>';
  }