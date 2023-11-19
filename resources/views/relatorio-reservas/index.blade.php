<style>
    .custom-container {
        margin: auto;
        width: 75%;
    }

    .custom-table-container {
        overflow-x: auto;
    }

    .custom-table {
        width: 100%;
        border-collapse: collapse;
        margin: 0;
        padding: 0;
    }

    .custom-table th,
    .custom-table td {
        border: 1px solid #dddddd;
        text-align: left;
        padding: 8px;
    }

    .custom-table-header {
        background-color: #f2f2f2;
    }

    .custom-table-row:hover {
        background-color: #f5f5f5;
    }

    .custom-link {
        color: blue;
        text-decoration: underline;
    }

    .custom-link:hover {
        color: darkblue;
    }
</style>

<h3 class="pt-4 text-4xl font-medium text-center mb-4">
    Listagem de Reservas
</h3>

<div class="custom-container">
    <div class="custom-table-container">
        <div class="custom-table">
            <table class="custom-table">
                <thead class="custom-table-header">
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Hóspede</th>
                        <th scope="col">Quarto</th>
                        <th scope="col">Data Início</th>
                        <th scope="col">Data Fim</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($reservas as $item)
                        <tr class="custom-table-row">
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->hospede->nome ?? '' }}</td>
                            <td>{{ $item->quarto->numero ?? '' }}</td>
                            <td>
                                @if ($item->data_inicio)
                                    {{ date('d-m-Y', strtotime($item->data_inicio)) }}
                                @else
                                    -
                                @endif
                            </td>
                            <td>
                                @if ($item->data_fim)
                                    {{ date('d-m-Y', strtotime($item->data_fim)) }}
                                @else
                                    -
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
