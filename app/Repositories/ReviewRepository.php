<?php

namespace App\Repositories;

use App\Models\Review;
use Exception;
use Symfony\Component\HttpKernel\Exception\UnprocessableEntityHttpException;

class ReviewRepository extends BaseRepository
{
    public function getFieldsSearchable()
    {
        return [];
    }

    public function model()
    {
        return Review::class;
    }

    public function create($input)
    {
        try {
            $review  = Review::create([
                'movie_id' => $input['movie_id'],
                'score'    => $input['score'],
                'comment'  => $input['comment'],
            ]);

        } catch (Exception $e) {
            throw new UnprocessableEntityHttpException($e->getMessage());
        }
    }

    public function update($input, $id)
    {
        try {
            $review            = Review::find($id);
            $review->movie_id  = $input['movie_id'];
            $review->score     = $input['score'];
            $review->comment   = $input['comment'];
            $review->save();

        } catch (Exception $e) {
            throw new UnprocessableEntityHttpException($e->getMessage());
        }
    }
}
