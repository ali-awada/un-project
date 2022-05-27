<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Currency;
use Illuminate\Http\Request;

class AdminCurrency extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $currencies = Currency::all();
        return view('admin.currency.index', compact('currencies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $currencies = Currency::all();
        return view('admin.currency.add', compact('currencies'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validated = $request->validate([
            'name' => 'required|unique:currencies|min:3',
            'symbole' => 'required|unique:currencies',
            'rate' => 'required|integer',

        ]);
        $currency = new Currency();
        $currency->name = $validated['name'];
        $currency->symbole = $validated['symbole'];
        $currency->rate = $validated['rate'];
        $currency->save();

        return redirect()->route("adminCurrency.index");
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Currency $currency)
    {

        return view('admin.currency.edit', compact('currency'));

        // dd($categories);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Currency $currency)
    {

        $validated = $request->validate([
            'name' => 'required|unique:currencies|min:3',
            'symbol' => 'required|unique:currencies',
            'rate' => 'required|number',

        ]);
        $currency = new Currency();
        $currency->name = $validated['name'];
        $currency->symbol = $validated['symbol'];
        $currency->rate = $validated['rate'];
        $currency->save();
        return redirect()->route("adminCurrency.index");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Currency $currency)
    {

        $currency->delete();
        return redirect()->route("adminCurrency.index");
    }
}
