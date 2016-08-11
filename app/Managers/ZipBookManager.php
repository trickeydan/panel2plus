<?php

namespace Panel\Managers;

use Eljam\GuzzleJwt\JwtMiddleware;
use Eljam\GuzzleJwt\Manager\JwtManager;
use Eljam\GuzzleJwt\Strategy\Auth\QueryAuthStrategy;
use GuzzleHttp\Client;
use GuzzleHttp\HandlerStack;


class ZipBookManager
{

    protected $client;

    public function __construct()
    {
        //Create your auth strategy
        $authStrategy = new QueryAuthStrategy([
            'username' => 'no-reply@trickey.xyz',
            'password' => 'passwordpassword',
            'query_fields' => ['email', 'password'],
        ]);

        $baseUri = 'https://api.zipbooks.com/v1/';

        // Create authClient
        $authClient = new Client(['base_uri' => $baseUri]);

        //Create the JwtManager
        $jwtManager = new JwtManager(
            $authClient,
            $authStrategy,
            [
                'token_url' => 'auth/login',
            ]
        );

        // Create a HandlerStack
        $stack = HandlerStack::create();

        // Add middleware
        $stack->push(new JwtMiddleware($jwtManager));

        $this->client = new Client(['handler' => $stack, 'base_uri' => $baseUri]);

    }

    public function getClient($id){
         try {
            $response = $this->client->get("customers/$id");
            return \GuzzleHttp\json_decode($response->getBody()->getContents());
        } catch (TransferException $e) {
            throw $e;
        }
    }

    public function setClient($id,$attr){
        try {
            $response = $this->client->put("customers/$id",['form_params' => $attr]);

            return $response->getStatusCode() >= 200 && $response->getStatusCode() < 300;

        } catch (TransferException $e) {
            throw $e;
        }
    }
}