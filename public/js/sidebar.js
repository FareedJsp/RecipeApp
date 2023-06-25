const toggler = document.querySelector('header .toggler-icon');
toggler.addEventListener("click", function () {
  document.querySelector("#sidebar").classList.toggle("collapsed");
});

const linkColor = document.querySelectorAll('.sidebar-link')
    
function colorLink(){
  if(linkColor){
    linkColor.forEach(l=> l.classList.remove('active'))
    this.classList.add('active')
  }
}
linkColor.forEach(l => {
  l.addEventListener('click', colorLink);

  // Check if the link's href matches the current URL
  if (l.href === window.location.href) {
    l.classList.add('active');
  }
})

linkColor.forEach(l=> l.addEventListener('click', colorLink))