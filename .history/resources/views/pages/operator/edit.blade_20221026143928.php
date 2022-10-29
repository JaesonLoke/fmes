@include('layouts.headers.operatorheader')

@include('users.partials.header', [
      'title' => __('Hello') . ' '. auth()->user()->name,
      'description' => __('This is your edit detail page. A good contact and position details will help your colleagues knows you better.'),
      'class' => 'col-lg-7'
  ]) 
  
    