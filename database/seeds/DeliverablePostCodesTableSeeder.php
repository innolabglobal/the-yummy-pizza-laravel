<?php

use App\Models\DeliverablePostCode;
use Illuminate\Database\Seeder;

const DUMMY_DELIVERABLE_POST_CODES = [
    [
        'post_code' => '80331',
        'status'    => true,
    ],
    [
        'post_code' => '80333',
        'status'    => true,
    ],
    [
        'post_code' => '80335',
        'status'    => true,
    ],
    [
        'post_code' => '80336',
        'status'    => true,
    ],
    [
        'post_code' => '80337',
        'status'    => true,
    ],
    [
        'post_code' => '80339',
        'status'    => true,
    ],
    [
        'post_code' => '80469',
        'status'    => true,
    ],
    [
        'post_code' => '80538',
        'status'    => true,
    ],
    [
        'post_code' => '80539',
        'status'    => true,
    ],
    [
        'post_code' => '80634',
        'status'    => true,
    ],
    [
        'post_code' => '80636',
        'status'    => true,
    ],
    [
        'post_code' => '80637',
        'status'    => true,
    ],
    [
        'post_code' => '80638',
        'status'    => true,
    ],
    [
        'post_code' => '80639',
        'status'    => true,
    ],
    [
        'post_code' => '80686',
        'status'    => true,
    ],
    [
        'post_code' => '80687',
        'status'    => true,
    ],
    [
        'post_code' => '80689',
        'status'    => true,
    ],
    [
        'post_code' => '80796',
        'status'    => true,
    ],
    [
        'post_code' => '80797',
        'status'    => true,
    ],
    [
        'post_code' => '80798',
        'status'    => true,
    ],
    [
        'post_code' => '80799',
        'status'    => true,
    ],
    [
        'post_code' => '80801',
        'status'    => true,
    ],
    [
        'post_code' => '80802',
        'status'    => true,
    ],
    [
        'post_code' => '80803',
        'status'    => true,
    ],
    [
        'post_code' => '80804',
        'status'    => true,
    ],
    [
        'post_code' => '80805',
        'status'    => true,
    ],
    [
        'post_code' => '80807',
        'status'    => true,
    ],
    [
        'post_code' => '80809',
        'status'    => true,
    ],
    [
        'post_code' => '80933',
        'status'    => true,
    ],
    [
        'post_code' => '80935',
        'status'    => true,
    ],
    [
        'post_code' => '80937',
        'status'    => true,
    ],
    [
        'post_code' => '80939',
        'status'    => true,
    ],
    [
        'post_code' => '80992',
        'status'    => true,
    ],
    [
        'post_code' => '80993',
        'status'    => true,
    ],
    [
        'post_code' => '80995',
        'status'    => true,
    ],
    [
        'post_code' => '80997',
        'status'    => true,
    ],
    [
        'post_code' => '80999',
        'status'    => true,
    ],
    [
        'post_code' => '81241',
        'status'    => true,
    ],
    [
        'post_code' => '81243',
        'status'    => true,
    ],
    [
        'post_code' => '81245',
        'status'    => true,
    ],
    [
        'post_code' => '81247',
        'status'    => true,
    ],
    [
        'post_code' => '81249',
        'status'    => true,
    ],
    [
        'post_code' => '81369',
        'status'    => true,
    ],
    [
        'post_code' => '81371',
        'status'    => true,
    ],
    [
        'post_code' => '81373',
        'status'    => true,
    ],
    [
        'post_code' => '81375',
        'status'    => true,
    ],
    [
        'post_code' => '81377',
        'status'    => true,
    ],
    [
        'post_code' => '81379',
        'status'    => true,
    ],
    [
        'post_code' => '81475',
        'status'    => true,
    ],
    [
        'post_code' => '81476',
        'status'    => true,
    ],
    [
        'post_code' => '81477',
        'status'    => true,
    ],
    [
        'post_code' => '81479',
        'status'    => true,
    ],
    [
        'post_code' => '81539',
        'status'    => true,
    ],
    [
        'post_code' => '81541',
        'status'    => true,
    ],
    [
        'post_code' => '81543',
        'status'    => true,
    ],
    [
        'post_code' => '81545',
        'status'    => true,
    ],
    [
        'post_code' => '81547',
        'status'    => true,
    ],
    [
        'post_code' => '81549',
        'status'    => true,
    ],
    [
        'post_code' => '81667',
        'status'    => true,
    ],
    [
        'post_code' => '81669',
        'status'    => true,
    ],
    [
        'post_code' => '81671',
        'status'    => true,
    ],
    [
        'post_code' => '81673',
        'status'    => true,
    ],
    [
        'post_code' => '81675',
        'status'    => true,
    ],
    [
        'post_code' => '81677',
        'status'    => true,
    ],
    [
        'post_code' => '81679',
        'status'    => true,
    ],
    [
        'post_code' => '81735',
        'status'    => true,
    ],
    [
        'post_code' => '81737',
        'status'    => true,
    ],
    [
        'post_code' => '81739',
        'status'    => true,
    ],
    [
        'post_code' => '81825',
        'status'    => true,
    ],
    [
        'post_code' => '81827',
        'status'    => true,
    ],
    [
        'post_code' => '81829',
        'status'    => true,
    ],
    [
        'post_code' => '81925',
        'status'    => true,
    ],
    [
        'post_code' => '81927',
        'status'    => true,
    ],
    [
        'post_code' => '81929',
        'status'    => true,
    ],
];

class DeliverablePostCodesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run ()
    {
        foreach (DUMMY_DELIVERABLE_POST_CODES as $postCode) {
            $postCode['delivery_fees'] = rand(1, 10);
            DeliverablePostCode::create($postCode);
        }
    }
}
