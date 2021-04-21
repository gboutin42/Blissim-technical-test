let today = new Date()
let month = today.getMonth() + 1
month = (month < 10 ? "0" + month : month)
let date = month + ' / ' + today.getFullYear()
document.getElementById("date-copyright").innerHTML = date