<div class="container-fluid">
    @if (session('success'))
        <div class="alert alert-success text-center my-3">{{ __('ui.' . session('success')) }}</div>
    @endif
    <div class="row justify-content-center align-items-center vh-100-with-navbar">
        <div
            class="col-10 col-sm-8 col-lg-5 d-flex flex-column justify-content-center align-items-center border border-secondary rounded shadow p-5 m-5">
            <form wire:submit="store" class="form-width">
                <h1 class="text-center fs-3 mb-4">{{ __('ui.insertYourArticle') }}</h1>
                <div class="mb-3">
                    <label for="title" class="form-label">{{ __('ui.title') }}</label>
                    <input type="text" class="form-control @error('title') is-invalid @enderror" id="title"
                        wire:model.blur="title" value="{{ old('title') }}">
                    @error('title')
                        <p class="text-danger fst-italic fs-8">{{ __("ui.$message") }}</p>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">{{ __('ui.description') }}</label>
                    <textarea rows="4" class="form-control ta-no-resize @error('description') is-invalid @enderror" id="description"
                        wire:model.blur="description">{{ old('description') }}</textarea>
                    @error('description')
                        <p class="text-danger fst-italic fs-8">{{ __("ui.$message") }}</p>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="price" class="form-label">{{ __('ui.price') }}</label>
                    <input type="text" class="form-control @error('price') is-invalid @enderror" id="price"
                        wire:model.blur="price" value="{{ old('price') }}">
                    @error('price')
                        <p class="text-danger fst-italic fs-8">{{ __("ui.$message") }}</p>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="category" class="form-label">{{ __('ui.category') }}</label>
                    <select wire:model.blur="category" id="category"
                        class="form-control @error('category') is-invalid @enderror">
                        <option value="NULL">{{ __('ui.selectACategory') }}</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ __("ui.$category->name") }}</option>
                        @endforeach
                    </select>
                    @error('category')
                        <p class="text-danger fst-italic fs-8">{{ __("ui.$message") }}</p>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="images" class="form-label">{{ __('ui.images') }}</label>
                    <input type="file" class="form-control @error('temporary_images.*') is-invalid @enderror"
                        id="price" wire:model.live="temporary_images" multiple>
                    @error('temporary_images.*')
                        <p class="text-danger fst-italic fs-8">{{ $message }}</p>
                    @enderror
                    @error('temporary_images')
                        <p class="text-danger fst-italic fs-8">{{ $message }}</p>
                    @enderror
                </div>
                @if (!empty($images))
                    <div class="row mb-3">
                        <div class="col-12">
                            <p>{{ __('ui.preview') }}</p>
                            <div class="row border border-1 border-dark rounded">
                                @foreach ($images as $key => $image)
                                    <div class="col d-flex flex-column align-items-center my-3">
                                        <div class="img-preview mx-auto rounded"
                                            style="background-image: url({{ $image->temporaryUrl() }});"></div>
                                        <div class="w-100 d-flex justify-content-end">
                                            <button class="btn btn-outline-danger mt-2" type="button"
                                                wire:click="removeImage({{ $key }})"><i
                                                    class="bi bi-x"></i></button>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                @endif
                <button type="submit" class="btn btn-outline-dark">{{ __('ui.insert') }}</button>
            </form>
        </div>
    </div>
</div>
