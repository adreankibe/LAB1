function validateForm()
{
    var fname = document.forms["user_details"]["first_name"];
    var lname = document.forms["user_details"]["last_name"];
    var city = document.forms["user_details"]["city_name"];

    if (fname == null || lname == "" || city == "")
    {
        alert("all details required were not supplied");
        return false;
    }
    return true;
}