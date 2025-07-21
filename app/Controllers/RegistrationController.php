<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Majors;
use App\Models\Registrations;
use App\Models\RegistrationsMTU;
use CodeIgniter\HTTP\ResponseInterface;

class RegistrationController extends BaseController
{
    public function regisReg()
    {
        $majorsModel = new Majors();
        $majors = $majorsModel->findAll();

        return view('registration', [
            'page' => 'register-reg',
            'majors' => $majors
        ]);
        // return view('registration', ['majors' => $majors]);
    }

    public function regisMTU()
    {
        $majorsModel = new Majors();
        $majors = $majorsModel->findAll();

        return view('registration', [
            'page' => 'register-mtu',
            'majors' => $majors
        ]);
        // return view('registration', ['majors' => $majors]);
    }

    public function dataReg()
    {
        $registrationsModel = new Registrations();
        $data = $registrationsModel->findAll();

        $majorsModel = new Majors();
        $majors = $majorsModel->findAll();

        return view('pages/admin/dashboard', [
            'page' => 'data_reg',
            'majors' => $majors,
            'data' => $data
        ]);
    }

    public function dataMTU()
    {
        $registrationsModel = new RegistrationsMTU();
        $data = $registrationsModel->findAll();

        $majorsModel = new Majors();
        $majors = $majorsModel->findAll();

        return view('pages/admin/dashboard', [
            'page' => 'data_mtu',
            'majors' => $majors,
            'data' => $data
        ]);
    }

    public function storeReg()
    {
        // 1. Validasi CAPTCHA
        $recaptchaResponse = $this->request->getPost('g-recaptcha-response');
        $secretKey = '6LfE_ogrAAAAAN84gtu1UFNeEB6MxCubX0MyuTV7';

        $verify = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret={$secretKey}&response={$recaptchaResponse}");
        $response = json_decode($verify);

        if (!$response->success) {
            return redirect()->back()->withInput()->with('error', 'Verifikasi CAPTCHA gagal.');
        }

        $registrationsModel = new Registrations();

        // Ambil data inputan form
        $data = [
            'nama_lengkap' => $this->request->getPost('nama_lengkap'),
            'nik' => $this->request->getPost('nik'),
            'no_kk' => $this->request->getPost('no_kk'),
            'tempat_lahir' => $this->request->getPost('tempat_lahir'),
            'tanggal_lahir' => $this->request->getPost('tanggal_lahir'),
            'jenis_kelamin' => $this->request->getPost('jenis_kelamin'),
            'no_telepon' => $this->request->getPost('no_telepon'),
            'pendidikan' => $this->request->getPost('pendidikan'),
            'tahun_lulus' => $this->request->getPost('tahun_lulus'),
            'pekerjaan' => $this->request->getPost('pekerjaan'),
            'email' => $this->request->getPost('email'),
            'major_id' => $this->request->getPost('major_id'),
            'nama_jalan' => $this->request->getPost('nama_jalan'),
            'rt' => $this->request->getPost('rt'),
            'rw' => $this->request->getPost('rw'),
            'kota' => $this->request->getPost('kota'),
            'kecamatan' => $this->request->getPost('kecamatan'),
            'kelurahan' => $this->request->getPost('kelurahan'),
            'provinsi' => $this->request->getPost('provinsi'),
            'uk_baju_sepatu' => $this->request->getPost('uk_baju_sepatu'),
            'is_difabel' => $this->request->getPost('is_difabel') ? 1 : 0,
            'created_at' => date('Y-m-d H:i:s'),
        ];

        // Simpan dulu ke database untuk mendapatkan ID
        if ($registrationsModel->insert($data)) {
            $id = $registrationsModel->getInsertID();
            $nama = $data['nama_lengkap'];
            $namaSanitized = strtolower(preg_replace('/[^a-zA-Z0-9]/', '-', $nama));
            $folderName = FCPATH . "uploads/data-regist/reg/{$namaSanitized}-data-{$id}";

            if (!is_dir($folderName)) {
                mkdir($folderName, 0775, true);
            }

            // Daftar file yang akan di-upload
            $fileFields = [
                'pas_foto' => $namaSanitized . '-pasfoto',
                'ktp' => $namaSanitized . '-ktp',
                'kk' => $namaSanitized . '-kk',
                'ijazah' => $namaSanitized . '-ijazah',
            ];

            // Array untuk menyimpan path file
            $filePaths = [];

            // Proses upload file
            foreach ($fileFields as $inputName => $targetName) {
                $file = $this->request->getFile($inputName);
                if ($file && $file->isValid() && !$file->hasMoved()) {
                    $ext = $file->getClientExtension();
                    $file->move($folderName, "{$targetName}.{$ext}");
                    // Simpan path relatif ke file
                    $filePaths[$inputName] = "uploads/data-regist/{$namaSanitized}-data-{$id}/{$targetName}.{$ext}";
                } else {
                    $filePaths[$inputName] = null;
                }
            }

            // Update database dengan path file
            $registrationsModel->update($id, [
                'pas_foto' => $filePaths['pas_foto'],
                'ktp' => $filePaths['ktp'],
                'kk' => $filePaths['kk'],
                'ijazah' => $filePaths['ijazah'],
            ]);

            return redirect()->to('/registration/regis-reg')->with('success', 'Registrasi berhasil!');
        } else {
            return redirect()->back()->withInput()->with('errors', $registrationsModel->errors());
        }
    }

