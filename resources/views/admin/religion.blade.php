@extends('admin.base') @section('content')




<div class="breadcrumbs">
    <div class="breadcrumbs-inner">
        <div class="row m-0">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>বিবাহ নিবন্ধন </h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="#">Dashboard</a></li>
                            <li><a href="#">Marriage</a></li>
                            <li class="active">Register</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="content">
    <p class="alert alert-success">বর : {{session('groom_name')}}| কনে : {{session('bride_name')}}</p>
    <div class="animated fadeIn">
        <form action="" method="post">
            <input type="hidden" name="__page" value="religion">
        <div class="row">
            
            <div class="col-lg-12">
                @if($errors->any())
                <p class="alert alert-danger">অনুগ্রহ করে সঠিক তথ্য প্রদান করুন  {{$errors->first()}}</p>
                @endif
                <div class="card">
                    <!-- <div class="card-header"><strong>বর </strong><small> এর সম্পর্কে তথ্য </small></div> -->
                    <div class="card-body card-block">
                        
                        <div class="form-group">
                            <label for="city" class=" form-control-label">কোন রীতি তে বিবাহ সম্পন্ন  হচ্ছে ?</label>
                            <select name="religion" id="" @change="hide">
                                <option value="1" selected >ইসলাম ধর্ম </option>
                                <option value="2">সনাতন ধর্ম </option>
                                <option value="3" >খ্রিষ্ট ধর্ম </option>
                                <option value="4" >বৌদ্ধ ধর্ম  </option>
                                <option value="5" >অন্যান্য </option>
                            </select>
                        </div>
                        
                    <div id="block">

                        <div class="form-group">
                            <label for="city" class=" form-control-label">স্বামী স্ত্রী কে তালাক প্রদানের ক্ষমতা অর্পণ করেছে কি না ?</label>
                            <select name="ability_of_divorce" id="">
                                <option value="0">না </option>
                                <option value="1">হ্যা </option>
                            </select>
                        </div>
                        
                        <div class="form-group">
                            <label for="country" class=" form-control-label">তালাক প্রদানের শর্ত কি ?</label>
                            <input type="text" id="country" placeholder="" class="form-control" name="divorce_condition">
                        </div>

                        <div class="form-group">
                            <label for="country" class=" form-control-label">দেনমোহর এর পরিমান </label>
                            <input type="text" id="country" placeholder="" class="form-control" name="dowry">
                        </div>


                        <div class="form-group">
                            <label for="country" class=" form-control-label">স্বামীর তালাক প্রদানের অধিকার কোনো প্রকার খর্ব হয়েছে কি না ?</label>
                            <input type="text" id="country" placeholder="" class="form-control" name="divorce_">
                        </div>

                    </div>
                        

                    </div>
                </div>
            </div>

        </div>
        @csrf
        <button type="submit" class="form-control btn btn-block btn-primary">পরবর্তী ধাপ </button>
        </form>

    </div>
    <!-- .animated -->
</div>

@endsection

@push('scripts')
<script src="{{asset('js/app.js')}}"></script>
<script>
    let vm = new Vue({
        el: '.content',
        methods:{
            hide: function(){
                console.log($("select[name='religion']").children("option:selected").val());
                if($("select[name='religion']").children("option:selected").val()!=1)
                $('#block').hide();
                if($("select[name='religion']").children("option:selected").val()==1)
                $('#block').show();
            }
        },
        
    });
</script>
@endpush