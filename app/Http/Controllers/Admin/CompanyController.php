<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Company;

class CompanyController extends Controller
{
    public function index()
    {
        return inertia('admin/Companies', [
            'companies' => Company::all(),
        ]);
    }
    
    /**
     * Show the company settings page.
     */
    public function edit()
    {
        return inertia('admin/Company');
    }

    /**
     * Update the company settings.
     */
    public function update()
    {
        // Logic to update company settings goes here
        return to_route('admin.company.edit')->with('status', 'Company settings updated successfully.');
    }
}