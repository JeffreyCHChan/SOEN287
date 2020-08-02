//Nareg Mouradian 40044254

//More Description button implementation of the accordion feature
var descInfo = document.getElementsByClassName("more");

    for( var i=0; i<descInfo.length; i++) {
        descInfo[i].onclick = function() {
            descInfo[0].classList.toggle("active");
           var content = this.nextElementSibling;
           
           if(content.style.maxHeight) {
               content.style.maxHeight = null;
           } else {
               content.style.maxHeight = content.scrollHeight + "px";

        }
      
    }
    
}

//Add to Cart implementation
let itemList = [];
const itemCartDOM = document.querySelector('.itemCartInfo');
const aTCButtonDOM = document.querySelectorAll('[data-action="AddToCart"]');
aTCButtonDOM.forEach(itemDescription => {
    itemDescription.addEventListener('click' , () => {
        const itemDOM = itemDescription.parentNode;
        const item = {
            name: itemDOM.querySelector('.product').innerText,
            price: itemDOM.querySelector('.price').innerText,
            quantity: 1,
        };

        //Making sure that the name and the price will only appear once when clicking add to cart.
        const inCheck = (itemList.filter(itemInfo => (itemInfo.name === item.name)).length > 0);
        if (inCheck === false){
                itemCartDOM.insertAdjacentHTML('beforeend' , `
        <div class="item_">
        <h3 class="item_name">${item.name}</h3>
        <h3 class="item_price">${item.price}</h3>
        <button class="cart-btn" data-action="IncreaseItem" style="width: 5%; height: 3%;">&plus;</button>
        <h3 class="item_quantity">${item.quantity}</h3>
        <button class="cart-btn" data-action="DecreaseItem" style="width: 5%; height: 3%;">&minus;</button>
        <button class="cart-btn" data-action="RemoveItem" style="width: 5%; height: 3%;background-color:red">&times;</button>
        </div>
        `); 
        itemList.push(item);    

        const bakeryItem = itemCartDOM.querySelectorAll('.item_');
        bakeryItem.forEach(individualInfo => {
            if(individualInfo.querySelector('.item_name').innerText === item.name) {
            individualInfo.querySelector('[data-action="IncreaseItem"]').addEventListener('click', () => {
                itemList.forEach(itemInfo => {
                    if(itemInfo.name === item.name) {
                        individualInfo.querySelector('.item_quantity').innerText = ++itemInfo.quantity;
                    }
                });
            });
            }
           

        });
        }
    }); 

});



