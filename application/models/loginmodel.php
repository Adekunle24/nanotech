<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Login
 *
 * @author USER
 */
class LoginModel extends CI_Model {
    
    
    function getInstance()
    {        
        return $ci=& get_instance();
    }
    //put your code here
    function validate(){
        $msisdn = $this->utility_model->format_msisdn($this->getInstance()->input->post('msisdn'));
        $con=array("msisdn" => $msisdn,"password"=>SHA1($this->getInstance()->input->post('password')));
        $query=$this->getInstance()->db->get_where("Subscribers_subscriber",$con);
        if($query->num_rows == 1)
        {
            return true;
        }
        
    }
    

    
    function tryEmail(){
        $arrayEmail=array("email"=>$this->getInstance()->input->post("email"));
        $email=$this->getInstance()->db->get_where("Subscribers_subscriber",$arrayEmail);
        if($email->num_rows()==1){
            return TRUE;
            
        }else{
            return FALSE;
        }
    }

    function tryMsisdn(){
        $arrayMsisdn=array("msisdn"=>$this->getInstance()->input->post("msisdn"));
        $email=$this->getInstance()->db->get_where("Subscribers_subscriber",$arrayMsisdn);
        if($email->num_rows()==1){
            return TRUE;

        }else{
            return FALSE;
        }
    }

    function tryUsername(){
        $arrayUsername=array("user_username"=>$this->getInstance()->input->post("username"));
        $username=$this->getInstance()->db->get_where("users",$arrayUsername);
        if($username->num_rows()==1){
            return TRUE;
        }else{
            return FALSE;
        }
    }

    function ifUserExist($username){
        $arrayUsername=array("user_username"=>$username);
        $username=$this->getInstance()->db->get_where("Subscribers_subscriber",$arrayUsername);
        if($username->num_rows()==1){
            return TRUE;
        }else{
            return FALSE;
        }
    }
    
   
}

?>
