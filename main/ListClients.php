<div class="row">
    <div class="col p-1">
    <div class="card">
        <div class="card-header">
            Clientes
        </div>
        <div class="card-body">
        <table id="tabla_listado_clientes" class="table table-striped table-bordered " style="width:100%">
        <thead>
            <tr>
                <th>#</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Direccion</th>
                <th>Telefono</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
        <tr>
                <td>1</td>
                <td>System Architect</td>
                <td>Edinburgh</td>
                <td>61</td>
                <td>2011/04/25</td>
                <td>$320,800</td>
            </tr>
            <tr>
                <td>2</td>
                <td>Accountant</td>
                <td>Tokyo</td>
                <td>63</td>
                <td>2011/07/25</td>
                <td>$170,750</td>
            </tr>
           
        </tbody>
        <tfoot>
            <tr>
                <th>#</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Direccion</th>
                <th>Telefono</th>
                <th>Acciones</th>
            </tr>
        </tfoot>
    </table>
        </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
    // $('#tabla_listado_clientes').DataTable({
    //         responsive:true,
    //         buttons: [
    //             'copy', 'excel', 'pdf'
    //         ]
    //     });
    $('#tabla_listado_clientes').DataTable( {
    buttons: [
        'copy', 'excel', 'pdf'
    ]
} );
    } );
</script>