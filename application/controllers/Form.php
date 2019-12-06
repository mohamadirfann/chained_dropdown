<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Form extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        $this->load->model('Provinsi_model');
        $this->load->model('Kota_model');
        $this->load->model('Kecamatan_model');
        $this->load->model('Kelurahan_model');
    }
    public function index()
    {
        $data['provinsi'] = $this->Provinsi_model->view();

        $this->load->view('form', $data);
    }

    public function listKota()
    {
        // Ambil data ID Provinsi yang dikirim via ajax post
        $id_provinsi = $this->input->post('id_provinsi');


        $kota = $this->Kota_model->viewByProvinsi($id_provinsi);
        // // Buat variabel untuk menampung tag-tag option nya
        // // Set defaultnya dengan tag option Pilih
        // $result = $this->db->query("SELECT * FROM kabupaten_kota where provinsi_id=2");

        $lists = "<option value='' disabled>Pilih</option>";

        foreach ($kota as $data) {
            $lists .= "<option value='" . $data["id"] . "'>" . $data["nama"] . "</option>"; // Tambahkan tag option ke variabel $lists

        }

        // echo $lists;

        $callback = array('list_kota' => $lists); // Masukan variabel lists tadi ke dalam array $callback dengan index array : list_kota
        echo json_encode($callback); // konversi varibael $callback menjadi JSON
    }

    public function listKecamatan()
    {
        // Ambil data ID Provinsi yang dikirim via ajax post
        $id_kota = $this->input->post('id_kota');


        $kecamatan = $this->Kecamatan_model->viewByKota($id_kota);
        // // Buat variabel untuk menampung tag-tag option nya
        // // Set defaultnya dengan tag option Pilih
        // $result = $this->db->query("SELECT * FROM kabupaten_kota where provinsi_id=2");

        $lists = "<option value='' disabled>Pilih</option>";

        foreach ($kecamatan as $data) {
            $lists .= "<option value='" . $data["id"] . "'>" . $data["nama"] . "</option>"; // Tambahkan tag option ke variabel $lists

        }

        // echo $lists;

        $callback = array('list_kecamatan' => $lists); // Masukan variabel lists tadi ke dalam array $callback dengan index array : list_kota
        echo json_encode($callback); // konversi varibael $callback menjadi JSON
    }

    public function listKelurahan()
    {
        // Ambil data ID Provinsi yang dikirim via ajax post
        $id_kecamatan = $this->input->post('id_kecamatan');


        $kelurahan = $this->Kelurahan_model->viewByKecamatan($id_kecamatan);
        // // Buat variabel untuk menampung tag-tag option nya
        // // Set defaultnya dengan tag option Pilih
        // $result = $this->db->query("SELECT * FROM kabupaten_kota where provinsi_id=2");

        $lists = "<option value='' disabled>Pilih</option>";

        foreach ($kelurahan as $data) {
            $lists .= "<option value='" . $data["id"] . "'>" . $data["nama"] . "</option>"; // Tambahkan tag option ke variabel $lists

        }

        // echo $lists;

        $callback = array('list_kelurahan' => $lists); // Masukan variabel lists tadi ke dalam array $callback dengan index array : list_kota
        echo json_encode($callback); // konversi varibael $callback menjadi JSON
    }
}
