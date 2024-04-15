<?php

namespace Database\Seeders;

use App\Models\Profile;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    { 
            $admin =User::create([
                'name' => 'Admin Maha Raja',
                'email' => 'admin@example.com',
                'password' => bcrypt('password'),
                'roles_id'=> '1'
            ]);
            $pemerintah = User::create([
                'name' => 'Pemerintah',
                'email' => 'pemerintah@example.com',
                'password' => bcrypt('password'), 
                'roles_id'=> '4'
            ]);
            $ajung = User::create([
                'name' => 'Penyuluh Kecamatan Ajung',
                'email' => 'penyuluhajung@example.com',
                'password' => bcrypt('password'),
                'roles_id'=> '3'
            ]);
            $ajung = Profile::create([
                'user_id' => $ajung->id,
                'kecamatan_id' => '1',
                'nama' => $ajung->name,
                'nik' => '123456789',
                'no_hp' => '123456789',
                'alamat' => 'Jl. umbulsari'
            ]);
            $ambulu = User::create([
                'name' => 'Penyuluh Kecamatan Ambulu',
                'email' => 'penyuluhambulu@example.com',
                'password' => bcrypt('password'),
                'roles_id'=> '3'
            ]);
            $ambulu  = Profile::create([
                'user_id' => $ambulu->id,
                'kecamatan_id' => '2',
                'nama' => $ambulu->name,
                'nik' => '123456789',
                'no_hp' => '123456789',  
                'alamat' => 'Jl. umbulsari'
            ]);
            $arjasa = User::create([
                'name' => 'Penyuluh Kecamatan arjasa',
                'email' => 'penyuluharjasa@example.com',
                'password' => bcrypt('password'),
                'roles_id'=> '3'
            ]);
            $arjasa  = Profile::create([
                'user_id' => $arjasa->id,
                'kecamatan_id' => '3',
                'nama' => $arjasa->name,
                'nik' => '123456789',
                'no_hp' => '123456789',  
                'alamat' => 'Jl. umbulsari'
            ]);
            $bangsalsari = User::create([
                'name' => 'Penyuluh Kecamatan bangsalsari',
                'email' => 'penyuluhbangsalsari@example.com',
                'password' => bcrypt('password'),
                'roles_id'=> '3'
            ]);
            $bangsalsari  = Profile::create([
                'user_id' => $bangsalsari->id,
                'kecamatan_id' => '4',
                'nama' => $bangsalsari->name,
                'nik' => '123456789',
                'no_hp' => '123456789',  
                'alamat' => 'Jl. umbulsari'
            ]);
            $balung = User::create([
                'name' => 'Penyuluh Kecamatan Balung',
                'email' => 'penyuluhbalung@example.com',
                'password' => bcrypt('password'),
                'roles_id'=> '3'
            ]);
            $balung  = Profile::create([
                'user_id' => $balung->id,
                'kecamatan_id' => '5',
                'nama' => $balung->name,
                'nik' => '123456789',
                'no_hp' => '123456789',  
                'alamat' => 'Jl. umbulsari'
            ]);
            $gumukmas = User::create([
                'name' => 'Penyuluh Kecamatan Gumukmas',
                'email' => 'penyuluhGumukmas@example.com',
                'password' => bcrypt('password'),
                'roles_id'=> '3'
            ]);
            $gumukmas  = Profile::create([
                'user_id' => $gumukmas->id,
                'kecamatan_id' => '6',
                'nama' => $gumukmas->name,
                'nik' => '123456789',
                'no_hp' => '123456789',  
                'alamat' => 'Jl. umbulsari'
            ]);
            $jelbuk = User::create([
                'name' => 'Penyuluh Kecamatan Jelbuk',
                'email' => 'penyuluhJelbuk@example.com',
                'password' => bcrypt('password'),
                'roles_id'=> '3'
            ]);
            $jelbuk  = Profile::create([
                'user_id' => $jelbuk->id,
                'kecamatan_id' => '7',
                'nama' => $jelbuk->name,
                'nik' => '123456789',
                'no_hp' => '123456789',  
                'alamat' => 'Jl. umbulsari'
            ]);
            $jenggawah = User::create([
                'name' => 'Penyuluh Kecamatan Jenggawah',
                'email' => 'penyuluhJenggawah@example.com',
                'password' => bcrypt('password'),
                'roles_id'=> '3'
            ]);
            $jenggawah  = Profile::create([
                'user_id' => $jenggawah->id,
                'kecamatan_id' => '8',
                'nama' => $jenggawah->name,
                'nik' => '123456789',
                'no_hp' => '123456789', 
                'alamat' => 'Jl. umbulsari' 
            ]);
            $jombang = User::create([
                'name' => 'Penyuluh Kecamatan Jombang',
                'email' => 'penyuluhJombang@example.com',
                'password' => bcrypt('password'),
                'roles_id'=> '3'
            ]);
            $jombang  = Profile::create([
                'user_id' => $jombang->id,
                'kecamatan_id' => '9',
                'nama' => $jombang->name,
                'nik' => '123456789',
                'no_hp' => '123456789',  
                'alamat' => 'Jl. umbulsari'
            ]);
            $kalisat = User::create([
                'name' => 'Penyuluh Kecamatan Kalisat',
                'email' => 'penyuluhKalisat@example.com',
                'password' => bcrypt('password'),
                'roles_id'=> '3'
            ]);
            $kalisat  = Profile::create([
                'user_id' => $kalisat->id,
                'kecamatan_id' => '10',
                'nama' => $kalisat->name,
                'nik' => '123456789',
                'no_hp' => '123456789',  
                'alamat' => 'Jl. umbulsari'
            ]);
            $kaliwates = User::create([
                'name' => 'Penyuluh Kecamatan Kaliwates',
                'email' => 'penyuluhKaliwates@example.com',
                'password' => bcrypt('password'),
                'roles_id'=> '3'
            ]);
            $kaliwates  = Profile::create([
                'user_id' => $kaliwates->id,
                'kecamatan_id' => '11',
                'nama' => $kaliwates->name,
                'nik' => '123456789',
                'no_hp' => '123456789',  
                'alamat' => 'Jl. umbulsari'
            ]);
            $kencong = User::create([
                'name' => 'Penyuluh Kecamatan kencong',
                'email' => 'penyuluhkencong@example.com',
                'password' => bcrypt('password'),
                'roles_id'=> '3'
            ]);
            $kencong  = Profile::create([
                'user_id' => $kencong->id,
                'kecamatan_id' => '12',
                'nama' => $kencong->name,
                'nik' => '123456789',
                'no_hp' => '123456789',  
                'alamat' => 'Jl. umbulsari'
            ]);
            $ledokombo = User::create([
                'name' => 'Penyuluh Kecamatan Ledokombo',
                'email' => 'penyuluhledokombo@example.com',
                'password' => bcrypt('password'),
                'roles_id'=> '3'
            ]);
            $ledokombo  = Profile::create([
                'user_id' => $ledokombo->id,
                'kecamatan_id' => '13',
                'nama' => $ledokombo->name,
                'nik' => '123456789',
                'no_hp' => '123456789',  
                'alamat' => 'Jl. umbulsari'
            ]);
            $mayang = User::create([
                'name' => 'Penyuluh Kecamatan mayang',
                'email' => 'penyuluhmayang@example.com',
                'password' => bcrypt('password'),
                'roles_id'=> '3'
            ]);
            $mayang  = Profile::create([
                'user_id' => $mayang->id,
                'kecamatan_id' => '14',
                'nama' => $mayang->name,
                'nik' => '123456789',
                'no_hp' => '123456789', 
                'alamat' => 'Jl. umbulsari' 
            ]);
            $mumbulsari = User::create([
                'name' => 'Penyuluh Kecamatan mumbulsari',
                'email' => 'penyuluhmumbulsari@example.com',
                'password' => bcrypt('password'),
                'roles_id'=> '3'
            ]);
            $mumbulsari  = Profile::create([
                'user_id' => $mumbulsari->id,
                'kecamatan_id' => '15',
                'nama' => $mumbulsari->name,
                'nik' => '123456789',
                'no_hp' => '123456789',
                'alamat' => 'Jl. umbulsari'  
            ]);
            $panti = User::create([
                'name' => 'Penyuluh Kecamatan panti',
                'email' => 'penyuluhpanti@example.com',
                'password' => bcrypt('password'),
                'roles_id'=> '3'
            ]);
            $panti  = Profile::create([
                'user_id' => $panti->id,
                'kecamatan_id' => '16',
                'nama' => $panti->name,
                'nik' => '123456789',
                'no_hp' => '123456789',
                'alamat' => 'Jl. umbulsari'  
            ]);
            $pakusari = User::create([
                'name' => 'Penyuluh Kecamatan pakusari',
                'email' => 'penyuluhpakusari@example.com',
                'password' => bcrypt('password'),
                'roles_id'=> '3'
            ]);
            $pakusari  = Profile::create([
                'user_id' => $pakusari->id,
                'kecamatan_id' => '17',
                'nama' => $pakusari->name,
                'nik' => '123456789',
                'no_hp' => '123456789', 
                'alamat' => 'Jl. umbulsari' 
            ]);
            $patrang = User::create([
                'name' => 'Penyuluh Kecamatan patrang',
                'email' => 'penyuluhpatrang@example.com',
                'password' => bcrypt('password'),
                'roles_id'=> '3'
            ]);
            $patrang  = Profile::create([
                'user_id' => $patrang->id,
                'kecamatan_id' => '18',
                'nama' => $patrang->name,
                'nik' => '123456789',
                'no_hp' => '123456789',
                'alamat' => 'Jl. umbulsari'  
            ]);
            $puger = User::create([
                'name' => 'Penyuluh Kecamatan puger',
                'email' => 'penyuluhpuger@example.com',
                'password' => bcrypt('password'),
                'roles_id'=> '3'
            ]);
            $puger  = Profile::create([
                'user_id' => $puger->id,
                'kecamatan_id' => '19',
                'nama' => $puger->name,
                'nik' => '123456789',
                'no_hp' => '123456789',
                'alamat' => 'Jl. umbulsari'  
            ]);
            $rambipuji = User::create([
                'name' => 'Penyuluh Kecamatan rambipuji',
                'email' => 'penyuluhrambipuji@example.com',
                'password' => bcrypt('password'),
                'roles_id'=> '3'
            ]);
            $rambipuji  = Profile::create([
                'user_id' => $rambipuji->id,
                'kecamatan_id' => '20',
                'nama' => $rambipuji->name,
                'nik' => '123456789',
                'no_hp' => '123456789',
                'alamat' => 'Jl. umbulsari'  
            ]);
            $semboro = User::create([
                'name' => 'Penyuluh Kecamatan semboro',
                'email' => 'penyuluhsemboro@example.com',
                'password' => bcrypt('password'),
                'roles_id'=> '3'
            ]);
            $semboro  = Profile::create([
                'user_id' => $semboro->id,
                'kecamatan_id' => '21',
                'nama' => $semboro->name,
                'nik' => '123456789',
                'no_hp' => '123456789', 
                'alamat' => 'Jl. umbulsari' 
            ]);
            $silo = User::create([
                'name' => 'Penyuluh Kecamatan silo',
                'email' => 'penyuluhsilo@example.com',
                'password' => bcrypt('password'),
                'roles_id'=> '3'
            ]);
            $silo  = Profile::create([
                'user_id' => $silo->id,
                'kecamatan_id' => '22',
                'nama' => $silo->name,
                'nik' => '123456789',
                'no_hp' => '123456789', 
                'alamat' => 'Jl. umbulsari' 
            ]);
            $sukorambi = User::create([
                'name' => 'Penyuluh Kecamatan sukorambi',
                'email' => 'penyuluhsukorambi@example.com',
                'password' => bcrypt('password'),
                'roles_id'=> '3'
            ]);
            $sukorambi  = Profile::create([
                'user_id' => $sukorambi->id,
                'kecamatan_id' => '23',
                'nama' => $sukorambi->name,
                'nik' => '123456789',
                'no_hp' => '123456789',
                'alamat' => 'Jl. umbulsari'  
            ]);
            $sukowono = User::create([
                'name' => 'Penyuluh Kecamatan sukowono',
                'email' => 'penyuluhsukowono@example.com',
                'password' => bcrypt('password'),
                'roles_id'=> '3'
            ]);
            $sukowono  = Profile::create([
                'user_id' => $sukowono->id,
                'kecamatan_id' => '24',
                'nama' => $sukowono->name,
                'nik' => '123456789',
                'no_hp' => '123456789', 
                'alamat' => 'Jl. umbulsari' 
            ]);
            $sumberbaru = User::create([
                'name' => 'Penyuluh Kecamatan sumberbaru',
                'email' => 'penyuluhsumberbaru@example.com',
                'password' => bcrypt('password'),
                'roles_id'=> '3'
            ]);
            $sumberbaru = Profile::create([
                'user_id' => $sumberbaru->id,
                'kecamatan_id' => '25',
                'nama' => $sumberbaru->name,
                'nik' => '123456789',
                'no_hp' => '123456789',
                'alamat' => 'Jl. Patrang',
            ]);
            $sumberjambe = User::create([
                'name' => 'Penyuluh Kecamatan sumberjambe',
                'email' => 'penyuluhsumberjambe@example.com',
                'password' => bcrypt('password'),
                'roles_id'=> '3'
            ]);
            $sumberjambe = Profile::create([
                'user_id' => $sumberjambe->id,
                'kecamatan_id' => '26',
                'nama' => $sumberjambe->name,
                'nik' => '123456789',
                'no_hp' => '123456789',
                'alamat' => 'Jl. Patrang',
            ]);
            $sumbersari = User::create([
                'name' => 'Penyuluh Kecamatan Sumbersari',
                'email' => 'penyuluhsumbersari@example.com',
                'password' => bcrypt('password'),
                'roles_id'=> '3'
            ]);
            $sumbersari = Profile::create([
                'user_id' => $sumbersari->id,
                'kecamatan_id' => '27',
                'nama' => $sumbersari->name,
                'nik' => '123456789',
                'no_hp' => '123456789',
                'alamat' => 'Jl. Sumbersari',
            ]);
            $tanggul = User::create([
                'name' => 'Penyuluh Kecamatan tanggul',
                'email' => 'penyuluhtanggul@example.com',
                'password' => bcrypt('password'),
                'roles_id'=> '3'
            ]);
            $tanggul = Profile::create([
                'user_id' => $tanggul->id,
                'kecamatan_id' => '28',
                'nama' => $tanggul->name,
                'nik' => '123456789',
                'no_hp' => '123456789',
                'alamat' => 'Jl. tanggul',
            ]);
            $tempurejo = User::create([
                'name' => 'Penyuluh Kecamatan tempurejo',
                'email' => 'penyuluhtempurejo@example.com',
                'password' => bcrypt('password'),
                'roles_id'=> '3'
            ]);
            $tempurejo = Profile::create([
                'user_id' => $tempurejo->id,
                'kecamatan_id' => '29',
                'nama' => $tempurejo->name,
                'nik' => '123456789',
                'no_hp' => '123456789',
                'alamat' => 'Jl. tempurejo',
            ]);
            $umbulsari = User::create([
                'name' => 'Penyuluh Kecamatan umbulsari',
                'email' => 'penyuluhumbulsari@example.com',
                'password' => bcrypt('password'),
                'roles_id'=> '3'
            ]);
            $umbulsari = Profile::create([
                'user_id' => $umbulsari->id,
                'kecamatan_id' => '30',
                'nama' => $umbulsari->name,
                'nik' => '123456789',
                'no_hp' => '123456789',
                'alamat' => 'Jl. umbulsari',
            ]);
            $wuluhan = User::create([
                'name' => 'Penyuluh Kecamatan wuluhan',
                'email' => 'penyuluhwuluhan@example.com',
                'password' => bcrypt('password'),
                'roles_id'=> '3'
            ]);
            $wuluhan = Profile::create([
                'user_id' => $wuluhan->id,
                'kecamatan_id' => '31',
                'nama' => $wuluhan->name,
                'nik' => '123456789',
                'no_hp' => '123456789',
                'alamat' => 'Jl. wuluhan',
            ]);
        
    }
}
