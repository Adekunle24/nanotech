<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of home
 *
 * @author beloved
 */
class Home extends CI_Controller {
    
    //put your code here
    
    public function index()
            {
                #if($this->session->userdata('is_logged_in'))
                #{
                #    redirect("dashboard","location",302);
                #}
                $data['title']="HOME";
               // $data['content']="home/index.php";
                $this->load->view("home/index.php",$data);

            }
    function redis()
    {
           //Connecting to Redis server on localhost 
   $redis = new Redis(); 
   $redis->connect('127.0.0.1', 6379); 
   echo "Connection to server sucessfully"; 
    }
    function action()
    {
       
    }
    
}
