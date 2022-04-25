<form>
    <div class="form-group">
        <label for="exampleFormControlInput1">Parcelle lieu</label>
        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Enter Title"
            wire:model="par_lieu">
        @error('par_lieu')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <div class="form-group">
        <label for="exampleFormControlInput2">Parcelle nom </label>
        <input type="text" class="form-control" id="exampleFormControlInput2" wire:model="par_nom">
        @error('par_nom')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <div class="form-group">
        <label for="exampleFormControlInput3">Parcelle superficie</label>
        <input type="text" class="form-control" id="exampleFormControlInput3" wire:model="par_superficie">
        @error('par_superficie')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <div>
        <label for="tarif" class="block mt-3 mb-1 font-medium text-sm text-gray-700">Parcelle prop</label>
        <select name="tarif" id="tarif" style="width: 100%;" wire:model="agriculteur_id"
            class="block rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
            required>
            <option value=""> </option>
            @foreach ($agr as $value)
                <option value={{ $value->id }}>{{ $value->id }}</option>
            @endforeach
        </select>
        @error('agriculteur_id')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    {{-- <div class="form-group">
        <label for="exampleFormControlInput3">Parcelle prop</label>
        <input type="text" class="form-control" id="exampleFormControlInput3" wire:model="par_prop">
        @error('par_prop')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div> --}}
    <button wire:click.prevent="store()" class="btn btn-success">Save</button>
</form>
