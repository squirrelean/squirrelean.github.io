function splitAtRoot(path)
{
    const url = new URL(path, location.origin);
    const pathFromRoot = url.pathname;
    document.write("<br>----> path from root: " + pathFromRoot);
    return pathFromRoot;
}

function setNav(current_path)
{
    current_path = splitAtRoot(current_path);
    let nav = document.getElementById("main-nav");
    for (let child of nav.children)
    {
        if (child instanceof HTMLAnchorElement)
        {
            let page = child.href;
            page = splitAtRoot(page);
            document.write("<br>current path: " + current_path);
            document.write("page: " + page);
            if (page === current_path)
            {
                child.classList.add("current_page");
            }
        }
    }
    
}

fetch("nav.html")
.then(r => r.text())
.then(html => document.getElementById("main-nav").innerHTML = html);

