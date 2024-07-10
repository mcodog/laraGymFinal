@extends('layouts.client')

@section('content')
<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/5.5.2/bootbox.min.js" integrity="sha512-RdSPYh1WA6BF0RhpisYJVYkOyTzK4HwofJ3Q7ivt/jkpW6Vc8AurL1R+4AUcvn9IwEKAPm/fk7qFZW3OuiUDeg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="{{ asset('js/transaction.js') }}"></script>
<br><br><br>
<?php
    echo Auth::user()->role;    
?>

<form action="#" id="transactionForm">
    <select id="membershipTypes">
        
    </select>
    Cost:
    <input type="text" id="membershipCost" readonly>

    <select id="membershipMonths">
        <option value="1">1 Month</option>
        <option value="2">2 Months</option>
        <option value="3">3 Months</option>
        <option value="4">4 Months</option>
        <option value="5">5 Months</option>
        <option value="6">6 Months</option>
        <option value="7">7 Months</option>
        <option value="8">8 Months</option>
        <option value="9">9 Months</option>
        <option value="10">10 Months</option>
        <option value="11">11 Months</option>
        <option value="12">12 Months</option>
    </select>

    <br>
    Start Date:
    <input type="text" id="startDate" readonly> <button id="setToday">Set Date Today</button>
    <br>

    <br>
    End Date:
    <input type="text" id="endDate">
    <br>

    <br>
    Total Cost:
    <input type="text" id="totalCost" readonly>
    <br>

</form>
@endsection
