<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use GuzzleHttp\Client;
use Psr\Http\Message\ResponseInterface;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Exception\TransferException;
use GuzzleHttp\Exception\ConnectException;
use GuzzleHttp\Exception\ClientException;

class SatuSehatService{
    protected $CI;
	private $headers;
    private $auth_url;
    private $base_url;
    private $consent_url;
    private $client_id;
    private $client_secret;
    private $token;
    private $organization_id;
	private $clients;
	private $clientCredentials;	

    public function __construct($configurations)
    {
        $this->CI =& get_instance();
        $this->CI->load->library('session');   

        $this->clients = new Client();
        // $this->auth_url = 'https://api-satusehat-dev.dto.kemkes.go.id/oauth2/v1';
        // $this->base_url = 'https://api-satusehat-dev.dto.kemkes.go.id/fhir-r4/v1';
        // $this->consent_url = 'https://api-satusehat-dev.dto.kemkes.go.id/consent/v1';
        foreach ($configurations as $key => $val){
            if (property_exists($this, $key)) {
                $this->$key = $val;
            }
        }
        $this->auth_url = 'https://api-satusehat.kemkes.go.id/oauth2/v1';
        $this->base_url = 'https://api-satusehat.kemkes.go.id/fhir-r4/v1';
        $this->consent_url = 'https://api-satusehat.kemkes.go.id/consent/v1';       
		$this->setClientCredentials();     
		$this->setHeaders();       
    }    

    public function getClientCredentials()
    {
        return $this->clientCredentials;
    }
	
	protected function setClientCredentials()
	{
        $this->clientCredentials = [
            'client_id' => $this->client_id,
            'client_secret' => $this->client_secret,
        ];
        return $this;		
	}

    protected function getToken()
    {
        if ($this->CI->session->tempdata('satu_sehat_token') === NULL)
        {
            $responseArray = json_decode($this->generateToken(), true);
            $this->CI->session->set_tempdata('satu_sehat_token', $responseArray['access_token'], 3600);        
        }        

        return 'Bearer '. $this->CI->session->tempdata('satu_sehat_token');
    }

    protected function revokeToken()
    {
        $this->CI->session->unset_userdata('satu_sehat_token');
        $responseArray = json_decode($this->generateToken(), true);
        $this->CI->session->set_userdata('satu_sehat_token', $responseArray['access_token']);            
        return 'Bearer '. $this->CI->session->satu_sehat_token;
    }    
	
	protected function generateToken()
	{
        try {
            $response = $this->clients->request('POST', $this->auth_url. '/accesstoken?grant_type=client_credentials', [
                'header'    => ['Content-Type' => 'application/x-www-form-urlencoded'],
                'form_params' => $this->clientCredentials          
                ]
            )->getBody()->getContents();
        } catch (\Exception $e) {
            $response = $e->getMessage();
        }
        return $response;            				
	}	

    protected function setHeaders()
    {
        $this->headers = [
            'Authorization' => $this->getToken(),
        ];
        return $this;
    }

    public function get($uri)
    {
        $this->headers['Content-Type'] = 'application/json; charset=utf-8';     
        try {
            $response = $this->clients->request('GET', $this->base_url.'/'.$uri,
                ['headers' => $this->headers]
            );
            if($response->getStatusCode()==200)
            {
                $result = json_encode([
                    'code' => $response->getStatusCode(),  
                    'body' => json_decode($response->getBody()->getContents(), true)                                
                ]);                
            }             
        }catch(ConnectException $e){
            $result = json_encode([
                'code' => 500,
                'body' => json_decode($e, true)                                
            ]);            
        }catch (ClientException $e) {
            $result = json_encode([
                'code' => $e->getResponse()->getStatusCode(),
                'body' => json_decode($e->getResponse()->getBody()->getContents(), true)                                
            ]);
        }
        
        return $result;
    }    

	public function post($data, $uri="")
	{
        $this->headers['Content-Type'] = 'application/json; charset=utf-8';             
        try {
            $response = $this->clients->request('POST', $this->base_url.$uri, 
                [
                    'headers' => $this->headers,
                    'body' => $data                    
                ]            
            )->getBody()->getContents();
        } catch (\Exception $e) {
            $response = $e->getMessage();
        }
        return $response;            				
	}	    

	public function put($data, $uri="")
	{
        $this->headers['Content-Type'] = 'application/json; charset=utf-8';                     
        try {
            $response = $this->clients->request('PUT', $this->base_url.$uri,  
                [
                    'headers' => $this->headers,
                    'body' => $data                    
                ]            
            )->getBody()->getContents();
        } catch (\Exception $e) {
            $response = $e->getMessage();
        }
        return $response;            				
	}	    

	public function patch($data, $uri="")
	{
        $this->headers['Content-Type'] = 'application/json-patch+json';                     
        try {
            $response = $this->clients->request('PATCH', $this->base_url.$uri,  
                [
                    'headers' => $this->headers,
                    'body' => $data                    
                ]            
            )->getBody()->getContents();
        } catch (\Exception $e) {
            $response = $e->getMessage();
        }
        return $response;            				
	}	    
}