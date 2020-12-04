@extends('layouts.app')

@section("head_title", "Dashboard")
@section("title")
<div class="container-fluid">
    <!-- Page-Title -->
    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box" id="breadcrumb">
                <h4 class="page-title">Beranda</h4>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active">
                        Dashboard
                    </li>
                </ol>

            </div>
        </div>
    </div>
</div>
@endsection
@section('content')
<div class="container-fluid" id="result">
    <div class="row">
        <div class="col-12">
            <div class="card m-b-20">
                <div class="card-body">

                    <h4 class="mt-0 header-title">Dashboard Penjaga </h4>
                    <p class="text-muted m-b-30 font-14">Nama Penjaga : {{ $user->name }}</p>
                    @if(session('success'))
                    <div class="alert alert-success">
                        {{session('success')}}
                    </div>
                    @endif

                    
                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->



</div> <!-- end container-fluid -->
@endsection
@push('styles')
<style>
    ul {
        padding-left: 15px !important;
        margin-bottom: 0;
    }
</style>
@endpush
@push('scripts')
<script>
    function getData() {

    }
</script>
@endpush