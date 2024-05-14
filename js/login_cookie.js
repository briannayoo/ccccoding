document.addEventListener('DOMContentLoaded',()=>{
    const loginForm = document.querySelector('#loginForm');
    const userId = document.querySelector('#userid');
    const rememberMe = document.querySelector('#rememberMe');  

    function checkCookie(name){
        const cookies = document.cookie.split(';');
        
        let cookieValue = '';
        if(document.cookie && document.cookie !== ''){
            for(let i = 0; i<cookies.length; i++){
                let cookie = cookies[i].trim();
                if(cookie.substring(0,name.length+1) === (name+'=')){
                    cookieValue  = cookie.substring(name.length+1);                    
                }
            }
        }
        return cookieValue;
    }
    userId.value = checkCookie('userid') || '';

    function setCookie(name, value, days){
        const d = new Date();
        const dueDate = days*60*60*1000;
        d.setTime(d.getTime() + dueDate);
        let expires = "expires="+d.toUTCString();

        document.cookie = name+"="+encodeURIComponent(value)+";"+expires+";";
    }
    loginForm.addEventListener('submit',()=>{
        let userIdValue = userId.value;
        if(rememberMe.checked){
            setCookie('userid', userIdValue, 24);
        }else{
            setCookie('userid', '', -24);
        }
    })

});