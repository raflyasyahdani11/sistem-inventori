<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class BarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // \App\Models\Barang::factory()->count(50)->create();

        \App\Models\Barang::factory()->createMany([
            [
                'kode' => 'PR001',
                'nama' => 'Milku 200ML',
                'id_jenis_barang' => 2,
            ],
            [
                'kode' => 'PR002',
                'nama' => 'Golda 200ML',
                'id_jenis_barang' => 2,
            ],
            [
                'kode' => 'PR003',
                'nama' => 'Teh Rio 180ML',
                'id_jenis_barang' => 2,
            ],
            [
                'kode' => 'PR004',
                'nama' => 'Floridina 350ML',
                'id_jenis_barang' => 2,
            ],
            [
                'kode' => 'PR005',
                'nama' => 'Le Minerale 600ML',
                'id_jenis_barang' => 2,
            ],
            [
                'kode' => 'PR006',
                'nama' => 'Mie Sedap Kari 72',
                'id_jenis_barang' => 1,
            ],
            [
                'kode' => 'PR007',
                'nama' => 'Japota Ayam 68Gr',
                'id_jenis_barang' => 1,
            ],
            [
                'kode' => 'PR008',
                'nama' => 'Potabee BBQ 35Gr',
                'id_jenis_barang' => 1,
            ],
            [
                'kode' => 'PR009',
                'nama' => 'Chitato Beef 35Gr',
                'id_jenis_barang' => 1,
            ],
            [
                'kode' => 'PR010',
                'nama' => 'Chiki Twist 15Gr',
                'id_jenis_barang' => 7,
            ],
            [
                'kode' => 'PR011',
                'nama' => 'Fortune 2 Liter',
                'id_jenis_barang' => 7,
            ],
            [
                'kode' => 'PR012',
                'nama' => 'Kunci Mas 1 Liter',
                'id_jenis_barang' => 7,
            ],
            [
                'kode' => 'PR013',
                'nama' => 'Kunci Mas 2 Liter',
                'id_jenis_barang' => 7,
            ],
            [
                'kode' => 'PR014',
                'nama' => 'Bimoli 5 Liter',
                'id_jenis_barang' => 7,
            ],
            [
                'kode' => 'PR015',
                'nama' => 'Head & Shoulder 170 ml',
                'id_jenis_barang' => 8,
            ],
            [
                'kode' => 'PR016',
                'nama' => 'Pantene Conditioner 290 ml',
                'id_jenis_barang' => 8,
            ],
            [
                'kode' => 'PR017',
                'nama' => 'Pantene Shampoo Gold Series 125ml Smooth Sleek',
                'id_jenis_barang' => 8,
            ],
            [
                'kode' => 'PR018',
                'nama' => 'REJOICE Shampoo Rich 150 ML',
                'id_jenis_barang' => 8,
            ],
            [
                'kode' => 'PR019',
                'nama' => 'Dove Daily Shine Shampoo',
                'id_jenis_barang' => 8,
            ],
            [
                'kode' => 'PR020',
                'nama' => 'Shampo Lifebuoy Botol 340 ml',
                'id_jenis_barang' => 8,
            ],
            [
                'kode' => 'PR021',
                'nama' => 'Lifebuoy Shampoo Anti Hair Fall [680 mL]',
                'id_jenis_barang' => 8,
            ],
            [
                'kode' => 'PR022',
                'nama' => 'Sunsilk Hijab Refresh & Anti Dandruff [170 ml]',
                'id_jenis_barang' => 8,
            ],
            [
                'kode' => 'PR023',
                'nama' => 'Mie Sedaap Goreng 90 gr',
                'id_jenis_barang' => 1,
            ],
            [
                'kode' => 'PR024',
                'nama' => 'Mie Sedaap R.Korean Spicy Soup 77 gr',
                'id_jenis_barang' => 1,
            ],
            [
                'kode' => 'PR025',
                'nama' => 'Mie Sedaap R.Korean Spicy Chicken 87 gr',
                'id_jenis_barang' => 1,
            ],
            [
                'kode' => 'PR026',
                'nama' => 'Mie Sedaap R.Kari Ayam 72 gr',
                'id_jenis_barang' => 1,
            ],
            [
                'kode' => 'PR027',
                'nama' => 'Mie Sedaap R.Kari Special 85 gr',
                'id_jenis_barang' => 1,
            ],
            [
                'kode' => 'PR028',
                'nama' => 'Anlene Actifit Cokelat Susu Bubuk Dewasa [250 g]',
                'id_jenis_barang' => 2,
            ],
            [
                'kode' => 'PR029',
                'nama' => 'DANCOW 3 Vanila Susu Box 400 g',
                'id_jenis_barang' => 2,
            ],
            [
                'kode' => 'PR030',
                'nama' => 'Susu UHT Ultra Milk Full Cream 1L',
                'id_jenis_barang' => 2,
            ],
            [
                'kode' => 'PR031',
                'nama' => 'oatside 200ml',
                'id_jenis_barang' => 2,
            ],
            [
                'kode' => 'PR032',
                'nama' => 'Greenfields UHT Milk Choco Malt [125 mL]',
                'id_jenis_barang' => 2,
            ],
            [
                'kode' => 'PR033',
                'nama' => 'PRENAGEN MOMMY UHT COKLAT 200 ML',
                'id_jenis_barang' => 2,
            ],
            [
                'kode' => 'PR034',
                'nama' => 'Ale-Ale Leci Cup 180 ml',
                'id_jenis_barang' => 2,
            ],
            [
                'kode' => 'PR035',
                'nama' => 'Ale-Ale Guava Cup 180 ml',
                'id_jenis_barang' => 2,
            ],
            [
                'kode' => 'PR036',
                'nama' => 'Ale-Ale Orange Cup 180 ml',
                'id_jenis_barang' => 2,
            ],
            [
                'kode' => 'PR037',
                'nama' => 'CITRA Sabun Mandi Batang Aloe Vera 70 g',
                'id_jenis_barang' => 8,
            ],
            [
                'kode' => 'PR038',
                'nama' => 'Cussons Baby Hair & Body Wash Mild & Gentle - 400 ml',
                'id_jenis_barang' => 8,
            ],
            [
                'kode' => 'PR039',
                'nama' => 'Dettol bodywash 625 gr pump ',
                'id_jenis_barang' => 8,
            ],
            [
                'kode' => 'PR040',
                'nama' => 'Biore Body Foam Whitening Scrub Sabun Mandi Cair [100 mL]',
                'id_jenis_barang' => 8,
            ],
            [
                'kode' => 'PR041',
                'nama' => 'GIV Body Wash Sabun Mandi Cair Refill 900 ML Flower Glowing White GIV',
                'id_jenis_barang' => 8,
            ],
            [
                'kode' => 'PR042',
                'nama' => 'BETADINE Pomegranate Body Wash [400 mL]',
                'id_jenis_barang' => 8,
            ],
            [
                'kode' => 'PR043',
                'nama' => 'Mama Lemon Jeruk Nipis 800ml MULTICOLOR',
                'id_jenis_barang' => 8,
            ],
            [
                'kode' => 'PR044',
                'nama' => 'Sabun Lifebuoy Cair Btl 100 ml',
                'id_jenis_barang' => 8,
            ],
            [
                'kode' => 'PR045',
                'nama' => 'Sabun Lifebuoy Cair Ref 250 ml',
                'id_jenis_barang' => 8,
            ],
            [
                'kode' => 'PR046',
                'nama' => 'Lux Body Wash Soft Rose Sabun Cair [250 mL/ Refill]',
                'id_jenis_barang' => 8,
            ],
            [
                'kode' => 'PR047',
                'nama' => 'NUVO Family Protect Body Wash Cair Refill 900ml 900 ml',
                'id_jenis_barang' => 8,
            ],
            [
                'kode' => 'PR048',
                'nama' => 'Shinzui Skin Lightening Body Cleanser Kirei Sabun Mandi Cair [500 mL]',
                'id_jenis_barang' => 8,
            ],
            [
                'kode' => 'PR049',
                'nama' => 'NESTLE PURE LIFE Air Mineral Botol [1500 mL]',
                'id_jenis_barang' => 2,
            ],
            [
                'kode' => 'PR050',
                'nama' => 'Crystalline Air Mineral 600Ml',
                'id_jenis_barang' => 2,
            ],
            [
                'kode' => 'PR051',
                'nama' => 'Cleo Eco Pack Drinking Water Air Mineral – 550 ml',
                'id_jenis_barang' => 2,
            ],
            [
                'kode' => 'PR052',
                'nama' => 'Vit Air Mineral Botol 550 mL',
                'id_jenis_barang' => 2,
            ],
            [
                'kode' => 'PR053',
                'nama' => 'Aqua Air Mineral [600 mL]',
                'id_jenis_barang' => 2,
            ],
            [
                'kode' => 'PR054',
                'nama' => 'ADES AIR MINERAL 600 ML',
                'id_jenis_barang' => 2,
            ],
            [
                'kode' => 'PR055',
                'nama' => 'PRISTINE Air Mineral [600 mL/ Botol]',
                'id_jenis_barang' => 2,
            ],
            [
                'kode' => 'PR056',
                'nama' => 'Club 600 ml ',
                'id_jenis_barang' => 2,
            ],
            [
                'kode' => 'PR057',
                'nama' => 'Teh Botol Sosro 350 ml',
                'id_jenis_barang' => 2,
            ],
            [
                'kode' => 'PR058',
                'nama' => 'Fruit tea 350ml',
                'id_jenis_barang' => 2,
            ],
            [
                'kode' => 'PR059',
                'nama' => 'NU GREEN TEA HONEY 500 ML',
                'id_jenis_barang' => 2,
            ],
            [
                'kode' => 'PR060',
                'nama' => 'Frestea Green Tea Honey Minuman Teh Hijau Rasa Madu [500 mL]',
                'id_jenis_barang' => 2,
            ],
            [
                'kode' => 'PR061',
                'nama' => 'Ichi Ocha Teh Melati 350ml ',
                'id_jenis_barang' => 2,
            ],
            [
                'kode' => 'PR062',
                'nama' => 'Pulpy orange 300ml',
                'id_jenis_barang' => 2,
            ],
            [
                'kode' => 'PR063',
                'nama' => 'Mogu Mogu Leci 320ml ',
                'id_jenis_barang' => 2,
            ],
            [
                'kode' => 'PR064',
                'nama' => 'Mizone White Isotonic Lychee Lemon White Tea - 500 ml',
                'id_jenis_barang' => 2,
            ],
            [
                'kode' => 'PR065',
                'nama' => 'Ciptadent Pasta Gigi Maxi White 65 Gr',
                'id_jenis_barang' => 4,
            ],
            [
                'kode' => 'PR066',
                'nama' => 'CLOSE UP Pasta Gigi Green [65 gr]',
                'id_jenis_barang' => 4,
            ],
            [
                'kode' => 'PR067',
                'nama' => 'Pepsodent Pasta Gigi White 25 Gram',
                'id_jenis_barang' => 4,
            ],
            [
                'kode' => 'PR068',
                'nama' => 'Pepsodent 75 gr',
                'id_jenis_barang' => 4,
            ],
            [
                'kode' => 'PR069',
                'nama' => 'Pepsodent 120 gr',
                'id_jenis_barang' => 4,
            ],
            [
                'kode' => 'PR070',
                'nama' => 'Pepsodent Pasta Gigi Whitening 190g',
                'id_jenis_barang' => 4,
            ],
            [
                'kode' => 'PR071',
                'nama' => 'Pepsodent Pasta Gigi Kids Strawberry - 50G',
                'id_jenis_barang' => 4,
            ],
            [
                'kode' => 'PR072',
                'nama' => 'Pepsodent Herbal 190 gr',
                'id_jenis_barang' => 4,
            ],
            [
                'kode' => 'PR073',
                'nama' => 'Taro net seaweed 65gr',
                'id_jenis_barang' => 1,
            ],
            [
                'kode' => 'PR074',
                'nama' => 'Jetz Sweet Stick Chocolate 65gr',
                'id_jenis_barang' => 1,
            ],
            [
                'kode' => 'PR075',
                'nama' => 'Doritos Snack 150gr',
                'id_jenis_barang' => 1,
            ],
            [
                'kode' => 'PR076',
                'nama' => 'Good day cappucino 250ml',
                'id_jenis_barang' => 2,
            ],
            [
                'kode' => 'PR077',
                'nama' => 'Indocafe Latte Gayo Origins (200ml)',
                'id_jenis_barang' => 2,
            ],
            [
                'kode' => 'PR078',
                'nama' => 'KAPAL API White Coffee Botol 200 ml',
                'id_jenis_barang' => 2,
            ],
            [
                'kode' => 'PR079',
                'nama' => 'Luwak Kopi Gula Tradisional Botol 220 ml',
                'id_jenis_barang' => 2,
            ],
            [
                'kode' => 'PR080',
                'nama' => 'Tic Tac Ori [80 Gr]',
                'id_jenis_barang' => 1,
            ],
            [
                'kode' => 'PR081',
                'nama' => 'Leo Snack Kentang Keripik Kentang Rasa Ayam Original 10 Gr',
                'id_jenis_barang' => 1,
            ],
            [
                'kode' => 'PR082',
                'nama' => 'Attack Easy Liquid Romantic Flower Botol Detergent [1000 ml]',
                'id_jenis_barang' => 5,
            ],
            [
                'kode' => 'PR083',
                'nama' => 'ATTACK Jaz 1 Pesona Segar Deterjen [900 g]',
                'id_jenis_barang' => 5,
            ],
            [
                'kode' => 'PR084',
                'nama' => 'Attack Plus Softener 450 gr',
                'id_jenis_barang' => 5,
            ],
            [
                'kode' => 'PR085',
                'nama' => 'Attack Softener 800 gr',
                'id_jenis_barang' => 5,
            ],
            [
                'kode' => 'PR086',
                'nama' => 'DAIA Deterjen Bubuk Soft Pink [800 g]',
                'id_jenis_barang' => 5,
            ],
            [
                'kode' => 'PR087',
                'nama' => 'Rinso Bubuk 800 gr',
                'id_jenis_barang' => 5,
            ],
            [
                'kode' => 'PR088',
                'nama' => 'Rinso Matic Professional Deterjen Laundry Cair 1.65 L',
                'id_jenis_barang' => 5,
            ],
            [
                'kode' => 'PR089',
                'nama' => 'SO KLIN Softergent Pink Cotton Deterjen [800 g]',
                'id_jenis_barang' => 5,
            ],
            [
                'kode' => 'PR090',
                'nama' => 'Harpic 200 ml',
                'id_jenis_barang' => 6,
            ],
            [
                'kode' => 'PR091',
                'nama' => 'So Klin Lemon Pembersih Lantai [800 ml]',
                'id_jenis_barang' => 6,
            ],
            [
                'kode' => 'PR092',
                'nama' => 'Super Pell Lemon Ginger 400 ml',
                'id_jenis_barang' => 6,
            ],
            [
                'kode' => 'PR093',
                'nama' => 'Super Pell Apple 400 ml',
                'id_jenis_barang' => 6,
            ],
            [
                'kode' => 'PR094',
                'nama' => 'Vixal Pembersih Perselen [500 ml]',
                'id_jenis_barang' => 6,
            ],
        ]);
    }
}