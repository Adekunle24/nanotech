<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Created by PhpStorm.
 * User: beloved
 * Date: 11/26/14
 * Time: 12:18 PM
 */

class Service_content extends CI_Controller {
   public  function index(){

    $data['$']= "";
    $data['title']="";
    }

    public function get_searchqueries()
    {
$this->utility_model->search_data();

    }


} 