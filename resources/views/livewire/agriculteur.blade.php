<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Argi') }}
        </h2>
    </x-slot>
    @if(Auth::user()->hasRole('admin'))
        @if($updateMode)
            @include('livewire.agriculteurs.update')
        @else
            @include('livewire.agriculteurs.create')
        @endif
    @else
        @if($updateMode)
            @include('livewire.agriculteurs.update')
        @endif
    @endif

    <br>
       <table class="table table-bordered mt-5" id="sampleTable">
           <thead>
           <tr>
               <th>Agr_id</th>
               <th>Agr_nom</th>
               <th>Agr_prenom</th>
               <th>Agr_resid</th>
               @if(Auth::user()->hasRole('editor|admin'))
               <th>Action</th>
               @endif
           </tr>
           </thead>
           <tbody>
           @foreach($agrs as $value)
               <tr>
                   <td>{{ $value->id }}</td>
                   <td>{{ $value->agr_nom }}</td>
                   <td>{{ $value->agr_prn }}</td>
                   <td>{{ $value->agr_resid }}</td>
                   @if(Auth::user()->hasRole('editor|admin'))
                       <td>
                           <button wire:click="edit({{ $value->id }})"
                                   class="btn btn-primary btn-sm">Edit</button>
                           @if(Auth::user()->hasRole('admin'))
                               <button wire:click="delete({{ $value->id }})"
                                       class="btn btn-danger btn-sm">Delete</button>
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
    
