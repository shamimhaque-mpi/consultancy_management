<?php
if (! function_exists('encrypt_password')) {
    function encrypt_password($password) {
        // Store the cipher method
        $ciphering = "AES-128-CTR";
        $iv_length = openssl_cipher_iv_length($ciphering);
        $encryption_iv = '1234567891011121';
        $encryption_key = "HossainEncryption";
        $options = 0;
        $encryption = openssl_encrypt($password, $ciphering,
            $encryption_key, $options, $encryption_iv);
        return $encryption;
    }
}


if (! function_exists('decrypt_password')) {
    function decrypt_password($decrypt_pass) {
        // Store the cipher method
        $ciphering = "AES-128-CTR";
        $iv_length = openssl_cipher_iv_length($ciphering);
        $decryption_iv = '1234567891011121';
        $decryption_key = "HossainEncryption";
        $options = 0;
        $decryption=openssl_decrypt ($decrypt_pass, $ciphering, 
        $decryption_key, $options, $decryption_iv);
        return $decryption;
    }
}


if(!function_exists('ck_menu')){
    function ck_menu($type=null, $key=null){

        $user    = \Auth::guard('admin')->user();
        $default = \App\Models\Roll::where('type', $user->admin_type)->first();
        $custom  = \App\Models\MenuPermission::where('user_id', $user->id)->first();

        $permission = ($custom ? $custom : $default);
        $menus      = json_decode(($permission->menu ?? ''), true);
        $submenus   = json_decode(($permission->submenu ?? ''), true);

        if($type == 'menu' && in_array($key, $menus)){
            return true;
        }

        if($type == 'submenu' && in_array($key, $submenus)){
            return true;
        }

        return false;
    } 
}

if(!function_exists('ck_route')){
    function ck_route($routes=[]){
        foreach ($routes as $route) {
            if(Route::has($route) && Route::is($route)){
                return true;
            }
        }
        return false;
    }
}

if(!function_exists('ck_uri')){
    function ck_uri($uris=[]){
        foreach ($uris as $uri) {
            if(Request::is($uri)){
                return true;
            }
        }
        return false;
    }
}

if(!function_exists('admin')){
    function admin(){
        return \Auth::guard('admin')->user();
    }
}

if(!function_exists('settins')){
    function settings(){
        return \App\Models\Setting::first();
    }
}

