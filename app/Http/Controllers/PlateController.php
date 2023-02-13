<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;
use App\Models\plate;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\File;

class PlateController extends Controller
{
     /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        
    //     if i wanted it to apply in a specific methods in the controller
    //      $this->middleware('auth')->only(['create','edit','update','destroy']);
    // there is a methode like only its name is excepte
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $users = User::all();
        $user = Auth::user();
        $plate = plate::with('user')->where('user_id', $user->id)->latest()->paginate(20);
        $adminsCount = user::count();
        $clients = User::where('role_id', 2)->count();
        $admins = User::where('role_id', 1)->count();
        $platesCount = plate::count();
        return view('home',compact('plate','adminsCount','platesCount','clients','admins'));
    }

  
    public function create()
    {
        return view('pages.create');
    }



    public function store(Request $request)
    {
      
        $request->validate([
            'name'=>'required',
            'price'=>'required',
            'coption'=>'required',
            'user_id'=>'required',
            'category_id'=>'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg'
        ]);  
        
        $imageName = time().'.'.request()->image->getClientOriginalExtension();
        $request->image->move(public_path('images'), $imageName);

        // $category = Category::find($id);
        // $categoryName = $category->name;
        $plate=plate::create([
            'name' => $request->name,
            'price' => $request->price,
            'coption' => $request->coption,
            'user_id' => $request->user_id,
            'category_id' => $request->category_id,
            'image' => $imageName
        ]);
        return redirect()->route('home.index')
        ->with('success','Plate added succsesfully');
   
    }

  
    public function show($id)
    {
        $plate = Plate::findOrFail($id);
        return view('pages.show',compact('plate'));
    }

  
    public function edit($id)
    {
        $plate = Plate::where('user_id', Auth::id())->findOrFail($id);
        return view('pages.edite',compact('plate'));
    }

  
    public function update(Request $request, $id)
    {
        try {
            $request->validate([
                'name'=>'required',
                'price'=>'required',
                'coption'=>'required',
                'category_id'=>'required',
                'image' => 'image|mimes:jpeg,png,jpg,gif,svg'
            ]);  

            $plate = Plate::findOrFail($id);
    
            $updateData = [
                'name' => $request->name,
                'price' => $request->price,
                'coption' => $request->coption,
                'category_id'=>$request->category_id
            ];
    
            if ($request->hasFile('image')) {
                $imageName = time().'.'.request()->image->getClientOriginalExtension();
                $request->image->move(public_path('images'), $imageName);
        
                // delete the old image

                File::delete(public_path('images/'.$plate->image));
            
        
                $updateData['image'] = $imageName;
            }
        
            $plate->update($updateData);
          
       
            return redirect()->route('home.index')
            ->with('success','Plate added succsesfully');
        } catch (\Exception $e) {
            dd($e);
        }
    }

 
    public function destroy($id)
    { 
      
           $plate = Plate::findOrFail($id); 

           $path = public_path('images/'.$plate->image);

           if ( file_exists($path) && $plate->image != null ){
            unlink($path);
        }

           $plate->delete();

         return redirect(route('home.index'))
          ->with ('success','product deleted succsessflly');
    }
  
  
}