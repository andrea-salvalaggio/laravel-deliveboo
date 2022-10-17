<div class="container-lg">
    <div class="row">
        <div class="col-12">
            <form action="{{ route($route, $argument) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method($method)
                <div class="mb-3">
                    <label for="name" class="form-label">Name*</label>
                    <input type="text" class="form-control" id="name" placeholder="Insert the dish name" name="name"
                        value="{{ old('name', $newDish->name) }}" required>
                        @error('name')
                        <div class="alert alert-danger">
                            {{ $message }}
                        </div>
                        @enderror
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label">Description*</label>
                    <textarea class="form-control" id="description" placeholder="Insert the dish description" name="description" rows="3">{{ old('description', $newDish->description) }}</textarea>
                    @error('description')
                    <div class="alert alert-danger">
                        {{ $message }}
                    </div>
                    @enderror

                </div>

                <div class="mb-3">
                    <label for="dishPic" class="form-label">Dish Picture*</label>
                    {{-- <input type="text" class="form-control" id="dishPic" placeholder="Insert the dish picture"
                        name="dishPic" value="{{ old('dishPic', $newDish->dishPic) }}"> --}}
                    <input type="file" class="form-control" id="dishPic" placeholder="Insert the dish picture"
                        name="dishPic"
                        @if ($method === 'POST')
                            required
                        @endif >

                        @error('dishPic')
                        <div class="alert alert-danger">
                            {{ $message }}
                        </div>
                        @enderror
                </div>

                <div class="mb-3">
                    <label for="price" class="form-label">Price*</label>
                    <input type="number" step=".01" class="form-control" id="price" placeholder="Insert the dish price"
                        name="price" value="{{ old('price', $newDish->price) }}" min="0.01">
                        @error('price')
                        <div class="alert alert-danger">
                            {{ $message }}
                        </div>
                        @enderror
                </div>

                <div class="form-check">
                    <input class="form-check-input" type="radio" name="visible" id="available" checked value="0">
                    <label class="form-check-label" for="available">
                        Available
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="visible" id="notAvailable" value="1">
                    <label class="form-check-label" for="notAvailable">
                        Not Available
                    </label>
                </div>
                @error('visible')
                <div class="alert alert-danger">
                    {{ $message }}
                </div>
                @enderror
                <button type="submit" class="btn btn-warning mt-3 rounded-pill">{{ $submit }}</button>
            </form>
        </div>
    </div>
</div>
