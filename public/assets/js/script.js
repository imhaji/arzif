// let Items = window.document.querySelectorAll('.Items');
// let Operation = window.document.querySelector('#Operation');

// Items.forEach(function(item) {
    
//     item.addEventListener('click', () => {
//         item.children[1].style.display = 'block'    
//     })

// })

$('.Items').on('click', function() {
    $(this).find('.Operation').toggleClass('d-block');
})