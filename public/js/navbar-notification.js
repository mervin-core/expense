function openNotifications(){
    var notif = document.getElementById("notificationDiv");

    if(notif.style.display === "block"){
        notif.style.display = "none";
    } else{
        notif.style.display = "block";
    }
}