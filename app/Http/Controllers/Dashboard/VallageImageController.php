<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\VallageImageRequest;
use App\Repositories\Contract\VallageImageRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class VallageImageController extends Controller
{
    // protected $vallageImageRepo;

    // public function __construct(VallageImageRepositoryInterface $vallageImageRepo)
    // {
    //     $this->vallageImageRepo = $vallageImageRepo;
    // }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
   

        return ("red");
    }



}
