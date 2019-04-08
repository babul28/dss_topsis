<?php
defined('BASEPATH') or exit('No direct script access allowed');

class DataController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('dataInput');
        $this->load->helper('analisisTopsis');
    }

    /**
     * Fungsi Dashboard
     *
     * @return void
     */
    public function index()
    {
        $data = [
            'data' => data_v($this->db->get('data_fuzzy')->result())
        ];

        $this->load->view('Admin/header', [
            'header' => 'Admin | Dashboard'
        ]);
        $this->load->view('Admin/dashboard', $data);
        $this->load->view('Admin/footer');
    }

    /**
     * Fungsi Menampilkan Data (View)
     *
     * @return void
     */
    public function data()
    {
        $data = [
            'surveys' => getDataInput($this->db->get('data_survey')
                ->result()),
            'fuzzys' => $this->db->get('data_fuzzy')
                ->result()
        ];

        $this->load->view('Admin/header', [
            'header' => 'Admin | Data'
        ]);
        $this->load->view('Admin/data', $data);
        $this->load->view('Admin/footer');
    }

    /**
     * Fungsi Analisis
     *
     * @return void
     */
    public function analisis()
    {
        $data['data'] = $this->db->get('data_fuzzy')
            ->result();

        $data['data_y'] = data_y($data['data']);

        $data['data_solusi'] = solusi_ideal($data['data_y']);

        $data['data_d'] = data_d($data['data_y'], $data['data_solusi']);

        $data['data_v'] = data_v($data['data']);

        $this->load->view('Admin/header', [
            'header' => 'Admin | Analisis Data'
        ]);
        $this->load->view('Admin/analisis', $data);
        $this->load->view('Admin/footer');
    }

    /**
     * Fungsi tambah data
     *
     * @return void
     */
    public function create()
    {
        $config = [
            [
                'field' => 'lokasi',
                'label' => 'Lokasi',
                'rules' => 'trim|required'
            ],
            [
                'field' => 'Htanah',
                'label' => 'Harga Tanah',
                'rules' => 'trim|required|numeric'
            ],
            [
                'field' => 'Jgudang',
                'label' => 'Jarak Gudang',
                'rules' => 'trim|required|numeric'
            ],
            [
                'field' => 'Tpersaingan',
                'label' => 'Tingkat Persaingan',
                'rules' => 'trim|required'
            ],
            [
                'field' => 'investasi',
                'label' => 'Investasi',
                'rules' => 'trim|required|numeric|greater_than_equal_to[0]|less_than_equal_to[100]'
            ],
            [
                'field' => 'Jpeternak',
                'label' => 'Jumlah Peternak',
                'rules' => 'trim|required|greater_than_equal_to[0]|numeric'
            ]
        ];

        $this->form_validation->set_rules($config);

        if ($this->form_validation->run() == false) {
            $this->form_validation->set_error_delimiters('<span class="text-danger text-xs">', '</span>');

            $this->load->view('Admin/header', [
                'header' => 'Admin | Tambah Data'
            ]);
            $this->load->view('Admin/create');
            $this->load->view('Admin/footer');
        } else {
            $this->db->insert('data_fuzzy', dataToFuzzy($this->input->post()));
            $this->db->insert('data_survey', dataInput($this->input->post()));

            if ($this->db->affected_rows()) {
                $this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert">Input data sukses!</div>');
                redirect('admin/data');
            } else {
                $this->session->set_flashdata('msg', '<div class="alert alert-danger" role="alert">Input data gagal!</div>');
                redirect('admin/data');
            }
        }
    }

    public function coba()
    {
        data_v($this->db->get('data_fuzzy')->result());
    }
}
