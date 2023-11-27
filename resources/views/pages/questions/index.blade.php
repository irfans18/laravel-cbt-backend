@extends('layouts.app')

@section('title', 'Questions Bank')

@push('style')
   <!-- CSS Libraries -->
   <link rel="stylesheet" href="{{ asset('library/selectric/public/selectric.css') }}">
@endpush

@section('main')
   <div class="main-content">
      <section class="section">
         <div class="section-header">
            <h1>Questions Bank - Irfams</h1>
            <div class="section-header-button">
               <a href="{{ route('question.create') }}" class="btn btn-primary">Add New</a>
            </div>
            <div class="section-header-breadcrumb">
               <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
               <div class="breadcrumb-item"><a href="#">Questions</a></div>
               <div class="breadcrumb-item">All Questions</div>
            </div>
         </div>
         <div class="section-body">
            <h2 class="section-title">Questions</h2>
            <p class="section-lead">
               You can manage all Questions, such as editing, deleting and more.
            </p>


            <div class="row mt-4">
               <div class="col-12">
                  <div class="card">
                     <div class="card-header">
                        <h4>All Questions</h4>
                     </div>
                     <div class="card-body">
                        <div class="float-left">
                           <select class="form-control selectric">
                              <option>Action For Selected</option>
                              <option>Move to Draft</option>
                              <option>Move to Pending</option>
                              <option>Delete Pemanently</option>
                           </select>
                        </div>
                        <div class="float-right">
                           <form method="GET" action="{{ route('question.index') }}">
                              <div class="input-group">
                                 <input type="text" class="form-control" placeholder="Search" name="question">
                                 <div class="input-group-append">
                                    <button class="btn btn-primary"><i class="fas fa-search"></i></button>
                                 </div>
                              </div>
                           </form>
                        </div>

                        <div class="clearfix mb-3"></div>

                        <div class="table-responsive">
                           <table class="table-striped table">
                              <tr>
                                 <th>ID</th>
                                 <th>Question</th>
                                 <th>Option A</th>
                                 <th>Option B</th>
                                 <th>Option C</th>
                                 <th>Option D</th>
                              </tr>
                              @foreach ($questions as $question)
                                 <tr>

                                    <td>{{ $question->id }}</td>
                                    <td>{{ $question->question }}</td>
                                    <td>{{ $question->option_a }}</td>
                                    <td>{{ $question->option_b }}</td>
                                    <td>{{ $question->option_c }}</td>
                                    <td>{{ $question->option_d }}</td>
                                 </tr>
                              @endforeach
                           </table>
                        </div>
                        <div class="float-right">
                           {{ $questions->withQueryString()->links() }}
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>
   </div>
@endsection

@push('scripts')
   <!-- JS Libraies -->
   <script src="{{ asset('library/selectric/public/jquery.selectric.min.js') }}"></script>

   <!-- Page Specific JS File -->
   <script src="{{ asset('js/page/features-posts.js') }}"></script>
@endpush
