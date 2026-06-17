(function(){
    var canvas = document.getElementById('tagsCanvas');
    if (!canvas) return;
    var tags = canvas.querySelectorAll('.tag-float');
    tags.forEach(function(tag, i){
        var delay = (Math.random() * 2).toFixed(1);
        var dur = (2.5 + Math.random() * 2).toFixed(1);
        tag.style.animationDelay = delay + 's';
        tag.style.animationDuration = dur + 's';
        var r = Math.random() * 6 - 3;
        tag.style.transform = 'rotate(' + r + 'deg)';
        tag.addEventListener('mouseenter', function(){
            tag.style.transform = 'rotate(0deg) scale(1.1)';
        });
        tag.addEventListener('mouseleave', function(){
            tag.style.transform = 'rotate(' + r + 'deg)';
        });
    });
})();
