<?php

namespace App\Http\Controllers;

use App\Companies;
use App\Mail\CreateCompany;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class CompaniesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('companies.index',compact('companies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [

            'name' => 'required',
            'email' => 'required',
            'logo' => 'image|mimes:jpeg,png,jpg|max:2048|dimensions:min_width=100,min_height=100',
        ];

        $customMessages = [
            'name.required' => 'Please Enter A Company Name',
            'email.required' => 'Please Enter A Company Email',
            'logo.image' => 'Invalid File Type.',
            'logo.mimes' => 'Invalid Image Type.',
            'logo.dimensions' => 'Minimmun Dimension of Comapny Logo is 100 x 100 px',
        ];

        $this->validate($request, $rules, $customMessages);

        if($request->hasFile('logo')){

            $filenameWithExt = $request->file('logo')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('logo')->getClientOriginalExtension();
            $fileNameToStore= $filename.'_'.time().'.'.$extension;
            $path = $request->file('logo')->storeAs('public/logos', $fileNameToStore);

        }else{

            $fileNameToStore = "noimage.jpg";

        }

        $data = ['name'=> $request->input('name'),'email' => $request->input('email'),'website'=>$request->input('website')];

        Companies::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'logo' => $fileNameToStore,
            'website' => $request->input('website'),
        ]);

        Mail::to($request->input('email'))->send(new CreateCompany($data));

        return back()->with('email','email');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Companies  $companies
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $company = Companies::where('id',$id)->first();

        return view('companies.show',compact('company'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Companies  $companies
     * @return \Illuminate\Http\Response
     */
    public function edit(Companies $companies)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Companies  $companies
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $rules = [

            'name' => 'required',
            'email' => 'required',
            'logo' => 'image|mimes:jpeg,png,jpg|max:2048|dimensions:min_width=100,min_height=100',
        ];

        $customMessages = [
            'name.required' => 'Please Enter A Company Name',
            'email.required' => 'Please Enter A Company Email',
            'logo.image' => 'Invalid File Type.',
            'logo.mimes' => 'Invalid Image Type.',
            'logo.dimensions' => 'Minimmun Dimension of Comapny Logo is 100 x 100 px',
        ];

        $this->validate($request, $rules, $customMessages);

        $query = Companies::where('id',$id);

        $data = $query->pluck('logo')->first();

        if($request->hasFile('logo')){

            $filenameWithExt = $request->file('logo')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('logo')->getClientOriginalExtension();
            $fileNameToStore= $filename.'_'.time().'.'.$extension;
            $path = $request->file('logo')->storeAs('public/logos', $fileNameToStore);

            if ($data != "noimage.jpg") {
                \Storage::delete('public/logos/'.$data);
            }

        }else{

            $fileNameToStore = $data;

        }

        $query->update([
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'logo' => $fileNameToStore,
                'website' => $request->input('website'),
            ]);


        return back()->with('update','update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Companies  $companies
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $query = Companies::where('id',$id);
        $data = $query->pluck('logo')->first();

        if ($data != "noimage.jpg") {
            \Storage::delete('public/logos/'.$data);
        }

        $query->delete();
        return redirect('/companies')->with('delete','deleted');
    }

    public function data(){
        $companies = Companies::all();


        return response()->json(array('data'=> $companies), 200);
    }
}
