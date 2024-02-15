<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\UserModel;

class Auth extends BaseController
{
    public function index()
    {
        $usermodel = new UserModel();
        $keyword = $this->request->getVar('keyword');

        if ($keyword) {
            $data['users'] = $usermodel->search($keyword);
        } else {
            $data['users'] = $usermodel->findAll();
        }

        $data['keyword'] = $keyword;

        return view('admin/User', $data);
    }

    public function login()
    {
        return view('login');
    }

    public function processLogin()
    {
        $loginInput = $this->request->getPost('username'); // assuming it can be either email or username
        $password = $this->request->getPost('password');

        $userModel = new UserModel();

        if (filter_var($loginInput, FILTER_VALIDATE_EMAIL)) {
            $user = $userModel->where('email', $loginInput)->first();
        } else {
            $user = $userModel->where('username', $loginInput)->first();
        }

        if ($user && password_verify($password, $user['password'])) {
            if ($user['role'] == 'admin') {
                return redirect()->to('admin/dashboard_admin');
            } elseif ($user['role'] == 'karyawan') {
                return redirect()->to('user/dashboard');
            }
        }

        return redirect()->to('login')->with('error', 'Email atau username atau password salah.');
    }


    public function tambah_akun()
    {
        return view('admin/halaman_tambah_akun');
    }

    public function simpanAkun()
    {
        $userModel = new UserModel();

        $validationRules = [
            'username' => 'required|is_unique[users.username]',
            'email' => 'required|valid_email|is_unique[users.email]',
            'nama' => 'required',
            'telp' => 'required',
            'password' => 'required|min_length[6]',
            'konfirmpassword' => 'required|matches[password]',
            'role' => 'required',
        ];

        $validationMessages = [
            'username' => [
                'is_unique' => 'Username sudah digunakan.',
            ],
            'email' => [
                'is_unique' => 'Email sudah digunakan.',
                'valid_email' => 'Format email tidak valid.',
            ],
            'password' => [
                'min_length' => 'Password minimal harus memiliki panjang 6 karakter.',
            ],
        ];

        if (!$this->validate($validationRules, $validationMessages)) {
            return view('admin/halaman_tambah_akun', ['errors' => $this->validator->getErrors()]);
        }

        $data = [
            'username' => $this->request->getPost('username'),
            'email' => $this->request->getPost('email'),
            'nama' => $this->request->getPost('nama'),
            'telp' => $this->request->getPost('telp'),
            'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
            'role' => $this->request->getPost('role'),
        ];

        $userModel->insert($data);

        return redirect()->to(site_url('admin/User'));
    }

    public function editusers($usersId)
    {
        $userModel = new UserModel();
        $data['users'] = $userModel->find($usersId);

        if (empty($data['users'])) {
            return redirect()->to(site_url('admin/User'))->with('error', 'users tidak ditemukan');
        }

        return view('admin/edit_user', $data);
    }

    public function updateusers($usersId)
    {
        $validation = \Config\Services::validation();
        $validation->setRules([
            'username' => 'required|is_unique[users.username,username,' . $usersId . ']',
            'email' => 'required|valid_email|is_unique[users.email,username,' . $usersId . ']',
            'nama' => 'required',
            'telp' => 'required',
            'role' => 'required',
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->to("admin/edit_user/$usersId")->withInput()->with('errors', $validation->getErrors());
        }

        $dataToUpdate = [
            'username' => $this->request->getPost('username'),
            'email' => $this->request->getPost('email'),
            'nama' => $this->request->getPost('nama'),
            'telp' => $this->request->getPost('telp'),
            'role' => $this->request->getPost('role'),
        ];

        $userModel = new UserModel();
        $userModel->update($usersId, $dataToUpdate);

        return redirect()->to(site_url('admin/User'))->with('success', 'Data users berhasil diubah');
    }

    public function update_password($username)
    {
        $userModel = new UserModel();
        $data['users'] = $userModel->where('username', $username)->first();

        if (empty($data['users'])) {
            return redirect()->to(site_url('admin/User'))->with('error', 'User tidak ditemukan');
        }

        return view('admin/ubah_password', $data);
    }

    public function save_password($username)
    {
        $validation = \Config\Services::validation();
        $validation->setRules([
            'password' => 'required|min_length[8]',
        ]);


        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->to("admin/update_password/{$username}")
                ->withInput()
                ->with('errors', $validation->getErrors());
        }

        $newPassword = $this->request->getPost('password');

        $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);
        $userModel = new UserModel();
        $userModel->update($username, ['password' => $hashedPassword]);

        return redirect()->to(site_url('admin/User'))->with('success', 'Password berhasil diubah');
    }



    public function deleteusers($usersId)
    {
        $userModel = new UserModel();
        $users = $userModel->find($usersId);

        if (empty($users)) {
            return redirect()->to(site_url('admin/User'))->with('error', 'users tidak ditemukan');
        }

        $userModel->delete($usersId);

        return redirect()->to(site_url('admin/User'))->with('success', 'Data users berhasil dihapus');
    }
    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }
}
