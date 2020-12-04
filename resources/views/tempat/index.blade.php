@extends('layouts.app')

@section("head_title", "Daftar Tempat Jaga")
@section("title")
<div class="container-fluid">
    <!-- Page-Title -->
    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box" id="breadcrumb">
                <h4 class="page-title">Penjaga</h4>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active">
                        Menampilkan seluruh data Tempat Jaga
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

                    <h4 class="mt-0 header-title">Tempat Jaga</h4>
                    <p class="text-muted m-b-30 font-14">Nama Penjaga : {{($user->name)}}</p><br>
                    <p class="text-muted m-b-30 font-14">Berikut adalah data seluruh Tempat Jaga</p>
                    
                    @if(session('success'))
                    <div class="alert alert-success">
                        {{session('success')}}
                    </div>
                    @endif
                    @if( Auth::user()->userable_type == 'App\Models\Penjaga' )
                    <div class="card-actions ">
                        <a class='btn btn-primary float-left' href="{{ route('tempat.create') }}"><i class='ti ti-plus'></i> Tambah Penjagaan</a>
                        <form action="" method="get" class='form-inline float-right mb-3'>
                            <input type="text" class="form-control" placeholder='Cari nama..' name='search'>
                            <button type="submit" class='btn btn-primary ml-2'>Cari</button>
                        </form>
                    </div>
                    @endif
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <tr>
                                <th>Nomor</th>
                                <th>Nama Penjaga</th>
                                <th>Tempat Jaga</th>
                                <th>Tanggal Jaga</th>
                                @if( Auth::user()->userable_type == 'App\Models\Penjaga' )
                                <th>Aksi</th>
                                @endif
                            </tr>
                            @foreach($tempat as $tempat)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $tempat->penjaga->name }} </td>
                                <td>{{ $tempat->name }}</td>
                                <td>{{ $tempat->date }}</td>
                                @if( Auth::user()->userable_type == 'App\Models\Penjaga' )
                                <td>
                                    <div class="d-inline-flex">
                                        <a href="{{ route('tempat.edit', ['tempat' => $tempat->id]) }}" class='btn btn-warning mr-2'>Edit</a>
                                        <form action="{{ route('tempat.destroy', ['tempat' => $tempat->id]) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class='btn btn-danger'>Delete</button>
                                        </form>
                                    </div>
                                </td>
                                @endif
                            </tr>
                            @endforeach
                            @forelse($tempat as $tempat)
                            @empty
                            <tr>
                                <td colspan="6">Tidak ada data</td>
                            </tr>
                            @endforelse
                        </table>
                    </div>

                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->


</div> <!-- end container-fluid -->
@endsection