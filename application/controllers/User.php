<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }

    public function index()
    {
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        // $this->load->model('User_model', 'user_model');
        // $data['username'] = $this->db->get('user')->result_array();


        // $data['user'] = $this->user_model->getUser();
        $this->load->view('templates/header');
        $this->load->view('templates/admin_sidebar');
        $this->load->view('profile/profile', $data);
        $this->load->view('templates/footer');
    }
    #PROFILE
    public function profile_klien($id)
    {
        $this->load->model('User_model', 'user_model');
        $data['user'] = $this->user_model->getUserDetail($id);

        $this->load->view('templates/header');
        $this->load->view('templates/klien_sidebar');
        $this->load->view('profile/profile', $data);
        $this->load->view('templates/footer');
    }

    public function profile_supervisor($id)
    {
        $this->load->model('User_model', 'user_model');
        $data['user'] = $this->user_model->getUserDetail($id);

        $this->load->view('templates/header');
        $this->load->view('templates/supervisor_sidebar');
        $this->load->view('profile/profile', $data);
        $this->load->view('templates/footer');
    }

    
    public function profile_helpdesk($id)
    {
        $this->load->model('User_model', 'user_model');
        $data['user'] = $this->user_model->getUserDetail($id);

        $this->load->view('templates/header');
        $this->load->view('templates/helpdesk_sidebar');
        $this->load->view('profile/profile', $data);
        $this->load->view('templates/footer');
    }

    public function profile_implementator($id)
    {
        $this->load->model('User_model', 'user_model');
        $data['user'] = $this->user_model->getUserDetail($id);

        $this->load->view('templates/header');
        $this->load->view('templates/implementator_sidebar');
        $this->load->view('profile/profile', $data);
        $this->load->view('templates/footer');
    }

    public function profile_support($id)
    {
        $this->load->model('User_model', 'user_model');
        $data['user'] = $this->user_model->getUserDetail($id);

        $this->load->view('templates/header');
        $this->load->view('templates/support_sidebar');
        $this->load->view('profile/profile', $data);
        $this->load->view('templates/footer');
    }

    public function profile_dbs($id)
    {
        $this->load->model('User_model', 'user_model');
        $data['user'] = $this->user_model->getUserDetail($id);

        $this->load->view('templates/header');
        $this->load->view('templates/dbs_sidebar');
        $this->load->view('profile/profile', $data);
        $this->load->view('templates/footer');
    }

    public function profile_crd($id)
    {
        $this->load->model('User_model', 'user_model');
        $data['user'] = $this->user_model->getUserDetail($id);

        $this->load->view('templates/header');
        $this->load->view('templates/crd_sidebar');
        $this->load->view('profile/profile', $data);
        $this->load->view('templates/footer');
    }

    public function profile_development($id)
    {
        $this->load->model('User_model', 'user_model');
        $data['user'] = $this->user_model->getUserDetail($id);

        $this->load->view('templates/header');
        $this->load->view('templates/development_sidebar');
        $this->load->view('profile/profile', $data);
        $this->load->view('templates/footer');
    }

     
    // public function getUser()
    // {
    //     $this->load->model('User_model', 'user_model');
    //     $data['nama_brg'] = $this->db->get('pengajuan')->result_array();

    //     $data['user'] = $this->user_model->getDataUser();
    //     $this->load->view('templates/header');
    //     $this->load->view('templates/admin_sidebar');
    //     $this->load->view('', $data);
    //     $this->load->view('templates/footer');
    // }

    public function getDataUser()
    {
        $this->load->model('User_model', 'user_model');

        $data['user'] = $this->user_model->getDataUser();
        $this->load->view('templates/header');
        $this->load->view('templates/supervisor_sidebar');
        $this->load->view('supervisor/activate_user', $data);
        $this->load->view('templates/footer');
    }

    public function active($id)
    {
        $sql = "UPDATE user SET active='Y' WHERE id=$id";
        $this->db->query($sql);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">User Activated<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        $referred_from = $this->session->userdata('referred_from');
        redirect($referred_from, 'refresh');
    }

    public function inactive($id)
    {
        $sql = "UPDATE user SET active='N' WHERE id=$id";
        $this->db->query($sql);
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">User Deactivated<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        $referred_from = $this->session->userdata('referred_from');
        redirect($referred_from, 'refresh');
    }

    #EDIT PROFILE
    public function fungsi_edit($id)
    {
        $this->load->model('User_model', 'user_model');
        $data['user'] = $this->user_model->getUserDetail($id);
        $nama = $this->input->post('nama');
        $username = $this->input->post('username');

        $this->db->set('nama', $nama);
        $this->db->set('username', $username);
        $this->db->where('id', $id);
        $this->db->update('user');
        $this->session->set_flashdata('message', '<div class="alert alert-info" role="alert"> <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>Data User Edited!</div>');
        $referred_from = $this->session->userdata('referred_from');
        redirect($referred_from, 'refresh');
    }

    #EDIT PASSWORD
    public function changepassword()
    {
        $data['user'] = $this->db->get_where('user', ['id' => $this->session->userdata('id')])->row_array();

        $this->form_validation->set_rules('current_password', 'Current Password', 'required|trim');
        $this->form_validation->set_rules('new_password1', 'New Password', 'required|trim|min_length[8]|matches[new_password2]');
        $this->form_validation->set_rules('new_password2', 'Confirm New Password', 'required|trim|min_length[8]|matches[new_password1]');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header');
            $this->load->view('templates/supervisor_sidebar');
            $this->load->view('profile/changepassword', $data);
            $this->load->view('templates/footer');
        } else {
            $current_passwordmd5 = $this->input->post('current_password');
            $new_passwordmd5 = $this->input->post('new_password1');
            $current_password = MD5($current_passwordmd5);
            $new_password = MD5($new_passwordmd5);
            if ($current_password != $data['user']['password']) {
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>Wrong current password!</div>');
                redirect('user/changepassword');
            } else if ($current_password == $new_password) {
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>New password cannot be the same as current password!</div>');
                redirect('user/changepassword');
            } else {
                $this->db->set('password', $new_password);
                $this->db->where('id', $this->session->userdata('id'));
                $this->db->update('user');


                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>Password Changed!</div>');
                redirect('user/changepassword');
            }
        }
    }

    public function changepassword_klien()
    {
        $data['user'] = $this->db->get_where('user', ['id' => $this->session->userdata('id')])->row_array();

        $this->form_validation->set_rules('current_password', 'Current Password', 'required|trim');
        $this->form_validation->set_rules('new_password1', 'New Password', 'required|trim|min_length[8]|matches[new_password2]');
        $this->form_validation->set_rules('new_password2', 'Confirm New Password', 'required|trim|min_length[8]|matches[new_password1]');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header');
            $this->load->view('templates/klien_sidebar');
            $this->load->view('profile/changepassword_klien', $data);
            $this->load->view('templates/footer');
        } else {
            $current_passwordmd5 = $this->input->post('current_password');
            $new_passwordmd5 = $this->input->post('new_password1');
            $current_password = MD5($current_passwordmd5);
            $new_password = MD5($new_passwordmd5);
            if ($current_password != $data['user']['password']) {
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>Wrong current password!</div>');
                redirect('user/changepassword_klien');
            } else if ($current_password == $new_password) {
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>New password cannot be the same as current password!</div>');
                redirect('user/changepassword_klien');
            } else {
                $this->db->set('password', $new_password);
                $this->db->where('id', $this->session->userdata('id'));
                $this->db->update('user');
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>Password Changed!</div>');
                redirect('user/changepassword_klien');
            }
        }
    }

    public function changepassword_helpdesk()
    {
        $data['user'] = $this->db->get_where('user', ['id' => $this->session->userdata('id')])->row_array();

        $this->form_validation->set_rules('current_password', 'Current Password', 'required|trim');
        $this->form_validation->set_rules('new_password1', 'New Password', 'required|trim|min_length[8]|matches[new_password2]');
        $this->form_validation->set_rules('new_password2', 'Confirm New Password', 'required|trim|min_length[8]|matches[new_password1]');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header');
            $this->load->view('templates/helpdesk_sidebar');
            $this->load->view('profile/changepassword_helpdesk', $data);
            $this->load->view('templates/footer');
        } else {
            $current_passwordmd5 = $this->input->post('current_password');
            $new_passwordmd5 = $this->input->post('new_password1');
            $current_password = MD5($current_passwordmd5);
            $new_password = MD5($new_passwordmd5);
            if ($current_password != $data['user']['password']) {
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>Wrong current password!</div>');
                redirect('user/changepassword_helpdesk');
            } else if ($current_password == $new_password) {
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>New password cannot be the same as current password!</div>');
                redirect('user/changepassword_helpdesk');
            } else {
                $this->db->set('password', $new_password);
                $this->db->where('id', $this->session->userdata('id'));
                $this->db->update('user');
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>Password Changed!</div>');
                redirect('user/changepassword_helpdesk');
            }
        }
    }

    public function changepassword_implementator()
    {
        $data['user'] = $this->db->get_where('user', ['id' => $this->session->userdata('id')])->row_array();

        $this->form_validation->set_rules('current_password', 'Current Password', 'required|trim');
        $this->form_validation->set_rules('new_password1', 'New Password', 'required|trim|min_length[8]|matches[new_password2]');
        $this->form_validation->set_rules('new_password2', 'Confirm New Password', 'required|trim|min_length[8]|matches[new_password1]');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header');
            $this->load->view('templates/implementator_sidebar');
            $this->load->view('profile/changepassword_implementator', $data);
            $this->load->view('templates/footer');
        } else {
            $current_passwordmd5 = $this->input->post('current_password');
            $new_passwordmd5 = $this->input->post('new_password1');
            $current_password = MD5($current_passwordmd5);
            $new_password = MD5($new_passwordmd5);
            if ($current_password != $data['user']['password']) {
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>Wrong current password!</div>');
                redirect('user/changepassword_implementator');
            } else if ($current_password == $new_password) {
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>New password cannot be the same as current password!</div>');
                redirect('user/changepassword_implementator');
            } else {
                $this->db->set('password', $new_password);
                $this->db->where('id', $this->session->userdata('id'));
                $this->db->update('user');
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>Password Changed!</div>');
                redirect('user/changepassword_implementator');
            }
        }
    }

    public function changepassword_support()
    {
        $data['user'] = $this->db->get_where('user', ['id' => $this->session->userdata('id')])->row_array();

        $this->form_validation->set_rules('current_password', 'Current Password', 'required|trim');
        $this->form_validation->set_rules('new_password1', 'New Password', 'required|trim|min_length[8]|matches[new_password2]');
        $this->form_validation->set_rules('new_password2', 'Confirm New Password', 'required|trim|min_length[8]|matches[new_password1]');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header');
            $this->load->view('templates/support_sidebar');
            $this->load->view('profile/changepassword_support', $data);
            $this->load->view('templates/footer');
        } else {
            $current_passwordmd5 = $this->input->post('current_password');
            $new_passwordmd5 = $this->input->post('new_password1');
            $current_password = MD5($current_passwordmd5);
            $new_password = MD5($new_passwordmd5);
            if ($current_password != $data['user']['password']) {
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>Wrong current password!</div>');
                redirect('user/changepassword_support');
            } else if ($current_password == $new_password) {
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>New password cannot be the same as current password!</div>');
                redirect('user/changepassword_support');
            } else {
                $this->db->set('password', $new_password);
                $this->db->where('id', $this->session->userdata('id'));
                $this->db->update('user');
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>Password Changed!</div>');
                redirect('user/changepassword_support');
            }
        }
    }

    public function changepassword_dbs()
    {
        $data['user'] = $this->db->get_where('user', ['id' => $this->session->userdata('id')])->row_array();

        $this->form_validation->set_rules('current_password', 'Current Password', 'required|trim');
        $this->form_validation->set_rules('new_password1', 'New Password', 'required|trim|min_length[8]|matches[new_password2]');
        $this->form_validation->set_rules('new_password2', 'Confirm New Password', 'required|trim|min_length[8]|matches[new_password1]');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header');
            $this->load->view('templates/dbs_sidebar');
            $this->load->view('profile/changepassword_dbs', $data);
            $this->load->view('templates/footer');
        } else {
            $current_passwordmd5 = $this->input->post('current_password');
            $new_passwordmd5 = $this->input->post('new_password1');
            $current_password = MD5($current_passwordmd5);
            $new_password = MD5($new_passwordmd5);
            if ($current_password != $data['user']['password']) {
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>Wrong current password!</div>');
                redirect('user/changepassword_dbs');
            } else if ($current_password == $new_password) {
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>New password cannot be the same as current password!</div>');
                redirect('user/changepassword_dbs');
            } else {
                $this->db->set('password', $new_password);
                $this->db->where('id', $this->session->userdata('id'));
                $this->db->update('user');
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>Password Changed!</div>');
                redirect('user/changepassword_dbs');
            }
        }
    }

    public function changepassword_crd()
    {
        $data['user'] = $this->db->get_where('user', ['id' => $this->session->userdata('id')])->row_array();

        $this->form_validation->set_rules('current_password', 'Current Password', 'required|trim');
        $this->form_validation->set_rules('new_password1', 'New Password', 'required|trim|min_length[8]|matches[new_password2]');
        $this->form_validation->set_rules('new_password2', 'Confirm New Password', 'required|trim|min_length[8]|matches[new_password1]');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header');
            $this->load->view('templates/crd_sidebar');
            $this->load->view('profile/changepassword_crd', $data);
            $this->load->view('templates/footer');
        } else {
            $current_passwordmd5 = $this->input->post('current_password');
            $new_passwordmd5 = $this->input->post('new_password1');
            $current_password = MD5($current_passwordmd5);
            $new_password = MD5($new_passwordmd5);
            if ($current_password != $data['user']['password']) {
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>Wrong current password!</div>');
                redirect('user/changepassword_crd');
            } else if ($current_password == $new_password) {
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>New password cannot be the same as current password!</div>');
                redirect('user/changepassword_crd');
            } else {
                $this->db->set('password', $new_password);
                $this->db->where('id', $this->session->userdata('id'));
                $this->db->update('user');
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>Password Changed!</div>');
                redirect('user/changepassword_crd');
            }
        }
    }

    public function changepassword_development()
    {
        $data['user'] = $this->db->get_where('user', ['id' => $this->session->userdata('id')])->row_array();

        $this->form_validation->set_rules('current_password', 'Current Password', 'required|trim');
        $this->form_validation->set_rules('new_password1', 'New Password', 'required|trim|min_length[8]|matches[new_password2]');
        $this->form_validation->set_rules('new_password2', 'Confirm New Password', 'required|trim|min_length[8]|matches[new_password1]');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header');
            $this->load->view('templates/development_sidebar');
            $this->load->view('profile/changepassword_development', $data);
            $this->load->view('templates/footer');
        } else {
            $current_passwordmd5 = $this->input->post('current_password');
            $new_passwordmd5 = $this->input->post('new_password1');
            $current_password = MD5($current_passwordmd5);
            $new_password = MD5($new_passwordmd5);
            if ($current_password != $data['user']['password']) {
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>Wrong current password!</div>');
                redirect('user/changepassword_development');
            } else if ($current_password == $new_password) {
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>New password cannot be the same as current password!</div>');
                redirect('user/changepassword_development');
            } else {
                $this->db->set('password', $new_password);
                $this->db->where('id', $this->session->userdata('id'));
                $this->db->update('user');
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>Password Changed!</div>');
                redirect('user/changepassword_development');
            }
        }
    }
}