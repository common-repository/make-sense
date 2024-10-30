<?php

class mksense_options {
    static $mkSenseTokenOpt = 'mksense_token';
    static $mkSenseAuthStrategyOpt = 'mksense_auth_strategy';
    static $mkSenseUserDataOpt = 'mksense_user_data';
    static $mkSenseEnableScriptOpt = 'mksense_enable_script';
}

class mksense_api {

    private static function is_json($string) {
        json_decode($string);
        return (json_last_error() == JSON_ERROR_NONE);
    }

    private static function save_mksense_option($name, $value) {
        if (!$value) {
            delete_option($name);
            return true;
        }
        if (get_option($name) != $value) {
            update_option($name, $value);
            return true;
        }
        add_option($name, $value);
        return true;
    }

    static function encode_URI_component($str) {
        $revert = array('%21'=>'!', '%2A'=>'*', '%27'=>"'", '%28'=>'(', '%29'=>')');
        return strtr(rawurlencode($str), $revert);
    }

    static function init_mksense_api() {
        add_action( 'rest_api_init', function () {
            register_rest_route( 'make-sense', '/token/', array (
                'methods' => 'POST',
                'callback' => array('mksense_api', 'save_mksense_token'),
                'permission_callback' => array('mksense_api', 'check_mksense_permission'),
                'args'     => array(
                    'token' => array(
                        'type'     => 'string',
                        'required' => true,
                    )
                )
            ) );
            register_rest_route( 'make-sense', '/token/', array (
                'methods' => 'DELETE',
                'callback' => array('mksense_api', 'clear_mksense_token'),
                'permission_callback' => array('mksense_api', 'check_mksense_permission')
            ) );
            register_rest_route( 'make-sense', '/strategy/', array (
                'methods' => 'POST',
                'callback' => array('mksense_api', 'save_mksense_auth_strategy'),
                'permission_callback' => array('mksense_api', 'check_mksense_permission'),
                'args'     => array(
                    'strategy' => array(
                        'type'     => 'string',
                        'required' => true,
                    )
                )
            ) );
            register_rest_route( 'make-sense', '/user/data/', array (
                'methods' => 'POST',
                'callback' => array('mksense_api', 'save_mksense_user_data'),
                'permission_callback' => array('mksense_api', 'check_mksense_permission'),
                'args'     => array(
                    'data' => array(
                        'type'     => 'string',
                        'required' => true,
                    )
                )
            ) );
            register_rest_route( 'make-sense', '/enablescript/', array (
                'methods' => 'POST',
                'callback' => array('mksense_api', 'save_mksense_enable_script'),
                'permission_callback' => array('mksense_api', 'check_mksense_permission'),
                'args'     => array(
                    'enable_script' => array(
                        'type'     => 'boolean',
                        'required' => true,
                    )
                )
            ) );
        } );
    }

    static function check_mksense_permission($request) {
        if (!$request->get_header('X-WP-Nonce')) {
            return false;
        }
        return true;
    }

    static function save_mksense_token($request) {
        $token = $request->get_param('token');
        return self::save_mksense_option(mksense_options::$mkSenseTokenOpt, $token);
    }

    static function clear_mksense_token() {
        self::save_mksense_option(mksense_options::$mkSenseTokenOpt, null);
    }

    static function get_mksense_token() {
        $token = get_option(mksense_options::$mkSenseTokenOpt);
        if ($token && self::is_json($token)) {
            return $token;
        }
        return null;
    }

    static function save_mksense_auth_strategy($request) {
        $strategy = $request->get_param('strategy');
        return self::save_mksense_option(mksense_options::$mkSenseAuthStrategyOpt, $strategy);
    }

    static function get_mksense_auth_strategy() {
        return get_option(mksense_options::$mkSenseAuthStrategyOpt);
    }

    static function save_mksense_user_data($request) {
        $data = $request->get_param('data');
        return self::save_mksense_option(mksense_options::$mkSenseUserDataOpt, $data);
    }

    static function get_mksense_user_data() {
        $userData = get_option(mksense_options::$mkSenseUserDataOpt);
        if ($userData && self::is_json($userData)) {
            return $userData;
        }
        return null;
    }

    static function save_mksense_enable_script($request) {
        $enable_script = $request->get_param('enable_script');
        return self::save_mksense_option(mksense_options::$mkSenseEnableScriptOpt, $enable_script);
    }

    static function clear_all_mksense_options() {
        $options = array(mksense_options::$mkSenseUserDataOpt, 
            mksense_options::$mkSenseAuthStrategyOpt, 
            mksense_options::$mkSenseTokenOpt, 
            mksense_options::$mkSenseEnableScriptOpt);
        foreach ($options as &$option) {
            delete_option($option);
        }
    }

}