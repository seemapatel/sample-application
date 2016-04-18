/* 
 * - type:The method type for the form.In this case, we'll be using POST.
 * - url: set this to the URL the form will be submitted to DataHandler.php
 * - success: accepts the response from the server.
 * - clear the value of text box.
 * - Display Thank you in bottom div.
 */

function submitForm() {
   
    $.ajax({
        type:'POST', 
        url: 'DataHandler.php', 
        data:$('#DailyLogForm').serialize(), 
        success: function(response) {
            $("input[name$='name']").val('');
            $("textarea[name$='message']").val('');
            $('#DailyLogForm').find('.result').html(response);
    }});
    return false;
}