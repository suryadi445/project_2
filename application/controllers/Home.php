<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('Home_model');
        API();
    }

    public function index()
    {
        $data['result'] = API()['result']['hasil'];
        $data['judul'] = 'Home';

        $data['pesan'] = $this->Home_model->getPesan();

        $this->load->view('templates/header', $data);
        $this->load->view('home/index', $data);
        $this->load->view('templates/footer');
    }

    public function kirim_pesan()
    {
        // jika belum login tidak bisa kirim komentar
        $session = $this->session->userdata('email');
        if (!$session) {
?>
            <script script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>

            <body></body>
            <script>
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Anda harus login terlebih dahulu untuk mengirim pesan.',
                })
            </script>
        <?php
        }

        $nama = $this->input->post('nama');
        $email = $this->input->post('email');
        $phone = $this->input->post('phone');
        $pesan = $this->input->post('pesan');

        $data = [
            'nama'  => $nama,
            'email' => $email,
            'phone' => $phone,
            'pesan' => $pesan
        ];

        $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
        $this->form_validation->set_rules('phone', 'Phone', 'required|trim|numeric');
        $this->form_validation->set_rules('pesan', 'Pesan', 'required|trim');

        if ($this->form_validation->run() == false) {
        ?>
            <script script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>

            <body></body>
            <script>
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Anda harus mengisi semua field sebelum mengirim pesan.',
                })
            </script>
<?php
            $data['result'] = API()['result']['hasil'];
            $data['judul'] = 'Home';

            $this->load->view('templates/header', $data);
            $this->load->view('home/index', $data);
            $this->load->view('templates/footer');
        } else {
            // insert kedalam tabel users
            $this->Home_model->insert($data);

            $this->_sendEmail();
            $this->_sendEmailToMe();

            $this->session->set_flashdata('alert_sukses', 'Yeayy, Berhasil..!!');
            $this->session->set_flashdata('sukses', 'Terima kasih, pesan Anda sudah tersimpan');

            redirect('home');
        };
    }

    private function _sendEmail()
    {
        // konfigurasi untuk library email CI
        $config = [
            'protocol'      => 'smtp',
            'smtp_host'     => 'ssl://smtp.googlemail.com',
            'smtp_user'     => 'suryadi.sender@gmail.com',
            'smtp_pass'     => 'mahasiwa',
            'smtp_port'     => 465,
            'mailtype'      => 'html',
            'charset'       => 'utf-8',
            'newline'       => "\r\n"
        ];
        // load library email
        $this->load->library('email', $config);
        // email pengirimnya
        $this->email->from('suryadi.sender@gmail.com', 'Suryadi');
        // email penerima atau email yg digunakan untuk registrasi
        $this->email->to($this->input->post('email'));
        $this->email->subject('Thanks for your comment');
        $this->email->message('Terima kasih telah berkontribusi untuk mengisi komentar pada website kami. Semoga ini menjadi masukkan yang baik untuk perkembangan kami.' . '<br>' . 'Salam hangat' . '<br>' . 'Suryadi');


        // jika email terkirim
        if ($this->email->send()) {
            // mengembalikan jika nilainya benar
            return true;
        } else {
            // menghentikan program dan menampilkan pesan kesalahan jika email tidak terkirim
            echo $this->email->print_debugger();
            die;
        }
    }

    private function _sendEmailToMe()
    {
        // konfigurasi untuk library email CI
        $config = [
            'protocol'      => 'smtp',
            'smtp_host'     => 'ssl://smtp.googlemail.com',
            'smtp_user'     => 'suryadi.sender@gmail.com',
            'smtp_pass'     => 'mahasiwa',
            'smtp_port'     => 465,
            'mailtype'      => 'html',
            'charset'       => 'utf-8',
            'newline'       => "\r\n"
        ];
        // load library email
        $this->load->library('email', $config);
        // email pengirimnya
        $this->email->from('suryadi.sender@gmail.com', 'Suryadi');
        // email penerima atau email yg digunakan untuk registrasi
        $this->email->to('Suryadi_fb@yahoo.com');
        $this->email->subject('Komentar Baru');
        $this->email->message('Nama : ' . $this->input->post('nama') . '<br>' . 'Email : ' . $this->input->post('email') . '<br>'  . 'Phone : ' . $this->input->post('phone') . '<br>'  . 'Pesan : ' . $this->input->post('pesan'));


        // jika email terkirim
        if ($this->email->send()) {
            // mengembalikan jika nilainya benar
            return true;
        } else {
            // menghentikan program dan menampilkan pesan kesalahan jika email tidak terkirim
            echo $this->email->print_debugger();
            die;
        }
    }
}
