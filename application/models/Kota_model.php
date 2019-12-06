<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Kota_model extends CI_Model
{

    public function viewByProvinsi($id_provinsi)
    {
        $this->db->where('provinsi_id', $id_provinsi);
        $result = $this->db->get('kabupaten_kota')->result_array(); // Tampilkan semua data kota berdasarkan id provinsi

        return $result;
    }
}
