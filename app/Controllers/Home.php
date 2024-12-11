<?php

namespace App\Controllers;
use App\Models\Mahasiswa_model;
use App\Models\datakonversi_model;
use App\Models\normalisasi_model;
use App\Models\dataperankingan_model;

class Home extends BaseController
{

    public function viewKriteria()
    {
        $kr = new Mahasiswa_model();
        $datakriteria = $kr->tampildata();
        $data = array('datakriteria' => $datakriteria, );
        echo view("Admin_nav");
        echo view("Admin_header");
        echo view("viewKriteria", $data);
        echo view("Admin_footer");
    }

    public function viewAlternatif()
    {
        $alter = new Mahasiswa_model();
        $dataalternatif = $alter->tampildataalter();
        $data = array('dataalternatif' => $dataalternatif, );
        echo view("Admin_nav");
        echo view("Admin_header");
        echo view("viewAlternatif", $data);
        echo view("Admin_footer");
    }

    public function viewBobotPenilaian()
    {
        $bp = new Mahasiswa_model();
        $databobot = $bp->tampildatabobotpenilaian();
        $data = array('databobot' => $databobot, );
        echo view("Admin_nav");
        echo view("Admin_header");
        echo view("viewBobotPenilaian", $data);
        echo view("Admin_footer");
    }

    public function viewBobot()
    {
        $bp = new Mahasiswa_model();
        $databobot = $bp->tampildatabobot();
        $data = array('databobot' => $databobot, );
        echo view("Admin_nav");
        echo view("Admin_header");
        echo view("viewbobot", $data);
        echo view("Admin_footer");
    }

    public function viewMatriks()
    {
        $bp = new Mahasiswa_model();
        $datamatriks = $bp->tampildatamatriks(); // Data matriks dengan join
        $alternatif = $bp->tampilAlternatif();   // Hanya data alternatif unik
        $data = array(
            'datamatriks' => $datamatriks,
            'alternatif' => $alternatif
        );
        echo view("Admin_nav");
        echo view("Admin_header");
        echo view("viewMatriks", $data);
        echo view("Admin_footer");
    }


    public function callviewNormalisasi()
    {
        $model = new normalisasi_model();

        $dataNormalisasi = $model->tampilNormalisasi();

        $data = [
            'dataNormalisasi' => $dataNormalisasi,
        ];

        echo view('admin_nav');
        echo view('admin_header');
        echo view('viewNormalisasii', $data);
        echo view('admin_footer');
    }

    public function callbobotpreferensi()
    {
        // Memanggil model untuk mendapatkan data dari view
        $model = new \App\Models\bobotpreferensi_model(); // Pastikan model sudah dibuat
        $dataBobotPreferensi = $model->getBobotPreferensi(); // Fungsi untuk mengambil data dari view

        // Kirim data ke view
        $data = [
            'dataBobotPreferensi' => $dataBobotPreferensi,
        ];

        echo view('admin_nav');
        echo view('admin_header');
        echo view('viewbobotpreferensi', $data);
        echo view('admin_footer');
    }

    public function callperankingan()
    {
        // Memanggil model untuk mendapatkan data dari view
        $model = new \App\Models\perankingan_model(); // Pastikan model sudah dibuat
        $dataPerankingan = $model->getPerankingan(); // Fungsi untuk mengambil data dari view

        // Kirim data ke view
        $data = [
            'dataPerankingan' => $dataPerankingan,
        ];

        echo view('admin_nav');
        echo view('admin_header');
        echo view('viewperankingan', $data);
        echo view('admin_footer');
    }

    public function tambahalternatif()
    {
        return view('tambahalternatif'); // Mengarahkan ke view form input
    }

    public function simpanalternatif()
    {
        // Ambil nama alternatif dari input form
        $namaAlternatif = $this->request->getPost('nama_alternatif');

        // Koneksi ke database
        $db = db_connect();

        // Cari kode_alter terakhir
        $query = $db->query("SELECT kode_alter FROM alternatif ORDER BY LENGTH(kode_alter) DESC, kode_alter DESC LIMIT 1");
        $row = $query->getRow();

        // Default jika tidak ada data
        $lastCode = $row ? $row->kode_alter : 'A0';

        // Ekstrak angka terakhir dari kode_alter
        $lastNumber = (int) substr($lastCode, 1); // Ambil angka setelah "A"
        $newCode = 'A' . ($lastNumber + 1);     // Tambah 1 untuk kode baru

        // Simpan data baru dengan kode_alter yang sudah dihitung
        $db->table('alternatif')->insert([
            'kode_alter' => $newCode,
            'nm_alter' => $namaAlternatif
        ]);

        // Redirect ke halaman daftar alternatif
        return redirect()->to(base_url('Home/viewAlternatif'));
    }

    public function editalternatif($id_alter)
    {
        // Koneksi ke database
        $db = db_connect();

        // Ambil data alternatif berdasarkan ID
        $data['alternatif'] = $db->table('alternatif')->getWhere(['id_alter' => $id_alter])->getRow();

        // Tampilkan form edit dengan data alternatif yang sudah diambil
        return view('editalternatif', $data);
    }

