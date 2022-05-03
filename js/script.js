let menu = document.querySelector('#menu-bars');
let header = document.querySelector('header');

menu.onclick = () =>{
    menu.classList.toggle('fa-times');
    header.classList.toggle('active');
}

window.onscroll = () =>{
    menu.classList.remove('fa-times');
    header.classList.remove('active');
}

window.onmousemove = (e) =>{
    cursor1.style.top = e.pageY + 'px';
    cursor1.style.left = e.pageX + 'px';
    cursor2.style.top = e.pageY + 'px';
    cursor2.style.left = e.pageX + 'px';
}

document.querySelectorAll('a').forEach(links =>{

    links.onmouseenter = () =>{
        cursor1.classList.add('active');
        cursor2.classList.add('active');
    }

    links.onmouseleave = () =>{
        cursor1.classList.remove('active');
        cursor2.classList.remove('active');
    }

});
document.addEventListener("DOMContentLoaded", function() {
    var backgroundCanvas = document.createElement("div");
    backgroundCanvas.style.cssText = "position: fixed; top: 50%; left: 50%; width: 0; height: 0; z-index: 1; \
    background: rgba(0,0,0,0.9) none center/contain no-repeat; transition: all .0s; cursor: zoom-out;";
    document.body.appendChild(backgroundCanvas);
    backgroundCanvas.onclick = function() { 
        backgroundCanvas.style.top = "50%"; 
        backgroundCanvas.style.left = "50%";
        backgroundCanvas.style.width = "0";
        backgroundCanvas.style.height = "0";
    };
    var zoomInImgLinks = document.getElementsByClassName("u-blowUpImg");
    for(var i=0; i<zoomInImgLinks.length; ++i) zoomInImgLinks[i].addEventListener("click", function(e) {
        e.preventDefault();
        backgroundCanvas.style.backgroundImage = "url('"+e.target.parentNode.href+"')";
        backgroundCanvas.style.top = "0";
        backgroundCanvas.style.left = "0";
        backgroundCanvas.style.width = "100%";
        backgroundCanvas.style.height = "100%";
    })
})
