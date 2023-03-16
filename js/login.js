window.addEventListener("load",start);

var mailid, pwd;

function start(){
    
    document.getElementById("mailid").addEventListener("change",()=>{
        mailid = document.getElementById("mailid").value;
    })
    
    document.getElementById("pwd").addEventListener("change",()=>{
        pwd = document.getElementById("pwd").value;
    })

    document.getElementById("home").addEventListener("click",()=>{
        window.location.href = "./index.html";
    })
    
    document.getElementById("submission").addEventListener("click",(event)=>{
        // console.log( pwd,mailid)
       
        $(document).ready(function() {
            $.ajax({
                url: 'http://localhost/guvi_dev/php/login.php',
                method: 'POST',
                data: {
                    'mailid': mailid,
                    'pwd': pwd
                },
                success: function(response) {
                    if(response.includes('user found')){
                        // alert(response)
                        // alert('your id is: '+response.substring(10))
                        alert("logged in successfully...")
                        localStorage.setItem("loggedIn","true");
                        localStorage.setItem("userId",response.substring(10));
                        window.location.href = "./index.html";
                    }
                    else{
                        alert("no user found")
                    }
                },
                error: function(xhr, status, error) {
                    console.log(error)
                }
            });
          });
       
        event.preventDefault();
    })
}