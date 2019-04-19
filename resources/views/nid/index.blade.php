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
      
      <th scope="row"><a href="/superadmin/nids/{{$n->id}}">{{$n->id}}</a></th> 
      <td><a href="/superadmin/nids/{{$n->id}}">{{$n->name}}</a></td>
      <td><a href="/superadmin/nids/{{$n->id}}"><img src="/{{$n->img}}" alt="" height="50" width="50" style="border-radious:50%;"></a></td>
      <td><a href="/superadmin/nids/{{$n->id}}"> {{$n->no}}</a></td>
      <td><a href="/superadmin/nids/{{$n->id}}">{{$n->dob}}</a></td>
     
      <td><a href="/superadmin/nids/{{$n->id}}/edit"><button class="btn btn-primary">Edit</button> </a>

      <form action="/superadmin/nids/{{$n->id}}" method="post" style="display:inline">
      @method('DELETE')
      @csrf
      <button type="submit" class="btn btn-danger">Delete</button>
    </form>
    </td>
    </tr>
    @endforeach    
  </tbody>
</table>


@endsection