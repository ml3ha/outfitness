<?php
    /*
        * Config for PayPal specific values
    */

    //Whether Sandbox environment is being used, Keep it true for testing
    define("SANDBOX_FLAG", true);

    //PayPal REST API endpoints
    define("SANDBOX_ENDPOINT", "https://api.sandbox.paypal.com");
    define("LIVE_ENDPOINT", "https://api.paypal.com");

    //Merchant ID
    define("MERCHANT_ID","IDHM2ATNNA6FWJW");

    //PayPal REST App SANDBOX Client Id and Client Secret
    define("SANDBOX_CLIENT_ID" , "Af-4v6mN9Wg04o3doV6D7e_nobvhdfzxyi-KT6BAgKremKfiH-b47tqRJNjpi0kLDuGkde7H6JKdoPNK");
    define("SANDBOX_CLIENT_SECRET", "EPYUzV6SCjCAaqdIFVd5-HV2OoDs6-dArg8nxXFSaF37tEYV4gXyuK9Vxu3slzaaFKWULYJNIVpWUfdv");

    //Environments -Sandbox and Production/Live
    define("SANDBOX_ENV", "sandbox");
    define("LIVE_ENV", "production");

    //PayPal REST App SANDBOX Client Id and Client Secret
    define("LIVE_CLIENT_ID" , "live_Client_Id");
    define("LIVE_CLIENT_SECRET" , "live_Client_Secret");

    //ButtonSource Tracker Code
    define("SBN_CODE","PP-DemoPortal-EC-IC-php-REST");

?>