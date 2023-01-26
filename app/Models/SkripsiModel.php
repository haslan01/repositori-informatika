<?php

namespace App\Models;

use CodeIgniter\Model;

class SkripsiModel extends Model
{
    protected $table = 'skripsi';
    protected $allowedFields = ['no_skripsi', 'nama_skripsi', 'pengarang_skripsi', 'penerbit_skripsi', 'file_skripsi', 'kategori_skripsi', 'deskripsi_skripsi', 'status_skripsi', 'jumlah_dipinjam', 'love', 'skripsi-created_at', 'skripsi-updated_at'];
    protected $primaryKey = 'no_skripsi';
}
