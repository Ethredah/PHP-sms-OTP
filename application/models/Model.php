<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model extends CI_Model {



  public function register($user)
  {
      $this->db->insert('register', $user);

  }


  public function verify($user)
  {

    $condition = "email=" . "'" . $user['email'] . "' AND " . "otp =" . "'" . $user['otp'] . "'";

    $this->db->select('*');
    $this->db->from('register');
    $this->db->where($condition);
    $this->db->limit(1);
    $query = $this->db->get();

    if ($query->num_rows() == 1) {
    return $query->result();
    } else {
    return false;
    }


  }



}



?>
