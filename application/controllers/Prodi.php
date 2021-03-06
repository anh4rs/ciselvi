<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Prodi extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Prodi_model');
        $this->load->library('form_validation');
        check_not_login();
    }

    public function index()
    {   

        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'prodi/index?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'prodi/index?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'prodi/index';
            $config['first_url'] = base_url() . 'prodi/index';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Prodi_model->total_rows($q);
        $prodi = $this->Prodi_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'prodi_data' => $prodi,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->template->display('admin/prodi/prodi_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Prodi_model->get_by_id($id);
        if ($row) {
            $data = array(
              'prodi_id' => $row->prodi_id,
              'prodi_name' => $row->prodi_name,
              );
            $this->template->display('admin/prodi/prodi_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('prodi'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('prodi/create_action'),
            'prodi_id' => set_value('prodi_id'),
            'prodi_name' => set_value('prodi_name'),
        );
        $this->template->display('admin/prodi/prodi_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
              'prodi_name' => $this->input->post('prodi_name',TRUE),
          );

            $this->Prodi_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('prodi'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Prodi_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('prodi/update_action'),
                'prodi_id' => set_value('prodi_id', $row->prodi_id),
                'prodi_name' => set_value('prodi_name', $row->prodi_name),
            );
            $this->template->display('admin/prodi/prodi_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('prodi'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('prodi_id', TRUE));
        } else {
            $data = array(
              'prodi_name' => $this->input->post('prodi_name',TRUE),
          );

            $this->Prodi_model->update($this->input->post('prodi_id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('prodi'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Prodi_model->get_by_id($id);

        if ($row) {
            $this->Prodi_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('prodi'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('prodi'));
        }
    }

    public function _rules() 
    {
       $this->form_validation->set_rules('prodi_name', 'prodi name', 'trim|required');

       $this->form_validation->set_rules('prodi_id', 'prodi_id', 'trim');
       $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
   }

}

/* End of file Prodi.php */
/* Location: ./application/controllers/Prodi.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-03-10 18:11:21 */
/* http://harviacode.com */