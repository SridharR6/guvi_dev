window.addEventListener("load",start);

var fname, lname, dob, age, address, mailid, phone, pwd, pwd1;

function start(){
    document.getElementById("fname").addEventListener("change",()=>{
        fname = document.getElementById("fname").value;
    })
    document.getElementById("lname").addEventListener("change",()=>{
        lname = document.getElementById("lname").value;
    })
    document.getElementById("dob").addEventListener("change",()=>{
        dob = document.getElementById("dob").value;
    })
    document.getElementById("age").addEventListener("change",()=>{
        age = document.getElementById("age").value;
    })
    document.getElementById("address").addEventListener("change",()=>{
        address = document.getElementById("address").value;
    })
    
    document.getElementById("mailid").addEventListener("change",()=>{
        mailid = document.getElementById("mailid").value;
    })
    document.getElementById("phone").addEventListener("change",()=>{
        phone = document.getElementById("phone").value;
    })
    document.getElementById("pwd").addEventListener("change",()=>{
        pwd = document.getElementById("pwd").value;
    })
    document.getElementById("pwd1").addEventListener("change",()=>{
        pwd1 = document.getElementById("pwd1").value;
    })

    document.getElementById("home").addEventListener("click",()=>{
        window.location.href = "./index.html";
    })
    document.getElementById("submission").addEventListener("click",(event)=>{
        event.preventDefault();
        console.log(fname,lname, age, dob, pwd, pwd1, mailid, address, phone)
       
        $(document).ready(function() {
            $.ajax({
                url: 'http://localhost/guvi_dev/php/register.php',
                method: 'POST',
                data: {
                    'fname':fname,
                    'lname':lname,
                    'dob':dob,
                    'age':age,
                    'address':address,
                    'mobile':phone,
                    'mailid': mailid,
                    'pwd': pwd,
                    
                },
                success: function(response) {
                    alert(response);
                    if(response.includes("signed Up")){
                        window.location.href = "./index.html";
                    }
                },
                error: function(xhr, status, error) {
                    console.log(error);
                }
            });
          });
        
    })
}