<?php

namespace App\Repositories;

use App\Models\Movie;
use App\Models\Review;
use Exception;
use Symfony\Component\HttpKernel\Exception\UnprocessableEntityHttpException;

class MovieRepository extends BaseRepository
{
    public function getFieldsSearchable()
    {
        return [];
    }

    public function model()
    {
        return Movie::class;
    }

    public function index()
    {
        $result = [
            'total'               => null,
            'last_page'           => null,
            'next_page_url'       => null,
            'prev_page_url'       => null,
            'data'                => [],
        ];

        $movies                   = Movie::paginate(2)->toArray();

        foreach ($movies['data'] as $row)
        {
            $reviews              = Review::where('movie_id', $row['id'])->get();

            $result['data'][] = [
                'id'              => $row['id'],
                'name'            => $row['name'],
                'release_date'    => $row['release_date'],
                'synopsis'        => $row['synopsis'],
                'duration'        => $row['duration'],
                'image'           => $row['image'],
                'genre'           => $row['genre'],
                'score_average'   => (sizeof($reviews) > 0)? ($reviews->sum('score') / sizeof($reviews)) : 0.00,
            ];
        }


        $result['total']          = $movies['total'];
        $result['last_page']      = $movies['last_page'];
        $result['next_page_url']  = $movies['next_page_url'];
        $result['prev_page_url']  = $movies['prev_page_url'];

        return $result;
    }

    public function create($input)
    {
        try {

            $movie = Movie::create([
                'name'          => $input['name'],
                'release_date'  => $input['release_date'],
                'synopsis'      => $input['synopsis'],
                'duration'      => $input['duration'],
                'genre'         => $input['genre'],
            ]);

            if ($file = request()->file('image'))
            {
                $name = $movie->id.'-'.time().rand(1, 100).'.'.$file->getClientOriginalExtension();
                $file->move(public_path('movies/'), $name);

                $movie->image = $name;
                $movie->save();
            }

            if(request()->has('reviews'))
            {
                foreach (request('reviews') as $review)
                {
                    Review::create([
                        'movie_id'  => $movie->id,
                        'score'     => $review['score'],
                        'comment'   => $review['comment'],
                    ]);
                }
            }
        } catch (Exception $e) {
            throw new UnprocessableEntityHttpException($e->getMessage());
        }
    }

    public function reviews(Movie $movie)
    {
        $row                  = $movie->load(['reviews']);

        return [
            'id'              => $row->id,
            'name'            => $row->name,
            'release_date'    => $row->release_date,
            'synopsis'        => $row->synopsis,
            'duration'        => $row->duration,
            'image'           => $row->image,
            'genre'           => $row->genre,
            'score_average'   => (sizeof($row->reviews) > 0)? ($row->reviews->sum('score') / sizeof($row->reviews)) : 0.00,
            'reviews'         => $row->reviews,
        ];
    }
}
