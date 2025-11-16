// Load saved items from localStorage
let items = JSON.parse(localStorage.getItem("items")) || [];
renderList()  // We want show items in our listbefore adding new ones.


function addItem(event)
{
    let task = document.getElementById('user_task').value.trim();
    if (task === "")
    {
        window.alert("Please enter a task");
        return;
    }

    // Save in storage
    const newItem = {
    text: task,
    id: Date.now()  // unique timestamp-based id
    };
    items.push(newItem);
    localStorage.setItem("items", JSON.stringify(items));

    RenderItem(newItem.text, newItem.id);
}


function RenderItem(item_text, id)
{
    let list = document.getElementById('todo_items');
    let li = document.createElement('li');
    let span = document.createElement('span');
    span.textContent = item_text;
    li.appendChild(span);

    let trash_span = document.createElement('span');
    trash_span.classList.add('fas', 'fa-trash');
    li.appendChild(trash_span);

    list.appendChild(li);

    li.dataset.id = id;


    trash_span.addEventListener("click", () => {
        li.remove();
        items = items.filter(x => x.id !== id); // Remove based on unique id
        localStorage.setItem("items", JSON.stringify(items)); //Update localStorage
    });
}


function renderList()
{
    items.forEach((item, index) => {
    RenderItem(item.text, item.id);
    })
}
