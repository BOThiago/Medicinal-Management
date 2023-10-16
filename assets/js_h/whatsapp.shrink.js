const content = document.querySelector('[data-shrink="yes"]');


const sp = document.querySelector('[data-shrink="yes"] span')

sp.classList.add('aparecer')

setInterval(function(){
    content.classList.toggle('shrink')
},5000)


setInterval(function(){
    sp.classList.toggle('aparecer')
}, 5100)