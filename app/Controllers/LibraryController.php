<?php

namespace App\Controllers;

// Model yang diperlukan
use App\Models\UserModel;
use App\Models\SkripsiModel;
use App\Models\KategoriModel;

class LibraryController extends BaseController
{
    protected $UserModel;
    protected $SkripsiModel;
    protected $KategoriModel;

    public function __construct()
    {
        $this->UserModel = new UserModel;
        $this->SkripsiModel = new SkripsiModel;
        $this->KategoriModel = new KategoriModel;
        // l = nama hari, d-m-yy = hari, bulan, dan tahun, H:i:s = jam, menit, dan detik.
        // $this->Waktu = date('l, d-m-yy, H:i:s');
        // helper form untuk fungsi set_value
        helper(['form']);
    }

    // Method untuk halaman home
    public function index()
    {
        $data['title'] = 'Home';
        $data['user'] = $this->UserModel->select('nis, nama_user, foto_profil, jabatan')->find(session()->get('nis'));
        $data['new_skripsi'] = $this->SkripsiModel->select('no_skripsi, nama_skripsi, file_skripsi, nama_kategori, status_skripsi, deskripsi_skripsi, skripsi-created_at')->join('kategori', 'kategori.id_kategori = skripsi.kategori_skripsi')->orderBy('skripsi-created_at', 'DESC')->findAll(3);
        $data['banyak_skripsi'] = $this->SkripsiModel->select('no_skripsi, nama_skripsi, file_skripsi, nama_kategori, status_skripsi, deskripsi_skripsi, jumlah_dipinjam')->join('kategori', 'kategori.id_kategori = skripsi.kategori_skripsi')->orderBy('jumlah_dipinjam', 'DESC')->findAll(3);
        $data['populer_skripsi'] = $this->SkripsiModel->select('no_skripsi, nama_skripsi, file_skripsi, nama_kategori, status_skripsi, deskripsi_skripsi, love')->join('kategori', 'kategori.id_kategori = skripsi.kategori_skripsi')->orderBy('love', 'DESC')->findAll(3);
        $data['kategori_footer'] = $this->KategoriModel->select('nama_kategori')->findAll(5);
        return view('library/v_home', $data);
    }

    // Method untuk halaman library
    public function library()
    {
        // Jika terdapat request dengan nama kategori
        if ($this->request->getVar('kategori')) {
            if ($this->request->getVar('kategori') == 'Tidak') {
                session()->remove('kategori_library');
            } else {
                session()->set(['kategori_library' => $this->request->getVar('kategori')]);
            }
            return redirect()->back();
        }
        // Jika ada pencarian
        if ($this->request->getVar('keyword')) {
            // Menampung keyword
            $keyword = $this->request->getVar('keyword');
            // Jika ada filter kategori
            if (session()->get('kategori_library')) {
                // Mengambil semua data skripsi + join kategori
                $data['all_skripsi'] = $this->SkripsiModel->select('no_skripsi, nama_skripsi, file_skripsi, nama_kategori, status_skripsi, deskripsi_skripsi, skripsi-created_at')->join('kategori', 'kategori.id_kategori = skripsi.kategori_skripsi')->groupStart()->like('no_skripsi', $keyword)->orLike('nama_skripsi', $keyword)->orLike('pengarang_skripsi', $keyword)->orLike('penerbit_skripsi', $keyword)->groupEnd()->where('nama_kategori', session()->get('kategori_library'))->paginate(9, 'skripsi');
            } else {
                // Mengambil semua data skripsi + join kategori
                $data['all_skripsi'] = $this->SkripsiModel->select('no_skripsi, nama_skripsi, file_skripsi, nama_kategori, status_skripsi, deskripsi_skripsi, skripsi-created_at')->join('kategori', 'kategori.id_kategori = skripsi.kategori_skripsi')->like('no_skripsi', $keyword)->orLike('nama_skripsi', $keyword)->orLike('pengarang_skripsi', $keyword)->orLike('penerbit_skripsi', $keyword)->paginate(9, 'skripsi');
            }
        } else if (session()->get('kategori_library')) {
            // Mengambil semua data skripsi + join kategori
            $data['all_skripsi'] = $this->SkripsiModel->select('no_skripsi, nama_skripsi, file_skripsi, nama_kategori, status_skripsi, deskripsi_skripsi, skripsi-created_at')->where('nama_kategori', session()->get('kategori_library'))->join('kategori', 'kategori.id_kategori = skripsi.kategori_skripsi')->paginate(9, 'skripsi');
        } else {
            // Mengambil semua data skripsi + join kategori
            $data['all_skripsi'] = $this->SkripsiModel->select('no_skripsi, nama_skripsi, file_skripsi, nama_kategori, status_skripsi, deskripsi_skripsi, skripsi-created_at')->join('kategori', 'kategori.id_kategori = skripsi.kategori_skripsi')->paginate(9, 'skripsi');
        }
        $data['title'] = 'Library';
        $data['user'] = $this->UserModel->select('nis, nama_user, foto_profil, jabatan')->find(session()->get('nis'));
        $data['kategori'] = $this->KategoriModel->select('nama_kategori')->findAll();
        $data['pager'] = $this->SkripsiModel->pager;
        $data['kategori_footer'] = $this->KategoriModel->select('nama_kategori')->findAll(5);
        return view('library/v_library', $data);
    }

    // Method untuk link kaegori pada footer
    public function kategoriCepat($kategori)
    {
        // Mengambil kategori dari database
        $kategori_final = $this->KategoriModel->select('nama_kategori')->where('nama_kategori', $kategori)->first();
        // Jika kategori tersebut tidak ada
        if ($kategori_final == null) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException();
        } else {
            session()->set(['kategori_library' => $kategori_final['nama_kategori']]);
            return redirect()->to(base_url('library'));
        }
    }

    // Method untuk halaman detail skripsi
    public function detailSkripsi($no_skripsi)
    {
        // Jika skripsi tersebut tidak ada
        if ($this->SkripsiModel->select('no_skripsi')->find($no_skripsi) == null) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException();
        } else {
            $data['title'] = 'Detail Skripsi';
            $data['user'] = $this->UserModel->select('nis, nama_user, foto_profil, jabatan')->find(session()->get('nis'));
            $data['skripsi'] = $this->SkripsiModel->select('no_skripsi, nama_skripsi, file_skripsi, status_skripsi, pengarang_skripsi, penerbit_skripsi, love, nama_kategori, deskripsi_skripsi')->where('no_skripsi', $no_skripsi)->join('kategori', 'kategori.id_kategori = skripsi.kategori_skripsi')->first();
            // $data['peminjam'] = $this->skripsipinjamModel->select('nis_skripsipinjam')->where(['no_skripsipinjam' => $no_skripsi, 'status_skripsipinjam' => 0])->first();
            // Mengecek apakah user menyukai skripsi ini
            // if ($data['sudah_like'] = $this->LikeskripsiModel->select('id_likeskripsi')->where(['nis_likeskripsi' => session()->get('nis'), 'no_likeskripsi' => $no_skripsi])->first() != null) {
            //     $data['sudah_like'] = true;
            // } else {
            //     $data['sudah_like'] = false;
            // }
            $data['kategori_footer'] = $this->KategoriModel->select('nama_kategori')->findAll(5);
            return view('library/v_detailskripsi', $data);
        }
    }
}
