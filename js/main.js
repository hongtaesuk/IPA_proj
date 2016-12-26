function init(){
    // add eventListenr for tizenhwkey
    document.addEventListener('tizenhwkey', function(e){
        if(e.keyName == "back"){
            try {
                tizen.application.getCurrentApplication().exit();
            } catch (error){
                console.error("getCurrentApplication() : " + error.message);
            }
        }
    });
    
    // add click or touch event to the playlist
    var list = document.getElementById('playlist');
    list.addEventListener('click', function(e) {
        //showListBox();
        if (e.srcElement.className == "thumb"){
            playVideo(e.srcElement.id);
            document.getElementById('id').value = e.srcElement.id; // pass id to html file
        }
    });

    // initial assignments of video
    video = document.getElementById('player');
    
    //google api
    googleApiClientReady();
    
    // interval video status check to prevent an infinite buffering
}
