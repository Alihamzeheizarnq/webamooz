let problems = {
    firstName: '',
    lastName: '',
    phoneNumber: ['',''],
    email: '',
    password: '',
    passwordRepeat: '',
    totaly: ''
}

let status = []

document.getElementById('submit').addEventListener("click" , (Event) => {
    Event.preventDefault();

    let firstName = document.getElementById('firstName');
    let lastName = document.getElementById('lastName');
    let phoneNumber = document.getElementById('phoneNumber');
    let email = document.getElementById('email');
    let password = document.getElementById('password');
    let passwordRepeat = document.getElementById('passwordRepeat');
    let username = document.getElementById('username');

    let firstNameValue = firstName.value.split('');
    let lastNameValue = lastName.value.split('');
    let phoneNumberValue = phoneNumber.value.split('');

    for(let i=0 ; i < firstName.value.length ; i++){
        if(!isNaN(firstNameValue[i])){
            problems.firstName = 'نام اشتباه است. (دقت کنید که فقط از حروف در نام خود استفاده کنید)';
            firstName.value = '';
            status.push(false);
        }else{
            status.push(true);
            problems.firstName = '';
        }
    }

    for(let i=0 ; i < lastName.value.length ; i++){
        if(!isNaN(lastNameValue[i])){
            problems.lastName = 'نام خانوادگی اشتباه است. (دقت کنید که فقط از حروف در نام خانوادگی خود استفاده کنید)'
            lastName.value = '';
            status.push(false);
        }else{
            status.push(true);
            problems.lastName = ''
        }
    }

    if(phoneNumber.value.length < 11){
        problems.phoneNumber[0] = ('تعداد اعداد وارد شده در تلفن همراه کمتر از 11 است')
        phoneNumber.value = '';
        status.push(false);
    }else if(phoneNumber.value.length > 11){
        problems.phoneNumber[0] = ('تعداد اعداد وارد شده در تلفن همراه بیشتر از 11 است')
        phoneNumber.value = '';
        status.push(false);
    }else{
        problems.phoneNumber[0] = '';
        status.push(true);
    }
    if(phoneNumberValue[0] != '0' , phoneNumberValue[1] != '9'){
        problems.phoneNumber[1] = ('شماره تلفن همراه باید با "09" شروع شود')
        phoneNumber.value = '';
        status.push(false);
    }else{
        problems.phoneNumber[1] = ''
        status.push(true);
    }

    let regex = /^\w+([-+.']\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/;
    if(regex.test(email.value) == false){
        problems.email = 'ایمیل خود را اشتباه وارد کرده اید';
        email.value = '';
        status.push(false);
    }else{
        status.push(true);
        problems.email = '';
    }

    if(password.value.length < 6){
        problems.password = 'رمز عبور حداقل باید دارای 6 کاراکتر باشد';
        password.value = '';
        status.push(false);
    }else{
        problems.password = ''
        status.push(true);
    }

    if(passwordRepeat.value != password.value){
        problems.passwordRepeat = 'تکرار پسورد اشتباه وارد شده است';
        passwordRepeat.value = '';
        status.push(false);
    }else{
        problems.passwordRepeat=''
        status.push(true);
    }

    if(firstName.value == '' ||
        lastName.value == '' ||
        phoneNumber.value == '' ||
        password.value == '' ||
        passwordRepeat.value == '' ||
        username.value == ''){
        problems.totaly = 'همه فیلدهای لازم را پر کنید';
        status.push(false);
    }else{
        problems.totaly = '';
        status.push(true);
    }

    for(let i=0 ; i<status.length ; i++){
        if(status[i] == false){
            let problemsText= document.getElementById('problems');
                problemsText.style.display = 'block';
                problemsText.style.border = '2px solid red';
                problemsText.style.background = '#f24d4d';
                problemsText.style.textAlign = 'right';

            problemsText.children[0].innerHTML = problems.firstName;
            problemsText.children[1].innerHTML = problems.lastName;
            problemsText.children[2].innerHTML = problems.phoneNumber[0];
            problemsText.children[2].innerHTML += '<br>' + problems.phoneNumber[1];
            problemsText.children[3].innerHTML = problems.email;
            problemsText.children[4].innerHTML = problems.password;
            problemsText.children[5].innerHTML = problems.passwordRepeat;
            problemsText.children[6].innerHTML = problems.totaly;
            problemsText.children[7].innerHTML = '';
        }else{
            let problemsText= document.getElementById('problems');
                problemsText.style.display = 'block';
                problemsText.style.border = '2px solid green';
                problemsText.style.background = 'lightgreen';
                problemsText.style.textAlign = 'center';
            problemsText.children[7].innerHTML = 'ثبت نام شما با موفقیت انجام شد';
        }
    }
})