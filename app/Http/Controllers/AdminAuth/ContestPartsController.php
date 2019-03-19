<?php

namespace App\Http\Controllers\AdminAuth;

use App\Contest;
use App\ContestPart;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ContestPartsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Contest $contest
     * @return \Illuminate\Http\Response
     */
    public function index(Contest $contest)
    {
        $parts = $contest->parts()->paginate(10);
        return view('admin.contestspart.index',compact('parts','contest'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param Contest $contest
     * @return \Illuminate\Http\Response
     */
    public function create(Contest $contest)
    {
        return view('admin.contestspart.add',compact('contest'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param Contest $contest
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Contest $contest)
    {
        ContestPart::create([
            'name'=>$request->name,
            'contest_id'=>$contest->id,
        ]);
        return redirect()->route('admin.admin-parts',$contest);
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
     * @param ContestPart $part
     * @return \Illuminate\Http\Response
     */
    public function edit(Contest $contest,ContestPart $part)
    {
        return view('admin.contestspart.edit',compact('contest','part'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param Contest $contest
     * @param ContestPart $part
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Contest $contest,ContestPart $part)
    {
        $part->update([
            'name'=>$request->name,
        ]);
        return redirect()->route('admin.admin-parts',$contest);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Contest $contest
     * @param ContestPart $part
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Contest $contest,ContestPart $part)
    {
        $part->delete();
        return redirect()->route('admin.admin-parts',$contest);
    }
}
