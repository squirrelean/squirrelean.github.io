// Functions

function previous()
{
    if (current_slide > 0)
    {
        current_slide--;
    }
    showSlide(current_slide);
}


function next()
{
    if (current_slide < document.getElementsByClassName("slideshow_img").length - 1)
    {
        current_slide++;
    }
    showSlide(current_slide);
}

function showSlide(n)
{
    let slides = document.getElementsByClassName("slideshow_img");
    for (let i = 0; i < slides.length; i++)
    {
        if (i === n)
        {
            slides[i].style.display = "block";
        }
        else
        {
            slides[i].style.display = "none";
        }
    }
}


// Main
let current_slide = 0;
showSlide(current_slide);