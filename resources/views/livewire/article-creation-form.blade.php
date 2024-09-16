<form wire:submit="store()" class="form-width">
    @if (session('success'))
        <div class="alert alert-success text-center my-3">{{ session('success') }}</div>
    @endif
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
            <option value="{{ null }}" label disabled>Seleziona una categoria</option>
            @foreach ($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </select>
        @error('category')
          <p class="text-danger fst-italic fs-8">{{ $message }}</p>
        @enderror
    </div>
    <button type="submit" class="btn btn-primary">Inserisci</button>
</form>