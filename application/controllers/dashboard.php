<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/dashboard
	 *	- or -
	 * 		http://example.com/index.php/dashboard/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/dashboard/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
public function index($category=0,$page=0)
	{
		$cat = $this->input->get('category');
		$pag = $this->input->get('per_page');
		if(isset($cat)&&$cat!=null)
		{
			$category = $cat;
		}
		if(isset($pag))
		{
			$page = $pag;
		}
		$someJSON = file_get_contents($this->config->item('category_all'));
		$categories = json_decode($someJSON);
		if($category==0)
		{
		$mostRecent = file_get_contents($this->config->item('admin_url')."service/fetch_recent/0/10");
		}
		else{
			echo "one";
					$mostRecent = file_get_contents($this->config->item('admin_url')."service/category_content/".$category."/".$page);
		}
		if($category==0)
		{	
				$servicelist = file_get_contents($this->config->item('admin_url')."service/servicelist/2");
		}
		else{
		$servicelist = file_get_contents($this->config->item('admin_url')."service/servicelist/".$category);
		}
		$data['services'] = json_decode($servicelist);
		$data['recent'] = json_decode($mostRecent);
		$data['category_value'] = $categories;
		$data['count'] = count($categories);
        $data['title']= "Dashboard";
		$data['active_service'] = 0;
		$data['active_category'] = $category;
		$data['view_mode'] = 1;
    $this->load->view('dashboard/index',$data);
	}

public function view($service=11,$page=0)
	{
		$ser = $this->input->get('service');	
		$pag = $this->input->get('per_page');
		if(isset($ser)&&$ser!=null)
		{
			$service = $ser;
		}
		if(isset($pag))
		{
			$page = $pag;
		}
		$someJSON = file_get_contents($this->config->item('category_all'));
		$categories = json_decode($someJSON);
		$mostRecent = file_get_contents($this->config->item('admin_url')."service/service_content/".$service."/".$page);
		$data['recent'] = json_decode($mostRecent);
		$category = $data['recent'][0]->category_name_id;
		$servicelist = file_get_contents($this->config->item('admin_url')."service/servicelist/".$category);
		$data['services'] = json_decode($servicelist);
		
		$data['category_value'] = $categories;
		$data['count'] = count($categories);
        $data['title']= "Dashboard";
		$data['active_category'] = $category;
		$data['active_service'] = $service;
		$data['view_mode'] = 2;
    $this->load->view('dashboard/index',$data);
	}
	function ajax_category_feed($category,$page)
{
		$mostRecent = file_get_contents($this->config->item('admin_url')."service/category_content/".$category."/".$page."/5");
		$data = json_decode($mostRecent);
			if($data!="")
			{
			$contents[] = $data;
			}
	if(isset($contents))
	{
		shuffle($contents);
		echo json_encode($contents);
		return;
	}
	else{
			$mostRecent = file_get_contents($this->config->item('admin_url')."service/fetch_recent/".$page);
		$data = json_decode($mostRecent);
			if($data!="")
			{
			$contents[] = $data;
			}
	if(isset($contents))
	{
		shuffle($contents);
		echo json_encode($contents);
	}
		else{
		echo 0;
		return;	
	}
	}
}
	function ajax_default_feed($category,$page)
{
		$mostRecent = file_get_contents($this->config->item('admin_url')."service/fetch_recent/".$page."/5");
		$data = json_decode($mostRecent);
			if($data!="")
			{
			$contents[] = $data;
			}
	if(isset($contents))
	{
		shuffle($contents);
		echo json_encode($contents);
		return;
	}
	else{
		echo 0;
		return;	
	}
}
function ajax_service_feed($service,$page)
{
		$mostRecent = file_get_contents($this->config->item('admin_url')."service/service_content/".$service."/".$page."/5");
		$data = json_decode($mostRecent);
			if($data!="")
			{
			$contents[] = $data;
			}
	if(isset($contents))
	{
		shuffle($contents);
		echo json_encode($contents);
	}
	else{
		$mostRecent = file_get_contents($this->config->item('admin_url')."service/fetch_recent/".$page);
		$data = json_decode($mostRecent);
			if($data!="")
			{
			$contents[] = $data;
			}
	if(isset($contents))
	{
		shuffle($contents);
		echo json_encode($contents);
	}
		else{
		echo 0;
		return;	
	}
	}
}
function header()
{
	print_r($_SERVER);
}



	function category()
	{

		$someJSON = file_get_contents($this->config->item('service_all'));

//		if(!empty($msisdn)){
//
//			$response = file_get_contents($this->config->item('admin_url')."subscriber/subscribe/".$msisdn."/".$service);
//			$data['message'] = "<div class=\"text-success bg-white padding10\"> ".ucwords($service)." subscription was successful! </div>";
//		}
		$someObject = json_decode($someJSON);
		$someArray = json_decode($someJSON, true);
		//$data['category_name']=$category_name;
		$data['service_no']=count($someArray);
		$data['value']=$someObject;
		//$data['msisdn']  = $msisdn;
		$data['title']= "Subscribe";
		$data['content'] = "service_desc/index";
		$this->load->view("template", $data);
		//  }

	}
function is_expired($time)
{
	 date_default_timezone_set('Africa/Lagos');
$date =	(new DateTime())->setTime(0,0)->format('Y-m-d h:i:s a');;
 if($time<$date)
 {
	return true;
 }
 else{
return false;
 }
}

function redis()
{
	 //Connecting to Redis server on localhost 
	 try{
   $redis = new Redis(); 
   $redis->connect('127.0.0.1', 6379); 
   echo "Connection to server sucessfully"; 
   //check whether server is running or not 
   echo "Server is running: ".$redis->ping(); 

	 }
	 catch(Exception $e)
	 {
		 echo "hello";
	 }
}




	  function timeline($time)
    {
        date_default_timezone_set("Africa/Lagos");
$d=strtotime("now");
$datetime = date("Y-m-d h:i:sa", $d);
$datetime = new DateTime($datetime);
$datetime2 = new DateTime($time);
$interval = $datetime->diff($datetime2);
#echo $interval->format("%a days %H:%I:%S");
$hour =  $interval->format("%H");
$minutes = $interval->format("%I");
$seconds = $interval->format("%S");
$days = $interval->format("%a");
#return $interval->format("%a days %H:%I:%S");
 if($days > 0)
{
    if($days==1)
    {
        return "a day ago";
    }
    else if($days > 1)
    {
        if($hour>12)
        {
             return $days." days ago at ".($hour-12).":".$minutes." PM";
        }
        else 
        {
        return $days." days ago at ".$hour.":".$minutes." AM";
        }
    }
}

if($hour<24 && $hour > 0)
{
    if($hour>1)
    {
return  $hour." hours ago";
    }
    else if($hour==1){
        return  "1 hour ".$minutes." minutes ago";
    }
}
else if($minutes <60 && $minutes > 0)
{
    return $minutes." minutes ago";
}
else if($seconds > 0 && $seconds <60)
{
    return $seconds." seconds ago";
}
    }
}

/* End of file dashboard.php */
/* Location: ./application/controllers/dashboard.php */
