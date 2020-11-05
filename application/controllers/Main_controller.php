<?php

class Main_controller extends CI_Controller
{
    public function index()
    {
        redirect(base_url() . 'index.php/Main_controller/login');
    }


    //**********************************ADMIN SECTION**************************************************************** */
    //loading create page
    public function create()
    {
        $this->load->view('addUser');
    }




    //adding user to the database
    public function addUserToDB()
    {
        $this->load->model('Login_model');
        //validation
        $this->form_validation->set_rules('full_name', 'Full Name: ', 'required');
        $this->form_validation->set_rules('email', 'E-mail: ', 'required|valid_email|is_unique[users.email]');
        $this->form_validation->set_rules('password', 'Password: ', 'required');
        $this->form_validation->set_rules('phone', 'Phone: ', 'required');
        $this->form_validation->set_rules('gender', 'Gemder: ', 'required');
        $this->form_validation->set_rules('country', 'Country: ', 'required');
        $this->form_validation->set_rules('city', 'City: ', 'required');

        //check if valid
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('addUser');
        } else {
            //save data to database
            $formArray = array();
            $formArray['full_name'] = $this->input->post('full_name');
            $formArray['email'] = $this->input->post('email');
            $formArray['phone'] = $this->input->post('phone');
            $formArray['gender'] = $this->input->post('gender');
            $formArray['country'] = $this->input->post('country');
            $formArray['city'] = $this->input->post('city');
            $formArray['is_admin'] = false;
            $hashedPassword = $this->input->post('password');
            $formArray['password'] = password_hash($hashedPassword, PASSWORD_DEFAULT);
            $formArray['created_at'] = date('Y-m-d H:i:s');
            $this->Login_model->createUser($formArray);
            redirect(base_url() . 'index.php/Main_controller/admin_dash');
        }
    }





    // login functionality for user
    public function login()
    {
        //loading model
        $this->load->model('Login_model');
        //check for session login
        if (!empty($this->session->userdata['isLoggedIn'])) {
            $returnedUser['user'] = $this->Login_model->showData($this->session->userdata['user_id']);
            if ($returnedUser['user']['is_admin']) {
                redirect(base_url() . 'index.php/Main_controller/admin_dash');
            } else {
                redirect(base_url() . 'index.php/Main_controller/seller_dash');
            }
        } else {
            //form validation
            $this->form_validation->set_rules('login_email', 'E-mail: ', 'required|valid_email');
            $this->form_validation->set_rules('login_password', 'Password: ', 'required');

            //getting input values
            $login_email =  $this->input->post('login_email');
            $login_password = $this->input->post('login_password');

            //check if valid
            if ($this->form_validation->run() == false) {
                $this->load->view('login');
            } else {
                //check if user exists in database
                $returnedUser['user'] = $this->Login_model->checkUser($login_email);
                if (!empty($returnedUser['user'])) {
                    if (!empty(password_verify($login_password, $returnedUser['user']['password']))) {
                        $this->session->set_userdata('user_id', $returnedUser['user']['user_id']);
                        $this->session->set_userdata('type', $returnedUser['user']['is_admin']);
                        $this->session->set_userdata('isLoggedIn', true);
                        if ($returnedUser['user']['is_admin']) {
                            redirect(base_url() . 'index.php/Main_controller/admin_dash');
                        } else {
                            redirect(base_url() . 'index.php/Main_controller/seller_dash');
                        }
                    } else {
                        $this->load->view('login');
                        echo "<script>alert('Wrong username or password!')</script>";
                    }
                } else {
                    $this->load->view('login');
                    echo "<script>alert('Wrong username or password!')</script>";
                }
            }
        }
    }


    //admin dashboard
    public function admin_dash()
    {
        if (!empty($this->session->userdata['isLoggedIn']) && $this->session->userdata['type']) {
            $this->load->view('admin_dash');
        } else {
            redirect(base_url() . 'index.php/Main_controller/login');
        }
    }

    //seller dashboard
    public function seller_dash()
    {
        $this->load->model('Login_model');
        if (!empty($this->session->userdata['isLoggedIn']) && $this->session->userdata['type'] == 0) {
            $returnedUser['user'] = $this->Login_model->showData($this->session->userdata['user_id']);
            $this->load->view('seller_dash', $returnedUser);
        } else {
            redirect(base_url() . 'index.php/Main_controller/login');
        }
    }



    //logout functionality for user
    public function logout()
    {
        $this->session->sess_destroy();
        redirect(base_url() . 'index.php/Main_controller/login');
    }

    //listing all the users
    public function list()
    {
        $this->load->model('Login_model');
        $returnedUser['users'] = $this->Login_model->showCompleteList();
        $this->load->view('list', $returnedUser);
        $this->db->cache_delete('Main_controller', 'edit');
    }

    // public function list_data()
    // {
    //     $this->load->model('Login_model');
    //     $returnedUser = $this->Login_model->showCompleteList();
    //     echo json_encode(array('data' => $returnedUser));
    //     // $this->db->cache_delete('Main_controller', 'list_data');
    // }

    //updating user details
    public function edit($user_id)
    {
        $this->load->model('Login_model');
        $user['user'] = $this->Login_model->showData($user_id);

        $this->form_validation->set_rules('full_name', 'Full Name: ', 'required');
        $this->form_validation->set_rules('password', 'Password: ', 'required');
        $this->form_validation->set_rules('phone', 'Phone: ', 'required');
        $this->form_validation->set_rules('gender', 'Gemder: ', 'required');
        $this->form_validation->set_rules('country', 'Country: ', 'required');
        $this->form_validation->set_rules('city', 'City: ', 'required');
        if ($this->form_validation->run() == false) {
            $this->load->view('edit', $user);
        } else {
            $formArray = array();
            $formArray['full_name'] = $this->input->post('full_name');
            $formArray['phone'] = $this->input->post('phone');
            $formArray['gender'] = $this->input->post('gender');
            $formArray['country'] = $this->input->post('country');
            $formArray['city'] = $this->input->post('city');
            $formArray['is_admin'] = false;
            $hashedPassword = $this->input->post('password');
            $formArray['password'] = password_hash($hashedPassword, PASSWORD_DEFAULT);
            $this->Login_model->updateUser($user_id, $formArray);
            $this->db->cache_delete('Main_controller', 'list');
            redirect(base_url() . 'index.php/Main_controller/list');
        }
    }


    //deleting user
    public function delete($user_id)
    {
        $this->load->model('Login_model');
        $this->Login_model->delete($user_id);
        redirect(base_url() . 'index.php/Main_controller/list');
    }

    //***********************************SELLER SECTION***************************************************************** */

    //Only to load the view
    public function addProduct()
    {
        $this->load->view('addProduct');
    }


    //The main and first saving funciton
    public function page1()
    {
        $this->load->model('Login_model');

        $formArray = array();
        $formArray['title'] = $this->input->post('title');
        $formArray['category'] = $this->input->post('category');
        $formArray['description'] = $this->input->post('description');
        $formArray['is_active'] = 0;
        $formArray['seller_id'] = $this->session->userdata['user_id'];
        $formArray['date'] = date('Y-m-d');
        $formArray['created_at'] = date('Y-m-d H:i:s');
        $this->Login_model->addProduct($formArray);
        redirect(base_url() . 'index.php/Main_controller/unpublishedProducts');
    }





    //view product
    public function viewProduct()
    {
        $this->load->model('Login_model');
        $returnedProduct['products'] = $this->Login_model->showAllProducts(1);
        $this->load->view('finalProductList', $returnedProduct);
    }

    //view products
    public function adminProductView()
    {
        $this->load->model('Login_model');
        $returnedProduct['products'] = $this->Login_model->unpublishedProducts(0);
        $this->load->view('adminApprove', $returnedProduct);
    }

    //unpublished products
    public function unpublishedProducts()
    {
        $this->load->model('Login_model');

        $this->load->driver('cache', array('adapter' => 'apc', 'backup' => 'file'));

        if (!$returnedProduct = $this->cache->get('returnedProduct')) {
            echo 'Saving to the cache!<br />';
            $returnedProduct = $this->Login_model->unpublishedProducts(0);
            // Save into the cache for 5 minutes
            $this->cache->save('returnedProduct', $returnedProduct, 300);
            $this->load->view('productList', array('products' => $returnedProduct));
        }
        $this->load->view('productList', array('products' => $returnedProduct));




        // $returnedProduct = $this->Login_model->unpublishedProducts(0);
        // $this->load->view('productList', array('products' => $returnedProduct));
    }


    //edit the products
    public function editProduct($product_id)
    {
        $this->load->model('Login_model');

        $returnedProduct['product'] = $this->Login_model->showSpecificProduct($product_id);
        $this->load->view('editProduct', $returnedProduct);
    }


    //approve products
    public function approveProduct($product_id)
    {
        $this->load->model('Login_model');

        $formArray = array();
        $formArray['title'] = $this->input->post('title');
        $formArray['category'] = $this->input->post('category');
        $formArray['description'] = $this->input->post('description');
        $formArray['is_active'] = 1;
        $this->Login_model->approveProduct($product_id, $formArray);

        redirect(base_url() . 'index.php/Main_controller/adminProductView');
    }


    //get random entries based on date from products table and create csv file
    public function csv()
    {
        $this->load->model('Login_model');
        //getting data form the database
        $returnedEntriesFromProducts = $this->Login_model->getRandomEntriesFromProducts();
        $returnedEntiriesFromSubProducts = $this->Login_model->getRandomEntriesFromSubProducts();
        $commonTitle = array();
        $missingEntries = array();

        for ($i = 0; $i < count($returnedEntriesFromProducts); $i++) {
            for ($j = 0; $j < count($returnedEntiriesFromSubProducts); $j++) {
                if ($returnedEntriesFromProducts[$i]['title'] == $returnedEntiriesFromSubProducts[$j]['title']) {
                    array_push($commonTitle, $returnedEntriesFromProducts[$i]['title']);
                }
            }
        }

        for ($i = 0; $i < count($returnedEntriesFromProducts); $i++) {
            if (!in_array($returnedEntriesFromProducts[$i]['title'], $commonTitle)) {
                array_push($missingEntries, array($returnedEntriesFromProducts[$i]['product_id'], $returnedEntriesFromProducts[$i]['title'], $returnedEntriesFromProducts[$i]['description'], $returnedEntriesFromProducts[$i]['date']));
            }
        }
        //generating the csv file of the missing items
        header("Content-disposition: attachment; filename=test.csv");
        header("Content-Type: text/csv");
        $fp = fopen('php://output', 'w');

        foreach ($missingEntries as $item) {
            fputcsv($fp, $item);
        }
    }


    //******************************************************************************************************************* */
    //redirect to the main controller
    public function clearProducts()
    {
        redirect(base_url() . 'index.php/Main_controller/');
    }
}
