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
        // This allows modifying CSS of the html body.
        document.body.classList.toggle("dark_mode");
    });


});
