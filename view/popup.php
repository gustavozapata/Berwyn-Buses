<style>
#popup {
  border-radius: 5px;
  cursor: pointer;
  transition: 0.3s;
}

#popup:hover {opacity: 0.7;}

/* The Modal background */
.modal {
  display: none; /* Hidden by default */
  position: fixed;
  padding-top: 100px; /* location of popup */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  background-color: rgba(0,0,0,0.3); /*opacity black*/
}

.modal-content {
  margin: auto;
  display: block;
  width: 80%;
  max-width: 700px;  
  -webkit-animation-name: zoom;
  -webkit-animation-duration: 0.6s;
  animation-name: zoom;
  animation-duration: 0.6s;
}

@-webkit-keyframes zoom {
  from {-webkit-transform:scale(0)} 
  to {-webkit-transform:scale(1)}
}

@keyframes zoom {
  from {transform:scale(0)} 
  to {transform:scale(1)}
}

.close {
  position: absolute;
  top: 15px;
  right: 35px;
  color: #f1f1f1;
  font-size: 40px;
  font-weight: bold;
  transition: 0.3s;
}

.close:hover,
.close:focus {
  color: #bbb;
  cursor: pointer;
}

/* 100% Image Width on Smaller Screens */
@media only screen and (max-width: 700px){
  .modal-content {
    width: 100%;
  }
}
</style>

<img id = "popup" src = "../content/images/buspromo.PNG" style="width:100%;max-width:300px">

<div id="myModal" class="modal">
  <span class="close">&times;</span>
  <img class="modal-content" id="popup01">
</div>

<script>

var modal = document.getElementById('myModal');

var img = document.getElementById('popup');
var modalImg = document.getElementById("popup01");
img.onclick = function(){
  modal.style.display = "block";
  modalImg.src = this.src;
}

var span = document.getElementsByClassName("close")[0];

span.onclick = function() { 
  modal.style.display = "none";
}
</script>