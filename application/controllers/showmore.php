<?php

/**
 * Created by PhpStorm.
 * User: BELOVED
 * Date: 15/11/2016
 * Time: 23:44
 */
class Showmore extends CI_Controller
{
 
    function view($service,$servicename,$page=0){ 
      $serviceJSON = file_get_contents($this->config->item('service_all'));
        $allservice = json_decode($serviceJSON);
        $someJSON = file_get_contents($this->config->item('service_content').$service."/".$page);
		$mostPopular = file_get_contents($this->config->item('get_most_popular').$page);
		$data['most_popular'] = json_decode($mostPopular);
        $category = json_decode($someJSON);
        $data['category_value'] = $allservice;
        $data['count'] = count($allservice);
        $data['count_custom'] = count($category);
       $data['value'] = $category;
        $data['service'] = $servicename;
        $data['title']= ucfirst($servicename);
        $data['content']= "more/index";
//Pagination

$config['first_link'] = "First";
$config['base_url'] = $this->config->item('base_url')."showmore/view/".$service."/".$servicename;
$config['total_rows'] =file_get_contents($this->config->item('service_content_count').$service);
$config['per_page'] = 10;
 $config['uri_segment'] = 5;
$this->pagination->initialize($config);
$data['pagination'] =  $this->pagination->create_links();

//End Pagination
  $this->load->view('template',$data);
    }
}