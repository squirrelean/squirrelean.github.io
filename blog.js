document.addEventListener("DOMContentLoaded", () => {

    // Add delete logic to all blog item delete buttons
    document.querySelectorAll('.delete-btn').forEach(btn =>
    {
        btn.addEventListener('click', () =>
        {
            let blog_id = btn.dataset.id;
            if (!confirm('Are you sure?')) return;

            // Move to delete_post.php to remove the post from json file.
            btn.closest("form").submit();


            // Remove the post from the blog section
            let blog_to_delete = document.getElementById(blog_id);
            blog_to_delete.remove();

            // Remove the link from the aside section.
            let aside_link = document.querySelector('a[href="#' + blog_id + '"]');
            aside_link.parentElement.remove();
        });
    });


    // Functionality to change web theme when the theme button is clicked
    let theme_button = document.getElementById("change_theme");
    theme_button.addEventListener("click", () =>
    {
        // This allows toggling a CSS class for .
        document.body.classList.toggle("dark_mode");
    });


    // Functionality to search for a post
    let search_input = document.getElementById("search_bar");
    search_input.addEventListener("input", () =>
    {
        let searched_value = search_input.value.toLowerCase();

        let blogs = Array.from(document.querySelectorAll(".card-body"));
        blogs.forEach(blog_post =>
        {
            let blog_title = blog_post.querySelector(".card-title").innerText.toLowerCase();
            let blog_text = blog_post.querySelector(".card-text").innerText.toLowerCase();
            if (blog_title.includes(searched_value) || blog_text.includes(searched_value))
            {
                blog_post.style.display = "";
            }
            else
            {
                blog_post.style.display = "none";
            }
        });
    });


    // Functionality for collapsible/expandable posts.
    document.querySelectorAll(".collapsible").forEach(collapsible_blog =>
    {
        collapsible_blog.addEventListener("click", () =>
        {
            let post = collapsible_blog.closest(".post");
            post.classList.toggle("expanded");
        });
    });


    // Functionality to sort posts based on their date
    let sorting_option = document.getElementById("sorting_option");
    if (sorting_option)
    {
        // re-sort the blogs if the sorting option changes.
        sorting_option.addEventListener("change", () =>
        {
            // Load blog posts into an array
            let blogs = Array.from(document.querySelectorAll(".post"));

            // Sort the array of blog posts ba
            blogs.sort((first, second) =>
            {
                // Isolate the date by remove html date text and then convert it into a date datatype.
                let first_post_date = new Date(first.querySelector(".card-subtitle").innerText.replace("Date: ", ""));
                let second_post_date = new Date(second.querySelector(".card-subtitle").innerText.replace("Date: ", ""));

                // Compare the dates using substitution. The larger date is newer.
                if (sorting_option.value === "newest")
                {
                    return second_post_date - first_post_date;
                }
                else
                {
                    return first_post_date - second_post_date;
                }
            });

            // Append each of the sorted posts back to the parent blog DOM node for reordering
            let parent_node = blogs[0].parentElement;
            blogs.forEach(sorted_blog => parent_node.appendChild(sorted_blog));
        });
    }




});
