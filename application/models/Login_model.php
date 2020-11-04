<?php

class Login_model extends CI_model
{
    //create user
    public function createUser($formData)
    {
        $this->db->insert('users', $formData);
    }

    //check user
    public function checkUser($login_email)
    {
        return $user = $this->db->where('email', $login_email)->get('users')->row_array();
    }

    //show all users
    public function showCompleteList()
    {
        return $user = $this->db->get('users')->result_array();
    }

    //show specific user
    public function showData($user_id)
    {
        return $user = $this->db->where('user_id', $user_id)->get('users')->row_array();
    }

    //update user
    public function updateUser($user_id, $formData)
    {
        return $this->db->where('user_id', $user_id)->update('users', $formData);
    }

    //delete user
    public function delete($user_id)
    {
        return $this->db->where('user_id', $user_id)->delete('users');
    }




    ///************************************************************************************************************ */

    //add product
    public function addProduct($formData)
    {
        $this->db->insert('products', $formData);
    }

    //show all products
    public function showAllProducts($is_active)
    {
        return $this->db->where('is_active', $is_active)->get('products')->result_array();
    }

    //show specific product
    public function showSpecificProduct($product_id)
    {
        return $this->db->where('product_id', $product_id)->get('products')->row_array();
    }

    //unpublished products
    public function unpublishedProducts($is_active)
    {
        return $this->db->where('is_active', $is_active)->get('products')->result_array();
    }

    //update product
    public function updateProduct($product_id, $formData)
    {
        $this->db->where('product_id', $product_id)->update('products', $formData);
    }

    //approve product
    public function approveProduct($product_id, $formData)
    {
        $this->db->where('product_id', $product_id)->update('products', $formData);
    }

    //get random entries from the products table
    public function getRandomEntriesFromProducts()
    {
        return $this->db->order_by('product_id', 'random')->limit('15')->get('products')->result_array();
    }

    //get random entries from the products table
    public function getRandomEntriesFromSubProducts()
    {
        return $this->db->order_by('sub_product_id', 'random')->limit('15')->get('sub_product')->result_array();
    }
}
