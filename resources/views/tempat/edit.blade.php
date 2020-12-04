@extends('layouts.app')

@section("head_title", "Penjagaan")
@section("title")
<div class="container-fluid">
    <!-- Page-Title -->
    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box" id="breadcrumb">
                <h4 class="page-title">Penjagaan</h4>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active">
                        Menampilkan seluruh data Penjagaan
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

                    <h4 class="mt-0 mb-4 header-title">Ubah Data Jaga</h4>
                    <form action="{{ route('tempat.update', $tempat->id) }}" method="post">
                        
                        @csrf
                        @method('PUT')
                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Tempat Jaga</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" placeholder="" name='name' value="{{ $tempat->name }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Tanggal</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="date" placeholder="" name='date' value="{{ $tempat->date }}">
                            </div>
                        </div>
                        
                        <button type="Kembali" class='btn btn-primary float-left' href="{{ route('tempat.index')}}">Kembali</button>
                        <button type="submit" class='btn btn-primary float-right'>Submit</button>
                    </form>
                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->


</div> <!-- end container-fluid -->
@endsection