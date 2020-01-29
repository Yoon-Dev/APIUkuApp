window.onload = () =>{
    var sheets = document.querySelectorAll('.uku-sheet')  
    sheets[0].classList.remove('uku-sheet')
    sheets[0].classList.add('first-uku-sheet')
}
const del = (e, target, callback) => {
    e.preventDefault()
    var parent = document.getElementById(target.getAttribute('data-id'))

    var ajax = new XMLHttpRequest()

    ajax.open("GET", "../src/delete.php?id="+target.getAttribute('data-id'), true);
    ajax.send()
    ajax.onreadystatechange = () => {
        if (ajax.readyState == 4 && ajax.status == 200) {
                callback(parent);
        }
      }

}

const callback = (parent) => {
    parent.style.opacity = 0
    setTimeout(() => {parent.remove()}, 500)
}
