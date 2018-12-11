<?php

namespace App\Http\Controllers\Front\Page\TermsConditions;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Pages\Page;

class TermsConditionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $termsconditions = Page::where('slug','terms-conditions')->first();
        $value = '';
        if(!empty($termsconditions))
        {
            $value = $termsconditions;
            $id    = $termsconditions->id;
        }
        else
        {
            $value = new Page();
            $id    = '';
        }
        //echo "<pre>"; print_r($termsconditions); echo "</pre>"; exit;

        return view('front.page.terms-conditions.termsconditions')
                    ->with(
                        array(
                            'site_title'      =>    'Job Circle',
                            'page_title'      =>    'Terms & Conditons',
                            'termsconditions' =>    $value,
                            'id'              =>    $id
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
