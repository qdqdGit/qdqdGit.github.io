
if (/Android|webOS|iPhone|iPod|BlackBerry/i.test(navigator.userAgent)) {
    document.querySelector('body').style = "zoom: 100%;"
} else {
    document.querySelector('body').style = "zoom: 50%;"
}