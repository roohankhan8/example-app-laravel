<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <form action="/add-expense" method="POST">
        @csrf
        <select name="category" id="catregory">
            <option value="expense" selected>Expense</option>
            <option value="income">Income</option>
        </select>
        <label>
            <input type="radio" name="typeOfExpense" id="food" value="food" checked>Food
        </label>
        <label>
            <input type="radio" name="typeOfExpense" id="transportation" value="transportation">Transportation
        </label>
        <label>
            <input type="radio" name="typeOfExpense" id="others" value="others">Others
        </label>
        <input type="number" placeholder="Amount" name="amount" min="1">
        <button type="submit">Add</button>
    </form>
</body>

</html>
