// app.js - Asynchronous Behavioral Logic via jQuery AJAX
$(document).ready(function() {
    $("#lukuForm").submit(function(event) {
        event.preventDefault(); // HALTS traditional form submission and reload

        // Client-Side Validation (Lecture 3 Principles)
        let meter = $("#meter_number").val().trim();
        let amount = $("#amount").val().trim();
        let network = $("#mobile_network").val();
        let phone = $("#phone_number").val().trim();

        if (meter === "" || amount === "" || network === "" || phone === "") {
            $("#status-message").html("<p class='error'>All fields are strictly required!</p>");
            return false;
        }

        if (meter.length !== 11 || isNaN(meter)) {
            $("#status-message").html("<p class='error'>Meter Number must be exactly 11 digits!</p>");
            return false;
        }

        if (isNaN(amount) || parseFloat(amount) < 1000) {
            $("#status-message").html("<p class='error'>Minimum purchase amount is TZS 1,000!</p>");
            return false;
        }

        // Serializing inputs seamlessly (Lecture 5)
        let formData = $(this).serialize();

        // Asynchronous POST transmission
        $.post("process.php", formData, function(response) {
            if (response.status === "success") {
                $("#status-message").html("<div class='success'><strong>" + response.message + "</strong><br/>Token: " + response.token + "</div>");
                $("#lukuForm")[0].reset();
            } else {
                $("#status-message").html("<p class='error'>" + response.message + "</p>");
            }
        }, "json").fail(function(xhr) {
            $("#status-message").html("<p class='error'>Server Error: " + xhr.responseText + "</p>");
        });
    });
});