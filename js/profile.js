window.addEventListener("load",start);
function start(){
    document.getElementById("home").addEventListener("click",()=>{
        window.location.href = "./index.html";
    })
    var loggedin = document.getElementById("loggedin");
    var nouser = document.getElementById("nouser");

    if(localStorage.getItem("userId")!==null){
        nouser.style.display = "none";
        loggedin.style.display = "block";
        // sessioninfo.style.display = "block";
        $(document).ready(function() {
            $.ajax({
                url: 'http://localhost/guvi_dev/php/profile.php',
                method: 'POST',
                data: {
                    'id':localStorage.getItem("userId")
                },
                success: function(response) {
                    loggedin.innerHTML = `<h3>User Data</h3><br>${response}<br><button id = "logout" class = "btn btn-primary">Logout</button>`;
                    // sessioninfo.innerHTML = '<br><button id = "sessiondata" class = "btn btn-primary">SessionInfo</button>';
                    document.getElementById("logout").addEventListener("click",()=>{
                        localStorage.clear();
                        window.location.reload(true);
                    })
                    // document.getElementById("sessiondata").addEventListener("click",()=>{
                        
                        
                    // })
                },
                error: function(xhr, status, error) {
                    console.log(error)
                }
            });
          });
    }
    else{
        // sessioninfo.style.display = "none";
        loggedin.style.display = "none";
        nouser.style.display = "block";
        nouser.innerHTML = 'you have to login to see ur profile <br><button id = "login" class = "btn btn-primary">LogIn</button>';
        document.getElementById("login").addEventListener("click",()=>{
            window.location.href = "./login.html";
        })
    }
}