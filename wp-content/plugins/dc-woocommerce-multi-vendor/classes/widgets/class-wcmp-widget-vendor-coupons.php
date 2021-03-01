<?php

if (!defined('ABSPATH')) {
    exit;
}

class WCMp_Widget_Vendor_Coupons extends WC_Widget {

    public $vendor_term_id;

    public function __construct() {
        $this->widget_cssclass = 'wcmp_vendor_coupons';
        $this->widget_description = __('Displays coupons added by the vendor on the vendor shop page.', 'dc-woocommerce-multi-vendor');
        $this->widget_id = 'wcmp_vendor_coupons';
        $this->widget_name = __('WCMp: Vendor\'s Coupons', 'dc-woocommerce-multi-vendor');
        $this->settings = array(
            'title' => array(
                'type' => 'text',
                'std' => __('WCMp Vendor Coupons', 'dc-woocommerce-multi-vendor'),
                'label' => __('Title', 'dc-woocommerce-multi-vendor'),
            ),
        );
        parent::__construct();
    }

    public function widget($args, $instance) {
        global $wp_query, $WCMp;

        $this->vendor_term_id = ( isset( $wp_query->queried_object->term_id ) ) ? $wp_query->queried_object->term_id : 0;
        $vendor = get_wcmp_vendor_by_term($this->vendor_term_id);
        if ((!is_tax($WCMp->taxonomy->taxonomy_name) && !$vendor) || (!$WCMp->vendor_caps->vendor_capabilities_settings('is_submit_coupon'))) {
            return;
        }

        $this->widget_start($args, $instance); 
        $coupon_args = apply_filters( 'wcmp_get_vendor_coupon_widget_list_query_args', array(
                'posts_per_page' => -1,
                'offset' => 0,
                'orderby' => 'date',
                'order' => 'DESC',
                'post_type' => 'shop_coupon',
                'author' => $vendor->id,
                'post_status' => array('publish', 'pending', 'draft', 'trash'),
                'suppress_filters' => true
            ), $vendor );
        $vendor_total_coupons = get_posts($coupon_args);
        if( empty( $vendor_total_coupons ) ) return;

        do_action($this->widget_cssclass . '_top', $vendor);
	
		$content = '<div class="wcmp_store_coupons">';
		
		foreach( $vendor_total_coupons as $vendor_coupon ) {
			$coupon = new WC_Coupon( $vendor_coupon->ID );
			
			if ( $coupon->get_date_expires() && ( current_time( 'timestamp', true ) > $coupon->get_date_expires()->getTimestamp() ) ) continue;
			

			$content .= '<span class="wcmp-store-coupon-single tips text_tip" title="' . esc_html( wc_get_coupon_type( $coupon->get_discount_type() ) ) . ': ' . esc_html( wc_format_localized_price( $coupon->get_amount() ) ) . ($coupon->get_date_expires() ? ' ' . __( 'Expiry Date: ', 'dc-woocommerce-multi-vendor' ) . $coupon->get_date_expires()->date_i18n( 'F j, Y' ) : '' ) . ' ' . $vendor_coupon->post_excerpt . '">' . $vendor_coupon->post_title . '</span>';
		}
		
		$content .= '</div>';
		
		echo $content;

		do_action($this->widget_cssclass . '_bottom', $vendor);

    	$this->widget_end($args);
    }    

}