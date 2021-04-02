<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        // API();
    }

    public function index()
    {
        $url = 'https://bioskop-api-zahirr.herokuapp.com/api/now-playing';

        // init cURL
        $ch = curl_init($url);

        // set to json
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

        $result = curl_exec($ch);

        curl_close($ch);

        $result = json_decode($result, true);

        $data['result'] = $result['result']['hasil'];
        $data['judul'] = 'Home';

        $this->load->view('templates/header', $data);
        $this->load->view('home/index', $data);
        $this->load->view('templates/footer');
    }
}
