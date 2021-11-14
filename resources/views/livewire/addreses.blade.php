<div>
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#AddressAdd">
        Add
    </button>

    <!-- Modal Add -->
    <div wire:ignore.self class="modal fade" id="AddressAdd" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal Add</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="">
                        <div class="mb-3">
                            <label for="province" class="form-label">Province</label>
                            <input type="text" class="form-control @error('province') is-invalid @enderror"
                                id="province" wire:model="province">
                            @error('province') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" wire:click.prevent="store()">Add</button>
                </div>
            </div>
        </div>
    </div>
    {{-- <form action="">
        <div class="mb-3">
            <label for="province" class="form-label">Province</label>
            <input type="text" class="form-control @error('province') is-invalid @enderror" id="province"
                wire:model="province">
            @error('province') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>
    </form>
    <button type="button" class="btn btn-primary" wire:click.prevent="store()">Add</button> --}}
    @if (session()->has('message'))
    <div class="alert alert-success" role="alert">
        {{ session('message') }}
    </div>
    @endif
    {{$selectedItem}}

    <table class="table mt-5">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Province</th>
                <th scope="col">Handle</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($alamat as $item)
            <tr>
                <th scope="row">{{$loop->iteration}}</th>
                <td>{{$item->province}}</td>
                <td>
                    <button type=" button" wire:click="selectedItem({{$item->id}})"
                        class="btn btn-sm btn-outline-success">Edit</button>
                    <button type=" button" class="btn btn-sm btn-outline-danger"
                        wire:click="update({{$item->id}}, 'delete')">Delete</button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Modal Edit -->
    <div wire:ignore.self class=" modal fade" id="AddressEdit" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal Edit</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="">
                        <div class="mb-3">
                            <label for="province" class="form-label">Province</label>
                            <input type="text" class="form-control @error('province') is-invalid @enderror"
                                id="province" wire:model="province" value="{{$item->province}}">
                            @error('province') <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" wire:click.prevent="update()">Add</button>
                </div>
            </div>
        </div>
    </div>



</div>