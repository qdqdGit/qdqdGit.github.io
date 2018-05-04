
window.onload = function(){
    if (/Android|webOS|iPhone|iPod|BlackBerry/i.test(navigator.userAgent)) {
        /*document.querySelector('body').style = "zoom: 50%;";*/
        console.log('手机');
    } else {
       /*document.querySelector('body').style = "zoom: 100%;";*/
        console.log('电脑');
    }
    console.log('加载完成');
}
