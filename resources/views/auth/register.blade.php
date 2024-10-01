<x-layout title="{{ __('ui.register') }}">
  <div class="container-fluid">
    <div class="row justify-content-center align-items-center vh-100-with-navbar">
      <div class="col-10 col-sm-6 col-lg-4 d-flex flex-column justify-content-center align-items-center border border-secondary rounded shadow p-5">
        <h1 class="fs-3 mb-4">{{ __('ui.register') }}!</h1>
        <form action="{{ route('register') }}" method="POST" class="form-width">
          @csrf
          <div class="mb-3">
            <label for="name" class="form-label">{{ __('ui.name') }}</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}">
            @error('name')
              <p class="text-danger fst-italic fs-8">{{ __("ui.$message") }}</p>
            @enderror
          </div>
          <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}">
            @error('email')
              <p class="text-danger fst-italic fs-8">{{ __("ui.$message") }}</p>
            @enderror
          </div>
          <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password">
            @error('password')
              <p class="text-danger fst-italic fs-8">{{ __("ui.$message") }}</p>
            @enderror
          </div>
          <div class="mb-3">
            <label for="password_confirmation" class="form-label">{{ __('ui.confirmPassword') }}</label>
            <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" id="password_confirmation" name="password_confirmation">
            @error('password_confirmation')
              <p class="text-danger fst-italic fs-8">{{ __("ui.$message") }}</p>
            @enderror
          </div>
          <button type="submit" class="btn btn-outline-dark">{{ __('ui.register') }}</button>
        </form>
      </div>
    </div>
  </div>
</x-layout>