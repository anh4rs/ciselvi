<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Pengaturan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Pengaturan_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'pengaturan/index?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'pengaturan/index?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'pengaturan/index';
            $config['first_url'] = base_url() . 'pengaturan/index';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Pengaturan_model->total_rows($q);
        $pengaturan = $this->Pengaturan_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'pengaturan_data' => $pengaturan,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->template->display('admin/pengaturan/Pengaturan_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Pengaturan_model->get_by_id($id);
        if ($row) {
            $data = array(
		'pengaturan_id' => $row->pengaturan_id,
		'pengaturan_nama_kabag' => $row->pengaturan_nama_kabag,
		'pengaturan_nik_kabag' => $row->pengaturan_nik_kabag,
		'pengaturan_status' => $row->pengaturan_status,
	    );
            $this->template->display('admin/pengaturan/Pengaturan_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('pengaturan'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('pengaturan/create_action'),
	    'pengaturan_id' => set_value('pengaturan_id'),
	    'pengaturan_nama_kabag' => set_value('pengaturan_nama_kabag'),
	    'pengaturan_nik_kabag' => set_value('pengaturan_nik_kabag'),
	    'pengaturan_status' => set_value('pengaturan_status'),
	);
        $this->template->display('admin/pengaturan/Pengaturan_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'pengaturan_nama_kabag' => $this->input->post('pengaturan_nama_kabag',TRUE),
		'pengaturan_nik_kabag' => $this->input->post('pengaturan_nik_kabag',TRUE),
		'pengaturan_status' => $this->input->post('pengaturan_status',TRUE),
	    );

            $this->Pengaturan_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('pengaturan'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Pengaturan_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('pengaturan/update_action'),
		'pengaturan_id' => set_value('pengaturan_id', $row->pengaturan_id),
		'pengaturan_nama_kabag' => set_value('pengaturan_nama_kabag', $row->pengaturan_nama_kabag),
		'pengaturan_nik_kabag' => set_value('pengaturan_nik_kabag', $row->pengaturan_nik_kabag),
		'pengaturan_status' => set_value('pengaturan_status', $row->pengaturan_status),
	    );
            $this->template->display('admin/pengaturan/Pengaturan_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('pengaturan'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('pengaturan_id', TRUE));
        } else {
            $data = array(
		'pengaturan_nama_kabag' => $this->input->post('pengaturan_nama_kabag',TRUE),
		'pengaturan_nik_kabag' => $this->input->post('pengaturan_nik_kabag',TRUE),
		'pengaturan_status' => $this->input->post('pengaturan_status',TRUE),
	    );

            $this->Pengaturan_model->update($this->input->post('pengaturan_id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('pengaturan'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Pengaturan_model->get_by_id($id);

        if ($row) {
            $this->Pengaturan_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('pengaturan'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('pengaturan'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('pengaturan_nama_kabag', 'pengaturan nama kabag', 'trim|required');
	$this->form_validation->set_rules('pengaturan_nik_kabag', 'pengaturan nik kabag', 'trim|required');
	$this->form_validation->set_rules('pengaturan_status', 'pengaturan status', 'trim|required');

	$this->form_validation->set_rules('pengaturan_id', 'pengaturan_id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Pengaturan.php */
/* Location: ./application/controllers/Pengaturan.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-03-31 02:11:12 */
/* http://harviacode.com */