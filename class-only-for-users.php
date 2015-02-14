<?php

/**
 * Only For Users Class
 *
 * @package     Only_For_Users
 * @author      Gagan <me@gagan.pro>
 */

/**
 * Description of Only_For_Users
 *
 * @package     Only_For_Users
 * @author      Gagan <me@gagan.pro>
 */
class Only_For_Users {

    /**
     * Instance of this class.
     *
     * @since 1.0
     * 
     * @var object
     */
    protected static $instance = null;

    /**
     * Return an instance of this class.
     *
     * @since 1.0
     * 
     * @return object A single instance of this class.
     */
    public static function get_instance() {

        // If the single instance hasn't been set, set it now.
        if (null == self::$instance) {
            self::$instance = new self;
        }

        return self::$instance;
    }

}
