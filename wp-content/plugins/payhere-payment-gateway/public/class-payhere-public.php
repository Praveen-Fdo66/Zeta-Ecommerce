<?php
/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://payhere.lk
 * @since      2.0.0
 *
 * @package    PayHere
 * @subpackage PayHere/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    PayHere
 * @subpackage PayHere/public
 * @author     Your Name <dilshan@payhere.lk>
 */
class PayHere_Public {


	/**
	 * The ID of this plugin.
	 *
	 * @since    2.0.0
	 * @access   private
	 * @var      string $payhere The ID of this plugin.
	 */
	private $payhere;

	/**
	 * The version of this plugin.
	 *
	 * @since    2.0.0
	 * @access   private
	 * @var      string $version The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @param string $payhere The name of the plugin.
	 * @param string $version The version of this plugin.
	 * @since    2.0.0
	 */
	public function __construct( $payhere, $version ) {

		$this->payhere = $payhere;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    2.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in PayHere_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The PayHere_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->payhere . '_checkout', plugin_dir_url( __FILE__ ) . 'css/payhere-checkout-styles.css', array(), $this->version, 'all' );
		wp_enqueue_style( $this->payhere, plugin_dir_url( __FILE__ ) . 'css/payhere-ipg-public.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the View Saved url in my-account page.
	 *
	 * @since    2.0.0
	 */
	public function saved_card_endpoint() {
		add_rewrite_endpoint( 'saved-cards', EP_ROOT | EP_PAGES );
	}

	/**
	 * Register query variables for the View Saved url in my-account page.
	 *
	 * @param array $vars an array of query variables.
	 *
	 * @since    2.0.0
	 */
	public function saved_cards_query_vars( $vars ) {
		$vars[] = 'saved-cards';
		return $vars;
	}

	/**
	 * Register name for the View Saved url in my-account page.
	 *
	 * @param array $items an array of menu araay.
	 *
	 * @since    2.0.0
	 */
	public function saved_card_link_my_account( $items ) {
		$customer_token = get_user_meta( get_current_user_id(), 'payhere_customer_token', true );
		$_items         = array();
		foreach ( $items as $key => $val ) {
			if ( ! empty( $customer_token ) ) {
				if ( 'edit-address' === $key ) {
					$_items['saved-cards'] = 'Saved Cards';
				}
			}
			$_items[ $key ] = $val;
		}
		return $_items;
	}

	/**
	 * Return the contnet of the saved card window
	 *
	 * @since    2.0.0
	 */
	public function saved_card_content() {
		$customer_token = get_user_meta( get_current_user_id(), 'payhere_customer_token', true );
		if ( ! empty( $customer_token ) ) {
			$_card_info = get_user_meta( get_current_user_id(), 'payhere_customer_data', true );
			$card_info  = json_decode( $_card_info );

			wp_enqueue_script( 'payhere-my-account', plugin_dir_url( __FILE__ ) . '/js/payhere-my-account.js', array( 'jquery' ), '2.0.0', true );
			wp_localize_script(
				'payhere-my-account',
				'payhere_data',
				array(
					'admin_ajax' => admin_url( 'admin-ajax.php' ),
					'my_account' => get_permalink( wc_get_page_id( 'myaccount' ) ),
				)
			);

			include plugin_dir_path( __FILE__ ) . 'partials/remove-card.php';
		}
	}

	/**
	 * Ajax response for remove saved payment method.
	 */
	public function remove_saved_method() {

		$user_id = get_current_user_id();
		delete_user_meta( $user_id, 'payhere_customer_token' );
		delete_user_meta( $user_id, 'payhere_customer_data' );
		echo wp_json_encode(
			array(
				'type'    => 'OK',
				'message' => 'Saved card removed successfully.',
			)
		);
		exit();
	}


	/**
	 * Register the JavaScript for the public-facing side of the site.
	 *
	 * @since    2.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in PayHere_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The PayHere_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

	}

}
