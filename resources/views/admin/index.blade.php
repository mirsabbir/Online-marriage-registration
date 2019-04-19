@extends('admin.base')

@section('content')

<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">বিয়ের রেজিস্ট্রেশন নম্বর </th>
      <th scope="col">স্বামীর জাতীয় পরিচয় পত্রের নম্বর </th>
      <th scope="col">স্ত্রীর জাতীয় পরিচয় পত্রের নম্বর </th>
      <th scope="col">বিবাহের তারিখ </th>
      <th scope="col">বর্তমান অবস্থা </th>
      <th scope="col">ডাউনলোড </th>
    </tr>
  </thead>
  <tbody>
    @foreach($marriages as $m)
    <tr>
      <th scope="row">{{$m->id}}</th>
      <th >10002{{$m->id}}</th>
      <td>{{$m->groom->no}}</td>
      <td>{{$m->bride->no}}</td>
      <td>{{$m->created_at}}</td>
      <td>{{$m->status}}</td>
      <td><a href="">{{'link'}}</a><a href="">{{'link'}}</a></td>
    </tr>
    @endforeach
   
  </tbody>
</table>

@endsection
@push('scripts')
    <script src="{{asset('js/app.js')}}"></script>

@endpush