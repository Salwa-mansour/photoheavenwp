document.addEventListener('DOMContentLoaded',function(){
    function changOrder(){
          const firestImg = document.querySelector('.list-item:first-child img');
          const firestLi =  document.querySelector('.list-item:first-child');
       
        const injectItem = document.createElement('li');
        injectItem.classList.add('list-item');
        const parentUl = document.querySelector('.items-list');
        // add img inside li -basicly stealing img from the first childe >_<
        injectItem.appendChild(firestImg);
        // console.log(injectItem)
        // add li to the list
        parentUl.appendChild(injectItem);
        // getting red from the impty first item
        parentUl.removeChild(firestLi);
       
        const NewfirestLi =  document.querySelector('.list-item:last-child');
        // adding the fadeing css class to it
        NewfirestLi.classList.add('fadeing-item');
    }
    setInterval(changOrder,2000);
    // changOrder();


    // -------------------------------end
})
