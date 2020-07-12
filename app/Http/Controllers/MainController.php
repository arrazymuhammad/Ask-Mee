<?php

namespace App\Http\Controllers;

use App\Model\Jawaban;
use App\Model\Komentar;
use App\Model\Pertanyaan;
use App\Model\Vote;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function landing()
    {
    	$data['list_pertanyaan'] = Pertanyaan::orderBy('created_at', 'DESC')->paginate(10);
    	return view('welcome', $data);
    }

    public function bestAnswer(Jawaban $answer)
    {
    	$pertanyaan = $answer->pertanyaan;
        $pertanyaan->id_jawaban_terbaik = $answer->uuid;
        $pertanyaan->save();

        $user = $answer->user;
        $user->point += 15;
        $user->save();

        return back()->with('success', 'Jawaban Terbaik Berhasil dipilih');
    }

    public function vote($parent_type, $id, $vote_type)
    {
    	$parent_type_arr = ['question' => 1, 'answer' => 2];
    	$vote_type_arr = ['up' => 1, 'down' => 2];
    	
    	$vote = new Vote;
    	$vote->parent_type = $parent_type_arr[$parent_type];
    	$vote->id_parent = $id;
    	$vote->type = $vote_type_arr[$vote_type];
    	$vote->save();

    	$user = $vote->parent->user;
    	$user->point += ($vote_type == 'up') ? 10 : -1;
    	$user->save();

        return back()->with('success', 'Vote Berhasil Disimpan');
    }
    public function comment()
    {
        $user = request()->user();
        $comment = new Komentar;
        $comment->id_user = $user->uuid;
        $comment->id_parent = request('id_parent');
        $comment->parent_type = request('parent_type');
        $comment->content = request('content');
        $comment->save();

        return back()->with('success', 'Komentar Berhasil Disimpan');
    }

    public function deleteComment(Komentar $comment)
    {
        $comment->delete();
        return back()->with('success', 'Komentar Berhasil Dihapus');
    }

    public function search()
    {
        $search = request('search');
        $data['search'] = $search;
        $data['list_pertanyaan'] = Pertanyaan::where('judul','like', "%$search%")->paginate(10);;
        return view('search', $data);

    }
    public function tagSearch($tag)
    {
        $data['tag'] = $tag;
        $data['list_pertanyaan'] = Pertanyaan::whereJsonContains('tags', $tag)->paginate(10);;
        return view('search-tag', $data);
    }
}
