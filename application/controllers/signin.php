<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Created by PhpStorm.
 * User: beloved
 * Date: 11/20/14
 * Time: 8:15 PM
 */
require APPPATH.'/libraries/facebook.php';

class signin extends CI_Controller {

    function index()
    {
        $facebook = new Facebook(array(
            'appId'  => $this->config->item('App_ID'),
            'secret' => $this->config->item('App_Secret'),
            'cookie' => true
        ));

        //   $url=$this->uri->uri_string();

        $data['App_id']=$this->config->item('App_ID');
        $data['App_Secret']=$this->config->item('App_Secret');
        $data['callback_url']=$this->config->item('callback_url');
        if($this->session->userdata('is_logged_in'))
        {
            redirect("dashboard","location",302);
        }
        $data['title']='';
        $data['content']='signin/index';
        $this->load->view("template",$data);
    }


    function login(){
        $query = $this->loginmodel->validate();
        $msisdn = $this->utility_model->format_msisdn($this->input->post("msisdn"));
        if($query){
            $con=array("msisdn"=> $msisdn);
            $setquery = $this->db->get_where("Subscribers_subscriber",$con);
            if($setquery->num_rows() != 0)
            {
                $_SESSION['in']="yes";
                $row=$setquery->row();
                $data=array(
                    "id"=>$row->id,
                    "status"=>1,
                    "msisdn"=>$row->msisdn,
                    "is_logged_in" =>true
                );
                $this->session->set_userdata($data);
               // $this->session->set_userdata("is_logged_in",true);
                //  $this->session->set_userdata("status","verified");
                //   log_message("info","Username->>>".$row->user_username."Successfully Signed in");
                $url = 'dashboard';
                redirect($url,"location",302);
            }
           // $url_history=$this->session->userdata("home_url");
           // $url=(empty($url_history)?'index.php/dashboard':$url_history);

        }
        else{
            //$data["error"]="<div class='alert-box error'><span>Error: </span>invalid username or password.</div>";
            $data['error'] = " <p id=\"alert_button\"></p>";
            $data['message'] = "<span>Error: </span>invalid number or password.";
        }
        $data["title"]= "Login";
        $data['content']= "signin/index";
        $this->load->view("template",$data);
    }

    function facebookcallback()
    {
        $facebook = new Facebook(array(
            'appId'  => $this->config->item('App_ID'),
            'secret' => $this->config->item('App_Secret'),
            'cookie' => true
        ));
        //if(isset($_GET['logout']))
        //{
        //    $url = 'https://www.facebook.com/logout.php?next=' . urlencode('http://localhost/csr/login').
        //      '&access_token='.$_GET['tocken'];
        //    session_destroy();
        //    redirect($url,"location",301);
        //}
        $token_url = "https://graph.facebook.com/oauth/access_token?"
            . "client_id=". $this->config->item('App_ID')."&redirect_uri=" . urlencode( $this->config->item('callback_url'))
            . "&client_secret=". $this->config->item('App_Secret')."&code=" . $_GET['code'];
        $response = file_get_contents($token_url);
        $params = null;
        parse_str($response, $params);
        $graph_url = "https://graph.facebook.com/me?access_token="
            . $params['access_token'];
        //  $this->session->set_userdata("logout","<a href='http://localhost/csr/login/facebook?logout=1&tocken='".$params['access_token'].">Logout</a><br>");
        $content = json_decode(file_get_contents($graph_url));
        if(!empty($content->name)){

           /* $data=array(
                "logoutType"=>'facebook',
                "username"=>$content->name,
                "is_logged_in"=>  TRUE,
                "status"=>1,
                "email" => $content->email

            );
            $this->session->set_userdata($data);
            $con=array("email" => $content->email);
            $query=$this->db->get_where("Subscribers_subscriber",$con);
            if($query->num_rows == 1)
            {
                //$url="http://graph.facebook.com/$content->username/picture?type=large";
                //$this->session->set_userdata("imageurl",$url);
                redirect("signin/validatef","location",301);
            }else{
           */
                $mydata = array(
                    "logoutType"=>'facebook',
                    "username"=>$content->name,
                    "is_logged_in"=>  TRUE,
                    "status"=>1,
                    "email" => $content->email

                );
            $this->session->set_userdata($mydata);
                //$query=$this->db->insert('Subscribers_subscriber', $mydata);
               // $url="http://graph.facebook.com/$content->username/picture?type=large";
               // $this->session->set_userdata("imageurl",$url);
                $this->validatef();
           // }

        }
        else{
            redirect('signin','location',301);
        }
    }

      public function validatef(){
            redirect("/dashboard","location",301);
        }



} 
