<?php

/**
 * Created by PhpStorm.
 * User: info
 * Date: 04/04/17
 * Time: 9:41 AM
 */

namespace App;


use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;

class BaseClient
{

    protected $client;
    protected $oAuthServer;
    protected $baseUrl;

    public function __construct($baseUrl, $oAuthServer)
    {

        $this->baseUrl = $baseUrl;
        $this->oAuthServer = $oAuthServer;

        $this->acquireToken();
        $this->client = new Client(['headers' => [
            'Accept' => 'application/json',
            'Content-Type' => 'application/json',
            'X-Requested-With' => 'XMLHttpRequest',
            'Access-Control-Allow-Origin' => 'http://localhost',
            'Authorization' => cache('ADMIN_SSO_TOKEN')]]);
    }

    public function request($method, $uri = '', array $options = [])
    {

        $uri = $this->baseUrl . $uri;

        try {
            return $response =  $this->client->request($method, $uri, $options);
        } catch (ClientException $e) {
            if (401 == $e->getCode()) {

                $this->acquireToken();

                $options['headers']['Authorization'] = cache('ADMIN_SSO_TOKEN');

                try {
                    return $this->client->request($method, $uri, $options);
                } catch (ClientException $e) {

                    return $e->getResponse();
                }
            } else {

                return $e->getResponse();
            }
        }
    }

    public function acquireToken()
    {

        $clientId = cache('USERNAME');
        $clientSecret = cache('PASSWORD');
        $grantType = "client_credentials";
        $_SESSION['USERNAME']=cache('USERNAME');

        try {

            $this->client = new Client();

            //            $r = $this->client->request('POST', $this->oAuthServer . 'oauth/login', [
            $r = $this->client->request('POST', $this->oAuthServer . '/auth/login', [
                'json' => [
                    'username' => $clientId,
                    'password' => $clientSecret
                ],
                'headers' => [
                    'Accept' => 'application/json',
                    'Content-Type' => 'application/json',
                    'X-Requested-With' => 'XMLHttpRequest',
                    'Access-Control-Allow-Origin' => 'http://localhost'

                ]
            ]);
            $response  = json_decode($r->getBody()->getContents());

            if ($response->status===true){
                cache(['ADMIN_SSO_TOKEN' => $response->data->token_type.' '.$response->data->access_token]);
            }
        } catch (\Exception $e) {
        }
    }
}
