<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    $companies = Company::all();

    return response()->json($companies);
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(Request $request)
  {
    $company = Company::create([
      'name' => $request->name
    ]);

    return response()->json($company);
  }

  /**
   * Display the specified resource.
   */
  public function show(Company $company)
  {
    return response()->json($company);
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, Company $company)
  {
    $oldCompany = Company::find($company->id);
    $oldCompany->name = $request->name;
    $oldCompany->save();

    return response()->json($oldCompany);
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(Company $company)
  {
    $company->delete();

    return response()->json([
      'status' => 'success',
      'data'   => $company
    ]);
  }
}
