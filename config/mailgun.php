<?php

return [

    /*
     * API endpoint settings.
     *
     */
    'api' => [
        'endpoint' => 'api.mailgun.net',
        'version' => 'v3',
        'ssl' => true
    ],

    /*
     * Domain name registered with Mailgun
     *
     */
    'domain' => 'sandbox5dce52b7fbcd469e87b5d48c328a35a4.mailgun.org',

    /*
     * Mailgun (private) API key
     *
     */
    'api_key' => 'key-8a016c834a7c85bb1d6580d9b36a39dd',

    /*
     * Mailgun public API key
     *
     */
    'public_api_key' => 'pubkey-8f12e60a7fecf0356ad5b3db8039bdae',

    /*
     * You may wish for all e-mails sent with Mailgun to be sent from
     * the same address. Here, you may specify a name and address that is
     * used globally for all e-mails that are sent by this application through Mailgun.
     *
     */
    'from' => [
        'address' => 'no-reply@mahasiswacerdas.bazisjakarta.id',
        'name' => 'Mahasiswa Cerdas Bazis Jakarta'
    ],

    /*
     * Global reply-to e-mail address
     *
     */
    'reply_to' => '',

    /*
     * Force the from address
     *
     * When your `from` e-mail address is not from the domain specified some
     * e-mail clients (Outlook) tend to display the from address incorrectly
     * By enabling this setting, Mailgun will force the `from` address so the
     * from address will be displayed correctly in all e-mail clients.
     *
     * WARNING:
     * This parameter is not documented in the Mailgun documentation
     * because if enabled, Mailgun is not able to handle soft bounces
     *
     */
    'force_from_address' => false,

    /*
     * Testing
     *
     * Catch All address
     *
     * Specify an email address that receives all emails send with Mailgun
     * This email address will overwrite all email addresses within messages
     */
    'catch_all' => "",

    /*
     * Testing
     *
     * Mailgun's testmode
     *
     * Send messages in test mode by setting this setting to true.
     * When you do this, Mailgun will accept the message but will
     * not send it. This is useful for testing purposes.
     *
     * Note: Mailgun DOES charge your account for messages sent in test mode.
     */
    'testmode' => false
];
