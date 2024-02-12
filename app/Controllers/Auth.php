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
        $data['users'] =  $usermodel->findAll();

        return view('admin/User', $data);
    }

    public function login()
    {
        return view('login');
    }

    public function processLogin()
    {
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        $userModel = new UserModel();
        $user = $userModel->where('username', $username)->first();

        if ($user && password_verify($password, $user['password'])) {
            if ($user['role'] == 'admin') {
                return redirect()->to('admin/dashboard_admin');
            } elseif ($user['role'] == 'karyawan') {
                return redirect()->to('user/dashboard');
            }
        }

        // Autentikasi gagal, set flashdata error
        return redirect()->to('login')->with('error', 'Username atau password salah.');
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
            'password' => 'min_length[6]',
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

        $password = $this->request->getPost('password');
        if (!empty($password)) {
            $dataToUpdate['password'] = password_hash($password, PASSWORD_DEFAULT);
        }

        $userModel = new UserModel();
        $userModel->update($usersId, $dataToUpdate);

        return redirect()->to(site_url('admin/User'))->with('success', 'Data users berhasil diubah');
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
}
