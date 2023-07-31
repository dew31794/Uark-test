<?php

namespace Database\Seeders;

use App\Models\Org;
use Illuminate\Database\Seeder;

class OrgsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = array(
            array(
                'title' => '社會保險司',
                'org_no' => 'MP102',
            ),
            array(
                'title' => '護理及健康照護司',
                'org_no' => 'MP104',
            ),
            array(
                'title' => '保護健康司',
                'org_no' => 'MP105',
            ),
            array(
                'title' => '長期照顧司',
                'org_no' => 'MP123',
            ),
        );

        foreach ($data as $org) {
            Org::create($org);
        }
    }
}
