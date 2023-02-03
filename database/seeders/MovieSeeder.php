<?php

namespace Database\Seeders;

use App\Models\Movie;
use App\Models\Review;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class MovieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Movie::query()->truncate();
        Movie::insert([
            [
              'name'         => 'Project Wolf Hunting',
              'release_date' => Carbon::now()->format('Y-m-d'),
              'synopsis'     => 'Un grupo de criminales se unen para coordinar su escape durante su transporte marítimo de Filipinas a Corea del Sur. Los eventos de motín escalan entre brutalidad y terror contra de los agentes....',
              'duration'     => '122 min.',
              'genre'        => 'Terror, Suspense / Thriller, Acción y Aventuras',
              'created_at'   => Carbon::now()->format('Y-m-d H:i:s')
          ],
            [
                'name'         => 'Almas en pena de Inisherin',
                'release_date' => Carbon::now()->format('Y-m-d'),
                'synopsis'     => 'En una remota isla irlandesa, Pádraic y Colm son dos amigos de toda la vida que ponen fin abruptamente a su duradera amistad. Sin embargo, las consecuencias serán impactantes para ambos....',
                'duration'     => '109 min.',
                'genre'        => 'Comedia, Drama',
                'created_at'   => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'name'         => 'Tengo sueños eléctricos',
                'release_date' => Carbon::now()->format('Y-m-d'),
                'synopsis'     => 'La madre de Eva quiere reformar la casa y deshacerse del gato, que orina por todas partes. Eva quiere irse a vivir con su padre, quien vive una segunda adolescencia....',
                'duration'     => '101 min.',
                'genre'        => 'Drama',
                'created_at'   => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'name'         => 'Las paredes hablan',
                'release_date' => Carbon::now()->format('Y-m-d'),
                'synopsis'     => 'Bajo la mirada del cineasta Carlos Saura se muestra la evolución del arte con la pared como lienzo, desde las cuevas prehistóricas hasta el arte urbano....',
                'duration'     => '75 min',
                'genre'        => 'Documental',
                'created_at'   => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'name'         => 'La amiga de mi amiga',
                'release_date' => Carbon::now()->format('Y-m-d'),
                'synopsis'     => 'Tienen treinta años pero viven igual que cuando tenían veinte, aunque ya no tienen edad para convertirse en jóvenes promesas. Están enamoradas del amor pero, en su búsqueda, se destrozan unas a otras....',
                'duration'     => '89 min.',
                'genre'        => 'Comedia, Drama',
                'created_at'   => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'name'         => 'Un viaje de mármol',
                'release_date' => Carbon::now()->format('Y-m-d'),
                'synopsis'     => 'Documental de carácter antropológico que repasa la cadena de producción del mármol griego y chino y la relevancia de este en sus respectivas culturas, desde sus dificultades hasta su estatus....',
                'duration'     => '96 min.',
                'genre'        => 'Documental',
                'created_at'   => Carbon::now()->format('Y-m-d H:i:s')
            ],
        ]);

        Review::query()->truncate();
        Review::insert([
            [
                'movie_id'   => 1,
                'score'      => 10,
                'comment'    => 'Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'movie_id'   => 1,
                'score'      => 12,
                'comment'    => 'Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'movie_id'   => 2,
                'score'      => 15,
                'comment'    => 'Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'movie_id'   => 2,
                'score'      => 43,
                'comment'    => 'Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'movie_id'   => 3,
                'score'      => 43,
                'comment'    => 'Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'movie_id'    => 3,
                'score'       => 22,
                'comment'     => 'Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit',
                'created_at'  => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'movie_id'    => 4,
                'score'       => 22,
                'comment'     => 'Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit',
                'created_at'  => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'movie_id'   => 4,
                'score'      => 14,
                'comment'    => 'Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'movie_id'    => 5,
                'score'       => 43,
                'comment'     => 'Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit',
                'created_at'  => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'movie_id'    => 5,
                'score'       => 14,
                'comment'     => 'Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit',
                'created_at'  => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'movie_id'   => 6,
                'score'      => 65,
                'comment'    => 'Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'movie_id'   => 6,
                'score'      => 33,
                'comment'    => 'Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
        ]);
    }
}
