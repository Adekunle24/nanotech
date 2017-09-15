<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');




class UserModel extends CI_Model{

    function getInstance()
    {
        
        return $ci=& get_instance();
    }
    
    function getIpAddress() {
		return (empty($_SERVER['HTTP_CLIENT_IP'])?(empty($_SERVER['HTTP_X_FORWARDED_FOR'])? $_SERVER['REMOTE_ADDR']:$_SERVER['HTTP_X_FORWARDED_FOR']):$_SERVER['HTTP_CLIENT_IP']);
	}//end function getIpAddress
    
     function getBrowser()
    {
        return $_SERVER['HTTP_USER_AGENT'];
    }
    
    
    function createRecord()
    {
        $msisdn = $this->utility_model->format_msisdn($this->getInstance()->input->post('msisdn'));
        $password = sha1($this->getInstance()->input->post('password'));
        $url=$this->config->item('admin_url')."subscriber/create_subscriber/?msisdn=".$msisdn."&email=".$this->getInstance()->input->post('email')."&status=1&password=".$password;
        $query=file_get_contents($url);
        return $query;
        
    }
    function retrieveRecord($id)
    {
        $id=array("id"=>$id);
        $query = $this->db->get_where('Subscribers_subscriber',$id);
        
        if($query->num_rows()==1)
        {
            return $query;
        }else
        {
            return false;
        }
    }

    function delete($id){
        $dat=array("id"=>$id);
        $query = $this->db->get_where('users',$dat);
        if($query->num_rows==1){           
            $this->getInstance()->db->where("id",$id);
            $this->getInstance()->db->delete("users");
            return true;            
        }else{        
            return false;
        }      
        
    }

    function reportCreation($user_id){
        $data = array(
            'report_user_id' => $user_id,
            'reporter_name' => $this->getInstance()->input->post('report_name'),
            'reporter_email' => $this->getInstance()->input->post('report_email'),
            'report_title' => $this->getInstance()->input->post('report_title') ,
            'report_summary' => $this->getInstance()->input->post('report_summary'),
            'report_upload_path' => $this->getInstance()->session->userdata('file_name')
        );
        $query=$this->getInstance()->db->insert('report_tb', $data);
        if($query){
            return true;
        }else{
            return false;
        }

    }
    

    
    
}

?>