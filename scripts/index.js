//VIEWPORT
var viewport = Math.max(
  document.documentElement.clientHeight,
  window.innerHeight || 0
);
var page = document.getElementById("page");
page.style.height = viewport + "px";

//CHAT
//   $(".contact").on("click", function() {
//     $(this).toggleClass("contact-open");
//   });
