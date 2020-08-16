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
let itemList2 = (JSON.parse(localStorage.getItem('itemList2')) || []);

const itemCartDOM = document.querySelector('.itemCartInfo');
const aTCButtonDOM = document.querySelectorAll('[data-action="AddToCart"]');

if(itemList2.length > 0){
    itemList2.forEach(itemInfo => {
        const item = itemInfo;

        insertItem(item);
        totalPrice();

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
            calculationPrice: itemDOM.querySelector('.calcPrice').innerText,
            quantity: 1,
        };

        //Making sure that the name and the price will only appear once when clicking add to cart.
        const inCheck = (itemList2.filter(itemInfo => (itemInfo.name === item.name)).length > 0);
        if (inCheck === false){
            insertItem(item);

        itemList2.push(item);
        //To allow refreshing the page and keeping the content.
        localStorage.setItem('itemList2' , JSON.stringify(itemList2) );
        totalPrice();
        buttonHandler(item);

        
        }
    }); 

});
//Creating functions that will be used more than once.
function insertItem(item) {
    itemCartDOM.insertAdjacentHTML('beforeend' , `
    <div class="item_">
    <br>
        <h3 class="item_name" hidden>${item.name}</h3>
        <h3 class="item_price" hidden>${item.price}</h3>
        <button class="cart-btn" data-action="IncreaseItem" style="width: 5%; height: 3%;">&plus;</button>
        <h3 class="item_quantity">${item.quantity}</h3>
        <button class="cart-btn" data-action="DecreaseItem" style="width: 5%; height: 3%;">&minus;</button>
        <button class="cart-btn" data-action="RemoveItem" style="width: 5%; height: 3%;background-color:red">&times;</button>
        <button class="cart-btn" data-action="ShowTotal" >Total Price</button>
    </div>
    `); 
}

function buttonHandler(item) {
    //For increasing the amount of the item to be purchased.
    const bakeryItem = itemCartDOM.querySelectorAll('.item_');
    bakeryItem.forEach(individualInfo => {
        if(individualInfo.querySelector('.item_name').innerText === item.name) {
        individualInfo.querySelector('[data-action="IncreaseItem"]').addEventListener('click', () => {
            itemList2.forEach(itemInfo => {
                if(itemInfo.name === item.name) {
                    individualInfo.querySelector('.item_quantity').innerText = ++itemInfo.quantity;
                    localStorage.setItem('itemList2' , JSON.stringify(itemList2) );
                    totalPrice();
                }
            });
        });
        //For decreasing the amount of the item to be purchased.
        individualInfo.querySelector('[data-action="DecreaseItem"]').addEventListener('click', () => {
            itemList2.forEach(itemInfo => {
                if(itemInfo.name === item.name) {
                    if(itemInfo.quantity > 1){ 
                    individualInfo.querySelector('.item_quantity').innerText = --itemInfo.quantity;
                    localStorage.setItem('itemList2' , JSON.stringify(itemList2) );
                    totalPrice();
                } else {
                    individualInfo.remove();
                    itemList2 = itemList2.filter(itemInfo => itemInfo.name !== item.name);
                    localStorage.setItem('itemList2' , JSON.stringify(itemList2) );
                    totalPrice();
                    }
                }
            });
        });
        //For the removing button
        individualInfo.querySelector('[data-action="RemoveItem"]').addEventListener('click', () => {
            itemList2.forEach(itemInfo => {
                if(itemInfo.name === item.name) {
                    individualInfo.remove();
                    itemList2 = itemList2.filter(itemInfo => itemInfo.name !== item.name);
                    localStorage.setItem('itemList2' , JSON.stringify(itemList2) );
                    totalPrice();
                }
            });
        });


    }
    });
}

//Function to calcualte the total amount.
function totalPrice() {
    let itemTotalPrice = 0;
    itemList2.forEach(itemInfo => {
        itemTotalPrice += itemInfo.quantity * itemInfo.calculationPrice;
    });

    document.querySelector('[data-action="ShowTotal"]').innerText = `$ ${itemTotalPrice.toFixed(2)}`;
   

}

function cartadd(){
var c=localStorage.getItem('itemList2');
c= c.match(/\d{1,}(?=}])/);
if(c!=null){
document.getElementById('quan').value=c;
document.getElementById('form').submit();

}
}


 

