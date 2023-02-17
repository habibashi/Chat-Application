<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return Company::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function createCompany(Request $request)
    {
        $formFields = $request->validate([
            'name' => ['required', 'min:3'],
            'description' => ['required'],
            'logo' => ['required'],
            'active' => ['required'],
            'email' => ['required']
        ]);
        
        if ($request->file('logo')) {
            $file = $request->file('logo');
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/companyLogo'), $filename);
            $formFields['logo'] = $filename;
        }
        
        // Create user
        Company::create([
            'name' => $formFields['name'],
            'description' => $formFields['description'],
            'logo' => $formFields['logo'],
            'active' => $formFields['active'],
            'email' => $formFields['email']
        ]);
        
        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function activeCompany(Request $request)
    {
        // dd($request);
        $editActive = $request->validate([
            'company_id' => ['required'],
            'active' => ['required']
        ]);

        $query = Company::where('id', $editActive['company_id'])->first() ;

        $query->active = $editActive['active'];
        $query->save();

        return redirect('/');

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function updateCompany(Request $request)
    {
        $id = Auth::user()->company_id;
        $editData = Company::find($id);
        $editData->name = $request->name;
        $editData->email = $request->email;
        $editData->description = $request->description;
        // $editData->active = $request['active'];

        if ($request->file('logo')) {
            $file = $request->file('logo');

            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/companyLogo'), $filename);
            $editData['logo'] = $filename;
        }
        $editData->save();
        return redirect('/companyProfile');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy(Company $company)
    {
        //
    }
}
