<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Surat extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        //meload model surat
        $this->load->model('Surat_model');
        //meload model prodi
        $this->load->model('Prodi_model', 'prodi');
        //meload model kategori
        $this->load->model('Kategori_model', 'kategori');
        //meload library form validasi
        $this->load->library('form_validation');
        $this->load->helper('tgl_indo');

        check_not_login();
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));

        if ($q <> '') {
            $config['base_url'] = base_url() . 'surat/index?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'surat/index?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'surat/index';
            $config['first_url'] = base_url() . 'surat/index';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Surat_model->total_rows($q);
        $surat = $this->Surat_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'surat_data' => $surat,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->template->display('admin/surat/surat_keterangan_list', $data);
    }

    public function create()
    {
        $prodi = $this->prodi->get_all_asc()->result();
        $kategori = $this->kategori->get_all_asc()->result();

        $data = array(
            'button' => 'Create',
            'action' => site_url('surat/create_action'),
            'surat_id' => set_value('surat_id'),
            'surat_nama' => set_value('surat_nama'),
            'surat_tmpt_lahir' => set_value('surat_tmpt_lahir'),
            'surat_tgl_lahir' => set_value('surat_tgl_lahir'),
            'surat_nim' => set_value('surat_nim'),
            'surat_alamat' => set_value('surat_alamat'),
            'tahun_ajaran' => set_value('kategori_id'),
            'semester' => set_value('semester'),
            'prodi_id' => set_value('prodi_id'),
            'kategori_id' => set_value('kategori_id'),
            'prodis' => $prodi,
            'kategoris' => $kategori,


        );
        $this->template->display('admin/surat/surat_keterangan_form', $data);
    }

    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
                'surat_nama' => $this->input->post('surat_nama', TRUE),
                'surat_tmpt_lahir' => $this->input->post('surat_tmpt_lahir', TRUE),
                'surat_tgl_lahir' => $this->input->post('surat_tgl_lahir', TRUE),
                'surat_nim' => $this->input->post('surat_nim', TRUE),
                'surat_alamat' => $this->input->post('surat_alamat', TRUE),
                'prodi_id' => $this->input->post('prodi_id', TRUE),
                'kategori_id' => $this->input->post('kategori_id', TRUE),
                'tahun_ajaran' =>  $this->input->post('tahun_ajaran', TRUE),
                'semester' =>  $this->input->post('semester',  TRUE),

            );

            $this->Surat_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('surat'));
        }
    }

    public function update($id)
    {
        $row = $this->Surat_model->get_by_id($id);
        $prodi = $this->prodi->get_all_asc()->result();
        $kategori = $this->kategori->get_all_asc()->result();

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('surat/update_action'),
                'surat_id' => set_value('surat_id', $row->surat_id),
                'surat_nama' => set_value('surat_nama', $row->surat_nama),
                'surat_tmpt_lahir' => set_value('surat_tmpt_lahir', $row->surat_tmpt_lahir),
                'surat_tgl_lahir' => set_value('surat_tgl_lahir', $row->surat_tgl_lahir),
                'surat_nim' => set_value('surat_nim', $row->surat_nim),
                'surat_alamat' => set_value('surat_alamat', $row->surat_alamat),
                'prodi_id' => set_value('prodi_id', $row->prodi_id),
                'kategori_id' => set_value('kategori_id', $row->kategori_id),
                'tahun_ajaran' => set_value('tahun_ajaran', $row->tahun_ajaran),
                'semester' => set_value('semester', $row->semester),
                'prodis' => $prodi,
                'kategoris' => $kategori,
            );
            $this->template->display('admin/surat/surat_keterangan_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('surat'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('surat_id', TRUE));
        } else {
            $data = array(
                'surat_nama' => $this->input->post('surat_nama', TRUE),
                'surat_tmpt_lahir' => $this->input->post('surat_tmpt_lahir', TRUE),
                'surat_nim' => $this->input->post('surat_nim', TRUE),
                'surat_alamat' => $this->input->post('surat_alamat', TRUE),
                'prodi_id' => $this->input->post('prodi_id', TRUE),
                'kategori_id' => $this->input->post('kategori_id', TRUE),
                'tahun_ajaran' => $this->input->post('tahun_ajaran', TRUE),
                'semester' => $this->input->post('semester', TRUE),
            );

            $this->Surat_model->update($this->input->post('surat_id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('surat'));
        }
    }

    public function konfirmasi()
    {

        //var_dump($this->input->post()); 
        //die();
        if ( isset($_POST['konfrm']) ){

            $id = $this->input->post('id');
            $data = array(
                'status' => $this->input->post('status'),
            );
            $this->Surat_model->konfirmasi($id, $data);
            redirect(site_url('surat'));
        } else {
            echo "
            <script>
            alert('Gak di Izinkan secara Langsung bro !!!');
            window.location='".site_url('surat')."';
            </script>
            ";
        }

    }    

    public function tolak()
    {

        //var_dump($this->input->post()); 
        //die();
        if ( isset($_POST['konfrm']) ){

            $id = $this->input->post('id');
            $data = array(
                'status' => $this->input->post('status'),
            );
            $this->Surat_model->tolak($id, $data);
            redirect(site_url('surat'));
        } else {
            echo "
            <script>
            alert('Gak di Izinkan secara Langsung bro !!!');
            window.location='".site_url('surat')."';
            </script>
            ";
        }

    }

    public function cetak($id)
    {
        $this->load->model('pengaturan_model', 'pengaturan');

        $row = $this->Surat_model->get_by_id($id);
        $row_pengaturan = $this->pengaturan->get_by_status($id);

        if ($row) {
            $data = array(
                'surat_id' => set_value('surat_id', $row->surat_id),
                'surat_nama' => set_value('surat_nama', $row->surat_nama),
                'surat_tmpt_lahir' => set_value('surat_tmpt_lahir', $row->surat_tmpt_lahir),
                'surat_tgl_lahir' => set_value('surat_tgl_lahir', $row->surat_tgl_lahir),
                'surat_nim' => set_value('surat_nim', $row->surat_nim),
                'surat_alamat' => set_value('surat_alamat', $row->surat_alamat),
                'prodi_id' => set_value('prodi_id', $row->prodi_id),
                'kategori_id' => set_value('kategori_id', $row->kategori_id),
                'nama_ortu_wali' => $row->nama_ortu_wali,
                'pekerjaan_ortu_wali' => $row->pekerjaan_ortu_wali,
                'prodi_name' => $row->prodi_name,
                'semester' => $row->semester,
                'tahun_ajaran' => $row->tahun_ajaran,
                'kategori_name' => $row->kategori_name,
                'pengaturan_nama_kabag' => $row_pengaturan->pengaturan_nama_kabag,
                'pengaturan_nik_kabag' => $row_pengaturan->pengaturan_nik_kabag,

            );
        }

        $html = $this->load->view('admin/surat/view_surat_aktif', $data, true);
        $this->template->pdfgenerator($html, $row->surat_nama . '-' . $row->surat_nim);
    }

    public function _rules()
    {
        $this->form_validation->set_rules('surat_nama', 'surat nama', 'trim|required');
        $this->form_validation->set_rules('surat_tmpt_lahir', 'surat tmpt lahir', 'trim|required');
        $this->form_validation->set_rules('surat_nim', 'surat nim', 'trim|required');
        $this->form_validation->set_rules('surat_alamat', 'surat alamat', 'trim|required');
        $this->form_validation->set_rules('prodi_id', 'prodi id', 'trim|required');
        $this->form_validation->set_rules('kategori_id', 'kategori id', 'trim|required');

        $this->form_validation->set_rules('surat_id', 'surat_id', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }
}

/* End of file Surat.php */
/* Location: ./application/controllers/Surat.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-03-10 18:41:49 */
/* http://harviacode.com */
