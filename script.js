function Email(){
    let Emailsparms ={
        fname: document.getElementById('fname').Value,
        lname: document.getElementById('lname').Value,
        email: document.getElementById('email').Value,
        message: document.getElementById('message').Value,
    }
    const service_ID ='service_q0mb8uo';
    const temp_ID ='template_1g9pofj';

    emailjs.send(service_ID,temp_ID,Emailsparms).then(
        (res)=>{
            document.getElementById('fname').Value = '';
            document.getElementById('lname').Value = '';
            document.getElementById('email').Value = '';
            document.getElementById('message').Value = '';
            console.log(res);
            alert('message was sent');
        }
    ).catch((err) => console.log(err))

    


}