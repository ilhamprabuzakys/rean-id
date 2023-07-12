<?php

namespace Database\Seeders;

use App\Models\Company;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $phone = '085280800064';
        $formattedPhone = substr_replace($phone, '-', 4, 0);
        $formattedPhone = substr_replace($formattedPhone, '-', 9, 0);
        Company::create([
            'title' => "REAN.ID",
            'address' => 'Jl. Letjen M.T. Haryono No.11, RT.1/RW.6, Cawang, Kec. Kramat jati, Kota Jakarta Timur, Daerah Khusus Ibukota Jakarta 13630',
            'short_address' => 'MT Haryono St No.11, RT.1/RW.6, Cawang, Kramat Jati, East Jakarta City, Jakarta 13630',
            'email' => 'callcenter@bnn.go.id',
            'phone' => $phone,
            'formattedPhone' => $formattedPhone,
            'province' => 'Jakarta Timur',
            'description' => 'Komunitas Anti Narkoba',
            'about' => 'REAN (Rumah Edukasi Anti Narkoba) mengajak generasi milenial dan generasi Z dalam berkarya yang bersih dari Narkotika. REAN.ID merupakan media informasi, edukasi dan sumber informasi dan edukasi yang dikemas dalam bentuk muda inovasi dengan tujuan sebagai jejaring belajar, berbagi cerita dan inspirasi dalam mengekspresikan karya, menggali potensi dan membangun kepercayaan diri guna memperkuat citra remaja yang gemar mencoba hal baru, Yang mana Informasi dan edukasi ini difokuskan dalam pembuatan konten yang berliterasi di bidang pencegahan narkoba.',
            'social_media_id' => 1,
        ]);
    }
}
