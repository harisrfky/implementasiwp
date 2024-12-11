<?php
namespace App\Models;

use CodeIgniter\Model;

class bobotpreferensi_model extends Model
{
    protected $table = 'bobot_preferensi'; // Nama view di database Anda

    public function getBobotPreferensi()
    {
        $query = $this->db->query("SELECT * FROM bobot_preferensi");
        return $query->getResult(); // Kembalikan data dalam bentuk array of objects
    }
}
