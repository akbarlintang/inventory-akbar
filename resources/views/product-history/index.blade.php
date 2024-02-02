@extends('layouts.app')

@section('content')
<div class="container">
    {{-- Table --}}
    <div>
        <h2>Table Data</h2>
        <table id="main-table" class="table table-bordered table-hover table-striped">
            <thead>
                <tr class="text-center">
                    <th>Kode</th>
                    <th>Nama</th>
                    <th>Total Harga</th>
                    <th>Total Barang</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody id="main-table-body">
                
            </tbody>
        </table>
    </div>

    {{-- List --}}
    <div class="mt-3">
        <h2>List Data</h2>
        <ul id="main-list" class="list-group">
            
        </ul>
    </div>

    {{-- Grid --}}
    <div class="mt-3">
        <h2>Grid Data</h2>
        <div class="container">
            <div id="main-grid" class="row row-cols-2 gy-3">
                <div class="col">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">INV-6</h5>
                            <h6 class="card-subtitle mb-2 text-muted">Asbak</h6>
                            <p class="card-text">
                                Total Harga : Rp 10,230,000	<br/>
                                Total Barang : 2 <br/>
                                Status : Penambahan <br/>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="module">
    // Fetch data when the page loads
    $(document).ready(function() {
        fetchData();
    });

    // Fetch data function
    function fetchData() {
        // define baseUrl and apiUrl
        const baseUrl = 'http://localhost:8000';
        const apiUrl = baseUrl + '/api/product-histories';

        $.ajax({
            url: apiUrl,
            method: 'GET',
            dataType: 'json',
            success: function(data) {
                // Call function to render table data
                renderTable(data);
                renderList(data);
                renderGrid(data);
            },
            error: function(error) {
                console.error('Error fetching data:', error);
            }
        });
    }

    // Function to render table data
    function renderTable(data) {
        const tableBody = $('#main-table-body');

        tableBody.empty();

        // Iterate through the data and create table rows
        $.each(data.data, function(index, item) {
            const row = $('<tr>');

            // Add columns
            const kodeCell = $('<td class="text-center">').text(item.kode);
            row.append(kodeCell);

            const namaCell = $('<td>').text(item.nama);
            row.append(namaCell);

            const totalHargaCell = $('<td class="text-end">').text('Rp ' + item.total_harga.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ","));
            row.append(totalHargaCell);

            const totalBarangCell = $('<td class="text-center">').text(item.total_barang);
            row.append(totalBarangCell);

            const statusCell = $('<td>').text(item.status);
            row.append(statusCell);

            // Append the row to the table body
            tableBody.append(row);
        });
    }

    // Function to render list data
    function renderList(data) {
        const listBody = $('#main-list');

        listBody.empty();

        // Iterate through the data and create table rows
        $.each(data.data, function(index, item) {
            const row = $('<li class="list-group-item">\
                Kode : '+ item.kode +' <br/>\
                Nama : '+ item.nama +' <br/>\
                Total Harga : Rp '+ item.total_harga.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",") +' <br/>\
                Total Barang : '+ item.total_barang +' <br/>\
                Status : '+ item.status +'\
            </li>');

            // Append the row to the list body
            listBody.append(row);
        });
    }

    // Function to render grid data
    function renderGrid(data) {
        const gridBody = $('#main-grid');

        gridBody.empty();

        // Iterate through the data and create table rows
        $.each(data.data, function(index, item) {
            const col = $('<div class="col">');
            
            const card = $('<div class="card">');
            
            const cardBody = $('<div class="card-body">');
            
            // Add card title
            const title = $('<h5 class="card-title">'+ item.kode +'</h5>');
            cardBody.append(title);

            // Add card subtitle
            const subTitle = $('<h6 class="card-subtitle mb-2 text-muted">'+ item.nama +'</h6>');
            cardBody.append(subTitle)
            
            // Add card text
            const text = $('<p class="card-text">\
                Total Harga : Rp '+ item.total_harga.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",") +'	<br/>\
                Total Barang : '+ item.total_barang +' <br/>\
                Status : '+ item.status +' <br/>\
            </p>');
            cardBody.append(text);

            // Append card body to card
            card.append(cardBody);

            // Append card to col
            col.append(card);

            // Append the row to the grid body
            gridBody.append(col);
        });
    }
</script>
@endsection
