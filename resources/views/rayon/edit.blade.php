@extends('layouts.template')

@section('content')
    <form action="{{ route('rayon.update', $rayons['id']) }}" method="POST" class="card p-5">
        @csrf
        @method('PATCH')

        @if ($errors->any())
            <ul class="alert alert-danger p-3">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
            @endforeach
            </ul>
        @endif


        <div class="mb-3 row">
            <label for="rayon" class="col-sm-2 col-form-label">rayon :</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="rayon" name="rayon" value="{{ $rayons['rayon'] }}">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="user_id" class="col-sm-2 col-form-label">Pembimbing Siswa :</label>
            <div class="col-sm-10">
                <select class="form-select" name="user_id" id="user_id">
                    <option selected disabled hidden>Pilih</option>
                    {{-- RELASI --}}
                    @foreach($users as $item)
                    <option value="{{ $item->name }}">{{ $item->name }}</option>
                    @endforeach
                </select>
            </div>
    <button type="submit" class="btn btn-primary mt-3">Ubah Data</button>
</form>
@endsection