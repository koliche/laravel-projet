

<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Interventions') }}
        </h2>
    </x-slot>
    @if(Auth::user()->hasRole('admin'))
        @if($isOpen)
            @include('livewire.interventions.update')
        @else
            @include('livewire.interventions.create')
        @endif
    @else
        @if($isOpen)
            @include('livewire.interventions.update')
        @endif
    @endif


    <table class="table table-bordered mt-5" id="sampleTable">
        <thead>
        <tr>
            <th>Int debut</th>
            <th>Int emp nss</th>
            <th>Int par id</th>
            <th>Int nb jrs</th>
            @if(Auth::user()->hasRole('editor|admin'))
                <th>Action</th>
            @endif
        </tr>
        </thead>
        <tbody>
        @foreach($intervention as $value)
            <tr>
                <td>{{ $value->int_debut }}</td>
                <td>{{ $value->int_emp_nss }}</td>
                <td>{{ $value->int_par_id }}</td>
                <td>{{ $value->int_nb_jrs }}
                </td>
                @if(Auth::user()->hasRole('editor|admin'))
                    <td class="px-6 py-4 text-sm text-center text-gray-500">
                        {{-- <dd>{{ $value->int_debut }}</dd> --}}
                        <x-button wire:click="edit({{ json_encode($value->int_debut) }})">Edit
                        </x-button>
                        @if(Auth::user()->hasRole('admin'))
                            <x-button wire:click="delete({{ json_encode($value->int_debut) }})"
                                      class="text-sm text-gray bg-red-400 rounded">Delete</x-button>
                        @endif
                    </td>
                @endif
            </tr>
        @endforeach
        </tbody>
    </table>


    <script>
        $(document).ready(function() {
            $('#sampleTable').DataTable({
                responsive: true,
            });
        });
    </script>
</div>
