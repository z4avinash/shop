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
        $returnedUser = $this->Login_model->showCompleteList();
        $this->load->view('list');
    }

    public function list_data()
    {
        $this->load->model('Login_model');
        $returnedUser = $this->Login_model->showCompleteList();
        echo json_encode(array('data' => $returnedUser));
    }

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
        $product_id = $this->input->post('product_id');

        if ($product_id != 0) {
            $formArray = array();
            $formArray['title'] = $this->input->post('title');
            $formArray['category'] = $this->input->post('category');
            $formArray['description'] = $this->input->post('description');
            $this->Login_model->updateProduct($product_id, $formArray);
            echo $product_id;
        } else {
            //save data to database
            $formArray = array();
            $formArray['title'] = $this->input->post('title');
            $formArray['category'] = $this->input->post('category');
            $formArray['description'] = $this->input->post('description');
            $formArray['page_status'] = $this->input->post('page_status');
            $formArray['is_active'] = 0;
            $formArray['seller_id'] = $this->session->userdata['user_id'];
            $formArray['created_at'] = date('Y-m-d H:i:s');
            $this->Login_model->addProduct($formArray);
            echo $this->db->insert_id();
        }
    }




    //Second part saving operation
    public function page2($lastId)
    {
        $this->load->model('Login_model');
        //save data to database
        $formArray = array();
        $formArray['highlights'] = $this->input->post('highlight1');
        $formArray['page_status'] = $this->input->post('page_status');
        $this->Login_model->updateProduct($lastId, $formArray);
    }


    //Third part saving operation
    public function page3($lastId)
    {
        $this->load->model('Login_model');

        //save data to database
        $formArray = array();
        $formArray['type'] = $this->input->post('type');
        $Currency = $this->input->post('currency');
        $formArray['price'] = $this->input->post('price') . " " . $Currency;
        $formArray['page_status'] = $this->input->post('page_status');
        $this->Login_model->updateProduct($lastId, $formArray);
    }

    //Fourth part saving operation
    public function page4($lastId)
    {
        $this->load->model('Login_model');

        //save data into database
        $formArray = array();

        $formArray['quantity_left'] = $this->input->post('quantity');
        $formArray['available_startDate'] = $this->input->post('available_startDate');
        $formArray['available_endDate'] = $this->input->post('available_endDate');
        $formArray['available_dates'] = $this->input->post('multiDate');
        $formArray['page_status'] = $this->input->post('page-status');
        $formArray['start_time'] = $this->input->post('start_time');
        $formArray['end_time'] = $this->input->post('end_time');
        $this->Login_model->updateProduct($lastId, $formArray);
        $this->session->unset_userdata('created_at');
    }



    public function clearProducts()
    {
        $this->session->unset_userdata('created_at');
        redirect(base_url() . 'index.php/Main_controller/');
    }



    //view product
    public function viewProduct()
    {
        $this->load->model('Login_model');
        $returnedProduct['products'] = $this->Login_model->showAllProducts(1);
        $this->load->view('finalProductList', $returnedProduct);
    }



    //unpublished products
    public function unpublishedProducts()
    {
        $this->load->model('Login_model');
        $returnedProduct['products'] = $this->Login_model->unpublishedProducts(0);
        $this->load->view('productList', $returnedProduct);
    }


    //edit the products
    public function editProduct($product_id)
    {
        $this->load->model('Login_model');

        $returnedProduct['product'] = $this->Login_model->showSpecificProduct($product_id);
        $this->load->view('editProduct', $returnedProduct);
    }
}
