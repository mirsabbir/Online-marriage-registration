@extends('admin.base')

@section('content')

<div style="display:flex">
    <img src="/images/success.png" alt="" height="190" width="190" class="ml-auto mr-auto">
    
    
</div>
<p class="text-center">বিবাহ টি রেজিস্টার্ড হয়েছে </p>
<p class="text-center"><a href="/admin/marriage/index">বিবাহ সমূহ দেখুন </a></p>

@endsection
@push('scripts')
    <script src="{{asset('js/app.js')}}"></script>

@endpush