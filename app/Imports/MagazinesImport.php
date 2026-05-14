<?php

namespace App\Imports;

use App\Models\Magazine;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Concerns\ToModel;

class MagazinesImport implements ToModel
{
    public function model(array $row)
    {
        // Skip header jika ada (biasanya baris No, Nama, dll)
        if (!isset($row[1]) || $row[1] == 'Judul Majalah') {
            return null;
        }

        return new Magazine([
            'name'         => $row[1],
            'slug'         => Str::slug($row[1]) . '-' . time(),
            'volume'       => $row[2],
            'number'       => $row[3],
            'edition'      => $row[4],
            'published_at' => now(), // Default ke sekarang jika format tgl excel berbeda
        ]);
    }
}
