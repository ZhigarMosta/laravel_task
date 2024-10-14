<?php

namespace App\Http\Controllers;

use App\Models\Report as ModelsReport;
use Illuminate\Http\Request as HttpRequest;

class ReportController extends Controller
{
    public function index(){
        $reports = ModelsReport::all();
        return view('report.index', compact('reports'));
    }

    public function destroy(ModelsReport $report){
        $report -> delete();
        return redirect()-> back();
    }

    public function store(HttpRequest $request, ModelsReport $report){
        $data = $request -> validate([
          'number'=>'string',
          'description'=>'string',
        ]);
        $report->create($data);
        return redirect()->back();
      }

      // public function show( ModelsReport $report){
      //   return view('report.show', compact('report'));
      // }

      // public function update(HttpRequest $request, ModelsReport $report){
      //   $data = $request -> validate([
      //     'number'=>'string',
      //     'description'=>'string',
      //   ]);
      //   $report->update($data);
      //   return redirect()->back();
      // }
}
