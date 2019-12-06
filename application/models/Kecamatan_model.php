<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Kecamatan_model extends CI_Model
{

    public function viewByKota($id_kota)
    {
        $this->db->where('kabupaten_kota_id', $id_kota);
        $result = $this->db->get('kecamatan')->result_array(); // Tampilkan semua data kota berdasarkan id provinsi

        return $result;
    }
}
