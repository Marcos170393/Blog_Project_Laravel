document.addEventListener("DOMContentLoaded", function(){
    let content = document.getElementsByName("item-desc");
    content.forEach(element => {
        if(element.innerHTML.length>100){
            element.innerHTML = element.innerHTML.slice(0,100) + '...';
            
        }
    });
})