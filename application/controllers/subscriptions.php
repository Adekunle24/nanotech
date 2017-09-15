<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Created by PhpStorm.
 * User: beloved
 * Date: 11/29/14
 * Time: 2:16 PM
 */

class subscriptions extends CI_Controller {

    function index()
    {
        $msisdn = $this->session->userdata('msisdn');
        $someJSON = file_get_contents($this->config->item('admin_url')."subscriber/subscriptionlist".$msisdn);
        if($someJSON="DB00")
        {
            $data['notfound']="DB00";
            $data['title']= "";
            $data['service_no']=0;
            $data['content'] = "subscriptions/index";
            $this->load->view("template", $data);
        }else
        {
            $someObject = json_decode($someJSON);
            $someArray = json_decode($someJSON, true);
            $data['service_no']=count($someArray);
            $data['value']=$someObject;
            $data['title']='Subscriptions';
            $data['content']='subscriptions/index.php';
            $this->load->view("template",$data);
        }

    }

} 
