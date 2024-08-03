<?php

namespace App\Http\Controllers\Dashboard;
use App\Http\Controllers\Controller;
use App\Repositories\Contract\ReviewRepositoryInterface;
use Illuminate\Http\Request;
use App\Models\Review;
use Illuminate\Support\Facades\Storage;

class ReviewController extends Controller

{


    // protected $reviewRepo;

    // public function __construct(ReviewRepositoryInterface $reviewRepo)
    // {
    //     $this->reviewRepo = $reviewRepo;
    // }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
   

    $reviews =Review::all();
        return view('dashboard.review.index', compact('reviews'));
        
     

    }
    public function destroy(Request $request)
    {
        $review = $this->reviewRepo->findOne($request->id);

      

        $review->delete();

        return \response()->json([
            'message' => 'تم الحذف بنجاح',
        ]);
    }

}
