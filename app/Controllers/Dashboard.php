<?php

namespace App\Controllers;
use App\Models\Mahasiswa_model;
use App\Models\datakonversi_model;
use App\Models\datanormalisasi_model;
use App\Models\dataperankingan_model;

class Dashboard extends BaseController
{
    public function index()
    {
        echo view("Admin_nav");
        echo view("Admin_header");
        echo view("dashboard_view");
        echo view("Admin_footer");
    }

}