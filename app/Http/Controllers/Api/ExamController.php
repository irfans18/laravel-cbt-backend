<?php

namespace App\Http\Controllers\Api;

use App\Models\Exam;
use App\Models\Question;
use Illuminate\Http\Request;
use App\Models\ExamQuestList;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreExamRequest;
use App\Http\Requests\UpdateExamRequest;
use App\Http\Resources\QuestionResource;

class ExamController extends Controller
{

   public function createExam(Request $request){
      $question_numeric = Question::where('category', 'numeric')->inRandomOrder()->limit(20)->get();
      $question_verbal = Question::where('category', 'verbal')->inRandomOrder()->limit(20)->get();
      $question_logic = Question::where('category', 'logic')->inRandomOrder()->limit(20)->get();

      $exam = Exam::create(['user_id' => $request->user()->id]);

      foreach ($question_numeric as $quest){
         ExamQuestList::create([
            'exam_id' => $exam->id,
            'question_id' => $quest->id,
         ]);
      }

      foreach ($question_verbal as $quest){
         ExamQuestList::create([
            'exam_id' => $exam->id,
            'question_id' => $quest->id,
         ]);
      }

      foreach ($question_logic as $quest){
         ExamQuestList::create([
            'exam_id' => $exam->id,
            'question_id' => $quest->id,
         ]);
      }

      return response()->json([
         'message' => 'Exam successfully created',
         'data' => $exam,
      ]);
   }

   public function getExamQuestListByCategory(Request $request){
      $exam = Exam::where('user_id', $request->user()->id)->first();
      $examQuestList = ExamQuestList::where('exam_id', $exam->id)->get();
      $examQuestListId = $examQuestList->pluck('question_id');
      
      $question = Question::whereIn('id', $examQuestListId)->where('category', $request->category)->get();

      return response()->json([
         'message' => 'Got questions successfully',
         'data' => QuestionResource::collection($question),
      ]);
   }

   public function getAnswer(Request $request)
   {
      $validatedData = $request->validate([
         'soal_id' => 'required',
         'jawaban' => 'required'
      ]);

      $exam = Exam::where('user_id', $request->user()->id)->first();
      $examQuestion = ExamQuestList::where('exam_id', $exam->id)->where('question_id', $validatedData['question_id'])->first();
      $question = Question::where('id', $validatedData['soal_id'])->first();

      if($question->key == $validatedData['answer']){
         $examQuestion->update([
            'is_correct' => true
         ]);
      }else{
         $examQuestion->update([
            'is_correct' => false
         ]);
      }

      return response()->json([
         'message' => 'Succesfully save the answer',
         'answer' => $examQuestion->is_correct,
      ]);

   }

   /**
    * Display a listing of the resource.
    */
   public function index()
   {
      //
   }

   /**
    * Show the form for creating a new resource.
    */
   public function create()
   {
      //
   }

   /**
    * Store a newly created resource in storage.
    */
   public function store(StoreExamRequest $request)
   {
      //
   }

   /**
    * Display the specified resource.
    */
   public function show(Exam $exam)
   {
      //
   }

   /**
    * Show the form for editing the specified resource.
    */
   public function edit(Exam $exam)
   {
      //
   }

   /**
    * Update the specified resource in storage.
    */
   public function update(UpdateExamRequest $request, Exam $exam)
   {
      //
   }

   /**
    * Remove the specified resource from storage.
    */
   public function destroy(Exam $exam)
   {
      //
   }
}
