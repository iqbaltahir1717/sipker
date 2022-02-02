<?php

use function GuzzleHttp\Psr7\str;

defined('BASEPATH') or exit('No direct script access allowed');
class Result extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_kuisioner');
        $this->load->model('m_kuisioner2');
        $this->load->model('m_result');
        $this->load->model('m_indicator');
        if (!$this->session->userdata('user_id') or $this->session->userdata('user_group') != 1) {
            // ALERT
            $alertStatus  = 'failed';
            $alertMessage = 'Anda tidak memiliki Hak Akses atau Session anda sudah habis';
            getAlert($alertStatus, $alertMessage);
            redirect('admin/dashboard');
        }
    }


    public function index()
    {

        //DATA
        $data['setting'] = getSetting();
        $data['title']   = 'Hasil Survey';
        $total  = $this->m_result->count_pengisi();

        //tabel_kepuasan_tangible
        foreach ($this->m_result->method_ipa(1) as $s) {
            $x = ((1 * $s->total_stp + (2 * $s->total_tp) + (3 * $s->total_c) + (4 * $s->total_p) + (5 * $s->total_sp)) / $total);

            $data["nilai"][] = [$s->pertanyaan_kuisioner, round($x, 2), $s->id_kuisioner];
            $data["average"][] = $x;
        }
        $z = ($data["average"]);
        $ar_tang = round(array_sum($z) / count($z), 2);
        $data["ar_tang"] = strval($ar_tang);

        //tabel_kepuasan_reability
        foreach ($this->m_result->method_ipa(2) as $s) {
            $x = ((1 * $s->total_stp + (2 * $s->total_tp) + (3 * $s->total_c) + (4 * $s->total_p) + (5 * $s->total_sp)) / $total);

            $data["nilai2"][] = [$s->pertanyaan_kuisioner, round($x, 2), $s->id_kuisioner];
            $data["average2"][] = $x;
        }
        $z2 = ($data["average2"]);
        $ar_reab = round(array_sum($z2) / count($z2), 2);
        $data["ar_reab"] = strval($ar_reab);

        //tabel_kepuasan_responsivness
        foreach ($this->m_result->method_ipa(3) as $s) {

            $x = ((1 * $s->total_stp + (2 * $s->total_tp) + (3 * $s->total_c) + (4 * $s->total_p) + (5 * $s->total_sp)) / $total);

            $data["nilai3"][] = [$s->pertanyaan_kuisioner, round($x, 2), $s->id_kuisioner];
            $data["average3"][] = $x;
        }
        $z3 = ($data["average3"]);
        $ar_resp = round(array_sum($z3) / count($z3), 2);
        $data["ar_resp"] = strval($ar_resp);

        //tabel_kepuasan_assurance
        foreach ($this->m_result->method_ipa(4) as $s) {

            $x = ((1 * $s->total_stp + (2 * $s->total_tp) + (3 * $s->total_c) + (4 * $s->total_p) + (5 * $s->total_sp)) / $total);

            $data["nilai4"][] = [$s->pertanyaan_kuisioner, round($x, 2), $s->id_kuisioner];
            $data["average4"][] = $x;
        }
        $z4 = ($data["average4"]);
        $ar_assr = round(array_sum($z4) / count($z4), 2);
        $data["ar_assr"] = strval($ar_assr);

        //tabel_kepuasan_empathy
        foreach ($this->m_result->method_ipa(5) as $s) {

            $x = ((1 * $s->total_stp + (2 * $s->total_tp) + (3 * $s->total_c) + (4 * $s->total_p) + (5 * $s->total_sp)) / $total);

            $data["nilai5"][] = [$s->pertanyaan_kuisioner, round($x, 2), $s->id_kuisioner];
            $data["average5"][] = $x;
        }
        $z5 = ($data["average5"]);
        $ar_empt = round(array_sum($z5) / count($z5), 2);
        $data["ar_empt"] = strval($ar_empt);



        //tabel_kepentingan_tangible
        foreach ($this->m_result->method_ipa2(1) as $s) {
            $x = ((1 * $s->total_stp + (2 * $s->total_tp) + (3 * $s->total_c) + (4 * $s->total_p) + (5 * $s->total_sp)) / $total);

            $data["nilai_a"][] = [$s->pertanyaan_kuisioner, round($x, 2), $s->id_kuisioner];
            $data["average_a"][] = $x;
        }
        $g = ($data["average_a"]);
        $ar_tang1 = round(array_sum($g) / count($g), 2);
        $data["ar_tang1"] = strval($ar_tang1);

        // echo "<pre>";
        // print_r($data["ar_tang1"]);
        // echo "</pre>";
        // die;

        //tabel_kepentingan_reability
        foreach ($this->m_result->method_ipa2(2) as $s) {
            $x = ((1 * $s->total_stp + (2 * $s->total_tp) + (3 * $s->total_c) + (4 * $s->total_p) + (5 * $s->total_sp)) / $total);

            $data["nilai_a2"][] = [$s->pertanyaan_kuisioner, round($x, 2), $s->id_kuisioner];
            $data["average_a2"][] = $x;
        }
        $g2 = ($data["average_a2"]);
        $ar_reab1 = round(array_sum($g2) / count($g2), 2);
        $data["ar_reab1"] = strval($ar_reab1);

        //tabel_kepentingan_responsivness
        foreach ($this->m_result->method_ipa2(3) as $s) {
            $x = ((1 * $s->total_stp + (2 * $s->total_tp) + (3 * $s->total_c) + (4 * $s->total_p) + (5 * $s->total_sp)) / $total);

            $data["nilai_a3"][] = [$s->pertanyaan_kuisioner, round($x, 2), $s->id_kuisioner];
            $data["average_a3"][] = $x;
        }
        $g3 = ($data["average_a3"]);
        $ar_resp1 = round(array_sum($g3) / count($g3), 2);
        $data["ar_resp1"] = strval($ar_resp1);

        //tabel_kepentingan_assr
        foreach ($this->m_result->method_ipa2(4) as $s) {
            $x = ((1 * $s->total_stp + (2 * $s->total_tp) + (3 * $s->total_c) + (4 * $s->total_p) + (5 * $s->total_sp)) / $total);

            $data["nilai_4"][] = [$s->pertanyaan_kuisioner, round($x, 2), $s->id_kuisioner];
            $data["average_a4"][] = $x;
        }
        $g4 = ($data["average_a4"]);
        $ar_assr1 = round(array_sum($g4) / count($g4), 2);
        $data["ar_assr1"] = strval($ar_assr1);

        //tabel_kepentingan_empathy
        foreach ($this->m_result->method_ipa2(5) as $s) {
            $x = ((1 * $s->total_stp + (2 * $s->total_tp) + (3 * $s->total_c) + (4 * $s->total_p) + (5 * $s->total_sp)) / $total);

            $data["nilai_a5"][] = [$s->pertanyaan_kuisioner, round($x, 2), $s->id_kuisioner];
            $data["average_a5"][] = $x;
        }
        $g5 = ($data["average_a5"]);
        $ar_empt1 = round(array_sum($g5) / count($g5), 2);
        $data["ar_empt1"] = strval($ar_empt1);


        //serqual score tangible
        // echo '<pre>';
        // print_r($this->m_result->method_ipa(1));
        // echo '</pre>';

        // echo '<pre>';
        // print_r($this->m_result->method_ipa2(1));
        // echo '</pre>';

        // die;
        $s = $this->m_result->method_ipa(1);
        $k = $this->m_result->method_ipa2(1);
        for ($i = 0; $i < count($s); $i++) {
            $x = ((1 * $s[$i]->total_stp + (2 * $s[$i]->total_tp) + (3 * $s[$i]->total_c) + (4 * $s[$i]->total_p) + (5 * $s[$i]->total_sp)) / $total);

            $y = ((1 * $k[$i]->total_stp + (2 * $k[$i]->total_tp) + (3 * $k[$i]->total_c) + (4 * $k[$i]->total_p) + (5 * $k[$i]->total_sp)) / $total);
            $gap = $x - $y;
            $persentase = ($x / $y) * 100;

            $data["serqual"][] = [round($x, 2), round($y, 2), round($gap, 2), round($persentase, 2)];
            $data["average_r"][] = $persentase;
        }
        // foreach ($this->m_result->method_ipa(1) as $s) {
        //     $x = ((1 * $s->total_stp + (2 * $s->total_tp) + (3 * $s->total_c) + (4 * $s->total_p) + (5 * $s->total_sp)) / $total);
        //     foreach ($this->m_result->method_ipa2(1) as $k) {
        //         $y = ((1 * $k->total_stp + (2 * $k->total_tp) + (3 * $k->total_c) + (4 * $k->total_p) + (5 * $k->total_sp)) / $total);
        //         $gap = $x - $y;
        //         $persentase = ($x / $y) * 100;
        //     }
        //     $data["serqual"][] = [round($x, 2), round($y, 2), round($gap, 2), round($persentase, 2)];
        //     $data["average_r"][] = $persentase;
        // }
        $b = ($data["average_r"]);
        $sr_tang1 = round(array_sum($b) / count($b), 2);
        $data["sr_tang1"] = strval($sr_tang1);

        //serqual score realibilty
        foreach ($this->m_result->method_ipa(2) as $s) {
            $x = ((1 * $s->total_stp + (2 * $s->total_tp) + (3 * $s->total_c) + (4 * $s->total_p) + (5 * $s->total_sp)) / $total);
            foreach ($this->m_result->method_ipa2(2) as $k) {
                $y = ((1 * $k->total_stp + (2 * $k->total_tp) + (3 * $k->total_c) + (4 * $k->total_p) + (5 * $k->total_sp)) / $total);
                $gap = $x - $y;
                $persentase = ($x / $y) * 100;
            }
            $data["serqual2"][] = [round($x, 2), round($y, 2), round($gap, 2), round($persentase, 2)];
            $data["average_r2"][] = $persentase;
        }
        $b2 = ($data["average_r2"]);
        $sr_real1 = round(array_sum($b2) / count($b2), 2);
        $data["sr_real1"] = strval($sr_real1);

        //serqual score resp
        foreach ($this->m_result->method_ipa(3) as $s) {
            $x = ((1 * $s->total_stp + (2 * $s->total_tp) + (3 * $s->total_c) + (4 * $s->total_p) + (5 * $s->total_sp)) / $total);
            foreach ($this->m_result->method_ipa2(3) as $k) {
                $y = ((1 * $k->total_stp + (2 * $k->total_tp) + (3 * $k->total_c) + (4 * $k->total_p) + (5 * $k->total_sp)) / $total);
                $gap = $x - $y;
                $persentase = ($x / $y) * 100;
            }
            $data["serqual3"][] = [round($x, 2), round($y, 2), round($gap, 2), round($persentase)];
            $data["average_r3"][] = $persentase;
        }
        $b3 = ($data["average_r3"]);
        $sr_resp1 = round(array_sum($b3) / count($b3), 2);
        $data["sr_resp1"] = strval($sr_resp1);

        //serqual score assr
        foreach ($this->m_result->method_ipa(4) as $s) {
            $x = ((1 * $s->total_stp + (2 * $s->total_tp) + (3 * $s->total_c) + (4 * $s->total_p) + (5 * $s->total_sp)) / $total);
            foreach ($this->m_result->method_ipa2(4) as $k) {
                $y = ((1 * $k->total_stp + (2 * $k->total_tp) + (3 * $k->total_c) + (4 * $k->total_p) + (5 * $k->total_sp)) / $total);
                $gap = $x - $y;
                $persentase = ($x / $y) * 100;
            }
            $data["serqual4"][] = [round($x, 2), round($y, 2), round($gap, 2), round($persentase)];
            $data["average_r4"][] = $persentase;
        }
        $b4 = ($data["average_r4"]);
        $sr_assr1 = round(array_sum($b4) / count($b4), 2);
        $data["sr_assr1"] = strval($sr_assr1);

        //serqual score empt
        foreach ($this->m_result->method_ipa(5) as $s) {
            $x = ((1 * $s->total_stp + (2 * $s->total_tp) + (3 * $s->total_c) + (4 * $s->total_p) + (5 * $s->total_sp)) / $total);
            foreach ($this->m_result->method_ipa2(5) as $k) {
                $y = ((1 * $k->total_stp + (2 * $k->total_tp) + (3 * $k->total_c) + (4 * $k->total_p) + (5 * $k->total_sp)) / $total);
                $gap = $x - $y;
                $persentase = ($x / $y) * 100;
            }
            $data["serqual5"][] = [round($x, 2), round($y, 2), round($gap, 2), round($persentase)];
            $data["average_r5"][] = $persentase;
            // echo "<pre>";
            // print_r($data["serqual5"]);
            // echo "</pre>";
            // die;
        }
        $b5 = ($data["average_r5"]);
        $sr_empt1 = round(array_sum($b5) / count($b5), 2);
        $data["sr_empt1"] = strval($sr_empt1);

        // TEMPLATE
        $view         = "_backend/kuisioner/kuisioner_result";
        $viewCategory = "all";
        renderTemplate($data, $view, $viewCategory);
    }
}
