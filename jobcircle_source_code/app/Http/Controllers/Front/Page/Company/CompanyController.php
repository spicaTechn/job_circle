<?php

namespace App\Http\Controllers\Front\Page\Company;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Pages\Page;
use App\Model\Pages\PageDetails;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //getting company all data and showing in view
        $company = Page::where('slug','company')->first();
        if(!empty($company)):
            $company_details             = $company->page_details()->first();
            $company_details_unserialize = unserialize($company_details->meta_value);
        else:
            $company                     = new Page();
            $company                     = '';
            $company_details_unserialize = new PageDetails();
            $company_details_unserialize = '';
        endif;

        return view('front.page.company.company')
                    ->with(
                        array(
                            'site_title'          =>    'Job Circle',
                            'page_title'          =>    'Company',
                            'company'             =>    $company,
                            'company_detail'      =>    $company_details_unserialize,
                        )

                    );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
