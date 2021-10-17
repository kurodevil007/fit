<?php

namespace App\Http\Controllers;

use App\Http\Requests\RuleGejalaRequest;
use App\Models\Rules;
use App\Models\Gejala;
use App\Models\Penyakit;
use Illuminate\Http\Request;
use App\Http\Requests\RulesRequest;

class RulesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rules = Rules::all();
        return view('rules.index', compact('rules'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $penyakit = Penyakit::all();
        return view('rules.create', compact('penyakit'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Requests\RulesRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RulesRequest $request)
    {
        Rules::create($request->validated());

        return redirect(route('rules.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $rule = Rules::with('rules_gejala')->findOrFail($id);
        return view('rules.show', compact('rule'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $rule = Rules::with('penyakit')->findOrFail($id);
        $gejala = Gejala::all();
        return view('rules.edit', compact('gejala', 'rule'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Requests\RuleGejalaRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(RuleGejalaRequest $request, $id)
    {
        $rule = Rules::findOrFail($id);
        $data = $request->validated();
        $rule->rules_gejala()->attach($data['gejala']);

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Rules::destroy($id);

        return back();
    }
}
