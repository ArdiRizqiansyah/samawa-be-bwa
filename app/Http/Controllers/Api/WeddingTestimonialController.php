<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\WeddingTestimonial;
use App\Http\Controllers\Controller;
use App\Http\Resources\Api\WeddingTestimonialResource;

class WeddingTestimonialController extends Controller
{
    public function index(Request $request)
    {
        $limit = $request->query('limit', 10);

        $weddingTestimonials = WeddingTestimonial::with(['weddingPackage'])
            ->limit($limit)
            ->get();

        return WeddingTestimonialResource::collection($weddingTestimonials);
    }
}
