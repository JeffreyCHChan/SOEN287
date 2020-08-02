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

//Add to Cart button implementation to show us an option to increase or decrease the amount of the item to be purchased.
let itemList = (JSON.parse(localStorage.getItem('itemList')) || []);

const itemCartDOM = document.querySelector('.itemCartInfo');
const aTCButtonDOM = document.querySelectorAll('[data-action="AddToCart"]');

if(itemList.length > 0){
    itemList.forEach(itemInfo => {
        const item = itemInfo;

        insertItem(item);

                //For increasing the amount of the item to be purchased.
                const bakeryItem = itemCartDOM.querySelectorAll('.item_');
                bakeryItem.forEach(individualInfo => {
                    if(individualInfo.querySelector('.item_name').innerText === item.name) {
                        buttonHandler(item);
                    }
                });
    });
}

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
            insertItem(item);

        itemList.push(item);
        //To allow refreshing the page and keeping the content.
        localStorage.setItem('itemList' , JSON.stringify(itemList) );
        buttonHandler(item);

        
        }
    }); 

});
//Creating functions that will be used more than once.
function insertItem(item) {
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
}

function buttonHandler(item) {
    //For increasing the amount of the item to be purchased.
    const bakeryItem = itemCartDOM.querySelectorAll('.item_');
    bakeryItem.forEach(individualInfo => {
        if(individualInfo.querySelector('.item_name').innerText === item.name) {
        individualInfo.querySelector('[data-action="IncreaseItem"]').addEventListener('click', () => {
            itemList.forEach(itemInfo => {
                if(itemInfo.name === item.name) {
                    individualInfo.querySelector('.item_quantity').innerText = ++itemInfo.quantity;
                    localStorage.setItem('itemList' , JSON.stringify(itemList) );
                }
            });
        });
        //For decreasing the amount of the item to be purchased.
        individualInfo.querySelector('[data-action="DecreaseItem"]').addEventListener('click', () => {
            itemList.forEach(itemInfo => {
                if(itemInfo.name === item.name) {
                    if(itemInfo.quantity > 1){ 
                    individualInfo.querySelector('.item_quantity').innerText = --itemInfo.quantity;
                    localStorage.setItem('itemList' , JSON.stringify(itemList) );
                } else {
                    individualInfo.remove();
                    itemList = itemList.filter(itemInfo => itemInfo.name !== item.name);
                    localStorage.setItem('itemList' , JSON.stringify(itemList) );
                    }
                }
            });
        });
        //For the removing button
        individualInfo.querySelector('[data-action="RemoveItem"]').addEventListener('click', () => {
            itemList.forEach(itemInfo => {
                if(itemInfo.name === item.name) {
                    individualInfo.remove();
                    itemList = itemList.filter(itemInfo => itemInfo.name !== item.name);
                    localStorage.setItem('itemList' , JSON.stringify(itemList) );
                }
            });
        });


    }
    });
}
 

