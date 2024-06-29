<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MakerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $makers = [
           ['name' => 'Chacott', 'type' => 0],
           ['name' => 'シルビア', 'type' => 0],
           ['name' => 'アビニオン', 'type' => 0],
           ['name' => 'ボンジュバレリーナ', 'type' => 0],
           ['name' => 'ソウゲイ', 'type' => 0],
           ['name' => 'Bloch（ブロック）', 'type' => 1],
           ['name' => 'Capezio（カぺジオ）', 'type' => 1],
           ['name' => 'Freed of London（フリード）', 'type' => 1],
           ['name' => 'Grishko (グリシコ)', 'type' => 1],
           ['name' => 'Gaynor Minden（ゲイナー）', 'type' => 1],
           ['name' => 'Sansha（サンシャ）', 'type' => 1],
           ['name' => 'Mirella（ミレラ）', 'type' => 1],
           ['name' => 'Repetto（レペット）', 'type' => 1],
           ['name' => 'Suffolk（サフォーク）', 'type' => 1],
           ['name' => 'Merlet（メルレ）', 'type' => 1],
           ['name' => 'R-Class（Ｒクラス）', 'type' => 1],
           ['name' => 'Gamba（ギャンバ）', 'type' => 1],
           ['name' => 'Wear Moi（ウェアモア）', 'type' => 1],
           ['name' => 'So Danca（ソ・ダンサ）', 'type' => 1],
           ['name' => 'F.R.Duval（デュバル）', 'type' => 1],
           ['name' => 'NEUF（ヌフ）', 'type' => 1],
           ['name' => 'Virtisse（ヴァーティッセ）', 'type' => 1],
           ['name' => 'Gokce Aykut（ギョクチュ・アイクト）', 'type' => 1],
        ];

        foreach ($makers as $maker) {
            DB::table('makers')->insert($maker);
        }
    }
}
