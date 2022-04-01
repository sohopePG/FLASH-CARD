{
    const cards = document.querySelectorAll(".card")
    const cardfronts = document.querySelectorAll(".card-front")
    const cardbacks = document.querySelectorAll(".card-back") 
    const btn = document.getElementById("btn")   
     
   for(let i=0;i < cards.length;i++){
        cardfronts[i].addEventListener("click",()=>{
            cards[i].classList.toggle("open");
        })
        cardbacks[i].addEventListener("click",()=>{
            cards[i].classList.toggle("open");
        })
    }
    btn.addEventListener("click",()=>{
        cards.forEach(cardfront => {
            cardfront.classList.toggle("open");
        });
    })
}
