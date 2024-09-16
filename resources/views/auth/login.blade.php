<x-layout title="Login">
  <div class="container-fluid">
    <div class="row justify-content-center align-items-center vh-100-with-navbar">
      <div class="col-8">
        <div class="row border border-secondary rounded shadow">
          <div class="col-12 col-md-6 bg-secondary">
  
          </div>
          <div class="col-12 col-md-6">
            <div class="d-flex flex-column justify-content-center align-items-center p-5">
              <h1 class="fs-3 mb-4">Accedi!</h1>
              <form action="{{ route('login') }}" method="POST" class="auth-form-width">
                @csrf
                <div class="mb-3">
                  <label for="email" class="form-label">Email</label>
                  <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email">
                  @error('email')
                    <p class="text-danger fst-italic fs-8">{{ $message }}</p>
                  @enderror
                </div>
                <div class="mb-3">
                  <label for="password" class="form-label">Password</label>
                  <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password">
                  @error('password')
                    <p class="text-danger fst-italic fs-8">{{ $message }}</p>
                  @enderror
                </div>
                <button type="submit" class="btn btn-primary">Accedi</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</x-layout>