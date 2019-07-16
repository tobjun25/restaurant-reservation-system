<?php

// Include config file
include "database_config.php";

// This if statement is executed once the booking confirmation button is pressed
if (isset($_POST['booking_Confirmation'])) {

    //these variables hold the data entered by the guest during the booking process
    $firstNameGuest = $_POST['guestFirstName'];
    $lastNameGuest = $_POST['guestLastName'];
    $guestEmail = $_POST['guestEmail'];
    $guestPhone = $_POST['guestPhone'];
    $numberGuests = $_POST['numberOfGuests'];
    $table = $_POST['table_selected'];
    $dateTimeChosen = $_POST['dateTimeChosen'];
    $table_size = $_POST['group_size_picker'];

    //SQL queries to insert the data entered by the guest
    $guest_details = "INSERT INTO guest_details (guestFirstName,guestLastName,guestEmail,guestPhone) 
                              VALUES ('$firstNameGuest','$lastNameGuest','$guestEmail','$guestPhone')";
    $guest_results = mysqli_query($connect, $guest_details);

    $table_details = "INSERT INTO table_details (table_size) VALUES ('$table_size') ";
    $table_results = mysqli_query($connect, $table_details);

    $reservation_details = "INSERT INTO guest_reservsation_details (dateTimeChosen) VALUES ('$dateTimeChosen')";
    $reservation_results = mysqli_query($connect, $table_details);

    //redirects to the booking confirmation page after the guest data has been inserted into the database
    header("Location:http://localhost/restaurant_booking/booking_confirmation.php");
}

?>
<html>
<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src="jquery.js"></script>
    <script src="jquery.datetimepicker.full.js"></script>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet"/>
    <link rel="stylesheet" href="jquery.datetimepicker.min.css">
    <style>

        body {
            margin: 0;
            padding: 0;
            background-color: #f1f1f1;
        }

        .box {
            width: 980px;
            border: 1px solid #ccc;
            background-color: #fff;
            border-radius: 5px;
            margin-top: 100px;
        }

    </style>
</head>
<body>
<!-- this div class displays the input fields and their corresponding descriptions -->
<div class="container box">
    <h3 align="center">Restaurant Reservation Booking System</h3>
    <br/>
    <label>Please enter your name, the number of guests and which time you'd like to make this booking for.</label>
    <br/>
    <br/>
    <form method="post" action="" id="formwrap">
    <table>
        <tr>
            <td>First name: &nbsp</td>
            <td><input type="text" name="guestFirstName"</td>
        </tr>
        <tr>
            <td>Last name: &nbsp</td>
            <td><input type="text" name="guestLastName"</td>
        </tr>
        <tr>
            <td>E-Mail Address: &nbsp</td>
            <td><input type="text" name="guestEmail"</td>
        </tr>
        <tr>
            <td>Phone/Mobile Number: &nbsp</td>
            <td><input type="text" name="guestPhone"</td>
        </tr>
        <tr>
            <td>Number of guests: &nbsp</td>
            <td><input type="text" name="numberOfGuests"</td>
        </tr>
        <tr>
            <td>Please choose a table: &nbsp</td>
            <td><select name="table_picker">
                    <option value="Table 1">Table 1</option>
                    <option value="Table 2">Table 2</option>
                    <option value="Table 3">Table 3</option>
                    <option value="Table 4">Table 4</option>
                    <option value="Table 5">Table 5</option>
                    <option value="Table 6">Table 6</option>
                    <option value="Table 7">Table 7</option>
                    <option value="Table 8">Table 8</option>
                    <option value="Table 9">Table 9</option>
                    <option value="Table 10">Table 10</option>
                </select>
                <input type="text" id="optionOutput" name="table_selected">
            </td>
        </tr>
        <tr>
            <td>Please choose the number of guests: &nbsp</td>
            <td><select name="group_size_picker">
                    <option value="small">small (1-4)</option>
                    <option value="medium">medium (5-9)</option>
                    <option value="large">large(10+)</option>
                </select>
            </td>
        </tr>
    <tr>
        <td>Choose a date and time by left clicking the input box: &nbsp</td>
        <td><input id ="dateTime" name="dateTimeChosen"/></td>
    </tr>
    </table>
    <br/>
    <input type="submit" name="booking_Confirmation" class="btn btn-success" value="Confirm Booking">
    <input type="submit" name="resetForm" class="btn btn-danger" value="Reset Forms">
    </form>
   _________________________________________________________________________________________________________________</p>

</div>
<!-- this jQuery script allows the user to pick a date and time from the corresponding input field -->
<script>
    $("#dateTime").datetimepicker();
</script>
<!-- this jQuery script enables the table that the guest selected to be shown in its corresponding input field -->
<script>
    $("select[name='table_picker']").change(function(){
        var value = $(this).val();
        $("input#optionOutput").val(value);
    });
</script>

</body>
</html>
