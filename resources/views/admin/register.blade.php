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
                            <label for="vat" class=" form-control-label">জাতীয় পরিচয় পত্রের নম্বর </label>
                            <input  type="text"  placeholder="1234567890" class="form-control" name="groom_nid" v-model="groom_nid">
                        </div>
                        <div class="groom-block">
                        <div class="form-group">
                            <label for="company" class=" form-control-label">বরের নাম ( বাংলায় )</label>
                            <input readonly type="text"  placeholder="" class="form-control"  v-model="groom_name" name="groom_name" >
                        </div>
                        <div class="form-group">
                            <label for="street" class=" form-control-label">জন্ম তারিখ </label>
                            <input readonly type="text"  placeholder="YYYY-MM-DD" class="form-control"  v-model="groom_dob" name="groom_dob">
                        </div>
                        
                        <div class="form-group">
                            <label for="city" class=" form-control-label">পিতার নাম ( বাংলায় )</label>
                            <input readonly type="text"  placeholder="" class="form-control"  v-model="groom_fathers_name" name="groom_father">
                        </div>
                        
                        <div class="form-group">
                            <label for="country" class=" form-control-label">মাতার নাম ( বাংলায় )</label>
                            <input readonly type="text" id="country" placeholder="" class="form-control"  v-model="groom_mothers_name" name="groom_mother">
                        </div>
                        </div>
                        <button type="button" @click="groom" class="form-control btn btn-primary btn-block">তথ্য যাচাই করুন </button>

                       

                    </div>
                </div>
            </div>

            <div class="col-lg-6">
            <div class="card">
                    <div class="card-header"><strong>কনে </strong><small> এর সম্পর্কে তথ্য </small></div>
                    <div class="card-body card-block">
                        <div class="form-group">
                            <label for="vat" class=" form-control-label">জাতীয় পরিচয় পত্রের নম্বর </label>
                            <input  type="text" id="vat" placeholder="1234567890" class="form-control" name="bride_nid" v-model="bride_nid">
                        </div>
                        <div class="bride-block">
                        <div class="form-group">
                            <label for="company" class=" form-control-label">কনের নাম ( বাংলায় )</label>
                            <input readonly type="text" id="company" placeholder="" class="form-control" v-model="bride_name" name="bride_name">
                        </div>
                        <div class="form-group">
                            <label for="street" class=" form-control-label">জন্ম তারিখ </label>
                            <input readonly type="text" id="street" placeholder="YYYY-MM-DD" class="form-control" v-model="bride_dob" name="bride_dob">
                        </div>
                        
                        <div class="form-group">
                            <label for="city" class=" form-control-label">পিতার নাম ( বাংলায় )</label>
                            <input readonly type="text" id="city" placeholder="" class="form-control" v-model="bride_fathers_name" name="bride_father">
                        </div>
                        
                        <div class="form-group">
                            <label for="country" class=" form-control-label">মাতার নাম ( বাংলায় )</label>
                            <input readonly type="text" id="country" placeholder="" class="form-control" v-model="bride_mothers_name" name="bride_mother">
                        </div>
                        </div>
                        <button type="button" @click="bride" class="form-control btn btn-primary btn-block">তথ্য যাচাই করুন </button>
                        
                   

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
            groom_name: '',
            groom_fathers_name: '',
            groom_mothers_name: '',
            groom_dob: '',
            bride_name: '',
            bride_fathers_name: '',
            bride_mothers_name: '',
            bride_dob: '',
            groom_nid: '',
            bride_nid: ''

        },
        methods:{
            groom:function(){
                axios.get('http://127.0.0.1:8000/api/nid?no='+vm.groom_nid)
                .then(function (response) {
                    var d = response.data;
                    // handle success
                    vm.groom_name = d.name;
                    vm.groom_fathers_name = d.fathers_name;
                    vm.groom_mothers_name= d.mothers_name;
                    vm.groom_dob = d.dob;
                    console.log(response);
                })
                .catch(function (error) {
                    
                    console.log(error);
                    $('.groom-block').hide();
                });
                $('.groom-block').show();
            },
            bride:function(){
                axios.get('http://127.0.0.1:8000/api/nid?no='+vm.bride_nid)
                .then(function (response) {
                    var d = response.data;
                    // handle success
                    vm.bride_name = d.name;
                    vm.bride_fathers_name = d.fathers_name;
                    vm.bride_mothers_name= d.mothers_name;
                    vm.bride_dob = d.dob;
                    console.log(response);
                })
                .catch(function (error) {
                    // handle error
                    console.log(error);
                    $('.bride-block').hide();
                });
                $('.bride-block').show();
            }
        },
        mounted(){
            $('.bride-block').hide();
            $('.groom-block').hide();
        }

    });

</script> 
@endpush