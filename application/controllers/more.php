<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: beloved
 * Date: 11/23/14
 * Time: 7:59 PM
 */

class More extends CI_Controller  {

  public function index()
    {
       // $is_logged_in=$this->session->userdata("is_logged_in");
       // $this->utility_model->is_logged_in($is_logged_in);
        $data['title']= "Dashboard";
        $data['content'] = "read/index";
        $this->load->view("template", $data);

    }

    public function service($category_name)
    {


       //$category_name = urldecode($category_name);
       // $is_logged_in=$this->session->userdata("is_logged_in");
       // $this->utility_model->is_logged_in($is_logged_in);
        // JSON string
        //$someJSON = '[{"name":"Jonathan Suh","gender":"male"},{"name":"William Philbin","gender":"male"},{"name":"Allison McKinnery","gender":"female"}]';
        $url = $this->config->item('admin_url')."service/serviceCategory/".$category_name;

        $someJSON = file_get_contents($url);//file_get_contents($this->config->item('admin_url')."service/serviceCategory/".$category_name);
        /* if ($someJSON=='IC00'){
            $data['notfound']="IC00";
            $data['title']= "";
            $data['service_no']=0;
            $data['category_name']=$category_name;
            $data['content'] = "service_desc/index";
            $this->load->view("template", $data);

        }else{
        // Convert JSON string to Array
        //$someArray = json_decode($someJSON, true);
        //print_r($someArray);
        //echo $someArray[0]["name"]; // Access Array data
        /*
        foreach ($someArray as $key => $value) {
            echo $value["name"] . ", " . $value["gender"] . "<br>";
                }
         */
        // Convert JSON string to Object
        $msisdn = $this->input->post("msisdn");
        $service = $this->input->post('service_name');

        if(!empty($msisdn)){

            $response = file_get_contents($this->config->item('admin_url')."subscriber/subscribe/".$msisdn."/".$service);
            $data['message'] = "<div class=\"text-success bg-white padding10\"> ".ucwords($service)." subscription was successful! </div>";
        }
        $someObject = json_decode($someJSON);
        $someArray = json_decode($someJSON, true);
        $data['category_name']=urldecode($category_name);
        $data['service_no']=count($someArray);
        $data['value']=$someObject;
        $data['msisdn']  = $msisdn;
        $data['title']= "Subscribe";
        $data['content'] = "service_desc/index";
        $this->load->view("template", $data);
      //  }

    }


} 