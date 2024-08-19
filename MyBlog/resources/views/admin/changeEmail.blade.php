<!DOCTYPE html>
<html>
<head>
  @include('admin.css')
  @vite('resources/css/app.css')
</head>
<body>
  @include('admin.header')
  <div class="d-flex align-items-stretch">
    @include('admin.sidebar')
    <div class="page-content container mt-12">
      <h1 class="text-center text-2xl font-bold mb-8">Change Email</h1>
      <div class="max-w-lg mx-auto">
        <form method="POST" action="{{ route('changeEmail.submit', $user->id) }}">
          @csrf
          <div class="mb-4">
            <label for="email" class="block text-gray-700 text-sm font-bold mb-2">New Email</label>
            <input type="email" id="email" name="email" value="{{ old('email', $user->email) }}" class="form-input mt-1 block w-full" required>
            @error('email')
              <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
          </div>
          <button type="submit" class="btn btn-primary">Update Email</button>
        </form>
      </div>
    </div>
    @include('admin.footer')
  </div>
</body>
</html>
