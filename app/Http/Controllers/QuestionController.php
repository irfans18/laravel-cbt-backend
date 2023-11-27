<?php

namespace App\Http\Controllers;

use App\Models\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StorequestionRequest;
use App\Http\Requests\UpdatequestionRequest;

class QuestionController extends Controller
{
   /**
    * Display a listing of the resource.
    */
   public function index(Request $request)
   {
      // $questions = Question::paginate(10);
      $questions = DB::table('questions')
      ->when($request->input('question'), function ($query, $question) {
         return $query->where('question', 'like', '%' . $question . '%');
      })->orderBy('id', 'desc')
      ->paginate(10);
      return view('pages.questions.index', compact('questions'));
   }

   /**
    * Show the form for creating a new resource.
    */
   public function create()
   {
      return view('pages.questions.create');
   }

   /**
    * Store a newly created resource in storage.
    */
   public function store(StorequestionRequest $request)
   {
      $data = $request->all();
      Question::create($data);
      return redirect()->route('question.index')->with('success', 'Question succesfully created');
   }

   /**
    * Display the specified resource.
    */
   public function show(question $question)
   {
      //
   }

   /**
    * Show the form for editing the specified resource.
    */
   public function edit(question $question)
   {
      //
   }

   /**
    * Update the specified resource in storage.
    */
   public function update(UpdatequestionRequest $request, question $question)
   {
      //
   }

   /**
    * Remove the specified resource from storage.
    */
   public function destroy(question $question)
   {
      //
   }
}
