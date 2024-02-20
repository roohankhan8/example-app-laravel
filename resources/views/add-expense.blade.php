<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
</head>
<style>
    .hidden {
        display: none
    }

    input[type='number'] {
        padding: 0.5rem;
    }
    input[type='radio']{
        margin-inline: 0.5rem;
    }
</style>

<body style="background-color: antiquewhite" class="container d-flex flex-column justify-content-center align-items-center ">
    <form style="background-color: burlywood" action="/add-expense" method="POST" class=" p-5 my-5 d-flex flex-column gap-3 rounded">
        @csrf
        <h3 class="text-center">Create Your Expense</h3>
        <select class="p-2" onchange="showType(this.value)" name="category" id="catregory">
            <option value="expense" selected>Expense</option>
            <option value="income">Income</option>
        </select>
        <div id="expenseCategory">
            <label>
                <input type="radio" name="typeOfExpense" id="food" value="food">Food
            </label>
            <label>
                <input type="radio" name="typeOfExpense" id="transportation" value="transportation">Transportation
            </label>
            <label>
                <input type="radio" name="typeOfExpense" id="others" value="others">Others
            </label>
        </div>
        <div id="incomeCategory" class="hidden">
            <label>
                <input type="radio" name="typeOfExpense" id="salary" value="salary">Salary
            </label>
            <label>
                <input type="radio" name="typeOfExpense" id="Allowance" value="Allowance">Allowance
            </label>
            <label>
                <input type="radio" name="typeOfExpense" id="bonus" value="bonus">Bonus
            </label>
        </div>
        <input type="number" placeholder="Amount" name="amount" min="1">
        <button type="submit" class="btn btn-primary rounded">Add</button>
    </form>
</body>
<script>
    const expenseCategory = document.getElementById('expenseCategory')
    const incomeCategory = document.getElementById('incomeCategory')
    const food = document.getElementById('food')
    const salary = document.getElementById('salary')
    document.getElementById('food').checked = true

    function showType(category) {
        if (category === 'expense') {
            expenseCategory.classList.remove("hidden")
            incomeCategory.classList.add("hidden")
            salary.checked = false
            food.checked = true
            // console.log('salary',salary.checked,'food',food.checked)
            // console.log(category)
        } else {
            expenseCategory.classList.add("hidden")
            incomeCategory.classList.remove("hidden")
            salary.checked = true
            food.checked = false
            // console.log(category)
            // console.log('salary',salary.checked,'food',food.checked)
        }
    }
</script>

</html>
