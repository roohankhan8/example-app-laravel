<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('../css/app.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
</head>
<style>
    #expenses-container {
        display: flex;
        flex-direction: row;
        flex-wrap: wrap;
    }

    @media (max-width: 600px) {
        #expenses-container {
            gap: 0.5rem;
        }
    }

    @media (min-width: 601px) and (max-width: 991px) {
        #expenses-container {
            gap: 0.5rem;
        }
    }

    @media (min-width:992px) {
        #expenses-container {
            gap: 1rem;
        }
    }
</style>

<body>
    <?php include '../resources/components/sidenav.php'; ?>

    <div class="fixed">
        <nav class="d-flex navbar navbar-light bg-light justify-content-between p-2 mb-2 border-bottom align-items-center"
            style="background: rgba(255, 255, 255, 0.8); backdrop-filter: blur(10px);">
            <button class="btn btn-primary" type="button" data-bs-toggle="offcanvas"
                data-bs-target="#offcanvasWithBothOptions" aria-controls="offcanvasWithBothOptions">Menu</button>
            <h1>Expense Tracker</h1>
            <div class="d-flex gap-1">
                <a class="btn btn-success" href="/add-expense">Create</a>
                <form class="nav-item" action="/logout" method="POST">
                    @csrf
                    <button class="btn btn-danger">Logout</button>
                </form>
            </div>
        </nav>
    </div>
    <h4 class="text-center">Welcome, {{ auth()->user()->name }}</h4>
    <div class="container d-flex justify-content-center">
        <table class="table text-center table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th>Expenses</th>
                    <th>Income</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <?php
                    $totalExpenses = 0;
                    $totalIncomes = 0;
                    for ($i = 0; $i < count($expenses); $i++) {
                        if ($expenses[$i]['category'] == 'expense') {
                            $totalExpenses += $expenses[$i]['amount'];
                        } elseif ($expenses[$i]['category'] == 'income') {
                            $totalIncomes += $expenses[$i]['amount'];
                        }
                    }
                    $total = $totalExpenses + $totalIncomes;
                    echo "<td>$" . $totalExpenses . '</td>';
                    echo "<td>$" . $totalIncomes . '</td>';
                    echo "<td>$" . $total . '</td>';
                    ?>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="container-fluid d-flex justify-content-center align-items-center my-3">
        <form action="/dashboard" method="post">
            @csrf
            <input type="month" name="date" class="p-2" id="date" value="<?php echo $date; ?>">
            <button type="submit" class="btn btn-success">Go</button>
        </form>
    </div>
    <div id="expenses-container" class="container-fluid d-flex justify-content-center align-items-center py-2">
        @if ($expenses)
            @foreach ($expenses as $expense)
                <div class="card shadow">
                    <div class="card-body ">
                        <h5 class="card-title">{{ $expense->category }}</h5>
                        <h6 class="card-subtitle mb-2 text-body-secondary">{{ $expense->typeOfExpense }}</h6>
                        <p class="card-text">${{ $expense->amount }}</p>
                        <p class="card-text"><small>{{ $expense->created_at->format('d/m/Y') }}</small></p>
                        <a href="/edit-expense/{{ $expense->id }}" class="card-link btn btn-success">Edit</a>
                        <form class="card-link btn" action="/delete-expense/{{ $expense->id }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger" type="submit">DELETE</button>
                        </form>
                    </div>
                </div>
            @endforeach
        @else
            <h1>No expenses for this month</h1>
        @endif
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
    <script src="../js/index.js"></script>
</body>

</html>
