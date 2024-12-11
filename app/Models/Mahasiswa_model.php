<?php
namespace App\Models;
use CodeIgniter\Model;

class Mahasiswa_model extends Model
{
    protected $table = 'dt_kriteria';

    function __construct()
    {
        $this->db = db_connect();
    }

    function tampildata()
    {
        $dataquery = $this->db->query("SELECT * FROM dt_kriteria");
        return $dataquery->getResult();
    }

    function tampildataalter()
    {
        $dataquery = $this->db->query("SELECT * FROM alternatif");
        return $dataquery->getResult();
    }

    public function tampilAlternatif()
    {
        return $this->db->table('alternatif')->get()->getResult();
    }


    function tampildatabobotpenilaian()
    {
        $dataquery = $this->db->query("SELECT * FROM bobot_penilaian");
        return $dataquery->getResult();
    }

    function tampildatabobot()
    {
        $dataquery = $this->db->query("SELECT bobot.value, dt_kriteria.kode_kriteria FROM bobot, dt_kriteria where bobot.id_kriteria=dt_kriteria.id_kriteria");
        return $dataquery->getResult();
    }
    public function tampildatamatriks()
    {
        $builder = $this->db->table('matriks');
        $builder->select('alternatif.id_alter, alternatif.kode_alter, dt_kriteria.id_kriteria, matriks.value');
        $builder->join('alternatif', 'matriks.id_alter = alternatif.id_alter');
        $builder->join('dt_kriteria', 'matriks.id_kriteria = dt_kriteria.id_kriteria');
        $builder->orderBy('alternatif.id_alter', 'ASC');
        $builder->orderBy('dt_kriteria.id_kriteria', 'ASC');
        return $builder->get()->getResult();
    }


}