    public function storeMTU()
    {
        // 1. Validasi CAPTCHA
        $recaptchaResponse = $this->request->getPost('g-recaptcha-response');
        $secretKey = '6LcnAokrAAAAAC55Vdp8Pm4AS4m4xlSk2KncA3h0';

        $verify = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret={$secretKey}&response={$recaptchaResponse}");
        $response = json_decode($verify);

        if (!$response->success) {
            return redirect()->back()->withInput()->with('error', 'Verifikasi CAPTCHA gagal.');
        }

        $registrationsModel = new RegistrationsMTU();

        // Ambil data inputan form
        $data = [
            'nama_lengkap' => $this->request->getPost('nama_lengkap'),
            'no_telepon' => $this->request->getPost('no_telepon'),
            'link_lokasi' => $this->request->getPost('link_lokasi'),
            'major_id' => $this->request->getPost('major_id'),
            'created_at' => date('Y-m-d H:i:s'),
        ];

        // Simpan dulu ke database untuk mendapatkan ID
        if ($registrationsModel->insert($data)) {
            $id = $registrationsModel->getInsertID();
            $nama = $data['nama_lengkap'];
            $namaSanitized = strtolower(preg_replace('/[^a-zA-Z0-9]/', '-', $nama));
            $folderName = FCPATH . "uploads/data-regist/mtu/{$namaSanitized}-data-{$id}";

            if (!is_dir($folderName)) {
                mkdir($folderName, 0775, true);
            }

            // Daftar file yang akan di-upload
            $fileFields = [
                'surat_permohonan' => $namaSanitized . '-surat-permohonan',
            ];

            // Array untuk menyimpan path file
            $filePaths = [];

            // Proses upload file
            foreach ($fileFields as $inputName => $targetName) {
                $file = $this->request->getFile($inputName);
                if ($file && $file->isValid() && !$file->hasMoved()) {
                    $ext = $file->getClientExtension();
                    $file->move($folderName, "{$targetName}.{$ext}");
                    // Simpan path relatif ke file
                    $filePaths[$inputName] = "uploads/data-regist/mtu/{$namaSanitized}-data-{$id}/{$targetName}.{$ext}";
                } else {
                    $filePaths[$inputName] = null;
                }
            }

            // Update database dengan path file
            $registrationsModel->update($id, [
                'surat_permohonan' => $filePaths['surat_permohonan'],
            ]);

            return redirect()->to('/registration/regis-mtu')->with('success', 'Registrasi MTU berhasil!');
        } else {
            return redirect()->back()->withInput()->with('errors', $registrationsModel->errors());
        }
    }

    public function show($id)
    {
        $registrationsModel = new Registrations();
        $registration = $registrationsModel->find($id);

        if (!$registration) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        return view('registration_detail', ['registration' => $registration]);
    }

