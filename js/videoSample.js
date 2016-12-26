var video;
var player;
var player1, player2, player3, player4;
var playerH = 300, playerW = 500;
var small_playerH = 200, small_playerW = 200;
var vidID = 'fcaadTmQ_7g';

function onYouTubeIframeAPIReady(){
    player = new YT.Player('player', {
        height : playerH,
        width : playerW,
        videoId : vidID,
        playerVars : {
            html5 : 1,
            autoplay : 1,
            controls : 2,
            rel : 1, // relevant videos
            showinfo : 0,
            enablejsapi : 1,
            fs : 0 // off full screen
        },
        events : {
            'onReady' : function(event){
                onPlayerReady(event);
            },
            'onError' : onPlayerError
        }
    });

    player1 = new YT.Player('player1', {
        height : small_playerH,
        width : small_playerW,
        videoId : playlist_arr[0][0],
        //videoId : vidID,
        playerVars : {
            playlist : playlist_arr[4][0],
            start : playlist_arr[0][1],
            end : playlist_arr[0][2],
            html5 : 1,
            autoplay : 0,
            controls : 2,
            rel : 1, // relevant videos
            showinfo : 0,
            enablejsapi : 1,
            fs : 0 // off full screen
        },
        events : {
            'onReady' : function(event){
                onPlayerReady(event);
            },
            'onError' : onPlayerError
        }
    });

    player2 = new YT.Player('player2', {
        height : small_playerH,
        width : small_playerW,
        videoId : playlist_arr[1][0],
        //videoId : vidID,
        playerVars : {
            playlist : playlist_arr[5][0],
            start : playlist_arr[1][1],
            end : playlist_arr[1][2],
            html5 : 1,
            autoplay : 0,
            controls : 2,
            rel : 1, // relevant videos
            showinfo : 0,
            enablejsapi : 1,
            fs : 0 // off full screen
        },
        events : {
            'onReady' : function(event){
                onPlayerReady(event);
            },
            'onError' : onPlayerError
        }
    });

    player3 = new YT.Player('player3', {
        height : small_playerH,
        width : small_playerW,
        videoId : playlist_arr[2][0],
        //videoId : vidID,
        playerVars : {
            playlist : playlist_arr[6][0],
            start : playlist_arr[2][1],
            end : playlist_arr[2][2],
            html5 : 1,
            autoplay : 0,
            controls : 2,
            rel : 1, // relevant videos
            showinfo : 0,
            enablejsapi : 1,
            fs : 0 // off full screen
        },
        events : {
            'onReady' : function(event){
                onPlayerReady(event);
            },
            'onError' : onPlayerError
        }
    });

    player4 = new YT.Player('player4', {
        height : small_playerH,
        width : small_playerW,
        videoId : playlist_arr[3][0],
        //videoId : vidID,
        playerVars : {
            playlist : playlist_arr[7][0],
            start : playlist_arr[3][1],
            end : playlist_arr[3][2],
            html5 : 1,
            autoplay : 0,
            controls : 2,
            rel : 1, // relevant videos
            showinfo : 0,
            enablejsapi : 1,
            fs : 0 // off full screen
        },
        events : {
            'onReady' : function(event){
                onPlayerReady(event);
            },
            'onError' : onPlayerError
        }
    });

}

function onPlayerReady(event){
    event.target.setPlaybackQuality('small');
    if (event.target.getPlayerState()==-1){
        reloadVideo(event.target);
    }
}

function onPlayerError(event){
    console.log("error:", event);
}

function reloadVideo(e){
    if (e.getPlayerState() ==3 || e.getPlayerState() == -1){
        console.log('reload', e);
        e.stopVideo();
        e.playVideo();
    }
}


function googleApiClientReady() {
	var apiKey = 'AIzaSyBbbPWxJw_5Q0H99HyjhrJmggS98N8XaVQ';
	gapi.client.setApiKey(apiKey);
	gapi.client.load('youtube', 'v3', function() {
		console.log('google api ready');
	});
}

function clearList(){
    document.getElementById("listThumbs").innerHTML="";
}

function getPlaylist(e){
    clearList();
    var query= $('#search').val();
    if(!query) query = 'pentatonix';
    
    var request = gapi.client.youtube.search.list({
       part : 'snippet', 
       type : 'video',
       order : 'relevance',
       maxResults : 12,
       videoEmbeddable : 'true',
       videoSyndicated : 'true', 
       q : encodeURIComponent(query).replace(/%20/g, "+")
    });
    
    request.execute(function(res){
        var results = res.result;
        $.each(results.items, function(idx, item){
            var newImg = document.createElement('img');
            newImg.src=item.snippet.thumbnails.default.url;
            newImg.id = item.id.videoId;
            newImg.className='thumb';
            $("#listThumbs").append(newImg);
        });
    });
    
    //showListBox();
}

//function 

/*
function showListBox(){
    var arrow = document.getElementById('arrow');
    if ( listHidden ){
        document.getElementById('playlist').style.top='200px';
        arrow.style.top = '170px';
        listHidden = false;
    } else {
        document.getElementById('playlist').style.right='300px';
        arrow.style.top='270px';
        listHidden=true;
    }
}
*/



var searchHidden = false;
function showSearchBox(e){
    if (searchHidden){
        e.style.right = '0px';
        document.getElementById('search').style.right='15px';
        searchHidden=false;
    } else {
        e.style.right = '-140px';
        document.getElementById('search').style.right = '-125px';
        searchHidden = true;
    }
}

function playVideo(id){
    document.getElementById('video_id').value = id;
    vidID = id;
    player.loadVideoById(id,0,"small");
}

function playVideo2(id, player, start, end){
    vidID = id;
    player.loadVideoById(id,0,"small");
}
