@extends('layouts.template')

@section('content')

@if(Session::get('success'))
<div class="alert alert-success">{{ Session::get('success') }}</div>
@endif
@if(Session::get('deleted'))
<div class="alert alert-warning">{{ Session::get('deleted') }}</div>
@endif

<div class="p-2">
    <a href="{{ route('keterlambatan.create')}}" class="btn btn-secondary">Tambah</a>
    <a href="#" class="btn btn-secondary">Export Data Keterlambatan</a>
</div>
<a href="{{ route('keterlambatan.rekap')}}" class="btn btn-primary">Rekapitulasi Keterlambatan</a>
<a href="{{ route('keterlambatan.index')}}" class="btn btn-primary">Keseluruhan Keterlambatan</a>
<div class="d-flex flex-row-reverse">
</div>
<table class="table caption-top">
    <thead>
        <tr>
            <th>No</th>
            <th>Nis</th>
            <th>Nama</th>
            <th class="text-center">Jumlah Kerlambatan</th>
            <th class="text-center">Bukti</th>
            <th class="text-center">Aksi</th>
        </tr>
    </thead>
    <tbody>
        @php
        $no = 1;
        $uniqueNames = [];
        $countNames = collect($lates)
            ->groupBy('student.name')
            ->map->count();
    @endphp
    @foreach ($lates as $item)
        @if (!in_array($item['student']['name'], $uniqueNames))
            @php $uniqueNames[] = $item['student']['name']; @endphp
            <tr>
                <td>{{ $no++ }}</td>
                <td>{{ $item['student']['nis'] }}</td>
                <td>{{ $item['student']['name'] }}</td>
                <td style="text-align: center">{{ $countNames[$item['student']['name']] }}</td>
                <td class="breadcrumb-item" style="text-align: center"><a href="{{ route('keterlambatan.bukti') }}">Detail</a></td>
                <td style="text-align: center"><a href="{{ route('keterlambatan.surat') }}" class="btn btn-primary me-3">Cek Surat Pernyataan</a></td>
            </tr>
        @endif
    @endforeach
    </tbody>
</table>
@endsection