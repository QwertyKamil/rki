<?php

namespace App\Http\Controllers\AdminAuth;

use App\Contest;
use App\Exports\ContestExport;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Facades\Excel;

class ContestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contests = Contest::paginate(10);
        return view('admin.contest.index',compact('contests'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.contest.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $this->validate($request,[
           'name'=>'required',
        ]);
        Contest::create([
            'name'=>$request->name,
            'token'=>Str::random(16),
        ]);
        return redirect()->route('admin.admin-contests')->with('success','Dodano konkurs');
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
     * @param Contest $contest
     * @return \Illuminate\Http\Response
     */
    public function edit(Contest $contest)
    {
        return view('admin.contest.edit',compact('contest'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param Contest $contest
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(Request $request, Contest $contest)
    {
        $this->validate($request,[
            'name'=>'required',
        ]);

        $contest->update([
           'name'=>$request->name,
        ]);

        return redirect()->route('admin.admin-contests')->with('success','Zedytowano konkurs');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Contest $contest
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Contest $contest)
    {
        $contest->delete();
        return redirect()->route('admin.admin-contests')->with('success','Usunięto konkurs');
    }

    public function export(Contest $contest)
    {

        $export = new ContestExport($contest);

        return Excel::download($export, 'wyniki.xlsx');
    }
}
