<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Kelurahan_model extends CI_Model
{

    public function viewByKecamatan($id_kecamatan)
    {
        $this->db->where('kecamatan_id', $id_kecamatan);
        $result = $this->db->get('kelurahan')->result_array(); // Tampilkan semua data kota berdasarkan id provinsi

        return $result;
    }
}
