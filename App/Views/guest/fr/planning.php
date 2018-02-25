<h1>Plnning fr</h1>
<style>
    table {
        width: 70%;
        margin: auto;
        overflow: scroll;
        text-align: center;
    }
    td {
        height: 40px;
        border: 1px solid;
        border-collapse: collapse;
    }

    td.week {
        text-align: left;
        padding-left: 10px;
        background-color: white;
        cursor: auto !important;
    }

    td.impossible {
        background-color: black;
    }

    th {
        background-color: white !important;
    }

    tr {
        background-color: beige;
    }

    tr.expo {
        background-color: lavender;
        cursor: pointer;
    }

    td.impossible {
        cursor: auto !important;
    }

    tr.expo:hover {
        background-color: #00FF00;
    }

    .noEmphasize {
        background-color: lavender !important;
    }

    .changeMonth img {
        padding: 0 20px;
        cursor: pointer;
    }

    td.today {
        background-color: red !important;
    }
</style>
<?= $calendar ?>

<script src="js/calendar.js"></script>
