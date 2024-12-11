<?php
namespace App\Models;
use CodeIgniter\Model;

class normalisasi_model extends Model
{
    protected $table = 'normalisasi_terbobot';

    public function __construct()
    {
        $this->db = db_connect();
    }

    /**
     * Fungsi untuk mengambil data normalisasi dari view
     * @return object
     */
    public function tampilNormalisasi()
    {
        $query = $this->db->query("SELECT * FROM normalisasi_terbobot");
        return $query->getResult(); // Mengembalikan hasil dalam bentuk objek
    }

    /**
     * Fungsi untuk menghitung total hasil WP
     * @return float 
     */
    public function totalNormalisasi()
    {
        // Query untuk menghitung total dari kolom hasil_wp
        $query = $this->db->query("SELECT SUM(hasil_wp) AS total_hasil FROM normalisasi_terbobot");
        $result = $query->getRow(); // Mengambil satu baris hasil query
        return $result->total_hasil ?? 0; // Jika null, kembalikan 0
    }
}
