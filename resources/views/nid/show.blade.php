@extends('nid.base')

@section('content')


<div class="card-header"><strong>National ID card of {{$nid->no}}</strong><small></small></div>
<div class="card-body card-block">
    <label for="নাম (বাংলায় )" class=" form-control-label">ছবি :</label>
    <img src="/{{$nid->img}}" alt="" height="100" width="100">
    <div class="form-group" style="margin-top:20px;"><label for="name" class=" form-control-label">Name:</label>
    <input disabled type="text" value="{{$nid->name_eng}}" id="name" placeholder="Enter your name " class="form-control" name="name">
    
    </div>
    <div class="form-group"><label for="নাম (বাংলায় )" class=" form-control-label">নাম (বাংলায় )</label><input disabled type="text" value="{{$nid->name}}" id="নাম (বাংলায় )" placeholder="নাম (বাংলায় )" class="form-control" name="name_bng"></div>
    <div class="form-group"><label for="পিতার নাম (বাংলায় )" class=" form-control-label">পিতার নাম (বাংলায় )</label><input disabled type="text" value="{{$nid->fathers_name}}" id="পিতার নাম (বাংলায় )" placeholder="পিতার নাম (বাংলায় )" class="form-control" name="fathers_name"></div>
    <div class="form-group"><label for="মাতার নাম (বাংলায় )" class=" form-control-label">মাতার নাম (বাংলায় )</label><input disabled type="text" value="{{$nid->mothers_name}}" id="মাতার নাম (বাংলায় )" placeholder="মাতার নাম (বাংলায় )" class="form-control" name="mothers_name"></div>
    
    <div class="form-group"><label for="country" class=" form-control-label">জন্ম তারিখ </label><input disabled type="text" value="{{$nid->dob}}" id="country" placeholder="YYYY-MM-DD" class="form-control" name="dob"></div>

    <div class="form-group"><label for="বিভাগ " class=" form-control-label">বিভাগ </label><input disabled type="text" value="{{$nid->division}}" id="বিভাগ " placeholder="বিভাগ " class="form-control" name="division"></div>
    <div class="form-group"><label for="জিলা " class=" form-control-label">জিলা </label><input disabled type="text" value="{{$nid->district}}" id="জিলা " placeholder="জিলা " class="form-control" name="district"></div>
    <div class="form-group"><label for="উপজিলা/ইউনিয়ন " class=" form-control-label">উপজিলা/ইউনিয়ন </label><input disabled type="text" value="{{$nid->upozilla}}" id="উপজিলা/ইউনিয়ন " placeholder="উপজিলা/ইউনিয়ন " class="form-control" name="upozilla"></div>
    <div class="form-group">
        <label for="বিভাগ " class=" form-control-label">লিঙ্গ  </label>
        @if($nid->sex==0)
        <input disabled type="text" value="পুরুষ "  class="form-control">
        @elseif($nid->sex==1)
        <input disabled type="text" value="মহিলা "  class="form-control">
        @else
        <input disabled type="text" value="অন্যান্য "  class="form-control">
        @endif
    </div>
    

    <td><a href="/superadmin/nids/{{$nid->id}}/edit"><button class="btn btn-primary">Edit</button> </a>

      <form action="/superadmin/nids/{{$nid->id}}" method="post" style="display:inline">
      @method('DELETE')
      @csrf
      <button type="submit" class="btn btn-danger">Delete</button>
    </form>
    </td>

</div>


@endsection