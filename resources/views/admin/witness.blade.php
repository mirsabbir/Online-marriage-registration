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
            <input type="hidden" name="__page" value="witness">
            <div class="row">
                @if($errors->any())
                <p class="alert alert-danger">অনুগ্রহ করে সঠিক তথ্য প্রদান করুন {{$errors->first()}}</p>
                @endif
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-header"><strong>প্রথম সাক্ষী</strong><small> এর সম্পর্কে তথ্য </small></div>
                        <div class="card-body card-block">
                            <div class="form-group">
                                <label for="vat" class=" form-control-label">জাতীয় পরিচয় পত্রের নম্বর </label>
                                <input type="text" placeholder="1234567890" class="form-control" name="witness1_nid" v-model="witness1_nid">
                            </div>
                            <div class="witness1-block">
                                <div class="form-group">
                                    <label for="company" class=" form-control-label">সাক্ষীর নাম ( বাংলায় )</label>
                                    <input readonly type="text" placeholder="" class="form-control" v-model="witness1_name" name="witness1_name">
                                </div>
                                <div class="form-group">
                                    <label for="street" class=" form-control-label">জন্ম তারিখ </label>
                                    <input readonly type="text" placeholder="YYYY-MM-DD" class="form-control" v-model="witness1_dob" name="witness1_dob">
                                </div>

                                <div class="form-group">
                                    <label for="city" class=" form-control-label">পিতার নাম ( বাংলায় )</label>
                                    <input readonly type="text" placeholder="" class="form-control" v-model="witness1_fathers_name" name="witness1_father">
                                </div>

                                <div class="form-group">
                                    <label for="country" class=" form-control-label">মাতার নাম ( বাংলায় )</label>
                                    <input readonly type="text" id="country" placeholder="" class="form-control" v-model="witness1_mothers_name" name="witness1_mother">
                                </div>
                            </div>
                            <button type="button" @click="witness1" class="form-control btn btn-primary btn-block">তথ্য যাচাই করুন </button>

                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-header"><strong>দ্বিতীয় সাক্ষী </strong><small> এর সম্পর্কে তথ্য </small></div>
                        <div class="card-body card-block">
                            <div class="form-group">
                                <label for="vat" class=" form-control-label">জাতীয় পরিচয় পত্রের নম্বর </label>
                                <input type="text" id="vat" placeholder="1234567890" class="form-control" name="witness2_nid" v-model="witness2_nid">
                            </div>
                            <div class="witness2-block">
                                <div class="form-group">
                                    <label for="company" class=" form-control-label">সাক্ষীর নাম ( বাংলায় )</label>
                                    <input readonly type="text" id="company" placeholder="" class="form-control" v-model="witness2_name" name="witness2_name">
                                </div>
                                <div class="form-group">
                                    <label for="street" class=" form-control-label">জন্ম তারিখ </label>
                                    <input readonly type="text" id="street" placeholder="YYYY-MM-DD" class="form-control" v-model="witness2_dob" name="witness2_dob">
                                </div>

                                <div class="form-group">
                                    <label for="city" class=" form-control-label">পিতার নাম ( বাংলায় )</label>
                                    <input readonly type="text" id="city" placeholder="" class="form-control" v-model="witness2_fathers_name" name="witness2_father">
                                </div>

                                <div class="form-group">
                                    <label for="country" class=" form-control-label">মাতার নাম ( বাংলায় )</label>
                                    <input readonly type="text" id="country" placeholder="" class="form-control" v-model="witness2_mothers_name" name="witness2_mother">
                                </div>
                            </div>
                            <button type="button" @click="witness2" class="form-control btn btn-primary btn-block">তথ্য যাচাই করুন </button>

                        </div>
                    </div>
                </div>

            </div>
        @csrf
        <button type="submit" class="form-control btn btn-block btn-primary">পরবর্তী ধাপ </button>
        </form>
    </div>
    
</div>
<!-- .animated -->
</div>

@endsection @push('scripts')
<script src="{{asset('js/app.js')}}"></script>
<script>
    let vm = new Vue({
        el: '.content',
        data: {
            witness1_name: '',
            witness1_fathers_name: '',
            witness1_mothers_name: '',
            witness1_dob: '',
            witness2_name: '',
            witness2_fathers_name: '',
            witness2_mothers_name: '',
            witness2_dob: '',
            witness1_nid: '',
            witness2_nid: ''

        },
        methods: {
            witness1: function() {
                axios.get('http://127.0.0.1:8000/api/nid?no=' + vm.witness1_nid)
                    .then(function(response) {
                        var d = response.data;
                        // handle success
                        vm.witness1_name = d.name;
                        vm.witness1_fathers_name = d.fathers_name;
                        vm.witness1_mothers_name = d.mothers_name;
                        vm.witness1_dob = d.dob;
                        console.log(response);
                    })
                    .catch(function(error) {

                        console.log(error);
                        $('.witness1-block').hide();
                    });
                $('.witness1-block').show();
            },
            witness2: function() {
                axios.get('http://127.0.0.1:8000/api/nid?no=' + vm.witness2_nid)
                    .then(function(response) {
                        var d = response.data;
                        // handle success
                        vm.witness2_name = d.name;
                        vm.witness2_fathers_name = d.fathers_name;
                        vm.witness2_mothers_name = d.mothers_name;
                        vm.witness2_dob = d.dob;
                        console.log(response);
                    })
                    .catch(function(error) {
                        // handle error
                        console.log(error);
                        $('.witness2-block').hide();
                    });
                $('.witness2-block').show();
            }
        },
        mounted() {
            $('.witness2-block').hide();
            $('.witness1-block').hide();
        }

    });
</script>

@endpush