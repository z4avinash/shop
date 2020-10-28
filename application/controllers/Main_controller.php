<?php

class Main_controller extends CI_Controller
{
    public function index()
    {
        redirect(base_url() . 'index.php/Main_controller/login');
    }

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
        $this->load->view('admin_dash');
    }

    //seller dashboard
    public function seller_dash()
    {
        $this->load->view('seller_dash');
    }






    //logout functionality
    public function logout()
    {
        $this->session->sess_destroy();
        redirect(base_url() . 'index.php/Main_controller/login');
    }




    public function list()
    {
        $this->load->model('Login_model');
        $returnedUser['users'] = $this->Login_model->showCompleteList();
        $this->load->view('list', $returnedUser);
    }

    //updating
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


    //deleting
    public function delete($user_id)
    {
        $this->load->model('Login_model');
        $this->Login_model->delete($user_id);
        redirect(base_url() . 'index.php/Main_controller/list');
    }
}
