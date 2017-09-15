<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of subscribe
 *
 * @author beloved
 */
class Subscribe extends CI_Controller {
    //put your code here
  public function index($message=null)
   {
     $someJSON = file_get_contents($this->config->item('category_all'));
		$categories = json_decode($someJSON);
        $data['category_value'] = $categories;
        $number =  $_SERVER['HTTP_MSISDN'];
        if(isset($number))
        {
            $data['number'] = $number;
        }
        if(isset($message))
        {
            $data['notify'] = $message;
        }
        $data['active_category'] = 0;
       $this->load->view("subscribe/index",$data);
   }


    public function asdfgas()
    {
        $msisdn = $this->input->post("msisdn");
        $service = $this->input->post('service_name');

        $response = file_get_contents($this->config->item('admin_url')."subscriber/subscribe/".$msisdn."/".$service);
       // $response = file_get_contents("http://127.0.0.1/cloud_mobile/subscriber/subscribe/08125278649/E-LEANING");
        if ($response){
            $data['title']= "Subscribe";
            $data['content'] = "subscribe/index";
            $data['message'] = "<div class=\"text-success bg-white padding10\"> Subscription was successful! </div>";
            $data['msisdn']  = $msisdn;
            $data['service_name'] = $service;
            $this->load->view("template", $data);
        }else
        {
            $data['msisdn']  = $msisdn;
            $data['service_name'] = $service;
            $data['message']="<div class=\"text-alert bg-white padding10\"> Subscription attempt failed! </div>";
            $data['title']= "Subscribe";
            $data['content'] = "subscribe/index";
        }
    }
    public function confirm($service_id=null)
    {
        if(isset($service_id))   //if msisdn is available
        {
            if($service_id==1)
            {
              $number = $_SERVER['HTTP_MSISDN'];
 if($this->api($number,1))
          {
              $this->index("Your daily subscription was successful");
          }
          else{
                            $this->index("Your daily subscription failed");
          }
            }
            else if($service_id==4)
            {
              $number =  $_SERVER['HTTP_MSISDN'];
                 if($this->api($number,4))
          {
              $this->index("Your weekly subscription was successful");
          }
          else{
                            $this->index("Your weekly subscription failed");
          }
            }
            
        }
        else{
            $package  = $this->input->post("package");
            $number = $this->input->post("mobile_number");
             $pre = substr($number,0,4);
            //validate length of phone number =11
            if(strlen($number) == 11)  //valid 11 digits
            {
             $arr = array("0703","0706","0803","0806","0810","0813","0814","0816","0903");
              $result = array_search($pre,$arr);
       if(!empty($result))                //verify if its an mtn line 
       {
            if($package=="Daily @₦10")
            {
                $number = "234".substr($number,1,strlen($number));
          if($this->api($number,1))
          {
              $this->index("Your daily subscription was successful");
          }
          else{
                            $this->index("Your daily subscription failed");
          }

            }
            else if($package="Weekly @₦50")
            {
                           $number = "234".substr($number,1,strlen($number));
         if($this->api($number,4))
          {
              $this->index("Your weekly subscription was successful");
          }
          else{
                            $this->index("Your weekly subscription failed");
          }
            }
       }
       else if(empty($result)){
        $this->index("mobile number must be an mtn line");
       }
            }
            else{
               $this->index("mobile number must be 11 digits");
            }
        }
   
    }
    function test()
    {
        $arr = array("0703","0706","0803","0806","0810","0813","0814","0816","0903");
       $number = "0806";
       $result = array_search($number,$arr);
       if(!empty($result))
       {
           echo "valid mtn line";
       }
       else if(empty($result)){
           echo "invalid mtn line";
       }
    }
    function api($msisdn,$service_id)
    {
        $abc = file_get_contents("http://162.242.248.139:8080/MTN_API/subscribe?msisdn=".$msisdn."&service=".$service_id."&channel=1");
      if(  substr($abc,0,1)=="1")
      {
          return false;
      }
      else{
          return true;
      }
    }

}
