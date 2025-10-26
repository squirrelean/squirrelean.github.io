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

    const quest1 = document.querySelector('input[name="quest1"]:checked');
    const quest2 = document.querySelector('input[name="quest2"]:checked');
    const quest3 = document.querySelectorAll('input[name="quest3"]:checked');
    const quest4 = document.querySelector('select[name="q4"]');
    const quest5 = document.querySelectorAll('input[name="quest5"]:checked');

    if (!quest1 || !quest2 || quest3.length === 0 || quest4.value === "" || quest5.length === 0)
    {
        window.alert("Please answer all questions before submitting.");
        form_is_valid = false;
    }

    if (!form_is_valid)
    {
        event.preventDefault();
        return false;
    }

    return true;
}