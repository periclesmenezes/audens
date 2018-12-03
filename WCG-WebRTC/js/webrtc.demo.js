function GetUserMedia(){
    navigator.getUserMedia = navigator.getUserMedia || navigator.webkitGetUserMedia
                    || navigator.mozGetUserMedia || navigator.msGetUserMedia;
    return navigator.getUserMedia;
}

function showWebcam(){
    var userMedia = GetUserMedia();
    if(userMedia){        
        navigator.getUserMedia({video: true, audio: true}, function(stream){
    
            document.getElementsByTagName("video")[0].src = window.URL.createObjectURL(stream);
    
        }, function(error){
            console.log("There was an error in GetUserMedia!!!");
        });
    }
}

document.getElementById("btnShowCamera").addEventListener("click", function(event){
    showWebcam();
});
