<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\banners;
use Carbon\Carbon;
use DB;

class _FrontBanners extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        try {

            $limit = ($request->limit) ? $request->limit : 15;
            $now = Carbon::now();
            $data = banners::inRandomOrder()
                ->join('attacheds','attacheds.id','=','banners.attached_id')
                ->where('banners.start','<=',$now->toDateTimeString())
                ->where('banners.finish','>=',$now->toDateTimeString())
                ->select('banners.*','attacheds.small as attached_small',
                'attacheds.medium as attached_medium','attacheds.large as attached_large',
                'attacheds.video_url',
                DB::raw('(SELECT attacheds.medium FROM attacheds 
                WHERE attacheds.id = banners.attached_responsive_id limit 1) as attached_responsive'))
                ->paginate($limit);

            $response = array(
                'status' => 'success',
                'data' => $data,
                'code' => 0
            );
            return response()->json($response);

        } catch (\Exception $e) {

            $response = array(
                'status' => 'fail',
                'msg' => $e->getMessage(),
                'code' => 1
            );

            return response()->json($response, 500);

        }
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
        //-
    }
}
