<?php

class Beloved extends CI_Model{

    function getInstance()
    {
    
        return $ci=& get_instance();
    }
    
    function CreateRecord()
    {        
        $data = array(
            'Name' => $this->getInstance()->input->post('name') ,
            'email' => $this->getInstance()->input->post('email') ,
            'facts' => $this->getInstance()->input->post('facts')
         );
        
        $query=$this->db->insert('users', $data);
        if($query){
            return true;
        }else{
            return false;
        }
        
    }
    function retrieveRecord($id)
    {
        $id=array("id"=>$id);
        $query = $this->db->get_where('users',$id);  
        
        if($query->num_rows()==1)
        {
            return $query;
        }else
        {
        return false;
        }
    }
    function updateRecord()
    {
        
        
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
}

?>