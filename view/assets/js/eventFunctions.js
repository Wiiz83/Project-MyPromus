
function inviteFriend(friendId){
      document.getElementById("result").innerHTML=friendId;  
            
	
                  var xmlhttp=new XMLHttpRequest();
                  xmlhttp.onreadystatechange = function() {
                  if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                    document.getElementById(friend).value = xmlhttp.responseText;
                    
                  }
                  }

                  xmlhttp.open("POST","../controller/event.php",true);
                  xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
                  xmlhttp.send("friendId="+friendId);
                  

}


function searchSong(){



		
      		
      			var song=document.getElementById("search-song").value;
      			var playlistId=document.getElementById("playlistId").value;
                
                var xmlhttp=new XMLHttpRequest();

                xmlhttp.onreadystatechange = function() {
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                	var responseObject=JSON.parse(xmlhttp.responseText);

                	var newContent="";

                	
                	for(var i=0;i<responseObject.tracks.items.length;i++){
                		
                		newContent+='<li><div>';
                		newContent+='<img src="'+responseObject.tracks.items[i].album.images[2].url+'"/>';
                		newContent+='<span>'+responseObject.tracks.items[i].name+' -<span>';
                		newContent+='<span> '+responseObject.tracks.items[i].artists[0].name+'<span>';
                		newContent+='</div>';
                    newContent+='<span id="buttonSong">';
                		newContent+='<button type="submit" class="btn-add" onClick="addSong(this.value)" value="'+responseObject.tracks.items[i].id +'"">Add</button>';
                		newContent+='</span>';
                		newContent+='</li>';
                	}
					
				


                  	document.getElementById("yeah").innerHTML =newContent;
                    
                  }
                  }
               	
                xmlhttp.open("POST","../controller/event.php",true);
                xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
                xmlhttp.send("songName="+song);
                

}

function addSong(songId){
				var xmlhttp=new XMLHttpRequest();
                xmlhttp.onreadystatechange = function() {
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                  document.getElementById("yeah").innerHTML = "";
                  document.getElementById("search-song").value="";
                  alert("There is delay with the spotify API to show the song in the playlist,wait at least 7 minutes and will be showed");
                  }
                  }

                  xmlhttp.open("POST","../controller/event.php",true);
                  xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
                  xmlhttp.send("songId="+songId);
}