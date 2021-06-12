document.getElementById('submit').addEventListener("click" , (Event) => {
    Event.preventDefault();

    let password = document.getElementById('password');
    let username = document.getElementById('username');

    let status = {
        password: '',
        username: ''
    }

    if(password.value.length < 6){
        status.password = 'رمز عبور حداقل باید دارای 6 کاراکتر باشد'
    }else{
        status.password = '';
    }

    if(username.value == ''){
        status.username = 'نام کاربری خود را بنویسید';
    }else{
        status.username = '';
    }

 
    if(status.password != '' || status.username != ''){
        let problemsText= document.getElementById('problems');
            problemsText.style.display = 'block';
            problemsText.style.border = '2px solid red';
            problemsText.style.background = '#f24d4d';
            problemsText.style.textAlign = 'right';
        document.getElementById('passwordError').innerHTML = status.password;
        document.getElementById('usernameError').innerHTML = status.username;
    }else{
        let problemsText= document.getElementById('problems');
            problemsText.style.display = 'block';
            problemsText.style.border = '2px solid green';
            problemsText.style.background = 'lightgreen';
            problemsText.style.textAlign = 'center';
        document.getElementById('passwordError').innerHTML = '';
        document.getElementById('usernameError').innerHTML = '';
        document.getElementById('success').innerHTML = 'ورود با موفقیت انجام شد'
    }
})

// ورود با موفقیت انجام شد

