<div>
    {{-- DataTable Livewire --}}
    <livewire:datatable
        model="App\Models\User"
        include="id,name|NOMBRE,email|CORREO"
        searchable="name,email"
        hide="id"
        exportable
    >

    </livewire:datatable>
</div>
