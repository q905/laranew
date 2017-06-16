<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Album;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;

class AlbumController extends Controller
{
    public function index(){
        $albums=Album::paginate(10);
        return view('albums', ['albums'=>$albums]);
    }
    
    public function user($my){
        $albums=Album::where('user_id', '=', $my)->paginate(10);
        
        return view('albums', ['albums'=>$albums, 'uid'=>$my]);
    }
    
    public function create(){
		//$this->authorize('create');
		
        return view('create', ['cur_url'=>url()->previous()]);
    }
    
    public function edit($id){
        $album=Album::find($id);
        return view('edit', ['album'=>$album]);
    }
    
    public function delete($id){
		
        $article = Album::find($id);
        $article->delete();
        return redirect(url()->previous());
    }
    
    public function store(Request $request){

		$this->validate($request, [
			'title'=>'required',
			'artist'=>'required', 
			]);
			
		$album = new Album;
		$album->title = strip_tags($request->title, '<br>');
		$album->artist = strip_tags($request->artist, '<br>');
		
		if($request->descript){
			$album->descript = strip_tags($request->descript, '<br>');
		} else {
			$album->descript = "null";
	    }
	    
	    if(Auth::check()){
			$album->user_id = $request->user_id;
		} else {
			$album->user_id = "12";
		}
	    
		$album->save();
		return redirect($request->cur_url);
	}
	
	public function update(Request $request){

		$this->validate($request, [
			'title'=>'required',
			'artist'=>'required', 
			]);
			
		$album = Album::find($request->id);
		$album->title = strip_tags($request->title, '<br>');
		$album->artist = strip_tags($request->artist, '<br>');
		
		
			$album->descript = strip_tags($request->descript, '<br>');
		 
	    
	    
			$album->user_id = $request->user_id;
		
			
		
	    
		$album->save();
		return redirect('/');
		//return Album::find($request->id);
	}

}
