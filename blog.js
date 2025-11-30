document.querySelectorAll('.delete-btn').forEach(btn =>
{
    btn.addEventListener('click', () =>
    {
        const id = btn.dataset.id;
        if (!confirm('Are you sure?')) return;

    });
});
