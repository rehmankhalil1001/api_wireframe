<?php

defined('BASEPATH') OR exit('No direct script access allowed');



/**

*

*/

class Fetched_data_logs_model extends CI_Model

{

  public function read(){



   $query = $this->db->query("select * from `fetched_data_logs`");

   return $query->result_array();

 }

 public function last_log($api_key){



   $query = $this->db->query("select * from `fetched_data_logs` where api_key = '$api_key' order by id desc limit 1");

   return $query->row_array();

 }



 public function insert($data){


   $this->api_key    = $data['api_key'];

   $this->last_fetched_row  = $data['last_fetched_row'];

   $this->last_fetched_value = $data['last_fetched_value'];

   return ($this->db->insert('fetched_data_logs', $this))  ?   $this->db->insert_id()  :   false;
   

 }



 public function update($id,$data){



   $this->api_key    = $data['api_key'];

   $this->last_fetched_row  = $data['last_fetched_row'];

   $this->last_fetched_value = $data['last_fetched_value'];

   $result = $this->db->update('fetched_data_logs',$this,array('id' => $id));

   if($result)

   {

     return "Data is updated successfully";

   }

   else

   {

     return "Error has occurred";

   }

 }



 public function delete($id){



   $result = $this->db->query("delete from `fetched_data_logs` where id = $id");

   if($result)

   {

     return "Data is deleted successfully";

   }

   else

   {

     return "Error has occurred";

   }

 }



}