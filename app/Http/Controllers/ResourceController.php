<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Category;
use App\Models\Resource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class ResourceController extends Controller
{
    //
    public function index(Request $request){
        return Inertia::render('Resources', [
            'canLogin' => Route::has('login'),
            'canRegister' => Route::has('register'),
            'resources' => Resource::with('category')->latest()->get(),
        ]);
    }

    public function store (Request $request) {

        // $request->validate([
        //     'title' => ['required','max:255'],
        //     'category_id' => ['required','exists:categories,id'],
        //     'description' => ['required'],                
        //     'url' => ['required','url'],                
        // ]);

        Resource::create([
            'title' => $request->title,
            'link' => $request->link,            
            'description' => $request->description,              
            // 'category_id' => Category::first()->id,  
            'category_id' => $request->category_id,
            'url' => $request->url,
        ]);

        // return Inertia::location('/resources');
        return Inertia::location('/');        
    }

    public function search(Request $request) {
        return Resource::where('title','like',"$request->search%")
        // ->orWhere('description','like',"$request->search%")
        ->with('category')
        ->get();
    }
}
