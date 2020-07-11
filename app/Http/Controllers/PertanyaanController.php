<?php

namespace App\Http\Controllers;

use App\Model\Pertanyaan;
use Illuminate\Http\Request;

class PertanyaanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pertanyaan.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $pertanyaan = Pertanyaan::create(request()->except('_token', 'files'));
        return redirect('question/'.$pertanyaan->uuid)->with('success', 'Pertanyaan Berhasil Disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Pertanyaan  $pertanyaan
     * @return \Illuminate\Http\Response
     */
    public function show(Pertanyaan $question)
    {
        $data['user'] = request()->user();
        $data['pertanyaan'] = $question;
        return view('pertanyaan.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\Pertanyaan  $pertanyaan
     * @return \Illuminate\Http\Response
     */
    public function edit(Pertanyaan $question)
    {
        $data['pertanyaan'] = $question;
        return view('pertanyaan.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Pertanyaan  $pertanyaan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pertanyaan $question)
    {
        $question->update(request()->except('_token', 'files'));
        return redirect('question/'.$question->uuid)->with('success', 'Pertanyaan Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Pertanyaan  $pertanyaan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pertanyaan $question)
    {
        $question->delete();
        return redirect('/')->with('success', 'Pertanyaan Berhasil Dihapus');
    }
}
