<?php

use Illuminate\Database\Seeder;

class product extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('product')->delete();
        DB::table('product')->insert([
            ['id' => 1, 'product_code' => 'SP01', 'name' => 'Áo nam da thật MX105', 'price' => 500000, 'featured' => 1, 'state' => 1, 'img' => 'person2.jpg', 'category_id' => 2],
            ['id' => 2, 'product_code' => 'SP02', 'name' => ' Áo Thun Có Cổ', 'price' => 500000, 'featured' => 1, 'state' => 0, 'img' => 'item-6.jpg', 'category_id' => 2],

            ['id' => 3, 'product_code' => 'SP03', 'name' => 'Áo Nữ Sơ Mi Chấm Bi', 'price' => 500000, 'featured' => 1, 'state' => 1, 'img' => 'Ao_nu_so_mi_cham_bi.jpg', 'category_id' => 6],
            ['id' => 4, 'product_code' => 'SP04', 'name' => 'Áo Nữ Phối Viền', 'price' => 110000, 'featured' => 1, 'state' => 0, 'img' => 'ao-nu-phoi-vien.jpg', 'category_id' => 6],
            ['id' => 5, 'product_code' => 'SP05', 'name' => 'Áo Sơ Mi Có Cổ Đúc', 'price' => 110000, 'featured' => 0, 'state' => 1, 'img' => 'ao-nu-so-mi-co-co-duc.jpg', 'category_id' => 6],
            ['id' => 6, 'product_code' => 'SP06', 'name' => 'Áo sơ mi caro xám Xanh', 'price' => 800000, 'featured' => 0, 'state' => 1, 'img' => 'ao-so-mi-ca-ro-xam-xanh-asm1228-10199.jpg', 'category_id' => 2],
            ['id' => 7, 'product_code' => 'SP07', 'name' => 'Áo Sơ Mi Hoạ Tiết Đen', 'price' => 900000, 'featured' => 0, 'state' => 1, 'img' => 'ao-so-mi-hoa-tiet-den-asm1223-10191.jpg', 'category_id' => 2],
            ['id' => 8, 'product_code' => 'SP08', 'name' => 'Áo Sơ Mi Trắng Kem', 'price' => 100000, 'featured' => 1, 'state' => 1, 'img' => 'ao-so-mi-trang-kem-asm836-8193.jpg', 'category_id' => 2],
            ['id' => 9, 'product_code' => 'SP09', 'name' => 'Quần kaki Đỏ Nam', 'price' => 110000, 'featured' => 1, 'state' => 1, 'img' => 'quan-kaki-do-man-qk162-8273.jpg', 'category_id' => 3],
            ['id' => 10, 'product_code' => 'SP10', 'name' => 'Quần kaki Xám',  'price' => 120000, 'featured' => 1, 'state' => 1, 'img' => 'quan-kaki-xam-chuot-dam-qk171-9770.jpg', 'category_id' => 3],

            ['id' => 11, 'product_code' => 'SP11', 'name' => 'Quần âu nam Prazenta I-QAM61', 'price' => 500000, 'featured' => 0, 'state' => 1, 'img' => 'no-img.jpg', 'category_id' => 3],
            ['id' => 12, 'product_code' => 'SP12', 'name' => 'Áo nữ cổ V viền tay xinh xắn', 'price' => 500000, 'featured' => 1, 'state' => 1, 'img' => 'no-img.jpg', 'category_id' => 6],
            ['id' => 13, 'product_code' => 'SP13', 'name' => 'Quần Nữ Suông Ống Rộng', 'price' => 500000, 'featured' => 1, 'state' => 1, 'img' => 'no-img.jpg', 'category_id' => 7],
        ]);
    }
}
