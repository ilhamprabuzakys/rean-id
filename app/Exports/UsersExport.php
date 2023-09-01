<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class UsersExport implements FromCollection, WithHeadings, WithMapping, ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return User::withCount('posts')->latest('updated_at')->get();
    }

    public function headings(): array
    {
        return [
            'Nama',
            'Email',
            'Username',
            'Role',
            'Bergabung Pada',
            'Jumlah Postingan'
        ];
    }

    public function map($user): array
    {
        return [
            $user->name,
            $user->email,
            $user->username,
            $user->role,
            $user->created_at->format('d F Y'),
            $user->posts_count,
        ];
    }
}
