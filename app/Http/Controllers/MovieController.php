<?php

namespace App\Http\Controllers;

use App\Http\Requests\MovieRequest;
use App\Models\Movie;
use App\Repositories\MovieRepository;
use Exception;
use Illuminate\Support\Facades\DB;

class MovieController extends AppBaseController
{
    private $movieRepository;

    public function __construct(MovieRepository $movieRepository)
    {
        $this->movieRepository = $movieRepository;
    }

    public function index()
    {
        try {
            return $this->sendInfo($this->movieRepository->index());
        } catch (Exception $e) {
            return $this->sendError($e->getMessage(), [], 500);
        }
    }

    public function store(MovieRequest $request)
    {
        try {
            DB::beginTransaction();
            $this->movieRepository->create($request->only((new Movie())->getFillable()));
            DB::commit();
            return $this->sendSuccess('movie saved successfully');
        } catch (Exception $e) {
            DB::rollBack();
            return $this->sendError($e->getMessage(), [], 500);
        }
    }

    public function show(Movie $movie)
    {
        try {
            return $this->sendResponse($movie);
        } catch (Exception $e) {
            return $this->sendError($e->getMessage(), [], 500);
        }
    }

    public function reviews(Movie $movie)
    {
        try {
            return $this->sendResponse($this->movieRepository->reviews($movie));
        } catch (Exception $e) {
            return $this->sendError($e->getMessage(), [], 500);
        }
    }

    public function update(MovieRequest $request, Movie $movie)
    {
        try {
            DB::beginTransaction();
            $this->movieRepository->update($request->only((new Movie())->getFillable()), $movie->id);
            DB::commit();
            return $this->sendSuccess('movie updated successfully');
        } catch (Exception $e) {
            DB::rollBack();
            return $this->sendError($e->getMessage(), [], 500);
        }
    }

    public function destroy(Movie $movie)
    {
        try {
            DB::beginTransaction();
            $this->movieRepository->delete($movie->id);
            DB::commit();
            return $this->sendSuccess('movie deleted successfully');
        } catch (Exception $e) {
            DB::rollBack();
            return $this->sendError($e->getMessage(), [], 500);
        }
    }
}