    public function download_zip($id)
    {
        $basePath = FCPATH . 'uploads/data-regist/reg/';
        $pattern = $basePath . "*-data-$id";

        $matchedFolders = glob($pattern);
        if (!$matchedFolders || !is_dir($matchedFolders[0])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException("Folder tidak ditemukan");
        }

        $folderPath = $matchedFolders[0];
        $folderName = basename($folderPath);

        $zipName = "dokumen_id={$id}.zip";
        $downloadFolder = WRITEPATH . 'downloaded_data/reg/';
        if (!is_dir($downloadFolder)) {
            mkdir($downloadFolder, 0775, true);
        }
        $zipPath = $downloadFolder . $zipName;  // ZIP disimpan sementara di folder downloaded_data

        $zip = new \ZipArchive();
        if ($zip->open($zipPath, \ZipArchive::CREATE | \ZipArchive::OVERWRITE) !== TRUE) {
            throw new \RuntimeException("Tidak bisa membuat file ZIP");
        }

        $files = glob($folderPath . '/*');
        foreach ($files as $file) {
            if (is_file($file)) {
                $zip->addFile($file, $folderName . '/' . basename($file));
            }
        }

        $zip->close();

        return $this->response->download($zipPath, null)->setFileName($zipName);
    }

    public function download_zip_mtu($id)
    {
        $basePath = FCPATH . 'uploads/data-regist/mtu/';
        $pattern = $basePath . "*-data-$id";

        $matchedFolders = glob($pattern);
        if (!$matchedFolders || !is_dir($matchedFolders[0])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException("Folder tidak ditemukan");
        }

        $folderPath = $matchedFolders[0];
        $folderName = basename($folderPath);

        $zipName = "dokumen_mtu_id={$id}.zip";
        $downloadFolder = WRITEPATH . 'downloaded_data/mtu/';
        if (!is_dir($downloadFolder)) {
            mkdir($downloadFolder, 0775, true);
        }
        $zipPath = $downloadFolder . $zipName;

        $zip = new \ZipArchive();
        if ($zip->open($zipPath, \ZipArchive::CREATE | \ZipArchive::OVERWRITE) !== TRUE) {
            throw new \RuntimeException("Tidak bisa membuat file ZIP");
        }

        // Hanya surat permohonan
        $suratPermohonan = glob($folderPath . '/*surat-permohonan*');
        foreach ($suratPermohonan as $file) {
            if (is_file($file)) {
                $zip->addFile($file, $folderName . '/' . basename($file));
            }
        }

        $zip->close();

        return $this->response->download($zipPath, null)->setFileName($zipName);
    }


    public function deleteReg($id)
    {
        $registrationsModel = new Registrations();
        $registration = $registrationsModel->find($id);

        if (!$registration) {
            return redirect()->back()->with('error', 'Data tidak ditemukan.');
        }

        // Hapus data dari database
        $registrationsModel->delete($id);

        // Hapus folder terkait
        $namaSanitized = strtolower(preg_replace('/[^a-zA-Z0-9]/', '-', $registration['nama_lengkap']));
        $folderName = FCPATH . 'uploads/data-regist/reg/{$namaSanitized}-data-{$id}';
        if (is_dir($folderName)) {
            delete_files($folderName, true);
            rmdir($folderName);
        }

        return redirect()->to('/registration/data-reg')->with('success', 'Data berhasil dihapus.');
    }

    public function deleteMTU($id)
    {
        $registrationsModel = new RegistrationsMTU();
        $registration = $registrationsModel->find($id);

        if (!$registration) {
            return redirect()->back()->with('error', 'Data tidak ditemukan.');
        }

        // Hapus data dari database
        $registrationsModel->delete($id);

        // Hapus folder terkait
        $namaSanitized = strtolower(preg_replace('/[^a-zA-Z0-9]/', '-', $registration['nama_lengkap']));
        $folderName = FCPATH . 'uploads/data-regist/mtu/{$namaSanitized}-data-{$id}';
        if (is_dir($folderName)) {
            delete_files($folderName, true);
            rmdir($folderName);
        }

        return redirect()->to('/registration/data-mtu')->with('success', 'Data berhasil dihapus.');
    }
}
