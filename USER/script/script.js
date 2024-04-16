const sideNav = document.getElementById('mySidenav');
const title = document.getElementById('title');
const knowMore = document.getElementById('know-more');

const openNav = () => {
    sideNav.style.width = '250px';
}
const closeNav = () => {
  sideNav.style.width = '0';
}
const hover = () => {
  if(window.innerWidth >= 1020){
    title.innerHTML = "<span id=\"mm\">Fly Away Adventure</span>"
    title.style.fontSize = "8.6458333333333335vw"
  }
  else{
    title.innerHTML = "<span id=\"mm\">F</span>ly Away Adventure"
  }
}
const leave = () => {
  if(window.innerWidth >= 1020){
    title.innerHTML = "<span id=\"mm\">F</span>ly Away Adventure"
    title.style.fontSize = "50px"
  }
  else{
    title.innerHTML = "<span id=\"mm\">F</span>ly Away Adventure"
  }
}
knowMore.addEventListener("mouseover", hover);
knowMore.addEventListener("mouseleave", leave);