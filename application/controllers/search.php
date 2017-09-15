<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Search extends CI_Controller {
function view($query="",$page=0)
{
  $query = $this->input->get('keyword');
  $page = $this->input->get("per_page");
  if(!isset($page))
  {
$page = 0;
  }
$someJSON = file_get_contents($this->config->item('category_all'));
		$categories = json_decode($someJSON);
		$query = str_replace(" ","%20",$query);
				  $searchCount = file_get_contents($this->config->item('admin_url')."service/totalsearch/".$query);
				  if($searchCount>0)
				  {
  $mostRecent = file_get_contents($this->config->item('admin_url')."service/search/".$query."/".$page);
				  }
				  else if($searchCount==0)
				  {
					    $mostRecent = file_get_contents($this->config->item('admin_url')."service/category_content/2/0");
				  }
  $category = 2;
  	$data['category_value'] = $category;
  		$servicelist = file_get_contents($this->config->item('admin_url')."service/servicelist/".$category);
		$data['services'] = json_decode($servicelist);
		$data['recent'] = json_decode($mostRecent);
		$data['category_value'] = $categories;
		$data['count'] = count($categories);
        $data['title']= "Dashboard";
		$data['active_category'] = $category;
		$data['query_count'] = $searchCount;
		$query = str_replace("%20"," ",$query);
		$data['query'] = $query;
$this->utility_model->log_query($query);
 $this->load->view('search/index',$data);
}
public function index($category=2,$page=0)
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
		$mostRecent = file_get_contents($this->config->item('admin_url')."service/category_content/".$category."/".$page);
		$servicelist = file_get_contents($this->config->item('admin_url')."service/servicelist/".$category);
		$data['services'] = json_decode($servicelist);
		$data['recent'] = json_decode($mostRecent);
		$data['category_value'] = $categories;
		$data['count'] = count($categories);
        $data['title']= "Dashboard";
		$data['active_category'] = $category;
		$data['active_service'] = $data['services'][0]->id;
		$data['active_category'] = $category;
		$data['view_mode'] = 1;
   $this->load->view('dashboard/index',$data);
	}
function ajax_search_feed($query,$page)
{
  $mostRecent = file_get_contents($this->config->item('admin_url')."service/search/".$query."/".$page."/5");
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
		$category = 2;
				$mostRecent = file_get_contents($this->config->item('admin_url')."service/category_content/".$category."/".$page);
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
}
}