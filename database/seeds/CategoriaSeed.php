<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CategoriaSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categorias')->insert([
            'nombre'  => 'Comidas',
            'slug' => Str::slug('Comidas'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            ]);
        DB::table('categorias')->insert([
            'nombre'  => 'Restaurantes',
            'slug' => Str::slug('Restaurantes'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('categorias')->insert([
            'nombre'  => 'Ropa',
            'slug' => Str::slug('Ropa'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('categorias')->insert([
            'nombre'  => 'Hospitales',
            'slug' => Str::slug('Hospitales'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
