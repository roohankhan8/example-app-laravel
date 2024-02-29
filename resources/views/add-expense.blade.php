<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{isset($expense) ? 'Edit' : 'Add'}} Expense</title>
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

    input[type='radio'] {
        margin-inline: 0.5rem;
    }
</style>
<?php
$categories = [['expense', 'Expense'], ['income', 'Income']];
$typesOfExpenses = [['food', 'Food'], ['transportation', 'Transportation'], ['others', 'Others']];
$typesOfIncomes = [['salary', 'Salary'], ['allowance', 'Allowance'], ['bonus', 'Bonus']];
?>

<body style="background-color: antiquewhite"
    class="container d-flex flex-column justify-content-center align-items-center ">
    <form 
        style="background-color: burlywood" 
        action={{isset($expense) ? url("/edit-expense/{$expense['id']}") : url('/add-expense')}}
        method="POST"
        class=" p-5 my-5 d-flex flex-column gap-3 rounded"
    >
        @csrf
        {{ isset($expense) ? method_field('PUT') : '' }}
        <h3 class="text-center">
            <?php if (isset($expense)) {
                echo 'Edit';
            } else {
                echo 'Add';
            }
            ?>
            Expense</h3>
        <select class="p-2" onchange="showType(this.value)" name="category" id="category">
            @foreach ($categories as $category)
                <option value="{{ $category[0] }}"
                    {{ isset($expense) && $expense['category'] == $category[0] ? 'selected' : '' }}>{{ $category[1] }}
                </option>
            @endforeach
        </select>
        <div id="expenseCategory">
            @foreach ($typesOfExpenses as $typeOfExpense)
                <label>
                    <input type="radio" name="typeOfExpense" id={{ $typeOfExpense[0] }} value={{ $typeOfExpense[0] }}
                        {{isset($expense) && $expense['typeOfExpense'] == $typeOfExpense[0] ? 'checked': ''}}
                        
                        <?php
                        // if (isset($expense)) {
                        //     if ($expense['typeOfExpense'] == $typeOfExpense[0]) {
                        //         echo 'checked';
                        //     }
                        // } elseif ($typeOfExpense[0] == 'food') {
                        //     echo 'checked';
                        // }
                        ?>
                        >
                    {{ $typeOfExpense[1] }}
                </label>
            @endforeach
        </div>
        <div id="incomeCategory" class="hidden">
            @foreach ($typesOfIncomes as $typeOfIncome)
                <label>
                    <input type="radio" name="typeOfIncome" id={{ $typeOfIncome[0] }} value={{ $typeOfIncome[0] }}
                        {{isset($expense) && $expense['typeOfIncome'] == $typeOfIncome[0] ? 'checked' : '' }}
                        <?php
                        // if (isset($expense)) {
                        //     if ($expense['typeOfIncome'] == $typeOfIncome[0]) {
                        //         echo 'checked';
                        //     }
                        // }
                        ?>>{{ $typeOfIncome[1] }}
                </label>
            @endforeach
        </div>
        <input type="number" placeholder="Amount" name="amount" min="1" value={{isset($expense) ? $expense['amount'] : ''}}>
        <button type="submit" class="btn btn-primary rounded">{{isset($expense) ? 'Edit' : 'Add'}}</button>
    </form>
</body>
<script>
    const expenseCategory = document.getElementById('expenseCategory')
    const incomeCategory = document.getElementById('incomeCategory')
    const food = document.getElementById('food')
    const salary = document.getElementById('salary')
    const categoryBox = document.getElementById('category')

    console.log(categoryBox.value)
    console.log(food.value, salary.value)

    // document.getElementById('food').checked = true

    function showType(category) {
        if (category === 'expense') {
            expenseCategory.classList.remove("hidden")
            incomeCategory.classList.add("hidden")
            salary.checked = false
            food.checked = true
            console.log(category)
            // console.log(categoryBox.value)
            console.log(food.value, salary.value)
        } else if (category === 'income') {
            expenseCategory.classList.add("hidden")
            incomeCategory.classList.remove("hidden")
            salary.checked = true
            food.checked = false
            console.log(category)
            // console.log(categoryBox.value)
            console.log(food.value, salary.value)
        }
    }
</script>

</html>
