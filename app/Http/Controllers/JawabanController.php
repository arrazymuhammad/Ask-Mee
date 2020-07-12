<?php

namespace App\Http\Controllers;

use App\Model\Jawaban;
use App\Model\Pertanyaan;
use Illuminate\Http\Request;

class JawabanController extends Controller
{
    public function store(Pertanyaan $question)
    {
        $jawaban = new Jawaban;
        $jawaban->id_user = request()->user()->uuid;
        $jawaban->id_pertanyaan = $question->uuid;
        $jawaban->content = request('content');
        $jawaban->save();

        return redirect('question/'.$question->uuid)->with('success', 'Jawaban Anda Berhasil Disimpan');
    }

    public function edit(Jawaban $answer)
    {
        $data['pertanyaan'] = $answer->pertanyaan;
        $data['jawaban'] = $answer;
        return view('jawaban.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Jawaban  $jawaban
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Jawaban $answer)
    {
        $answer->content = request('content');
        $answer->save();
        return redirect('question/'.$answer->pertanyaan->uuid)->with('success', 'Jawaban Anda Berhasil Disimpan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Jawaban  $jawaban
     * @return \Illuminate\Http\Response
     */
    public function destroy(Jawaban $answer)
    {
        $answer->delete();
        return back()->with('success', 'Jawaban Berhasil Dihapus');
    }

}
