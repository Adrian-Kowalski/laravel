<?php

namespace App\Http\Controllers\Api\v1;

use App\Models\Tour;
use App\Models\Travel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ToursListRequest;

class TourController extends Controller
{
   
    public function index(Travel $travel, ToursListRequest $request)
    {
        $tours = $travel->tours()
        ->when($request->priceFrom, function ($query) use ($request) {
            $query->where('price', '>=', $request->priceFrom * 100);
        })
        ->when($request->priceTo, function ($query) use ($request) {
            $query->where('price', '<=', $request->priceTo * 100);
        })
        ->when($request->dateFrom, function ($query) use ($request) {
            $query->where('price', '>=', $request->dateFrom);
        })
        ->when($request->dateTo, function ($query) use ($request) {
            $query->where('price', '>=', $request->dateTo);
        })
        ->when($request->sortBy && $request->sortOrder, function ($query) use ($request) {
            $query->orderBy($request->sortBy, $request->sortOrder);
        })
    }
}
