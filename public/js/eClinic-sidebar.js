function openNav() {
  if($(window).width() < 1920) {
    document.getElementById("mySidebar").style.width = "18.7%";
    document.getElementById("main-content").style.paddingLeft = "280px";
    document.getElementById("nav-main").style.marginLeft = "18.7%";
    document.getElementById("nav-main").style.width = "81.5%";

    document.getElementById("closeSidebar").style.display = "block";
    document.getElementById("openSidebar").style.display = "none";
    document.getElementById("sidebar-full").style.display = "block";
    document.getElementById("sidebar-minimized").style.display = "none";
  }
  else {
    document.getElementById("mySidebar").style.width = "18.7%";
    document.getElementById("main-content").style.paddingTop = "40px";
    document.getElementById("main-content").style.paddingLeft = "410px";
    document.getElementById("nav-main").style.marginLeft = "18.8%";
    document.getElementById("nav-main").style.width = "81.5%";

    document.getElementById("closeSidebar").style.display = "block";
    document.getElementById("openSidebar").style.display = "none";
    document.getElementById("sidebar-full").style.display = "block";
    document.getElementById("sidebar-minimized").style.display = "none";
  }
}

function closeNav() {
  if($(window).width() < 1920) {
    document.getElementById("mySidebar").style.width = "5%";
    document.getElementById("main-content").style.paddingTop = "20px";
    document.getElementById("main-content").style.paddingLeft = "105px";
    document.getElementById("main-content").style.paddingRight = "20px";
    document.getElementById("nav-main").style.marginLeft = "5%";
    document.getElementById("nav-main").style.width = "95%";


    document.getElementById("openSidebar").style.display = "block";
    document.getElementById("closeSidebar").style.display = "none";
    document.getElementById("sidebar-minimized").style.display = "block";
    document.getElementById("sidebar-full").style.display = "none";
  }
  else{
    document.getElementById("mySidebar").style.width = "5%";
    document.getElementById("main-content").style.paddingTop = "60px";
    document.getElementById("main-content").style.paddingLeft = "140px";
    document.getElementById("main-content").style.paddingRight = "20px";
    document.getElementById("nav-main").style.marginLeft = "5%";
    document.getElementById("nav-main").style.width = "95%";


    document.getElementById("openSidebar").style.display = "block";
    document.getElementById("closeSidebar").style.display = "none";
    document.getElementById("sidebar-minimized").style.display = "block";
    document.getElementById("sidebar-full").style.display = "none";
  }
  
}
