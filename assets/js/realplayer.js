$(function() {
	var audio = $("#toPlay");

		$(".bouton").button();
		$(".boutonNext").button();


	    $( "#all li" ).draggable({
	      	appendTo: "body",
	      	helper: "clone"
	    });
	    
	    $( "#playlist ol" ).droppable({
			activeClass: "ui-state-default",
			hoverClass: "ui-state-hover",
			accept: ":not(.ui-sortable-helper)",
			drop: function( event, ui ) {

		        //append to the playlist
		        var list = $("<li></li>");
		        var source = ui.draggable.attr("path");
		        list.text( ui.draggable.text() );
		        list.attr("path", source);
		        list.appendTo(this);

		        //send the id of the song to addToPlaylist.php
		        var id = ui.draggable.attr("id");
		        $.ajax({
		        	url : "addToPlaylist.php",
		        	type : "GET",
		        	data : "id=" + id,
		        	success : function(msg){ 
           				alert(msg);
           				location.reload();
       				}
		        });
		    }
	    });

		//play the song onclick event
		$("#playlist li").on("click", function(){
			$("#toPlay").attr("songId", $(this).attr("playlistId"));
			$("#toPlay").attr("src", $(this).attr("path"));
		});

		//play the next song onended event
		$("#toPlay").on("ended", function(){
			var nextId = parseInt ($(this).attr("songId")) + 1;
			var nextPath = $("#playlist" + nextId + "").attr("path");
			$(this).attr("src", nextPath);
			$(this).attr("songId", nextId);
		});

		function next(e) {
			var nextId = parseInt (e.attr("songId")) + 1;
			var nextPath = $("#playlist" + nextId + "").attr("path");
			e.attr("src", nextPath);
			e.attr("songId", nextId);
		}

		function prev(e) {
			var nextId = parseInt (e.attr("songId")) - 1;
			var nextPath = $("#playlist" + nextId + "").attr("path");
			e.attr("src", nextPath);
			e.attr("songId", nextId);
		}

		$("#next").on("click", function(){
			next(audio);
		});

		$("#prev").on("click", function(){
			prev(audio);
		});

	});