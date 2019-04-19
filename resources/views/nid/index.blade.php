@extends('nid.base')

@section('content')


<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">নাম </th>
      <th scope="col">ছবি </th>
      <th scope="col">পরিচয় পত্রের নম্বর </th>
      <th scope="col">জন্ম তারিখ </th>
      <th scope="col">অ্যাকশন  </th>

    </tr>
  </thead>
  <tbody>
      @foreach($nids as $n)
    <tr>
      <th scope="row">{{$n->id}}</th>
      <td>{{$n->name}}</td>
      <td><img src="{{$n->img}}" alt=""></td>
      <td>{{$n->no}}</td>
      <td>{{$n->dob}}</td>
      <td><a href="">Edit</a></td>
    </tr>
    @endforeach    
  </tbody>
</table>


@endsection