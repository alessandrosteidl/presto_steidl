<div class="container-fluid">
  @if (session('success'))
    <div class="alert alert-success text-center my-3">{{ session('success') }}</div>
  @endif
  <div class="row justify-content-center align-items-center vh-100-with-navbar">
    <div class="col-10 col-sm-8 col-lg-5 d-flex flex-column justify-content-center align-items-center border border-secondary rounded shadow p-5 m-5">
      <form wire:submit="store()" class="form-width">
        <h1 class="text-center fs-3 mb-4">Inserisci il tuo articolo!</h1>
        <div class="mb-3">
          <label for="title" class="form-label">Titolo</label>
          <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" wire:model.blur="title" value="{{ old('title') }}">
          @error('title')
            <p class="text-danger fst-italic fs-8">{{ $message }}</p>
          @enderror
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Descrizione</label>
            <textarea rows="4" class="form-control ta-no-resize @error('description') is-invalid @enderror" id="description" wire:model.blur="description">{{ old('description') }}</textarea>
            @error('description')
                <p class="text-danger fst-italic fs-8">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-3">
            <label for="price" class="form-label">Prezzo</label>
            <input type="text" class="form-control @error('price') is-invalid @enderror" id="price" wire:model.blur="price" value="{{ old('price') }}">
            @error('price')
              <p class="text-danger fst-italic fs-8">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-3">
            <label for="category" class="form-label">Categoria</label>
            <select wire:model.blur="category" id="category" class="form-control @error('category') is-invalid @enderror">
                <option value="{{ -1 }}" label disabled selected>Seleziona una categoria</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
            @error('category')
              <p class="text-danger fst-italic fs-8">{{ $message }}</p>
            @enderror
        </div>
        <button type="submit" class="btn btn-outline-dark">Inserisci</button>
      </form>
    </div>
  </div>
</div>
