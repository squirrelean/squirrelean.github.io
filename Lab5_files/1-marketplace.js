
function Cart(){
    this.itemGroups = [];
    this.showTotalAmount = function(){
        if (this.itemGroups.length == 0){
            document.write("<p> You have 0 item, for a total amount of 0$, in your cart! </p>");
        } else  {
           // You must code this.
           let total_amount = this.getTotalAmount();
           let taxed_total = total_amount * 1.15;
           document.write("<p>" + "There are " + this.itemGroups.length + "items in the cart." + 
                         "The total amount is $ " + total_amount.toFixed(2) + 
                         "The total with taxes is $" + taxed_total.toFixed(2) + "</p>");
        }
    }
}

function ItemGroup(name, item_price, item_count)
{
    this.name = name;
    this.item_price = item_price;
    this.item_count = item_count;
}

Cart.prototype.addItemGroup = function(item)
    {
        this.itemGroups.push(item);
    }

Cart.prototype.getTotalAmount = function()
{
    let amount = 0;
    for (let i = 0; i < this.itemGroups.length; i++)
    {
        let price_of_item = this.itemGroups[i].item_price;
        amount += price_of_item * this.itemGroups[i].item_count;
    }

    return amount;
}


document.write("<h2> 1) Creating the cart </h2>")
let my_cart = new Cart()
my_cart.showTotalAmount();
document.write("<h2> 2) Adding 15 pants at 10.05$ each to the cart! </h2>")
let pants = new ItemGroup("pants", 10.05, 15);
my_cart.addItemGroup(pants)
my_cart.showTotalAmount();
document.write("<h2> 3) Adding 1 coat at 99.99$ to the cart! </h2>")
let coat = new ItemGroup("pants", 99.99, 1);
my_cart.addItemGroup(coat)
my_cart.showTotalAmount();