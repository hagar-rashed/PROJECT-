<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\VallageRequest;
use App\Repositories\Contract\VallageRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class VallageController extends Controller
{
    protected $vallageRepo;

    public function __construct(VallageRepositoryInterface $vallageRepo)
    {
        $this->vallageRepo = $vallageRepo;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {        $vallages = $this->vallageRepo->getAll();

     
        return view('dashboard.vallages.index', compact('vallages'));
        
     

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.vallages.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();

        $vallage = $this->vallageRepo->create($data);
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $path = $image->store('vallages', 'public');
                $vallage->images()->create([
                    'path' => $path,
                ]);
            }
        }
        $vallage = $this->vallageRepo->create($data);
       var_dump('good');
        if ($vallage) {
            return redirect()->route('admin.vallages.index')->with('success', __('models.added_success'));
         } else {
             return redirect()->back()->with('error', 'حدث خطأ أثناء الإضافة');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $vallage = $this->vallageRepo->findOne($id);

        if ($vallage) {
            return view('dashboard.vallages.edit', compact('vallage'));
        } else {
            return view('dashboard.error');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(VallageRequest $request, $id)
    {
        $vallage = $this->vallageRepo->findOne($id);

        $data = $request->except('_token', '_method');

        if ($request->hasFile('image')) {

            Storage::delete($vallage->image);

            $data['image'] = $request->file('image')->store('vallages');
        } else {

            $data['image'] = $vallage->image;
        }

        $vallage->update($data);

        if ($vallage) {
            return redirect()->route('admin.vallages.index')->with('success', __('models.update_success'));
        } else {
            return redirect()->back()->with('error', 'حدث خطأ أثناء التعديل');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $vallage = $this->vallageRepo->findOne($request->id);

        if ($vallage->image) {
            Storage::delete($vallage->image);
        }

        $vallage->delete();

        return \response()->json([
            'message' => 'تم الحذف بنجاح',
        ]);
    }
}