    public function updatealternatif()
    {
        // Ambil data dari form
        $idAlter = $this->request->getPost('id_alter');
        $namaAlternatif = $this->request->getPost('nama_alternatif');

        // Koneksi ke database
        $db = db_connect();

        // Update data di database
        $db->table('alternatif')->update(
            ['nm_alter' => $namaAlternatif], // Data yang di-update
            ['id_alter' => $idAlter]        // Kondisi berdasarkan ID
        );

        // Redirect kembali ke halaman daftar alternatif
        return redirect()->to(base_url('Home/viewAlternatif'));
    }


    public function deletealternatif($id_alter)
    {
        // Koneksi ke database
        $db = db_connect();

        // Hapus data berdasarkan id_alter
        $db->table('alternatif')->delete(['id_alter' => $id_alter]);

        // Redirect kembali ke halaman daftar alternatif
        return redirect()->to(base_url('Home/viewAlternatif'));
    }

    public function tambahmatriks()
    {
        $db = db_connect();

        // Ambil data alternatif dan kriteria
        $data['alternatifs'] = $db->table('alternatif')->get()->getResult();
        $data['kriterias'] = $db->table('dt_kriteria')->get()->getResult();

        return view('tambahmatriks', $data);
    }



    public function simpanmatriks()
    {
        $db = db_connect();
        $matriksTable = $db->table('matriks');

        // Ambil input dari form
        $id_alter = $this->request->getPost('id_alter');
        $kriteriaValues = $this->request->getPost('kriteria'); // Berupa array dengan id_kriteria sebagai key dan value sebagai nilainya

        // Simpan setiap nilai kriteria untuk alternatif yang dipilih
        foreach ($kriteriaValues as $id_kriteria => $value) {
            $matriksTable->insert([
                'id_alter' => $id_alter,
                'id_kriteria' => $id_kriteria,
                'value' => $value,
            ]);
        }

        return redirect()->to(base_url('Home/viewMatriks'))->with('success', 'Data matriks berhasil disimpan!');
    }



    public function editmatriks($id_alter)
    {
        $db = db_connect();

        // Ambil data alternatif berdasarkan id_alter
        $data['alternatif'] = $db->table('alternatif')->getWhere(['id_alter' => $id_alter])->getRow();

        if (!$data['alternatif']) {
            return redirect()->to(base_url('Home/viewMatriks'))->with('error', 'Alternatif tidak ditemukan!');
        }

        // Ambil data kriteria
        $data['kriterias'] = $db->table('dt_kriteria')->get()->getResult();

        // Ambil nilai matriks untuk alternatif tersebut dan format dalam array
        $data['matriks'] = [];
        foreach ($db->table('matriks')->getWhere(['id_alter' => $id_alter])->getResult() as $row) {
            $data['matriks'][$row->id_kriteria] = $row;
        }

        return view('editmatriks', $data);
    }




    public function updatematriks()
    {
        $db = db_connect();
        $matriksTable = $db->table('matriks');

        // Ambil input dari form
        $id_alter = $this->request->getPost('id_alter');
        $kriteriaValues = $this->request->getPost('kriteria'); // Berupa array dengan id_kriteria sebagai key dan value sebagai nilainya

        // Validasi input
        if (empty($id_alter) || empty($kriteriaValues)) {
            return redirect()->back()->with('error', 'Data tidak lengkap! Mohon isi semua field.');
        }

        // Hapus data matriks lama untuk alternatif yang dipilih
        $matriksTable->where('id_alter', $id_alter)->delete();

        // Masukkan data matriks baru
        foreach ($kriteriaValues as $id_kriteria => $value) {
            $matriksTable->insert([
                'id_alter' => $id_alter,
                'id_kriteria' => $id_kriteria,
                'value' => $value,
            ]);
        }

        return redirect()->to(base_url('Home/viewMatriks'))->with('success', 'Data matriks berhasil diperbarui!');
    }

    public function deletematriks($id_alter)
    {
        $db = db_connect();

        // Validasi apakah data matriks untuk alternatif tersebut ada
        $matriks = $db->table('matriks')->getWhere(['id_alter' => $id_alter])->getRow();
        if (!$matriks) {
            return redirect()->to(base_url('Home/viewMatriks'))->with('error', 'Data tidak ditemukan!');
        }

        // Hapus data matriks berdasarkan id_alter
        $db->table('matriks')->delete(['id_alter' => $id_alter]);

        return redirect()->to(base_url('Home/viewMatriks'))->with('success', 'Data berhasil dihapus!');
    }


    public function editKriteria($id_kriteria)
    {
        $db = db_connect();
        $data['kriteria'] = $db->table('dt_kriteria')->getWhere(['id_kriteria' => $id_kriteria])->getRow();
        return view('editkriteria', $data);
    }

    public function updateKriteria()
    {
        $id_kriteria = $this->request->getPost('id_kriteria');
        $nm_kriteria = $this->request->getPost('nm_kriteria');
        $atribut = $this->request->getPost('atribut');

        $db = db_connect();
        $db->table('dt_kriteria')->update(
            [
                'nm_kriteria' => $nm_kriteria,
                'atribut' => $atribut,
            ],
            ['id_kriteria' => $id_kriteria]
        );

        return redirect()->to(base_url('Home/viewKriteria'))->with('success', 'Data berhasil diperbarui!');
    }

    public function deleteKriteria($id_kriteria)
    {
        $db = db_connect();
        $db->table('dt_kriteria')->delete(['id_kriteria' => $id_kriteria]);
        return redirect()->to(base_url('Home/viewKriteria'))->with('success', 'Data berhasil dihapus!');
    }






}
