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
                <p class="alert alert-danger">অনুগ্রহ করে সঠিক তথ্য প্রদান করুন  {{$errors->first()}}</p>
            @endif
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-header"><strong>প্রথম সাক্ষী </strong><small> এর সম্পর্কে তথ্য </small></div>
                    <div class="card-body card-block">
                        <div class="form-group">
                            <label for="company" class=" form-control-label">সাক্ষীর  নাম ( বাংলায় )</label>
                            <input type="text" id="company" placeholder="" class="form-control" name="witness1_name">
                        </div>
                        <div class="form-group">
                            <label for="vat" class=" form-control-label">জাতীয় পরিচয় পত্রের নম্বর </label>
                            <input type="text" id="vat" placeholder="1234567890" class="form-control" name="witness1_nid">
                        </div>
                        <div class="form-group">
                            <label for="city" class=" form-control-label">পিতার নাম ( বাংলায় )</label>
                            <input type="text" id="city" placeholder="" class="form-control" name="witness1_father">
                        </div>
                        
                        <div class="form-group">
                            <label for="country" class=" form-control-label">মাতার নাম ( বাংলায় )</label>
                            <input type="text" id="country" placeholder="" class="form-control" name="witness1_mother">
                        </div>

                        <div class="form-group">
                            <label for="street" class=" form-control-label">জন্ম তারিখ </label>
                            <input type="text"  placeholder="YYYY-MM-DD" class="form-control" name="witness1_dob">
                        </div>
                    
                    </div>
                </div>
            </div>



            <div class="col-lg-6">
                <div class="card">
                    <div class="card-header"><strong>দ্বিতীয় সাক্ষী </strong><small> এর সম্পর্কে তথ্য</small></div>
                    <div class="card-body card-block">
                        <div class="form-group">
                            <label for="company" class=" form-control-label">সাক্ষীর  নাম ( বাংলায় )</label>
                            <input type="text" id="company" placeholder="" class="form-control" name="witness2_name">
                        </div>
                        <div class="form-group">
                            <label for="vat" class=" form-control-label">জাতীয় পরিচয় পত্রের নম্বর </label>
                            <input type="text" id="vat" placeholder="1234567890" class="form-control" name="witness2_nid">
                        </div>
                        <div class="form-group">
                            <label for="city" class=" form-control-label">পিতার নাম ( বাংলায় )</label>
                            <input type="text" id="city" placeholder="" class="form-control" name="witness2_father">
                        </div>
                        
                        <div class="form-group">
                            <label for="country" class=" form-control-label">মাতার নাম ( বাংলায় )</label>
                            <input type="text" id="country" placeholder="" class="form-control" name="witness2_mother">
                        </div>
                        <div class="form-group">
                            <label for="street" class=" form-control-label">জন্ম তারিখ </label>
                            <input type="text"  placeholder="YYYY-MM-DD" class="form-control" name="witness2_dob">
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

@endpush