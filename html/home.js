const navToggle= document.querySelector(".nav-toggle");
const links = document.querySelector(".links");
const navbar= document.getElementById('nav');
const topLink= document.querySelector('.top-link ')
const linksContainer=document.querySelector('.links-container');
const vid= document.getElementById('video');
vid.playbackRate = 0.8;
// navToggle.addEventListener('click',toggled);
// function toggled(){
//     links.classList.toggle('show-links');
// }
console.log(navbar)

  window.addEventListener('scroll',scrolled);
function scrolled(){
    const scrollHeight=window.pageYOffset;
    const navHeight=navbar.getBoundingClientRect().height;
    if(scrollHeight>navHeight){
        navbar.classList.add("fixed-nav")
        }
        else{
            navbar.classList.remove("fixed-nav")

        }
        if(scrollHeight>500){
            topLink.classList.add("show-link")
            }
            else{
                topLink.classList.remove("show-link")
    
            }
    
}
const scrollLinks=document.querySelectorAll(".scroll-link");
scrollLinks.forEach(function(link){
    link.addEventListener('click',smoothe);
    function smoothe(e){
        e.preventDefault();
        const id= e.currentTarget.getAttribute("href").slice(1);
        console.log(id)
        const element=document.getElementById(id)


        const navHeight=navbar.getBoundingClientRect().height;
        const containerHeight=linksContainer.getBoundingClientRect().height;
        const fixedNav=navbar.classList.contains("fixed-nav");

        let position=element.offsetTop-navHeight;
        if(!fixedNav){
            position -= navHeight;
        } 
        if(navHeight>82){
            position+=containerHeight;
        }
        console.log(position)
        window.scrollTo({
            left:0,
            top:position,
        })
        linksContainer.style.height=0;
    
    }

})