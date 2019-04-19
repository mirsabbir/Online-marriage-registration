@extends('nid.base')

@section('content')

<div class="col-lg-12">
<div class="card">
    @if($errors->any())
        <p class="alert alert-danger">{{$errors->first()}}</p>
    @endif
    <form action="/superadmin/nids" method="post" enctype="multipart/form-data">
    @csrf
    <div class="card-header"><strong>Create National ID</strong><small> Form</small></div>
    <div class="card-body card-block">
        <div class="form-group"><label for="name" class=" form-control-label">Name</label><input type="text" id="name" placeholder="Enter your name " class="form-control" name="name"></div>
        <div class="form-group"><label for="নাম (বাংলায় )" class=" form-control-label">নাম (বাংলায় )</label><input type="text" id="নাম (বাংলায় )" placeholder="নাম (বাংলায় )" class="form-control" name="name_bng"></div>
        <div class="form-group"><label for="পিতার নাম (বাংলায় )" class=" form-control-label">পিতার নাম (বাংলায় )</label><input type="text" id="পিতার নাম (বাংলায় )" placeholder="পিতার নাম (বাংলায় )" class="form-control" name="fathers_name"></div>
        <div class="form-group"><label for="মাতার নাম (বাংলায় )" class=" form-control-label">মাতার নাম (বাংলায় )</label><input type="text" id="মাতার নাম (বাংলায় )" placeholder="মাতার নাম (বাংলায় )" class="form-control" name="mothers_name"></div>
        <div class="form-group"><label for="মাতার নাম (বাংলায় )" class=" form-control-label">ছবি </label><input type="file" id="মাতার নাম (বাংলায় )" placeholder="photo" class="form-control" name="img"></div>
        <div class="form-group"><label for="country" class=" form-control-label">জন্ম তারিখ </label><input type="text" id="country" placeholder="YYYY-MM-DD" class="form-control" name="dob"></div>

        <div class="form-group"><label for="বিভাগ " class=" form-control-label">বিভাগ </label>
            <select name="division" id="" @change="loadDist" class="form-control">
                @foreach(App\Division::all() as $div)
                <option value="{{$div->bn_name}}">{{$div->bn_name}}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group"><label for="জিলা " class=" form-control-label">জিলা </label>
            <select name="district" id="" @change="loadUpz" class="form-control">
                
                <option v-for="dist in dists" :value="dist.bn_name">@{{dist.bn_name}}</option>
                
            </select>
        </div>

        <div class="form-group"><label for="উপজিলা " class=" form-control-label">উপজিলা </label>
            <select name="upozilla" id=""  class="form-control">
                
                <option v-for="upz in upzs" :value="upz.bn_name">@{{upz.bn_name}}</option>
                
            </select>
        </div>
        
        
        <div class="form-group">
            <label for="বিভাগ " class=" form-control-label">লিঙ্গ  </label>
            <select name="sex" id="" class="form-control">
                <option value="0" selected>পুরুষ </option>
                <option value="1">মহিলা </option>
                <option value="2">অন্যান্য </option>
            </select>
        </div>
        <button class="btn btn-block btn-primary form-control">জমা দিন </button>
    </div>
    </form>
</div>
</div>

@endsection

@push('scripts')
    <script src="{{asset('js/app.js')}}"></script>
    <script>
        let vm = new Vue({
            el: '.card',
            data: {
                dists: [],
                upzs: [],
            },
            methods:{
                loadDist:function(){
                    var val = $("select[name='division']").children("option:selected").val();
                    axios.get('http://127.0.0.1:8000/api/getdist?div='+val)
                    .then(function (response) {
                        // handle success
                        vm.dists = response.data;
                        console.log(response.data);
                    })
                    .catch(function (error) {
                        // handle error
                        console.log(error);
                    })
                },
                loadUpz:function(){
                    var val2 = $("select[name='district']").children("option:selected").val();
                    console.log(val2);
                    axios.get('http://127.0.0.1:8000/api/getupz?dist='+val2)
                    .then(function (response) {
                        // handle success
                        vm.upzs = response.data;
                        console.log(response.data);
                    })
                    .catch(function (error) {
                        // handle error
                        console.log(error);
                    })
                },

            },
            mounted(){
                
            }
        })
    </script>
@endpush