<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Listing;
use Illuminate\Contracts\Session\Session;

class ListingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('listings.index', [
        'listings'=>Listing::latest()->filter(request(['tag','search']))->paginate(6)
    ]);
    }

    /**
     * Show the form for creating a new listings resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('listings.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $formData= $request->validate([
            'title'=>'required',
            'company'=>'required|unique:listings',
            'location'=>'required',
            'website'=>'required',
            'email'=>'required|email',
            'tags'=>'required',
            'description'=>'required'

        ]);

        if($request->hasFile('logo')){
            $formData['logo']=$request->file('logo')->store('logos','public');
        }
        Listing::create($formData);
        return redirect('/')->with('message','Listing Created Succesfuly');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Listing $listing)
    {
       return view('listings.show',[
        'listing'=>$listing
    ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
