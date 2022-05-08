<?php

namespace App\Http\Controllers;

use App\Models\Panel_control;
use App\Models\Products;
use App\Models\Categories;
use Illuminate\Http\Request;

class PanelControlController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $all_products = Products::count();
        $sold_products = Products::where('status','sold')->count();
        $Not_sold_products = Products::where('status','Not sold')->count();
        //نسبة الفواتير المدفوعه
        
        if($sold_products & $Not_sold_products !== 0)
        {
            $sold_percentage = round($sold_products/$all_products*100,1);
        
        
        //نسبة الفواتير الغير مدفوعه
        
        
            $Not_sold_percentage = round($Not_sold_products/$all_products*100,1);
       
        

        $chartjs_bar = app()->chartjs
            ->name('barChartTest')
            ->type('bar')
            ->size(['width' => 350, 'height' => 200])
            ->labels(['sold products','Not sold products'])
            ->datasets([
                [
                    "label" => "sold products",
                    'backgroundColor' => ['#029666'],
                    'data' => [$sold_percentage]
                ],
                [
                    "label" => "Not sold products",
                    'backgroundColor' => ['#f93a5a'],
                    'data' => [$Not_sold_percentage]
                ],


            ])
            ->options([]);

            $chartjs_pie = app()->chartjs
        ->name('pieChartTest')
        ->type('pie')
        ->size(['width' => 400, 'height' => 200])
        ->labels(['sold products', 'Not sold products'])
        ->datasets([
            [
                'backgroundColor' => ['#029666', '#f93a5a'],
                'hoverBackgroundColor' => ['green', 'red'],
                'data' => [$sold_percentage, $Not_sold_percentage]
            ]
        ])
        ->options([]);
    
        return view('control_panel.admin', compact('chartjs_bar','chartjs_pie'));
    }
    else{
        $all_products = Products::count();
        $sold_products = Products::where('status','sold')->count();
        $Not_sold_products = Products::where('status','Not sold')->count();
        //نسبة الفواتير المدفوعه
$sold_percentage = round($sold_products/$all_products*100,1);
        
        
        //نسبة الفواتير الغير مدفوعه
        
        
            $Not_sold_percentage = round($Not_sold_products/$all_products*100,1);
       
        

        $chartjs_bar = app()->chartjs
            ->name('barChartTest')
            ->type('bar')
            ->size(['width' => 350, 'height' => 200])
            ->labels(['sold products','Not sold products'])
            ->datasets([
                [
                    "label" => "sold products",
                    'backgroundColor' => ['#029666'],
                    'data' => [$sold_percentage]
                ],
                [
                    "label" => "Not sold products",
                    'backgroundColor' => ['#f93a5a'],
                    'data' => [$Not_sold_percentage]
                ],


            ])
            ->options([]);

            $chartjs_pie = app()->chartjs
        ->name('pieChartTest')
        ->type('pie')
        ->size(['width' => 400, 'height' => 200])
        ->labels(['sold products', 'Not sold products'])
        ->datasets([
            [
                'backgroundColor' => ['#029666', '#f93a5a'],
                'hoverBackgroundColor' => ['green', 'red'],
                'data' => [$sold_percentage, $Not_sold_percentage]
            ]
        ])
        ->options([]);
    return view('control_panel.admin', compact('chartjs_bar','chartjs_pie'));
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
     * @param  \App\Models\Panel_control  $panel_control
     * @return \Illuminate\Http\Response
     */
    public function show(Panel_control $panel_control)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Panel_control  $panel_control
     * @return \Illuminate\Http\Response
     */
    public function edit(Panel_control $panel_control)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Panel_control  $panel_control
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Panel_control $panel_control)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Panel_control  $panel_control
     * @return \Illuminate\Http\Response
     */
    public function destroy(Panel_control $panel_control)
    {
        //
    }
}
