@extends('layouts.base')
@section('title',"DATAGRID TEST")

@section('body-content')
<table id="myTable" class="display">
    <thead>
        <tr>
            <th>id_taxi</th>
            <th>id_chauffeur</th>
            <th>recette effectuée</th>
            <th>prix fixe</th>
            <th>kilometrage effectué</th>
            <th>Kilometre pris en charge effectuer</th>
            <th>pris en charge effectuer</th>
            <th>kilometrage auto effectué</th>
            <th>gaz</th>
            <th>Crédit</th>
            <th>Divers</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($formulaires as $formulaire)
            <tr>
                <td>{{$formulaire->id_taxi}}</td>
                <td>{{$formulaire->id_chauffeur}}</td>
                <td>{{ $formulaire->recette_arrivee - $formulaire->recette_depart}}</td>
                <td>{{$formulaire->prix_fixes}}</td>
                <td>{{$formulaire->kilometrage_arrivee - $formulaire->kilometrage_depart}}</td>
                <td>{{$formulaire->kilometrage_pris_en_charge_arrivee - $formulaire->kilometrage_pris_en_charge_depart}}</td>
                <td>{{$formulaire->prise_en_charge_arrive - $formulaire->prise_en_charge_debut}}</td>
                <td>{{$formulaire->kilometrage_auto_arrivee -$formulaire->kilometrage_auto_depart}}</td>
                <td>{{$formulaire->depense_gaz}}</td>
                <td>{{$formulaire->depense_credit}}</td>
                <td>{{$formulaire->depense_divers}}</td>
            </tr>
        @endforeach
    </tbody>
</table>

@endsection

@section('after-scripts')
    <script>
        

        $(document).ready(function() {
    // Setup - add a text input to each footer cell
    $('#myTable thead tr').clone(true).appendTo( '#myTable thead' );
    $('#myTable thead tr:eq(1) th').each( function (i) {
        var title = $(this).text();
        $(this).html( '<input type="text" placeholder="Search '+title+'" />' );
 
        $( 'input', this ).on( 'keyup change', function () {
            if ( table.column(i).search() !== this.value ) {
                table
                    .column(i)
                    .search( this.value )
                    .draw();
            }
        } );
    } );
 
    var table = $('#myTable').DataTable( {
        orderCellsTop: true,
        fixedHeader: true
    } );
} );


    </script>
@endsection
