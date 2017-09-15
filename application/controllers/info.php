<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Created by PhpStorm.
 * User: beloved
 * Date: 11/26/14
 * Time: 12:18 PM
 */

class Info extends CI_Controller {

    function view($guid)
    {
        $someJSON = file_get_contents($this->config->item('category_all'));
        $category = json_decode($someJSON);
        $someJSON=file_get_contents($this->config->item('video_url').'/'.$guid);
         $data['category_value'] = $category;
          $data['count'] = count($category);
        if($someJSON=='CN00') //id does not exist
        { 
            $video = json_decode(file_get_contents($this->config->item('admin_url')."service/get_limit_grids"))[0];
            $data["video_item"] = $video;
            $data['title']= "Watch Video";
            $data['active_category'] = 2;
            $data['notfound'] = "yes";
        }else
        {  
            file_get_contents($this->config->item('admin_url')."content/update_views/".$guid);
            $video = json_decode($someJSON)[0];
            $data['video_item'] = $video;
            $data['title']='Video';
             $data['active_category'] = $video->category_name_id;
             $data['active_service'] = $video->service_id;
        }
       if(array_key_exists('HTTP_MSISDN',$_SERVER))
        {
 $number = $_SERVER['HTTP_MSISDN'];
        }
        else{
            $number = 2348147352099;
        }
        $showsubscribe = true;
        if(isset($number))
        {
        $user =   $response = file_get_contents("http://smsgw.ly0.co/service_content/get_user/".$number);
          $user = json_decode($user);
		   #$user = json_encode(array(array("service_id"=>"1","expiry_time"=>"2017-08-10 22:57:49")));
         #$user = json_decode($user);
        if(!$user)  #user does not exist
        {
        $message = "You have no subscription on this mobile number";
        }
        else{ //user exist
         $any = 0;
        foreach($user as $row)
        {
           if($row->service_id==1)  //check footballblitz daily subscription
           {
            if(!$this->is_expired($row->expiry_time))         //validate subscription status
            {
            $message = "1";
       $data['display_video'] = "<div class='playing-video'><video width='100%'  controls poster='".$this->config->item('image_url').$video->picture_path."'><source src='".$this->config->item('load_video_url').$video->video_path."' controls autoplay type='video/mp4'>  Sorry, your browser does not support HTML5 video</video></div>";
           $showsubscribe = false;
           $any = $any+1;
           break;
            }
            else{               //expired subscription
            if($any==0)
            {
                    $message = "Your Footballblitz daily subscription has expired";  
            }
            }
           }
           else if($row->service_id==4)   //check footballblitz weekly subscription
           {
 if(!$this->is_expired($row->expiry_time))         //validate subscription status
            {
                  $message = "1";
       $data['display_video'] = "<div class='playing-video'><video width='100%'  controls poster=".$this->config->item('image_url').$video->picture_path."><source src=".$this->config->item('load_video_url').$video->video_path." controls autoplay type='video/mp4'>  Sorry, your browser does not support HTML5 video</video></div>";
           $showsubscribe = false;
           $any = $any+1;
           break;
            }
            else{      //expired subscription
            if($any==0)
            {
 $message = "Your Footballblitz weekly subscription has expired"; 
            }
            }
           }
            else {              //user exist but for other services
          $message = "Your mobile number is not subscribed for Footballblitz services";   
        }
        }//end foreach
        }
        }
        else{
            $message = "Your mobile number could not be verified";
            #if msisdn is not retrieved
        }
        if($showsubscribe)
        {
               $subscribe = "<td width='100%' align='center' style='background-color:#a80d1f;'><a href='".site_url('subscribe')."'><i class='fa fa-sign-in'></i><br>Click here to Subscribe</a></td>";
        }
        if(isset($subscribe))
        {
        $data['subscribe'] = $subscribe;
        }
        $data['message'] = $message;

         //content for more videos
            if(isset($data['notfound']))
            {
              
            $moreVideos = file_get_contents($this->config->item('admin_url')."service/service_content_for_info/".$video->service_id);
            }
            else{
             $moreVideos = file_get_contents($this->config->item('admin_url')."service/service_content_for_info/".$video->service_id."/".$guid);
            }
          
            $moreVideos = json_decode($moreVideos);
			if($moreVideos!="")
			{
			$moreNew[] = $moreVideos;
			}
	if(isset($moreNew))
	{
		shuffle($moreNew);
		$data['moreVideos'] =  json_encode($moreNew);
	}
    //end content for more videos
           $this->load->view("Info/index",$data);
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
} 
