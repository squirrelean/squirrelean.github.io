


function compute_days(){
    const dob = get_dob();
    const current_year = 2025
    // Add code here computing the age in number of days!
    let current_date = new Date();
    let birth_date = new Date(dob);
    
    let date_span = current_date - birth_date;
    let total_days = date_span / (1000 * 60 * 60 * 24);
    
    write_answer_days("You have been on earth for " + total_days + " days!");
}



function compute_circle(){
    const screen = get_screen_dims();
    
    // Add code here computing the radius and area of the circle
    let radius = screen.width / 2;
    let area = Math.PI * radius * radius;


    write_answer_circle("Area = " + area);
}



function check_palindrome(){
    const text_input = get_palindrome();
    
    // Add code here checking if text_input is a palindrome.
    // You must use a for loop
    // Hint: choose how to manage spaces and capital/lowercase letters!
    
    let lower_text = text_input.toLowerCase();

    let palindrome = true;
    let text_length = lower_text.length;
    for (let i = 0; i < text_length; i++)
    {
        if (lower_text[i] !== lower_text[text_length - 1 - i])
        {
            palindrome = false;
            break;
        }
    }
    
    write_answer_palindrome("Palindrome: " + palindrome);
}



function create_fibo(){    
    // Add code here to get the wanted length. 
    // Hint: check my other codes in javascript_utils.js
    const fibo_length = document.getElementById("fibo_length").value;
    
    // Add code here to compute the fibonacci sequence.
    // The two first elements are 0 and 1
    // The next elements are the sum of the two last elements.
    // You must use arrays
    // What happens if the input number is negative?
    // What happens if the input number is 0 or 1?

    if (fibo_length < 1)
    {
        return;
    }

    let arr = [0, 1];
    for (let i = 2; i < fibo_length; i++)
    {
        arr[i] = arr[i - 1] + arr[i - 2];
    }


    write_answer_fibo("The fibonacci sequence is: " + arr);
}

