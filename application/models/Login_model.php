<?php

class Login_model extends CI_model
{
    public function createUser($formData)
    {
        $this->db->insert('users', $formData);
    }

    public function checkUser($login_email)
    {
        return $user = $this->db->where('email', $login_email)->get('users')->row_array();
    }

    public function showCompleteList()
    {
        return $user = $this->db->get('users')->result_array();
    }

    public function showData($user_id)
    {
        return $user = $this->db->where('user_id', $user_id)->get('users')->row_array();
    }

    public function updateUser($user_id, $formData)
    {
        return $this->db->where('user_id', $user_id)->update('users', $formData);
    }

    public function delete($user_id)
    {
        return $this->db->where('user_id', $user_id)->delete('users');
    }
}
