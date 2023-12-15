<?php

class Auth extends CI_Controller
{
    public function index()
    {
        $this->form_validation->set_rules(
            'email',
            'Email',
            'required|trim|valid_email'
        );   
        $this->form_validation->set_rules(
            'password',
            'Password',
            'required|trim'
        );   

        $data['judul'] = 'Moral Login';
        if($this->form_validation->run() == false){
            $this->load->view('auth_templates/auth_header', $data);
            $this->load->view('autentifikasi/v_login');
            $this->load->view('auth_templates/auth_footer');
        }else{
            $this->_login();
        }
    }

    private function _login()
    {
        $email = htmlspecialchars($this->input->post('email', true));
        $password = $this->input->post('password', true);
        $user = $this->Rental_model->cekData(['email' => $email])->row_array();
        // usernya ada
        if($user){
            // jika usernya aktif
            if($user['is_active'] == 1){
                if(password_verify($password, $user['password'])){
                    $data = [
                        'id_user' => $user['id_user'],
                        'nama' => $user['nama'],
                        'email' => $user['email'],
                        'id_role' => $user['id_role']
                    ];
                    $this->session->set_userdata($data);
                    if ($user['id_role'] == 1) {
                        echo"<script>
                        alert('login berhasil');
                        window.location.href='http://localhost/moral-ci/admin/dashboard';
                        </script>";
                    } else {
                        $user['gambar_cust'] == 'default.png';
                        echo"<script>
                        alert('login berhasil');
                        window.location.href='http://localhost/moral-ci/user/dashboard';
                        </script>";
                    }
                    

                }else{
                    echo"<script>
                    alert('password salah');
                    window.location.href='http://localhost/moral-ci/auth';
                    </script>";
                }
            }else{
                echo"<script>
                alert('Belum Aktivasi');
                window.location.href='http://localhost/moral-ci/auth';
                </script>";
            }
            
        }else{
            echo"<script>
            alert('Tidak Ada akun');
            window.location.href='http://localhost/moral-ci/auth';
            </script>";
        }
    }
       

    public function register()
    {
        $this->form_validation->set_rules(
            'nama',
            'Nama Lengkap',
            'required',
            ['required' => 'Nama Belum diisi!!']
        );
        //membuat rule untuk inputan email agar tidak boleh kosong, tidak ada spasi, format email harus valid //dan email belum pernah dipakai sama user lain dengan membuat pesan error dengan bahasa sendiri //yaitu jika format email tidak benar maka pesannya 'Email Tidak Benar!!'. jika email belum diisi, //maka pesannya adalah 'Email Belum diisi', dan jika email yang diinput sudah dipakai user lain, //maka pesannya 'Email Sudah dipakai' 
        $this->form_validation->set_rules(
            'email',
            'Alamat Email',
            'required|trim|valid_email|is_unique[user.email]',
            ['valid_email' => 'Email Tidak Benar!!', 'required' => 'Email Belum diisi!!', 'is_unique' => 'Email Sudah Terdaftar!']
        );
        //membuat rule untuk inputan email agar tidak boleh kosong, tidak ada spasi, format email harus valid //dan email belum pernah dipakai sama user lain dengan membuat pesan error dengan bahasa sendiri //yaitu jika format email tidak benar maka pesannya 'Email Tidak Benar!!'. jika email belum diisi, //maka pesannya adalah 'Email Belum diisi', dan jika email yang diinput sudah dipakai user lain, //maka pesannya 'Email Sudah dipakai' 
        $this->form_validation->set_rules(
            'username',
            'Username',
            'required',
            ['required' => 'Username Belum diisi!!']
        );
        $this->form_validation->set_rules(
            'ktp',
            'KTP',
            'required|min_length[16]',
            ['required' => 'Nomor KTP Belum diisi!!', 'min_length' => 'NIK Terlalu Pendek']
        );
        $this->form_validation->set_rules(
            'no_hp',
            'Nomor HP',
            'required|min_length[12]',
            ['required' => 'Nomor HP Belum diisi!!', 'min_length' => 'Nomor HP Terlalu Pendek']
        );
        $this->form_validation->set_rules(
            'alamat',
            'Alamat',
            'required',
            ['required' => 'Alamat Belum diisi!!']
        );
        //membuat rule untuk inputan password agar tidak boleh kosong, tidak ada spasi, tidak boleh kurang dari //dari 3 digit, dan password harus sama dengan repeat password dengan membuat pesan error dengan //bahasa sendiri yaitu jika password dan repeat password tidak diinput sama, maka pesannya //'Password Tidak Sama'. jika password diisi kurang dari 3 digit, maka pesannya adalah //'Password Terlalu Pendek'. 
        $this->form_validation->set_rules(
            'password',
            'Password',
            'required|trim|min_length[3]|matches[cpassword]',
            ['matches' => 'Password Tidak Sama!!', 'min_length' => 'Password Terlalu Pendek']
        );
        $this->form_validation->set_rules('cpassword', 'Repeat Password', 'required|trim|matches[password]');
        //jika jida disubmit kemudian validasi form diatas tidak berjalan, maka akan tetap berada di //tampilan registrasi. tapi jika disubmit kemudian validasi form diatas berjalan, maka data yang //diinput akan disimpan ke dalam tabel user 
        if ($this->form_validation->run() == false) {
            $data['judul'] = 'Registrasi Customer';
            $this->load->view('auth_templates/auth_header', $data);
            $this->load->view('autentifikasi/v_register');
            $this->load->view('auth_templates/auth_footer');
        } else {
            $nama = $this->input->post('nama', true);
            $email = $this->input->post('email', true);
            $username = $this->input->post('username', true);
            $nik = $this->input->post('ktp', true);
            $notelp = $this->input->post('no_hp', true);
            $alamat = $this->input->post('alamat', true);
            $password = $this->input->post('password');
            $jk = $this->input->post('jekel');
            $data = [
                'nama' => htmlspecialchars($nama),
                'email' => htmlspecialchars($email),
                'username' => $username,
                'nik' => $nik,
                'no_telp' => $notelp,
                'alamat' => $alamat,
                'gambar_cust' => 'default.png',
                'password' => password_hash($password, PASSWORD_DEFAULT),
                'jenis_kelamin' => $jk,
                'id_role' => 2,
                'is_active' => 1
            ];
            $this->Rental_model->insert_data($data, 'user'); //menggunakan model 
            echo"<script>
            alert('Register Berhasil');
            window.location.href='http://localhost/moral-ci/auth';
            </script>";
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('id_user');
        $this->session->unset_userdata('nama');
        $this->session->unset_userdata('id_role');
        echo"<script>
        alert('logout berhasil');
        window.location.href='http://localhost/moral-ci/user/dashboard';
        </script>";
    }
}