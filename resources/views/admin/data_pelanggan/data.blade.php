<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Data Pelanggan</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-orange-50 min-h-screen">
  <div class="flex min-h-screen">
    <!-- Sidebar di-include dari file terpisah -->
    @include('layouts.admin')

    <div class="flex-1 p-8">
      <!-- Header -->
      <div class="bg-orange-100 rounded-t-lg px-6 py-4 mb-0">
        <h1 class="text-xl font-bold text-brown-900">Data Pelanggan</h1>
      </div>
      
      <div class="bg-white rounded-b-lg shadow p-6 -mt-1">
        @php
          if(!isset($users)) {
            $users = \App\Models\User::orderBy('id', 'desc')->get();
          }
        @endphp

        <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-4 gap-4">
          <div class="flex items-center gap-2">
            <label class="text-sm">Show</label>
            <select class="border rounded px-2 py-1 text-sm">
              <option>10</option>
              <option>25</option>
              <option>50</option>
            </select>
            <span class="text-sm">Data</span>
          </div>
        </div>

        <div class="overflow-x-auto">
          <table class="min-w-full text-sm">
            <thead>
              <tr class="bg-orange-50">
                <th class="py-2 px-4 border-b">No</th>
                <th class="py-2 px-4 border-b">Email</th>
                <th class="py-2 px-4 border-b">Tanggal Daftar</th>
              </tr>
            </thead>
            <tbody>
              @forelse($users as $user)
              <tr class="border-b">
                <td class="py-2 px-4 text-center">{{ $user->id }}</td>
                <td class="py-2 px-4 text-center">{{ $user->email }}</td>
                <td class="py-2 px-4 text-center">
                  {{ $user->created_at ? $user->created_at->format('d M Y') : '-' }}
                </td>
              </tr>
              @empty
              <tr>
                <td colspan="3" class="py-4 px-4 text-center text-gray-600">Belum ada data pelanggan.</td>
              </tr>
              @endforelse
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</body>
</html>
