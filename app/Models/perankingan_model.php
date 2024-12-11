<?php
namespace App\Models;

use CodeIgniter\Model;

class perankingan_model extends Model
{
    protected $table = 'perankingan';

    public function getPerankingan()
    {
        $query = $this->db->query("SELECT * FROM perankingan ORDER BY nilai_preferensi ASC");
        return $query->getResult();
    }
}
