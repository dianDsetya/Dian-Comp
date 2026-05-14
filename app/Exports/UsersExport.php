<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class UsersExport implements FromCollection, WithHeadings, ShouldAutoSize
{
    public function collection()
    {
        return User::select('name', 'email')
            ->get()
            ->map(function ($user, $index) {
                return [
                    $index + 1,
                    $user->name,
                    $user->email,
                ];
            });
    }

    public function headings(): array
    {
        return ['No', 'Nama', 'Email'];
    }
}
