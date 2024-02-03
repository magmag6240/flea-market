<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $params = [
            ['id' => 1, 'name' => '雑誌', 'seller_id' => '1', 'buyer_id' => null, 'condition_id' => '2', 'payment_id' => null, 'price' => '2000', 'item_detail' => 'レディースファッション雑誌です。一度読んだだけの美品です。', 'image_url' => 'https://placehold.jp/30/dd6699/ffffff/500x500.png'],
            ['id' => 2, 'name' => '時計', 'seller_id' => '3', 'buyer_id' => null, 'condition_id' => '3', 'payment_id' => null, 'price' => '13000', 'item_detail' => '使用済みですが動作に問題はありません。', 'image_url' => 'https://placehold.jp/30/008080/ffffff/500x500.png'],
            ['id' => 3, 'name' => '子供用洋服', 'seller_id' => '1', 'buyer_id' => '38', 'condition_id' => '1', 'payment_id' => '1', 'price' => '5029', 'item_detail' => '子供のために購入しましたが、使わないので出品します。', 'image_url' => 'https://placehold.jp/30/b8860b/ffffff/500x500.png'],
            ['id' => 4, 'name' => 'メンズバッグ', 'seller_id' => '3', 'buyer_id' => '95', 'condition_id' => '3', 'payment_id' => '3', 'price' => '5300', 'item_detail' => 'リュックタイプのバッグです。', 'image_url' => 'https://placehold.jp/30/da70d6/ffffff/500x500.png'],
            ['id' => 5, 'name' => 'オブジェ', 'seller_id' => '1', 'buyer_id' => null, 'condition_id' => '2', 'payment_id' => null, 'price' => '2300', 'item_detail' => 'ウサギのガラスオブジェです。傷がつかないよう梱包して発送します。', 'image_url' => 'https://placehold.jp/30/da70d6/ffffff/500x500.png'],
            ['id' => 6, 'name' => 'ボールペン', 'seller_id' => '1','buyer_id' => null, 'condition_id' => '2', 'payment_id' => null, 'price' => '670', 'item_detail' => '黒単色ボールペンです。一度使用済みです。', 'image_url' => 'https://placehold.jp/30/ff4500/ffffff/500x500.png'],
            ['id' => 7, 'name' => '2024年カレンダー', 'seller_id' => '3', 'buyer_id' => null, 'condition_id' => '1', 'payment_id' => null, 'price' => '1000', 'item_detail' => '今年のカレンダーです。新品、未使用です。', 'image_url' => 'https://placehold.jp/30/fafad2/ffffff/500x500.png'],
            ['id' => 8, 'name' => 'スマホケース', 'seller_id' => '1','buyer_id' => '440', 'condition_id' => '3', 'payment_id' => '2', 'price' => '2000', 'item_detail' => 'iPhone15用スマホケースです。使用済みですが、目立った汚れはありません。', 'image_url' => 'https://placehold.jp/30/f0e68c/ffffff/500x500.png'],
            ['id' => 9, 'name' => 'マフラー', 'seller_id' => '1', 'buyer_id' => null, 'condition_id' => '2', 'payment_id' => null, 'price' => '26000', 'item_detail' => '男性用マフラーです。未使用ですが、2年ほど保管していました。', 'image_url' => 'https://placehold.jp/30/cd5c5c/ffffff/500x500.png'],
            ['id' => 10, 'name' => 'クッション', 'seller_id' => '3', 'buyer_id' => null, 'condition_id' => '4', 'payment_id' => null, 'price' => '900', 'item_detail' => 'キャラクター柄のクッションです。使用感があります。', 'image_url' => 'https://placehold.jp/30/db7093/ffffff/500x500.png'],
            ['id' => 11, 'name' => 'ゲーム機', 'seller_id' => '1', 'buyer_id' => '200', 'condition_id' => '3', 'payment_id' => '1', 'price' => '12000', 'item_detail' => '使用していますが、動作に問題はありません。色はシルバーです。', 'image_url' => 'https://placehold.jp/30/cd5c5c/ffffff/500x500.png'],
            ['id' => 12, 'name' => 'フォトフレーム', 'seller_id' => '1', 'buyer_id' => null, 'condition_id' => '2', 'payment_id' => null, 'price' => '2800', 'item_detail' => 'ガラス製のフォトフレームです。暗所にて保管していました。', 'image_url' => 'https://placehold.jp/30/4682b4/ffffff/500x500.png'],
            ['id' => 13, 'name' => 'メンズ洋服', 'seller_id' => '1', 'buyer_id' => null, 'condition_id' => '2', 'payment_id' => null, 'price' => '2000', 'item_detail' => 'Lサイズの男性用トップスです。一度試着していますが、クリーニング済みです。', 'image_url' => 'https://placehold.jp/30/fff8dc/ffffff/500x500.png'],
            ['id' => 14, 'name' => '子供用おもちゃ', 'seller_id' => '1', 'buyer_id' => '43', 'condition_id' => '4', 'payment_id' => '1', 'price' => '460', 'item_detail' => '子供用の恐竜のおもちゃです。汚れ等使用感があります。', 'image_url' => 'https://placehold.jp/30/8b008b/ffffff/500x500.png'],
            ['id' => 15, 'name' => '参考書', 'seller_id' => '1', 'buyer_id' => null, 'condition_id' => '4', 'payment_id' => null, 'price' => '600', 'item_detail' => '2023年の大学受験に使用した数学の参考書です。ところどころに書き込みがあります。', 'image_url' => 'https://placehold.jp/30/800080/ffffff/500x500.png'],
            ['id' => 16, 'name' => '車用空気清浄機', 'seller_id' => '1', 'buyer_id' => null, 'condition_id' => '1', 'payment_id' => null, 'price' => '5000', 'item_detail' => '車で使用できるUSB充電型の空気清浄機です。新品未使用です。', 'image_url' => 'https://placehold.jp/30/ff4500/ffffff/500x500.png'],
            ['id' => 17, 'name' => '電動歯ブラシ', 'seller_id' => '1', 'buyer_id' => null, 'condition_id' => '1', 'payment_id' => null, 'price' => '4000', 'item_detail' => '新品の電動歯ブラシ本体です。使用時には別売りの付け替えブラシを使用してください。', 'image_url' => 'https://placehold.jp/30/fafad2/ffffff/500x500.png'],
            ['id' => 18, 'name' => 'ワイヤレスイヤホン', 'seller_id' => '3', 'buyer_id' => '7', 'condition_id' => '3', 'payment_id' => '2', 'price' => '3400', 'item_detail' => 'ワイヤレスのイヤホンです。接続に少々時間がかかります。', 'image_url' => 'https://placehold.jp/30/f0e68c/ffffff/500x500.png'],
            ['id' => 19, 'name' => '2022年ヒットソングCD', 'seller_id' => '3', 'buyer_id' => null, 'condition_id' => '2', 'payment_id' => null, 'price' => '2300', 'item_detail' => '2022年の曲が収録されています。一度聞いただけの状態です。', 'image_url' => 'https://placehold.jp/30/cd5c5c/ffffff/500x500.png'],
            ['id' => 20, 'name' => 'ペーパーウェイト', 'seller_id' => '3', 'buyer_id' => null, 'condition_id' => '1', 'payment_id' => null, 'price' => '1000', 'item_detail' => '金属でできた犬のペーパーウェイトです。新品、未使用です。', 'image_url' => 'https://placehold.jp/30/db7093/ffffff/500x500.png'],
            ['id' => 21, 'name' => 'ドライヤー', 'seller_id' => '1', 'buyer_id' => '58', 'condition_id' => '2', 'payment_id' => '2', 'price' => '1200', 'item_detail' => '黒色のドライヤーです。動作に問題ありません。', 'image_url' => 'https://placehold.jp/30/9370db/ffffff/500x500.png'],
            ['id' => 22, 'name' => '電動シェーバー', 'seller_id' => '3', 'buyer_id' => '189', 'condition_id' => '3', 'payment_id' => '1', 'price' => '3000', 'item_detail' => '使用済みですが動作に問題はありません。', 'image_url' => 'https://placehold.jp/30/deb887/ffffff/500x500.png'],
            ['id' => 23, 'name' => '体温計', 'seller_id' => '1', 'buyer_id' => null, 'condition_id' => '2', 'payment_id' => null, 'price' => '600', 'item_detail' => '一度着ましたが、今後使わないので出品します', 'image_url' => 'https://placehold.jp/30/7b68ee/ffffff/500x500.png'],
            ['id' => 24, 'name' => 'アクセサリー', 'seller_id' => '3', 'buyer_id' => '785', 'condition_id' => '1', 'payment_id' => '3', 'price' => '4000', 'item_detail' => 'ハンドメイドのブレスレットです。花をイメージして作成しました。', 'image_url' => 'https://placehold.jp/30/4b0082/ffffff/500x500.png'],
            ['id' => 25, 'name' => 'ペット用おもちゃ', 'seller_id' => '1', 'buyer_id' => '322', 'condition_id' => '1', 'payment_id' => '2', 'price' => '1000', 'item_detail' => '犬用のおもちゃです。購入後、使用しなかったので出品します。', 'image_url' => 'https://placehold.jp/30/adff2f/ffffff/500x500.png']
        ];
        DB::table('items')->insert($params);
    }
}
