@extends('layouts.app')

@section('content')
<h4>Data Pelanggan</h4>
<a href="/pelanggan/create" class="btn btn-primary mb-3">Tambah</a>

<table class="table table-bordered">
<tr>
    <th>Nama</th>
    <th>No HP</th>
    <th>Alamat</th>
</tr>
@foreach($pelanggan as $p)
<tr>
    <td>{{ $p->nama }}</td>
    <td>{{ $p->no_hp }}</td>
    <td>{{ $p->alamat }}</td>
</tr>
@endforeach
</table>
@endsection@extends('layouts.app')

@section('content')
<div class="max-w-6xl mx-auto px-4">

    <!-- Header -->
    <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-6">
        <div>
            <h4 class="text-2xl font-bold text-gray-800">Data Pelanggan</h4>
            <p class="text-sm text-gray-500">Daftar pelanggan Haji Encep Laundry</p>
        </div>

        <a href="/pelanggan/create"
           class="mt-3 md:mt-0 inline-flex items-center gap-2 px-4 py-2 bg-indigo-600 text-white text-sm font-semibold rounded-lg shadow hover:bg-indigo-700 transition">
            ➕ Tambah Pelanggan
        </a>
    </div>

    <!-- Card Table -->
    <div class="bg-white rounded-2xl shadow-lg overflow-hidden">

        <div class="overflow-x-auto">
            <table class="min-w-full border-collapse">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="px-6 py-3 text-left text-sm font-semibold text-gray-600">
                            Nama
                        </th>
                        <th class="px-6 py-3 text-left text-sm font-semibold text-gray-600">
                            No HP
                        </th>
                        <th class="px-6 py-3 text-left text-sm font-semibold text-gray-600">
                            Alamat
                        </th>
                    </tr>
                </thead>

                <tbody class="divide-y">
                    @forelse($pelanggan as $p)
                        <tr class="hover:bg-gray-50 transition">
                            <td class="px-6 py-3 font-medium text-gray-800">
                                {{ $p->nama }}
                            </td>
                            <td class="px-6 py-3 text-gray-700">
                                {{ $p->no_hp }}
                            </td>
                            <td class="px-6 py-3 text-gray-600">
                                {{ $p->alamat ?: '-' }}
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="px-6 py-6 text-center text-gray-500">
                                Belum ada data pelanggan
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

    </div>
</div>
@endsection

