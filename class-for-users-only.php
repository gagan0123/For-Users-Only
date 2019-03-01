<?php
/**
 * Users Only Class
 *
 * @package     For_Users_Only
 * @author      Gagan <me@gagan.pro>
 */

/**
 * Description of Users_Only class
 *
 * @package     Users_Only
 * @author      Gagan <me@gagan.pro>
 */
class For_Users_Only {

	/**
	 * Instance of this class.
	 *
	 * @since 1.0
	 *
	 * @var object
	 */
	protected static $instance = null;

	/**
	 * Constructor for the class
	 *
	 * @since 1.0
	 */
	public function __construct() {
		if ( ! is_admin() ) {
			add_action( 'init', array( $this, 'login_check' ) );
		}
	}

	/**
	 * Checks if the user is logged in, if not, then redirects the user to the login page.
	 *
	 * @since 1.0
	 *
	 * @return void
	 */
	public function login_check() {
		// Making sure to load the check only on the frontend that is accessible directly.
		if ( ! is_user_logged_in() && ! $this->is_login_page() ) {
			wp_safe_redirect( wp_login_url( $this->current_page_url() ) );
		}
	}

	/**
	 * Return whether the current page is login page or not.
	 *
	 * @since 1.0
	 *
	 * @return bool TRUE if its the login page, FALSE if its not the login page.
	 */
	public function is_login_page() {
		return in_array( $GLOBALS['pagenow'], array( 'wp-login.php', 'wp-register.php' ), true );
	}

	/**
	 * Returns the current page's URL.
	 *
	 * @since 1.0
	 *
	 * @return string Current URL.
	 */
	public function current_page_url() {
		$page_url = 'http';
		$https    = filter_input( INPUT_SERVER, 'HTTPS', FILTER_SANITIZE_STRING );
		if ( $https ) {
			if ( 'on' === $https ) {
				$page_url .= 's';
			}
		}
		$page_url   .= '://';
		$server_port = filter_input( INPUT_SERVER, 'SERVER_PORT', FILTER_SANITIZE_STRING );
		$request_uri = filter_input( INPUT_SERVER, 'REQUEST_URI', FILTER_SANITIZE_STRING );
		$server_name = filter_input( INPUT_SERVER, 'SERVER_NAME', FILTER_SANITIZE_STRING );
		$server_uri  = filter_input( INPUT_SERVER, 'SERVER_NAME', FILTER_SANITIZE_STRING );
		if ( '80' !== $server_port ) {
			$page_url .= $server_name . ':' . $server_port . $request_uri;
		} else {
			$page_url .= $server_name . $server_uri;
		}
		return $page_url;
	}

	/**
	 * Return an instance of this class.
	 *
	 * @since 1.0
	 *
	 * @return For_Users_Only A single instance of this class.
	 */
	public static function get_instance() {

		// If the single instance hasn't been set, set it now.
		if ( null === self::$instance ) {
			self::$instance = new self();
		}

		return self::$instance;
	}

}
