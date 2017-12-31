<?php

use Illuminate\Database\Seeder;
use App\Biodata;
use App\Target;
use App\Saran;
use App\User;
use App\Jurusan;

use Faker\Factory as Faker;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (DB::table('jurusans')->count() == 0) {
            $this->_jurusanSeed();
        }
        if (DB::table('targets')->count() == 0) {
            $this->_targetsSeed();
        }
        if (DB::table('users')->count() == 0) {
            $this->_usersSeed();
        }
        if (DB::table('sarans')->count() == 0) {
            $this->_saransSeed();
        }
    }

    private function _targetsSeed()
    {   

        $faker = Faker::create();
        $listParent = [
            'Rektorat', 'Fakultas', 'Jurusan'
        ];

        $listFakultas = [
            'FMIPA' => 'Fakultas Matematika dan Ilmu Pengetahuan Alam' ,
            'FPSB'  => 'Fakultas Psikologi dan Seni Budaya' ,
            'FTI'   => 'Fakultas Teknik Industri' ,
            'FTSP'  => 'Fakultas Teknik Sipil dan Perancangan',
            'FIAI'  => 'Fakultas Ilmu Agama Islam' ,
            'FK'    => 'Fakultas Kedokteran',
            'FE'    => 'Fakultas Ekonomi', 
            'FH'    => 'Fakultas Hukum',            
        ];

        $listJurusan = $this->_listJurusan();

        foreach ($listParent as $parent)
        {
            DB::table('targets')->insert([
                'name' => $parent ,
                'singkatan' => $parent ,
            ]);
        }

        // rektorat
        DB::table('targets')->insert([
                'name' => 'Umum' ,
                'parent_id' => 1 ,
                'singkatan' => 'Umum' ,
            ]);
        for ($i = 1; $i <= 5; $i++) {
            DB::table('targets')->insert([
                'name' => 'Rektorat '.$i ,
                'parent_id' => 1 ,
                'singkatan' => 'Rek '.$i ,
            ]);
        }
        // Fakultas
        foreach ($listFakultas as $singkatan => $fakultas) {
            DB::table('targets')->insert([
                'name' => $fakultas ,
                'parent_id' => 2 ,
                'singkatan' => $singkatan ,
            ]);
        }

        // jurusan
        foreach ($listJurusan as $singkatan => $jurusan) {
            DB::table('targets')->insert([
                'name' => $jurusan ,
                'parent_id' => 3 ,
                'singkatan' => $singkatan ,
            ]);
        }
    }

    private function _saransSeed()
    {
        $faker = Faker::create();
        $supports = [
            [2,3,4],[3,4],[5,3,2],[4],[],[3],[],[],
        ];

        foreach (range(1, 50) as $i) {
            $comments = [];
            $saran = Saran::create([
                'title' => $faker->sentence(8) ,
                'content' => $faker->text ,
                'image_path' => $faker->imageUrl ,
                'target_id' => rand(1,40) ,
                'user_id' => rand(2,5) ,
            ]);
            foreach (range(1, rand(2,7)) as $i) {
                $comments[] = ['user_id' => rand(2,5), 'content' => $faker->paragraph];
            }
            $saran->comments()->createMany($comments);

            $saran->supports()->attach($supports[rand(0,7)]);
        }
    }

    private function _usersSeed()
    {
    	Biodata::create([
    		'fullname' => 'Administrator' ,
    	])->user()->create([
    		'name' => 'admin' ,
    		'email' => 'hallo@colokan.id' ,
    		'password' => bcrypt('admin123') ,
            'jabatan' => 'admin' ,
    	]);

    	Biodata::create([
        	'fullname' => 'Muh Nizomuddin Fauza Sidiq' ,
        	'nim' => '16523071' ,
        	'jurusan_id' => '14',
        ])->user()->create([
        	'name' => 'nizomsidiq', 
        	'email' => 'nizomsidiq@gmail.com', 
        	'password' => bcrypt('123123') ,
        ]);

        $faker = Faker::create();

        foreach (range(1,20) as $i)
        {
            Biodata::create([
                'fullname' => $faker->name ,
                'nim' => '1'.rand(1,7).''.rand(1,5).'2'.rand(1,3).'0'.rand(10,99) ,
                'jurusan_id' => rand(1,40) ,
            ])->user()->create([
                'name' => $faker->firstName , 
                'email' => $faker->freeEmail, 
                'password' => bcrypt('123123') ,
            ]); 
        }
    }

    private function _jurusanSeed()
    {
        $listJurusan = $this->_listJurusan();

    	foreach ($listJurusan as $jurusan) {
    		DB::table('jurusans')->insert([
    			'nama' => $jurusan
    		]);
    	}
    }

    private function _listJurusan()
    {
        return [
            'D3 Akuntan'  => "D3 - Akuntansi",
            'D3 Keuangn'   => "D3 - Keuangan Dan Perbankan",
            'D3 Manajem'  => "D3 - Manajemen Perusahaan",
            'S1 Akuntan'  => "S1 - Akuntansi",
            'S1 Ekonomi'    => "S1 - Ekonomi Pembangunan",
            'S1 Manaje'  => "S1 - Manajemen",
            'S2 Akuntan'  => "S2 - Akuntansi",
            'S2 Ekonomi' => "S2 - Ilmu Ekonomi",
            'S2 Manajem'  => "S2 - Manajemen",
            'Pr Akuntan' => "Profesi - Pendidikan Profesi Akuntansi",
            'S3 Ekonomi'    => "S3 - Ilmu Ekonomi",
            'S1 Elektro'   => "S1 - Teknik Elektro",
            'S1 TI'  => "S1 - Teknik Industri",
            'S1 TInf'=> "S1 - Teknik Informatika",
            'S1 TK'     => "S1 - Teknik Kimia",
            'S1 TM'     => "S1 - Teknik Mesin",
            'S2 TI'   => "S2 - Teknik Industri",
            'S2 TInf'=> "S2 - Teknik Informatika",
            'S1 Dokter' => "S1 - Kedokteran",
            'Pr dokter'=> "Profesi - Profesi Dokter",
            'D3 An.Kim' => "D3 - Analis Kimia",
            'S1 Kimia'   => "S1 - Kimia",
            'S1 Farmasi'    => "S1 - Farmasi",
            'S1 PdKimia' => "S1 - Pendidikan Kimia",
            'S1 Stats' => "S1 - Statistika",
            'Apoteker'      => "Profesi - Profesi Apoteker", 
            'S1 Arsitek'    => "S1 - Arsitektur",
            'S1 TLing'=> "S1 - Teknik Lingkungan",
            'S1 Sipil'     => "S1 - Teknik Sipil",
            'S2 Arsitek'    => "S2 - Arsitektur",
            'Pr Arsitek'   => "Profesi - Profesi Arsitek",
            'S2 Sipil'     => "S2 - Teknik Sipil",
            'S3 IlSipil'  => "S3 - Ilmu Teknik Sipil",
            'S1 Ekis'       => "S1 - Ekonomi Islam",
            'S1 H.Islam'=> "S1 - Hukum Keluarga (Ahwal Syakhshiyah)",
            'S1 PAI'        => "S1 - Pendidikan Agama Islam",  
            'S2 PAI'        => "S2 - Magister Ilmu Agama Islam", 
            'S3 H.Islam'=> "S3 - Hukum Islam",
            'D3 B.Ing'=> "D3 - Bahasa Inggris",
            'S1 B.Ing'=> "S1 - Pendidikan Bahasa Inggris",
            'S1 H.Inter'  => "S1 - Hubungan Internasional",
            'S1 Il.Kom'     => "S1 - Ilmu Komunikasi",
            'S1 Psi'  => "S1 - Psikologi",
            'S2 Psi'  => "S2 - Psikologi",
            'Pr Psik' => "S2 - Psikologi Profesi",
            'S1 Hukum'      => "S1 - Ilmu Hukum",
            'S2 Hukum'      => "S2 - Ilmu Hukum",
            'S2 Notaris'   => "S2 - Kenotariatan",
            'S3 Hukum'      => "S3 - Ilmu Hukum"
        ];
    }
}
