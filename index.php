<!-- HTML Form -->
<section class="form">
    <div class="status">
        <span id="status"></span>
    </div>
    <form id="form">
        <div class="input">
            <input type="text" id="name" name="name" placeholder="Name" />
            <input type="text" id="mobile" name="mobile" placeholder="Mobile Number" />
        </div>
        <div class="button">
            <input onclick="formSubmit()" type="button" value="Submit" id="button">
        </div>
    </form>
</section>





<script>
    function formSubmit() { // Function Call by button.
        var formInput = document.getElementById('form'); // Get Form Element.
        var formData = new FormData; // Creating Object of Form.

        for (var count = 0; count < formInput.length; count++) { // Storing Form Data For POST.
            formData.append(formInput[count].name, formInput[count].value);
        }
        document.getElementById('button').disabled = true; // Making Disable Button until Form upload in data base.

        var ajaxRequest = new XMLHttpRequest(); // Ajax 
        ajaxRequest.open('POST', 'dataBase.php'); 
        ajaxRequest.send(formData); // Sending data in dataBase PHP file.

        ajaxRequest.onreadystatechange = function() { 
            if (ajaxRequest.readyState == 4 && ajaxRequest.status == 200) {  // Checking Ajex Response.
                document.getElementById('button').disabled = false; // Removing Button Disability.
                document.getElementById('form').reset(); // Reset our Form for new Entery.
                document.getElementById('status').innerHTML = ajaxRequest.responseText; // Insertion PHP echo Statement into Span.
            }
        }

    }
</script>