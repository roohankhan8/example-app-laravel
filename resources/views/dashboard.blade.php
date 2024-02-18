<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="../resources/css/app.css">
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
            gap: 1rem;
        }
    }

    @media (min-width: 601px) and (max-width: 991px) {
        #expenses-container {
            gap: 1rem;
        }
    }

    @media (min-width:992px) {
        #expenses-container {
            gap: 4rem;
        }
    }
</style>

<body>
    <?php include '../resources/components/sidenav.php'; ?>
    <nav class="d-flex navbar navbar-light bg-light justify-content-between p-2 mb-2 border-bottom align-items-center" style="background: rgba(255, 255, 255, 0.8); backdrop-filter: blur(10px);">
        <button class="btn btn-primary" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasWithBothOptions" aria-controls="offcanvasWithBothOptions">Menu</button>
        <h1>Expense Tracker</h1>
        <a class="btn btn-success" href="/add-expense">Create</a>
    </nav>

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
                    <td>123</td>
                    <td>123</td>
                    <td>123</td>
                </tr>
            </tbody>
        </table>
    </div>
    <div id="expenses-container" class="container-fluid d-flex justify-content-center align-items-center">
        @foreach ($expenses as $expense)
            <div class="card">
                <div class="card-body ">
                    <h5 class="card-title">{{ $expense->category }}</h5>
                    <h6 class="card-subtitle mb-2 text-body-secondary">{{ $expense->typeOfExpense }}</h6>
                    <p class="card-text">${{ $expense->amount }}</p>
                    <a href="#" class="card-link btn btn-success">Edit</a>
                    <a href="#" class="card-link btn btn-danger">Delete</a>
                </div>
            </div>
        @endforeach
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
</body>

</html>
