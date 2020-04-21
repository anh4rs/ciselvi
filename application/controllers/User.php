<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class User extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('User_model');
        $this->load->library('form_validation');
        check_not_login();
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'user/index?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'user/index?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'user/index';
            $config['first_url'] = base_url() . 'user/index';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->User_model->total_rows($q);
        $user = $this->User_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'user_data' => $user,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->template->display('admin/user/users_list', $data);
    }

    public function read($id) 
    {
        $row = $this->User_model->get_by_id($id);
        if ($row) {
            $data = array(
		'uid' => $row->uid,
		'uname' => $row->uname,
		'upass' => $row->upass,
		'nama_lengkap' => $row->nama_lengkap,
		'akses' => $row->akses,
	    );
            $this->template->display('admin/user/users_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('user'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('user/create_action'),
	    'uid' => set_value('uid'),
	    'uname' => set_value('uname'),
	    'upass' => set_value('upass'),
	    'nama_lengkap' => set_value('nama_lengkap'),
	    'akses' => set_value('akses'),
	);
        $this->template->display('admin/user/users_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'uname' => $this->input->post('uname',TRUE),
		'upass' => $this->input->post('upass',TRUE),
		'nama_lengkap' => $this->input->post('nama_lengkap',TRUE),
		'akses' => $this->input->post('akses',TRUE),
	    );

            $this->User_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('user'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->User_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('user/update_action'),
		'uid' => set_value('uid', $row->uid),
		'uname' => set_value('uname', $row->uname),
		'upass' => set_value('upass', $row->upass),
		'nama_lengkap' => set_value('nama_lengkap', $row->nama_lengkap),
		'akses' => set_value('akses', $row->akses),
	    );
            $this->template->display('admin/user/users_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('user'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('uid', TRUE));
        } else {
            $data = array(
		'uname' => $this->input->post('uname',TRUE),
		'upass' => $this->input->post('upass',TRUE),
		'nama_lengkap' => $this->input->post('nama_lengkap',TRUE),
		'akses' => $this->input->post('akses',TRUE),
	    );

            $this->User_model->update($this->input->post('uid', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('user'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->User_model->get_by_id($id);

        if ($row) {
            $this->User_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('user'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('user'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('uname', 'uname', 'trim|required');
	$this->form_validation->set_rules('upass', 'upass', 'trim|required');
	$this->form_validation->set_rules('nama_lengkap', 'nama lengkap', 'trim|required');
	$this->form_validation->set_rules('akses', 'akses', 'trim|required');

	$this->form_validation->set_rules('uid', 'uid', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file User.php */
/* Location: ./application/controllers/User.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-03-11 10:56:30 */
/* http://harviacode.com */