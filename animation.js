const festTitle = document.getElementById('fest-title');
        
function animateText() {
    festTitle.style.fontSize = '100px'; 
    festTitle.style.transform = 'translateX(10%)';
}

setTimeout(animateText, 200);