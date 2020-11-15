function postOrUserSuggestion(filter, str) {
    if (filter = "Posts") {
        showPostSuggestion(str);
    }
    else if (filter == "Users") {
        showUserSuggestion(str);
    }
}

function showPostSuggestion(str) {
    if (str.length == 0) {
        document.getElementById("textHint").innerHTML = "";
        return;
    }
    else {
        var xmlhttp = new XMLHttpRequest();

        xmlhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                if (this.response != "no suggestions") {
                    var uic = document.getElementById("textHint");
                    var posts = JSON.parse(this.responseText);
                    console.log(posts)
                    uic.innerHTML = "";
                    posts.hint.forEach(function (obj) {
                        if (obj.postImage != null) {
                            uic.innerHTML += "<div class='LiveSearch'><a href='/viewPost.php?post=" + obj.postID + "' class='list-group-item'>" +
                                "<p> <img class='img-thumbnail' src='/media/images/postImages/" + obj.postImage + "'>" + obj.postSubject + "</p></a>" +
                                "</div>";
                        }
                        else {
                            uic.innerHTML += "<div class='LiveSearch'>" +
                                "<a href='/viewPost.php' class='list-group-item'>" +
                                "<p>" + obj.postSubject + "</p></a>" +
                                "</div>";
                        }
                    })
                }
            }
        };
        xmlhttp.open("GET", "/liveSearch.php?q=" + str, true);
        xmlhttp.send();
    }
}

function showUserSuggestion(str) {
    if (str.length == 0) {
        document.getElementById("txtHint").innerHTML = "";
        return;
    }
    else {
        var xmlhttp = new XMLHttpRequest();

        xmlhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                if (this.response != "no suggestions") {
                    var uic = document.getElementById("textHint");
                    uic.innerHTML = "";
                    var posts = JSON.parse(this.responseText);
                    posts.hint.forEach(function (obj) {
                        uic.innerHTML = "<a href='/viewProfile.php?post='" + obj.userID + "class='list-group-item'><img style='width: 100px; height: 100px;' src='/media/images/postImages/" + obj.userImage + "'><p style='text-align: center'>" + obj.userName + "</p></a>";
                    })
                }
            }
        };
        xmlhttp.open("GET", "/liveSearch.php?q=" + str, true);
        xmlhttp.send();
    }
}