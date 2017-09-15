<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Created by PhpStorm.
 * User: beloved
 * Date: 11/26/14
 * Time: 9:43 PM
 */

class signup extends CI_Controller {

    function index()
    {
        $data['title']='SignUp';
        $data['content']="signup/index";
        $this->load->view("template",$data);
    }

    function create()
    {

        // field name, error message, validation rules
        $this->form_validation->set_rules('email', 'Email Address', 'trim|required|valid_email');
        $this->form_validation->set_rules('msisdn', 'Phone Number', 'trim|required|numeric|min_length[10]');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[4]|max_length[32]');
        $this->form_validation->set_rules('cpassword', 'Password Confirmation', 'trim|required|matches[password]');
        if($this->form_validation->run() == FALSE)
        {
            $this->index();
            return false;
        }
        else
        {

            if($this->usermodel->CreateRecord()=='True')
            {
                $this->load->library('email');
                $message="Thank you! Your registration was successful.";
                $message.="Your Password is: ".$this->input->post("password");
                $output=array("@@name","@@message");
                $input=array($this->input->post("username"),$message);
                $content=file_get_contents("regist.txt");
                $emailMessage=str_replace($output,$input,$content);
                $this->utility_model->send_mail($this->input->post("email"),"Registration Confirmation",$emailMessage);
                $data['error'] = " <p id=\"alert_button\"></p>";
                $data['message'] = "<span>Success:</span> Registration Successful!Please login to continue.";
                $data['title']="Sign in";
                $data['content'] ="signin/index";
                $this->load->view("template",$data);
            }
            else
            {
                $data['error'] = " <p id=\"alert_button\"></p>";
                $data['message'] = "<span>Error:</span>User Exists! pls use another Number/Email";
                $data['title']="Register";
                $data['content']="signup/index";
                $this->load->view("template",$data);
            }


        }
    }


} 