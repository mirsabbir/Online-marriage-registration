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
    <div class="animated fadeIn">

        @if($errors->any())
        <p class="alert alert-danger">অনুগ্রহ করে সঠিক তথ্য প্রদান করুন {{$errors->first()}}</p>
        @endif
        <form action="" method="post">

        <div class="row">
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-header"><strong>বর </strong><small> এর সম্পর্কে তথ্য </small></div>
                    <div class="card-body card-block">
                        <div class="form-group">
                            <label for="company" class=" form-control-label">বরের নাম ( বাংলায় )</label>
                            <input type="text"  placeholder="" class="form-control" name="groom_name">
                        </div>
                        <div class="form-group">
                            <label for="vat" class=" form-control-label">জাতীয় পরিচয় পত্রের নম্বর </label>
                            <input type="text"  placeholder="1234567890" class="form-control" name="groom_nid">
                        </div>
                        <div class="form-group">
                            <label for="street" class=" form-control-label">জন্ম তারিখ </label>
                            <input type="text"  placeholder="YYYY-MM-DD" class="form-control" name="groom_dob">
                        </div>
                        
                        <div class="form-group">
                            <label for="city" class=" form-control-label">পিতার নাম ( বাংলায় )</label>
                            <input type="text"  placeholder="" class="form-control" name="groom_father">
                        </div>
                        
                        <div class="form-group">
                            <label for="country" class=" form-control-label">মাতার নাম ( বাংলায় )</label>
                            <input type="text" id="country" placeholder="" class="form-control" name="groom_mother">
                        </div>
                        <div class="form-group">
                            <label for="country" class=" form-control-label">পূর্ব বিবাহিত কি না ?</label> &nbsp; &nbsp; &nbsp; &nbsp; 
                            <label><input type="radio" name="__a" @click="show_prv_groom" value="1">হ্যা </label> 
                            <label><input type="radio" name="__a" @click="hide_prv_groom" value="0">না </label>
                        </div>

                        <div id="__groom">

                            <div class="form-group">
                                <label for="country" class=" form-control-label">পূর্ব বিবাহিত স্ত্রীর নাম ( বাংলায় )</label>
                                <input type="text" id="country" placeholder="" class="form-control" name="groom_prv_wife_name">
                            </div>
                            <div class="form-group">
                                <label for="country" class=" form-control-label">পূর্ব বিবাহিত স্ত্রীর জাতীয় পরিচয় পত্রের নম্বর </label>
                                <input type="text" id="country" placeholder="" class="form-control" name="groom_prv_wife_nid">
                            </div>
                            <div class="form-group">
                                <label for="country" class=" form-control-label">সম্মতি আছে কি না ?</label>  &nbsp; &nbsp; &nbsp; &nbsp; 
                                <label><input type="radio" name="groom_prv_approved">হ্যা </label> 
                                <label><input type="radio" name="groom_prv_approved">না </label>
                            </div>
                            
                        </div>

                    </div>
                </div>
            </div>

            <div class="col-lg-6">
            <div class="card">
                    <div class="card-header"><strong>কনে </strong><small> এর সম্পর্কে তথ্য </small></div>
                    <div class="card-body card-block">
                        <div class="form-group">
                            <label for="company" class=" form-control-label">কনের নাম ( বাংলায় )</label>
                            <input type="text" id="company" placeholder="" class="form-control" name="bride_name">
                        </div>
                        <div class="form-group">
                            <label for="vat" class=" form-control-label">জাতীয় পরিচয় পত্রের নম্বর </label>
                            <input type="text" id="vat" placeholder="1234567890" class="form-control" name="bride_nid">
                        </div>
                        <div class="form-group">
                            <label for="street" class=" form-control-label">জন্ম তারিখ </label>
                            <input type="text" id="street" placeholder="YYYY-MM-DD" class="form-control" name="bride_dob">
                        </div>
                        
                        <div class="form-group">
                            <label for="city" class=" form-control-label">পিতার নাম ( বাংলায় )</label>
                            <input type="text" id="city" placeholder="" class="form-control" name="bride_father">
                        </div>
                        
                        <div class="form-group">
                            <label for="country" class=" form-control-label">মাতার নাম ( বাংলায় )</label>
                            <input type="text" id="country" placeholder="" class="form-control" name="bride_mother">
                        </div>
                        <div class="form-group">
                            <label for="country" class=" form-control-label">পূর্ব বিবাহিত কি না ?</label> &nbsp; &nbsp; &nbsp; &nbsp; 
                            <label><input type="radio" name="__b" value="1" @click="show_prv_bride">হ্যা </label> 
                            <label><input type="radio" name="__b" value="0" @click="hide_prv_bride">না </label>
                        </div>

                    <div id="__bride">

                        <div class="form-group">
                            <label for="country" class=" form-control-label">পূর্ব বিবাহিত স্বামীর নাম ( বাংলায় )</label>
                            <input type="text" id="country" placeholder="" class="form-control" name="bride_prv_husband_name">
                        </div>
                        <div class="form-group">
                            <label for="country" class=" form-control-label">পূর্ব বিবাহিত স্বামীর জাতীয় পরিচয় পত্রের নম্বর </label>
                            <input type="text" id="country" placeholder="" class="form-control" name="bride_prv_husband_nid">
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
        data:{

        },
        methods:{
            show_prv_groom: function(){
                $('#__groom').show();
                
            },
            show_prv_bride: function(){
                $('#__bride').show();
            },
            hide_prv_groom: function(){
                
                $('#__groom').hide();
            },
            hide_prv_bride: function(){
                $('#__bride').hide();
            },
        },
        mounted(){
            $('#__groom').hide();
            $('#__bride').hide();
        }

    });

</script> 
@endpush