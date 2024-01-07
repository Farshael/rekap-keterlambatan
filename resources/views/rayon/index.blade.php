@extends('layouts.template')

@section('content')

@if(Session::get('success'))
<div class="alert alert-success">{{ Session::get('success') }}</div>
@endif
@if(Session::get('deleted'))
<div class="alert alert-warning">{{ Session::get('deleted') }}</div>
@endif

<div class="d-flex flex-row-reverse">
    <div class="p-2" style="margin-right: 925px">
        <a href="{{ route('rayon.create')}}" class="btn btn-secondary">Tambah</a>
</div>
</div>
<table class="table caption-top">
    <thead>
        <tr>
            <th>No</th>
            <th>Rayon</th>
            <th>Pembimbing Rayon</th>
            <th class="text-center">Aksi</th>
        </tr>
    </thead>
    <tbody>
        @php $no = 1; @endphp
        @foreach ($rayons as $item)
        <tr>
            <td>{{ $no++ }}</td>
            <td>{{ $item['rayon'] }}</td>
            <td>{{ $item['user_id'] }}</td>
            <td class="d-flex justify-content-center">
                <a href="{{ route('rayon.edit', $item['id'] )}}" class="btn btn-primary me-3">Edit</a>
                <form action="{{ route('rayon.delete', $item['id']) }}" method="POST">
                @csrf
                @method('DELETE')
                
                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this item?');">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection