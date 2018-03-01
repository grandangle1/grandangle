<h1 class="text-center m-5 bold">Sheduled on <?= $month; ?> <?= $year ?></h1>

<?= $calendar ?>

<h3 class="text-center m-5">Choose a month</h3>

<form method="POST" class="choose-month text-center pb-5">
    <div class="error-month"></div>
    <input type="month" name="month">
    <button type="submit" class="btn btn-secondary">Search</button>
</form>


<script src="js/calendar.js"></script>
