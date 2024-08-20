<!DOCTYPE html>
<html lang="en">
<head>
  @include('admin.css')
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Change Email</title>
  @vite('resources/css/app.css')
</head>

<body class="bg-gray-100">
  @include('admin.header')

  <div class="d-flex align-items-stretch">
    @include('admin.sidebar')

    <main class="page-content container mt-11">
      <h1 class="text-center text-2xl font-bold mb-8">Change Email</h1>
      <div class="max-w-3xl mx-auto bg-white p-12 rounded-lg shadow-lg">
        <form method="POST" action="{{ route('changeEmail.submit', $user->id) }}">
          @csrf
          <div class="mb-7">
            <label for="email" class="block text-gray-100 text-sm font-bold mb-2">New Email</label>
            <input type="email" id="email" name="email" value="{{ old('email', $user->email) }}" class="form-input mt-1 block w-full p-3 border border-gray-300 rounded-lg" required>
            @error('email')
              <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
          </div>
          <button type="submit" class="bg-blue-500 text-white px-6 py-3 rounded-lg shadow hover:bg-blue-600">Update Email</button>
        </form>
      </div>
    </main>
  </div>

  @include('admin.footer')
</body>
</html>
