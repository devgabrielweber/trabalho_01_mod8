    <style>
        .custom-container {
            margin: auto;
            width: 75%;
        }

        .custom-form {
            display: flex;
            margin-right: auto;
            margin-left: auto;
            margin-top: 1.5rem;
            margin-bottom: 1rem;
            padding: 1rem;
            border-radius: 0.375rem;
            background-color: white;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .custom-form select,
        .custom-form input {
            margin-top: 0;
            width: 100%;
            padding: 0.5rem;
            border: 0;
            border-bottom: 2px solid #3182ce;
            color: #4a5568;
        }

        .custom-form button,
        .custom-link {
            margin-top: 0;
            background-color: #4299e1;
            color: white;
            font-weight: 600;
            padding: 0.5rem 1rem;
            border-radius: 0.375rem;
            transition: background-color 0.3s ease;
        }

        .custom-form button:hover,
        .custom-link:hover {
            background-color: #2c5282;
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

    <div class="custom-table-container">
        <div class="custom-table">
            <table class="custom-table">
                <thead class="custom-table-header">
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Nome</th>
                        <th scope="col">CPF</th>
                        <th scope="col">Telefone</th>
                        <th scope="col">Email</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($hospedes as $item)
                        <tr class="custom-table-row">
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->nome ?? '' }}</td>
                            <td>{{ $item->cpf ?? '' }}</td>
                            <td>{{ $item->telefone ?? '' }}</td>
                            <td>{{ $item->email }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    </div>
