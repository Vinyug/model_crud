<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // get model data with order by latest and paginate 
        $companies = Company::latest()->paginate(5);
        
        return view('companies.index', compact('companies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('companies.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // data validation
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'name' => 'required|max:50',
            'address' => 'required|max:80',
            'city' => 'max:50',
            'zip_code' => 'integer|max:5',
            'siret' => 'integer|digits:14',
            'code_ape' => 'string|digits:5',
            'phone' => 'integer|digits:10',
            'email' => 'required|email|max:80',
        ]);
        
        // insert in DB
        Company::create($request->post());

        // redirect with message
        return redirect()->route('companies.index')->with('success','L\'entreprise a été enregistrée avec succès.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Company $company)
    {
        return view('companies.show',compact('company'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Company $company)
    {
        return view('companies.edit',compact('company'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Company $company)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'name' => 'required|max:50',
            'address' => 'required|max:80',
            'city' => 'max:50',
            'zip_code' => 'integer|max:5',
            'siret' => 'integer|digits:14',
            'code_ape' => 'string|digits:5',
            'phone' => 'integer|digits:10',
            'email' => 'required|email|max:80',
        ]);
        
        $company->fill($request->post())->save();

        return redirect()->route('companies.index')->with('success','L\'entreprise a été mise à jour avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Company $company)
    {
        $company->delete();
        return redirect()->route('companies.index')->with('success','L\'entreprise a été supprimée avec succès');
    }
}
