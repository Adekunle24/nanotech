<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Class1 short summary.
 *
 * Class1 description.
 *
 * @version 1.0
 * @author Beloved
 */
class Logout extends CI_Controller
{
    
    function index(){
       switch($this->session->userdata("logoutType"))
       {
       case 'facebook':
           $this->session->sess_destroy();
           redirect("logout/deleteSession","location",301);           
         //  redirect($this->session->userdata("logout"),"location",301);           
           break;
       case  'twitter': 
           $this->session->sess_destroy();
           redirect("logout/deleteSession","location",301);
       default:
           redirect("logout/deleteSession","location",301);
           break;
       }
       
    }
    function deleteSession(){
        $this->session->sess_destroy();    
        redirect("signin","location",301);
    }
    
}
