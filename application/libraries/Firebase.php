<?php
require_once APPPATH . 'third_party/firebase-sdk/vendor/autoload.php';

use Kreait\Firebase\Factory;

class Firebase {
    private $auth;

    public function __construct() {
        $serviceAccountPath = APPPATH . 'third_party/firebase-sdk/service-account.json';
        $firebase = (new Factory)
            ->withServiceAccount($serviceAccountPath)
            ->create();

        $this->auth = $firebase->getAuth();
    }

    public function getAuth() {
        return $this->auth;
    }
}
