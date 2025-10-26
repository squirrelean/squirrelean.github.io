function validate(event)
{
    const user_name = document.getElementById('user_name').value.trim();
    const user_email = document.getElementById('user_email').value.trim();

    let form_is_valid = true;

    if (user_name === "" || user_email === "")
    {
        window.alert("The name and/or email field submitted was empty.");
        form_is_valid = false;
    }

    if (!form_is_valid)
    {
        event.preventDefault();
        return false;
    }

    return true;
}