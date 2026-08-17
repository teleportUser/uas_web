<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Buku extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Buku_model');
        $this->load->library('pagination');

        // Proteksi session
        if (!$this->session->userdata('logged_in')) {
            redirect('auth');
        }
    }

    public function index()
    {
        $keyword = $this->input->get('q');

        // Pagination config
        $config['base_url'] = base_url('buku/index');
        $config['total_rows'] = $this->Buku_model->count_all($keyword);
        $config['per_page'] = 5;
        $config['uri_segment'] = 3;
        $config['reuse_query_string'] = TRUE;

        // Styling pagination sederhana
        $config['full_tag_open'] = '<div class="pagination">';
        $config['full_tag_close'] = '</div>';
        $config['cur_tag_open'] = '<span class="current">';
        $config['cur_tag_close'] = '</span>';

        $this->pagination->initialize($config);

        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

        $data['buku'] = $this->Buku_model->get_all($config['per_page'], $page, $keyword);
        $data['pagination'] = $this->pagination->create_links();
        $data['keyword'] = $keyword;
        $data['nama'] = $this->session->userdata('nama');

        $this->load->view('buku/index', $data);
    }

    public function tambah()
    {
        $this->load->view('buku/tambah');
    }

    public function simpan()
    {
        $data = [
            'judul'        => $this->input->post('judul'),
            'penulis'      => $this->input->post('penulis'),
            'tahun_terbit' => $this->input->post('tahun_terbit'),
            'penerbit'     => $this->input->post('penerbit'),
            'stok'         => $this->input->post('stok')
        ];

        $this->Buku_model->insert($data);
        $this->session->set_flashdata('success', 'Buku berhasil ditambahkan');
        redirect('buku');
    }

    public function edit($id)
    {
        $data['buku'] = $this->Buku_model->get_by_id($id);
        $this->load->view('buku/edit', $data);
    }

    public function update($id)
    {
        $data = [
            'judul'        => $this->input->post('judul'),
            'penulis'      => $this->input->post('penulis'),
            'tahun_terbit' => $this->input->post('tahun_terbit'),
            'penerbit'     => $this->input->post('penerbit'),
            'stok'         => $this->input->post('stok')
        ];

        $this->Buku_model->update($id, $data);
        $this->session->set_flashdata('success', 'Buku berhasil diupdate');
        redirect('buku');
    }

    public function hapus($id)
    {
        $this->Buku_model->delete($id);
        $this->session->set_flashdata('success', 'Buku berhasil dihapus');
        redirect('buku');
    }
}
