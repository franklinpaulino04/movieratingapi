<?php

namespace App\Http\Controllers;

use App\Http\Requests\ReviewRequest;
use App\Models\Review;
use App\Repositories\ReviewRepository;
use Exception;
use Illuminate\Support\Facades\DB;

class ReviewController extends AppBaseController
{
    private $reviewRepository;

    public function __construct(ReviewRepository $reviewRepository)
    {
        $this->reviewRepository = $reviewRepository;
    }

    public function store(ReviewRequest $request)
    {
        try {
            DB::beginTransaction();
            $this->reviewRepository->create($request->only((new Review())->getFillable()));
            DB::commit();
            return $this->sendSuccess('review saved successfully');
        } catch (Exception $e) {
            DB::rollBack();
            return $this->sendError($e->getMessage(), [], 500);
        }
    }

    public function update(ReviewRequest $request, Review $review)
    {
        try {
            DB::beginTransaction();
            $this->reviewRepository->update($request->only((new Review())->getFillable()), $review->id);
            DB::commit();
            return $this->sendSuccess('review updated successfully');
        } catch (Exception $e) {
            DB::rollBack();
            return $this->sendError($e->getMessage(), [], 500);
        }
    }

    public function destroy(Review $review)
    {
        try {
            DB::beginTransaction();
            $this->reviewRepository->delete($review->id);
            DB::commit();
            return $this->sendSuccess('review deleted successfully');
        } catch (Exception $e) {
            DB::rollBack();
            return $this->sendError($e->getMessage(), [], 500);
        }
    }
}
